<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User as UserModel;
use Auth;
use Session;

class AuthController extends Controller
{
    public function __construct(UserModel $user)
    {
    	$this->UserModel =  $user;
    }
    public function index(Request $request)
    {       
        
        $data['middleContent']        = 'login';
        $data['pageTitle']        = 'Login';
        return view('admin/login')->with($data);  
    }
    public function login(Request $request)
    {  	
    	$request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) 
        {
            return redirect("/admin/dashboard")->withSuccess('Signed in');
        }
        return redirect("admin")->withError('Login details are not valid');  
    }
    public function logout(Request $request)
    {       
       
        Session::flush();
        
        Auth::logout();

        return redirect('/admin');

      /*  Auth::logout();
        return redirect('/admin');*/
    }
}
