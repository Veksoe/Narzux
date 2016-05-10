<?php
require "classes/DB.class.php";
$dbOptions = array (
		'db_host' => 'localhost',
		'db_user' => 'root',
		'db_pass' => '',
		'db_name' => 'test' 
);
date_default_timezone_set ( 'Europe/Copenhagen' );
DB::init ( $dbOptions );
?>