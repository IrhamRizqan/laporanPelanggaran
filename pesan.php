<?php
require 'libs/libs.php'; 
	if (isset($_POST['send'])) {
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$telpon = $_POST['telpon'];
		$pesan = $_POST['pesan'];
		$wkt = date("Y-m-d H:i:s");
							
		$query = "INSERT INTO tb_pesan(nama,email,no_telepon,message,waktu) VALUES('$nama','$email','$telpon','$pesan','$wkt')";
		echo mysql_error();
		$sql = mysql_query ($query) or die (mysql_error());
		if ($sql) {
			header("Location:index.php");
		}else{
			echo "<script>window.alert('Maaf ada kesalahan..');
				window.location='index.php'</script>";
		}
							
	}
?>