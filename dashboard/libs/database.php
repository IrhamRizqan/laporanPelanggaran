<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		$mysqli = mysqli_connect("localhost","root","","poin");
		mysqli_select_db($mysqli, "poin") or die ('Database tidak ditemukan!!!');
?>