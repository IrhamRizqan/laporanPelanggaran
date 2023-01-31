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
                            Pelanggaran siswa <small>beserta poin dan sanksi</small>
                        </h1>
                    </div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<!-- Advanced Tables -->
						<div class="panel panel-default">
							<div class="panel-heading">
								 Tabel Edit Sanksi
							</div>
							<div class="panel-body">
								<?php
									if ($_GET[aksi]=='edit'){
										$edit = mysql_query("SELECT * FROM tb_sanksi where kd_sanksi='$_GET[kd_sanksi]'");
										$sanksi = mysql_fetch_array($edit);
										
										echo "
										<a href='sanksi' class='btn btn-success' title='Tambah'><i class='halflings-icon white chevron-left'></i> Kembali</a><br><br>
											<div class='row-fluid sortable'>
												<div class='box'>
													<div class='box-header' data-original-title>
														<h2><i class='halflings-icon edit'></i><span class='break'></span>Tambah Data Siswa</h2>
														<div class='box-icon'>
															<a href='#' class='btn-minimize'><i class='halflings-icon chevron-up'></i></a>
															<a href='#' class='btn-close'><i class='halflings-icon remove'></i></a>
														</div>
													</div>
													<div class='box-content'>
														<form class='form-horizontal' action='' method='POST' enctype='multipart/form-data'>
															<fieldset>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Kode Sanksi</label>
																<div class='controls'>
																   <input class='input-small focused' id='focusedInput' type='text' name='kode' value='$sanksi[kd_sanksi]'>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Pelanggaran</label>
																<div class='controls'>
																	<input class='input-xlarge focused span7' id='focusedInput' type='text' name='pelanggaran' value='$sanksi[jns_pelanggaran]'>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='disabledInput'>Kategori</label>
																<div class='controls'>
																   <select data-placeholder='Pilih Kategori' class='span3' id='selectError3' name='id_kategori'>
																		<option value='0' selected>- Pilih Kategori -</option>";
																			$kat = mysql_query("SELECT * FROM tb_kategori");
																				while ($k = mysql_fetch_array($kat)){
																					if ($sanksi[id_kategori] == $k[id_kategori]){
																						echo "<option value='$k[id_kategori]' selected>$k[kategori]</option>";
																					}else{
																						echo "<option value='$k[id_kategori]'>$k[kategori]</option>";
																					}
																				}
																			echo "
																	</select>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Point [1-100]</label>
																<div class='controls'>
																	<input class='input-small focused' id='focusedInput' type='text' name='point' value='$sanksi[point]'>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='disabledInput'>Sanksi</label>
																<div class='controls'>
																	<textarea class='ckeditor' name='sanksi'>$sanksi[sanksi]</textarea>
																</div>
															  </div>
															  <div class='form-actions'>
																<button type='submit' name='edit' class='btn btn-primary'><i class='halflings-icon white edit'></i>&nbsp; Save</button>
																<input type='reset' name'reset value='Cancel' class='btn btn-info range2'>
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