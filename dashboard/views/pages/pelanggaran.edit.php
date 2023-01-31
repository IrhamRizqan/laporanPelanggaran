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
								 Edit Data Pelanggaran
							</div>
							<div class="panel-body">
								<?php
									if ($_GET[aksi]=='edit'){
										$edit = mysql_query("SELECT tb_pelanggaran.kd_pel,tb_pelanggaran.nis,tb_pelanggaran.nama,tb_pelanggaran.kd_kelas,tb_pelanggaran.kd_sanksi,tb_pelanggaran.point,tb_pelanggaran.sanksi,tb_pelanggaran.tanggal,tb_pelanggaran.kronologi,tb_pelanggaran.foto,tb_pelanggaran.status,tb_siswa.foto FROM tb_pelanggaran, tb_kelas, tb_sanksi, tb_siswa where kd_pel='$_GET[kd_pel]'");
										$pel = mysql_fetch_array($edit);
										if($pel['status'] == 1){
											$stat1="checked=\"checked\"";
										}else{
											$stat2="checked=\"checked\"";
										}
										
										echo "
										<a href='pelanggaran' class='btn btn-success' title='Kembali'><i class='halflings-icon white chevron-left'></i> Kembali</a><br><br>
											<div class='row-fluid sortable'>
												<div class='box'>
													<div class='box-header' data-original-title>
														<h2><i class='halflings-icon edit'></i><span class='break'></span>Edit Data Pelanggaran</h2>
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
																   <input class='input-xlarge disabled focused' id='focusedInput' type='text' name='nis' value='$pel[nis]'>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Nama</label>
																<div class='controls'>
																	<input class='input-xlarge disabled focused' id='focusedInput' type='text' name='nama' value='$pel[nama]'>
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
																					if ($pel[kd_kelas] == $k[kd_kelas]){
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
																					if ($pel[kd_sanksi] == $k[kd_sanksi]){
																						echo "<option value='$k[kd_sanksi]' selected data-point='$k[point]' data-sanksi='$k[sanksi]'>$k[jns_pelanggaran]</option>";
																					}else{
																						echo "<option value='$k[kd_sanksi]' data-point='$k[point]' data-sanksi='$k[sanksi]'>$k[jns_pelanggaran]</option>";
																					}
																				}
																			echo "
																	</select>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Point</label>
																<div class='controls'>
																	<input class='input-disabled disabled' id='point' type='text' name='point' value='$pel[point]'>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Sanksi</label>
																<div class='controls'>
																  <textarea class='input-xlarge disabled focused' id='sanksi' name='sanksi'>$pel[sanksi]</textarea>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Tanggal</label>
																<div class='controls'>
																	<input type='text' class='input-xlarge datepicker' data-beatpicker='true' name='tanggal' value='$pel[tanggal]'/>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Kronologi</label>
																<div class='controls'>
																  <textarea class='input-xlarge focused' id='focusedInput' name='kronologi'>$pel[kronologi]</textarea>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='disabledInput'>Foto</label>
																<div class='controls'>
																	";
																	$getData="SELECT * from tb_siswa WHERE nis='$pel[nis]'";
																	$cekData=mysql_query($getData);
																	$data = mysql_fetch_array($cekData);
																	$cekData="SELECT * from tb_pelanggaran WHERE kd_pel='$_GET[kd_pel]'";
																	$cekData=mysql_query($cekData);
																	$foto = mysql_fetch_array($cekData);
																	
																	if($foto[foto]==''){
																		echo "<img class='photo' src='assets/img/photos/$data[foto]'>";
																	}elseif($foto[foto]!=''){
																		echo "<img class='photo' src='assets/img/pelanggaran/$foto[foto]'>";
																	}
																	echo "
																	<br>
																	<input class='input-file' type='file' name='foto' value='$siswa[foto]'>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Status Sanksi</label>
																<div class='controls'>
																  <label class='radio'>
																	<input type='radio' name='status' id='optionsRadios1' value='1' $stat1>  
																	Terlaksana
																  </label>
																  &nbsp;&nbsp;
																  <label class='radio'>
																	<input type='radio' name='status' id='optionsRadios2' value='0' $stat2>Belum Terlaksana
																  </label>
																</div>
															  </div>
															  <div class='alert alert-danger'>
																	<strong>Masukan Foto</strong> Jika pada saat siswa melakukan pelanggaran di foto oleh pihak Guru, jika tidak foto akan default di ambil dari foto siswa.
																</div>
															  <div class='form-actions'>
																<button type='submit' name='edit' class='btn btn-primary'><i class='halflings-icon white edit'></i>&nbsp; Save</button>
																<input type='reset' name'reset' value='Cancel' class='btn btn-info range2'>
															  </div>
															</fieldset>
														</form>	
													</div>
												</div>
											
											</div>
										";
									}
									if (isset($_POST[edit])){
										$pelanggaran = $_POST['pelanggaran'];
										$point = $_POST['point'];
										$sanksi = $_POST['sanksi'];
										$tanggal = $_POST['tanggal'];
										$kronologi = $_POST['kronologi'];
										$status = $_POST['status'];
										
										$acak			= rand(000000,999999);
										$nama_file_acak	= $acak .$nama_file;
										$dir_gambar = "../assets/img/pelanggaran/";
										$nama_file		= $_FILES['foto']['name'];
										$uploadfile = $dir_gambar . $nama_file_acak;
										if($filename != ''){
											if (move_uploaded_file($_FILES['foto']['tmp_name'], $uploadfile)) {
											//update data tabel
											$query = "UPDATE tb_pelanggaran set kd_sanksi = '$pelanggaran',
																			    point = '$point',
																			    sanksi = '$sanksi',
																			    tanggal = '$tanggal',
																			    kronologi = '$kronologi',
																			    foto = '$nama_file_acak', 
																			    status = '$status'
																			    where kd_pel='$_GET[kd_pel]'";
											$sql = mysql_query ($query) or die (mysql_error());
																		   
												echo "<script>window.alert('Sukses Edit Data Pelanggaran');
														window.location='user.pelanggaran'</script>";
											}else{
												echo "<script>window.alert('Gagal Edit Data.');
														window.location='edit.pelanggaran?aksi=edit&kd_pel=$pel[kd_pel]'</script>";
											}
										}else{
											//update data tabel
											$query = "UPDATE tb_pelanggaran set kd_sanksi = '$pelanggaran',
																			    point = '$point',
																			    sanksi = '$sanksi',
																			    tanggal = '$tanggal',
																			    kronologi = '$kronologi',
																			    status = '$status'
																			    where kd_pel='$_GET[kd_pel]'";
											$sql = mysql_query ($query) or die (mysql_error());
											
											echo "<script>window.alert('Sukses Edit Data Pelanggaran.');
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