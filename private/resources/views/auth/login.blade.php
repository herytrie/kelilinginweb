@extends('app2')

@section('content')
<!--
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Login</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> Remember Me
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">Login</button>

								<a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
-->


<div class="container mb55fcolor">
	 <div class="row vertical-offset-100">
    	<div class="col-md-5 col-md-offset-3">
    		<div class="panel panel-defaul margintop150px flatb" style="margin-top:20%;">

				
			  	<div class="panel-body">
				<div class="head" style="margin-bottom: 0px;">
				<a href="#"><h1 class='logo'>Kelilingin</h1></a>
				<p class="white f14px" style="color: #ACABAB;"><b>Stay Connected With Us.</b></p>
				</div>
			    	<form class="form-horizontal" role="form" method="POST" action="{!! url('/auth/login') !!}">
					<input type="hidden" name="_token" value="{!! csrf_token() !!}">
						
							<span class="input input--fumi" style="margin-bottom:-5px;">
								<input class="input__field input__field--fumi" placeholder="E-mail" name="email" type="email" id="input-23" value="{!! old('email') !!}" required/>
								<label class="input__label input__label--fumi" for="input-23">
									<i class="fa fa-fw fa-envelope-o icon icon--fumi"></i>
								</label>
							</span>
							<span class="input input--fumi">
								<input class="input__field input__field--fumi" placeholder="Password" name="password" type="password" id="input-24" required/>
								<label class="input__label input__label--fumi" for="input-24">
									<i class="fa fa-fw fa-lock icon icon--fumi"></i>
									
								</label>
							</span>
						
					<div class="col-sm-12">
							<button class="btn panelfor btn-block btn-success flatb" type="submit" name="login">
								<span class="oswaldlight">Log in</span>
							</button>
					</div>
					<div class="col-sm-12">
						<div class="col-md-6">
							<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> Remember Me
									</label>
								</div>
						</div>
						<div class="col-md-6">
							<a class="btn btn-link" href="{!! url('/password/email') !!}">Forgot Your Password ?</a>
						</div>
					</div>
					<div class="col-sm-12">
					@if (count($errors) > 0)
					<div class="alert alert-danger">
						<strong>Whoops!</strong> There were some problems with your input.<br>
						<ul>
							@foreach ($errors->all() as $error)
								<li>{!! $error !!}</li>
							@endforeach
						</ul>
					</div>
					@endif
					</div>
			      	</form>
			    </div>
				
			</div>
			<div class="modal-footer transf">
				<h3 class="notopnb oswaldlight">Not have an account ?
					<span class="bold">
						<a href="register" class="white"> Sign Up.</a>
					</span>
				</h3>
				<a class="btn btn-primary" href="{!! route('social.login', ['facebook']) !!}">Facebook</a>
				<a class="btn btn-primary" href="{!! route('social.login', ['google']) !!}">Google</a>
			</div>
		</div>
	</div>
	</div>


@endsection
