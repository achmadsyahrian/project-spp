<?php 
session_start();

if (!isset($_SESSION['level'])) {
	header("Location:../../autentikasi/login");
} elseif ($_SESSION['level'] == "User") {
	header("Location:../../index");
}


$titlePage ="Tahun Ajaran";

require '../../functions.php';

if (isset($_POST["tambah"])) {
  if (tambahTahunAjar($_POST) > 0) {
    echo "
    <script>
      alert('Data Berhasil ditambah!');
      document.location.href = 'tahun-ajaran';
    </script>
    ";

		
  }

}	


$tahunAjaran = query("SELECT * FROM tahun_ajaran ORDER BY id DESC LIMIT 1");


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

					<h1 class="h2 mb-3 animate__animated animate__fadeInUp animate__fast">Form Tambah Data Tahun Ajaran</h1>
					<form action="" method="POST">
						<div class="row animate__animated animate__fadeInUp animate__fast">
							<div class="col-12 d-flex ">
								<div class="card flex-fill">
									<table class="table table-hover my-0  table-responsive">
										<tr>
											<th>
												<label for="kode_tahun" style="font-size:16px;">Kode Tahun Ajaran</label>
											</th>
											<td>:</td>
											<td>
												<div class="icon" style="position:absolute;">
													<i class='align-middle mt-2 ms-2' data-feather='lock'></i>
												</div>
												<input type="text" name="kode_tahun" id="kode_tahun" class="form-control" style="width:400px; padding-left:30px;" value="TA00<?= $tahunAjaran[0]['id']+1; ?>"  readonly>
											</td>
										</tr>
										<tr>
											<th>
												<label for="tahun_ajar" style="font-size:16px;">Tahun Ajaran</label>
											</th>
											<td>:</td>
											<td>
												<input type="text" name="tahun_ajar" id="tahun_ajar" class="form-control" style="width:400px;" required oninvalid="this.setCustomValidity('Tahun Ajaran harus diisi..')" oninput="setCustomValidity('')" placeholder="cth : 2020/2021">
											</td>
										</tr>
										<tr>
											<th>
												<label for="keterangan" style="font-size:16px;">Keterangan</label>
											</th>
											<td>:</td>
											<td>
												<input type="text" name="keterangan" id="keterangan" class="form-control" style="width:400px;" required oninvalid="this.setCustomValidity('Keterangan harus diisi..')" oninput="setCustomValidity('')"> 
											</td>
										</tr>
										<tr>
											<th>
												<label for="biaya" style="font-size:16px;">Biaya Semester</label>
											</th>
											<td>:</td>
											<td>
												<input type="number" name="biaya" id="biaya" class="form-control" style="width:400px;" required oninvalid="this.setCustomValidity('Biaya Semester harus diisi..')" oninput="setCustomValidity('')"> 
											</td>
										</tr>
									</table>
								</div>
							</div>
							<div class="card-footer animate__animated animate__fadeInUp animate__slow">
								<h5 class="card-title mb-0 ms-3 text-start">
									<!-- <a href="tahun-ajaran"> -->
									<a class="btn btn-danger" href="tahun-ajaran" >
											<i class='align-middle mb-1' data-feather='arrow-left-circle'></i>
											Kembali
										</a>
									<!-- </a> -->
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