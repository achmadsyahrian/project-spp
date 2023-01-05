<?php 

// session_start();

$result = query("SELECT * FROM user");

$account = $_SESSION['level'];


?>


<nav class='navbar navbar-expand navbar-light '>
	<a class='sidebar-toggle js-sidebar-toggle'>
		<i class='hamburger align-self-center'></i>
	</a>

	<div class='navbar-collapse collapse'>
		<ul class='navbar-nav navbar-align'>
			<li class='nav-item dropdown'>
			</li>
			<li class='nav-item dropdown'>
				<a class='nav-icon dropdown-toggle d-inline-block d-sm-none' href='#' data-bs-toggle='dropdown'>
					<i class='align-middle' data-feather='settings'></i>
				</a>

				<a class='nav-link dropdown-toggle d-none d-sm-inline-block' href='#' data-bs-toggle='dropdown'>
					<img src='<?=$root?>img/avatars/avatar.png' class='avatar img-fluid rounded me-2' alt='Admin' /> <span class='text-dark'><?= $account; ?></span>
				</a>
				<div class='dropdown-menu dropdown-menu-end'>
					<a class='dropdown-item' href='<?=$root?>pages/autentikasi/logout'>Log out</a>
				</div>
			</li>
		</ul>
	</div>
</nav>