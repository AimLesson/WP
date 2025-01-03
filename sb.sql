-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 03 Jan 2025 pada 07.30
-- Versi server: 10.6.18-MariaDB-0ubuntu0.22.04.1
-- Versi PHP: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangs`
--

CREATE TABLE `barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_barcode` varchar(255) DEFAULT NULL,
  `no_item` varchar(255) DEFAULT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `kd_akun` varchar(255) NOT NULL,
  `kode_log` varchar(255) NOT NULL,
  `kd_unit` varchar(255) DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `rak` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_minimal` int(11) NOT NULL,
  `jumlah_maksimal` int(11) NOT NULL,
  `no_katalog` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `no_akun` varchar(255) DEFAULT NULL,
  `no_reff` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barangs`
--

INSERT INTO `barangs` (`id`, `no_barcode`, `no_item`, `nama_barang`, `kd_akun`, `kode_log`, `kd_unit`, `jumlah`, `satuan`, `harga`, `rak`, `total`, `tanggal`, `jumlah_minimal`, `jumlah_maksimal`, `no_katalog`, `merk`, `no_akun`, `no_reff`, `created_at`, `updated_at`) VALUES
(14, 'SB-P8DZlOe6', '131120-GHP-1003', 'tes 1', '131120', 'GHP', NULL, 600, 'm', 40000, 'a', 24000000, '2024-08-13', 100, 500, 'a', 'mnc', '123', '989123123', '2024-08-13 10:24:56', '2024-10-13 12:55:56'),
(15, 'SB-p9s7xzR8', '135120-GBBM-1001', 'bensin pertamax', '135120', 'GBBM', NULL, 957, 'ltr', 35000, 'b', 33495000, '2024-08-13', 500, 1000, '9099', 'pertamina', '123', '989123123', '2024-08-13 14:13:48', '2024-10-13 13:01:21'),
(16, 'SB-tb0yokoA', '131120-MSH-1004', 'SPCC 0,8', '131120', 'MSH', NULL, 9830, 'kg', 15000, 'GB', 147450000, '2024-08-13', 10000, 50000, 'coba 1', 'WILTAM', 'coba 1', 'coba 1', '2024-08-13 14:16:57', '2024-12-06 08:56:19'),
(17, 'SB-lTzwB4Na', '136310-BSPL-1005', 'packing kardus', '136310', 'BSPL', NULL, 1490, 'pcs', 50000, 'a', 74500000, '2024-08-16', 1000, 5000, '-', 'mnc', NULL, '-', '2024-08-16 01:34:32', '2024-08-21 01:38:19'),
(18, 'SB-lFceBud4', '131110-G-1006', 'INSERT ZTFD0303-MG/YBG302', '136100', 'B', NULL, 1, 'pcs', 85000, '1', 85000, '2024-08-19', 1, 10, '-', 'ZCC-CT', NULL, '-', '2024-08-20 14:17:28', '2024-08-21 09:37:37'),
(19, 'SB-UnCAhYCo', '131110-G-1007', 'Pipa ⌀ 10', '131110', 'G', NULL, 35, 'btg', 30000, '-', 1050000, '2024-08-21', 20, 200, '-', 'Vention', NULL, '-', '2024-08-21 09:28:24', '2024-08-22 13:35:21'),
(21, 'SB-VJVb7gDd', '131210-M-B-0001', 'BAUT BAJA IMBUS M 6 X 25 - A', '131210', 'B', NULL, 416, 'pcs', 405840, 'A-9', 168829440, '2024-05-31', 10, 20, '-', '-', '-', '-', NULL, '2024-12-06 09:00:57'),
(22, 'SB-ezyzuSX9', '131210-M-B-0002', 'CIRCLIP FOR SHAFT ? 19', '131210', 'B', NULL, 74, 'pcs', 99900, 'B-5', 7392600, '2024-05-31', 20, 30, '-', '-', '-', '-', NULL, '2024-08-22 22:26:10'),
(23, 'SB-UpLgod3H', '131210-M-B-0003', 'BAUT MS HEX M 12 X 60', '131210', 'B', NULL, 38, 'pcs', 169600, 'A-5', 6444800, '2024-05-31', 10, 20, '-', '-', '-', '-', NULL, '2024-10-14 14:35:57'),
(24, 'SB-Edxz9MKV', '131210-M-B-0004', 'DOWEL PIN ? 6 X 10', '131210', 'B', NULL, 14, 'pcs', 72464, 'C', 1376816, '2024-05-31', 5, 15, '-', '-', '-', '-', NULL, '2024-08-22 22:30:23'),
(25, 'SB-NFeMM48n', '131210-M-B-0005', 'BALL PLUNGER M6 X 13', '131210', 'B', NULL, 11, 'pcs', 214280, 'B', 2357080, '2024-05-31', 0, 10, '-', 'LOKAL', '-', '-', NULL, '2024-08-22 22:26:10'),
(26, 'SB-UuurLhIr', '131210-M-B-0006', 'SCRAPER SIZE 2\" - VIPER', '131210', 'B', NULL, 4, 'pcs', 26668, 'OFFCAB', 106672, '2024-05-31', 1, 11, '-', 'VIPER', '-', '-', NULL, '2024-08-22 22:26:10'),
(27, 'SB-BMWvCWq7', '131210-M-B-0007', 'BAUT MS HEX M 12 X 70', '131210', 'B', NULL, 1, 'pcs', 1100, 'A-5', 1100, '2024-05-31', 10, 20, '-', '-', '-', '-', NULL, '2024-08-22 22:26:10'),
(28, 'SB-O3uBv9jo', '131210-M-B-0008', 'BAUT MS HEX M 12 X110', '131210', 'B', NULL, 133, 'pcs', 159600, 'A-5', 21226800, '2024-05-31', 50, 60, '-', '-', '-', '-', NULL, '2024-08-22 22:26:10'),
(29, 'SB-OUzhjSde', '131210-M-B-0009', 'BAUT MS HEX M 12 X125', '131210', 'B', NULL, 1, 'pcs', 1250, 'A-5', 1250, '2024-05-31', 10, 20, '-', '-', '-', '-', NULL, '2024-08-22 22:26:10'),
(30, 'SB-lA52e4lz', '131210-M-B-0010', 'BAUT MS JF M 3 X 06', '131210', 'B', NULL, 20, 'pcs', 2000, 'A-3', 40000, '2024-05-31', 10, 20, '-', '-', '-', '-', NULL, '2024-08-22 22:26:10'),
(31, 'SB-gmfqSprL', '131110-M-A-0001', '705 Ã˜ 40', '131110', 'A', NULL, 0, 'm', 488298, 'F25', 0, '2024-05-31', 1, 5, '-', '-', '-', '-', NULL, '2024-08-22 22:26:10'),
(32, 'SB-hcBwAh4f', '131110-M-A-0002', 'SPRING STEEL # 08 x 200', '131110', 'A', NULL, 1, 'm', 738000, 'F25', 671580, '2024-05-31', 1, 5, '-', '-', '-', '-', NULL, '2024-08-22 22:26:10'),
(33, 'SB-8JGm7bZN', '131110-M-A-0003', 'ALLUMINIUM 5052 # 10 x 1200 x 2400', '131110', 'A', NULL, 0, 'pcs', 6100000, 'F25', 0, '2024-05-31', 1, 5, '-', '-', '-', '-', NULL, '2024-08-22 22:26:10'),
(34, 'SB-vy3aKUaE', '131110-M-A-0004', 'MS # 10 x 1200 x 2400', '131110', 'A', NULL, 0, 'pcs', 3355000, 'F25', 0, '2024-05-31', 1, 5, '-', '-', '-', '-', NULL, '2024-08-22 22:26:10'),
(35, 'SB-ym7Zi8S7', '131110-M-A-0005', 'ALLUMINIUM 7075 # 50 x 50', '131110', 'A', NULL, 0, 'm', 1006200, 'F25', 30186, '2024-05-31', 1, 5, '-', '-', '-', '-', NULL, '2024-08-22 22:26:10'),
(36, 'SB-rTN71yM4', '131110-M-A-0006', 'SUS 304 STRIP 10 x 20', '131110', 'A', NULL, 32, 'm', 100000, 'F25', 3210000, '2024-05-31', 1, 5, '-', '-', '-', '-', NULL, '2024-08-22 22:26:10'),
(37, 'SB-nhFST8r4', '131110-M-A-0007', 'POM PUTIH ? 90', '131110', 'A', NULL, 20, 'm', 1630000, 'F25', 326000, '2024-05-31', 1, 5, '-', '-', '-', '-', NULL, '2024-08-22 22:26:10'),
(38, 'SB-k2yRWwOI', '131110-M-A-0008', 'BRONZE AB2 ? 40', '131110', 'A', NULL, 5, 'm', 4200000, 'F25', 0, '2024-05-31', 1, 5, '-', '-', '-', '-', NULL, '2024-08-22 22:26:10'),
(39, 'SB-freEXuYH', '131110-M-A-0009', 'VCN ? 90', '131110', 'A', NULL, 4, 'm', 2923200, 'F25', 847728, '2024-05-31', 1, 5, '-', '-', '-', '-', NULL, '2024-08-22 22:26:10'),
(40, 'SB-34W2IRen', '131110-M-A-0010', 'STST PIPE 316 ? 3/4\" SCH 40', '131110', 'A', NULL, 3, 'm', 356666, 'F25', 998665, '2024-05-31', 1, 5, '-', '-', '-', '-', NULL, '2024-08-22 22:26:10'),
(41, 'SB-vfbHHp9Z', '131120-M-G-0001', 'KAYU HARDBOARD 3 X 125 X 25', '131120', 'G', NULL, 500, 'pcs', 750, '-', 375000, '2024-05-31', 0, 0, '-', '-', '-', '-', NULL, '2024-08-22 22:26:10'),
(42, 'SB-VHcm3WZD', '131120-M-G-0002', 'KAYU TOP TABLE # 20 X 1200 X 2400 HPL PUTIH. LIST PVC', '131120', 'G', NULL, 1, 'pcs', 1348650, '-', 1348650, '2024-05-31', 0, 0, '-', '-', '-', '-', NULL, '2024-10-16 09:00:02'),
(43, 'SB-wmLKZaym', '131120-M-G-0003', 'KAYU WOOD WORKING WB ( 1778 X 686 X 965 mm ) W/BENCH VICE CLAMP 7.5\"', '131120', 'G', NULL, 0, 'pcs', 6049500, '-', 0, '2024-05-31', 0, 0, '-', '-', '-', '-', NULL, '2024-08-22 22:26:10'),
(44, 'SB-PV6zo3OK', '131120-M-G-0003', 'KAYU BANGKU KANTIN Plywood+HDMR+HPL TH321H+List jati 5mm #1800x350x20 DRW 3', '131120', 'G', NULL, 0, 'pcs', 996502, '-', 0, '2024-05-31', 0, 0, '-', '-', '-', '-', NULL, '2024-08-22 22:26:10'),
(45, 'SB-Yc92bdj1', '131120-M-G-0004', 'RODA ALMARI ALPHA Dia 19 mm', '131120', 'G', NULL, 232, 'set', 3000, '-', 696000, '2024-05-31', 0, 0, '-', '-', '-', '-', NULL, '2024-08-22 22:26:10'),
(46, 'SB-beNPgK3D', '131120-M-G-0005', '317220 REL HUBEN SD-12 TOP 3 U', '131120', 'G', NULL, 4, 'btg', 27750, '-', 111000, '2024-05-31', 0, 0, '-', '-', '-', '-', NULL, '2024-08-22 22:26:10'),
(47, 'SB-RI3Wd022', '131120-M-G-0006', '317216 REL HUBEN SD-12 BOTOM 3M', '131120', 'G', NULL, 4, 'btg', 27750, '-', 111000, '2024-05-31', 0, 0, '-', '-', '-', '-', NULL, '2024-08-22 22:26:10'),
(48, 'SB-y2VWkWZd', '131120-M-G-0007', 'KACA CLEAR # 6MM X 849CM X 1630 CM + LUBANG 4 BUAH GOSOK BATU', '131120', 'G', NULL, 0, 'lbr', 397300, '-', 0, '2024-05-31', 0, 0, '-', '-', '-', '-', NULL, '2024-08-22 22:26:10'),
(49, 'SB-igSX5qVw', '131120-M-G-0008', 'Playwood 275 x 400 x 25 Radius Sudut R10mm. LIST DUCO CREAM. FINISHING CLEA', '131120', 'G', NULL, 0, 'pcs', 119300, '-', 0, '2024-05-31', 0, 0, '-', '-', '-', '-', NULL, '2024-08-22 22:26:10'),
(50, 'SB-cfu68Ro1', '131120-M-G-0009', 'KAYU SANDARAN MULTIPROPUSE FOLDING 333353', '131120', 'G', NULL, 0, 'pcs', 44400, '-', 0, '2024-05-31', 0, 0, '-', '-', '-', '-', NULL, '2024-08-22 22:26:10'),
(51, 'SB-ruJWzP5q', '131110-umum-1008', 'pc', '131110', 'umum', NULL, 10, 'pcs', 35000, 'a', 350000, '2024-08-23', 100, 1000, '-', 'mnc', NULL, '-', '2024-08-23 13:28:23', '2024-08-23 13:28:23'),
(52, 'SB-VxCsml8B', '131210-M-B-0011', 'Barang 1', '131210', 'B', NULL, 456, 'pcs', 405840, 'A-9', 185063040, '2024-05-31', 10, 20, '-', '-', '-', '-', '2024-08-23 16:20:03', '2024-08-23 16:20:03'),
(53, 'SB-v9BZJZ9x', '131210-M-B-0012', 'Barang 2', '131210', 'B', NULL, 74, 'pcs', 99900, 'B-5', 7392600, '2024-05-31', 20, 30, '-', '-', '-', '-', '2024-08-23 16:20:03', '2024-08-23 16:20:03'),
(54, 'SB-DYpA3gBu', '131210-M-B-0013', 'Barang 3', '131210', 'B', NULL, 53, 'pcs', 169600, 'A-5', 8988800, '2024-05-31', 10, 20, '-', '-', '-', '-', '2024-08-23 16:20:03', '2024-08-23 16:20:03'),
(55, 'SB-EO8mWsWh', '131210-M-B-0014', 'Barang 4', '131210', 'B', NULL, 14, 'pcs', 72464, 'C', 1014496, '2024-05-31', 5, 15, '-', '-', '-', '-', '2024-08-23 16:20:03', '2024-08-23 16:20:03'),
(56, 'SB-2MFEyEKJ', '131210-M-B-0015', 'Barang 5', '131210', 'B', NULL, 11, 'pcs', 214280, 'B', 2357080, '2024-05-31', 0, 10, '-', 'LOKAL', '-', '-', '2024-08-23 16:20:03', '2024-08-23 16:20:03'),
(57, 'SB-3mmD0jrB', '131210-M-B-0016', 'Barang 6', '131210', 'B', NULL, 4, 'pcs', 26668, 'OFFCAB ', 106672, '2024-05-31', 1, 11, '-', 'VIPER', '-', '-', '2024-08-23 16:20:03', '2024-08-23 16:20:03'),
(58, 'SB-xiuDF41S', '131210-M-B-0017', 'Barang 7', '131210', 'B', NULL, 1, 'pcs', 1100, 'A-5', 1100, '2024-05-31', 10, 20, '-', '-', '-', '-', '2024-08-23 16:20:03', '2024-08-23 16:20:03'),
(59, 'SB-9BsZlCk1', '131210-M-B-0018', 'Barang 8', '131210', 'B', NULL, 133, 'pcs', 159600, 'A-5', 21226800, '2024-05-31', 50, 60, '-', '-', '-', '-', '2024-08-23 16:20:03', '2024-08-23 16:20:03'),
(60, 'SB-jAwkPOLL', '131210-M-B-0019', 'Barang 9', '131210', 'B', NULL, 1, 'pcs', 1250, 'A-5', 1250, '2024-05-31', 10, 20, '-', '-', '-', '-', '2024-08-23 16:20:03', '2024-08-23 16:20:03'),
(61, 'SB-wo3y7kCq', '131210-M-B-0020', 'Barang 10', '131210', 'B', NULL, 20, 'pcs', 2000, 'A-3', 40000, '2024-05-31', 10, 20, '-', '-', '-', '-', '2024-08-23 16:20:03', '2024-08-23 16:20:03'),
(62, 'SB-ym5B5axO', '131110-M-A-0011', 'Barang 11', '131110', 'A', NULL, 0, 'm', 488298, 'F25', 0, '2024-05-31', 1, 5, '-', '-', '-', '-', '2024-08-23 16:20:03', '2024-08-23 16:20:03'),
(63, 'SB-qdxinqlE', '131110-M-A-0012', 'Barang 12', '131110', 'A', NULL, 1, 'm', 738000, 'F25', 671580, '2024-05-31', 1, 5, '-', '-', '-', '-', '2024-08-23 16:20:03', '2024-08-23 16:20:03'),
(64, 'SB-1sYj774w', '131110-M-A-0013', 'Barang 13', '131110', 'A', NULL, 0, 'pcs', 6100000, 'F25', 0, '2024-05-31', 1, 5, '-', '-', '-', '-', '2024-08-23 16:20:03', '2024-08-23 16:20:03'),
(65, 'SB-NwsMfZXW', '131110-M-A-0014', 'Barang 14', '131110', 'A', NULL, 0, 'pcs', 3355000, 'F25', 0, '2024-05-31', 1, 5, '-', '-', '-', '-', '2024-08-23 16:20:03', '2024-08-23 16:20:03'),
(66, 'SB-viVdBQu7', '131110-M-A-0015', 'Barang 15', '131110', 'A', NULL, 0, 'm', 1006200, 'F25', 30186, '2024-05-31', 1, 5, '-', '-', '-', '-', '2024-08-23 16:20:03', '2024-08-23 16:20:03'),
(67, 'SB-ma3DjRO9', '131110-M-A-0016', 'Barang 16', '131110', 'A', NULL, 32, 'm', 100000, 'F25', 3210000, '2024-05-31', 1, 5, '-', '-', '-', '-', '2024-08-23 16:20:03', '2024-08-23 16:20:03'),
(68, 'SB-aMD2CjfX', '131110-M-A-0017', 'Barang 17', '131110', 'A', NULL, 20, 'm', 1630000, 'F25', 326000, '2024-05-31', 1, 5, '-', '-', '-', '-', '2024-08-23 16:20:03', '2024-08-23 16:20:03'),
(69, 'SB-D4DB98XB', '131110-M-A-0018', 'Barang 18', '131110', 'A', NULL, 5, 'm', 4200000, 'F25', 0, '2024-05-31', 1, 5, '-', '-', '-', '-', '2024-08-23 16:20:03', '2024-08-23 16:20:03'),
(70, 'SB-J697fYrL', '131110-M-A-0019', 'Barang 19', '131110', 'A', NULL, 4, 'm', 2923200, 'F25', 847728, '2024-05-31', 1, 5, '-', '-', '-', '-', '2024-08-23 16:20:03', '2024-08-23 16:20:03'),
(71, 'SB-yQPqSkMC', '131110-M-A-0020', 'Barang 20', '131110', 'A', NULL, 3, 'm', 356666, 'F25', 998665, '2024-05-31', 1, 5, '-', '-', '-', '-', '2024-08-23 16:20:03', '2024-08-23 16:20:03'),
(72, 'SB-wHW4PCyh', '131120-W-G-0010', 'Barang 21', '131120', 'G', NULL, 500, 'pcs', 750, '-', 375000, '2024-05-31', 0, 0, '-', '-', '-', '-', '2024-08-23 16:20:03', '2024-08-23 16:20:03'),
(73, 'SB-H1rbqJuG', '131120-W-G-0011', 'Barang 22', '131120', 'G', NULL, 2, 'pcs', 1348650, '-', 2697300, '2024-05-31', 0, 0, '-', '-', '-', '-', '2024-08-23 16:20:03', '2024-08-23 16:20:03'),
(74, 'SB-W8NehIvH', '131120-W-G-0012', 'Barang 23', '131120', 'G', NULL, 0, 'pcs', 6049500, '-', 0, '2024-05-31', 0, 0, '-', '-', '-', '-', '2024-08-23 16:20:03', '2024-08-23 16:20:03'),
(75, 'SB-5glaevdn', '131120-W-G-0013', 'Barang 24', '131120', 'G', NULL, 0, 'pcs', 996502, '-', 0, '2024-05-31', 0, 0, '-', '-', '-', '-', '2024-08-23 16:20:03', '2024-08-23 16:20:03'),
(76, 'SB-9Joe4FAt', '131120-W-G-0014', 'Barang 25', '131120', 'G', NULL, 232, 'set', 3000, '-', 696000, '2024-05-31', 0, 0, '-', '-', '-', '-', '2024-08-23 16:20:03', '2024-08-23 16:20:03'),
(77, 'SB-wOD2Wkex', '131120-W-G-0015', 'Barang 26', '131120', 'G', NULL, 4, 'btg', 27750, '-', 111000, '2024-05-31', 0, 0, '-', '-', '-', '-', '2024-08-23 16:20:03', '2024-08-23 16:20:03'),
(78, 'SB-XA6ImCqo', '131120-W-G-0016', 'Barang 27', '131120', 'G', NULL, 4, 'btg', 27750, '-', 111000, '2024-05-31', 0, 0, '-', '-', '-', '-', '2024-08-23 16:20:03', '2024-08-23 16:20:03'),
(79, 'SB-qp3Oihus', '131120-W-G-0017', 'Barang 28', '131120', 'G', NULL, 0, 'lbr', 397300, '-', 0, '2024-05-31', 0, 0, '-', '-', '-', '-', '2024-08-23 16:20:03', '2024-08-23 16:20:03'),
(80, 'SB-aBFkMx5I', '131120-W-G-0018', 'Barang 29', '131120', 'G', NULL, 0, 'pcs', 119300, '-', 0, '2024-05-31', 0, 0, '-', '-', '-', '-', '2024-08-23 16:20:03', '2024-08-23 16:20:03'),
(81, 'SB-5wwuHg0J', '131120-W-G-0019', 'Barang 30', '131120', 'G', NULL, 0, 'pcs', 44400, '-', 0, '2024-05-31', 0, 0, '-', '-', '-', '-', '2024-08-23 16:20:03', '2024-08-23 16:20:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_logs`
--

