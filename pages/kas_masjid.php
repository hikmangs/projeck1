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

    <!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

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

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Kas Masjid</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <?php
            if (isset($_SESSION['tambah'])) {
                        
                        ?>
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Input Kas Masjid Berhasil.<a href="" class="alert-link"></a>.
                            </div>
                        <?php
                        unset($_SESSION['tambah']);
                        }
                        
            ?>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form Kas Masjid
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                <form role="form" action="proses/insert_kas.php" method="POST" onsubmit="return simpan()">
                                     <div class="form-group">
                                            <label>Tanggal Kas</label>
                                            <input type="date" class="form-control" name="tglkas" required>
                                      </div>
                                      <div class="form-group">
                                            <label>Nama Kas</label>
                                            <input type="text" class="form-control" name="namakas" required minlength="3" maxlength="25">
                                        </div>  
                                        <div class="form-group">
                                            <label>Pemasukan</label>
                                            <input type="number" class="form-control" name="pemasukan" required rangelength="[1,10]">
                                        </div>    
                                        <div class="form-group">
                                            <label>Pengeluaran</label>
                                            <input type="number" class="form-control" name="pengeluaran" required rangelength="[1,10]">
                                        </div>  
                                        <div class="row">
                                    <div class="col-lg-3">
                                    </div>
                                    <div class="col-lg-9">
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                        <button type="submit" class="btn btn-success" name="inputkas">Input Kas Masjid</button>
                                    </div>
                                    </div>
                                    </form>                      
                                 </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                        </div>
                        <div class="panel-footer">
                            Panel Footer
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-8">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Data Kas Masjid
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal Kas</th>
                                            <th>Nama Kas</th>
                                            <th>Pemasukan</th>
                                            <th>Pengeluaran</th>
                                            <th>Saldo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                     $results = mysql_query("SELECT * FROM tabel_kas_masjid");
                                     $i=1;
                                     $saldo_akhir=0;
                                     $saldo_awal=0;
                                    while($data=mysql_fetch_array($results)){
                                        echo "<tr class='odd gradeX'>";
                                        echo "<td>".$i++."</td>";    
                                        echo "<td>".$data['tanggal_kas']."</td>";    
                                        echo "<td>".$data['nama_kas']."</td>";    
                                        echo "<td class='center'>".$data['pemasukan']."</td>";    
                                        echo "<td class='center'>".$data['pengeluaran']."</td>";    
                                        echo "<td>".$data['saldo']."</td>"; 
                                        echo "</tr>";
                                        $saldo_akhir+=$saldo_awal+$data['saldo'];
                                    }   
                                    ?>
                                    <tr class="gradeC">
                                            <td><?php echo $i++;?></td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td class="center">-</td>
                                            <td class="center">SALDO AKHIR</td>
                                            <td><?php echo $saldo_akhir;?></td>
                                        </tr>
                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            <div class="well">
                                <h4>Print to PDF File</h4>
                                <p></p>
                                <a class="btn btn-default btn-lg btn-block" target="_blank" href="fpdf/pdfkas.php">View Data Kas Masjid</a>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
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

    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    function simpan(){
        if(confirm('Apakah anda ingin menginputkan data kas masjid tersebut?')){
            return true;
        }
        else{
            return false;
        }
    }
    </script>

</body>

</html>
