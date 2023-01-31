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
								 Tabel Sanksi
							</div>
							<div class="panel-body">
								<?php
									if($_GET[aksi]=='tambah'){
										echo "
										<a href='sanksi' class='btn btn-success' title='Tambah'><i class='halflings-icon white chevron-left'></i> Kembali</a><br><br>
											<div class='row-fluid sortable'>
												<div class='box'>
													<div class='box-header' data-original-title>
														<h2><i class='halflings-icon edit'></i><span class='break'></span>Tambah Data Pelanggaran & Sanksi</h2>
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
																   <input class='input-small focused' id='focusedInput' type='text' name='kode'>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Pelanggaran</label>
																<div class='controls'>
																	<input class='input-xlarge span9 focused' id='focusedInput' type='text' name='pelanggaran'>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='disabledInput'>Kategori</label>
																<div class='controls'>
																   <select data-placeholder='Pilih Kategori' class='span4' id='selectError3' name='id_kategori'>
																		<option value='0' selected>- Pilih Kategori -</option>";
																			$kat = mysql_query("SELECT * FROM tb_kategori");
																			while ($k = mysql_fetch_array($kat)){
																				echo "<option value='$k[id_kategori]'>$k[kategori]</option>";
																			}
																			echo "
																	</select>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Point [1-100]</label>
																<div class='controls'>
																	<input class='input-small focused' id='focusedInput' type='text' name='point'>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='disabledInput'>Sanksi</label>
																<div class='controls'>
																	<textarea class='ckeditor' name='sanksi'></textarea>
																</div>
															  </div>
															  <div class='form-actions'>
																<button type='submit' name='simpan' class='btn btn-primary'><i class='halflings-icon white edit'></i>&nbsp; Save</button>
																<input type='reset' name'reset value='Cancel' class='btn btn-info range2'>
															  </div>
															</fieldset>
														</form>
													</div>
												</div>
											
											</div>
										";
									}
									if (isset($_POST['simpan'])) {
										$kode = $_POST['kode'];
										$pel = $_POST['pelanggaran'];
										$kategori = $_POST['id_kategori'];
										$point = $_POST['point'];
										$sanksi = $_POST['sanksi'];
										
										if($point>100){
											echo "<script>window.alert('Point Maksimal 100!');
														window.location='sanksi.tambah?aksi=tambah'</script>";
										}else{
											$cekData="SELECT * from tb_sanksi WHERE kd_sanksi='$kode'";
											$cekData=mysql_query($cekData);
											$jumlah = mysql_num_rows($cekData);
											if($jumlah >0){
												echo "<script>window.alert('Maaf Kode sudah ada di Database!');
														window.location='sanksi.tambah?aksi=tambah'</script>";	
											}else{
											
												//insert ke tabel
												$query = "INSERT INTO tb_sanksi(kd_sanksi,jns_pelanggaran,id_kategori,point,sanksi) VALUES('$kode','$pel','$kategori','$point','$sanksi')";
												$sql = mysql_query ($query) or die (mysql_error());
												if ($sql) {
													echo "<script>window.alert('Data telah Berhasil ditambahkan !');
															window.location='sanksi'</script>";
												}else{
													echo "<script>window.alert('Data Gagal ditambahkan !');
															window.location='sanksi.tambah?aksi=tambah'</script>";
												}
											}
										}	
									}

								?>
							</div>
						</div>
						<!--End Advanced Tables -->
					</div>
				</div>
            <!-- END ROW HERE  
			
			<?php 
				include "foot.php";
			?>