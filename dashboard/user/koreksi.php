<?php
session_start();

require '../libs.php';

if ($_SESSION[id] == ''){
	echo "<script>window.alert('Maaf, Anda Harus Login Dulu.');
					window.location='login'</script>";
}else{

$data = array("title"=>"Dashboard - Koreksi Pelanggaran");

require 'views/sections/head.php';
require 'views/pages/koreksi.php';
require 'views/sections/footer.php';

}
?>