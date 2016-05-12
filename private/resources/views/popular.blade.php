@extends('app')

@section('title')
<title>Home - {!! Auth::user()->name !!}</title>

@section('content')
<div class="container">


@foreach ($like as $post)
	@if (Auth::user()->following->toArray() != null || Auth::user()->posting->toArray() != null)	
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="panel panel-default">
						<div class="panel-heading"><b><a href={!! url('/posting/'.$post->slug) !!}>{!! $post->judul !!}</a> by  -  {!! $post->created_at->diffForHumans() !!}</b></div>		
						<div class="panel-body">
							<article>
									<div class="body">{!! $post->deskripsi !!}</div>						
							</article> 
						</div>
						<div class="panel-footer">
							@include('post.like-post')
						</div>
					</div>
				</div>
			</div>
	@else
		<p class='text-center'><b>Your timeline is empty. Try to following someone.</b></p>
			<div class="row">
				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading"><b>Follow Someone</b></div>
						<div class="panel-body">
							<article>
							@foreach ($all as $userall)
								<div class="body"><a href={!! url('/profile/'.$userall->slug) !!}>{!! $userall->name !!}</a></div>
							@endforeach
							</article> 
						</div>
					</div>
				</div>
			</div>
	@endif
@endforeach

</div>
@endsection
