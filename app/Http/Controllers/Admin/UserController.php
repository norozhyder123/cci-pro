<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Auth;

class UserController extends Controller
{

	public function __construct()
    {
        if(!Auth::user()){
        	return redirect()->route('admin.login');
        }
    }

    public function index()
    {
    	return redirect()->route('admin.dashboard');
    	# code...
    }

    public function Users()
    {
    	$users = User::where('status','<>','deleted')->get();

    	return view('admin.adminView.users', compact('users'));
    	# code...
    }

    public function Show($id)
    {
    	$users = User::findOrFail($id);

    	return view('admin.adminView.userEdit', compact('users'));
    	# code...
    }

    public function Update($id, Request $request, User $user)
    {

    	$user = $user->findOrFail($id);
    	
    	if($request->email != $user->email){

	    	$validate = $this->validator($request->all());
	    	if($validate->fails()){
	    		return redirect()->back()->withErrors($validate)->withInput();
	    	}
    	}

    	$user->first_name = $request->first_name;
    	$user->last_name = $request->last_name;
    	$user->email = $request->email;
    	$user->phone = $request->phone;
    	$user->country = $request->country;
    	$user->city = $request->city;
    	$user->state = $request->state;
    	$user->zip_code = $request->zip_code;
    	$user->status = $request->status;
    	$user->save();

    	return redirect()->back()->with('message' , 'User Updated Successfully');
    	# code...
    }

    public function Delete($id, User $user)
    {
    	$user = $user->findOrFail($id);

    	$user->status = 'deleted';
    	$user->save();

    	return redirect()->back()->with('message' , 'User Deleted Successfully');
    	# code...
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
    }
}
