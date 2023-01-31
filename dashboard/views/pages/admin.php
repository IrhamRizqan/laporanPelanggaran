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
                            Data Users <small> level Admin</small>
                        </h1>
                    </div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<!-- Advanced Tables -->
						<div class="panel panel-default">
							<div class="panel-heading">
								 Tabel Admin
							</div>
							<div class="panel-body">
								<?php
									if ($_GET[aksi]==''){
										echo "
										<div class='table-responsive'>
											<table class='table table-striped table-bordered table-hover' id='dataTables-example'>
												<thead class='table_row'>
													<tr>
														<th class='sorting' width='25%' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Position: activate to sort column ascending'>Nama</th>
														<th class='sorting_asc' width='15%' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Name: activate to sort column descending' aria-sort='ascending'>Jenkel</th>
														<th class='sorting_asc' width='20%' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Name: activate to sort column descending' aria-sort='ascending'>No Telepon</th>
														<th class='sorting_asc' width='40%' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Name: activate to sort column descending' aria-sort='ascending'>Alamat</th>
													</tr>
												</thead>
												
										";
										$users = mysql_query("SELECT * FROM tb_users where level='admin' ORDER BY username ASC");
										while ($row = mysql_fetch_array($users)){
											echo " 
													<tr>
														<td class='odd' role='row'>$row[nama_lengkap]</td>
														<td class='even text-justify' role='row'>$row[jenkel]</td>
														<td class='even text-justify' role='row'>$row[no_telpon]</td>
														<td class='even text-justify' role='row'>$row[alamat]</td>
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