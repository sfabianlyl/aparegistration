<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Detail;
use App\Models\Registration;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class FormController extends BaseController
{
    public function phone($phone){
        if(!$phone) return ""; 
        return ($phone[0]=="+")? $phone: "+6$phone";
    }

    public function strposa($str, $needs){
        foreach($needs as $need){
            if(strpos($str, $need)!==false) return true;
        }
        return false;
    }

    public function view(Request $request){
        $user=auth()->user();
        $entities=$user->entities; 
        $inputs=json_decode($user->filled,true);
        $detailsChapel=Detail::whereJsonContains('forms->chapel','chapel')->get();
        $detailsChurch=Detail::whereJsonContains('forms->church','church')->get();
        $detailsMassCentre=Detail::whereJsonContains('forms->mass_centres','mass_centres')->get();
        $detailsMinistry=Detail::whereJsonContains('forms->ministry','ministry')->get();
        $detailsPriest=Detail::whereJsonContains('forms->priest','priest')->get();
        
        return view("dashboard")->with(compact(
            "user",
            "entities",
            "inputs",
            "detailsChapel",
            "detailsChurch",
            "detailsMinistry",
            "detailsPriest",
            "detailsMassCentre"
        ));
    }

    public function auto_submit_participants(Request $request){
        $user=auth()->user();
        $user->filled=json_encode($request->form);
        $user->save();
        if(isset($request->self["details"]))
        $request->merge(['self["details"]'=>json_encode($request->self["details"])]);
        User::where("id",$user->id)->update($request->self);
        return response()->json(["status"=>"success"]);
    }

    public function mock_auto_submit_participants(Request $request){
        
        return response()->json(["status"=>"success"]);
    }


    
}
