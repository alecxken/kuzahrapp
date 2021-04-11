<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Models\ReqSetting;

use App\Models\SiteDropdown;

use Yajra\Datatables\Datatables;

use Token;

 use Illuminate\Support\Facades\Schema;

class SettingsController extends Controller
{
    //

       public function __construct()
    {
        $this->middleware('auth');
    }

    #Open Requirement Settings Page
    public function req_create()
    {
    	 $token = Token::Unique('req_settings','token',5);

         $t = date("Y-M",strtotime("now"));

         $token = strtoupper('REQ-'.$token.'-'.$t); 

         $data = ReqSetting::all();

    	return view('app_settings.required',compact('token','data'));
    }

     public function ReqData()
    {
        return Datatables::of(ReqSetting::query())->make(true);
    }

    #get dropdowns
    public function dropdownsindex()
    {
      
        return Datatables::of(SiteDropdown::query())->make(true);
    }


    #store requirements
    public function req_store(Request $request)
    {
    	$req = new ReqSetting();

		$req->token = $request->input('token');

		$req->req_name = $request->input('req_name');

		$req->req_action = $request->input('req_action');

		$req->req_renewal = $request->input('req_renewal');

		$req->req_attachment = $request->input('req_attachment');

		$req->req_status = 'Active';

		$req->req_setby = Auth::user()->email;

		$req->save();

		return back()->with('status','success');

    }

    #  delete request 
    public function req_delete($id)
    {
    	

         $data = ReqSetting::findorfail($id);

         $data->delete();

    	return back()->with('danger','deleted '.$data->req_name.' Successfully');
    }


 public function dropdownsettings()
  {
      $table = 'site_dropdowns';

     $tables = \DB::select('SHOW TABLES');

    // $tables = \DB::table('INFORMATION_SCHEMA.TABLES')
    //            ->select('TABLE_NAME')
    //            ->get();

     // return $tables;
 
    $column = Schema::getColumnListing($table);

    $data = SiteDropdown::all();

    return view('app_settings.dropdown',compact('data','column','tables'));

  }

   public function getcolumns($id)
  {
    $table = $id;

    $data = Schema::getColumnListing($table);

    return $data;

  //  return view('iams.settings',compact('data','column'));

  }

  public function storedropdowns(Request $request)
  {
      $token = Token::Unique('site_dropdowns','token',5);
      
      $t = date("Y",strtotime("now"));
      
      $token = strtoupper('EKE-'.$token.'-'.$t);

      $data = new SiteDropdown();

      $data->token = $token;

      $data->table_name = $request->input('table_name');

      $data->column_name = $request->input('column_name');

      $data->item = $request->input('dropdown_name');

      $data->save();

      return back()->with('status','success');

    }

  

   public function dropwriteoffdropdown($request)
  {
   
    $data = IamsWriteoffDropdown::findorfail($request);

    $data->delete();

    return back()->with('danger','successfully');


  }

}
