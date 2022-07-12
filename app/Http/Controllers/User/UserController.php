<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\User\UserProfileDetail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use App\Models\User;
use App\Models\Image;
use Hash;
use Auth;

class UserController extends Controller
{
    public function index()
    {
    	return redirect()->route('admin.dashboard');
    	# code...
    }

    public function Show()
    {
    	$id = Auth::user()->id;
    	$users = User::findOrFail($id);
        // $users->load('education');
        // dd($users->imageable);
    	return view('user.profile', compact('users'));
    	# code...
    }

    public function Update($id, Request $request, User $user)
    {
    	$id = Auth::user()->id;
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
            $name = Auth::user()->first_name.time().'.'.$extension;

            $path = Storage::disk('public')->putFileAs('profiles', $request->file('profile_img'), $name);
            // $path = $request->file('profile_img')->store('public/profiles');
            $image = new Image;
            $image->filename = $path;
            $image->user_id = $id;
            $user->imageable()->save($image);

            $user->profile_img = $path;
        }

    	$user->first_name = $request->first_name;
    	$user->last_name = $request->last_name;
    	$user->email = $request->email;
    	$user->phone = $request->phone;
        $user->country = $request->country;
        $user->date_of_birth = $request->date_of_birth;
        $user->secret_question = $request->secret_question;
        $user->secret_answer = $request->secret_answer;
        $user->profile_visibility = $request->profile_visibility;
        $user->profile_status = $request->profile_status;
    	$user->bio_description = $request->bio_description;
    	$user->city = $request->city;
    	$user->state = $request->state;
    	$user->zip_code = $request->zip_code;
    	$user->save();

