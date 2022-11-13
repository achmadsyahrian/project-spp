<?php 
session_start();
if (!isset($_SESSION['level'])) {
	header("Location:login.php");
} elseif ($_SESSION['level'] == "User") {
	header("Location:index.php");
	$disable= "none";
}



$titlePage ="Users";

require 'functions.php';

$id = ($_GET["id"]);
$user = query("SELECT * FROM user WHERE id = '$id'")[0];

if (isset($_POST['ubah'])) {

	if (isset($_POST["ubah"])) {
		if (ubahUser($_POST) > 0) {
			echo "
			<script>
				alert('Data Berhasil diubahkan!');
				document.location.href = 'user-account.php';
			</script>
			";
		} else {
			header("Location:user-account.php");
		}
	}	
}

if (isset($_POST['back'])) {
	header("Location:user-account.php");
}


?>

<style>
	.disable {
		display: <?= $disable; ?>;
	}
</style>

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

					<h1 class="h2 mb-3 animate__animated animate__fadeInUp animate__fast">Form Ubah Data Users</h1>
					<form action="" method="POST">
						<div class="row animate__animated animate__fadeInUp animate__fast">
							<div class="col-12 d-flex ">
								<div class="card flex-fill">
									<table class="table table-hover my-0  table-responsive">
										<tr>
											<th>
												<label for="id_user" style="font-size:16px;">ID User</label>
											</th>
											<td>:</td>
											<td>
												<div class="icon" style="position:absolute;">
													<i class='align-middle mt-2 ms-2' data-feather='lock'></i>
												</div>
												<input type="text" name="id_user" id="id_user" class="form-control" style="width:400px; padding-left:30px;" value="<?= $user["id_user"]; ?>" readonly>
											</td>
										</tr>
										<tr>
											<th>
												<label for="username" style="font-size:16px;">Username</label>
											</th>
											<td>:</td>
											<td>
												<input name="username" type="text" id="username" class="form-control" style="width:400px;" value="<?= $user["username"]; ?>">
											</td>
										</tr>
										<tr>
											<th>
												<label for="nama_user" style="font-size:16px;">Nama User</label>
											</th>
											<td>:</td>
											<td>
												<input name="nama_user" type="text" id="nama_user" class="form-control" style="width:400px;" value="<?= $user["nama_user"]; ?>"> 
											</td>
										</tr>
										<tr style="display:none;">
											<th>
												<label for="password" style="font-size:16px;">Password</label>
											</th>
											<td>:</td>
											<td>
												<input name="password" type="password" id="password" class="form-control" style="width:400px;" value="<?= $user["password"]; ?>" readonly> 
											</td>
										</tr>
										<tr>
											<th>
												<label for="level" style="font-size:16px;">Level</label>
											</th>
											<td>:</td>
											<td>
												<select name="level" class="form-select mb-0" style="width:400px;">
														<option <?php if ($user['level'] == "Admin") { echo 'selected'; }?>>Admin</option>
														<option <?php if ($user['level'] == "User") { echo 'selected'; }?>>User</option>
												</select>
											</td>
										</tr>
									</table>
								</div>
							</div>
							<div class="card-footer animate__animated animate__fadeInUp animate__slow">
								<h5 class="card-title mb-0 ms-3 text-start">
										<button name="back" class="btn btn-danger" type="submit" >
										<i class='align-middle' data-feather='arrow-left-circle'></i>
											Kembali
										</button>
										<button name="ubah" class="btn btn-primary" type="submit">
										<i class='align-middle' data-feather='save'></i>
											Simpan Data
										</button>
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