<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User as UserModel;
use App\Models\UserActivities;
use Auth;
use Session;

class HomeController extends Controller
{
    public function __construct(UserModel $user,UserActivities $user_activites)
    {
        $this->UserModel      =  $user;
    	$this->UserActivities =  $user_activites;
    }
    public function index(Request $request)
    {       
        $data['isBreackTime']             = 'no';
        $checkIsBrackTime = $this->UserActivities->where('user_id',Auth::id())
                                                 ->whereNotNull('break_start_time')
                                                 ->whereNull('break_end_time')
                                                  ->orderBy('id','DESC')
                                                 ->first();
        if (isset($checkIsBrackTime) && isset($checkIsBrackTime->user_id)) 
        $data['isBreackTime']             = 'yes';
        
        $data['user']             = Auth::user();
        $data['middleContent']    = 'Welcome';
        $data['pageTitle']        = 'Welcome';
        return view('front/home')->with($data);  
    }
    public function StartBreakTime(Request $request)
    {
        $json['status'] = 'error';
        $arrActivities['user_id']    = Auth::id();
        $arrActivities['break_start_time'] = date('Y-m-d H:i:s');

        $res = $this->UserActivities->create($arrActivities);
        if ($res) 
        $json['status'] = 'success';
        return response()->json($json);
    }
    public function EndBreakTime(Request $request)
    {
        $json['status'] = 'error';
        $arrData = $this->UserActivities->where('user_id',Auth::id())
                                                 ->whereNotNull('break_start_time')
                                                 ->whereNull('break_end_time')
                                                 ->orderBy('id','DESC')
                                                 ->first();
        if(isset($arrData)) 
        {
            $arrActivities['user_id']        = Auth::id();
            $arrActivities['break_end_time'] = date('Y-m-d H:i:s');

            $res = $this->UserActivities->where('id',$arrData->id)->update($arrActivities);
            if ($res) 
            $json['status'] = 'success';
        } 
        return response()->json($json);
    }
}
