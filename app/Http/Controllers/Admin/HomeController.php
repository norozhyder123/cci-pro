<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin;
use Auth;
use Hash;

class HomeController extends Controller
{
    public function __construct()
    {
    	$this->middleware('guest')->except('logout');

    }

    public function index()
    {
    	return view('admin.adminView.dashboard');
    	# code...
    }

    public function Show()
    {
        $userId = Auth::guard('admin')->user()->id;
        $users = Admin::findOrFail($userId);
        if(!$users){
            return abort(404);
        }else{
            return view('admin.adminView.profile', compact('users'));
        }
        // dd($users);
        # code...
    }

    public function Update($id, Request $request, Admin $user)
    {

        $user = $user->findOrFail($id);
        if($request->email != $user->email){

            $validate = $this->validator($request->all());
            if($validate->fails()){
                return redirect()->back()->withErrors($validate)->withInput();
            }
        }

        if($request->password){

            $validate = Validator::make($request->all(), [
            'old_password' => ['required', 'string', 'min:6'],
            ]);
            if($validate->fails()){
                return redirect()->back()->withErrors($validate)->withInput();
            }

            if (!Hash::check($request->old_password, $user->password)) {
                
                return redirect()->back()->withErrors(['password'=>'Your Old password didn\'t match'] )->withInput();
            }else{
                $user->password = Hash::make($request->password);
            }
        }

        if($request->hasFile('profile_img')){
            $extension = $request->file('profile_img')->extension();
            $name = Auth::guard('admin')->user()->name.time().'.'.$extension;

            $path = Storage::disk('public')->putFileAs('profiles', $request->file('profile_img'), $name);
            // $path = $request->file('profile_img')->store('public/profiles');
            $user->profile_img = $path;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->country = $request->country;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->zip_code = $request->zip_code;
        $user->save();

        return redirect()->back()->with('message' , 'User Updated Successfully');
        # code...
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
    }
}
