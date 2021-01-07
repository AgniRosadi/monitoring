-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2020 at 03:09 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monitoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_air`
--

CREATE TABLE `data_air` (
  `id_air` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_kolam` varchar(128) NOT NULL,
  `suhu` int(11) NOT NULL,
  `salinitas` int(11) NOT NULL,
  `ph_pagi` int(11) NOT NULL,
  `ph_sore` int(11) NOT NULL,
  `kecerahan` enum('h','hc','c','ck','k','hp') NOT NULL,
  `cuaca` enum('Cerah','Mendung','Hujan','') NOT NULL,
  `tg_air` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_air`
--

INSERT INTO `data_air` (`id_air`, `tanggal`, `kode_kolam`, `suhu`, `salinitas`, `ph_pagi`, `ph_sore`, `kecerahan`, `cuaca`, `tg_air`) VALUES
(12, '2020-10-21', '11', 12, 13, 122, 12, 'k', 'Mendung', 120),
(13, '2020-10-26', 'A1', 1, 1, 1, 1, 'ck', 'Mendung', 12);

-- --------------------------------------------------------

--
-- Table structure for table `data_kolam`
--

CREATE TABLE `data_kolam` (
  `id_kolam` int(11) NOT NULL,
  `siklus` varchar(128) NOT NULL,
  `kode_kolam` varchar(128) NOT NULL,
  `luas_kolam` varchar(128) NOT NULL,
  `tanggal` date NOT NULL,
  `asal_b` varchar(128) NOT NULL,
  `jumlah_tebar` varchar(128) NOT NULL,
  `tipe_p` enum('mulsa','hdpe') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_kolam`
--

INSERT INTO `data_kolam` (`id_kolam`, `siklus`, `kode_kolam`, `luas_kolam`, `tanggal`, `asal_b`, `jumlah_tebar`, `tipe_p`) VALUES
(14, '11', '11', '11', '0001-01-03', '111', '111', 'mulsa'),
(15, '1', 'A1', '10000', '2020-10-25', 'anyer', '100000', 'hdpe');

-- --------------------------------------------------------

--
-- Table structure for table `data_pakan`
--

