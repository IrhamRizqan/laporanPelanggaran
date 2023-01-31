<?php 
require 'libs/libs.php'; 
require 'include/header.php'; 
?>
	<body id="page-top">

		<!-- Navigation -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header page-scroll">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#page-top">AP^PS</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li class="hidden">
							<a href="#page-top"></a>
						</li>
						<li class="page-scroll">
							<a href="#pelanggaran">Top Pelanggaran</a>
						</li>
						<li class="page-scroll">
							<a href="#about">About</a>
						</li>
						<li class="page-scroll">
							<a href="#peraturan">Peraturan</a>
						</li>
						<li class="page-scroll">
							<a href="#contact">Contact</a>
						</li>
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container-fluid -->
		</nav>

		<!-- Header -->
		<header>
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<img class="img-responsive" src="assets/img/profile.png" alt="" height="256" width="256">
						<div class="intro-text">
							<span class="name">Aplikasi Poin Pelanggaran Siswa <br>SMK Adi Sanggoro</span>
							<hr class="star-light">
							<span class="details">History Pelanggaran - Poin Pelanggaran - Total Point Pelanggaran</span>
						</div>
					</div>
				</div>
			</div>
		</header>

		<!-- pelanggaran Grid Section -->
		<section id="pelanggaran">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<h2>Top 10 Pelanggaran</h2>
						<hr class="star-primary">
					</div>
				</div>
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
									<div class='col-sm-2 pelanggaran-item'>
										<a href='modals.php?aksi=detail&kd=$row[kd_gallery]&nis=$row[nis]' class='pelanggaran-link' data-toggle='modal'>
											<div class='caption'>
												<div class='caption-content'>
													<i class='fa fa-search-plus fa-3x'></i>
												</div>
											</div>
											<img src='dashboard/assets/img/photos/$row[foto]' class='img-responsive' alt='' width='100%' style='height:178px!important'>
										</a>
									</div>
								";
						}
					
					?>
				</div>
			</div>
		</section>
		
		<!-- About Section -->
		<section class="success" id="about">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<h2>About</h2>
						<hr class="star-light">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4 col-lg-offset-2 ">
						<p class="text-justify">Website ini mencakup tentang data pelanggaran, poin pelanggaran dan total poin pelanggaran yang telah dilakukan oleh siswa SMK Adi Sanggoro.</p>
					</div>
					<div class="col-lg-4">
						<p class='text-justify'>Website ini hanya mencakup beberapa dari data pelanggaran siswa . seperti top 10 pelanggaran siswa, total poin, foto beserta dengan keterangan nya .</p>
					</div>
				</div>
			</div>
		</section>
		
		<!-- Peraturan Section -->
		<section id="peraturan">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<h2>Peraturan</h2>
						<hr class="star-primary">
					</div>
				</div>
				<div class="row">
					<?php
						echo "
							<div class='col-xs-12 table-responsive'>
								<table class='table table-striped table-bordered table-hover' id='dataTables-example'>
									<thead class='table_row'>
										<tr>
											<th class='sorting_asc' width='5%' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Name: activate to sort column descending' aria-sort='ascending'>No</th>
											<th class='sorting_asc' width='5%' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Age: activate to sort column descending' aria-sort='ascending'>BAB</th>
											<th class='sorting_asc' width='20%' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Age: activate to sort column descending' aria-sort='ascending'>Judul</th>
											<th class='sorting_asc' width='60%' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Age: activate to sort column descending' aria-sort='ascending'>Peraturan</th>
											<th class='sorting_asc' width='10%' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Age: activate to sort column descending' aria-sort='ascending'>Action</th>
										</tr>
									</thead>
													
							";
							$sql = mysqli_query("SELECT * FROM tb_peraturan");
							$no = 1;
								while ($data = mysqli_fetch_array($sql)){
									$peraturan  = substr($data['Peraturan'],0,100);
									echo " 
										<tr>
											<td class='odd text-justify' role='row'>$no</td>
											<td class='even' >$data[BAB]</td>
											<td class='odd' role='row'>$data[Judul]</td>
											<td class='even' role='row'>$peraturan..</td>
											<td class='odd' role='row'>
												<a href='detail.peraturan.php?kd=$data[kd_peraturan]' class='btn btn-success' title='Details'><i class='halflings-icon white zoom-in'></i> Read More..</a>
											</td>
										</tr>
									";
									$no++;
								}
								echo "</table>
								</div>";
						?>
				</div>
			</div>
		</section>
		
		<!-- About Section -->
		<section class="success" id="about">
			<div class="container">
				<center>
					<div class="row">
						<div class="footer-col col-md-6">
							<h3>Location</h3>
							<p>Jl. Sengked No.1 Kampus IPB Dramaga Bogor 16680.</p>
						</div>
						<div class="footer-col col-md-6">
							<h3>Follow us</h3>
							<ul class="list-inline">
								<li>
									<a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
								</li>
								<li>
									<a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
								</li>
								<li>
									<a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
								</li>
								<li>
									<a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
								</li>
								<li>
									<a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-dribbble"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</center>
			</div>
		</section>
		
		<!-- Contact Section -->
		<section id="contact">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<h2>Contact Me</h2>
						<hr class="star-primary">
						<br>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2">
						<form action="pesan.php" method="POST">
							<div class="row control-group">
								<div class="form-group col-xs-12 floating-label-form-group controls">
									<label>Name</label>
									<input type="text" class="form-control" name="nama" placeholder="Name" id="name" required>
									<p class="help-block text-danger"></p>
								</div>
							</div>
							<div class="row control-group">
								<div class="form-group col-xs-12 floating-label-form-group controls">
									<label>Email Address</label>
									<input type="email" class="form-control" name="email" placeholder="Email Address" id="email">
									<p class="help-block text-danger"></p>
								</div>
							</div>
							<div class="row control-group">
								<div class="form-group col-xs-12 floating-label-form-group controls">
									<label>Phone Number</label>
									<input type="tel" class="form-control" name="telpon" placeholder="Phone Number" id="phone">
									<p class="help-block text-danger"></p>
								</div>
							</div>
							<div class="row control-group">
								<div class="form-group col-xs-12 floating-label-form-group controls">
									<label>Message</label>
									<textarea rows="3" class="form-control" name="pesan" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
									<p class="help-block text-danger"></p>
								</div>
							</div>
							<br>
							<div id="success"></div>
							<div class="row">
								<div class="form-group col-xs-12">
									<button type="submit" name="send" class="btn btn-success btn-lg">Send</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
		
		<?php require 'include/footer.php'; ?>
	
		<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
		<div class="scroll-top page-scroll visible-xs visible-sm">
			<a class="btn btn-primary" href="#page-top">
				<i class="fa fa-chevron-up"></i>
			</a>
		</div>
		
		<!-- jQuery -->
		<script src="assets/js/jquery.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- Plugin JavaScript -->
		<script src="assets/js/jquery.easing.min.js"></script>
		<script src="assets/js/classie.js"></script>
		<script src="assets/js/cbpAnimatedHeader.js"></script>

		<!-- Contact Form JavaScript -->
		<script src="assets/js/jqBootstrapValidation.js"></script>

		<!-- JavaScript Function Click -->
		<script src="assets/js/click.js"></script>
		
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

	</body>

</html>
