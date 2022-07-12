@extends('layouts.dashboard')
@section('content')
<div class="col-lg-9 col-md-12 col-sm-12 ps-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="text_size-24 font_weight--500">Favorite Connections</div>
                        </div>
                        <div class="mb-3 ms-3">
                            <div class="row mb-2">
                                <div class="col d-flex align-items-center fav_conn py-2">
                                    <img class="me-2" src="./assets/images/user_img.png" alt="">
                                    <div class="text_size-12">Emilie<br> Wilkinson</div>
                                </div>
                                <div class="col d-flex align-items-center fav_conn py-2">
                                    <img class="me-2" src="./assets/images/user_img.png" alt="">
                                    <div class="text_size-12">Emilie<br> Wilkinson</div>
                                </div>
                                <div class="col d-flex align-items-center fav_conn py-2">
                                    <img class="me-2" src="./assets/images/user_img.png" alt="">
                                    <div class="text_size-12">Emilie<br> Wilkinson</div>
                                </div>
                                <div class="col d-flex align-items-center fav_conn py-2">
                                    <img class="me-2" src="./assets/images/user_img.png" alt="">
                                    <div class="text_size-12">Emilie<br> Wilkinson</div>
                                </div>
                            </div>
                        </div>
                        <div class="chat_wrapper ms-0 row">
                            <div class="people-list col-lg-4 px-0">
                                <div class="search">
                                    <div class="text_size-24 font_weight--500">All Chats</div>
                                    <img src="./assets/images/Iconly-Bulk-Search.png" alt="">
                                </div>
                                <ul class="list">
                                    <li class="clearfix">
                                        <img src="./assets/images/Rectangle 78.png" alt="avatar" />
                                        <div class="about">
                                            <div class="name">Emilie Wilkinson</div>
                                            <div class="status">Lorem Ipsum</div>
                                        </div>
                                    </li>
                                    <li class="clearfix">
                                        <img src="./assets/images/Rectangle 78.png" alt="avatar" />
                                        <div class="about">
                                            <div class="name">Emilie Wilkinson</div>
                                            <div class="status">Lorem Ipsum</div>
                                        </div>
                                    </li>
                                    <li class="clearfix">
                                        <img src="./assets/images/Rectangle 78.png" alt="avatar" />
                                        <div class="about">
                                            <div class="name">Emilie Wilkinson</div>
                                            <div class="status">Lorem Ipsum</div>
                                        </div>
                                    </li>
                                    <li class="clearfix">
                                        <img src="./assets/images/Rectangle 78.png" alt="avatar" />
                                        <div class="about">
                                            <div class="name">Emilie Wilkinson</div>
                                            <div class="status">Lorem Ipsum</div>
                                        </div>
                                    </li>
                                    <li class="clearfix">
                                        <img src="./assets/images/Rectangle 78.png" alt="avatar" />
                                        <div class="about">
                                            <div class="name">Emilie Wilkinson</div>
                                            <div class="status">Lorem Ipsum</div>
                                        </div>
                                    </li>
                                    <li class="clearfix">
                                        <img src="./assets/images/Rectangle 78.png" alt="avatar" />
                                        <div class="about">
                                            <div class="name">Emilie Wilkinson</div>
                                            <div class="status">Lorem Ipsum</div>
                                        </div>
                                    </li>
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

                                <div class="chat-history">
                                    <ul class="ps-3">
                                        <li>
                                            <div class="message my-message">
                                                Are we meeting today? Project has been already finished and I have results to show you.
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <div class="message other-message float-right">
                                                Hi Vincent, how are you? How is the project coming along?
                                            </div>
                                        </li>
                                        <li>
                                            <div class="message my-message">
                                                Actually everything was fine. I'm very excited to show this to our team.
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <div class="message other-message float-right">
                                                Well I am not sure. The rest of the team is not here yet. Maybe in an hour or so? Have you faced any problems at the last phase of the project?
                                            </div>
                                        </li>
                                        <li class="typing my-message">
                                            <i class="fa fa-circle online"></i>
                                            <i class="fa fa-circle online"></i>
                                            <i class="fa fa-circle online"></i>
                                        </li>
                                    </ul>
                                </div>
                                <!-- end chat-history -->
                                <div class="chat-message">
                                    <input name="message-to-send" placeholder="Type message" rows="3"></input>
                                    <div class="d-flex align-items-center">
                                        <img class="me-2" src="./assets/images/Iconly-Bulk-Paper Plus.png" alt="">
                                        <button><img src="./assets/images/Iconly-Bulk-Send.png" alt=""></button>
                                    </div>

                                </div>
                                <!-- end chat-message -->

                            </div>
                        </div>
</div>
@endsection