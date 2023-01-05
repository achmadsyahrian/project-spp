<?php 

session_start();
if (!isset($_SESSION['level'])) {
	header("Location:autentikasi/login");
} elseif ($_SESSION['level'] == "User") {
	header("Location:index");
}

require 'functions.php';

$id = $_GET["id"];
$titleTable = $_GET["titleTable"];


if (hapus($id, $titleTable) > 0) {

  echo "
    <script>
      alert('Data Berhasil dihapus!');
      window.history.back();
    </script>
    ";
}
?>