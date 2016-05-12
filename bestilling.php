<?php
include 'dba.php';

if (isset ( $_POST ["user_name"] )) {
	$name = $_POST ["user_name"];
	$msg = $_POST ["user_message"];
	$date = date ( 'j/n-H:i' );
	echo $date;
	
	$sql = "INSERT INTO Bestillingsbog (Time,Username, Msg) VALUES ('$date','$name', '$msg')";
	
	if ($conn->query ( $sql ) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	$conn->close ();
	header ( "Location: bestilling.php" );
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Bestilling</title>
<link type="text/css" rel="stylesheet" href="Css/style.css" />
</head>
<body>
	<div id="chatbox"><?php
	$sql2 = "SELECT* FROM Bestillingsbog";
	$result = $conn->query ( $sql2 );
	if ($result->num_rows > 0) {
		while ( $row = $result->fetch_assoc () ) {
			echo "<div class='msgln' ><i>(" . $row ["Time"] . ")</i> <b>" . $row ["Username"] . "</b>:<br>" . $row ["Msg"] . "<br></font></div>";
		}
	}
	$conn->close ();
	?></div>
	<form action="" method="post">
		<div>
			<label for="name">Navn:</label> <input type="text" id="name"
				name="user_name" required="required"></input>

		</div>
		<div>
			<label for="msg">Besked:</label>
			<textarea id="msg" name="user_message" required></textarea>
		</div>
		<div class="button">
			<button type="submit">Send</button>
		</div>
	</form>
</body>
</html>