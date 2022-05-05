<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User as UserModel;
use App\Models\UserActivities;
use Auth;
use DateTime;
class DashboardController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
    	$data['middleContent']    = 'admin/dashboard';
    	$data['pageTitle']        = 'dashboard';
    	return view('admin/template')->with($data);  
    }
}
