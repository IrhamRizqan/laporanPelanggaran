<?php
include '../libs.php';
$Lapor = "SELECT nis, nama, kelas, coalesce( total, 0 ) AS total
FROM (
SELECT sum( tp.point ) AS total, ts.nama, ts.nis, ts.kd_kelas, tk.kelas AS kelas
FROM tb_pelanggaran tp
RIGHT JOIN tb_siswa ts ON ts.nis = tp.nis
LEFT JOIN tb_kelas tk ON tk.kd_kelas = ts.kd_kelas
GROUP BY ts.nama, ts.nis
)x
WHERE kd_kelas = '$_GET[kd]'
ORDER BY total DESC
";
$Hasil = mysql_query($Lapor);
$Data = array();
	while($row = mysql_fetch_assoc($Hasil)){
		array_push($Data, $row);
	}
	
	//mengisi judul dan header tabel
	$jumlah="Jumlah Siswa : ".$jml;
	$Judul = "LAPORAN TOTAL POIN PELANGGARAN PER KELAS";
	$header = array(
		array("label"=>"NIS", "length"=>30, "align"=>"L"),
		array("label"=>"Nama", "length"=>65, "align"=>"L"),
		array("label"=>"Kelas", "length"=>40, "align"=>"C"),
		array("label"=>"Total Poin", "length"=>50, "align"=>"L"),
	);
	require ("../assets/fpdf16/fpdf.php");
	$pdf = new FPDF();
	$pdf->AddPage('P','A4','C');
	$pdf->SetFont('arial','B','15');
	$pdf->Cell(0, 15, $Judul, '0', 1, 'C');
	$pdf->SetFont('arial','i','9');
	$pdf->Cell(0, 10, $tgl, '0', 1, 'P');
	$pdf->SetFont('arial','','12');
	$pdf->SetFillColor(190,190,0);
	$pdf->SetTextColor(255);
	$pdf->setDrawColor(128,0,0);
	foreach ($header as $Kolom){
		$pdf->Cell($Kolom['length'], 8, $Kolom['label'], 1, '0', $Kolom['align'], true);
	}
	$pdf->Ln();
	$pdf->SetFillColor(244,235,255);
	$pdf->SettextColor(0);
	$pdf->SetFont('arial','','10');
	$fill =false;
	foreach ($Data as $Baris){
	$i= 0;
	foreach ($Baris as $Cell){
		$pdf->Cell ($header[$i]['length'], 7, $Cell, 2, '0', $Kolom['align'], $fill);
		$i++;
	}
	$fill = !$fill;
	$pdf->Ln();
}
$pdf->Output();
?>