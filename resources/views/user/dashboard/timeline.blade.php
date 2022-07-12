@extends('layouts.dashboard')
@section('content')
<div class="col-lg-6 col-md-12 col-sm-12 ps-3">
    <div class="timeline_box mb-3">
        <div class="d-flex align-items-center justify-content-start mb-3">
            <div class="pe-3">
            	@if(Auth::user()->profile_img)
                <img src="{{ asset('storage/'.Auth::user()->profile_img) }}" alt="" style="width:70px; height:70px;">
                @else
                <img src="{{asset('assets/images/user_img.png')}}" alt="">
                @endif
            </div>
                <input type="file" id="file" name="file[]" class="d-none" multiple>
            <div class="d-flex align-items-center top_icon-wrap p-2 photo-videos">
                <img class="w-24 me-2" src="{{asset('assets/images/timeline/Group 274.png')}}" alt="">
                <div>Photo/Videos</div>
            </div>
            <div class="d-flex align-items-center top_icon-wrap p-2">
                <img class="w-24 me-2" src="{{asset('assets/images/timeline/Group 278.png')}}" alt="">
                <div>Emojis/Emotions</div>
            </div>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
        	<div class="gallery mb-4"></div>
        	<div class="error text-danger"></div>
            <textarea name="textarea" class="topbar_textarea" id="post" cols="30" rows="10"></textarea>
            <div class="d-flex">
            	<button type="button" class="btn green_profile-btn w-100 createPost">Create Post</button>
            </div>
        </form>
    </div>
    
    @if(!empty($users))
    @foreach($users as $user)
    @foreach($user->user->posts as $post)
    
    <div class="timeline_box mb-3">
        <div class="d-flex align-items-end mb-4">
            <div class="pe-3">
            	@if($user->user->profile_img)
                <img src="{{ asset('storage/'.$user->user->profile_img) }}" alt="" style="width:70px; height:70px;" class="rounded-circle">
                @else
                <img src="{{ asset('assets/images/timeline/Rectangle 185.png') }}" alt="">
                @endif
            </div>
            <div>
                <div class="text_size-24 font_weight--500">{{$user->user->getFullName()}}</div>
                <div class="d-flex align-items-center">
                    <div class="me-2">{{$post->created_at->diffForHumans()}}</div>
                    <img src="{{asset('assets/images/timeline/Group 283.png')}}" alt="">
                </div>
            </div>
        </div>
        <div class="text_size-16 mb-2">{!! $post->blog !!}</div>
        @if($post->images)
        <div class="post_images">
        @foreach($post->images as $image)
        <img class="mb-2 " style="width: 102px;" src="{{ asset('storage/'.$image->filename) }}" alt="">
        @endforeach
        </div>
        @endif
        <div class="d-flex align-items-center mb-3">
            <img src="{{asset('assets/images/timeline/thumbs-down.png')}}" alt="">
            @if(count($post->blogLikes) > 0)
            <div>{{ $post->blogLikes[0]->user->first_name }} and {{ count($post->blogLikes) }} Others</div>
            @else
            <div>John and {{ count($post->blogLikes) }} Others</div>
            @endif
        </div>
        <div class="d-flex align-items justify-content-around like_box-wrapper mb-3">
            <div class="d-flex align-items-center">
                <form action="{{ route('blogLike', $post->id) }}" method="post">
	    			@csrf
	    			<input type="hidden" name="slug" value="{{ $post->slug }}">
	    			<button type="submit" class="btn d-flex bg-transparent text-white">
                	<img class="w-100 me-2" src="{{asset('assets/images/timeline/Group 286.png')}}" alt="">
	    				<div class="text_size-24">Like</div>		
	    			</button>
	    		</form>
                <!--  -->
            </div>
            <div class="d-flex align-items-center">
                <button onclick="$('.comment').toggleClass('d-none');" class="d-flex bg-transparent btn text-white">	
                <img class="w-100 me-2" src="{{asset('assets/images/timeline/Group 287.png')}}" alt="">
                <div class="text_size-24">Comment</div>
                </button>
            </div>
            <div class="d-flex align-items-center">
                <img class="w-100 me-2" src="{{asset('assets/images/timeline/Group 291.png')}}" alt="">
                <div class="text_size-24">Share</div>
            </div>
        </div>
        @if(count($post->comments))
        @foreach($post->comments as $comment)
        <div class="d-flex align-items-center mb-2">
        	<!-- <small>{{ $comment->user->first_name }}</small> -->
            @if($comment->user->profile_img)
            <img class="me-2" style="width: 54px; height: 54px" src="{{ asset('storage/'.$comment->user->profile_img) }}" alt="">
            @else
            <img class="me-2" src="{{asset('assets/images/user_img.png')}}" alt="">
            @endif
            <div>
            	<h6 class="mb-0">{{ $comment->user->getFullName() }}</h6>
          		<small class="me">{{ $comment->created_at->diffForHumans() }}</small>
          		<p>{{ $comment->comment }}</p>
          	</div>
        </div>
        @endforeach
        @endif
        <div class="d-flex align-items-center comment d-none">
            <img class="me-2" src="{{asset('assets/images/user_img.png')}}" alt="">
            <form action="{{ route('blogComment', $post->id) }}" method="post" class="w-100">
            	@csrf
		    	<input type="hidden" name="slug" value="{{ $post->slug }}">
                <div class="input-group flex-nowrap comment_input">
                    <input type="text" class="form-control" placeholder="Username" name="comment" aria-label="Username" aria-describedby="addon-wrapping">
                    <span class="input-group-text" id="addon-wrapping">
                        <img src="{{asset('assets/images/timeline/Group 328.png')}}" alt="">
                    </span>
                    <span class="input-group-text" id="addon-wrapping">
                        <img src="{{asset('assets/images/timeline/Group 332.png')}}" alt="">
                    </span>
                    <span class="input-group-text pe-2 p-0 m-0" id="addon-wrapping">
                        <button type="submit" class="btn bg-transparent"><i class="fa fa-arrow-circle-right fs-4 text_color--green"></i></button>
                    </span>
                </div>
            </form>
        </div>
    </div>
    @endforeach
    @endforeach
    @endif

