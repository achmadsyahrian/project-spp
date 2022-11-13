<?php 
session_start();

if (!isset($_SESSION['level'])) {
	header("Location: login");
} elseif ($_SESSION['level'] == "User") {
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
				<a class='sidebar-brand' href='index'>
          <span class='align-middle'>Pembayaran SPP</span>
        </a>

				<ul class='sidebar-nav'>
					<li class='sidebar-header'>
						Pages
					</li>

					<li <?php if($titlePage == "Dashboard") echo "class='sidebar-item active animate__animated animate__fadeIn'"; ?>>
						<a class='sidebar-link' href='index'>
              <i class='align-middle' data-feather='home'></i> <span class='align-middle'>Dashboard</span>
            </a>
					</li>

					<li class='sidebar-header disable'>
						Data
					</li>

					<li <?php if($titlePage == "Users") echo "class='sidebar-item active animate__animated animate__fadeIn'"; ?> class="disable">
						<a class='sidebar-link' href='user-account'>
              <i class='align-middle' data-feather='user'></i> <span class='align-middle'>User Account</span>
            </a>
					</li>

					<li <?php if($titlePage == "Siswa") echo "class='sidebar-item active animate__animated animate__fadeIn'"; ?> class="disable">
						<a class='sidebar-link' href='data-siswa'>
              <i class='align-middle' data-feather='users'></i> <span class='align-middle'>Data Siswa</span>
            </a>
					</li>

					<li <?php if($titlePage == "Tahun Ajaran") echo "class='sidebar-item active animate__animated animate__fadeIn'"; ?> class="disable"> 
						<a class='sidebar-link' href='tahun-ajaran'>
              <i class='align-middle' data-feather='calendar'></i> <span class='align-middle'>Tahun Ajaran</span>
            </a>
					</li>

					<li class='sidebar-header disable'>
						Transaksi
					</li>

					<li <?php if($titlePage == "Transaksi") echo "class='sidebar-item active animate__animated animate__fadeIn'"; ?> class="disable">
						<a class='sidebar-link' href='transaksi'>
              <i class='align-middle' data-feather='shopping-cart'></i> <span class='align-middle'>Transaksi</span>
            </a>
					</li>

					<li class='sidebar-header'>
						Laporan
					</li>

					<li <?php if($titlePage == "Laporan") echo "class='sidebar-item active animate__animated animate__fadeIn'"; ?>>
						<a class='sidebar-link' href='laporan'>
              <i class='align-middle' data-feather='book-open'></i> <span class='align-middle'>Laporan</span>
            </a>
					</li>
				</ul>

				<!-- <div class='sidebar-cta'>
					<div class='sidebar-cta-content'>
						<strong class='d-inline-block mb-2'>Upgrade to Pro</strong>
						<div class='mb-3 text-sm'>
							Are you looking for more components? Check out our premium version.
						</div>
						<div class='d-grid'>
							<a href='upgrade-to-pro.php' class='btn btn-primary'>Upgrade to Pro</a>
						</div>
					</div>
				</div> -->
			</div>
		</nav>