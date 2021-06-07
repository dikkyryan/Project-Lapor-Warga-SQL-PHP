<?php
define('FPDF_FONTPATH','font/');
require('fpdf/fpdf.php');
include "koneksi.php";
$tanggal1 = $_POST['from'];
$tanggal2 = $_POST['to'];
class PDF extends FPDF
{

//Page header
function Header()
{
    //Logo
    //$this->Image('logo_pb.png',10,8,33);
    //Arial bold 15
	$this->Ln(10);
    $this->SetFont('Arial','B',13);
    //Move to the right
    $this->Cell(100);
    //Title
    $this->Cell(130,10,'Data Laporan Bulanan',0,0,'C');
	$this->SetFont('Arial','I',10);
    //Line break
    $this->Ln(20);
}

//Page footer
function Footer()
{
    //Position at 1.5 cm from bottom
	//$this->Ln(10);
    $this->SetY(-25);
    //Arial italic 8
    $this->SetFont('Arial','I',8);
    //Page number
    $this->Cell(0,10,'Halaman '.$this->PageNo().'/{nb}',0,0,'C');
}
}

//Instanciation of inherited class
$pdf=new PDF('L','mm','Legal');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',9);
$pdf->SetX(25);
$pdf->Cell(30,6,'Dari Tanggal',0,0,'L');
$pdf->Cell(0,6,':  '.$tanggal1,0,0,'L');
$pdf->Ln(5);
$pdf->SetX(25);
$pdf->Cell(30,6,'Sampai Tanggal',0,0,'L');
$pdf->Cell(0,6,':  '.$tanggal2,0,0,'L');
$pdf->Ln(10);
$pdf->SetX(10);
$sql=mysqli_query($conn,"select * from selesai,laporan,admin,user,kategori where selesai.id_laporan = laporan.id_laporan and admin.id_admin = selesai.id_admin and user.id_user = laporan.id_user and selesai.id_user = user.id_user and laporan.id_kategori = kategori.id_kategori and (selesai.tgl_selesai between '$tanggal1' and '$tanggal2') order by CONCAT(LPAD((RIGHT((laporan.id_laporan),6)),6,'0')) DESC") ;
$i=1;
$pdf->setFillColor(222,222,222);
$pdf->CELL(8,6,'NO',1,0,'C',1);
$pdf->CELL(54,6,'Judul Laporan',1,0,'C',1);
$pdf->CELL(54,6,'Kategori Laporan',1,0,'C',1);
$pdf->CELL(54,6,'Nama Pelapor',1,0,'C',1);
$pdf->CELL(54,6,'Nama Petugas',1,0,'C',1);
$pdf->CELL(54,6,'Status Laporan',1,0,'C',1);
$pdf->CELL(54,6,'Tanggal Selesai',1,0,'C',1);
while ($data = mysqli_fetch_array($sql)){ 
$pdf->SetY(61);
$pdf->setFillColor(255,255,255);
$pdf->cell(8,6,$i,1,0,'C',1);
$pdf->cell(54,6,$data['judul_laporan'],1,0,'L',1);
$pdf->cell(54,6,$data['kategori'],1,0,'L',1);
$pdf->cell(54,6,$data['nama_user'],1,0,'L',1);
$pdf->cell(54,6,$data['nama_admin'],1,0,'L',1);
$pdf->cell(54,6,$data['status_laporan'],1,0,'L',1);
$pdf->cell(54,6,date('d/m/Y', strtotime($data['tgl_selesai'])),1,0,'L',1);
$i++;
}
$pdf->Output();
?>