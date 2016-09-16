<?php
//koneksi ke database
include "../config.php";
if(empty($_SESSION['user_masjid'])){
    header("location:../login.php");
}
$datamasjid = mysql_query("SELECT * FROM tabel_data_masjid");

while($data=mysql_fetch_array($datamasjid)){
    $nama1=$data['nama_masjid'];
    $tipologi=$data['tipologi_masjid'];
}
$type = explode(" ",$tipologi);
$nama1 = $type[0]." ".strtoupper($nama1);
//mengambil data dari tabel
$sql=mysql_query("SELECT * FROM tabel_kas_masjid ORDER BY id_kas");
$data = array();
while ($row = mysql_fetch_assoc($sql)) {
    array_push($data, $row);
}


 
//mengisi judul dan header tabel
$judul = "DATA KAS ".$nama1;
$header = array(
array("label"=>"ID", "length"=>20, "align"=>"L"),
array("label"=>"Tanggal Kas", "length"=>30, "align"=>"L"),
array("label"=>"Nama Kas", "length"=>30, "align"=>"L"),
array("label"=>"Pemasukan", "length"=>30, "align"=>"L"),
array("label"=>"Pengeluaran", "length"=>30, "align"=>"L"),
array("label"=>"Saldo", "length"=>30, "align"=>"L"),
);

//memanggil fpdf
require_once ("fpdf.php");
$pdf = new FPDF();
$pdf->AddPage();
 
//tampilan Judul Laporan
$pdf->SetFont('Arial','B','16'); //Font Arial, Tebal/Bold, ukuran font 16
$pdf->Cell(0,20, $judul, '0', 1, 'C');
 
//Header Table
$pdf->SetFont('Arial','','10');
$pdf->SetFillColor(139, 69, 19); //warna dalam kolom header
$pdf->SetTextColor(255); //warna tulisan putih
$pdf->SetDrawColor(222, 184, 135); //warna border
foreach ($header as $kolom) {
    $pdf->Cell($kolom['length'], 5, $kolom['label'], 1, '0', $kolom['align'], true);
    }
$pdf->Ln();
 
//menampilkan data table
$pdf->SetFillColor(245, 222, 179); //warna dalam kolom data
$pdf->SetTextColor(0); //warna tulisan hitam
$pdf->SetFont('');
$fill=false;
foreach ($data as $baris) {
$i = 0;
foreach ($baris as $cell) {
$pdf->Cell($header[$i]['length'], 5, $cell, 1, '0', $kolom['align'], $fill);
$i++;
}

$fill = !$fill;
$pdf->Ln();
}
 
//output file pdf
$pdf->Output();
?>