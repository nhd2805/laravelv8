<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
 <form action="post_form" method="post">
 	@csrf
 	<input type="text" name="name">
 	<input type="hidden" name="token" value="<?php echo csrf_token() ?>">
 	<input type="submit" value="Submit Query">
 </form>
</body>
</html>