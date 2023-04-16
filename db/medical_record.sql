-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Apr 2023 pada 04.19
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medical_record`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_cppt_n`
--

CREATE TABLE `form_cppt_n` (
  `id_cppt` int(11) NOT NULL,
  `visit_no` varchar(100) DEFAULT NULL,
  `mr_code` varchar(30) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` varchar(255) DEFAULT NULL,
  `ppa` varchar(255) DEFAULT NULL,
  `happ` varchar(255) DEFAULT NULL,
  `metode_asesmen` varchar(30) DEFAULT NULL,
  `soap_s` text DEFAULT NULL,
  `soap_o` text DEFAULT NULL,
  `soap_a` text DEFAULT NULL,
  `soap_p` text DEFAULT NULL,
  `intruksi_ppa` text DEFAULT NULL,
  `id_dokter_rujukan` varchar(255) DEFAULT NULL,
  `dokter_rujukan` varchar(255) DEFAULT NULL,
  `serah_terima` varchar(255) DEFAULT NULL,
  `penerima_id` varchar(255) DEFAULT NULL,
  `penerima` varchar(255) DEFAULT NULL,
  `penerima_ttd` text DEFAULT NULL,
  `penerima_time` varchar(30) DEFAULT NULL,
  `review_dpjp` varchar(255) DEFAULT NULL,
  `ttd_dpjp` text DEFAULT NULL,
  `dpjp_time` varchar(255) DEFAULT NULL,
  `dpjp_id` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `petugas_ttd` text DEFAULT NULL,
  `created_time` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `edited_by` varchar(255) DEFAULT NULL,
  `edited_time` datetime DEFAULT NULL,
  `is_deleted` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `form_cppt_n`
--

INSERT INTO `form_cppt_n` (`id_cppt`, `visit_no`, `mr_code`, `tanggal`, `jam`, `ppa`, `happ`, `metode_asesmen`, `soap_s`, `soap_o`, `soap_a`, `soap_p`, `intruksi_ppa`, `id_dokter_rujukan`, `dokter_rujukan`, `serah_terima`, `penerima_id`, `penerima`, `penerima_ttd`, `penerima_time`, `review_dpjp`, `ttd_dpjp`, `dpjp_time`, `dpjp_id`, `status`, `petugas_ttd`, `created_time`, `created_by`, `edited_by`, `edited_time`, `is_deleted`) VALUES
(6, 'I-00210083-001', '00210083', '2023-04-16', '08:49', 'Perawat', NULL, 'SOAP', '1', '2', '3', '4', '5', 'SRGHERY', NULL, 'Ya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'data:image/png;base64,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', '2023-04-16 08:51:40', 'IT', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_cppt_n_log`
--

CREATE TABLE `form_cppt_n_log` (
  `id` int(11) NOT NULL,
  `id_cppt` varchar(255) DEFAULT NULL,
  `visit_no` varchar(255) DEFAULT NULL,
  `metode_asesmen` text DEFAULT NULL,
  `tanggal` varchar(255) DEFAULT NULL,
  `jam` varchar(255) DEFAULT NULL,
  `soap_s` text DEFAULT NULL,
  `soap_o` text DEFAULT NULL,
  `soap_a` text DEFAULT NULL,
  `soap_p` text DEFAULT NULL,
  `intruksi_ppa` text DEFAULT NULL,
  `id_dokter_rujukan` varchar(255) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `user_code` text DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `form_cppt_n_log`
--

INSERT INTO `form_cppt_n_log` (`id`, `id_cppt`, `visit_no`, `metode_asesmen`, `tanggal`, `jam`, `soap_s`, `soap_o`, `soap_a`, `soap_p`, `intruksi_ppa`, `id_dokter_rujukan`, `status`, `user_code`, `time`) VALUES
(6, 'INSERT', 'I-00210083-001', 'SOAP', '2023-04-16', '08:49', '1', '2', '3', '4', '5', 'SRGHERY', '1', 'IT', '2023-04-16 08:51:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_formulir`
--

CREATE TABLE `mst_formulir` (
  `id` int(11) NOT NULL,
  `jenis` varchar(1) NOT NULL,
  `kode_formulir` varchar(128) NOT NULL,
  `nama_formulir` varchar(255) NOT NULL,
  `controller` varchar(255) NOT NULL,
  `table` varchar(128) NOT NULL,
  `field` varchar(128) NOT NULL,
  `content` varchar(128) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(128) NOT NULL,
  `deleted` varchar(128) DEFAULT NULL,
  `id_cabang` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mst_formulir`
--

INSERT INTO `mst_formulir` (`id`, `jenis`, `kode_formulir`, `nama_formulir`, `controller`, `table`, `field`, `content`, `status`, `created_date`, `created_by`, `deleted`, `id_cabang`) VALUES
(1, 'J', 'RM 003/Med/RSUE/Rev01', 'TRIASE DAN ASESMEN MEDIS GAWAT DARURAT', '', '', '', '', '1', '2023-03-29 14:26:23', 'admin', NULL, 1),
(2, 'I', 'RM 078/Med/RSUE/Rev01', 'SURAT PERINTAH RAWAT INAP', '', 'form_surat_perintah_ranap', '', 'formulir\\rsu-eshmun\\rawat-inap\\surat-perintah-ri', '1', '2023-03-29 14:26:23', 'admin', NULL, 1),
(3, 'I', 'RM 013/Med/RSUE', 'CATATAN PERKEMBANGAN PASIEN TERINTEGTASI', 'cppt', '', '', 'formulir\\rsu-eshmun\\rawat-inap\\cppt', '1', '2023-03-29 14:26:28', 'admin', NULL, 1),
(4, 'I', 'RM 026/Med/RSUE/Rev01', 'RESUME MEDIS RAWAT INAP', '', 'form_resume_medis_rawat_inap', 'terapi_pulang', 'formulir/rsu-eshmun/rawat-inap/resume-medis', '1', '2023-03-29 14:26:28', 'admin', NULL, 1),
(5, 'J', 'RM 025/Med/RSUE', 'RESUME MEDIS RAWAT JALAN', '', 'form_resume_medis_rawat_jalan', '', '', '1', '2023-03-29 14:37:42', 'admin', NULL, 1),
(6, 'I', 'RM 011/Med/RSUE', 'DAFTAR PEMBERIAN OBAT DI RUANG RAWAT INAP', '', '', '', '', '1', '2023-03-29 14:37:42', 'admin', NULL, 1),
(43, 'I', 'RM 079/Med/RSUE', 'FORM DISTRIBUSI OBAT PASIEN RAWAT INAP', '', '', '', '', '1', '2023-03-29 14:40:00', 'admin', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `form_cppt_n`
--
ALTER TABLE `form_cppt_n`
  ADD PRIMARY KEY (`id_cppt`);

--
-- Indeks untuk tabel `form_cppt_n_log`
--
ALTER TABLE `form_cppt_n_log`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mst_formulir`
--
ALTER TABLE `mst_formulir`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `form_cppt_n`
--
ALTER TABLE `form_cppt_n`
  MODIFY `id_cppt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `form_cppt_n_log`
--
ALTER TABLE `form_cppt_n_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `mst_formulir`
--
ALTER TABLE `mst_formulir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
