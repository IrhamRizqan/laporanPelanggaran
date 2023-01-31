<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

	$server = 'localhost';
	$username = 'root';
	$password = 'usbw';
	$database = 'poin';

	mysql_connect($server, $username, $password) or die ('koneksi gagal!!!');
	mysql_select_db($database) or die ('Database tidak ditemukan!!!');
?>