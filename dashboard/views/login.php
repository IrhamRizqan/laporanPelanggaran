<?php 
session_start();
require 'config.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $data['title'] ?></title>
		<!-- CSS styles -->
		<link href="assets/css/bootstrap.css" rel="stylesheet" />
		<link href="assets/css/halflings.css" rel="stylesheet" />
		<link href="assets/css/font-awesome.css" rel="stylesheet" />
		<link href="assets/css/style.css" rel="stylesheet">
	</head>

	<body>
	<div id="login-wrapper">
		<div class="row">	
			<div class="row">
				<div class="col-md-12 center login-header">
				</div>
			</div><!--/row-->

			<div class="row">
				<div class="well col-md-5 center">
					<div class="alert alert-info">
						Silahkan masukkan username dan password Anda.
					</div>
					<form class="form-horizontal" action="" method="post">
						<fieldset>
							<div class="input-group input-group-lg">
								<span class="input-group-addon"><i class="fa fa-user red"></i></span>
								<input type="text" class="form-control" placeholder="Username" name="username">
							</div>
							<div class="clearfix"></div><br>

							<div class="input-group input-group-lg">
								<span class="input-group-addon"><i class="fa fa-lock red"></i></span>
								<input type="password" class="form-control" placeholder="Password" name="password">
							</div>
							<div class="clearfix"></div>
							<br>
							<div class="controls center">
								<label class="checkbox inline">
									<input type="checkbox" id="inlineCheckbox1" value="option1"> Ingat password
								</label>
							</div>
							<div class="clearfix"></div>

							<p class="center col-md-5">
								<button type="submit" class="btn btn-primary btn-fw" name="login"><a href="index.php" class="white">Masuk</a></button>
							</p>
						</fieldset>
					</form>
				</div>
				<!--/span-->
			</div><!--/row-->
		</div><!--/fluid-row-->
	</div><!--/.fluid-container-->
	
	<!-- start: UI Elements -->

		<script src="assets/js/UI-Elements/jquery-1.9.1.min.js"></script>
		
		<script src="assets/js/UI-Elements/jquery-migrate-1.0.0.min.js"></script>
	
		<script src="assets/js/UI-Elements/jquery-ui-1.10.0.custom.min.js"></script>
	
		<script src="assets/js/UI-Elements/jquery.uniform.min.js"></script>
		
		<script src="assets/js/UI-Elements/jquery.cleditor.min.js"></script>
	
		<script src="assets/js/UI-Elements/jquery.noty.js"></script>
	
		<script src="assets/js/UI-Elements/custom.js"></script>
		
	<!-- end: UI Elements-->
    
	
</body>
</html>
<?php 
	if (isset($_POST[login])){
		$userlogin = $_POST[username];
		$passlgoin = $_POST[password];
		$login = mysql_query("SELECT * FROM tb_users 
					where username='$userlogin' AND password='$passlgoin'");
		$cek = mysql_num_rows($login);
		$r = mysql_fetch_assoc($login);
		$_SESSION[id] = $r['id_user'];
		$_SESSION[nama] = $r['nama_lengkap'];
		$_SESSION[level] = $r['level'];
		
		if ($cek >= 1){
			
				if ($r['level'] == 'admin'){
					echo "<script>window.alert('Selamat Datang Admin $r[nama_lengkap]');
					window.location='$config[site]admin.page'</script>";
				}elseif($r['level'] == 'user'){
					echo "<script>window.alert('Selamat Datang $r[nama_lengkap].');
					window.location='$config[site]user.page'</script>";
				}else{
					echo "<script>window.alert('Maaf, Username atau Password Anda Salah..');
					window.location='$config[site]login'</script>";
				}
		}else{
			echo "<script>window.alert('Maaf, Username atau Password Anda Salah..');
				window.location='login'</script>";
		}
	}
?>