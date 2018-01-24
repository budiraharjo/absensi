-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 25. Desember 2015 jam 16:40
-- Versi Server: 5.5.16
-- Versi PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbabsensi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabsen`
--

CREATE TABLE IF NOT EXISTS `tabsen` (
  `id_absen` int(11) NOT NULL AUTO_INCREMENT,
  `nis` varchar(10) NOT NULL,
  `id_semester` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` char(1) NOT NULL,
  PRIMARY KEY (`id_absen`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data untuk tabel `tabsen`
--

INSERT INTO `tabsen` (`id_absen`, `nis`, `id_semester`, `tanggal`, `keterangan`) VALUES
(8, '2001000001', 1, '2012-06-07', 'H'),
(9, '2001000002', 1, '2012-06-07', 'H'),
(10, '2001000003', 1, '2012-06-07', 'S'),
(11, '2001000004', 1, '2012-06-07', 'H'),
(13, '2001000005', 1, '2012-06-07', 'H'),
(14, '2001000001', 1, '2012-06-08', 'H'),
(15, '2001000001', 1, '2012-06-11', 'H'),
(16, '2001000002', 1, '2012-06-08', 'S'),
(17, '2001000002', 1, '2012-06-11', 'S'),
(18, '2001000003', 1, '2012-06-08', 'I'),
(19, '2001000003', 1, '2012-06-11', 'H'),
(20, '2001000004', 1, '2012-06-08', 'H'),
(21, '2001000004', 1, '2012-06-11', 'H'),
(22, '2001000005', 1, '2012-06-08', 'H'),
(23, '2001000005', 1, '2012-06-11', 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tkelas`
--

CREATE TABLE IF NOT EXISTS `tkelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `kelas` varchar(10) NOT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data untuk tabel `tkelas`
--

INSERT INTO `tkelas` (`id_kelas`, `kelas`) VALUES
(1, 'X-1'),
(2, 'X-2'),
(3, 'X-3'),
(4, 'X-4'),
(5, 'X-5'),
(6, 'XI IPS 1'),
(7, 'XI IPS 2'),
(8, 'XI IPS 3'),
(9, 'XI IPA 1'),
(10, 'XI IPA 2'),
(11, 'XII IPA 1'),
(12, 'XII IPA 2'),
(13, 'XII IPS 1'),
(14, 'XI IPS 2'),
(15, 'XII IPS 2'),
(16, 'XII IPS 3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tsemester`
--

CREATE TABLE IF NOT EXISTS `tsemester` (
  `id_semester` int(11) NOT NULL AUTO_INCREMENT,
  `aktif` char(1) NOT NULL,
  PRIMARY KEY (`id_semester`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `tsemester`
--

INSERT INTO `tsemester` (`id_semester`, `aktif`) VALUES
(1, 'N'),
(2, 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tsiswa`
--

CREATE TABLE IF NOT EXISTS `tsiswa` (
  `nis` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `aktif` char(1) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  PRIMARY KEY (`nis`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tsiswa`
--

INSERT INTO `tsiswa` (`nis`, `nama`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `aktif`, `email`, `telp`, `hp`, `id_kelas`) VALUES
('2001000001', 'Alex Nurdin', '-', '', '1998-05-01', 'Y', 'alex.nurdin@yahoo.com', '-', '081324555161', 1),
('2001000002', 'Ani Bambang', '-', '', '1995-06-18', 'Y', 'ani.bambang@yahoo.com', '-', '-', 1),
('2001000003', 'Aminah Setiabudi', '-', 'Cirebon', '1995-03-26', 'Y', 'aminah.setiabudi@yahoo.com', '-', '-', 1),
('2001000004', 'Ao Jin Su', '-', 'Beijing', '1995-08-18', 'Y', 'ao.jin.su@yahoo.com', '-', '-', 1),
('2001000005', 'Bambang Setiado', '-', 'Bandung', '1995-03-23', 'Y', 'bambang.setiado@yahoo.com', '-', '-', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tuser`
--

CREATE TABLE IF NOT EXISTS `tuser` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `last_login` varchar(20) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `tuser`
--

INSERT INTO `tuser` (`id_user`, `username`, `password`, `nama_lengkap`, `last_login`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', '2015-12-25 15:43:17');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
