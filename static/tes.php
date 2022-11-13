


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<a onclick="contoh()">
		Click Me
	</a>

	<a onclick="hai()">Index</a>
 
	<hr>

	<form action="rekap-transaksi" method="GET">
		<label for="username">Username</label>
		<input type="text" name="username" id="username" value="USERNAMW">
		<button>Kirimkan</button>
	</form>


</body>
</html>


<script src="../sweetalert2/sweetalert2.all.min.js"></script>

<script>
	function hai(p1) {
									Swal.fire({
																title: 'Anda Yakin Untuk Menghapus Data Ini ?',
																text: 'Anda Tidak Dapat Melihat Data Ini Lagi!!!',
																type: 'warning',
																showCancelButton: true,
																confirmButtonColor: '#DD6B55',
																confirmButtonText: 'Hapus Saja!!',
																closeOnConfirm: false
														}).then((result) => {
																/* Read more about isConfirmed, isDenied below */
																if (result.isConfirmed) {
																		window.location.href = 'hapus.php?id=';
																}
														})
														}
</script>