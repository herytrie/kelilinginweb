@extends('masterview')

@section('title')
<title>Home Place</title>

@section('isi')

<article>
	
		<!-- <h1>ini follow->following2 {{$follow->followings}}</h1>
		<br/>
		<h1>ini follow {{$follow}}</h1>
 -->
		<!-- @foreach($follow->following2 as $temp)
			<h1>{{$temp}}</h1>
		@endforeach -->

@foreach($follow->following as $temp)
	{!! $temp !!}
@endforeach		

</article>


@stop