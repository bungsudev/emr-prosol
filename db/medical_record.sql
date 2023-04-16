-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Apr 2023 pada 03.59
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
-- Struktur dari tabel `cabang`
--

CREATE TABLE `cabang` (
  `id` int(11) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `keterangan` text NOT NULL,
  `license` varchar(128) NOT NULL,
  `expired_license` date NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `id_cabang` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cabang`
--

INSERT INTO `cabang` (`id`, `nama`, `keterangan`, `license`, `expired_license`, `created_date`, `id_cabang`) VALUES
(1, 'RSU ESHMUN', 'E MEDICAL RECORD RSU ESHMUN', '7DA9E328937436CECE59F3E595499', '2023-07-01', '2023-03-16 06:17:05', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_emr`
--

CREATE TABLE `data_emr` (
  `id` bigint(20) NOT NULL,
  `id_formulir` int(11) NOT NULL,
  `visit_no` varchar(15) NOT NULL,
  `data` mediumtext NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(128) NOT NULL,
  `deleted` varchar(128) DEFAULT NULL,
  `id_cabang` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dummy`
--

CREATE TABLE `dummy` (
  `id` int(11) NOT NULL,
  `kode_` varchar(128) NOT NULL,
  `nama_` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(128) NOT NULL,
  `deleted` varchar(128) DEFAULT NULL,
  `id_cabang` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dummy_form`
--

CREATE TABLE `dummy_form` (
  `visit_no` varchar(15) NOT NULL,
  `id_formulir` int(11) NOT NULL,
  `data` mediumtext NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(128) NOT NULL,
  `deleted` varchar(128) DEFAULT NULL,
  `id_cabang` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_cppt`
--

CREATE TABLE `form_cppt` (
  `id` int(11) NOT NULL,
  `visit_no` varchar(14) DEFAULT NULL,
  `mr_code` varchar(8) DEFAULT NULL,
  `tanggal` varchar(25) DEFAULT NULL,
  `pukul` varchar(25) DEFAULT NULL,
  `ppa` varchar(20) DEFAULT NULL,
  `happ` text NOT NULL,
  `metode_cppt` varchar(100) DEFAULT NULL,
  `input_1` text DEFAULT NULL,
  `input_2` text DEFAULT NULL,
  `input_3` text DEFAULT NULL,
  `input_4` text DEFAULT NULL,
  `input_5` text DEFAULT NULL,
  `intruksi_ppa` varchar(255) DEFAULT NULL,
  `serah_terima` varchar(255) DEFAULT NULL,
  `dokter_rujukan` varchar(50) DEFAULT NULL,
  `id_dpjp` varchar(50) DEFAULT NULL,
  `ttd_dpjp` text DEFAULT NULL,
  `nama_ttd` varchar(255) DEFAULT NULL,
  `ttd` text DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `deleted` int(1) DEFAULT NULL,
  `id_cabang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Struktur dari tabel `form_resume_medis_rawat_inap`
--

CREATE TABLE `form_resume_medis_rawat_inap` (
  `visit_no` varchar(15) NOT NULL,
  `mr_code` varchar(8) DEFAULT NULL,
  `tanggal_masuk` varchar(255) DEFAULT NULL,
  `tanggal_keluar` varchar(255) DEFAULT NULL,
  `ruang_rawat_akhir` varchar(255) DEFAULT NULL,
  `penanggung_pembayaran` varchar(255) DEFAULT NULL,
  `dpjp` varchar(255) DEFAULT NULL,
  `tim_dokter_pil` varchar(255) NOT NULL,
  `tim_dokter1` varchar(255) DEFAULT NULL,
  `tim_dokter2` varchar(255) DEFAULT NULL,
  `tim_dokter3` varchar(255) DEFAULT NULL,
  `tim_dokter4` varchar(255) DEFAULT NULL,
  `indikasi_dirawat` text DEFAULT NULL,
  `diagnosa_masuk` text DEFAULT NULL,
  `diagnosa_keluar` text DEFAULT NULL,
  `diagnosa_sekunder` text DEFAULT NULL,
  `penyebab_kematian` text DEFAULT NULL,
  `pemeriksaan_fisik` text DEFAULT NULL,
  `laboratorium` text DEFAULT NULL,
  `radiologi` text DEFAULT NULL,
  `penunjang_lain` text DEFAULT NULL,
  `tindakan` text DEFAULT NULL,
  `pengobatan` text DEFAULT NULL,
  `kondisi_pulang` varchar(255) NOT NULL,
  `keterangan_pulang` text NOT NULL,
  `intruksi_lanjutan` text DEFAULT NULL,
  `diet` text DEFAULT NULL,
  `tgl_kontrol_ulang` text DEFAULT NULL,
  `latihan` text DEFAULT NULL,
  `diklinik_spesialis` text DEFAULT NULL,
  `kembali_ke_igd` text DEFAULT NULL,
  `rumah_sakit` text DEFAULT NULL,
  `terapi_pulang` text NOT NULL,
  `nama_ttd` varchar(255) NOT NULL,
  `ttd` text NOT NULL,
  `status` varchar(15) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_time` datetime NOT NULL,
  `edited_by` varchar(255) NOT NULL,
  `edited_time` datetime NOT NULL,
  `wajib` varchar(11) NOT NULL,
  `tidak_lengkap` text NOT NULL,
  `id_cabang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `form_resume_medis_rawat_inap`
--

INSERT INTO `form_resume_medis_rawat_inap` (`visit_no`, `mr_code`, `tanggal_masuk`, `tanggal_keluar`, `ruang_rawat_akhir`, `penanggung_pembayaran`, `dpjp`, `tim_dokter_pil`, `tim_dokter1`, `tim_dokter2`, `tim_dokter3`, `tim_dokter4`, `indikasi_dirawat`, `diagnosa_masuk`, `diagnosa_keluar`, `diagnosa_sekunder`, `penyebab_kematian`, `pemeriksaan_fisik`, `laboratorium`, `radiologi`, `penunjang_lain`, `tindakan`, `pengobatan`, `kondisi_pulang`, `keterangan_pulang`, `intruksi_lanjutan`, `diet`, `tgl_kontrol_ulang`, `latihan`, `diklinik_spesialis`, `kembali_ke_igd`, `rumah_sakit`, `terapi_pulang`, `nama_ttd`, `ttd`, `status`, `created_by`, `created_time`, `edited_by`, `edited_time`, `wajib`, `tidak_lengkap`, `id_cabang`) VALUES
('I-00021498-005', '00021498', '2023-04-09', '', '', '', 'Dr. dr. Binarwan Halim, M.Ked(OG), M.K.M, Sp.OG(K), FICS', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'IT TES', 'data:image/png;base64,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', 'created', 'IT', '2023-04-09 06:34:48', '', '0000-00-00 00:00:00', '0', 'tanggal_keluar,ruang_rawat_akhir,penanggung_pembayaran,tim_dokter2,tim_dokter3,tim_dokter4,indikasi_dirawat,diagnosa_masuk,diagnosa_keluar,diagnosa_sekunder,penyebab_kematian,pemeriksaan_fisik,laboratorium,radiologi,penunjang_lain,tindakan,pengobatan,keterangan_pulang,intruksi_lanjutan,diet,tgl_kontrol_ulang,latihan,diklinik_spesialis,kembali_ke_igd,rumah_sakit', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_surat_perintah_ranap`
--

CREATE TABLE `form_surat_perintah_ranap` (
  `visit_no` varchar(14) NOT NULL,
  `mr_code` varchar(8) DEFAULT NULL,
  `nama_penanda` varchar(255) DEFAULT NULL,
  `alamat_penanda` text DEFAULT NULL,
  `norm` varchar(8) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `diagnosa` text DEFAULT NULL,
  `indikasi` varchar(255) DEFAULT NULL,
  `faskes_perujuk_pil` varchar(255) DEFAULT NULL,
  `faskes_perujuk1` varchar(255) DEFAULT NULL,
  `faskes_perujuk2` varchar(255) DEFAULT NULL,
  `nama_ttd` varchar(255) DEFAULT NULL,
  `ttd` text DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `edited_by` varchar(255) DEFAULT NULL,
  `edited_time` datetime DEFAULT NULL,
  `wajib` varchar(1) DEFAULT NULL,
  `tidak_lengkap` text DEFAULT NULL,
  `id_cabang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_data`
--

CREATE TABLE `log_data` (
  `id` bigint(20) NOT NULL,
  `log` text DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `job` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `log_data`
--

INSERT INTO `log_data` (`id`, `log`, `date`, `job`) VALUES
(286, NULL, '2023-04-09 06:58:45', 'Detail Pasien Error'),
(287, NULL, '2023-04-09 06:58:45', 'Detail Pasien Error'),
(288, NULL, '2023-04-09 06:58:46', 'Detail Pasien Error'),
(289, NULL, '2023-04-09 06:58:46', 'Detail Pasien Error'),
(290, NULL, '2023-04-09 06:58:47', 'Detail Pasien Error'),
(291, NULL, '2023-04-09 06:59:06', 'Detail Pasien Error'),
(292, NULL, '2023-04-09 06:59:07', 'Detail Pasien Error'),
(293, NULL, '2023-04-09 06:59:07', 'Detail Pasien Error'),
(294, NULL, '2023-04-09 06:59:07', 'Detail Pasien Error'),
(295, NULL, '2023-04-09 06:59:08', 'Detail Pasien Error'),
(296, NULL, '2023-04-09 06:59:40', 'Detail Pasien Error'),
(297, NULL, '2023-04-09 06:59:41', 'Detail Pasien Error'),
(298, NULL, '2023-04-09 06:59:41', 'Detail Pasien Error'),
(299, NULL, '2023-04-09 06:59:42', 'Detail Pasien Error'),
(300, NULL, '2023-04-09 06:59:42', 'Detail Pasien Error'),
(301, NULL, '2023-04-09 06:59:59', 'Detail Pasien Error'),
(302, NULL, '2023-04-09 07:00:00', 'Detail Pasien Error'),
(303, NULL, '2023-04-09 07:00:01', 'Detail Pasien Error'),
(304, NULL, '2023-04-09 07:00:01', 'Detail Pasien Error'),
(305, NULL, '2023-04-09 07:00:02', 'Detail Pasien Error'),
(306, NULL, '2023-04-09 07:01:45', 'Detail Pasien Error'),
(307, NULL, '2023-04-09 07:01:46', 'Detail Pasien Error'),
(308, NULL, '2023-04-09 07:01:47', 'Detail Pasien Error'),
(309, NULL, '2023-04-09 07:01:47', 'Detail Pasien Error'),
(310, NULL, '2023-04-09 07:01:47', 'Detail Pasien Error');

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_menu`
--

CREATE TABLE `mst_menu` (
  `id` int(11) NOT NULL,
  `kode_menu` varchar(128) NOT NULL,
  `struktur_menu` text NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(128) NOT NULL,
  `deleted` varchar(128) DEFAULT NULL,
  `id_cabang` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mst_menu`
--

INSERT INTO `mst_menu` (`id`, `kode_menu`, `struktur_menu`, `status`, `created_date`, `created_by`, `deleted`, `id_cabang`) VALUES
(1, 'EMR-ESHMUN', '{\r\n    \"menu\": [{\r\n        \"title\": null,\r\n        \"akses\": [\"ALL\"],\r\n        \"sub_menu\": [{\r\n            \"nama_sub_menu\": \"Dashboard\",\r\n            \"icon\": \"<i class=\'icon-Layout-4-blocks\'><span class=\'path1\'></span><span class=\'path2\'></span></i>\",\r\n            \"link\": \"dashboard\",\r\n            \"akses\": [\"ALL\"]\r\n        }]\r\n    },{\r\n        \"title\": \"REKAM MEDIS\",\r\n        \"akses\": [\"USER\",\"DOKTER\",\"NUR\"],\r\n        \"sub_menu\": [{\r\n            \"nama_sub_menu\": \"Formulir Rekam Medis\",\r\n            \"icon\": \"<i class=\'icon-File\'><span class=\'path1\'></span><span class=\'path2\'></span></i>\",\r\n            \"link\": \"formulir\",\r\n            \"akses\": [\"USER\",\"DOKTER\",\"NUR\"]\r\n        }, {\r\n            \"nama_sub_menu\": \"Status Rekam Medis\",\r\n            \"icon\": \"<i class=\'mdi mdi-book\'><span class=\'path1\'></span><span class=\'path2\'></span></i>\",\r\n            \"link\": \"status-rekam-medis\",\r\n            \"akses\": [\"USER\",\"DOKTER\",\"NUR\"]\r\n        }]\r\n    },\r\n    {\r\n        \"title\": \"LIST PASIEN\",\r\n        \"akses\": [\"USER\",\"DOKTER\",\"NUR\"],\r\n        \"sub_menu\": [{\r\n            \"nama_sub_menu\": \"Rawat Jalan\",\r\n            \"icon\": \"<i class=\'icon-Clipboard\'><span class=\'path1\'></span><span class=\'path2\'></span></i>\",\r\n            \"link\": \"daftar-pasien/rawat-jalan\",\r\n            \"akses\": [\"USER\",\"DOKTER\",\"NUR\"]\r\n        }, {\r\n            \"nama_sub_menu\": \"Rawat Inap\",\r\n            \"icon\": \"<i class=\'icon-Clipboard\'><span class=\'path1\'></span><span class=\'path2\'></span></i>\",\r\n            \"link\": \"daftar-pasien/rawat-inap\",\r\n            \"akses\": [\"USER\",\"DOKTER\",\"NUR\"]\r\n        }]\r\n    }]\r\n}', '1', '2023-03-29 17:06:14', 'azmi', NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_role`
--

CREATE TABLE `mst_role` (
  `id` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `id_cabang` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mst_role`
--

INSERT INTO `mst_role` (`id`, `keterangan`, `id_cabang`) VALUES
('ALL', 'FULL ACCESS', 1),
('DOKTER', 'dokter', 1),
('IT', 'administrator', 1),
('NUR', 'perawat', 1),
('USER', 'admin operator', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `nama_rs` varchar(255) DEFAULT NULL,
  `spesialisasi` varchar(255) NOT NULL,
  `no_sip` varchar(128) NOT NULL,
  `alamat` text DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telepon` varchar(25) DEFAULT NULL,
  `link_maps` longtext DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `gambar_logo` varchar(255) DEFAULT NULL,
  `gambar_logo_2` varchar(255) NOT NULL,
  `favicon` varchar(255) NOT NULL,
  `foto_dokter` varchar(300) NOT NULL,
  `viewer` bigint(20) NOT NULL DEFAULT 0,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_cabang` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `settings`
--

INSERT INTO `settings` (`id`, `nama_rs`, `spesialisasi`, `no_sip`, `alamat`, `email`, `telepon`, `link_maps`, `facebook`, `youtube`, `twitter`, `instagram`, `gambar_logo`, `gambar_logo_2`, `favicon`, `foto_dokter`, `viewer`, `date_modified`, `id_cabang`) VALUES
(1, ' RUMAH SAKIT UMUM ESHMUN', 'Rumah Sakit Umum', '-', 'Jl. Marelan Raya no. 173 A <br />\r\nMedan 20245 - Indonesia <br />\r\nTelp : (061) 88818000, (061) 88818282 <br />\r\nEmail : eshmunhospital@yahoo.com', '', '0812-6451-0888', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15928.304451250508!2d98.63788182379304!3d3.569963107605557!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30312f8c0e00688f%3A0x756c00baa0124311!2sDr.%20Milvan%20Hado%2C%20SpOG!5e0!3m2!1sid!2sid!4v1672297301090!5m2!1sid!2sid', '', '', '', '', 'eshmun-banner.jpeg', 'logo.png', 'favicon.ico', 'avatar-13.png', 19, '2021-05-02 11:16:49', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `template`
--

CREATE TABLE `template` (
  `id_template` int(11) DEFAULT NULL,
  `id_form` int(11) DEFAULT NULL,
  `field` text DEFAULT NULL,
  `nama` text DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_date` varchar(255) DEFAULT NULL,
  `edited_by` varchar(255) DEFAULT NULL,
  `edited_date` varchar(255) DEFAULT NULL,
  `deleted_by` varchar(255) DEFAULT NULL,
  `deleted_date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `template`
--

INSERT INTO `template` (`id_template`, `id_form`, `field`, `nama`, `isi`, `created_by`, `created_date`, `edited_by`, `edited_date`, `deleted_by`, `deleted_date`) VALUES
(NULL, 7, 'soap_s', 'test', 'Ini tempate test', 'IT', '2023-04-16 04:18:46', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_emr`
--
ALTER TABLE `data_emr`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dummy`
--
ALTER TABLE `dummy`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dummy_form`
--
ALTER TABLE `dummy_form`
  ADD PRIMARY KEY (`visit_no`);

--
-- Indeks untuk tabel `form_cppt`
--
ALTER TABLE `form_cppt`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `form_resume_medis_rawat_inap`
--
ALTER TABLE `form_resume_medis_rawat_inap`
  ADD PRIMARY KEY (`visit_no`);

--
-- Indeks untuk tabel `form_surat_perintah_ranap`
--
ALTER TABLE `form_surat_perintah_ranap`
  ADD PRIMARY KEY (`visit_no`);

--
-- Indeks untuk tabel `log_data`
--
ALTER TABLE `log_data`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mst_formulir`
--
ALTER TABLE `mst_formulir`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mst_menu`
--
ALTER TABLE `mst_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mst_role`
--
ALTER TABLE `mst_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cabang`
--
ALTER TABLE `cabang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `form_cppt`
--
ALTER TABLE `form_cppt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
-- AUTO_INCREMENT untuk tabel `log_data`
--
ALTER TABLE `log_data`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=311;

--
-- AUTO_INCREMENT untuk tabel `mst_formulir`
--
ALTER TABLE `mst_formulir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `mst_menu`
--
ALTER TABLE `mst_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
