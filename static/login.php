<?php 

require 'functions.php';

session_start();

if (isset($_SESSION['level'])) {
	header("location:index");
}	


if (isset($_POST['login'])) {
	
	$username = htmlspecialchars($_POST['username']);
	$password = md5($_POST['password']);


	$cekUser = mysqli_query($connect, "SELECT * FROM user WHERE username='$username' AND password='$password'");

	if (mysqli_num_rows($cekUser) > 0) {

		$data = mysqli_fetch_assoc($cekUser);

		if ($data['level'] == "Admin") {
			$_SESSION['username'] = $username;
			$_SESSION['level'] = "Admin";
			header("location:index");
		}

		elseif ($data['level'] == "User") {
			$_SESSION['username'] = $username;
			$_SESSION['level'] = "User";
			header("location:index");
		} else {
			echo "<script>
						alert('Username atau Password Salah');
						</script>";
	}
} else {
			echo "<script>
						alert('Username atau Password Salah');
						</script>";
	}

}

?>




<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-in.html" />

	<title>Sekolah Kita | Login</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body style="background-color:#222E3C;">
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<p class="lead text-light" style="font-weight:bold;">
								Sign in to your account to continue
							</p>
						</div>

						<div class="card ">
							<div class="card-body">
								<div class="m-sm-4">
									<div class="text-center">
										<img src="img/avatars/avatar.png" alt="Charles Hall" class="img-fluid rounded-circle" width="132" height="132" />
									</div>
									<form action="" method="POST">
										<div class="mb-3">
											<label class="form-label">Username</label>
											<input class="form-control form-control-lg" type="username" required oninvalid="this.setCustomValidity('Username harus diisi..')" oninput="setCustomValidity('')" name="username" placeholder="Enter your username" />
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" required oninvalid="this.setCustomValidity('Password harus diisi..')" oninput="setCustomValidity('')" type="password" name="password" placeholder="Enter your password" />
										</div>
										<!-- <div>
											<label class="form-check">
											<input class="form-check-input" type="checkbox" value="remember-me" name="remember-me" checked>
											<span class="form-check-label">
												Remember me
											</span>
											</label>
										</div> -->
										<div class="text-center mt-3">
											<button type="submit" name="login" class="btn btn-lg btn-primary">Login</button>
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="js/app.js"></script>

</body>

</html>