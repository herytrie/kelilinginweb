@extends('masterview')

@section('title')
<title>Artikel</title>

@section('isi')
<h1>Artikel</h1>
@foreach ($artikel as $articles)
<article>
	<h2><a href="./artikel/{{$articles->id}}">{{$articles->judul}}</a></h2>
		{!! Form::open(['url' => 'artikel/' . $articles->id]) !!}
            {!! Form::hidden('_method', 'DELETE') !!}
            {!! Form::submit('Delete', ['class' => 'btn btn danger']) !!}
        {!! Form::close() !!} | 
<a href='./artikel/{{$articles->id}}/edit'><i class='glyphicon glyphicon-edit'></i></a>
	<div class="body">{{$articles->isi}}</div>
</article>

@endforeach
@stop