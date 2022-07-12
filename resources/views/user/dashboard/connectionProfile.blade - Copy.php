@extends('layouts.dashboard')
@section('content')
<style type="text/css">
  .gradient-custom-2 {
/* fallback for old browsers */
background: #fbc2eb;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, rgba(251, 194, 235, 1), rgba(166, 193, 238, 1));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, rgba(251, 194, 235, 1), rgba(166, 193, 238, 1))
}
</style>
<div class="col col-lg-9 col-xl-7">
        <div class="card">
          <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
            <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
              @if(!empty($user->profile_img))
              <img src="{{asset('storage/'.$user->profile_img)}}" alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2" style="width: 150px; z-index: 1">
              @else
              <img src="{{asset('assets/images/user_img.png')}}" alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2" style="width: 150px; z-index: 1">
                @endif
                @if(count($isFriend) > 0)
                @if($isFriend->status == 'accepted')
                <button type="button" class="btn btn-outline-dark" data-mdb-ripple-color="dark"
                  style="z-index: 1;">
                  Connected
                </button>
                @elseif($isFriend->status == 'waiting')
                <button type="button" class="btn btn-outline-dark" data-mdb-ripple-color="dark"
                  style="z-index: 1;">
                  Waiting for Approval
                </button>
                @endif
              @else
              <button type="button" class="btn btn-outline-dark" data-mdb-ripple-color="dark"
                style="z-index: 1;">
                Send Connection
              </button>
              @endif
            </div>
            <div class="ms-3" style="margin-top: 130px;">
              <h5>{{ $user->first_name.' '.$user->last_name }}</h5>
              <p>{{ $user->country }}</p>
              
            </div>
          </div>
          <div class="p-4 text-black" style="background-color: #f8f9fa;">
            <div class="d-flex col-sm-12 justify-content-end text-center py-1" style="color: #000">
              <div>
                <p class="mb-1 h5">{{ count($hasFriend) }}</p>
                <p class="small text-muted mb-0">Connections</p>
              </div>
              <div class="px-3">
                <p class="mb-1 h5">{{ count($user->blogs) }}</p>
                <p class="small text-muted mb-0">Forums</p>
              </div>
              <!-- <div>
                <p class="mb-1 h5">478</p>
                <p class="small text-muted mb-0">Following</p>
              </div> -->
            </div>
          </div>
          <div class="card-body p-4 text-black" style="color: #000">
            <div class="mb-5">
              <p class="lead fw-normal mb-1">About</p>
              <div class="p-4" style="background-color: #f8f9fa;">
                <p class="font-italic mb-1"><i class="fa fa-envelope fa-1x me-1"></i>Email: {{ $user->email }}</p>
                <p class="font-italic mb-1"><i class="fa fa-phone-alt fa-1x me-1"></i>Phone: {{ $user->phone }}</p>
                <p class="font-italic mb-1"><i class="fa fa-map-marker-alt fa-1x me-1"></i>Lives in:
                @if($user->state)
                {{ $user->state }}
                @endif
                @if($user->country)
                {{ $user->country }}
                @endif
                @if($user->city)
                {{ $user->city }}
                @endif
                </p>
              </div>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-4">
              <p class="lead fw-normal mb-0">Recent Forums</p>
              <p class="mb-0"><a href="#!" class="text-muted">Show all</a></p>
            </div>
            <div class="row g-2">
              @foreach($user->blogs as $blog)
              <div class="col mb-2">
                <div class="card text-center">
                  <h4 class="card-title">{{$blog->slug}}</h4>
                  <h4 class="card-title">{{$blog->created_at->diffForHumans()}}</h4>
                  <div class="card-body">
                    {!! $blog->blog !!}
                    <a href="{{ route('showBlog', $blog->slug) }}" class="btn btn-primary">View Forum</a>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>

@endsection