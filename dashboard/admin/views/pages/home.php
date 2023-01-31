<?php 
	require 'menu.php';
	
	$siswa = mysql_query("SELECT * FROM tb_siswa");
	$jml_siswa=mysql_num_rows($siswa);
	
	$point=mysql_query("select sum(point) as total from tb_pelanggaran where MONTH(tanggal) = MONTH(now())");
	$t_point=mysql_fetch_array($point);
	
	$pelanggaran=mysql_query("select count(kd_pel) as total from tb_pelanggaran where MONTH(tanggal) = MONTH(now())");
	$t_pel=mysql_fetch_array($pelanggaran);
?>      
        <div id="page-wrapper">
            <div id="page-inner">
				<!--  ROW HERE  -->
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Dashboard <small>Aplikasi Poin Pelangaran Siswa</small>
                        </h1>
                    </div>
				</div>
				
				<div class="row">
					<div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-green">
                            <div class="panel-body">
                                <i class="fa fa-bar-chart-o fa-5x"></i>
                                <h3><?php echo $t_pel[total] ?></h3>
                            </div>
                            <div class="panel-footer back-footer-green">
                                Total Pelangaran Per Bulan Sekarang

                            </div>
                        </div>
						
						<div class="panel panel-primary text-center no-boder bg-color-red">
                            <div class="panel-body">
                                <i class="fa fa-star fa-5x"></i>
                                <h3><?php echo $t_point[total] ?></h3>
                            </div>
                            <div class="panel-footer back-footer-red">
                                Total Point Per Bulan Sekarang

                            </div>
                        </div>
						
                        <div class="panel panel-primary text-center no-boder bg-color-orange">
                            <div class="panel-body">
                                <i class="fa fa-users fa-5x"></i>
                                <h3><?php echo $jml_siswa ?> </h3>
                            </div>
                            <div class="panel-footer back-footer-orange">
                                Total Siswa

                            </div>
                        </div>
						
                    </div>
					
					<div class="col-md-9">
					  <!--   Kitchen Sink -->
						<div class="panel panel-default">
							<div class="panel-heading">
								Top 10 Pelanggaran
							</div>
							<div class="panel-body">
							<!--
								SELECT * FROM ProductsWHERE Price BETWEEN 10 AND 20; 
								SELECT * FROM Products WHERE (Price BETWEEN 10 AND 20) AND NOT CategoryID IN (1,2,3); 
								SELECT * FROM Products WHERE ProductName BETWEEN 'C' AND 'M'; 
								SELECT * FROM Orders WHERE OrderDate BETWEEN #07/04/1996# AND #07/09/1996#;
							-->
								<?php
									if ($_GET[aksi]==''){
										echo "
										<div class='table-responsive'>
											<table class='table table-striped table-bordered table-hover'>
												<thead>
													<tr>
														<th>No</th>
														<th>NIS</th>
														<th>Nama</th>
														<th>Kelas</th>
														<th>Total Point</th>
													</tr>
												</thead>
										";
										$pel = mysql_query("select coalesce(total,0) as total,nama,nis,kelas from(
										select sum(tp.point) as total ,ts.nama,ts.nis,tk.kelas as kelas from tb_pelanggaran tp 
										right join tb_siswa ts on ts.nis=tp.nis
										left join tb_kelas tk on tk.kd_kelas=ts.kd_kelas								
										group by ts.nama,ts.nis order by total DESC
										)x");
										$no = 1;
										while ($a = mysql_fetch_array($pel)){
											echo " 
												<tbody>	
													<tr>
														<td>$no</td>
														<td>$a[nis]</td>
														<td>$a[nama]</td>
														<td>$a[kelas]</td>
														<td>$a[total]</td>
													</tr>
												</tbody>
											";
											$no++;
										}
										echo "</table></div>";
										
									}
								?>
							</div>
						</div>
					</div>
				</div>
            <!-- END ROW HERE  -->