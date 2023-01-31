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
                            Data Ruang kelas dan Wali kelas
                        </h1>
                    </div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<!-- Advanced Tables -->
						<div class="panel panel-default">
							<div class="panel-heading">
								 Tabel Kelas
							</div>
							<div class="panel-body">
								<?php
									if ($_GET[aksi]==''){
										echo "
										<a href='kelas?aksi=tambah-kelas' class='btn btn-success' title='Tambah'><i class='halflings-icon white plus'></i> Tambah Kelas</a><br><br>
										<div class='table-responsive'>
											<table class='table table-striped table-bordered table-hover' id='dataTables-example'>
												<thead class='table_row'>
													<tr>
														<th class='sorting_asc' tabindex='0' aria-controls='example' rowspan='1' colspan='0.3'aria-label='Name: activate to sort column descending' aria-sort='ascending'>Kode Kelas</th>
														<th class='sorting_asc' tabindex='0' aria-controls='example' rowspan='1' colspan='0.3'aria-label='Name: activate to sort column descending' aria-sort='ascending'>Ruang Kelas</th>
														<th class='sorting_asc' tabindex='0' aria-controls='example' rowspan='1' colspan='0.3'aria-label='Name: activate to sort column descending' aria-sort='ascending'>Wali Kelas</th>
														<th class='sorting_asc' width='15%' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Age: activate to sort column descending' aria-sort='ascending'>Action</th>
													</tr>
												</thead>
												
										";
										$kelas = mysql_query("SELECT * FROM tb_kelas ORDER BY kelas ASC");
										while ($row = mysql_fetch_array($kelas)){
											echo " 
													<tr>
														<td class='odd' role='row'>$row[kd_kelas]</td>
														<td class='odd' role='row'>$row[kelas]</td>
														<td class='even' role='row'>$row[wali_kelas]</td>
														<td class='odd' role='row'>
															<a href='kelas?aksi=edit&kd=$row[kd_kelas]' class='btn btn-info' title='Edit'><i class='halflings-icon white edit'></i></a>
															<a href='kelas?aksi=hapus&kd=$row[kd_kelas]' class='btn btn-danger' title='Hapus' onclick=\"return confirm('Yakin Akan Menghapus?')\"><i class='halflings-icon white trash'></i></a>
														</td>
													</tr>
											";
										}
										echo "</table>
										</div>";
										
									}
									elseif($_GET[aksi]=='tambah-kelas'){
										echo "
										<a href='kelas' class='btn btn-success' title='Kembali'><i class='halflings-icon white chevron-left'></i> Kembali</a><br><br>
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
															<fieldset><br>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Kode Kelas :</label>
																<div class='controls'>
																   <input class='input-large focused' id='focusedInput' type='text' name='kd_kelas'>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Ruang Kelas :</label>
																<div class='controls'>
																   <input class='input-large focused' id='focusedInput' type='text' name='kelas'>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Wali Kelas :</label>
																<div class='controls'>
																   <input class='input-large focused' id='focusedInput' type='text' name='wali-kelas'>
																</div>
															  </div>
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
										$kode = $_POST['kd_kelas'];
										$kelas = $_POST['kelas'];
										$wali = $_POST['wali-kelas'];
										
										$cekData="SELECT * from tb_kelas WHERE kelas='$kelas'";
										$cekData=mysql_query($cekData);
										$jumlah = mysql_num_rows($cekData);
											if($jumlah >0){
												echo "<script>window.alert('Maaf Kelas sudah ada di Database!');
														window.location='kelas?aksi=tambah-kelas'</script>";	
											}else{
											
												//insert ke tabel
												$query = "INSERT INTO tb_kelas(kd_kelas,kelas,wali_kelas) VALUES('$kode','$kelas','$wali')";
												$sql = mysql_query ($query) or die (mysql_error());
												if ($sql) {
													echo "<script>window.alert('Data telah Berhasil ditambahkan');
															window.location='kelas?aksi=tambah-kelas'</script>";
												}else{
													echo "<script>window.alert('Data Gagal ditambahkan');
															window.location='kelas?aksi=tambah-kelas'</script>";
												}
											}
										
									}
									elseif($_GET[aksi]=='edit'){
										$kd = $_GET[kd];
										$sql = mysql_query("Select * From tb_kelas where kd_kelas='$kd'");
										$row = mysql_fetch_array($sql);
										
										echo "
										<a href='kelas' class='btn btn-success' title='Kembali'><i class='halflings-icon white chevron-left'></i> Kembali</a><br><br>
											<div class='row-fluid sortable'>
												<div class='box'>
													<div class='box-header' data-original-title>
														<h2><i class='halflings-icon edit'></i><span class='break'></span>Edit Data Kelas</h2>
														<div class='box-icon'>
															<a href='#' class='btn-minimize'><i class='halflings-icon chevron-up'></i></a>
															<a href='#' class='btn-close'><i class='halflings-icon remove'></i></a>
														</div>
													</div>
													<div class='box-content'>
														<form class='form-horizontal' action='' method='POST' enctype='multipart/form-data'>
															<fieldset><br>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Kode Kelas :</label>
																<div class='controls'>
																   <input class='input-large focused' id='focusedInput' type='text' name='kd_kelas' value='$row[kd_kelas]' disabled>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Ruang Kelas :</label>
																<div class='controls'>
																   <input class='input-large focused' id='focusedInput' type='text' name='kelas' value='$row[kelas]'>
																</div>
															  </div>
															  <div class='control-group'>
																<label class='control-label' for='focusedInput'>Wali Kelas :</label>
																<div class='controls'>
																   <input class='input-large focused' id='focusedInput' type='text' name='wali-kelas' value='$row[wali_kelas]'>
																</div>
															  </div>
															  <div class='form-actions'>
																<button type='submit' name='edit' class='btn btn-primary'><i class='halflings-icon white edit'></i>&nbsp; Save</button>
																<input type='reset' name'reset value='Cancel' class='btn btn-info range2'>
															  </div>
															</fieldset>
														</form>
													</div>
												</div>
											
											</div>
										";
									}
									if (isset($_POST['edit'])) {
										$kd = $_GET[kd];
										$kelas = $_POST['kelas'];
										$wali = $_POST['wali-kelas'];
											
										//insert ke tabel
										$query = "UPDATE tb_kelas set kelas='$kelas', wali_kelas='$wali' where kd_kelas='$kd'";
										$sql = mysql_query ($query) or die (mysql_error());
										if ($sql) {
											echo "<script>window.alert('Data telah Berhasil diubah..');
													window.location='kelas'</script>";
										}else{
											echo "<script>window.alert('Data Gagal diubah..');
													window.location='kelas'</script>";
										}
									}
									elseif($_GET[aksi]=='hapus'){
										mysql_query("DELETE FROM tb_kelas where kd_kelas='$_GET[kd]'");
										echo "<script>window.alert('Sukses Hapus Data Kelas.');
											window.location='kelas'</script>";
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