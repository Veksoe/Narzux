<?php
include 'dba.php';
require "classes/ED.class.php";

$myusername = mysqli_real_escape_string ( DB::getMySQLiObject (), $_POST ["username"] );
$myuseremail = $_POST ["useremail"];
$sql = "SELECT Password  FROM members WHERE Username = '$myusername' and Email = '$myuseremail'";
$q = DB::query ( $sql );

$count = mysqli_num_rows ( $q );
if ($count > 0) {
	
	$to = $myusername;
	$subject = "Narzux: Glemt kode";
	
	$message = "NARZUX web team ";
	$message .= "http://narzux.weebly.com/ ";
	
	$header = "Hej, ";
	$header .= $myuseremail;
	$header .= " \nDu har bedt om din kode til Narzux!\n";
	$header .= "Her står koden: ";
	
	while ( $row = $q->fetch_assoc () ) {
		$header .= $decrypted_txt = ED::decrypt ( $row ["Password"] );
	}
	$retval = mail ( $to, $subject, $message, $header );
	header ( "location:/Dashboard/Annika/PHP_Eclipse/Login/index.html" );
}

?>