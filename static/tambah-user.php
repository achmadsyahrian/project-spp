<?php 
session_start();

if (!isset($_SESSION['level'])) {
	header("Location:login");
} elseif ($_SESSION['level'] == "User") {
	header("Location:index");
}


$titlePage ="Users";

require 'functions.php';

if (isset($_POST["tambah"])) {
  if (tambahUser($_POST) > 0) {
    echo "
    <script>
      alert('Data Berhasil ditambah!');
      document.location.href = 'user-account';
    </script>
    ";

  } 
}	


$user = queryUser("SELECT * FROM user ORDER BY id DESC LIMIT 1");


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

					<h1 class="h2 mb-3 animate__animated animate__fadeInUp animate__fast">Form Tambah Data User</h1>
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
												<input type="text" name="id_user" id="id_user" class="form-control" style="width:400px; padding-left:30px;" value="US0<?= $user[0]['id']+1; ?>"  readonly>
											</td>
										</tr>
										<tr>
											<th>
												<label for="username" style="font-size:16px;">Username</label>
											</th>
											<td>:</td>
											<td>
												<input type="text" name="username" id="username" class="form-control" style="width:400px;" required oninvalid="this.setCustomValidity('Username harus diisi..')" oninput="setCustomValidity('')">
											</td>
										</tr>
										<tr>
											<th>
												<label for="nama_user" style="font-size:16px;">Nama User</label>
											</th>
											<td>:</td>
											<td>
												<input type="text" name="nama_user" id="nama_user" class="form-control" style="width:400px;" required oninvalid="this.setCustomValidity('Nama User harus diisi..')" oninput="setCustomValidity('')"> 
											</td>
										</tr>
										<tr>
											<th>
												<label for="password" style="font-size:16px;">Password</label>
											</th>
											<td>:</td>
											<td>
												<input type="password" name="password" id="password" class="form-control" style="width:400px;" required oninvalid="this.setCustomValidity('Password harus diisi..')" oninput="setCustomValidity('')"> 
											</td>
										</tr>
										<tr>
											<th>
												<label for="level" style="font-size:16px;">Level</label>
											</th>
											<td>:</td>
											<td>
												<select name="level" class="form-select mb-0" style="width:400px;">
														<option>Admin</option>
														<option>User</option>
												</select>
											</td>
										</tr>
									</table>
								</div>
							</div>
							<div class="card-footer animate__animated animate__fadeInUp animate__slow">
								<h5 class="card-title mb-0 ms-3 text-start">
										<button  onclick="kembali()" class="btn btn-danger" type="submit" >
											<i class='align-middle' data-feather='arrow-left-circle'></i>
											Kembali
										</button>
                    <script>
                    function kembali() {
                        window.history.back();
                    }
                    </script>
										<button name="tambah" class="btn btn-primary" type="submit">
											<i class='align-middle' data-feather='save'></i>
											Tambah Data
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