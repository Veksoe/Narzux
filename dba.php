<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
date_default_timezone_set ( 'Europe/Copenhagen' );
$conn = new mysqli ( $servername, $username, $password, $dbname );
if ($conn->connect_error) {
	die ( "Connection failed: " . $conn->connect_error );
}
?>