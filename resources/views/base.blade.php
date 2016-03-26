<!DOCTYPE html>
<html>
	<head>		
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>{{ $meta_title or 'Pagrindinis' }}</title>
		
		<!-- Bootstrap -->
		<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

		<!-- Own styles -->
		<link rel="stylesheet" href="{{ asset('css/style.css') }}">

		<!-- Angular.js -->
		<script src="{{ asset('js/angular.min.js') }}"></script>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		
		<link rel="stylesheet" href="{{ asset('css/style.css') }}">
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="header">
            @yield('header')
        </div>
        <div class = "content">
            @yield('content')
        </div>
        <div class="footer">
			<hr></hr><!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
			<!-- Include all compiled plugins (below), or include individual files as needed -->
			<script src="{{ asset('js/bootstrap.min.js') }}"></script>

			Footer
		</div>

		<!-- Import Angular.js models -->
		<script src="{{ asset('js/angular/model.js') }}"></script>

		<!-- Import Angular.js controllers -->
		<script src="{{ asset('js/angular/controller.js') }}"></script>
	</body>
</html>