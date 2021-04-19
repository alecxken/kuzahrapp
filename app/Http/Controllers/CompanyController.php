<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use Token;

use App\Models\User;

use App\Models\Company;

use App\Models\CompanyDocumet;

use App\Models\CompanyOffice;

use App\Models\CompanyTeam;

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

        public function company_office()
    {
        $comps = CompanyOffice::all()->first();

        return view('company.department',compact('comps'));
    }

    public function company_page()
    {
        $comps = Company::all()->first();

        if (empty($comps)) 
        {
            # code...
             return view('company.index');
        }

        $comp_docs = CompanyDocumet::all()->where('comp_token',$comps->comp_token);

        $offices = CompanyOffice::all()->count();

        $teams = CompanyTeam::all()->count();
        #This returns the ccompany View
        return view('company.index',compact('comps','comp_docs','offices','teams'));
    }

     public function company_view($id)
    {
        $data = Company::all();
        #This returns the company View
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

            return back()->with('status','Success');


    }

    public function store_company_office(Request $request)
    {
        #########Add Company Offices;

           $token = Token::Unique('companies','comp_token',5);
      
            $t = date("Y",strtotime("now"));
      
             $token = strtoupper('OFC-'.$token.'-'.$t);

          $check = Company::all()->where('comp_token', $request->input('comp_token'))->first();

          $comp = new CompanyOffice();

          $comp->office_token = $token;

          $comp->office_name = $request->input('office_name');

          $comp->desc = $request->input('office_desc');

          $comp->comp_token = $check->comp_token;

          $comp->save();

          return back()->with('status','Success');
    }

    public function  company_store_doc(Request $request)
    {

            //return $request;
         $check = Company::all()->where('comp_token', $request->input('comp_token'))->first();

                // if (!empty($check)) 
             

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
