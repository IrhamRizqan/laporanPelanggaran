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
                            Detail Koreksi Pelanggaran
                        </h1>
                    </div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<!-- Advanced Tables -->
						<div class="panel panel-default">
							<div class="panel-heading">
								 Koreksi Data Pelanggaran
							</div>
							<div class="panel-body">
								<?php
									if ($_GET[aksi]=='detail'){
										$sql = mysql_query("SELECT tb_koreksi.title,tb_koreksi.message,tb_pelanggaran.kd_pel,tb_pelanggaran.nis,tb_pelanggaran.nama,tb_pelanggaran.kd_kelas,tb_pelanggaran.kd_sanksi,tb_pelanggaran.point,tb_pelanggaran.sanksi,tb_pelanggaran.tanggal,tb_pelanggaran.kronologi,tb_pelanggaran.foto,tb_pelanggaran.status,tb_siswa.foto FROM tb_pelanggaran, tb_kelas, tb_sanksi, tb_siswa, tb_koreksi where tb_koreksi.kd_pel=tb_pelanggaran.kd_pel AND kd_koreksi='$_GET[kd]'");
										$row = mysql_fetch_array($sql);
										if($row['status'] == 1){
											$stat1="checked=\"checked\"";
										}else{
											$stat2="checked=\"checked\"";
										}
										
										echo "
										<a href='koreksi' class='btn btn-success' title='Kembali'><i class='halflings-icon white chevron-left'></i> Kembali</a><br><br>
											<div class='row-fluid sortable'>
												<div class='box'>
													<div class='box-header' data-original-title>
														<h2><i class='halflings-icon edit'></i><span class='break'></span>Detail Koreksi Pelanggaran Siswa</h2>
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
																   <input class='input-xlarge disabled focused' id='focusedInput' type='text' name='nis' value='$row[nis]' disabled>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Nama</label>
																<div class='controls'>
																	<input class='input-xlarge disabled focused' id='focusedInput' type='text' name='nama' value='$row[nama]' disabled>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Kelas</label>
																<div class='controls'>
																   <select data-placeholder='Pilih Kelas' class='disabled' id='selectError2' name='kelas' disabled>
																		<optgroup>
																		  <option value='0' selected>- Pilih Kelas -</option>";
																				$kat = mysql_query("SELECT * FROM tb_kelas");
																				while ($k = mysql_fetch_array($kat)){
																					if ($row[kd_kelas] == $k[kd_kelas]){
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
																   <select data-placeholder='Pilih Pelanggaran' class='span12' id='pelanggaran' data-rel='chosen' name='pelanggaran' disabled>
																		<option value='0' selected>- Pilih Pelanggaran -</option>";
																			$kat = mysql_query("SELECT * FROM tb_sanksi");
																				while ($k = mysql_fetch_array($kat)){
																					if ($row[kd_sanksi] == $k[kd_sanksi]){
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
																	<input class='input-disabled disabled' id='point' type='text' name='point' value='$row[point]' disabled>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Sanksi</label>
																<div class='controls'>
																  <textarea class='input-xlarge disabled focused' id='sanksi' name='sanksi' disabled>$row[sanksi]</textarea>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Tanggal</label>
																<div class='controls'>
																	<input type='text' class='input-xlarge disabled datepicker' data-beatpicker='true' name='tanggal' value='$row[tanggal]' disabled/>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Kronologi</label>
																<div class='controls'>
																  <textarea class='input-xlarge focused' id='focusedInput' name='kronologi' disabled>$row[kronologi]</textarea>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='disabledInput'>Foto</label>
																<div class='controls'>
																	";
																	$getData="SELECT * from tb_siswa WHERE nis='$row[nis]'";
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
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Status Sanksi</label>
																<div class='controls'>
																  <label class='radio'>
																	<input type='radio' name='status' id='optionsRadios1' value='1' $stat1 disabled>  
																	Terlaksana
																  </label>
																  &nbsp;&nbsp;
																  <label class='radio'>
																	<input type='radio' name='status' id='optionsRadios2' value='0' $stat2 disabled>Belum Terlaksana
																  </label>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Title</label>
																<div class='controls'>
																   <input class='input-xlarge disabled focused' id='focusedInput' type='text' name='title' value='$row[title]' disabled>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='disabledInput'>Messages</label>
																<div class='controls'>
																	<textarea class='ckeditor disabled' name='message' disabled>$row[message]</textarea>
																</div>
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
            <!-- END ROW HERE -->
			<?php 
				include "foot.php";
			?>