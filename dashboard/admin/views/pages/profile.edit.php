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
										if($id['jenkel'] == 'Laki-Laki'){
											$jk1="checked=\"checked\"";
										}else{
											$jk2="checked=\"checked\"";
										}
										
										echo "
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
																	<input class='input-xlarge focused span5' id='focusedInput' type='text' name='nama' value='$id[nama_lengkap]'>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Jenis Kelamin</label>
																<div class='controls'>
																  <label class='radio'>
																	<input type='radio' name='jenkel' id='optionsRadios1' value='Laki-Laki' $jk1;>  
																	Laki-Laki
																  </label>
																  <label class='radio'>
																	<input type='radio' name='jenkel' id='optionsRadios2' value='Perempuan' $jk2;>Perempuan
																  </label>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Nomor Telpon</label>
																<div class='controls'>
																	<input class='input-large focused span5' id='focusedInput' type='text' name='telpon' value='$id[no_telpon]' maxlength='12'>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Alamat</label>
																<div class='controls'>
																  <textarea class='input-xlarge focused' id='focusedInput' name='alamat'>$id[alamat]</textarea>
																</div>
															  </div>
															  <div class='form-actions'>
																<button type='submit' name='save' class='btn btn-primary'><i class='halflings-icon white edit'></i>&nbsp; Save Data</button>
																<a href='profile?aksi=profile&id=$id[id_user]' class='btn btn-success range2' title='Back'><i class='halflings-icon white chevron-left'></i> Kembali</a>
															  </div>
															</fieldset>
														</form>
													</div>
												</div>
											
											</div>
										";
									}
									if (isset($_POST[save])){
										
										$nama = $_POST['nama'];
										$jk = $_POST['jenkel'];
										$telpon = $_POST['telpon'];
										$alamat = $_POST['alamat'];
										
										if($nama==''){
											echo "<script>window.alert('Nama Masih Kosong');
														window.location='p?aksi=tambah'</script>";
										}elseif($telpon==''){
											echo "<script>window.alert('No Telpon Masih Kosong');
														window.location='siswa.tambah?aksi=tambah'</script>";
										}elseif($alamat==''){
											echo "<script>window.alert('Alamat Masih Kosong');
														window.location='siswa.tambah?aksi=tambah'</script>";
										}else{
											
											//insert ke tabel
											$query = "UPDATE tb_users set nama_lengkap='$nama', jenkel='$jk', no_telpon='$telpon', alamat='$alamat' where id_user='$_GET[id]'";
											$sql = mysql_query ($query) or die (mysql_error());
											if ($sql) {
												echo "<script>window.alert('Data telah Berhasil di Simpan');
														window.location='profile?aksi=profile&id=$id[id_user]'</script>";
											}else{
												echo "<script>window.alert('Data Gagal di Simpan');
														window.location='profile.edit?aksi=edit&id=$id[id_user]'</script>";
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