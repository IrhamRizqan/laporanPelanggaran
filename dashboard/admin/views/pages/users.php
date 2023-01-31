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
                            Data Users <small> level User</small>
                        </h1>
                    </div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<!-- Advanced Tables -->
						<div class="panel panel-default">
							<div class="panel-heading">
								 Details User
							</div>
							<div class="panel-body">
								<?php
									if ($_GET[aksi]==''){
										echo "
										<a href='add.user?aksi=tambah' class='btn btn-success' title='Tambah'><i class='halflings-icon white plus'></i> Tambah Users</a><br><br>
										<div class='table-responsive'>
											<table class='table table-striped table-bordered table-hover' id='dataTables-example'>
												<thead class='table_row'>
													<tr>
														<th class='sorting_asc' width='10% tabindex='0' aria-controls='example' rowspan='1' colspan='0.3'aria-label='Name: activate to sort column descending' aria-sort='ascending'>Username</th>
														<th class='sorting_asc' width='15% tabindex='0' aria-controls='example' rowspan='1' colspan='0.3'aria-label='Name: activate to sort column descending' aria-sort='ascending'>Password</th>
														<th class='sorting' width='20%' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Position: activate to sort column ascending'>Nama</th>
														<th class='sorting_asc' width='10%' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Name: activate to sort column descending' aria-sort='ascending'>Jenkel</th>
														<th class='sorting_asc' width='10%' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Name: activate to sort column descending' aria-sort='ascending'>No Telepon</th>
														<th class='sorting_asc' width='15%' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Name: activate to sort column descending' aria-sort='ascending'>Alamat</th>
														<th class='sorting_asc' width='15%' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Age: activate to sort column descending' aria-sort='ascending'>Action</th>
													</tr>
												</thead>
												
										";
										$users = mysql_query("SELECT * FROM tb_users where level='user' ORDER BY username ASC");
										while ($row = mysql_fetch_array($users)){
											echo " 
													<tr>
														<td class='odd' role='row'>$row[username]</td>
														<td class='even' role='row'>$row[password]</td>
														<td class='odd' role='row'>$row[nama_lengkap]</td>
														<td class='even text-justify' role='row'>$row[jenkel]</td>
														<td class='even text-justify' role='row'>$row[no_telpon]</td>
														<td class='even text-justify' role='row'>$row[alamat]</td>
														<td class='odd' role='row'>
															<a href='users.guru?aksi=hapus&id_user=$row[id_user]' class='btn btn-danger' title='Hapus' onclick=\"return confirm('Yakin Akan Menghapus?')\"><i class='halflings-icon white trash'></i></a>
														</td>
													</tr>
											";
										}
										echo "</table>
										</div>";
										
									}
									elseif($_GET[aksi]=='hapus'){
										mysql_query("DELETE FROM tb_users where id_user='$_GET[id_user]'");
										echo "<script>window.alert('Sukses Hapus Data Users.');
											window.location='users.guru'</script>";
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