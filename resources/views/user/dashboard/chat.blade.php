@extends('layouts.dashboard')
@section('content')
<div class="col-lg-9 col-md-12 col-sm-12 ps-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="text_size-24 font_weight--500">Favorite Connections</div>
                        </div>
                        <div class="mb-3 ms-3">
                            <div class="row mb-2">
                                @foreach($users as $user)
                                <div class="col d-flex align-items-center fav_conn py-2" data-uid="{{ $user->user->id }}">
                                    @if(!empty($user->user->profile_img))
                                    <img src="{{asset('storage/'.$user->user->profile_img)}}" class="me-2" alt="">
                                    @else
                                    <img src="{{asset('assets/images/person_1.png')}}" class="me-2" alt="">
                                    @endif
                                    <div class="text_size-12 userName" data-userStatus="{{$user->status}}">{{$user->user->getFullName()}}</div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="chat_wrapper ms-0 row">
                            <div class="people-list col-lg-4 px-0">
                                <div class="search">
                                    <div class="text_size-24 font_weight--500">All Chats</div>
                                    <img src="./assets/images/Iconly-Bulk-Search.png" alt="">
                                </div>
                                <ul class="list">
                                    @foreach($users as $user)
                                    <li class="clearfix" data-user-id="{{$user->user->id}}" data-my-id="{{ Auth::user()->id }}">
                                        @if(!empty($user->user->profile_img))
                                        <img src="{{asset('storage/'.$user->user->profile_img)}}" class="width-54" alt="avatar" />
                                        @else
                                        <img src="{{asset('assets/images/person_1.png')}}" class="width-54" alt="">
                                        @endif
                                        <div class="about">
                                            <div class="name">{{$user->user->getFullName()}}</div>
                                            <div class="status text-capitalize" data-user-status="{{$user->user->profile_status}}">{{$user->user->profile_status}}</div>
                                        </div>
                                    </li>
                                     @endforeach
                                </ul>
                            </div>

                            <div class="chat col-lg-8 px-0">
                                <div class="chat-header">
                                    <div>
                                        <img src="./assets/images/Rectangle 78.png" alt="avatar" />
                                        <div class="chat-about">
                                            <div class="chat-with">Emilie Wilkinson</div>
                                            <div class="chat-num-messages">Active</div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <img class="me-3 w-26" src="./assets/images/Iconly-Bulk-Calling.png" alt="avatar" />
                                        <img class="me-3" src="./assets/images/Video.png" alt="avatar" />
                                        <img class="w-26" src="./assets/images/Iconly-Bulk-More Square.png" alt="avatar" />
                                    </div>
                                </div>
                                <!-- end chat-header -->

                                <div class="chat-history" data-uuid="">
                                    <ul class="ps-3">
                                        
                                    </ul>
                                </div>
                                <!-- end chat-history -->
                                <div class="chat-message d-none">
                                    <input name="message-to-send" class="sendinput" placeholder="Type message" rows="3"></input>
                                    <div class="d-flex align-items-center">
                                        <img class="me-2" src="./assets/images/Iconly-Bulk-Paper Plus.png" alt="">
                                        <button onclick="sendMsg(this)"><img src="./assets/images/Iconly-Bulk-Send.png" alt=""></button>
                                    </div>
                                </div>
                                <!-- end chat-message -->

                            </div>
                        </div>
