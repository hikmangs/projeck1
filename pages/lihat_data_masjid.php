<?php
include "config.php";
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
                <?php include "left-nav.php"?>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Lihat Data Masjid</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
            <div class="col-lg-8">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Data Masjid
                        </div>
                        <div class="panel-body">
                        <div class="col-lg-6">
                         <?php
                                $nama="";
                                $datamasjid = mysql_query("SELECT * FROM tabel_data_masjid");
                                    while($data=mysql_fetch_array($datamasjid)){
                                        $provinsi=$data['provinsi'];
                                        $kab_kota=$data['kab_kota'];
                                        $kecamatan=$data['kecamatan'];
                                        $nama=$data['nama_masjid'];
                                        $logo=$data['logo_masjid'];
                                        $tipologi=$data['tipologi_masjid'];
                                        $alamat=$data['alamat_masjid'];
                                        $tema=$data['tema_masjid'];
                                        $luastanah=$data['luas_tanah_masjid'];
                                        $statustanah=$data['status_tanah_masjid'];
                                        $luasbangunan=$data['luas_bangunan_masjid'];
                                        $tahunberdiri=$data['tahun_berdiri_masjid'];
                                        $jamaah=$data['jamaah_masjid'];
                                        $imam=$data['imam_masjid'];
                                        $khotib=$data['khatib_masjid'];
                                        $muazin=$data['muazin_masjid'];
                                        $remaja=$data['remaja_masjid'];
                                        $notelp=$data['no_telp_masjid'];
                                        $ketmasjid=$data['ket_masjid_masjid'];
                                    }
                            ?>
                            <div class="list-group">
                            <div class="form-group">
                            <div class="list-group-item">
                            <label>Nama Masjid</label>
                            <p class="form-control-static"><?php echo $nama; ?></p>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="list-group-item">
                            <label>Tipologi</label>
                            <p class="form-control-static"><?php echo $tipologi; ?></p>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="list-group-item">
                            <label>Logo Masjid</label>
                            <p class="form-control-static"><img class="logo" src='proses/<?php echo "$logo";?>' width="100" height="100"></p>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="list-group-item">
                            <label>No. Telp/Hp</label>
                            <p class="form-control-static"><?php echo $notelp; ?></p>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="list-group-item">
                            <label>Tema Masjid</label>
                            <p class="form-control-static"><?php echo $tema; ?></p>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="list-group-item">
                            <label>Provinsi</label>
                            <?php
                                $dataprov = mysql_query("SELECT * FROM prov WHERE id_prov=$provinsi");
                                    while($datap=mysql_fetch_array($dataprov)){
                                        $prov=$datap['nama_prov'];
                                    }
                            ?>
                            <p class="form-control-static"><?php echo $prov; ?></p>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="list-group-item">
                            <label>Kabupaten/Kota</label>
                            <?php
                                $datakab = mysql_query("SELECT * FROM kabkot WHERE id_kabkot=$kab_kota");
                                    while($datakabkot=mysql_fetch_array($datakab)){
                                        $kabkot=$datakabkot['nama_kabkot'];
                                    }
                            ?>
                            <p class="form-control-static"><?php echo $kabkot; ?></p>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="list-group-item">
                            <label>Kecamatan</label>
                            <?php
                                $datakec = mysql_query("SELECT * FROM kec WHERE id_kec=$kecamatan");
                                    while($datakecam=mysql_fetch_array($datakec)){
                                        $kec=$datakecam['nama_kec'];
                                    }
                            ?>
                            <p class="form-control-static"><?php echo $kec; ?></p>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="list-group-item">
                            <label>Alamat Masjid</label>
                            <p class="form-control-static"><?php echo $alamat; ?></p>
                            </div>
                            </div>
                            </div>
                            </div>
                            <div class="col-lg-6">
                            <div class="list-group">
                            <div class="form-group">
                            <div class="list-group-item">
                            <label>Jumlah Jama'ah Aktif</label>
                            <p class="form-control-static"><?php echo $jamaah." Orang"; ?></p>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="list-group-item">
                            <label>Jumlah Imam Aktif</label>
                            <p class="form-control-static"><?php echo $imam." Orang"; ?></p>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="list-group-item">
                            <label>Jumlah Khotib Aktif</label>
                            <p class="form-control-static"><?php echo $khotib." Orang"; ?></p>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="list-group-item">
                            <label>Jumlah Muazin Aktif</label>
                            <p class="form-control-static"><?php echo $muazin." Orang"; ?></p>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="list-group-item">
                            <label>Jumlah Remaja Aktif</label>
                            <p class="form-control-static"><?php echo $remaja." Orang"; ?></p>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="list-group-item">
                            <label>Luas Tanah</label>
                            <p class="form-control-static"><?php echo $luastanah." m<sup>2</sup>"; ?></p>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="list-group-item">
                            <label>Luas Bangunan</label>
                            <p class="form-control-static"><?php echo $luasbangunan." m<sup>2</sup>"; ?></p>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="list-group-item">
                            <label>Status Tanah</label>
                            <p class="form-control-static"><?php echo $statustanah; ?></p>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="list-group-item">
                            <label>Tahun Berdiri</label>
                            <p class="form-control-static"><?php echo $tahunberdiri; ?></p>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="list-group-item">
                            <label>Keterangan Masjid</label>
                            <p class="form-control-static"><?php echo $ketmasjid; ?></p>
                            </div>
                            </div>
                            </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            Panel Footer
                        </div>
                    </div>
                </div>
            </div>
            
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
