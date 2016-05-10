<?php
include 'dba.php';
require "classes/ED.class.php";

$myusername = mysqli_real_escape_string ( DB::getMySQLiObject (), $_POST ["username"] );
$encrypted_txt = ED::encrypt ( $_POST ["userpassword"] );
$myuseremail = $_POST ["useremail"];
$date = date ( 'j/n-H:i' );
$sql = "INSERT INTO members (Username, Password, Email, Joindate, lastOnline) VALUES ('$myusername','$encrypted_txt','$myuseremail', '$date','$date')";
$q = DB::query ( $sql );

header ( "location:/Dashboard/Annika/PHP_Eclipse/Login/index.html" );
?>