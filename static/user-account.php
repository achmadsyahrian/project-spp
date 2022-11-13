<?php 
session_start();
if (!isset($_SESSION['level'])) {
	header("Location:login");
} elseif ($_SESSION['level'] == "User") {
	header("Location:index");
}

$titlePage ="Users";
$titleTable = "user";
$url = "user-account";


require 'functions.php';
$result = query("SELECT * FROM $titleTable");


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
				<div class="container-fluid p-0 ">

					<h1 class="h2 mb-3 animate__animated animate__fadeInUp animate__fast">Form Data Users</h1>
					<?= $nilai; ?>
					<div class="row animate__animated animate__fadeInUp slower">
						<div class="col-12 d-flex">
							<div class="card flex-fill p-3" style="border-radius:10px;">
								<table class="table table-hover my-5  table-responsive data table-striped" id="table">
									<thead>
										<tr class="bg-primary text-light">
											<th>No.</th>
											<th class="d-xl-table-cell">ID Users</th>
											<th class="d-xl-table-cell">Username</th>
											<th class="d-xl-table-cell">Nama User</th>
											<th class="d-xl-table-cell">Level</th>
											<th class="d-md-table-cell">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php $i=1; ?>
										<?php foreach ($result as $row) : ?>
												<td><?= $i; ?></td>
												<td class="d-xl-table-cell"><?= $row["id_user"]; ?></td>
												<td class="d-xl-table-cell"><?= $row["username"]; ?></td>
												<td class="d-md-table-cell"><?= $row["nama_user"]; ?></td>
												<td class="d-xl-table-cell">
													<span class="badge 
													
													<?php if($row['level'] === "User") { echo "class= bg-warning";} 
														else{
															echo "class= bg-success";
														}?>
													
													">
														<?= $row["level"]; ?>
													</span>
												</td>
												<td>
													<a href="ubah-user?id=<?= $row["id"]; ?>">
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
								<a class="" href="tambah-user">
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