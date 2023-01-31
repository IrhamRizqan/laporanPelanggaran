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
                            Total Point Per Kelas
                        </h1>
                    </div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<!-- Advanced Tables -->
						<div class="panel panel-default">
							<div class="panel-heading">
								 Data Siswa Per Kelas
							</div>
							<!-- SELECT SUM(Quantity) AS TotalItemsOrdered FROM OrderDetails Where ProductID='11'; -->
							<div class="panel-body">
								<?php
									if ($_GET[aksi]==''){
										echo "
										<a href='cetak.kelas?kd=$_GET[kd]' class='btn btn-success' title='Cetak Laporan'><i class='halflings-icon white edit'></i> Cetak Laporan</a><br><br>
										<div class='table-responsive'>
											<table class='table table-striped table-bordered table-hover' id='dataTables-example'>
												<thead class='table_row'>
													<tr>
														<th class='sorting_asc' tabindex='0' aria-controls='example' rowspan='1' colspan='0.3'aria-label='Name: activate to sort column descending' aria-sort='ascending'>NIS</th>
														<th class='sorting text-justify' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Position: activate to sort column ascending'>Nama</th>
														<th class='sorting_asc' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Name: activate to sort column descending' aria-sort='ascending'>Kelas</th>
														<th class='sorting_asc' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Age: activate to sort column descending' aria-sort='ascending'>Total Point</th>
													</tr>
												</thead>
												
										";
										
										$pel = mysql_query("select coalesce(total,0) as total,nama,nis,kd_kelas,kelas from(
										select sum(tp.point) as total ,ts.nama,ts.nis,ts.kd_kelas,tk.kelas as kelas from tb_pelanggaran tp 
										right join tb_siswa ts on ts.nis=tp.nis
										left join tb_kelas tk on tk.kd_kelas=ts.kd_kelas								
										group by ts.nama,ts.nis 
										)x where kd_kelas='$_GET[kd]' order by total DESC");
										echo mysql_error();
										while($a = mysql_fetch_array($pel)){
											echo " 
													<tr>
														<td class='odd' role='row'>$a[nis]</td>
														<td class='even text-justify' role='row'>$a[nama]</td>
														<td class='odd' role='row'>$a[kelas]</td>
														<td class='odd' role='row'>$a[total]</td>
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