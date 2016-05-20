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
		$myUserQustion = DB::esc ( ED::encrypt ( $_POST ["userQuestion"] ) );
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
	<div class="main">
		<div class="logo"></div>

		<form action="" method="post">
			<div id="error" class="text" style="margin-bottom: 0"></div>
			<input name="username" oninput="usernameTest('error',this.value)"
				placeholder="Brugernavn" required="required"><input name="useremail"
				type="email" oninput="emailTest('error',this.value)"
				placeholder="Email" required="required"> <input name="userpassword"
				type="password" placeholder="Kode" required="required"> <input
				name="userQuestion" placeholder="Hvad er yndlings dyr?"
				required="required"><input type="submit"
				onkeydown="if (event.keyCode == 13) { this.form.submit(); return false; }">

		</form>

	</div>
	<script type="text/javascript">
		var ready = false;

		function print(text) {
			console.log(text);
		}

		function getElement(id) {
			return document.getElementById(id);
		}

		function usernameTest(id, text) {
			if (text == "") {
				getElement(id).innerHTML = "";
				return;
			} else {
				if (window.XMLHttpRequest) {
					xmlhttp = new XMLHttpRequest();
				}
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						getElement(id).innerHTML = xmlhttp.responseText;
					}
				};
				xmlhttp.open("GET", "php/usernametest.php?A=" + text, true);
				xmlhttp.send();
			}

		}

		function emailTest(id, text) {

			getElement(id).style.color = "red";

			if (text.indexOf("@") != -1 && text.indexOf(".") != -1
					&& text.indexOf(".") != text.indexOf("@") + 1
					&& text.lastIndexOf(".") != text.length - 1) {
				getElement(id).style.color = "green";
				code = "This email is a valid email!";
				ready = true;
			} else {

				code = "This email isn't valid!";
				ready = false;
			}
			getElement(id).innerHTML = code;
		}
	</script>
</body>
</html>