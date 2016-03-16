@extends('masterview')

@section('title')
<title>Edit {{$artikel->judul}}</title>

@section('isi')
<h1>Edit: {{$artikel->judul}}</h1>
{!! Form::model($artikel,['method'=>'PATCH','url'=>'artikel/'.$artikel->id])!!}

@include('artikel.form',['namaTombol'=>'Edit Artikel'])

{!! Form::close()!!}

@include('artikel.list')

@stop