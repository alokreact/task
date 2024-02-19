<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Distric;
use App\Models\Mandal;
use App\Models\Village;

class UserController extends Controller
{

    public function email(){
        return view('Email.email');    
    }

    public function index(){
        $districs = Distric::all();
        return view('user', compact('districs'));    
    }

    public function searchUser(Request $request){
        $user = User::where('mobile',$request->input('mobile'))->get();
        if(count($user)>0){
            return response()->json(['user'=>$user,'status'=>'success']);
        }
         else{
            return response()->json(['message'=>'No User Found!','status'=>'error']);
         }
    }
    public function getMandal(Request $request){
        $mandals = Distric::with('mandals')->find($request->input('id'));
        return response()->json(['mandals'=>$mandals,'status'=>'success']);
        //dd($mandals);
    }
    public function getVillage(Request $request){

        $villages = Mandal::with('villages')->find($request->input('id'));
        
        return response()->json(['villages'=>$villages,'status'=>'success']);
        //dd($mandals);
    }


}
