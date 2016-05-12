<p>{!! $post->likes->count() !!}
<?php $hasil = App\Like::where('post_id', $post->id)->where('user_id', Auth::user()->id)->count(); ?>
	@if ($hasil == 0) 
		<a href={!! url('/like/'.$post->id) !!}>Like</a>
	@else 
		<a href={!! url('/unlike/'.$post->id) !!}>Unlike</a>
	@endif
| {!! $post->comments->count() !!} <a href={!! url('/comment/'.$post->id) !!}> Comment</a></p>