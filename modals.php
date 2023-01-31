<?php 
require 'libs/libs.php'; 
$nis = $_GET[nis];
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Fault Point</title>

		<link href="dashboard/assets/css/bootstrap.css" rel="stylesheet" />
		<!-- Custom CSS -->
		<link href="assets/css/style.css" rel="stylesheet">
		<!-- Custom Fonts -->
		<link href="dashboard/assets/css/halflings.css" rel="stylesheet" />
		<link href="dashboard/assets/css/font-awesome.css" rel="stylesheet" />
		<link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

	</head>
		<!-- pelanggaran Modals -->
		<div class="pelanggaran-modal">
		<?php
			$query = mysql_query("select coalesce(total,0) as total,nama,nis,foto,jurusan,deskripsi,kelas from(
										select sum(tp.point) as total ,ts.nama,ts.jenkel,ts.nis,ts.foto,tk.kelas as kelas,tj.jurusan as jurusan, tg.deskripsi as deskripsi from tb_pelanggaran tp 
										right join tb_siswa ts on ts.nis=tp.nis
										left join tb_kelas tk on tk.kd_kelas=ts.kd_kelas								
										left join tb_jurusan tj on tj.kd_jurusan=ts.kd_jurusan								
										left join tb_gallery tg on tg.nis=ts.nis								
										group by ts.nama,ts.nis 
										)x where nis='$nis' order by total DESC");
			$gal = mysql_fetch_array($query);
			echo mysql_error();
			
			$pelanggaran=mysql_query("select count(kd_pel) as total from tb_pelanggaran where nis='$nis'");
			$t_pel=mysql_fetch_array($pelanggaran);
		?>
			<div class="modal-content">
				
				<a href='index.php?#pelanggaran'>
					<div class="close-modal">
						<div class="lr">
								<div class="rl">
								</div>
						</div>
					</div>
				</a>
				<div class="container">
					<div class="row">
						<div class="col-lg-9 col-lg-offset-2">
							<div class="modal-body">
								<h2><?php echo $gal[nama]; ?></h2>
								<hr class="star-primary">
								<?php
									$getData="SELECT * from tb_siswa WHERE nis='$_GET[nis]'";
									$cekData=mysql_query($getData);
									$data = mysql_fetch_array($cekData);
									$cekData="SELECT * from tb_gallery WHERE kd_gallery='$_GET[kd]'";
									$cekData=mysql_query($cekData);
									$foto = mysql_fetch_array($cekData);
																
									if($foto[foto]==''){
										echo "
										<img src='dashboard/assets/img/photos/$data[foto]' class='img-responsive img-polaroid img-centered gallery'>
										";
									}elseif($foto[foto]!=''){
										echo "
										<img src='dashboard/assets/img/gallery/$foto[foto]' class='img-responsive img-polaroid img-centered gallery'>
										
										";
									}
								?>
								<p class='deskripsi'><?php echo $gal[deskripsi]; ?></p>
								<ul class="list-inline item-details">
									<li>Total Point :
										<strong><a href="#"><?php echo $gal[total]; ?></a>
										</strong>
									</li>
									<li>Total Pelanggaran Bulan Ini:
										<strong><a href="#"><?php echo $t_pel[total]; ?></a>
										</strong>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<!-- Advanced Tables -->
							<div class="panel panel-default">
								<div class="panel-heading">
									 History Pelanggaran
								</div>
								<div class="panel-body">
									<?php
										if ($_GET[aksi]=='detail'){
											echo "
											<div class='table-responsive'>
												<table class='table table-striped table-bordered table-hover' id='dataTables-example'>
													<thead class='table_row'>
														<tr>
															<th class='sorting_asc' width='30%' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Name: activate to sort column descending' aria-sort='ascending'>Pelanggaran</th>
															<th class='sorting_asc' width='5%' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Age: activate to sort column descending' aria-sort='ascending'>Point</th>
															<th class='sorting_asc' width='10%' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Age: activate to sort column descending' aria-sort='ascending'>Tanggal</th>
															<th class='sorting_asc' width='25%' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Age: activate to sort column descending' aria-sort='ascending'>Kronologi</th>
														</tr>
													</thead>
													
											";
											$pelanggaran = mysql_query("SELECT tb_pelanggaran.kd_pel,tb_pelanggaran.nis,tb_pelanggaran.nama,tb_kelas.kelas,tb_sanksi.jns_pelanggaran,tb_pelanggaran.point,DATE_FORMAT(tb_pelanggaran.tanggal, '%D, %M %Y') as tanggal,tb_pelanggaran.kronologi,tb_pelanggaran.status FROM tb_pelanggaran, tb_kelas, tb_sanksi where tb_pelanggaran.kd_kelas=tb_kelas.kd_kelas AND tb_pelanggaran.kd_sanksi=tb_sanksi.kd_sanksi AND nis='$_GET[nis]'");
											while ($data = mysql_fetch_array($pelanggaran)){
												echo " 
														<tr>
															<td class='odd text-justify' role='row'>$data[jns_pelanggaran]</td>
															<td class='even' role='row'>$data[point]</td>
															<td class='odd' role='row'>$data[tanggal]</td>
															<td class='even text-justify' role='row'>$data[kronologi]</td>
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
				</div>
			</div>
		</div>
		

	</body>
	
	<!-- jQuery Js -->
    <script src='dashboard/assets/js/jquery-1.10.2.js'></script>
    
	<!-- Bootstrap Js -->
    <script src='dashboard/assets/js/bootstrap.min.js'></script>
    
	<!-- Metis Menu Js -->
    <script src='dashboard/assets/js/jquery.metisMenu.js'></script>
    
	<!-- DATA TABLE SCRIPTS -->
    <script src='dashboard/assets/js/dataTables/jquery.dataTables.js'></script>
    <script src='dashboard/assets/js/dataTables/dataTables.bootstrap.js'></script>
	<link href='dashboard/assets/js/dataTables/dataTables.bootstrap.css' rel='stylesheet' />
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script>
    <!-- Custom Js -->
    <script src='dashboard/assets/js/custom-scripts.js'></script>

</html>
