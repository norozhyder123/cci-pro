@extends('admin.index')
@section('content')
<div class="col-lg-9 col-md-12 col-sm-12 px-0">
    <div class="forum_right font_family--kanit mb-3">
        <div class="d-flex align-items-center justify-content-between mb-2">
            <div class="text_size-24 text_color--green">Forums</div>
        </div>
    @foreach($blog as $bb)
    <div class="col-8 mx-auto pb-4">
        <div class="card border-secondary" style="background: #fbfbfb3b">
          <div class="card-header">
            {{$bb->user->getFullName()}}
          </div>
          <div class="card-body">
            <p class="card-text">
                {!! $bb->blog !!} 
            </p>
          </div>
          <div class="card-footer text-muted">
            <div class="d-flex row">
                <div class="col-4">
                    @if(! auth()->guard('admin'))
                    <form action="{{ route('blogLike', $bb->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="slug" value="{{ $bb->slug }}">
                        <button type="submit" class="btn btn-primary">
                            <span><i class="fa fa-thumbs-up"></i> {{ count($bb->blogLikes) }}</span>
                        </button>
                    </form>
                    @else
                    <button class="btn btn-primary">
                            <span><i class="fa fa-thumbs-up"></i> {{ count($bb->blogLikes) }}</span>
                    </button>
                    @endif
                </div>
                <div class="col-4">
                    <button class="btn">
                        <span><i class="fa fa-comment"></i> {{ count($bb->commentsCount) }}</span>
                    </button>
                </div>
                <div class="col-4">
                    <span><i class="fa fa-eye"></i> {{ count($bb->blogViews) }}</span>
                </div>
                <div class="col-12">
                    <div class="card">
                        @php 
                        $countComm = 0;
                        @endphp
                        @foreach($bb->comments as $comment)
                        <div class="card-body comments {{ $countComm>0?'d-none':'deff' }}">
                            @if(!empty($comment->user->profile_img))
                            <img class="card-img-top rounded-circle" style="width:40px; height:40px;" src="{{ asset('storage/'.$comment->user->profile_img) }}" alt="Card image cap">
                            @endif
                            <h4 class="card-title d-inline-flex p-1">{{ $comment->user->first_name }}</h4>
                            <p class="card-text" style="margin-left: 45px; margin-top: -13px;">{{ $comment->comment }}</p>
                            @if(! auth()->guard('admin'))
                            <button onclick="$(this).parent().find('form').toggleClass('d-none');">
                                <span><i class="fa fa-share"></i> {{ count($comment->subcomment) }}</span>
                            </button>
                            @endif
                            <form action="{{ route('blogComment', $bb->id) }}" method="post" class="d-none">
                                @csrf
                                <input type="hidden" name="slug" value="{{ $bb->slug }}">
                                <input type="hidden" name="parent_comment_id" value="{{ $comment->id }}">
                                <fieldset class="form-group">
                                    <label for="comment">Comment</label>
                                    <textarea id="comment" class="form-control" rows="6" cols="6" name="comment" required=""></textarea>
                                    <small class="text-muted">Your comment will be open with anyone else.</small>
                                </fieldset>
                                <button type="submit" class="btn btn-primary">
                                    <span><i class="fa fa-comment"></i> {{ count($comment->subcomment) }}</span>
                                </button>
                            </form>

                            @if(count($comment->subcomment) > 0)
                            @php 
                            $subComments = $comment->subcomment;
                            @endphp
                            {{ view('user.dashboard.blogs.subComments', compact('subComments', 'bb')) }}
                            @endif
                        </div>
                        @php ++$countComm; @endphp
                        @endforeach
                        @if($countComm > 0)
                            <button class="showall" onclick="ShowAll(this)">Show All</button>
                            <button class="showless d-none" onclick="ShowLess(this)">Show Less</button>
                            @endif
                    </div>
                </div>
                <div class="col-12 d-none" id="commentDiv">
                    <form action="{{ route('blogComment', $bb->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="slug" value="{{ $bb->slug }}">
                        <fieldset class="form-group">
                            <label for="comment">Comment</label>
                            <textarea id="comment" class="form-control" rows="6" cols="6" name="comment" required=""></textarea>
                            <small class="text-muted">Your comment will be open with anyone else.</small>
                        </fieldset>
                        <button type="submit" class="btn btn-primary">Comment</button>
                    </form>
                </div>
            </div>
          </div>
        </div>
    </div>
    @endforeach
    </div>
</div>

<script>
    function ShowLess(data) {

        $('.card-body.comments').addClass('d-none');
        $('.card-body.comments.deff').removeClass('d-none');
        $(data).addClass('d-none')
        $('.showall').removeClass('d-none')
        // body...
    }

    function ShowAll(data) {

        $('.card-body.comments.d-none').removeClass('d-none');
        $(data).addClass('d-none')
        $('.showless').removeClass('d-none')
        // body...
    }
</script>
@endsection