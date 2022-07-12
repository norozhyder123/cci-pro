<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserRequest;
use App\Models\User;
use App\Models\User\Blog;
use Auth;

class DashboardController extends Controller
{
    //
    public function index()
    {
    	// $blogs = UserRequest::has('user')->with(['user' =>function($conn){
    	// 	$conn->has('blogs');
    	// }])->where('user_id', Auth::user()->id)->get();
    	// $blogs->load('user');
    	// $blogs->load('blogs');
    	// $details = Auth::user()->education()->get();
    	// dd($blogs);
    	// dd($blogs[0]->user);
    	$users = UserRequest::where(['user_id' => Auth::user()->id, 'status' => 'accepted'])->get();

    	return view('user.dashboard.dashboard', compact('users'));
    	# code...
    }

    public function Timeline()
    {
    	// $blogs = UserRequest::where('user_id', Auth::user()->id)->get();

    	// $posts = UserRequest::has('user')->with(['user' =>function($conn){
    	// 	$conn->has('posts')->with(['posts']);
    	// }])->where('user_id', Auth::user()->id)->get();

    	$users = UserRequest::where(['user_id' => Auth::user()->id, 'status' => 'accepted'])->get();

    	// dd($posts);
    	return view('user.dashboard.timeline', compact('users'));
    	# code...
    }
}
