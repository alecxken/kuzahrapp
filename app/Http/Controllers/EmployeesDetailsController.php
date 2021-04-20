<?php

namespace App\Http\Controllers;

use App\Models\basicInformation;
use App\Models\ContactInformation;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\View\View;

use Illuminate\Support\Facades\Auth;



use Illuminate\Support\Facades\DB;
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
                    $ContactDetails = new ContactInformation();
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
   // basic information and contact information display
    public function getDetails()
    {
        $userId =Auth::id();
        // $ContactInformations = ContactInformation::all();
        $BasicDetails = basicInformation::all()->where("user_id",$userId)->first();
      
// dd($BasicDetails);
        $ContactDetails = ContactInformation::all()->where("user_id",$userId)->first();
        // return $ContactDetails;
                return view('employees.details',compact('ContactDetails' ,'BasicDetails'));
// return view('employees/details')->with('ContactDetails',$ContactDetails);
        // return view('employees/details' ,compact('ContactDetails'));

    }
    public function editBasic_details($id){
        $data = basicInformation::findorfail($id);
return $data;
    }
   
}
