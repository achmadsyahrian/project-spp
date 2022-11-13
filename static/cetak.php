<?php 

session_start();
if (!isset($_SESSION['level'])) {
	header("Location:login");
}

require 'functions.php';

$titlePage = "Laporan";

$tglAwal = $_POST['tglAwal'];
$tglAkhir = $_POST['tglAkhir'];

$transaksi = query("SELECT * FROM transaksi WHERE tgl_transaksi BETWEEN CAST('$tglAwal' AS  DATE) AND CAST('$tglAkhir' AS DATE) ");


?>


<!DOCTYPE html>
<html lang="en">

	<?php 
		include('partials/head.php');
	?>

	<style>
		table{
			text-align:left;
		}

		table tr td {
			font-size:13px;
		}
	</style>

<body>
	<div class="wrapper">
	
		<div class="main">

			<main class="content">
				<div class="container-fluid text-center">
					<h1 class="h2 mb-3"><strong> LAPORAN DATA TRANSAKSI PEMBAYARAN </strong></h1>
          <hr>
          <div class="row">
            <div class="col-sm-12">
              <p>Range Tanggal : <?= $tglAwal; ?>	s/d <?= $tglAkhir; ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-12 d-flex">
              <table class="table table-hover my-5  table-responsive table-striped ">
									<thead>
										<tr class="bg-primary text-light">
											<th>No.</th>
											<th class="d-xl-table-cell">No. Transaksi</th>
											<th class="d-xl-table-cell">Jenis Pembayaran</th>
											<th class="d-xl-table-cell">Nama Siswa</th>
											<th class="d-xl-table-cell">Biaya SPP</th>
											<th class="d-xl-table-cell">Total Pembayaran</th>
											<th class="d-xl-table-cell">Tanggal Pembayaran</th>
										</tr>
									</thead>
									<tbody>										
                    <?php $i=1 ?>
										<?php foreach ($transaksi as $row) : ?> 
											<?php 
												$kodeSiswa = $row['kode_siswa']; 
												$tampilKodeSiswa = query(" SELECT * FROM data_siswa WHERE kode_siswa = '$kodeSiswa'")[0];
											?>
											<tr>
                        <td><?= $i++; ?></td>
												<td class="d-xl-table-cell"><?= $row['no_transaksi']; ?></td>
												<td class="d-xl-table-cell"><?= $row['jenis_transaksi']; ?></td>
												<td class="d-xl-table-cell iniNama"><?= $tampilKodeSiswa['nama_siswa']; ?></td>
												<td class="d-xl-table-cell"><?= $row['total_biaya']; ?></td>
												<td class="d-md-table-cell"><?= $row['total_bayar']; ?></td>
												<td class="d-md-table-cell"><?= $row['tgl_transaksi']; ?></td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
            </div>
          </div>
				</div>
			</main>
			

			<?php 
				include('partials/footer.php');
			?>

		</div>
	</div>


	<?php 
			include('partials/script.php');
		?>


</body>

</html>