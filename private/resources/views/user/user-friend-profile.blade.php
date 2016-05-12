@extends('app')

@section('title')
<title>{!! $user['name'] !!}</title>

@section('content')

<div class="container">
	<div class="row">
        <div class="col-md-12">
            <img name="cover" class="coverimage" src={!! Cloudder::show($user->coverimage) !!}>
            <hr class='clear' />
        </div>
    </div>
	<div class="row">
        <div class="col-md-12 whiteback graypanel imgprofile">
            <div class="col-md-2">
            <img name="aboutme"class="img-circle" src={!! Cloudder::show($user['photo'])!!} >
            </div>
            <div class="col-md-3">
            <p><b>{!! $user['name'] !!}</b></p>
            <p class='postall'><img src="../assets/img/quote1.png" height="25"> {!! $user['info'] !!} <img src="../assets/img/quote2.png" height="30"></p>
                @if (in_array($user['id'], $followinglist))
					<h3 class="media-heading postall top10"><a href={!! url('/unfollow/'.$user['id']) !!}><small class="label label-info">Unfollow</small></a></h3>
				@else
					<h3 class="media-heading postall top10"><a href={!! url('/follow/'.$user['id']) !!}><small class="label label-info">Follow</small></a></h3>
				@endif
            </div>
			<hr class='clear' />
        </div>
    </div>
</div>

<div class="container">
	@include('user.following-follower')
</div>

@if (in_array($user['id'], $followinglist))
	<div class="container">
		<div class="row">	
			@include('user.travelplan')	
	@if ($user->posting->toArray() != null)	
				@foreach($user->posting as $post)				
						<div class="col-md-8">
							<div class="panel panel-default">
								<div class="panel-heading"><b><a href={!! url('/posting/'.$post->slug) !!}>{!! $post->judul !!}</a> - {!! $post->created_at->diffForHumans() !!}</b></div>
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
				@endforeach
		</div>
	</div>	
	@else
		<p class='text-center'><b>{!! $user['name'] !!} Have No Post.</b></p>
	@endif
@else
	<div class="col-md-12">
	<p class='text-center'><b>Follow {!! $user['name'] !!} to get Update from {!! $user['name'] !!}.</b></p>
	</div>
@endif

@endsection

