<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //

	#Get Employee Details Page
    public function get_details()
    {
    	return view('employees.details');
    }
}
