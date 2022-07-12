<div class="row d-flex">
	<div class="col-12">
		<div class="card">
		@foreach($subComments as $subComment)
			<div class="card-body">
				@if(!empty($subComment->comment->user->profile_img))
				<img class="card-img-top rounded-circle" style="width:40px; height:40px;" src="{{ asset('storage/'.$subComment->comment->user->profile_img) }}" alt="Card image cap">
				@endif
				<h4 class="card-title d-inline-flex p-1">{{ $subComment->comment->user->first_name }}</h4>
				<p class="card-text" style="margin-left: 45px; margin-top: -13px;">{{ $subComment->comment->comment }}</p>
				@if(! auth()->guard('admin'))
				<button onclick="$(this).parent().find('form').toggleClass('d-none');">
					<span><i class="fa fa-share"></i> {{ count($subComment->comment->subcomment) }}</span>
				</button>
				@endif
				<form action="{{ route('blogComment', $bb->id) }}" method="post" class="d-none">
	    			@csrf
	    			<input type="hidden" name="slug" value="{{ $bb->slug }}">
	    			<input type="hidden" name="parent_comment_id" value="{{ $subComment->comment->id }}">
	    			<fieldset class="form-group">
		    			<label for="comment">Comment</label>
		    			<textarea id="comment" class="form-control" rows="6" cols="6" name="comment" required=""></textarea>
						<small class="text-muted">Your comment will be open with anyone else.</small>
					</fieldset>
	    			<button type="submit" class="btn btn-primary">
	    				<span><i class="fa fa-comment"></i> {{ count($subComment->comment->subcomment) }}</span>
	    			</button>
	    		</form>
	    		@if(count($subComment->comment->subcomment) > 0)
	    		@php 
	    		$subComments = $subComment->comment->subcomment;
	    		@endphp
	    		{{ view('user.dashboard.blogs.subComments', compact('subComments', 'bb')) }}
	    		@endif
			</div>
		@endforeach
		</div>
	</div>
</div>