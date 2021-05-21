<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
 <form action="upload_file" method="post" enctype="multipart/form-data">
 	@csrf
 	<input type="file" name="filename">
 	<input type="submit" name="" value="Upload">
 </form>
</body>
</html>