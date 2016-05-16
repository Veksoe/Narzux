<?php
require "dba.php";
session_start ();

if (! isset ( $_SESSION ['login_user'] )) {
	echo "Error: Not logged in!";
	$login_session = "";
	// TODO: Make this site more usefull!
} else {
	
	$user_check = DB::esc ( $_SESSION ['login_user'] );
	
	$q = DB::query ( "SELECT Username FROM members WHERE Username = '$user_check'" );
	
	$row = mysqli_fetch_assoc ( $q );
	$login_session = $row ["Username"];
	echo "YOU ARE NOW LOGGED IN!
	<h1>
	Welcome ", $login_session, " 

<Input type='button' onclick='session_destroy()'>
</h1>";
}
?>
