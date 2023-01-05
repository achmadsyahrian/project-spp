<?php 
session_start();
if (!isset($_SESSION['level'])) {
	header("Location:../autentikasi/login");
} elseif ($_SESSION['level'] == "User") {
	header("Location:../index");
}

require '../functions.php';

$titlePage ="Transaksi";
$kodeSiswa = $_GET['ks'];
$tahunAjar = $_GET['ta'];

$siswa = query("SELECT * FROM data_siswa WHERE kode_siswa = '$kodeSiswa'")[0];
$tahunAjaran = query("SELECT * FROM tahun_ajaran WHERE tahun_ajaran = '$tahunAjar'")[0];
$kodeThnAjar = $tahunAjaran['kode_tahun_ajaran'];
$bulan = query("SELECT * FROM bulan");


$status = query("SELECT * FROM transaksi WHERE kode_siswa = '$kodeSiswa' AND kode_tahun_ajaran = '$kodeThnAjar'");





?>


<!DOCTYPE html>
<html lang="en">

	<?php 
		include('../../partials/head.php');
	?>
  
  <style>
    .spp-card:hover {
      box-shadow: 0 5px 9px #b6bfc6;
      transition: .5s; 
      cursor:pointer;
    }
  </style>

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
					<h1 class="h2 mb-3 animate__animated animate__fadeInUp animate__fast">Kartu SPP : 
            <span class="h3"><?= $siswa['nama_siswa']; ?> #</span>
            <span class="h4 text-muted"><?= $tahunAjaran['tahun_ajaran']; ?> </span>
          </h1>
					<div class="container">
            <div class="row">
              <?php foreach($bulan as $row) : ?>
                <?php 
                  $bln = $row['nama_bulan']; 
                  $statusBayar = query(" SELECT * FROM transaksi WHERE bulan_bayar = '$bln' AND kode_tahun_ajaran = '$kodeThnAjar' AND kode_siswa = '$kodeSiswa'  ")[0];
                  
                ?>
                <div class="col-sm-4">
                  <div class="card animate__animated animate__fadeInUp animate__fast">
                    <?php if($statusBayar['status'] == "Lunas") { ?>
                      <div class="card-body spp-card">
                    <?php } else { ?>
                      <div onclick="window.location.href='add-transaksi?ks=<?= $siswa['kode_siswa']; ?>&ta=<?= $tahunAjaran['kode_tahun_ajaran']; ?>&b=<?= $row['id_bulan']; ?>' "  class="card-body spp-card">
                    <?php } ?>
                      <div class="row">
                        <div class="col mt-0">
                          <?php if($statusBayar['status'] == "Lunas") { ?>
                            <h1 class="card-title text-success" style="font-size:18px;"><?= $row['nama_bulan']; ?></h1>
                          <?php } elseif($statusBayar['status'] == "Proses") { ?>
                            <h1 class="card-title text-warning" style="font-size:18px;"><?= $row['nama_bulan']; ?></h1>
                          <?php } else{ ?>
                            <h1 class="card-title text-danger" style="font-size:18px;"><?= $row['nama_bulan']; ?></h1>
                          <?php } ?>
                        </div>
                        <div class="col-auto">
                          <div class="stat-danger">
                            <?php if($statusBayar['status'] == "Lunas") { ?>
                              <i class="align-middle text-success"  data-feather="check-circle"></i>
                            <?php } elseif($statusBayar['status'] == "Proses") { ?>
                              <i class="align-middle text-warning"  data-feather="dollar-sign"></i>
                            <?php } else { ?>
                              <i class="align-middle text-danger"  data-feather="dollar-sign"></i>
                            <?php } ?>
                          </div>
                        </div>
                      </div>
                      <h2 class="mt-1 mb-3">
                        <?= rupiah($tahunAjaran['biaya_semester']); ?>
                        <?php if($statusBayar['status'] == "Lunas") { ?>
                          <span class="text-success h4">
                            <i class='align-middle mb-1' data-feather='user-check'></i>
                          </span>
                        <?php } elseif($statusBayar['status'] == "Proses") { ?>
                          <span class="text-warning h4">
                            <i class='align-middle mb-1' data-feather='user-minus'></i>
                          </span>
                        <?php } else{ ?>
                          <span class="text-danger h4">
                            <i class='align-middle mb-1' data-feather='user-x'></i>
                          </span>
                        <?php } ?>
                      </h2>
                      <?php 
                            // $tess = query("SELECT * FROM transaksi WHERE bulan_bayar = '$row["nama_bulan"]' ");
                        
                      ?>
                      <div class="mb-0 disable">
                        <span class="text-muted">Status :</span>
                          <?php if($statusBayar['status'] == "Lunas") { ?>
                            <span class="badge bg-success py-1 px-2">Lunas</span>
                          <?php } elseif($statusBayar['status'] == "Proses") { ?>
                            <span class="badge bg-warning py-1 px-2">Proses</span>
                          <?php } else { ?>
                            <span class="badge bg-danger py-1 px-2">Belum Dibayar</span>
                          <?php } ?>
                          
                      </div>
                      <!-- <div class="col-sm-4 my-3">
                        <button class="btn btn-primary px-5">Bayar</button>
                      </div> -->
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
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