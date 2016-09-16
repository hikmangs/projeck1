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

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- validasi -->
<script src="../validation/jquery.js"></script>
<script src="../validation/jquery.validate.js"></script>
    <!-- validasi -->

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
                <?php include "left-nav.php"?>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Input Jadwal Kegiatan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
             <?php
            if (isset($_SESSION['tambah'])) {
                        
                        ?>
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Data Jadwal Kegiatan Berhasil Di Input. <a href="lihat_jadwal_kegiatan.php" class="alert-link">Lihat Jadwal Kegiatan</a>.
                            </div>
                        <?php
                        unset($_SESSION['tambah']);
                        }
                        
            ?>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form Jadwal Kegiatan
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="proses/insert_kegiatan.php" method="POST">
                                        <div class="form-group">
                                            <label>Tanggal Kegiatan</label>
                                            <input type="date" class="form-control" name="tglkegiatan" required>
                                      </div>
                                        <div class="form-group">
                                            <label>Nama Kegiatan</label>
                                            <input type="text" class="form-control" name="namakegiatan" required minlength="3">
                                        </div>   
                                        <div class="form-group">
                                            <label>Waktu Kegiatan</label>
                                            <input type="time" class="form-control" name="waktukegiatan" required>
                                        </div>  
                                        <div class="form-group">
                                            <label>Nama Pemateri</label>
                                            <input type="text" class="form-control" name="namapemateri" required minlength="3">
                                        </div> 
                                        <div class="form-group">
                                            <label>Tempat Kegiatan</label>
                                            <textarea class="form-control" rows="3" name="tempatkegiatan" required minlength="3"></textarea>
                                        </div>
                                         <div class="form-group">
                                            <label>Keterangan Kegiatan</label>
                                            <textarea class="form-control" rows="3" name="ketkegiatan" required minlength="3"></textarea>
                                        </div>
                                        <div class="row">
                                    <div class="col-lg-5">
                                    </div>
                                    <div class="col-lg-7">
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                        <button type="submit" class="btn btn-success" name="inputkegiatan">Input Jadwal Kegiatan</button>
                                    </div>
                                    </div>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
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

</body>

</html>