</div>
<div class="col-lg-3 col-md-12 sticky col-sm-12 px-0 h-100">
    <div class="">
        <div class="forum_right font_family--kanit mb-3">
            <div class="d-flex align-items-center justify-content-between mb-2">
                <div class="text_size-24 text_color--green">Forums</div>
                <div class="paragraph_medium text_color--green">View All</div>
            </div>
            <div class="single_forum-small">
            	@if(!empty($users))
            	@foreach($users as $user)
                @foreach($user->user->blogs as $blog)
                <div class="text_size-14 text_color--green mb-2">
                    {{$user->user->first_name}}
                </div>
                <div class="text_size-14 font_weight--300">
                    {!! $blog->blog !!}
                </div>
				@endforeach
				@endforeach
				@endif
            </div>
        </div>
        <div class="forum_right font_family--kanit">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <div class="text_size-24 text_color--green">Latest News &<br>Updates</div>
                <div class="paragraph_medium text_color--green">View All</div>
            </div>
            <div class="single_forum">
                <div class="d-flex mb-2 font_weight--300">
                    <img class="blog_img me-2" src="{{asset('assets/images/blog_1-img.png')}}" alt="">
                    <div>
                        <div class="text_size-16">
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr.
                        </div>
                        <div class="text_size-16">
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr.
                        </div>
                    </div>
                </div>
                <div class="d-flex mb-2 font_weight--300">
                    <img class="blog_img me-2" src="{{asset('assets/images/blog_2-img.png')}}" alt="">
                    <div>
                        <div class="text_size-16">
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr.
                        </div>
                        <div class="text_size-16">
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr.
                        </div>
                    </div>
                </div>
                <div class="d-flex mb-2 font_weight--300">
                    <img class="blog_img me-2" src="{{asset('assets/images/blog_3-img.png')}}" alt="">
                    <div>
                        <div class="text_size-16">
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr.
                        </div>
                        <div class="text_size-16">
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#post').summernote({
            height: 250,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: false,                 // set focus to editable area after initializing summernote
            disableDragAndDrop: true,
            toolbar: []
            
        });
        // $('.note-editing-area').css('background','#fff');
        // $('.note-editable p').css('color','#000');

    });
    $('.photo-videos').click(function() {
    	$('#file').trigger('click');
    	/* Act on the event */
    });

    $(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                	let html = `<div style="position: relative;">
								  <img src="${event.target.result}" />
								  <span id="overlay_text" onclick="$(this).parent().remove()" style="position: absolute; top: 0; left: 80%"><i class="fa fa-trash-alt text-danger"></i></span>
								</div>`;
								$(placeToInsertImagePreview).append(html)
                    
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#file').on('change', function() {
        imagesPreview(this, 'div.gallery');
    });
});

    $('.createPost').click(()=>{
    	let forum_text = $($("#post").summernote("code")).text();
    	let images = $('.gallery img');
    	let timeline_img = [];
    	$(images).each(function(index, el) {
    		timeline_img.push($(el).attr('src'))
    	});
    	if(forum_text == '' || forum_text == undefined)
    	{
    		$('.error').append('<p class="text-danger">Enter Post Details.</p>')
    		return false;
    	}
    	// console.log(timeline_img);
    	// console.log(forum_text);
    	// return false;
    	$.ajax({
    		url: `{{ route('saveBlog') }}`,
    		type: 'POST',
    		headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
    		data: {forum_text: forum_text, timeline_img: timeline_img, type: 'post'},
    	})
    	.done(function(resp) {
    		console.log(resp);
    		console.log("success");
    	})
    	.fail(function() {
    		console.log("error");
    	})
    	.always(function() {
    		console.log("complete");
    	});
    	
    })
</script>
@endsection