</div>
<script src="https://unpkg.com/peerjs@1.3.2/dist/peerjs.min.js"></script>
<script>
    var peer = new Peer(`coreInvest_{{Auth::user()->id}}`);
    var conn;
        peer.on('open', function(id) {
            console.log('My peer ID is: ' + id);
        });

        peer.on('connection', function(conn) { 
            conn.on('data', function(data) {
              // console.log('Received', data);
                let html = `<li class="d-block">
                            <div class="message my-message">
                                ${data}
                            </div>
                        </li>`;
                        // console.log($('.chat-history').attr('data-uuid'));
                        let peerIDs = $('.chat-history').attr('data-uuid');
                        if(peerIDs != undefined && peerIDs != ''){

                        $('.chat-history ul').append(html);
                        $('.chat-history').animate({
                            scrollTop: $('.chat-history')[0].scrollHeight
                          }, 1000);
                        }
                
            });
           
        });

    $('li.clearfix').on('click', (e)=>{
        let clcicked = $(e)[0].currentTarget;
        let chat_html = `<div>
                            <img src="${$(clcicked).find('img').attr('src')}" alt="avatar" class="width-54">
                            <div class="chat-about">
                                <div class="chat-with" data-userid="${$(clcicked).attr('data-user-id')}">${$(clcicked).find('.name').html()}</div>
                                <div class="chat-num-messages">${$(clcicked).find('.status').attr('data-user-status')}</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <img class="me-3 w-26" src="./assets/images/Iconly-Bulk-Calling.png" alt="avatar">
                            <img class="me-3" src="./assets/images/Video.png" alt="avatar">
                            <img class="w-26" src="./assets/images/Iconly-Bulk-More Square.png" alt="avatar">
                        </div>`;
        $('.chat .chat-header').html(chat_html);
        $('.chat-history').attr('data-uuid',$(clcicked).attr('data-user-id'))
        $('.chat .chat-message').removeClass('d-none');
        conn = peer.connect('coreInvest_'+$(clcicked).attr('data-user-id'));
        
        peer.on('error', function(err){
            console.log('error');
        });
        $.ajax({
            url: '{{route("getMessage")}}',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            data: {user_id: $(clcicked).attr('data-user-id')},
        })
        .done(function(resp) {
            let htmll = resp.html;
            $('.chat-history ul').html('');
            $('.chat-history ul').append(htmll);
            $('.chat-history').animate({
                scrollTop: $('.chat-history')[0].scrollHeight
              }, 1000);
            // console.log(htmll);
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
        
    })

    function sendMsg(message) {
        let msg = $(message).parents('.chat-message').find('input.sendinput').val();
        let peerId = $(message).parents('.chat').find('.chat-header .chat-with').attr('data-userid');
        saveMsg(peerId, msg);
        
        console.log(peer.id)
       

        if(msg != undefined && msg != ''){
           conn.send(msg);
            let html = `<li class="clearfix d-block">
                        <div class="message other-message float-right">
                            ${msg}
                        </div>
                    </li>`;
            $('.chat-history ul').append(html);
            $(message).parents('.chat-message').find('input.sendinput').val('');
            
            $('.chat-history').animate({
                scrollTop: $('.chat-history')[0].scrollHeight
              }, 1000);

            }
        
        // body...
    }

    function saveMsg(to_id, msg) {
        $.ajax({
            url: '{{route("SaveMsg")}}',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            data: {to_id: to_id, message: msg},
        })
        .done(function() {
            console.log("success");
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
        

        // body...
    }
</script>
<!-- <script>
    $('div.fav_conn').on('click', (e)=>{
        let clcicked = $(e)[0].currentTarget;
        let html = `<li class="clearfix">
                    <img src="${$(clcicked).find('img').attr('src')}" alt="avatar" class="width-54" />
                    <div class="about">
                        <div class="name">${$(clcicked).find('.userName').html()}</div>
                        <div class="status">${$(clcicked).find('.userName').attr('data-userStatus')}</div>
                    </div>
                </li>`;
        $('.people-list ul.list').prepend(html)

        let chat_html = `<div>
                            <img src="${$(clcicked).find('img').attr('src')}" alt="avatar" class="width-54">
                            <div class="chat-about">
                                <div class="chat-with">${$(clcicked).find('.userName').html()}</div>
                                <div class="chat-num-messages">${$(clcicked).find('.userName').attr('data-userStatus')}</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <img class="me-3 w-26" src="./assets/images/Iconly-Bulk-Calling.png" alt="avatar">
                            <img class="me-3" src="./assets/images/Video.png" alt="avatar">
                            <img class="w-26" src="./assets/images/Iconly-Bulk-More Square.png" alt="avatar">
                        </div>`;
        $('.chat .chat-header').html(chat_html);
        $('.chat-history .ps-3').html('');
        console.log($(clcicked).attr('data-uid'))
    })
</script> -->

@endsection