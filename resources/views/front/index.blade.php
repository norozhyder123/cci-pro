@extends('layouts.home')
@section('content')
<section class="hero-section">
  <div class="container">
    <div class="row mb-4">
      <div class="col-lg-6 col-md-12 col-sm-12 pe-5">
        <h1 class="heading_1 mb-3">Your Reliable Investment Counsellor</h1>
        <p class="paragraph_large max-550 mb-5">
          Empower your future with our expert investment guidance where we provide you with knowledgeable, strategic advice to achieve your dream lifestyle.
        </p>
        <div class="d-flex">
        @if(!Auth::user())
          <button class="transparent-btn me-3">Sign Up</button>
        @else
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="transparent-btn me-3">Logout</button>
        </form>
        @endif
          <button class="transparent-btn">Learn More</button>
        </div>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12">
        <img class="w-100" src="assets/images/hero-macbook.png" alt="">
      </div>
    </div>
    <div class="d-flex align-items-center justify-content-center">
      <div>
        <a href="#cta">
          <p class="text_10 mb-0 pb-2 text-center">SCROLL DOWN</p>
          <img class="w-100" src="assets/images/scroll_down.png" alt="">
        </a>
      </div>
    </div>
  </div>
</section>
<section>
  <div class="container">
    <div class="green-box">
      <img class="w-15" src="assets/images/apple.png" alt="">
      <img class="w-15" src="assets/images/ethereum.png" alt="">
      <img class="w-15" src="assets/images/bitcoin.png" alt="">
      <img class="w-15" src="assets/images/dodge.png" alt="">
      <img class="w-15" src="assets/images/nasdaq-2.png" alt="">
    </div>
  </div>
</section>
<section class="forex_community">
  <div class="container d-flex justify-content-end">
    <div class="w-50 white_box">
      <h2 class="heading_3 text_color--dark mb-5">Make<span class="text_color--green">Financial Decisions</span> Confidently</h2>
      <p class="paragraph_large max-430 mb-5 text_color--dark">
        Our experienced, licensed associates have been associated with the finance industry for more than two decades. They understand the value of investing money in the right places and the profound impacts it brings to an individual’s net worth. They provide
        useful resources, and financial advices that help you make the best financial decision of your life.
      </p>
      <a href="#">
        <p class="read_more">READ MORE</p>
      </a>
    </div>
  </div>
  <img class="abs-bg-img" src="assets/images/forex_bg-shape.png" alt="">
</section>
<section class="we_offers">
  <div class="container">
    <h2 class="heading_2 mb-10">What Makes Core<br>Invest Intel The Best?</h2>
    <div class="d-flex justify-content-between mb-5">
      <div class="offer_box me-5">
        <img class="p-0 me-4" src="assets/images/icon-1.png" alt="">
        <div>
          <h4 class="heading_5 mb-3">
            Experience & Expertise
          </h4>
          <p class="paragraph_medium">
            Robust network of financial experts with proven experience in several facets of financial planning and investment.
          </p>
        </div>
      </div>
      <div class="offer_box me-5">
        <img class="p-0 me-4" src="assets/images/icon-2.png" alt="">
        <div>
          <h4 class="heading_5 mb-3">
            Customized Financial Solutions
          </h4>
          <p class="paragraph_medium">
            We help you grow as an investor through valuable pieces of advice and resources that align with your own personal investment goals and needs.
          </p>
        </div>
      </div>
      <div class="offer_box">
        <img class="p-0 me-4" src="assets/images/icon-3.png" alt="">
        <div>
          <h4 class="heading_5 mb-3">
            Association With Third Parties
          </h4>
          <p class="paragraph_medium">
            We have partnered with renowned independent third parties like Morningstar, TheStreet to provide you with valuable information and data.
          </p>
        </div>
      </div>
    </div>
    <!-- <div class="d-flex justify-content-between">
      <div class="offer_box me-5">
          <img class="p-0 me-4" src="assets/images/icon-4.png" alt="">
          <p class="paragraph_medium">Privacy Policies to keep everyone safe from data theft or identity theft</p>
      </div>
      <div class="offer_box me-5">
          <img class="p-0 me-4" src="assets/images/icon-5.png" alt="">
          <p class="paragraph_medium">Connect & Follow people within community</p>
      </div>
      <div class="offer_box">
          <img class="p-0 me-4" src="assets/images/icon-6.png" alt="">
          <p class="paragraph_medium">Available on Mobile Devices</p>
      </div>
      </div> -->
  </div>
</section>
<section class="testimonial">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-12 col-sm-12 px-2 position-relative">
        <div class="owl-carousel">
          <div class="testimonial_box">
            <h4 class="heading_4 mb-4 text_color--dark">The best platform to meet people & share mindful discussions</h4>
            <p class="paragraph_large mb-5 text_color--dark">
              These guys provided useful insights about market trends and real estate listings which helped me invest my money into the right places at the right times.
            </p>
            <div class="float-end text-end">
              <h5 class="heading_5 text_color--dark">Rob Stewart</h5>
            </div>
          </div>
          <div class="testimonial_box">
            <h4 class="heading_4 mb-4 text_color--dark">The best platform to meet people & share mindful discussions</h4>
            <p class="paragraph_large mb-5 text_color--dark">
              Highly recommended!!! I want to appreciate your company for providing information to a level easily understood by regular people who don't have a lot of experience in financial investments and related aspects.
            </p>
            <div class="float-end text-end">
              <h5 class="heading_5 text_color--dark">Lisa Halper</h5>
            </div>
          </div>
          <div class="testimonial_box">
            <h4 class="heading_4 mb-4 text_color--dark">The best platform to meet people & share mindful discussions</h4>
            <p class="paragraph_large mb-5 text_color--dark">
              Great experience! I got to connect with several experienced financial advisors and build a strong network. Thanks to their social media forum.
            </p>
            <div class="float-end text-end">
              <h5 class="heading_5 text_color--dark">Frieda Kunis</h5>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12 px-5">
        <h3 class="heading_3 ps-5">What people say<br>about us</h3>
      </div>
    </div>
  </div>
</section>
<section class="cta" id="cta">
  <div class="container">
    <div class="w-50 cta_box">
      <p class="paragraph_large fw-bold text_color--dark mb-2">
        Subscribe to us to get instant updates about market trends, stocks, real estate listings, and more!
      </p>
      <p class="paragraph_large fw-bold text_color--dark mb-5">Don’t worry. We will NOT spam your inbox. </p>
      <button class="transparent_dark-btn mb-10">SUBSCRIBE NOW</button>
      <div class="d-flex align-items-center">
        <a class="me-3" href="">
        <img class="" src="assets/images/app-store.png" alt="">
        </a>
        <a href="">
        <img class="" src="assets/images/play-store.png" alt="">
        </a>
      </div>
    </div>
  </div>
  <img class="cta-abs-img" src="assets/images/mobile.png" alt="">
</section>
@endsection