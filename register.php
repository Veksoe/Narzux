<?php
include 'php/dba.php';
require "php/classes/ED.class.php";
$error = "";
if (isset ( $_POST ["username"] )) {
	$myusername = DB::esc ( $_POST ["username"] );
	$sql = "SELECT id FROM members WHERE Username = '$myusername'";
	$q = DB::query ( $sql );
	$count = mysqli_num_rows ( $q );
	echo $count;
	if ($count < 1) {
		
		$encrypted_txt = DB::esc ( ED::encrypt ( $_POST ["userpassword"] ) );
		$myuseremail = DB::esc ( $_POST ["useremail"] );
		$myUserQustion = DB::esc ( $_POST ["userQuestion"] );
		$date = date ( 'j/n-H:i' );
		$sql2 = "INSERT INTO members (Username, Password, Email, Joindate, lastOnline, Rank, Question) VALUES ('$myusername','$encrypted_txt','$myuseremail', '$date','$date', 1,'$myUserQustion')";
		$q2 = DB::query ( $sql2 );
		
		header ( "location:index.php" );
	} else {
		$error = "Error: Username: $myusername is already in use!";
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
				class="input" required="required"> <a class="text">Hvad var yndlings
				dyr?</a><input type="text" placeholder="Svar" class="input"
				required="required" id="userQuestion" name="userQuestion"> <input
				type="submit" class="sendButton" style="margin-left: 5%;"
				onkeydown="if (event.keyCode == 13) { this.form.submit(); return false; }">
			<div style="color: red; text-align: center;">
				<?php echo $error?>
			</div>
		</div>

	</form>
</body>
</html>