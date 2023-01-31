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
								 Data Siswa MTs Addarain
							</div>
							<div class="panel-body">
								<?php
									
									if ($_GET[aksi]=='edit'){
										$edit = mysql_query("SELECT * FROM tb_siswa where nis='$_GET[nis]'");
										$siswa = mysql_fetch_array($edit);
										if($siswa['jenkel'] == 'Laki-Laki'){
											$jk1="checked=\"checked\"";
										}else{
											$jk2="checked=\"checked\"";
										}
										
										list($thn,$bln,$tgl) = explode("-",$siswa['tgllahir']);
										
										echo "
										<a href='siswa' class='btn btn-success' title='Tambah'><i class='halflings-icon white chevron-left'></i> Kembali</a><br><br>
											<div class='row-fluid sortable'>
												<div class='box'>
													<div class='box-header' data-original-title>
														<h2><i class='halflings-icon edit'></i><span class='break'></span>Edit Data Siswa</h2>
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
																   <input class='input-xlarge focused' id='focusedInput' type='text' name='nis' value='$siswa[nis]'>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>NISN</label>
																<div class='controls'>
																   <input class='input-xlarge focused' id='focusedInput' type='text' name='nisn' value='$siswa[nisn]'>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Nama</label>
																<div class='controls'>
																	<input class='input-xlarge focused' id='focusedInput' type='text' name='nama' value='$siswa[nama]'>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Kelas</label>
																<div class='controls'>
																   <select data-placeholder='Pilih Kelas' id='selectError2' data-rel='chosen' name='kelas'>
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
																   <select data-placeholder='Pilih Jurusan' class='span4' id='selectError3' name='jurusan'>
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
																	<input type='radio' name='jenkel' id='optionsRadios1' value='Laki-Laki' $jk1;>  
																	Laki-Laki
																  </label>
																  <label class='radio'>
																	<input type='radio' name='jenkel' id='optionsRadios2' value='Perempuan' $jk2;>Perempuan
																  </label>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='disabledInput'>Tahun Masuk</label>
																<div class='controls'>
																   <select data-placeholder='Pilih Tahun Masuk' class='span4' id='selectError3' name='thn_masuk'>
																		<option value='' selected>- Tahun Masuk -</option>";
																			$i = 2010;
																			$now = date("Y");
																			$msk = $siswa[thn_masuk];
																			for($i;$i<=$now;$i++){
																				$sele = ($i==$msk)? "selected" : "";
																				echo "<option value='$i' $sele>$i</option>";
																			}
																			echo "
																	</select>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Asal Sekolah</label>
																<div class='controls'>
																	<input class='input-xlarge focused' id='focusedInput' type='text' name='asal_sekolah' value='$siswa[asal_sekolah]'>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='disabledInput'>Tanggal Lahir</label>
																<div class='controls'>
																  <select name='tgl' class='span2' id='selectError3'>";
																		for ($i=1; $i<=31; $i++) {
																			$tg = ($i<10) ? "0$i" : $i;
																			$sele = ($tg==$tgl)?"selected" : "";
																			echo "<option value='$tg' $sele>$tg</option>";	
																		}
																	echo "
																	</select> - 
																	<select name='bln' class='span2' id='selectError3'>";
																		for ($j=1; $j<=12; $j++) {
																			$bl = ($j<10) ? "0$j" : $j;
																			$sele = ($bl==$bln)?"selected" : "";
																			echo "<option value='$bl' $sele>$bl</option>";	
																		}
																	echo "
																	</select> - 
																	<select name='thn' class='span2' id='selectError3'>";
																		for ($i=1994; $i<=2000; $i++) {
																			$sele = ($i==$thn)?"selected" : "";
																			echo "<option value='$i' $sele>$i</option>";	
																		}
																	echo "
																	</select>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Nomor Telpon</label>
																<div class='controls'>
																	<input class='input-xlarge focused' id='focusedInput' type='text' name='no_telpon' value='$siswa[no_telpon]'>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Email</label>
																<div class='controls'>
																	<input class='input-xlarge focused' id='focusedInput' type='text' name='email' value='$siswa[email]'>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='disabledInput'>Agama</label>
																<div class='controls'>
																	<input class='input-xlarge focused' id='focusedInput' type='text' name='agama' value='$siswa[agama]'>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>No. Telpon Orang Tua</label>
																<div class='controls'>
																	<input class='input-xlarge focused' id='focusedInput' type='text' name='telpon_ortu' value='$siswa[telpon_ortu]'>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Alamat</label>
																<div class='controls'>
																  <textarea class='input-xlarge focused' id='focusedInput' name='alamat'>$siswa[alamat]</textarea>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='disabledInput'>Foto</label>
																<div class='controls'>
																	<img class='photo' src='assets/img/photos/$siswa[foto]'><br><br>
																	<input class='input-file' type='file' name='foto'>
																</div>
															  </div>
															  <div class='alert alert-danger'>
																	<strong>Pastikan!</strong> foto yang anda upload bertipe JPG/JPEG/PNG .
																</div>
															  <div class='form-actions'>
																<button type='submit' name='edit' class='btn btn-primary'><i class='halflings-icon white edit'></i>&nbsp; Save Data</button>
																<input type='reset' name='reset value='Cancel' class='btn btn-info range2'>
															  </div>
															</fieldset>
														</form>
													
													</div>
												</div>
											
											</div>
										";
									}
									if (isset($_POST[edit])){
										$errors = array();
										
										$nis = $_POST['nis'];
										$nisn = $_POST['nisn'];
										$nama = $_POST['nama'];
										$kelas = $_POST['kelas'];
										$jurusan = $_POST['jurusan'];
										$jenkel = $_POST['jenkel'];
										$thn_masuk = $_POST['thn_masuk'];
										$asal_sekolah = $_POST['asal_sekolah'];
										$tahun = $_POST['thn'];
										$bulan = $_POST['bln'];
										$tanggal = $_POST['tgl'];
										$tgllahir = $tahun."-".$bulan."-".$tanggal;
										$telpon = $_POST['no_telpon'];
										$email = $_POST['email'];
										$agama = $_POST['agama'];
										$telpon_ortu = $_POST['telpon_ortu'];
										$alamat = $_POST['alamat'];
										
										$dir_gambar = "../assets/img/photos/";
										$filename = basename($_FILES['foto']['name']);
										$uploadfile = $dir_gambar . $filename;
										
										if (empty($kelas)) {
											$errors[] = 'kelas masih kosong';
											echo "<script>window.alert('Jurusan masih belum dipilih!');
														window.location='siswa.edit?aksi=edit&nis=$a[nis]'</script>";
										}	
										if (empty($jurusan)) {
											$errors[] = 'jurusan masih kosong';
											echo "<script>window.alert('Jurusan masih belum dipilih!');
														window.location='siswa.edit?aksi=edit&nis=$a[nis]'</script>";
										}
										if (empty($nama)) {
											$errors[] = 'Nama Masih Kosong';
											echo "<script>window.alert('Nama Masih Kosong!');
														window.location='siswa.edit?aksi=edit&nis=$a[nis]'</script>";
										}
										if(!preg_match("/^[a-zA-Z .]*$/",$nama)){
											$errors[] = 'Format nama tidak benar';
											echo "<script>window.alert('Format Nama Hanya huruf , titik dan spasi yang diijinkan');
														window.location='siswa.edit?aksi=edit&nis=$a[nis]'</script>";
										}
										if(empty($telpon)){
											$errors[] = 'Nomor Telepon Masih Kosong';
											echo "<script>window.alert('No Telpon Masih Kosong!');
														window.location='siswa.edit?aksi=edit&nis=$a[nis]'</script>";
										}
										if(!preg_match("/^[0-9]*$/",$telpon)){
											$errors[] = 'Format Nomor Telepon Tidak Valid';
											echo "<script>window.alert('Format No Telepon Hanya angka yang diijinkan');
														window.location='siswa.edit?aksi=edit&nis=$a[nis]'</script>";
										}
										if(empty($alamat)){
											$errors[] = 'Alamat Masih Kosong';
											echo "<script>window.alert('Alamat Masih Kosong!');
														window.location='siswa.edit?aksi=edit&nis=$a[nis]'</script>";
										}
										if(empty($errors)){
											if($filename != ''){
												if (move_uploaded_file($_FILES['foto']['tmp_name'], $uploadfile)) {
												mysql_query("UPDATE tb_siswa set nisn = '$nisn',
																				  nama = '$nama',
																				  kd_kelas = '$kelas',
																				  kd_jurusan = '$jurusan',
																				  jenkel = '$jenkel',
																				  thn_masuk = '$thn_masuk',
																				  asal_sekolah = '$asal_sekolah',
																				  tgllahir = '$tgllahir',
																				  no_telpon = '$telpon',
																				  email = '$email',
																				  agama = '$agama',
																				  alamat = '$alamat',
																				  telpon_ortu = '$telpon_ortu',
																				  foto = '$filename' 
																				  where nis='$_GET[nis]'");
																			   
													echo "<script>window.alert('Sukses Edit Siswa.');
															window.location='siswa?aksi=edit&nis=$a[nis]'</script>";
												}else{
													echo "<script>window.alert('gagal Edit Siswa.');
															window.location='siswa?aksi=edit&nis=$a[nis]'</script>";
												}
											}else{
												mysql_query("UPDATE tb_siswa set nisn = '$nisn',
																				  nama = '$nama',
																				  kd_kelas = '$kelas',
																				  kd_jurusan = '$jurusan',
																				  jenkel = '$jenkel',
																				  thn_masuk = '$thn_masuk',
																				  asal_sekolah = '$asal_sekolah',
																				  tgllahir = '$tgllahir',
																				  no_telpon = '$telpon',
																				  email = '$email',
																				  agama = '$agama',
																				  alamat = '$alamat',
																				  telpon_ortu = '$telpon_ortu'
																				  where nis='$_GET[nis]'");
																			   
													echo "<script>window.alert('Sukses Edit Siswa.');
															window.location='siswa'</script>";
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