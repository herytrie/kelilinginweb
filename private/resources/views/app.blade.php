<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	@yield('title')

	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="{!! asset('/assets/css/style.css') !!}">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Laravel</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="{!! url('/home') !!}">Home</a></li>
					<li><a href="{!! url('/popular') !!}">Popular</a></li>
					<li class="dropdown"><a href="{!! url('/listplan') !!}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Travel Plans <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu" style="min-width: 350px;">
							{!! Form::open(array('action' => 'HomeController@listplan')) !!}
									<div class="col-md-12">
									<div class="form-group">
									{!! Form::text('destination',null,['class' => 'form-control','placeholder' => 'Your Destination (optional)']) !!}
									</div>
									</div>

								<div class="col-md-6">
									<div class="form-group">
									{!! Form::text('fromdate',null,['required' => 'required','id' => 'fromdate','class' => 'form-control','placeholder' => 'From']) !!}
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									{!! Form::text('todate',null,['required' => 'required','id' => 'todate','class' => 'form-control','placeholder' => 'To']) !!}
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
									<button class=" btn btn-primary panelfor marginleft14 flatb" type="submit" name="save" id="save"><span>Search</span></button>
									</div>
								</div>
							{!! Form::close() !!}
						</ul>
					</li>
					<li><a href="{!! url('/marketplace') !!}">Marketplace</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{!! url('/auth/login') !!}">Login</a></li>
						<li><a href="{!! url('/auth/register') !!}">Register</a></li>
					@else
						<li>
							<a href="{!! url('/createplan') !!}"><i class='glyphicon glyphicon-list-alt'></i></a>
						</li>
						<li>
							<!-- {!!link_to_route('profile.show','Profile',Auth::user()->id)!!} -->
							<a class="tip-bottom" data-original-title="Your Profile" data-toogle="tooltip" href={!!URL::route('profile.show',Auth::user()->slug)!!} title="Your Profile">
                       			<img class="img-circle img-nav" src={!! Cloudder::show(Auth::user()->photo,['width' => 25, 'height' => 25])!!} alt="Logo">
                     		</a> 
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{!! Auth::user()->name !!} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{!! url('/home') !!}">Home</a></li>
								<li><a href="{!! url('/setting') !!}">Setting</a></li>
								<!-- <li>{!!link_to_route('setting.show','Setting',Auth::user()->id)!!}</li> -->
								<li><a href="{!! url('/auth/logout') !!}">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	@yield('content')

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
	<script>
	var dates2 = $("#fromdate, #todate").datepicker({
	    minDate: "0",
	    maxDate: "+2Y",
	    defaultDate: "+1w",
	    dateFormat: 'yy-mm-dd',
	    changeMonth: true,
	    changeYear: true,
	    numberOfMonths: 1,
	    onSelect: function(date) {
	        for(var i = 0; i < dates2.length; ++i) {
	            if(dates2[i].id < this.id)
	                $(dates2[i]).datepicker('option', 'maxDate', date);
	            else if(dates2[i].id > this.id)
	                $(dates2[i]).datepicker('option', 'minDate', date);
	        }
	    } 
	});


	var dates = $("#datefrom, #dateto").datepicker({
	    minDate: "0",
	    maxDate: "+2Y",
	    defaultDate: "+1w",
	    dateFormat: 'yy-mm-dd',
	    changeMonth: true,
	    changeYear: true,
	    numberOfMonths: 1,
	    onSelect: function(date) {
	        for(var i = 0; i < dates.length; ++i) {
	            if(dates[i].id < this.id)
	                $(dates[i]).datepicker('option', 'maxDate', date);
	            else if(dates[i].id > this.id)
	                $(dates[i]).datepicker('option', 'minDate', date);
	        }
	    } 
	});

	</script>
</body>
</html>
