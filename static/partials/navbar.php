<?php 
// session_start();
if ($_SESSION['level'] == "User") {
	$disable = "none";
} 




?>

<style>
	.disable {
		display: <?= $disable; ?>;
	}
</style>


<nav id='sidebar' class='sidebar js-sidebar'>
			<div class='sidebar-content js-simplebar'>
				<a class='sidebar-brand' href='<?=$root?>pages/'>
          <span class='align-middle'>Pembayaran SPP</span>
        </a>

				<ul class='sidebar-nav'>
					<li class='sidebar-header'>
						Pages
					</li>

					<li <?php if($titlePage == "Dashboard") echo "class='sidebar-item active animate__animated animate__fadeIn'"; ?>>
						<a class='sidebar-link' href='<?=$root?>pages/'>
              <i class='align-middle' data-feather='home'></i> <span class='align-middle'>Dashboard</span>
            </a>
					</li>

					<li class='sidebar-header disable'>
						Data
					</li>

					<li <?php if($titlePage == "Users") echo "class='sidebar-item active animate__animated animate__fadeIn'"; ?> class="disable">
						<a class='sidebar-link' href='<?= $root?>pages/data-view/user-account/user-account'>
              <i class='align-middle' data-feather='user'></i> <span class='align-middle'>User Account</span>
            </a>
					</li>

					<li <?php if($titlePage == "Siswa") echo "class='sidebar-item active animate__animated animate__fadeIn'"; ?> class="disable">
						<a class='sidebar-link' href='<?=$root?>pages/data-view/data-siswa/data-siswa'>
              <i class='align-middle' data-feather='users'></i> <span class='align-middle'>Data Siswa</span>
            </a>
					</li>

					<li <?php if($titlePage == "Tahun Ajaran") echo "class='sidebar-item active animate__animated animate__fadeIn'"; ?> class="disable"> 
						<a class='sidebar-link' href='<?=$root?>pages/data-view/tahun-ajaran/tahun-ajaran'>
              <i class='align-middle' data-feather='calendar'></i> <span class='align-middle'>Tahun Ajaran</span>
            </a>
					</li>

					<li class='sidebar-header disable'>
						Transaksi
					</li>

					<li <?php if($titlePage == "Transaksi") echo "class='sidebar-item active animate__animated animate__fadeIn'"; ?> class="disable">
						<a class='sidebar-link' href='<?=$root?>pages/transaksi-view/transaksi'>
              <i class='align-middle' data-feather='shopping-cart'></i> <span class='align-middle'>Transaksi</span>
            </a>
					</li>

					<li class='sidebar-header'>
						Laporan
					</li>

					<li <?php if($titlePage == "Laporan") echo "class='sidebar-item active animate__animated animate__fadeIn'"; ?>>
						<a class='sidebar-link' href='<?=$root?>pages/laporan-view/laporan'>
              <i class='align-middle' data-feather='book-open'></i> <span class='align-middle'>Laporan</span>
            </a>
					</li>
				</ul>
			</div>
		</nav>