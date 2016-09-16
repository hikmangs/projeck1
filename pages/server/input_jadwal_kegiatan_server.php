<?php include "config.php";
if(empty($_SESSION['username'])){
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
                <?php include "left-nav-server.php"?>
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
                                    <form role="form" action="http://simas-jabar.web.id/proses/input_data_kegiatan.php" method="POST">
                                        <div class="form-group">
                                            <label>Nama Kegiatan</label>
                                            <input type="text" class="form-control" name="namakegiatan" required minlength="3" placeholder="Nama Kegiatan">
                                        </div>   
                                        <div class="form-group">
                                            <label>Tanggal Kegiatan</label>
                                            <?PHP
                                                echo"<select name=tgl>";
                                                    for ($tgl=1; $tgl<=31; $tgl++) {
                                                        echo"<option value=$tgl> $tgl </option>";
                                                    }
                                                echo "</select>";
                                            ?>
                                            <select name="bln">
                                                <option value="Januari"> Januari</option>
                                                <option value="Februari"> Februari</option>
                                                <option value="Maret"> Maret</option>
                                                <option value="April"> April</option>
                                                <option value="Mei"> Mei</option>
                                                <option value="Juni"> Juni</option>
                                                <option value="Juli"> Juli</option>
                                                <option value="Agustus"> Agustus</option>
                                                <option value="September"> September </option>
                                                <option value="Oktober"> Oktober</option>
                                                <option value="November"> November</option>
                                                <option value="Desember"> Desember</option>

                                            </select>
                                            <?PHP
                                                echo "<select name=thn>";
                                                    for ($thn=2016; $thn<=2020; $thn++) {
                                                        echo "<option value=$thn> $thn </option>";
                                                    }
                                                echo"</select>";
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Pemateri</label>
                                            <input type="text" class="form-control" name="namapemateri"  placeholder="Nama Pemateri" required minlength="3">
                                        </div> 
                                        <div class="form-group">
                                            <label>Waktu Kegiatan</label>
                                            <input type="text" class="form-control" name="waktukegiatan"  placeholder="00:00 Am" required>
                                        </div>  
                                       <div class="form-group">
                                            <label>Lokasi</label>
                                            <input type="text" class="form-control" name="lokasi"  placeholder="Lokasi" required>
                                        </div>  
                                        <div class="form-group">
                                            <label >Keterangan</label>
                                            <textarea name="keterangan" class="form-control" rows="3" required autofocus> </textarea> 
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
