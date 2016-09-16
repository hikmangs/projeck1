<?php include "config.php";
if(empty($_SESSION['user_masjid'])){
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="9988-200.png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIMAS JABAR</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<div id="wrapper">

<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="index.php">SIMAS JABAR</a>
</div>
<!-- /.navbar-header -->

    <?php include "top-nav.php"?>
<!-- /.navbar-top-links -->

<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-home fa-fw"></i> Data Masjid<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="input_data_masjid.php">Input Data Masjid</a>
                    </li>
                    <li>
                        <a href="lihat_data_masjid.php">Lihat Data Masjid</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="kas_masjid.php"><i class="fa fa-table fa-fw"></i> Kas Masjid</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-users fa-fw"></i> Data SDM<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="input_data_sdm.php">Input Data SDM</a>
                    </li>
                    <li>
                        <a href="lihat_data_sdm.php">Lihat Data SDM</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-tasks fa-fw"></i> Jadwal Shalat<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="Input_jadwal_shalat.php">Input Jadwal Shalat</a>
                    </li>
                    <li>
                        <a href="lihat_jadwal_shalat.php">Lihat Jadwal Shalat</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-tasks fa-fw"></i> Jadwal Kegiatan<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="input_jadwal_kegiatan.php">Input Jadwal Kegiatan</a>
                    </li>
                    <li>
                        <a href="lihat_jadwal_kegiatan.php">Lihat Jadwal Kegiatan</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="setting_simas.php"><i class="fa fa-gear fa-fw"></i> Setting SIMAS</a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Pengaturan Admin</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <!-- /.row -->
    <?php
    if (isset($_SESSION['valid_pass'])) {

        ?>
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Ganti Password Succes !!!
        </div>
        <?php
        unset($_SESSION['valid_pass']);
    } elseif(isset($_SESSION['novalid'])) {?>

        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        Password Anda Salah !!!
        </div>
    <?php
        unset($_SESSION['novalid']);
    }

    ?>
                <!-- /.panel-heading -->
                    <div class="row">
                        <div class="col-lg-6">
                        <p><strong><h4>Ganti Password</h4></strong></p>
                        <div class="form-group" >
                            <div class="list-group-item">
                                        <form role="form" action="proses/change-pass.php" method="POST" enctype="multipart/form-data">
                                <label>Password Lama</label>
                                <input type="password" class="form-control" name="oldpass">
                                <label>Password Baru</label>
                                <input type="password" class="form-control" name="newpass">
                                <label>Ketik Ulang Password Baru</label>
                                <input type="password" class="form-control" name="re-newpass">
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-8">
                                        </div>
                                        <div class="col-lg-4">
                                        <button type="submit" class="btn btn-success" name="changepass">Ganti Password</button>
                                        </div>
                                        </div>
                                        </form>
                            </div>
                </div>

    <!-- /.col-lg-8 -->
</div>
                    </div>
    <!-- /.col-lg-4 -->
</div>

<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>

<!-- Morris Charts JavaScript -->
<script src="../bower_components/raphael/raphael-min.js"></script>
<script src="../bower_components/morrisjs/morris.min.js"></script>
<script src="../js/morris-data.js"></script>

</body>

</html>
