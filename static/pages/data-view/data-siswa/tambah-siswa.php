<?php 
session_start();
if (!isset($_SESSION['level'])) {
	header("Location:../../autentikasi/login");
} elseif ($_SESSION['level'] == "User") {
	header("Location:../../index");
}

$titlePage ="Siswa";

require '../../functions.php';

if (isset($_POST["tambah"])) {
  if (tambahSiswa($_POST) > 0) {
    echo "
    <script>
      alert('Data Berhasil ditambah!');
      document.location.href = 'data-siswa';
    </script>
    ";
  } else {
		header("Location:data-siswa");
  }
}	


$data_siswa = queryUser("SELECT * FROM data_siswa ORDER BY id DESC LIMIT 1");
$tahun_ajaran = query("SELECT * FROM tahun_ajaran");


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

					<h1 class="h2 mb-3 animate__animated animate__fadeInUp animate__fast">Form Tambah Data Siswa</h1>
					<form action="" method="POST">
						<div class="row animate__animated animate__fadeInUp animate__fast">
							<div class="col-12 d-flex ">
								<div class="card flex-fill">
									<table class="table table-hover my-0  table-responsive">
										<tr>
											<th>
												<label for="id_siswa" style="font-size:16px;">Kode Siswa</label>
											</th>
											<td>:</td>
											<td>
												<div class="icon" style="position:absolute;">
													<i class='align-middle mt-2 ms-2' data-feather='lock'></i>
												</div>
												<input type="text" name="id_siswa" id="id_siswa" class="form-control" style="width:400px; padding-left:30px;" value="S0<?= $data_siswa[0]['id']+1; ?>"  readonly>
											</td>
										</tr>
										<tr>
											<th>
												<label for="namaSiswa" style="font-size:16px;">Nama Siswa</label>
											</th>
											<td>:</td>
											<td>
												<input type="text" name="namaSiswa" id="namaSiswa" class="form-control" style="width:400px;" required oninvalid="this.setCustomValidity('Nama harus diisi..')" oninput="setCustomValidity('')">
											</td>
										</tr>
										<tr>
											<th>
												<label for="alamat" style="font-size:16px;">Alamat</label>
											</th>
											<td>:</td>
											<td>
												<input type="text" name="alamat" id="alamat" class="form-control" style="width:400px;" required oninvalid="this.setCustomValidity('Alamat harus diisi..')" oninput="setCustomValidity('')"> 
											</td>
										</tr>
										<tr>
											<th>
												<label for="tahunAjaran" style="font-size:16px;">Tahun Masuk Ajaran</label>
											</th>
											<td>:</td>
											<td>
												<select name="tahunAjaran" id="tahunAjaran" class="form-select mb-0" style="width:400px;" >
													<?php foreach ($tahun_ajaran as $row) : ?>
														<option><?= $row["tahun_ajaran"]; ?></option>
													<?php endforeach; ?>
												</select>
											</td>
										</tr>
									</table>
								</div>
							</div>
							<div class="card-footer animate__animated animate__fadeInUp animate__slow">
								<h5 class="card-title mb-0 ms-3 text-start">
									<a class="btn btn-danger" href="data-siswa">
										<i class='align-middle mb-1'  data-feather='arrow-left-circle'></i>
											Kembali
									</a>
										<button name="tambah" class="btn btn-primary" type="submit">
										<i class='align-middle mb-1' data-feather='save'></i>
											Tambah Data
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