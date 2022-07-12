<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;
use Hash;
use Session;

class LoginController extends Controller
{
	use AuthenticatesUsers;

	protected $redirectTo = RouteServiceProvider::ADMINDASHBOARD;

    public function __construct()
    {

        $this->middleware('guest')->except('logout');
    }

    public function getLogin()
    {
        
        return view('admin.auth.login');
    }


    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
        {
            $user = auth()->guard('admin')->user();
            
            \Session::put('success','You are Login successfully!!');
            return redirect()->route('admin.dashboard');
            
        } else {
            return redirect()->back()->with('error','your username and password are wrong.');
        }

    }


    public function logout()
    {
        auth()->guard('admin')->logout();
               
        return redirect(route('admin.login'));
    }

    
   
}
