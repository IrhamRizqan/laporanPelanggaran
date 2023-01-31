<?php 
require 'libs/libs.php';
require 'libs/database.php'; 
$kd = $_GET[kd];
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
		<!-- Peraturan Modals -->
		<div class="pelanggaran-modal">
		<?php
			$query = mysqli_query("select * from tb_peraturan where kd_peraturan='$kd'");
			$data = mysqli_fetch_array($query);
		?>
			<div class="modal-content">
				
				<a href='index.php?#peraturan'>
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
								<h2><?php echo $data[Judul]; ?></h2>
								<hr class="star-primary">
								<p class='deskripsi'>BAB : <?php echo $data[BAB]; ?></p>
								<p class='deskripsi text-justify'><?php echo $data[Peraturan]; ?></p>
							</div>
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