CREATE TABLE `data_pakan` (
  `id_kolam` int(11) NOT NULL,
  `umur` int(11) NOT NULL,
  `pakan_p` int(11) NOT NULL,
  `pakan_s` int(11) NOT NULL,
  `pakan_sr` int(11) NOT NULL,
  `pakan_m` int(11) NOT NULL,
  `total_pkn` int(11) NOT NULL,
  `ket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pakan`
--

INSERT INTO `data_pakan` (`id_kolam`, `umur`, `pakan_p`, `pakan_s`, `pakan_sr`, `pakan_m`, `total_pkn`, `ket`) VALUES
(0, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `data_parsial`
--

CREATE TABLE `data_parsial` (
  `id_parsial` int(11) NOT NULL,
  `no_parsial` enum('parsial1','parsial2','parsial3','parsial4','parsial5','panen') NOT NULL,
  `kode_kolam` varchar(128) NOT NULL,
  `tanggal` date NOT NULL,
  `hari` varchar(128) NOT NULL,
  `mbw` varchar(128) NOT NULL,
  `size` varchar(128) NOT NULL,
  `biomasa` varchar(128) NOT NULL,
  `populasi` varchar(128) NOT NULL,
  `parsial` varchar(128) NOT NULL,
  `sisa_p` varchar(128) NOT NULL,
  `pemasukan` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_parsial`
--

INSERT INTO `data_parsial` (`id_parsial`, `no_parsial`, `kode_kolam`, `tanggal`, `hari`, `mbw`, `size`, `biomasa`, `populasi`, `parsial`, `sisa_p`, `pemasukan`, `total`) VALUES
(1, 'parsial1', 'A1', '2020-10-09', 'senin', '10', '100', '20', '10000', '10', '200000', 10000000, 100000000),
(5, 'parsial2', 'A1', '2020-10-27', '100', '1', '1', '2', '2', '10', '1', 2147483647, 2147483647),
(6, 'parsial5', 'A1', '2020-10-27', '90', '199', '92', '9292', '929', '29', '29', 2147483647, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `data_sampling`
--

CREATE TABLE `data_sampling` (
  `id_sampling` int(11) NOT NULL,
  `tanggal_s` date NOT NULL,
  `kode_kolam` varchar(128) NOT NULL,
  `umur_u` int(11) NOT NULL,
  `mbw` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `adg` int(11) NOT NULL,
  `pakan` int(11) NOT NULL,
  `estimasi` int(11) NOT NULL,
  `ket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_sampling`
--

INSERT INTO `data_sampling` (`id_sampling`, `tanggal_s`, `kode_kolam`, `umur_u`, `mbw`, `size`, `adg`, `pakan`, `estimasi`, `ket`) VALUES
(10, '2020-10-25', '2', 2, 12, 4, 1, 3, 2, 0),
(11, '2020-10-25', '11', 1, 1, 3, 3, 1, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Agni Rosadi', 'agnirosadi1@gmail.com', 'default.jpg', '$2y$10$HEMewtfgBpswdRw1QfUcYuhaa7ZSJtuICbRC4nzhf1618sTOCafS6', 1, 1, 1597508209),
(13, 'aulan', 'agnir@gmail.com', 'default.jpg', '$2y$10$.tPmRbYKAccgRCaL6CzV8ud1OSOy50c53vdjNnxDlXh0vvT6ArAbq', 2, 1, 1601902772);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3),
(6, 2, 4),
(7, 1, 5),
(10, 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'Data'),
(3, 'Grafik'),
(4, 'Perhitungan'),
(5, 'Manajemen User'),
(6, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(11, 2, 'Kolam', 'data/kolam', 'fas fa-fw fa-file-alt', 1),
(18, 2, 'Kualitas Air', 'data', 'fas fa-fw fa-file-alt', 1),
(19, 2, 'Rekap Parsial', 'data/parsial', 'fas fa-fw fa-file-alt', 1),
(20, 3, 'Perkembangan Udang', 'grafik', 'fas fa-fw fa-chart-bar', 1),
(21, 3, 'Perkembangan Pakan', 'grafik/pakan', 'fas fa-fw fa-chart-bar', 1),
(22, 4, 'Estimasi Partial', 'partial', 'fas fa-fw fa-divide', 1),
(23, 5, 'Manajemen User', 'admin/M_user', 'fas fa-fw fa-users', 1),
(25, 6, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(26, 6, 'Edit Profile', 'user/edit', 'fas fa-fw fa-edit', 1),
(27, 6, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(28, 2, 'Sampling', 'data/sampling', 'fas fa-fw fa-file-alt', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_air`
--
ALTER TABLE `data_air`
  ADD PRIMARY KEY (`id_air`);

--
-- Indexes for table `data_kolam`
--
ALTER TABLE `data_kolam`
  ADD PRIMARY KEY (`id_kolam`);

--
-- Indexes for table `data_pakan`
--
ALTER TABLE `data_pakan`
  ADD PRIMARY KEY (`id_kolam`);

--
-- Indexes for table `data_parsial`
--
ALTER TABLE `data_parsial`
  ADD PRIMARY KEY (`id_parsial`);

--
-- Indexes for table `data_sampling`
--
ALTER TABLE `data_sampling`
  ADD PRIMARY KEY (`id_sampling`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_air`
--
ALTER TABLE `data_air`
  MODIFY `id_air` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `data_kolam`
--
ALTER TABLE `data_kolam`
  MODIFY `id_kolam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `data_parsial`
--
ALTER TABLE `data_parsial`
  MODIFY `id_parsial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `data_sampling`
--
ALTER TABLE `data_sampling`
  MODIFY `id_sampling` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
