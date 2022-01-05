-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Des 2021 pada 16.55
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ssb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `id_user`, `nama_admin`) VALUES
(1, 1, 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `posisi`
--

CREATE TABLE `posisi` (
  `id_posisi` int(11) NOT NULL,
  `posisi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `posisi`
--

INSERT INTO `posisi` (`id_posisi`, `posisi`) VALUES
(1, 'Penyerang'),
(2, 'Kiper'),
(3, 'Bek'),
(4, 'Sayap'),
(5, 'Gelandang'),
(6, 'Bek Tengah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_pelatih`
--

CREATE TABLE `tabel_pelatih` (
  `id_pelatih` int(20) NOT NULL,
  `nama_pelatih` varchar(75) NOT NULL,
  `peran` varchar(50) NOT NULL,
  `lisensi` varchar(30) NOT NULL,
  `melatih_sejak` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_pelatih`
--

INSERT INTO `tabel_pelatih` (`id_pelatih`, `nama_pelatih`, `peran`, `lisensi`, `melatih_sejak`) VALUES
(1, 'Rinto Hermawan', 'Kepala Pelatih', 'AAA', 2015),
(2, 'Agus Fatoni', 'Pelatih', '', 0),
(3, 'Egi ', '', '', 0),
(4, 'Dandi Nur', 'Pelatih', 'D', 2015),
(5, 'Engkus K', 'Pelatih', '', 0),
(6, 'Anwar', 'Pelatih', '', 0),
(7, 'Yoga', 'Pelatih', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_siswa`
--

CREATE TABLE `tabel_siswa` (
  `id_siswa` int(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `asal` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `telp` varchar(30) NOT NULL,
  `tinggi_badan` int(5) NOT NULL,
  `berat_badan` int(5) NOT NULL,
  `usia` int(11) NOT NULL,
  `nama_ortu` varchar(75) NOT NULL,
  `pekerjaan_ortu` varchar(50) NOT NULL,
  `alamat_ortu` varchar(100) NOT NULL,
  `sudah_bayar` tinyint(1) NOT NULL,
  `tanggal_daftar` timestamp NULL DEFAULT NULL,
  `bukti_pembayaran` varchar(75) DEFAULT NULL,
  `id_posisi` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_siswa`
--

INSERT INTO `tabel_siswa` (`id_siswa`, `id_user`, `nama_siswa`, `tanggal_lahir`, `alamat`, `asal`, `foto`, `telp`, `tinggi_badan`, `berat_badan`, `usia`, `nama_ortu`, `pekerjaan_ortu`, `alamat_ortu`, `sudah_bayar`, `tanggal_daftar`, `bukti_pembayaran`, `id_posisi`) VALUES
(14, 6, 'Nur Ikhsan Imanudin', '2009-06-09', 'Majalengka', 'Majalengka', 'Nur_Ikhsan_Imanudin_2021-11-09.jpg', '', 165, 55, 0, 'Pak Heri', 'Wiraswasta', 'Majalengka', 1, '2021-11-08 22:32:46', 'TF_Nur_Ikhsan_Imanudin_2021-11-09.jpg', 1),
(16, 8, 'a a a a', '2010-02-12', 'sdfa', 'Majalengka', 'a_a_a_a_2021-11-12.jpg', '', 165, 55, 11, 'aaaa', 'qqq', 'afadf', 1, '2021-11-11 20:28:55', 'TF_a_a_a_a_2021-11-12.jpg', 1),
(17, 9, 'momo', '2009-06-17', 'mjl', 'af', 'momo_2021-11-17.png', '', 155, 55, 12, 'eqf', 'Wiraswasta', 'aega', 1, '2021-11-17 05:54:38', 'TF_momo_2021-11-17.png', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_jadwal`
--

CREATE TABLE `t_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_pelatih` int(11) NOT NULL,
  `waktu_mulai` varchar(75) NOT NULL,
  `waktu_selesai` varchar(50) NOT NULL,
  `kelompok_usia` int(30) NOT NULL,
  `tempat` varchar(50) NOT NULL,
  `hari` varchar(30) NOT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_jadwal`
--

INSERT INTO `t_jadwal` (`id_jadwal`, `id_pelatih`, `waktu_mulai`, `waktu_selesai`, `kelompok_usia`, `tempat`, `hari`, `tanggal`) VALUES
(1, 1, '08.00', '10.00', 9, 'Lapang KPU', 'Minggu', '2021-11-07'),
(2, 2, '08.00', '10.00', 10, 'Lapang KPU', 'Minggu', '2021-11-07'),
(3, 3, '08.00', '10.00', 11, 'Lapang KPU', 'Minggu', '2021-11-07'),
(4, 0, '08.00', '10.00', 12, 'Lapang KPU', 'Minggu', '2021-11-07'),
(5, 0, '10.00', '12.00', 13, 'Stadion Warung Jambu', 'Minggu', '2021-11-07'),
(6, 0, '10.00', '12.00', 14, 'Stadion Warung Jambu', 'Minggu', '2021-11-07'),
(7, 0, '10.00', '12.00', 15, 'Stadion Warung Jambu', 'Minggu', '2021-11-07'),
(8, 0, '10.00', '12.00', 16, 'Stadion Warung Jambu', 'Minggu', '2021-11-07'),
(9, 0, '14.30', '17.00', 9, 'Lapang KPU', 'Jum\'at', NULL),
(10, 0, '14.30', '17.00', 10, 'Lapang KPU', 'Jum\'at', '0000-00-00'),
(11, 0, '14.30', '17.00', 11, 'Lapang KPU', 'Jum\'at', '0000-00-00'),
(12, 0, '14.30', '17.00', 12, 'Lapang KPU', 'Jum\'at', '0000-00-00'),
(13, 0, '14.30', '17.00', 13, 'Stadion Warung Jambu', 'Jum\'at', '0000-00-00'),
(14, 0, '14.30', '17.00', 14, 'Stadion Warung Jambu', 'Jum\'at', '0000-00-00'),
(15, 0, '14.30', '17.00', 15, 'Stadion Warung Jambu', 'Jum\'at', '0000-00-00'),
(16, 0, '14.30', '17.00', 16, 'Stadion Warung Jambu', 'Jum\'at', '0000-00-00'),
(17, 1, 'test', 'test', 10, 'Lapang KPU', 'Senin', '2021-11-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_kegiatan`
--

CREATE TABLE `t_kegiatan` (
  `id_kegiatan` int(10) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `foto_kegiatan` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` text NOT NULL,
  `tgl_upload` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_kegiatan`
--

INSERT INTO `t_kegiatan` (`id_kegiatan`, `nama_kegiatan`, `foto_kegiatan`, `tanggal`, `deskripsi`, `tgl_upload`) VALUES
(6, 'TEST', 'New TEST_2021-12-05.jpg', '2021-12-08', '<div>test</div><div>test</div><div>test</div><div>test</div>', '2021-12-05'),
(7, 'aaa', 'New aaa_2021-12-05.jpg', '2021-12-05', '<div>affa</div><div>affa</div><div>affa</div><div>affa</div>', '2021-12-05'),
(8, 'aaaaaaaaaaaa', 'New aaaaaaaaaaaa_2021-12-05.jpg', '2021-12-04', '<div>qwerty</div>', '2021-12-05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(30) NOT NULL,
  `email` varchar(75) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `role`) VALUES
(1, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1),
(4, 'nurikhsanimanudin@gmail.com', 'nurikhsanimanudin@gmail.com', 2),
(5, 'aaa', 'aaa', 2),
(6, 'nurikhsanimanudin@gmail.com', 'nurikhsanimanudin@gmail.com', 2),
(7, 'nurikhsanimanudin23@gmail.com', 'nurikhsanimanudin23@gmail.com', 2),
(8, 'test@gmail.com', 'test@gmail.com', 2),
(9, 'momo@gmail.com', 'momo@gmail.com', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `posisi`
--
ALTER TABLE `posisi`
  ADD PRIMARY KEY (`id_posisi`);

--
-- Indeks untuk tabel `tabel_pelatih`
--
ALTER TABLE `tabel_pelatih`
  ADD PRIMARY KEY (`id_pelatih`);

--
-- Indeks untuk tabel `tabel_siswa`
--
ALTER TABLE `tabel_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `t_jadwal`
--
ALTER TABLE `t_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `t_kegiatan`
--
ALTER TABLE `t_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `posisi`
--
ALTER TABLE `posisi`
  MODIFY `id_posisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tabel_pelatih`
--
ALTER TABLE `tabel_pelatih`
  MODIFY `id_pelatih` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tabel_siswa`
--
ALTER TABLE `tabel_siswa`
  MODIFY `id_siswa` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `t_jadwal`
--
ALTER TABLE `t_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `t_kegiatan`
--
ALTER TABLE `t_kegiatan`
  MODIFY `id_kegiatan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
