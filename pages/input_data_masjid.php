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
    <script src="../validation/additional-methods.js"></script>
    <!-- validasi -->
    <script type="text/javascript" src="sip.js"></script>
    <script type="text/javascript">
        var htmlobjek;
        $(document).ready(function(){
            //apabila terjadi event onchange terhadap object <select id=propinsi>
            $("#propinsi").change(function(){
                var propinsi = $("#propinsi").val();
                $.ajax({
                    url: "ambilkota.php",
                    data: "propinsi="+propinsi,
                    cache: false,
                    success: function(msg){
                        //jika data sukses diambil dari server kita tampilkan
                        //di <select id=kota>
                        $("#kota").html(msg);
                    }
                });
            });
            $("#kota").change(function(){
                var kota = $("#kota").val();
                $.ajax({
                    url: "ambilkecamatan.php",
                    data: "kota="+" "+kota,
                    cache: false,
                    success: function(msg){
                        $("#kec").html(msg);
                    }
                });
            });
        });

    </script>
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

    <?php include "top-nav.php";?>
<!-- /.navbar-top-links -->

<div class="navbar-default sidebar" role="navigation">
    <?php include "left-nav.php";?>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav>

<div id="page-wrapper">
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Data Masjid</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<?php
if (isset($_SESSION['tambah'])) {

    ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        Update Data Masjid Berhasil. <a href="lihat_data_masjid.php" class="alert-link">Lihat Data Masjid</a>.
    </div>
    <?php
    unset($_SESSION['tambah']);
}

?>
<!-- /.row -->
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
    Input Data Masjid
</div>
<!-- /.panel-heading -->
<div class="panel-body">
<!-- Nav tabs -->
<ul class="nav nav-tabs">
    <li class="active"><a href="#home" data-toggle="tab">Form Data Masjid</a>
    </li>
    <li><a href="#profile" data-toggle="tab">Struktur Organisasi</a>
    </li>
    <li><a href="#messages" data-toggle="tab">Fasilitas</a>
    </li>
    <li><a href="#settings" data-toggle="tab">Kegiatan</a>
    </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
