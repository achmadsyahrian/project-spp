<?php 
session_start();
if (!isset($_SESSION['level'])) {
	header("Location:login");
} elseif ($_SESSION['level'] == "User") {
	header("Location:index");
}

$titlePage ="Transaksi";

require 'functions.php';
$dataSiswa = query("SELECT * FROM data_siswa");
$tahunAjaran = query("SELECT * FROM tahun_ajaran");



?>


<!DOCTYPE html>
<html lang="en">

	<?php 
		include('partials/head.php');
	?>

<body>
	<div class="wrapper">

	<?php 
		include('partials/navbar.php');
	?>
	
		<div class="main">

			<?php 
				include('partials/navbar-top.php');
			?>

			<main class="content">
				<div class="container-fluid p-0">
					<h1 class="h2 mb-3 animate__animated animate__fadeInUp animate__fast">Form Transaksi Siswa</h1>
					<div class="row animate__animated animate__fadeInUp animate__fast">
						<div class="col-12 d-flex ">
							<div class="card flex-fill p-3" style="border-radius:10px;">
								<table class="table table-hover my-5  table-responsive table-striped" id="table">
									<thead class="text-center">
											<tr class="bg-primary text-light">
												<th>No.</th>
												<th class="`d-xl-table-cell">Kode Siswa</th>
												<th class="d-xl-table-cell">Nama Siswa</th>
												<th class="d-md-table-cell">Tahun Ajaran</th>
												<th class="d-md-table-cell text-center">Data Rekap</th>
											</tr>
									</thead>
									<tbody>
										<?php $i=1 ?>
										<?php foreach($dataSiswa as $siswa) : ?>
											<tr>
												<form action="rekap-transaksi" method="GET">
												<td><?= $i++; ?></td>
												<td class="d-xl-table-cell">
													<input type="hidden" name="ks" value="<?= $siswa["kode_siswa"]; ?>">
													<?= $siswa["kode_siswa"]; ?>
												</td>
												<td class="d-xl-table-cell"><?= $siswa["nama_siswa"]; ?></td>
												<td class="d-xl-table-cell">
													<select name="ta" id="tahunAjaran" class="form-select mb-0" >
														<?php foreach ($tahunAjaran as $row) : ?>
															<option>
																<?= $row["tahun_ajaran"]; ?>
															</option>
														<?php endforeach; ?>
													</select>
												</td>
												<td class="text-center">
													<button class="btn btn-info" type="submit">Rekaptulasi</button>
												</td>
											</form>
											</tr>
											<?php endforeach; ?>
									</tbody>
								</table>
							</div>
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