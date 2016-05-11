<?php
include 'php/dba.php';
require "php/classes/ED.class.php";
$error = "";
if (isset ( $_POST ["username"] )) {
	if ($_POST ["userpassword"] == $_POST ["userpassword2"]) {
		$myusername = DB::esc ( $_POST ["username"] );
		$sql = "SELECT id FROM members WHERE Username = '$myusername'";
		$q = DB::query ( $sql );
		$count = mysqli_num_rows ( $q );
		echo $count;
		if ($count < 1) {
			
			$encrypted_txt = DB::esc ( ED::encrypt ( $_POST ["userpassword"] ) );
			$myuseremail = DB::esc ( $_POST ["useremail"] );
			$date = date ( 'j/n-H:i' );
			$sql2 = "INSERT INTO members (Username, Password, Email, Joindate, lastOnline) VALUES ('$myusername','$encrypted_txt','$myuseremail', '$date','$date')";
			$q2 = DB::query ( $sql2 );
			
			header ( "location:/dashboard/Annika/Narzux/index.php" );
		} else {
			$error = "Error: Username: $myusername is already in use!";
		}
	} else {
		$error = "Error: Password is not equal!";
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
	media="handheld, only screen and (max-device-width:640px)" />
<title>Opret bruger</title>
</head>
<body>
	<form action="" method="post">
		<div class="main">
			<div class="logo"></div>
			<a class="text">Brugernavn?</a> <input type="text" name="username"
				id="username" placeholder="Brugernavn" class="input"
				required="required"> <a class="text">Email</a><input type="email"
				name="useremail" id="useremail" placeholder="Email" class="input"
				required="required"> <a class="text">Kode</a><input type="password"
				name="userpassword" id="userpassword" placeholder="Kode"
				class="input" required="required"> <a class="text">Gentag koden</a><input
				type="password" placeholder="Kode" class="input" required="required"
				name="userpassword2"> <input type="submit" class="sendButton"
				style="margin-left: 5%;"
				onkeydown="if (event.keyCode == 13) { this.form.submit(); return false; }">
			<div style="color: red; text-align: center;">
				<?php echo $error?>
			</div>
		</div>

	</form>
</body>
</html>