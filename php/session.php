<?php
require "dba.php";
session_start ();

$user_check = $_SESSION ['login_user'];

$q = DB::query ( "SELECT Username FROM members WHERE Username = '$user_check'");

$row = mysqli_fetch_assoc ( $q );
$login_session = $row ["Username"];

if (! isset ( $_SESSION ['login_user'] )) {
	header ( "location:login.php" );
}
?>