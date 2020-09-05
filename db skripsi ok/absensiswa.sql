-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18 Agu 2020 pada 20.36
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `absensiswa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen2`
--

CREATE TABLE IF NOT EXISTS `absen2` (
`id_absen2` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nis` int(11) NOT NULL,
  `ket` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE IF NOT EXISTS `absensi` (
`id` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `nokartu` varchar(20) NOT NULL,
  `nis` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_pulang` time NOT NULL,
  `ket` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id`, `id_jadwal`, `nokartu`, `nis`, `tanggal`, `jam_masuk`, `jam_pulang`, `ket`) VALUES
(9, 0, '6', 0, '2020-08-15', '09:20:43', '00:00:00', 'H'),
(10, 0, '7', 0, '2020-08-15', '09:22:32', '00:00:00', 'H');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cekabsen`
--

CREATE TABLE IF NOT EXISTS `cekabsen` (
  `id_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cekabsen`
--

INSERT INTO `cekabsen` (`id_status`) VALUES
('1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE IF NOT EXISTS `guru` (
`id` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `kode_guru` varchar(1) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `ttl` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `agama` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id`, `nip`, `nama`, `kode_guru`, `jk`, `ttl`, `alamat`, `agama`) VALUES
(1, 123, 'Retno Devita', 'A', 'Perempuan', '2020-08-06', 'Gaduik', 'Islam'),
(2, 124, 'Mardiah Masril', 'B', 'Perempuan', '2020-08-06', 'Kampuang Tanjuang', 'Islam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE IF NOT EXISTS `jadwal` (
`id_jadwal` int(11) NOT NULL,
  `id_mengajar` int(11) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam_mulai` varchar(10) NOT NULL,
  `jam_selesai` varchar(10) NOT NULL,
  `kelas` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_mengajar`, `hari`, `jam_mulai`, `jam_selesai`, `kelas`) VALUES
(1, 1, 'Senin', '08:00', '10:00', 'VII'),
(2, 2, 'Selasa', '08:00', '10:00', 'VII'),
(6, 1, 'Kamis', '07:05', '05:13', 'VII'),
(7, 2, 'Sabtu', '13:30', '15:00', 'VII'),
(8, 1, 'Kamis', '10:15', '00:00', 'VII'),
(9, 2, 'Rabu', '08:30', '10:15', 'VII'),
(10, 2, 'Senin', '15:00', '17:00', 'VII'),
(11, 2, 'Jumat', '20:00', '23:41', 'VII');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
`id` int(11) NOT NULL,
  `nokartu` varchar(20) NOT NULL,
  `nis` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `ttl` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `nama_orangtua` varchar(30) NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `kelas` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id`, `nokartu`, `nis`, `nama`, `jk`, `ttl`, `alamat`, `agama`, `nama_orangtua`, `nohp`, `kelas`) VALUES
(16, '6', 1234567, 'gilang', 'Laki-Laki', '2020-08-19', 'ztxyx', 'Islam', 'fyufiyf', '34567', 'VII');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
`id_kelas` int(11) NOT NULL,
  `kelas` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`) VALUES
(1, 'VII');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE IF NOT EXISTS `mapel` (
`id` int(11) NOT NULL,
  `kode_mapel` int(11) NOT NULL,
  `mapel` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id`, `kode_mapel`, `mapel`) VALUES
(1, 1, 'Fisika'),
(3, 2, 'Matematika'),
(4, 3, 'Kimia'),
(5, 4, 'Biologi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mengajar`
--

CREATE TABLE IF NOT EXISTS `mengajar` (
`id_mengajar` int(11) NOT NULL,
  `kode_guru` varchar(1) NOT NULL,
  `kode_mapel` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mengajar`
--

INSERT INTO `mengajar` (`id_mengajar`, `kode_guru`, `kode_mapel`) VALUES
(1, 'B', 4),
(2, 'B', 2),
(3, 'B', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `mode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`mode`) VALUES
(1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmprfid`
--

CREATE TABLE IF NOT EXISTS `tmprfid` (
  `nokartu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `status`) VALUES
(3, 'admin', 'admin', 'admin'),
(6, '124', '12345', 'guru'),
(9, 'gilang', '12345', 'guru');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen2`
--
ALTER TABLE `absen2`
 ADD PRIMARY KEY (`id_absen2`);

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
 ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
 ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mengajar`
--
ALTER TABLE `mengajar`
 ADD PRIMARY KEY (`id_mengajar`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
 ADD PRIMARY KEY (`mode`);

--
-- Indexes for table `tmprfid`
--
ALTER TABLE `tmprfid`
 ADD PRIMARY KEY (`nokartu`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen2`
--
ALTER TABLE `absen2`
MODIFY `id_absen2` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `mengajar`
--
ALTER TABLE `mengajar`
MODIFY `id_mengajar` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