    	return redirect()->back()->with('message' , 'Record Updated Successfully');
    	# code...
    }

    public function AddEducation(Request $request)
    {
        $id = Auth::user()->id;
        $validate = Validator::make($request->all(), [
                        'degree_title' => 'required',
                        'degree_name' => 'required',
                        'college_name' => 'required'
                    ]);
        if($validate->fails())
        {
            return response()->json(['message' => 'Fill all the fields '], 404);
        }

        $education = new UserProfileDetail;
        $education->degree_title = $request->degree_title;
        $education->degree_name = $request->degree_name;
        $education->name = $request->college_name;
        $education->position = $request->position;
        $education->address = empty($request->edu_address)?'':$request->edu_address;
        $education->country = empty($request->edu_country)?'':$request->edu_country;
        $education->state = empty($request->edu_state)?'':$request->edu_state;
        $education->city = empty($request->edu_city)?'':$request->edu_city;
        $education->zipcode = empty($request->edu_zipcode)?'':$request->edu_zipcode;
        $education->type = $request->type;
        $education->user_id = $id;
        Auth::user()->education()->save($education);
        $education->save();

        return response()->json(['message' => 'Successfully Added','eduId' => $education->id, 'education' => $education], 200);

        // dd($request->all());
        # code...
    }

    public function UpdateEducation(Request $request, $id, $eduId)
    {
        $education = UserProfileDetail::find($eduId);
        $education->degree_title = $request->degree_title;
        $education->degree_name = $request->degree_name;
        $education->name = $request->college_name;
        $education->position = $request->position;
        $education->address = empty($request->edu_address)?'':$request->edu_address;
        $education->country = empty($request->edu_country)?'':$request->edu_country;
        $education->state = empty($request->edu_state)?'':$request->edu_state;
        $education->city = empty($request->edu_city)?'':$request->edu_city;
        $education->zipcode = empty($request->edu_zipcode)?'':$request->edu_zipcode;
        $education->type = $request->type;
        $education->save();

        return response()->json(['message' => 'Successfully Added','eduId' => $education->id, 'education' => $education], 200);
        // dd($eduId);
        # code...
    }

    public function AddWorkHistory(Request $request)
    {
        $id = Auth::user()->id;
        $validate = Validator::make($request->all(), [
                        'work_title' => 'required',
                        'work_comp_name' => 'required'
                    ]);
        if($validate->fails())
        {
            return response()->json(['message' => 'Fill all the fields '], 500);
        }

        $workHistory = new UserProfileDetail;
        $workHistory->degree_title = $request->work_title;
        $workHistory->name = $request->work_comp_name;
        $workHistory->position = $request->position;
        $workHistory->address = empty($request->work_address)?'':$request->work_address;
        $workHistory->country = empty($request->work_country)?'':$request->work_country;
        $workHistory->state = empty($request->work_state)?'':$request->work_state;
        $workHistory->city = empty($request->work_city)?'':$request->work_city;
        $workHistory->zipcode = empty($request->work_zipcode)?'':$request->work_zipcode;
        $workHistory->type = $request->type;
        $workHistory->user_id = $id;
        Auth::user()->workHistory()->save($workHistory);
        $workHistory->save();

        return response()->json(['message' => 'Successfully Added','workId' => $workHistory->id, 'workHistory' => $workHistory], 200);

        // dd($request->all());
        # code...
    }

    public function UpdateworkHistory(Request $request, $id, $eduId)
    {
        $workHistory = UserProfileDetail::find($eduId);
        $workHistory->degree_title = $request->work_title;
        $workHistory->name = $request->work_comp_name;
        $workHistory->position = $request->position;
        $workHistory->address = empty($request->work_address)?'':$request->work_address;
        $workHistory->country = empty($request->work_country)?'':$request->work_country;
        $workHistory->state = empty($request->work_state)?'':$request->work_state;
        $workHistory->city = empty($request->work_city)?'':$request->work_city;
        $workHistory->zipcode = empty($request->work_zipcode)?'':$request->work_zipcode;
        $workHistory->type = $request->type;
        $workHistory->save();

        return response()->json(['message' => 'Successfully Added','workId' => $workHistory->id, 'workHistory' => $workHistory], 200);
        // dd($eduId);
        # code...
    }

    public function AddSkills(Request $request)
    {
        $id = Auth::user()->id;
        $skills_arr = array();
        // dd($request->skills);
        if(sizeof($request->skills) != 0 )
        {
            foreach ($request->skills as $skill) {
                $skills = new UserProfileDetail;
                $skills->name = $skill;
                $skills->position = $request->position;
                $skills->type = $request->type;
                $skills->user_id = $id;
                Auth::user()->skills()->save($skills);
                $skills->save();

                $skills_arr[] = $skills;
            }

            return response()->json(['message' => 'Successfully Added','workId' => $skills->id, 'skills' => $skills_arr], 200);
        }else{
            return response()->json(['message' => 'Add Skils First '], 500);
        }

        // dd($request->all());
        # code...
    }

    public function AddPoliticalPreferences(Request $request)
    {
        $id = Auth::user()->id;
        $validate = Validator::make($request->all(), [
                        'party' => 'required',
                        'party_desc' => 'required'
                    ]);
        if($validate->fails())
        {
            return response()->json(['message' => 'Fill all the fields '], 500);
        }

        $political_Preferences = new UserProfileDetail;
        $political_Preferences->degree_title = $request->party_desc;
        $political_Preferences->name = $request->party;
        $political_Preferences->position = $request->position;
        $political_Preferences->type = $request->type;
        $political_Preferences->user_id = $id;
        Auth::user()->political_Preferences()->save($political_Preferences);
        $political_Preferences->save();

        return response()->json(['message' => 'Successfully Added','workId' => $political_Preferences->id, 'political_Preferences' => $political_Preferences], 200);

        // dd($request->all());
        # code...
    }

    public function UpdatePoliticalPreferences(Request $request, $id, $eduId)
    {
        $political_Preferences = UserProfileDetail::find($eduId);
        $political_Preferences->degree_title = $request->party_desc;
        $political_Preferences->name = $request->party;
        $political_Preferences->position = $request->position;
        $political_Preferences->type = $request->type;
        $political_Preferences->save();

        return response()->json(['message' => 'Successfully Added','workId' => $political_Preferences->id, 'political_Preferences' => $political_Preferences], 200);
        // dd($eduId);
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
