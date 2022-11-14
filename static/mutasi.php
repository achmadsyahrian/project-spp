<?php 
session_start();
if (!isset($_SESSION['level'])) {
	header("Location:login");
} elseif ($_SESSION['level'] == "User") {
	header("Location:index");
}

$titlePage ="Mutasi";

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
					<h1 class="h2 mb-3 animate__animated animate__fadeInUp animate__fast">Form Mutasi Siswa</h1>
					<div class="row animate__animated animate__fadeInUp animate__fast">
						<div class="col-12 d-flex ">
							<div class="card flex-fill p-3" style="border-radius:10px;">
								<table class="table table-hover my-5  table-responsive table-striped" id="table">
									<thead>
										<tr class="bg-primary text-light">
											<th>No.</th>
											<th class="`d-xl-table-cell">Kode Siswa</th>
											<th class="d-xl-table-cell">Nama Siswa</th>
											<th class="d-xl-table-cell">Alamat</th>
											<th class="d-md-table-cell">Tahun Ajaran</th>
										</tr>
									</thead>
									<tbody>
                    <?php $i=1 ?>
                    <?php foreach($dataSiswa as $siswa) : ?>
										<tr>
											<td><?= $i++; ?></td>
											<td class="d-xl-table-cell"><?= $siswa["kode_siswa"]; ?></td>
											<td class="d-xl-table-cell"><?= $siswa["nama_siswa"]; ?></td>
											<td class="d-xl-table-cell"><?= $siswa["alamat_siswa"]; ?></td>
											<td class="d-md-table-cell">
                        <?php foreach($tahunAjaran as $tahunAjar) : ?>
                        <label class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" value="option1">
                          <span class="form-check-label" style="font-size:12px;">
                            <?= $tahunAjar["tahun_ajaran"]; ?>
                          </span>
                        </label>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                      </td>
										</tr>
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