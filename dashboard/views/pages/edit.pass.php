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
                            User Profile
                        </h1>
                    </div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<!-- Advanced Tables -->
						<div class="panel panel-default">
							<div class="panel-heading">
								 Data Profil User
							</div>
							<div class="panel-body">
								<?php
									if ($_GET[aksi]=='edit'){
										$put = mysql_query("SELECT * FROM tb_users where id_user='$_GET[id]'");
										$id = mysql_fetch_array($put);
										
										echo "
											<div class='row-fluid sortable'>
												<div class='box'>
													<div class='box-header' data-original-title>
														<h2><i class='halflings-icon edit'></i><span class='break'></span>Ganti Password</h2>
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
																	<input class='input-xlarge focused span5' id='focusedInput' type='text' name='user' value='$id[username]'>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Password Baru</label>
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
															  <div class='form-actions'>
																<button type='submit' name='save' class='btn btn-primary'><i class='halflings-icon white edit'></i>&nbsp; Save Data</button>
																<a href='user.profile?aksi=profile&id=$id[id_user]' class='btn btn-success range2' title='Back'><i class='halflings-icon white chevron-left'></i> Kembali</a>
															  </div>
															</fieldset>
														</form>
													</div>
												</div>
											
											</div>
										";
									}
									if (isset($_POST[save])){
										$cekData="SELECT * from tb_users WHERE id_user='$_GET[id]'";
										$cekData=mysql_query($cekData);
										$cek = mysql_fetch_array($cekData);
										
										
										$user = $_POST['user'];
										$pass1 = $_POST['pass1'];
										$pass2 = $_POST['pass2'];
										$pass3 = $_POST['pass3'];
										
										if($username == ''){
											echo "<script>window.alert('Username Tidak Boleh Kosong!');
														window.location='pass.change?aksi=edit&id=$id[id_user]'</script>";
										}elseif($pass1 != $pass2){
											echo "<script>window.alert('Password Baru dan Konfirmasi Tidak Cocok');
														window.location='pass.change?aksi=edit&id=$id[id_user]'</script>";
										}else{
										
											$md5 = md5($pass2);
											
											//insert ke tabel
											$query = "UPDATE tb_users set username='$user', password='$md5' where id_user='$_GET[id]'";
											$sql = mysql_query ($query) or die (mysql_error());
											if ($sql) {
												echo "<script>window.alert('Data telah Berhasil di Simpan');
														window.location='user.profile?aksi=profile&id=$id[id_user]'</script>";
											}else{
												echo "<script>window.alert('Data Gagal di Simpan');
														window.location='user.profile.edit?aksi=edit&id=$id[id_user]'</script>";
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