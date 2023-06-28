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
        $detailsChapel=Detail::whereJsonContains('forms','chapel')->get();
        $detailsChurch=Detail::whereJsonContains('forms','church')->get();
        $detailsMassCentre=Detail::whereJsonContains('forms','mass_centres')->get();
        $detailsMinistry=Detail::whereJsonContains('forms','ministry')->get();
        $detailsPriest=Detail::whereJsonContains('forms','priest')->get();
        
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
        $request->merge(['self["details"]'=>json_encode($request->self)]);
        User::where("id",$user->id)->update($request->self);
        return response()->json(["status"=>"success"]);
    }

    
}
