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
                            Gallery <small>Siswa</small>
                        </h1>
                    </div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<!-- Advanced Tables -->
						<div class="panel panel-default">
							<div class="panel-heading">
								 Edit Gallery Siswa
							</div>
							<div class="panel-body">
								<?php
									if ($_GET[aksi]=='edit'){
										$nis = $_GET[nis];
										$kd = $_GET[kd];
										$query = mysql_query("select coalesce(total,0) as total,nama,nis,foto,jurusan,deskripsi,kelas from(
										select sum(tp.point) as total ,ts.nama,ts.jenkel,ts.nis,ts.foto,tk.kelas as kelas,tj.jurusan as jurusan, tg.deskripsi as deskripsi from tb_pelanggaran tp 
										right join tb_siswa ts on ts.nis=tp.nis
										left join tb_kelas tk on tk.kd_kelas=ts.kd_kelas								
										left join tb_jurusan tj on tj.kd_jurusan=ts.kd_jurusan								
										left join tb_gallery tg on tg.nis=ts.nis								
										group by ts.nama,ts.nis 
										)x where nis='$nis' order by total DESC");
										$data = mysql_fetch_array($query);
										echo mysql_error();
										
										echo "
											<div class='row-fluid sortable'>
												<div class='box'>
													<div class='box-header' data-original-title>
														<h2><i class='halflings-icon edit'></i><span class='break'></span>Edit Data</h2>
														<div class='box-icon'>
															<a href='#' class='btn-minimize'><i class='halflings-icon chevron-up'></i></a>
															<a href='#' class='btn-close'><i class='halflings-icon remove'></i></a>
														</div>
													</div>
													<div class='box-content'>
														<br>
														<form class='form-horizontal' action='' method='POST' enctype='multipart/form-data'>
															<fieldset>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Nama</label>
																<div class='controls'>
																   <input class='input-xlarge disabled focused' id='focusedInput' type='text' name='nama' value='$data[nama]' disabled>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Kelas</label>
																<div class='controls'>
																   <input class='input-xlarge disabled focused' id='focusedInput' type='text' name='kelas' value='$data[kelas]' disabled>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Jurusan</label>
																<div class='controls'>
																   <input class='input-xlarge disabled focused' id='focusedInput' type='text' name='jurusan' value='$data[jurusan]' disabled>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Total Point</label>
																<div class='controls'>
																   <input class='input-xlarge disabled focused' id='focusedInput' type='text' name='total' value='$data[total]' disabled>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='disabledInput'>Deskripsi</label>
																<div class='controls'>
																	<textarea class='ckeditor' name='deskripsi'>$data[deskripsi]</textarea>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='disabledInput'>Foto</label>
																<div class='controls'>
																	";
																	$getData="SELECT * from tb_siswa WHERE nis='$_GET[nis]'";
																	$cekData=mysql_query($getData);
																	$data = mysql_fetch_array($cekData);
																	$cekData="SELECT * from tb_gallery WHERE kd_gallery='$_GET[kd]'";
																	$cekData=mysql_query($cekData);
																	$foto = mysql_fetch_array($cekData);
																	
																	if($foto[foto]==''){
																		echo "<img class='photo' src='assets/img/photos/$data[foto]'>";
																	}elseif($foto[foto]!=''){
																		echo "<img class='photo' src='assets/img/gallery/$foto[foto]'>";
																	}
																	echo "
																	<br><br>
																	<input class='input-file' type='file' name='foto' value='$siswa[foto]'>
																</div>
															  </div>
															  <div class='alert alert-danger'>
																	<strong>Masukan Foto</strong> Jika ada foto selain dari foto default siswa, jika tidak foto akan default di ambil dari foto siswa .
															   </div>
															  <div class='form-actions'>
																<button type='submit' name='edit' class='btn btn-primary'><i class='halflings-icon white edit'></i>&nbsp; Save Data</button>
																<a href='gallery' class='btn range2 btn-success' title='Tambah'><i class='halflings-icon white chevron-left'></i> Kembali</a>
															  </div>
															</fieldset>
														</form>
													</div>
												</div>
											
											</div>
										";
									}
									if (isset($_POST[edit])){
										$nis = $_GET['nis'];
										$kd = $_GET['kd'];
										$deskripsi = $_POST['deskripsi'];
										
										$dir="../assets/img/gallery/";
										$lok_file		= $_FILES['foto']['tmp_name'];
										$tipe_file		= $_FILES['foto']['type'];
										$nama_file		= $_FILES['foto']['name'];
										$filename = $_FILES['foto']['name'];
										
										$cekData="SELECT * from tb_gallery WHERE kd_gallery='$kd'";
										$cekData=mysql_query($cekData);
										$jumlah = mysql_num_rows($cekData);
										if($jumlah >0){
											if($filename != ''){
												if($tipe_file == "image/jpeg" || $tipe_file == "image/jpg" || $tipe_file == "image/png" || $tipe_file == "image/GIF" ){
												$acak			= rand(000000,999999);
												$nama_file_acak	= $acak .$nama_file;
												$dir_up			= $dir .$nama_file_acak;
												
												move_uploaded_file($lok_file,$dir_up);
												
												//insert ke tabel
												$query = "UPDATE tb_gallery set 	nis = '$nis',
																					deskripsi = '$deskripsi',
																					foto = '$nama_file_acak' 
																					where kd_gallery='$kd'";
												$sql = mysql_query ($query) or die (mysql_error());
																			   
													echo "<script>window.alert('Sukses Simpan Data');
															window.location='gallery'</script>";
												}else{
													echo "<script>window.alert('Gagal Simpan Data.');
															window.location='gallery'</script>";
												}
											}else{
												//insert ke tabel
												$query = "UPDATE tb_gallery set nis = '$nis',
																					deskripsi = '$deskripsi'
																					where kd_gallery='$kd'";
												echo mysql_error();
												$sql = mysql_query ($query) or die (mysql_error());
												echo "<script>window.alert('Sukses Simpan Data.');
															window.location='gallery'</script>";
												echo mysql_error();
											}
										}else{
											if($filename != ''){
												if($tipe_file == "image/jpeg" || $tipe_file == "image/jpg" || $tipe_file == "image/png" || $tipe_file == "image/GIF" ){
												$acak			= rand(000000,999999);
												$nama_file_acak	= $acak .$nama_file;
												$dir_up			= $dir .$nama_file_acak;
												
												move_uploaded_file($lok_file,$dir_up);
												
												//insert ke tabel
												$query = "INSERT INTO tb_gallery(nis,deskripsi,foto) VALUES('$nis','$deskripsi','$nama_file_acak')";
												$sql = mysql_query ($query) or die (mysql_error());
																			   
													echo "<script>window.alert('Sukses Simpan Data');
															window.location='gallery'</script>";
												}else{
													echo "<script>window.alert('Gagal Simpan Data.');
															window.location='gallery'</script>";
												}
											}else{
												//insert ke tabel
												$query = "INSERT INTO tb_gallery(nis,deskripsi) VALUES('$nis','$deskripsi')";
												$sql = mysql_query ($query) or die (mysql_error());
												echo "<script>window.alert('Sukses Simpan Data.');
															window.location='gallery'</script>";
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