<body class="body_home">

    <header>
        <div class="side-navbar z-index navbar-light active-nav" id="sidebar">
            <ul class="mob flex-column nav navbar-nav w-100">
                <a class="nav-link" href="{{ route('home') }}"><img class="w-100" src="assets/images/nav_logo.png" alt=""></a>

                <li><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                <li><a class="nav-link" href="{{ route('about') }}">About</a></li>
                <li><a class="nav-link" href="{{ route('reviews') }}">Reviews</a></li>
                <li><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
                <!-- drawer nav -->
                @if(!Auth::user())
                <li class="nav-item">
                    <a class="login-modal nav-link">Login</a>
                </li>
                <li class="nav-item"><a href="#" class="nav-link">Signup</a></li>
                @else
                <li><a class="nav-link" href="{{ route('dashboard') }}">{{ Auth::user()->first_name }}</a></li>
                @endif
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
                <a href="{{ route('home') }}"><img class="w-75" src="assets/images/nav_logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" id="menu-btn" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse justify-content-end navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                        <li><a class="nav-link" href="{{ route('about') }}">About</a></li>
                        <li><a class="nav-link" href="{{ route('reviews') }}">Reviews</a></li>
                        <li><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
                        @if(!Auth::user())
                        <li><button class="transparent-btn login-modal me-3">Login</button></li>
                        <li><button class="transparent-btn register-modal">Signup</button></li>
                        @else
                        <li><a class="nav-link" href="{{ route('dashboard') }}">{{ Auth::user()->first_name }}</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="wrapper">