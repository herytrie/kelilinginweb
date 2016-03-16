@extends('app')

@section('title')
<title>Setting - {{Auth::user()->name}}</title>

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading"><b>Setting User {{Auth::user()->name}}</b></div>

				<div class="panel-body">
					{!! Form::model($setting,['method'=>'PATCH','route'=>'setting.update','files' => true])!!}
					<!-- {!! Form::model($setting,['method'=>'PATCH','action' => ['HomeController@update']])!!} -->
						<div class="col-md-6">
						<div class="form-group">
						{!! Form::label('name','Name :') !!}
						{!! Form::text('name',null,['required' => 'required','class' => 'form-control']) !!}
						</div>
						</div>
						<div class="col-md-6">
						<div class="form-group">
						{!! Form::label('email','Email :') !!}
						{!! Form::email('email',null,['required' => 'email','class' => 'form-control']) !!}
						</div>
						</div>
						<div class="col-md-6">
						<div class="form-group">
						{!! Form::label('phone','Phone :') !!}
						{!! Form::text('phone',null,['required' => 'required','class' => 'form-control']) !!}
						</div>
						</div>
						<div class="col-md-6">
						<div class="form-group">
						{!! Form::label('info','Info :') !!}
						{!! Form::text('info',null,['class' => 'form-control', 'placeholder' => 'Max. 50 Character']) !!}
						</div>
						</div>
						<div class="col-md-6">
						<div class="form-group">
						{!! Form::label('image', 'Ganti Photo :')  !!}
						</div>
						</div>
						<div class="col-md-8">
						<div class="form-group">
		         		{!! Form::file('image','',['class' => 'btn']) !!}
					    {!! Html::image('assets/photo/'.$setting->photo,'', array('width' => '25%')) !!}
						</div>
						</div>

					<div class="col-md-12">
					<div class="form-group">
	    				{!! Form::submit('Update Data', ['class'=>'btn btn-primary']) !!}
					</div>
					</div>
	    			{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>

	@if ($errors->any())
	<ul class="alert alert-danger">
		@foreach($errors->all() as $error)
			<li>{{$error}}</li>
		@endforeach
	</ul>
@endif


@endsection