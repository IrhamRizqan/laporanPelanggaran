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
									if ($_GET[aksi]=='profile'){
										$put = mysql_query("SELECT * FROM tb_users where id_user='$_GET[id]'");
										$id = mysql_fetch_array($put);
										
										if($id['jenkel'] == 'Laki-Laki'){
											$jk1="checked=\"checked\"";
										}else{
											$jk2="checked=\"checked\"";
										}
										
										echo "
										<a href='admin.page' class='btn btn-success' title='Back'><i class='halflings-icon white chevron-left'></i> Kembali</a><br><br>
											<div class='row-fluid sortable'>
												<div class='box'>
													<div class='box-header' data-original-title>
														<h2><i class='halflings-icon edit'></i><span class='break'></span>Detail User Profile</h2>
														<div class='box-icon'>
															<a href='#' class='btn-minimize'><i class='halflings-icon chevron-up'></i></a>
															<a href='#' class='btn-close'><i class='halflings-icon remove'></i></a>
														</div>
													</div>
													<div class='box-content'>
														<form class='form-horizontal' action='' method='POST' enctype='multipart/form-data'>
															<fieldset>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Nama Lengkap</label>
																<div class='controls'>
																	<input class='input-xlarge disabled focused span5' id='focusedInput' type='text' name='nama' value='$id[nama_lengkap]' disabled>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Jenis Kelamin</label>
																<div class='controls'>
																  <label class='radio'>
																	<input type='radio' name='jenkel' id='optionsRadios1' value='Laki-Laki' $jk1; disabled>  
																	Laki-Laki
																  </label>
																  <label class='radio'>
																	<input type='radio' name='jenkel' id='optionsRadios2' value='Perempuan' $jk2; disabled>Perempuan
																  </label>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Nomor Telpon</label>
																<div class='controls'>
																	<input class='input-large focused span5' id='focusedInput' type='text' name='nama' value='$id[no_telpon]' disabled>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Alamat</label>
																<div class='controls'>
																  <textarea class='input-xlarge focused' id='focusedInput' name='alamat' disabled>$id[alamat]</textarea>
																</div>
															  </div>
															  <div class='form-actions'>
																<a href='edit.profile?aksi=edit&id=$id[id_user]' class='btn btn-primary' title='Edit Data User'><i class='halflings-icon white edit'></i> Edit Data</a>
																<a href='pass.change?aksi=edit&id=$id[id_user]' class='btn btn-info range2' title='Ganti Password'><i class='halflings-icon white edit'></i> Ganti Password</a>
															  </div>
															</fieldset>
														</form>
													</div>
												</div>
											
											</div>
										";
									}
									if (isset($_POST[edit])){
										$edit = mysql_query("SELECT * FROM tb_sanksi where kd_sanksi='$_GET[kd_sanksi]'");
										$sanksi = mysql_fetch_array($edit);
										
										$kode = $_POST['kode'];
										$pel = $_POST['pelanggaran'];
										$kategori = $_POST['id_kategori'];
										$point = $_POST['point'];
										$sanksi = $_POST['sanksi'];
										
										if($point>100){
											echo "<script>window.alert('Point Maksimal 100');
														window.location='sanksi?aksi=edit&kd_sanksi=$sanksi[kd_sanksi]'</script>";
										}else{
											
											//insert ke tabel
											$query = "UPDATE tb_sanksi set kd_sanksi='$kode', jns_pelanggaran='$pel', id_kategori='$kategori', point='$point', sanksi='$sanksi' where kd_sanksi='$_GET[kd_sanksi]'";
											$sql = mysql_query ($query) or die (mysql_error());
											if ($sql) {
												echo "<script>window.alert('Data telah Berhasil di Simpan');
														window.location='sanksi'</script>";
											}else{
												echo "<script>window.alert('Data Gagal di Simpan');
														window.location='sanksi?aksi=edit&kd_sanksi=$sanksi[kd_sanksi]'</script>";
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