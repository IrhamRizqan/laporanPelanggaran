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
                            Pilih Kelas
                        </h1>
                    </div>
				</div>
				
				<div class="row">	
					<div class="box">
						<div class="box-content">
							<ul class="dashboard-list">
								<?php
									$grd = $_GET[grade];
								?>
								<li>
									<h2>Pilih Kelas Yang Akan Di Buat Laporan .</h2><hr>
									<p>
										<?php
										$gmtk = mysql_query("SELECT * FROM tb_kelas WHERE kelas LIKE '%$grd %'");
											while($row = mysql_fetch_array($gmtk)){
												echo "
												<a href='laporan.kelas?kd=$row[kd_kelas]' class='pkelas'>$row[kelas]</a>
												";
											}
										?>
									</p>                              
								</li>
							</ul>
						</div>
					</div><!--/span-->
				</div>
            <!-- END ROW HERE  -->