<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>@yield('title')</title>
		<link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="{{ URL::asset('css/font-awesome.min.css') }}" rel="stylesheet">
		<link href="{{ URL::asset('css/datepicker3.css') }}" rel="stylesheet">
		<link href="{{ URL::asset('css/styles.css') }}" rel="stylesheet">
		<link href="{{ URL::asset('css/my-theme.css') }}" rel="stylesheet">
		<link href="{{ URL::asset('css/custom.css') }}" rel="stylesheet">
		<!--Theme-->
		<link href="{{ URL::asset('css/theme-default.css') }}" rel="stylesheet">
		<script src="{{ URL::asset('js/jquery-1.11.1.min.js') }}"></script>
		<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
		<!--Cleave.js-->
		<script src="{{ URL::asset('js/cleave/cleave.min.js') }}"></script>
		<!--Sweet Alert-->
		<script src="{{ URL::asset('sweet-alert/sweetalert2.min.js') }}"></script>
		<link href="{{ URL::asset('sweet-alert/sweetalert2.min.css') }}" rel="stylesheet">
		<!--Cleave.js-->
    <script src="{{ URL::asset('js/cleave/cleave.min.js') }}"></script>
		<!--Custom Font-->
		{{-- <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet"> --}}
		<!--Sweet Alert-->
		<script src="{{ URL::asset('sweet-alert/sweetalert2.min.js') }}"></script>
		<link rel="stylesheet" href="{{ URL::asset('sweet-alert/sweetalert2.min.css') }}">

		<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		@include('_layout.navbar')
		{{-- sidebar --}}
		@include('_layout.sidebar')
		{{-- endsidebar --}}
		<div class="col-sm-offset-3 col-lg-offset-2 col-sm-9 col-lg-10 main">
			<div class="row">
				<ol class="breadcrumb">
					<li><a href="/dashboard">
						<em class="fa fa-home"></em>
					</a></li>
					@yield('breadcrumb')
				</ol>
			</div><!--/.row-->

			<div class="row">
				<div class="col-lg-12">
          @yield('page-header')
					<!-- <h1 class="page-header">Dashboard</h1> -->
				</div>
			</div><!--/.row-->

	     @yield('content')
			 <br>
			 <hr>
			 <div class="col-sm-12">
				 <p class="back-link">Lumino Theme by <a href="https://www.medialoot.com">Medialoot</a></p>
			 </div>
		</div>	<!--/.main-->

		@yield('extra-js')
	</body>
</html>
