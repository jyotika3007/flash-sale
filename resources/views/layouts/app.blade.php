<!DOCTYPE html>
<html>
<head>

	@yield('title')
	<!-- <title> Flash Sale </title> -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	@yield('css')

	<style type="text/css">
		.jumbotron{
			padding: 0rem 2rem !important;
		}
	</style>
</head>
<body>


@yield('content')	

	@yield('script')

	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>
</html>