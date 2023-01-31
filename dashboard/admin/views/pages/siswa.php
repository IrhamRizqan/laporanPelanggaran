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
									if ($_GET[aksi]==''){
										echo "
										<a href='siswa.tambah?aksi=tambah' class='btn btn-success' title='Tambah'><i class='halflings-icon white plus'></i> Tambah Siswa</a>
										<a href='siswa.tambah?aksi=import' class='btn btn-success' title='Tambah'><i class='halflings-icon white plus'></i> Import Excel </a><br><br>
										<div class='table-responsive'>
											<table class='table table-striped table-bordered table-hover' id='dataTables-example'>
												<thead class='table_row'>
													<tr>
														<th class='sorting_asc' tabindex='0' aria-controls='example' rowspan='1' colspan='0.3'aria-label='Name: activate to sort column descending' aria-sort='ascending'>NIS</th>
														<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Position: activate to sort column ascending'>Nama</th>
														<th class='sorting_asc' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Name: activate to sort column descending' aria-sort='ascending'>Kelas</th>
														<th class='sorting_asc' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Age: activate to sort column descending' aria-sort='ascending'>Jenis Kelamin</th>
														<th class='sorting_asc' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Age: activate to sort column descending' aria-sort='ascending'>Action</th>
													</tr>
												</thead>
												
										";
										$siswa = mysql_query("SELECT tb_siswa.nis,tb_siswa.nama,tb_kelas.kelas,tb_jurusan.jurusan,tb_siswa.jenkel FROM tb_siswa, tb_kelas, tb_jurusan where tb_siswa.kd_kelas=tb_kelas.kd_kelas AND tb_siswa.kd_jurusan=tb_jurusan.kd_jurusan ORDER BY tb_siswa.kd_kelas ASC");
										while ($a = mysql_fetch_array($siswa)){
											echo " 
													<tr>
														<td class='odd' role='row'>$a[nis]</td>
														<td class='even' role='row'>$a[nama]</td>
														<td class='odd' role='row'>$a[kelas]</td>
														<td class='odd' role='row'>$a[jenkel]</td>
														<td class='odd' role='row'>
															<a href='siswa.detail?aksi=detail&nis=$a[nis]' class='btn btn-success' title='Detail Siswa'><i class='halflings-icon white zoom-in'></i></a>
															<a href='siswa?aksi=hapus&nis=$a[nis]' class='btn btn-danger' title='Hapus' onclick=\"return confirm('Yakin Akan Menghapus?')\"><i class='halflings-icon white trash'></i></a>
														</td>
													</tr>
											";
										}
										echo "</table>
										</div>";
										
									}
									elseif($_GET[aksi]=='hapus'){
										$nis = $_GET[nis];
										/* 
										$sql = mysql_query("Select * From siswa where nis='$nis'");
										$row = mysql_fetch_array($sql);
										$dir="../assets/img/photos"; */
										/* 
										if(file_exists($dir.'/'.$row[foto])){
											($dir.'/'.$row[foto]); */
											//hapus data
											mysql_query("DELETE FROM tb_siswa where nis='$nis'");
											echo "<script>window.alert('Sukses Hapus Data Siswa.');
											window.location='siswa'</script>";
										/* } */
									}
									elseif($_GET[aksi]=='tambah-kelas'){
										echo "
										<a href='siswa' class='btn btn-success' title='Kembali'><i class='halflings-icon white chevron-left'></i> Kembali</a><br><br>
											<div class='row-fluid sortable'>
												<div class='box'>
													<div class='box-header' data-original-title>
														<h2><i class='halflings-icon edit'></i><span class='break'></span>Tambah Data Kelas</h2>
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
																<label class='control-label' for='focusedInput'>Ruang Kelas :</label>
																<div class='controls'>
																   <input class='input-large focused' id='focusedInput' type='text' name='kelas'>
																</div>
															  </div>
															  <br>
															  <div class='form-actions'>
																<button type='submit' name='tbhkelas' class='btn btn-primary'><i class='halflings-icon white edit'></i>&nbsp; Save</button>
																<input type='reset' name'reset value='Cancel' class='btn btn-info range2'>
															  </div>
															</fieldset>
														</form>
													</div>
												</div>
											
											</div>
										";
									}
									if (isset($_POST['tbhkelas'])) {
										$kelas = $_POST['kelas'];
										
										$cekData="SELECT * from tb_kelas WHERE kd_kelas='$kelas'";
										$cekData=mysql_query($cekData);
										$jumlah = mysql_num_rows($cekData);
											if($jumlah >0){
												echo "<script>window.alert('Maaf Kelas sudah ada di Database!');
														window.location='siswa?aksi=tambah-kelas'</script>";	
											}else{
											
												//insert ke tabel
												$query = "INSERT INTO tb_kelas(kelas) VALUES('$kelas')";
												$sql = mysql_query ($query) or die (mysql_error());
												if ($sql) {
													echo "<script>window.alert('Data telah Berhasil ditambahkan');
															window.location='siswa?aksi=tambah-kelas'</script>";
												}else{
													echo "<script>window.alert('Data Gagal ditambahkan');
															window.location='siswa?aksi=tambah-kelas'</script>";
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
				include "footer.php";
			?>