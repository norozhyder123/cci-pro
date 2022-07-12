@extends('layouts.dashboard')
@section('content')
<div class="col-lg-9 col-md-12 col-sm-12 ps-3">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <div class="text_size-24 font_weight--500">Connections</div>
    </div>
    <div class="mb-3 you_know ms-2 p-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="text_size-16 font_weight--500">People you may know</div>
        </div>
        <div class="row people_you-know justify-content-start mb-2">
            @foreach($connections as $connection)
            <div class="col-3 connectivity px-0 m-2">
                @if(!empty($connection->profile_img))
                <img src="{{asset('storage/'.$connection->profile_img)}}" style="width: 290px; height: 185px;" alt="">
                @else
                <img src="{{asset('assets/images/person_1.png')}}" class="w-100" alt="">
                @endif

                <div class="d-flex justify-content-between align-items-center px-2 my-2 w-100">
                    <div class="text_size-12">{{$connection->getFullName()}}</div>
                    <img src="{{asset('assets/images/Iconly-Bulk-Send.png')}}" alt="" data-url="{{ route('send.request', $connection->id) }}" onclick="sendRequest({{ $connection->id }}, this)">
                </div>
                <div class="text_size-12 font_color-black font_weight--300 px-2 mb-3">
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                </div>
                <a class="green_profile-btn text-center" href="{{ route('connectionProfile', $connection->id) }}">View Profile</a>
            </div>
            @endforeach
            @foreach($friendsoffriends as $connection)
            <div class="col-3 connectivity px-0 m-2">
                @if(!empty($connection->profile_img))
                <img src="{{asset('storage/'.$connection->profile_img)}}" style="width: 290px; height: 185px;" alt="">
                @else
                <img src="{{asset('assets/images/person_1.png')}}" class="w-100" alt="">
                @endif

                <div class="d-flex justify-content-between align-items-center px-2 my-2 w-100">
                    <div class="text_size-12">{{$connection->getFullName()}}</div>
                    <img src="{{asset('assets/images/Iconly-Bulk-Send.png')}}" alt="" data-url="{{ route('send.request', $connection->id) }}" onclick="sendRequest({{ $connection->id }}, this)">
                </div>
                <div class="text_size-12 font_color-black font_weight--300 px-2 mb-3">
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                </div>
                <a class="green_profile-btn text-center" href="{{ route('connectionProfile', $connection->id) }}">View Profile</a>
            </div>
            @endforeach
        </div>
    </div>
    <div class="mb-3 you_know ms-2 p-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="text_size-16 font_weight--500">My Connections</div>
        </div>
        <div class="row people_you-know justify-content-start mb-2">
            @foreach($connected as $connect)
            <div class="col-3 connectivity px-0 m-2">
                @if(!empty($connect->user->profile_img))
                <img src="{{asset('storage/'.$connect->user->profile_img)}}" style="width: 290px; height: 185px;" alt="">
                @else
                <img src="{{asset('assets/images/person_1.png')}}" class="w-100" alt="">
                @endif
                    <div class="p-2">
                        <div class="text_size-12">{{$connect->user->getFullName()}}</div>
                    </div>
                    <div class="d-flex justify-content-end align-items-center px-2 my-2 w-100">
                    @if($connect->status == 'waiting')
                    <small class="text-capitalize">Waiting For Approval</small>
                    @else
                    <small class="text-capitalize">{{$connect->status}}</small>
                    @endif
                </div>
                <div class="text_size-12 font_color-black font_weight--300 px-2 mb-3">
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                </div>
                <a class="green_profile-btn text-center" href="{{ route('connectionProfile', $connect->user->id) }}">View Profile</a>
            </div>
            @endforeach
        </div>
    </div>

    <div class="mb-3 you_know ms-2 p-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="text_size-16 font_weight--500">My Incoming Requests</div>
        </div>
        <div class="row people_you-know justify-content-start mb-2">
            @foreach($requests as $connect)
            <div class="col-3 connectivity px-0 m-2">
                @if(!empty($connect->users->profile_img))
                <img src="{{asset('storage/'.$connect->users->profile_img)}}" style="width: 290px; height: 185px;" alt="">
                @else
                <img src="{{asset('assets/images/person_1.png')}}" class="w-100" alt="">
                @endif
                <div class="p-2">
                    <div class="text_size-12">{{$connect->users->getFullName()}}</div>
                </div>
                    <div class="d-flex justify-content-between align-items-center px-2 my-2 w-100">
                    @if($connect->status == 'waiting')
                    <button class="green_profile-btn" data-url="{{ route('approve.request', $connect->users->id) }}" onclick="approveRequest({{ $connect->users->id }}, this)">Approve</button>
                    <button class="green_profile-btn" data-url="{{ route('reject.request', $connect->users->id) }}" onclick="rejectRequest({{ $connect->users->id }}, this)">Reject</button>

                    @else
                    <small>{{$connect->status}}</small>
                    @endif
                </div>
                <div class="text_size-12 font_color-black font_weight--300 text-center px-2 mb-3">
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                </div>
                <a class="green_profile-btn text-center" href="{{ route('connectionProfile', $connect->users->id) }}">View Profile</a>
            </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    function sendRequest(id, data) {
        $.ajax({
                url: `${$(data).attr('data-url')}`,
                type: 'GET',
                data: {
                    from_id: id
                },
            })
            .done(function(resp) {
                $(data).parents('.connectivity').remove();
                console.log(resp);
                console.log("success");
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });

    }

    function approveRequest(id, data) {
        $.ajax({
                url: `${$(data).attr('data-url')}`,
                type: 'GET',
                data: {
                    from_id: id
                },
            })
            .done(function(resp) {
                $(data).parents('.connectivity').remove();
                console.log(resp);
                console.log("success");
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });

    }

    function rejectRequest(id, data) {
        $.ajax({
                url: `${$(data).attr('data-url')}`,
                type: 'GET',
                data: {
                    from_id: id
                },
            })
            .done(function(resp) {
                $(data).parents('.connectivity').remove();
                console.log(resp);
                console.log("success");
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });

    }
</script>
@endsection