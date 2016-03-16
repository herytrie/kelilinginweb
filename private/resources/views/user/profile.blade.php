@extends('app')

@section('title')
<title>{{$user->name}}</title>

@section('isi')

<article>
	@foreach($user->posting as $temp)
		<h1>{{$temp->judul}}</h1>
		<div class="body">{{$temp->deskripsi}}</div>
	@endforeach
</article>


@stop