<html>
<head>
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]-->
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <title></title></head>


<?php include "config.php";?>
<thead>
<tr>
    <th>ID</th>
    <th>Tanggal Kegiatan</th>
    <th>Nama Kegiatan</th>
    <th>Waktu Kegiatan</th>
    <th>Pemateri</th>
    <th>Tempat Kegiatan</th>
    <th>Aksi</th>
</tr>
</thead>
<tbody>
<?php
$results = mysql_query("SELECT * FROM jadwal_kegiatan");
$i=1;
while($data=mysql_fetch_array($results)){
    echo "<tr class='odd gradeX'>";
    echo "<td>".$i++."</td>";
    echo "<td>".$data['tgl_kegiatan']."</td>";
    echo "<td>".$data['nama_kegiatan']."</td>";
    echo "<td>".$data['waktu_kegiatan']."</td>";
    echo "<td>".$data['pemateri']."</td>";
    echo "<td>".$data['tempat_kegiatan']."</td>";
    echo "<td><a href='proses/hapus_jadwal_kegiatan.php?id_kegiatan=".$data['id_kegiatan']."'><i class='fa fa-trash-o
 fa-2x'></i></a></td>";
    echo "</tr>";
}
?>

</tbody>
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

    <!-- Page-Level Demo Scripts - Notifications - Use for reference -->
    <script>
</html>