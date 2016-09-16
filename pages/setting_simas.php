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
    <?php include "left-nav.php"?>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav>

<div id="page-wrapper">
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Setting SIMAS</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<!-- /.row -->
<?php
if (isset($_SESSION['tambah'])) {

    ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        Pengaturan SIMAS Masjid Berhasil disimpan.
    </div>
    <?php
    unset($_SESSION['tambah']);
}

?>
<div class="row">
    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-cogs fa-fw"></i> Pengaturan SIMAS JABAR
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <?php
                $set = mysql_query("SELECT * FROM tabel_setting_simas");
                while($data=mysql_fetch_array($set)){
                    $atur_waktu_shalat=$data['atur_waktu_shalat'];
                    $lama_tampil_shalat=$data['lama_tampil_shalat'];
                    $lama_tampil_kegiatan=$data['lama_tampil_kegiatan'];
                    $atur_kegiatan=($lama_tampil_kegiatan/60);
                    $hari_pertama_shaum=$data['hari_pertama_shaum'];
                    $banyak_hari_shaum=$data['banyak_hari_shaum'];
                    $background=$data['walpaper_simas'];
                }
                ?>
                <form role="form" action="proses/insert_setting_simas.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group" >
                            <div class="list-group-item">
                                <p class="lead"><strong><h4>Penentuan Waktu Shalat</h4></strong></p>
                                <p>Untuk mengatur penentuan tibanya waktu shalat (Subuh, Dzuhur, Ashar, Magrib, Isya) menurut imam syafii dan imam hanafi. DKM masjid dapat memilih salah satu penentuan waktu shalat menurut mashabnya masing - masing. <a href="#">Penjelasan</a>.</p>
                                <label>Pilih Salah Satu</label>
                                <label class="radio-inline">
                                    <input type="radio" name="atur_waktu_shalat" id="optionsRadiosInline1" value=1 <?php echo ($atur_waktu_shalat == 1 ? 'checked' : '')?>>Shafii
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="atur_waktu_shalat" id="optionsRadiosInline2" value=2 <?php echo ($atur_waktu_shalat == 2 ? 'checked' : '')?>>Hanafi
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="list-group-item">
                                <p class="lead"><strong><h4>Lama Tampil Jadwal Shalat</h4></strong></p>
                                <p>Untuk mengatur lamanya waktu penampilan jadwal shalat pada monitor setelah jadwal shalat itu di mulai. DKM masjid tidak dapat merubah lama tampil jadwal shalat tersebut. karena, sudah di atur otomatis oleh sistem. <a href="#">Penjelasan</a>.</p>
                                <label for="disabledSelect">Lama Waktu Tampil</label>
                                <input class="form-control" id="disabledInput" type="text" name="lama_tampil_shalat" placeholder="30 Menit" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="list-group-item">
                                <p class="lead"><strong><h4>Lama Tampil Jadwal Kegiatan</h4></strong></p>
                                <p>Untuk mengatur lamanya waktu penampilan jadwal kegiatan pada monitor setelah jadwal kegiatan itu di mulai.</p>
                                <p><strong>Contoh :</strong> Lama tampil 2 jam, maka inputkan satuan menitnya = 120, jika jadwal kegiatan terjadwal jam 07:00 pagi, dengan lama tampil 2 jam, maka jadwal kegiatan tersebut akan tampil pada monitor pada durasi 2 jam, yaitu pada rentang 07:00 - 09:00 pagi.   <a href="#">Penjelasan</a>.</p>
                                <label>Lama Waktu Tampil</label>
                                <input class="form-control" placeholder="Satuan Menit" required minlength="1" maxlength="10" value="<?php echo $atur_kegiatan." Menit"; ?>" name="lama_tampil_kegiatan">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="list-group-item">
                                <p class="lead"><strong><h4>Penentuan Jadwal Shaum/Puasa</h4></strong></p>
                                <p>Untuk mengatur penentuan jadwal hari ke-1 shaum/puasa sampai dengan hari terakhir shaum/puasa, yang hanya akan tampil pada layar monitor sesuai dengan waktunya. Diluar waktu tersebut jadwal shaum/puasa ini tidak akan tampil. <a href="#">Penjelasan</a>.</p>
                                <label>Hari Ke 1 Shaum / Puasa</label>
                                <input type="date" class="form-control" name="tgl_shaum" required value="<?php echo $hari_pertama_shaum;?>">
                                <div class="form-group">
                                    <label>Banyaknya Hari</label>
                                    <input class="form-control" placeholder="Angka" name="hari_shaum" value="<?php echo $banyak_hari_shaum." Hari"; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="list-group-item">
                            <label>Background Masjid</label>
                            <input type="file" name="backf" id="fileToUpload"><?php/*required accept="image/*"*/?>
                            <p class="form-control-static"><img class="logo" src='proses/<?php echo $background;?>' width="100" height="100"></p>
                        </div>
                         </div>
                        <button type="submit" class="btn btn-success pull-right" name="atur_simas">Simpan Pengaturan Masjid</button>

                </form>

            </div>
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>
<!-- /.col-lg-8 -->

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
