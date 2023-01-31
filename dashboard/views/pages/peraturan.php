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
										<div class='table-responsive'>
											<table class='table table-striped table-bordered table-hover' id='dataTables-example'>
												<thead class='table_row'>
													<tr>
														<th class='sorting_asc' tabindex='0' aria-controls='example' rowspan='1' colspan='0.3'aria-label='Name: activate to sort column descending' aria-sort='ascending'>Kode</th>
														<th class='sorting_asc' tabindex='0' aria-controls='example' rowspan='1' colspan='0.3'aria-label='Name: activate to sort column descending' aria-sort='ascending'>BAB</th>
														<th class='sorting' width='20%' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Position: activate to sort column ascending'>Judul</th>
														<th class='sorting_asc' width='60%' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Name: activate to sort column descending' aria-sort='ascending'>Peraturan</th>
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