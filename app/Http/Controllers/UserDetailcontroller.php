<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Models\User;

use App\Models\UserDetail;

class UserDetailcontroller extends Controller
{
    //
    ###get employee details page
  public function documents()
    {
          $data = DepartmentDoc::all();

          $departments = EssDepartment::all();

        return view('ess.document',compact('data','departments'));
    }

        public function store_docs(Request $request)
    {
        $data = new DepartmentDoc();

        $data->name = $request->input('name');

         $data->description = $request->input('description');

        $data->department = $request->input('department');

        $data->category = $request->input('category');

        $data->status = 'Active';

         $media = $request->file('image');

        if($request->hasfile('image'))
             {  
                    $destinationPath = public_path('forms/');
                    $filename1 = time().'-'.$media->getClientOriginalName();
                    $media->move($destinationPath, $filename1);
                    $files1 = $filename1;
                    $data->image = $files1;
                
            }
     
        $data->save();

        return back()->with('status','success');
    }
     public function drop_docs($id)
      {

          $datas = DepartmentDoc::all()->where('id',$id)->first();

          $filePath = public_path('forms/'.$datas->image);

         if (file_exists($filePath))
          {

                   unlink($filePath);

           DepartmentDoc::where('id', $id)->delete();

        }
        else
        {

           DepartmentDoc::where('id', $id)->delete();
        }

       return back()->with('danger','success');
    }

  public function department()
    {
        $data = EssDepartment::all();

        $users = User::all();

        return view('ess.department',compact('data','users'));
    }


    public function store_department(Request $request)
    {

         $token = Token::Unique('ess_departments','token',5);
      
         $t = date("Y",strtotime("now"));
      
        $token = strtoupper('ESS-'.$token.'-'.$t);

        $req = new EssDepartment();

		$req->token = $token;

		$req->department_name = $request->input('department_name');

		$req->hod = $request->input('hod');

		$req->assistant = $request->input('assistant');

		$req->save();

		return back()->with('status','success');


    }

     public function update_department(Request $request)
    {
      

        $req =  EssDepartment::findorfail($request->input('department_id'));

		$req->department_name = $request->input('department_name');

		$req->hod = $request->input('hod');

		$req->assistant = $request->input('assistant');

		$req->save();

		return back()->with('status','success');
        
    }


     public function get_department($id)
    {
             $data =  EssDepartment::all()->where('token',$id)->first();

             return $data;
    }

     public function drop_department($id)
    {
           $req =  EssDepartment::findorfail($id);

		   $req->delete();

        	return back()->with('status','success');
        
    }
    

     public function viewstaff()
    {
        $data = EssEmpContact::all();

        $users = User::orderby('username','DESC')->get();

        $departments = EssDepartment::all();

        return view('ess.viewstaff',compact('data','users','departments'));
    }

    #add staff details below
     public function staff()
    {
        $data = UserDetail::all();

        $users = User::orderby('username','DESC')->get();

        $departments = CompanyDepartment::all();

        return view('ess.staff',compact('data','users','departments'));
    }


    public function store_staff(Request $request)
    {

         $token = Token::Unique('ess_emp_contacts','token',5);
      
         $t = date("Y",strtotime("now"));
      
        $token = strtoupper('ESS-'.$token.'-'.$t);

        $check = EssEmpContact::all()->where('user_id', $request->input('user_id'))->first();

        if (!empty($check)) 
        {
            # code...
            $req = EssEmpContact::findorfail($check->id);

	     	//$req->token = $token;
        }

        else
         {
            # code...
            $req = new EssEmpContact();

		    $req->token = $token;
        }

        

        $req->user_id = $request->input('user_id');
        
        $req->phone_no = $request->input('phone_no');

        $req->ext_no = $request->input('ext_no');

        $req->department = $request->input('department');

        $req->full_name = $request->input('full_name');

        $req->extra_one = $request->input('role');

        $req->status ='Active';

		$req->save();

		return back()->with('status','success');


    }

    


     public function get_stafft($id)
    {
             $data =  EssEmpContact::all()->where('token',$id)->first();

             return $data;
    }

     public function drop_staff($id)
    {
           $req =  EssEmpContact::findorfail($id);

		   $req->delete();

        	return back()->with('status','success');
        
    }
}
