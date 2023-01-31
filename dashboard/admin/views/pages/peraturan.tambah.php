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
                            Peraturan <small>di MTs Addarain</small>
                        </h1>
                    </div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<!-- Advanced Tables -->
						<div class="panel panel-default">
							<div class="panel-heading">
								 Tabel Peraturan
							</div>
							<div class="panel-body">
								<?php
									if ($_GET[aksi]=='tambah'){
										echo "
										<a href='peraturan' class='btn btn-success' title='Tambah'><i class='halflings-icon white chevron-left'></i> Kembali</a><br><br>
											<div class='row-fluid sortable'>
												<div class='box'>
													<div class='box-header' data-original-title>
														<h2><i class='halflings-icon edit'></i><span class='break'></span>Tambah Data peraturan</h2>
														<div class='box-icon'>
															<a href='#' class='btn-minimize'><i class='halflings-icon chevron-up'></i></a>
															<a href='#' class='btn-close'><i class='halflings-icon remove'></i></a>
														</div>
													</div>
													<div class='box-content'>
														<form class='form-horizontal' action='' method='POST' enctype='multipart/form-data'>
															<fieldset>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Kode Peraturan</label>
																<div class='controls'>
																   <input class='input-small focused' id='focusedInput' type='text' name='kode'>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>BAB</label>
																<div class='controls'>
																   <input class='input-xlarge focused' id='focusedInput' type='text' name='bab'>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Judul</label>
																<div class='controls'>
																   <input class='input-xlarge focused' id='focusedInput' type='text' name='judul'>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='disabledInput'>Peraturan</label>
																<div class='controls'>
																	<textarea class='ckeditor' name='peraturan'></textarea>
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
										$bab = $_POST['bab'];
										$judul = $_POST['judul'];
										$peraturan = $_POST['peraturan'];
										
										if(strlen($kode)!=5) {
											echo "<script>window.alert('Kode harus 5 digit!');
														window.location='peraturan?aksi=tambah'</script>";
										}else{
											$cekData="SELECT * from tb_peraturan WHERE kd_peraturan='$kode'";
											$cekData=mysql_query($cekData);
											$jumlah = mysql_num_rows($cekData);
											if($jumlah >0){
												echo "<script>window.alert('Maaf Kode sudah ada di Database!');
														window.location='peraturan?aksi=tambah'</script>";	
											}else{
											
												//insert ke tabel
												$query = "INSERT INTO tb_peraturan(kd_peraturan,BAB,Judul,Peraturan) VALUES('$kode','$bab','$judul','$peraturan')";
												$sql = mysql_query ($query) or die (mysql_error());
												if ($sql) {
													echo "<script>window.alert('Data telah Berhasil ditambahkan !');
															window.location='peraturan'</script>";
												}else{
													echo "<script>window.alert('Data Gagal ditambahkan !');
															window.location='peraturan.tambah?aksi=tambah'</script>";
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
            <!-- END ROW HERE  -->
			
			<?php 
				include "foot.php";
			?>