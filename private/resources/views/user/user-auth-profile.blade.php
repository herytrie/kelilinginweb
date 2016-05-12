@extends('app')

@section('title')
<title>{!! Auth::user()->name !!}</title>

@section('content')

<div class="container">
	<div class="row">
        <div class="col-md-12">
        {!! Form::model(['method'=>'PATCH','route'=>'setting.update','files' => true])!!}
        	<label class="btn-upload">
				<input type='file' name='coverimage'>
				<button>Upload</button>
			    {!! Form::file('Update Data', ['class'=>'btn btn-primary']) !!}
			</label>
            <img name="cover" class="coverimage" src={!! Cloudder::show($user->coverimage) !!}>
            <hr class='clear' />
        {!! Form::close() !!}
        </div>
    </div>
	<div class="row">
        <div class="col-md-12 whiteback graypanel imgprofile">
            <div class="col-md-2">
            <img name="aboutme"class="img-circle" src={!! Cloudder::show($user->photo) !!}>
            </div>
            <div class="col-md-3">
            <p><b>{!! Auth::user()->name !!}</b></p>
            <p class='postall'><img src="../assets/img/quote1.png" height="25"> {!! Auth::user()->info !!} <img src="../assets/img/quote2.png" height="30"></p>
            </div>
			<hr class='clear' />
        </div>
    </div>
</div>

<div class="container">
	@include('user.following-follower')
</div>
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
	<p class='text-center'><b>You Have No Post.</b></p>
@endif
@endsection

