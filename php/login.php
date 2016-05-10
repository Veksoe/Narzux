<?php
include 'dba.php';
require "classes/ED.class.php";
session_start ();
$myusername = DB::esc ( $_POST ["username"] );
$encrypted_txt = DB::esc ( ED::encrypt ( $_POST ["userpassword"] ) );
$date = date ( 'j/n-H:i' );

$q = DB::query ( "SELECT id FROM members WHERE Username = '$myusername' and Password = '$encrypted_txt'" );

$count = mysqli_num_rows ( $q );

if ($count == 1) {
	$q = DB::query ( "UPDATE members
	SET lastOnline='$date'
	WHERE Username = '$myusername' and Password = '$encrypted_txt'" );
	$_SESSION ['login_user'] = $myusername;
	header ( "location:/Dashboard/Annika/PHP_Eclipse/Login/Done.php" );
} else {
	echo "Your Login Name or Password is invalid";
	exit ();
}
?>

