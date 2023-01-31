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
								 Data Siswa MTS Addarain
							</div>
							<div class="panel-body">
								<?php
									
									if ($_GET[aksi]=='tambah'){
										echo "
										<a href='siswa' class='btn btn-success' title='Tambah'><i class='halflings-icon white chevron-left'></i> Kembali</a><br><br>
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
																<label class='control-label' for='focusedInput'>NIS</label>
																<div class='controls'>
																   <input class='input-xlarge focused' id='focusedInput' type='text' name='nis'>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>NISN</label>
																<div class='controls'>
																   <input class='input-xlarge focused' id='focusedInput' type='text' name='nisn'>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Nama</label>
																<div class='controls'>
																	<input class='input-xlarge focused' id='focusedInput' type='text' name='nama'>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Kelas</label>
																<div class='controls'>
																   <select data-placeholder='Pilih Kelas' id='selectError2' data-rel='chosen' name='kelas'>
																		<optgroup>
																		  <option value='' selected>- Pilih Kelas -</option>";
																				$kat = mysql_query("SELECT * FROM tb_kelas ORDER BY kelas ASC");
																				while ($k = mysql_fetch_array($kat)){
																					echo "<option value='$k[kd_kelas]'>$k[kelas]</option>";
																				}
																			echo "
																		</optgroup>
																	</select>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='disabledInput'>Jurusan</label>
																<div class='controls'>
																   <select data-placeholder='Pilih Jurusan' class='span4' id='selectError3' name='jurusan'>
																		<option value='' selected>- Pilih Jurusan -</option>";
																			$kat = mysql_query("SELECT * FROM tb_jurusan");
																			while ($k = mysql_fetch_array($kat)){
																				echo "<option value='$k[kd_jurusan]'>$k[jurusan]</option>";
																			}
																			echo "
																	</select>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Jenis Kelamin</label>
																<div class='controls'>
																  <label class='radio'>
																	<input type='radio' name='jenkel' id='optionsRadios1' value='Laki-Laki' checked=''>  
																	Laki-Laki
																  </label>
																  <label class='radio'>
																	<input type='radio' name='jenkel' id='optionsRadios2' value='Perempuan'>Perempuan
																  </label>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='disabledInput'>Tahun Masuk</label>
																<div class='controls'>
																   <select data-placeholder='Pilih Tahun Masuk' class='span4' id='selectError3' name='thn_masuk'>
																		<option value='' selected>- Tahun Masuk -</option>";
																			$i = 2010;
																			$thn = date("Y");
																			for($i;$i<=$thn;$i++){
																				echo "<option value='$i'>$i</option>";
																			}
																			echo "
																	</select>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Asal Sekolah</label>
																<div class='controls'>
																	<input class='input-xlarge focused' id='focusedInput' type='text' name='asal_sekolah'>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='disabledInput'>Tanggal Lahir</label>
																<div class='controls'>
																  <select name='tgl' class='span2' id='selectError3'>";
																		for ($i=1; $i<=31; $i++) {
																			$tg = ($i<10) ? "0$i" : $i;
																			echo "<option value='$tg'>$tg</option>";	
																		}
																	echo "
																	</select> - 
																	<select name='bln' class='span2' id='selectError3'>";
																		for ($j=1; $j<=12; $j++) {
																			$bl = ($j<10) ? "0$j" : $j;
																			echo "<option value='$bl'>$bl</option>";	
																		}
																	echo "
																	</select> - 
																	<select name='thn' class='span2' id='selectError3'>";
																		for ($k=1994; $k<=2000; $k++) {
																			echo "<option value='$k'>$k</option>";	
																		}
																	echo "
																	</select>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Nomor Telpon</label>
																<div class='controls'>
																	<input class='input-xlarge focused' id='focusedInput' type='text' name='no_telpon' maxlength='13'>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Email</label>
																<div class='controls'>
																	<input class='input-xlarge focused' id='focusedInput' type='email' name='email'>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='disabledInput'>Agama</label>
																<div class='controls'>
																	<input class='input-xlarge focused' id='focusedInput' type='text' name='agama'>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Alamat</label>
																<div class='controls'>
																  <textarea class='input-xlarge focused' id='focusedInput' name='alamat'></textarea>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>No. Telpon Orang Tua</label>
																<div class='controls'>
																	<input class='input-xlarge focused' id='focusedInput' type='text' name='telpon_ortu' maxlength='13'>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='disabledInput'>Foto</label>
																<div class='controls'>
																	<input class='input-file' type='file' name='foto'>
																</div>
															  </div>
															  <div class='alert alert-danger'>
																	<strong>Pastikan!</strong> Data siswa yang anda upload bertipe jpeg/jpg/png.
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
										$errors		= array();
										
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
										
										$dir="../assets/img/photos/";
										$lok_file		= $_FILES['foto']['tmp_name'];
										$tipe_file		= $_FILES['foto']['type'];
										$nama_file		= $_FILES['foto']['name'];
											
										if (strlen ($nis) != 8) {
											$errors[] = 'NIS harus 8 Digit';
											echo "<script>window.alert('NIS harus 8 digit!');
														window.location='siswa.tambah?aksi=tambah'</script>";
										}	
										if (empty($kelas)) {
											$errors[] = 'kelas masih kosong';
											echo "<script>window.alert('Kelas masih belum dipilih!');
														window.location='siswa.tambah?aksi=tambah'</script>";
										}	
										if (empty($jurusan)) {
											$errors[] = 'jurusan masih kosong';
											echo "<script>window.alert('Jurusan masih belum dipilih!');
														window.location='siswa.tambah?aksi=tambah'</script>";
										}
										if(!is_numeric($nis)){
											$errors[] = 'NIS harus berupa Angka';
											echo "<script>window.alert('NIS harus berupa angka!');
														window.location='siswa.tambah?aksi=tambah'</script>";
										}
										if (empty($nama)) {
											$errors[] = 'Nama Masih Kosong';
											echo "<script>window.alert('Nama Masih Kosong!');
														window.location='siswa.tambah?aksi=tambah'</script>";
										}
										if(!preg_match("/^[a-zA-Z .]*$/",$nama)){
											$errors[] = 'Format nama tidak benar';
											echo "<script>window.alert('Format Nama Hanya huruf , titik dan spasi yang diijinkan');
														window.location='siswa.tambah?aksi=tambah'</script>";
										}
										if(empty($telpon)){
											$errors[] = 'Nomor Telepon Masih Kosong';
											echo "<script>window.alert('No Telpon Masih Kosong!');
														window.location='siswa.tambah?aksi=tambah'</script>";
										}
										if(!preg_match("/^[0-9]*$/",$telpon)){
											$errors[] = 'Format Nomor Telepon Tidak Valid';
											echo "<script>window.alert('Format No Telepon Hanya angka yang diijinkan');
														window.location='siswa.tambah?aksi=tambah'</script>";
										}
										if(empty($alamat)){
											$errors[] = 'Alamat Masih Kosong';
											echo "<script>window.alert('Alamat Masih Kosong!');
														window.location='siswa.tambah?aksi=tambah'</script>";
										}
										$cekData="SELECT * from tb_siswa WHERE nis='$nis'";
										$cekData=mysql_query($cekData);
										$jumlah = mysql_num_rows($cekData);
										if($jumlah >0){
											$errors[] = "<script>window.alert('NIS Sudah ada di Database !');
														window.location='siswa.tambah?aksi=tambah'</script>";
										}
										
										if(empty($errors)){
											if($tipe_file == "image/jpeg" || $tipe_file == "image/jpg" || $tipe_file == "image/png" ){
												$acak			= rand(000000,999999);
												$nama_file_acak	= $acak .$nama_file;
												$dir_up			= $dir .$nama_file_acak;
												
												move_uploaded_file($lok_file,$dir_up);
													
												//insert ke tabel
												$query = "INSERT INTO tb_siswa(nis,nisn,nama,kd_kelas,kd_jurusan,jenkel,thn_masuk,asal_sekolah,tgllahir,no_telpon,email,agama,alamat,telpon_ortu,foto) VALUES('$nis','$nisn','$nama','$kelas','$jurusan','$jenkel','$thn_masuk','$asal_sekolah','$tgllahir','$telpon','$email','$agama','$alamat','$telpon_ortu','$nama_file_acak')";
												$sql = mysql_query ($query) or die (mysql_error());
												if ($sql) {
													echo mysql_error();
													echo "<script>window.alert('Data Siswa telah Berhasil ditambahkan !');
															window.location='siswa'</script>";
												}else{
													echo "<script>window.alert('Gagal Tambahkan Data Siswa..');
															window.location='siswa'</script>";
													
												}
											}else{
												echo "<script>window.alert('Format Foto Tidak Valid!');
															window.location='siswa'</script>";
												
											}
										}
									}
									
									elseif($_GET[aksi]=='import'){
										echo "
										<a href='siswa' class='btn btn-success' title='Kembali'><i class='halflings-icon white chevron-left'></i> Kembali</a><br><br>
											<div class='row-fluid sortable'>
												<div class='box'>
													<div class='box-header' data-original-title>
														<h2><i class='halflings-icon edit'></i><span class='break'></span>Import Data Siswa dari Excel</h2>
														<div class='box-icon'>
															<a href='#' class='btn-minimize'><i class='halflings-icon chevron-up'></i></a>
															<a href='#' class='btn-close'><i class='halflings-icon remove'></i></a>
														</div>
													</div>
													<div class='box-content'>
														<form class='form-horizontal' action='' method='POST' enctype='multipart/form-data'>
															<fieldset>
															<br>
															<br>
															  <div class='control-group'>
																<label class='control-label' for='disabledInput'>Upload File Excel </label>
																<div class='controls'>
																	<input class='input-file' type='file' name='fileexcel'>
																</div>
															  </div><br>
															  <div class='alert alert-danger'>
																	<strong>Pastikan! Excel format 97-2003 dan</strong> Data siswa yang anda upload memiliki field NIS, NISN, Nama, Kelas, Jurusan, Jenis Kelamin, Tahun Masuk, Tanggal Lahir, Asal Sekolah, Nomor Telepon Siswa, Email Siswa, Agama, Alamat, Nomor HP Siswa, Email, Agama, Nama Ayah, Nomor Telepon Orang Tua, Foto Siswa. Untuk Field Foto Masukan Nama Foto nya Beserta Ekstensi . Contoh : Siswa.jpg 
															  </div>
															  <div class='form-actions'>
																<button type='submit' name='import' class='btn btn-primary'><i class='halflings-icon white edit'></i>&nbsp; Import</button>
																<input type='reset' name'reset value='Cancel' class='btn btn-info range2'>
															  </div>
															</fieldset>
														</form>
													</div>
												</div>
											
											</div>
										";
									}
									if (isset($_POST['import'])) {
										include "excel_reader2.php";
										// file yang tadinya di upload, di simpan di temporary file PHP, file tersebut yang kita ambil
										// dan baca dengan PHP Excel Class
										$data = new Spreadsheet_Excel_Reader($_FILES['fileexcel']['tmp_name']);
										$hasildata = $data->rowcount($sheet_index=0);
										
										for ($i=2; $i<=$hasildata; $i++)
										{
										  
										  $nis = $data->val($i,1); 
										  $nisn = $data->val($i,2); 
										  $nama = $data->val($i,3);
										  $kelas = $data->val($i,4);
										  $jurusan = $data->val($i,5);
										  $jenkel = $data->val($i,6);
										  $thn_masuk = $data->val($i,7);
										  $asal_sekolah = $data->val($i,8);
										  $tgllahir = $data->val($i,9);
										  $telp_siswa = $data->val($i,10);
										  $email = $data->val($i,11);
										  $agama = $data->val($i,12);
										  $alamat = $data->val($i,13);
										  $telpon_ortu = $data->val($i,14);
										  $foto = $data->val($i,15);
										  

										$query = "INSERT INTO tb_siswa (nis, nisn, nama, kd_kelas, kd_jurusan, jenkel, thn_masuk, asal_sekolah, tgllahir, no_telpon, email, agama, alamat, telpon_ortu, foto) VALUES ('$nis', '$nisn', '$nama', '$kelas', '$jurusan', '$jenkel', '$thn_masuk', '$asal_sekolah', '$tgllahir', '$telp_siswa', '$email', '$agama', '$alamat', '$telpon_ortu', '$foto')";
										$hasil = mysql_query($query);

										}
										if ($hasil) {
											echo mysql_error();
											echo "<script>window.alert('Data Siswa telah Berhasil ditambahkan !');
														window.location='siswa'</script>";
										}else{
											echo mysql_error();
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