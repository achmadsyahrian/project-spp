-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 14, 2022 at 05:20 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spp_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `bulan`
--

CREATE TABLE `bulan` (
  `id_bulan` int(11) NOT NULL,
  `nama_bulan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bulan`
--

INSERT INTO `bulan` (`id_bulan`, `nama_bulan`) VALUES
(1, 'JANUARI'),
(2, 'FEBRUARI'),
(3, 'MARET'),
(4, 'APRIL'),
(5, 'MEI'),
(6, 'JUNI'),
(7, 'JULI'),
(8, 'AGUSTUS'),
(9, 'SEPTEMBER'),
(10, 'OKTOBER'),
(11, 'NOVEMBER'),
(12, 'DESEMBER');

-- --------------------------------------------------------

--
-- Table structure for table `data_siswa`
--

CREATE TABLE `data_siswa` (
  `id` int(5) NOT NULL,
  `kode_siswa` varchar(100) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `alamat_siswa` varchar(50) NOT NULL,
  `tahun_ajaran` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_siswa`
--

INSERT INTO `data_siswa` (`id`, `kode_siswa`, `nama_siswa`, `alamat_siswa`, `tahun_ajaran`) VALUES
(4, 'S01', 'Achmad Syahrian', 'Jln. MasjidTembung Medan', '2022/2023'),
(15, 'S05', 'Raffly Ekasyach Maulana', 'Psr VII Tembung', '2020/2021'),
(16, 'S016', 'Wisnu Satria', 'Perum. Alam Lestari', '2021/2022'),
(18, 'S017', 'Putra Pratama', 'Jln. Pancing', '2022/2023'),
(19, 'S019', 'David Blowsom', 'New York 12 Estate', '2019/2020'),
(20, 'S020', 'Delima', 'Jln. Tidak Buntu', '2020/2021'),
(21, 'S021', 'Gabriel Jesus', 'London City Per. St', '2019/2020'),
(22, 'S022', 'Cristiano Ronaldo', 'Portugal Birmingham. Est No. 17', '2021/2022'),
(23, 'S023', 'Lionel Messi', 'Argentina Browway. St No . 19', '2022/2023'),
(24, 'S024', 'Harry Maguire', 'London Bright No. 17NM', '2020/2021');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id` int(11) NOT NULL,
  `kode_tahun_ajaran` varchar(100) NOT NULL,
  `tahun_ajaran` varchar(9) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `biaya_semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id`, `kode_tahun_ajaran`, `tahun_ajaran`, `keterangan`, `biaya_semester`) VALUES
(1, 'TA001', '2020/2021', 'Tahun Pertama', 400000),
(2, 'TA002', '2019/2020', 'Tahun Kedua', 600000),
(3, 'TA003', '2021/2022', 'Tahun Ketiga', 800000),
(4, 'TA004', '2022/2023', 'Tahun Keempat', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `no_transaksi` varchar(100) NOT NULL,
  `kode_siswa` varchar(100) NOT NULL,
  `kode_tahun_ajaran` varchar(100) NOT NULL,
  `id_bulan` int(11) NOT NULL,
  `bulan_bayar` varchar(1000) NOT NULL,
  `jenis_transaksi` varchar(100) NOT NULL,
  `status` varchar(40) NOT NULL,
  `total_biaya` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `no_transaksi`, `kode_siswa`, `kode_tahun_ajaran`, `id_bulan`, `bulan_bayar`, `jenis_transaksi`, `status`, `total_biaya`, `total_bayar`, `tgl_transaksi`) VALUES
(1, 'TR01', 'S01', 'TA001', 1, 'JANUARI', 'Pembayaran SPP Bulan JANUARI - 2020/2021', 'Lunas', 400000, 400000, '2022-10-12'),
(39, 'TR02', 'S01', 'TA001', 2, 'FEBRUARI', 'Pembayaran SPP Bulan FEBRUARI - 2020/2021', 'Lunas', 400000, 400000, '2022-11-14'),
(40, 'TR03', 'S01', 'TA001', 3, 'MARET', 'Pembayaran SPP Bulan MARET - 2020/2021', 'Proses', 400000, 10000, '2022-10-24'),
(41, 'TR04', 'S05', 'TA001', 5, 'MEI', 'Pembayaran SPP Bulan MEI - 2020/2021', 'Lunas', 400000, 400000, '2022-10-24'),
(42, 'TR05', 'S05', 'TA001', 1, 'JANUARI', 'Pembayaran SPP Bulan JANUARI - 2020/2021', 'Lunas', 400000, 400000, '2022-11-14');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `id_user` char(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `id_user`, `username`, `password`, `nama_user`, `level`) VALUES
(43, 'US042', 'admin', '698d51a19d8a121ce581499d7b701668', 'Achmad', 'Admin'),
(69, 'US044', 'user', '698d51a19d8a121ce581499d7b701668', 'Achmad', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bulan`
--
ALTER TABLE `bulan`
  ADD PRIMARY KEY (`id_bulan`);

--
-- Indexes for table `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bulan`
--
ALTER TABLE `bulan`
  MODIFY `id_bulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `data_siswa`
--
ALTER TABLE `data_siswa`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
