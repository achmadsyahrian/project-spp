<?php 

$connect = mysqli_connect("localhost", "root", "", "spp_sekolah");

// =======================     Fungsi Tampil  =======================

function tampilUser() {
  global $connect;

  $dataUser = mysqli_query($connect, "SELECT * FROM user");
  $jumlahUser = mysqli_num_rows($dataUser);

  return $jumlahUser;
  
}

function tampilSiswa() {
  global $connect;

  $dataSiswa = mysqli_query($connect, "SELECT * FROM data_siswa");
  $jumlahSiswa = mysqli_num_rows($dataSiswa);

  return $jumlahSiswa;
  
}


// =======================     Akhir Fungsi Tampil  ======================= 



// =======================     Fungsi Query  ======================= 

function query($query) {
  global $connect;
  $result = mysqli_query($connect, $query);
  $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
    }
    return $rows;
}


function queryUser($query) {
  global $connect;
  $result = mysqli_query($connect, $query);
  $rows = [];
    while ($row = mysqli_fetch_array($result)) {
      $rows[] = $row;
    }
    return $rows;
}


// =======================     Akhir Fungsi Query  ======================= 



// =======================       Fungsi Ubah  ======================= 

function ubahUser($data) {
  global $connect;

  $id_user = $data['id_user'];
  $username = htmlspecialchars($data['username']);
  $password = htmlspecialchars($data['password']);
  $nama_user = htmlspecialchars($data['nama_user']);
  $level = htmlspecialchars($data['level']);
  
  $query = "UPDATE user SET
              username = '$username',
              password = '$password',
              nama_user = '$nama_user',
              level = '$level'
            WHERE id_user = '$id_user'
            ";

  mysqli_query($connect, $query);

  return mysqli_affected_rows($connect);
  
}

function ubahSiswa($data) {
  global $connect;

  $kodeSiswa = $data['id_siswa'];
  $namaSiswa = htmlspecialchars($data['namaSiswa']);
  $alamat = htmlspecialchars($data['alamat']);
  $tahunAjaran = htmlspecialchars($data['tahunAjaran']);
  
  $query = "UPDATE data_siswa SET
              kode_siswa = '$kodeSiswa',
              nama_siswa = '$namaSiswa',
              alamat_siswa = '$alamat',
              tahun_ajaran = '$tahunAjaran'
            WHERE kode_siswa = '$kodeSiswa'
            ";

  mysqli_query($connect, $query);

  return mysqli_affected_rows($connect);
  
}


function ubahTahunAjar($data) {
  global $connect;

  $kodeTahunAjar = $data['kodeTahunAjar'];
  $tahunAjaran = htmlspecialchars($data['tahunAjaran']);
  $keterangan = htmlspecialchars($data['keterangan']);
  $biayaSemester = htmlspecialchars($data['biayaSemester']);
  // $biayaSemester = "Rp " . number_format($data['biayaSemester'],2,',','.');
  
  $query = "UPDATE tahun_ajaran SET
              kode_tahun_ajaran = '$kodeTahunAjar',
              tahun_ajaran = '$tahunAjaran',
              keterangan = '$keterangan',
              biaya_semester = '$biayaSemester'
            WHERE kode_tahun_ajaran = '$kodeTahunAjar'
            ";

  mysqli_query($connect, $query);

  return mysqli_affected_rows($connect);
  
}

function ubahSPP($data) {
  global $connect;
  $kodeSiswa = $data['kode_siswa'];
  $kodeThnAjaran = $data['kodeThnAjaran'];
  $idBulan = ucfirst($data['id_bulan']);
  
  $tglBayar = htmlspecialchars($data['tglBayar']);
  $ttlBiaya = htmlspecialchars($data['totalBiaya']);
  $ttlBayar = htmlspecialchars($data['totalBayar']);

  // menghitung status lunas atau belum
  if ($ttlBayar == $ttlBiaya) {
    $status = "Lunas";
  } elseif ($ttlBayar < $ttlBiaya) {
    $status = "Proses";
  }

  $query = "UPDATE transaksi SET
              status = '$status',
              total_bayar = '$ttlBayar',
              tgl_transaksi = '$tglBayar'
            WHERE kode_siswa = '$kodeSiswa' AND kode_tahun_ajaran = '$kodeThnAjaran' AND id_bulan = $idBulan
            ";
  
  mysqli_query($connect, $query);
  
  return mysqli_affected_rows($connect);
}

// =======================     Akhir Fungsi Ubah  ======================= 


// =======================        Fungsi Tambah  ======================= 
function tambahUser($data) {
  global $connect;

  $idUser = $data['id_user'];
  $username = htmlspecialchars($data['username']);
  $nama_user = htmlspecialchars($data['nama_user']);
  $password = htmlspecialchars(strtolower(md5($data['password'])));
  $level = htmlspecialchars($data['level']);

  $cek = "SELECT username FROM user WHERE username = '$username';";
  $cekUsername = mysqli_query($connect, $cek);
  
  if (mysqli_fetch_assoc($cekUsername)) {
    echo "
    <script>
      alert('Username sudah terdaftar, Harap masukkan yg berbeda!');
    </script>
    ";
    return false;
  }
  
  $query = "INSERT INTO user
              VALUES
            (NULL, '$idUser', '$username', '$password', '$nama_user', '$level');
            ";
  mysqli_query($connect, $query);
  
  return mysqli_affected_rows($connect);
}