CREATE TABLE `barang_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `barang_id` bigint(20) UNSIGNED NOT NULL,
  `no_barang` varchar(255) NOT NULL,
  `kd_log` varchar(255) NOT NULL,
  `action` enum('entry','exit') NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_number` varchar(255) DEFAULT NULL,
  `no_item` varchar(255) DEFAULT NULL,
  `operator` varchar(255) DEFAULT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `no_po` varchar(255) DEFAULT NULL,
  `harga` varchar(255) DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barang_logs`
--

INSERT INTO `barang_logs` (`id`, `barang_id`, `no_barang`, `kd_log`, `action`, `quantity`, `created_at`, `updated_at`, `order_number`, `no_item`, `operator`, `satuan`, `no_po`, `harga`, `jenis`) VALUES
(61, 14, '', '', 'exit', 5, '2024-08-13 13:43:51', '2024-08-13 13:43:51', '24-1234-M7', '2', 'asep', 'm', NULL, NULL, 'parts'),
(62, 14, '', '', 'exit', 5, '2024-08-13 13:43:55', '2024-08-13 13:43:55', '24-1234-M7', '2', 'asep', 'm', NULL, NULL, 'parts'),
(63, 14, '', '', 'exit', 5, '2024-08-13 13:43:57', '2024-08-13 13:43:57', '24-1234-M7', '2', 'asep', 'm', NULL, NULL, 'parts'),
(66, 14, '', '', 'exit', 10, '2024-08-13 13:46:53', '2024-08-13 13:46:53', '24-0245-W2', '1', 'Gerson', 'm', NULL, NULL, 'parts'),
(71, 14, '', '', 'entry', 100, '2024-08-13 13:56:40', '2024-08-13 13:56:40', NULL, NULL, 'asep', NULL, '24-23123', '35000', NULL),
(73, 14, '', '', 'entry', 500, '2024-08-13 14:12:30', '2024-08-13 14:12:30', NULL, NULL, 'Gerson', NULL, 'PO-1', '40000', NULL),
(75, 15, '', '', 'entry', 1, '2024-08-13 14:27:32', '2024-08-13 14:27:32', NULL, NULL, 'asep', NULL, '24-23123', '35000', NULL),
(76, 14, '', '', 'exit', 2, '2024-08-13 16:58:49', '2024-08-13 16:58:49', '24-1234-M7', '3', 'Admin', 'm', NULL, NULL, 'parts'),
(77, 17, '', '', 'exit', 5, '2024-08-19 13:31:23', '2024-08-19 13:31:23', '24-0245-W2', '2', 'Yulius', 'pcs', NULL, NULL, 'STANDART PART'),
(79, 16, '', '', 'exit', 5, '2024-08-20 22:11:16', '2024-08-20 22:11:16', '24-0245-W2', '2', 'Admin', 'kg', NULL, NULL, 'MATERIAL'),
(82, 18, '131110-G-1006', 'B', 'exit', 10, '2024-08-21 09:17:29', '2024-08-21 09:17:29', '24-0245-W2', '2', 'Gerson', 'pcs', NULL, NULL, 'STANDART PART'),
(84, 18, '131110-G-1006', 'B', 'exit', 48, '2024-08-21 09:36:54', '2024-08-21 09:36:54', '24-0245-W2', '2', 'Gerson', 'pcs', NULL, NULL, 'STANDART PART'),
(85, 18, '131110-G-1006', 'B', 'exit', 1, '2024-08-21 09:37:37', '2024-08-21 09:37:37', '24-0245-W2', '1', 'Gerson', 'pcs', NULL, NULL, 'STANDART PART'),
(88, 19, '131110-G-1007', 'G', 'entry', 5, '2024-08-22 13:35:21', '2024-08-22 13:35:21', NULL, NULL, 'Yulius', NULL, '24-23123', '30000', NULL),
(91, 14, '131120-GHP-1003', 'GHP', 'exit', 100, '2024-10-13 12:47:15', '2024-10-13 12:47:15', '24-1234-M1', '1.1', 'Yulius', 'm', NULL, NULL, 'MATERIAL'),
(92, 14, '131120-GHP-1003', 'GHP', 'entry', 30, '2024-10-13 12:51:23', '2024-10-13 12:51:23', NULL, NULL, 'Yulius', NULL, '24-23123', '40000', NULL),
(93, 14, '131120-GHP-1003', 'GHP', 'entry', 5, '2024-10-13 12:55:56', '2024-10-13 12:55:56', NULL, NULL, 'Yulius', NULL, '24-23123', '40000', NULL),
(94, 15, '135120-GBBM-1001', 'GBBM', 'exit', 50, '2024-10-13 12:59:08', '2024-10-13 12:59:08', '24-1234-M1', '1.2', 'Yulius', 'ltr', NULL, NULL, 'STANDART PART'),
(95, 15, '135120-GBBM-1001', 'GBBM', 'entry', 10, '2024-10-13 13:00:59', '2024-10-13 13:00:59', NULL, NULL, 'Yulius', NULL, '24-23123', '35000', NULL),
(96, 15, '135120-GBBM-1001', 'GBBM', 'exit', 5, '2024-10-13 13:01:21', '2024-10-13 13:01:21', '24-1234-M1', '1.1', 'Yulius', 'ltr', NULL, NULL, 'STANDART PART'),
(97, 23, '131210-M-B-0003', 'B', 'exit', 15, '2024-10-14 14:35:57', '2024-10-14 14:35:57', '24-0001-W1', '1', 'victor', 'pcs', NULL, NULL, 'STANDART PART'),
(98, 16, '131120-MSH-1004', 'MSH', 'exit', 30, '2024-10-14 14:49:04', '2024-10-14 14:49:04', '24-0001-W1', '1', 'victor', 'kg', NULL, NULL, 'MATERIAL'),
(99, 21, '131210-M-B-0001', 'B', 'exit', 20, '2024-10-14 16:35:30', '2024-10-14 16:35:30', '24-23001-W1', '1', 'victor', 'pcs', NULL, NULL, 'STANDART PART'),
(100, 16, '131120-MSH-1004', 'MSH', 'exit', 10, '2024-10-14 16:38:05', '2024-10-14 16:38:05', '24-23001-W1', '2', 'victor', 'kg', NULL, NULL, 'MATERIAL'),
(101, 42, '131120-M-G-0002', 'G', 'exit', 1, '2024-10-16 09:00:02', '2024-10-16 09:00:02', '24-23004-W1', '1', 'Admin', 'pcs', NULL, NULL, 'MATERIAL'),
(102, 21, '131210-M-B-0001', 'B', 'exit', 10, '2024-10-28 11:59:51', '2024-10-28 11:59:51', '24-2306-W1', '1.1', 'Admin', 'pcs', NULL, NULL, 'STANDART PART'),
(103, 16, '131120-MSH-1004', 'MSH', 'exit', 25, '2024-10-28 12:01:25', '2024-10-28 12:01:25', '24-2306-W1', '1.1', 'Admin', 'kg', NULL, NULL, 'MATERIAL'),
(104, 16, '131120-MSH-1004', 'MSH', 'exit', 100, '2024-12-06 08:56:19', '2024-12-06 08:56:19', '24-1500-W1', '1', 'victor', 'kg', NULL, NULL, 'MATERIAL'),
(105, 21, '131210-M-B-0001', 'B', 'exit', 10, '2024-12-06 09:00:57', '2024-12-06 09:00:57', '24-1500-W1', '1.1', 'victor', 'pcs', NULL, NULL, 'STANDART PART');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('356a192b7913b04c54574d18c28d46e6395428ab', 'i:1;', 1716864206),
('356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1716864206;', 1716864206),
('admin@atmi.co.id|202.56.165.46', 'i:1;', 1728281086),
('admin@atmi.co.id|202.56.165.46:timer', 'i:1728281086;', 1728281086),
('admin@atmi.co.id|210.87.90.158', 'i:1;', 1733045327),
('admin@atmi.co.id|210.87.90.158:timer', 'i:1733045327;', 1733045327),
('admin@atmisolo.com|182.1.105.50', 'i:2;', 1724583188),
('admin@atmisolo.com|182.1.105.50:timer', 'i:1724583188;', 1724583188),
('admin@gmail.com|202.56.165.46', 'i:1;', 1733449940),
('admin@gmail.com|202.56.165.46:timer', 'i:1733449940;', 1733449940),
('adminatmi@gmail.com|::1', 'i:1;', 1719992414),
('adminatmi@gmail.com|::1:timer', 'i:1719992414;', 1719992414),
('adminatmi@gmail.com|127.0.0.1', 'i:1;', 1723175504),
('adminatmi@gmail.com|127.0.0.1:timer', 'i:1723175504;', 1723175504),
('anton@atmisolo.co.id|202.56.165.46', 'i:1;', 1731555388),
('anton@atmisolo.co.id|202.56.165.46:timer', 'i:1731555388;', 1731555388),
('manuelsugianto@gmail.com|::1', 'i:1;', 1716876204),
('manuelsugianto@gmail.com|::1:timer', 'i:1716876204;', 1716876204),
('victor@atmi.co.id|202.56.165.46', 'i:1;', 1728891175),
('victor@atmi.co.id|202.56.165.46:timer', 'i:1728891175;', 1728891175),
('victor@atmisolo.co.id|117.74.123.154', 'i:2;', 1728782666),
('victor@atmisolo.co.id|117.74.123.154:timer', 'i:1728782666;', 1728782666),
('victor@atmisolo|202.56.165.46', 'i:1;', 1730693018),
('victor@atmisolo|202.56.165.46:timer', 'i:1730693018;', 1730693018),
('ycaesar01@mail.com|182.1.112.13', 'i:2;', 1724668214),
('ycaesar01@mail.com|182.1.112.13:timer', 'i:1724668214;', 1724668214),
('ycaesar01@mail.com|182.1.71.104', 'i:1;', 1730299081),
('ycaesar01@mail.com|182.1.71.104:timer', 'i:1730299081;', 1730299081),
('zaproxy@example.com|182.253.190.140', 'i:1;', 1730960398),
('zaproxy@example.com|182.253.190.140:timer', 'i:1730960398;', 1730960398);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cancelhistory`
--

CREATE TABLE `cancelhistory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_id` varchar(255) NOT NULL,
  `barang_id` varchar(255) NOT NULL,
  `no_item` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cancelhistory`
--

INSERT INTO `cancelhistory` (`id`, `log_id`, `barang_id`, `no_item`, `action`, `quantity`, `created_at`, `updated_at`) VALUES
(2, '80', '18', '131110-G-1006', 'exit', 15, '2024-08-21 01:59:34', '2024-08-21 02:14:41'),
(3, '81', '18', '131110-G-1006', 'exit', 10, '2024-08-21 09:14:16', '2024-08-21 09:15:37'),
(4, '83', '19', '131110-G-1007', 'exit', 5, '2024-08-21 09:33:38', '2024-08-22 11:35:15'),
(5, '90', '24', '131210-M-B-0004', 'entry', 10, '2024-08-22 22:29:27', '2024-08-22 22:30:23'),
(6, '89', '24', '131210-M-B-0004', 'exit', 5, '2024-08-22 22:27:51', '2024-08-22 22:30:23'),
(7, '74', '15', '135120-GBBM-1001', 'entry', 5, '2024-08-13 14:15:45', '2024-08-23 13:33:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kode_institusi`
--

CREATE TABLE `kode_institusi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kd_ins` varchar(255) NOT NULL,
  `nama_ins` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kode_institusi`
--

INSERT INTO `kode_institusi` (`id`, `kd_ins`, `nama_ins`, `created_at`, `updated_at`) VALUES
(1, 'AS', 'ATMI SOLO, PT', '2024-08-13 17:32:22', '2024-08-13 17:33:22'),
(3, 'IGI', 'ATMI IGI CENTER, PT', '2024-08-13 17:33:36', '2024-08-13 17:33:36'),
(4, 'YKBS', 'YAYASAN KARYA BAKTI', '2024-08-13 17:33:47', '2024-08-13 17:33:47'),
(5, 'POLTEK', 'POLITEKNIK ATMI SURAKARTA', '2024-08-13 17:33:59', '2024-08-13 17:33:59'),
(6, 'ASa', 'ATMI IGI CENTER, PT', '2024-08-13 17:45:57', '2024-08-13 17:45:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_gudangs_tables`
--

CREATE TABLE `log_gudangs_tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kd_prod` varchar(255) NOT NULL,
  `kd_log` varchar(255) NOT NULL,
  `nama_log` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `log_gudangs_tables`
--

