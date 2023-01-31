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
                <a class="navbar-brand" href="user.page">Poin Siswa</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
						<i class="fa fa-user fa-fw"></i><?php echo $_SESSION[nama] ?>&nbsp;<i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo "user.profile?aksi=profile&id=$_SESSION[id] "?>"><i class="fa fa-user fa-fw"></i> User Profile</a>
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