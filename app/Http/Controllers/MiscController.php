<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Detail;
use App\Models\Registration;
use App\Models\Entity;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class MiscController extends BaseController
{
    public function readCsv($file){
        $file_n = storage_path($file);
        $file = fopen($file_n, "r");
        $all_data = array();
        while ( ($data = fgetcsv($file, 200, ",")) !==FALSE) {
            $array[]=$data;
        }
        fclose($file);
        return $array;
    }
    public function upload_priests(){
        $priests=$this->readCsv('data.csv');
        foreach($priests as $priest){
            $name=trim($priest[0]??"");
            $email=trim($priest[1]??"");
            
            if($email!=""){
                if(User::where('email',$email)->first()) continue;
                
                $password=substr(Hash::make($name.$email),0,10);
                
                $user = User::create([
                    'name' => $name,
                    'email' => $email,
                    'password' => Hash::make($password),
                    'role_id'=>4
                ]);
                $registered[]="\"$name\",\"$email\",\"$password\"";
            }else if($name){
                $unregistered[]="\"$name\"";
            }
            
        }
        Storage::append('registered.csv',implode("\n",$registered));
        Storage::put('unregistered.csv',implode("\n",$unregistered??[]));
        return response()->json(["status"=>"success"]);
    }

    public function registration_status_view(Request $request){
        if(!auth()->user()->isAdmin()) return redirect()->route("dashboard");

        $registrants=User::whereIn("role_id",[4,5])->andWhere("id","!=",2);
        $registering=$registrants->get();
        $loggedIn=$registrants->whereNotNull("filled")->orWhere("filled","!=","null")->get();

        $participants_expected=Entity::sum("pax");

        $registered=0;

        foreach($loggedIn as $priest){
            $entities=json_decode($priest->filled,true);
            foreach($entities as $entity=>$people){
                foreach($people as $person){
                    if(isset($person["name"]))
                    if($person["name"])
                    $registered++;
                }
            }
        }

        return view("admin.registration-status")->with(compact(
            'registering',
            'loggedIn',
            'participants_expected',
            'registered'
        ));

    }
}
