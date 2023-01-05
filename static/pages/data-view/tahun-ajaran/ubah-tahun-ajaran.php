<?php 
session_start();
if (!isset($_SESSION['level'])) {
	header("Location:../../autentikasi/login");
} elseif ($_SESSION['level'] == "User") {
	header("Location:../../index");
}

$titlePage ="Tahun Ajaran";

require '../../functions.php';

$tahun_ajar = query("SELECT * FROM tahun_ajaran");

$id = $_GET["id"];

$tahunAjar = query("SELECT * FROM tahun_ajaran WHERE id = $id")[0];

if (isset($_POST['ubah'])) {

	if (isset($_POST["ubah"])) {
		if (ubahTahunAjar($_POST) > 0) {
			echo "
			<script>
				alert('Data Berhasil diubahkan!');
				document.location.href = 'tahun-ajaran';
			</script>
			";
		} else {
			header("Location:tahun-ajaran");
		}
	}	
}


?>


<!DOCTYPE html>
<html lang="en">

	<?php 
		include('../../../partials/head.php');
	?>

<body>
	<div class="wrapper">

	<?php 
		include('../../../partials/navbar.php');
	?>
	
		<div class="main">

			<?php 
				include('../../../partials/navbar-top.php');
			?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h2 mb-3 animate__animated animate__fadeInUp animate__fast">Form Ubah Data Tahun Ajaran</h1>
					<form action="" method="POST">
						<div class="row animate__animated animate__fadeInUp animate__fast">
							<div class="col-12 d-flex ">
								<div class="card flex-fill">
									<table class="table table-hover my-0  table-responsive">
										<tr>
											<th>
												<label for="kodeTahunAjar" style="font-size:16px;">Kode Tahun Ajaran</label>
											</th>
											<td>:</td>
											<td>
												<div class="icon" style="position:absolute;">
													<i class='align-middle mt-2 ms-2' data-feather='lock'></i>
												</div>
												<input type="text" name="kodeTahunAjar" id="kodeTahunAjar" class="form-control" style="width:400px; padding-left:30px;" value="<?= $tahunAjar["kode_tahun_ajaran"]; ?>" readonly>
											</td>
										</tr>
										<tr>
											<th>
												<label for="tahunAjaran" style="font-size:16px;">Tahun Ajaran</label>
											</th>
											<td>:</td>
											<td>
												<input type="text" name="tahunAjaran" id="tahunAjaran" class="form-control" style="width:400px;" value="<?= $tahunAjar["tahun_ajaran"]; ?>" required oninvalid="this.setCustomValidity('Tahun Ajaran harus diisi..')" oninput="setCustomValidity('')" placeholder="cth : 2020/2021">
											</td>
										</tr>
										<tr>
											<th>
												<label for="keterangan" style="font-size:16px;">Keterangan</label>
											</th>
											<td>:</td>
											<td>
												<input type="text" name="keterangan" id="keterangan" class="form-control" style="width:400px;" value="<?= $tahunAjar["keterangan"]; ?>" required oninvalid="this.setCustomValidity('Keterangan harus diisi..')" oninput="setCustomValidity('')"> 
											</td>
										</tr>
										<tr>
											<th>
												<label for="biayaSemester" style="font-size:16px;">Biaya Semester</label>
											</th>
											<td>:</td>
											<td>
												<input type="text" name="biayaSemester" id="biayaSemester" class="form-control" style="width:400px;" value="<?= $tahunAjar["biaya_semester"]; ?>" required oninvalid="this.setCustomValidity('Biaya Semester harus diisi..')" oninput="setCustomValidity('')"> 
											</td>
										</tr>
									</table>
								</div>
							</div>
							<div class="card-footer animate__animated animate__fadeInUp animate__slow">
								<h5 class="card-title mb-0 ms-3 text-start">
										<a href="tahun-ajaran" class="btn btn-danger">
										<i class='align-middle mb-1' data-feather='arrow-left-circle'></i>
                    Kembali
                  </a>
										<button name="ubah" class="btn btn-primary" type="submit">
										<i class='align-middle mb-1' data-feather='save'></i>
											Simpan Data
										</button>
								</h5> 
							</div>
						</div>
					</form>
				</div>
			</main>

			<?php 
				include('../../../partials/footer.php');
			?>

		</div>
	</div>


	<?php 
		include('../../../partials/script.php');
	?>

</body>

</html>