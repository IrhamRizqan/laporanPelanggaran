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
                            Pelanggaran <small>Siswa</small>
                        </h1>
                    </div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<!-- Advanced Tables -->
						<div class="panel panel-default">
							<div class="panel-heading">
								Tambah Data Pelanggaran Siswa
							</div>
							<!-- 
							$sql = "SELECT * FROM nama_tabel WHERE (tanggal BETWEEN '2007-12-01' AND '2008-01-01');";
							$sql = "SELECT * FROM orderbarang WHERE (tanggalorder BETWEEN '2007-12-01' AND '2008-01-01');";
							-->
							<!-- SELECT SUM(Quantity) AS TotalItemsOrdered FROM OrderDetails Where ProductID='11'; -->
							<div class="panel-body">
								<?php
									if ($_GET[aksi]=='tambah'){
										$tambah = mysql_query("SELECT * FROM tb_siswa where nis='$_GET[nis]'");
										$siswa = mysql_fetch_array($tambah);
										
										echo "
										<a href='pelanggaran' class='btn btn-success' title='Tambah'><i class='halflings-icon white chevron-left'></i> Kembali</a><br><br>
											<div class='row-fluid sortable'>
												<div class='box'>
													<div class='box-header' data-original-title>
														<h2><i class='halflings-icon edit'></i><span class='break'></span>Tambah Data Pelanggaran</h2>
														<div class='box-icon'>
															<a href='#' class='btn-minimize'><i class='halflings-icon chevron-up'></i></a>
															<a href='#' class='btn-close'><i class='halflings-icon remove'></i></a>
														</div>
													</div>
													<div class='box-content'>
														<form class='form-horizontal' action='' method='POST' enctype='multipart/form-data'>
															<fieldset>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>NIS</label>
																<div class='controls'>
																   <input class='input-xlarge disabled focused' id='focusedInput' type='text' name='nis' value='$siswa[nis]'>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Nama</label>
																<div class='controls'>
																	<input class='input-xlarge disabled focused' id='focusedInput' type='text' name='nama' value='$siswa[nama]'>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Kelas</label>
																<div class='controls'>
																   <select data-placeholder='Pilih Kelas' class='disabled' id='selectError2' name='kelas'>
																		<optgroup>
																		  <option value='0' selected>- Pilih Kelas -</option>";
																				$kat = mysql_query("SELECT * FROM tb_kelas");
																				while ($k = mysql_fetch_array($kat)){
																					if ($siswa[kd_kelas] == $k[kd_kelas]){
																						echo "<option value='$k[kd_kelas]' selected>$k[kelas]</option>";
																					}else{
																						echo "<option value='$k[kd_kelas]'>$k[kelas]</option>";
																					}
																				}
																			echo ";
																		</optgroup>
																	</select>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='disabledInput'>Pelanggaran</label>
																<div class='controls'>
																   <select data-placeholder='Pilih Pelanggaran' class='span12' id='pelanggaran' data-rel='chosen' name='pelanggaran'>
																		<option value='0' selected>- Pilih Pelanggaran -</option>";
																			$kat = mysql_query("SELECT * FROM tb_sanksi");
																			while ($k = mysql_fetch_array($kat)){
																				echo "<option value='$k[kd_sanksi]' data-point='$k[point]' data-sanksi='$k[sanksi]'>$k[jns_pelanggaran]</option>";
																			}
																			echo "
																	</select>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Point</label>
																<div class='controls'>
																	<input class='input-disabled disabled' id='point' type='text' name='point'>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Sanksi</label>
																<div class='controls'>
																  <textarea class='input-xlarge disabled focused' id='sanksi' name='sanksi'></textarea>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Tanggal</label>
																<div class='controls'>
																	<input type='text' class='input-xlarge datepicker' data-beatpicker='true' name='tanggal'/>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Kronologi</label>
																<div class='controls'>
																  <textarea class='input-xlarge focused' id='focusedInput' name='kronologi'></textarea>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='disabledInput'>Foto</label>
																<div class='controls'>
																	<img class='photo' src='assets/img/photos/$siswa[foto]'><br><br>
																	<input class='input-file' type='file' name='foto'>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Status Sanksi</label>
																<div class='controls'>
																  <label class='radio'>
																	<input type='radio' name='status' id='optionsRadios1' value='1' checked=''>  
																	Terlaksana
																  </label>
																  &nbsp;&nbsp;
																  <label class='radio'>
																	<input type='radio' name='status' id='optionsRadios2' value='0'>Belum Terlaksana
																  </label>
																</div>
															  </div>
															  <div class='alert alert-danger'>
																	<strong>Masukan Foto</strong> Jika pada saat siswa melakukan pelanggaran di foto oleh pihak Guru, jika tidak foto akan default di ambil dari foto siswa.
																</div>
															  <div class='form-actions'>
																<button type='submit' name='simpan' class='btn btn-primary'><i class='halflings-icon white edit'></i>&nbsp; Save</button>
																<input type='reset' name'reset' value='Cancel' class='btn btn-info range2'>
															  </div>
															</fieldset>
														</form>	
													</div>
												</div>
											
											</div>
										";
									}
									if (isset($_POST[simpan])){
										$nis = $_POST['nis'];
										$nama = $_POST['nama'];
										$kelas = $_POST['kelas'];
										$pelanggaran = $_POST['pelanggaran'];
										$point = $_POST['point'];
										$sanksi = $_POST['sanksi'];
										$tanggal = $_POST['tanggal'];
										$kronologi = $_POST['kronologi'];
										$status = $_POST['status'];
										
										$dir="../assets/img/pelanggaran/";
										$lok_file		= $_FILES['foto']['tmp_name'];
										$tipe_file		= $_FILES['foto']['type'];
										$nama_file		= $_FILES['foto']['name'];
										$filename = $_FILES['foto']['name'];
										
										if($filename != ''){
											if($tipe_file == "image/jpeg" || $tipe_file == "image/jpg" || $tipe_file == "image/png" ){
											$acak			= rand(000000,999999);
											$nama_file_acak	= $acak .$nama_file;
											$dir_up			= $dir .$nama_file_acak;
											
											move_uploaded_file($lok_file,$dir_up);
											
											//insert ke tabel
											$query = "INSERT INTO tb_pelanggaran(nis,nama,kd_kelas,kd_sanksi,point,sanksi,tanggal,kronologi,foto,status) VALUES('$nis','$nama','$kelas','$pelanggaran','$point','$sanksi','$tanggal','$kronologi','$nama_file_acak','$status')";
											$sql = mysql_query ($query) or die (mysql_error());
																		   
												echo "<script>window.alert('Sukses Simpan Data Pelanggaran');
														window.location='user.pelanggaran'</script>";
											}else{
												echo "<script>window.alert('Gagal Simpan Data.');
														window.location='tambah.pelanggaran?aksi=tambah&nis=$siswa[nis]'</script>";
											}
										}else{
											//insert ke tabel
											$query = "INSERT INTO tb_pelanggaran(nis,nama,kd_kelas,kd_sanksi,point,sanksi,tanggal,kronologi,status) VALUES('$nis','$nama','$kelas','$pelanggaran','$point','$sanksi','$tanggal','$kronologi','$status')";
											$sql = mysql_query ($query) or die (mysql_error());
											
											echo "<script>window.alert('Sukses SImpan Data Pelanggaran.');
														window.location='user.pelanggaran'</script>";
										}
									}
								?>
							</div>
						</div>
						<!--End Advanced Tables -->
					</div>
				</div>
            <!-- END ROW HERE -->
			<?php 
				include "foott.php";
			?>