<?php 

session_start();

if (!isset($_SESSION['level'])) {
	header("Location:../autentikasi/login");
} // SAMPAI SINI / BUAT SESSION AGAR USER TIDAK BISA LANGSUNG KE HALAMAN INI!!
require '../functions.php';

$tglAwal = $_POST['tglAwal'];
$tglAkhir = $_POST['tglAkhir'];

$transaksi = query("SELECT * FROM transaksi WHERE tgl_transaksi BETWEEN CAST('$tglAwal' AS  DATE) AND CAST('$tglAkhir' AS DATE) ");


// ===== DOMPDF =====
require_once("../../../dompdf/autoload.inc.php");

use Dompdf\Dompdf;
$dompdf = new Dompdf();


$html = '
<style>
body {
  font-family: sans-serif;
}
p{
  font-family: monospace;
	font-size:14px;
}
h2{
  text-align: center;
}
th{
	font-size:11px;
}
td{
	font-size:9px;
}
th {
	background-color:#3B7DDD;
	color:white;
}
tbody tr:nth-child(odd) {
   background-color: #EBEDF1;
}
.empty {
	text-align:center;
  font-family: sans-serif;
	color:#474E68;
	padding-top:70px;
}
 </style>
	<h2>LAPORAN DATA TRANSAKSI PEMBAYARAN</h2>
	<br>
	<br>
	<hr>
	<center>
		<p>Range Tanggal : ' . $tglAwal . ' s/d ' . $tglAkhir . ' </p>
		<br><br><br>
		<table border="0" align="center" cellpadding="7" width="530" cellspacing="0">
			<thead>
				<tr align="center" class="heading">
					<th>No.</th>
					<th>No. Transaksi</th>
					<th>Jenis Pembayaran</th>
					<th>Nama Siswa</th>
					<th>Biaya SPP</th>
					<th>Total Pembayaran</th>
					<th>Tanggal Pembayaran</th> 
				</tr> <thead>';
			$no = 1;
			$html .= '<tbody>';
			foreach ($transaksi as $row) {
				//ambil nama siswa dari field kode_siswa
				$kodeSiswa = $row['kode_siswa']; 
				$tampilKodeSiswa = query(" SELECT * FROM data_siswa WHERE kode_siswa = '$kodeSiswa'")[0];
				
				$html .= "<tr align='center'>
				<td>".$no++."</td>
				<td>".$row['no_transaksi']."</td>
				<td>".$row['jenis_transaksi']."</td>
				<td>".$tampilKodeSiswa['nama_siswa']."</td>
				<td>".rupiah($row['total_biaya'])."</td>
				<td>".rupiah($row['total_bayar'])."</td>
				<td>".$row['tgl_transaksi']."</td>
				</tr>";
			}
			$html .= '</tbody></table>';
			// jika tidak ada data dalam range tanggal
			if(empty($transaksi)) {
				$html .= '<p class="empty">Tidak Ada Data :)</p>';
			}

$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('Laporan-Pembayaran-Spp.pdf');
?>