<div class="tab-pane fade in active" id="home">
    <br>
    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <?php
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
                    <div class="col-lg-6">
                        <form role="form" action="proses/update_data_masjid.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nama Masjid</label>
                                <input type="text" class="form-control" name="namamasjid" required minlength="3" maxlength="40" value="<?php echo $nama;?>">
                            </div>
                            <div class="form-group">
                                <label>Tipologi</label>
                                <select class="form-control" name="tipologi" required>
                                    <option value="" <?php echo ($tipologi == '' ? 'selected': '')?>>Pilih Tipologi</option>
                                    <option value="MASJID NEGARA" <?php echo ($tipologi == 'MASJID NEGARA' ? 'selected': '')?>>MASJID NEGARA</option>
                                    <option value="MASJID RAYA" <?php echo ($tipologi == 'MASJID RAYA' ? 'selected': '')?>>MASJID RAYA</option>
                                    <option value="MASJID AGUNG" <?php echo ($tipologi == 'MASJID AGUNG' ? 'selected': '')?>>MASJID AGUNG</option>
                                    <option value="MASJID BESAR" <?php echo ($tipologi == 'MASJID BESAR' ? 'selected': '')?>>MASJID BESAR</option>
                                    <option value="MASJID JAMI" <?php echo ($tipologi == 'MASJID JAMI' ? 'selected': '')?>>MASJID JAMI</option>
                                    <option value="MASJID BERSEJARAH" <?php echo ($tipologi == 'MASJID BERSEJARAH' ? 'selected': '')?>>MASJID BERSEJARAH</option>
                                    <option value="MASJID DI TEMPAT PUBLIK" <?php echo ($tipologi == 'MASJID DI TEMPAT PUBLIK' ? 'selected': '')?>>MASJID DI TEMPAT PUBLIK</option>
                                    <option value="MASJID NASIONAL" <?php echo ($tipologi == 'MASJID NASIONAL' ? 'selected': '')?>>MASJID NASIONAL</option>
                                    <option value="MUSHALLA DI TEMPAT PUBLIK" <?php echo ($tipologi == 'MUSHALLA DI TEMPAT PUBLIK' ? 'selected': '')?>>MUSHALLA DI TEMPAT PUBLIK</option>
                                    <option value="MUSHALLA PERKANTORAN" <?php echo ($tipologi == 'MUSHALLA PERKANTORAN' ? 'selected': '')?>>MUSHALLA PERKANTORAN</option>
                                    <option value="MUSHALLA PENDIDIKAN" <?php echo ($tipologi == 'MUSHALLA PENDIDIKAN' ? 'selected': '')?>>MUSHALLA PENDIDIKAN</option>
                                    <option value="MUSHALLA PERUMAHAN" <?php echo ($tipologi == 'MUSHALLA PERUMAHAN' ? 'selected': '')?>>MUSHALLA PERUMAHAN</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Logo Masjid</label>
                                <input type="file" name="uploadfoto" id="fileToUpload" <?php/*required accept="image/*"*/?>
                                <p class="form-control-static"><img class="logo" src='proses/<?php echo "$logo";?>' width="100" height="100"><?php echo " Directory: $logo";?></p>
                            </div>
                            <div class="form-group">
                                <label>No Telp/Hp</label>
                                <input class="form-control" name="telpmasjid" required type="number" rangelength="[11,12]" value="<?php echo $notelp; ?>">
                            </div>
                            <div class="form-group">
                                <label>Tema Masjid</label>
                                <textarea class="form-control" rows="5" name="temamasjid" required minlength="3" ><?php echo $tema; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Pilih Provinsi</label>
                                <select class="form-control" name="propinsi" id="propinsi" required>
                                    <option value="">--Pilih Provinsi--</option>
                                    <?php
                                    //mengambil nama-nama propinsi yang ada di database
                                    $propinsi = mysql_query("SELECT * FROM prov ORDER BY nama_prov");
                                    while($p=mysql_fetch_array($propinsi)){
                                        //echo "<option value=\"$p[id_prov]\">$p[nama_prov]</option>\n";
                                        if($p[id_prov]==$provinsi){
                                            echo "<option value=\"$p[id_prov]\" selected>$p[nama_prov]</option>\n";
                                        }
                                        else{
                                            echo "<option value=\"$p[id_prov]\">$p[nama_prov]</option>\n";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Pilih Kabupaten/Kota</label>
                                <select class="form-control" name="kota" id="kota" required>
                                    <option value="">--Pilih Kabupaten/Kota--</option>
                                    <?php
                                    //mengambil nama-nama propinsi yang ada di database
                                    $kota = mysql_query("SELECT * FROM kabkot ORDER BY nama_kabkot");
                                    while($p=mysql_fetch_array($kota)){
                                        if($p[id_kabkot]==$kab_kota){
                                            echo "<option value=\"$p[id_kabkot]\" selected>$p[nama_kabkot]</option>\n";
                                        }
                                        else{
                                            echo "<option value=\"$p[id_kabkot]\">$p[nama_kabkot]</option>\n";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Pilih Kecamatan</label>

                                <select class="form-control" name="kec" id="kec" required>
                                    <option value="">--Pilih Kecamatan--</option>
                                    <?php
                                    $kec = mysql_query("SELECT * FROM kec where id_kabkot = '$kab_kota' ORDER BY nama_kec");
                                    while($p=mysql_fetch_array($kec)){
                                        if($p['id_kec']==$kecamatan){
                                            echo "<option value=\"$p[id_kec]\" selected>$p[nama_kec]</option>\n";
                                        }
                                        else{
                                            echo "<option value=\"$p[id_kec]\">$p[nama_kec]</option>\n";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Alamat Masjid</label>
                                <textarea class="form-control" rows="5" name="alamatmasjid" required minlength="3" maxlength="150" ><?php echo $alamat; ?></textarea>
                            </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Tahun Berdiri</label>
                            <input class="form-control" name="tahunberdiri" required type="number" rangelength="[1,10]" value="<?php echo $tahunberdiri;?>">
                        </div>
                        <div class="form-group">
                            <label>Jumlah Jama'ah Aktif</label>
                            <br>
                            <label class="radio-inline">
                                <input type="radio" name="jumlahjamaah" id="optionsRadiosInline1" value="< 10" required <?php echo ($jamaah == '< 10' ? 'checked' : '')?>>< 10 Orang
                            </label>
                            <br>
                            <label class="radio-inline">
                                <input type="radio" name="jumlahjamaah" id="optionsRadiosInline2" value="10 > < 50"  required <?php echo ($jamaah == '10 > < 50' ? 'checked' : '')?>>10 > < 50 Orang
                            </label>
                            <br>
                            <label class="radio-inline">
                                <input type="radio" name="jumlahjamaah" id="optionsRadiosInline3" value="50 > < 100"  required <?php echo ($jamaah == '50 > < 100' ? 'checked' : '')?> >50 > < 100 Orang
                            </label>
                            <br>
                            <label class="radio-inline">
                                <input type="radio" name="jumlahjamaah" id="optionsRadiosInline4" value="100 > < 200"  required <?php echo ($jamaah == '100 > < 200' ? 'checked' : '')?>> 100 > < 200 Orang
                            </label>
                            <br>
                            <label class="radio-inline">
                                <input type="radio" name="jumlahjamaah" id="optionsRadiosInline5" value="200 >"  required <?php echo ($jamaah == '200 >' ? 'checked' : '')?>>200 > Orang
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Jumlah Imam Aktif</label>
                            <input class="form-control" name="jumlahimam" required type="number" rangelength="[1,10]" value="<?php echo $imam;?>">
                        </div>
                        <div class="form-group">
                            <label>Jumlah Khotib Aktif</label>
                            <input class="form-control" name="jumlahkhotib" required type="number" rangelength="[1,10]" value="<?php echo $khotib;?>">
                        </div>
                        <div class="form-group">
                            <label>Jumlah Muazin Aktif</label>
                            <input class="form-control" name="jumlahmuazin" required type="number" rangelength="[1,10]" value="<?php echo $muazin;?>">
                        </div>
                        <div class="form-group">
                            <label>Jumlah Remaja Aktif</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="jumlahremaja" id="optionsRadiosInline1" value="< 10" required <?php echo ($remaja == '< 10' ? 'checked' : '')?>>< 10 Orang
                            </label>
                            <br>
                            <label class="radio-inline">
                                <input type="radio" name="jumlahremaja" id="optionsRadiosInline2" value="10 > < 50" required <?php echo ($remaja == '10 > < 50' ? 'checked' : '')?>>10 > < 50 Orang
                            </label>
                            <br>
                            <label class="radio-inline">
                                <input type="radio" name="jumlahremaja" id="optionsRadiosInline3" value="50 > < 100" required <?php echo ($remaja == '50 > < 100' ? 'checked' : '')?>>50 > < 100 Orang
                            </label>
                            <br>
                            <label class="radio-inline">
                                <input type="radio" name="jumlahremaja" id="optionsRadiosInline4" value="100 > < 200" required <?php echo ($remaja == '100 > < 200' ? 'checked' : '')?>> 100 > < 200 Orang
                            </label>
                            <br>
                            <label class="radio-inline">
                                <input type="radio" name="jumlahremaja" id="optionsRadiosInline5" value="200 >" required <?php echo ($remaja == '200 >' ? 'checked' : '')?>>200 > Orang
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Luas Tanah</label>
                            <input class="form-control" name="luastanah" required type="number" rangelength="[1,10]" value="<?php echo $luastanah;?>">
                        </div>
                        <div class="form-group">
                            <label>Status Tanah</label>
                            <input type="text" class="form-control" name="statustanah" required maxlength="25" minlength="3" value="<?php echo $statustanah;?>">
                        </div>
                        <div class="form-group">
                            <label>Luas Bangunan</label>
                            <input class="form-control" name="luasbangunan" required type="number" rangelength="[1,10]" value="<?php echo $luasbangunan;?>">
                        </div>
                        <div class="form-group">
                            <label>Keterangan Masjid</label>
                            <textarea class="form-control" rows="3" name="ketmasjid" required minlength="3" maxlength="150"><?php echo $ketmasjid; ?></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                        </div>
                        <div class="col-lg-6">

                            <button type="reset" class="btn btn-danger">Reset</button>
                            <button type="submit" class="btn btn-success" name="updatemasjid">Update Data Masjid</button>

                        </div>
                    </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="tab-pane fade" id="profile">
    <br>
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <form role="form" action="proses/update_struk_org.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Struktur Organisasi Masjid</label>
                        <input type="file" name="struk_org" id="fileToUpload" required accept="image/*">
                    </div>
                    <div class="form-group">
                        <?php
                        $datamasjid = mysql_query("SELECT * FROM data_masjid");
                        while($data=mysql_fetch_array($datamasjid)){
                            $struk_org=$data['struk_org'];
                            $jum_pengurus=$data['jum_pengurus'];
                        }
                        ?>
                        <label>Jumlah Pengurus</label>
                        <input class="form-control" name="jum_pengurus" required type="number" rangelength="[1,10]" value="<?php echo $jum_pengurus;?>">
                    </div>
                    <button type="submit" class="btn btn-success" name="update_struk">Update Struktur Organisasi</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <label>Struktur Organisasi</label>
                <p class="form-control-static"><img class="logo" src='proses/<?php echo "$struk_org";?>' width="100%" height="100%"></p>
            </div>
        </div>
        ,   </div>
</div>

<div class="tab-pane fade" id="messages">
    <div class="row">
        <br>
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-lg-6">
                        <?php
                        $fa_mas = mysql_query("SELECT * FROM `fasilitas_masjid`");
                        $fafa='';
                        $daya_tampung='';
                        while($data=mysql_fetch_array($fa_mas)){
                        $fafa[]=$data['kode_fa'];
                        $daya_tampung=$data['daya_tampung'];
                        }
                        ?>
                        <form role="form" action="fasilitas_masjid.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Centang Fasilitas yang tersedia :</label>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="fa1" value="1" <?php echo (in_array(1, $fafa) ? 'checked' : '')?>>Sound System dan Multimedia,
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="fa2" value="2" <?php echo (in_array(2, $fafa) ? 'checked' : '')?>>Pembangkit Listrik/Genset,
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="fa3" value="3" <?php echo (in_array(3, $fafa) ? 'checked' : '')?>>Kamar Mandi/WC,
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="fa4" value="4" <?php echo (in_array(4, $fafa) ? 'checked' : '')?>>Tempat Wudhu,
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="fa5" value="5" <?php echo (in_array(5, $fafa) ? 'checked' : '')?>>Sarana Ibadah,
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="fa6" value="6" <?php echo (in_array(6, $fafa) ? 'checked' : '')?>>Kamar mandi/WC,
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="fa7" value="7" <?php echo (in_array(7, $fafa) ? 'checked' : '')?>>Taman,
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="fa8" value="8" <?php echo (in_array(8, $fafa) ? 'checked' : '')?>>Parkir,
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="fa9" value="9" <?php echo (in_array(9, $fafa) ? 'checked' : '')?>>Ruang Belajar (TPA/Madrasah),
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="fa10" value="10" <?php echo (in_array(10, $fafa) ? 'checked' : '')?>>Aula Serba Guna,
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="fa11" value="11" <?php echo (in_array(11, $fafa) ? 'checked' : '')?>>Gudang,
                                    </label>
                                </div>
                                <br>
                            </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <div class="form-group">
                                <label>Daya Tampung Jamaah</label>
                                <input class="form-control" name="tampung_jamaah" required type="number" value="<?php echo $daya_tampung;?>" rangelength="[1,10]">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="fa12" value="12" <?php echo (in_array(12, $fafa) ? 'checked' : '')?>>Kantor Sekretariat,
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="fa13" value="13" <?php echo (in_array(13, $fafa) ? 'checked' : '')?>>Internet Akses,
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="fa14" value="14" <?php echo (in_array(14, $fafa) ? 'checked' : '')?>>Poliklinik,
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="fa15" value="15" <?php echo (in_array(15, $fafa) ? 'checked' : '')?>>Koperasi,
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="fa16" value="16" <?php echo (in_array(16, $fafa) ? 'checked' : '')?>>Perpustakaan,
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="fa17" value="17" <?php echo (in_array(17, $fafa) ? 'checked' : '')?>>Penyejuk Udara/AC,
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="fa18" value="18" <?php echo (in_array(18, $fafa) ? 'checked' : '')?>>Sarana Olah Raga,
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="fa19" value="19" <?php echo (in_array(19, $fafa) ? 'checked' : '')?>>Lift bagi penyandang cacat,
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="fa20" value="20" <?php echo (in_array(20, $fafa) ? 'checked' : '')?>>Tempat Penitipan Sepatu/Sandal,
                                </label>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-success" name="update_struk">Update Struktur Organisasi
                        </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
        <div class="tab-pane fade" id="settings">
            <div class="row">
                <br>
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <?php
                            $rut_keg = mysql_query("SELECT * FROM `kegiatan_rutin`");
                            $rut='';
                            while($datarut=mysql_fetch_array($rut_keg)){
                                $rut[]=$datarut['kode_rutin'];
                            }

                            ?>
                            <form role="form" action="proses/kegiatan_masjid.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Centang Kegiatan Rutin yang Berlangsung :</label>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="1" name="rut1" <?php echo (in_array(1, $rut) ? 'checked' : '')?>>Menyelenggarakan kegiatan pendidikan (TPA, Madrasah, Pusat Kegiatan Belajar Masyarakat),
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="2" name="rut2" <?php echo (in_array(2, $rut) ? 'checked' : '')?>>Menyelenggarakan Pengajian Rutin,
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="3" name="rut3" <?php echo (in_array(3, $rut) ? 'checked' : '')?>>Menyelenggarakan Kegiatan Hari Besar Islam,
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="4" name="rut4" <?php echo (in_array(4, $rut) ? 'checked' : '')?>>Menyelenggarakan Sholat Jumat,
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="5" name="rut5" <?php echo (in_array(5, $rut) ? 'checked' : '')?>>Menyelenggarakan Ibadah Sholat Fardhu,
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="6" name="rut6" <?php echo (in_array(6, $rut) ? 'checked' : '')?>>Menyelenggarakan Dakwah Islam/Tabliq Akbar,
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="7" name="rut7" <?php echo (in_array(7, $rut) ? 'checked' : '')?>>Pemberdayaan Zakat, Infaq, Shodaqoh dan Wakaf,
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="8" name="rut8" <?php echo (in_array(8, $rut) ? 'checked' : '')?>>Menyelenggarakan kegiatan sosial ekonomi (koperasi masjid),
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-success" name="update_rut">Update Kegiatan Rutin
                                </button>
                            </form>
                            </div></div></div></div></div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<!-- /.panel-body -->
</div>
<!-- /.panel -->
</div>
<!-- /.col-lg-6 -->

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
