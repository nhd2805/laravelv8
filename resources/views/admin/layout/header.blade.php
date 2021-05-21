<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.bg-cover {
    background-size: cover !important;
}

body {
    min-height: 100vh;
}
	</style>
</head>
<body id="header">
	<!-- Bootstrap Static Header -->
<div style="background: url(https://i.postimg.cc/3N7wnb75/background.jpg)" class="jumbotron bg-cover text-white">
    <div class="container py-5 text-center">
        <h1 class="display-4 font-weight-bold">Quản Lý Sinh Viên</h1>
        <a href="http://localhost/Laravelv8/admin/sinhvien/dssp1" role="button" class="btn btn-primary px-5">Trang chủ</a>
        <a href="http://localhost/Laravelv8/admin/layout/dangnhap" role="button" class="btn btn-primary px-5">Đăng Nhập</a>
    </div>
    <div>
        @if(Auth::check())
          <a>User: {{Auth::user()->name}}</a><br>
          <a href="../../admin/layout/dangnhap">Đăng xuất</a>
        @endif
    </div>
</div>
</body>
</html>