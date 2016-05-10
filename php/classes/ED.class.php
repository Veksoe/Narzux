<?php
class ED {
	static function encrypt($value) {
		$output = false;
		
		$encrypt_method = "AES-256-CBC";
		$secret_key = 'This is my secret key';
		$secret_iv = 'This is my secret iv';
		
		$key = hash ( 'sha256', $secret_key );
		
		$iv = substr ( hash ( 'sha256', $secret_iv ), 0, 16 );
		
		$output = openssl_encrypt ( $value, $encrypt_method, $key, 0, $iv );
		$output = base64_encode ( $output );
		
		return $output;
	}
	static function decrypt($value) {
		$output = false;
		
		$encrypt_method = "AES-256-CBC";
		$secret_key = 'This is my secret key';
		$secret_iv = 'This is my secret iv';
		
		$key = hash ( 'sha256', $secret_key );
		
		$iv = substr ( hash ( 'sha256', $secret_iv ), 0, 16 );
		$output = openssl_decrypt ( base64_decode ( $value ), $encrypt_method, $key, 0, $iv );
		return $output;
	}
}