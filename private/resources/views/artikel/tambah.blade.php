@extends('masterview')

@section('title')
<title>Tambah Artikel</title>

@section('isi')
<h1>Tambah Artikel</h1>
<hr/>
{!! Form::open(['url'=>'artikel'])!!}

@include('artikel.form',['namaTombol'=>'Tambah Artikel'])

{!! Form::close()!!}

@include('artikel.list')

@stop