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
                            Siswa <small>area data siswa</small>
                        </h1>
                    </div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<!-- Advanced Tables -->
						<div class="panel panel-default">
							<div class="panel-heading">
								 Data Siswa SMK Adi Sanggoro
							</div>
							<div class="panel-body">
								<?php
									
									if ($_GET[aksi]=='detail'){
										$detail = mysql_query("SELECT * FROM tb_siswa where nis='$_GET[nis]'");
										$siswa = mysql_fetch_array($detail);
										if($siswa['jenkel'] == 'Laki-Laki'){
											$jk1="checked=\"checked\"";
										}else{
											$jk2="checked=\"checked\"";
										}
										echo "
										<a href='siswa' class='btn btn-success' title='Back'><i class='halflings-icon white chevron-left'></i> Kembali</a><br><br>
											<div class='row-fluid sortable'>
												<div class='box'>
													<div class='box-header' data-original-title>
														<h2><i class='halflings-icon edit'></i><span class='break'></span>Details Siswa</h2>
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
																   <input class='input-xlarge disabled focused' id='focusedInput' type='text' name='nis' value='$siswa[nis]' disabled>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Nama</label>
																<div class='controls'>
																	<input class='input-xlarge disabled focused' id='focusedInput' type='text' name='nama' value='$siswa[nama]' disabled>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Kelas</label>
																<div class='controls'>
																   <select data-placeholder='Pilih Kelas' id='selectError2' data-rel='chosen' class='disabled' name='kelas' disabled>
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
																<label class='control-label' for='disabledInput'>Jurusan</label>
																<div class='controls'>
																   <select data-placeholder='Pilih Jurusan' class='span4' id='selectError3' name='jurusan' disabled>
																		<option value='0' selected>- Pilih Jurusan -</option>";
																			$kat = mysql_query("SELECT * FROM tb_jurusan");
																			while ($k = mysql_fetch_array($kat)){
																				if ($siswa[kd_jurusan] == $k[kd_jurusan]){
																						echo "<option value='$k[kd_jurusan]' selected>$k[jurusan]</option>";
																					}else{
																						echo "<option value='$k[kd_jurusan]'>$k[jurusan]</option>";
																					}
																			}
																			echo "
																	</select>
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
																	<input class='input-xlarge focused disabled' id='focusedInput' type='text' name='no_telpon' value='$siswa[no_telpon]' disabled>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Alamat</label>
																<div class='controls'>
																  <textarea class='input-xlarge disabled focused' id='focusedInput' name='alamat' disabled>$siswa[alamat]</textarea>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='disabledInput'>Foto</label>
																<div class='controls'>
																	<img class='photo' src='assets/img/photos/$siswa[foto]'><br><br>
																	<input class='input-file' type='file' name='foto' disabled>
																</div>
															  </div>
															  <div class='alert alert-danger'>
																	<strong>Pastikan!</strong> foto yang anda upload bertipe JPG/JPEG/PNG .
																</div>
															  <div class='form-actions'>
																<a href='siswa.edit?aksi=edit&nis=$siswa[nis]' class='btn btn-primary' title='Edit Data Siswa'><i class='halflings-icon white edit'></i> Edit Data</a>
																<a href='siswa?aksi=hapus&nis=$siswa[nis]' class='btn btn-danger range2' title='Hapus Data' onclick=\"return confirm('Yakin Akan Menghapus?')\"><i class='halflings-icon white trash'></i> Hapus Data</a>
															  </div>
															</fieldset>
														</form>
													
													</div>
												</div>
											
											</div>
										";
									}									
								?>
							</div>
						</div>
						<!--End Advanced Tables -->
					</div>
				</div>
            <!-- END ROW HERE  -->
			
			<div class="row">
					<div class="col-md-12">
						<!-- Advanced Tables -->
						<div class="panel panel-default">
							<div class="panel-heading">
								 History Pelanggaran
							</div>
							<div class="panel-body">
								<?php
									if ($_GET[aksi]=='detail'){
										echo "
										<div class='table-responsive'>
											<table class='table table-striped table-bordered table-hover' id='dataTables-example'>
												<thead class='table_row'>
													<tr>
														<th class='sorting_asc' width='30%' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Name: activate to sort column descending' aria-sort='ascending'>Pelanggaran</th>
														<th class='sorting_asc' width='5%' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Age: activate to sort column descending' aria-sort='ascending'>Point</th>
														<th class='sorting_asc' width='10%' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Age: activate to sort column descending' aria-sort='ascending'>Tanggal</th>
														<th class='sorting_asc' width='25%' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Age: activate to sort column descending' aria-sort='ascending'>Kronologi</th>
														<th class='sorting_asc' width='15%' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Age: activate to sort column descending' aria-sort='ascending'>Status</th>
														<th class='sorting_asc' width='15%' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Age: activate to sort column descending' aria-sort='ascending'>Action</th>
													</tr>
												</thead>
												
										";
										$pelanggaran = mysql_query("SELECT tb_pelanggaran.kd_pel,tb_pelanggaran.nis,tb_pelanggaran.nama,tb_kelas.kelas,tb_sanksi.jns_pelanggaran,tb_pelanggaran.point,tb_pelanggaran.tanggal,tb_pelanggaran.kronologi,tb_pelanggaran.status FROM tb_pelanggaran, tb_kelas, tb_sanksi where tb_pelanggaran.kd_kelas=tb_kelas.kd_kelas AND tb_pelanggaran.kd_sanksi=tb_sanksi.kd_sanksi AND nis='$siswa[nis]'");
										while ($data = mysql_fetch_array($pelanggaran)){
											echo " 
													<tr>
														<td class='odd text-justify' role='row'>$data[jns_pelanggaran]</td>
														<td class='even' role='row'>$data[point]</td>
														<td class='odd' role='row'>$data[tanggal]</td>
														<td class='even text-justify' role='row'>$data[kronologi]</td>
														<td class='odd' role='row'>";
															if($data[status]==1){
																echo "Terlaksana"; 
															}else{
																echo "Belum Terlaksana";
															}
															
														echo "
														</td>
														<td class='even' role='row'>
															<a href='edit.pelanggaran?aksi=edit&kd_pel=$data[kd_pel]' class='btn btn-info' title='Tambah Pelanggaran'><i class='halflings-icon white edit'></i></a>
															<a href='siswa.detail?aksi=hapus&kd_pel=$data[kd_pel]' class='btn btn-danger' title='Hapus' onclick=\"return confirm('Yakin Akan Menghapus?')\"><i class='halflings-icon white trash'></i></a>
														</td>
													</tr>
											";
										}
										echo "</table>
										</div>";
										
									}
									elseif($_GET[aksi]=='hapus'){
										mysql_query("DELETE FROM tb_pelanggaran where kd_pel='$_GET[kd_pel]'");
										echo "<script>window.alert('Sukses Hapus Data pelanggaran.');
											window.location='siswa'</script>";
									}
								?>
							</div>
						</div>
						<!--End Advanced Tables -->
					</div>
				</div>
            <!-- END ROW HERE  -->
			<?php 
				include "footer.php";
			?>