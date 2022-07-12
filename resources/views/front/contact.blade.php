@extends('layouts.home')
@section('content')
        <section class="page_banner">
            <h3 class="heading_3 position-relative">Contact Us</h3>
        </section>
        <section>
            <div class="contact-form-wrapper ">
                @if (Session::has('msg'))
                        <div class="alert alert-success text-center">
                            <p>{{ Session::get('msg') }}</p>
                        </div>
                    @endif
                <form action="{{route('contact.submit')}}" method="post" class="contact-form mx-auto">
                    @csrf
                    <h5 class="heading_3 text-center mb-4">Contact Us</h5>
                    <p class="paragraph_medium text-center mb-3">
                        Got any questions? Submit your query and our representatives will get back to you at the earliest!
                    </p>
                    <div>
                        <input type="text" class="form-control rounded mb-3 form-input" name="name" value="{{ Auth::user()? Auth::user()->getFullName(): '' }}" id="name" placeholder="Name" required {{ Auth::user()?'readonly':'' }}>
                    </div>
                    <div>
                        <input type="email" class="form-control rounded mb-3 form-input" name="email" value="{{ Auth::user()? Auth::user()->email: '' }}" placeholder="Email" required {{ Auth::user()?'readonly':'' }}>
                    </div>
                    <div>
                        <textarea id="message" class="form-control rounded mb-3 form-text-area" name="message" rows="5" cols="30" placeholder="Message" required></textarea>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="green_btn" type="submit">Send</button>
                    </div>
                </form>
            </div>
        </section>
@endsection