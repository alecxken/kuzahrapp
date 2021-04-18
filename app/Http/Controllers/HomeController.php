<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Redirect,Response;

use Auth;

Use DB;

use Carbon\Carbon;

use App\Models\UserDetail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        ##on login

        $check_user = UserDetail::all()->where('user_id',Auth::user()->email)->first();

        if (empty($check_user)) 
         {
        return redirect('employee-details')
                        ->with('danger','Please Update Your Details To Proceed');
         }
        else
        {
                return 'Alas';
        }


            $record = User::select(\DB::raw("COUNT(*) as count"), \DB::raw("DAYNAME(created_at) as day_name"), \DB::raw("DAY(created_at) as day"))
                ->where('created_at', '>', Carbon::today()->subDay(6))
                ->groupBy('day_name','day')
                ->orderBy('day')
                ->get();
            
                $data = [];
            
                foreach($record as $row) {
                    $data['label'][] = $row->day_name;
                    $data['data'][] = (int) $row->count;
                }
            
                $data['chart_data'] = json_encode($data);
 
        return view('home', $data);
    }
}
