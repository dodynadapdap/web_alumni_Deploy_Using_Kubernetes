-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jun 2021 pada 16.19
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_alumni`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(200) NOT NULL,
  `gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `gambar`) VALUES
(1, 'admin', '$2y$10$05n/mSvSM/BKbeTS42sefO3Q2GDBiGr9ZGhOaDokmasnwr8Y50uPu', ''),
(2, 'admin1', '$2y$10$ifVeZjU.f2mwe6369F56jO0m0Dtk0rteu0FHhZut1nO8IcPP8Ezre', ''),
(4, 'admin4', '$2y$10$53BQSWfgq.ZcVOBMAH2EaOeptmKtQLsNyb6IieZx3S5e7gBEQg.TW', ''),
(5, 'admin01', '$2y$10$8E70bDjAcIxxxswNNS.6Qen3fqRlvxWceFIQ.9kIa9KNBg45OP8sq', '60a512bbc3bf2.jpeg'),
(6, 'admin2', '$2y$10$2jPdgsXtChRpiBA.niDJ1etZoZV7WdPTNEDzFAOUsfC9nfGcnVqPq', '60b98e4f6c37d.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `Nama` varchar(150) NOT NULL,
  `Jk` varchar(30) NOT NULL,
  `Prodi` varchar(50) NOT NULL,
  `Angkatan` int(11) NOT NULL,
  `Alamat` varchar(150) NOT NULL,
  `Pekerjaan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data`
--

INSERT INTO `data` (`id`, `Nama`, `Jk`, `Prodi`, `Angkatan`, `Alamat`, `Pekerjaan`) VALUES
(2, 'Glorian Purba', 'Laki-laki', 'D3 Teknologi Komputer', 2020, 'Balige', 'Software Engineer'),
(3, 'Kania Reski', 'Laki-laki', 'D3 Teknologi Komputer', 2020, 'Laguboti', 'Data Analysist'),
(4, 'Christian Tobing', 'Laki-laki', 'D3 Teknologi Komputer', 2020, 'Tarutung', 'Backend Programmer'),
(5, 'Nurcahaya Situmorang', 'Perempuan', 'D3 Teknologi Komputer', 2020, 'Binjai', 'Frontend Developer'),
(6, 'Jesika Laprina manurung', 'Perempuan', 'D3 Teknologi Komputer', 2020, 'Binjai', 'Full Stack Developer'),
(7, 'Jhon Siagian ', 'Laki-laki', 'D3 Teknologi Komputer', 2020, 'Sei Rampah', 'Android Developer'),
(8, 'Fajar Sianipar', 'Laki-laki', 'D3 Teknologi Komputer', 2020, 'Lubuk Pakkam', 'IOS Developer'),
(9, 'Bryan Oliver Batubara', 'Laki-laki', 'D3 Teknologi Komputer', 2020, 'Siborongborong', 'Cyber Security Analyst'),
(11, 'Antonel Manurung', 'Laki-laki', 'D3 Teknologi Komputer', 2020, 'Pematangsiantar', 'Database Administrator'),
(12, 'Boby Aritonang', 'Laki-laki', 'D3 Teknologi Komputer', 2020, 'Laguboti', 'Software Engineer'),
(13, 'Witasarah Sitinjak', 'Perempuan', 'D3 Teknologi Komputer', 2020, 'Laguboti', 'Software Tester'),
(14, 'Pandu Sipahutar', 'Laki-laki', 'D3 Teknologi Komputer', 2020, 'Laguboti', 'Game Developer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user1`
--

CREATE TABLE `user1` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Jk` varchar(50) NOT NULL,
  `number_id` varchar(100) NOT NULL,
  `Angkatan` int(11) NOT NULL,
  `Pekerjaan` varchar(200) NOT NULL,
  `Kontak` varchar(20) NOT NULL,
  `Alamat` varchar(200) NOT NULL,
  `gambar` varchar(200) DEFAULT NULL,
  `Prodi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user1`
--

INSERT INTO `user1` (`id_user`, `username`, `password`, `Nama`, `Jk`, `number_id`, `Angkatan`, `Pekerjaan`, `Kontak`, `Alamat`, `gambar`, `Prodi`) VALUES
(5, 'coba1  ', '$2y$10$nt4XSqUGVpSGs9u5qvOIA.BtAYthdFD.orN8eOA49tC2QqqJSUj7S', ' Rio', 'Laki-laki', '11320090 ', 2020, 'Mahasiswa', '1234567890', 'balige  ', '60bf7a52c1d79.jpg', 'D3 Teknologi Informasi'),
(6, 'kania', '$2y$10$qMC9.XVgk8.UQavy8RdVQe5QPCb152mD3QpFBjEC.zb45qjyymT0O', 'kania', 'perempuan', '13320040', 2020, 'Mahasiswa', '088888888888', 'Balige', '60a33e6156a56.jpg', 'D3 teknologi komputer'),
(7, 'rio', '$2y$10$FVSMb3B/QnoGMcUGHWTw6enhWay9NFGKRBhlom8XC3zXDSPwEAkyy', 'Rio', 'Laki-Laki', '13320038', 2020, 'Mahasiswa', '12345678', 'Siborongborong', '60b990193a5cf.jpg', 'D3 Teknologi Komputer'),
(8, 'dody', '$2y$10$kSJ1cfS.8eCXixpgIoldue9eWTnSqmjdBvdU0SeiNNfux.0QYy/.S', 'Dody N', 'Laki-laki', '13320070', 2020, 'Mahasiswa', '987654321', 'balige', '60b9bb2fee90f.jpg', 'D3 teknologi komputer'),
(9, 'aaa', '$2y$10$PMzAC4P1rSXmtlWGi7iaSe8.5W37VQkYgiw3rRDGSML3JUjgw1J3S', 'Andre', 'Laki-laki', '13320080', 2021, 'Mahasiswa', '87777777777', 'balige', '60b9ad2b979f7.jpg', 'D3 Teknologi Informasi'),
(10, 'bbb', '$2y$10$5FsmYWZGnDgs0fUpEHULCeuY4I/IZ/OPabe75SY6nXkfC9.ml5ysO', 'bbb', 'Laki-laki', '11320070', 2021, 'Mahasiswa', '086666666666', 'Laguboti', '60b9baaf76afb.jpg', 'D3 Teknologi Informasi'),
(11, 'andre', '$2y$10$TMsPxqmYFaXnnN.MhLgEQuyDUyMsgqQb24He73crzdluStBRIDJC6', 'andre N', 'Laki-laki', '11320090', 2020, 'Software Engineer', '85235324567', 'sbb', '60ba1888e8dfa.', 'D3 Teknologi Informasi'),
(12, 'anita', '$2y$10$l/gk3vsudgT2Vo6PlY2eBuaF2WpAYAvDpqtWmneCXIHo7nsqeee2.', 'anita', 'perempuan', '11320040', 2020, 'Mahasiswa', '082340404040', 'Sibolga', '60b9c478066ec.jpg', 'D3 Teknologi Informasi'),
(13, 'inez', '$2y$10$tRfFviUko1QCpf1VczGzW.bn6a97G0vEsm/lpgqBwjPuCUjDYJTfm', 'inez', 'perempuan', '13320089', 2020, 'Mahasiswa', '082370708080', 'Medan', '60b9cc5b3162b.jpg', 'D3 Teknologi Informasi'),
(14, 'rio123', '$2y$10$KQS4Ho3UxFVILAuCFkf/veG73KThHM6Bvv/ifLudYw3iWRpRK.lh6', 'Rio .Z', 'Laki-laki', '13320038', 2020, 'Mahasiswa', '082370762125', 'Siborongborong', '60ba16a762741.jpg', 'D3 Teknologi Komputer');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user1`
--
ALTER TABLE `user1`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user1`
--
ALTER TABLE `user1`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
