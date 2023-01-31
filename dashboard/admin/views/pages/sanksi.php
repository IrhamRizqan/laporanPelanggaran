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
                            Pelanggaran siswa <small>beserta poin dan sanksi</small>
                        </h1>
                    </div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<!-- Advanced Tables -->
						<div class="panel panel-default">
							<div class="panel-heading">
								 Tabel Sanksi
							</div>
							<div class="panel-body">
								<?php
									if ($_GET[aksi]==''){
										echo "
										<a href='sanksi.tambah?aksi=tambah' class='btn btn-success' title='Tambah'><i class='halflings-icon white plus'></i> Tambah Sanksi</a><br><br>
										<div class='table-responsive'>
											<table class='table table-striped table-bordered table-hover' id='dataTables-example'>
												<thead class='table_row'>
													<tr>
														<th class='sorting_asc' width='5% tabindex='0' aria-controls='example' rowspan='1' colspan='0.3'aria-label='Name: activate to sort column descending' aria-sort='ascending'>Kode</th>
														<th class='sorting_asc' width='30% tabindex='0' aria-controls='example' rowspan='1' colspan='0.3'aria-label='Name: activate to sort column descending' aria-sort='ascending'>Pelanggaran</th>
														<th class='sorting' width='5%' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Position: activate to sort column ascending'>Kategori</th>
														<th class='sorting_asc' width='5%' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Name: activate to sort column descending' aria-sort='ascending'>Point</th>
														<th class='sorting_asc' width='40%' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Name: activate to sort column descending' aria-sort='ascending'>Sanksi</th>
														<th class='sorting_asc' width='20% tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Age: activate to sort column descending' aria-sort='ascending'>Action</th>
													</tr>
												</thead>
												
										";
										$sanksi = mysql_query("SELECT tb_sanksi.kd_sanksi,tb_sanksi.jns_pelanggaran, tb_kategori.kategori, tb_sanksi.point, tb_sanksi.sanksi FROM tb_sanksi, tb_kategori where tb_sanksi.id_kategori=tb_kategori.id_kategori ORDER BY tb_sanksi.point ASC");
										while ($row = mysql_fetch_array($sanksi)){
											echo " 
													<tr>
														<td class='odd text-justify' role='row'>$row[kd_sanksi]</td>
														<td class='even text-justify' role='row'>$row[jns_pelanggaran]</td>
														<td class='odd' role='row'>$row[kategori]</td>
														<td class='even' role='row'>$row[point]</td>
														<td class='odd text-justify' role='row'>$row[sanksi]</td>
														<td class='even' role='row'>
															<a href='sanksi.edit?aksi=edit&kd_sanksi=$row[kd_sanksi]' class='btn btn-info' title='Edit'><i class='halflings-icon white edit'></i></a>
															<a href='sanksi?aksi=hapus&kd_sanksi=$row[kd_sanksi]' class='btn btn-danger' title='Hapus' onclick=\"return confirm('Yakin Akan Menghapus?')\"><i class='halflings-icon white trash'></i></a>
														</td>
													</tr>
											";
											
										}
										
										echo "</table>
										</div>";
									}
									
									elseif($_GET[aksi]=='hapus'){
										mysql_query("DELETE FROM tb_sanksi where kd_sanksi='$_GET[kd_sanksi]'");
										echo "<script>window.alert('Sukses Hapus Data Sanksi.');
											window.location='sanksi'</script>";
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