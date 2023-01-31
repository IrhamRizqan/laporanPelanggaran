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
                            Dashboard <small>admin area</small>
                        </h1>
                    </div>
				</div>
					<div class="col-md-12">
					  <!--   Kitchen Sink -->
						<div class="panel panel-default">
							<div class="panel-heading">
								Top 10 Pelanggaran
							</div>
							
							<div class="panel-body">
								<div class="row">
									<?php
										$siswa = mysql_query("select coalesce(total,0) as total,nama,nis,foto,kd_gallery,jurusan,kelas from(
												select sum(tp.point) as total ,ts.nama,ts.jenkel,ts.nis,ts.foto,tk.kelas as kelas,tg.kd_gallery,tj.jurusan as jurusan from tb_pelanggaran tp 
												right join tb_siswa ts on ts.nis=tp.nis
												left join tb_kelas tk on tk.kd_kelas=ts.kd_kelas								
												left join tb_jurusan tj on tj.kd_jurusan=ts.kd_jurusan							
												left join tb_gallery tg on tg.nis=ts.nis									
												group by ts.nama,ts.nis 
												)x order by total DESC limit 0,10");
										while ($row = mysql_fetch_array($siswa)){
											echo "
												<div class='col-md-3 col-sm-12 col-xs-12'>
													<div class='panel panel-primary text-center no-boder bg-color-green'>
														<div class='panel-body'>
															<img class='img-polaroid' src='assets/img/photos/$row[foto]' width='178' height='168'>
															<h3><a href='detail.gallery?aksi=detail&kd=$row[kd_gallery]&nis=$row[nis]' class='text-success'>$row[nama]</a></h3>
														</div>
														<div class='panel-footer back-footer-green'>
															Total Poin : $row[total]<br>
														</div>
													</div>
												</div>
											";
										}
									?>
									
								</div>
							</div>
						</div>
					</div>
				</div>
            <!-- END ROW HERE  -->
			
			<?php 
				include "footer.php";
			?>