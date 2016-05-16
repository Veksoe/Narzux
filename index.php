<?php
include 'php/dba.php';
require "php/classes/ED.class.php";
$error = "";
if (isset ( $_POST ["username"] )) {
	session_start ();
	$myusername = DB::esc ( $_POST ["username"] );
	$encrypted_txt = (ED::encrypt ( $_POST ["userpassword"] ));
	$date = date ( 'j/n-H:i' );
	
	$q2 = DB::query ( "SELECT id FROM members WHERE Username = '$myusername' and Password = '$encrypted_txt'" );
	
	$count = mysqli_num_rows ( $q2 );
	echo $count;
	
	if ($count == 1) {
		$q = DB::query ( "UPDATE members
	SET lastOnline='$date'
	WHERE Username = '$myusername' and Password = '$encrypted_txt'" );
		$_SESSION ['login_user'] = $myusername;
		header ( "location:done.php" );
	} else {
		$error = "Unkown Username and/or password!";
	}
}
?>




<!DOCTYPE html>
<html>

<head>
<meta charset="ISO-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<link rel="stylesheet" href="css/style.css" media="screen" />
<link rel="stylesheet" href="css/mobile.css"
	media="handheld, only screen and (max-device-width:1280px)" />
<title>Test</title>
</head>
<body>
	<form action="" method="post">
		<div class="main">
			<div class="logo"></div>
			<input type="text" name="username" id="username"
				placeholder="Brugernavn" class="input" required="required"><br> <a
				href="register.php" class="text">Ikke medlem?</a><br> <input
				type="password" name="userpassword" id="userpassword"
				placeholder="Kode" class="input" required="required"> <br> <a
				href="forgot.php" class="text">Glemt din kode?</a> <br> <input
				type="submit" class="sendButton"
				onkeydown="if (event.keyCode == 13) { this.form.submit(); return false; }">
			<div style="color: red; text-align: center;">
				<?php echo $error?>
			</div>
		</div>
	</form>
</body>
</html>