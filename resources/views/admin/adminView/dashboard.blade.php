@extends('admin.index')
@section('content')
<div class="col-lg-9 col-md-12 col-sm-12 ps-3">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <div class="text_size-24 font_weight--500">Daily Stock Update</div>
        <div class="paragraph_medium text_color--green font_weight--500">Expand</div>
    </div>
    <div class="stock_update mb-3">
        <div class="row carousel_update">
            <div class="col single_block mx-2">
                <div class="text_size-12 mb-2">NASDAQ Composite Index</div>
                <img class="w-100" src="{{ asset('assets/images/update_img1.png') }}" alt="">
            </div>
            <div class="col single_block mx-2">
                <div class="text_size-12 mb-2">NASDAQ-100</div>
                <img class="w-100" src="{{ asset('assets/images/update_img1.png') }}" alt="">
            </div>
            <div class="col single_block mx-2">
                <div class="text_size-12 mb-2">ZB JUN 2022</div>
                <img class="w-100" src="{{ asset('assets/images/update_img2.png') }}" alt="">
            </div>
            <div class="col single_block mx-2">
                <div class="text_size-12 mb-2">ZB JUN 2022</div>
                <img class="w-100" src="{{ asset('assets/images/update_img2.png') }}" alt="">
            </div>
        </div>
    </div>
    
    <div class="d-flex align-items-center justify-content-between mb-3">
        <div class="text_size-24 font_weight--500">Real Estate Listings</div>
        <div class="paragraph_medium text_color--green font_weight--500">Expand</div>
    </div>
    <div class="mb-3">
        <div class="row carousel_estate">
            <div class="col single_state mx-2">
                <img class="w-100" src="{{ asset('assets/images/blog_1-img.png') }}" alt="">
                <div class="p-2">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div class="text_size-14 text_color--green">Listing 01</div>
                        <div class="text_size-12 text_color--green">$1000.00</div>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <div class="text_size-12">ABC RD, 1234,<br> XYZ 82021</div>
                        <div class="text_size-12">Min $200.00</div>
                    </div>
                    <div class="mb-2">
                        <button class="evaluate_btn">Evaluate</button>
                    </div>
                </div>
            </div>
            <div class="col single_state mx-2">
                <img class="w-100" src="{{ asset('assets/images/blog_1-img.png') }}" alt="">
                <div class="p-2">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div class="text_size-14 text_color--green">Listing 01</div>
                        <div class="text_size-12 text_color--green">$1000.00</div>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <div class="text_size-12">ABC RD, 1234,<br> XYZ 82021</div>
                        <div class="text_size-12">Min $200.00</div>
                    </div>
                    <div class="mb-2">
                        <button class="evaluate_btn">Evaluate</button>
                    </div>
                </div>
            </div>
            <div class="col single_state mx-2">
                <img class="w-100" src="{{ asset('assets/images/blog_1-img.png') }}" alt="">
                <div class="p-2">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div class="text_size-14 text_color--green">Listing 01</div>
                        <div class="text_size-12 text_color--green">$1000.00</div>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <div class="text_size-12">ABC RD, 1234,<br> XYZ 82021</div>
                        <div class="text_size-12">Min $200.00</div>
                    </div>
                    <div class="mb-2">
                        <button class="evaluate_btn">Evaluate</button>
                    </div>
                </div>
            </div>
            <div class="col single_state mx-2">
                <img class="w-100" src="{{ asset('assets/images/blog_1-img.png') }}" alt="">
                <div class="p-2">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div class="text_size-14 text_color--green">Listing 01</div>
                        <div class="text_size-12 text_color--green">$1000.00</div>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <div class="text_size-12">ABC RD, 1234,<br> XYZ 82021</div>
                        <div class="text_size-12">Min $200.00</div>
                    </div>
                    <div class="mb-2">
                        <button class="evaluate_btn">Evaluate</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection