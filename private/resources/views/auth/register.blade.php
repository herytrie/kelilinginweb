@extends('app2')

@section('content')
<!--
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Register</div>
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

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}">
							</div>
						</div>

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
							<label class="col-md-4 control-label">Confirm Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Register
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
-->

	<div class="container ">
	 <div class="row vertical-offset-100">
    	<div class="col-md-5 col-md-offset-3">
    		<div class="panel panel-defaul flatb" style="margin-top:14%;">
				
			  	<div class="panel-body">
				<div class="head" style="margin-bottom: 0px;">
				<a href="index.php"><img src="{{ asset('/img/logo-out.png') }}"></a>
				<p class="white f14px" style="color: #ACABAB;"><b>Create Your Free Account.</b></p>
				</div>
			    	<form accept-charset="UTF-8" role="form"  action="{{ url('/auth/register') }}" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<span class="input input--fumi" style="margin-bottom:-15px;">
							<input class="input__field input__field--fumi" placeholder="E-mail" name="email" type="email" id="input-23" value="{{ old('email') }}" required/>
							<label class="input__label input__label--fumi" for="input-23">
								<i class="fa fa-fw fa-envelope-o icon icon--fumireg"></i>
							</label>
						</span>
						<span class="input input--fumi" style="margin-bottom:-15px;">
							<input class="input__field input__field--fumi" placeholder="Name" name="name" type="text" id="input-23" value="{{ old('name') }}" required/>
							<label class="input__label input__label--fumi" for="input-23">
								<i class="fa fa-fw fa-user icon icon--fumireg"></i>
							</label>
						</span>
						<span class="input input--fumi" style="margin-bottom:-15px;">
							<input class="input__field input__field--fumi" placeholder="Password" name="password" type="password" id="input-24" required/>
							<label class="input__label input__label--fumi" for="input-24">
								<i class="fa fa-fw fa-lock icon icon--fumireg"></i>	
							</label>
						</span>
						<span class="input input--fumi">
							<input class="input__field input__field--fumi" placeholder="Confirmation Password" name="password_confirmation" type="password" id="input-24" required/>
							<label class="input__label input__label--fumi" for="input-24">
								<i class="fa fa-fw fa-lock icon icon--fumireg"></i>	
							</label>
						</span>
				<div class="col-sm-12">
					<div class="form-group">
						<button class="btn panelfor btn-block btn-primary flatb" type="submit"><span class="oswaldlight">Create Account</span></button>
					</div>
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
				</div>
			      	</form>
			    </div>
			</div>
			<div class="modal-footer transf">
			<h3 class="notopnb oswaldlight">Already have account ? <span class="bold"><a href="login" class="white"> Sign In.</a></span></h3>
			</div>
		</div>
	</div>
	</div>

@endsection
