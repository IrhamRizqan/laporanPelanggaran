<?php
session_start();

require '../libs.php';

$login = mysql_query("SELECT * FROM tb_users 
						where id_user=$_SESSION[id]");
$cek = mysql_num_rows($login);
$r = mysql_fetch_assoc($login);

if ($_SESSION[id] == ''){
	echo "<script>window.alert('Maaf, Anda Harus Login Dulu.');
					window.location='login'</script>";
}elseif($r[level] != 'user'){
	echo "<script>window.alert('Maaf, Anda Harus Login Sebagai User Dulu.');
					window.location='login'</script>";
}else{
$data = array("title"=>"Dashboard - Home");

require '../views/sections/head.php';
require '../views/pages/home.php';
require '../views/sections/footer.php';

}
?>