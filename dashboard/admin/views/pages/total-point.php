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
                            Total Point <small>Pelanggaran Siswa</small>
                        </h1>
                    </div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<!-- Advanced Tables -->
						<div class="panel panel-default">
							<div class="panel-heading">
								 Total Point Pelanggaran Siswa MTs Addarain
							</div>
							<!-- SELECT SUM(Quantity) AS TotalItemsOrdered FROM OrderDetails Where ProductID='11'; -->
							<div class="panel-body">
								<?php
									if ($_GET[aksi]==''){
										echo "
										<div class='table-responsive'>
											<table class='table table-striped table-bordered table-hover' id='dataTables-example'>
												<thead class='table_row'>
													<tr>
														<th class='sorting_asc' tabindex='0' aria-controls='example' rowspan='1' colspan='0.3'aria-label='Name: activate to sort column descending' aria-sort='ascending'>NIS</th>
														<th class='sorting text-justify' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Position: activate to sort column ascending'>Nama</th>
														<th class='sorting_asc' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Name: activate to sort column descending' aria-sort='ascending'>Kelas</th>
														<th class='sorting_asc' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Age: activate to sort column descending' aria-sort='ascending'>Total Point</th>
														<th class='sorting_asc' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Age: activate to sort column descending' aria-sort='ascending'>Action</th>
													</tr>
												</thead>
												
										";
										
										$pel = mysql_query("select coalesce(total,0) as total,nama,nis,kelas from(
										select sum(tp.point) as total ,ts.nama,ts.nis,tk.kelas as kelas from tb_pelanggaran tp 
										right join tb_siswa ts on ts.nis=tp.nis
										left join tb_kelas tk on tk.kd_kelas=ts.kd_kelas								
										group by ts.nama,ts.nis 
										)x order by total DESC");
										while($a = mysql_fetch_array($pel)){
											echo " 
													<tr>
														<td class='odd' role='row'>$a[nis]</td>
														<td class='even text-justify' role='row'>$a[nama]</td>
														<td class='odd' role='row'>$a[kelas]</td>
														<td class='odd' role='row'>$a[total]</td>
														<td class='even' role='row'>
															<a href='pelanggaran.tambah?aksi=tambah&nis=$a[nis]' class='btn btn-success' title='Tambah Pelanggaran'><i class='halflings-icon white plus'></i></a>
														</td>
													</tr>
											";
										}
										echo "</table>
										</div>";
										
									}
									elseif($_GET[aksi]=='hapus'){
										mysql_query("DELETE FROM tb_siswa where nis='$_GET[nis]'");
										echo "<script>window.alert('Sukses Hapus Data Siswa.');
											window.location='$config[site]siswa'</script>";
									}
								?>
							</div>
						</div>
						<!--End Advanced Tables -->
					</div>
				</div>
            <!-- END ROW HERE  -->