function tambahSiswa($data) {
  global $connect;

  $kodeSiswa = $data['id_siswa'];
  $namaSiswa = htmlspecialchars($data['namaSiswa']);
  $alamat = htmlspecialchars($data['alamat']);
  $tahunAjaran = htmlspecialchars(strtolower($data['tahunAjaran']));

  $query = "INSERT INTO data_siswa
              VALUES
            (NULL, '$kodeSiswa', '$namaSiswa', '$alamat', '$tahunAjaran');
            ";
  mysqli_query($connect, $query);
  
  return mysqli_affected_rows($connect);
}

function tambahTahunAjar($data) {
  global $connect;

  $kodeTahunAjaran = $data['kode_tahun'];
  $tahun_ajaran = htmlspecialchars($data['tahun_ajar']);
  $keterangan = htmlspecialchars($data['keterangan']);
  $biaya = htmlspecialchars($data['biaya']);
  
  // cek kesamaan tahun ajaran
  $cek = "SELECT tahun_ajaran FROM tahun_ajaran WHERE tahun_ajaran = '$tahun_ajaran';";
  $cekTahunAjar = mysqli_query($connect, $cek);
  
  if (mysqli_fetch_assoc($cekTahunAjar)) {
    echo "
    <script>
      alert('Tahun Ajaran sudah terdaftar, Harap masukkan yg berbeda!');
    </script>
    ";
    return false;
  }

  
  
  $query = "INSERT INTO tahun_ajaran
              VALUES
            (NULL, '$kodeTahunAjaran', '$tahun_ajaran', '$keterangan', '$biaya');
            ";
  mysqli_query($connect, $query);
  
  return mysqli_affected_rows($connect);
}


// =======================     Akhir Fungsi Tambah  ======================= 


// =======================       Fungsi Hapus  ======================= 
function hapus($id, $titleTable) {
  global $connect;

  mysqli_query($connect, "DELETE FROM $titleTable WHERE id = $id");

  return mysqli_affected_rows($connect);
  
}
// =======================     Akhir Fungsi Hapus  ======================= 



// =======================       Fungsi Bayar  ======================= 
function bayarSpp($data) {
  global $connect;

  $kodeSiswa = $data['kode_siswa'];
  $kodeThnAjaran = $data['kodeThnAjaran'];
  $thnAjaran = $data['thnAjaran'];
  $namaBulan = ucfirst($data['nama_bulan']);
  $idBulan = ucfirst($data['id_bulan']);
  
  $tglBayar = htmlspecialchars($data['tglBayar']);

  $ttlBiaya = htmlspecialchars($data['totalBiaya']);
  $ttlBayar = htmlspecialchars($data['totalBayar']);


  // mencari nomor transaksi
  $cekRow = mysqli_query($connect, "SELECT * FROM transaksi");
  $noTransaksi ='TR0' . mysqli_num_rows($cekRow) + 1;


  // menghitung status lunas atau belum
  if ($ttlBayar == $ttlBiaya) {
    $status = "Lunas";
  } elseif ($ttlBayar < $ttlBiaya) {
    $status = "Proses";
  }
  

  $query = "INSERT INTO transaksi
              VALUES
            (NULL, '$noTransaksi', '$kodeSiswa', '$kodeThnAjaran', '$idBulan', '$namaBulan' , 'Pembayaran SPP Bulan $namaBulan - $thnAjaran', '$status', '$ttlBiaya', '$ttlBayar', '$tglBayar');
            ";
  mysqli_query($connect, $query);
  
  return mysqli_affected_rows($connect);
}
// =======================     Akhir Fungsi Bayar  ======================= 

// =======================     Fungsi Format Harga  ======================= 

function rupiah($angka){
  $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
  return $hasil_rupiah;
  
}

// =======================     Akhir Fungsi Format Harga  ======================= 






// =======================       Fungsi Enkripsi  ======================= 
// function encrypt($s) {
//   $cryptKey    ='d8578edf8458ce06fbc5bb76a58c5ca4';
//   $qEncoded    =base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5( $cryptKey), $s, MCRYPT_MODE_CBC, md5(md5($cryptKey))));
//   return($qEncoded);
// }


// function decrypt($s) {
//   $cryptKey    ='d8578edf8458ce06fbc5bb76a58c5ca4';
//   $qDecoded    =rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), base64_decode($s), MCRYPT_MODE_CBC, md5(md5($cryptKey))), "\0");
//   return($qDecoded);
// }


// =======================     Akhir Fungsi Enkripsi  ======================= 

?>