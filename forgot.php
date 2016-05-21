<?php
include 'php/dba.php';
require "php/classes/ED.class.php";

$error = "";
$done = false;
if (isset ( $_POST ["username"] )) {
	
	$myusername = DB::esc ( $_POST ["username"] );
	$myuseremail = DB::esc ( $_POST ["useremail"] );
	$myuserquestion = DB::esc ( ED::encrypt ( $_POST ["userQuestion"] ) );
	$sql = "SELECT Password  FROM members WHERE Username = '$myusername' and Email = '$myuseremail' and Question = '$myuserquestion'";
	$q = DB::query ( $sql );
	
	$count = mysqli_num_rows ( $q );
	if ($count > 0) {
		
		$message = "\nNarzux web team ";
		$message .= "<br>http://narzux.weebly.com/ ";
		
		$header = "<br>Hej $myusername,";
		$header .= " <br>Du har bedt om din kode.\n";
		$header .= "<br>Koden er:<b> ";
		
		while ( $row = $q->fetch_assoc () ) {
			$header .= $decrypted_txt = ED::decrypt ( $row ["Password"] );
		}
		$done = true;
	} else {
		$error = "Ukendt email, brugernavn og/eller dyr";
	}
}
if (isset ( $_POST ["done"] )) {
	header ( "location:index.php" );
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
<title>Glemt kode</title>
</head>
<body>

	<div class="main">
		<div class="logo"></div>
		<form action="" method="post">
			<?php if($done == false){?>
		 <input type="text" name="username" id="username"
				placeholder="Brugernavn" required="required" style="margin-top: 5%;">
			<input type="email" name="useremail" id="useremail"
				placeholder="Email" required="required"> <input name="userQuestion"
				id="userQuestion" placeholder="Hvad var dit yndlings dyr?"
				required="required"><input type="submit" value="Se kode"
				onkeydown="if (event.keyCode == 13) { this.form.submit(); return false; }">
			<div style="color: red; text-align: center;">
				<?php
				
				echo $error;
			} else {
				echo "<center>", $header, "</b><br><br>", $message, "<br><input type='submit' id='done' name='done' value='Tilbage' style='margin-right: 45%; margin-top:5%;'  </center>";
			}
			?>
			</div>
		</form>
	</div>

</body>
</html>