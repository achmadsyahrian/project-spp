<?php 
session_start();
if (!isset($_SESSION['level'])) {
	header("Location:login");
} elseif ($_SESSION['level'] == "User") {
	header("Location:index");
}

$titlePage ="Siswa";

require 'functions.php';
$tahun_ajaran = query("SELECT * FROM data_siswa");
$tahun_ajar = query("SELECT * FROM tahun_ajaran");

$id = $_GET["id"];

$siswa = query("SELECT * FROM data_siswa WHERE id = $id")[0];

if (isset($_POST['ubah'])) {

	if (isset($_POST["ubah"])) {
		if (ubahSiswa($_POST) > 0) {
			echo "
			<script>
				alert('Data Berhasil diubahkan!');
				document.location.href = 'data-siswa';
			</script>
			";
		} else {
			header("Location:data-siswa");
		}
	}	
}

if (isset($_POST['back'])) {
	header("Location:data-siswa");
}


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

					<h1 class="h2 mb-3 animate__animated animate__fadeInUp animate__fast">Form Ubah Data Siswa</h1>
					<form action="" method="POST">
						<div class="row animate__animated animate__fadeInUp animate__fast">
							<div class="col-12 d-flex ">
								<div class="card flex-fill">
									<table class="table table-hover my-0  table-responsive">
										<tr>
											<th>
												<label for="kode_siswa" style="font-size:16px;">Kode Siswa</label>
											</th>
											<td>:</td>
											<td>
												<div class="icon" style="position:absolute;">
													<i class='align-middle mt-2 ms-2' data-feather='lock'></i>
												</div>
												<input type="text" name="id_siswa" id="kode_siswa" class="form-control" style="width:400px; padding-left:30px;" value="<?= $siswa["kode_siswa"]; ?>" readonly>
											</td>
										</tr>
										<tr>
											<th>
												<label for="nama_siswa" style="font-size:16px;">Nama Siswa</label>
											</th>
											<td>:</td>
											<td>
												<input type="text" name="namaSiswa" id="nama_siswa" class="form-control" style="width:400px;" value="<?= $siswa["nama_siswa"]; ?>">
											</td>
										</tr>
										<tr>
											<th>
												<label for="alamat" style="font-size:16px;">Alamat</label>
											</th>
											<td>:</td>
											<td>
												<input type="text" name="alamat" id="alamat" class="form-control" style="width:400px;" value="<?= $siswa["alamat_siswa"]; ?>"> 
											</td>
										</tr>
										<tr>
											<th>
												<label for="tahunAjaran" style="font-size:16px;">Tahun Masuk Ajaran</label>
											</th>
											<td>:</td>
											<td>
												<select class="form-select mb-0" name="tahunAjaran" id="tahunAjaran" style="width:400px;">
														<option <?php if ($siswa['tahun_ajaran'] == "2019/2020") { echo 'selected'; }?>>2019/2020</option>
														<option <?php if ($siswa['tahun_ajaran'] == "2020/2021") { echo 'selected'; }?>>2020/2021</option>
														<option <?php if ($siswa['tahun_ajaran'] == "2021/2022") { echo 'selected'; }?>>2021/2022</option>
														<option <?php if ($siswa['tahun_ajaran'] == "2022/2023") { echo 'selected'; }?>>2022/2023</option>
												</select>
											</td>
										</tr>
									</table>
								</div>
							</div>
							<div class="card-footer animate__animated animate__fadeInUp animate__slow">
								<h5 class="card-title mb-0 ms-3 text-start">
									<a class="" href="">
										<button name="back" class="btn btn-danger" type="submit" >
										<i class='align-middle' data-feather='arrow-left-circle'></i>
											Kembali
										</button>
										<button name="ubah" class="btn btn-primary" type="submit">
										<i class='align-middle' data-feather='save'></i>
											Simpan Data
										</button>
									</a>
								</h5> 
							</div>
						</div>
					</form>
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