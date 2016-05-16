<?php
include 'php/dba.php';
require "php/classes/ED.class.php";

$error = "";
$done = false;
if (isset ( $_POST ["username"] )) {
	
	$myusername = DB::esc ( $_POST ["username"] );
	$myuseremail = DB::esc ( $_POST ["useremail"] );
	$sql = "SELECT Password  FROM members WHERE Username = '$myusername' and Email = '$myuseremail'";
	$q = DB::query ( $sql );
	
	$count = mysqli_num_rows ( $q );
	if ($count > 0) {
		
		$message = "\nNARZUX web team ";
		$message .= "\nhttp://narzux.weebly.com/ ";
		
		$header = "Hej $myusername,";
		$header .= " <br>Du har bedt om din kode til Narzux!\n";
		$header .= "<br>Her er din kode:<b> ";
		
		while ( $row = $q->fetch_assoc () ) {
			$header .= $decrypted_txt = ED::decrypt ( $row ["Password"] );
		}
		$done = true;
	} else {
		$error = "Unknown Email or Username, please try again or contact a admin.";
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
<title>Forgot</title>
</head>
<body>
	<form action="" method="post">
		<div class="main">
			<div class="logo"></div>
			<?php if($done == false){?>
			<a class="text">Brugernavn</a> <input type="text" name="username"
				id="username" placeholder="Brugernavn" class="input"
				required="required"> <a class="text">Email</a><input type="email"
				name="useremail" id="useremail" placeholder="Email" class="input"
				required="required"> <a class="text">Hvad var yndlings dyr?</a> <input
				name="userQuestion" id="userQuestion" placeholder="Svar"
				class="input" required="required"><input type="submit"
				class="sendButton"
				onkeydown="if (event.keyCode == 13) { this.form.submit(); return false; }">
			<div style="color: red; text-align: center;">
				<?php
				
				echo $error;
			} else {
				echo "<center>", $header, "</b><br><br>", $message, "<br><input type='submit' value='Tilbage' </center>";
			}
			?>
			</div>
		</div>
	</form>
</body>
</html>