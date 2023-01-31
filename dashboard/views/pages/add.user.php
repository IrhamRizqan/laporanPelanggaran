<?php 
	require 'menu.php';
?>   
  <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
			<!--  ROW HERE  -->

                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Add Users
                        </h1>
                    </div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<!-- Advanced Tables -->
						<div class="panel panel-default">
							<div class="panel-heading">
								 Tambah Data Users
							</div>
							<div class="panel-body">
								<?php
									if ($_GET[aksi]=='tambah'){
										echo "
											<div class='row-fluid sortable'>
												<div class='box'>
													<div class='box-header' data-original-title>
														<h2><i class='halflings-icon edit'></i><span class='break'></span>Form Add Users</h2>
														<div class='box-icon'>
															<a href='#' class='btn-minimize'><i class='halflings-icon chevron-up'></i></a>
															<a href='#' class='btn-close'><i class='halflings-icon remove'></i></a>
														</div>
													</div>
													<div class='box-content'>
														<form class='form-horizontal' action='' method='POST' enctype='multipart/form-data'>
															<fieldset>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Username</label>
																<div class='controls'>
																	<input class='input-xlarge focused span5' id='focusedInput' type='text' name='user'>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Password</label>
																<div class='controls'>
																	<input class='input-xlarge focused span5' id='focusedInput' type='password' name='pass1'>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Konfirmasi Password</label>
																<div class='controls'>
																	<input class='input-xlarge focused span5' id='focusedInput' type='password' name='pass2'>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Nama Lengkap</label>
																<div class='controls'>
																	<input class='input-xlarge focused span5' id='focusedInput' type='text' name='nama'>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Jenis Kelamin</label>
																<div class='controls'>
																  <label class='radio'>
																	<input type='radio' name='jenkel' id='optionsRadios1' value='Laki-Laki' checked>  
																	Laki-Laki
																  </label>
																  <label class='radio'>
																	<input type='radio' name='jenkel' id='optionsRadios2' value='Perempuan'>Perempuan
																  </label>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Nomor Telpon</label>
																<div class='controls'>
																	<input class='input-large focused span5' id='focusedInput' type='text' name='telpon'>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Alamat</label>
																<div class='controls'>
																  <textarea class='input-xlarge focused' id='focusedInput' name='alamat'></textarea>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Jenis Kelamin</label>
																<div class='controls'>
																  <label class='radio'>
																	<input type='radio' name='level' id='optionsRadios1' value='admin' checked>  
																	Super Admin
																  </label>
																  <label class='radio'>
																	<input type='radio' name='level' id='optionsRadios2' value='user'>Guru
																  </label>
																</div>
															  </div>
															  <div class='form-actions'>
																<button type='submit' name='save' class='btn btn-primary'><i class='halflings-icon white edit'></i>&nbsp; Save Data</button>
																<a href='admin.page' class='btn btn-success range2' title='Back'><i class='halflings-icon white chevron-left'></i> Kembali</a>
															  </div>
															</fieldset>
														</form>
													</div>
												</div>
											
											</div>
										";
									}
									if (isset($_POST[save])){

										$user = $_POST['user'];
										$pass1 = $_POST['pass1'];
										$pass2 = $_POST['pass2'];
										$nama = $_POST['nama'];
										$jk = $_POST['jenkel'];
										$telpon = $_POST['telpon'];
										$alamat = $_POST['alamat'];
										$level = $_POST['level'];
										
										if($user == ''){
											echo "<script>window.alert('Username Masih Kosong');
														window.location='add.user?aksi=tambah'</script>";
										}elseif($pass1 ==''){
											echo "<script>window.alert('Password Masih Kosong');
														window.location='add.user?aksi=tambah'</script>";
										}elseif($pass2 ==''){
											echo "<script>window.alert('Konfirmasi Password Tidak Boleh Kosong');
														window.location='add.user?aksi=tambah'</script>";
										}elseif($pass1 != $pass2){
											echo "<script>window.alert('Password Tidak Sama!');
														window.location='add.user?aksi=tambah'</script>";
										}elseif($nama ==''){
											echo "<script>window.alert('Nama Masih Kosong');
														window.location='add.user?aksi=tambah'</script>";
										}elseif($telpon==''){
											echo "<script>window.alert('No Telpon Masih Kosong');
														window.location='add.user?aksi=tambah'</script>";
										}elseif($alamat==''){
											echo "<script>window.alert('Alamat Masih Kosong');
														window.location='add.user?aksi=tambah'</script>";
										}else{
											$md5 = md5($pass1);
											//insert ke tabel
											$query = "INSERT INTO tb_users(username,password,nama_lengkap,jenkel,no_telpon,alamat,level) VALUES('$user','$md5','$nama','$jk','$telpon','$alamat','$level')";
											$sql = mysql_query ($query) or die (mysql_error());
											if ($sql) {
												echo "<script>window.alert('Data telah Berhasil di Simpan');
														window.location='users.admin'</script>";
											}else{
												echo "<script>window.alert('Data Gagal di Simpan');
														window.location='add.user'</script>";
											}
										}	
									}

								?>
							</div>
						</div>
						<!--End Advanced Tables -->
					</div>
				</div>
            <!-- END ROW HERE  -->
			<?php 
				include "foot.php";
			?>