INSERT INTO `log_gudangs_tables` (`id`, `kd_prod`, `kd_log`, `nama_log`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'W', 'G', 'SPT', 'kayu, top table, handle', '2024-08-10 14:31:21', '2024-08-11 17:11:37'),
(3, 'W', 'GBBM', 'BBM', 'Bensin', '2024-08-10 14:42:40', '2024-08-10 14:42:40'),
(4, 'W', 'GHP', 'HABIS PAKAI', '-', '2024-08-10 14:44:01', '2024-08-10 14:44:01'),
(5, 'W', 'GKM', 'BAHAN KIMIA', '-', '2024-08-10 14:44:35', '2024-08-10 14:44:35'),
(6, 'W', 'GPK', 'PACKING', '-', '2024-08-10 14:44:50', '2024-08-10 14:44:50'),
(7, 'W', 'GSPL', 'SUPPLIES', '-', '2024-08-10 14:45:11', '2024-08-10 14:45:11'),
(8, 'W', 'GSP', 'SISA PAKAI', '-', '2024-08-10 14:45:51', '2024-08-10 14:45:51'),
(9, 'W', 'M', 'SIKU/PIPA', '-', '2024-08-10 14:46:23', '2024-08-10 14:46:23'),
(10, 'W', 'MPD', 'CAT', '-', '2024-08-10 14:46:40', '2024-08-10 14:46:40'),
(11, 'W', 'S', 'MEKANIK', '-', '2024-08-10 14:46:58', '2024-08-10 14:46:58'),
(12, 'W', 'MSH', 'SHEET METAL', '-', '2024-08-10 14:47:31', '2024-08-10 14:47:31'),
(13, 'W', 'FGW', 'FINISH GOOD', '-', '2024-08-10 14:47:49', '2024-08-10 14:47:49'),
(14, 'M', 'A', 'MATERIAL', '-', '2024-08-10 14:50:28', '2024-08-10 14:50:28'),
(15, 'M', 'B', 'SPAREPART', '-', '2024-08-10 14:50:47', '2024-08-10 14:50:47'),
(16, 'M', 'C', 'ELEKTRIK', '-', '2024-08-10 14:51:07', '2024-08-10 14:51:07'),
(17, 'M', 'D', 'BBM', '-', '2024-08-10 14:51:31', '2024-08-10 14:51:31'),
(18, 'M', 'BSPL', 'SUPPLIES MDC', '-', '2024-08-10 14:51:54', '2024-08-10 14:51:54'),
(19, 'M', 'BEDU', 'SUPPLIES EDU', '-', '2024-08-10 14:52:10', '2024-08-10 14:52:10'),
(20, 'M', 'ASS', 'MATERIAL SISA PAKAI', '-', '2024-08-10 14:52:32', '2024-08-10 14:52:32'),
(21, 'M', 'BSS', 'SPAREPART SISA PAKAI', '-', '2024-08-10 14:52:53', '2024-08-10 14:52:53'),
(22, 'M', 'AHP', 'MATERIAL HABIS PAKAI', '-', '2024-08-10 14:53:14', '2024-08-10 14:53:14'),
(23, 'M', 'BHP', 'SPAREPART HABIS PAKAI', '-', '2024-08-10 14:53:37', '2024-08-10 14:53:37'),
(24, 'M', 'CHP', 'ELEKTRIK HABIS PAKAI', '-', '2024-08-10 14:53:53', '2024-08-10 14:53:53'),
(26, 'M', 'FGM', 'FINISH GOOD', '-', '2024-08-10 17:14:31', '2024-08-10 17:14:31'),
(29, 'U', 'umum', 'IT', 'IT', '2024-08-23 13:27:12', '2024-08-23 13:27:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_akun`
--

CREATE TABLE `master_akun` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kd_akun` varchar(255) NOT NULL,
  `nama_akun` varchar(255) NOT NULL,
  `kelompok` varchar(255) NOT NULL,
  `jenis_barang` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_akun`
--

INSERT INTO `master_akun` (`id`, `kd_akun`, `nama_akun`, `kelompok`, `jenis_barang`, `created_at`, `updated_at`) VALUES
(2, '131110', 'MATERIAL MDC', 'MATERIAL', 'MATERIAL', '2024-08-10 17:13:10', '2024-08-13 15:36:42'),
(3, '131120', 'MATERIAL WF - WA', 'MATERIAL', 'MATERIAL', '2024-08-10 17:15:56', '2024-08-13 15:37:00'),
(4, '131130', 'MATERIAL EDU', 'MATERIAL', 'MATERIAL', '2024-08-10 17:16:24', '2024-08-13 15:37:07'),
(5, '131210', 'SPAREPART MDC', 'SPAREPART', 'STANDART PART', '2024-08-10 17:16:41', '2024-08-13 15:37:28'),
(6, '131220', 'SPAREPART WF', 'SPAREPART', 'STANDART PART', '2024-08-10 17:16:58', '2024-08-13 15:37:33'),
(7, '131240', 'SPAREPART ELEKTRIK', 'SPAREPART', 'STANDART PART', '2024-08-10 17:17:27', '2024-08-13 15:37:42'),
(8, '135110', 'BAHAN BAKAR/PELUMAS/GAS MDC', 'BBM', 'STANDART PART', '2024-08-10 17:17:46', '2024-08-13 15:37:48'),
(9, '135120', 'BAHAN BAKAR/PELUMAS/GAS WF', 'BBM', 'STANDART PART', '2024-08-10 17:18:12', '2024-08-13 15:37:54'),
(10, '135220', 'BAHAN KIMIA WF', 'KIMIA', 'STANDART PART', '2024-08-10 17:18:44', '2024-08-13 15:37:59'),
(11, '136100', 'SUPPLIES MDC', 'SUPPLIES', 'STANDART PART', '2024-08-10 17:19:08', '2024-08-13 15:38:05'),
(12, '136200', 'SUPPLIES WF', 'PACKING', 'STANDART PART', '2024-08-10 17:19:24', '2024-08-13 15:44:21'),
(13, '136310', 'PACKING MDC', 'PACKING', 'STANDART PART', '2024-08-10 17:19:40', '2024-08-13 15:44:29'),
(14, '136320', 'PACKING WF', 'PACKING', 'STANDART PART', '2024-08-10 17:19:59', '2024-08-13 15:44:37'),
(15, '136400', 'SUPPLIES BENGKEL TMI', 'SUPPLIES', 'STANDART PART', '2024-08-10 17:20:20', '2024-08-13 15:44:52'),
(16, '514110', 'BEA MASUK IMPOR MDC', 'BEA CUKAI', 'STANDART PART', '2024-08-10 17:20:38', '2024-08-13 15:45:00'),
(17, '514210', 'BEA MASUK IMPOR WF', 'BEA CUKAI', 'STANDART PART', '2024-08-10 17:21:04', '2024-08-13 15:45:06'),
(19, '523422', 'BARANG KEBUTUHAN MAINTENANCE BENGKEL TMI', 'MAINTENANCE', 'STANDART PART', '2024-08-10 17:21:53', '2024-08-13 15:45:18'),
(20, '524120', 'PART/BARANG MAINTENANCE MDC', 'MAINTENANCE', 'STANDART PART', '2024-08-10 17:22:26', '2024-08-13 15:45:25'),
(21, '524220', 'PART/BARANG MAINTENANCE WF', 'MAINTENANCE', 'STANDART PART', '2024-08-10 17:22:45', '2024-08-13 15:45:33'),
(24, '751200', 'BARANG KEBUTUHAN MAINTENANCE BANGUNAN', 'MAINTENANCE', 'UMUM', '2024-08-10 17:23:54', '2024-08-13 15:47:30'),
(25, '752200', 'BARANG MAINTENANCE KENDARAAN', 'MAINTENANCE', 'UMUM', '2024-08-10 17:24:13', '2024-08-13 15:47:48'),
(26, '753200', 'BARANG MAINTENANCE IT', 'MAINTENANCE', 'UMUM', '2024-08-10 17:24:36', '2024-08-13 15:47:55'),
(27, '754200', 'BARANG MAINTENANCE INVENTARIS UMUM', 'MAINTENANCE', 'UMUM', '2024-08-10 17:24:59', '2024-08-13 15:48:01'),
(28, '755200', 'PART/BARANG KEBUTUHAN INSTALASI UMUM', 'MAINTENANCE', 'UMUM', '2024-08-10 17:25:16', '2024-08-13 15:48:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '0001_01_01_000000_create_users_table', 1),
(5, '0001_01_01_000001_create_cache_table', 1),
(6, '0001_01_01_000002_create_jobs_table', 1),
(7, '2024_05_28_044905_create_barangs_table', 2),
(8, '2024_06_03_151237_create_barang_logs_table', 3),
(9, '2024_08_10_004256_create_satuan_table', 4),
(10, '2024_08_10_004622_create_satuans_table', 5),
(11, '2024_08_10_210515_create_log_gudangs_tables', 6),
(12, '2024_08_10_222901_create_produksi_table', 7),
(13, '2024_08_10_234654_create_master_akun_table', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nama_barangs`
--

CREATE TABLE `nama_barangs` (
  `id` int(11) NOT NULL,
  `no_item` varchar(255) DEFAULT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `kode_log` varchar(255) DEFAULT NULL,
  `kd_akun` varchar(255) NOT NULL,
  `no` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `jumlah_minimal` int(11) NOT NULL,
  `jumlah_maksimal` int(11) NOT NULL,
  `rak` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `no_katalog` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `merk` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `no_reff` varchar(255) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `nama_barangs`
--

INSERT INTO `nama_barangs` (`id`, `no_item`, `nama_barang`, `kode_log`, `kd_akun`, `no`, `harga`, `satuan`, `jumlah_minimal`, `jumlah_maksimal`, `rak`, `no_katalog`, `merk`, `no_reff`, `updated_at`, `created_at`) VALUES
(16, '135120-GBBM-1001', 'bensin pertamax', 'GBBM', '135120', 1001, 70000, 'ltr', 500, 1000, 'b', '9099', 'pertamina', '989123123', '2024-08-11 16:54:53', '2024-08-11 16:23:29'),
(18, '131120-G-1002', 'tes', 'G', '131120', 1002, 35000, 'm', 100, 1000, 'a', '9099', 'mnc', '989123123', '2024-08-12 14:35:29', '2024-08-12 14:35:29'),
(19, '131120-GHP-1003', 'tes 1', 'GHP', '131120', 1003, 35000, 'm', 100, 500, 'a', 'a', 'mnc', '989123123', '2024-08-13 10:22:54', '2024-08-13 10:22:54'),
(20, '131120-MSH-1004', 'SPCC 0,8', 'MSH', '131120', 1004, 15000, 'kg', 10000, 50000, 'GB', 'coba 1', 'WILTAM', 'coba 1', '2024-08-13 14:14:09', '2024-08-13 14:14:09'),
(21, '136310-BSPL-1005', 'packing kardus', 'BSPL', '136310', 1005, 50000, 'pcs', 1000, 5000, 'aa', '-', 'mnc', '-', '2024-08-19 13:14:48', '2024-08-16 01:32:19'),
(22, '131110-G-1006', 'INSERT ZTFD0303-MG/YBG302', 'B', '136100', 1006, 85000, 'pcs', 1, 10, '1', '-', 'ZCC-CT', '-', '2024-08-20 14:12:50', '2024-08-20 14:11:30'),
(24, '131110-G-1007', 'Pipa ⌀ 10', 'G', '131110', 1007, 30000, 'btg', 20, 200, '-', '-', 'Vention', '-', '2024-08-21 09:27:32', '2024-08-21 09:27:32'),
(28, '131110-umum-1008', 'pc', 'umum', '131110', 1008, 35000, 'pcs', 100, 1000, 'a', '-', 'mnc', '-', '2024-08-23 13:28:00', '2024-08-23 13:28:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('victor@atmisolo.co.id', '$2y$12$0hAA76QM4liq.6J623sn8eoZ6H4u/og8k.3Gg2DY65zGCZjYu94na', '2024-10-11 21:48:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produksi`
--

CREATE TABLE `produksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kd_prod` varchar(255) NOT NULL,
  `nama_prod` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produksi`
--

INSERT INTO `produksi` (`id`, `kd_prod`, `nama_prod`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'M', 'UNIT MDC', 'PURCHASING UNIT MDC', '2024-08-10 15:48:05', '2024-08-11 17:11:17'),
(4, 'W', 'UNIT WF', 'PURCHASING UNIT WF', '2024-08-11 18:56:14', '2024-08-11 18:56:14'),
(6, 'U', 'Unit Umum', 'Support', '2024-08-23 13:26:26', '2024-08-23 13:26:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `recaps_barangs`
--

CREATE TABLE `recaps_barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `recap_date` date NOT NULL,
  `no_item` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_log` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `entry` int(11) NOT NULL,
  `exit` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `recaps_barangs`
--

INSERT INTO `recaps_barangs` (`id`, `recap_date`, `no_item`, `nama_barang`, `kode_log`, `jumlah`, `harga`, `entry`, `exit`, `created_at`, `updated_at`) VALUES
(1, '2024-10-13', '131120-GHP-1003', 'tes 1', 'GHP', 600, 40000, 35, 100, NULL, NULL),
(2, '2024-10-13', '135120-GBBM-1001', 'bensin pertamax', 'GBBM', 957, 35000, 10, 55, NULL, NULL),
(3, '2024-10-13', '131120-MSH-1004', 'SPCC 0,8', 'MSH', 9995, 15000, 0, 0, NULL, NULL),
(4, '2024-10-13', '136310-BSPL-1005', 'packing kardus', 'BSPL', 1490, 50000, 0, 0, NULL, NULL),
(5, '2024-10-13', '131110-G-1006', 'INSERT ZTFD0303-MG/YBG302', 'B', 1, 85000, 0, 0, NULL, NULL),
(6, '2024-10-13', '131110-G-1007', 'Pipa ⌀ 10', 'G', 35, 30000, 0, 0, NULL, NULL),
(7, '2024-10-13', '131210-M-B-0001', 'BAUT BAJA IMBUS M 6 X 25 - A', 'B', 456, 405840, 0, 0, NULL, NULL),
(8, '2024-10-13', '131210-M-B-0002', 'CIRCLIP FOR SHAFT ? 19', 'B', 74, 99900, 0, 0, NULL, NULL),
(9, '2024-10-13', '131210-M-B-0003', 'BAUT MS HEX M 12 X 60', 'B', 53, 169600, 0, 0, NULL, NULL),
(10, '2024-10-13', '131210-M-B-0004', 'DOWEL PIN ? 6 X 10', 'B', 14, 72464, 0, 0, NULL, NULL),
(11, '2024-10-13', '131210-M-B-0005', 'BALL PLUNGER M6 X 13', 'B', 11, 214280, 0, 0, NULL, NULL),
(12, '2024-10-13', '131210-M-B-0006', 'SCRAPER SIZE 2\" - VIPER', 'B', 4, 26668, 0, 0, NULL, NULL),
(13, '2024-10-13', '131210-M-B-0007', 'BAUT MS HEX M 12 X 70', 'B', 1, 1100, 0, 0, NULL, NULL),
(14, '2024-10-13', '131210-M-B-0008', 'BAUT MS HEX M 12 X110', 'B', 133, 159600, 0, 0, NULL, NULL),
(15, '2024-10-13', '131210-M-B-0009', 'BAUT MS HEX M 12 X125', 'B', 1, 1250, 0, 0, NULL, NULL),
(16, '2024-10-13', '131210-M-B-0010', 'BAUT MS JF M 3 X 06', 'B', 20, 2000, 0, 0, NULL, NULL),
(17, '2024-10-13', '131110-M-A-0001', '705 Ã˜ 40', 'A', 0, 488298, 0, 0, NULL, NULL),
(18, '2024-10-13', '131110-M-A-0002', 'SPRING STEEL # 08 x 200', 'A', 1, 738000, 0, 0, NULL, NULL),
(19, '2024-10-13', '131110-M-A-0003', 'ALLUMINIUM 5052 # 10 x 1200 x 2400', 'A', 0, 6100000, 0, 0, NULL, NULL),
(20, '2024-10-13', '131110-M-A-0004', 'MS # 10 x 1200 x 2400', 'A', 0, 3355000, 0, 0, NULL, NULL),
(21, '2024-10-13', '131110-M-A-0005', 'ALLUMINIUM 7075 # 50 x 50', 'A', 0, 1006200, 0, 0, NULL, NULL),
(22, '2024-10-13', '131110-M-A-0006', 'SUS 304 STRIP 10 x 20', 'A', 32, 100000, 0, 0, NULL, NULL),
(23, '2024-10-13', '131110-M-A-0007', 'POM PUTIH ? 90', 'A', 20, 1630000, 0, 0, NULL, NULL),
(24, '2024-10-13', '131110-M-A-0008', 'BRONZE AB2 ? 40', 'A', 5, 4200000, 0, 0, NULL, NULL),
(25, '2024-10-13', '131110-M-A-0009', 'VCN ? 90', 'A', 4, 2923200, 0, 0, NULL, NULL),
(26, '2024-10-13', '131110-M-A-0010', 'STST PIPE 316 ? 3/4\" SCH 40', 'A', 3, 356666, 0, 0, NULL, NULL),
(27, '2024-10-13', '131120-M-G-0001', 'KAYU HARDBOARD 3 X 125 X 25', 'G', 500, 750, 0, 0, NULL, NULL),
(28, '2024-10-13', '131120-M-G-0002', 'KAYU TOP TABLE # 20 X 1200 X 2400 HPL PUTIH. LIST PVC', 'G', 2, 1348650, 0, 0, NULL, NULL),
(29, '2024-10-13', '131120-M-G-0003', 'KAYU WOOD WORKING WB ( 1778 X 686 X 965 mm ) W/BENCH VICE CLAMP 7.5\"', 'G', 0, 6049500, 0, 0, NULL, NULL),
(30, '2024-10-13', '131120-M-G-0004', 'RODA ALMARI ALPHA Dia 19 mm', 'G', 232, 3000, 0, 0, NULL, NULL),
(31, '2024-10-13', '131120-M-G-0005', '317220 REL HUBEN SD-12 TOP 3 U', 'G', 4, 27750, 0, 0, NULL, NULL),
(32, '2024-10-13', '131120-M-G-0006', '317216 REL HUBEN SD-12 BOTOM 3M', 'G', 4, 27750, 0, 0, NULL, NULL),
(33, '2024-10-13', '131120-M-G-0007', 'KACA CLEAR # 6MM X 849CM X 1630 CM + LUBANG 4 BUAH GOSOK BATU', 'G', 0, 397300, 0, 0, NULL, NULL),
(34, '2024-10-13', '131120-M-G-0008', 'Playwood 275 x 400 x 25 Radius Sudut R10mm. LIST DUCO CREAM. FINISHING CLEA', 'G', 0, 119300, 0, 0, NULL, NULL),
(35, '2024-10-13', '131120-M-G-0009', 'KAYU SANDARAN MULTIPROPUSE FOLDING 333353', 'G', 0, 44400, 0, 0, NULL, NULL),
(36, '2024-10-13', '131110-umum-1008', 'pc', 'umum', 10, 35000, 0, 0, NULL, NULL),
(37, '2024-10-13', '131210-M-B-0011', 'Barang 1', 'B', 456, 405840, 0, 0, NULL, NULL),
(38, '2024-10-13', '131210-M-B-0012', 'Barang 2', 'B', 74, 99900, 0, 0, NULL, NULL),
(39, '2024-10-13', '131210-M-B-0013', 'Barang 3', 'B', 53, 169600, 0, 0, NULL, NULL),
(40, '2024-10-13', '131210-M-B-0014', 'Barang 4', 'B', 14, 72464, 0, 0, NULL, NULL),
(41, '2024-10-13', '131210-M-B-0015', 'Barang 5', 'B', 11, 214280, 0, 0, NULL, NULL),
(42, '2024-10-13', '131210-M-B-0016', 'Barang 6', 'B', 4, 26668, 0, 0, NULL, NULL),
(43, '2024-10-13', '131210-M-B-0017', 'Barang 7', 'B', 1, 1100, 0, 0, NULL, NULL),
(44, '2024-10-13', '131210-M-B-0018', 'Barang 8', 'B', 133, 159600, 0, 0, NULL, NULL),
(45, '2024-10-13', '131210-M-B-0019', 'Barang 9', 'B', 1, 1250, 0, 0, NULL, NULL),
(46, '2024-10-13', '131210-M-B-0020', 'Barang 10', 'B', 20, 2000, 0, 0, NULL, NULL),
(47, '2024-10-13', '131110-M-A-0011', 'Barang 11', 'A', 0, 488298, 0, 0, NULL, NULL),
(48, '2024-10-13', '131110-M-A-0012', 'Barang 12', 'A', 1, 738000, 0, 0, NULL, NULL),
(49, '2024-10-13', '131110-M-A-0013', 'Barang 13', 'A', 0, 6100000, 0, 0, NULL, NULL),
(50, '2024-10-13', '131110-M-A-0014', 'Barang 14', 'A', 0, 3355000, 0, 0, NULL, NULL),
(51, '2024-10-13', '131110-M-A-0015', 'Barang 15', 'A', 0, 1006200, 0, 0, NULL, NULL),
(52, '2024-10-13', '131110-M-A-0016', 'Barang 16', 'A', 32, 100000, 0, 0, NULL, NULL),
(53, '2024-10-13', '131110-M-A-0017', 'Barang 17', 'A', 20, 1630000, 0, 0, NULL, NULL),
(54, '2024-10-13', '131110-M-A-0018', 'Barang 18', 'A', 5, 4200000, 0, 0, NULL, NULL),
(55, '2024-10-13', '131110-M-A-0019', 'Barang 19', 'A', 4, 2923200, 0, 0, NULL, NULL),
(56, '2024-10-13', '131110-M-A-0020', 'Barang 20', 'A', 3, 356666, 0, 0, NULL, NULL),
(57, '2024-10-13', '131120-W-G-0010', 'Barang 21', 'G', 500, 750, 0, 0, NULL, NULL),
(58, '2024-10-13', '131120-W-G-0011', 'Barang 22', 'G', 2, 1348650, 0, 0, NULL, NULL),
(59, '2024-10-13', '131120-W-G-0012', 'Barang 23', 'G', 0, 6049500, 0, 0, NULL, NULL),
(60, '2024-10-13', '131120-W-G-0013', 'Barang 24', 'G', 0, 996502, 0, 0, NULL, NULL),
(61, '2024-10-13', '131120-W-G-0014', 'Barang 25', 'G', 232, 3000, 0, 0, NULL, NULL),
(62, '2024-10-13', '131120-W-G-0015', 'Barang 26', 'G', 4, 27750, 0, 0, NULL, NULL),
(63, '2024-10-13', '131120-W-G-0016', 'Barang 27', 'G', 4, 27750, 0, 0, NULL, NULL),
(64, '2024-10-13', '131120-W-G-0017', 'Barang 28', 'G', 0, 397300, 0, 0, NULL, NULL),
(65, '2024-10-13', '131120-W-G-0018', 'Barang 29', 'G', 0, 119300, 0, 0, NULL, NULL),
(66, '2024-10-13', '131120-W-G-0019', 'Barang 30', 'G', 0, 44400, 0, 0, NULL, NULL),
(67, '2024-10-14', '131120-GHP-1003', 'tes 1', 'GHP', 600, 40000, 0, 0, NULL, NULL),
(68, '2024-10-14', '135120-GBBM-1001', 'bensin pertamax', 'GBBM', 957, 35000, 0, 0, NULL, NULL),
(69, '2024-10-14', '131120-MSH-1004', 'SPCC 0,8', 'MSH', 9955, 15000, 0, 40, NULL, NULL),
(70, '2024-10-14', '136310-BSPL-1005', 'packing kardus', 'BSPL', 1490, 50000, 0, 0, NULL, NULL),
(71, '2024-10-14', '131110-G-1006', 'INSERT ZTFD0303-MG/YBG302', 'B', 1, 85000, 0, 0, NULL, NULL),
(72, '2024-10-14', '131110-G-1007', 'Pipa ⌀ 10', 'G', 35, 30000, 0, 0, NULL, NULL),
(73, '2024-10-14', '131210-M-B-0001', 'BAUT BAJA IMBUS M 6 X 25 - A', 'B', 436, 405840, 0, 20, NULL, NULL),
(74, '2024-10-14', '131210-M-B-0002', 'CIRCLIP FOR SHAFT ? 19', 'B', 74, 99900, 0, 0, NULL, NULL),
(75, '2024-10-14', '131210-M-B-0003', 'BAUT MS HEX M 12 X 60', 'B', 38, 169600, 0, 15, NULL, NULL),
(76, '2024-10-14', '131210-M-B-0004', 'DOWEL PIN ? 6 X 10', 'B', 14, 72464, 0, 0, NULL, NULL),
(77, '2024-10-14', '131210-M-B-0005', 'BALL PLUNGER M6 X 13', 'B', 11, 214280, 0, 0, NULL, NULL),
(78, '2024-10-14', '131210-M-B-0006', 'SCRAPER SIZE 2\" - VIPER', 'B', 4, 26668, 0, 0, NULL, NULL),
(79, '2024-10-14', '131210-M-B-0007', 'BAUT MS HEX M 12 X 70', 'B', 1, 1100, 0, 0, NULL, NULL),
(80, '2024-10-14', '131210-M-B-0008', 'BAUT MS HEX M 12 X110', 'B', 133, 159600, 0, 0, NULL, NULL),
(81, '2024-10-14', '131210-M-B-0009', 'BAUT MS HEX M 12 X125', 'B', 1, 1250, 0, 0, NULL, NULL),
(82, '2024-10-14', '131210-M-B-0010', 'BAUT MS JF M 3 X 06', 'B', 20, 2000, 0, 0, NULL, NULL),
(83, '2024-10-14', '131110-M-A-0001', '705 Ã˜ 40', 'A', 0, 488298, 0, 0, NULL, NULL),
(84, '2024-10-14', '131110-M-A-0002', 'SPRING STEEL # 08 x 200', 'A', 1, 738000, 0, 0, NULL, NULL),
(85, '2024-10-14', '131110-M-A-0003', 'ALLUMINIUM 5052 # 10 x 1200 x 2400', 'A', 0, 6100000, 0, 0, NULL, NULL),
(86, '2024-10-14', '131110-M-A-0004', 'MS # 10 x 1200 x 2400', 'A', 0, 3355000, 0, 0, NULL, NULL),
(87, '2024-10-14', '131110-M-A-0005', 'ALLUMINIUM 7075 # 50 x 50', 'A', 0, 1006200, 0, 0, NULL, NULL),
(88, '2024-10-14', '131110-M-A-0006', 'SUS 304 STRIP 10 x 20', 'A', 32, 100000, 0, 0, NULL, NULL),
(89, '2024-10-14', '131110-M-A-0007', 'POM PUTIH ? 90', 'A', 20, 1630000, 0, 0, NULL, NULL),
(90, '2024-10-14', '131110-M-A-0008', 'BRONZE AB2 ? 40', 'A', 5, 4200000, 0, 0, NULL, NULL),
(91, '2024-10-14', '131110-M-A-0009', 'VCN ? 90', 'A', 4, 2923200, 0, 0, NULL, NULL),
(92, '2024-10-14', '131110-M-A-0010', 'STST PIPE 316 ? 3/4\" SCH 40', 'A', 3, 356666, 0, 0, NULL, NULL),
(93, '2024-10-14', '131120-M-G-0001', 'KAYU HARDBOARD 3 X 125 X 25', 'G', 500, 750, 0, 0, NULL, NULL),
(94, '2024-10-14', '131120-M-G-0002', 'KAYU TOP TABLE # 20 X 1200 X 2400 HPL PUTIH. LIST PVC', 'G', 2, 1348650, 0, 0, NULL, NULL),
(95, '2024-10-14', '131120-M-G-0003', 'KAYU WOOD WORKING WB ( 1778 X 686 X 965 mm ) W/BENCH VICE CLAMP 7.5\"', 'G', 0, 6049500, 0, 0, NULL, NULL),
(96, '2024-10-14', '131120-M-G-0004', 'RODA ALMARI ALPHA Dia 19 mm', 'G', 232, 3000, 0, 0, NULL, NULL),
(97, '2024-10-14', '131120-M-G-0005', '317220 REL HUBEN SD-12 TOP 3 U', 'G', 4, 27750, 0, 0, NULL, NULL),
(98, '2024-10-14', '131120-M-G-0006', '317216 REL HUBEN SD-12 BOTOM 3M', 'G', 4, 27750, 0, 0, NULL, NULL),
(99, '2024-10-14', '131120-M-G-0007', 'KACA CLEAR # 6MM X 849CM X 1630 CM + LUBANG 4 BUAH GOSOK BATU', 'G', 0, 397300, 0, 0, NULL, NULL),
(100, '2024-10-14', '131120-M-G-0008', 'Playwood 275 x 400 x 25 Radius Sudut R10mm. LIST DUCO CREAM. FINISHING CLEA', 'G', 0, 119300, 0, 0, NULL, NULL),
(101, '2024-10-14', '131120-M-G-0009', 'KAYU SANDARAN MULTIPROPUSE FOLDING 333353', 'G', 0, 44400, 0, 0, NULL, NULL),
(102, '2024-10-14', '131110-umum-1008', 'pc', 'umum', 10, 35000, 0, 0, NULL, NULL),
(103, '2024-10-14', '131210-M-B-0011', 'Barang 1', 'B', 456, 405840, 0, 0, NULL, NULL),
(104, '2024-10-14', '131210-M-B-0012', 'Barang 2', 'B', 74, 99900, 0, 0, NULL, NULL),
(105, '2024-10-14', '131210-M-B-0013', 'Barang 3', 'B', 53, 169600, 0, 0, NULL, NULL),
(106, '2024-10-14', '131210-M-B-0014', 'Barang 4', 'B', 14, 72464, 0, 0, NULL, NULL),
(107, '2024-10-14', '131210-M-B-0015', 'Barang 5', 'B', 11, 214280, 0, 0, NULL, NULL),
(108, '2024-10-14', '131210-M-B-0016', 'Barang 6', 'B', 4, 26668, 0, 0, NULL, NULL),
(109, '2024-10-14', '131210-M-B-0017', 'Barang 7', 'B', 1, 1100, 0, 0, NULL, NULL),
(110, '2024-10-14', '131210-M-B-0018', 'Barang 8', 'B', 133, 159600, 0, 0, NULL, NULL),
(111, '2024-10-14', '131210-M-B-0019', 'Barang 9', 'B', 1, 1250, 0, 0, NULL, NULL),
(112, '2024-10-14', '131210-M-B-0020', 'Barang 10', 'B', 20, 2000, 0, 0, NULL, NULL),
(113, '2024-10-14', '131110-M-A-0011', 'Barang 11', 'A', 0, 488298, 0, 0, NULL, NULL),
(114, '2024-10-14', '131110-M-A-0012', 'Barang 12', 'A', 1, 738000, 0, 0, NULL, NULL),
(115, '2024-10-14', '131110-M-A-0013', 'Barang 13', 'A', 0, 6100000, 0, 0, NULL, NULL),
(116, '2024-10-14', '131110-M-A-0014', 'Barang 14', 'A', 0, 3355000, 0, 0, NULL, NULL),
(117, '2024-10-14', '131110-M-A-0015', 'Barang 15', 'A', 0, 1006200, 0, 0, NULL, NULL),
(118, '2024-10-14', '131110-M-A-0016', 'Barang 16', 'A', 32, 100000, 0, 0, NULL, NULL),
(119, '2024-10-14', '131110-M-A-0017', 'Barang 17', 'A', 20, 1630000, 0, 0, NULL, NULL),
(120, '2024-10-14', '131110-M-A-0018', 'Barang 18', 'A', 5, 4200000, 0, 0, NULL, NULL),
(121, '2024-10-14', '131110-M-A-0019', 'Barang 19', 'A', 4, 2923200, 0, 0, NULL, NULL),
(122, '2024-10-14', '131110-M-A-0020', 'Barang 20', 'A', 3, 356666, 0, 0, NULL, NULL),
(123, '2024-10-14', '131120-W-G-0010', 'Barang 21', 'G', 500, 750, 0, 0, NULL, NULL),
(124, '2024-10-14', '131120-W-G-0011', 'Barang 22', 'G', 2, 1348650, 0, 0, NULL, NULL),
(125, '2024-10-14', '131120-W-G-0012', 'Barang 23', 'G', 0, 6049500, 0, 0, NULL, NULL),
(126, '2024-10-14', '131120-W-G-0013', 'Barang 24', 'G', 0, 996502, 0, 0, NULL, NULL),
(127, '2024-10-14', '131120-W-G-0014', 'Barang 25', 'G', 232, 3000, 0, 0, NULL, NULL),
(128, '2024-10-14', '131120-W-G-0015', 'Barang 26', 'G', 4, 27750, 0, 0, NULL, NULL),
(129, '2024-10-14', '131120-W-G-0016', 'Barang 27', 'G', 4, 27750, 0, 0, NULL, NULL),
(130, '2024-10-14', '131120-W-G-0017', 'Barang 28', 'G', 0, 397300, 0, 0, NULL, NULL),
(131, '2024-10-14', '131120-W-G-0018', 'Barang 29', 'G', 0, 119300, 0, 0, NULL, NULL),
(132, '2024-10-14', '131120-W-G-0019', 'Barang 30', 'G', 0, 44400, 0, 0, NULL, NULL),
(133, '2024-10-15', '131120-GHP-1003', 'tes 1', 'GHP', 600, 40000, 0, 0, NULL, NULL),
(134, '2024-10-15', '135120-GBBM-1001', 'bensin pertamax', 'GBBM', 957, 35000, 0, 0, NULL, NULL),
(135, '2024-10-15', '131120-MSH-1004', 'SPCC 0,8', 'MSH', 9955, 15000, 0, 0, NULL, NULL),
(136, '2024-10-15', '136310-BSPL-1005', 'packing kardus', 'BSPL', 1490, 50000, 0, 0, NULL, NULL),
(137, '2024-10-15', '131110-G-1006', 'INSERT ZTFD0303-MG/YBG302', 'B', 1, 85000, 0, 0, NULL, NULL),
(138, '2024-10-15', '131110-G-1007', 'Pipa ⌀ 10', 'G', 35, 30000, 0, 0, NULL, NULL),
(139, '2024-10-15', '131210-M-B-0001', 'BAUT BAJA IMBUS M 6 X 25 - A', 'B', 436, 405840, 0, 0, NULL, NULL),
(140, '2024-10-15', '131210-M-B-0002', 'CIRCLIP FOR SHAFT ? 19', 'B', 74, 99900, 0, 0, NULL, NULL),
(141, '2024-10-15', '131210-M-B-0003', 'BAUT MS HEX M 12 X 60', 'B', 38, 169600, 0, 0, NULL, NULL),
(142, '2024-10-15', '131210-M-B-0004', 'DOWEL PIN ? 6 X 10', 'B', 14, 72464, 0, 0, NULL, NULL),
(143, '2024-10-15', '131210-M-B-0005', 'BALL PLUNGER M6 X 13', 'B', 11, 214280, 0, 0, NULL, NULL),
(144, '2024-10-15', '131210-M-B-0006', 'SCRAPER SIZE 2\" - VIPER', 'B', 4, 26668, 0, 0, NULL, NULL),
(145, '2024-10-15', '131210-M-B-0007', 'BAUT MS HEX M 12 X 70', 'B', 1, 1100, 0, 0, NULL, NULL),
(146, '2024-10-15', '131210-M-B-0008', 'BAUT MS HEX M 12 X110', 'B', 133, 159600, 0, 0, NULL, NULL),
(147, '2024-10-15', '131210-M-B-0009', 'BAUT MS HEX M 12 X125', 'B', 1, 1250, 0, 0, NULL, NULL),
(148, '2024-10-15', '131210-M-B-0010', 'BAUT MS JF M 3 X 06', 'B', 20, 2000, 0, 0, NULL, NULL),
(149, '2024-10-15', '131110-M-A-0001', '705 Ã˜ 40', 'A', 0, 488298, 0, 0, NULL, NULL),
(150, '2024-10-15', '131110-M-A-0002', 'SPRING STEEL # 08 x 200', 'A', 1, 738000, 0, 0, NULL, NULL),
(151, '2024-10-15', '131110-M-A-0003', 'ALLUMINIUM 5052 # 10 x 1200 x 2400', 'A', 0, 6100000, 0, 0, NULL, NULL),
(152, '2024-10-15', '131110-M-A-0004', 'MS # 10 x 1200 x 2400', 'A', 0, 3355000, 0, 0, NULL, NULL),
(153, '2024-10-15', '131110-M-A-0005', 'ALLUMINIUM 7075 # 50 x 50', 'A', 0, 1006200, 0, 0, NULL, NULL),
(154, '2024-10-15', '131110-M-A-0006', 'SUS 304 STRIP 10 x 20', 'A', 32, 100000, 0, 0, NULL, NULL),
(155, '2024-10-15', '131110-M-A-0007', 'POM PUTIH ? 90', 'A', 20, 1630000, 0, 0, NULL, NULL),
(156, '2024-10-15', '131110-M-A-0008', 'BRONZE AB2 ? 40', 'A', 5, 4200000, 0, 0, NULL, NULL),
(157, '2024-10-15', '131110-M-A-0009', 'VCN ? 90', 'A', 4, 2923200, 0, 0, NULL, NULL),
(158, '2024-10-15', '131110-M-A-0010', 'STST PIPE 316 ? 3/4\" SCH 40', 'A', 3, 356666, 0, 0, NULL, NULL),
(159, '2024-10-15', '131120-M-G-0001', 'KAYU HARDBOARD 3 X 125 X 25', 'G', 500, 750, 0, 0, NULL, NULL),
(160, '2024-10-15', '131120-M-G-0002', 'KAYU TOP TABLE # 20 X 1200 X 2400 HPL PUTIH. LIST PVC', 'G', 2, 1348650, 0, 0, NULL, NULL),
(161, '2024-10-15', '131120-M-G-0003', 'KAYU WOOD WORKING WB ( 1778 X 686 X 965 mm ) W/BENCH VICE CLAMP 7.5\"', 'G', 0, 6049500, 0, 0, NULL, NULL),
(162, '2024-10-15', '131120-M-G-0004', 'RODA ALMARI ALPHA Dia 19 mm', 'G', 232, 3000, 0, 0, NULL, NULL),
(163, '2024-10-15', '131120-M-G-0005', '317220 REL HUBEN SD-12 TOP 3 U', 'G', 4, 27750, 0, 0, NULL, NULL),
(164, '2024-10-15', '131120-M-G-0006', '317216 REL HUBEN SD-12 BOTOM 3M', 'G', 4, 27750, 0, 0, NULL, NULL),
(165, '2024-10-15', '131120-M-G-0007', 'KACA CLEAR # 6MM X 849CM X 1630 CM + LUBANG 4 BUAH GOSOK BATU', 'G', 0, 397300, 0, 0, NULL, NULL),
(166, '2024-10-15', '131120-M-G-0008', 'Playwood 275 x 400 x 25 Radius Sudut R10mm. LIST DUCO CREAM. FINISHING CLEA', 'G', 0, 119300, 0, 0, NULL, NULL),
(167, '2024-10-15', '131120-M-G-0009', 'KAYU SANDARAN MULTIPROPUSE FOLDING 333353', 'G', 0, 44400, 0, 0, NULL, NULL),
(168, '2024-10-15', '131110-umum-1008', 'pc', 'umum', 10, 35000, 0, 0, NULL, NULL),
(169, '2024-10-15', '131210-M-B-0011', 'Barang 1', 'B', 456, 405840, 0, 0, NULL, NULL),
(170, '2024-10-15', '131210-M-B-0012', 'Barang 2', 'B', 74, 99900, 0, 0, NULL, NULL),
(171, '2024-10-15', '131210-M-B-0013', 'Barang 3', 'B', 53, 169600, 0, 0, NULL, NULL),
(172, '2024-10-15', '131210-M-B-0014', 'Barang 4', 'B', 14, 72464, 0, 0, NULL, NULL),
(173, '2024-10-15', '131210-M-B-0015', 'Barang 5', 'B', 11, 214280, 0, 0, NULL, NULL),
(174, '2024-10-15', '131210-M-B-0016', 'Barang 6', 'B', 4, 26668, 0, 0, NULL, NULL),
(175, '2024-10-15', '131210-M-B-0017', 'Barang 7', 'B', 1, 1100, 0, 0, NULL, NULL),
(176, '2024-10-15', '131210-M-B-0018', 'Barang 8', 'B', 133, 159600, 0, 0, NULL, NULL),
(177, '2024-10-15', '131210-M-B-0019', 'Barang 9', 'B', 1, 1250, 0, 0, NULL, NULL),
(178, '2024-10-15', '131210-M-B-0020', 'Barang 10', 'B', 20, 2000, 0, 0, NULL, NULL),
(179, '2024-10-15', '131110-M-A-0011', 'Barang 11', 'A', 0, 488298, 0, 0, NULL, NULL),
(180, '2024-10-15', '131110-M-A-0012', 'Barang 12', 'A', 1, 738000, 0, 0, NULL, NULL),
(181, '2024-10-15', '131110-M-A-0013', 'Barang 13', 'A', 0, 6100000, 0, 0, NULL, NULL),
(182, '2024-10-15', '131110-M-A-0014', 'Barang 14', 'A', 0, 3355000, 0, 0, NULL, NULL),
(183, '2024-10-15', '131110-M-A-0015', 'Barang 15', 'A', 0, 1006200, 0, 0, NULL, NULL),
(184, '2024-10-15', '131110-M-A-0016', 'Barang 16', 'A', 32, 100000, 0, 0, NULL, NULL),
(185, '2024-10-15', '131110-M-A-0017', 'Barang 17', 'A', 20, 1630000, 0, 0, NULL, NULL),
(186, '2024-10-15', '131110-M-A-0018', 'Barang 18', 'A', 5, 4200000, 0, 0, NULL, NULL),
(187, '2024-10-15', '131110-M-A-0019', 'Barang 19', 'A', 4, 2923200, 0, 0, NULL, NULL),
(188, '2024-10-15', '131110-M-A-0020', 'Barang 20', 'A', 3, 356666, 0, 0, NULL, NULL),
(189, '2024-10-15', '131120-W-G-0010', 'Barang 21', 'G', 500, 750, 0, 0, NULL, NULL),
(190, '2024-10-15', '131120-W-G-0011', 'Barang 22', 'G', 2, 1348650, 0, 0, NULL, NULL),
(191, '2024-10-15', '131120-W-G-0012', 'Barang 23', 'G', 0, 6049500, 0, 0, NULL, NULL),
(192, '2024-10-15', '131120-W-G-0013', 'Barang 24', 'G', 0, 996502, 0, 0, NULL, NULL),
(193, '2024-10-15', '131120-W-G-0014', 'Barang 25', 'G', 232, 3000, 0, 0, NULL, NULL),
(194, '2024-10-15', '131120-W-G-0015', 'Barang 26', 'G', 4, 27750, 0, 0, NULL, NULL),
(195, '2024-10-15', '131120-W-G-0016', 'Barang 27', 'G', 4, 27750, 0, 0, NULL, NULL),
(196, '2024-10-15', '131120-W-G-0017', 'Barang 28', 'G', 0, 397300, 0, 0, NULL, NULL),
(197, '2024-10-15', '131120-W-G-0018', 'Barang 29', 'G', 0, 119300, 0, 0, NULL, NULL),
(198, '2024-10-15', '131120-W-G-0019', 'Barang 30', 'G', 0, 44400, 0, 0, NULL, NULL),
(199, '2024-10-16', '131120-GHP-1003', 'tes 1', 'GHP', 600, 40000, 0, 0, NULL, NULL),
(200, '2024-10-16', '135120-GBBM-1001', 'bensin pertamax', 'GBBM', 957, 35000, 0, 0, NULL, NULL),
(201, '2024-10-16', '131120-MSH-1004', 'SPCC 0,8', 'MSH', 9955, 15000, 0, 0, NULL, NULL),
(202, '2024-10-16', '136310-BSPL-1005', 'packing kardus', 'BSPL', 1490, 50000, 0, 0, NULL, NULL),
(203, '2024-10-16', '131110-G-1006', 'INSERT ZTFD0303-MG/YBG302', 'B', 1, 85000, 0, 0, NULL, NULL),
(204, '2024-10-16', '131110-G-1007', 'Pipa ⌀ 10', 'G', 35, 30000, 0, 0, NULL, NULL),
(205, '2024-10-16', '131210-M-B-0001', 'BAUT BAJA IMBUS M 6 X 25 - A', 'B', 436, 405840, 0, 0, NULL, NULL),
(206, '2024-10-16', '131210-M-B-0002', 'CIRCLIP FOR SHAFT ? 19', 'B', 74, 99900, 0, 0, NULL, NULL),
(207, '2024-10-16', '131210-M-B-0003', 'BAUT MS HEX M 12 X 60', 'B', 38, 169600, 0, 0, NULL, NULL),
(208, '2024-10-16', '131210-M-B-0004', 'DOWEL PIN ? 6 X 10', 'B', 14, 72464, 0, 0, NULL, NULL),
(209, '2024-10-16', '131210-M-B-0005', 'BALL PLUNGER M6 X 13', 'B', 11, 214280, 0, 0, NULL, NULL),
(210, '2024-10-16', '131210-M-B-0006', 'SCRAPER SIZE 2\" - VIPER', 'B', 4, 26668, 0, 0, NULL, NULL),
(211, '2024-10-16', '131210-M-B-0007', 'BAUT MS HEX M 12 X 70', 'B', 1, 1100, 0, 0, NULL, NULL),
(212, '2024-10-16', '131210-M-B-0008', 'BAUT MS HEX M 12 X110', 'B', 133, 159600, 0, 0, NULL, NULL),
(213, '2024-10-16', '131210-M-B-0009', 'BAUT MS HEX M 12 X125', 'B', 1, 1250, 0, 0, NULL, NULL),
(214, '2024-10-16', '131210-M-B-0010', 'BAUT MS JF M 3 X 06', 'B', 20, 2000, 0, 0, NULL, NULL),
(215, '2024-10-16', '131110-M-A-0001', '705 Ã˜ 40', 'A', 0, 488298, 0, 0, NULL, NULL),
(216, '2024-10-16', '131110-M-A-0002', 'SPRING STEEL # 08 x 200', 'A', 1, 738000, 0, 0, NULL, NULL),
(217, '2024-10-16', '131110-M-A-0003', 'ALLUMINIUM 5052 # 10 x 1200 x 2400', 'A', 0, 6100000, 0, 0, NULL, NULL),
(218, '2024-10-16', '131110-M-A-0004', 'MS # 10 x 1200 x 2400', 'A', 0, 3355000, 0, 0, NULL, NULL),
(219, '2024-10-16', '131110-M-A-0005', 'ALLUMINIUM 7075 # 50 x 50', 'A', 0, 1006200, 0, 0, NULL, NULL),
(220, '2024-10-16', '131110-M-A-0006', 'SUS 304 STRIP 10 x 20', 'A', 32, 100000, 0, 0, NULL, NULL),
(221, '2024-10-16', '131110-M-A-0007', 'POM PUTIH ? 90', 'A', 20, 1630000, 0, 0, NULL, NULL),
(222, '2024-10-16', '131110-M-A-0008', 'BRONZE AB2 ? 40', 'A', 5, 4200000, 0, 0, NULL, NULL),
(223, '2024-10-16', '131110-M-A-0009', 'VCN ? 90', 'A', 4, 2923200, 0, 0, NULL, NULL),
(224, '2024-10-16', '131110-M-A-0010', 'STST PIPE 316 ? 3/4\" SCH 40', 'A', 3, 356666, 0, 0, NULL, NULL),
(225, '2024-10-16', '131120-M-G-0001', 'KAYU HARDBOARD 3 X 125 X 25', 'G', 500, 750, 0, 0, NULL, NULL),
(226, '2024-10-16', '131120-M-G-0002', 'KAYU TOP TABLE # 20 X 1200 X 2400 HPL PUTIH. LIST PVC', 'G', 1, 1348650, 0, 1, NULL, NULL),
(227, '2024-10-16', '131120-M-G-0003', 'KAYU WOOD WORKING WB ( 1778 X 686 X 965 mm ) W/BENCH VICE CLAMP 7.5\"', 'G', 0, 6049500, 0, 0, NULL, NULL),
(228, '2024-10-16', '131120-M-G-0004', 'RODA ALMARI ALPHA Dia 19 mm', 'G', 232, 3000, 0, 0, NULL, NULL),
(229, '2024-10-16', '131120-M-G-0005', '317220 REL HUBEN SD-12 TOP 3 U', 'G', 4, 27750, 0, 0, NULL, NULL),
(230, '2024-10-16', '131120-M-G-0006', '317216 REL HUBEN SD-12 BOTOM 3M', 'G', 4, 27750, 0, 0, NULL, NULL),
(231, '2024-10-16', '131120-M-G-0007', 'KACA CLEAR # 6MM X 849CM X 1630 CM + LUBANG 4 BUAH GOSOK BATU', 'G', 0, 397300, 0, 0, NULL, NULL),
(232, '2024-10-16', '131120-M-G-0008', 'Playwood 275 x 400 x 25 Radius Sudut R10mm. LIST DUCO CREAM. FINISHING CLEA', 'G', 0, 119300, 0, 0, NULL, NULL),
(233, '2024-10-16', '131120-M-G-0009', 'KAYU SANDARAN MULTIPROPUSE FOLDING 333353', 'G', 0, 44400, 0, 0, NULL, NULL),
(234, '2024-10-16', '131110-umum-1008', 'pc', 'umum', 10, 35000, 0, 0, NULL, NULL),
(235, '2024-10-16', '131210-M-B-0011', 'Barang 1', 'B', 456, 405840, 0, 0, NULL, NULL),
(236, '2024-10-16', '131210-M-B-0012', 'Barang 2', 'B', 74, 99900, 0, 0, NULL, NULL),
(237, '2024-10-16', '131210-M-B-0013', 'Barang 3', 'B', 53, 169600, 0, 0, NULL, NULL),
(238, '2024-10-16', '131210-M-B-0014', 'Barang 4', 'B', 14, 72464, 0, 0, NULL, NULL),
(239, '2024-10-16', '131210-M-B-0015', 'Barang 5', 'B', 11, 214280, 0, 0, NULL, NULL),
(240, '2024-10-16', '131210-M-B-0016', 'Barang 6', 'B', 4, 26668, 0, 0, NULL, NULL),
(241, '2024-10-16', '131210-M-B-0017', 'Barang 7', 'B', 1, 1100, 0, 0, NULL, NULL),
(242, '2024-10-16', '131210-M-B-0018', 'Barang 8', 'B', 133, 159600, 0, 0, NULL, NULL),
(243, '2024-10-16', '131210-M-B-0019', 'Barang 9', 'B', 1, 1250, 0, 0, NULL, NULL),
(244, '2024-10-16', '131210-M-B-0020', 'Barang 10', 'B', 20, 2000, 0, 0, NULL, NULL),
(245, '2024-10-16', '131110-M-A-0011', 'Barang 11', 'A', 0, 488298, 0, 0, NULL, NULL),
(246, '2024-10-16', '131110-M-A-0012', 'Barang 12', 'A', 1, 738000, 0, 0, NULL, NULL),
(247, '2024-10-16', '131110-M-A-0013', 'Barang 13', 'A', 0, 6100000, 0, 0, NULL, NULL),
(248, '2024-10-16', '131110-M-A-0014', 'Barang 14', 'A', 0, 3355000, 0, 0, NULL, NULL),
(249, '2024-10-16', '131110-M-A-0015', 'Barang 15', 'A', 0, 1006200, 0, 0, NULL, NULL),
(250, '2024-10-16', '131110-M-A-0016', 'Barang 16', 'A', 32, 100000, 0, 0, NULL, NULL),
(251, '2024-10-16', '131110-M-A-0017', 'Barang 17', 'A', 20, 1630000, 0, 0, NULL, NULL),
(252, '2024-10-16', '131110-M-A-0018', 'Barang 18', 'A', 5, 4200000, 0, 0, NULL, NULL),
(253, '2024-10-16', '131110-M-A-0019', 'Barang 19', 'A', 4, 2923200, 0, 0, NULL, NULL),
(254, '2024-10-16', '131110-M-A-0020', 'Barang 20', 'A', 3, 356666, 0, 0, NULL, NULL),
(255, '2024-10-16', '131120-W-G-0010', 'Barang 21', 'G', 500, 750, 0, 0, NULL, NULL),
(256, '2024-10-16', '131120-W-G-0011', 'Barang 22', 'G', 2, 1348650, 0, 0, NULL, NULL),
(257, '2024-10-16', '131120-W-G-0012', 'Barang 23', 'G', 0, 6049500, 0, 0, NULL, NULL),
(258, '2024-10-16', '131120-W-G-0013', 'Barang 24', 'G', 0, 996502, 0, 0, NULL, NULL),
(259, '2024-10-16', '131120-W-G-0014', 'Barang 25', 'G', 232, 3000, 0, 0, NULL, NULL),
(260, '2024-10-16', '131120-W-G-0015', 'Barang 26', 'G', 4, 27750, 0, 0, NULL, NULL),
(261, '2024-10-16', '131120-W-G-0016', 'Barang 27', 'G', 4, 27750, 0, 0, NULL, NULL),
(262, '2024-10-16', '131120-W-G-0017', 'Barang 28', 'G', 0, 397300, 0, 0, NULL, NULL),
(263, '2024-10-16', '131120-W-G-0018', 'Barang 29', 'G', 0, 119300, 0, 0, NULL, NULL),
(264, '2024-10-16', '131120-W-G-0019', 'Barang 30', 'G', 0, 44400, 0, 0, NULL, NULL),
(265, '2024-10-17', '131120-GHP-1003', 'tes 1', 'GHP', 600, 40000, 0, 0, NULL, NULL),
(266, '2024-10-17', '135120-GBBM-1001', 'bensin pertamax', 'GBBM', 957, 35000, 0, 0, NULL, NULL),
(267, '2024-10-17', '131120-MSH-1004', 'SPCC 0,8', 'MSH', 9955, 15000, 0, 0, NULL, NULL),
(268, '2024-10-17', '136310-BSPL-1005', 'packing kardus', 'BSPL', 1490, 50000, 0, 0, NULL, NULL),
(269, '2024-10-17', '131110-G-1006', 'INSERT ZTFD0303-MG/YBG302', 'B', 1, 85000, 0, 0, NULL, NULL),
(270, '2024-10-17', '131110-G-1007', 'Pipa ⌀ 10', 'G', 35, 30000, 0, 0, NULL, NULL),
(271, '2024-10-17', '131210-M-B-0001', 'BAUT BAJA IMBUS M 6 X 25 - A', 'B', 436, 405840, 0, 0, NULL, NULL),
(272, '2024-10-17', '131210-M-B-0002', 'CIRCLIP FOR SHAFT ? 19', 'B', 74, 99900, 0, 0, NULL, NULL),
(273, '2024-10-17', '131210-M-B-0003', 'BAUT MS HEX M 12 X 60', 'B', 38, 169600, 0, 0, NULL, NULL),
(274, '2024-10-17', '131210-M-B-0004', 'DOWEL PIN ? 6 X 10', 'B', 14, 72464, 0, 0, NULL, NULL),
(275, '2024-10-17', '131210-M-B-0005', 'BALL PLUNGER M6 X 13', 'B', 11, 214280, 0, 0, NULL, NULL),
(276, '2024-10-17', '131210-M-B-0006', 'SCRAPER SIZE 2\" - VIPER', 'B', 4, 26668, 0, 0, NULL, NULL),
(277, '2024-10-17', '131210-M-B-0007', 'BAUT MS HEX M 12 X 70', 'B', 1, 1100, 0, 0, NULL, NULL),
(278, '2024-10-17', '131210-M-B-0008', 'BAUT MS HEX M 12 X110', 'B', 133, 159600, 0, 0, NULL, NULL),
(279, '2024-10-17', '131210-M-B-0009', 'BAUT MS HEX M 12 X125', 'B', 1, 1250, 0, 0, NULL, NULL),
(280, '2024-10-17', '131210-M-B-0010', 'BAUT MS JF M 3 X 06', 'B', 20, 2000, 0, 0, NULL, NULL),
(281, '2024-10-17', '131110-M-A-0001', '705 Ã˜ 40', 'A', 0, 488298, 0, 0, NULL, NULL),
(282, '2024-10-17', '131110-M-A-0002', 'SPRING STEEL # 08 x 200', 'A', 1, 738000, 0, 0, NULL, NULL),
(283, '2024-10-17', '131110-M-A-0003', 'ALLUMINIUM 5052 # 10 x 1200 x 2400', 'A', 0, 6100000, 0, 0, NULL, NULL),
(284, '2024-10-17', '131110-M-A-0004', 'MS # 10 x 1200 x 2400', 'A', 0, 3355000, 0, 0, NULL, NULL),
(285, '2024-10-17', '131110-M-A-0005', 'ALLUMINIUM 7075 # 50 x 50', 'A', 0, 1006200, 0, 0, NULL, NULL),
(286, '2024-10-17', '131110-M-A-0006', 'SUS 304 STRIP 10 x 20', 'A', 32, 100000, 0, 0, NULL, NULL),
(287, '2024-10-17', '131110-M-A-0007', 'POM PUTIH ? 90', 'A', 20, 1630000, 0, 0, NULL, NULL),
(288, '2024-10-17', '131110-M-A-0008', 'BRONZE AB2 ? 40', 'A', 5, 4200000, 0, 0, NULL, NULL),
(289, '2024-10-17', '131110-M-A-0009', 'VCN ? 90', 'A', 4, 2923200, 0, 0, NULL, NULL),
(290, '2024-10-17', '131110-M-A-0010', 'STST PIPE 316 ? 3/4\" SCH 40', 'A', 3, 356666, 0, 0, NULL, NULL),
(291, '2024-10-17', '131120-M-G-0001', 'KAYU HARDBOARD 3 X 125 X 25', 'G', 500, 750, 0, 0, NULL, NULL),
(292, '2024-10-17', '131120-M-G-0002', 'KAYU TOP TABLE # 20 X 1200 X 2400 HPL PUTIH. LIST PVC', 'G', 1, 1348650, 0, 0, NULL, NULL),
(293, '2024-10-17', '131120-M-G-0003', 'KAYU WOOD WORKING WB ( 1778 X 686 X 965 mm ) W/BENCH VICE CLAMP 7.5\"', 'G', 0, 6049500, 0, 0, NULL, NULL),
(294, '2024-10-17', '131120-M-G-0004', 'RODA ALMARI ALPHA Dia 19 mm', 'G', 232, 3000, 0, 0, NULL, NULL),
(295, '2024-10-17', '131120-M-G-0005', '317220 REL HUBEN SD-12 TOP 3 U', 'G', 4, 27750, 0, 0, NULL, NULL),
(296, '2024-10-17', '131120-M-G-0006', '317216 REL HUBEN SD-12 BOTOM 3M', 'G', 4, 27750, 0, 0, NULL, NULL),
(297, '2024-10-17', '131120-M-G-0007', 'KACA CLEAR # 6MM X 849CM X 1630 CM + LUBANG 4 BUAH GOSOK BATU', 'G', 0, 397300, 0, 0, NULL, NULL),
(298, '2024-10-17', '131120-M-G-0008', 'Playwood 275 x 400 x 25 Radius Sudut R10mm. LIST DUCO CREAM. FINISHING CLEA', 'G', 0, 119300, 0, 0, NULL, NULL),
(299, '2024-10-17', '131120-M-G-0009', 'KAYU SANDARAN MULTIPROPUSE FOLDING 333353', 'G', 0, 44400, 0, 0, NULL, NULL),
(300, '2024-10-17', '131110-umum-1008', 'pc', 'umum', 10, 35000, 0, 0, NULL, NULL),
(301, '2024-10-17', '131210-M-B-0011', 'Barang 1', 'B', 456, 405840, 0, 0, NULL, NULL),
(302, '2024-10-17', '131210-M-B-0012', 'Barang 2', 'B', 74, 99900, 0, 0, NULL, NULL),
(303, '2024-10-17', '131210-M-B-0013', 'Barang 3', 'B', 53, 169600, 0, 0, NULL, NULL),
(304, '2024-10-17', '131210-M-B-0014', 'Barang 4', 'B', 14, 72464, 0, 0, NULL, NULL),
(305, '2024-10-17', '131210-M-B-0015', 'Barang 5', 'B', 11, 214280, 0, 0, NULL, NULL),
(306, '2024-10-17', '131210-M-B-0016', 'Barang 6', 'B', 4, 26668, 0, 0, NULL, NULL),
(307, '2024-10-17', '131210-M-B-0017', 'Barang 7', 'B', 1, 1100, 0, 0, NULL, NULL),
(308, '2024-10-17', '131210-M-B-0018', 'Barang 8', 'B', 133, 159600, 0, 0, NULL, NULL),
(309, '2024-10-17', '131210-M-B-0019', 'Barang 9', 'B', 1, 1250, 0, 0, NULL, NULL),
(310, '2024-10-17', '131210-M-B-0020', 'Barang 10', 'B', 20, 2000, 0, 0, NULL, NULL),
(311, '2024-10-17', '131110-M-A-0011', 'Barang 11', 'A', 0, 488298, 0, 0, NULL, NULL),
(312, '2024-10-17', '131110-M-A-0012', 'Barang 12', 'A', 1, 738000, 0, 0, NULL, NULL),
(313, '2024-10-17', '131110-M-A-0013', 'Barang 13', 'A', 0, 6100000, 0, 0, NULL, NULL),
(314, '2024-10-17', '131110-M-A-0014', 'Barang 14', 'A', 0, 3355000, 0, 0, NULL, NULL),
(315, '2024-10-17', '131110-M-A-0015', 'Barang 15', 'A', 0, 1006200, 0, 0, NULL, NULL),
(316, '2024-10-17', '131110-M-A-0016', 'Barang 16', 'A', 32, 100000, 0, 0, NULL, NULL),
(317, '2024-10-17', '131110-M-A-0017', 'Barang 17', 'A', 20, 1630000, 0, 0, NULL, NULL),
(318, '2024-10-17', '131110-M-A-0018', 'Barang 18', 'A', 5, 4200000, 0, 0, NULL, NULL),
(319, '2024-10-17', '131110-M-A-0019', 'Barang 19', 'A', 4, 2923200, 0, 0, NULL, NULL),
(320, '2024-10-17', '131110-M-A-0020', 'Barang 20', 'A', 3, 356666, 0, 0, NULL, NULL),
(321, '2024-10-17', '131120-W-G-0010', 'Barang 21', 'G', 500, 750, 0, 0, NULL, NULL),
(322, '2024-10-17', '131120-W-G-0011', 'Barang 22', 'G', 2, 1348650, 0, 0, NULL, NULL),
(323, '2024-10-17', '131120-W-G-0012', 'Barang 23', 'G', 0, 6049500, 0, 0, NULL, NULL),
(324, '2024-10-17', '131120-W-G-0013', 'Barang 24', 'G', 0, 996502, 0, 0, NULL, NULL),
(325, '2024-10-17', '131120-W-G-0014', 'Barang 25', 'G', 232, 3000, 0, 0, NULL, NULL),
(326, '2024-10-17', '131120-W-G-0015', 'Barang 26', 'G', 4, 27750, 0, 0, NULL, NULL),
(327, '2024-10-17', '131120-W-G-0016', 'Barang 27', 'G', 4, 27750, 0, 0, NULL, NULL),
(328, '2024-10-17', '131120-W-G-0017', 'Barang 28', 'G', 0, 397300, 0, 0, NULL, NULL),
(329, '2024-10-17', '131120-W-G-0018', 'Barang 29', 'G', 0, 119300, 0, 0, NULL, NULL),
(330, '2024-10-17', '131120-W-G-0019', 'Barang 30', 'G', 0, 44400, 0, 0, NULL, NULL),
(331, '2024-10-19', '131120-GHP-1003', 'tes 1', 'GHP', 600, 40000, 0, 0, NULL, NULL),
(332, '2024-10-19', '135120-GBBM-1001', 'bensin pertamax', 'GBBM', 957, 35000, 0, 0, NULL, NULL),
(333, '2024-10-19', '131120-MSH-1004', 'SPCC 0,8', 'MSH', 9955, 15000, 0, 0, NULL, NULL),
(334, '2024-10-19', '136310-BSPL-1005', 'packing kardus', 'BSPL', 1490, 50000, 0, 0, NULL, NULL),
(335, '2024-10-19', '131110-G-1006', 'INSERT ZTFD0303-MG/YBG302', 'B', 1, 85000, 0, 0, NULL, NULL),
(336, '2024-10-19', '131110-G-1007', 'Pipa ⌀ 10', 'G', 35, 30000, 0, 0, NULL, NULL),
(337, '2024-10-19', '131210-M-B-0001', 'BAUT BAJA IMBUS M 6 X 25 - A', 'B', 436, 405840, 0, 0, NULL, NULL),
(338, '2024-10-19', '131210-M-B-0002', 'CIRCLIP FOR SHAFT ? 19', 'B', 74, 99900, 0, 0, NULL, NULL),
(339, '2024-10-19', '131210-M-B-0003', 'BAUT MS HEX M 12 X 60', 'B', 38, 169600, 0, 0, NULL, NULL),
(340, '2024-10-19', '131210-M-B-0004', 'DOWEL PIN ? 6 X 10', 'B', 14, 72464, 0, 0, NULL, NULL),
(341, '2024-10-19', '131210-M-B-0005', 'BALL PLUNGER M6 X 13', 'B', 11, 214280, 0, 0, NULL, NULL),
(342, '2024-10-19', '131210-M-B-0006', 'SCRAPER SIZE 2\" - VIPER', 'B', 4, 26668, 0, 0, NULL, NULL),
(343, '2024-10-19', '131210-M-B-0007', 'BAUT MS HEX M 12 X 70', 'B', 1, 1100, 0, 0, NULL, NULL),
(344, '2024-10-19', '131210-M-B-0008', 'BAUT MS HEX M 12 X110', 'B', 133, 159600, 0, 0, NULL, NULL),
(345, '2024-10-19', '131210-M-B-0009', 'BAUT MS HEX M 12 X125', 'B', 1, 1250, 0, 0, NULL, NULL),
(346, '2024-10-19', '131210-M-B-0010', 'BAUT MS JF M 3 X 06', 'B', 20, 2000, 0, 0, NULL, NULL),
(347, '2024-10-19', '131110-M-A-0001', '705 Ã˜ 40', 'A', 0, 488298, 0, 0, NULL, NULL),
(348, '2024-10-19', '131110-M-A-0002', 'SPRING STEEL # 08 x 200', 'A', 1, 738000, 0, 0, NULL, NULL),
(349, '2024-10-19', '131110-M-A-0003', 'ALLUMINIUM 5052 # 10 x 1200 x 2400', 'A', 0, 6100000, 0, 0, NULL, NULL),
(350, '2024-10-19', '131110-M-A-0004', 'MS # 10 x 1200 x 2400', 'A', 0, 3355000, 0, 0, NULL, NULL),
(351, '2024-10-19', '131110-M-A-0005', 'ALLUMINIUM 7075 # 50 x 50', 'A', 0, 1006200, 0, 0, NULL, NULL),
(352, '2024-10-19', '131110-M-A-0006', 'SUS 304 STRIP 10 x 20', 'A', 32, 100000, 0, 0, NULL, NULL),
(353, '2024-10-19', '131110-M-A-0007', 'POM PUTIH ? 90', 'A', 20, 1630000, 0, 0, NULL, NULL),
(354, '2024-10-19', '131110-M-A-0008', 'BRONZE AB2 ? 40', 'A', 5, 4200000, 0, 0, NULL, NULL),
(355, '2024-10-19', '131110-M-A-0009', 'VCN ? 90', 'A', 4, 2923200, 0, 0, NULL, NULL),
(356, '2024-10-19', '131110-M-A-0010', 'STST PIPE 316 ? 3/4\" SCH 40', 'A', 3, 356666, 0, 0, NULL, NULL),
(357, '2024-10-19', '131120-M-G-0001', 'KAYU HARDBOARD 3 X 125 X 25', 'G', 500, 750, 0, 0, NULL, NULL),
(358, '2024-10-19', '131120-M-G-0002', 'KAYU TOP TABLE # 20 X 1200 X 2400 HPL PUTIH. LIST PVC', 'G', 1, 1348650, 0, 0, NULL, NULL),
(359, '2024-10-19', '131120-M-G-0003', 'KAYU WOOD WORKING WB ( 1778 X 686 X 965 mm ) W/BENCH VICE CLAMP 7.5\"', 'G', 0, 6049500, 0, 0, NULL, NULL),
(360, '2024-10-19', '131120-M-G-0004', 'RODA ALMARI ALPHA Dia 19 mm', 'G', 232, 3000, 0, 0, NULL, NULL),
(361, '2024-10-19', '131120-M-G-0005', '317220 REL HUBEN SD-12 TOP 3 U', 'G', 4, 27750, 0, 0, NULL, NULL),
(362, '2024-10-19', '131120-M-G-0006', '317216 REL HUBEN SD-12 BOTOM 3M', 'G', 4, 27750, 0, 0, NULL, NULL),
(363, '2024-10-19', '131120-M-G-0007', 'KACA CLEAR # 6MM X 849CM X 1630 CM + LUBANG 4 BUAH GOSOK BATU', 'G', 0, 397300, 0, 0, NULL, NULL),
(364, '2024-10-19', '131120-M-G-0008', 'Playwood 275 x 400 x 25 Radius Sudut R10mm. LIST DUCO CREAM. FINISHING CLEA', 'G', 0, 119300, 0, 0, NULL, NULL),
(365, '2024-10-19', '131120-M-G-0009', 'KAYU SANDARAN MULTIPROPUSE FOLDING 333353', 'G', 0, 44400, 0, 0, NULL, NULL),
(366, '2024-10-19', '131110-umum-1008', 'pc', 'umum', 10, 35000, 0, 0, NULL, NULL),
(367, '2024-10-19', '131210-M-B-0011', 'Barang 1', 'B', 456, 405840, 0, 0, NULL, NULL),
(368, '2024-10-19', '131210-M-B-0012', 'Barang 2', 'B', 74, 99900, 0, 0, NULL, NULL),
(369, '2024-10-19', '131210-M-B-0013', 'Barang 3', 'B', 53, 169600, 0, 0, NULL, NULL),
(370, '2024-10-19', '131210-M-B-0014', 'Barang 4', 'B', 14, 72464, 0, 0, NULL, NULL),
(371, '2024-10-19', '131210-M-B-0015', 'Barang 5', 'B', 11, 214280, 0, 0, NULL, NULL),
(372, '2024-10-19', '131210-M-B-0016', 'Barang 6', 'B', 4, 26668, 0, 0, NULL, NULL),
(373, '2024-10-19', '131210-M-B-0017', 'Barang 7', 'B', 1, 1100, 0, 0, NULL, NULL),
(374, '2024-10-19', '131210-M-B-0018', 'Barang 8', 'B', 133, 159600, 0, 0, NULL, NULL),
(375, '2024-10-19', '131210-M-B-0019', 'Barang 9', 'B', 1, 1250, 0, 0, NULL, NULL),
(376, '2024-10-19', '131210-M-B-0020', 'Barang 10', 'B', 20, 2000, 0, 0, NULL, NULL),
(377, '2024-10-19', '131110-M-A-0011', 'Barang 11', 'A', 0, 488298, 0, 0, NULL, NULL),
(378, '2024-10-19', '131110-M-A-0012', 'Barang 12', 'A', 1, 738000, 0, 0, NULL, NULL),
(379, '2024-10-19', '131110-M-A-0013', 'Barang 13', 'A', 0, 6100000, 0, 0, NULL, NULL),
(380, '2024-10-19', '131110-M-A-0014', 'Barang 14', 'A', 0, 3355000, 0, 0, NULL, NULL),
(381, '2024-10-19', '131110-M-A-0015', 'Barang 15', 'A', 0, 1006200, 0, 0, NULL, NULL),
(382, '2024-10-19', '131110-M-A-0016', 'Barang 16', 'A', 32, 100000, 0, 0, NULL, NULL),
(383, '2024-10-19', '131110-M-A-0017', 'Barang 17', 'A', 20, 1630000, 0, 0, NULL, NULL),
(384, '2024-10-19', '131110-M-A-0018', 'Barang 18', 'A', 5, 4200000, 0, 0, NULL, NULL),
(385, '2024-10-19', '131110-M-A-0019', 'Barang 19', 'A', 4, 2923200, 0, 0, NULL, NULL),
(386, '2024-10-19', '131110-M-A-0020', 'Barang 20', 'A', 3, 356666, 0, 0, NULL, NULL),
(387, '2024-10-19', '131120-W-G-0010', 'Barang 21', 'G', 500, 750, 0, 0, NULL, NULL),
(388, '2024-10-19', '131120-W-G-0011', 'Barang 22', 'G', 2, 1348650, 0, 0, NULL, NULL),
(389, '2024-10-19', '131120-W-G-0012', 'Barang 23', 'G', 0, 6049500, 0, 0, NULL, NULL),
(390, '2024-10-19', '131120-W-G-0013', 'Barang 24', 'G', 0, 996502, 0, 0, NULL, NULL),
(391, '2024-10-19', '131120-W-G-0014', 'Barang 25', 'G', 232, 3000, 0, 0, NULL, NULL),
(392, '2024-10-19', '131120-W-G-0015', 'Barang 26', 'G', 4, 27750, 0, 0, NULL, NULL),
(393, '2024-10-19', '131120-W-G-0016', 'Barang 27', 'G', 4, 27750, 0, 0, NULL, NULL),
(394, '2024-10-19', '131120-W-G-0017', 'Barang 28', 'G', 0, 397300, 0, 0, NULL, NULL),
(395, '2024-10-19', '131120-W-G-0018', 'Barang 29', 'G', 0, 119300, 0, 0, NULL, NULL),
(396, '2024-10-19', '131120-W-G-0019', 'Barang 30', 'G', 0, 44400, 0, 0, NULL, NULL),
(397, '2024-10-22', '131120-GHP-1003', 'tes 1', 'GHP', 600, 40000, 0, 0, NULL, NULL),
(398, '2024-10-22', '135120-GBBM-1001', 'bensin pertamax', 'GBBM', 957, 35000, 0, 0, NULL, NULL),
(399, '2024-10-22', '131120-MSH-1004', 'SPCC 0,8', 'MSH', 9955, 15000, 0, 0, NULL, NULL),
(400, '2024-10-22', '136310-BSPL-1005', 'packing kardus', 'BSPL', 1490, 50000, 0, 0, NULL, NULL),
(401, '2024-10-22', '131110-G-1006', 'INSERT ZTFD0303-MG/YBG302', 'B', 1, 85000, 0, 0, NULL, NULL),
(402, '2024-10-22', '131110-G-1007', 'Pipa ⌀ 10', 'G', 35, 30000, 0, 0, NULL, NULL),
(403, '2024-10-22', '131210-M-B-0001', 'BAUT BAJA IMBUS M 6 X 25 - A', 'B', 436, 405840, 0, 0, NULL, NULL),
(404, '2024-10-22', '131210-M-B-0002', 'CIRCLIP FOR SHAFT ? 19', 'B', 74, 99900, 0, 0, NULL, NULL),
(405, '2024-10-22', '131210-M-B-0003', 'BAUT MS HEX M 12 X 60', 'B', 38, 169600, 0, 0, NULL, NULL),
(406, '2024-10-22', '131210-M-B-0004', 'DOWEL PIN ? 6 X 10', 'B', 14, 72464, 0, 0, NULL, NULL),
(407, '2024-10-22', '131210-M-B-0005', 'BALL PLUNGER M6 X 13', 'B', 11, 214280, 0, 0, NULL, NULL),
(408, '2024-10-22', '131210-M-B-0006', 'SCRAPER SIZE 2\" - VIPER', 'B', 4, 26668, 0, 0, NULL, NULL),
(409, '2024-10-22', '131210-M-B-0007', 'BAUT MS HEX M 12 X 70', 'B', 1, 1100, 0, 0, NULL, NULL),
(410, '2024-10-22', '131210-M-B-0008', 'BAUT MS HEX M 12 X110', 'B', 133, 159600, 0, 0, NULL, NULL),
(411, '2024-10-22', '131210-M-B-0009', 'BAUT MS HEX M 12 X125', 'B', 1, 1250, 0, 0, NULL, NULL),
(412, '2024-10-22', '131210-M-B-0010', 'BAUT MS JF M 3 X 06', 'B', 20, 2000, 0, 0, NULL, NULL),
(413, '2024-10-22', '131110-M-A-0001', '705 Ã˜ 40', 'A', 0, 488298, 0, 0, NULL, NULL),
(414, '2024-10-22', '131110-M-A-0002', 'SPRING STEEL # 08 x 200', 'A', 1, 738000, 0, 0, NULL, NULL),
(415, '2024-10-22', '131110-M-A-0003', 'ALLUMINIUM 5052 # 10 x 1200 x 2400', 'A', 0, 6100000, 0, 0, NULL, NULL),
(416, '2024-10-22', '131110-M-A-0004', 'MS # 10 x 1200 x 2400', 'A', 0, 3355000, 0, 0, NULL, NULL),
(417, '2024-10-22', '131110-M-A-0005', 'ALLUMINIUM 7075 # 50 x 50', 'A', 0, 1006200, 0, 0, NULL, NULL),
(418, '2024-10-22', '131110-M-A-0006', 'SUS 304 STRIP 10 x 20', 'A', 32, 100000, 0, 0, NULL, NULL),
(419, '2024-10-22', '131110-M-A-0007', 'POM PUTIH ? 90', 'A', 20, 1630000, 0, 0, NULL, NULL),
(420, '2024-10-22', '131110-M-A-0008', 'BRONZE AB2 ? 40', 'A', 5, 4200000, 0, 0, NULL, NULL),
(421, '2024-10-22', '131110-M-A-0009', 'VCN ? 90', 'A', 4, 2923200, 0, 0, NULL, NULL),
(422, '2024-10-22', '131110-M-A-0010', 'STST PIPE 316 ? 3/4\" SCH 40', 'A', 3, 356666, 0, 0, NULL, NULL),
(423, '2024-10-22', '131120-M-G-0001', 'KAYU HARDBOARD 3 X 125 X 25', 'G', 500, 750, 0, 0, NULL, NULL),
(424, '2024-10-22', '131120-M-G-0002', 'KAYU TOP TABLE # 20 X 1200 X 2400 HPL PUTIH. LIST PVC', 'G', 1, 1348650, 0, 0, NULL, NULL),
(425, '2024-10-22', '131120-M-G-0003', 'KAYU WOOD WORKING WB ( 1778 X 686 X 965 mm ) W/BENCH VICE CLAMP 7.5\"', 'G', 0, 6049500, 0, 0, NULL, NULL),
(426, '2024-10-22', '131120-M-G-0004', 'RODA ALMARI ALPHA Dia 19 mm', 'G', 232, 3000, 0, 0, NULL, NULL),
(427, '2024-10-22', '131120-M-G-0005', '317220 REL HUBEN SD-12 TOP 3 U', 'G', 4, 27750, 0, 0, NULL, NULL),
(428, '2024-10-22', '131120-M-G-0006', '317216 REL HUBEN SD-12 BOTOM 3M', 'G', 4, 27750, 0, 0, NULL, NULL),
(429, '2024-10-22', '131120-M-G-0007', 'KACA CLEAR # 6MM X 849CM X 1630 CM + LUBANG 4 BUAH GOSOK BATU', 'G', 0, 397300, 0, 0, NULL, NULL),
(430, '2024-10-22', '131120-M-G-0008', 'Playwood 275 x 400 x 25 Radius Sudut R10mm. LIST DUCO CREAM. FINISHING CLEA', 'G', 0, 119300, 0, 0, NULL, NULL),
(431, '2024-10-22', '131120-M-G-0009', 'KAYU SANDARAN MULTIPROPUSE FOLDING 333353', 'G', 0, 44400, 0, 0, NULL, NULL),
(432, '2024-10-22', '131110-umum-1008', 'pc', 'umum', 10, 35000, 0, 0, NULL, NULL),
(433, '2024-10-22', '131210-M-B-0011', 'Barang 1', 'B', 456, 405840, 0, 0, NULL, NULL),
(434, '2024-10-22', '131210-M-B-0012', 'Barang 2', 'B', 74, 99900, 0, 0, NULL, NULL),
(435, '2024-10-22', '131210-M-B-0013', 'Barang 3', 'B', 53, 169600, 0, 0, NULL, NULL),
(436, '2024-10-22', '131210-M-B-0014', 'Barang 4', 'B', 14, 72464, 0, 0, NULL, NULL),
(437, '2024-10-22', '131210-M-B-0015', 'Barang 5', 'B', 11, 214280, 0, 0, NULL, NULL),
(438, '2024-10-22', '131210-M-B-0016', 'Barang 6', 'B', 4, 26668, 0, 0, NULL, NULL),
(439, '2024-10-22', '131210-M-B-0017', 'Barang 7', 'B', 1, 1100, 0, 0, NULL, NULL),
(440, '2024-10-22', '131210-M-B-0018', 'Barang 8', 'B', 133, 159600, 0, 0, NULL, NULL),
(441, '2024-10-22', '131210-M-B-0019', 'Barang 9', 'B', 1, 1250, 0, 0, NULL, NULL),
(442, '2024-10-22', '131210-M-B-0020', 'Barang 10', 'B', 20, 2000, 0, 0, NULL, NULL),
(443, '2024-10-22', '131110-M-A-0011', 'Barang 11', 'A', 0, 488298, 0, 0, NULL, NULL),
(444, '2024-10-22', '131110-M-A-0012', 'Barang 12', 'A', 1, 738000, 0, 0, NULL, NULL),
(445, '2024-10-22', '131110-M-A-0013', 'Barang 13', 'A', 0, 6100000, 0, 0, NULL, NULL),
(446, '2024-10-22', '131110-M-A-0014', 'Barang 14', 'A', 0, 3355000, 0, 0, NULL, NULL),
(447, '2024-10-22', '131110-M-A-0015', 'Barang 15', 'A', 0, 1006200, 0, 0, NULL, NULL),
(448, '2024-10-22', '131110-M-A-0016', 'Barang 16', 'A', 32, 100000, 0, 0, NULL, NULL),
(449, '2024-10-22', '131110-M-A-0017', 'Barang 17', 'A', 20, 1630000, 0, 0, NULL, NULL),
(450, '2024-10-22', '131110-M-A-0018', 'Barang 18', 'A', 5, 4200000, 0, 0, NULL, NULL),
(451, '2024-10-22', '131110-M-A-0019', 'Barang 19', 'A', 4, 2923200, 0, 0, NULL, NULL),
(452, '2024-10-22', '131110-M-A-0020', 'Barang 20', 'A', 3, 356666, 0, 0, NULL, NULL),
(453, '2024-10-22', '131120-W-G-0010', 'Barang 21', 'G', 500, 750, 0, 0, NULL, NULL),
(454, '2024-10-22', '131120-W-G-0011', 'Barang 22', 'G', 2, 1348650, 0, 0, NULL, NULL),
(455, '2024-10-22', '131120-W-G-0012', 'Barang 23', 'G', 0, 6049500, 0, 0, NULL, NULL),
(456, '2024-10-22', '131120-W-G-0013', 'Barang 24', 'G', 0, 996502, 0, 0, NULL, NULL),
(457, '2024-10-22', '131120-W-G-0014', 'Barang 25', 'G', 232, 3000, 0, 0, NULL, NULL),
(458, '2024-10-22', '131120-W-G-0015', 'Barang 26', 'G', 4, 27750, 0, 0, NULL, NULL),
(459, '2024-10-22', '131120-W-G-0016', 'Barang 27', 'G', 4, 27750, 0, 0, NULL, NULL),
(460, '2024-10-22', '131120-W-G-0017', 'Barang 28', 'G', 0, 397300, 0, 0, NULL, NULL),
(461, '2024-10-22', '131120-W-G-0018', 'Barang 29', 'G', 0, 119300, 0, 0, NULL, NULL),
(462, '2024-10-22', '131120-W-G-0019', 'Barang 30', 'G', 0, 44400, 0, 0, NULL, NULL),
(463, '2024-10-28', '131120-GHP-1003', 'tes 1', 'GHP', 600, 40000, 0, 0, NULL, NULL),
(464, '2024-10-28', '135120-GBBM-1001', 'bensin pertamax', 'GBBM', 957, 35000, 0, 0, NULL, NULL),
(465, '2024-10-28', '131120-MSH-1004', 'SPCC 0,8', 'MSH', 9930, 15000, 0, 25, NULL, NULL),
(466, '2024-10-28', '136310-BSPL-1005', 'packing kardus', 'BSPL', 1490, 50000, 0, 0, NULL, NULL),
(467, '2024-10-28', '131110-G-1006', 'INSERT ZTFD0303-MG/YBG302', 'B', 1, 85000, 0, 0, NULL, NULL),
(468, '2024-10-28', '131110-G-1007', 'Pipa ⌀ 10', 'G', 35, 30000, 0, 0, NULL, NULL),
(469, '2024-10-28', '131210-M-B-0001', 'BAUT BAJA IMBUS M 6 X 25 - A', 'B', 426, 405840, 0, 10, NULL, NULL),
(470, '2024-10-28', '131210-M-B-0002', 'CIRCLIP FOR SHAFT ? 19', 'B', 74, 99900, 0, 0, NULL, NULL),
(471, '2024-10-28', '131210-M-B-0003', 'BAUT MS HEX M 12 X 60', 'B', 38, 169600, 0, 0, NULL, NULL),
(472, '2024-10-28', '131210-M-B-0004', 'DOWEL PIN ? 6 X 10', 'B', 14, 72464, 0, 0, NULL, NULL),
(473, '2024-10-28', '131210-M-B-0005', 'BALL PLUNGER M6 X 13', 'B', 11, 214280, 0, 0, NULL, NULL),
(474, '2024-10-28', '131210-M-B-0006', 'SCRAPER SIZE 2\" - VIPER', 'B', 4, 26668, 0, 0, NULL, NULL),
(475, '2024-10-28', '131210-M-B-0007', 'BAUT MS HEX M 12 X 70', 'B', 1, 1100, 0, 0, NULL, NULL),
(476, '2024-10-28', '131210-M-B-0008', 'BAUT MS HEX M 12 X110', 'B', 133, 159600, 0, 0, NULL, NULL),
(477, '2024-10-28', '131210-M-B-0009', 'BAUT MS HEX M 12 X125', 'B', 1, 1250, 0, 0, NULL, NULL),
(478, '2024-10-28', '131210-M-B-0010', 'BAUT MS JF M 3 X 06', 'B', 20, 2000, 0, 0, NULL, NULL),
(479, '2024-10-28', '131110-M-A-0001', '705 Ã˜ 40', 'A', 0, 488298, 0, 0, NULL, NULL),
(480, '2024-10-28', '131110-M-A-0002', 'SPRING STEEL # 08 x 200', 'A', 1, 738000, 0, 0, NULL, NULL),
(481, '2024-10-28', '131110-M-A-0003', 'ALLUMINIUM 5052 # 10 x 1200 x 2400', 'A', 0, 6100000, 0, 0, NULL, NULL),
(482, '2024-10-28', '131110-M-A-0004', 'MS # 10 x 1200 x 2400', 'A', 0, 3355000, 0, 0, NULL, NULL),
(483, '2024-10-28', '131110-M-A-0005', 'ALLUMINIUM 7075 # 50 x 50', 'A', 0, 1006200, 0, 0, NULL, NULL),
(484, '2024-10-28', '131110-M-A-0006', 'SUS 304 STRIP 10 x 20', 'A', 32, 100000, 0, 0, NULL, NULL),
(485, '2024-10-28', '131110-M-A-0007', 'POM PUTIH ? 90', 'A', 20, 1630000, 0, 0, NULL, NULL),
(486, '2024-10-28', '131110-M-A-0008', 'BRONZE AB2 ? 40', 'A', 5, 4200000, 0, 0, NULL, NULL),
(487, '2024-10-28', '131110-M-A-0009', 'VCN ? 90', 'A', 4, 2923200, 0, 0, NULL, NULL),
(488, '2024-10-28', '131110-M-A-0010', 'STST PIPE 316 ? 3/4\" SCH 40', 'A', 3, 356666, 0, 0, NULL, NULL),
(489, '2024-10-28', '131120-M-G-0001', 'KAYU HARDBOARD 3 X 125 X 25', 'G', 500, 750, 0, 0, NULL, NULL),
(490, '2024-10-28', '131120-M-G-0002', 'KAYU TOP TABLE # 20 X 1200 X 2400 HPL PUTIH. LIST PVC', 'G', 1, 1348650, 0, 0, NULL, NULL),
(491, '2024-10-28', '131120-M-G-0003', 'KAYU WOOD WORKING WB ( 1778 X 686 X 965 mm ) W/BENCH VICE CLAMP 7.5\"', 'G', 0, 6049500, 0, 0, NULL, NULL),
(492, '2024-10-28', '131120-M-G-0004', 'RODA ALMARI ALPHA Dia 19 mm', 'G', 232, 3000, 0, 0, NULL, NULL),
(493, '2024-10-28', '131120-M-G-0005', '317220 REL HUBEN SD-12 TOP 3 U', 'G', 4, 27750, 0, 0, NULL, NULL),
(494, '2024-10-28', '131120-M-G-0006', '317216 REL HUBEN SD-12 BOTOM 3M', 'G', 4, 27750, 0, 0, NULL, NULL),
(495, '2024-10-28', '131120-M-G-0007', 'KACA CLEAR # 6MM X 849CM X 1630 CM + LUBANG 4 BUAH GOSOK BATU', 'G', 0, 397300, 0, 0, NULL, NULL),
(496, '2024-10-28', '131120-M-G-0008', 'Playwood 275 x 400 x 25 Radius Sudut R10mm. LIST DUCO CREAM. FINISHING CLEA', 'G', 0, 119300, 0, 0, NULL, NULL),
(497, '2024-10-28', '131120-M-G-0009', 'KAYU SANDARAN MULTIPROPUSE FOLDING 333353', 'G', 0, 44400, 0, 0, NULL, NULL),
(498, '2024-10-28', '131110-umum-1008', 'pc', 'umum', 10, 35000, 0, 0, NULL, NULL),
(499, '2024-10-28', '131210-M-B-0011', 'Barang 1', 'B', 456, 405840, 0, 0, NULL, NULL),
(500, '2024-10-28', '131210-M-B-0012', 'Barang 2', 'B', 74, 99900, 0, 0, NULL, NULL),
(501, '2024-10-28', '131210-M-B-0013', 'Barang 3', 'B', 53, 169600, 0, 0, NULL, NULL),
(502, '2024-10-28', '131210-M-B-0014', 'Barang 4', 'B', 14, 72464, 0, 0, NULL, NULL),
(503, '2024-10-28', '131210-M-B-0015', 'Barang 5', 'B', 11, 214280, 0, 0, NULL, NULL),
(504, '2024-10-28', '131210-M-B-0016', 'Barang 6', 'B', 4, 26668, 0, 0, NULL, NULL),
(505, '2024-10-28', '131210-M-B-0017', 'Barang 7', 'B', 1, 1100, 0, 0, NULL, NULL),
(506, '2024-10-28', '131210-M-B-0018', 'Barang 8', 'B', 133, 159600, 0, 0, NULL, NULL),
(507, '2024-10-28', '131210-M-B-0019', 'Barang 9', 'B', 1, 1250, 0, 0, NULL, NULL),
(508, '2024-10-28', '131210-M-B-0020', 'Barang 10', 'B', 20, 2000, 0, 0, NULL, NULL),
(509, '2024-10-28', '131110-M-A-0011', 'Barang 11', 'A', 0, 488298, 0, 0, NULL, NULL),
(510, '2024-10-28', '131110-M-A-0012', 'Barang 12', 'A', 1, 738000, 0, 0, NULL, NULL),
(511, '2024-10-28', '131110-M-A-0013', 'Barang 13', 'A', 0, 6100000, 0, 0, NULL, NULL),
(512, '2024-10-28', '131110-M-A-0014', 'Barang 14', 'A', 0, 3355000, 0, 0, NULL, NULL),
(513, '2024-10-28', '131110-M-A-0015', 'Barang 15', 'A', 0, 1006200, 0, 0, NULL, NULL),
(514, '2024-10-28', '131110-M-A-0016', 'Barang 16', 'A', 32, 100000, 0, 0, NULL, NULL),
(515, '2024-10-28', '131110-M-A-0017', 'Barang 17', 'A', 20, 1630000, 0, 0, NULL, NULL),
(516, '2024-10-28', '131110-M-A-0018', 'Barang 18', 'A', 5, 4200000, 0, 0, NULL, NULL),
(517, '2024-10-28', '131110-M-A-0019', 'Barang 19', 'A', 4, 2923200, 0, 0, NULL, NULL),
(518, '2024-10-28', '131110-M-A-0020', 'Barang 20', 'A', 3, 356666, 0, 0, NULL, NULL),
(519, '2024-10-28', '131120-W-G-0010', 'Barang 21', 'G', 500, 750, 0, 0, NULL, NULL),
(520, '2024-10-28', '131120-W-G-0011', 'Barang 22', 'G', 2, 1348650, 0, 0, NULL, NULL),
(521, '2024-10-28', '131120-W-G-0012', 'Barang 23', 'G', 0, 6049500, 0, 0, NULL, NULL),
(522, '2024-10-28', '131120-W-G-0013', 'Barang 24', 'G', 0, 996502, 0, 0, NULL, NULL),
(523, '2024-10-28', '131120-W-G-0014', 'Barang 25', 'G', 232, 3000, 0, 0, NULL, NULL),
(524, '2024-10-28', '131120-W-G-0015', 'Barang 26', 'G', 4, 27750, 0, 0, NULL, NULL),
(525, '2024-10-28', '131120-W-G-0016', 'Barang 27', 'G', 4, 27750, 0, 0, NULL, NULL),
(526, '2024-10-28', '131120-W-G-0017', 'Barang 28', 'G', 0, 397300, 0, 0, NULL, NULL),
(527, '2024-10-28', '131120-W-G-0018', 'Barang 29', 'G', 0, 119300, 0, 0, NULL, NULL),
(528, '2024-10-28', '131120-W-G-0019', 'Barang 30', 'G', 0, 44400, 0, 0, NULL, NULL),
(529, '2024-10-29', '131120-GHP-1003', 'tes 1', 'GHP', 600, 40000, 0, 0, NULL, NULL),
(530, '2024-10-29', '135120-GBBM-1001', 'bensin pertamax', 'GBBM', 957, 35000, 0, 0, NULL, NULL);
INSERT INTO `recaps_barangs` (`id`, `recap_date`, `no_item`, `nama_barang`, `kode_log`, `jumlah`, `harga`, `entry`, `exit`, `created_at`, `updated_at`) VALUES
(531, '2024-10-29', '131120-MSH-1004', 'SPCC 0,8', 'MSH', 9930, 15000, 0, 0, NULL, NULL),
(532, '2024-10-29', '136310-BSPL-1005', 'packing kardus', 'BSPL', 1490, 50000, 0, 0, NULL, NULL),
(533, '2024-10-29', '131110-G-1006', 'INSERT ZTFD0303-MG/YBG302', 'B', 1, 85000, 0, 0, NULL, NULL),
(534, '2024-10-29', '131110-G-1007', 'Pipa ⌀ 10', 'G', 35, 30000, 0, 0, NULL, NULL),
(535, '2024-10-29', '131210-M-B-0001', 'BAUT BAJA IMBUS M 6 X 25 - A', 'B', 426, 405840, 0, 0, NULL, NULL),
(536, '2024-10-29', '131210-M-B-0002', 'CIRCLIP FOR SHAFT ? 19', 'B', 74, 99900, 0, 0, NULL, NULL),
(537, '2024-10-29', '131210-M-B-0003', 'BAUT MS HEX M 12 X 60', 'B', 38, 169600, 0, 0, NULL, NULL),
(538, '2024-10-29', '131210-M-B-0004', 'DOWEL PIN ? 6 X 10', 'B', 14, 72464, 0, 0, NULL, NULL),
(539, '2024-10-29', '131210-M-B-0005', 'BALL PLUNGER M6 X 13', 'B', 11, 214280, 0, 0, NULL, NULL),
(540, '2024-10-29', '131210-M-B-0006', 'SCRAPER SIZE 2\" - VIPER', 'B', 4, 26668, 0, 0, NULL, NULL),
(541, '2024-10-29', '131210-M-B-0007', 'BAUT MS HEX M 12 X 70', 'B', 1, 1100, 0, 0, NULL, NULL),
(542, '2024-10-29', '131210-M-B-0008', 'BAUT MS HEX M 12 X110', 'B', 133, 159600, 0, 0, NULL, NULL),
(543, '2024-10-29', '131210-M-B-0009', 'BAUT MS HEX M 12 X125', 'B', 1, 1250, 0, 0, NULL, NULL),
(544, '2024-10-29', '131210-M-B-0010', 'BAUT MS JF M 3 X 06', 'B', 20, 2000, 0, 0, NULL, NULL),
(545, '2024-10-29', '131110-M-A-0001', '705 Ã˜ 40', 'A', 0, 488298, 0, 0, NULL, NULL),
(546, '2024-10-29', '131110-M-A-0002', 'SPRING STEEL # 08 x 200', 'A', 1, 738000, 0, 0, NULL, NULL),
(547, '2024-10-29', '131110-M-A-0003', 'ALLUMINIUM 5052 # 10 x 1200 x 2400', 'A', 0, 6100000, 0, 0, NULL, NULL),
(548, '2024-10-29', '131110-M-A-0004', 'MS # 10 x 1200 x 2400', 'A', 0, 3355000, 0, 0, NULL, NULL),
(549, '2024-10-29', '131110-M-A-0005', 'ALLUMINIUM 7075 # 50 x 50', 'A', 0, 1006200, 0, 0, NULL, NULL),
(550, '2024-10-29', '131110-M-A-0006', 'SUS 304 STRIP 10 x 20', 'A', 32, 100000, 0, 0, NULL, NULL),
(551, '2024-10-29', '131110-M-A-0007', 'POM PUTIH ? 90', 'A', 20, 1630000, 0, 0, NULL, NULL),
(552, '2024-10-29', '131110-M-A-0008', 'BRONZE AB2 ? 40', 'A', 5, 4200000, 0, 0, NULL, NULL),
(553, '2024-10-29', '131110-M-A-0009', 'VCN ? 90', 'A', 4, 2923200, 0, 0, NULL, NULL),
(554, '2024-10-29', '131110-M-A-0010', 'STST PIPE 316 ? 3/4\" SCH 40', 'A', 3, 356666, 0, 0, NULL, NULL),
(555, '2024-10-29', '131120-M-G-0001', 'KAYU HARDBOARD 3 X 125 X 25', 'G', 500, 750, 0, 0, NULL, NULL),
(556, '2024-10-29', '131120-M-G-0002', 'KAYU TOP TABLE # 20 X 1200 X 2400 HPL PUTIH. LIST PVC', 'G', 1, 1348650, 0, 0, NULL, NULL),
(557, '2024-10-29', '131120-M-G-0003', 'KAYU WOOD WORKING WB ( 1778 X 686 X 965 mm ) W/BENCH VICE CLAMP 7.5\"', 'G', 0, 6049500, 0, 0, NULL, NULL),
(558, '2024-10-29', '131120-M-G-0004', 'RODA ALMARI ALPHA Dia 19 mm', 'G', 232, 3000, 0, 0, NULL, NULL),
(559, '2024-10-29', '131120-M-G-0005', '317220 REL HUBEN SD-12 TOP 3 U', 'G', 4, 27750, 0, 0, NULL, NULL),
(560, '2024-10-29', '131120-M-G-0006', '317216 REL HUBEN SD-12 BOTOM 3M', 'G', 4, 27750, 0, 0, NULL, NULL),
(561, '2024-10-29', '131120-M-G-0007', 'KACA CLEAR # 6MM X 849CM X 1630 CM + LUBANG 4 BUAH GOSOK BATU', 'G', 0, 397300, 0, 0, NULL, NULL),
(562, '2024-10-29', '131120-M-G-0008', 'Playwood 275 x 400 x 25 Radius Sudut R10mm. LIST DUCO CREAM. FINISHING CLEA', 'G', 0, 119300, 0, 0, NULL, NULL),
(563, '2024-10-29', '131120-M-G-0009', 'KAYU SANDARAN MULTIPROPUSE FOLDING 333353', 'G', 0, 44400, 0, 0, NULL, NULL),
(564, '2024-10-29', '131110-umum-1008', 'pc', 'umum', 10, 35000, 0, 0, NULL, NULL),
(565, '2024-10-29', '131210-M-B-0011', 'Barang 1', 'B', 456, 405840, 0, 0, NULL, NULL),
(566, '2024-10-29', '131210-M-B-0012', 'Barang 2', 'B', 74, 99900, 0, 0, NULL, NULL),
(567, '2024-10-29', '131210-M-B-0013', 'Barang 3', 'B', 53, 169600, 0, 0, NULL, NULL),
(568, '2024-10-29', '131210-M-B-0014', 'Barang 4', 'B', 14, 72464, 0, 0, NULL, NULL),
(569, '2024-10-29', '131210-M-B-0015', 'Barang 5', 'B', 11, 214280, 0, 0, NULL, NULL),
(570, '2024-10-29', '131210-M-B-0016', 'Barang 6', 'B', 4, 26668, 0, 0, NULL, NULL),
(571, '2024-10-29', '131210-M-B-0017', 'Barang 7', 'B', 1, 1100, 0, 0, NULL, NULL),
(572, '2024-10-29', '131210-M-B-0018', 'Barang 8', 'B', 133, 159600, 0, 0, NULL, NULL),
(573, '2024-10-29', '131210-M-B-0019', 'Barang 9', 'B', 1, 1250, 0, 0, NULL, NULL),
(574, '2024-10-29', '131210-M-B-0020', 'Barang 10', 'B', 20, 2000, 0, 0, NULL, NULL),
(575, '2024-10-29', '131110-M-A-0011', 'Barang 11', 'A', 0, 488298, 0, 0, NULL, NULL),
(576, '2024-10-29', '131110-M-A-0012', 'Barang 12', 'A', 1, 738000, 0, 0, NULL, NULL),
(577, '2024-10-29', '131110-M-A-0013', 'Barang 13', 'A', 0, 6100000, 0, 0, NULL, NULL),
(578, '2024-10-29', '131110-M-A-0014', 'Barang 14', 'A', 0, 3355000, 0, 0, NULL, NULL),
(579, '2024-10-29', '131110-M-A-0015', 'Barang 15', 'A', 0, 1006200, 0, 0, NULL, NULL),
(580, '2024-10-29', '131110-M-A-0016', 'Barang 16', 'A', 32, 100000, 0, 0, NULL, NULL),
(581, '2024-10-29', '131110-M-A-0017', 'Barang 17', 'A', 20, 1630000, 0, 0, NULL, NULL),
(582, '2024-10-29', '131110-M-A-0018', 'Barang 18', 'A', 5, 4200000, 0, 0, NULL, NULL),
(583, '2024-10-29', '131110-M-A-0019', 'Barang 19', 'A', 4, 2923200, 0, 0, NULL, NULL),
(584, '2024-10-29', '131110-M-A-0020', 'Barang 20', 'A', 3, 356666, 0, 0, NULL, NULL),
(585, '2024-10-29', '131120-W-G-0010', 'Barang 21', 'G', 500, 750, 0, 0, NULL, NULL),
(586, '2024-10-29', '131120-W-G-0011', 'Barang 22', 'G', 2, 1348650, 0, 0, NULL, NULL),
(587, '2024-10-29', '131120-W-G-0012', 'Barang 23', 'G', 0, 6049500, 0, 0, NULL, NULL),
(588, '2024-10-29', '131120-W-G-0013', 'Barang 24', 'G', 0, 996502, 0, 0, NULL, NULL),
(589, '2024-10-29', '131120-W-G-0014', 'Barang 25', 'G', 232, 3000, 0, 0, NULL, NULL),
(590, '2024-10-29', '131120-W-G-0015', 'Barang 26', 'G', 4, 27750, 0, 0, NULL, NULL),
(591, '2024-10-29', '131120-W-G-0016', 'Barang 27', 'G', 4, 27750, 0, 0, NULL, NULL),
(592, '2024-10-29', '131120-W-G-0017', 'Barang 28', 'G', 0, 397300, 0, 0, NULL, NULL),
(593, '2024-10-29', '131120-W-G-0018', 'Barang 29', 'G', 0, 119300, 0, 0, NULL, NULL),
(594, '2024-10-29', '131120-W-G-0019', 'Barang 30', 'G', 0, 44400, 0, 0, NULL, NULL),
(595, '2024-11-21', '131120-GHP-1003', 'tes 1', 'GHP', 600, 40000, 0, 0, NULL, NULL),
(596, '2024-11-21', '135120-GBBM-1001', 'bensin pertamax', 'GBBM', 957, 35000, 0, 0, NULL, NULL),
(597, '2024-11-21', '131120-MSH-1004', 'SPCC 0,8', 'MSH', 9930, 15000, 0, 0, NULL, NULL),
(598, '2024-11-21', '136310-BSPL-1005', 'packing kardus', 'BSPL', 1490, 50000, 0, 0, NULL, NULL),
(599, '2024-11-21', '131110-G-1006', 'INSERT ZTFD0303-MG/YBG302', 'B', 1, 85000, 0, 0, NULL, NULL),
(600, '2024-11-21', '131110-G-1007', 'Pipa ⌀ 10', 'G', 35, 30000, 0, 0, NULL, NULL),
(601, '2024-11-21', '131210-M-B-0001', 'BAUT BAJA IMBUS M 6 X 25 - A', 'B', 426, 405840, 0, 0, NULL, NULL),
(602, '2024-11-21', '131210-M-B-0002', 'CIRCLIP FOR SHAFT ? 19', 'B', 74, 99900, 0, 0, NULL, NULL),
(603, '2024-11-21', '131210-M-B-0003', 'BAUT MS HEX M 12 X 60', 'B', 38, 169600, 0, 0, NULL, NULL),
(604, '2024-11-21', '131210-M-B-0004', 'DOWEL PIN ? 6 X 10', 'B', 14, 72464, 0, 0, NULL, NULL),
(605, '2024-11-21', '131210-M-B-0005', 'BALL PLUNGER M6 X 13', 'B', 11, 214280, 0, 0, NULL, NULL),
(606, '2024-11-21', '131210-M-B-0006', 'SCRAPER SIZE 2\" - VIPER', 'B', 4, 26668, 0, 0, NULL, NULL),
(607, '2024-11-21', '131210-M-B-0007', 'BAUT MS HEX M 12 X 70', 'B', 1, 1100, 0, 0, NULL, NULL),
(608, '2024-11-21', '131210-M-B-0008', 'BAUT MS HEX M 12 X110', 'B', 133, 159600, 0, 0, NULL, NULL),
(609, '2024-11-21', '131210-M-B-0009', 'BAUT MS HEX M 12 X125', 'B', 1, 1250, 0, 0, NULL, NULL),
(610, '2024-11-21', '131210-M-B-0010', 'BAUT MS JF M 3 X 06', 'B', 20, 2000, 0, 0, NULL, NULL),
(611, '2024-11-21', '131110-M-A-0001', '705 Ã˜ 40', 'A', 0, 488298, 0, 0, NULL, NULL),
(612, '2024-11-21', '131110-M-A-0002', 'SPRING STEEL # 08 x 200', 'A', 1, 738000, 0, 0, NULL, NULL),
(613, '2024-11-21', '131110-M-A-0003', 'ALLUMINIUM 5052 # 10 x 1200 x 2400', 'A', 0, 6100000, 0, 0, NULL, NULL),
(614, '2024-11-21', '131110-M-A-0004', 'MS # 10 x 1200 x 2400', 'A', 0, 3355000, 0, 0, NULL, NULL),
(615, '2024-11-21', '131110-M-A-0005', 'ALLUMINIUM 7075 # 50 x 50', 'A', 0, 1006200, 0, 0, NULL, NULL),
(616, '2024-11-21', '131110-M-A-0006', 'SUS 304 STRIP 10 x 20', 'A', 32, 100000, 0, 0, NULL, NULL),
(617, '2024-11-21', '131110-M-A-0007', 'POM PUTIH ? 90', 'A', 20, 1630000, 0, 0, NULL, NULL),
(618, '2024-11-21', '131110-M-A-0008', 'BRONZE AB2 ? 40', 'A', 5, 4200000, 0, 0, NULL, NULL),
(619, '2024-11-21', '131110-M-A-0009', 'VCN ? 90', 'A', 4, 2923200, 0, 0, NULL, NULL),
(620, '2024-11-21', '131110-M-A-0010', 'STST PIPE 316 ? 3/4\" SCH 40', 'A', 3, 356666, 0, 0, NULL, NULL),
(621, '2024-11-21', '131120-M-G-0001', 'KAYU HARDBOARD 3 X 125 X 25', 'G', 500, 750, 0, 0, NULL, NULL),
(622, '2024-11-21', '131120-M-G-0002', 'KAYU TOP TABLE # 20 X 1200 X 2400 HPL PUTIH. LIST PVC', 'G', 1, 1348650, 0, 0, NULL, NULL),
(623, '2024-11-21', '131120-M-G-0003', 'KAYU WOOD WORKING WB ( 1778 X 686 X 965 mm ) W/BENCH VICE CLAMP 7.5\"', 'G', 0, 6049500, 0, 0, NULL, NULL),
(624, '2024-11-21', '131120-M-G-0004', 'RODA ALMARI ALPHA Dia 19 mm', 'G', 232, 3000, 0, 0, NULL, NULL),
(625, '2024-11-21', '131120-M-G-0005', '317220 REL HUBEN SD-12 TOP 3 U', 'G', 4, 27750, 0, 0, NULL, NULL),
(626, '2024-11-21', '131120-M-G-0006', '317216 REL HUBEN SD-12 BOTOM 3M', 'G', 4, 27750, 0, 0, NULL, NULL),
(627, '2024-11-21', '131120-M-G-0007', 'KACA CLEAR # 6MM X 849CM X 1630 CM + LUBANG 4 BUAH GOSOK BATU', 'G', 0, 397300, 0, 0, NULL, NULL),
(628, '2024-11-21', '131120-M-G-0008', 'Playwood 275 x 400 x 25 Radius Sudut R10mm. LIST DUCO CREAM. FINISHING CLEA', 'G', 0, 119300, 0, 0, NULL, NULL),
(629, '2024-11-21', '131120-M-G-0009', 'KAYU SANDARAN MULTIPROPUSE FOLDING 333353', 'G', 0, 44400, 0, 0, NULL, NULL),
(630, '2024-11-21', '131110-umum-1008', 'pc', 'umum', 10, 35000, 0, 0, NULL, NULL),
(631, '2024-11-21', '131210-M-B-0011', 'Barang 1', 'B', 456, 405840, 0, 0, NULL, NULL),
(632, '2024-11-21', '131210-M-B-0012', 'Barang 2', 'B', 74, 99900, 0, 0, NULL, NULL),
(633, '2024-11-21', '131210-M-B-0013', 'Barang 3', 'B', 53, 169600, 0, 0, NULL, NULL),
(634, '2024-11-21', '131210-M-B-0014', 'Barang 4', 'B', 14, 72464, 0, 0, NULL, NULL),
(635, '2024-11-21', '131210-M-B-0015', 'Barang 5', 'B', 11, 214280, 0, 0, NULL, NULL),
(636, '2024-11-21', '131210-M-B-0016', 'Barang 6', 'B', 4, 26668, 0, 0, NULL, NULL),
(637, '2024-11-21', '131210-M-B-0017', 'Barang 7', 'B', 1, 1100, 0, 0, NULL, NULL),
(638, '2024-11-21', '131210-M-B-0018', 'Barang 8', 'B', 133, 159600, 0, 0, NULL, NULL),
(639, '2024-11-21', '131210-M-B-0019', 'Barang 9', 'B', 1, 1250, 0, 0, NULL, NULL),
(640, '2024-11-21', '131210-M-B-0020', 'Barang 10', 'B', 20, 2000, 0, 0, NULL, NULL),
(641, '2024-11-21', '131110-M-A-0011', 'Barang 11', 'A', 0, 488298, 0, 0, NULL, NULL),
(642, '2024-11-21', '131110-M-A-0012', 'Barang 12', 'A', 1, 738000, 0, 0, NULL, NULL),
(643, '2024-11-21', '131110-M-A-0013', 'Barang 13', 'A', 0, 6100000, 0, 0, NULL, NULL),
(644, '2024-11-21', '131110-M-A-0014', 'Barang 14', 'A', 0, 3355000, 0, 0, NULL, NULL),
(645, '2024-11-21', '131110-M-A-0015', 'Barang 15', 'A', 0, 1006200, 0, 0, NULL, NULL),
(646, '2024-11-21', '131110-M-A-0016', 'Barang 16', 'A', 32, 100000, 0, 0, NULL, NULL),
(647, '2024-11-21', '131110-M-A-0017', 'Barang 17', 'A', 20, 1630000, 0, 0, NULL, NULL),
(648, '2024-11-21', '131110-M-A-0018', 'Barang 18', 'A', 5, 4200000, 0, 0, NULL, NULL),
(649, '2024-11-21', '131110-M-A-0019', 'Barang 19', 'A', 4, 2923200, 0, 0, NULL, NULL),
(650, '2024-11-21', '131110-M-A-0020', 'Barang 20', 'A', 3, 356666, 0, 0, NULL, NULL),
(651, '2024-11-21', '131120-W-G-0010', 'Barang 21', 'G', 500, 750, 0, 0, NULL, NULL),
(652, '2024-11-21', '131120-W-G-0011', 'Barang 22', 'G', 2, 1348650, 0, 0, NULL, NULL),
(653, '2024-11-21', '131120-W-G-0012', 'Barang 23', 'G', 0, 6049500, 0, 0, NULL, NULL),
(654, '2024-11-21', '131120-W-G-0013', 'Barang 24', 'G', 0, 996502, 0, 0, NULL, NULL),
(655, '2024-11-21', '131120-W-G-0014', 'Barang 25', 'G', 232, 3000, 0, 0, NULL, NULL),
(656, '2024-11-21', '131120-W-G-0015', 'Barang 26', 'G', 4, 27750, 0, 0, NULL, NULL),
(657, '2024-11-21', '131120-W-G-0016', 'Barang 27', 'G', 4, 27750, 0, 0, NULL, NULL),
(658, '2024-11-21', '131120-W-G-0017', 'Barang 28', 'G', 0, 397300, 0, 0, NULL, NULL),
(659, '2024-11-21', '131120-W-G-0018', 'Barang 29', 'G', 0, 119300, 0, 0, NULL, NULL),
(660, '2024-11-21', '131120-W-G-0019', 'Barang 30', 'G', 0, 44400, 0, 0, NULL, NULL),
(661, '2024-12-06', '131120-GHP-1003', 'tes 1', 'GHP', 600, 40000, 0, 0, NULL, NULL),
(662, '2024-12-06', '135120-GBBM-1001', 'bensin pertamax', 'GBBM', 957, 35000, 0, 0, NULL, NULL),
(663, '2024-12-06', '131120-MSH-1004', 'SPCC 0,8', 'MSH', 9830, 15000, 0, 100, NULL, NULL),
(664, '2024-12-06', '136310-BSPL-1005', 'packing kardus', 'BSPL', 1490, 50000, 0, 0, NULL, NULL),
(665, '2024-12-06', '131110-G-1006', 'INSERT ZTFD0303-MG/YBG302', 'B', 1, 85000, 0, 0, NULL, NULL),
(666, '2024-12-06', '131110-G-1007', 'Pipa ⌀ 10', 'G', 35, 30000, 0, 0, NULL, NULL),
(667, '2024-12-06', '131210-M-B-0001', 'BAUT BAJA IMBUS M 6 X 25 - A', 'B', 416, 405840, 0, 10, NULL, NULL),
(668, '2024-12-06', '131210-M-B-0002', 'CIRCLIP FOR SHAFT ? 19', 'B', 74, 99900, 0, 0, NULL, NULL),
(669, '2024-12-06', '131210-M-B-0003', 'BAUT MS HEX M 12 X 60', 'B', 38, 169600, 0, 0, NULL, NULL),
(670, '2024-12-06', '131210-M-B-0004', 'DOWEL PIN ? 6 X 10', 'B', 14, 72464, 0, 0, NULL, NULL),
(671, '2024-12-06', '131210-M-B-0005', 'BALL PLUNGER M6 X 13', 'B', 11, 214280, 0, 0, NULL, NULL),
(672, '2024-12-06', '131210-M-B-0006', 'SCRAPER SIZE 2\" - VIPER', 'B', 4, 26668, 0, 0, NULL, NULL),
(673, '2024-12-06', '131210-M-B-0007', 'BAUT MS HEX M 12 X 70', 'B', 1, 1100, 0, 0, NULL, NULL),
(674, '2024-12-06', '131210-M-B-0008', 'BAUT MS HEX M 12 X110', 'B', 133, 159600, 0, 0, NULL, NULL),
(675, '2024-12-06', '131210-M-B-0009', 'BAUT MS HEX M 12 X125', 'B', 1, 1250, 0, 0, NULL, NULL),
(676, '2024-12-06', '131210-M-B-0010', 'BAUT MS JF M 3 X 06', 'B', 20, 2000, 0, 0, NULL, NULL),
(677, '2024-12-06', '131110-M-A-0001', '705 Ã˜ 40', 'A', 0, 488298, 0, 0, NULL, NULL),
(678, '2024-12-06', '131110-M-A-0002', 'SPRING STEEL # 08 x 200', 'A', 1, 738000, 0, 0, NULL, NULL),
(679, '2024-12-06', '131110-M-A-0003', 'ALLUMINIUM 5052 # 10 x 1200 x 2400', 'A', 0, 6100000, 0, 0, NULL, NULL),
(680, '2024-12-06', '131110-M-A-0004', 'MS # 10 x 1200 x 2400', 'A', 0, 3355000, 0, 0, NULL, NULL),
(681, '2024-12-06', '131110-M-A-0005', 'ALLUMINIUM 7075 # 50 x 50', 'A', 0, 1006200, 0, 0, NULL, NULL),
(682, '2024-12-06', '131110-M-A-0006', 'SUS 304 STRIP 10 x 20', 'A', 32, 100000, 0, 0, NULL, NULL),
(683, '2024-12-06', '131110-M-A-0007', 'POM PUTIH ? 90', 'A', 20, 1630000, 0, 0, NULL, NULL),
(684, '2024-12-06', '131110-M-A-0008', 'BRONZE AB2 ? 40', 'A', 5, 4200000, 0, 0, NULL, NULL),
(685, '2024-12-06', '131110-M-A-0009', 'VCN ? 90', 'A', 4, 2923200, 0, 0, NULL, NULL),
(686, '2024-12-06', '131110-M-A-0010', 'STST PIPE 316 ? 3/4\" SCH 40', 'A', 3, 356666, 0, 0, NULL, NULL),
(687, '2024-12-06', '131120-M-G-0001', 'KAYU HARDBOARD 3 X 125 X 25', 'G', 500, 750, 0, 0, NULL, NULL),
(688, '2024-12-06', '131120-M-G-0002', 'KAYU TOP TABLE # 20 X 1200 X 2400 HPL PUTIH. LIST PVC', 'G', 1, 1348650, 0, 0, NULL, NULL),
(689, '2024-12-06', '131120-M-G-0003', 'KAYU WOOD WORKING WB ( 1778 X 686 X 965 mm ) W/BENCH VICE CLAMP 7.5\"', 'G', 0, 6049500, 0, 0, NULL, NULL),
(690, '2024-12-06', '131120-M-G-0004', 'RODA ALMARI ALPHA Dia 19 mm', 'G', 232, 3000, 0, 0, NULL, NULL),
(691, '2024-12-06', '131120-M-G-0005', '317220 REL HUBEN SD-12 TOP 3 U', 'G', 4, 27750, 0, 0, NULL, NULL),
(692, '2024-12-06', '131120-M-G-0006', '317216 REL HUBEN SD-12 BOTOM 3M', 'G', 4, 27750, 0, 0, NULL, NULL),
(693, '2024-12-06', '131120-M-G-0007', 'KACA CLEAR # 6MM X 849CM X 1630 CM + LUBANG 4 BUAH GOSOK BATU', 'G', 0, 397300, 0, 0, NULL, NULL),
(694, '2024-12-06', '131120-M-G-0008', 'Playwood 275 x 400 x 25 Radius Sudut R10mm. LIST DUCO CREAM. FINISHING CLEA', 'G', 0, 119300, 0, 0, NULL, NULL),
(695, '2024-12-06', '131120-M-G-0009', 'KAYU SANDARAN MULTIPROPUSE FOLDING 333353', 'G', 0, 44400, 0, 0, NULL, NULL),
(696, '2024-12-06', '131110-umum-1008', 'pc', 'umum', 10, 35000, 0, 0, NULL, NULL),
(697, '2024-12-06', '131210-M-B-0011', 'Barang 1', 'B', 456, 405840, 0, 0, NULL, NULL),
(698, '2024-12-06', '131210-M-B-0012', 'Barang 2', 'B', 74, 99900, 0, 0, NULL, NULL),
(699, '2024-12-06', '131210-M-B-0013', 'Barang 3', 'B', 53, 169600, 0, 0, NULL, NULL),
(700, '2024-12-06', '131210-M-B-0014', 'Barang 4', 'B', 14, 72464, 0, 0, NULL, NULL),
(701, '2024-12-06', '131210-M-B-0015', 'Barang 5', 'B', 11, 214280, 0, 0, NULL, NULL),
(702, '2024-12-06', '131210-M-B-0016', 'Barang 6', 'B', 4, 26668, 0, 0, NULL, NULL),
(703, '2024-12-06', '131210-M-B-0017', 'Barang 7', 'B', 1, 1100, 0, 0, NULL, NULL),
(704, '2024-12-06', '131210-M-B-0018', 'Barang 8', 'B', 133, 159600, 0, 0, NULL, NULL),
(705, '2024-12-06', '131210-M-B-0019', 'Barang 9', 'B', 1, 1250, 0, 0, NULL, NULL),
(706, '2024-12-06', '131210-M-B-0020', 'Barang 10', 'B', 20, 2000, 0, 0, NULL, NULL),
(707, '2024-12-06', '131110-M-A-0011', 'Barang 11', 'A', 0, 488298, 0, 0, NULL, NULL),
(708, '2024-12-06', '131110-M-A-0012', 'Barang 12', 'A', 1, 738000, 0, 0, NULL, NULL),
(709, '2024-12-06', '131110-M-A-0013', 'Barang 13', 'A', 0, 6100000, 0, 0, NULL, NULL),
(710, '2024-12-06', '131110-M-A-0014', 'Barang 14', 'A', 0, 3355000, 0, 0, NULL, NULL),
(711, '2024-12-06', '131110-M-A-0015', 'Barang 15', 'A', 0, 1006200, 0, 0, NULL, NULL),
(712, '2024-12-06', '131110-M-A-0016', 'Barang 16', 'A', 32, 100000, 0, 0, NULL, NULL),
(713, '2024-12-06', '131110-M-A-0017', 'Barang 17', 'A', 20, 1630000, 0, 0, NULL, NULL),
(714, '2024-12-06', '131110-M-A-0018', 'Barang 18', 'A', 5, 4200000, 0, 0, NULL, NULL),
(715, '2024-12-06', '131110-M-A-0019', 'Barang 19', 'A', 4, 2923200, 0, 0, NULL, NULL),
(716, '2024-12-06', '131110-M-A-0020', 'Barang 20', 'A', 3, 356666, 0, 0, NULL, NULL),
(717, '2024-12-06', '131120-W-G-0010', 'Barang 21', 'G', 500, 750, 0, 0, NULL, NULL),
(718, '2024-12-06', '131120-W-G-0011', 'Barang 22', 'G', 2, 1348650, 0, 0, NULL, NULL),
(719, '2024-12-06', '131120-W-G-0012', 'Barang 23', 'G', 0, 6049500, 0, 0, NULL, NULL),
(720, '2024-12-06', '131120-W-G-0013', 'Barang 24', 'G', 0, 996502, 0, 0, NULL, NULL),
(721, '2024-12-06', '131120-W-G-0014', 'Barang 25', 'G', 232, 3000, 0, 0, NULL, NULL),
(722, '2024-12-06', '131120-W-G-0015', 'Barang 26', 'G', 4, 27750, 0, 0, NULL, NULL),
(723, '2024-12-06', '131120-W-G-0016', 'Barang 27', 'G', 4, 27750, 0, 0, NULL, NULL),
(724, '2024-12-06', '131120-W-G-0017', 'Barang 28', 'G', 0, 397300, 0, 0, NULL, NULL),
(725, '2024-12-06', '131120-W-G-0018', 'Barang 29', 'G', 0, 119300, 0, 0, NULL, NULL),
(726, '2024-12-06', '131120-W-G-0019', 'Barang 30', 'G', 0, 44400, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuans`
--

CREATE TABLE `satuans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kd_satuan` varchar(255) NOT NULL,
  `nama_satuan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `satuans`
--

INSERT INTO `satuans` (`id`, `kd_satuan`, `nama_satuan`, `created_at`, `updated_at`) VALUES
(1, 'ea', 'each', '2024-08-09 18:18:31', '2024-08-09 18:57:29'),
(2, 'pcs', 'pieces', '2024-08-09 18:21:01', '2024-08-09 18:57:35'),
(3, 'kg', 'kilogram', '2024-08-09 18:22:34', '2024-08-09 18:22:34'),
(4, 'm', 'meter', '2024-08-09 18:23:45', '2024-08-09 18:23:45'),
(5, 'klg', 'kaleng', '2024-08-09 18:24:52', '2024-08-09 18:24:52'),
(6, 'set', 'set', '2024-08-09 18:28:53', '2024-08-09 18:28:53'),
(7, 'unit', 'unit', '2024-08-09 18:39:01', '2024-08-09 18:39:01'),
(8, 'lbr', 'lembar', '2024-08-09 18:39:30', '2024-08-09 18:39:30'),
(9, 'btg', 'batang', '2024-08-09 18:39:43', '2024-08-09 18:39:43'),
(10, 'drum', 'drum', '2024-08-09 18:39:54', '2024-08-09 18:39:54'),
(11, 'ltr', 'liter', '2024-08-09 18:40:04', '2024-08-09 18:40:04'),
(17, 'rol', 'roll', '2024-08-11 18:50:24', '2024-08-11 18:50:24'),
(19, 'dus', 'dus', '2024-08-20 14:33:27', '2024-08-20 14:33:27'),
(20, '⌀', 'Diameter', '2024-08-21 09:24:33', '2024-08-21 09:24:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('170q5O7CHqnIlPyPFeK2Sp55ZToifw9ZsW1MOtsF', NULL, '185.242.226.88', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicVpjclpjdzVRdk5YSFY4cEs2dVR5T0pxUTR0VmJKYzA5TFhtZ1RDWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vODIuMTEyLjIzNS4xODEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1735874083),
('3USpiJwC0o7FNCq2vuGjBYO1J3YV3ZlKwg4i7XZP', NULL, '154.213.184.16', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiM2REYzF3S3NQNXMyMW1rT2RwNTdZeXB4aVI1bEJMSjRBaUhndTJkNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vODIuMTEyLjIzNS4xODEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1735853289),
('4UNODsTdLJfAYVGrhKwtss9KbceABWO07jR7qVNG', NULL, '45.148.10.17', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:15.0) Gecko/20100101 Firefox/15.0.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTWxnNHRqd3BxUHpndkFBZ3pLTno2bEFPZ1ZXM24wOHBibkIzbjdrViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly84Mi4xMTIuMjM1LjE4MSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1735797898),
('5g2sUqRin8bLR0SRRGkm6lnGiM5YODlmzHcbXgbo', NULL, '213.52.128.21', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:8.0) Gecko/20100101 Firefox/8.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicnJYVjljYUtnRk1rYTBRdGxna08wa0VqSTJYMEhETFF6OHQ3TXBRYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly84Mi4xMTIuMjM1LjE4MSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1735883773),
('8PAYNGxqUK9ebEjKN24B2cbsh5Io7sOKBGSqmXl2', NULL, '95.214.55.226', '-', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOFJkaHkyV1lEUlkyVmVtZ3VQclNBQWt2QlBjVW5nNWdhaFhxZ0ZaZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly84Mi4xMTIuMjM1LjE4MSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1735840901),
('8ZpEkqERuEj5mWfPNj08PTbW173wofoBf4ZEsKCF', NULL, '4.255.100.154', 'Mozilla/5.0 zgrab/0.x', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSWQ5VEk2UFlHV0NYT0hXUVJTemhNMk1uSnpoOWVQajdGQVlIYUR4ciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vODIuMTEyLjIzNS4xODEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1735850010),
('968HfghE8GIL4X9JYfqVv1fA3bW1SeAEDuG8UMNx', NULL, '180.244.160.123', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicUVSZ0FsTExnZWxtZjlEc2FTcm1ucHhIMFZTV0FKaVVCVjZpWWF1WCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNToiaHR0cHM6Ly9zdG9ja2Jhci5hdG1pLmNvLmlkL2JhcmFuZ3MiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMzoiaHR0cHM6Ly9zdG9ja2Jhci5hdG1pLmNvLmlkL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1735821343),
('A6jfVByJb4O3mmEgq9r2OZMHy2Og2AsXQ2SMEOWA', NULL, '112.186.224.194', 'Mozilla/5.0 (Linux; U; Android 4.0.3; ko-kr; LG-L160L Build/IML74K) AppleWebkit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUW1mVnJXUGVRcEh6NDJJaEl6cmt1d0FjTlYyS2FRbGw3WmpOYnRlaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTY6Imh0dHA6Ly8xMjcuMC4wLjEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1735885437),
('AiRigvB7CpfMroZyGkZ0B21qWQwpRQ4bVXXDVHbU', NULL, '175.205.124.227', 'Mozilla/5.0 (Linux; U; Android 4.0.3; ko-kr; LG-L160L Build/IML74K) AppleWebkit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRUg2c2JlcHZxeFFGbjlQOThlcVdybnp3cFJsQTFHcmZOaGNZU2o1cCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTY6Imh0dHA6Ly8xMjcuMC4wLjEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1735794156),
('bQdQveAk8vx6lE7iv8rB0RWFSekRBqu5YvSwtVQv', NULL, '104.210.55.152', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.98 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMUVmUmxaVDhWTlZaa21JSXl0WjVObmozSEc1ZDIyUG5NYmN4T3RSeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vODIuMTEyLjIzNS4xODEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1735881026),
('BY7ZS26hBWzjixJViqrmjySkzs8ilBmyIaELxhhd', NULL, '45.244.213.72', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMnFUS0I5cmpSd3FOaFNTZlB6MEQwVGxQR1E1OXhWT25BeVlEMWVjSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly84Mi4xMTIuMjM1LjE4MSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1735866238),
('c7H96uAHPeXhmHtxxRRdXD9pVrmvC2K9MhAYO4td', NULL, '170.187.142.131', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV0piWU9VYUlCQ2Fra2tJeXUxaVd6Y3NTMG5xaWxiY3A4cDZvT1pLdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vODIuMTEyLjIzNS4xODEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1735859402),
('CyLRK6KHEqZCQbCIk3oQj3BsnFOFP4I8TRpNFDD7', NULL, '178.238.204.98', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSHVSZGR4dHFPQzVnNnYzMDNaaGZLOTJXRENNVEY1TXB1N21lMnZScSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly84Mi4xMTIuMjM1LjE4MSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1735796653),
('D1Pdtji9N2JhgD59GiEILgueJoH8tB1Vo6hvtLU0', NULL, '45.56.114.118', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36 Edg/109.0.1518.61', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib3h6ejVJT3pRb1NrVU5ybGU2Z0pXSFhuRDZ6SjkxbFlPYURueFI2TyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vODIuMTEyLjIzNS4xODEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1735859377),
('GeBNR6p6tN4QPrwUM0wKM9sYcCKZs8debPQXuoJk', NULL, '5.181.190.248', '-', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVWRLdjhQS0NhYlhaRG41V0F2VmxJVWJuQ2VydzFtQnlFZ2RCbU1kZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly84Mi4xMTIuMjM1LjE4MSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1735856350),
('gOkNT6DY8Ibe7gi3f6YbteCvJLowefc9WKdTlzmc', NULL, '172.169.206.157', 'Mozilla/5.0 zgrab/0.x', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUHduc0M0R1hvbWVBM21kRmVlRTkxOEtWQXVmaFFWZkJmR1JFODFMWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vODIuMTEyLjIzNS4xODEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1735797688),
('Gvo06fy0NzeCROtu5MFKfVW4DOLmsVoCajTCIK8r', NULL, '83.222.191.90', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85 Safari/537.36 Edg/90.0.818.46', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiZVlPcWFvcUhuNjV2Z0Znb1M0QmVlVFFuVjJ6QXlMa255b1F1ZDJvTyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1735859818),
('LhkvVMP6LnZRrd5XXJraRtzuveNAZwDZZVRpcKrn', NULL, '5.181.190.248', '-', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicGhkdFVQWVpRRDEwbzhkTmlEOEdna1llUTdqc01nSmFVTWJJMnNWRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly84Mi4xMTIuMjM1LjE4MSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1735867999),
('NnFwvFV9ND0SpDVccf3l2tQhzSbyLYwy5dfq15Vf', NULL, '91.203.164.46', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaUNIZElUZW1qMVVIeVhPMTc0UVZ1ZWFPVGRoZVVRalF1ZUJSNHhnMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly84Mi4xMTIuMjM1LjE4MSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1735807314),
('QHxJp0fFcHKsssRXxYufDDmBkdcR9MdY4y9O6VmQ', 10, '180.242.202.92', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWlpwaWNvNnF5RThBcnFkOWxKVTlCd2t0SnZLOUlab1JlRm51dE1KMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8vc3RvY2tiYXIuYXRtaS5jby5pZC9iYXJhbmdzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTA7fQ==', 1735798652),
('r2aAIPEgB3ZLpR7u63IgA0JtGhm2npiaVDbvzCXy', NULL, '59.183.5.72', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZXJISUV4QVkwem1pTENhNVJqemVqYm93UVNxRVlOSENxNjRiOXh6SSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly84Mi4xMTIuMjM1LjE4MSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1735853255),
('RgRwB96tX1FjS0VJgJVLBCMt2aRi6JnEbLE62nCL', NULL, '51.159.103.17', 'curl/7.81.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiT21QRk5wcXdTR0VNM3VhcHE3cTgybHJXM3VSa2pSZERSMDFGak94QiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1735818178),
('RNFiW94E7Iff7ut0ZBaPEcmwJ5EwMmYTNmd9sUpj', NULL, '170.187.142.131', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQXFITVpqYmFiMnM1RlpwdzFsZVlrenNVQWxnOEJEWG15TjByQ05wMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vODIuMTEyLjIzNS4xODEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1735859828),
('s1V7Es3c3X6yTzbMeHklDOF6G38LcF5bXlG2zTup', NULL, '5.181.190.248', '-', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiek1MbmsydWVrMzlvYklUOEk1RFIwUnZsMXljWnJoandVS0lzRmxXciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vODIuMTEyLjIzNS4xODEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1735853677),
('Slp664eMvcQLpAsxvUX6RxwAQ1tqk6tnfpavIvmi', NULL, '167.172.237.121', 'Mozilla/5.0 (compatible)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidmdTejNwcWp0R1RCRGZsZ05JYjZLYk5Va3FSV0huVzBTSmNROGVxeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly84Mi4xMTIuMjM1LjE4MSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1735842681),
('SPJojE00vZcRTF9GBVK6sJ8o3j9y5kNBKks8MDjL', NULL, '185.242.226.88', 'python-requests/2.26.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWm40VVVxSFA3ZDdNdlRDNXBUZGY4VWRzbVFueWliT2FXZ0ZpdlZTQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vODIuMTEyLjIzNS4xODEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1735885296),
('tjuNtkmZtORsgVP6MhKZM2cksrn5hCfy5jBclJtw', NULL, '51.159.103.17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.3', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoielZZR0RCaFZvSjFSYW0zRlVFbEVOaHRKY0hVS2I3Y0xCSGVKWTNKaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vODIuMTEyLjIzNS4xODEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1735818184),
('tOzLFwbM4GEF9wQ4J4DZEcCP1191maYKhhsqnW7k', NULL, '5.181.190.248', '-', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWGZOV0FBYkJaclJYWGxjbWVtOWZZU3kwVUI5QkNuTFU5ZW9yMXF0bCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly84Mi4xMTIuMjM1LjE4MSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1735860913),
('uqj40mb9SukIbcrL1qwzu1LtcDsSO0Ds91ekADO9', NULL, '95.214.55.226', '-', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibTFRbzZ6T2pkbFZHdTlDQUNzSThtc2x3YUwzNG9UVlkyWllLdDFoeCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vODIuMTEyLjIzNS4xODEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1735861473),
('UvFVfacLSdQsRjK4z33kr87bFHmAzzIW1yeES2Wu', NULL, '206.168.34.48', 'Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU1NWeVpiZXFjUmFVQzJSbUU5MW0xU2VvNG85QjVDdjJoQVY5dUVKbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vODIuMTEyLjIzNS4xODEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1735836820),
('UWIbX6ilwcnYj5HIKChSnVxWJTqXR2Dc9JDN5PYX', NULL, '45.148.10.17', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:15.0) Gecko/20100101 Firefox/15.0.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVXhkTzY5UHNxN2MzV0FON21LSDdZM0Q0Z21qYUVIZW1xZnVENW9sZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly84Mi4xMTIuMjM1LjE4MSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1735794904),
('vZPB7EES9M2Q9pZybSrubZym0MJkp9kPyVxEisNh', NULL, '206.189.71.125', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS09kaU1kMU9MOUhUWFV2akwwQ0hhZlI5SGR0eHZDNFpEUWJ4OXVZNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vODIuMTEyLjIzNS4xODEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1735859364),
('W9rTwww608yVfcsZkVMkclb9fiRX36F9sv6M4e5P', NULL, '178.128.3.141', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUEExM05PVVdGU0lwRUx3R2NrSG52aG91UHFEYVNjeEluazlERzVFMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vODIuMTEyLjIzNS4xODEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1735859475),
('Wiw7AuUXPvhGML2ej1Tv6WQ77raOWsf2XvQsk5Y6', NULL, '129.146.112.142', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNXJXaldROHFGbTNCQkMxQUhDWFBDRVJWa25EampIdDhjMGs2d0E0aCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly9zdG9ja2Jhci5hdG1pLmNvLmlkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1735842919),
('wQIe9moqYzrgWm7Axl3EkZ8NFP7foAB4Ckl4016o', NULL, '51.159.103.17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.3', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMnVPdXlpOEFJR2h5V01lbnR6TTNYbkRZbmZoRGVGeEtzdldYQU84cSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly84Mi4xMTIuMjM1LjE4MSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1735818179),
('XeXiQ4sfMSW3sKFDbkcT03ZVzBASeU3f4ne7wQ5O', NULL, '187.45.102.38', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWkJNYUdoY1NxRGFyZzc4TXFNQnk2dnpsTk9Cb3NTZGs4WERZTkk2WiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly84Mi4xMTIuMjM1LjE4MSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1735809990),
('ZyGKjf4c1b3zSwvGBz1f4UOEGmkXkjpc6Ltf8dod', NULL, '125.228.91.168', 'Mozilla/5.0 (Linux; U; Android 4.0.3; ko-kr; LG-L160L Build/IML74K) AppleWebkit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS2w0N2F5REJlZXZPQ2E3bGZ4YnJUdUIyMlFTSGVtU1NaRzEzYkR6aiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTY6Imh0dHA6Ly8xMjcuMC4wLjEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1735865550);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stock_summaries`
--

CREATE TABLE `stock_summaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kd_prod` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `total_stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `stock_summaries`
--

INSERT INTO `stock_summaries` (`id`, `kd_prod`, `date`, `total_stock`, `created_at`, `updated_at`) VALUES
(18, 'W', '2024-08-16', 11667, '2024-08-16 01:31:09', '2024-08-16 01:31:09'),
(19, 'M', '2024-08-16', 1500, '2024-08-16 01:34:35', '2024-08-16 01:34:35'),
(20, 'W', '2024-08-15', 10000, NULL, NULL),
(21, 'M', '2024-08-15', 1000, NULL, NULL),
(22, 'W', '2024-08-17', 11667, '2024-08-17 00:00:32', '2024-08-17 00:00:32'),
(23, 'M', '2024-08-17', 1500, '2024-08-17 00:00:32', '2024-08-17 00:00:32'),
(24, 'W', '2024-08-18', 11667, '2024-08-18 00:23:52', '2024-08-18 00:23:52'),
(25, 'M', '2024-08-18', 1500, '2024-08-18 00:23:52', '2024-08-18 00:23:52'),
(26, 'W', '2024-08-19', 11667, '2024-08-19 01:38:29', '2024-08-19 01:38:29'),
(27, 'M', '2024-08-19', 1495, '2024-08-19 01:38:29', '2024-08-19 13:34:57'),
(28, 'W', '2024-08-20', 11672, '2024-08-20 00:49:45', '2024-08-20 10:17:22'),
(29, 'M', '2024-08-20', 1505, '2024-08-20 00:49:45', '2024-08-20 14:34:21'),
(30, 'W', '2024-08-21', 11692, '2024-08-21 01:48:20', '2024-08-21 10:28:52'),
(31, 'M', '2024-08-21', 1491, '2024-08-21 01:48:20', '2024-08-21 10:28:52'),
(32, 'W', '2024-08-22', 12444, '2024-08-22 04:05:50', '2024-08-22 22:26:35'),
(33, 'M', '2024-08-22', 2323, '2024-08-22 04:05:50', '2024-08-22 22:26:35'),
(35, 'M', '2024-08-23', 3155, '2024-08-23 13:06:19', '2024-08-23 17:23:53'),
(36, 'W', '2024-08-23', 13181, '2024-08-23 13:06:19', '2024-08-23 17:23:53'),
(37, 'U', '2024-08-23', 10, '2024-08-23 13:28:44', '2024-08-23 13:28:44'),
(38, 'M', '2024-08-25', 3155, '2024-08-25 02:20:12', '2024-08-25 02:20:12'),
(39, 'W', '2024-08-25', 13181, '2024-08-25 02:20:12', '2024-08-25 02:20:12'),
(40, 'U', '2024-08-25', 10, '2024-08-25 02:20:12', '2024-08-25 02:20:12'),
(41, 'M', '2024-08-26', 3155, '2024-08-26 09:39:45', '2024-08-26 09:39:45'),
(42, 'W', '2024-08-26', 13181, '2024-08-26 09:39:45', '2024-08-26 09:39:45'),
(43, 'U', '2024-08-26', 10, '2024-08-26 09:39:45', '2024-08-26 09:39:45'),
(44, 'M', '2024-08-27', 3155, '2024-08-27 13:30:32', '2024-08-27 13:30:32'),
(45, 'W', '2024-08-27', 13181, '2024-08-27 13:30:32', '2024-08-27 13:30:32'),
(46, 'U', '2024-08-27', 10, '2024-08-27 13:30:32', '2024-08-27 13:30:32'),
(47, 'M', '2024-08-28', 3155, '2024-08-28 13:01:47', '2024-08-28 13:01:47'),
(48, 'W', '2024-08-28', 13181, '2024-08-28 13:01:47', '2024-08-28 13:01:47'),
(49, 'U', '2024-08-28', 10, '2024-08-28 13:01:47', '2024-08-28 13:01:47'),
(50, 'M', '2024-08-29', 3155, '2024-08-29 21:59:37', '2024-08-29 21:59:37'),
(51, 'W', '2024-08-29', 13181, '2024-08-29 21:59:37', '2024-08-29 21:59:37'),
(52, 'U', '2024-08-29', 10, '2024-08-29 21:59:37', '2024-08-29 21:59:37'),
(53, 'M', '2024-08-30', 3155, '2024-08-30 20:57:02', '2024-08-30 20:57:02'),
(54, 'W', '2024-08-30', 13181, '2024-08-30 20:57:02', '2024-08-30 20:57:02'),
(55, 'U', '2024-08-30', 10, '2024-08-30 20:57:02', '2024-08-30 20:57:02'),
(56, 'W', '2024-08-31', 13181, '2024-08-31 21:52:37', '2024-08-31 21:52:37'),
(57, 'M', '2024-08-31', 3155, '2024-08-31 21:52:37', '2024-08-31 21:52:37'),
(58, 'U', '2024-08-31', 10, '2024-08-31 21:52:37', '2024-08-31 21:52:37'),
(59, 'M', '2024-09-03', 3155, '2024-09-03 10:32:39', '2024-09-03 10:32:39'),
(60, 'W', '2024-09-03', 13181, '2024-09-03 10:32:39', '2024-09-03 10:32:39'),
(61, 'U', '2024-09-03', 10, '2024-09-03 10:32:39', '2024-09-03 10:32:39'),
(62, 'M', '2024-09-04', 3155, '2024-09-04 00:15:27', '2024-09-04 00:15:27'),
(63, 'W', '2024-09-04', 13181, '2024-09-04 00:15:27', '2024-09-04 00:15:27'),
(64, 'U', '2024-09-04', 10, '2024-09-04 00:15:27', '2024-09-04 00:15:27'),
(65, 'M', '2024-09-05', 3155, '2024-09-05 12:16:38', '2024-09-05 12:16:38'),
(66, 'W', '2024-09-05', 13181, '2024-09-05 12:16:38', '2024-09-05 12:16:38'),
(67, 'U', '2024-09-05', 10, '2024-09-05 12:16:38', '2024-09-05 12:16:38'),
(68, 'M', '2024-09-07', 3155, '2024-09-07 16:59:58', '2024-09-07 16:59:58'),
(69, 'W', '2024-09-07', 13181, '2024-09-07 16:59:58', '2024-09-07 16:59:58'),
(70, 'U', '2024-09-07', 10, '2024-09-07 16:59:58', '2024-09-07 16:59:58'),
(71, 'M', '2024-09-11', 3155, '2024-09-11 14:29:23', '2024-09-11 14:29:23'),
(72, 'W', '2024-09-11', 13181, '2024-09-11 14:29:23', '2024-09-11 14:29:23'),
(73, 'U', '2024-09-11', 10, '2024-09-11 14:29:23', '2024-09-11 14:29:23'),
(74, 'M', '2024-09-14', 3155, '2024-09-14 12:33:09', '2024-09-14 12:33:09'),
(75, 'W', '2024-09-14', 13181, '2024-09-14 12:33:09', '2024-09-14 12:33:09'),
(76, 'U', '2024-09-14', 10, '2024-09-14 12:33:09', '2024-09-14 12:33:09'),
(77, 'M', '2024-09-17', 3155, '2024-09-17 10:44:59', '2024-09-17 10:44:59'),
(78, 'W', '2024-09-17', 13181, '2024-09-17 10:44:59', '2024-09-17 10:44:59'),
(79, 'U', '2024-09-17', 10, '2024-09-17 10:44:59', '2024-09-17 10:44:59'),
(80, 'M', '2024-09-18', 3155, '2024-09-18 13:25:52', '2024-09-18 13:25:52'),
(81, 'W', '2024-09-18', 13181, '2024-09-18 13:25:52', '2024-09-18 13:25:52'),
(82, 'U', '2024-09-18', 10, '2024-09-18 13:25:52', '2024-09-18 13:25:52'),
(83, 'M', '2024-09-19', 3155, '2024-09-19 11:57:08', '2024-09-19 11:57:08'),
(84, 'W', '2024-09-19', 13181, '2024-09-19 11:57:08', '2024-09-19 11:57:08'),
(85, 'U', '2024-09-19', 10, '2024-09-19 11:57:08', '2024-09-19 11:57:08'),
(86, 'M', '2024-09-20', 3155, '2024-09-20 08:38:00', '2024-09-20 08:38:00'),
(87, 'W', '2024-09-20', 13181, '2024-09-20 08:38:00', '2024-09-20 08:38:00'),
(88, 'U', '2024-09-20', 10, '2024-09-20 08:38:00', '2024-09-20 08:38:00'),
(89, 'M', '2024-09-22', 3155, '2024-09-22 22:15:54', '2024-09-22 22:15:54'),
(90, 'W', '2024-09-22', 13181, '2024-09-22 22:15:54', '2024-09-22 22:15:54'),
(91, 'U', '2024-09-22', 10, '2024-09-22 22:15:54', '2024-09-22 22:15:54'),
(92, 'M', '2024-09-23', 3155, '2024-09-23 13:05:13', '2024-09-23 13:05:13'),
(93, 'W', '2024-09-23', 13181, '2024-09-23 13:05:13', '2024-09-23 13:05:13'),
(94, 'U', '2024-09-23', 10, '2024-09-23 13:05:13', '2024-09-23 13:05:13'),
(95, 'W', '2024-09-24', 13181, '2024-09-24 07:00:12', '2024-09-24 07:00:12'),
(96, 'M', '2024-09-24', 3155, '2024-09-24 07:00:12', '2024-09-24 07:00:12'),
(97, 'U', '2024-09-24', 10, '2024-09-24 07:00:12', '2024-09-24 07:00:12'),
(98, 'W', '2024-09-27', 13181, '2024-09-27 07:37:11', '2024-09-27 07:37:11'),
(99, 'M', '2024-09-27', 3155, '2024-09-27 07:37:11', '2024-09-27 07:37:11'),
(100, 'U', '2024-09-27', 10, '2024-09-27 07:37:11', '2024-09-27 07:37:11'),
(101, 'M', '2024-10-03', 3155, '2024-10-03 14:19:07', '2024-10-03 14:19:07'),
(102, 'W', '2024-10-03', 13181, '2024-10-03 14:19:07', '2024-10-03 14:19:07'),
(103, 'U', '2024-10-03', 10, '2024-10-03 14:19:07', '2024-10-03 14:19:07'),
(104, 'M', '2024-10-04', 3155, '2024-10-04 09:23:27', '2024-10-04 09:23:27'),
(105, 'W', '2024-10-04', 13181, '2024-10-04 09:23:27', '2024-10-04 09:23:27'),
(106, 'U', '2024-10-04', 10, '2024-10-04 09:23:27', '2024-10-04 09:23:27'),
(107, 'M', '2024-10-07', 3155, '2024-10-07 11:54:50', '2024-10-07 11:54:50'),
(108, 'W', '2024-10-07', 13181, '2024-10-07 11:54:50', '2024-10-07 11:54:50'),
(109, 'U', '2024-10-07', 10, '2024-10-07 11:54:50', '2024-10-07 11:54:50'),
(110, 'M', '2024-10-08', 3155, '2024-10-08 13:49:37', '2024-10-08 13:49:37'),
(111, 'W', '2024-10-08', 13181, '2024-10-08 13:49:37', '2024-10-08 13:49:37'),
(112, 'U', '2024-10-08', 10, '2024-10-08 13:49:37', '2024-10-08 13:49:37'),
(113, 'M', '2024-10-09', 3155, '2024-10-09 20:52:55', '2024-10-09 20:52:55'),
(114, 'W', '2024-10-09', 13181, '2024-10-09 20:52:55', '2024-10-09 20:52:55'),
(115, 'U', '2024-10-09', 10, '2024-10-09 20:52:55', '2024-10-09 20:52:55'),
(116, 'M', '2024-10-10', 3155, '2024-10-10 14:08:56', '2024-10-10 14:08:56'),
(117, 'W', '2024-10-10', 13181, '2024-10-10 14:08:56', '2024-10-10 14:08:56'),
(118, 'U', '2024-10-10', 10, '2024-10-10 14:08:56', '2024-10-10 14:08:56'),
(119, 'M', '2024-10-13', 3155, '2024-10-13 12:41:21', '2024-10-13 12:41:21'),
(120, 'W', '2024-10-13', 13071, '2024-10-13 12:41:21', '2024-10-13 16:45:18'),
(121, 'U', '2024-10-13', 10, '2024-10-13 12:41:21', '2024-10-13 12:41:21'),
(122, 'M', '2024-10-14', 3120, '2024-10-14 01:58:18', '2024-10-14 16:45:46'),
(123, 'W', '2024-10-14', 13031, '2024-10-14 01:58:18', '2024-10-14 16:45:46'),
(124, 'U', '2024-10-14', 10, '2024-10-14 01:58:18', '2024-10-14 01:58:18'),
(125, 'M', '2024-10-15', 3120, '2024-10-15 00:51:40', '2024-10-15 00:51:40'),
(126, 'W', '2024-10-15', 13031, '2024-10-15 00:51:40', '2024-10-15 00:51:40'),
(127, 'U', '2024-10-15', 10, '2024-10-15 00:51:40', '2024-10-15 00:51:40'),
(128, 'M', '2024-10-16', 3120, '2024-10-16 08:56:53', '2024-10-16 08:56:53'),
(129, 'W', '2024-10-16', 13031, '2024-10-16 08:56:53', '2024-10-16 08:56:53'),
(130, 'U', '2024-10-16', 10, '2024-10-16 08:56:53', '2024-10-16 08:56:53'),
(131, 'M', '2024-10-17', 3120, '2024-10-17 20:07:50', '2024-10-17 20:07:50'),
(132, 'W', '2024-10-17', 13030, '2024-10-17 20:07:50', '2024-10-17 20:07:50'),
(133, 'U', '2024-10-17', 10, '2024-10-17 20:07:50', '2024-10-17 20:07:50'),
(134, 'M', '2024-10-19', 3120, '2024-10-19 04:43:13', '2024-10-19 04:43:13'),
(135, 'W', '2024-10-19', 13030, '2024-10-19 04:43:13', '2024-10-19 04:43:13'),
(136, 'U', '2024-10-19', 10, '2024-10-19 04:43:13', '2024-10-19 04:43:13'),
(137, 'M', '2024-10-22', 3120, '2024-10-22 08:43:41', '2024-10-22 08:43:41'),
(138, 'W', '2024-10-22', 13030, '2024-10-22 08:43:41', '2024-10-22 08:43:41'),
(139, 'U', '2024-10-22', 10, '2024-10-22 08:43:41', '2024-10-22 08:43:41'),
(140, 'M', '2024-10-28', 3110, '2024-10-28 11:58:58', '2024-10-28 13:21:03'),
(141, 'W', '2024-10-28', 13005, '2024-10-28 11:58:58', '2024-10-28 13:21:03'),
(142, 'U', '2024-10-28', 10, '2024-10-28 11:58:58', '2024-10-28 11:58:58'),
(143, 'M', '2024-10-29', 3110, '2024-10-29 04:07:07', '2024-10-29 04:07:07'),
(144, 'W', '2024-10-29', 13005, '2024-10-29 04:07:07', '2024-10-29 04:07:07'),
(145, 'U', '2024-10-29', 10, '2024-10-29 04:07:07', '2024-10-29 04:07:07'),
(146, 'M', '2024-10-30', 3110, '2024-10-30 21:37:13', '2024-10-30 21:37:13'),
(147, 'W', '2024-10-30', 13005, '2024-10-30 21:37:13', '2024-10-30 21:37:13'),
(148, 'U', '2024-10-30', 10, '2024-10-30 21:37:13', '2024-10-30 21:37:13'),
(149, 'M', '2024-11-04', 3110, '2024-11-04 11:02:55', '2024-11-04 11:02:55'),
(150, 'W', '2024-11-04', 13005, '2024-11-04 11:02:55', '2024-11-04 11:02:55'),
(151, 'U', '2024-11-04', 10, '2024-11-04 11:02:55', '2024-11-04 11:02:55'),
(152, 'W', '2024-11-06', 13005, '2024-11-06 09:19:40', '2024-11-06 09:19:40'),
(153, 'M', '2024-11-06', 3110, '2024-11-06 09:19:40', '2024-11-06 09:19:40'),
(154, 'U', '2024-11-06', 10, '2024-11-06 09:19:40', '2024-11-06 09:19:40'),
(155, 'M', '2024-11-09', 3110, '2024-11-09 16:59:56', '2024-11-09 16:59:56'),
(156, 'W', '2024-11-09', 13005, '2024-11-09 16:59:56', '2024-11-09 16:59:56'),
(157, 'U', '2024-11-09', 10, '2024-11-09 16:59:56', '2024-11-09 16:59:56'),
(158, 'M', '2024-11-13', 3110, '2024-11-13 10:08:08', '2024-11-13 10:08:08'),
(159, 'W', '2024-11-13', 13005, '2024-11-13 10:08:08', '2024-11-13 10:08:08'),
(160, 'U', '2024-11-13', 10, '2024-11-13 10:08:08', '2024-11-13 10:08:08'),
(161, 'M', '2024-11-14', 3110, '2024-11-14 10:35:59', '2024-11-14 10:35:59'),
(162, 'W', '2024-11-14', 13005, '2024-11-14 10:35:59', '2024-11-14 10:35:59'),
(163, 'U', '2024-11-14', 10, '2024-11-14 10:35:59', '2024-11-14 10:35:59'),
(164, 'M', '2024-11-19', 3110, '2024-11-19 21:28:34', '2024-11-19 21:28:34'),
(165, 'W', '2024-11-19', 13005, '2024-11-19 21:28:34', '2024-11-19 21:28:34'),
(166, 'U', '2024-11-19', 10, '2024-11-19 21:28:34', '2024-11-19 21:28:34'),
(167, 'M', '2024-11-20', 3110, '2024-11-20 16:32:45', '2024-11-20 16:32:45'),
(168, 'W', '2024-11-20', 13005, '2024-11-20 16:32:45', '2024-11-20 16:32:45'),
(169, 'U', '2024-11-20', 10, '2024-11-20 16:32:45', '2024-11-20 16:32:45'),
(170, 'M', '2024-11-21', 3110, '2024-11-21 13:43:42', '2024-11-21 13:43:42'),
(171, 'W', '2024-11-21', 13005, '2024-11-21 13:43:42', '2024-11-21 13:43:42'),
(172, 'U', '2024-11-21', 10, '2024-11-21 13:43:42', '2024-11-21 13:43:42'),
(173, 'M', '2024-11-22', 3110, '2024-11-22 11:20:39', '2024-11-22 11:20:39'),
(174, 'W', '2024-11-22', 13005, '2024-11-22 11:20:39', '2024-11-22 11:20:39'),
(175, 'U', '2024-11-22', 10, '2024-11-22 11:20:39', '2024-11-22 11:20:39'),
(176, 'M', '2024-11-25', 3110, '2024-11-25 15:23:26', '2024-11-25 15:23:26'),
(177, 'W', '2024-11-25', 13005, '2024-11-25 15:23:26', '2024-11-25 15:23:26'),
(178, 'U', '2024-11-25', 10, '2024-11-25 15:23:26', '2024-11-25 15:23:26'),
(179, 'M', '2024-12-01', 3110, '2024-12-01 16:27:57', '2024-12-01 16:27:57'),
(180, 'W', '2024-12-01', 13005, '2024-12-01 16:27:57', '2024-12-01 16:27:57'),
(181, 'U', '2024-12-01', 10, '2024-12-01 16:27:57', '2024-12-01 16:27:57'),
(182, 'M', '2024-12-06', 3100, '2024-12-06 08:51:45', '2024-12-06 16:33:14'),
(183, 'W', '2024-12-06', 12905, '2024-12-06 08:51:45', '2024-12-06 16:33:14'),
(184, 'U', '2024-12-06', 10, '2024-12-06 08:51:45', '2024-12-06 08:51:45'),
(185, 'M', '2024-12-11', 3100, '2024-12-11 15:15:00', '2024-12-11 15:15:00'),
(186, 'W', '2024-12-11', 12905, '2024-12-11 15:15:00', '2024-12-11 15:15:00'),
(187, 'U', '2024-12-11', 10, '2024-12-11 15:15:00', '2024-12-11 15:15:00'),
(188, 'M', '2024-12-12', 3100, '2024-12-12 15:39:10', '2024-12-12 15:39:10'),
(189, 'W', '2024-12-12', 12905, '2024-12-12 15:39:10', '2024-12-12 15:39:10'),
(190, 'U', '2024-12-12', 10, '2024-12-12 15:39:10', '2024-12-12 15:39:10'),
(191, 'M', '2024-12-17', 3100, '2024-12-17 01:26:03', '2024-12-17 01:26:03'),
(192, 'W', '2024-12-17', 12905, '2024-12-17 01:26:03', '2024-12-17 01:26:03'),
(193, 'U', '2024-12-17', 10, '2024-12-17 01:26:03', '2024-12-17 01:26:03'),
(194, 'M', '2024-12-25', 3100, '2024-12-25 14:05:06', '2024-12-25 14:05:06'),
(195, 'W', '2024-12-25', 12905, '2024-12-25 14:05:06', '2024-12-25 14:05:06'),
(196, 'U', '2024-12-25', 10, '2024-12-25 14:05:06', '2024-12-25 14:05:06'),
(197, 'M', '2025-01-02', 3100, '2025-01-02 08:32:33', '2025-01-02 08:32:33'),
(198, 'W', '2025-01-02', 12905, '2025-01-02 08:32:33', '2025-01-02 08:32:33'),
(199, 'U', '2025-01-02', 10, '2025-01-02 08:32:33', '2025-01-02 08:32:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit_kerjas`
--

CREATE TABLE `unit_kerjas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kd_unit` varchar(255) NOT NULL,
  `nama_unit` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `unit_kerjas`
--

INSERT INTO `unit_kerjas` (`id`, `kd_unit`, `nama_unit`, `created_at`, `updated_at`) VALUES
(1, 'WH', 'GUDANG', '2024-08-13 16:12:28', '2024-08-13 16:12:45'),
(3, 'MA', 'MARKETING', '2024-08-13 16:13:40', '2024-08-13 16:13:40'),
(4, 'FIN', 'FINANCE', '2024-08-13 16:14:26', '2024-08-13 16:14:26'),
(5, 'HR', 'HRD', '2024-08-13 16:14:38', '2024-08-13 16:14:38'),
(6, 'DIR', 'DIREKTUR', '2024-08-13 16:14:51', '2024-08-13 16:14:51'),
(7, 'ASSY', 'ASEMBLING', '2024-08-13 16:15:03', '2024-08-13 16:15:03'),
(8, 'MACH', 'MESIN', '2024-08-13 16:15:13', '2024-08-13 16:15:13'),
(9, 'LE', 'ELEKTRIK', '2024-08-13 16:15:24', '2024-08-13 16:15:24'),
(10, 'MN', 'MAINTENANCE', '2024-08-13 16:15:36', '2024-08-13 16:15:36'),
(11, 'PACK', 'PACKING', '2024-08-13 16:16:03', '2024-08-13 16:16:03'),
(12, 'LAS', 'WELDING', '2024-08-13 16:16:21', '2024-08-13 16:16:21'),
(13, 'CAT', 'PAINTING', '2024-08-13 16:16:34', '2024-08-13 16:16:34'),
(14, 'WAD', 'Work Advanced', '2024-08-13 16:16:49', '2024-08-13 16:16:49'),
(15, 'WAP', 'Work Applied', '2024-08-13 16:17:00', '2024-08-13 16:17:00'),
(16, 'WBS', 'Work Basic', '2024-08-13 16:46:58', '2024-08-13 16:46:58'),
(17, 'HK', 'House Keeping', '2024-08-13 16:47:57', '2024-08-13 16:47:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('user','superadmin','admin','viewer') NOT NULL DEFAULT 'user',
  `plant` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `plant`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@atmi.com', 'superadmin', 'W', '2024-05-28 02:37:36', '$2y$12$EDNwsY9XYgx7ItHA8aue9OKLnPTXm0oLxf/euoocDxCSjd5LTAdEi', NULL, '2024-05-27 19:29:57', '2024-08-14 17:04:31'),
(5, 'User', 'user@atmi.com', 'user', 'W', '2024-05-28 02:37:36', '$2y$12$L4iXEgyOJP9hkg/6.aRWuux0zEzqlrOXP51ng1WM4zSBkLtC4tXIm', NULL, '2024-05-27 19:29:58', '2024-08-16 12:50:52'),
(7, 'victor', 'victor@atmisolo.co.id', 'superadmin', 'W', NULL, '$2y$12$jJTKe0.4.GYX0iu13ojz0usvtsYJmf.ElE/NzVn0qu4TaROjdHpp.', NULL, '2024-08-13 11:00:36', '2024-10-14 11:44:22'),
(8, 'Adi Widya', 'adi_ww@atmisolo.co.id', 'superadmin', 'W', NULL, '$2y$12$R6BWeEgY4mmDV3B7sP2ZZ.zXzxVmmOyrwVP4jwZpiKIpgjL6orRXm', NULL, '2024-08-13 11:01:32', '2024-08-14 21:43:48'),
(9, 'Hanna', 'hanna@atmisolo.co.id', 'superadmin', 'W', NULL, '$2y$12$5fGka1EDQd7rgBoX0DJcD.63JLAn/4Sy37J5hgHMUXb9tktB.CFMK', NULL, '2024-08-13 11:02:11', '2024-08-16 19:20:02'),
(10, 'Yulius', 'ycaesar01@gmail.com', 'superadmin', 'M', NULL, '$2y$12$OkKoN9aVQWqBJuDlbV7MEOF7Fe.hDYH4MgMQ8KNOgPOiEAAEnjaYa', NULL, '2024-08-13 15:22:15', '2024-08-16 01:28:35'),
(11, 'Andri', 'andriep@atmi.co.id', 'superadmin', 'M', NULL, '$2y$12$6xGTCSKJuQ4KAFl96xpnCeVoaHLy3Iyamuv17zzUVK7npwDlW2LIS', NULL, '2024-08-16 12:46:41', '2024-08-20 14:32:16'),
(12, 'Ika', 'ika@atmi.co.id', 'admin', 'M', NULL, '$2y$12$4miSeqLCMCYDeAyMlueDs.7t5twLbpV7ud70Kn6DxbKd7ib3yH7e.', NULL, '2024-08-16 12:47:37', '2024-08-16 12:47:37'),
(13, 'Viewer', 'viewer@atmi.co.id', 'viewer', 'W', NULL, '$2y$12$S89BT.gAVzTvgVAdP4op.emlnLZ4JJgU6nHt0VbnRU4nL1HDRWjci', NULL, '2024-08-16 12:53:00', '2024-08-16 12:53:00'),
(14, 'ruby', 'ruby@atmisolo.co.id', 'viewer', 'W', NULL, '$2y$12$zROveB7Ig.J8oA0aDqhLaumFxtCdLsq6/Lv5zBzJYN0YXUH0aXsyq', NULL, '2024-08-19 14:45:46', '2024-08-19 14:45:46'),
(15, 'Gerson Manuel Sugianto', 'manuelsugianto@gmail.com', 'superadmin', 'W', NULL, '$2y$12$dGVID3v5jRyseQ0B/IsDl.oYwVLmzIZUnj9NWnFC3/lNAF9euB5kS', NULL, '2024-08-21 08:40:03', '2024-08-21 08:40:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wplink`
--

CREATE TABLE `wplink` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_number` varchar(255) DEFAULT NULL,
  `no_item` varchar(255) DEFAULT NULL,
  `material` varchar(255) DEFAULT NULL,
  `jumlah` varchar(255) DEFAULT NULL,
  `harga` varchar(255) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `barcode_id` varchar(255) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `log_id` varchar(255) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `wplink`
--

INSERT INTO `wplink` (`id`, `order_number`, `no_item`, `material`, `jumlah`, `harga`, `total`, `barcode_id`, `timestamp`, `satuan`, `log_id`, `updated_at`, `created_at`, `jenis`) VALUES
(1, '24-0851-M1', '1.1', 'barang 10', '5', '4000', NULL, 'SB-ABCD', NULL, 'buah', '', '2024-08-02 13:59:37', '2024-08-02 13:59:37', 'material'),
(2, '24-0851-M1', '1.1', 'barang 3', '30', '4000', NULL, 'SB-AoTOdXKw', NULL, 'Buah', '', '2024-08-02 14:00:56', '2024-08-02 14:00:56', 'parts'),
(3, '24-0245-W2', '2.1', 'barang 10', '7', '30000', NULL, 'SB-ABCD', NULL, 'buah', '', '2024-08-02 14:39:44', '2024-08-02 14:39:44', 'parts'),
(4, '24-0851-M1', '1', 'barang 10', '3', '30000', NULL, 'SB-ABCD', NULL, 'buah', '', '2024-08-02 15:24:40', '2024-08-02 15:24:40', 'parts'),
(5, '24-0851-M1', '1.1', 'barang 10', '10', '30000', NULL, 'SB-ABCD', NULL, 'buah', '', '2024-08-02 17:46:50', '2024-08-02 17:46:50', 'material'),
(6, '24-0245-W2', '2.1', 'Barcode new', '20', '40000', NULL, 'SB63JgRE8t', NULL, 'buah', '', '2024-08-03 21:42:13', '2024-08-03 21:42:13', 'parts'),
(7, '24-1234-M7', '4', 'barang 10', '2', '35000', NULL, 'SB-ABCD', NULL, 'buah', '', '2024-08-03 23:12:09', '2024-08-03 23:12:09', 'parts'),
(8, '24-0245-W2', '3', 'bensin pertamax', '2', '70000', NULL, 'SB-14p8ryHT', NULL, 'ltr', '', '2024-08-13 13:53:02', '2024-08-13 13:53:02', 'parts'),
(9, '24-1234-M7', '4', 'bensin pertamax', '5', '70000', NULL, 'SB-14p8ryHT', NULL, 'ltr', '', '2024-08-13 13:53:08', '2024-08-13 13:53:08', 'parts'),
(10, '24-1234-M7', '1', 'bensin pertamax', '10', '70000', NULL, 'SB-14p8ryHT', NULL, 'ltr', '', '2024-08-13 14:00:44', '2024-08-13 14:00:44', 'parts'),
(11, '24-1234-M7', '3', 'tes 1', '2', '40000', NULL, 'SB-P8DZlOe6', NULL, 'm', '', '2024-08-13 16:58:49', '2024-08-13 16:58:49', 'parts'),
(12, '24-0245-W2', '2', 'packing kardus', '5', '50000', NULL, 'SB-lTzwB4Na', NULL, 'pcs', '', '2024-08-19 13:31:23', '2024-08-19 13:31:23', 'parts'),
(13, '24-1234-M7', '2', 'INSERT ZTFD0303-MG/YBG302', '10', '85000', NULL, 'SB-lFceBud4', NULL, 'pcs', '', '2024-08-20 14:22:22', '2024-08-20 14:22:22', 'parts'),
(14, '24-0245-W2', '2', 'SPCC 0,8', '5', '15000', NULL, 'SB-tb0yokoA', NULL, 'kg', '', '2024-08-20 22:11:16', '2024-08-20 22:11:16', 'materials'),
(17, '24-0245-W2', '2', 'INSERT ZTFD0303-MG/YBG302', '10', '85000', '850000', 'SB-lFceBud4', NULL, 'pcs', '82', '2024-08-21 09:17:29', '2024-08-21 09:17:29', 'parts'),
(19, '24-0245-W2', '2', 'INSERT ZTFD0303-MG/YBG302', '48', '85000', '4080000', 'SB-lFceBud4', NULL, 'pcs', '84', '2024-08-21 09:36:54', '2024-08-21 09:36:54', 'parts'),
(20, '24-0245-W2', '1', 'INSERT ZTFD0303-MG/YBG302', '1', '85000', '85000', 'SB-lFceBud4', NULL, 'pcs', '85', '2024-08-21 09:37:37', '2024-08-21 09:37:37', 'parts'),
(21, '24-0245-W8', '1.1', 'tesss', '600', '35000', '21000000', 'SB-URFCX0t4', NULL, 'tes', '86', '2024-08-22 04:11:31', '2024-08-22 04:11:31', 'materials'),
(23, '24-1234-M1', '1.1', 'tes 1', '100', '40000', '4000000', 'SB-P8DZlOe6', NULL, 'm', '91', '2024-10-13 12:47:15', '2024-10-13 12:47:15', 'materials'),
(24, '24-1234-M1', '1.2', 'bensin pertamax', '50', '35000', '1750000', 'SB-p9s7xzR8', NULL, 'ltr', '94', '2024-10-13 12:59:08', '2024-10-13 12:59:08', 'parts'),
(25, '24-1234-M1', '1.1', 'bensin pertamax', '5', '35000', '175000', 'SB-p9s7xzR8', NULL, 'ltr', '96', '2024-10-13 13:01:21', '2024-10-13 13:01:21', 'parts'),
(26, '24-0001-W1', '1', 'BAUT MS HEX M 12 X 60', '15', '169600', '2544000', 'SB-UpLgod3H', NULL, 'pcs', '97', '2024-10-14 14:35:57', '2024-10-14 14:35:57', 'parts'),
(27, '24-0001-W1', '1', 'SPCC 0,8', '30', '15000', '450000', 'SB-tb0yokoA', NULL, 'kg', '98', '2024-10-14 14:49:04', '2024-10-14 14:49:04', 'materials'),
(28, '24-23001-W1', '1', 'BAUT BAJA IMBUS M 6 X 25 - A', '20', '405840', '8116800', 'SB-VJVb7gDd', NULL, 'pcs', '99', '2024-10-14 16:35:30', '2024-10-14 16:35:30', 'parts'),
(29, '24-23001-W1', '2', 'SPCC 0,8', '10', '15000', '150000', 'SB-tb0yokoA', NULL, 'kg', '100', '2024-10-14 16:38:05', '2024-10-14 16:38:05', 'materials'),
(30, '24-23004-W1', '1', 'KAYU TOP TABLE # 20 X 1200 X 2400 HPL PUTIH. LIST PVC', '1', '1348650', '1348650', 'SB-VHcm3WZD', NULL, 'pcs', '101', '2024-10-16 09:00:02', '2024-10-16 09:00:02', 'materials'),
(31, '24-2306-W1', '1.1', 'BAUT BAJA IMBUS M 6 X 25 - A', '10', '405840', '4058400', 'SB-VJVb7gDd', NULL, 'pcs', '102', '2024-10-28 11:59:51', '2024-10-28 11:59:51', 'parts'),
(32, '24-2306-W1', '1.1', 'SPCC 0,8', '25', '15000', '375000', 'SB-tb0yokoA', NULL, 'kg', '103', '2024-10-28 12:01:25', '2024-10-28 12:01:25', 'materials'),
(33, '24-1500-W1', '1', 'SPCC 0,8', '100', '15000', '1500000', 'SB-tb0yokoA', NULL, 'kg', '104', '2024-12-06 08:56:19', '2024-12-06 08:56:19', 'materials'),
(34, '24-1500-W1', '1.1', 'BAUT BAJA IMBUS M 6 X 25 - A', '10', '405840', '4058400', 'SB-VJVb7gDd', NULL, 'pcs', '105', '2024-12-06 09:00:57', '2024-12-06 09:00:57', 'parts');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barang_logs`
--
ALTER TABLE `barang_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang_logs_barang_id_foreign` (`barang_id`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cancelhistory`
--
ALTER TABLE `cancelhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kode_institusi`
--
ALTER TABLE `kode_institusi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `log_gudangs_tables`
--
ALTER TABLE `log_gudangs_tables`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_akun`
--
ALTER TABLE `master_akun`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nama_barangs`
--
ALTER TABLE `nama_barangs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `recaps_barangs`
--
ALTER TABLE `recaps_barangs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `satuans`
--
ALTER TABLE `satuans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `stock_summaries`
--
ALTER TABLE `stock_summaries`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `unit_kerjas`
--
ALTER TABLE `unit_kerjas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `wplink`
--
ALTER TABLE `wplink`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT untuk tabel `barang_logs`
--
ALTER TABLE `barang_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT untuk tabel `cancelhistory`
--
ALTER TABLE `cancelhistory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kode_institusi`
--
ALTER TABLE `kode_institusi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `log_gudangs_tables`
--
ALTER TABLE `log_gudangs_tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `master_akun`
--
ALTER TABLE `master_akun`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `nama_barangs`
--
ALTER TABLE `nama_barangs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `produksi`
--
ALTER TABLE `produksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `recaps_barangs`
--
ALTER TABLE `recaps_barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=727;

--
-- AUTO_INCREMENT untuk tabel `satuans`
--
ALTER TABLE `satuans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `stock_summaries`
--
ALTER TABLE `stock_summaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT untuk tabel `unit_kerjas`
--
ALTER TABLE `unit_kerjas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `wplink`
--
ALTER TABLE `wplink`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang_logs`
--
ALTER TABLE `barang_logs`
  ADD CONSTRAINT `barang_logs_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
