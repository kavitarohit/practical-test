<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User as UserModel;
use App\Models\UserActivities;
use Auth;
use Session;

class AuthController extends Controller
{
    public function __construct(UserModel $user,UserActivities $user_activites)
    {
        $this->UserModel      =  $user;
    	$this->UserActivities =  $user_activites;
    }
    public function index(Request $request)
    {       
        
        $data['middleContent']        = 'login';
        $data['pageTitle']        = 'Login';
        return view('front/login')->with($data);  
    }

    public function login(Request $request)
    {       
        if (isset($_POST['btnSubmit'])) 
        {
            $data = [];
            $request->validate([
            'email' => 'required',
            'password' => 'required',
            ]);
            
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) 
            {
                $arrActivities['user_id'] = Auth::id();
                $arrActivities['login_time'] = date('Y-m-d H:i:s');

                $this->UserActivities->create($arrActivities);

                return redirect('/')->withSuccess('You have successfully send verification email');
            }
            else
            {
               return redirect('/login')->withError('Invalid Login Details');
            }
        }

        $data['middleContent']    = 'front/login';
        $data['pageTitle']        = 'Signup';
        return view('front/template')->with($data);  
    }
    public function logout(Request $request)
    {       
       
        Session::flush();
        
        Auth::logout();
         $arrData = $this->UserActivities->where('user_id',Auth::id())
                                                 ->whereNotNull('login_time')
                                                 ->whereNull('logout_time')
                                                 ->first();
        if(isset($arrData)) 
        {
            $arrActivities['logout_time'] = date('Y-m-d H:i:s');
            $res = $this->UserActivities->where('id',$arrData->id)->update($arrActivities);
        } 

        return redirect('/');

      /*  Auth::logout();
        return redirect('/admin');*/
    }
}
