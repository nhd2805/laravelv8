<!DOCTYPE html>
<html>
<head>
	<title>Laravel Master</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('js/style.js')}}">
</head>
<body>
	@include('admin.layout.header')
		@yield('Content')<!--Nhúng nội dung từ trang khác: layout/laravel-->
	@include('admin.layout.footer')

</body>
</html>