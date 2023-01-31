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
									if ($_GET[aksi]==''){
										echo "
										<div class='table-responsive'>
											<table class='table table-striped table-bordered table-hover' id='dataTables-example'>
												<thead class='table_row'>
													<tr>
														<th class='sorting_asc' tabindex='0' aria-controls='example' rowspan='1' colspan='0.3'aria-label='Name: activate to sort column descending' aria-sort='ascending'>NIS</th>
														<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Position: activate to sort column ascending'>Nama</th>
														<th class='sorting_asc' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Name: activate to sort column descending' aria-sort='ascending'>Kelas</th>
														<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Position: activate to sort column ascending'>Jurusan</th>
														<th class='sorting_asc' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Age: activate to sort column descending' aria-sort='ascending'>Jenis Kelamin</th>
														<th class='sorting_asc' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Age: activate to sort column descending' aria-sort='ascending'>Action</th>
													</tr>
												</thead>
												
										";
										$siswa = mysql_query("SELECT tb_siswa.nis,tb_siswa.nama,tb_kelas.kelas,tb_jurusan.jurusan,tb_siswa.jenkel FROM tb_siswa, tb_kelas, tb_jurusan where tb_siswa.kd_kelas=tb_kelas.kd_kelas AND tb_siswa.kd_jurusan=tb_jurusan.kd_jurusan ORDER BY tb_siswa.nama ASC");
										while ($a = mysql_fetch_array($siswa)){
											echo " 
													<tr>
														<td class='odd' role='row'>$a[nis]</td>
														<td class='even' role='row'>$a[nama]</td>
														<td class='odd' role='row'>$a[kelas]</td>
														<td class='even' role='row'>$a[jurusan]</td>
														<td class='odd' role='row'>$a[jenkel]</td>
														<td class='odd' role='row'>
															<a href='detail.siswa?aksi=detail&nis=$a[nis]' class='btn btn-success' title='Detail Siswa'><i class='halflings-icon white zoom-in'></i></a>
														</td>
													</tr>
											";
										}
										echo "</table>
										</div>";
										
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