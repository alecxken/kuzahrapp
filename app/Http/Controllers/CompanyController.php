<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use Token;

use App\Models\User;

use App\Models\Company;

use App\Models\CompanyDocumet;

class CompanyController extends Controller
{
    //

    public function readpdf($id)
    {
       $filename = $id; 

        $path = public_path('files/'.$filename);

       if (!file_exists($path))
        {

          return back()->with('danger','No data ');

        }


        $filetype = \File::extension($filename);

        if($filetype == 'pdf') 
        {

                    return \Response::make(file_get_contents($path), 200, [
                    'Content-Type' => ['image/jpg', 'application/pdf'],
                    'Content-Disposition' => 'inline; filename="'.$filename.'"'
                ]);

        }

        #This returns the ccompany View
        return view('company.index',compact('comps','comp_docs'));
    }

    public function company_page()
    {
        $comps = Company::all()->first();

        $comp_docs = CompanyDocumet::all()->where('comp_token',$comps->comp_token);
        #This returns the ccompany View
        return view('company.index',compact('comps','comp_docs'));
    }

     public function company_view($id)
    {
        $data = Company::all();
        #This returns the ccompany View
        return view('company.index');
    }

      public function store_company(Request $request)
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

    public function company_store(Request $request)
    {
             $token = Token::Unique('companies','comp_token',5);
      
            $t = date("Y",strtotime("now"));
      
             $token = strtoupper('COMP-'.$token.'-'.$t);

            $check = Company::all()->where('comp_name', $request->input('name'))->first();

                if (!empty($check)) 
                {
                    # code...
                    $comp = Company::findorfail($check->id);

                }

                else
                {
                    # code...
                    $comp = new Company();

                    $comp->comp_token = $token;
                }

           $comp->comp_desc = 'aLAS';

            $comp->comp_name = $request->input('comp_name');

            $comp->comp_desc = $request->input('comp_desc');

            $comp->comp_address = $request->input('comp_address');

            $comp->comp_regno = $request->input('comp_regno');

            $comp->comp_phoneno = $request->input('comp_phoneno');

            $comp->comp_email = $request->input('comp_email');

            $comp->comp_website = $request->input('comp_website');

            
            $media = $request->file('image');

            if($request->hasfile('image'))
                {  
                        $destinationPath = public_path('img/');

                        $filename1 = time().'-'.$media->getClientOriginalName();

                        $media->move($destinationPath, $filename1);

                        $files1 = $filename1;

                        $comp->comp_logo = $files1;

                    
                }

            $comp->comp_logo = $request->input('comp_logo');

            $comp->comp_primary_color = $request->input('comp_primary_color');

            $comp->comp_status = 'Active';

            $comp->comp_creator = Auth::id();

            $comp->save();


    }

    public function  company_store_doc(Request $request)
    {

            //return $request;
         $check = Company::all()->where('comp_token', $request->input('comp_token'))->first();

                // if (!empty($check)) 
                // {
                //     return false;
                //     # code...
                //     $comp = CompanyDocumet::findorfail($check->id);

                // }

                // else
                // {
                //     return true;
                //     # code...
                  
                // }

              //  return $comp;
              $comp = new CompanyDocumet();

                    $comp->comp_token = $check->comp_token;
    
            $media = $request->file('file');

            if($request->hasfile('file'))
                {  
                        $destinationPath = public_path('files/');

                        $filename1 = time().'-'.$media->getClientOriginalName();

                        $media->move($destinationPath, $filename1);

                        $comp->comp_token = $check->comp_token;

                        $comp->doc_name = $media->getClientOriginalName();

                        $fileSize = \File::size(public_path('files/'.$filename1));
            
                        $comp->doc_size = $fileSize; 

                        $files1 = $filename1;

                        $comp->doc = $files1;

                        $comp->save();

                    
                }

                return back()->with('status','Successs');
   
    }

}
