@extends('layouts.dashboard')
@section('content')
<section class="pb-3">
    <div class="container">
        <div class="d-flex align-items-end cover_wrapper">
          @if($user->profile_img)
            <img class="ms-5 profile_img" src="{{asset('storage/'.$user->profile_img)}}" alt="">
          @else
            <img class="ms-5 profile_img" src="{{asset('assets/images/profile/Rectangle 48.png')}}" alt="">
          @endif
            <div class="ps-3 pb-3">
                <div class="heading_3 text_color--green">{{ $user->first_name }}</div>
                <div class="text_size-24 text_color--green font_weight--500">{{ $user->last_name }}</div>
            </div>
        </div>
    </div>
</section>
<section class="mb-5">
  <div class="container">
      <div class="row">
          <div class="col-lg-6 col-md-12 col-sm-12">
              <div class="profile_edit-bar mb-4">
                  <div class="d-flex align-items-center justify-content-between">
                      <div class="d-flex">
                          <div class="text_size-24 me-3">Update Info</div>
                          <div class="text_size-24 ps-3 border_start">Activity Log</div>
                      </div>
                      <div>
                          <img class="mx-3" src="{{asset('assets/images/profile/Group 337.png')}}" alt="">
                          <img class="mx-3" src="{{asset('assets/images/profile/Group 339.png')}}" alt="">
                          <img class="mx-3" src="{{asset('assets/images/profile/Group 341.png')}}" alt="">
                      </div>
                  </div>
              </div>
              <div class="row mb-3">
                  <div class="col-lg-6 col-md-12 col-sm-12 dashboard-left">
                      <a href="{{ route('dashboard') }}">
                            <div class="d-flex align-items-center mb-3">
                                <img class="dashboard_icon me-2" src="{{ asset('assets/images/Category.png')}}" alt="">
                                <div class="dash_heading">Dashboard</div>
                            </div>
                        </a>
                        <div class="d-flex align-items-center mb-3">
                            <img class="dashboard_icon me-2" src="{{ asset('assets/images/Chart.png')}}" alt="">
                            <div class="dash_heading">Investment Calculator</div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <img class="dashboard_icon me-2" src="{{ asset('assets/images/Activity.png')}}" alt="">
                            <div class="dash_heading">Stocks Update</div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <img class="dashboard_icon me-2" src="{{ asset('assets/images/Swap.png')}}" alt="">
                            <div class="dash_heading">Economy Updates</div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <img class="dashboard_icon me-2" src="{{ asset('assets/images/Home.png')}}" alt="">
                            <div class="dash_heading">Real Estate</div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <img class="dashboard_icon me-2" src="{{ asset('assets/images/Document.png')}}" alt="">
                            <div class="dash_heading">News & Updates</div>
                        </div>
                  </div>
                  <div class="col-lg-6 col-md-12 col-sm-12">
                      <div class="about_box mb-4">
                          <div class="text_size-24 text_color--green mb-2">ABOUT YOUR Profile</div>
                          <div>
                              {{ $user->bio_description }}
                          </div>
                      </div>
                      <div class="about_box">
                          <div class="text_size-24 text_color--green mb-2">FRIENDS</div>
                          <div class="row mb-3">
                            @if($user->connected)
                            @foreach($user->connected as $friend)
                            @if($friend->user->profile_visibility == 'public')
                              <div class="col-lg-4 col-md-4 col-sm-6">
                                  @if($friend->user->profile_img)
                                  <img class="rounded w-100" src="{{asset('storage/'.$friend->user->profile_img)}}" alt="">
                                  @else
                                  <img class="rounded w-100" src="{{asset('assets/images/profile/Rectangle 185.png')}}" alt="">
                                  @endif
                                  <div class="my-2 text_size-12">{{ $friend->user->getFullName() }}</div>
                              </div>
                              @elseif($friend->user->profile_visibility == 'friends-of-friend' && $connected = true)
                              <div class="col-lg-4 col-md-4 col-sm-6">
                                  @if($friend->user->profile_img)
                                  <img class="rounded w-100" src="{{asset('storage/'.$friend->user->profile_img)}}" alt="">
                                  @else
                                  <img class="rounded w-100" src="{{asset('assets/images/profile/Rectangle 185.png')}}" alt="">
                                  @endif
                                  <div class="my-2 text_size-12">{{ $friend->user->getFullName() }}</div>
                              </div>
                              @elseif($friend->user->profile_visibility == 'friends-only' && $connected = true)
                              <div class="col-lg-4 col-md-4 col-sm-6">
                                  @if($friend->user->profile_img)
                                  <img class="rounded w-100" src="{{asset('storage/'.$friend->user->profile_img)}}" alt="">
                                  @else
                                  <img class="rounded w-100" src="{{asset('assets/images/profile/Rectangle 185.png')}}" alt="">
                                  @endif
                                  <div class="my-2 text_size-12">{{ $friend->user->getFullName() }}</div>
                              </div>
                              @endif
                              @endforeach
                              @endif
                          </div>
                      </div>
                  </div>
              </div>
              <div class="about_box mb-3">
                  <div class="text_size-24 text_color--green mb-2">Recent Forums</div>
                  @if($user->blogs)
                  @foreach($user->blogs as $blog)
                  <div class="d-flex align-items-center justify-content-between mb-4">
                      <div class="d-flex align-items-center">
                          @if($blog->user->profile_img)
                          <img class="me-2" src="{{asset('storage/'.$blog->user->profile_img)}}" alt="">
                          @else
                          <img class="me-2" src="{{asset('assets/images/profile/Rectangle 88.png')}}" alt="">
                          @endif
                          <div class="">
                              <div class="text_size-16 text_color--green fw-bold">{{ $blog->user->getFullName() }}</div>
                              <div>{!! $blog->blog !!}</div>
                          </div>
                      </div>
                      <div class="d-flex flex-column align-items-center">
                          <img class="mb-2" src="{{asset('assets/images/profile/Group 328.png')}}" alt="">
                          <div class="text-size-12">{{ $blog->created_at->diffForHumans() }}</div>
                      </div>
                  </div>
                  @endforeach
                  @endif
              </div>
              <div class="about_box mb-3">
                  <div class="d-flex align-items-center justify-content-between">
                      <div class="text_size-24 text_color--green">Images</div>
                      <div class="text_size-24 text_color--green">See All</div>
                  </div>
                  <div class="row">
                    @if($user->imageable)
                    @foreach($user->imageable as $image)
                      <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                          <img class="w-100" src="{{asset('storage/'.$image->filename)}}" alt="">
                      </div>
                      @endforeach
                      @endif
                    @if($user->posts)
                    @foreach($user->posts as $post)
                    @if($post->images)
                    @foreach($post->images as $image)
                      <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                          <img class="w-100" src="{{asset('storage/'.$image->filename)}}" alt="">
                      </div>
                      @endforeach
                      @endif
                      @endforeach
                      @endif
                  </div>
              </div>
          </div>
          <div class="col-lg-6 col-md-12 col-sm-12">
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
              @if($user->posts)
              @foreach($user->posts as $post)
              <div class="timeline_box mb-3">
                  <div class="d-flex align-items-end mb-4">
                      <div class="pe-3">
                        @if($post->user->profile_img)
                          <img src="{{ asset('storage/'.$post->user->profile_img) }}" alt="" style="width:70px; height:70px;" class="rounded-circle">
                          @else
                          <img src="{{ asset('assets/images/timeline/Rectangle 185.png') }}" alt="">
                          @endif
                      </div>
                      <div>
                          <div class="text_size-24 font_weight--500">{{$post->user->getFullName()}}</div>
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
              @endif
          </div>
      </div>
  </div>
</section>
<script>
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
      let forum_text = $("#post").text();
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