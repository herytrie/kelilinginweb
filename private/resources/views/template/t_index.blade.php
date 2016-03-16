<!DOCTYPE html>
<html>
<head>
	<meta charset ="utf-8">
	<meta http-equip="X-UA-compatible" content="IE-EDGE">
	<title>Laravel 5</title>
	{!! HTML::style('assests/css/bottstrap.min.css') !!}
</head>
<body>
	@yield('content')
	{!! HTML::script('assests/js/jquery.min.js') !!}
	{!! HTML::script('assests/js/bootstrap.min.js') !!}
</body>
</html>