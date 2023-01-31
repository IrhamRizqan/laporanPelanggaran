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
                            Pelanggaran <small>siswa</small>
                        </h1>
                    </div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<!-- Advanced Tables -->
						<div class="panel panel-default">
							<div class="panel-heading">
								 Data Pelanggaran Siswa
							</div>
							<div class="panel-body">
								<?php
									if ($_GET[aksi]==''){
										echo "
										<div class='table-responsive'>
											<table class='table table-striped table-bordered table-hover' id='dataTables-example'>
												<thead class='table_row'>
													<tr>
														<th class='sorting_asc' width='15%' tabindex='0' aria-controls='example' rowspan='1' colspan='0.3'aria-label='Name: activate to sort column descending' aria-sort='ascending'>Nama</th>
														<th class='sorting' width='10%' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Position: activate to sort column ascending'>Kelas</th>
														<th class='sorting_asc' width='20%' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Name: activate to sort column descending' aria-sort='ascending'>Pelanggaran</th>
														<th class='sorting_asc' width='5%' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Age: activate to sort column descending' aria-sort='ascending'>Point</th>
														<th class='sorting_asc' width='5%' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Age: activate to sort column descending' aria-sort='ascending'>Tanggal</th>
														<th class='sorting_asc' width='20%' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Age: activate to sort column descending' aria-sort='ascending'>Kronologi</th>
														<th class='sorting_asc' width='10%' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Age: activate to sort column descending' aria-sort='ascending'>Status</th>
														<th class='sorting_asc' width='10%' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Age: activate to sort column descending' aria-sort='ascending'>Action</th>
													</tr>
												</thead>
												
										";
										$pelanggaran = mysql_query("SELECT tb_pelanggaran.kd_pel,tb_pelanggaran.nis,tb_pelanggaran.nama,tb_kelas.kelas,tb_sanksi.jns_pelanggaran,tb_pelanggaran.point,tb_pelanggaran.tanggal,tb_pelanggaran.kronologi,tb_pelanggaran.status FROM tb_pelanggaran, tb_kelas, tb_sanksi where tb_pelanggaran.kd_kelas=tb_kelas.kd_kelas AND tb_pelanggaran.kd_sanksi=tb_sanksi.kd_sanksi ORDER BY tb_pelanggaran.nama ASC");
										while ($data = mysql_fetch_array($pelanggaran)){
											echo " 
													<tr>
														<td class='odd' role='row'>$data[nama]</td>
														<td class='even' role='row'>$data[kelas]</td>
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
															<a href='koreksi.tambah?aksi=koreksi&kd=$data[kd_pel]' class='btn btn-info' title='Koreksi Pelanggaran'><i class='halflings-icon white edit'></i></a>
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
											window.location='pelanggaran'</script>";
									}
								?>
							</div>
						</div>
						<!--End Advanced Tables -->
					</div>
				</div>
            <!-- END ROW HERE  -->