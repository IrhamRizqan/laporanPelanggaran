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
								 Detail Gallery Siswa
							</div>
							<div class="panel-body">
								<?php
									if ($_GET[aksi]=='detail'){
										$nis = $_GET[nis];
										$query = mysql_query("select coalesce(total,0) as total,nama,nis,foto,jurusan,kd_gallery,deskripsi,kelas from(
										select sum(tp.point) as total ,ts.nama,ts.jenkel,ts.nis,ts.foto,tk.kelas as kelas,tj.jurusan as jurusan,tg.kd_gallery, tg.deskripsi as deskripsi from tb_pelanggaran tp 
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
														<h2><i class='halflings-icon edit'></i><span class='break'></span>Detail Gallery Siswa</h2>
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
																	<textarea class='ckeditor disabled' name='deskripsi' disabled>$data[deskripsi]</textarea>
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
															  <div class='form-actions'>
																<a href='edit.gallery?aksi=edit&kd=$_GET[kd]&nis=$data[nis]' class='btn btn-primary' title='Edit Data User'><i class='halflings-icon white edit'></i> Edit Data</a>
																<a href='gallery' class='btn range2 btn-success' title='Tambah'><i class='halflings-icon white chevron-left'></i> Kembali</a>
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
			
			<?php 
				include "foot.php";
			?>