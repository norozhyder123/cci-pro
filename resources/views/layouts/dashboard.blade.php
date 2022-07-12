<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Core Invest Intel</title>

    <!-- bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- style.css -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <!-- JQuery -->
    <!-- CSS and JS file -->
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400&family=Poppins:wght@400;500;700&family=Source+Sans+Pro:wght@400;700&display=swap" rel="stylesheet">
    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery.min.js"></script> -->
    
    <!-- CSS and JS file end here -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">

    <!-- Owl Carousel -->
    <link rel="stylesheet" type="text/css" href="https://kenwheeler.github.io/slick/slick/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="https://kenwheeler.github.io/slick/slick/slick.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Summer Note Cdns -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

</head>

<body>
    <header class="top_nav">
        <div class="side-navbar z-index navbar-light active-nav" id="sidebar">
            <ul class="mob flex-column nav navbar-nav w-100">
                <a class="nav-link" href="{{ route('home') }}"><img class="w-100" src="assets/images/nav_logo.png" alt=""></a>

                <li><a class="nav-link" href="{{ route('chat') }}">Chats</a></li>
                <li><a class="nav-link" href="{{ route('connections') }}">Connections</a></li>
                <li><a class="nav-link" href="{{ route('notifications') }}">Notifications</a></li>
            </ul>
            <ul class="mt-2 px-2">
                <li class=" px-2"><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li class=" px-2"><a href="#"><i class="fab fa-facebook"></i></a></li>
                <li class=" px-2"><a href="#"><i class="fab fa-instagram"></i></a></li>
                <li class=" px-2"><a href="#"><i class="fab fa-linkedin"></i></a></li>
            </ul>
        </div>


        <nav class="navbar navbar-expand-lg navbar-light  ">
            <div class="container">
                <a href="{{ route('home') }}"><img class="w-75" src="{{asset('assets/images/nav_logo.png')}}" alt=""></a>
                <form action="">
                    <div class="input-group flex-nowrap serach_input">
                        <input type="text" class="form-control" placeholder="Search" aria-label="Username" aria-describedby="addon-wrapping">
                        <span class="input-group-text" id="addon-wrapping">
                            <img src="{{asset('assets/images/timeline/Group 328.png')}}" alt="">
                        </span>
                    </div>
                </form>
                <button class="navbar-toggler" type="button" id="menu-btn" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse justify-content-end navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li>
                            <a class="dash-nav-link" href="{{route('timeline')}}"> <img class="w-26" src="./assets/images/timeline/Home.png" alt=""> Home</a>
                        </li>
                        <li>
                            <a class="dash-nav-link" href="{{ route('chat') }}"> <img class="w-26" src="{{ asset('assets/images/Chat.png')}}" alt=""> Chats</a>
                        </li>
                        <li>
                            <a class="dash-nav-link" href="{{ route('connections') }}"> <img class="w-26" src="{{ asset('assets/images/User.png')}}" alt="">Connections</a>
                        </li>
                        <li>
                            <a class="dash-nav-link" href="{{ route('notifications') }}"> <img class="w-26" src="{{ asset('assets/images/Notification.png')}}" alt="">Notifications</a>
                        </li>
                        <li>
                        <div class="dropdown">
		                  <button class="btn bg-transparent dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
		                  	@if(!empty(auth()->user()->profile_img))
				            <img src="{{ asset('storage/'.auth()->user()->profile_img) }}" style="width:70px; height:70px;" class="rounded-circle" alt="">
				            @else
				            <img src="{{asset('assets/images/user_img.png')}}" alt="">
				            @endif
		                    <span>{{ auth()->user()->first_name }}</span>
		                  </button>
		                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="{{ route('profile') }}">Setting</a></li>
		                    <li><a class="dropdown-item" href="{{ route('connectionProfile', Auth::user()->id) }}">Profile</a></li>
		                    <li>
		                        <form action="{{ route('logout') }}" method="post">
						            @csrf
						            <button type="submit" class="dropdown-item">Logout</button>
						        </form>
		                    </li>
		                  </ul>
		                </div> 
		            </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="wrapper" style="padding-top: 150px;">
    	 <section class="dashboard_section">
            <div class="container">
                <div class="row">
                    @if(!Route::is('connectionProfile'))
                    <div class="col-lg-3 col-md-12 col-sm-12 dashboard-left sticky h-100">
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
                    @endif
                    @yield('content')
                </div>
            </div>
        </section>
    </div>
 <!-- script.js -->
        <!-- bootstrap 5 -->
        
        <!-- owl carousel -->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js "></script>
        <script src="{{asset('assets/js/script.js')}} "></script>
</body>
</html>