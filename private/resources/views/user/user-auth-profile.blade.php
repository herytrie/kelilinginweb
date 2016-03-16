@extends('app')

@section('title')
<title>{{Auth::user()->name}}</title>

@section('content')

<div class="container">
	<div class="row">
        <div class="col-md-12 whiteback graypanel imgprofile">
            <div class="col-md-2">
            <img name="aboutme"class="img-circle" src={{url('assets/photo/'.Auth::user()->photo)}} >
            </div>
            <div class="col-md-3">
            <p><b>{{ Auth::user()->name }}</b></p>
            <p class='postall'><img src="../assets/img/quote1.png" height="25"> {{Auth::user()->info}} <img src="../assets/img/quote2.png" height="30"></p>
            </div>
			<hr class='clear' />
        </div>
    </div>
</div>

<div class="container">
	@include('user.following-follower')
</div>

@if ($user->posting->toArray() == null)
		<p class='text-center'><b>You Have No Post.</b></p>
@else
	@foreach($authid->posting as $post)
		<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading"><b><a href={{ url('/posting/'.$post->id) }}>{{$post->judul}}</a></b></div>

					<div class="panel-body">
						<article>
								<div class="body">{{$post->deskripsi}}</div>					
						</article> 
					</div>
					<div class="panel-footer">
						@include('post.like-post')
					</div>
				</div>
			</div>
		</div>
		</div>
	@endforeach
@endif
@endsection

