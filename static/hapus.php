<?php 

session_start();
if (!isset($_SESSION['level'])) {
	header("Location:login.php");
} elseif ($_SESSION['level'] == "User") {
	header("Location:index.php");
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