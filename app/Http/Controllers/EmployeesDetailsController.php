<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\basicInformation;
use App\Models\ContactInformation;
use App\Models\User;

class EmployeesDetailsController extends Controller
{
    //
    public function BasicDetails_store(request $request){
        $data = request()->validate([
          
'Preferred_name'=>'required',
'First_name'=>'required',
'Last_name'=>'required',
'Nationality'=>'required',
// 'Date_birth'=>'required',
'Gender'=>'required',
'Blood_group'=>'required', 
        ]);
        $BasicDetails = new basicInformation();
        $BasicDetails->user_id = Auth::user()->id;


        $BasicDetails->Preferred_name = $request->input('Preferred_name');
        $BasicDetails->First_name = $request->input('First_name');
        $BasicDetails->Last_name = $request->input('Last_name');
        $BasicDetails->Nationality = $request->input('Nationality');
        // $BasicDetails->Date_birth = $request->input('Date_birth');
        $BasicDetails->Gender = $request->input('Gender');
        $BasicDetails->Blood_group = $request->input('Blood_group');
        
        
        if( $BasicDetails->save()){
            return back()->with('status','Success');
        }
     

    }

    public function ContactDetails_store(Request $request){
        $rules = request()->validate([
          
            'Phone_number'=>'required',
            'Login_email'=>'required',
            'Personal_email'=>'required',
            'Secondary_Phone_number'=>'required',
            'Web_site'=>'required',
            'Linkedin'=>'required',
                    ]);
                    $ContactDetails = new basicInformation();
                    $ContactDetails->user_id = Auth::user()->id;

                    $ContactDetails->Phone_number = $request->input('Phone_number');
                    $ContactDetails->Login_email = $request->input('Login_email');
                    $ContactDetails->Personal_email = $request->input('Personal_email');
                    $ContactDetails->Secondary_Phone_number = $request->input('Secondary_Phone_number');
                    $ContactDetails->Web_site = $request->input('Web_site');
                    $ContactDetails->Linkedin = $request->input('Linkedin');
                    
                    if($ContactDetails->save()){
                        return back()->with('status','Success');
                    }
                    
                   
    }
    // public function getUserBasicDeitails($userId){
    
    //     $userDetails = BasicInformation::where("user_id",$userId)->get();
    //     $userContactDetails = ContactInformation::where("user_id",$userId)->get();
    //     $user = User::where("id",$userId)->first();
    //    // dd($user);
    //     return view('/employees/details', compact('userDetails','userContactDetails','user'));
    // }
}
