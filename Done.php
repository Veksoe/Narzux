<?php
include ('php/session.php');

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Logged in!</title>
</head>
<body>
	YOU ARE NOW LOGGED IN!
	<h1>
		Welcome
		<?php echo $login_session; ?>
	</h1>
</body>
</html>