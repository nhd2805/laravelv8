<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	@include('admin.layout.header')
	<h1 style="text-align: center;">Login</h1>
 <form action="dangnhap1" method="post">
 	@csrf
 	<p style="text-align: center;" class="">Email <input type="text" name="email"></p><br>
 	<p style="text-align: center;">PassWord <input type="PassWord" name="password"><br>
 	<p style="text-align: center;"><input type="submit" value="Login"></p>
 </form>
    @include('admin.layout.footer')
</body>
</html>