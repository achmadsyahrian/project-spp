<?php 

session_start();
if (!isset($_SESSION['level'])) {
	header("Location:login");
} elseif ($_SESSION['level'] == "User") {
	header("Location:index");
}

$titlePage ="Siswa";
$titleTable= "data_siswa";

require 'functions.php';
$dataSiswa = query("SELECT * FROM data_siswa");

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
			
			<main class="content ">
				<div class="container-fluid p-0">
					<h1 class="h2 mb-3 animate__animated animate__fadeInUp animate__fast">Form Data Siswa</h1>
					<div class="row animate__animated animate__fadeInUp animate__fast">
						<div class="col-12 d-flex ">
							<div class="card flex-fill p-3" style="border-radius:10px;">
								<table class="table table-hover my-5  table-responsive table-striped " id="table">
									<thead>
										<tr class="bg-primary text-light">
											<th>No.</th>
											<th class="d-xl-table-cell">Kode Siswa</th>
											<th class="d-xl-table-cell">Nama Siswa</th>
											<th class="d-xl-table-cell">Alamat</th>
											<th class="d-xl-table-cell">Tahun Masuk Ajaran</th>
											<th class="d-md-table-cell">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php $i=1; ?>
										<?php foreach ($dataSiswa as $row) : ?>
										
											<tr>
												<td><?= $i; ?></td>
												<td class="d-xl-table-cell"><?= $row["kode_siswa"]; ?></td>
												<td class="d-xl-table-cell"><?= $row["nama_siswa"]; ?></td>
												<td class="d-xl-table-cell"><?= $row["alamat_siswa"]; ?></td>
												<td class="d-md-table-cell"><?= $row["tahun_ajaran"]; ?></td>
												<td>
													<a href="ubah-siswa?id=<?= $row["id"]; ?>">
														<span class="badge bg-primary">
															<i class='align-middle' data-feather='edit'></i>
														</span>
													</a>
													<a href="hapus?id=<?= $row["id"]; ?>&titleTable=<?= $titleTable; ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?')">
														<span class="badge bg-danger">
															<i class='align-middle' data-feather='trash-2'></i>
														</span>
													</a>
												</td>
											</tr>
											<?php $i++; ?>
											<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
            <div class="card-footer animate__animated animate__fadeInUp animate__slow">
              <h5 class="card-title mb-0 ms-3 text-start">
                <a class="" href="tambah-siswa">
                  <button class="btn btn-primary" type="submit">
                  <i class='align-middle' data-feather='plus-circle'></i>
                    Tambahkan Data
                  </button>
                </a>
              </h5> 
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