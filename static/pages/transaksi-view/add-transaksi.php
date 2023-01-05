<?php 
session_start();
if (!isset($_SESSION['level'])) {
	header("Location:../autentikasi/login");
} elseif ($_SESSION['level'] == "User") {
	header("Location:../index");
}

$titlePage ="Transaksi";

require '../functions.php';


if (isset($_POST["bayar"])) {

	$status = $_POST['statusBayar'];

	if ($status == "Proses") {

		$kodeSiswa = $_POST['kode_siswa'];
		$thnAjaran = $_POST['thnAjaran'];
		
			if (ubahSpp($_POST) > 0) {
			echo "
			<script>
				alert('SPP berhasil Dibayar!');
				document.location.href = 'rekap-transaksi?ks=$kodeSiswa&ta=$thnAjaran';
			</script>
			";
		} else {
			header("Location:rekap-transaksi?ks=$kodeSiswa&ta=$thnAjaran");
		}	

	} else {

		$kodeSiswa = $_POST['kode_siswa'];
		$thnAjaran = $_POST['thnAjaran'];

			if (bayarSpp($_POST) > 0) {
			echo "
			<script>
				alert('SPP berhasil Dibayar!');
				document.location.href = 'rekap-transaksi?ks=$kodeSiswa&ta=$thnAjaran';
			</script>
			";
			
		} else {
			var_dump(mysqli_error($connect));
		}	

	}
	
	
}	


$kodeSiswa = $_GET['ks'];
$kodeThn = $_GET['ta'];
$idBulan = $_GET['b'];

$tahunAjaran = query("SELECT * FROM tahun_ajaran WHERE kode_tahun_ajaran = '$kodeThn'")[0];
$siswa = query("SELECT * FROM data_siswa WHERE kode_siswa = '$kodeSiswa'")[0];
$bulan = query("SELECT * FROM bulan WHERE id_bulan = '$idBulan'")[0];
$idBulan = $bulan['id_bulan'];

$transaksi = query("SELECT * FROM transaksi WHERE kode_siswa = '$kodeSiswa' AND kode_tahun_ajaran = '$kodeThn' AND id_bulan = '$idBulan' ")[0];





?>


<!DOCTYPE html>
<html lang="en">

	<?php 
		include('../../partials/head.php');
	?>

<body>
	<div class="wrapper">

	<?php 
		include('../../partials/navbar.php');
	?>
	
		<div class="main">

			<?php 
				include('../../partials/navbar-top.php');
			?>

			<main class="content">
				<div class="container-fluid p-0">
					<h1 class="h2 mb-3 animate__animated animate__fadeInUp animate__fast">Form Pembayaran :
            <span class="h3"><?= $siswa['nama_siswa']; ?> #</span>
            <span class="h5 text-muted"><?= $bulan['nama_bulan']; ?> /</span>
            <span class="h5 text-muted"><?= $tahunAjaran['tahun_ajaran']; ?> </span>
          </h1>
					<form action="" method="POST">

            <input type="hidden" name="kode_siswa" value="<?= $siswa['kode_siswa']; ?>">
            <input type="hidden" name="kodeThnAjaran" value="<?= $tahunAjaran['kode_tahun_ajaran']; ?>">
            <input type="hidden" name="thnAjaran" value="<?= $tahunAjaran['tahun_ajaran']; ?>">
            <input type="hidden" name="id_bulan" value="<?= $bulan['id_bulan']; ?>">
            <input type="hidden" name="nama_bulan" value="<?= $bulan['nama_bulan']; ?>">
            <input type="hidden" name="statusBayar" value="<?= $transaksi['status']; ?>">

						<div class="row animate__animated animate__fadeInUp animate__fast">
							<div class="col-12 d-flex ">
								<div class="card flex-fill">
									<table class="table table-hover my-0  table-responsive">
										<tr>
											<th>
												<label for="tglBayar" style="font-size:16px;">Tanggal Bayar</label>
											</th>
											<td>:</td>
											<td>
												<input type="date" name="tglBayar" id="tglBayar" class="form-control" style="width:400px; padding-left:30px;" onchange='cetakTanggal()' required >
											</td>
										</tr>
										<tr>
											<th>
												<label for="totalBiaya" style="font-size:16px;">Total Biaya SPP</label>
											</th>
											<td>:</td>
											<td>
												<input type="hidden" name="totalBiaya" value="<?= $tahunAjaran['biaya_semester']; ?>" readonly>
												<input type="text" name="" id="totalBiaya" class="form-control" style="width:400px;" value="<?= rupiah($tahunAjaran['biaya_semester']); ?>" readonly>

											</td>
										</tr>
										<tr>
											<th>
												<label for="totalBayar" style="font-size:16px;">Total Bayar</label>
											</th>
											<td>:</td>
											<td>
												<input type="number" min="1000" max="<?= $tahunAjaran['biaya_semester']; ?>" name="totalBayar" id="totalBayar" class="form-control" style="width:400px;" value="<?= $transaksi['total_bayar']; ?>" placeholder="cth : <?= $tahunAjaran['biaya_semester']; ?>" required > 
											</td>
										</tr>
									</table>
								</div>
							</div> 
							<div class="card-footer animate__animated animate__fadeInUp animate__slow">
								<h5 class="card-title mb-0 ms-3 text-start">
                  <a href="rekap-transaksi?ks=<?= $kodeSiswa; ?>&ta=<?= $tahunAjaran['tahun_ajaran']; ?>" class="btn btn-danger">
										<i class='align-middle' data-feather='arrow-left-circle'></i>
                    Kembali
                  </a>
										<button name="bayar" class="btn btn-success" type="submit">
										<i class='align-middle mb-1' data-feather='dollar-sign'></i>
                    Bayar
										</button>
								</h5> 
							</div>
						</div>
					</form>
				</div>
			</main>

			<?php 
				include('../../partials/footer.php');
			?>

		</div>
	</div>


		<?php 
			include('../../partials/script.php');
		?>
</body>

</html>