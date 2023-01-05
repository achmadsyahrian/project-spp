<?php 
session_start();

if (!isset($_SESSION['level'])) {
	header("Location:../autentikasi/login");
} 


$titlePage ="Laporan";

require '../functions.php';


$user = queryUser("SELECT * FROM user ORDER BY id DESC LIMIT 1");


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

					<h1 class="h2 mb-3 animate__animated animate__fadeInUp animate__fast">Rekap Data Transaksi</h1>
					<form action="cetak" method="POST">
						<div class="row animate__animated animate__fadeInUp animate__fast">
							<div class="col-12 d-flex ">
								<div class="card flex-fill">
									<table class="table table-hover my-0  table-responsive">
										<tr>
											<th>
												<label for="id_user" style="font-size:16px;">Dari</label>
											</th>
											<td>:</td>
											<td>
												<input type="date" name="tglAwal" id="tglBayar" class="form-control" style="width:400px; padding-left:30px;" onchange='cetakTanggal()' required >
											</td>
										</tr>
										<tr>
											<th>
												<label for="username" style="font-size:16px;">Sampai</label>
											</th>
											<td>:</td>
											<td>
                        <input type="date" name="tglAkhir" id="tglAkhir" class="form-control" style="width:400px; padding-left:30px;" onchange='cetakTanggalAkhir()' required >
											</td>
										</tr>
									</table>
								</div>
							</div>
							<div class="card-footer animate__animated animate__fadeInUp animate__slow">
								<h5 class="card-title mb-0 ms-3 text-start">
										<button class="btn btn-primary" name="cetak" type="">
											<i class='align-middle mb-1' data-feather='printer'></i>
											Cetak
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