<!DOCTYPE html>
<html>
<head>
	<title>Laravel Master</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="{{asset('public/css/style.css')}}">
</head>
<body>
	@include('layout.header')
		@yield('Content')<!--Nhúng nội dung từ trang khác: layout/laravel-->
	@include('layout.footer')

</body>
</html>