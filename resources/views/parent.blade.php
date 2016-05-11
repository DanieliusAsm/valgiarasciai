<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>{{ $meta_title or 'Pagrindinis' }}</title>

		<!-- Own styles -->
		<link rel="stylesheet" href="{{ asset('css/style.css') }}">

		<!-- Own, Bootstrap styles -->
		<link rel="stylesheet" href="{{ asset('css/app.css') }}">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		@if (!Auth::check())
			@include("includes.guestheader")
				@else (Auth::check())
					@include("includes.header")
		@endif
		<div class="container">
			@yield('content')
		</div>
		@include("includes.footer")

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

		<!-- Bootstrap.js -->
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>

		<!-- Angular.js -->
		<script src="{{ asset('js/angular.min.js') }}"></script>
		<script src="{{asset('js/ui-bootstrap-tpls-1.3.2.min.js')}}"></script>
		<!-- Import Angular.js modules -->
		<script src="{{ asset('js/angular/module.js') }}"></script>

		<!-- Import Angular.js controllers -->
		<script src="{{ asset('js/angular/UserlistCtrl.js') }}"></script>
		<script src="{{ asset('js/angular/ProductCtrl.js') }}"></script>
		<script src="{{ asset('js/angular/DietController.js') }}"></script>
		<!-- JQuery diet.js -->
		<script src="{{ asset('js/diet.js') }}"></script>
	</body>
</html>