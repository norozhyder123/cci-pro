<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserRequest;
use App\Models\User;
use App\Models\Chat;
use Auth;

class ChatController extends Controller
{
    //
    public function index()
    {

		// $users = User::whereIn('id', $userIds)->get();
		$users = UserRequest::where(['user_id' => Auth::user()->id, 'status' => 'accepted'])->get();
        // dd($users[0]->user);
		return view('user.dashboard.chat', compact('users'));
    	# code...
    }

    public function getMessage(Request $request)
    {
    	$user_id = $request->user_id;
    	$chats = Chat::where(['user_id' => $user_id, 'to_id' => Auth::user()->id]);
    	$chatss = Chat::where(['user_id' => Auth::user()->id, 'to_id' => $user_id])->union($chats)->orderBy('created_at', 'asc')->get();
    	$merged = $chatss;
    	$html = '';
    		// dd($merged);
    	foreach($merged as $chat){
            if($chat->user_id != Auth::user()->id){
            $html .= "<li class='d-block'>
                <div class='message my-message'>
                    $chat->message
                </div>
            </li>";

            }
            else{
            $html .= "<li class='clearfix d-block'>
                <div class='message other-message float-right'>
                    $chat->message
                </div>
            </li>";
            }
        }

        return response()->json(['html'=> $html], 200);
    	# code...
    }

    public function SaveMsg(Request $request)
    {
    	$validate = Validator::make($request->all(),[
    		'to_id' => 'required',
    		'message' => 'required'
    	]);

        $chat = new Chat;
        $chat->to_id = $request->to_id;
        $chat->message = $request->message;
        $chat->status = 'delivered';
        $chat->user()->associate(Auth::user());
        $chat->save();


    	return response()->json(['status'=>'Successfully Added'], 200);
    	# code...
    }
}
