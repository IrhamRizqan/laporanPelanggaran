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
                            Peraturan <small>di MTs Addarain</small>
                        </h1>
                    </div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<!-- Advanced Tables -->
						<div class="panel panel-default">
							<div class="panel-heading">
								 Tabel Peraturan
							</div>
							<div class="panel-body">
								<?php
									if ($_GET[aksi]==''){
										echo "
										<a href='peraturan.tambah?aksi=tambah' class='btn btn-success' title='Tambah'><i class='halflings-icon white plus'></i> Tambah Peraturan</a><br><br>
										<div class='table-responsive'>
											<table class='table table-striped table-bordered table-hover' id='dataTables-example'>
												<thead class='table_row'>
													<tr>
														<th class='sorting_asc' tabindex='0' aria-controls='example' rowspan='1' colspan='0.3'aria-label='Name: activate to sort column descending' aria-sort='ascending'>Kode</th>
														<th class='sorting_asc' tabindex='0' aria-controls='example' rowspan='1' colspan='0.3'aria-label='Name: activate to sort column descending' aria-sort='ascending'>BAB</th>
														<th class='sorting' width='20%' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Position: activate to sort column ascending'>Judul</th>
														<th class='sorting_asc' width='60%' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Name: activate to sort column descending' aria-sort='ascending'>Peraturan</th>
														<th class='sorting_asc' width='15%' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Age: activate to sort column descending' aria-sort='ascending'>Action</th>
													</tr>
												</thead>
												
										";
										$peraturan = mysql_query("SELECT * FROM tb_peraturan ORDER BY BAB ASC");
										while ($row = mysql_fetch_array($peraturan)){
											echo " 
													<tr>
														<td class='odd' role='row'>$row[kd_peraturan]</td>
														<td class='even' role='row'>$row[BAB]</td>
														<td class='odd' role='row'>$row[Judul]</td>
														<td class='even text-justify' role='row'>$row[Peraturan]</td>
														<td class='odd' role='row'>
															<a href='peraturan.edit?aksi=edit&kd_peraturan=$row[kd_peraturan]' class='btn btn-info' title='Edit'><i class='halflings-icon white edit'></i></a>
															<a href='peraturan?aksi=hapus&kd_peraturan=$row[kd_peraturan]' class='btn btn-danger' title='Hapus' onclick=\"return confirm('Yakin Akan Menghapus?')\"><i class='halflings-icon white trash'></i></a>
														</td>
													</tr>
											";
										}
										echo "</table>
										</div>";
										
									}
									elseif($_GET[aksi]=='hapus'){
										mysql_query("DELETE FROM tb_peraturan where kd_peraturan='$_GET[kd_peraturan]'");
										echo "<script>window.alert('Sukses Hapus Data Peraturan.');
											window.location='peraturan'</script>";
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