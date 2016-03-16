@extends('masterview')

@section('title')
<title>{{$artikel->judul}}</title>

@section('isi')
<h1>{{$artikel->judul}}</h1><a href='#'><i class='glyphicon glyphicon-trash'></i></a> | 
<a href='#'><i class='glyphicon glyphicon-edit'></i></a>

<article>
	<div class="body">{{$artikel->isi}}</div>
</article>


@stop