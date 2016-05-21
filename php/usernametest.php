<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
if (isset ( $_GET ['A'] )) {
	include 'dba.php';
	$q = DB::esc ( $_GET ['A'] );
	$sql = "SELECT id FROM members WHERE Username = '$q' or Email = '$q'";
	$result = DB::query ( $sql );
	if (mysqli_num_rows ( $result ) >= 1) {
		echo "<div style='color:red;'>Brugernavnet er optaget";
	}
	DB::close ();
}
?>
</body>
</html>