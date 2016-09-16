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
                    <h1 class="page-header">
                    Fitur Simas</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <?php
if (isset($_SESSION['tambah'])) {

    ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        Update Data Fitur Berhasil!!
    </div>
    <?php
    unset($_SESSION['tambah']);
}

?>
 <?php
                    $fitur = mysql_query("SELECT * FROM tabel_fitur_simas");
                    while($data=mysql_fetch_array($fitur)){
                        $qotd=$data['qotd'];
                        $slide1=$data['poster1'];
                        $slide2=$data['poster2'];
                        $slide3=$data['poster3'];
                        $slide4=$data['poster4'];
                        $slide5=$data['poster5'];
                    }
                    ?>
            <!-- /.row -->
        <div class="row">
           <form role="form" action="proses/insert_qod.php" method="POST">
        <div class="col-md-6">

                <div class="form-group">
                    <label>
                        Hadist
                    </label>
                   <textarea class="form-control" rows="5" name="qotd" required minlength="3"></textarea>
                </div>
                
        </div>
        <div class="col-md-6">
            <h3>
                <?php echo $qotd;?>
            </h3>
        </div>
                        <div class="col-lg-6">
                        </div>
                        <div class="col-lg-6">

                            <button type="reset" class="btn btn-danger">Reset</button>
                            <button type="submit" class="btn btn-success" name="updateqod">Update Data Masjid</button>
                        </div>
        </form>
    </div>
    <div class="row">
        <div class="col-md-4">
            <form role="form" action="proses/insert_slide1.php" method="POST" enctype="multipart/form-data">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Image Slide 1 
                    </h3>
                </div>
                <div class="panel-body">
                   <center><img alt="Bootstrap Image Preview" src="proses/<?php echo $slide1;?>" class="img-thumbnail" /></center>
                </div>
                <div class="panel-footer">
                   <div class="form-group">
                                <label>Input Gambar</label>
                                <input type="file" name="poster1" id="fileToUpload">
                    </div>
                    <div class="row">
                 <div class="col-lg-6">
                        </div>
                        <div class="col-lg-6">
                            <button type="submit" class="btn btn-success" name="updateslide1">Update Data Masjid</button>
                        </div>
                        </div>
                </div>
                
                </div>
            </form>
        </div>

        <div class="col-md-4">
        <form role="form" action="proses/insert_slide2.php" method="POST" enctype="multipart/form-data">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                         Image Slide 2 
                    </h3>
                </div>
                <div class="panel-body">
                   <center><img alt="Bootstrap Image Preview" src="proses/<?php echo $slide2;?>" class="img-thumbnail" /></center>
                </div>
                <div class="panel-footer">
                     <div class="form-group">                     
                    <label>Input Gambar</label>
                    <input type="file" name="poster2" id="fileToUpload">
                </div>
                <div class="row">
                 <div class="col-lg-6">
                        </div>
                        <div class="col-lg-6">
                            <button type="submit" class="btn btn-success" name="updateslide2">Update Data Masjid</button>
                        </div>
                        </div>
                </div>
                
            </div>
            </form>
            </div>
        <div class="col-md-4">
        <form role="form" action="proses/insert_slide3.php" method="POST" enctype="multipart/form-data">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                         Image Slide 3 
                    </h3>
                </div>
                <div class="panel-body">
                   <center><img alt="Bootstrap Image Preview" src="proses/<?php echo $slide3;?>" class="img-thumbnail" /></center>
                </div>
                <div class="panel-footer">
                      <div class="form-group">                     
                    <label>Input Gambar</label>
                    <input type="file" name="poster3" id="fileToUpload">
                </div>
                 <div class="row">
                 <div class="col-lg-6">
                        </div>
                        <div class="col-lg-6">
                            <button type="submit" class="btn btn-success" name="updateslide3">Update Data Masjid</button>
                        </div>
                        </div>
                </div>
               
            </div>
            </form>
        </div>

    </div>
    <div class="row">
        <div class="col-md-4">
        <form role="form" action="proses/insert_slide4.php" method="POST" enctype="multipart/form-data">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                         Image Slide 4 
                    </h3>
                </div>
                <div class="panel-body">
                   <center><img alt="Bootstrap Image Preview" src="proses/<?php echo $slide4;?>" class="img-thumbnail" /></center>
                </div>
                <div class="panel-footer">
                     <div class="form-group">                     
                    <label>Input Gambar</label>
                    <input type="file" name="poster4" id="fileToUpload">
                </div>
                <div class="row">
                 <div class="col-lg-6">
                        </div>
                        <div class="col-lg-6">
                            <button type="submit" class="btn btn-success" name="updateslide4">Update Data Masjid</button>
                        </div>
                        </div>
                </div>
            </div>
            </form>
        </div>
        <div class="col-md-4">
        <form role="form" action="proses/insert_slide5.php" method="POST" enctype="multipart/form-data">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                         Image Slide 5 
                    </h3>
                </div>
                <div class="panel-body">
                   <center><img alt="Bootstrap Image Preview" src="proses/<?php echo $slide5;?>" class="img-thumbnail" /></center>
                </div>
                <div class="panel-footer">
                     <div class="form-group">                     
                    <label>Input Gambar</label>
                    <input type="file" name="poster5" id="fileToUpload">
                </div>
                <div class="row">
                 <div class="col-lg-6">
                        </div>
                        <div class="col-lg-6">
                            <button type="submit" class="btn btn-success" name="updateslide5">Update Data Masjid</button>
                        </div>
                        </div>
                </div>
            </div>
            </form>
        </div>
        <div class="col-md-4">
            
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

    <!-- Morris Charts JavaScript -->
    <script src="../bower_components/raphael/raphael-min.js"></script>
    <script src="../bower_components/morrisjs/morris.min.js"></script>
    <script src="../js/morris-data.js"></script>

</body>

</html>
