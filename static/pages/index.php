<?php 

session_start();
if (!isset($_SESSION['level'])) {
	header("Location:autentikasi/login");
}

include('../partials/session.php');

require 'functions.php';

$titlePage = "Dashboard";

?>


<!DOCTYPE html>
<html lang="en">

	<?php 
		include('../partials/head.php');
	?>

<body>
	<div class="wrapper">

	<?php 
		include('../partials/navbar.php');
	?>
	
		<div class="main">

			<?php 
				include('../partials/navbar-top.php');
			?>

			<main class="content">
				<div class="container-fluid p-0">
					<h1 class="h2 mb-3 animate__animated animate__fadeInUp animate__faster"><strong>Selamat Datang</strong> <?= $account; ?></h1>
					<div class="row">
						<div class="col-xl-4 col-xxl-4">
							<div class="card flex-fill animate__animated animate__fadeInUp animate__fast">
								<div class="card-header">
									<h5 class="card-title mb-0">Kalender</h5>
								</div>
								<div class="card-body d-flex">
									<div class="align-self-center w-100">
										<div class="chart">
											<div id="datetimepicker-dashboard"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-8 col-xxl-8 d-flex">
							<div class="w-100">
								<div class="row">
									<div class="col-sm-8">
										<div class="card animate__animated animate__fadeInUp animate__fast">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Jumlah Users</h5>
													</div>
													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="users"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><?= tampilUser(); ?></h1>
												<div class="mb-0 disable">
													<a class="more-dashboard" href="data-view/user-account/user-account"><span class=" text-more-dashboard text-primary">More Info</span>
														<i class="align-middle" data-feather="arrow-right-circle"></i>
													</a>
												</div>
											</div>
										</div>
									</div>	
									<div class="col-sm-8">
										<div class="card animate__animated animate__fadeInUp animate__fast">
												<div class="card-body">
													<div class="row">
														<div class="col mt-0">
															<h5 class="card-title">Jumlah Siswa</h5>
														</div>
														<div class="col-auto">
															<div class="stat text-primary">
																<i class="align-middle" data-feather="users"></i>
															</div>
														</div>
													</div>
													<h1 class="mt-1 mb-3"><?= tampilSiswa(); ?></h1>
													<div class="mb-0 disable">
														<a class="more-dashboard" href="data-view/data-siswa/data-siswa"><span class=" text-more-dashboard text-primary">More Info</span>
															<i class="align-middle" data-feather="arrow-right-circle"></i>
														</a>
													</div>
												</div>
											</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</main>
			

			<?php 
				include('../partials/footer.php');
			?>

		</div>
	</div>


	<?php 
			include('../partials/script.php');
		?>


</body>

</html>