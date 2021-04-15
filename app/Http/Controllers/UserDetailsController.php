<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BasicInformation;
use App\Models\ContactDetail;
use App\Models\User;

class UserDetailsController extends Controller
{
   
    public function getUserBasicDeitails($userId){
    
        $userDetails = BasicInformation::where("user_id",$userId)->get();
        $userContactDetails = ContactDetail::where("user_id",$userId)->get();
        $user = User::where("id",$userId)->first();
       // dd($user);
        return view('details', compact('userDetails','userContactDetails','user'));
    }

  
}
