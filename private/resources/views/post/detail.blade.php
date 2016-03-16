@extends('app')

@section('title')
<title>{{$post->judul}}</title>

@section('content')
<div class="container">

	<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading"><b><a href={{ url('/posting/'.$post->id) }}>{{$post->judul}}</a> by <a href={{ url('/profile/'.$user->id) }}>{{$user->name}}</a></b></div>		
					<div class="panel-body">
						<article>
							<img src={{url('./uploads/'.$post->photo)}} alt="Logo">
							<div class="body">{{$post->deskripsi}}</div>						
						</article> 
					</div>
					<div class="panel-footer">
						@include('post.like-post')
					</div>
				</div>
			</div>
		</div>

	<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">					
					@include('post.comment-post')
			</div>
		</div>
</div>


@endsection