<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\User\BlogComment;
use App\Models\User\SubComment;
use App\Models\User\BlogView;
use App\Models\User\BlogLike;
use Illuminate\Http\Request;
use App\Models\User\Blog;
use App\Models\Image;
use App\Models\User;
use Str;
use Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'forum_text' => 'required',
        ]);
        if($validate->fails()){
            return back()->withErrors($validate->errors());
        }
        $id = Auth::user()->id;
        $user = User::find(Auth::user()->id);
        $blog = new Blog;
        $blog->blog = $request->forum_text;
        $blog->slug = 'blog'.time();
        $blog->type = !empty($request->type)?$request->type:'blog';
        $blog->is_commentable = true;
        $blog->status = 'published';
        $blog->has_image = (!empty($request->timeline_img)||$request->hasFile('timeline_img')?true:false);
        $user->blogs()->save($blog);
        
        if($request->hasFile('timeline_img')){
            foreach($request->hasFile('timeline_img') as $images)
            {
                $extension = $images->extension();
                $name = Auth::user()->first_name.time().'.'.$extension;
                // dd($name);
                $path = Storage::disk('public')->putFileAs('timelines', $images, $name);
                // $path = $request->file('profile_img')->store('public/profiles');
                $image = new Image;
                $image->filename = $path;
                $image->user_id = $id;
                $blog->images()->save($image);
            }

            
        }

        if(!empty($request->timeline_img)){
            foreach($request->timeline_img as $img)
            {
                $path = $this->getImage($img);
                // dd($path);
                $image = new Image;
                $image->filename = $path;
                $image->user_id = $id;
                $blog->images()->save($image);
            }
        }
        // dd($request->all());
        
        if($request->ajax()){
                return response()->json(['message' => 'Post Created Successfully'],200);
            }else{

                return redirect()->route('dashboard');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($slug, Blog $blog)
    {
    	$blog = Blog::with(['user','blogLikes','comments' => function($subComment){
    		$subComment->where('is_sub_comment', false);
    	},'blogViews'])->where('slug', $slug)->get();

    	$commentCount = Blog::with(['comments'])->where('slug', $slug)->get();
    	$commentCount = $commentCount[0]->comments->count();

     	$user = Auth::user();
    	$blogView = BlogView::where(['user_id' => Auth::user()->id, 'blog_id' => $blog[0]->id])->get()->toArray();
    	if(empty($blogView))
    	{
    		$blogView = new BlogView;
	    	$blogView->user()->associate($user);
	    	$blogView->blog()->associate($blog[0]);
	    	$blogView->save();
    	}

    	return view('user.dashboard.blogs.blog', compact('blog','commentCount'));
    	// dd($blog);
        //

    }

    public function like(Request $request, $id)
    {
    	$blog = Blog::find($id);
    	$user = User::find(Auth::user()->id);
    	$userLike = BlogLike::where(['user_id' => Auth::user()->id, 'blog_id' => $id])->get()->toArray();
    	if(empty($userLike)){

    	$blogLike = new BlogLike;
    	$blogLike->user()->associate($user);
    	$blogLike->blog()->associate($blog);
    	$blogLike->save();
    	}
    	
    	return redirect()->route('showBlog', $request->slug);
    	# code...
    }

    public function comment(Request $request, $id)
    {
    	
    	Validator::make($request->all(),['comment' => 'required']);

    	$blog = Blog::find($id);
    	$user = User::find(Auth::user()->id);

    	$blogComment = new BlogComment;
    	$blogComment->user()->associate($user);
    	$blogComment->blog()->associate($blog);
    	$blogComment->comment = $request->comment;
    	$blogComment->save();

    	if(isset($request->parent_comment_id)){
    		
    		$parentComment = BlogComment::find($request->parent_comment_id);
    		
    		$blogComment->is_sub_comment = true;
    		$blogComment->save();
    		$subComment = new SubComment;
    		$subComment->comment()->associate($blogComment);
    		$subComment->parentcomment()->associate($parentComment);
    		$subComment->save();

    	}
    	return redirect()->route('showBlog', $request->slug);
    	# code...
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }

    public function getImage($encodedimage)
    {
        $image = $encodedimage;  // your base64 encoded
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $extension = explode(';', $encodedimage);
        $extension = explode('/', $extension[0]);
        $extension = $extension[1];
        $imageName = Str::random(10).'.'.$extension;
        // $file = file_put_contents(public_path('timelines'), base64_decode($image));
        Storage::disk('public')->put('timelines/'.$imageName, base64_decode($image));
        $path = 'timelines/'.$imageName;
        return $path;
    }
}