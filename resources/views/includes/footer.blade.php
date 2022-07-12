    <section class="footer">
            <div class="container">
                <div class="row mb-10">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="footer_text-regular">98353 Mraz Centers, Jenkinsberg, Bilzen, 47795-0102.</div>
                        <div class="footer_text-regular">(437) 408-1724</div>
                        <div class="footer_text-regular">info@coreinvestintel.com</div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 ps-5">
                        <div class="footer_text-light"><a href="{{ route('home') }}">HOME</a></div>
                        <div class="footer_text-light"><a href="{{ route('about') }}">ABOUT US</a></div>
                        <div class="footer_text-light"><a href="{{ route('reviews') }}">REVIEWS</a></div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 ps-5">
                        <div class="footer_text-light"><a href="{{ route('contact') }}">CONTACT US</a></div>
                        @if(!Auth::user())
                        <div class="footer_text-light"><a href="#">LOGIN OR SIGNUP</a></div>
                        @else
                        <div class="footer_text-light"><a href="{{ route('dashboard') }}">MY DASHBOARD</a></div>
                        @endif
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 ps-5">
                        <div class="footer_text-light"><a href="{{ route('privacy-policy') }}">PRIVACY POLICY</a></div>
                        <div class="footer_text-light"><a href="{{ route('terms-condition') }}">TERMS & CONDITIONS</a></div>
                    </div>
                </div>
                <div class="footer_text-sm text-center">ALL RIGHTS RESERVED - 2022 - CORE INVEST INTEL</div>
            </div>
            @if(!Auth::user())
            <!-- login-modal -->
            <div class="container">
                <div id="login" class="modal modal_bg-dark" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered w-25">
                        <div class="modal-content rounded-3">
                            <div>
                                <button type="button" class="btn-close close mt-2 me-2 float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body px-4 py-0">
                                <div class="card-title">
                                    <h2 class="heading_4 text_color--dark mb-3">Login to your Account</h2>
                                </div>
                                <div>
                                    <div class="card-body px-0 pb-5">
                                        <form class="login_form" action="{{ route('login') }}" method="post" >
                                            @csrf
                                            @if ($errors->any())
                                             @foreach ($errors->all() as $error)
                                                 <p class="text-danger">{{$error}}</p>
                                             @endforeach
                                            @endif
                                            <div class="mb-3">
                                                <input type="text" class="form-control form-input text_color--dark" placeholder="Username or email" name="email" required />
                                            </div>
                                            <div class="mb-5">
                                                <input type="password" class="form-control form-input text_color--dark" placeholder="Enter password" name="password" required />
                                                
                                                @if (Route::has('password.request'))
                                                    <label class="paragraph_medium fs-7 text_color--dark float-end"><a class="btn btn-link" href="{{ route('password.request') }}">
                                                        {{ __('Forgot Your Password?') }}
                                                    </a></label>
                                                @endif
                                            </div>
                                            <div class="my-3">
                                                <input type="checkbox" class="form-check-input" required/>
                                                <label for="remember" class="form-label fs-7 text_color--dark">I'm not a robot</label>
                                            </div>
                                            <div class="d-grid">
                                                <button type="submit" class="submit_btn">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Register-modal -->
            <div class="container">
                <div id="reg-modal" class="modal modal_bg-dark" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered ">
                        <div class="modal-content rounded-3">
                            <div>
                                <button type="button" class="btn-close reg-close mt-2 me-2 float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body px-4 py-0">
                                <div class="card-title">
                                    <h2 class="heading_4 text_color--dark mb-3">Register to your Account</h2>
                                </div>
                                <div>
                                    <div class="card-body px-0 pb-5">
                                        <form class="login_form" action="{{ route('register') }}" method="post">
                                            @csrf
                                             @if ($errors->any())
                                             @foreach ($errors->all() as $error)
                                                 <p class="text-danger">{{$error}}</p>
                                             @endforeach
                                            @endif
                                            <div class="row mb-3">
                                                <div class="col-lg-6 col-md-6 col-sm-12 px-1">
                                                    <input type="text" class="form-control form-input text_color--dark" placeholder="First Name" name="first_name" required />
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 px-1">
                                                    <input type="text" class="form-control form-input text_color--dark" placeholder="Last Name" name="last_name" required/>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-lg-6 col-md-6 col-sm-12 px-1">
                                                    <input type="email" class="form-control form-input text_color--dark" placeholder="Email" name="email" required/>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 px-1">
                                                    <input type="text" class="form-control form-input text_color--dark" placeholder="Phone Number" name="phone" required/>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-lg-6 col-md-6 col-sm-12 px-1">
                                                    <input type="password" class="form-control form-input text_color--dark" placeholder="Enter password" name="password" required />
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 px-1">
                                                    <input type="password" class="form-control form-input text_color--dark" placeholder="Confirm password" name="password_confirmation" required />
                                                </div>
                                            </div>
                                            <div class="my-3">
                                                <input type="checkbox" class="form-check-input" id="remember" required/>
                                                <label for="remember" class="form-label fs-7 text_color--dark">I'm not a robot</label>
                                            </div>
                                            <div class="d-grid">
                                                <button type="submit" name="register" class="submit_btn">Register</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
    </section>
</div>
    <!-- script.js -->
    <script src="{{asset('assets/js/script.js')}}"></script>
    <!-- bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- owl carousel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js "></script>
</body>

</html>