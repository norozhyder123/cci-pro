@extends('layouts.dashboard')
@section('content')
<style type="text/css">
    .note-editable table td{
        border-color: black ;
    }
</style>
<div class="col-lg-6 col-md-12 col-sm-12 ps-3">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <div class="text_size-24 font_weight--500">Daily Stock Update</div>
        <div class="paragraph_medium text_color--green font_weight--500">Expand</div>
    </div>
    <div class="stock_update mb-3">
        <div class="row carousel_update">
            <div class="col single_block mx-2">
                <div class="text_size-12 mb-2">NASDAQ Composite Index</div>
                <img class="w-100" src="./assets/images/update_img1.png" alt="">
            </div>
            <div class="col single_block mx-2">
                <div class="text_size-12 mb-2">NASDAQ-100</div>
                <img class="w-100" src="./assets/images/update_img1.png" alt="">
            </div>
            <div class="col single_block mx-2">
                <div class="text_size-12 mb-2">ZB JUN 2022</div>
                <img class="w-100" src="./assets/images/update_img2.png" alt="">
            </div>
            <div class="col single_block mx-2">
                <div class="text_size-12 mb-2">ZB JUN 2022</div>
                <img class="w-100" src="./assets/images/update_img2.png" alt="">
            </div>
        </div>
    </div>
    <div class="text_size-24 font_weight--500 mb-3">Create New Forum</div>
    <div class="invest_cal mb-3">
        <form action="{{ route('saveBlog') }}" method="POST" enctype="multipart/form-data">
            @if($errors->any())
            @foreach($errors->all() as $e )
            <p class="text-danger">{{$e}}</p>
            @endforeach
            @endif
            @csrf
            <div class="d-flex mb-4">
                <div>
                    <label class="cal_label" for="blog_post">Create Forum</label>
                    <textarea name="forum_text" id="blog_post" ></textarea>
                </div>
            </div>
            <div class="float-end">
                <button class="calculate_btn" type="submit">Publish</button>
            </div>
        </form>
    </div>
    <div class="text_size-24 font_weight--500 mb-3">Investment Calculator</div>
    <div class="invest_cal mb-3">
        <form action="">
            <div class="d-flex mb-4">
                <div>
                    <label class="cal_label">Starting Amount</label>
                    <input type="text" class="cal_input w-90" placeholder="$">
                </div>
                <div>
                    <label class="cal_label">After</label>
                    <input type="text" class="cal_input w-90" placeholder="Years">
                </div>
                <div>
                    <label class="cal_label">Select Industry to invest in</label>
                    <select class="cal_input" aria-label="Default select example">
                        <option selected>Choose an industry</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                </div>
            </div>
            <div class="d-flex mb-4">
                <div class="w-30">
                    <label class="cal_label">Return Rate</label>
                    <input type="text" class="cal_input w-90" placeholder="%">
                </div>
                <div class="w-30">
                    <label class="cal_label">Compound</label>
                    <input type="text" class="cal_input w-90" placeholder="Annually">
                </div>
            </div>
            <div class="float-end">
                <button class="calculate_btn ">Calculate</button>
            </div>
        </form>
    </div>
    <div class="d-flex align-items-center justify-content-between mb-3">
        <div class="text_size-24 font_weight--500">Real Estate Listings</div>
        <div class="paragraph_medium text_color--green font_weight--500">Expand</div>
    </div>
    <div class="mb-3">
        <div class="row carousel_estate">
            <div class="col single_state mx-2">
                <img class="w-100" src="./assets/images/blog_1-img.png" alt="">
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
                <img class="w-100" src="./assets/images/blog_1-img.png" alt="">
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
                <img class="w-100" src="./assets/images/blog_1-img.png" alt="">
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
                <img class="w-100" src="./assets/images/blog_1-img.png" alt="">
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
<div class="col-lg-3 col-md-12 sticky col-sm-12 px-0 h-100">
    <div>
        <div class="forum_right font_family--kanit mb-3">
            <div class="d-flex align-items-center justify-content-between mb-2">
                <div class="text_size-24 text_color--green">Forums</div>
                <div class="paragraph_medium text_color--green">View All</div>
            </div>
            <div class="single_forum">
                @if(!empty($users))
                @foreach($users as $user)
                @foreach($user->user->blogs as $blog)
                <div class="text_size-14 text_color--green mb-2">
                    {{$user->first_name}}
                </div>
                <!-- <div class="text_size-16">
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt
                </div> -->
                <div class="text_size-14 font_weight--300">
                    {!! $blog->blog !!}
                    <a href="{{ route('showBlog', $blog->slug) }}" title="">View Forum</a>
                </div>
                @endforeach
                @endforeach
                @endif
            </div>
        </div>
        <div class="forum_right font_family--kanit">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <div class="text_size-24 text_color--green">Latest News &<br>Updates</div>
                <div class="paragraph_medium text_color--green">View All</div>
            </div>
            <div class="single_forum">
                <div class="d-flex mb-2 font_weight--300">
                    <img class="blog_img me-2" src="./assets/images/blog_1-img.png" alt="">
                    <div>
                        <div class="text_size-16">
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr.
                        </div>
                        <div class="text_size-16">
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr.
                        </div>
                    </div>
                </div>
                <div class="d-flex mb-2 font_weight--300">
                    <img class="blog_img me-2" src="./assets/images/blog_2-img.png" alt="">
                    <div>
                        <div class="text_size-16">
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr.
                        </div>
                        <div class="text_size-16">
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr.
                        </div>
                    </div>
                </div>
                <div class="d-flex mb-2 font_weight--300">
                    <img class="blog_img me-2" src="./assets/images/blog_3-img.png" alt="">
                    <div>
                        <div class="text_size-16">
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr.
                        </div>
                        <div class="text_size-16">
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#blog_post').summernote({
            height: 250,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: false,                 // set focus to editable area after initializing summernote
            disableDragAndDrop: true,
            toolbar: [
              ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']],
                ['insert', ['template', 'link', 'picture', 'hr','video']],
                ['help', ['help']]
            ]
            
        });  
        $('.note-editing-area').css('background','#fff');
        $('.note-editable p').css('color','#000');

    });
    
</script>
@endsection