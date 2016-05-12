@extends('app')

@section('title')
<title>Kelilingin - {!!$post->judul!!}</title>

@section('content')
<div class="container">


<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading"><b>Location</b></div>		
			<div class="panel-body">
				<iframe
				  width="520"
				  height="300"
				  frameborder="0" style="border:0"
				  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBpCtQnxHIl0odalU4P2Ss2epKWEDz80P8&q=<?php echo $post->lat?>,<?php echo $post->lng?>">
				</iframe>
			</div>
		</div>
	</div>

	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading"><b>Weather Report</b></div>		
			<div class="panel-body">
				<article>
					<?php $jsonfile = "http://api.openweathermap.org/data/2.5/forecast/daily?lat=".$post->lat."&lon=".$post->lng."&cnt=6&mode=json&APPID=58f59425dde46e371cd94affe0fc5694";					
					try {
					 	$data = json_decode(file_get_contents($jsonfile));?> 

						<div class='col-md-2'>
						<img src="http://openweathermap.org/img/w/<?php echo $data->list[0]->weather[0]->icon?>.png"> <br/>
						{!! $data->list[0]->weather[0]->description !!}
						</div>

						<div class='col-md-2' style='padding: 0px'>
							<h2 class='nomargin'>
							 	{!!	round(($data->list[0]->temp->day) - 273.15 ,2) !!}°
							</h2>
						</div>

						<div class='col-md-4'>
							Kelembapan : {!! round($data->list[0]->humidity) !!}%
						 	<br/>
						 	Angin : {!! round(($data->list[0]->speed) * 3.6 ,2) !!}km/h
						 	<br/>	
							Suhu :{!! round(($data->list[0]->temp->min) - 273.15 ,2) !!}° - {!! round(($data->list[0]->temp->max) - 273.15 ,2) !!}°
						</div>
					 <?php }
					 catch(Exception $e) {
					 	echo '<p>No Connection</p>';
					 }?>			
				</article> 
			</div>
		</div>
	</div>

	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading"><b>Post Related</b></div>		
			<div class="panel-body">
				<article>
					@foreach($cari as $related)
						<a href={!! url('/posting/'.$related->slug) !!}><p>{!! $related->judul !!}</p></a>
					@endforeach
				</article> 
			</div>
		</div>
	</div>


</div>

	<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading"><b><a href={!! url('/posting/'.$post->slug) !!}>{!! $post->judul !!}</a> by <a href={!! url('/profile/'.$user->slug) !!}>{!! $user->name !!}</a> - {!! $post->created_at->diffForHumans() !!} - <i class="glyphicon glyphicon-eye-open"></i> {!! Counter::showAndCount('user-post', $post->id) !!} Views</b></div>		
					<div class="panel-body">
						<article>
							<img src={!! Cloudder::show($post->photo, ['format' => 'jpg', 'width' => 500, 'height' => 500]) !!} alt="Logo">
							<div class="body">{!! $post->deskripsi !!}</div>						
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