<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Auth;

use App\Models\PersonalInfo;

use App\Models\SignatureDirectory;

use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Models\Role;

use Spatie\Permission\Models\Permission;

use App\Models\CompanyDepartments;

use Token;

class UserController extends Controller
{
    //
         public function __construct()
    {
        $this->middleware('auth');
    }

    public function usercreate()
    {
      //Get all users and pass it to the view

        $token = Token::Unique('personal_infos','emp_token',5);

         $t = date("Y-M",strtotime("now"));

         $token = strtoupper('PERS-'.$token.'-'.$t); 

      return view('employee.step1',compact('token'));
    }

      public function steponeuser(Request $request)
    {
      $emp = $request->session()->get('emp');

      $token = Token::Unique('personal_infos','emp_token',5);

         $t = date("Y-M",strtotime("now"));

         $token = strtoupper('PERS-'.$token.'-'.$t); 
      //Get all users and pass it to the view
   //  $request->session()->forget('emp');
      return view('employee.step1',compact('emp','token'));
    }

       public function steptwouser(Request $request)
    {
      $emp = $request->session()->get('emp');

      $departments =CompanyDepartments::all();

     //Get all users and pass it to the view
    
      return view('employee.step2',compact('emp','departments'));
    }

       public function stepthreeuser(Request $request)
    {
    
        $emp = PersonalInfo::all()->where('emp_id',Auth::id())->first();
        $request->session()->put('emp', $emp);
  
  
      return view('employee.step3',compact('emp'));
    }

    public function profileupdate(Request $request)
    {

      
         $media1 = $request->file('files');

        if($request->hasfile('files'))
                                          {  
                                          
                                             
                                                if (!empty($media1)) 
                                                 {

                                                    $task  = User::findorfail(Auth::id());

                                                    $destinationPath1 = public_path('images/');

                                                    $fname = $media1->getClientOriginalName();

                                                    $filename1 = time().'-'.Auth::id().'.'.$media1->getClientOriginalExtension();

                                                    $media1->move($destinationPath1, $filename1);

                                                    $task->profile_pic = $filename1;

                                                    $task->save();
                                                    
                                                    return back()->with('status','Updated');
                                                  }
                                              
                                            }
             return back()->with('danger','Opps!! and error occured');
    }
    

      public function postusercreate(Request $request)
    {
      //return $request;
      
      $validatedData = $request->validate([
            'emp_token' => 'required|unique:personal_infos',
            'emp_id' => 'required',
            'emp_contact' => 'required|numeric',
            'emp_address' => 'required',
            'emp_type' => 'required',
            'emp_details' => 'required',
   
        ]);

       $request->session()->forget('emp');
  
        if(empty($request->session()->get('emp')))
        {
            $emp = new PersonalInfo();

            $emp->fill($validatedData);

            $request->session()->put('emp', $emp);

            
        }
        else
        {
           $emp = $request->session()->get('emp');

           $id = PersonalInfo::all()->where('emp_token',$emp->emp_token)->first();

            $emp = PersonalInfo::findorfail($id->id);           

            $emp->fill($validatedData);

            $request->session()->put('emp', $emp);
        }

          $emp->save();

  
        return redirect()->route('user.step.two');
      //Get all users and pass it to the view
    
     // return view('employee.step1',compact('emp'));
    }

          public function postusercreatetwo(Request $request)
            {
              
              
               $validatedData = $request->validate([
                    'emp_department' => 'required',
                    'emp_position' => 'required',
                    'emp_date' => 'required',
                     'emp_about' => 'required',
                      
                ]);

                $emp = $request->session()->get('emp');

               // return $validatedData['emp_department'];

                // $id = PersonalInfo::all()->where('emp_token',$emp->emp_token)->first();

                $emp = PersonalInfo::findorfail($emp->id);  

                $emp->emp_department = $validatedData['emp_department'];

                $emp->emp_position = $validatedData['emp_position'];

                $emp->emp_date = $validatedData['emp_date'];

                $emp->emp_about = $validatedData['emp_about'];

                $emp->save();

                $request->session()->put('emp', $emp);

                 
                                
                       
                return redirect()->route('user.step.three');
             
            

          }

       public function uploadsig(Request $request)

    {

        $folderPath = storage_path('app/public/');

        

        $image_parts = explode(";base64,", $request->signed);

        return $image_parts;

              

        $image_type_aux = explode("image/", $image_parts[0]);

           

        $image_type = $image_type_aux[1];

           

        $image_base64 = base64_decode($image_parts[1]);

        
        $tokens = Token::Unique('signature_directories','user_token',5);

        $t = date("Y",strtotime("now"));

        $token = strtoupper('SIG-'.$tokens.'-'.$t);

        $file =  $token . '.'.$image_type;

        file_put_contents($file, $image_base64);

        $existed = SignatureDirectory::all()->where('user_id',\Auth::id())->first();

        if (!empty($existed)) 
        {
            $data =  SignatureDirectory::findorfail($existed->id);
        }
        else
        {
             $data = new SignatureDirectory();
        }

       
        $data->user_id = Auth::id();
        $data->user_token = $token;
        $data->signature = $file;
        $data->save();

        return back()->with('success', 'success Full upload signature');

    }

    public function products_disp_data($img_name)
{
    $img_path = storage_public($img_name);
    if (!File::exists($img_path)) {
        abort(404);
    }
    $file = File::get($img_path);
    $type = File::mimeType($img_path);
    $data = Response::make($file, 200);
    $data->header("Content-Type", $type);
    return $data;

}

   



    ### DISPLAY ALL USERS FUNCTION

    public function index()
    {
      //Get all users and pass it to the view
      $users = User::orderBy('name', 'asc')->get();
  
      $roles = Role::all();//Get all roles

      $permissions = Permission::all();//Get all roles

      return view('admin.index',compact('users','roles','permissions'));
    }

    public function get_user($id)
    {
      //Get all users and pass it to the view
      $data = User::all()->where('id',$id)->first();
      
      return $data;
      //return view('admin.index',compact('users','roles','permissions'));
    }

}
