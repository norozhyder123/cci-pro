<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserRequest;
use Auth;

class ConnectionController extends Controller
{
    public function index()
    {
        $connected_user = UserRequest::where('user_id',Auth::user()->id)->orWhere('to_id',Auth::user()->id)->where('status','<>','rejected')->select('user_id','to_id')->get()->toArray();
        $userIds = [];
        foreach($connected_user as $user){
            if(!in_array($user['user_id'], $userIds)){
                $userIds[] = $user['user_id'];
            }
            if(!in_array($user['to_id'], $userIds)){
                $userIds[] = $user['to_id'];
            }
        }

        if (($key = array_search(Auth::user()->id, $userIds)) !== false) {
                unset($userIds[$key]);
            }
        $requests = UserRequest::where(['to_id' => Auth::user()->id, 'status' => 'waiting']);
        $connected = UserRequest::where(['user_id' => Auth::user()->id, ['status','<>', "'rejected'"]]);
        
        
        $connections = User::whereNotIn('id',$userIds)->where('id','<>',Auth::user()->id)->where('profile_visibility','public')->get();
        
        $fof = Auth::user()->connected;
        $friendsIds = [];
        foreach($fof as $user){
            foreach($user->user->connected as $friend){
                if($friend->friendsOfFriend){
                    if(!in_array($friend->friendsOfFriend->id, $friendsIds) && $friend->friendsOfFriend->id != Auth::user()->id && $friend->friendsOfFriend->id != $user->to_id && !in_array($friend->friendsOfFriend->id, $requests->pluck('user_id')->toArray())){
                        $friendsIds[] = $friend->friendsOfFriend->id;
                    }
                }
            }
        }
        
        $friendsoffriends = User::whereIn('id', $friendsIds)->where(['profile_visibility' => 'friends-of-friend', 'status' => 'active'])->get();
        $requests = $requests->get();
        $connected = $connected->get();
    	
        
    	return view('user.dashboard.connections', compact('connections','connected','requests','friendsoffriends'));
    	# code...
    }

    public function SendConnection($id)
    {
    	$user_id = Auth::user()->id;
    	$userConnection = UserRequest::where(['user_id' => $user_id, 'to_id' => $id])->get()->toArray();
        $userConnection2 = UserRequest::where(['to_id' => $user_id, 'user_id' => $id])->get()->toArray();
    	// return response()->json($userConnection, 200);
    	if(!empty($userConnection) || !empty($userConnection)){
    		return response()->json(['message' => 'Already Sent request', 'status' => 'failed'], 404);
    	}else{
            $UserRequest = new UserRequest;
            $UserRequest->to_id = $id;
            $UserRequest->users()->associate(Auth::user());
    		$UserRequest->save();
            // UserRequest::create([
    		// 	'user_id' => $user_id,
    		// 	'to_id' => $id
    		// ]);

    		return response()->json(['message' => 'Connection Sent Successfully', 'status' => 'success'], 200);
    	}
    	# code...
    }

    public function ApproveConnection($id)
    {
    	$user_id = Auth::user()->id;
    	$userConnection = UserRequest::where(['to_id' => $user_id, 'user_id' => $id])->get()->toArray();
    	// dd();
    	// return response()->json($userConnection, 200);
    	if(!empty($userConnection)){
    		$connection = UserRequest::find($userConnection[0]['id']);
    		$connection->status = 'accepted';
    		$connection->save();

            $UserRequest = new UserRequest;
            $UserRequest->to_id = $id;
            $UserRequest->status = 'accepted';
            $UserRequest->users()->associate(Auth::user());
            $UserRequest->save();

    		return response()->json(['message' => 'Request Accepted', 'status' => 'success'], 200);
    	}else{
    		return response()->json(['message' => 'Request Not Found', 'status' => 'failed'], 404);
    	}
    	# code...
    }

    public function ConnectionProfile($id)
    {
        $user = User::with('blogs')->find($id);
        $connected = false;
        $isFriend = UserRequest::where(['user_id' => Auth::user()->id, 'to_id' => $id])->get();
        // $isFriend = UserRequest::where(['user_id' => $id, 'to_id' => Auth::user()->id])->union($isFriend)->orderBy('created_at', 'asc')->get()->toArray();

        // dd($user);
        $hasFriend = UserRequest::where(['user_id' => $id, 'status' => 'accepted'])->get();
        if(!empty($isFriend)){
            $connected = true;
        }else{
            $connected = false;
        }
        return view('user.dashboard.connectionProfile', compact('user','connected','isFriend','hasFriend'));
        # code...
    }

    public function RejectConnection($id)
    {
    	$user_id = Auth::user()->id;
    	$userConnection = UserRequest::where(['to_id' => $user_id, 'user_id' => $id])->get()->toArray();
    	// dd($userConnection);
    	// return response()->json($userConnection, 200);
    	if(!empty($userConnection)){

    		UserRequest::find($userConnection[0]['id'])->delete();

    		return response()->json(['message' => 'Request Accepted', 'status' => 'success'], 200);
    	}else{
    		return response()->json(['message' => 'Request Not Found', 'status' => 'failed'], 404);
    	}
    	# code...
    }
}
