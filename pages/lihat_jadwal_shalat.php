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
                    <h1 class="page-header">Lihat Jadwal Shalat</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
             <?php

            if (isset($_SESSION['hapus_shalat'])) {
                        
                        ?>
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Hapus Jadwal Shalat Berhasil.
                            </div>
                        <?php
                        unset($_SESSION['hapus_shalat']);
                        }
                        
            ?>
            <!-- /.row -->
             <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Jadwal Shalat
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tanggal Shalat</th>
                                            <th>Imam</th> 
                                            <th>Ket Shalat</th>
                                            <th>Waktu Shalat</th>
                                            <th>Khotib</th>
                                            <th>Muazin</th>
                                            <th>Tema</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                     $results = mysql_query("SELECT * FROM tabel_jadwal_shalat");
                                     $i=1;
                                    while($data=mysql_fetch_array($results)){
                                        echo "<tr class='odd gradeX'>";
                                        echo "<td>".$i++."</td>";    
                                        echo "<td>".$data['tgl_shalat']."</td>";    
                                        echo "<td>".$data['id_imam_shalat']."</td>";    
                                        echo "<td class='center'>".$data['ket_shalat']."</td>";    
                                        echo "<td class='center'>".$data['waktu_shalat']."</td>"; 
                                        echo "<td>".$data['khotib_shalat']."</td>";    
                                        echo "<td>".$data['muazin_shalat']."</td>";   
                                        echo "<td>".$data['tema_shalat']."</td>"; 
                                        echo "<td class='center'><a href='proses/hapus_jadwal_shalat.php?id_jadwal_shalat=".$data['id_jadwal_shalat']."'><i class='fa fa-trash-o
 fa-2x'></i></a></td>";  
                                        echo "</tr>";
                                    }
                                    ?>
                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            <div class="well">
                                <h4>Print to PDF File</h4>
                                <p></p>
                                <a class="btn btn-default btn-lg btn-block" target="_blank" href="fpdf/pdfjadwalshalat.php">View Jadwal Shalat</a>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
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
     <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

</body>

</html>

