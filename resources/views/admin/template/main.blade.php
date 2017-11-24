<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>  @yield('title','Sap ')
	<img src="{{ asset('img/SAP.png') }}" alt="">
	</title>

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css')}}">
</head>
<body>

	<div class="row">
		<div class="col-sm-12">
			<nav class="navbar navbar-toggleable-md navbar-inverse bg-primary">
			@include('admin.template.partials.navbar')
			</nav>
		</div>
	</div>
	
	<br>

	<div class="row container" >
		<!-- <div class="col-md-1"></div> -->
		
		<div class="col-md-11">
			 @include('flash::message')
		@include('admin.template.partials.card') 
		</div>
		
		<div class="col-md-1">
		@yield('aside')

		</div>
	
	
	
	</div>
	<div class="row">
		<div class="col-md-12">
			
		</div>
	</div>



<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="{{asset('plugins/jquery/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.js') }}"></script>


<script>
    	$(function () {
  $('[data-toggle="popover"]').popover();
  $('[data-toggle="tooltip"]').tooltip();
  $('#flash-overlay-modal').modal();
})
</script>
    @yield('script')
</body>
</html>




