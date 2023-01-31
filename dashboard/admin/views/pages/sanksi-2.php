<!DOCTYPE html>
<html>
	<head>
		<title>Admin Area</title>
		<!-- Bootstrap Styles-->
		<link href="assets/css/bootstrap.css" rel="stylesheet" />
		<link href="assets/css/halflings.css" rel="stylesheet" />
		<link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
		<link href="assets/css/font-awesome.css" rel="stylesheet" />
		<!-- Custom Styles-->
		<link href="assets/css/style.css" rel="stylesheet" />
		<!-- Google Fonts-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Fault Point</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>Ucok</strong>
                                </div>
                                <div>Lorem Ipsum has been the industry's standard Ipsum has been the industry's standard dummy...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>Juleha</strong>
                                </div>
                                <div>Lorem Ipsum has been the industry's standard dummy...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>Joker</strong>
                                </div>
                                <div>Lorem Ipsum has been the industry's standard dummy...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a class="active-menu" href="index.php"><i class="fa fa-home"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-male"> </i> Data Pelanggaran<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="messages.php">Inbox Pelanggaran</a>
                            </li>
                            <li>
                                <a href="#">Data Pelanggaran</a>
                            </li>
                        </ul>
                    </li>
					<li>
                        <a href="siswa.php"><i class="fa fa-users"></i> Siswa</a>
                    </li>
					<li>
                        <a href="#"><i class="fa fa-list-alt"></i> Peraturan</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-legal"></i> Sanksi </a>
                    </li>
                    
                    <li>
                        <a href="#"><i class="fa fa-picture-o "></i> Gallery Pelanggar </a>
                    </li>
					<li>
                        <a href="#"><i class="fa fa-edit"> </i> Cetak Laporan<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Kelas X</a>
                            </li>
                            <li>
                                <a href="#">Kelas XI</a>
                            </li>
                            <li>
                                <a href="#">Kelas XII</a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
			<!--  ROW HERE  -->

                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Sanksi <small>peraturan beserta point</small>
                        </h1>
                    </div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<!-- Advanced Tables -->
						<div class="panel panel-default">
							<div class="panel-heading">
								 Tabel Sanksi
							</div>
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table table-striped table-bordered table-hover" id="dataTables-example">
										<thead class="table_row">
											<tr>
												<th>Jenis Pelanggaran</th>
												<th>Point</th>
												<th width="40%">Sanksi</th>
												<th>Actions</th>
											</tr>
										</thead>
									  <tbody>
										<tr>
											<td>Telat Masuk Sekolah</td>
											<td>5</td>
											<td>
												<p>
													Di kelitikin ampe ngompol
												</p>
											</td>
											<td>
												<a class="btn btn-info" href="#" title="Edit">
													<i class="halflings-icon white edit"></i>  
												</a>
												<a class="btn btn-danger" href="#" title="Delete">
													<i class="halflings-icon white trash"></i> 
												</a>
											</td>
										</tr>
										
									  </tbody>
									</table>
								</div>
								
							</div>
						</div>
						<!--End Advanced Tables -->
					</div>
				</div>
            <!-- END ROW HERE  -->
	
			<!-- FOOTER  -->
				<footer><p>All right reserved.<a href="#">Fault Point</a></p></footer>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
	
	
	<!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    
	<!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    
	<!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    
	<!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    

</body>

</html>