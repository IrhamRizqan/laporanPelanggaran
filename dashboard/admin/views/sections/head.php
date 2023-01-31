<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $data['title'] ?></title>
		<!-- Bootstrap Styles-->
		<link href="<?php echo $config['site'] ?>assets/css/bootstrap.css" rel="stylesheet" />
		<link href="<?php echo $config['site'] ?>assets/css/font-awesome.css" rel="stylesheet" />
		<link href="<?php echo $config['site'] ?>assets/css/halflings.css" rel="stylesheet" />
		<link href="<?php echo $config['site'] ?>assets/css/font-awesome.css" rel="stylesheet" />
		<!-- Custom Styles-->
		<link href="<?php echo $config['site'] ?>assets/css/style.css" rel="stylesheet" />
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
                <a class="navbar-brand" href="admin.page">Poin Siswa</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i><i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
						<li>
                            <a class="text-center" href="#">
                                <strong>Komentar Pengunjung</strong>
                            </a>
                        </li>
						<li class='divider'></li>
						<?php
							$sql = mysql_query("Select * from tb_komentar ORDER by kd_komentar DESC limit 0,3");
							while ($data = mysql_fetch_array($sql)){
								echo "
									   <li>
											<a href='komentar'>
												<div>
													<strong>$data[nama]</strong>
												</div>
												<div>email : $data[email]</div>
												<div>Pesan : $data[message]</div>
											</a>
										</li>
										<li class='divider'></li>
									";
							}
						
						?>
						<li>
                            <a class="text-center" href="komentar">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-comments fa-fw"></i><i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
						<li>
                            <a class="text-center" href="#">
                                <strong>Koreksi Pelanggaran Siswa</strong>
                            </a>
                        </li>
						<li class='divider'></li>
						<?php
							$sql = mysql_query("Select tk.kd_koreksi,tk.id_user,tu.nama_lengkap,tk.title,DATE_FORMAT(tk.waktu,'%D %M, %Y %H:%i:%s') as waktu,tk.message from tb_koreksi tk,tb_users tu where tk.id_user=tu.id_user ORDER by waktu DESC limit 0,2");
							echo mysql_error();
							$jml = mysql_num_rows($sql);
							if($jml>0){
								while ($data = mysql_fetch_array($sql)){
									$pesan = substr($data[message],0,50);
									echo "
										   <li>
												<a href='profile.user?aksi=profile&id=$data[id_user]'>
													<div>
														<strong>Pengirim : $data[nama_lengkap]</strong><br>
													</div>
												</a>
												
												<div style='margin-left:20px'>
												<span class='datetime'>$data[waktu]<br></span>
												Title    : $data[title]<br>
												Messages : $pesan<br><a href='detail.koreksi?aksi=detail&kd=$data[kd_koreksi]'>Read More..</a></div>
											</li>
											<li class='divider'></li>
										";
								}
							}else{
								echo "
									<div class='alert alert-danger' style='margin:20px'>
										<strong>Maaf Tidak ada data yang dapat di tampilkan!</strong> 
									</div>
								";
							}
						
						?>
						<li>
                            <a class="text-center" href="koreksi">
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
						<i class="fa fa-user fa-fw"></i><?php echo $_SESSION[nama] ?>&nbsp;<i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo "profile?aksi=profile&id=$_SESSION[id] "?>"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->