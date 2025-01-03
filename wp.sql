-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 03 Jan 2025 pada 07.00
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
-- Database: `wp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `capacity`
--

CREATE TABLE `capacity` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plant` varchar(255) NOT NULL,
  `group_no` varchar(255) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `load` varchar(255) NOT NULL,
  `cap_week` varchar(255) NOT NULL,
  `cap_actual` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `capacity`
--

INSERT INTO `capacity` (`id`, `plant`, `group_no`, `group_name`, `load`, `cap_week`, `cap_actual`, `created_at`, `updated_at`) VALUES
(1, 'EDU', '22', 'SF GR CT', '2,127.50', '140.00', '-1,987.50', NULL, NULL),
(2, 'EDU', '23', 'TL GR CT', '5,537.60', '110.00', '-5,427.60', '2024-05-22 13:52:46', NULL),
(3, 'EDU', '24', 'UN GR CT', '1,766.20', '210.00', '-1,556.20', '2024-05-22 13:54:09', NULL),
(4, 'MDC', '1', 'ASSY MDC', '12,123.55', '40.00', '-12,083.55', '2024-05-22 13:55:23', NULL),
(5, 'MDC', '2', 'BW MDC', '22,259.67', '40.00', '-22,219.67', '2024-05-22 13:56:15', NULL),
(6, 'MDC', '3', 'DRILL MDC', '3,457.99', '120.00', '-3,337.99', '2024-05-22 13:57:24', NULL),
(7, 'STP', '72', 'LW Manual STP', '58.50', '40.00', '-18.50', '2024-05-22 13:59:08', NULL),
(8, 'STP', '73', 'MILL Manuall STP', '21.00', '40.00', '19.00', '2024-05-22 13:59:49', NULL),
(9, 'STP', '75', 'SF GR STP', '3.00', '40.00', '37.00', '2024-05-22 14:00:24', NULL),
(10, 'STP', '77', 'MILL CNC STP', '7.00', '40.00', '33.00', '2024-05-22 14:01:00', NULL),
(11, 'SUPPORT', '10', 'HK', '300.95', '42.50', '-258.45', '2024-05-22 14:02:00', NULL),
(12, 'SUPPORT', '11', 'LOG', '47,247.78', '40.00', '-47,207.78', '2024-05-22 14:02:42', NULL),
(13, 'SUPPORT', '15', 'MN', '488.10', '40.00', '-448.10', '2024-05-22 14:03:51', NULL),
(14, 'SUPPORT', '16', 'IT', '8.00', '40.00', '32.00', '2024-05-22 14:05:32', NULL),
(15, 'SUPPORT', '17', 'MT', '891.70', '40.00', '-851.70', '2024-05-22 14:06:21', NULL),
(16, 'SUPPORT', '19', 'TC', '12.30', '42.50', '30.20', '2024-05-22 14:07:03', NULL),
(17, 'WF', '20', 'PPIC', '10,931.33', '82.50', '-10,843.83', '2024-05-22 14:09:57', NULL),
(18, 'WF', '44', 'WELD WF', '234,199.59', '640.00', '-233,559.59', '2024-05-22 14:10:38', NULL),
(19, 'WF', '45', 'ASSY WF', '184,758.54', '40.00', '-184,718.54', '2024-05-22 14:11:30', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `company_info`
--

CREATE TABLE `company_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `machines_type` varchar(255) NOT NULL,
  `production_director` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `npwp` varchar(255) DEFAULT NULL,
  `tax_address` varchar(255) NOT NULL,
  `shipment` varchar(255) DEFAULT NULL,
  `customer_no` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `cp` varchar(255) DEFAULT NULL,
  `webpage` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id`, `company`, `name`, `address`, `city`, `phone`, `fax`, `email`, `npwp`, `tax_address`, `shipment`, `customer_no`, `province`, `zipcode`, `country`, `cp`, `webpage`, `created_at`, `updated_at`) VALUES
(1, 'ACROE INDONESIA PT', 'Pt. Acroe Indonesia', 'Komp. Roxy Mas Blok C-3 No. 5', 'JAKARTA', '021 - 630 3026 / 27', '021 - 633 1073', 'acroe@centrin.net.id', '01.572.661.5-028.000', 'Komp. Roxy Mas Blok C-3 No. 5', 'Komp. Roxy Mas Blok C-3 No. 5', '0001', 'DKI JAKARTA', '10150', 'INDONESIA', NULL, NULL, '2024-01-29 02:53:47', '2024-01-29 02:53:47'),
(4, 'GUNNEBO INDONESIA DISTRIBUTION PT', 'GUNNEBO INDONESIA DISTRIBUTION PT', 'Grha Gunnebo Indonesia Lt. 5', 'Purwokerto', '02100000', '02100000', 'admin@atmi.com', '83.524.320.5-023.000', 'Grha Gunnebo Indonesia Lt. 5', 'Grha Gunnebo Indonesia Lt. 5', '0002', NULL, NULL, NULL, NULL, NULL, '2024-01-29 03:15:20', '2024-12-08 23:20:51'),
(5, 'BUANA PRIMA RAYA PT', 'BAMBANG SUWITO', 'KALIMALANG, BEKASI', 'Solo', '081232131231', '02132131', 'bambang@buana.com', '12.345.678.9-098.765', 'KALIMALANG, BEKASI', 'KALIMALANG, BEKASI', '0003', NULL, NULL, NULL, NULL, NULL, '2024-02-02 07:12:09', '2024-12-10 04:53:05'),
(11, 'CAHAYA GUNUNG FOODS', 'Bp. Ag. Sigit Kurniawan', 'Boyolali', 'Boyolali', '0271-714390', '02100000', '-', NULL, 'Boyolali', 'Boyolali', '0004', NULL, NULL, NULL, NULL, NULL, '2024-09-20 09:46:04', '2024-12-10 04:53:25'),
(14, 'Tokopedia', 'UKM Futsal', 'asd', 'Asd', '123123123123', '123123', 'ycaesar01@gmail.com', '123123123', '123123', 'asd', '0005', NULL, NULL, NULL, NULL, NULL, '2024-09-23 14:16:59', '2024-12-10 04:53:47'),
(15, 'PT Kembar', 'Adi Widya', 'a', 'A', '1023019283012', '021 - 633 1073', '-', '83.524.320.5-023.000', 'a', 'a', '0006', NULL, NULL, NULL, NULL, NULL, '2024-10-03 11:08:50', '2024-12-10 04:53:59'),
(16, 'ATMI', 'atmi', 'a', 'A', '85156389299', '021 - 633 1073', '-', '01.572.661.5-028.000', 'a', 'a', '0007', NULL, NULL, NULL, NULL, NULL, '2024-10-03 14:01:29', '2024-12-10 04:54:13'),
(23, 'pt andro', 'andro', 'solo', 'Solo', '0271001', '0271001', '-', '00.000.000.0-000.000', 'Solo', 'solo', '0008', NULL, NULL, NULL, NULL, NULL, '2024-10-14 15:25:28', '2024-12-10 04:54:26'),
(25, 'PT Andalan Utama', 'bambang', 'solo', 'Solo', '-', '-', '-', '00.000.000.0-000.000', 'solo', 'Solo', '0009', NULL, NULL, NULL, NULL, NULL, '2024-10-15 10:17:12', '2024-12-10 04:54:39'),
(30, 'PT JAYA', 'Bram', 'jakarta', 'Jakarta', '-', '-', '-', '00.000.000.0-000.000', 'jakarta', 'jakarta', '0010', NULL, NULL, NULL, NULL, NULL, '2024-10-28 10:54:46', '2024-12-10 04:55:00'),
(31, 'WF1', 'WF1', 'solo', 'Solo', '-', '-', '-', '00.000.000.0-000.000', 'solo', 'Solo', '0011', NULL, NULL, NULL, NULL, NULL, '2024-11-05 08:40:04', '2024-12-10 04:55:14'),
(32, 'WF2', 'WF2', 'WF2', 'Solo', '-', '-', '-', '00.000.000.0-000.000', '-', 'Solo', '0012', NULL, NULL, NULL, NULL, NULL, '2024-11-11 13:22:37', '2024-12-10 04:55:26'),
(33, 'JAWADWIPA', 'Kenshin', 'Solo', 'SOLO', '085642211111', '085642211111', 'kenshin@kenshin.com', '52.462.456.3-456.345', 'Solo', 'Solo', '0013', 'JAWA TENGAH', '57557', 'INDONESIA', 'KENSHIN KUN', 'KENSIN.COM', '2024-11-26 13:00:43', '2024-12-10 04:55:35'),
(34, 'SUKA MAJU CV', 'Bp. Deron', 'Salatiga', 'SALATIGA', '08888888', '08888888', '1@1.com', '11.111.111.1-111.111', 'Salatiga', 'Salatiga', '0014', 'JAWA TENGAH', '55555', 'INDONESIA', 'BP. DERON', 'SUKAMAJU.COM', '2024-12-03 11:23:44', '2024-12-10 04:55:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `delivered`
--

CREATE TABLE `delivered` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `cost_material` varchar(255) NOT NULL,
  `cost_std` varchar(255) NOT NULL,
  `cost_mach` varchar(255) NOT NULL,
  `cost_labor` varchar(255) NOT NULL,
  `cost_subcon` varchar(255) NOT NULL,
  `cost_ohm` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `so_amount` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `date_order` date NOT NULL,
  `date_finish` date NOT NULL,
  `date_delivery` date NOT NULL,
  `date_by` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `delivered`
--

INSERT INTO `delivered` (`id`, `order_number`, `customer`, `product`, `cost_material`, `cost_std`, `cost_mach`, `cost_labor`, `cost_subcon`, `cost_ohm`, `amount`, `so_amount`, `state`, `date_order`, `date_finish`, `date_delivery`, `date_by`, `created_at`, `updated_at`) VALUES
(1, '17-0321-W13', 'MARDI LESTARI RS', 'Obstetric Bed', '17,749', '492,526', '2,663,838', '2,777,303', '1,141,133', '1,304,000', '8,396,549', '6,756,300', 'On Time', '2014-02-22', '0000-00-00', '2020-07-16', 'SULASTRI', '2024-05-22 15:12:57', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `department`
--

CREATE TABLE `department` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) NOT NULL,
  `work_unit` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `group` varchar(10) NOT NULL,
  `user_novvel` varchar(255) NOT NULL,
  `information` varchar(255) DEFAULT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `department`
--

INSERT INTO `department` (`id`, `kode`, `work_unit`, `name`, `email`, `group`, `user_novvel`, `information`, `nik`, `created_at`, `updated_at`) VALUES
(1, '1', 'WF', 'Victor', 'victor@atmi.co.id', 'WF', 'y_riyono', 'WF', '000000000000000', '2024-01-29 02:47:41', '2024-01-29 02:47:41'),
(3, '0', 'FIN', 'Hanna', 'fransesca@atmi.co.id', 'FIN', 'hanna', 'FIN', '1', '2024-07-10 02:22:51', '2024-07-10 02:22:51'),
(6, '2', 'PROD_WF', 'Pasti s', 'pasti_s@atmi.co.id', 'PROD_WF', 'pasti_s', 'App Prod', NULL, '2024-07-10 02:36:50', '2024-07-10 02:36:50'),
(7, '3', 'MA', 'Rubyanto', 'albert@atmi.co.id.ruby', 'MA', 'eni', 'App MA', NULL, '2024-07-10 02:39:19', '2024-07-10 02:39:19'),
(8, '3', 'MA', 'Wardana', 'albert@atmi.co.id.ruby', 'MA', 'eni', 'App MA', NULL, '2024-07-10 02:39:46', '2024-07-10 02:39:46'),
(9, '3', 'MA', 'Aryono Aji', 'albert@atmi.co.id.ruby', 'MA', 'eni', 'App MA', NULL, '2024-07-10 02:40:33', '2024-07-10 02:40:33'),
(10, '3', 'MA', 'Albert Simanjuntak', 'albert@atmi.co.id.ruby', 'MA', 'natalia', 'App MA', NULL, '2024-07-10 02:41:17', '2024-07-10 02:41:17'),
(11, '3', 'MA', 'Natalia', 'albert@atmi.co.id.ruby', 'MA', 'natalia', 'App MA', NULL, '2024-07-10 02:41:42', '2024-07-10 02:41:56'),
(12, '4', 'LOG', 'Yakub Utama', 'yakub_utama@atmi.co.id', 'LOG', 'yakub', 'Logistik', NULL, '2024-07-10 02:42:40', '2024-07-10 02:42:40'),
(13, '5', 'FIN-5', 'Christian', 'christian_mebhu@atmi.co.id', 'FIN-5', 'christian', 'Finance', NULL, '2024-07-10 02:43:53', '2024-07-10 02:43:53'),
(14, '5', 'FIN-5', 'Puji Haryadi', 'puji_har@atmi.co.id', 'FIN-5', 'puji_haryadi', 'Finance', NULL, '2024-07-10 02:44:36', '2024-07-10 02:44:36'),
(15, '5', 'FIN-5', 'Lina', 'lina@atmi.co.id', 'FIN-5', 'lina', 'Finance', NULL, '2024-07-10 02:45:06', '2024-07-10 02:45:06'),
(16, '6', 'PROD_MDC', 'Adi Wijaya', 'adi_www@atmi.co.id', 'MDC', 'adi_wijaya', 'App Prod', NULL, '2024-07-10 02:48:21', '2024-07-10 02:48:21'),
(17, '7', 'MDC', 'QC', 'qc_mdc@atmi.co.id', 'MDC', 'qc', 'Maker', NULL, '2024-07-10 02:49:33', '2024-07-10 02:49:33'),
(18, '7', 'MDC', 'Sapto', 'sapto_r@atmi.co.id', 'MDC', 'sapto', 'Maker', NULL, '2024-07-10 02:50:11', '2024-07-10 02:50:11'),
(19, '7', 'MDC', 'Gumarang', 'djaka_w@atmi.co.id', 'MDC', 'gumarang', 'Maker', NULL, '2024-07-10 02:50:44', '2024-07-10 02:50:44'),
(20, '7', 'MDC', 'Heru', 'heru_joko@atmi.co.id', 'MDC', 'heru', 'Maker', NULL, '2024-07-10 02:51:20', '2024-07-10 02:51:20'),
(21, '8', 'SJ_WF', 'Victor', 'victor@atmi.co.id', 'SJ_WF', 'y_riyono', 'Cetak Surat Jalan', NULL, '2024-07-10 02:52:08', '2024-07-10 02:52:08'),
(22, '8', 'SJ_MDC', 'Yakub', 'yakub_utama@atmi.co.id', 'SJ_MDC', 'yakub', 'SJ_MDC', NULL, '2024-07-10 02:53:29', '2024-07-10 02:53:29'),
(23, '9', 'IT', '-', 'yak_sukamto@atmi.co.id', 'IT', 'sukamto', 'IT', NULL, '2024-07-10 02:54:42', '2024-07-10 02:54:42'),
(24, '10', 'PROD_IT', '-', 'yak_sukamto@atmi.co.id', 'IT', 'sukamto', 'PROD_IT', NULL, '2024-07-10 02:55:24', '2024-07-10 02:55:24'),
(25, '11', 'EDU', 'Sapto', 'sapto_r@atmi.co.id', 'EDU', 'sapto', 'Maker', NULL, '2024-07-10 02:56:50', '2024-07-10 02:56:50'),
(26, '12', 'SJ_IT', '-', 'yak_sukamto@atmi.co.id', 'SJ_IT', '-', 'SJ_IT', NULL, '2024-07-10 02:57:10', '2024-07-10 02:57:10'),
(27, '123123', 'TES', 'Yulius', 'ycaesar01@gmail.com', 'TES', 'yulius', 'tes', NULL, '2024-08-14 11:42:37', '2024-08-14 11:42:37');

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
-- Struktur dari tabel `finish_good`
--

CREATE TABLE `finish_good` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `cost_material` varchar(255) NOT NULL,
  `cost_std` varchar(255) NOT NULL,
  `cost_mach` varchar(255) NOT NULL,
  `cost_labor` varchar(255) NOT NULL,
  `cost_subcon` varchar(255) NOT NULL,
  `cost_ohm` varchar(255) NOT NULL,
  `finish` varchar(255) NOT NULL,
  `so_amount` varchar(255) NOT NULL,
  `date_order` date NOT NULL,
  `date_finish` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `finish_good`
--

INSERT INTO `finish_good` (`id`, `order_number`, `customer`, `product`, `cost_material`, `cost_std`, `cost_mach`, `cost_labor`, `cost_subcon`, `cost_ohm`, `finish`, `so_amount`, `date_order`, `date_finish`, `created_at`, `updated_at`) VALUES
(1, '15-0114-W01', 'Almik Kurnia Bersama PT', 'Almik Kurnia Bersama PT', '', '1,452.620', '312,369', '770,774', '', '', '2,535,763', '20,380,000', '2015-01-28', '2017-05-11', '2024-05-22 14:31:10', NULL),
(2, '15-0114-W01	', 'Almik Kurnia Bersama PT', 'Almik Kurnia Bersama PT', '', '', '656,500', '', '', '', '656,500', '20,380,000', '2015-01-28', '2017-05-11', '2024-05-22 14:34:38', NULL),
(3, '16-0195-M01', 'TRI KARYA NUSANTARA ', 'TRI KARYA NUSANTARA ', '27,550', '46,031,987', '2,641,431', '1,020,000', '', '', '49,720,968', '115,867,300', '2016-01-28', '2017-05-09', '2024-05-22 14:37:01', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `inspection_sheet`
--

CREATE TABLE `inspection_sheet` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_no` varchar(255) NOT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `so_no` varchar(255) NOT NULL,
  `material` varchar(255) DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `dwg_no` varchar(255) DEFAULT NULL,
  `no_s` varchar(255) DEFAULT NULL,
  `no_b` varchar(255) DEFAULT NULL,
  `length` varchar(255) DEFAULT NULL,
  `width` varchar(255) DEFAULT NULL,
  `thickness` varchar(255) DEFAULT NULL,
  `rack` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `inspection_sheet`
--

INSERT INTO `inspection_sheet` (`id`, `item_no`, `qty`, `date`, `so_no`, `material`, `weight`, `dwg_no`, `no_s`, `no_b`, `length`, `width`, `thickness`, `rack`, `created_at`, `updated_at`) VALUES
(1, 'P13', '10', '2018-10-14', '18-1449-W', NULL, '0.0', NULL, '10', '10', '0', '0', '0', NULL, NULL, NULL),
(3, 'SPL', '10', '2018-10-14', '18-1469-W', 'STANDART PART', '0.0', '280046', '10', '10', '0', '0', '0', NULL, '2024-05-20 04:35:32', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `item`
--

CREATE TABLE `item` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `dod` date DEFAULT NULL,
  `product` varchar(255) DEFAULT NULL,
  `so_number` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `item`
--

INSERT INTO `item` (`id`, `order_number`, `company_name`, `dod`, `product`, `so_number`, `created_at`, `updated_at`) VALUES
(6, '123123', 'GUNNEBO INDONESIA DISTRIBUTION PT', '2024-03-19', 'Mobile File 2S16D-3 Row (Tinggi 2.8m)', '24-0132-W', '2024-07-02 10:20:16', '2024-07-02 10:20:16'),
(7, '24-0132-NEW', 'GUNNEBO INDONESIA DISTRIBUTION PT', '2024-03-19', 'Mobile File 2S16D-3 Row (Tinggi 2.8m)', '24-0132-W', '2024-07-03 07:23:45', '2024-07-03 07:23:45'),
(8, '24-0245-W', 'Pt. Acroe Indonesia', '2024-07-03', 'Meja Meeting', '24-0245-W', '2024-07-03 09:13:58', '2024-07-03 09:13:58'),
(9, '24-0245-W', 'Pt. Acroe Indonesia', '2024-07-03', 'Meja Meeting', '24-0245-W', '2024-07-08 03:52:19', '2024-07-08 03:52:19'),
(10, '24-0245-W2', 'Pt. Acroe Indonesia', '2024-07-03', 'LEANTURN', '24-0245-W', '2024-07-11 08:05:20', '2024-07-11 08:05:20'),
(20, '24-1234-M7', 'BAMBANG SUWITO', '2024-03-08', 'Mobile File 2S2D-4 Row (Tinggi 2.8m)', '24-1234-M', '2024-07-22 02:28:43', '2024-07-22 02:28:43'),
(21, '24-1234-M7', 'BAMBANG SUWITO', '2024-03-08', 'Mobile File 2S2D-4 Row (Tinggi 2.8m)', '24-1234-M', '2024-07-22 02:31:58', '2024-07-22 02:31:58'),
(23, '24-1234-M7', 'BAMBANG SUWITO', '2024-03-08', 'Mobile File 2S2D-4 Row (Tinggi 2.8m)', '24-1234-M', '2024-07-23 12:10:30', '2024-07-23 12:10:30'),
(24, '24-1234-M7', 'BAMBANG SUWITO', '2024-03-08', 'Mobile File 2S2D-4 Row (Tinggi 2.8m)', '24-1234-M', '2024-08-13 15:39:30', '2024-08-13 15:39:30'),
(25, '24-1234-M7', 'BAMBANG SUWITO', '2024-03-08', 'Mobile File 2S2D-4 Row (Tinggi 2.8m)', '24-1234-M', '2024-08-13 15:42:41', '2024-08-13 15:42:41'),
(26, '24-1408-W', 'GUNNEBO INDONESIA DISTRIBUTION PT', '2024-08-14', 'Meja Kerja', '24-1408-W', '2024-08-14 11:56:53', '2024-08-14 11:56:53'),
(30, '24-1234-M1', 'BAMBANG SUWITO', '2024-03-08', 'LEANTURN', '24-1234-M', '2024-09-11 04:52:02', '2024-09-11 04:52:02'),
(31, '24-1408-W2', 'GUNNEBO INDONESIA DISTRIBUTION PT', '2024-08-14', 'a', '24-1408-W', '2024-09-12 04:43:40', '2024-09-12 04:43:40'),
(34, '24-0132-W4', 'GUNNEBO INDONESIA DISTRIBUTION PT', '2024-03-19', 'Mobile File 2S16D-3 Row (Tinggi 2.8m)', '24-0132-W', '2024-09-26 03:08:03', '2024-09-26 03:08:03'),
(35, '24-0132-W4', 'GUNNEBO INDONESIA DISTRIBUTION PT', '2024-03-19', 'Mobile File 2S16D-3 Row (Tinggi 2.8m)', '24-0132-W', '2024-10-10 08:26:12', '2024-10-10 08:26:12'),
(37, '24-0132-W5', 'GUNNEBO INDONESIA DISTRIBUTION PT', '2024-03-19', 'Meja Meeting', '24-0132-W', '2024-10-11 17:09:30', '2024-10-11 17:09:30'),
(38, '24-1408-W3', 'GUNNEBO INDONESIA DISTRIBUTION PT', '2024-08-14', 'Meja Meeting', '24-1408-W', '2024-10-11 21:08:38', '2024-10-11 21:08:38'),
(39, '24-1234-M1', 'BAMBANG SUWITO', '2024-03-08', 'LEANTURN', '24-1234-M', '2024-10-11 21:13:38', '2024-10-11 21:13:38'),
(43, '24-1234-M1', 'BAMBANG SUWITO', '2024-03-08', 'LEANTURN', '24-1234-M', '2024-10-14 01:39:02', '2024-10-14 01:39:02'),
(44, '24-1234-M1', 'BAMBANG SUWITO', '2024-03-08', 'LEANTURN', '24-1234-M', '2024-10-14 01:41:40', '2024-10-14 01:41:40'),
(47, '24-0001-W1', 'GUNNEBO INDONESIA DISTRIBUTION PT', '2024-11-14', 'Mobile File 2S16D-3 Row (Tinggi 2.8m)', '24-0001-W', '2024-10-14 14:14:17', '2024-10-14 14:14:17'),
(48, 'STWF-1024', 'coba wf', '2024-10-31', 'Meja Kerja', 'STWF-1024', '2024-10-14 14:20:42', '2024-10-14 14:20:42'),
(49, '24-0002-W1', 'GUNNEBO INDONESIA DISTRIBUTION PT', '2024-11-14', 'Mobile File 2S16D-3 Row (Tinggi 2.8m)', '24-0001-W', '2024-10-14 15:07:24', '2024-10-14 15:07:24'),
(51, '24-23001-W1', 'andro', '2024-10-30', 'product test', '24-23001-W', '2024-10-14 16:28:58', '2024-10-14 16:28:58'),
(52, '24-24001-W1', 'andro', '2024-10-30', 'product test', '24-23001-W', '2024-10-14 17:04:15', '2024-10-14 17:04:15'),
(53, '24-25001-W1', 'andro', '2024-10-30', 'product test', '24-23001-W', '2024-10-15 01:36:09', '2024-10-15 01:36:09'),
(54, '24-23002-W1', 'andro', '2024-10-30', 'product test', '24-23001-W', '2024-10-16 08:07:33', '2024-10-16 08:07:33'),
(55, '24-23003-W1', 'andro', '2024-10-30', 'product test', '24-23001-W', '2024-10-16 08:10:33', '2024-10-16 08:10:33'),
(56, '24-23004-W1', 'Adi Widya', '2024-10-17', 'a', '24-23004-W', '2024-10-16 08:30:38', '2024-10-16 08:30:38'),
(57, '24-0021-W1', 'Gerson Manuel', '2024-10-22', 'Q24-0267-1', '24-0021-W', '2024-10-23 15:38:24', '2024-10-23 15:38:24'),
(59, '24-0021-W1', 'Gerson Manuel', '2024-10-22', 'Q24-0267-1', '24-0021-W', '2024-10-24 09:12:11', '2024-10-24 09:12:11'),
(64, '24-1234-M7', 'BAMBANG SUWITO', '2024-03-08', 'Mobile File 2S2D-4 Row (Tinggi 2.8m)', '24-1234-M', '2024-10-25 08:49:37', '2024-10-25 08:49:37'),
(67, '24-0005-W1', 'bambang', '2024-10-23', '303', '24-0005-W', '2024-10-25 09:02:21', '2024-10-25 09:02:21'),
(68, '24-2306-W1', 'Bram', '2024-11-04', '011-001', '24-2306-W', '2024-10-28 11:21:58', '2024-10-28 11:21:58'),
(69, '24-2307-W1', 'Bram', '2024-11-04', '011-001', '24-2306-W', '2024-10-28 11:25:10', '2024-10-28 11:25:10'),
(71, '24-2309-W1', 'WF2', '2024-11-12', '210-002', '24-2309-W', '2024-11-11 14:49:37', '2024-11-11 14:49:37'),
(72, '24-0132-W1', 'GUNNEBO INDONESIA DISTRIBUTION PT', '2024-03-19', 'Meja Meeting', '24-0132-W', '2024-11-11 15:56:54', '2024-11-11 15:56:54'),
(73, '24-2309-W2', 'WF2', '2024-11-12', '210-003', '24-2309-W', '2024-11-14 07:52:17', '2024-11-14 07:52:17'),
(74, '24-2310-W1', 'Bram', '2024-11-22', '210-002', '24-2310-W', '2024-11-15 06:09:26', '2024-11-15 06:09:26'),
(75, '24-2310-W2', 'Bram', '2024-11-22', '210-003', '24-2310-W', '2024-11-15 06:13:03', '2024-11-15 06:13:03'),
(76, '24-0245-W6', 'Pt. Acroe Indonesia', '2024-07-03', 'LEANTURN', '24-0245-W', '2024-11-19 20:13:16', '2024-11-19 20:13:16'),
(77, '24-1234-M9', 'BAMBANG SUWITO', '2024-03-08', 'Mobile File 2S2D-4 Row (Tinggi 2.8m)', '24-1234-M', '2024-11-19 20:15:25', '2024-11-19 20:15:25'),
(78, '24-1234-M9', 'BAMBANG SUWITO', '2024-03-08', 'Mobile File 2S2D-4 Row (Tinggi 2.8m)', '24-1234-M', '2024-11-19 20:15:25', '2024-11-19 20:15:25'),
(79, '24-1234-M9', 'BAMBANG SUWITO', '2024-03-08', 'Mobile File 2S2D-4 Row (Tinggi 2.8m)', '24-1234-M', '2024-11-19 20:15:25', '2024-11-19 20:15:25'),
(80, '24-1234-M9', 'BAMBANG SUWITO', '2024-03-08', 'Mobile File 2S2D-4 Row (Tinggi 2.8m)', '24-1234-M', '2024-11-19 20:15:25', '2024-11-19 20:15:25'),
(81, '24-1234-M9', 'BAMBANG SUWITO', '2024-03-08', 'Mobile File 2S2D-4 Row (Tinggi 2.8m)', '24-1234-M', '2024-11-19 20:15:25', '2024-11-19 20:15:25'),
(82, '24-1234-M9', 'BAMBANG SUWITO', '2024-03-08', 'Mobile File 2S2D-4 Row (Tinggi 2.8m)', '24-1234-M', '2024-11-19 20:15:25', '2024-11-19 20:15:25'),
(83, '24-1234-M10', 'BAMBANG SUWITO', '2024-03-08', 'Mobile File 2S2D-4 Row (Tinggi 2.8m)', '24-1234-M', '2024-11-19 21:08:43', '2024-11-19 21:08:43'),
(84, '24-1234-M10', 'BAMBANG SUWITO', '2024-03-08', 'Mobile File 2S2D-4 Row (Tinggi 2.8m)', '24-1234-M', '2024-11-19 21:08:43', '2024-11-19 21:08:43'),
(85, '24-1234-M10', 'BAMBANG SUWITO', '2024-03-08', 'Mobile File 2S2D-4 Row (Tinggi 2.8m)', '24-1234-M', '2024-11-19 21:08:43', '2024-11-19 21:08:43'),
(86, '24-1234-M10', 'BAMBANG SUWITO', '2024-03-08', 'Mobile File 2S2D-4 Row (Tinggi 2.8m)', '24-1234-M', '2024-11-19 21:08:43', '2024-11-19 21:08:43'),
(87, '24-1234-M10', 'BAMBANG SUWITO', '2024-03-08', 'Mobile File 2S2D-4 Row (Tinggi 2.8m)', '24-1234-M', '2024-11-19 21:08:43', '2024-11-19 21:08:43'),
(88, '24-1234-M10', 'BAMBANG SUWITO', '2024-03-08', 'Mobile File 2S2D-4 Row (Tinggi 2.8m)', '24-1234-M', '2024-11-19 21:08:43', '2024-11-19 21:08:43'),
(89, '24-2310-W3', 'Bram', '2024-11-22', '210-003', '24-2310-W', '2024-11-19 21:34:28', '2024-11-19 21:34:28'),
(90, '24-2311-W1-1732027813', 'Bram', '2024-11-22', '210-002', '24-2310-W', '2024-11-19 21:50:13', '2024-11-19 21:50:13'),
(91, '24-2311-W1', 'Bram', '2024-11-22', '210-002', '24-2310-W', '2024-11-19 22:00:12', '2024-11-19 22:00:12'),
(92, '24-2311-W2', 'Bram', '2024-11-22', '210-003', '24-2310-W', '2024-11-19 22:15:18', '2024-11-19 22:15:18'),
(93, '24-2312-W2', 'Bram', '2024-11-29', '210-002', '24-2312-W', '2024-11-22 08:17:49', '2024-11-22 08:17:49'),
(94, '24-2312-W2', 'Bram', '2024-11-29', '210-003', '24-2312-W', '2024-11-22 08:18:17', '2024-11-22 08:18:17'),
(95, '24-2312-W2', 'Bram', '2024-11-29', '210-002', '24-2312-W', '2024-11-22 10:26:17', '2024-11-22 10:26:17'),
(96, '24-2312-W2', 'Bram', '2024-11-29', '210-003', '24-2312-W', '2024-11-22 10:26:17', '2024-11-22 10:26:17'),
(97, '24-2312-W1', 'Bram', '2024-11-29', '210-002', '24-2312-W', '2024-11-22 10:34:14', '2024-11-22 10:34:14'),
(98, '24-2312-W1', 'Bram', '2024-11-29', '210-003', '24-2312-W', '2024-11-22 10:34:14', '2024-11-22 10:34:14'),
(99, '24-2312-W1', 'Bram', '2024-11-29', '210-002', '24-2312-W', '2024-11-22 10:34:14', '2024-11-22 10:34:14'),
(100, '24-2312-W1', 'Bram', '2024-11-29', '210-003', '24-2312-W', '2024-11-22 10:34:14', '2024-11-22 10:34:14'),
(101, '24-2310-W1', 'Bram', '2024-11-22', '210-003', '24-2310-W', '2024-11-22 11:00:33', '2024-11-22 11:00:33'),
(102, '24-2311-M1', 'Gerson Manuel', '2024-11-23', '011-005', '24-2311-M', '2024-11-23 01:36:21', '2024-11-23 01:36:21'),
(105, '24-2311-M2', 'Gerson Manuel', '2024-11-23', '011-005', '24-2311-M', '2024-11-23 02:12:35', '2024-11-23 02:12:35'),
(106, '24-2313-W1', 'Bram', '2024-11-22', '210-002', '24-2310-W', '2024-11-25 15:27:14', '2024-11-25 15:27:14'),
(107, '24-2313-W1', 'Bram', '2024-11-22', '210-003', '24-2310-W', '2024-11-25 15:27:14', '2024-11-25 15:27:14'),
(108, '24-2313-W2', 'Bram', '2024-11-22', '210-003', '24-2310-W', '2024-11-25 15:27:37', '2024-11-25 15:27:37'),
(109, 'STWF421', 'Adi Widya', '2024-11-25', '011-001', 'STWF42', '2024-11-25 18:50:51', '2024-11-25 18:50:51'),
(110, '24-0021-W1', 'Gerson Manuel', '2024-11-25', '011-001', 'STWF42', '2024-11-25 18:58:52', '2024-11-25 18:58:52'),
(111, '24-2314-W1', 'Andy', '2024-11-22', '210-002', '24-2314-W', '2024-11-26 10:35:45', '2024-11-26 10:35:45'),
(112, '24-2314-W1', 'Andy', '2024-11-22', '210-003', '24-2314-W', '2024-11-26 10:35:45', '2024-11-26 10:35:45'),
(113, '24-2314-W2', 'Andy', '2024-11-22', '210-003', '24-2314-W', '2024-11-26 10:36:43', '2024-11-26 10:36:43'),
(114, '24-2315-W1', 'Kenshin', '2024-12-03', '210-002', '24-2315-W', '2024-11-26 13:12:14', '2024-11-26 13:12:14'),
(115, '24-2315-W2', 'Kenshin', '2024-12-03', '210-003', '24-2315-W', '2024-11-26 13:17:14', '2024-11-26 13:17:14'),
(116, '24-2811-W1', 'bambang', '2024-11-28', '011-006', '24-2811-W', '2024-11-28 16:36:48', '2024-11-28 16:36:48'),
(117, '24-2811-W2', 'bambang', '2024-11-28', '011-006', '24-2811-W', '2024-11-28 16:43:06', '2024-11-28 16:43:06'),
(123, '24-2000-W2', 'Gerson Manuel', '2024-11-29', '011-008', '24-2000-W', '2024-12-02 11:18:39', '2024-12-02 11:18:39'),
(126, '24-0212-W1', 'COBA', '2024-11-29', '001-001', '24-0212-W', '2024-12-02 12:41:08', '2024-12-02 12:41:08'),
(127, '24-0212-W1', 'COBA', '2024-11-29', '001-001', '24-0212-W', '2024-12-02 12:41:08', '2024-12-02 12:41:08'),
(128, '24-0212-W1', 'COBA', '2024-07-03', 'LEANTURN', '24-0212-W', '2024-12-02 12:41:55', '2024-12-02 12:41:55'),
(129, '24-0212-W2', 'COBA', '2024-07-03', 'LEANTURN', '24-0212-W', '2024-12-02 12:42:24', '2024-12-02 12:42:24'),
(130, 'STFW1011', 'UKM Futsal', '2024-12-02', '011-007', 'STFW101', '2024-12-02 13:10:25', '2024-12-02 13:10:25'),
(132, 'STFW1012', 'UKM Futsal', '2024-12-02', '011-006', 'STFW101', '2024-12-02 13:25:34', '2024-12-02 13:25:34'),
(133, '24-2911-W1', 'WF', '2024-12-02', '011-007', '24-2911-W', '2024-12-02 13:29:05', '2024-12-02 13:29:05'),
(134, 'STFW23101', 'tommy', '2024-12-02', '011-007', 'STFW2310', '2024-12-02 16:23:15', '2024-12-02 16:23:15'),
(135, '24-1500-W1', 'Bp. Ag. Sigit Kurniawan', '2024-12-31', '001-001', '24-1500-W', '2024-12-03 11:35:57', '2024-12-03 11:35:57'),
(136, '24-1500-W1', 'Bp. Ag. Sigit Kurniawan', '2024-12-31', '001-001', '24-1500-W', '2024-12-06 09:12:41', '2024-12-06 09:12:41'),
(137, 'Int24-1500-W1', 'coba wf', '2024-12-31', '001-001', 'Int24-1500-W', '2024-12-06 11:51:23', '2024-12-06 11:51:23'),
(138, 'Int24-1500-W1', 'coba wf', '2024-12-31', '001-001', 'Int24-1500-W', '2024-12-06 11:51:23', '2024-12-06 11:51:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `itemadd`
--

CREATE TABLE `itemadd` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(255) DEFAULT NULL,
  `id_item` varchar(255) DEFAULT NULL,
  `no_item` varchar(255) DEFAULT NULL,
  `item` varchar(255) DEFAULT NULL,
  `dod_item` date DEFAULT NULL,
  `material` varchar(255) DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `length` varchar(255) DEFAULT NULL,
  `width` varchar(255) DEFAULT NULL,
  `thickness` varchar(255) DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `nos` varchar(255) DEFAULT NULL,
  `nob` varchar(255) DEFAULT NULL,
  `issued_item` date DEFAULT NULL,
  `ass_drawing` varchar(255) DEFAULT NULL,
  `drawing_no` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `material_cost` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `itemadd`
--

INSERT INTO `itemadd` (`id`, `order_number`, `id_item`, `no_item`, `item`, `dod_item`, `material`, `weight`, `length`, `width`, `thickness`, `qty`, `nos`, `nob`, `issued_item`, `ass_drawing`, `drawing_no`, `created_at`, `updated_at`, `material_cost`, `status`) VALUES
(0, '24-1234-M7', '3', '1', 'Item 3', '2024-08-10', 'Plat 3\"', '16.00', '4', '2', '1', NULL, '1', '2', '2024-07-23', '33', '223', '2024-07-23 12:10:30', '2024-07-23 12:10:30', '800000', NULL),
(21, '24-0245-W2', '1', '1', 'blockframe', '2024-08-02', 'PLAT 3\'', '54.00', '2', '3', '3', NULL, '5', '2', '2024-07-11', '1500', '30000', '2024-07-11 08:05:20', '2024-07-11 08:05:20', NULL, NULL),
(22, '24-0245-W2', '2', '2', 'blockframe 2', '2024-08-03', 'PLAT 3\'', '63.62', '02', '03', '03', NULL, '5', '1', '2024-07-11', '15002', '300003', '2024-07-11 08:05:20', '2024-07-11 08:05:20', NULL, NULL),
(23, '24-0245-W2', '3', '3', 'blockframe 4', '2024-08-07', 'BRONZE', '96.00', '04', '04', '02', NULL, '5', '1', '2024-07-11', '15003', '3000033', '2024-07-11 08:05:20', '2024-07-11 08:05:20', NULL, NULL),
(24, '24-1234-M7', '1', '2', '2', '2024-07-22', 'Plat 3\"', '4.00', '1', '1', '2', NULL, '1', '1', '2024-07-22', '22', '22', '2024-07-22 02:28:43', '2024-07-22 02:28:43', '180000', NULL),
(25, '24-1234-M7', '1', '3', '2', '2024-07-22', 'Plat 3\"', '6.00', '2', '1', '1', NULL, '1', '1', '2024-07-22', '22', '23', '2024-07-22 02:31:58', '2024-07-22 02:31:58', '270000', NULL),
(27, '24-1234-M7', '1', '4', 'Item 1', '2024-08-03', 'Plat 3\"', '19.63', '1', '5', '1', NULL, '1', '2', '2024-07-23', '22', '123', '2024-07-23 12:10:30', '2024-07-23 12:10:30', '981748', NULL),
(28, '24-1234-M7', '2', '5', 'Item 2', '2024-08-08', 'Plat 3\"', '3.00', '3', '1', '1', NULL, '1', '2', '2024-07-23', '22', '2123', '2024-07-23 12:10:30', '2024-07-23 12:10:30', '150000', NULL),
(30, '24-1234-M7', '1', '2', 'Pipa', '2024-08-13', 'SPCC 0,8', '6.00', '2', '3', '1', NULL, '2', '2', '2024-08-13', '3', '3', '2024-08-13 15:39:30', '2024-08-13 15:39:30', '90000', NULL),
(31, '24-1234-M7', '1', '2.1', 'Pipa', '2024-08-13', 'SPCC 0,8', '0.79', '1', '1', '1', NULL, '1', '1', '2024-08-13', '222', '333', '2024-08-13 15:42:41', '2024-08-13 15:42:41', '11781', NULL),
(32, '24-1408-W', '1', '1', 'blockframe 1', '2024-08-14', 'SPCC 0,8', '125.00', '5', '5', '5', NULL, '5', '4', '2024-08-14', '6', 'v', '2024-08-14 11:56:53', '2024-08-14 11:56:53', '1875000', NULL),
(33, '24-1408-W', '2', '1.1', 'rangkaian blockframe 1', '2024-08-14', 'tes 1', '64.00', '4', '4', '4', NULL, '5', '4', '2024-08-14', '6', '6', '2024-08-14 11:56:53', '2024-08-14 11:56:53', '2560000', NULL),
(36, '24-1234-M1', '1', '1', 'item 1', '2024-09-11', 'ALLUMINIUM 7075 # 50 x 50', '1.00', '1', '1', '1', NULL, '2', '2', '2024-09-11', 's', '22', '2024-09-11 04:52:02', '2024-09-11 04:52:02', '1006200', NULL),
(37, '24-1408-W2', '1', '2', 'Press', '2024-09-12', 'Pipa ⌀ 10', '2.00', '1', '1', '2', NULL, '1', '1', '2024-09-12', 's', 'a', '2024-09-12 04:43:40', '2024-09-12 04:43:40', '60000', NULL),
(38, '24-1408-W2', '2', '1', 'Frame', '2024-09-12', 'SPRING STEEL # 08 x 200', '0.06', '1', '1', '2', NULL, '1', '1', '2024-09-12', 's', 'a', '2024-09-12 04:43:40', '2024-09-12 04:43:40', '46370', NULL),
(39, '24-0132-W4', '1', '1', '2', '2024-09-26', 'KAYU BANGKU KANTIN Plywood+HDMR+HPL TH321H+List jati 5mm #1800x350x20 DRW 3', '0.16667', '01000', '0200', '0300', NULL, '2', '2', '2024-09-05', '22', '333', '2024-09-26 03:08:03', '2024-09-26 03:08:03', 'Rp 166.083,67', NULL),
(40, '24-0132-W4', '2', '1.1', '3', '2024-09-26', 'RODA ALMARI ALPHA Dia 19 mm', '0.66650', '3999', '4000', '0.05', NULL, '4', '3', '2024-09-26', '4', '891', '2024-09-26 03:08:03', '2024-09-26 03:08:03', 'Rp 1.999,50', NULL),
(41, '24-0132-W4', '3', '1.1.1', '4', '2024-09-26', 'STST PIPE 316 ? 3/4\" SCH 40', '7.85000', '40000', '500', '0.05', NULL, '4', '3', '2024-09-26', '5', '1', '2024-09-26 03:08:03', '2024-09-26 03:08:03', 'Rp 2.799.828,10', NULL),
(42, '24-0132-W4', '1', '1.1', 'wall', '2024-10-25', 'SPCC 0,8', '3.14000', '1000', '500', '0.8', NULL, '1', '1', '2024-10-10', '2000', '2001', '2024-10-10 08:26:12', '2024-10-10 08:26:12', '47100.00', NULL),
(44, '24-0132-W5', '1', '1', 'MEJA MEETING', '2024-10-18', 'STST PIPE 316 ? 3/4\" SCH 40', '0.00000', '0', '0', '0', NULL, '1', '1', '2024-10-11', '1', '1', '2024-10-11 17:09:30', '2024-10-11 17:09:30', '0.00', NULL),
(45, '24-1408-W3', '1', '1.1', 'Wall', '2024-12-08', 'SPCC 0,8', '21.03109', '02440', '01220', '00.9', NULL, '2', '2', '2024-12-02', '12345', '123456', '2024-10-11 21:08:38', '2024-10-11 21:08:38', '315466.38', NULL),
(46, '24-1234-M1', '1', '1.1', 'Wall A', '2024-11-20', 'SPCC 0,8', '20.34720', '02400', '01200', '0.9', NULL, '2', '2', '2024-10-11', '1122', '11223', '2024-10-11 21:13:38', '2024-10-11 21:13:38', '305208.00', NULL),
(47, '24-1234-M1', '2', '1.2', 'Wall B', '2024-11-22', 'SPRING STEEL # 08 x 200', '6.27533', '0100', '100', '100', NULL, '3', '3', '2024-10-11', '1127', '111133', '2024-10-11 21:13:38', '2024-10-11 21:13:38', '4631194.52', NULL),
(51, '24-1234-M1', '1', '3', 'aa', '2024-10-14', 'RODA ALMARI ALPHA Dia 19 mm', '30.00000', '030', '0', '0', NULL, '2', '2', '2024-10-14', '3', '44', '2024-10-14 01:39:02', '2024-10-14 01:39:02', '90000.00', NULL),
(52, '24-1234-M1', '2', '3.1', 'Aaa', '2024-10-14', 'VCN ? 90', '80.00000', '080', '0', '0', NULL, '2', '22', '2024-10-14', '3', '55', '2024-10-14 01:39:02', '2024-10-14 01:39:02', '233856000.00', NULL),
(53, '24-1234-M1', '3', '3.1', 'Ffg', '2024-10-14', 'SPCC 0,8', '60.00000', '060', '0', '0', NULL, 'Af', 'Hj', '2024-10-14', 'Gg', 'Dd', '2024-10-14 01:41:40', '2024-10-14 01:41:40', '900000.00', NULL),
(57, '24-0001-W1', '1', '1', 'wall', '2024-10-21', 'SPCC 0,8', '3.14000', '1000', '500', '0.8', NULL, '1', '1', '2024-10-14', '1000', '1001', '2024-10-14 14:14:17', '2024-10-14 14:14:17', '47100.00', NULL),
(58, '24-0001-W1', '2', '2', 'Top', '2024-10-21', 'SPCC 0,8', '0.94200', '500', '300', '0.8', NULL, '1', '1', '2024-10-14', '1000', '1002', '2024-10-14 14:14:17', '2024-10-14 14:14:17', '14130.00', NULL),
(59, 'STWF-1024', '1', '1.1', '001', '2024-10-14', 'tes 1', '0.00785', '10', '10', '10', NULL, '5', '4', '2024-10-14', '6', 'v', '2024-10-14 14:20:42', '2024-10-14 14:20:42', '314.00', NULL),
(60, '24-0002-W1', '1', '1', 'wall', '2024-10-21', 'SPCC 0,8', '3.14000', '1000', '500', '0.8', NULL, '1', '1', '2024-10-14', '1000', '1001', '2024-10-14 15:07:24', '2024-10-14 15:07:24', '47100.00', NULL),
(61, '24-0002-W1', '2', '2', 'Top', '2024-10-21', 'SPCC 0,8', '0.94200', '500', '300', '0.8', NULL, '1', '1', '2024-10-14', '1000', '1002', '2024-10-14 15:07:24', '2024-10-14 15:07:24', '14130.00', NULL),
(64, '24-23001-W1', '1', '1', 'item1', '2024-10-15', 'KAYU SANDARAN MULTIPROPUSE FOLDING 333353', '3.00000', '3', '4', '1', NULL, '1', '2', '2024-10-16', '1212', '121212', '2024-10-14 16:28:58', '2024-10-14 16:28:58', '133200.00', NULL),
(65, '24-23001-W1', '2', '2', 'item2', '2024-10-16', 'KAYU BANGKU KANTIN Plywood+HDMR+HPL TH321H+List jati 5mm #1800x350x20 DRW 3', '0.00005', '2', '3', '4', NULL, '1', '1', '2024-10-16', '2323', '23232', '2024-10-14 16:28:58', '2024-10-14 16:28:58', '47.83', NULL),
(66, '24-24001-W1', '1', '1', 'item1', '2024-10-15', 'KAYU SANDARAN MULTIPROPUSE FOLDING 333353', '3.00000', '3', '4', '1', NULL, '1', '2', '2024-10-16', '1212', '121212', '2024-10-14 17:04:15', '2024-10-14 17:04:15', '133200.00', NULL),
(67, '24-24001-W1', '2', '2', 'item2', '2024-10-16', 'KAYU BANGKU KANTIN Plywood+HDMR+HPL TH321H+List jati 5mm #1800x350x20 DRW 3', '0.00005', '2', '3', '4', NULL, '1', '1', '2024-10-16', '2323', '23232', '2024-10-14 17:04:15', '2024-10-14 17:04:15', '47.83', NULL),
(68, '24-25001-W1', '1', '1', 'item1', '2024-10-15', 'KAYU SANDARAN MULTIPROPUSE FOLDING 333353', '3.00000', '3', '4', '1', NULL, '1', '2', '2024-10-16', '1212', '121212', '2024-10-15 01:36:09', '2024-10-15 01:36:09', '133200.00', NULL),
(69, '24-25001-W1', '2', '2', 'item2', '2024-10-16', 'KAYU BANGKU KANTIN Plywood+HDMR+HPL TH321H+List jati 5mm #1800x350x20 DRW 3', '0.00005', '2', '3', '4', NULL, '1', '1', '2024-10-16', '2323', '23232', '2024-10-15 01:36:09', '2024-10-15 01:36:09', '47.83', NULL),
(70, '24-23002-W1', '1', '1', 'item1', '2024-10-15', 'KAYU SANDARAN MULTIPROPUSE FOLDING 333353', '3.00000', '3', '4', '1', NULL, '1', '2', '2024-10-16', '1212', '121212', '2024-10-16 08:07:33', '2024-10-16 08:07:33', '133200.00', NULL),
(71, '24-23002-W1', '2', '2', 'item2', '2024-10-16', 'KAYU BANGKU KANTIN Plywood+HDMR+HPL TH321H+List jati 5mm #1800x350x20 DRW 3', '0.00005', '2', '3', '4', NULL, '1', '1', '2024-10-16', '2323', '23232', '2024-10-16 08:07:33', '2024-10-16 08:07:33', '47.83', NULL),
(72, '24-23003-W1', '1', '1', 'item1', '2024-10-15', 'KAYU SANDARAN MULTIPROPUSE FOLDING 333353', '3.00000', '3', '4', '1', NULL, '1', '2', '2024-10-16', '1212', '121212', '2024-10-16 08:10:33', '2024-10-16 08:10:33', '133200.00', NULL),
(73, '24-23003-W1', '2', '2', 'item2', '2024-10-16', 'KAYU BANGKU KANTIN Plywood+HDMR+HPL TH321H+List jati 5mm #1800x350x20 DRW 3', '0.00005', '2', '3', '4', NULL, '1', '1', '2024-10-16', '2323', '23232', '2024-10-16 08:10:33', '2024-10-16 08:10:33', '47.83', NULL),
(74, '24-23004-W1', '1', '1', 'item23', '2024-10-16', 'KAYU SANDARAN MULTIPROPUSE FOLDING 333353', '0.00001', '1', '1', '1', NULL, '1', '1', '2024-10-17', '1', '1', '2024-10-16 08:30:38', '2024-10-16 08:30:38', '0.35', NULL),
(75, '24-23004-W1', '2', '2', 'item24', '2024-10-16', 'SPCC 0,8', '2.00000', '2', '2', '2', NULL, '2', '2', '2024-10-17', '2', '2', '2024-10-16 08:30:38', '2024-10-16 08:30:38', '30000.00', NULL),
(76, '24-0021-W1', '1', '1', 'item 1', '2024-10-23', 'Rangkaian', '0.00009', '02', '02', '03', NULL, '1', '1', '2024-10-23', '1121', '1', '2024-10-23 15:38:24', '2024-10-23 15:38:24', '0.00', NULL),
(79, '24-0021-W1', '1', '1', 'Rangkaian', '2024-10-24', 'Rangkaian', '0.00001', '1', '1', '1', NULL, '1', '2', '2024-10-24', '22', '212', '2024-10-24 09:12:11', '2024-10-24 09:12:11', '0.00', NULL),
(80, '24-0021-W1', '2', '1.1', 'Item 1', '2024-10-24', 'tes 1', '0.00002', '2', '1', '1', NULL, '2', '2', '2024-10-24', '223', '2123', '2024-10-24 09:12:11', '2024-10-24 09:12:11', '0.64', NULL),
(81, '24-0021-W1', '3', '1.1.1', 'Pipa', '2024-10-24', 'SPCC 0,8', '0.00002', '1', '2', '1', NULL, '3', '2', '2024-10-24', '224', '2124', '2024-10-24 09:12:11', '2024-10-24 09:12:11', '0.24', NULL),
(88, '24-1234-M7', '1', '1', 'Item 1', '2024-10-25', 'pc', '0.00019', '2', '3', '04', NULL, '-', '-', '2024-10-25', '-', '-', '2024-10-25 08:49:37', '2024-10-25 08:49:37', '6.59', NULL),
(89, '24-1234-M7', '2', '1.1', 'Item 2', '2024-10-25', 'Rangkaian', '0', '0', '0', '0', NULL, '-', '-', '2024-10-25', '-', '-', '2024-10-25 08:49:37', '2024-10-25 08:49:37', '0', NULL),
(90, '24-1234-M7', '3', '1.3', 'Punch', '2024-10-25', 'SPCC 0,8', '2.00000', '02', '03', '02', NULL, '-', '-', '2024-10-25', '-', '-', '2024-10-25 08:49:37', '2024-10-25 08:49:37', '30000.00', NULL),
(93, '24-0005-W1', '1', '1.1', 'p1', '2024-10-26', 'SPCC 0,8', '8.00000', '8', '8', '8', NULL, '8', '8', '2024-10-26', '8', '8', '2024-10-25 09:02:21', '2024-10-25 09:02:21', '120000.00', NULL),
(94, '24-0005-W1', '2', '1.2', 'rangkai produk', '2024-10-26', 'Rangkaian', '0', '0', '0', '0', NULL, '-', '-', '2024-10-26', '-', '-', '2024-10-25 09:02:21', '2024-10-25 09:02:21', '0', NULL),
(95, '24-2306-W1', '1', '1.1', 'wall', '2024-10-29', 'SPCC 0,8', '1.88400', '1000', '300', '0.8', NULL, '1', '1', '2024-10-28', '1', '1.1', '2024-10-28 11:21:58', '2024-10-28 11:21:58', '28260.00', NULL),
(96, '24-2306-W1', '2', '1.2', 'door', '2024-10-30', 'SPCC 0,8', '1.88400', '1000', '300', '0.8', NULL, '1', '1', '2024-10-28', '1', '1.2', '2024-10-28 11:21:58', '2024-10-28 11:21:58', '28260.00', NULL),
(97, '24-2306-W1', '3', '1', 'hidrant', '2024-10-30', 'Rangkaian', '0', '0', '0', '0', NULL, '1', '1', '2024-10-28', '1', '1', '2024-10-28 11:21:58', '2024-10-28 11:21:58', '0', NULL),
(98, '24-2307-W1', '1', '1.1', 'wall', '2024-10-29', 'SPCC 0,8', '1.88400', '1000', '300', '0.8', NULL, '1', '1', '2024-10-28', '1', '1.1', '2024-10-28 11:25:10', '2024-10-28 11:25:10', '28260.00', NULL),
(99, '24-2307-W1', '2', '1.2', 'door', '2024-10-30', 'SPCC 0,8', '1.88400', '1000', '300', '0.8', NULL, '1', '1', '2024-10-28', '1', '1.2', '2024-10-28 11:25:10', '2024-10-28 11:25:10', '28260.00', NULL),
(100, '24-2307-W1', '3', '1', 'hidrant', '2024-10-30', 'Rangkaian', '0', '0', '0', '0', NULL, '1', '1', '2024-10-28', '1', '1', '2024-10-28 11:25:10', '2024-10-28 11:25:10', '0', NULL),
(104, '24-2309-W1', '1', '1.1', 'item23.1', '2024-11-18', 'RODA ALMARI ALPHA Dia 19 mm', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-18', '-', '-', '2024-11-11 14:49:37', '2024-11-11 14:49:37', '6000.00', NULL),
(105, '24-2309-W1', '2', '1.2', 'item23.2', '2024-11-18', 'POM PUTIH ? 90', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-18', '-', '-', '2024-11-11 14:49:37', '2024-11-11 14:49:37', '3260000.00', NULL),
(106, '24-2309-W1', '3', '2', 'sub assy', '2024-11-18', 'Sub-Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-18', '-', '-', '2024-11-11 14:49:37', '2024-11-11 14:49:37', '0', NULL),
(107, '24-2309-W1', '4', '3', 'assy', '2024-11-18', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-18', '-', '-', '2024-11-11 14:49:37', '2024-11-11 14:49:37', '0', NULL),
(108, '24-0132-W1', '1', '1', '2', '2024-11-11', 'Assy', '0.00000', '0', '0', '0', NULL, '-', '-', '2024-11-11', '-', '-', '2024-11-11 15:56:54', '2024-11-12 17:27:39', '0.00', 'finished'),
(109, '24-0132-W1', '2', '2.1', 'Punch', '2024-11-11', 'Sub-Assy', '0.00000', '0', '0', '0', NULL, '-', '-', '2024-11-11', '-', '-', '2024-11-11 15:56:54', '2024-11-12 17:30:18', '0.00', 'finished'),
(110, '24-2309-W2', '1', '1.1', 'item1', '2024-11-21', 'Playwood 275 x 400 x 25 Radius Sudut R10mm. LIST DUCO CREAM. FINISHING CLEA', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-21', '-', '-', '2024-11-14 07:52:17', '2024-11-14 08:04:38', '238600.00', 'finished'),
(111, '24-2309-W2', '2', '1.2', 'item2', '2024-11-21', 'BRONZE AB2 ? 40', '0.00006', '2', '2', '2', NULL, '-', '-', '2024-11-21', '-', '-', '2024-11-14 07:52:17', '2024-11-14 08:05:14', '263.76', 'finished'),
(112, '24-2309-W2', '3', '2', 'sub rangkaian', '2024-11-21', 'Sub-Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-21', '-', '-', '2024-11-14 07:52:17', '2024-11-14 08:05:24', '0', 'finished'),
(113, '24-2309-W2', '4', '3', 'rangkaian full', '2024-11-21', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-21', '-', '-', '2024-11-14 07:52:17', '2024-11-14 08:05:51', '0', 'finished'),
(114, '24-2310-W1', '1', '1.1', 'tool1', '2024-11-22', 'ALLUMINIUM 7075 # 50 x 50', '0.00098', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-15 06:09:26', '2024-11-15 06:38:47', '987.33', 'finished'),
(115, '24-2310-W1', '2', '1.2', 'tool2', '2024-11-22', 'KAYU TOP TABLE # 20 X 1200 X 2400 HPL PUTIH. LIST PVC', '0.00125', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-15 06:09:26', '2024-11-15 06:38:56', '1685.81', 'finished'),
(116, '24-2310-W1', '3', '2', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-15 06:09:26', '2024-11-15 06:39:14', '0', 'finished'),
(117, '24-2310-W2', '1', '1.1', 'tools3', '2024-11-22', 'ALLUMINIUM 5052 # 10 x 1200 x 2400', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-15 06:13:03', '2024-11-15 06:39:30', '12200000.00', 'finished'),
(118, '24-2310-W2', '2', '1.2', 'tools4', '2024-11-22', 'KACA CLEAR # 6MM X 849CM X 1630 CM + LUBANG 4 BUAH GOSOK BATU', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-15 06:13:03', '2024-11-18 11:34:28', '794600.00', 'finished'),
(119, '24-2310-W2', '3', '2', 'sub rangkaian', '2024-11-22', 'Sub-Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-15 06:13:03', '2024-11-15 06:39:44', '0', 'finished'),
(120, '24-2310-W2', '4', '3', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-15 06:13:03', '2024-11-15 06:39:51', '0', 'finished'),
(121, '24-0245-W6', '1', '1', 'blockframe', '2024-08-02', 'PLAT 3\'', '54.00', '2', '3', '3', NULL, '5', '2', '2024-07-11', '1500', '30000', '2024-11-19 20:13:16', '2024-11-19 20:13:16', NULL, NULL),
(122, '24-0245-W6', '2', '2', 'blockframe 2', '2024-08-03', 'PLAT 3\'', '63.62', '02', '03', '03', NULL, '5', '1', '2024-07-11', '15002', '300003', '2024-11-19 20:13:16', '2024-11-19 20:13:16', NULL, NULL),
(123, '24-0245-W6', '3', '3', 'blockframe 4', '2024-08-07', 'BRONZE', '96.00', '04', '04', '02', NULL, '5', '1', '2024-07-11', '15003', '3000033', '2024-11-19 20:13:16', '2024-11-19 20:13:16', NULL, NULL),
(124, '24-1234-M9', '3', '1', 'Item 3', '2024-08-10', 'Plat 3\"', '16.00', '4', '2', '1', NULL, '1', '2', '2024-07-23', '33', '223', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '800000', NULL),
(125, '24-1234-M9', '1', '2', '2', '2024-07-22', 'Plat 3\"', '4.00', '1', '1', '2', NULL, '1', '1', '2024-07-22', '22', '22', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '180000', NULL),
(126, '24-1234-M9', '1', '3', '2', '2024-07-22', 'Plat 3\"', '6.00', '2', '1', '1', NULL, '1', '1', '2024-07-22', '22', '23', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '270000', NULL),
(127, '24-1234-M9', '1', '4', 'Item 1', '2024-08-03', 'Plat 3\"', '19.63', '1', '5', '1', NULL, '1', '2', '2024-07-23', '22', '123', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '981748', NULL),
(128, '24-1234-M9', '2', '5', 'Item 2', '2024-08-08', 'Plat 3\"', '3.00', '3', '1', '1', NULL, '1', '2', '2024-07-23', '22', '2123', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '150000', NULL),
(129, '24-1234-M9', '1', '2', 'Pipa', '2024-08-13', 'SPCC 0,8', '6.00', '2', '3', '1', NULL, '2', '2', '2024-08-13', '3', '3', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '90000', NULL),
(130, '24-1234-M9', '1', '2.1', 'Pipa', '2024-08-13', 'SPCC 0,8', '0.79', '1', '1', '1', NULL, '1', '1', '2024-08-13', '222', '333', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '11781', NULL),
(131, '24-1234-M9', '1', '1', 'Item 1', '2024-10-25', 'pc', '0.00019', '2', '3', '04', NULL, '-', '-', '2024-10-25', '-', '-', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '6.59', NULL),
(132, '24-1234-M9', '2', '1.1', 'Item 2', '2024-10-25', 'Rangkaian', '0', '0', '0', '0', NULL, '-', '-', '2024-10-25', '-', '-', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '0', NULL),
(133, '24-1234-M9', '3', '1.3', 'Punch', '2024-10-25', 'SPCC 0,8', '2.00000', '02', '03', '02', NULL, '-', '-', '2024-10-25', '-', '-', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '30000.00', NULL),
(134, '24-1234-M9', '3', '1', 'Item 3', '2024-08-10', 'Plat 3\"', '16.00', '4', '2', '1', NULL, '1', '2', '2024-07-23', '33', '223', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '800000', NULL),
(135, '24-1234-M9', '1', '2', '2', '2024-07-22', 'Plat 3\"', '4.00', '1', '1', '2', NULL, '1', '1', '2024-07-22', '22', '22', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '180000', NULL),
(136, '24-1234-M9', '1', '3', '2', '2024-07-22', 'Plat 3\"', '6.00', '2', '1', '1', NULL, '1', '1', '2024-07-22', '22', '23', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '270000', NULL),
(137, '24-1234-M9', '1', '4', 'Item 1', '2024-08-03', 'Plat 3\"', '19.63', '1', '5', '1', NULL, '1', '2', '2024-07-23', '22', '123', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '981748', NULL),
(138, '24-1234-M9', '2', '5', 'Item 2', '2024-08-08', 'Plat 3\"', '3.00', '3', '1', '1', NULL, '1', '2', '2024-07-23', '22', '2123', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '150000', NULL),
(139, '24-1234-M9', '1', '2', 'Pipa', '2024-08-13', 'SPCC 0,8', '6.00', '2', '3', '1', NULL, '2', '2', '2024-08-13', '3', '3', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '90000', NULL),
(140, '24-1234-M9', '1', '2.1', 'Pipa', '2024-08-13', 'SPCC 0,8', '0.79', '1', '1', '1', NULL, '1', '1', '2024-08-13', '222', '333', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '11781', NULL),
(141, '24-1234-M9', '1', '1', 'Item 1', '2024-10-25', 'pc', '0.00019', '2', '3', '04', NULL, '-', '-', '2024-10-25', '-', '-', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '6.59', NULL),
(142, '24-1234-M9', '2', '1.1', 'Item 2', '2024-10-25', 'Rangkaian', '0', '0', '0', '0', NULL, '-', '-', '2024-10-25', '-', '-', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '0', NULL),
(143, '24-1234-M9', '3', '1.3', 'Punch', '2024-10-25', 'SPCC 0,8', '2.00000', '02', '03', '02', NULL, '-', '-', '2024-10-25', '-', '-', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '30000.00', NULL),
(144, '24-1234-M9', '3', '1', 'Item 3', '2024-08-10', 'Plat 3\"', '16.00', '4', '2', '1', NULL, '1', '2', '2024-07-23', '33', '223', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '800000', NULL),
(145, '24-1234-M9', '1', '2', '2', '2024-07-22', 'Plat 3\"', '4.00', '1', '1', '2', NULL, '1', '1', '2024-07-22', '22', '22', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '180000', NULL),
(146, '24-1234-M9', '1', '3', '2', '2024-07-22', 'Plat 3\"', '6.00', '2', '1', '1', NULL, '1', '1', '2024-07-22', '22', '23', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '270000', NULL),
(147, '24-1234-M9', '1', '4', 'Item 1', '2024-08-03', 'Plat 3\"', '19.63', '1', '5', '1', NULL, '1', '2', '2024-07-23', '22', '123', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '981748', NULL),
(148, '24-1234-M9', '2', '5', 'Item 2', '2024-08-08', 'Plat 3\"', '3.00', '3', '1', '1', NULL, '1', '2', '2024-07-23', '22', '2123', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '150000', NULL),
(149, '24-1234-M9', '1', '2', 'Pipa', '2024-08-13', 'SPCC 0,8', '6.00', '2', '3', '1', NULL, '2', '2', '2024-08-13', '3', '3', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '90000', NULL),
(150, '24-1234-M9', '1', '2.1', 'Pipa', '2024-08-13', 'SPCC 0,8', '0.79', '1', '1', '1', NULL, '1', '1', '2024-08-13', '222', '333', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '11781', NULL),
(151, '24-1234-M9', '1', '1', 'Item 1', '2024-10-25', 'pc', '0.00019', '2', '3', '04', NULL, '-', '-', '2024-10-25', '-', '-', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '6.59', NULL),
(152, '24-1234-M9', '2', '1.1', 'Item 2', '2024-10-25', 'Rangkaian', '0', '0', '0', '0', NULL, '-', '-', '2024-10-25', '-', '-', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '0', NULL),
(153, '24-1234-M9', '3', '1.3', 'Punch', '2024-10-25', 'SPCC 0,8', '2.00000', '02', '03', '02', NULL, '-', '-', '2024-10-25', '-', '-', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '30000.00', NULL),
(154, '24-1234-M9', '3', '1', 'Item 3', '2024-08-10', 'Plat 3\"', '16.00', '4', '2', '1', NULL, '1', '2', '2024-07-23', '33', '223', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '800000', NULL),
(155, '24-1234-M9', '1', '2', '2', '2024-07-22', 'Plat 3\"', '4.00', '1', '1', '2', NULL, '1', '1', '2024-07-22', '22', '22', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '180000', NULL),
(156, '24-1234-M9', '1', '3', '2', '2024-07-22', 'Plat 3\"', '6.00', '2', '1', '1', NULL, '1', '1', '2024-07-22', '22', '23', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '270000', NULL),
(157, '24-1234-M9', '1', '4', 'Item 1', '2024-08-03', 'Plat 3\"', '19.63', '1', '5', '1', NULL, '1', '2', '2024-07-23', '22', '123', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '981748', NULL),
(158, '24-1234-M9', '2', '5', 'Item 2', '2024-08-08', 'Plat 3\"', '3.00', '3', '1', '1', NULL, '1', '2', '2024-07-23', '22', '2123', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '150000', NULL),
(159, '24-1234-M9', '1', '2', 'Pipa', '2024-08-13', 'SPCC 0,8', '6.00', '2', '3', '1', NULL, '2', '2', '2024-08-13', '3', '3', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '90000', NULL),
(160, '24-1234-M9', '1', '2.1', 'Pipa', '2024-08-13', 'SPCC 0,8', '0.79', '1', '1', '1', NULL, '1', '1', '2024-08-13', '222', '333', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '11781', NULL),
(161, '24-1234-M9', '1', '1', 'Item 1', '2024-10-25', 'pc', '0.00019', '2', '3', '04', NULL, '-', '-', '2024-10-25', '-', '-', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '6.59', NULL),
(162, '24-1234-M9', '2', '1.1', 'Item 2', '2024-10-25', 'Rangkaian', '0', '0', '0', '0', NULL, '-', '-', '2024-10-25', '-', '-', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '0', NULL),
(163, '24-1234-M9', '3', '1.3', 'Punch', '2024-10-25', 'SPCC 0,8', '2.00000', '02', '03', '02', NULL, '-', '-', '2024-10-25', '-', '-', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '30000.00', NULL),
(164, '24-1234-M9', '3', '1', 'Item 3', '2024-08-10', 'Plat 3\"', '16.00', '4', '2', '1', NULL, '1', '2', '2024-07-23', '33', '223', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '800000', NULL),
(165, '24-1234-M9', '1', '2', '2', '2024-07-22', 'Plat 3\"', '4.00', '1', '1', '2', NULL, '1', '1', '2024-07-22', '22', '22', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '180000', NULL),
(166, '24-1234-M9', '1', '3', '2', '2024-07-22', 'Plat 3\"', '6.00', '2', '1', '1', NULL, '1', '1', '2024-07-22', '22', '23', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '270000', NULL),
(167, '24-1234-M9', '1', '4', 'Item 1', '2024-08-03', 'Plat 3\"', '19.63', '1', '5', '1', NULL, '1', '2', '2024-07-23', '22', '123', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '981748', NULL),
(168, '24-1234-M9', '2', '5', 'Item 2', '2024-08-08', 'Plat 3\"', '3.00', '3', '1', '1', NULL, '1', '2', '2024-07-23', '22', '2123', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '150000', NULL),
(169, '24-1234-M9', '1', '2', 'Pipa', '2024-08-13', 'SPCC 0,8', '6.00', '2', '3', '1', NULL, '2', '2', '2024-08-13', '3', '3', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '90000', NULL),
(170, '24-1234-M9', '1', '2.1', 'Pipa', '2024-08-13', 'SPCC 0,8', '0.79', '1', '1', '1', NULL, '1', '1', '2024-08-13', '222', '333', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '11781', NULL),
(171, '24-1234-M9', '1', '1', 'Item 1', '2024-10-25', 'pc', '0.00019', '2', '3', '04', NULL, '-', '-', '2024-10-25', '-', '-', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '6.59', NULL),
(172, '24-1234-M9', '2', '1.1', 'Item 2', '2024-10-25', 'Rangkaian', '0', '0', '0', '0', NULL, '-', '-', '2024-10-25', '-', '-', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '0', NULL),
(173, '24-1234-M9', '3', '1.3', 'Punch', '2024-10-25', 'SPCC 0,8', '2.00000', '02', '03', '02', NULL, '-', '-', '2024-10-25', '-', '-', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '30000.00', NULL),
(174, '24-1234-M9', '3', '1', 'Item 3', '2024-08-10', 'Plat 3\"', '16.00', '4', '2', '1', NULL, '1', '2', '2024-07-23', '33', '223', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '800000', NULL),
(175, '24-1234-M9', '1', '2', '2', '2024-07-22', 'Plat 3\"', '4.00', '1', '1', '2', NULL, '1', '1', '2024-07-22', '22', '22', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '180000', NULL),
(176, '24-1234-M9', '1', '3', '2', '2024-07-22', 'Plat 3\"', '6.00', '2', '1', '1', NULL, '1', '1', '2024-07-22', '22', '23', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '270000', NULL),
(177, '24-1234-M9', '1', '4', 'Item 1', '2024-08-03', 'Plat 3\"', '19.63', '1', '5', '1', NULL, '1', '2', '2024-07-23', '22', '123', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '981748', NULL),
(178, '24-1234-M9', '2', '5', 'Item 2', '2024-08-08', 'Plat 3\"', '3.00', '3', '1', '1', NULL, '1', '2', '2024-07-23', '22', '2123', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '150000', NULL),
(179, '24-1234-M9', '1', '2', 'Pipa', '2024-08-13', 'SPCC 0,8', '6.00', '2', '3', '1', NULL, '2', '2', '2024-08-13', '3', '3', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '90000', NULL),
(180, '24-1234-M9', '1', '2.1', 'Pipa', '2024-08-13', 'SPCC 0,8', '0.79', '1', '1', '1', NULL, '1', '1', '2024-08-13', '222', '333', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '11781', NULL),
(181, '24-1234-M9', '1', '1', 'Item 1', '2024-10-25', 'pc', '0.00019', '2', '3', '04', NULL, '-', '-', '2024-10-25', '-', '-', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '6.59', NULL),
(182, '24-1234-M9', '2', '1.1', 'Item 2', '2024-10-25', 'Rangkaian', '0', '0', '0', '0', NULL, '-', '-', '2024-10-25', '-', '-', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '0', NULL),
(183, '24-1234-M9', '3', '1.3', 'Punch', '2024-10-25', 'SPCC 0,8', '2.00000', '02', '03', '02', NULL, '-', '-', '2024-10-25', '-', '-', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '30000.00', NULL),
(184, '24-1234-M10', '3', '1', 'Item 3', '2024-08-10', 'Plat 3\"', '16.00', '4', '2', '1', NULL, '1', '2', '2024-07-23', '33', '223', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '800000', NULL),
(185, '24-1234-M10', '1', '2', '2', '2024-07-22', 'Plat 3\"', '4.00', '1', '1', '2', NULL, '1', '1', '2024-07-22', '22', '22', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '180000', NULL),
(186, '24-1234-M10', '1', '3', '2', '2024-07-22', 'Plat 3\"', '6.00', '2', '1', '1', NULL, '1', '1', '2024-07-22', '22', '23', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '270000', NULL),
(187, '24-1234-M10', '1', '4', 'Item 1', '2024-08-03', 'Plat 3\"', '19.63', '1', '5', '1', NULL, '1', '2', '2024-07-23', '22', '123', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '981748', NULL),
(188, '24-1234-M10', '2', '5', 'Item 2', '2024-08-08', 'Plat 3\"', '3.00', '3', '1', '1', NULL, '1', '2', '2024-07-23', '22', '2123', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '150000', NULL),
(189, '24-1234-M10', '1', '2', 'Pipa', '2024-08-13', 'SPCC 0,8', '6.00', '2', '3', '1', NULL, '2', '2', '2024-08-13', '3', '3', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '90000', NULL),
(190, '24-1234-M10', '1', '2.1', 'Pipa', '2024-08-13', 'SPCC 0,8', '0.79', '1', '1', '1', NULL, '1', '1', '2024-08-13', '222', '333', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '11781', NULL),
(191, '24-1234-M10', '1', '1', 'Item 1', '2024-10-25', 'pc', '0.00019', '2', '3', '04', NULL, '-', '-', '2024-10-25', '-', '-', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '6.59', NULL),
(192, '24-1234-M10', '2', '1.1', 'Item 2', '2024-10-25', 'Rangkaian', '0', '0', '0', '0', NULL, '-', '-', '2024-10-25', '-', '-', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '0', NULL),
(193, '24-1234-M10', '3', '1.3', 'Punch', '2024-10-25', 'SPCC 0,8', '2.00000', '02', '03', '02', NULL, '-', '-', '2024-10-25', '-', '-', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '30000.00', NULL),
(194, '24-1234-M10', '3', '1', 'Item 3', '2024-08-10', 'Plat 3\"', '16.00', '4', '2', '1', NULL, '1', '2', '2024-07-23', '33', '223', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '800000', NULL),
(195, '24-1234-M10', '1', '2', '2', '2024-07-22', 'Plat 3\"', '4.00', '1', '1', '2', NULL, '1', '1', '2024-07-22', '22', '22', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '180000', NULL),
(196, '24-1234-M10', '1', '3', '2', '2024-07-22', 'Plat 3\"', '6.00', '2', '1', '1', NULL, '1', '1', '2024-07-22', '22', '23', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '270000', NULL),
(197, '24-1234-M10', '1', '4', 'Item 1', '2024-08-03', 'Plat 3\"', '19.63', '1', '5', '1', NULL, '1', '2', '2024-07-23', '22', '123', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '981748', NULL),
(198, '24-1234-M10', '2', '5', 'Item 2', '2024-08-08', 'Plat 3\"', '3.00', '3', '1', '1', NULL, '1', '2', '2024-07-23', '22', '2123', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '150000', NULL),
(199, '24-1234-M10', '1', '2', 'Pipa', '2024-08-13', 'SPCC 0,8', '6.00', '2', '3', '1', NULL, '2', '2', '2024-08-13', '3', '3', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '90000', NULL),
(200, '24-1234-M10', '1', '2.1', 'Pipa', '2024-08-13', 'SPCC 0,8', '0.79', '1', '1', '1', NULL, '1', '1', '2024-08-13', '222', '333', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '11781', NULL),
(201, '24-1234-M10', '1', '1', 'Item 1', '2024-10-25', 'pc', '0.00019', '2', '3', '04', NULL, '-', '-', '2024-10-25', '-', '-', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '6.59', NULL),
(202, '24-1234-M10', '2', '1.1', 'Item 2', '2024-10-25', 'Rangkaian', '0', '0', '0', '0', NULL, '-', '-', '2024-10-25', '-', '-', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '0', NULL),
(203, '24-1234-M10', '3', '1.3', 'Punch', '2024-10-25', 'SPCC 0,8', '2.00000', '02', '03', '02', NULL, '-', '-', '2024-10-25', '-', '-', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '30000.00', NULL),
(204, '24-1234-M10', '3', '1', 'Item 3', '2024-08-10', 'Plat 3\"', '16.00', '4', '2', '1', NULL, '1', '2', '2024-07-23', '33', '223', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '800000', NULL),
(205, '24-1234-M10', '1', '2', '2', '2024-07-22', 'Plat 3\"', '4.00', '1', '1', '2', NULL, '1', '1', '2024-07-22', '22', '22', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '180000', NULL),
(206, '24-1234-M10', '1', '3', '2', '2024-07-22', 'Plat 3\"', '6.00', '2', '1', '1', NULL, '1', '1', '2024-07-22', '22', '23', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '270000', NULL),
(207, '24-1234-M10', '1', '4', 'Item 1', '2024-08-03', 'Plat 3\"', '19.63', '1', '5', '1', NULL, '1', '2', '2024-07-23', '22', '123', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '981748', NULL),
(208, '24-1234-M10', '2', '5', 'Item 2', '2024-08-08', 'Plat 3\"', '3.00', '3', '1', '1', NULL, '1', '2', '2024-07-23', '22', '2123', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '150000', NULL),
(209, '24-1234-M10', '1', '2', 'Pipa', '2024-08-13', 'SPCC 0,8', '6.00', '2', '3', '1', NULL, '2', '2', '2024-08-13', '3', '3', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '90000', NULL),
(210, '24-1234-M10', '1', '2.1', 'Pipa', '2024-08-13', 'SPCC 0,8', '0.79', '1', '1', '1', NULL, '1', '1', '2024-08-13', '222', '333', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '11781', NULL),
(211, '24-1234-M10', '1', '1', 'Item 1', '2024-10-25', 'pc', '0.00019', '2', '3', '04', NULL, '-', '-', '2024-10-25', '-', '-', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '6.59', NULL),
(212, '24-1234-M10', '2', '1.1', 'Item 2', '2024-10-25', 'Rangkaian', '0', '0', '0', '0', NULL, '-', '-', '2024-10-25', '-', '-', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '0', NULL),
(213, '24-1234-M10', '3', '1.3', 'Punch', '2024-10-25', 'SPCC 0,8', '2.00000', '02', '03', '02', NULL, '-', '-', '2024-10-25', '-', '-', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '30000.00', NULL),
(214, '24-1234-M10', '3', '1', 'Item 3', '2024-08-10', 'Plat 3\"', '16.00', '4', '2', '1', NULL, '1', '2', '2024-07-23', '33', '223', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '800000', NULL),
(215, '24-1234-M10', '1', '2', '2', '2024-07-22', 'Plat 3\"', '4.00', '1', '1', '2', NULL, '1', '1', '2024-07-22', '22', '22', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '180000', NULL),
(216, '24-1234-M10', '1', '3', '2', '2024-07-22', 'Plat 3\"', '6.00', '2', '1', '1', NULL, '1', '1', '2024-07-22', '22', '23', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '270000', NULL),
(217, '24-1234-M10', '1', '4', 'Item 1', '2024-08-03', 'Plat 3\"', '19.63', '1', '5', '1', NULL, '1', '2', '2024-07-23', '22', '123', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '981748', NULL),
(218, '24-1234-M10', '2', '5', 'Item 2', '2024-08-08', 'Plat 3\"', '3.00', '3', '1', '1', NULL, '1', '2', '2024-07-23', '22', '2123', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '150000', NULL),
(219, '24-1234-M10', '1', '2', 'Pipa', '2024-08-13', 'SPCC 0,8', '6.00', '2', '3', '1', NULL, '2', '2', '2024-08-13', '3', '3', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '90000', NULL),
(220, '24-1234-M10', '1', '2.1', 'Pipa', '2024-08-13', 'SPCC 0,8', '0.79', '1', '1', '1', NULL, '1', '1', '2024-08-13', '222', '333', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '11781', NULL),
(221, '24-1234-M10', '1', '1', 'Item 1', '2024-10-25', 'pc', '0.00019', '2', '3', '04', NULL, '-', '-', '2024-10-25', '-', '-', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '6.59', NULL),
(222, '24-1234-M10', '2', '1.1', 'Item 2', '2024-10-25', 'Rangkaian', '0', '0', '0', '0', NULL, '-', '-', '2024-10-25', '-', '-', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '0', NULL),
(223, '24-1234-M10', '3', '1.3', 'Punch', '2024-10-25', 'SPCC 0,8', '2.00000', '02', '03', '02', NULL, '-', '-', '2024-10-25', '-', '-', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '30000.00', NULL),
(224, '24-1234-M10', '3', '1', 'Item 3', '2024-08-10', 'Plat 3\"', '16.00', '4', '2', '1', NULL, '1', '2', '2024-07-23', '33', '223', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '800000', NULL),
(225, '24-1234-M10', '1', '2', '2', '2024-07-22', 'Plat 3\"', '4.00', '1', '1', '2', NULL, '1', '1', '2024-07-22', '22', '22', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '180000', NULL),
(226, '24-1234-M10', '1', '3', '2', '2024-07-22', 'Plat 3\"', '6.00', '2', '1', '1', NULL, '1', '1', '2024-07-22', '22', '23', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '270000', NULL),
(227, '24-1234-M10', '1', '4', 'Item 1', '2024-08-03', 'Plat 3\"', '19.63', '1', '5', '1', NULL, '1', '2', '2024-07-23', '22', '123', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '981748', NULL),
(228, '24-1234-M10', '2', '5', 'Item 2', '2024-08-08', 'Plat 3\"', '3.00', '3', '1', '1', NULL, '1', '2', '2024-07-23', '22', '2123', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '150000', NULL),
(229, '24-1234-M10', '1', '2', 'Pipa', '2024-08-13', 'SPCC 0,8', '6.00', '2', '3', '1', NULL, '2', '2', '2024-08-13', '3', '3', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '90000', NULL),
(230, '24-1234-M10', '1', '2.1', 'Pipa', '2024-08-13', 'SPCC 0,8', '0.79', '1', '1', '1', NULL, '1', '1', '2024-08-13', '222', '333', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '11781', NULL),
(231, '24-1234-M10', '1', '1', 'Item 1', '2024-10-25', 'pc', '0.00019', '2', '3', '04', NULL, '-', '-', '2024-10-25', '-', '-', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '6.59', NULL),
(232, '24-1234-M10', '2', '1.1', 'Item 2', '2024-10-25', 'Rangkaian', '0', '0', '0', '0', NULL, '-', '-', '2024-10-25', '-', '-', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '0', NULL),
(233, '24-1234-M10', '3', '1.3', 'Punch', '2024-10-25', 'SPCC 0,8', '2.00000', '02', '03', '02', NULL, '-', '-', '2024-10-25', '-', '-', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '30000.00', NULL),
(234, '24-1234-M10', '3', '1', 'Item 3', '2024-08-10', 'Plat 3\"', '16.00', '4', '2', '1', NULL, '1', '2', '2024-07-23', '33', '223', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '800000', NULL),
(235, '24-1234-M10', '1', '2', '2', '2024-07-22', 'Plat 3\"', '4.00', '1', '1', '2', NULL, '1', '1', '2024-07-22', '22', '22', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '180000', NULL),
(236, '24-1234-M10', '1', '3', '2', '2024-07-22', 'Plat 3\"', '6.00', '2', '1', '1', NULL, '1', '1', '2024-07-22', '22', '23', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '270000', NULL),
(237, '24-1234-M10', '1', '4', 'Item 1', '2024-08-03', 'Plat 3\"', '19.63', '1', '5', '1', NULL, '1', '2', '2024-07-23', '22', '123', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '981748', NULL),
(238, '24-1234-M10', '2', '5', 'Item 2', '2024-08-08', 'Plat 3\"', '3.00', '3', '1', '1', NULL, '1', '2', '2024-07-23', '22', '2123', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '150000', NULL),
(239, '24-1234-M10', '1', '2', 'Pipa', '2024-08-13', 'SPCC 0,8', '6.00', '2', '3', '1', NULL, '2', '2', '2024-08-13', '3', '3', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '90000', NULL),
(240, '24-1234-M10', '1', '2.1', 'Pipa', '2024-08-13', 'SPCC 0,8', '0.79', '1', '1', '1', NULL, '1', '1', '2024-08-13', '222', '333', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '11781', NULL),
(241, '24-1234-M10', '1', '1', 'Item 1', '2024-10-25', 'pc', '0.00019', '2', '3', '04', NULL, '-', '-', '2024-10-25', '-', '-', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '6.59', NULL),
(242, '24-1234-M10', '2', '1.1', 'Item 2', '2024-10-25', 'Rangkaian', '0', '0', '0', '0', NULL, '-', '-', '2024-10-25', '-', '-', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '0', NULL),
(243, '24-1234-M10', '3', '1.3', 'Punch', '2024-10-25', 'SPCC 0,8', '2.00000', '02', '03', '02', NULL, '-', '-', '2024-10-25', '-', '-', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '30000.00', NULL),
(244, '24-2310-W3', '1', '1.1', 'tools3', '2024-11-22', 'ALLUMINIUM 5052 # 10 x 1200 x 2400', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-19 21:34:28', '2024-11-19 21:34:28', '12200000.00', 'finished'),
(245, '24-2310-W3', '2', '1.2', 'tools4', '2024-11-22', 'KACA CLEAR # 6MM X 849CM X 1630 CM + LUBANG 4 BUAH GOSOK BATU', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-19 21:34:28', '2024-11-19 21:34:28', '794600.00', 'finished'),
(246, '24-2310-W3', '3', '2', 'sub rangkaian', '2024-11-22', 'Sub-Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-19 21:34:28', '2024-11-19 21:34:28', '0', 'finished'),
(247, '24-2310-W3', '4', '3', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-19 21:34:28', '2024-11-19 21:34:28', '0', 'finished'),
(248, '24-2311-W1-1732027813', '1', '1.1', 'tool1', '2024-11-22', 'ALLUMINIUM 7075 # 50 x 50', '0.00098', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-19 21:50:13', '2024-11-19 21:50:13', '987.33', 'finished'),
(249, '24-2311-W1-1732027813', '2', '1.2', 'tool2', '2024-11-22', 'KAYU TOP TABLE # 20 X 1200 X 2400 HPL PUTIH. LIST PVC', '0.00125', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-19 21:50:13', '2024-11-19 21:50:13', '1685.81', 'finished'),
(250, '24-2311-W1-1732027813', '3', '2', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-19 21:50:13', '2024-11-19 21:50:13', '0', 'finished'),
(251, '24-2311-W1', '1', '1.1', 'tool1', '2024-11-22', 'ALLUMINIUM 7075 # 50 x 50', '0.00098', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-19 22:00:12', '2024-11-19 22:00:12', '987.33', 'finished'),
(252, '24-2311-W1', '2', '1.2', 'tool2', '2024-11-22', 'KAYU TOP TABLE # 20 X 1200 X 2400 HPL PUTIH. LIST PVC', '0.00125', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-19 22:00:12', '2024-11-19 22:00:12', '1685.81', 'finished'),
(253, '24-2311-W1', '3', '2', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-19 22:00:12', '2024-11-19 22:00:12', '0', 'finished'),
(254, '24-2311-W2', '1', '1.1', 'tools3', '2024-11-22', 'ALLUMINIUM 5052 # 10 x 1200 x 2400', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-19 22:15:18', '2024-11-19 22:15:18', '12200000.00', 'finished'),
(255, '24-2311-W2', '2', '1.2', 'tools4', '2024-11-22', 'KACA CLEAR # 6MM X 849CM X 1630 CM + LUBANG 4 BUAH GOSOK BATU', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-19 22:15:18', '2024-11-19 22:15:18', '794600.00', 'finished'),
(256, '24-2311-W2', '3', '2', 'sub rangkaian', '2024-11-22', 'Sub-Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-19 22:15:18', '2024-11-19 22:15:18', '0', 'finished'),
(257, '24-2311-W2', '4', '3', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-19 22:15:18', '2024-11-19 22:15:18', '0', 'finished'),
(258, '24-2312-W2', '1', '1.1', 'tool1', '2024-11-22', 'ALLUMINIUM 7075 # 50 x 50', '0.00098', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 08:17:49', '2024-11-22 08:17:49', '987.33', 'finished'),
(259, '24-2312-W2', '2', '1.2', 'tool2', '2024-11-22', 'KAYU TOP TABLE # 20 X 1200 X 2400 HPL PUTIH. LIST PVC', '0.00125', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 08:17:49', '2024-11-22 08:17:49', '1685.81', 'finished'),
(260, '24-2312-W2', '3', '2', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 08:17:49', '2024-11-22 08:17:49', '0', 'finished'),
(261, '24-2312-W2', '1', '1.1', 'tools3', '2024-11-22', 'ALLUMINIUM 5052 # 10 x 1200 x 2400', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 08:18:17', '2024-11-22 08:18:17', '12200000.00', 'finished'),
(262, '24-2312-W2', '2', '1.2', 'tools4', '2024-11-22', 'KACA CLEAR # 6MM X 849CM X 1630 CM + LUBANG 4 BUAH GOSOK BATU', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 08:18:17', '2024-11-22 08:18:17', '794600.00', 'finished'),
(263, '24-2312-W2', '3', '2', 'sub rangkaian', '2024-11-22', 'Sub-Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 08:18:17', '2024-11-22 08:18:17', '0', 'finished'),
(264, '24-2312-W2', '4', '3', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 08:18:17', '2024-11-22 08:18:17', '0', 'finished'),
(265, '24-2312-W2', '1', '1.1', 'tool1', '2024-11-22', 'ALLUMINIUM 7075 # 50 x 50', '0.00098', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:26:17', '2024-11-22 10:26:17', '987.33', 'finished'),
(266, '24-2312-W2', '2', '1.2', 'tool2', '2024-11-22', 'KAYU TOP TABLE # 20 X 1200 X 2400 HPL PUTIH. LIST PVC', '0.00125', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:26:17', '2024-11-22 10:26:17', '1685.81', 'finished'),
(267, '24-2312-W2', '3', '2', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:26:17', '2024-11-22 10:26:17', '0', 'finished'),
(268, '24-2312-W2', '1', '1.1', 'tools3', '2024-11-22', 'ALLUMINIUM 5052 # 10 x 1200 x 2400', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:26:17', '2024-11-22 10:26:17', '12200000.00', 'finished'),
(269, '24-2312-W2', '2', '1.2', 'tools4', '2024-11-22', 'KACA CLEAR # 6MM X 849CM X 1630 CM + LUBANG 4 BUAH GOSOK BATU', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:26:17', '2024-11-22 10:26:17', '794600.00', 'finished'),
(270, '24-2312-W2', '3', '2', 'sub rangkaian', '2024-11-22', 'Sub-Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:26:17', '2024-11-22 10:26:17', '0', 'finished'),
(271, '24-2312-W2', '4', '3', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:26:17', '2024-11-22 10:26:17', '0', 'finished'),
(272, '24-2312-W2', '1', '1.1', 'tool1', '2024-11-22', 'ALLUMINIUM 7075 # 50 x 50', '0.00098', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:26:17', '2024-11-22 10:26:17', '987.33', 'finished'),
(273, '24-2312-W2', '2', '1.2', 'tool2', '2024-11-22', 'KAYU TOP TABLE # 20 X 1200 X 2400 HPL PUTIH. LIST PVC', '0.00125', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:26:17', '2024-11-22 10:26:17', '1685.81', 'finished'),
(274, '24-2312-W2', '3', '2', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:26:17', '2024-11-22 10:26:17', '0', 'finished'),
(275, '24-2312-W2', '1', '1.1', 'tools3', '2024-11-22', 'ALLUMINIUM 5052 # 10 x 1200 x 2400', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:26:17', '2024-11-22 10:26:17', '12200000.00', 'finished'),
(276, '24-2312-W2', '2', '1.2', 'tools4', '2024-11-22', 'KACA CLEAR # 6MM X 849CM X 1630 CM + LUBANG 4 BUAH GOSOK BATU', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:26:17', '2024-11-22 10:26:17', '794600.00', 'finished'),
(277, '24-2312-W2', '3', '2', 'sub rangkaian', '2024-11-22', 'Sub-Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:26:17', '2024-11-22 10:26:17', '0', 'finished'),
(278, '24-2312-W2', '4', '3', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:26:17', '2024-11-22 10:26:17', '0', 'finished'),
(279, '24-2312-W2', '1', '1.1', 'tool1', '2024-11-22', 'ALLUMINIUM 7075 # 50 x 50', '0.00098', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:26:17', '2024-11-22 10:26:17', '987.33', 'finished'),
(280, '24-2312-W2', '2', '1.2', 'tool2', '2024-11-22', 'KAYU TOP TABLE # 20 X 1200 X 2400 HPL PUTIH. LIST PVC', '0.00125', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:26:17', '2024-11-22 10:26:17', '1685.81', 'finished'),
(281, '24-2312-W2', '3', '2', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:26:17', '2024-11-22 10:26:17', '0', 'finished'),
(282, '24-2312-W2', '1', '1.1', 'tools3', '2024-11-22', 'ALLUMINIUM 5052 # 10 x 1200 x 2400', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:26:17', '2024-11-22 10:26:17', '12200000.00', 'finished'),
(283, '24-2312-W2', '2', '1.2', 'tools4', '2024-11-22', 'KACA CLEAR # 6MM X 849CM X 1630 CM + LUBANG 4 BUAH GOSOK BATU', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:26:17', '2024-11-22 10:26:17', '794600.00', 'finished'),
(284, '24-2312-W2', '3', '2', 'sub rangkaian', '2024-11-22', 'Sub-Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:26:17', '2024-11-22 10:26:17', '0', 'finished'),
(285, '24-2312-W2', '4', '3', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:26:17', '2024-11-22 10:26:17', '0', 'finished'),
(286, '24-2312-W1', '1', '1.1', 'tool1', '2024-11-22', 'ALLUMINIUM 7075 # 50 x 50', '0.00098', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '987.33', 'finished'),
(287, '24-2312-W1', '2', '1.2', 'tool2', '2024-11-22', 'KAYU TOP TABLE # 20 X 1200 X 2400 HPL PUTIH. LIST PVC', '0.00125', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '1685.81', 'finished'),
(288, '24-2312-W1', '3', '2', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '0', 'finished'),
(289, '24-2312-W1', '1', '1.1', 'tools3', '2024-11-22', 'ALLUMINIUM 5052 # 10 x 1200 x 2400', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '12200000.00', 'finished'),
(290, '24-2312-W1', '2', '1.2', 'tools4', '2024-11-22', 'KACA CLEAR # 6MM X 849CM X 1630 CM + LUBANG 4 BUAH GOSOK BATU', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '794600.00', 'finished');
INSERT INTO `itemadd` (`id`, `order_number`, `id_item`, `no_item`, `item`, `dod_item`, `material`, `weight`, `length`, `width`, `thickness`, `qty`, `nos`, `nob`, `issued_item`, `ass_drawing`, `drawing_no`, `created_at`, `updated_at`, `material_cost`, `status`) VALUES
(291, '24-2312-W1', '3', '2', 'sub rangkaian', '2024-11-22', 'Sub-Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '0', 'finished'),
(292, '24-2312-W1', '4', '3', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '0', 'finished'),
(293, '24-2312-W1', '1', '1.1', 'tool1', '2024-11-22', 'ALLUMINIUM 7075 # 50 x 50', '0.00098', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '987.33', 'finished'),
(294, '24-2312-W1', '2', '1.2', 'tool2', '2024-11-22', 'KAYU TOP TABLE # 20 X 1200 X 2400 HPL PUTIH. LIST PVC', '0.00125', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '1685.81', 'finished'),
(295, '24-2312-W1', '3', '2', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '0', 'finished'),
(296, '24-2312-W1', '1', '1.1', 'tools3', '2024-11-22', 'ALLUMINIUM 5052 # 10 x 1200 x 2400', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '12200000.00', 'finished'),
(297, '24-2312-W1', '2', '1.2', 'tools4', '2024-11-22', 'KACA CLEAR # 6MM X 849CM X 1630 CM + LUBANG 4 BUAH GOSOK BATU', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '794600.00', 'finished'),
(298, '24-2312-W1', '3', '2', 'sub rangkaian', '2024-11-22', 'Sub-Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '0', 'finished'),
(299, '24-2312-W1', '4', '3', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '0', 'finished'),
(300, '24-2312-W1', '1', '1.1', 'tool1', '2024-11-22', 'ALLUMINIUM 7075 # 50 x 50', '0.00098', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '987.33', 'finished'),
(301, '24-2312-W1', '2', '1.2', 'tool2', '2024-11-22', 'KAYU TOP TABLE # 20 X 1200 X 2400 HPL PUTIH. LIST PVC', '0.00125', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '1685.81', 'finished'),
(302, '24-2312-W1', '3', '2', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '0', 'finished'),
(303, '24-2312-W1', '1', '1.1', 'tools3', '2024-11-22', 'ALLUMINIUM 5052 # 10 x 1200 x 2400', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '12200000.00', 'finished'),
(304, '24-2312-W1', '2', '1.2', 'tools4', '2024-11-22', 'KACA CLEAR # 6MM X 849CM X 1630 CM + LUBANG 4 BUAH GOSOK BATU', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '794600.00', 'finished'),
(305, '24-2312-W1', '3', '2', 'sub rangkaian', '2024-11-22', 'Sub-Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '0', 'finished'),
(306, '24-2312-W1', '4', '3', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '0', 'finished'),
(307, '24-2312-W1', '1', '1.1', 'tool1', '2024-11-22', 'ALLUMINIUM 7075 # 50 x 50', '0.00098', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '987.33', 'finished'),
(308, '24-2312-W1', '2', '1.2', 'tool2', '2024-11-22', 'KAYU TOP TABLE # 20 X 1200 X 2400 HPL PUTIH. LIST PVC', '0.00125', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '1685.81', 'finished'),
(309, '24-2312-W1', '3', '2', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '0', 'finished'),
(310, '24-2312-W1', '1', '1.1', 'tools3', '2024-11-22', 'ALLUMINIUM 5052 # 10 x 1200 x 2400', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '12200000.00', 'finished'),
(311, '24-2312-W1', '2', '1.2', 'tools4', '2024-11-22', 'KACA CLEAR # 6MM X 849CM X 1630 CM + LUBANG 4 BUAH GOSOK BATU', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '794600.00', 'finished'),
(312, '24-2312-W1', '3', '2', 'sub rangkaian', '2024-11-22', 'Sub-Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '0', 'finished'),
(313, '24-2312-W1', '4', '3', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '0', 'finished'),
(314, '24-2312-W1', '1', '1.1', 'tool1', '2024-11-22', 'ALLUMINIUM 7075 # 50 x 50', '0.00098', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '987.33', 'finished'),
(315, '24-2312-W1', '2', '1.2', 'tool2', '2024-11-22', 'KAYU TOP TABLE # 20 X 1200 X 2400 HPL PUTIH. LIST PVC', '0.00125', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '1685.81', 'finished'),
(316, '24-2312-W1', '3', '2', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '0', 'finished'),
(317, '24-2312-W1', '1', '1.1', 'tools3', '2024-11-22', 'ALLUMINIUM 5052 # 10 x 1200 x 2400', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '12200000.00', 'finished'),
(318, '24-2312-W1', '2', '1.2', 'tools4', '2024-11-22', 'KACA CLEAR # 6MM X 849CM X 1630 CM + LUBANG 4 BUAH GOSOK BATU', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '794600.00', 'finished'),
(319, '24-2312-W1', '3', '2', 'sub rangkaian', '2024-11-22', 'Sub-Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '0', 'finished'),
(320, '24-2312-W1', '4', '3', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '0', 'finished'),
(321, '24-2312-W1', '1', '1.1', 'tool1', '2024-11-22', 'ALLUMINIUM 7075 # 50 x 50', '0.00098', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '987.33', 'finished'),
(322, '24-2312-W1', '2', '1.2', 'tool2', '2024-11-22', 'KAYU TOP TABLE # 20 X 1200 X 2400 HPL PUTIH. LIST PVC', '0.00125', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '1685.81', 'finished'),
(323, '24-2312-W1', '3', '2', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '0', 'finished'),
(324, '24-2312-W1', '1', '1.1', 'tools3', '2024-11-22', 'ALLUMINIUM 5052 # 10 x 1200 x 2400', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '12200000.00', 'finished'),
(325, '24-2312-W1', '2', '1.2', 'tools4', '2024-11-22', 'KACA CLEAR # 6MM X 849CM X 1630 CM + LUBANG 4 BUAH GOSOK BATU', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '794600.00', 'finished'),
(326, '24-2312-W1', '3', '2', 'sub rangkaian', '2024-11-22', 'Sub-Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '0', 'finished'),
(327, '24-2312-W1', '4', '3', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '0', 'finished'),
(328, '24-2312-W1', '1', '1.1', 'tool1', '2024-11-22', 'ALLUMINIUM 7075 # 50 x 50', '0.00098', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '987.33', 'finished'),
(329, '24-2312-W1', '2', '1.2', 'tool2', '2024-11-22', 'KAYU TOP TABLE # 20 X 1200 X 2400 HPL PUTIH. LIST PVC', '0.00125', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '1685.81', 'finished'),
(330, '24-2312-W1', '3', '2', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '0', 'finished'),
(331, '24-2312-W1', '1', '1.1', 'tools3', '2024-11-22', 'ALLUMINIUM 5052 # 10 x 1200 x 2400', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '12200000.00', 'finished'),
(332, '24-2312-W1', '2', '1.2', 'tools4', '2024-11-22', 'KACA CLEAR # 6MM X 849CM X 1630 CM + LUBANG 4 BUAH GOSOK BATU', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '794600.00', 'finished'),
(333, '24-2312-W1', '3', '2', 'sub rangkaian', '2024-11-22', 'Sub-Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '0', 'finished'),
(334, '24-2312-W1', '4', '3', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '0', 'finished'),
(335, '24-2312-W1', '1', '1.1', 'tool1', '2024-11-22', 'ALLUMINIUM 7075 # 50 x 50', '0.00098', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '987.33', 'finished'),
(336, '24-2312-W1', '2', '1.2', 'tool2', '2024-11-22', 'KAYU TOP TABLE # 20 X 1200 X 2400 HPL PUTIH. LIST PVC', '0.00125', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '1685.81', 'finished'),
(337, '24-2312-W1', '3', '2', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '0', 'finished'),
(338, '24-2312-W1', '1', '1.1', 'tools3', '2024-11-22', 'ALLUMINIUM 5052 # 10 x 1200 x 2400', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '12200000.00', 'finished'),
(339, '24-2312-W1', '2', '1.2', 'tools4', '2024-11-22', 'KACA CLEAR # 6MM X 849CM X 1630 CM + LUBANG 4 BUAH GOSOK BATU', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '794600.00', 'finished'),
(340, '24-2312-W1', '3', '2', 'sub rangkaian', '2024-11-22', 'Sub-Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '0', 'finished'),
(341, '24-2312-W1', '4', '3', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '0', 'finished'),
(342, '24-2312-W1', '1', '1.1', 'tool1', '2024-11-22', 'ALLUMINIUM 7075 # 50 x 50', '0.00098', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '987.33', 'finished'),
(343, '24-2312-W1', '2', '1.2', 'tool2', '2024-11-22', 'KAYU TOP TABLE # 20 X 1200 X 2400 HPL PUTIH. LIST PVC', '0.00125', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '1685.81', 'finished'),
(344, '24-2312-W1', '3', '2', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '0', 'finished'),
(345, '24-2312-W1', '1', '1.1', 'tools3', '2024-11-22', 'ALLUMINIUM 5052 # 10 x 1200 x 2400', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '12200000.00', 'finished'),
(346, '24-2312-W1', '2', '1.2', 'tools4', '2024-11-22', 'KACA CLEAR # 6MM X 849CM X 1630 CM + LUBANG 4 BUAH GOSOK BATU', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '794600.00', 'finished'),
(347, '24-2312-W1', '3', '2', 'sub rangkaian', '2024-11-22', 'Sub-Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '0', 'finished'),
(348, '24-2312-W1', '4', '3', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '0', 'finished'),
(349, '24-2312-W1', '1', '1.1', 'tool1', '2024-11-22', 'ALLUMINIUM 7075 # 50 x 50', '0.00098', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '987.33', 'finished'),
(350, '24-2312-W1', '2', '1.2', 'tool2', '2024-11-22', 'KAYU TOP TABLE # 20 X 1200 X 2400 HPL PUTIH. LIST PVC', '0.00125', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '1685.81', 'finished'),
(351, '24-2312-W1', '3', '2', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '0', 'finished'),
(352, '24-2312-W1', '1', '1.1', 'tools3', '2024-11-22', 'ALLUMINIUM 5052 # 10 x 1200 x 2400', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '12200000.00', 'finished'),
(353, '24-2312-W1', '2', '1.2', 'tools4', '2024-11-22', 'KACA CLEAR # 6MM X 849CM X 1630 CM + LUBANG 4 BUAH GOSOK BATU', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '794600.00', 'finished'),
(354, '24-2312-W1', '3', '2', 'sub rangkaian', '2024-11-22', 'Sub-Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '0', 'finished'),
(355, '24-2312-W1', '4', '3', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '0', 'finished'),
(356, '24-2312-W1', '1', '1.1', 'tool1', '2024-11-22', 'ALLUMINIUM 7075 # 50 x 50', '0.00098', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '987.33', 'finished'),
(357, '24-2312-W1', '2', '1.2', 'tool2', '2024-11-22', 'KAYU TOP TABLE # 20 X 1200 X 2400 HPL PUTIH. LIST PVC', '0.00125', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '1685.81', 'finished'),
(358, '24-2312-W1', '3', '2', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '0', 'finished'),
(359, '24-2312-W1', '1', '1.1', 'tools3', '2024-11-22', 'ALLUMINIUM 5052 # 10 x 1200 x 2400', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '12200000.00', 'finished'),
(360, '24-2312-W1', '2', '1.2', 'tools4', '2024-11-22', 'KACA CLEAR # 6MM X 849CM X 1630 CM + LUBANG 4 BUAH GOSOK BATU', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '794600.00', 'finished'),
(361, '24-2312-W1', '3', '2', 'sub rangkaian', '2024-11-22', 'Sub-Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '0', 'finished'),
(362, '24-2312-W1', '4', '3', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '0', 'finished'),
(363, '24-2312-W1', '1', '1.1', 'tool1', '2024-11-22', 'ALLUMINIUM 7075 # 50 x 50', '0.00098', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '987.33', 'finished'),
(364, '24-2312-W1', '2', '1.2', 'tool2', '2024-11-22', 'KAYU TOP TABLE # 20 X 1200 X 2400 HPL PUTIH. LIST PVC', '0.00125', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '1685.81', 'finished'),
(365, '24-2312-W1', '3', '2', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '0', 'finished'),
(366, '24-2312-W1', '1', '1.1', 'tools3', '2024-11-22', 'ALLUMINIUM 5052 # 10 x 1200 x 2400', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '12200000.00', 'finished'),
(367, '24-2312-W1', '2', '1.2', 'tools4', '2024-11-22', 'KACA CLEAR # 6MM X 849CM X 1630 CM + LUBANG 4 BUAH GOSOK BATU', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '794600.00', 'finished'),
(368, '24-2312-W1', '3', '2', 'sub rangkaian', '2024-11-22', 'Sub-Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '0', 'finished'),
(369, '24-2312-W1', '4', '3', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '0', 'finished'),
(370, '24-2312-W1', '1', '1.1', 'tool1', '2024-11-22', 'ALLUMINIUM 7075 # 50 x 50', '0.00098', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '987.33', 'finished'),
(371, '24-2312-W1', '2', '1.2', 'tool2', '2024-11-22', 'KAYU TOP TABLE # 20 X 1200 X 2400 HPL PUTIH. LIST PVC', '0.00125', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '1685.81', 'finished'),
(372, '24-2312-W1', '3', '2', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '0', 'finished'),
(373, '24-2312-W1', '1', '1.1', 'tools3', '2024-11-22', 'ALLUMINIUM 5052 # 10 x 1200 x 2400', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '12200000.00', 'finished'),
(374, '24-2312-W1', '2', '1.2', 'tools4', '2024-11-22', 'KACA CLEAR # 6MM X 849CM X 1630 CM + LUBANG 4 BUAH GOSOK BATU', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '794600.00', 'finished'),
(375, '24-2312-W1', '3', '2', 'sub rangkaian', '2024-11-22', 'Sub-Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '0', 'finished'),
(376, '24-2312-W1', '4', '3', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '0', 'finished'),
(377, '24-2312-W1', '1', '1.1', 'tool1', '2024-11-22', 'ALLUMINIUM 7075 # 50 x 50', '0.00098', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '987.33', 'finished'),
(378, '24-2312-W1', '2', '1.2', 'tool2', '2024-11-22', 'KAYU TOP TABLE # 20 X 1200 X 2400 HPL PUTIH. LIST PVC', '0.00125', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '1685.81', 'finished'),
(379, '24-2312-W1', '3', '2', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '0', 'finished'),
(380, '24-2312-W1', '1', '1.1', 'tools3', '2024-11-22', 'ALLUMINIUM 5052 # 10 x 1200 x 2400', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '12200000.00', 'finished'),
(381, '24-2312-W1', '2', '1.2', 'tools4', '2024-11-22', 'KACA CLEAR # 6MM X 849CM X 1630 CM + LUBANG 4 BUAH GOSOK BATU', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '794600.00', 'finished'),
(382, '24-2312-W1', '3', '2', 'sub rangkaian', '2024-11-22', 'Sub-Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '0', 'finished'),
(383, '24-2312-W1', '4', '3', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '0', 'finished'),
(384, '24-2312-W1', '1', '1.1', 'tool1', '2024-11-22', 'ALLUMINIUM 7075 # 50 x 50', '0.00098', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '987.33', 'finished'),
(385, '24-2312-W1', '2', '1.2', 'tool2', '2024-11-22', 'KAYU TOP TABLE # 20 X 1200 X 2400 HPL PUTIH. LIST PVC', '0.00125', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '1685.81', 'finished'),
(386, '24-2312-W1', '3', '2', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '0', 'finished'),
(387, '24-2312-W1', '1', '1.1', 'tools3', '2024-11-22', 'ALLUMINIUM 5052 # 10 x 1200 x 2400', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '12200000.00', 'finished'),
(388, '24-2312-W1', '2', '1.2', 'tools4', '2024-11-22', 'KACA CLEAR # 6MM X 849CM X 1630 CM + LUBANG 4 BUAH GOSOK BATU', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '794600.00', 'finished'),
(389, '24-2312-W1', '3', '2', 'sub rangkaian', '2024-11-22', 'Sub-Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '0', 'finished'),
(390, '24-2312-W1', '4', '3', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '0', 'finished'),
(391, '24-2312-W1', '1', '1.1', 'tool1', '2024-11-22', 'ALLUMINIUM 7075 # 50 x 50', '0.00098', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '987.33', 'finished'),
(392, '24-2312-W1', '2', '1.2', 'tool2', '2024-11-22', 'KAYU TOP TABLE # 20 X 1200 X 2400 HPL PUTIH. LIST PVC', '0.00125', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '1685.81', 'finished'),
(393, '24-2312-W1', '3', '2', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '0', 'finished'),
(394, '24-2312-W1', '1', '1.1', 'tools3', '2024-11-22', 'ALLUMINIUM 5052 # 10 x 1200 x 2400', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '12200000.00', 'finished'),
(395, '24-2312-W1', '2', '1.2', 'tools4', '2024-11-22', 'KACA CLEAR # 6MM X 849CM X 1630 CM + LUBANG 4 BUAH GOSOK BATU', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '794600.00', 'finished'),
(396, '24-2312-W1', '3', '2', 'sub rangkaian', '2024-11-22', 'Sub-Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '0', 'finished'),
(397, '24-2312-W1', '4', '3', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '0', 'finished'),
(398, '24-2310-W1', '1', '1.1', 'tools3', '2024-11-22', 'ALLUMINIUM 5052 # 10 x 1200 x 2400', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 11:00:33', '2024-11-22 11:00:33', '12200000.00', 'finished'),
(399, '24-2310-W1', '2', '1.2', 'tools4', '2024-11-22', 'KACA CLEAR # 6MM X 849CM X 1630 CM + LUBANG 4 BUAH GOSOK BATU', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 11:00:33', '2024-11-22 11:00:33', '794600.00', 'finished'),
(400, '24-2310-W1', '3', '2', 'sub rangkaian', '2024-11-22', 'Sub-Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 11:00:33', '2024-11-22 11:00:33', '0', 'finished'),
(401, '24-2310-W1', '4', '3', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-22 11:00:33', '2024-11-22 11:00:33', '0', 'finished'),
(402, '24-2311-M1', '1', '1', 'Item 1', '2024-11-23', 'Assy', '0.00000', '0', '0', '0', NULL, '-', '-', '2024-11-23', '-', '-', '2024-11-23 01:36:21', '2024-11-23 01:37:38', '0.00', 'finished'),
(403, '24-2311-M1', '2', '1.1', 'Item 2', '2024-11-23', 'Sub-Assy', '0.00000', '0', '0', '0', NULL, '-', '-', '2024-11-23', '-', '-', '2024-11-23 01:36:21', '2024-11-23 01:38:25', '0.00', 'finished'),
(408, '24-2311-M2', '1', '1', 'Item 1', '2024-11-23', 'Assy', '0.00000', '0', '0', '0', NULL, '-', '-', '2024-11-23', '-', '-', '2024-11-23 02:12:35', '2024-11-23 02:13:56', '0.00', 'finished'),
(409, '24-2311-M2', '2', '1.1', 'Item 2', '2024-11-23', 'Sub-Assy', '0.00000', '0', '0', '0', NULL, '-', '-', '2024-11-23', '-', '-', '2024-11-23 02:12:35', '2024-11-23 02:14:20', '0.00', 'finished'),
(410, '24-2313-W1', '1', '1.1', 'tool1', '2024-11-22', 'ALLUMINIUM 7075 # 50 x 50', '0.00098', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-25 15:27:14', '2024-11-25 15:27:14', '987.33', 'Queue'),
(411, '24-2313-W1', '2', '1.2', 'tool2', '2024-11-22', 'KAYU TOP TABLE # 20 X 1200 X 2400 HPL PUTIH. LIST PVC', '0.00125', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-25 15:27:14', '2024-11-25 15:27:14', '1685.81', 'Queue'),
(412, '24-2313-W1', '3', '2', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-25 15:27:14', '2024-11-25 15:27:14', '0', 'Queue'),
(413, '24-2313-W1', '1', '1.1', 'tools3', '2024-11-22', 'ALLUMINIUM 5052 # 10 x 1200 x 2400', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-25 15:27:14', '2024-11-25 15:27:14', '12200000.00', 'Queue'),
(414, '24-2313-W1', '2', '1.2', 'tools4', '2024-11-22', 'KACA CLEAR # 6MM X 849CM X 1630 CM + LUBANG 4 BUAH GOSOK BATU', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-25 15:27:14', '2024-11-25 15:27:14', '794600.00', 'Queue'),
(415, '24-2313-W1', '3', '2', 'sub rangkaian', '2024-11-22', 'Sub-Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-25 15:27:14', '2024-11-25 15:27:14', '0', 'Queue'),
(416, '24-2313-W1', '4', '3', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-25 15:27:14', '2024-11-25 15:27:14', '0', 'Queue'),
(417, '24-2313-W1', '1', '1.1', 'tool1', '2024-11-22', 'ALLUMINIUM 7075 # 50 x 50', '0.00098', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-25 15:27:14', '2024-11-25 15:27:14', '987.33', 'Queue'),
(418, '24-2313-W1', '2', '1.2', 'tool2', '2024-11-22', 'KAYU TOP TABLE # 20 X 1200 X 2400 HPL PUTIH. LIST PVC', '0.00125', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-25 15:27:14', '2024-11-25 15:27:14', '1685.81', 'Queue'),
(419, '24-2313-W1', '3', '2', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-25 15:27:14', '2024-11-25 15:27:14', '0', 'Queue'),
(420, '24-2313-W1', '1', '1.1', 'tools3', '2024-11-22', 'ALLUMINIUM 5052 # 10 x 1200 x 2400', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-25 15:27:14', '2024-11-25 15:27:14', '12200000.00', 'Queue'),
(421, '24-2313-W1', '2', '1.2', 'tools4', '2024-11-22', 'KACA CLEAR # 6MM X 849CM X 1630 CM + LUBANG 4 BUAH GOSOK BATU', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-25 15:27:14', '2024-11-25 15:27:14', '794600.00', 'Queue'),
(422, '24-2313-W1', '3', '2', 'sub rangkaian', '2024-11-22', 'Sub-Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-25 15:27:14', '2024-11-25 15:27:14', '0', 'Queue'),
(423, '24-2313-W1', '4', '3', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-25 15:27:14', '2024-11-25 15:27:14', '0', 'Queue'),
(424, '24-2313-W2', '1', '1.1', 'tools3', '2024-11-22', 'ALLUMINIUM 5052 # 10 x 1200 x 2400', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-25 15:27:37', '2024-11-25 15:27:37', '12200000.00', 'Queue'),
(425, '24-2313-W2', '2', '1.2', 'tools4', '2024-11-22', 'KACA CLEAR # 6MM X 849CM X 1630 CM + LUBANG 4 BUAH GOSOK BATU', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-25 15:27:37', '2024-11-25 15:27:37', '794600.00', 'Queue'),
(426, '24-2313-W2', '3', '2', 'sub rangkaian', '2024-11-22', 'Sub-Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-25 15:27:37', '2024-11-25 15:27:37', '0', 'Queue'),
(427, '24-2313-W2', '4', '3', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-25 15:27:37', '2024-11-25 15:27:37', '0', 'Queue'),
(428, 'STWF421', '1', '1.1', '299', '2024-11-25', 'Barang 18', '0.00005', '2', '1', '3', NULL, '-', '-', '2024-11-25', '-', '-', '2024-11-25 18:50:51', '2024-11-25 18:51:55', '197.82', 'finished'),
(429, 'STWF421', '2', '2', '001', '2024-11-25', 'tes 1', '0.00002', '3', '1', '1', NULL, '-', '-', '2024-11-25', '-', '-', '2024-11-25 18:50:51', '2024-11-25 18:53:25', '0.94', 'finished'),
(430, '24-0021-W1', '1', '1.1', '299', '2024-11-25', 'Barang 18', '0.00005', '2', '1', '3', NULL, '-', '-', '2024-11-25', '-', '-', '2024-11-25 18:58:52', '2024-11-25 18:58:52', '197.82', 'Queue'),
(431, '24-0021-W1', '2', '2', '001', '2024-11-25', 'tes 1', '0.00002', '3', '1', '1', NULL, '-', '-', '2024-11-25', '-', '-', '2024-11-25 18:58:52', '2024-11-25 18:58:52', '0.94', 'Queue'),
(432, '24-2314-W1', '1', '1.1', 'tool1', '2024-11-22', 'ALLUMINIUM 7075 # 50 x 50', '0.00098', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-26 10:35:45', '2024-11-26 10:35:45', '987.33', 'Queue'),
(433, '24-2314-W1', '2', '1.2', 'tool2', '2024-11-22', 'KAYU TOP TABLE # 20 X 1200 X 2400 HPL PUTIH. LIST PVC', '0.00125', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-26 10:35:45', '2024-11-26 10:35:45', '1685.81', 'Queue'),
(434, '24-2314-W1', '3', '2', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-26 10:35:45', '2024-11-26 10:35:45', '0', 'Queue'),
(435, '24-2314-W1', '1', '1.1', 'tools3', '2024-11-22', 'ALLUMINIUM 5052 # 10 x 1200 x 2400', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-26 10:35:45', '2024-11-26 10:35:45', '12200000.00', 'Queue'),
(436, '24-2314-W1', '2', '1.2', 'tools4', '2024-11-22', 'KACA CLEAR # 6MM X 849CM X 1630 CM + LUBANG 4 BUAH GOSOK BATU', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-26 10:35:45', '2024-11-26 10:35:45', '794600.00', 'Queue'),
(437, '24-2314-W1', '3', '2', 'sub rangkaian', '2024-11-22', 'Sub-Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-26 10:35:45', '2024-11-26 10:35:45', '0', 'Queue'),
(438, '24-2314-W1', '4', '3', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-26 10:35:45', '2024-11-26 10:35:45', '0', 'Queue'),
(439, '24-2314-W1', '1', '1.1', 'tool1', '2024-11-22', 'ALLUMINIUM 7075 # 50 x 50', '0.00098', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-26 10:35:45', '2024-11-26 10:35:45', '987.33', 'Queue'),
(440, '24-2314-W1', '2', '1.2', 'tool2', '2024-11-22', 'KAYU TOP TABLE # 20 X 1200 X 2400 HPL PUTIH. LIST PVC', '0.00125', '5', '5', '5', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-26 10:35:45', '2024-11-26 10:35:45', '1685.81', 'Queue'),
(441, '24-2314-W1', '3', '2', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-26 10:35:45', '2024-11-26 10:35:45', '0', 'Queue'),
(442, '24-2314-W1', '1', '1.1', 'tools3', '2024-11-22', 'ALLUMINIUM 5052 # 10 x 1200 x 2400', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-26 10:35:45', '2024-11-26 10:35:45', '12200000.00', 'Queue'),
(443, '24-2314-W1', '2', '1.2', 'tools4', '2024-11-22', 'KACA CLEAR # 6MM X 849CM X 1630 CM + LUBANG 4 BUAH GOSOK BATU', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-26 10:35:45', '2024-11-26 10:35:45', '794600.00', 'Queue'),
(444, '24-2314-W1', '3', '2', 'sub rangkaian', '2024-11-22', 'Sub-Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-26 10:35:45', '2024-11-26 10:35:45', '0', 'Queue'),
(445, '24-2314-W1', '4', '3', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-26 10:35:45', '2024-11-26 10:35:45', '0', 'Queue'),
(446, '24-2314-W2', '1', '1.1', 'tools3', '2024-11-22', 'ALLUMINIUM 5052 # 10 x 1200 x 2400', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-26 10:36:43', '2024-11-26 10:36:43', '12200000.00', 'Queue'),
(447, '24-2314-W2', '2', '1.2', 'tools4', '2024-11-22', 'KACA CLEAR # 6MM X 849CM X 1630 CM + LUBANG 4 BUAH GOSOK BATU', '2.00000', '2', '2', '2', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-26 10:36:43', '2024-11-26 10:36:43', '794600.00', 'Queue'),
(448, '24-2314-W2', '3', '2', 'sub rangkaian', '2024-11-22', 'Sub-Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-26 10:36:43', '2024-11-26 10:36:43', '0', 'Queue'),
(449, '24-2314-W2', '4', '3', 'rangkaian', '2024-11-22', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-11-22', '-', '-', '2024-11-26 10:36:43', '2024-11-26 10:36:43', '0', 'Queue'),
(450, '24-2315-W1', '1', '1.1', 'itemsatu', '2024-12-03', 'KAYU HARDBOARD 3 X 125 X 25', '9.00000', '9', '9', '9', NULL, '-', '-', '2024-12-03', '-', '-', '2024-11-26 13:12:14', '2024-11-26 13:43:48', '6750.00', 'finished'),
(451, '24-2315-W1', '2', '1.2', 'itemdua', '2024-12-03', 'ALLUMINIUM 5052 # 10 x 1200 x 2400', '0.00582', '9', '9', '9', NULL, '-', '-', '2024-12-03', '-', '-', '2024-11-26 13:12:14', '2024-11-26 13:44:00', '35530.73', 'finished'),
(452, '24-2315-W1', '3', '1.3', 'rangkaian assymbling', '2024-12-03', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-12-03', '-', '-', '2024-11-26 13:12:14', '2024-11-26 13:44:06', '0', 'finished'),
(453, '24-2315-W2', '1', '1.1', 'itemw2 1', '2024-12-03', 'ALLUMINIUM 7075 # 50 x 50', '0.01381', '12', '12', '12', NULL, '-', '-', '2024-12-03', '-', '-', '2024-11-26 13:17:14', '2024-11-26 13:45:21', '13892.32', 'finished'),
(454, '24-2315-W2', '2', '1.2', 'itemw2 2', '2024-12-03', 'BRONZE AB2 ? 40', '1.00000', '1', '1', '1', NULL, '-', '-', '2024-12-03', '-', '-', '2024-11-26 13:17:14', '2024-11-26 13:45:28', '4200000.00', 'finished'),
(455, '24-2315-W2', '3', '1.3', 'sub rangkaian', '2024-12-04', 'Sub-Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-12-04', '-', '-', '2024-11-26 13:17:14', '2024-11-26 13:45:48', '0', 'finished'),
(456, '24-2315-W2', '4', '1.4', 'rangkaian saja', '2024-12-04', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-12-04', '-', '-', '2024-11-26 13:17:14', '2024-11-26 13:46:00', '0', 'finished'),
(457, '24-2811-W1', '1', '1', '299', '2024-11-28', 'tes 1', '0.00024', '5', '2', '3', NULL, '-', '-', '2024-11-28', '-', '-', '2024-11-28 16:36:48', '2024-11-28 16:41:23', '9.42', 'finished'),
(458, '24-2811-W1', '2', '2', '001', '2024-11-28', 'SPCC 0,8', '0.00006', '2', '2', '2', NULL, '-', '-', '2024-11-28', '-', '-', '2024-11-28 16:36:48', '2024-11-28 16:41:34', '0.94', 'finished'),
(459, '24-2811-W2', '1', '1', '299', '2024-11-28', 'tes 1', '0.00024', '5', '2', '3', NULL, '-', '-', '2024-11-28', '-', '-', '2024-11-28 16:43:06', '2024-11-28 16:43:06', '9.42', 'Queue'),
(460, '24-2811-W2', '2', '2', '001', '2024-11-28', 'SPCC 0,8', '0.00006', '2', '2', '2', NULL, '-', '-', '2024-11-28', '-', '-', '2024-11-28 16:43:06', '2024-11-28 16:43:06', '0.94', 'Queue'),
(469, '24-2000-W2', '1', '1', 'abc', '2024-11-29', 'SPCC 0,8', '2.00000', '2', '5', '2', NULL, '-', '-', '2024-11-29', '-', '-', '2024-12-02 11:18:39', '2024-12-02 11:18:39', '30000.00', 'Queue'),
(470, '24-2000-W2', '2', '5', '303', '2024-11-29', '317216 REL HUBEN SD-12 BOTOM 3M', '5.00000', '5', '7', '2', NULL, '-', '-', '2024-11-29', '-', '-', '2024-12-02 11:18:39', '2024-12-02 11:18:39', '138750.00', 'Queue'),
(475, '24-0212-W1', '1', '1', '1', '2024-11-29', 'Barang 21', '2.00000', '2', '3', '3', NULL, '-', '-', '2024-11-29', '-', '-', '2024-12-02 12:41:08', '2024-12-02 12:41:08', '1500.00', 'Queue'),
(476, '24-0212-W1', '1', '2', '300', '2024-11-29', 'SPCC 0,8', '2.00000', '2', '3', '1', NULL, '-', '-', '2024-11-29', '-', '-', '2024-12-02 12:41:08', '2024-12-02 12:41:08', '30000.00', 'Queue'),
(477, '24-0212-W1', '1', '1', '1', '2024-11-29', 'Barang 21', '2.00000', '2', '3', '3', NULL, '-', '-', '2024-11-29', '-', '-', '2024-12-02 12:41:08', '2024-12-02 12:41:08', '1500.00', 'Queue'),
(478, '24-0212-W1', '1', '2', '300', '2024-11-29', 'SPCC 0,8', '2.00000', '2', '3', '1', NULL, '-', '-', '2024-11-29', '-', '-', '2024-12-02 12:41:08', '2024-12-02 12:41:08', '30000.00', 'Queue'),
(479, '24-0212-W1', '1', '1', 'blockframe', '2024-08-02', 'PLAT 3\'', '54.00', '2', '3', '3', NULL, '5', '2', '2024-07-11', '1500', '30000', '2024-12-02 12:41:55', '2024-12-02 12:41:55', NULL, 'Queue'),
(480, '24-0212-W1', '2', '2', 'blockframe 2', '2024-08-03', 'PLAT 3\'', '63.62', '02', '03', '03', NULL, '5', '1', '2024-07-11', '15002', '300003', '2024-12-02 12:41:55', '2024-12-02 12:41:55', NULL, 'Queue'),
(481, '24-0212-W1', '3', '3', 'blockframe 4', '2024-08-07', 'BRONZE', '96.00', '04', '04', '02', NULL, '5', '1', '2024-07-11', '15003', '3000033', '2024-12-02 12:41:55', '2024-12-02 12:41:55', NULL, 'Queue'),
(482, '24-0212-W2', '1', '1', 'blockframe', '2024-08-02', 'PLAT 3\'', '54.00', '2', '3', '3', NULL, '5', '2', '2024-07-11', '1500', '30000', '2024-12-02 12:42:24', '2024-12-02 12:42:24', NULL, 'Queue'),
(483, '24-0212-W2', '2', '2', 'blockframe 2', '2024-08-03', 'PLAT 3\'', '63.62', '02', '03', '03', NULL, '5', '1', '2024-07-11', '15002', '300003', '2024-12-02 12:42:24', '2024-12-02 12:42:24', NULL, 'Queue'),
(484, '24-0212-W2', '3', '3', 'blockframe 4', '2024-08-07', 'BRONZE', '96.00', '04', '04', '02', NULL, '5', '1', '2024-07-11', '15003', '3000033', '2024-12-02 12:42:24', '2024-12-02 12:42:24', NULL, 'Queue'),
(485, 'STFW1011', '1', '1', '299', '2024-12-02', 'SPCC 0,8', '0.00019', '2', '3', '4', NULL, '-', '-', '2024-12-02', '-', '-', '2024-12-02 13:10:25', '2024-12-02 13:23:35', '2.83', 'finished'),
(486, 'STFW1011', '2', '2', '300', '2024-12-02', 'KAYU SANDARAN MULTIPROPUSE FOLDING 333353', '0.00021', '3', '3', '3', NULL, '-', '-', '2024-12-02', '-', '-', '2024-12-02 13:10:25', '2024-12-02 13:23:22', '9.41', 'finished'),
(489, 'STFW1012', '1', '3', '001-001', '2024-12-02', '317216 REL HUBEN SD-12 BOTOM 3M', '0.00006', '2', '2', '2', NULL, '-', '-', '2024-12-02', '-', '-', '2024-12-02 13:25:34', '2024-12-02 13:27:04', '1.74', 'finished'),
(490, 'STFW1012', '2', '4', '011-002', '2024-12-02', 'SPCC 0,8', '1.00000', '1', '2', '2', NULL, '-', '-', '2024-12-02', '-', '-', '2024-12-02 13:25:34', '2024-12-02 13:27:14', '15000.00', 'finished'),
(491, '24-2911-W1', '1', '1', '299', '2024-12-02', 'SPCC 0,8', '0.00019', '2', '3', '4', NULL, '-', '-', '2024-12-02', '-', '-', '2024-12-02 13:29:05', '2024-12-02 13:29:05', '2.83', 'Queue'),
(492, '24-2911-W1', '2', '2', '300', '2024-12-02', 'KAYU SANDARAN MULTIPROPUSE FOLDING 333353', '0.00021', '3', '3', '3', NULL, '-', '-', '2024-12-02', '-', '-', '2024-12-02 13:29:05', '2024-12-02 13:29:05', '9.41', 'Queue'),
(493, 'STFW23101', '1', '1', '299', '2024-12-02', 'SPCC 0,8', '0.00019', '2', '3', '4', NULL, '-', '-', '2024-12-02', '-', '-', '2024-12-02 16:23:15', '2024-12-02 16:23:15', '2.83', 'Queue'),
(494, 'STFW23101', '2', '2', '300', '2024-12-02', 'KAYU SANDARAN MULTIPROPUSE FOLDING 333353', '0.00021', '3', '3', '3', NULL, '-', '-', '2024-12-02', '-', '-', '2024-12-02 16:23:15', '2024-12-02 16:23:15', '9.41', 'Queue'),
(495, '24-1500-W1', '1', '1', 'HOUSING', '2024-12-10', 'Sub-Assy', '0.00000', '0', '0', '0', NULL, '1', '1', '2024-12-03', '3', '1', '2024-12-03 11:35:57', '2024-12-06 09:07:06', '0.00', 'finished'),
(496, '24-1500-W1', '2', '1.1', 'wall', '2024-12-10', 'SPCC 0,8', '3.51680', '800', '700', '0.8', NULL, '1', '1', '2024-12-03', '1', '1.1', '2024-12-03 11:35:57', '2024-12-06 09:07:42', '52752.00', 'finished'),
(497, '24-1500-W1', '3', '2', 'Door', '2024-12-10', 'Sub-Assy', '0', '0', '0', '0', NULL, '1', '1', '2024-12-03', '3', '2', '2024-12-03 11:35:57', '2024-12-06 08:49:17', '0', 'finished'),
(498, '24-1500-W1', '4', '2.1', 'Door Plate', '2024-12-10', 'SPCC 0,8', '1.31880', '300', '700', '0.8', NULL, '1', '1', '2024-12-03', '2', '2.1', '2024-12-03 11:35:57', '2024-12-06 09:08:04', '19782.00', 'finished'),
(499, '24-1500-W1', '5', '3', 'Floor Cab 4D', '2024-12-17', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-12-03', '-', '-', '2024-12-03 11:35:57', '2024-12-06 09:08:24', '0', 'finished'),
(500, '24-1500-W1', '1.1a', '1.1a', 'wall', '2024-12-09', 'SPCC 0,8', '1.50720', '800', '300', '0.8', NULL, '1', '1', '2024-12-06', '1', '1.1', '2024-12-06 09:12:41', '2024-12-06 09:13:53', '22608.00', 'finished'),
(501, 'Int24-1500-W1', '1', '1', 'HOUSING', '2024-12-10', 'Sub-Assy', '0.00000', '0', '0', '0', NULL, '1', '1', '2024-12-03', '3', '1', '2024-12-06 11:51:23', '2024-12-06 11:51:23', '0.00', 'Queue'),
(502, 'Int24-1500-W1', '2', '1.1', 'wall', '2024-12-10', 'SPCC 0,8', '3.51680', '800', '700', '0.8', NULL, '1', '1', '2024-12-03', '1', '1.1', '2024-12-06 11:51:23', '2024-12-06 11:51:23', '52752.00', 'Queue'),
(503, 'Int24-1500-W1', '3', '2', 'Door', '2024-12-10', 'Sub-Assy', '0', '0', '0', '0', NULL, '1', '1', '2024-12-03', '3', '2', '2024-12-06 11:51:23', '2024-12-06 11:51:23', '0', 'Queue'),
(504, 'Int24-1500-W1', '4', '2.1', 'Door Plate', '2024-12-10', 'SPCC 0,8', '1.31880', '300', '700', '0.8', NULL, '1', '1', '2024-12-03', '2', '2.1', '2024-12-06 11:51:23', '2024-12-06 11:51:23', '19782.00', 'Queue'),
(505, 'Int24-1500-W1', '5', '3', 'Floor Cab 4D', '2024-12-17', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-12-03', '-', '-', '2024-12-06 11:51:23', '2024-12-06 11:51:23', '0', 'Queue'),
(506, 'Int24-1500-W1', '1.1a', '1.1a', 'wall', '2024-12-09', 'SPCC 0,8', '1.50720', '800', '300', '0.8', NULL, '1', '1', '2024-12-06', '1', '1.1', '2024-12-06 11:51:23', '2024-12-06 11:51:23', '22608.00', 'Queue'),
(507, 'Int24-1500-W1', '1', '1', 'HOUSING', '2024-12-10', 'Sub-Assy', '0.00000', '0', '0', '0', NULL, '1', '1', '2024-12-03', '3', '1', '2024-12-06 11:51:23', '2024-12-06 11:51:23', '0.00', 'Queue'),
(508, 'Int24-1500-W1', '2', '1.1', 'wall', '2024-12-10', 'SPCC 0,8', '3.51680', '800', '700', '0.8', NULL, '1', '1', '2024-12-03', '1', '1.1', '2024-12-06 11:51:23', '2024-12-06 11:51:23', '52752.00', 'Queue'),
(509, 'Int24-1500-W1', '3', '2', 'Door', '2024-12-10', 'Sub-Assy', '0', '0', '0', '0', NULL, '1', '1', '2024-12-03', '3', '2', '2024-12-06 11:51:23', '2024-12-06 11:51:23', '0', 'Queue'),
(510, 'Int24-1500-W1', '4', '2.1', 'Door Plate', '2024-12-10', 'SPCC 0,8', '1.31880', '300', '700', '0.8', NULL, '1', '1', '2024-12-03', '2', '2.1', '2024-12-06 11:51:23', '2024-12-06 11:51:23', '19782.00', 'Queue'),
(511, 'Int24-1500-W1', '5', '3', 'Floor Cab 4D', '2024-12-17', 'Assy', '0', '0', '0', '0', NULL, '-', '-', '2024-12-03', '-', '-', '2024-12-06 11:51:23', '2024-12-06 11:51:23', '0', 'Queue'),
(512, 'Int24-1500-W1', '1.1a', '1.1a', 'wall', '2024-12-09', 'SPCC 0,8', '1.50720', '800', '300', '0.8', NULL, '1', '1', '2024-12-06', '1', '1.1', '2024-12-06 11:51:23', '2024-12-06 11:51:23', '22608.00', 'Queue');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kbli_code`
--

CREATE TABLE `kbli_code` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kbli_code` varchar(10) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kbli_code`
--

INSERT INTO `kbli_code` (`id`, `kbli_code`, `description`, `created_at`, `updated_at`) VALUES
(1, '31004', 'Furnitur untuk sekolah, kantor, pabrik', '2024-01-29 02:47:59', '2024-01-29 02:47:59'),
(2, '33122', 'Jasa Reparasi Mesin Produksi', '2024-01-29 02:47:59', '2024-01-29 02:47:59'),
(3, '32502', 'Dental Chair', '2024-01-29 02:47:59', '2024-01-29 02:47:59'),
(4, '28221', 'Pembuatan Mesin Perkakas dan Mesin Khusus', '2024-01-29 02:47:59', '2024-01-29 02:47:59'),
(5, '25991', 'Brankas', '2024-01-29 02:47:59', '2024-01-29 02:47:59'),
(6, '32501', 'Tempat tidur rumah sakit', '2024-01-29 02:47:59', '2024-01-29 02:47:59'),
(8, '28299', 'Mesin Perkakas Khusus', '2024-01-29 02:47:59', '2024-01-29 02:47:59'),
(10, '26602', 'Industri Peralatan Elektromedikal dan Elektroterapi', '2024-07-10 01:57:44', '2024-07-10 01:57:44'),
(11, '21015', 'Industri Alat Kesehatan dalam Sub golongan 2101', '2024-07-10 01:58:25', '2024-10-09 14:07:03'),
(12, '12345', 'tes', '2024-08-14 11:43:48', '2024-08-14 11:43:48'),
(15, '111111', 'aaa', '2024-10-09 14:39:57', '2024-10-09 14:39:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `machine`
--

CREATE TABLE `machine` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plant` varchar(255) NOT NULL,
  `id_machine` varchar(255) NOT NULL,
  `machine_name` varchar(255) NOT NULL,
  `machine_type` varchar(255) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `group_id` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `groupseq_id` varchar(255) NOT NULL,
  `groupseq_name` varchar(255) NOT NULL,
  `machine_state` varchar(255) NOT NULL,
  `process` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `purchase_date` varchar(255) NOT NULL,
  `purchase_price` varchar(255) NOT NULL,
  `depreciation_age` varchar(255) NOT NULL,
  `used_age` int(11) NOT NULL,
  `mach_hour` int(11) NOT NULL,
  `days_per_year` int(11) NOT NULL,
  `bank_interest_percent` varchar(255) NOT NULL,
  `floor_area` varchar(255) NOT NULL,
  `maintenance_factor` varchar(255) NOT NULL,
  `maintenance_cost_year` varchar(255) NOT NULL,
  `floor_price` varchar(255) NOT NULL,
  `power_consumption` varchar(255) NOT NULL,
  `electric_price` varchar(255) NOT NULL,
  `labor_cost` varchar(255) NOT NULL,
  `machine_price` varchar(255) NOT NULL,
  `depreciation_cost` varchar(255) NOT NULL,
  `bank_interest` varchar(255) NOT NULL,
  `area_cost` varchar(255) NOT NULL,
  `electrical_cost` varchar(255) NOT NULL,
  `maintenance_cost` varchar(255) NOT NULL,
  `mach_cost_per_hour` varchar(255) NOT NULL,
  `total_mach` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `machine`
--

INSERT INTO `machine` (`id`, `plant`, `id_machine`, `machine_name`, `machine_type`, `group_name`, `group_id`, `location`, `start_time`, `end_time`, `groupseq_id`, `groupseq_name`, `machine_state`, `process`, `image`, `purchase_date`, `purchase_price`, `depreciation_age`, `used_age`, `mach_hour`, `days_per_year`, `bank_interest_percent`, `floor_area`, `maintenance_factor`, `maintenance_cost_year`, `floor_price`, `power_consumption`, `electric_price`, `labor_cost`, `machine_price`, `depreciation_cost`, `bank_interest`, `area_cost`, `electrical_cost`, `maintenance_cost`, `mach_cost_per_hour`, `total_mach`, `created_at`, `updated_at`) VALUES
(1, 'WF', 'WF001', 'PUNCH WF', 'PUNCH', 'PUNCH WF', '2', 'WF', '08:00', '21:00', '2', 'PUNC;LW MKN;', 'OK', 'PUNCHING', NULL, '2024', ' 500000000', '5', 15, 13, 276, '5', '20', '1', ' 5000000', ' 14000', '12', ' 1500', ' 30000', ' 180000', ' 13006', ' 3484', ' 78', ' 18000', ' 1394', ' 35962', ' 230962', '2024-02-02 04:33:40', '2024-02-02 04:33:40'),
(2, 'MDC', 'MDC001', 'CNC MILLING VMC 60E', 'MILLING MACHINE', 'MILLING', '10', 'MDC', '08:00', '21:00', '3', 'BEND;MILL MKN', 'OK', 'MILLING', NULL, '2023', ' 500000000', '5', 15, 13, 276, '6', '25', '15', ' 75000000', ' 150000', '3', ' 1500', ' 30000', ' 0', ' 13006', ' 4181', ' 1045', ' 4500', ' 20903', ' 43635', ' 73635', '2024-02-02 06:23:05', '2024-02-02 06:23:05'),
(3, 'EDU', 'EDU001', 'Punch A', 'A', 'EDU MAKER', '99', 'EDU', '18:36', '23:37', '3', 'BEND;MILL MKN', 'OK', 'A', NULL, '2024', ' 300000', '2', 3, 5, 276, '10', '20', '3', ' 9000', ' 30000', '2', ' 900', ' 3000', ' 5000000', ' 101', ' 11', ' 435', ' 1800', ' 7', ' 2354', ' 5354', '2024-07-03 07:38:22', '2024-07-03 07:38:22'),
(4, 'EDU', 'EDU002', 'CMZ 1', 'Turning', 'LW WBS', '41', 'WBS', '07:00', '19:00', '2', 'PUNC;LW MKN;', 'OK', 'Turn to size', NULL, '2024', ' 10000000', '1', 1, 12, 276, '0', '4', '10', ' 1000000', ' 65000', '6', ' 1467', ' 9000', ' 0', ' 4227', ' 0', ' 79', ' 8802', ' 302', ' 13410', ' 22410', '2024-07-10 13:08:18', '2024-07-10 13:08:18'),
(5, 'MDC', 'MDC035', 'KRISBOW', 'SAWING', 'SAW', '12', 'MDC', '08:00', '16:00', '1', 'SAW;CUT', 'OK', 'SAW TO SIZE', NULL, '2016', ' 18284536', '4', 6, 8, 276, '1', '6', '12', ' 2194144', ' 65000', '08', ' 1450', ' 17600', ' 10000000', ' 1718', ' 41', ' 177', ' 11600', ' 994', ' 14530', ' 32130', '2024-07-10 13:22:38', '2024-07-10 13:22:38'),
(6, 'EDU', 'EDU036', 'HANSEAT', 'Turning', 'LW WAP', '35', 'WAP', '08:00', '20:00', '2', 'PUNC;LW MKN;', 'OK', 'Turn to size', NULL, '2024', ' 80000000', '1', 1, 12, 276, '0', '8', '15', ' 120000000', ' 65000', '25', ' 1467', ' 10000', ' 1', ' 33816', ' 0', ' 157', ' 36675', ' 36232', ' 106880', ' 116880', '2024-07-10 13:27:02', '2024-07-10 13:27:02'),
(7, 'EDU', 'EDU062', 'MIKRON DRO 2', 'Milling', 'MILL WBS', '42', 'WBS', '08:00', '20:00', '3', 'BEND;MILL MKN', 'OK', 'Mill to size', NULL, '2024', ' 60000000', '1', 1, 12, 276, '0', '2', '10', ' 6000000', ' 65000', '5', ' 1200', ' 9000', ' 0', ' 25362', ' 0', ' 39', ' 6000', ' 1812', ' 33213', ' 42213', '2024-07-10 13:30:20', '2024-07-10 13:30:20'),
(8, 'EDU', 'EDU017', 'ACIERA 1', 'Drilling', 'DRILL WAP', '33', 'WAP', '07:00', '15:00', '8', 'ASS WF', 'OK', 'Drill to size', NULL, '2024', ' 7600000', '1', 1, 8, 276, '0', '2', '10', ' 760000', ' 65000', '5', ' 1467', ' 12000', ' 0', ' 4819', ' 0', ' 59', ' 7335', ' 344', ' 12557', ' 24557', '2024-07-10 13:34:04', '2024-07-10 13:34:04'),
(9, 'WF', 'WF049', 'KOBEWEL', 'Welding CO', 'WELD WF', '44', 'WF', '07:00', '15:00', '4', 'WELD;GRD;HOB;EDM;SLOT', 'OK', 'Weld as per drawing', NULL, '2013', ' 15825000', '8', 8, 8, 276, '0', '9', '22.78', ' 360493500', ' 89040', '75', ' 1435', ' 22168', ' 5934375', ' 1254', ' 0', ' 363', ' 107625', ' 163267', ' 272509', ' 294677', '2024-07-10 13:39:16', '2024-07-10 13:39:16'),
(10, 'Support', 'SUPPORT007', 'IT', 'MAINTENANCE', 'IT', '16', 'IT', '07:00', '15:00', '1', 'SAW;CUT', 'OK', 'Repair', NULL, '2024', ' 25000000', '1', 1, 8, 276, '0', '20', '5', ' 1250000', ' 65000', '1', ' 1200', ' 15000', ' 25000000', ' 15851', ' 0', ' 589', ' 1200', ' 566', ' 18206', ' 33206', '2024-07-10 13:42:52', '2024-07-10 13:42:52'),
(15, 'MDC', 'MDC009', 'ASSY MDC', 'ASSY', 'ASSY EL', '8', 'MDC', '00:00', '17:00', '2', 'PUNC;LW MKN;', 'OK', 'Mill to size', NULL, '2024', ' 50000000', '5', 15, 17, 276, '5', '8', '2', ' 1000000', ' 15000', '12', ' 1500', ' 30000', ' 50000000', ' 710', ' 26641', ' 26', ' 18000', ' 213', ' 45590', ' 75590', '2024-08-14 11:36:06', '2024-08-14 11:36:06'),
(18, 'EDU', 'EDU0090', 'PUSH', 'PUSH', 'MILL WBS', '42', 'EDU', '10:00', '19:00', '1', 'SAW;CUT', 'OK', 'PUSH', NULL, '2024', ' 50000000', '5', 15, 9, 276, '10', '8', '10', ' 5000000', ' 15000', '12', ' 1500', ' 30000', ' 50000000', ' 1342', ' 100644', ' 48', ' 18000', ' 2013', ' 122047', ' 152047', '2024-08-19 10:24:24', '2024-08-19 10:24:24'),
(21, 'MDC', 'MDC099', 'test input', 'a', 'SAW', '12', 'a', '10:15', '23:15', '2', 'PUNC;LW MKN;', 'OK', 'a', NULL, '2023', ' 300000000', '4', 10, 13, 276, '2', '20', '2', ' 6000000', ' 20000', '2', ' 2003', ' 300000', ' 300000000', ' 8361', ' 83612', ' 111', ' 4006', ' 1672', ' 97762', ' 397762', '2024-08-22 08:17:45', '2024-08-22 08:17:45'),
(22, 'WF', 'WF023', 'Trumpf TC 1000', 'Punching', 'PUNCH', '1', 'WF', '08:00', '23:00', '2', 'PUNC;LW MKN;', 'OK', 'Punch to Size', NULL, '2010', ' 3750000000', '5', 14, 15, 276, '0', '30', '2', ' 75000000', ' 30', '28', ' 1435', ' 20631', ' 3750000000', ' 64700', ' 0', ' 0', ' 40180', ' 18116', ' 122996', ' 143627', '2024-08-27 10:33:28', '2024-08-27 10:33:28'),
(23, 'WF', 'WF012', 'Trumpf TC 1000', 'punching', 'PUNCH', '1', 'WF', '08:00', '23:00', '2', 'PUNC;LW MKN;', 'OK', 'punch to size', NULL, '2010', ' 3720000000', '4', 14, 15, 276, '0', '30', '2', ' 74400000', ' 89040', '28', ' 1435', ' 20631', ' 3720000000', ' 64182', ' 0', ' 645', ' 40180', ' 17971', ' 122978', ' 143609', '2024-08-28 13:05:57', '2024-08-28 13:05:57'),
(24, 'WF', 'WF050', 'Kobewel', 'PUNCH', 'PUNCH', '1', 'WF', '08:00', '01:00', '2', 'PUNC;LW MKN;', 'OK', 'PUNCH TO SIZE', NULL, '2020', ' 50000000', '4', 2, 17, 276, '8', '10', '12.5', ' 62500000', ' 89000', '15', ' 15000', ' 10000', ' 50000000', ' 5328', ' 42626', ' 190', ' 225000', ' 13321', ' 286465', ' 296465', '2024-09-12 13:22:34', '2024-09-12 13:22:34'),
(25, 'WF', 'WF051', 'Subcon Laser', 'Laser Cut', 'CUT WF', '49', 'WF', '08:00', '17:00', '1', 'SAW;CUT', 'OK', 'Laser', NULL, '2023', ' 0', '0', 1, 8, 276, '0', '0', '0', ' 0', ' 0', '0', ' 0', ' 0', '0', '0', ' 0', ' 0', ' 0', ' 0', ' 0', ' 0', '2024-10-28 13:32:31', '2024-10-28 13:32:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `machine_state`
--

CREATE TABLE `machine_state` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `info` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `machine_state`
--

INSERT INTO `machine_state` (`id`, `code`, `state`, `info`, `created_at`, `updated_at`) VALUES
(1, '1', 'OK', NULL, '2024-01-29 02:44:25', '2024-01-29 02:44:25'),
(2, '2', 'Under Repair', NULL, '2024-01-29 02:44:35', '2024-01-29 02:44:35'),
(3, '3', 'Que Up Repair', NULL, '2024-01-29 02:44:42', '2024-01-29 02:44:42'),
(4, '4', 'Out Of Date', NULL, '2024-01-29 02:44:51', '2024-01-29 02:44:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `material`
--

CREATE TABLE `material` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_material` varchar(255) NOT NULL,
  `material` varchar(255) DEFAULT NULL,
  `length` varchar(255) DEFAULT NULL,
  `width` varchar(255) DEFAULT NULL,
  `thickness` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `material`
--

INSERT INTO `material` (`id`, `id_material`, `material`, `length`, `width`, `thickness`, `created_at`, `updated_at`) VALUES
(1, '00001', 'PLAT 3\'', '10', '10', '5', '2024-02-02 05:08:54', '2024-06-11 01:28:20'),
(3, '00002', 'BRONZE', '0.5', '0.2', '1', '2024-05-19 23:55:41', '2024-05-19 23:55:41'),
(4, '00003', 'Baja', '2000', '3000', '4', '2024-06-11 01:26:08', '2024-06-11 01:26:08'),
(6, 'Coba', 'SPCC 0,9', '2440', '1220', '0.9', '2024-08-14 11:01:59', '2024-08-22 08:10:56'),
(7, 'Coba 1', 'SPCC 0,8', '2440', '1220', '0.8', '2024-08-22 08:10:23', '2024-08-22 08:10:23'),
(8, '01', 'SPCC 0,8', '1000', '300', '0.8', '2024-10-28 13:14:41', '2024-10-28 13:14:41'),
(9, '124', 'SPCC 0,9', '1220', '2440', '0.9', '2024-12-03 11:46:19', '2024-12-03 11:46:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `material_sheet`
--

CREATE TABLE `material_sheet` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `so_no` varchar(255) NOT NULL,
  `dod` date NOT NULL,
  `no_product` varchar(255) NOT NULL,
  `item_no` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `dwg_no` varchar(255) NOT NULL,
  `nos` varchar(255) NOT NULL,
  `material` varchar(255) NOT NULL,
  `shape` varchar(255) NOT NULL,
  `length` varchar(255) NOT NULL,
  `width` varchar(255) NOT NULL,
  `thick` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `mat_cost` varchar(255) NOT NULL,
  `mat_price` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `material_sheet`
--

INSERT INTO `material_sheet` (`id`, `order_number`, `customer`, `product`, `so_no`, `dod`, `no_product`, `item_no`, `item_name`, `dwg_no`, `nos`, `material`, `shape`, `length`, `width`, `thick`, `weight`, `mat_cost`, `mat_price`, `created_at`, `updated_at`) VALUES
(1, '15-0114-W01', 'Almik Kurnia Bersama PT', 'Almik Kurnia Bersama PT', '15-0114-W01', '2015-05-16', '2', 'P13', 'AKB SDW 8', '', '2', '', 'Block', '0', '0', '0', '0', '', '', NULL, NULL),
(2, '16-0195-M02', 'TRI KARYA NUSANTARA', 'TRI KARYA NUSANTARA', '16-0195-M02', '2016-06-28', '1', 'MEC', 'Engineer Electric', '', '1', 'STANDART PART', 'BLOCK', '0', '0', '0', '0', '', '', '2024-05-20 07:45:52', NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_12_160622_production_sheet', 1),
(6, '2023_10_12_220231_plan', 1),
(7, '2023_10_16_112407_machine_state', 1),
(8, '2023_10_18_020307_kbli_code', 1),
(9, '2023_10_19_134557_work_unit', 1),
(10, '2023_10_19_154502_department', 1),
(11, '2023_10_21_222619_so_target', 1),
(12, '2023_10_27_145258_company_info', 1),
(13, '2023_10_30_163722_machines', 1),
(14, '2023_11_02_001821_create_quotation_table', 1),
(15, '2023_11_18_043900_create_quotationadd_table', 1),
(16, '2023_11_23_223615_create_salesorder_table', 1),
(17, '2023_11_23_224321_create_soadd_table', 1),
(18, '2023_11_24_154752_tax_type', 1),
(19, '2023_11_24_155749_order_unit', 1),
(20, '2023_11_24_155808_unit', 1),
(21, '2023_11_24_161446_customer', 1),
(22, '2023_11_24_170858_product_type', 1),
(23, '2023_11_24_174303_shipping', 1),
(25, '2024_01_08_090509_itemadd', 1),
(26, '2024_01_08_092220_item', 1),
(27, '2024_01_22_115501_planadd', 1),
(28, '2024_01_24_143900_material', 1),
(29, '2023_12_04_080652_order', 2),
(30, '2024_02_02_113737_processing', 3),
(31, '2024_02_02_114158_processingadd', 3),
(32, '2024_05_18_042910_rekap_order', 4),
(33, '2024_05_20_092814_standart_partadd', 5),
(34, '2024_05_20_095952_create_standart_partadd_table', 6),
(35, '2024_05_20_110820_create_inspection_sheet_table', 7),
(36, '2024_05_20_131535_create_material_sheet_table', 8),
(37, '2024_05_20_142107_create_standartpart_sheet_table', 9),
(38, '2024_05_22_202610_create_capacity_table', 10),
(39, '2024_05_22_212425_create_finish_good_table', 11),
(40, '2024_05_22_215353_create_delivered_table', 12),
(41, '2024_06_18_082710_create_standartpart_a_p_i_s_table', 13),
(42, '2024_06_18_083559_update_standartpart', 14),
(43, '2024_07_02_221722_create_timers_table', 15),
(44, '2024_07_02_222450_create_usedtime_table', 16),
(45, '2024_07_05_022143_create_used_times_table', 17),
(46, '2024_07_24_113352_create_w_i_p_s_table', 18);

-- --------------------------------------------------------

--
-- Struktur dari tabel `newprocessing`
--

CREATE TABLE `newprocessing` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nop` varchar(255) DEFAULT NULL,
  `order_number` varchar(255) DEFAULT NULL,
  `item_number` varchar(255) DEFAULT NULL,
  `machine` varchar(255) DEFAULT NULL,
  `group_name` varchar(255) DEFAULT NULL,
  `operation` varchar(255) DEFAULT NULL,
  `estimated_time` varchar(255) DEFAULT NULL,
  `date_wanted` varchar(255) DEFAULT NULL,
  `barcode_id` varchar(255) DEFAULT NULL,
  `mach_cost` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `processing_id` varchar(255) NOT NULL,
  `duration` int(11) DEFAULT NULL,
  `pending_at` timestamp NULL DEFAULT NULL,
  `started_at` timestamp NULL DEFAULT NULL,
  `finished_at` timestamp NULL DEFAULT NULL,
  `status` enum('queue','pending','finished','Started') CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT 'queue',
  `user_name` varchar(255) DEFAULT NULL,
  `labor_cost` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `newprocessing`
--

INSERT INTO `newprocessing` (`id`, `nop`, `order_number`, `item_number`, `machine`, `group_name`, `operation`, `estimated_time`, `date_wanted`, `barcode_id`, `mach_cost`, `created_at`, `updated_at`, `processing_id`, `duration`, `pending_at`, `started_at`, `finished_at`, `status`, `user_name`, `labor_cost`) VALUES
(1, '1', '24-1234-M7', '1', 'HANSEAT', NULL, 'Turn to size', '3', '2024-08-12', '24-1234-M7-20240812-0-66B9AA7229FDE', '106880', '2024-08-12 13:23:46', '2024-10-03 13:49:51', '66b9aa7229fd9', 4, NULL, '2024-10-03 13:49:47', '2024-10-03 13:49:51', 'finished', 'ADMIN IT', '10000'),
(2, '1', '24-1234-M7', '1', 'KRISBOW', NULL, 'SAW TO SIZE', '3', '2024-08-12', '24-1234-M7-20240812-0-66B9AB2D1B499', '14530', '2024-08-12 13:26:53', '2024-10-03 13:49:43', '66b9ab2d1b494', 4493972, '2024-08-12 13:30:31', '2024-08-12 13:30:21', '2024-10-03 13:49:43', 'finished', 'ADMIN IT', '17600'),
(3, '3', '24-1234-M7', '2.1', 'CNC MILLING VMC 60E', NULL, 'MILLING', '2', '2024-08-30', '24-1234-M7-20240813-0-66BB1C948187F', '43635', '2024-08-13 15:43:00', '2024-10-03 13:49:58', '66bb1c948187a', 3, NULL, '2024-10-03 13:49:55', '2024-10-03 13:49:58', 'finished', 'ADMIN IT', '30000'),
(7, '1', '24-0245-W2', '3', 'Trumpf TC 1000', NULL, 'Punch to Size', '1', '2024-09-04', '24-0245-W2-20240904-0-66D806351CD5D', '122996', '2024-09-04 14:03:17', '2024-09-04 14:14:27', '66d806351cd57', 117, NULL, '2024-09-04 14:12:30', '2024-09-04 14:14:27', 'finished', 'ADMIN IT', '20631'),
(8, '1', '24-0245-W2', '3', 'MIKRON DRO 2', NULL, 'Mill to size', '2', '2024-09-04', '24-0245-W2-20240904-1-66D806351D950', '33213.00', '2024-09-04 14:03:17', '2024-09-04 14:13:10', '66d806351d949', 0, NULL, '2024-09-04 14:13:10', NULL, 'Started', 'ADMIN IT', '9000.00'),
(9, '1', '24-0245-W2', '3', 'CMZ 1', NULL, 'Turn to size', '2', '2024-09-04', '24-0245-W2-20240904-2-66D806351DFBD', '13410.00', '2024-09-04 14:03:17', '2024-09-04 14:13:23', '66d806351dfb7', 0, NULL, '2024-09-04 14:13:23', NULL, 'Started', 'ADMIN IT', '9000.00'),
(10, '2', '24-1408-W2', '1', 'KOBEWEL', NULL, 'Weld as per drawing', '0.5', '2024-09-12', '24-1408-W2-20240912-0-66E20F7135169', '272509', '2024-09-12 04:45:21', '2024-09-12 04:54:38', '66e20f7135163', 4, NULL, '2024-09-12 04:54:34', '2024-09-12 04:54:38', 'finished', 'ADMIN IT', '22168'),
(11, '1', '24-1408-W2', '1', 'HANSEAT', NULL, 'Turn to size', '1', '2024-09-12', '24-1408-W2-20240912-1-66E20F71358E4', '106880.00', '2024-09-12 04:45:21', '2024-09-12 04:54:49', '66e20f71358e0', 4, NULL, '2024-09-12 04:54:45', '2024-09-12 04:54:49', 'finished', 'ADMIN IT', '10000.00'),
(12, '1', '24-1234-M1', '1', 'PUNCH WF', NULL, 'PUNCHING', '0.5', '2024-09-12', '24-1234-M1-20240912-0-66E289D38B2DB', '35962', '2024-09-12 13:27:31', '2024-10-16 10:07:52', '66e289d38b2d3', 1747711, '2024-10-16 10:07:52', '2024-10-16 10:06:17', NULL, 'pending', 'ADMIN IT', '30000'),
(13, '1', '24-1234-M1', '1', 'CNC MILLING VMC 60E', NULL, 'MILLING', '0.1', '2024-09-12', '24-1234-M1-20240912-1-66E289D38BCE3', '43635.00', '2024-09-12 13:27:31', '2024-09-12 13:27:31', '66e289d38bcdb', NULL, NULL, NULL, NULL, 'queue', NULL, '30000.00'),
(14, '1', '24-1234-M1', '1', 'PUNCH WF', NULL, 'PUNCHING', '0.4', '2024-10-18', '24-1234-M1-20241011-0-670938148CDEA', '35962', '2024-10-11 21:37:08', '2024-10-11 21:37:08', '670938148cde5', NULL, NULL, NULL, NULL, 'queue', NULL, '30000'),
(15, '1', '24-1234-M1', '1', 'Punch A', NULL, 'A', '0.5', '2024-10-18', '24-1234-M1-20241011-1-670938148D754', '2354.00', '2024-10-11 21:37:08', '2024-10-11 21:37:08', '670938148d74c', NULL, NULL, NULL, NULL, 'queue', NULL, '3000.00'),
(16, '1', 'STWF-1024', '1.1', 'Kobewel', NULL, 'Weld as per drawing', '1', '2024-10-14', 'STWF-1024-20241014-0-670CC669E7E28', '272509', '2024-10-14 14:21:13', '2024-10-14 14:21:13', '670cc669e7e21', NULL, NULL, NULL, NULL, 'queue', NULL, '22168'),
(17, '1', '24-0001-W1', '1', 'Trumpf TC 1000', NULL, 'Punch to Size', '0.1', '2024-10-15', '24-0001-W1-20241014-0-670CC67F7E633', '122996', '2024-10-14 14:21:35', '2024-10-14 14:55:11', '670cc67f7e62d', 149, '2024-10-14 14:52:58', '2024-10-14 14:53:33', '2024-10-14 14:55:11', 'finished', 'Eni W', '20631'),
(18, '1', '24-0001-W1', '1', 'KOBEWEL', NULL, 'Weld as per drawing', '0.5', '2024-10-16', '24-0001-W1-20241014-1-670CC67F7EDDE', '272509.00', '2024-10-14 14:21:35', '2024-10-14 14:56:19', '670cc67f7edd8', 50, NULL, '2024-10-14 14:55:29', '2024-10-14 14:56:19', 'finished', 'Eni W', '22168.00'),
(19, '1', '24-0002-W1', '1', 'Trumpf TC 1000', NULL, 'Punch to Size', '0.1', '2024-10-15', '24-0001-W1-20241014-0-670CC67F7E633-2', '122996', '2024-10-14 15:07:24', '2024-10-14 15:07:24', '670cc67f7e62d', 149, '2024-10-14 14:52:58', '2024-10-14 14:53:33', '2024-10-14 14:55:11', 'finished', 'Eni W', '20631'),
(20, '1', '24-0002-W1', '1', 'KOBEWEL', NULL, 'Weld as per drawing', '0.5', '2024-10-16', '24-0001-W1-20241014-1-670CC67F7EDDE-2', '272509.00', '2024-10-14 15:07:24', '2024-10-14 15:07:24', '670cc67f7edd8', 50, NULL, '2024-10-14 14:55:29', '2024-10-14 14:56:19', 'finished', 'Eni W', '22168.00'),
(21, '1', '24-23001-W1', '1', 'Trumpf TC 1000', NULL, 'Punch to Size', '0.1', '2024-10-15', '24-23001-W1-20241014-0-670CE8A528B31', '122996', '2024-10-14 16:47:17', '2024-10-14 16:51:46', '670ce8a528b2a', 120, NULL, '2024-10-14 16:49:46', '2024-10-14 16:51:46', 'finished', 'ADMIN IT', '20631'),
(22, '2', '24-23001-W1', '1', 'KOBEWEL', NULL, 'Weld as per drawing', '0.1', '2024-10-22', '24-23001-W1-20241014-1-670CE8A52914D', '272509.00', '2024-10-14 16:47:17', '2024-10-14 16:52:04', '670ce8a529148', 79, NULL, '2024-10-14 16:50:45', '2024-10-14 16:52:04', 'finished', 'ADMIN IT', '22168.00'),
(23, '3', '24-23001-W1', '1', 'PUSH', NULL, 'PUSH', '0.1', '2024-10-16', '24-23001-W1-20241014-0-670CEBC0678C0', '122047', '2024-10-14 17:00:32', '2024-10-14 17:01:05', '670cebc0678b9', 12, NULL, '2024-10-14 17:00:53', '2024-10-14 17:01:05', 'finished', 'ADMIN IT', '30000'),
(24, '1', '24-24001-W1', '1', 'Trumpf TC 1000', NULL, 'Punch to Size', '0.1', '2024-10-15', '24-23001-W1-20241014-0-670CE8A528B31-2', '122996', '2024-10-14 17:04:15', '2024-10-14 17:04:15', '670ce8a528b2a', 120, NULL, '2024-10-14 16:49:46', '2024-10-14 16:51:46', 'finished', 'ADMIN IT', '20631'),
(25, '2', '24-24001-W1', '1', 'KOBEWEL', NULL, 'Weld as per drawing', '0.1', '2024-10-22', '24-23001-W1-20241014-1-670CE8A52914D-2', '272509.00', '2024-10-14 17:04:15', '2024-10-14 17:04:15', '670ce8a529148', 79, NULL, '2024-10-14 16:50:45', '2024-10-14 16:52:04', 'finished', 'ADMIN IT', '22168.00'),
(26, '3', '24-24001-W1', '1', 'PUSH', NULL, 'PUSH', '0.1', '2024-10-16', '24-23001-W1-20241014-0-670CEBC0678C0-2', '122047', '2024-10-14 17:04:15', '2024-10-14 17:04:15', '670cebc0678b9', 12, NULL, '2024-10-14 17:00:53', '2024-10-14 17:01:05', 'finished', 'ADMIN IT', '30000'),
(27, '1', '24-25001-W1', '1', 'Trumpf TC 1000', NULL, 'Punch to Size', '0.1', '2024-10-15', '24-23001-W1-20241014-0-670CE8A528B31-3', '122996', '2024-10-15 01:36:09', '2024-10-15 01:36:09', '670ce8a528b2a', 120, NULL, '2024-10-14 16:49:46', '2024-10-14 16:51:46', 'finished', 'ADMIN IT', '20631'),
(28, '2', '24-25001-W1', '1', 'KOBEWEL', NULL, 'Weld as per drawing', '0.1', '2024-10-22', '24-23001-W1-20241014-1-670CE8A52914D-3', '272509.00', '2024-10-15 01:36:09', '2024-10-15 01:36:09', '670ce8a529148', 79, NULL, '2024-10-14 16:50:45', '2024-10-14 16:52:04', 'finished', 'ADMIN IT', '22168.00'),
(29, '3', '24-25001-W1', '1', 'PUSH', NULL, 'PUSH', '0.1', '2024-10-16', '24-23001-W1-20241014-0-670CEBC0678C0-3', '122047', '2024-10-15 01:36:09', '2024-10-15 01:36:09', '670cebc0678b9', 12, NULL, '2024-10-14 17:00:53', '2024-10-14 17:01:05', 'finished', 'ADMIN IT', '30000'),
(30, '1', '24-23002-W1', '1', 'Trumpf TC 1000', NULL, 'Punch to Size', '0.1', '2024-10-15', '24-23001-W1-20241014-0-670CE8A528B31-4', '122996', '2024-10-16 08:07:33', '2024-10-16 08:07:33', '670ce8a528b2a', 120, NULL, '2024-10-14 16:49:46', '2024-10-14 16:51:46', 'finished', 'ADMIN IT', '20631'),
(31, '2', '24-23002-W1', '1', 'KOBEWEL', NULL, 'Weld as per drawing', '0.1', '2024-10-22', '24-23001-W1-20241014-1-670CE8A52914D-4', '272509.00', '2024-10-16 08:07:33', '2024-10-16 08:07:33', '670ce8a529148', 79, NULL, '2024-10-14 16:50:45', '2024-10-14 16:52:04', 'finished', 'ADMIN IT', '22168.00'),
(32, '3', '24-23002-W1', '1', 'PUSH', NULL, 'PUSH', '0.1', '2024-10-16', '24-23001-W1-20241014-0-670CEBC0678C0-4', '122047', '2024-10-16 08:07:33', '2024-10-16 08:07:33', '670cebc0678b9', 12, NULL, '2024-10-14 17:00:53', '2024-10-14 17:01:05', 'finished', 'ADMIN IT', '30000'),
(33, '1', '24-23003-W1', '1', 'Trumpf TC 1000', NULL, 'Punch to Size', '0.1', '2024-10-15', '24-23001-W1-20241014-0-670CE8A528B31-5', '122996', '2024-10-16 08:10:33', '2024-10-16 08:10:33', '670ce8a528b2a', 120, NULL, '2024-10-14 16:49:46', '2024-10-14 16:51:46', 'finished', 'ADMIN IT', '20631'),
(34, '2', '24-23003-W1', '1', 'KOBEWEL', NULL, 'Weld as per drawing', '0.1', '2024-10-22', '24-23001-W1-20241014-1-670CE8A52914D-5', '272509.00', '2024-10-16 08:10:33', '2024-10-16 08:10:33', '670ce8a529148', 79, NULL, '2024-10-14 16:50:45', '2024-10-14 16:52:04', 'finished', 'ADMIN IT', '22168.00'),
(35, '3', '24-23003-W1', '1', 'PUSH', NULL, 'PUSH', '0.1', '2024-10-16', '24-23001-W1-20241014-0-670CEBC0678C0-5', '122047', '2024-10-16 08:10:33', '2024-10-16 08:10:33', '670cebc0678b9', 12, NULL, '2024-10-14 17:00:53', '2024-10-14 17:01:05', 'finished', 'ADMIN IT', '30000'),
(36, '1', '24-23004-W1', '1', 'ASSY MDC', NULL, 'Mill to size', '0.5', '2024-10-17', '24-23004-W1-20241016-0-670F204A0E468', '45590', '2024-10-16 09:09:14', '2024-10-16 10:10:14', '670f204a0e460', 0, NULL, '2024-10-16 10:10:14', NULL, 'Started', 'ADMIN IT', '30000'),
(37, '23', '24-0005-W1', '1.1', 'Trumpf TC 1000', NULL, 'Punch to Size', '8', '2024-10-26', '24-0005-W1-20241025-0-671AFE0FC98F4', '122996', '2024-10-25 09:10:23', '2024-10-25 09:14:07', '671afe0fc986c', 98, NULL, '2024-10-25 09:12:29', '2024-10-25 09:14:07', 'finished', 'ADMIN IT', '20631'),
(38, '24', '24-0005-W1', '1.1', 'Kobewel', NULL, 'Weld as per drawing', '8', '2024-10-26', '24-0005-W1-20241025-1-671AFE0FCA1ED', '272509.00', '2024-10-25 09:10:23', '2024-10-25 09:14:12', '671afe0fca1e8', 97, NULL, '2024-10-25 09:12:35', '2024-10-25 09:14:12', 'finished', 'ADMIN IT', '22168.00'),
(39, '1', '24-2306-W1', '1.1', 'Trumpf TC 1000', NULL, 'Punch to Size', '0.5', '2024-10-29', '24-2306-W1-20241028-0-671F13FFED0E0', '122996', '2024-10-28 11:33:03', '2024-10-28 11:51:05', '671f13ffed0d9', 260, NULL, '2024-10-28 11:46:45', '2024-10-28 11:51:05', 'finished', 'ADMIN IT', '20631'),
(40, '1', '24-2306-W1', '1.1', 'PUNCH WF', NULL, 'PUNCHING', '0.5', '2024-10-29', '24-2306-W1-20241028-1-671F13FFEDDD9', '35962.00', '2024-10-28 11:33:03', '2024-10-28 11:51:12', '671f13ffeddcd', 263, NULL, '2024-10-28 11:46:49', '2024-10-28 11:51:12', 'finished', 'ADMIN IT', '30000.00'),
(41, '1', '24-2306-W1', '1.2', 'Subcon Laser', NULL, 'Laser', '0.1', '2024-10-28', '24-2306-W1-20241028-0-671F32FA1C076', '0', '2024-10-28 13:45:14', '2024-10-28 13:45:14', '671f32fa1c06d', NULL, NULL, NULL, NULL, 'queue', NULL, '0'),
(42, '1', '24-2306-W1', '1', 'ASSY MDC', NULL, 'Mill to size', '1', '2024-10-29', '24-2306-W1-20241028-0-671F33557BD83', '45590', '2024-10-28 13:46:45', '2024-10-28 13:46:45', '671f33557bd7d', NULL, NULL, NULL, NULL, 'queue', NULL, '30000'),
(43, '1', '24-2309-W1', '1.1', 'KOBEWEL', NULL, 'Weld as per drawing', '3', '2024-11-18', '24-2309-W1-20241111-0-6731B75F8DAE3', '272509', '2024-11-11 14:50:55', '2024-11-11 15:20:17', '6731b75f8dada', 166, NULL, '2024-11-11 15:17:31', '2024-11-11 15:20:17', 'finished', 'ADMIN IT', '22168'),
(44, '2', '24-2309-W1', '1.1', 'Trumpf TC 1000', NULL, 'Punch to Size', '2', '2024-11-18', '24-2309-W1-20241111-1-6731B75F8E808', '122996.00', '2024-11-11 14:50:55', '2024-11-11 15:21:12', '6731b75f8e7ff', 171, '2024-11-11 15:20:21', '2024-11-11 15:21:07', '2024-11-11 15:21:12', 'finished', 'ADMIN IT', '20631.00'),
(45, '3', '24-2309-W1', '1.1', 'MIKRON DRO 2', NULL, 'Mill to size', '2', '2024-11-18', '24-2309-W1-20241111-2-6731B75F8ED06', '33213.00', '2024-11-11 14:50:55', '2024-11-11 15:20:25', '6731b75f8ed01', 167, NULL, '2024-11-11 15:17:38', '2024-11-11 15:20:25', 'finished', 'ADMIN IT', '9000.00'),
(46, '2', '24-0132-W1', '1', 'Trumpf TC 1000', NULL, 'Punch to Size', '1', '2024-11-12', '24-0132-W1-20241112-0-67332CBD21E26', '122996', '2024-11-12 17:23:57', '2024-11-12 17:27:35', '67332cbd21e1f', 118, NULL, '2024-11-12 17:25:37', '2024-11-12 17:27:35', 'finished', 'ADMIN IT', '20631'),
(47, '1', '24-0132-W1', '1', 'Kobewel', NULL, 'Weld as per drawing', '1', '2024-11-12', '24-0132-W1-20241112-1-67332CBD2336A', '272509.00', '2024-11-12 17:23:57', '2024-11-12 17:27:39', '67332cbd23363', 23, NULL, '2024-11-12 17:27:16', '2024-11-12 17:27:39', 'finished', 'ADMIN IT', '22168.00'),
(48, '2', '24-0132-W1', '2.1', 'Trumpf TC 1000', NULL, 'Punch to Size', '2', '2024-11-12', '24-0132-W1-20241112-0-67332DEC4815A', '122996', '2024-11-12 17:29:00', '2024-11-12 17:30:15', '67332dec48153', 6, NULL, '2024-11-12 17:30:09', '2024-11-12 17:30:15', 'finished', 'ADMIN IT', '20631'),
(49, '1', '24-0132-W1', '2.1', 'Kobewel', NULL, 'Weld as per drawing', '1', '2024-11-12', '24-0132-W1-20241112-1-67332DEC48853', '272509.00', '2024-11-12 17:29:00', '2024-11-12 17:30:18', '67332dec4884b', 6, NULL, '2024-11-12 17:30:12', '2024-11-12 17:30:18', 'finished', 'ADMIN IT', '22168.00'),
(50, '1', '24-2309-W2', '1.1', 'PUNCH WF', NULL, 'PUNCHING', '3', '2024-11-21', '24-2309-W2-20241114-0-673549FC8ACE5', '35962', '2024-11-14 07:53:16', '2024-11-14 08:04:35', '673549fc8acdc', 389, NULL, '2024-11-14 07:58:06', '2024-11-14 08:04:35', 'finished', 'ADMIN IT', '30000'),
(51, '2', '24-2309-W2', '1.1', 'KRISBOW', NULL, 'SAW TO SIZE', '2', '2024-11-21', '24-2309-W2-20241114-1-673549FC8BA10', '14530.00', '2024-11-14 07:53:16', '2024-11-14 08:04:38', '673549fc8ba07', 389, NULL, '2024-11-14 07:58:09', '2024-11-14 08:04:38', 'finished', 'ADMIN IT', '17600.00'),
(52, '1', '24-2309-W2', '1.2', 'PUNCH WF', NULL, 'PUNCHING', '1', '2024-11-21', '24-2309-W2-20241114-0-67354A900A239', '35962', '2024-11-14 07:55:44', '2024-11-14 08:05:12', '67354a900a230', 405, NULL, '2024-11-14 07:58:27', '2024-11-14 08:05:12', 'finished', 'ADMIN IT', '30000'),
(53, '2', '24-2309-W2', '1.2', 'CNC MILLING VMC 60E', NULL, 'MILLING', '1', '2024-11-21', '24-2309-W2-20241114-1-67354A900AA11', '43635.00', '2024-11-14 07:55:44', '2024-11-14 08:05:14', '67354a900aa0d', 403, NULL, '2024-11-14 07:58:31', '2024-11-14 08:05:14', 'finished', 'ADMIN IT', '30000.00'),
(54, '1', '24-2309-W2', '2', 'KOBEWEL', NULL, 'Weld as per drawing', '3', '2024-11-21', '24-2309-W2-20241114-0-67354AAD61371', '272509', '2024-11-14 07:56:13', '2024-11-14 08:05:24', '67354aad6136a', 405, NULL, '2024-11-14 07:58:39', '2024-11-14 08:05:24', 'finished', 'ADMIN IT', '22168'),
(55, '1', '24-2309-W2', '3', 'KOBEWEL', NULL, 'Weld as per drawing', '2', '2024-11-21', '24-2309-W2-20241114-0-67354AD187E59', '272509', '2024-11-14 07:56:49', '2024-11-14 08:05:51', '67354ad187e53', 824, '2024-11-14 08:05:33', '2024-11-14 07:58:50', '2024-11-14 08:05:51', 'finished', 'ADMIN IT', '22168'),
(56, '1', '24-2309-W2', '1.1', 'Trumpf TC 1000', NULL, 'Punch to Size', '3', '2024-11-21', '24-2309-W2-20241114-0-6735631548F35', '122996', '2024-11-14 09:40:21', '2024-11-14 09:40:21', '6735631548f2a', NULL, NULL, NULL, NULL, 'queue', NULL, '20631'),
(57, '1', '24-2310-W1', '1.1', 'KOBEWEL', NULL, 'Weld as per drawing', '1', '2024-11-22', '24-2310-W1-20241115-0-673684D9E4450', '272509', '2024-11-15 06:16:41', '2024-11-15 06:38:43', '673684d9e4443', 225, NULL, '2024-11-15 06:34:58', '2024-11-15 06:38:43', 'finished', 'ADMIN IT', '22168'),
(58, '2', '24-2310-W1', '1.1', 'ASSY MDC', NULL, 'Mill to size', '2', '2024-11-22', '24-2310-W1-20241115-0-673684F7EA1E7', '45590', '2024-11-15 06:17:11', '2024-11-15 06:38:47', '673684f7ea1e1', 226, NULL, '2024-11-15 06:35:01', '2024-11-15 06:38:47', 'finished', 'ADMIN IT', '30000'),
(59, '1', '24-2310-W1', '1.2', 'KRISBOW', NULL, 'SAW TO SIZE', '2', '2024-11-22', '24-2310-W1-20241115-0-67368794304AF', '14530', '2024-11-15 06:28:20', '2024-11-15 06:38:56', '67368794304a8', 226, NULL, '2024-11-15 06:35:10', '2024-11-15 06:38:56', 'finished', 'ADMIN IT', '17600'),
(60, '1', '24-2310-W1', '2', 'CMZ 1', NULL, 'Turn to size', '2', '2024-11-22', '24-2310-W1-20241115-0-673687B5EB47B', '13410', '2024-11-15 06:28:53', '2024-11-15 06:39:10', '673687b5eb473', 233, NULL, '2024-11-15 06:35:17', '2024-11-15 06:39:10', 'finished', 'ADMIN IT', '9000'),
(61, '1', '24-2310-W2', '1.1', 'KOBEWEL', NULL, 'Weld as per drawing', '2', '2024-11-22', '24-2310-W2-20241115-0-673687E30A19A', '272509', '2024-11-15 06:29:39', '2024-11-15 06:39:30', '673687e30a192', 236, NULL, '2024-11-15 06:35:34', '2024-11-15 06:39:30', 'finished', 'ADMIN IT', '22168'),
(62, '1', '24-2310-W2', '1.2', 'ACIERA 1', NULL, 'Drill to size', '2', '2024-11-22', '24-2310-W2-20241115-0-6736887E3B561', '12557', '2024-11-15 06:32:14', '2024-11-18 11:34:28', '6736887e3b55a', 310, '2024-11-15 06:39:37', '2024-11-18 11:29:18', '2024-11-18 11:34:28', 'finished', 'ADMIN IT', '12000'),
(63, '1', '24-2310-W1', '2', 'PUSH', NULL, 'PUSH', '2', '2024-11-22', '24-2310-W1-20241115-0-6736889A991C3', '122047', '2024-11-15 06:32:42', '2024-11-15 06:39:14', '6736889a991be', 234, NULL, '2024-11-15 06:35:20', '2024-11-15 06:39:14', 'finished', 'ADMIN IT', '30000'),
(64, '1', '24-2310-W2', '2', 'Trumpf TC 1000', NULL, 'Punch to Size', '2', '2024-11-22', '24-2310-W2-20241115-0-673688F8B18AD', '122996', '2024-11-15 06:34:16', '2024-11-15 06:39:44', '673688f8b18a6', 237, NULL, '2024-11-15 06:35:47', '2024-11-15 06:39:44', 'finished', 'ADMIN IT', '20631'),
(65, '1', '24-2310-W2', '3', 'ACIERA 1', NULL, 'Drill to size', '2', '2024-11-22', '24-2310-W2-20241115-0-6736890E98DDA', '12557', '2024-11-15 06:34:38', '2024-11-15 06:39:51', '6736890e98dd5', 238, NULL, '2024-11-15 06:35:53', '2024-11-15 06:39:51', 'finished', 'ADMIN IT', '12000'),
(66, '1', '24-0245-W6', '3', 'Trumpf TC 1000', NULL, 'Punch to Size', '1', '2024-09-04', '24-0245-W6-20240904-0-66D806351CD5D', '122996', '2024-11-19 20:13:16', '2024-11-19 20:13:16', '66d806351cd56', 117, NULL, '2024-09-04 14:12:30', '2024-09-04 14:14:27', 'finished', 'ADMIN IT', '20631'),
(67, '1', '24-0245-W6', '3', 'MIKRON DRO 2', NULL, 'Mill to size', '2', '2024-09-04', '24-0245-W6-20240904-1-66D806351D950', '33213.00', '2024-11-19 20:13:16', '2024-11-19 20:13:16', '66d806351d955', 0, NULL, '2024-09-04 14:13:10', NULL, 'Started', 'ADMIN IT', '9000.00'),
(68, '1', '24-0245-W6', '3', 'CMZ 1', NULL, 'Turn to size', '2', '2024-09-04', '24-0245-W6-20240904-2-66D806351DFBD', '13410.00', '2024-11-19 20:13:16', '2024-11-19 20:13:16', '66d806351dfb8', 0, NULL, '2024-09-04 14:13:23', NULL, 'Started', 'ADMIN IT', '9000.00'),
(70, '1', '24-1234-M9', '1', 'KRISBOW', NULL, 'SAW TO SIZE', '3', '2024-08-12', '24-1234-M7-20240812-0-66B9AB2D1B499-2', '14530', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '66b9ab2d1b494', 4493972, '2024-08-12 13:30:31', '2024-08-12 13:30:21', '2024-10-03 13:49:43', 'finished', 'ADMIN IT', '17600'),
(71, '3', '24-1234-M9', '2.1', 'CNC MILLING VMC 60E', NULL, 'MILLING', '2', '2024-08-30', '24-1234-M7-20240813-0-66BB1C948187F-2', '43635', '2024-11-19 20:15:25', '2024-11-19 20:15:25', '66bb1c948187a', 3, NULL, '2024-10-03 13:49:55', '2024-10-03 13:49:58', 'finished', 'ADMIN IT', '30000'),
(73, '1', '24-1234-M10', '1', 'KRISBOW', NULL, 'SAW TO SIZE', '3', '2024-08-12', '24-1234-M7-20240812-0-66B9AB2D1B499-3', '14530', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '66b9ab2d1b494', 4493972, '2024-08-12 13:30:31', '2024-08-12 13:30:21', '2024-10-03 13:49:43', 'finished', 'ADMIN IT', '17600'),
(74, '3', '24-1234-M10', '2.1', 'CNC MILLING VMC 60E', NULL, 'MILLING', '2', '2024-08-30', '24-1234-M7-20240813-0-66BB1C948187F-3', '43635', '2024-11-19 21:08:43', '2024-11-19 21:08:43', '66bb1c948187a', 3, NULL, '2024-10-03 13:49:55', '2024-10-03 13:49:58', 'finished', 'ADMIN IT', '30000'),
(75, '1', '24-2310-W3', '1.1', 'KOBEWEL', NULL, 'Weld as per drawing', '2', '2024-11-22', '24-2310-W2-20241115-0-673687E30A19A-2', '272509', '2024-11-19 21:34:28', '2024-11-19 21:34:28', '673687e30a192', 236, NULL, '2024-11-15 06:35:34', '2024-11-15 06:39:30', 'finished', 'ADMIN IT', '22168'),
(76, '1', '24-2310-W3', '1.2', 'ACIERA 1', NULL, 'Drill to size', '2', '2024-11-22', '24-2310-W2-20241115-0-6736887E3B561-2', '12557', '2024-11-19 21:34:28', '2024-11-19 21:34:28', '6736887e3b55a', 310, '2024-11-15 06:39:37', '2024-11-18 11:29:18', '2024-11-18 11:34:28', 'finished', 'ADMIN IT', '12000'),
(77, '1', '24-2310-W3', '2', 'Trumpf TC 1000', NULL, 'Punch to Size', '2', '2024-11-22', '24-2310-W2-20241115-0-673688F8B18AD-2', '122996', '2024-11-19 21:34:28', '2024-11-19 21:34:28', '673688f8b18a6', 237, NULL, '2024-11-15 06:35:47', '2024-11-15 06:39:44', 'finished', 'ADMIN IT', '20631'),
(78, '1', '24-2310-W3', '3', 'ACIERA 1', NULL, 'Drill to size', '2', '2024-11-22', '24-2310-W2-20241115-0-6736890E98DDA-2', '12557', '2024-11-19 21:34:28', '2024-11-19 21:34:28', '6736890e98dd5', 238, NULL, '2024-11-15 06:35:53', '2024-11-15 06:39:51', 'finished', 'ADMIN IT', '12000'),
(79, '1', '24-2311-W1-1732027813', '1.1', 'KOBEWEL', NULL, 'Weld as per drawing', '1', '2024-11-22', '24-2310-W1-20241115-0-673684D9E4450-2', '272509', '2024-11-19 21:50:13', '2024-11-19 21:50:13', '673684d9e4443', 225, NULL, '2024-11-15 06:34:58', '2024-11-15 06:38:43', 'finished', 'ADMIN IT', '22168'),
(80, '2', '24-2311-W1-1732027813', '1.1', 'ASSY MDC', NULL, 'Mill to size', '2', '2024-11-22', '24-2310-W1-20241115-0-673684F7EA1E7-2', '45590', '2024-11-19 21:50:13', '2024-11-19 21:50:13', '673684f7ea1e1', 226, NULL, '2024-11-15 06:35:01', '2024-11-15 06:38:47', 'finished', 'ADMIN IT', '30000'),
(81, '1', '24-2311-W1-1732027813', '1.2', 'KRISBOW', NULL, 'SAW TO SIZE', '2', '2024-11-22', '24-2310-W1-20241115-0-67368794304AF-2', '14530', '2024-11-19 21:50:13', '2024-11-19 21:50:13', '67368794304a8', 226, NULL, '2024-11-15 06:35:10', '2024-11-15 06:38:56', 'finished', 'ADMIN IT', '17600'),
(82, '1', '24-2311-W1-1732027813', '2', 'CMZ 1', NULL, 'Turn to size', '2', '2024-11-22', '24-2310-W1-20241115-0-673687B5EB47B-2', '13410', '2024-11-19 21:50:13', '2024-11-19 21:50:13', '673687b5eb473', 233, NULL, '2024-11-15 06:35:17', '2024-11-15 06:39:10', 'finished', 'ADMIN IT', '9000'),
(83, '1', '24-2311-W1-1732027813', '2', 'PUSH', NULL, 'PUSH', '2', '2024-11-22', '24-2310-W1-20241115-0-6736889A991C3-2', '122047', '2024-11-19 21:50:13', '2024-11-19 21:50:13', '6736889a991be', 234, NULL, '2024-11-15 06:35:20', '2024-11-15 06:39:14', 'finished', 'ADMIN IT', '30000'),
(84, '1', '24-2311-W1', '1.1', 'KOBEWEL', NULL, 'Weld as per drawing', '1', '2024-11-22', '24-2310-W1-20241115-0-673684D9E4450-3', '272509', '2024-11-19 22:00:12', '2024-11-19 22:00:12', '673684d9e4443', 225, NULL, '2024-11-15 06:34:58', '2024-11-15 06:38:43', 'finished', 'ADMIN IT', '22168'),
(85, '2', '24-2311-W1', '1.1', 'ASSY MDC', NULL, 'Mill to size', '2', '2024-11-22', '24-2310-W1-20241115-0-673684F7EA1E7-3', '45590', '2024-11-19 22:00:12', '2024-11-19 22:00:12', '673684f7ea1e1', 226, NULL, '2024-11-15 06:35:01', '2024-11-15 06:38:47', 'finished', 'ADMIN IT', '30000'),
(86, '1', '24-2311-W1', '1.2', 'KRISBOW', NULL, 'SAW TO SIZE', '2', '2024-11-22', '24-2310-W1-20241115-0-67368794304AF-3', '14530', '2024-11-19 22:00:12', '2024-11-19 22:00:12', '67368794304a8', 226, NULL, '2024-11-15 06:35:10', '2024-11-15 06:38:56', 'finished', 'ADMIN IT', '17600'),
(87, '1', '24-2311-W1', '2', 'CMZ 1', NULL, 'Turn to size', '2', '2024-11-22', '24-2310-W1-20241115-0-673687B5EB47B-3', '13410', '2024-11-19 22:00:12', '2024-11-19 22:00:12', '673687b5eb473', 233, NULL, '2024-11-15 06:35:17', '2024-11-15 06:39:10', 'finished', 'ADMIN IT', '9000'),
(88, '1', '24-2311-W1', '2', 'PUSH', NULL, 'PUSH', '2', '2024-11-22', '24-2310-W1-20241115-0-6736889A991C3-3', '122047', '2024-11-19 22:00:12', '2024-11-19 22:00:12', '6736889a991be', 234, NULL, '2024-11-15 06:35:20', '2024-11-15 06:39:14', 'finished', 'ADMIN IT', '30000'),
(89, '1', '24-2311-W2', '1.1', 'KOBEWEL', NULL, 'Weld as per drawing', '2', '2024-11-22', '24-2310-W2-20241115-0-673687E30A19A-3', '272509', '2024-11-19 22:15:18', '2024-11-19 22:15:18', '673687e30a192', 236, NULL, '2024-11-15 06:35:34', '2024-11-15 06:39:30', 'finished', 'ADMIN IT', '22168'),
(90, '1', '24-2311-W2', '1.2', 'ACIERA 1', NULL, 'Drill to size', '2', '2024-11-22', '24-2310-W2-20241115-0-6736887E3B561-3', '12557', '2024-11-19 22:15:18', '2024-11-19 22:15:18', '6736887e3b55a', 310, '2024-11-15 06:39:37', '2024-11-18 11:29:18', '2024-11-18 11:34:28', 'finished', 'ADMIN IT', '12000'),
(91, '1', '24-2311-W2', '2', 'Trumpf TC 1000', NULL, 'Punch to Size', '2', '2024-11-22', '24-2310-W2-20241115-0-673688F8B18AD-3', '122996', '2024-11-19 22:15:18', '2024-11-19 22:15:18', '673688f8b18a6', 237, NULL, '2024-11-15 06:35:47', '2024-11-15 06:39:44', 'finished', 'ADMIN IT', '20631'),
(92, '1', '24-2311-W2', '3', 'ACIERA 1', NULL, 'Drill to size', '2', '2024-11-22', '24-2310-W2-20241115-0-6736890E98DDA-3', '12557', '2024-11-19 22:15:18', '2024-11-19 22:15:18', '6736890e98dd5', 238, NULL, '2024-11-15 06:35:53', '2024-11-15 06:39:51', 'finished', 'ADMIN IT', '12000'),
(93, '1', '24-2312-W2', '1.1', 'KOBEWEL', NULL, 'Weld as per drawing', '1', '2024-11-22', '24-2310-W1-20241115-0-673684D9E4450-4', '272509', '2024-11-22 08:17:49', '2024-11-22 08:17:49', '673684d9e4443', 225, NULL, '2024-11-15 06:34:58', '2024-11-15 06:38:43', 'finished', 'ADMIN IT', '22168'),
(94, '2', '24-2312-W2', '1.1', 'ASSY MDC', NULL, 'Mill to size', '2', '2024-11-22', '24-2310-W1-20241115-0-673684F7EA1E7-4', '45590', '2024-11-22 08:17:49', '2024-11-22 08:17:49', '673684f7ea1e1', 226, NULL, '2024-11-15 06:35:01', '2024-11-15 06:38:47', 'finished', 'ADMIN IT', '30000'),
(95, '1', '24-2312-W2', '1.2', 'KRISBOW', NULL, 'SAW TO SIZE', '2', '2024-11-22', '24-2310-W1-20241115-0-67368794304AF-4', '14530', '2024-11-22 08:17:49', '2024-11-22 08:17:49', '67368794304a8', 226, NULL, '2024-11-15 06:35:10', '2024-11-15 06:38:56', 'finished', 'ADMIN IT', '17600'),
(96, '1', '24-2312-W2', '2', 'CMZ 1', NULL, 'Turn to size', '2', '2024-11-22', '24-2310-W1-20241115-0-673687B5EB47B-4', '13410', '2024-11-22 08:17:49', '2024-11-22 08:17:49', '673687b5eb473', 233, NULL, '2024-11-15 06:35:17', '2024-11-15 06:39:10', 'finished', 'ADMIN IT', '9000'),
(97, '1', '24-2312-W2', '2', 'PUSH', NULL, 'PUSH', '2', '2024-11-22', '24-2310-W1-20241115-0-6736889A991C3-4', '122047', '2024-11-22 08:17:49', '2024-11-22 08:17:49', '6736889a991be', 234, NULL, '2024-11-15 06:35:20', '2024-11-15 06:39:14', 'finished', 'ADMIN IT', '30000'),
(98, '1', '24-2312-W2', '1.1', 'KOBEWEL', NULL, 'Weld as per drawing', '2', '2024-11-22', '24-2310-W2-20241115-0-673687E30A19A-4', '272509', '2024-11-22 08:18:17', '2024-11-22 08:18:17', '673687e30a192', 236, NULL, '2024-11-15 06:35:34', '2024-11-15 06:39:30', 'finished', 'ADMIN IT', '22168'),
(99, '1', '24-2312-W2', '1.2', 'ACIERA 1', NULL, 'Drill to size', '2', '2024-11-22', '24-2310-W2-20241115-0-6736887E3B561-4', '12557', '2024-11-22 08:18:17', '2024-11-22 08:18:17', '6736887e3b55a', 310, '2024-11-15 06:39:37', '2024-11-18 11:29:18', '2024-11-18 11:34:28', 'finished', 'ADMIN IT', '12000'),
(100, '1', '24-2312-W2', '2', 'Trumpf TC 1000', NULL, 'Punch to Size', '2', '2024-11-22', '24-2310-W2-20241115-0-673688F8B18AD-4', '122996', '2024-11-22 08:18:17', '2024-11-22 08:18:17', '673688f8b18a6', 237, NULL, '2024-11-15 06:35:47', '2024-11-15 06:39:44', 'finished', 'ADMIN IT', '20631'),
(101, '1', '24-2312-W2', '3', 'ACIERA 1', NULL, 'Drill to size', '2', '2024-11-22', '24-2310-W2-20241115-0-6736890E98DDA-4', '12557', '2024-11-22 08:18:17', '2024-11-22 08:18:17', '6736890e98dd5', 238, NULL, '2024-11-15 06:35:53', '2024-11-15 06:39:51', 'finished', 'ADMIN IT', '12000'),
(102, '1', '24-2312-W2', '1.1', 'KOBEWEL', NULL, 'Weld as per drawing', '1', '2024-11-22', '24-2310-W1-20241115-0-673684D9E4450-5', '272509', '2024-11-22 10:26:17', '2024-11-22 10:26:17', '673684d9e4443', 225, NULL, '2024-11-15 06:34:58', '2024-11-15 06:38:43', 'finished', 'ADMIN IT', '22168'),
(103, '2', '24-2312-W2', '1.1', 'ASSY MDC', NULL, 'Mill to size', '2', '2024-11-22', '24-2310-W1-20241115-0-673684F7EA1E7-5', '45590', '2024-11-22 10:26:17', '2024-11-22 10:26:17', '673684f7ea1e1', 226, NULL, '2024-11-15 06:35:01', '2024-11-15 06:38:47', 'finished', 'ADMIN IT', '30000'),
(104, '1', '24-2312-W2', '1.2', 'KRISBOW', NULL, 'SAW TO SIZE', '2', '2024-11-22', '24-2310-W1-20241115-0-67368794304AF-5', '14530', '2024-11-22 10:26:17', '2024-11-22 10:26:17', '67368794304a8', 226, NULL, '2024-11-15 06:35:10', '2024-11-15 06:38:56', 'finished', 'ADMIN IT', '17600'),
(105, '1', '24-2312-W2', '2', 'CMZ 1', NULL, 'Turn to size', '2', '2024-11-22', '24-2310-W1-20241115-0-673687B5EB47B-5', '13410', '2024-11-22 10:26:17', '2024-11-22 10:26:17', '673687b5eb473', 233, NULL, '2024-11-15 06:35:17', '2024-11-15 06:39:10', 'finished', 'ADMIN IT', '9000'),
(106, '1', '24-2312-W2', '2', 'PUSH', NULL, 'PUSH', '2', '2024-11-22', '24-2310-W1-20241115-0-6736889A991C3-5', '122047', '2024-11-22 10:26:17', '2024-11-22 10:26:17', '6736889a991be', 234, NULL, '2024-11-15 06:35:20', '2024-11-15 06:39:14', 'finished', 'ADMIN IT', '30000'),
(107, '1', '24-2312-W2', '1.1', 'KOBEWEL', NULL, 'Weld as per drawing', '2', '2024-11-22', '24-2310-W2-20241115-0-673687E30A19A-5', '272509', '2024-11-22 10:26:17', '2024-11-22 10:26:17', '673687e30a192', 236, NULL, '2024-11-15 06:35:34', '2024-11-15 06:39:30', 'finished', 'ADMIN IT', '22168'),
(108, '1', '24-2312-W2', '1.2', 'ACIERA 1', NULL, 'Drill to size', '2', '2024-11-22', '24-2310-W2-20241115-0-6736887E3B561-5', '12557', '2024-11-22 10:26:17', '2024-11-22 10:26:17', '6736887e3b55a', 310, '2024-11-15 06:39:37', '2024-11-18 11:29:18', '2024-11-18 11:34:28', 'finished', 'ADMIN IT', '12000'),
(109, '1', '24-2312-W2', '2', 'Trumpf TC 1000', NULL, 'Punch to Size', '2', '2024-11-22', '24-2310-W2-20241115-0-673688F8B18AD-5', '122996', '2024-11-22 10:26:17', '2024-11-22 10:26:17', '673688f8b18a6', 237, NULL, '2024-11-15 06:35:47', '2024-11-15 06:39:44', 'finished', 'ADMIN IT', '20631'),
(110, '1', '24-2312-W2', '3', 'ACIERA 1', NULL, 'Drill to size', '2', '2024-11-22', '24-2310-W2-20241115-0-6736890E98DDA-5', '12557', '2024-11-22 10:26:17', '2024-11-22 10:26:17', '6736890e98dd5', 238, NULL, '2024-11-15 06:35:53', '2024-11-15 06:39:51', 'finished', 'ADMIN IT', '12000'),
(111, '1', '24-2312-W1', '1.1', 'KOBEWEL', NULL, 'Weld as per drawing', '1', '2024-11-22', '24-2310-W1-20241115-0-673684D9E4450-6', '272509', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '673684d9e4443', 225, NULL, '2024-11-15 06:34:58', '2024-11-15 06:38:43', 'finished', 'ADMIN IT', '22168'),
(112, '2', '24-2312-W1', '1.1', 'ASSY MDC', NULL, 'Mill to size', '2', '2024-11-22', '24-2310-W1-20241115-0-673684F7EA1E7-6', '45590', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '673684f7ea1e1', 226, NULL, '2024-11-15 06:35:01', '2024-11-15 06:38:47', 'finished', 'ADMIN IT', '30000'),
(113, '1', '24-2312-W1', '1.2', 'KRISBOW', NULL, 'SAW TO SIZE', '2', '2024-11-22', '24-2310-W1-20241115-0-67368794304AF-6', '14530', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '67368794304a8', 226, NULL, '2024-11-15 06:35:10', '2024-11-15 06:38:56', 'finished', 'ADMIN IT', '17600'),
(114, '1', '24-2312-W1', '2', 'CMZ 1', NULL, 'Turn to size', '2', '2024-11-22', '24-2310-W1-20241115-0-673687B5EB47B-6', '13410', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '673687b5eb473', 233, NULL, '2024-11-15 06:35:17', '2024-11-15 06:39:10', 'finished', 'ADMIN IT', '9000'),
(115, '1', '24-2312-W1', '2', 'PUSH', NULL, 'PUSH', '2', '2024-11-22', '24-2310-W1-20241115-0-6736889A991C3-6', '122047', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '6736889a991be', 234, NULL, '2024-11-15 06:35:20', '2024-11-15 06:39:14', 'finished', 'ADMIN IT', '30000'),
(116, '1', '24-2312-W1', '1.1', 'KOBEWEL', NULL, 'Weld as per drawing', '2', '2024-11-22', '24-2310-W2-20241115-0-673687E30A19A-6', '272509', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '673687e30a192', 236, NULL, '2024-11-15 06:35:34', '2024-11-15 06:39:30', 'finished', 'ADMIN IT', '22168'),
(117, '1', '24-2312-W1', '1.2', 'ACIERA 1', NULL, 'Drill to size', '2', '2024-11-22', '24-2310-W2-20241115-0-6736887E3B561-6', '12557', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '6736887e3b55a', 310, '2024-11-15 06:39:37', '2024-11-18 11:29:18', '2024-11-18 11:34:28', 'finished', 'ADMIN IT', '12000'),
(118, '1', '24-2312-W1', '2', 'Trumpf TC 1000', NULL, 'Punch to Size', '2', '2024-11-22', '24-2310-W2-20241115-0-673688F8B18AD-6', '122996', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '673688f8b18a6', 237, NULL, '2024-11-15 06:35:47', '2024-11-15 06:39:44', 'finished', 'ADMIN IT', '20631'),
(119, '1', '24-2312-W1', '3', 'ACIERA 1', NULL, 'Drill to size', '2', '2024-11-22', '24-2310-W2-20241115-0-6736890E98DDA-6', '12557', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '6736890e98dd5', 238, NULL, '2024-11-15 06:35:53', '2024-11-15 06:39:51', 'finished', 'ADMIN IT', '12000'),
(120, '1', '24-2312-W1', '1.1', 'KOBEWEL', NULL, 'Weld as per drawing', '1', '2024-11-22', '24-2310-W1-20241115-0-673684D9E4450-7', '272509', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '673684d9e4443', 225, NULL, '2024-11-15 06:34:58', '2024-11-15 06:38:43', 'finished', 'ADMIN IT', '22168'),
(121, '2', '24-2312-W1', '1.1', 'ASSY MDC', NULL, 'Mill to size', '2', '2024-11-22', '24-2310-W1-20241115-0-673684F7EA1E7-7', '45590', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '673684f7ea1e1', 226, NULL, '2024-11-15 06:35:01', '2024-11-15 06:38:47', 'finished', 'ADMIN IT', '30000'),
(122, '1', '24-2312-W1', '1.2', 'KRISBOW', NULL, 'SAW TO SIZE', '2', '2024-11-22', '24-2310-W1-20241115-0-67368794304AF-7', '14530', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '67368794304a8', 226, NULL, '2024-11-15 06:35:10', '2024-11-15 06:38:56', 'finished', 'ADMIN IT', '17600'),
(123, '1', '24-2312-W1', '2', 'CMZ 1', NULL, 'Turn to size', '2', '2024-11-22', '24-2310-W1-20241115-0-673687B5EB47B-7', '13410', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '673687b5eb473', 233, NULL, '2024-11-15 06:35:17', '2024-11-15 06:39:10', 'finished', 'ADMIN IT', '9000'),
(124, '1', '24-2312-W1', '2', 'PUSH', NULL, 'PUSH', '2', '2024-11-22', '24-2310-W1-20241115-0-6736889A991C3-7', '122047', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '6736889a991be', 234, NULL, '2024-11-15 06:35:20', '2024-11-15 06:39:14', 'finished', 'ADMIN IT', '30000'),
(125, '1', '24-2312-W1', '1.1', 'KOBEWEL', NULL, 'Weld as per drawing', '2', '2024-11-22', '24-2310-W2-20241115-0-673687E30A19A-7', '272509', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '673687e30a192', 236, NULL, '2024-11-15 06:35:34', '2024-11-15 06:39:30', 'finished', 'ADMIN IT', '22168'),
(126, '1', '24-2312-W1', '1.2', 'ACIERA 1', NULL, 'Drill to size', '2', '2024-11-22', '24-2310-W2-20241115-0-6736887E3B561-7', '12557', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '6736887e3b55a', 310, '2024-11-15 06:39:37', '2024-11-18 11:29:18', '2024-11-18 11:34:28', 'finished', 'ADMIN IT', '12000'),
(127, '1', '24-2312-W1', '2', 'Trumpf TC 1000', NULL, 'Punch to Size', '2', '2024-11-22', '24-2310-W2-20241115-0-673688F8B18AD-7', '122996', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '673688f8b18a6', 237, NULL, '2024-11-15 06:35:47', '2024-11-15 06:39:44', 'finished', 'ADMIN IT', '20631'),
(128, '1', '24-2312-W1', '3', 'ACIERA 1', NULL, 'Drill to size', '2', '2024-11-22', '24-2310-W2-20241115-0-6736890E98DDA-7', '12557', '2024-11-22 10:34:14', '2024-11-22 10:34:14', '6736890e98dd5', 238, NULL, '2024-11-15 06:35:53', '2024-11-15 06:39:51', 'finished', 'ADMIN IT', '12000'),
(129, '1', '24-2310-W1', '1.1', 'KOBEWEL', NULL, 'Weld as per drawing', '2', '2024-11-22', '24-2310-W2-20241115-0-673687E30A19A-8', '272509', '2024-11-22 11:00:33', '2024-11-22 11:00:33', '673687e30a192', 236, NULL, '2024-11-15 06:35:34', '2024-11-15 06:39:30', 'finished', 'ADMIN IT', '22168'),
(130, '1', '24-2310-W1', '1.2', 'ACIERA 1', NULL, 'Drill to size', '2', '2024-11-22', '24-2310-W2-20241115-0-6736887E3B561-8', '12557', '2024-11-22 11:00:33', '2024-11-22 11:00:33', '6736887e3b55a', 310, '2024-11-15 06:39:37', '2024-11-18 11:29:18', '2024-11-18 11:34:28', 'finished', 'ADMIN IT', '12000'),
(131, '1', '24-2310-W1', '2', 'Trumpf TC 1000', NULL, 'Punch to Size', '2', '2024-11-22', '24-2310-W2-20241115-0-673688F8B18AD-8', '122996', '2024-11-22 11:00:33', '2024-11-22 11:00:33', '673688f8b18a6', 237, NULL, '2024-11-15 06:35:47', '2024-11-15 06:39:44', 'finished', 'ADMIN IT', '20631'),
(132, '1', '24-2310-W1', '3', 'ACIERA 1', NULL, 'Drill to size', '2', '2024-11-22', '24-2310-W2-20241115-0-6736890E98DDA-8', '12557', '2024-11-22 11:00:33', '2024-11-22 11:00:33', '6736890e98dd5', 238, NULL, '2024-11-15 06:35:53', '2024-11-15 06:39:51', 'finished', 'ADMIN IT', '12000'),
(133, '2', '24-2311-M1', '1', 'Trumpf TC 1000', NULL, 'Punch to Size', '1', '2024-11-23', '24-2311-M1-20241123-0-6740CF49D4FC8', '122996', '2024-11-23 01:36:57', '2024-11-23 01:37:33', '6740cf49d4fc0', 5, NULL, '2024-11-23 01:37:28', '2024-11-23 01:37:33', 'finished', 'ADMIN IT', '20631'),
(134, '1', '24-2311-M1', '1', 'Trumpf TC 1000', NULL, 'Punch to Size', '2', '2024-11-23', '24-2311-M1-20241123-1-6740CF49D6615', '122996.00', '2024-11-23 01:36:57', '2024-11-23 01:37:38', '6740cf49d660f', 7, NULL, '2024-11-23 01:37:31', '2024-11-23 01:37:38', 'finished', 'ADMIN IT', '20631.00'),
(135, '1', '24-2311-M1', '1.1', 'Trumpf TC 1000', NULL, 'Punch to Size', '0.2', '2024-11-23', '24-2311-M1-20241123-0-6740CF95B7FC9', '122996', '2024-11-23 01:38:13', '2024-11-23 01:38:25', '6740cf95b7fc4', 3, NULL, '2024-11-23 01:38:22', '2024-11-23 01:38:25', 'finished', 'ADMIN IT', '20631'),
(142, '2', '24-2311-M2', '1', 'Trumpf TC 1000', NULL, 'Punch to Size', '1', NULL, '24-2311-M2-20241123-6740d7a39f0f1', '0', '2024-11-23 02:12:35', '2024-11-23 02:13:51', '6740cf49d4fc0', 46, '2024-11-23 02:13:23', '2024-11-23 02:13:14', '2024-11-23 02:13:51', 'finished', 'ADMIN IT', '0'),
(143, '1', '24-2311-M2', '1', 'Trumpf TC 1000', NULL, 'Punch to Size', '2', NULL, '24-2311-M2-20241123-6740d7a39f4f1', '0', '2024-11-23 02:12:35', '2024-11-23 02:13:56', '6740cf49d660f', 47, '2024-11-23 02:13:25', '2024-11-23 02:13:17', '2024-11-23 02:13:56', 'finished', 'ADMIN IT', '0'),
(144, '1', '24-2311-M2', '1.1', 'Trumpf TC 1000', NULL, 'Punch to Size', '0.2', NULL, '24-2311-M2-20241123-6740d7a39f8fd', '0', '2024-11-23 02:12:35', '2024-11-23 02:14:20', '6740cf95b7fc4', 69, '2024-11-23 02:13:27', '2024-11-23 02:13:19', '2024-11-23 02:14:20', 'finished', 'ADMIN IT', '0'),
(145, '1', '24-2313-W1', '1.1', 'KOBEWEL', NULL, 'Weld as per drawing', '1', NULL, '24-2313-W1-20241125-674434e27ddc4', '0', '2024-11-25 15:27:14', '2024-11-25 15:27:14', '673684d9e4443', 0, NULL, NULL, NULL, 'queue', 'ADMIN IT', '0'),
(146, '2', '24-2313-W1', '1.1', 'ASSY MDC', NULL, 'Mill to size', '2', NULL, '24-2313-W1-20241125-674434e27e92e', '0', '2024-11-25 15:27:14', '2024-11-25 15:27:14', '673684f7ea1e1', 0, NULL, NULL, NULL, 'queue', 'ADMIN IT', '0'),
(147, '1', '24-2313-W1', '1.2', 'KRISBOW', NULL, 'SAW TO SIZE', '2', NULL, '24-2313-W1-20241125-674434e27ec53', '0', '2024-11-25 15:27:14', '2024-11-25 15:27:14', '67368794304a8', 0, NULL, NULL, NULL, 'queue', 'ADMIN IT', '0'),
(148, '1', '24-2313-W1', '2', 'CMZ 1', NULL, 'Turn to size', '2', NULL, '24-2313-W1-20241125-674434e27ef2c', '0', '2024-11-25 15:27:14', '2024-11-25 15:27:14', '673687b5eb473', 0, NULL, NULL, NULL, 'queue', 'ADMIN IT', '0'),
(149, '1', '24-2313-W1', '2', 'PUSH', NULL, 'PUSH', '2', NULL, '24-2313-W1-20241125-674434e27f227', '0', '2024-11-25 15:27:14', '2024-11-25 15:27:14', '6736889a991be', 0, NULL, NULL, NULL, 'queue', 'ADMIN IT', '0'),
(150, '1', '24-2313-W1', '1.1', 'KOBEWEL', NULL, 'Weld as per drawing', '2', NULL, '24-2313-W1-20241125-674434e27f550', '0', '2024-11-25 15:27:14', '2024-11-25 15:27:14', '673687e30a192', 0, NULL, NULL, NULL, 'queue', 'ADMIN IT', '0'),
(151, '1', '24-2313-W1', '1.2', 'ACIERA 1', NULL, 'Drill to size', '2', NULL, '24-2313-W1-20241125-674434e27f8b6', '0', '2024-11-25 15:27:14', '2024-11-25 15:27:14', '6736887e3b55a', 0, NULL, NULL, NULL, 'queue', 'ADMIN IT', '0'),
(152, '1', '24-2313-W1', '2', 'Trumpf TC 1000', NULL, 'Punch to Size', '2', NULL, '24-2313-W1-20241125-674434e27fc6d', '0', '2024-11-25 15:27:14', '2024-11-25 15:27:14', '673688f8b18a6', 0, NULL, NULL, NULL, 'queue', 'ADMIN IT', '0'),
(153, '1', '24-2313-W1', '3', 'ACIERA 1', NULL, 'Drill to size', '2', NULL, '24-2313-W1-20241125-674434e28004c', '0', '2024-11-25 15:27:14', '2024-11-25 15:27:14', '6736890e98dd5', 0, NULL, NULL, NULL, 'queue', 'ADMIN IT', '0'),
(154, '1', '24-2313-W2', '1.1', 'KOBEWEL', NULL, 'Weld as per drawing', '2', NULL, '24-2313-W2-20241125-674434f9ca03a', '0', '2024-11-25 15:27:37', '2024-11-25 15:27:37', '673687e30a192', 0, NULL, NULL, NULL, 'queue', 'ADMIN IT', '0'),
(155, '1', '24-2313-W2', '1.2', 'ACIERA 1', NULL, 'Drill to size', '2', NULL, '24-2313-W2-20241125-674434f9ca841', '0', '2024-11-25 15:27:37', '2024-11-25 15:27:37', '6736887e3b55a', 0, NULL, NULL, NULL, 'queue', 'ADMIN IT', '0'),
(156, '1', '24-2313-W2', '2', 'Trumpf TC 1000', NULL, 'Punch to Size', '2', NULL, '24-2313-W2-20241125-674434f9cb1ff', '0', '2024-11-25 15:27:37', '2024-11-25 15:27:37', '673688f8b18a6', 0, NULL, NULL, NULL, 'queue', 'ADMIN IT', '0'),
(157, '1', '24-2313-W2', '3', 'ACIERA 1', NULL, 'Drill to size', '2', NULL, '24-2313-W2-20241125-674434f9cb921', '0', '2024-11-25 15:27:37', '2024-11-25 15:27:37', '6736890e98dd5', 0, NULL, NULL, NULL, 'queue', 'ADMIN IT', '0'),
(158, '1', 'STWF421', '1.1', 'Kobewel', NULL, 'Weld as per drawing', '1', '2024-11-25', 'STWF421-20241125-0-674464B47EF07', '272509', '2024-11-25 18:51:16', '2024-11-25 18:51:55', '674464b47ef01', 12, NULL, '2024-11-25 18:51:43', '2024-11-25 18:51:55', 'finished', 'ADMIN IT', '22168'),
(159, '1', 'STWF421', '1.1', 'PUSH', NULL, 'PUSH', '1', '2024-11-25', 'STWF421-20241125-0-674464F7EEFCF', '122047', '2024-11-25 18:52:23', '2024-11-25 18:52:53', '674464f7eefc8', 5, NULL, '2024-11-25 18:52:48', '2024-11-25 18:52:53', 'finished', 'ADMIN IT', '30000'),
(160, '3', 'STWF421', '2', 'Kobewel', NULL, 'Weld as per drawing', '1', '2024-11-25', 'STWF421-20241125-0-6744652698057', '272509', '2024-11-25 18:53:10', '2024-11-25 18:53:25', '6744652698050', 5, NULL, '2024-11-25 18:53:20', '2024-11-25 18:53:25', 'finished', 'ADMIN IT', '22168'),
(161, '1', '24-0021-W1', '1.1', 'Kobewel', NULL, 'Weld as per drawing', '1', NULL, '24-0021-W1-20241125-6744667cc6667', '0', '2024-11-25 18:58:52', '2024-11-25 18:58:52', '674464b47ef01', 0, NULL, NULL, NULL, 'queue', 'ADMIN IT', '0'),
(162, '1', '24-0021-W1', '1.1', 'PUSH', NULL, 'PUSH', '1', NULL, '24-0021-W1-20241125-6744667cc6a67', '0', '2024-11-25 18:58:52', '2024-11-25 18:58:52', '674464f7eefc8', 0, NULL, NULL, NULL, 'queue', 'ADMIN IT', '0'),
(163, '3', '24-0021-W1', '2', 'Kobewel', NULL, 'Weld as per drawing', '1', NULL, '24-0021-W1-20241125-6744667cc6dc9', '0', '2024-11-25 18:58:52', '2024-11-25 18:58:52', '6744652698050', 0, NULL, NULL, NULL, 'queue', 'ADMIN IT', '0'),
(164, '1', '24-2314-W1', '1.1', 'KOBEWEL', NULL, 'Weld as per drawing', '1', NULL, '24-2314-W1-20241126-6745421167450', '0', '2024-11-26 10:35:45', '2024-11-26 10:35:45', '673684d9e4443', 0, NULL, NULL, NULL, 'queue', 'ADMIN IT', '0'),
(165, '2', '24-2314-W1', '1.1', 'ASSY MDC', NULL, 'Mill to size', '2', NULL, '24-2314-W1-20241126-6745421167b27', '0', '2024-11-26 10:35:45', '2024-11-26 10:35:45', '673684f7ea1e1', 0, NULL, NULL, NULL, 'queue', 'ADMIN IT', '0'),
(166, '1', '24-2314-W1', '1.2', 'KRISBOW', NULL, 'SAW TO SIZE', '2', NULL, '24-2314-W1-20241126-6745421167fc8', '0', '2024-11-26 10:35:45', '2024-11-26 10:35:45', '67368794304a8', 0, NULL, NULL, NULL, 'queue', 'ADMIN IT', '0'),
(167, '1', '24-2314-W1', '2', 'CMZ 1', NULL, 'Turn to size', '2', NULL, '24-2314-W1-20241126-67454211683a0', '0', '2024-11-26 10:35:45', '2024-11-26 10:35:45', '673687b5eb473', 0, NULL, NULL, NULL, 'queue', 'ADMIN IT', '0'),
(168, '1', '24-2314-W1', '2', 'PUSH', NULL, 'PUSH', '2', NULL, '24-2314-W1-20241126-67454211687c0', '0', '2024-11-26 10:35:45', '2024-11-26 10:35:45', '6736889a991be', 0, NULL, NULL, NULL, 'queue', 'ADMIN IT', '0'),
(169, '1', '24-2314-W1', '1.1', 'KOBEWEL', NULL, 'Weld as per drawing', '2', NULL, '24-2314-W1-20241126-6745421168b0a', '0', '2024-11-26 10:35:45', '2024-11-26 10:35:45', '673687e30a192', 0, NULL, NULL, NULL, 'queue', 'ADMIN IT', '0'),
(170, '1', '24-2314-W1', '1.2', 'ACIERA 1', NULL, 'Drill to size', '2', NULL, '24-2314-W1-20241126-67454211693bc', '0', '2024-11-26 10:35:45', '2024-11-26 10:35:45', '6736887e3b55a', 0, NULL, NULL, NULL, 'queue', 'ADMIN IT', '0'),
(171, '1', '24-2314-W1', '2', 'Trumpf TC 1000', NULL, 'Punch to Size', '2', NULL, '24-2314-W1-20241126-67454211697dc', '0', '2024-11-26 10:35:45', '2024-11-26 10:35:45', '673688f8b18a6', 0, NULL, NULL, NULL, 'queue', 'ADMIN IT', '0'),
(172, '1', '24-2314-W1', '3', 'ACIERA 1', NULL, 'Drill to size', '2', NULL, '24-2314-W1-20241126-6745421169baa', '0', '2024-11-26 10:35:45', '2024-11-26 10:35:45', '6736890e98dd5', 0, NULL, NULL, NULL, 'queue', 'ADMIN IT', '0'),
(173, '1', '24-2314-W2', '1.1', 'KOBEWEL', NULL, 'Weld as per drawing', '2', NULL, '24-2314-W2-20241126-6745424b293ff', '0', '2024-11-26 10:36:43', '2024-11-26 10:36:43', '673687e30a192', 0, NULL, NULL, NULL, 'queue', 'ADMIN IT', '0'),
(174, '1', '24-2314-W2', '1.2', 'ACIERA 1', NULL, 'Drill to size', '2', NULL, '24-2314-W2-20241126-6745424b29996', '0', '2024-11-26 10:36:43', '2024-11-26 10:36:43', '6736887e3b55a', 0, NULL, NULL, NULL, 'queue', 'ADMIN IT', '0'),
(175, '1', '24-2314-W2', '2', 'Trumpf TC 1000', NULL, 'Punch to Size', '2', NULL, '24-2314-W2-20241126-6745424b2a613', '0', '2024-11-26 10:36:43', '2024-11-26 10:36:43', '673688f8b18a6', 0, NULL, NULL, NULL, 'queue', 'ADMIN IT', '0'),
(176, '1', '24-2314-W2', '3', 'ACIERA 1', NULL, 'Drill to size', '2', NULL, '24-2314-W2-20241126-6745424b2ae2a', '0', '2024-11-26 10:36:43', '2024-11-26 10:36:43', '6736890e98dd5', 0, NULL, NULL, NULL, 'queue', 'ADMIN IT', '0'),
(177, '1', '24-2315-W1', '1.1', 'KOBEWEL', NULL, 'Weld as per drawing', '2', '2024-12-03', '24-2315-W1-20241126-0-674569A7655CC', '272509', '2024-11-26 13:24:39', '2024-11-26 13:43:48', '674569a7655c1', 367, NULL, '2024-11-26 13:37:41', '2024-11-26 13:43:48', 'finished', 'ADMIN IT', '22168'),
(178, '1', '24-2315-W1', '1.2', 'KRISBOW', NULL, 'SAW TO SIZE', '2', '2024-12-03', '24-2315-W1-20241126-0-674569C97E423', '14530', '2024-11-26 13:25:13', '2024-11-26 13:44:00', '674569c97e417', 351, NULL, '2024-11-26 13:38:09', '2024-11-26 13:44:00', 'finished', 'ADMIN IT', '17600'),
(179, '1', '24-2315-W2', '1.1', 'ACIERA 1', NULL, 'Drill to size', '2', '2024-12-03', '24-2315-W2-20241126-0-67456BD7B7DA3', '12557', '2024-11-26 13:33:59', '2024-11-26 13:45:21', '67456bd7b7d9d', 319, NULL, '2024-11-26 13:40:02', '2024-11-26 13:45:21', 'finished', 'ADMIN IT', '12000'),
(180, '2', '24-2315-W2', '1.2', 'Punch A', NULL, 'A', '2', '2024-12-03', '24-2315-W2-20241126-0-67456C0760093', '2354', '2024-11-26 13:34:47', '2024-11-26 13:45:28', '67456c076008c', 300, NULL, '2024-11-26 13:40:28', '2024-11-26 13:45:28', 'finished', 'ADMIN IT', '3000'),
(181, '1', '24-2315-W2', '1.3', 'HANSEAT', NULL, 'Turn to size', '2', '2024-12-03', '24-2315-W2-20241126-0-67456C3F6CDA9', '106880', '2024-11-26 13:35:43', '2024-11-26 13:45:48', '67456c3f6cd9d', 309, NULL, '2024-11-26 13:40:39', '2024-11-26 13:45:48', 'finished', 'ADMIN IT', '10000'),
(182, '1', '24-2315-W2', '1.4', 'ASSY MDC', NULL, 'Mill to size', '2', '2024-12-03', '24-2315-W2-20241126-0-67456C723D229', '45590', '2024-11-26 13:36:34', '2024-11-26 13:46:00', '67456c723d224', 308, NULL, '2024-11-26 13:40:52', '2024-11-26 13:46:00', 'finished', 'ADMIN IT', '30000'),
(183, '1', '24-2315-W1', '1.3', 'ASSY MDC', NULL, 'Mill to size', '2', '2024-12-03', '24-2315-W1-20241126-0-67456D072AE07', '45590', '2024-11-26 13:39:03', '2024-11-26 13:44:06', '67456d072adff', 287, NULL, '2024-11-26 13:39:19', '2024-11-26 13:44:06', 'finished', 'ADMIN IT', '30000'),
(184, '1', '24-2811-W1', '1', 'Kobewel', NULL, 'Weld as per drawing', '1', '2024-11-28', '24-2811-W1-20241128-0-674839C726330', '272509', '2024-11-28 16:37:11', '2024-11-28 16:41:23', '674839c726329', 34, NULL, '2024-11-28 16:40:49', '2024-11-28 16:41:23', 'finished', 'ADMIN IT', '22168'),
(185, '1', '24-2811-W1', '2', 'Trumpf TC 1000', NULL, 'Punch to Size', '1', '2024-11-28', '24-2811-W1-20241128-0-674839DD3D1BE', '122996', '2024-11-28 16:37:33', '2024-11-28 16:41:34', '674839dd3d1b3', 31, NULL, '2024-11-28 16:41:03', '2024-11-28 16:41:34', 'finished', 'ADMIN IT', '20631'),
(186, '1', '24-2811-W2', '1', 'Kobewel', NULL, 'Weld as per drawing', '1', NULL, '24-2811-W2-20241128-67483b2a0b277', '0', '2024-11-28 16:43:06', '2024-11-28 16:43:06', '674839c726329', 0, NULL, NULL, NULL, 'queue', 'ADMIN IT', '0'),
(187, '1', '24-2811-W2', '2', 'Trumpf TC 1000', NULL, 'Punch to Size', '1', NULL, '24-2811-W2-20241128-67483b2a0b81e', '0', '2024-11-28 16:43:06', '2024-11-28 16:43:06', '674839dd3d1b3', 0, NULL, NULL, NULL, 'queue', 'ADMIN IT', '0'),
(190, '5', 'STFW1012', '1', 'Trumpf TC 1000', NULL, 'Punch to Size', '2', '2024-11-29', 'STFW1012-20241129-0-6749682B5801D', '122996', '2024-11-29 14:07:23', '2024-11-29 14:10:16', '6749682b58017', 71, NULL, '2024-11-29 14:09:05', '2024-11-29 14:10:16', 'finished', 'ADMIN IT', '20631'),
(191, '5', 'STFW1012', '5', 'Trumpf TC 1000', NULL, 'Punch to Size', '1', '2024-11-29', 'STFW1012-20241129-0-6749685539A85', '122996', '2024-11-29 14:08:05', '2024-11-29 14:10:29', '6749685539a7f', 34, NULL, '2024-11-29 14:09:55', '2024-11-29 14:10:29', 'finished', 'ADMIN IT', '20631'),
(194, '5', '24-2000-W2', '1', 'Trumpf TC 1000', NULL, 'Punch to Size', '2', NULL, '24-2000-W2-20241202-674d351f4007d', '0', '2024-12-02 11:18:39', '2024-12-02 11:18:39', '6749682b58017', 0, NULL, NULL, NULL, 'queue', 'ADMIN IT', '0');
INSERT INTO `newprocessing` (`id`, `nop`, `order_number`, `item_number`, `machine`, `group_name`, `operation`, `estimated_time`, `date_wanted`, `barcode_id`, `mach_cost`, `created_at`, `updated_at`, `processing_id`, `duration`, `pending_at`, `started_at`, `finished_at`, `status`, `user_name`, `labor_cost`) VALUES
(195, '5', '24-2000-W2', '5', 'Trumpf TC 1000', NULL, 'Punch to Size', '1', NULL, '24-2000-W2-20241202-674d351f40a92', '0', '2024-12-02 11:18:39', '2024-12-02 11:18:39', '6749685539a7f', 0, NULL, NULL, NULL, 'queue', 'ADMIN IT', '0'),
(198, '1', '24-0212-W1', '1', 'KOBEWEL', NULL, 'Weld as per drawing', '2', NULL, '24-0212-W1-20241202-674d48744eb98', '0', '2024-12-02 12:41:08', '2024-12-02 12:41:08', '6749661694776', 0, NULL, NULL, NULL, 'queue', 'ADMIN IT', '0'),
(199, '12', '24-0212-W1', '2', 'MIKRON DRO 2', NULL, 'Mill to size', '2', NULL, '24-0212-W1-20241202-674d48744f5dc', '0', '2024-12-02 12:41:08', '2024-12-02 12:41:08', '6749664fdef0f', 0, NULL, NULL, NULL, 'queue', 'ADMIN IT', '0'),
(200, '1', '24-0212-W1', '3', 'Trumpf TC 1000', NULL, 'Punch to Size', '1', NULL, '24-0212-W1-20241202-674d48a3b9e4c', '0', '2024-12-02 12:41:55', '2024-12-02 12:41:55', '66d806351cd57', 0, NULL, NULL, NULL, 'queue', 'ADMIN IT', '0'),
(201, '1', '24-0212-W1', '3', 'MIKRON DRO 2', NULL, 'Mill to size', '2', NULL, '24-0212-W1-20241202-674d48a3ba291', '0', '2024-12-02 12:41:55', '2024-12-02 12:41:55', '66d806351d949', 0, NULL, NULL, NULL, 'queue', 'ADMIN IT', '0'),
(202, '1', '24-0212-W1', '3', 'CMZ 1', NULL, 'Turn to size', '2', NULL, '24-0212-W1-20241202-674d48a3ba696', '0', '2024-12-02 12:41:55', '2024-12-02 12:41:55', '66d806351dfb7', 0, NULL, NULL, NULL, 'queue', 'ADMIN IT', '0'),
(203, '1', '24-0212-W2', '3', 'Trumpf TC 1000', NULL, 'Punch to Size', '1', NULL, '24-0212-W2-20241202-674d48c0e2bf5', '0', '2024-12-02 12:42:24', '2024-12-02 12:42:24', '66d806351cd57', 0, NULL, NULL, NULL, 'queue', 'ADMIN IT', '0'),
(204, '1', '24-0212-W2', '3', 'MIKRON DRO 2', NULL, 'Mill to size', '2', NULL, '24-0212-W2-20241202-674d48c0e3446', '0', '2024-12-02 12:42:24', '2024-12-02 12:42:24', '66d806351d949', 0, NULL, NULL, NULL, 'queue', 'ADMIN IT', '0'),
(205, '1', '24-0212-W2', '3', 'CMZ 1', NULL, 'Turn to size', '2', NULL, '24-0212-W2-20241202-674d48c0e39b1', '0', '2024-12-02 12:42:24', '2024-12-02 12:42:24', '66d806351dfb7', 0, NULL, NULL, NULL, 'queue', 'ADMIN IT', '0'),
(206, '5', 'STFW1011', '1', 'ASSY MDC', NULL, 'Mill to size', '2', '2024-12-02', 'STFW1011-20241202-0-674D4FA838FC5', '45590', '2024-12-02 13:11:52', '2024-12-02 13:23:35', '674d4fa838fbd', 134, NULL, '2024-12-02 13:21:21', '2024-12-02 13:23:35', 'finished', 'ADMIN IT', '30000'),
(207, '2', 'STFW1011', '2', 'Trumpf TC 1000', NULL, 'Punch to Size', '2', '2024-12-02', 'STFW1011-20241202-0-674D4FB9E6E91', '122996', '2024-12-02 13:12:09', '2024-12-02 13:23:22', '674d4fb9e6e88', 112, NULL, '2024-12-02 13:21:30', '2024-12-02 13:23:22', 'finished', 'ADMIN IT', '20631'),
(208, '2', 'STFW1012', '3', 'Trumpf TC 1000', NULL, 'Punch to Size', '2', '2024-12-02', 'STFW1012-20241202-0-674D52F0D2EA5', '122996', '2024-12-02 13:25:52', '2024-12-02 13:27:04', '674d52f0d2e9c', 41, NULL, '2024-12-02 13:26:23', '2024-12-02 13:27:04', 'finished', 'ADMIN IT', '20631'),
(209, '2', 'STFW1012', '4', 'Kobewel', NULL, 'Weld as per drawing', '1', '2024-12-02', 'STFW1012-20241202-0-674D52FEE0160', '272509', '2024-12-02 13:26:06', '2024-12-02 13:27:14', '674d52fee0159', 40, NULL, '2024-12-02 13:26:34', '2024-12-02 13:27:14', 'finished', 'ADMIN IT', '22168'),
(210, '5', '24-2911-W1', '1', 'ASSY MDC', NULL, 'Mill to size', '2', NULL, '24-2911-W1-20241202-674d53b1eab10', '0', '2024-12-02 13:29:05', '2024-12-02 13:29:05', '674d4fa838fbd', 0, NULL, NULL, NULL, 'queue', 'ADMIN IT', '0'),
(211, '2', '24-2911-W1', '2', 'Trumpf TC 1000', NULL, 'Punch to Size', '2', NULL, '24-2911-W1-20241202-674d53b1eafc8', '0', '2024-12-02 13:29:05', '2024-12-02 13:29:05', '674d4fb9e6e88', 0, NULL, NULL, NULL, 'queue', 'ADMIN IT', '0'),
(212, '5', 'STFW23101', '1', 'ASSY MDC', NULL, 'Mill to size', '2', NULL, 'STFW23101-20241202-674d7c83cc9db', '0', '2024-12-02 16:23:15', '2024-12-02 16:23:15', '674d4fa838fbd', 0, NULL, NULL, NULL, 'queue', 'ADMIN IT', '0'),
(213, '2', 'STFW23101', '2', 'Trumpf TC 1000', NULL, 'Punch to Size', '2', NULL, 'STFW23101-20241202-674d7c83cd629', '0', '2024-12-02 16:23:15', '2024-12-02 16:23:15', '674d4fb9e6e88', 0, NULL, NULL, NULL, 'queue', 'ADMIN IT', '0'),
(214, '1', '24-1500-W1', '1', 'ASSY MDC', NULL, 'Mill to size', '1', '2024-12-10', '24-1500-W1-20241203-0-674E8B4AE651E', '45590', '2024-12-03 11:38:34', '2024-12-03 12:00:38', '674e8b4ae6515', 817, NULL, '2024-12-03 11:47:01', '2024-12-03 12:00:38', 'finished', 'Victor', '30000'),
(215, '1', '24-1500-W1', '1', 'HANSEAT', NULL, 'Turn to size', '0.1', '2024-12-10', '24-1500-W1-20241203-1-674E8B4AE7190', '106880.00', '2024-12-03 11:38:34', '2024-12-06 09:07:06', '674e8b4ae7189', 5, '2024-12-06 08:40:13', '2024-12-06 09:07:01', '2024-12-06 09:07:06', 'finished', 'Victor', '10000.00'),
(216, '1', '24-1500-W1', '1.1', 'KOBEWEL', NULL, 'Weld as per drawing', '0.2', '2024-12-10', '24-1500-W1-20241203-0-674E8BB85F47C', '272509', '2024-12-03 11:40:24', '2024-12-06 09:07:39', '674e8bb85f475', 2063, NULL, '2024-12-06 08:33:16', '2024-12-06 09:07:39', 'finished', 'Victor', '22168'),
(217, '1', '24-1500-W1', '1.1', 'MIKRON DRO 2', NULL, 'Mill to size', '0.5', '2024-12-10', '24-1500-W1-20241203-1-674E8BB85FAC3', '33213.00', '2024-12-03 11:40:24', '2024-12-06 09:07:42', '674e8bb85fabe', 2053, NULL, '2024-12-06 08:33:29', '2024-12-06 09:07:42', 'finished', 'Victor', '9000.00'),
(218, '1', '24-1500-W1', '2', 'ACIERA 1', NULL, 'Drill to size', '0.8', '2024-12-10', '24-1500-W1-20241206-0-6752552FB1D8E', '12557', '2024-12-06 08:36:47', '2024-12-06 08:49:17', '6752552fb1d85', 504, NULL, '2024-12-06 08:40:53', '2024-12-06 08:49:17', 'finished', 'Victor', '12000'),
(219, '1', '24-1500-W1', '2.1', 'HANSEAT', NULL, 'Turn to size', '1', '2024-12-11', '24-1500-W1-20241206-0-67525571E09B2', '106880', '2024-12-06 08:37:53', '2024-12-06 09:08:04', '67525571e09ac', 4, NULL, '2024-12-06 09:08:00', '2024-12-06 09:08:04', 'finished', 'Victor', '10000'),
(220, '1', '24-1500-W1', '3', 'Trumpf TC 1000', NULL, 'Punch to Size', '2', '2024-12-11', '24-1500-W1-20241206-0-675255943A70E', '122996', '2024-12-06 08:38:28', '2024-12-06 09:08:24', '675255943a705', 7, NULL, '2024-12-06 09:08:17', '2024-12-06 09:08:24', 'finished', 'Victor', '20631'),
(221, '1', '24-1500-W1', '1.1a', 'Trumpf TC 1000', NULL, 'Punch to Size', '0.5', '2024-12-06', '24-1500-W1-20241206-0-67525DBC54C40', '122996', '2024-12-06 09:13:16', '2024-12-06 09:13:53', '67525dbc54c38', 20, NULL, '2024-12-06 09:13:33', '2024-12-06 09:13:53', 'finished', 'Victor', '20631'),
(222, '1', 'Int24-1500-W1', '1', 'ASSY MDC', NULL, 'Mill to size', '1', NULL, 'Int24-1500-W1-20241206-675282cb3a74d', '0', '2024-12-06 11:51:23', '2024-12-06 11:51:23', '674e8b4ae6514', 0, NULL, NULL, NULL, 'queue', 'Victor', '0'),
(223, '1', 'Int24-1500-W1', '1', 'HANSEAT', NULL, 'Turn to size', '0.1', NULL, 'Int24-1500-W1-20241206-675282cb3b092', '0', '2024-12-06 11:51:23', '2024-12-06 11:51:23', '674e8b4ae7189', 0, NULL, NULL, NULL, 'queue', 'Victor', '0'),
(224, '1', 'Int24-1500-W1', '1.1', 'KOBEWEL', NULL, 'Weld as per drawing', '0.2', NULL, 'Int24-1500-W1-20241206-675282cb3b906', '0', '2024-12-06 11:51:23', '2024-12-06 11:51:23', '674e8bb85f475', 0, NULL, NULL, NULL, 'queue', 'Victor', '0'),
(225, '1', 'Int24-1500-W1', '1.1', 'MIKRON DRO 2', NULL, 'Mill to size', '0.5', NULL, 'Int24-1500-W1-20241206-675282cb3be3d', '0', '2024-12-06 11:51:23', '2024-12-06 11:51:23', '674e8bb85fabe', 0, NULL, NULL, NULL, 'queue', 'Victor', '0'),
(226, '1', 'Int24-1500-W1', '2', 'ACIERA 1', NULL, 'Drill to size', '0.8', NULL, 'Int24-1500-W1-20241206-675282cb3c3c5', '0', '2024-12-06 11:51:23', '2024-12-06 11:51:23', '6752552fb1d85', 0, NULL, NULL, NULL, 'queue', 'Victor', '0'),
(227, '1', 'Int24-1500-W1', '2.1', 'HANSEAT', NULL, 'Turn to size', '1', NULL, 'Int24-1500-W1-20241206-675282cb3c9f4', '0', '2024-12-06 11:51:23', '2024-12-06 11:51:23', '67525571e09ac', 0, NULL, NULL, NULL, 'queue', 'Victor', '0'),
(228, '1', 'Int24-1500-W1', '3', 'Trumpf TC 1000', NULL, 'Punch to Size', '2', NULL, 'Int24-1500-W1-20241206-675282cb3cebf', '0', '2024-12-06 11:51:23', '2024-12-06 11:51:23', '675255943a705', 0, NULL, NULL, NULL, 'queue', 'Victor', '0'),
(229, '1', 'Int24-1500-W1', '1.1a', 'Trumpf TC 1000', NULL, 'Punch to Size', '0.5', NULL, 'Int24-1500-W1-20241206-675282cb3d4e4', '0', '2024-12-06 11:51:23', '2024-12-06 11:51:23', '67525dbc54c38', 0, NULL, NULL, NULL, 'queue', 'Victor', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `no_katalog`
--

CREATE TABLE `no_katalog` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_katalog` varchar(255) NOT NULL,
  `nama_katalog` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `no_katalog`
--

INSERT INTO `no_katalog` (`id`, `no_katalog`, `nama_katalog`, `price`, `created_at`, `updated_at`) VALUES
(1, '210-002', 'Tool Chart', '5494500', NULL, '2024-10-25 20:53:03'),
(2, '210-003', 'Workshop Cart (Big)', '5322450', NULL, '2024-10-25 20:53:11'),
(3, '210-004', 'Workshop Cart (Small)', '4296810', '2024-08-23 08:42:16', '2024-10-25 20:53:20'),
(5, '210-005', 'Pahat ISO 2 16x16', '249750', '2024-08-23 08:44:52', '2024-10-25 20:53:29'),
(6, '210-006', 'Pahat ISO 2 20x20', '249750', '2024-08-23 08:45:12', '2024-10-25 20:53:49'),
(10, '210-007', 'Pahat ISO 6 16x16', '249750', '2024-10-25 20:59:32', '2024-10-25 20:59:32'),
(11, '210-009', 'Pahat ISO 9 R16', '249750', '2024-10-25 20:59:32', '2024-10-25 20:59:32'),
(12, '210-010', 'Pahat ISO 9 R20', '249750', '2024-10-25 20:59:32', '2024-10-25 20:59:32'),
(13, '011-001', 'Hydrant Box A1', '728160', '2024-10-25 20:59:32', '2024-10-25 20:59:32'),
(14, '011-002', 'Hydrant Box A1 Glass', '818070', '2024-10-25 20:59:32', '2024-10-25 20:59:32'),
(15, '011-003', 'Hydrant Box A2', '1183260', '2024-10-25 20:59:32', '2024-10-25 20:59:32'),
(16, '011-004', 'Hydrant Box A2 Glass', '1423020', '2024-10-25 20:59:32', '2024-10-25 20:59:32'),
(17, '011-005', 'Hydrant Box B', '1363080', '2024-10-25 20:59:32', '2024-10-25 20:59:32'),
(18, '011-006', 'Hydrant Box B Glass', '1649460', '2024-10-25 20:59:32', '2024-10-25 20:59:32'),
(19, '011-007', 'Hydrant Box C ', '1172160', '2024-10-25 20:59:32', '2024-10-25 20:59:32'),
(20, '011-008', 'Hydrant Box C Glass', '1437450', '2024-10-25 20:59:32', '2024-10-25 20:59:32'),
(21, '011-009', 'Fibox 001', '545010', '2024-10-25 20:59:32', '2024-10-25 20:59:32'),
(22, '011-010', 'Fibox 002', '612720', '2024-10-25 20:59:32', '2024-10-25 20:59:32'),
(23, '011-011', 'Fibox 003', '819180', '2024-10-25 20:59:32', '2024-10-25 20:59:32'),
(24, '011-012', 'Fibox 004', '905760', '2024-10-25 20:59:32', '2024-10-25 20:59:32'),
(25, '011-013', 'Fibox 005', '1055610', '2024-10-25 20:59:32', '2024-10-25 20:59:32'),
(26, '011-014', 'Box Hotel Safe', '610500', '2024-10-25 20:59:32', '2024-10-25 20:59:32'),
(27, '011-015', 'Drawer Safe', '672660', '2024-10-25 20:59:32', '2024-10-25 20:59:32'),
(28, '011-016', 'Hydrant Box A2', '1107780', '2024-10-25 20:59:32', '2024-10-25 20:59:32'),
(29, '011-017', 'Hydrant Box B', '1465200', '2024-10-25 20:59:32', '2024-10-25 20:59:32'),
(30, '011-020', 'Frame Rainer B4CK (Exclude material SECC)', '2353200', '2024-10-25 20:59:32', '2024-10-25 20:59:32'),
(31, '011-021', 'Frame Rainer B4C4K (Exclude material SECC)', '2486400', '2024-10-25 20:59:32', '2024-10-25 20:59:32'),
(32, '011-022', 'Frame Rainer B2CK (Exclude material SECC)', '1398600', '2024-10-25 20:59:32', '2024-10-25 20:59:32'),
(33, '011-023', 'Frame Rainer B2C2K (Exclude material SECC)', '1476300', '2024-10-25 20:59:32', '2024-10-25 20:59:32'),
(34, '011-024', 'Frame Eiger A175CK - Plat SPCC (Inner 0.9mm; Outer 0.9mm)', '2628480', '2024-10-25 20:59:32', '2024-10-25 20:59:32'),
(35, '011-025', 'Frame Eiger A69CK - Plat SPCC (Inner 0.9mm; Outer 0.9mm)', '1704960', '2024-10-25 20:59:32', '2024-10-25 20:59:32'),
(36, '011-026', 'Frame Eiger A55CK - Plat SPCC (Inner 0.9mm; Outer 0.9mm)', '1605060', '2024-10-25 20:59:32', '2024-10-25 20:59:32'),
(37, '011-027', 'Frame Eiger A175CK Drop Safes ', '3096900', '2024-10-25 20:59:32', '2024-10-25 20:59:32'),
(38, '011-028', 'Frame Eiger A69CK Drop Safes ', '2197800', '2024-10-25 20:59:32', '2024-10-25 20:59:32'),
(39, '011-029', 'Frame Etna 1 CK - Standard - Plat SPCC (Inner 0.9mm; Outer 0.9mm)', '4485510', '2024-10-25 20:59:32', '2024-10-25 20:59:32'),
(40, '011-030', 'Frame Etna Gun 1 CK - Gun Safe - Plat SPCC (Inner 0.9mm; Outer 0.9mm)', '4129200', '2024-10-25 20:59:32', '2024-10-25 20:59:32'),
(41, '011-031', 'Frame Etna File  1 CK File Safe + Filing 4 Drawers - Plat SPCC (Inner 0.9mm; Outer 0.9mm)', '5638800', '2024-10-25 20:59:32', '2024-10-25 20:59:32'),
(42, '011-032', 'Frame Pintu Khasanah (P38) ', '17982000', '2024-10-25 20:59:32', '2024-10-25 20:59:32'),
(43, '011-033', 'Frame Pintu Khasanah (P25) - Kanan', '17316000', '2024-10-25 20:59:32', '2024-10-25 20:59:32'),
(44, '011-034', 'Frame Pintu Khasanah (P25) - Kiri ', '17316000', '2024-10-25 20:59:32', '2024-10-25 20:59:32'),
(45, '011-035', 'Frame Pintu Khasanah (P78) - Kanan', '27106200', '2024-10-25 20:59:32', '2024-10-25 20:59:32'),
(46, '011-036', 'Safes 1800x905x776', '20979000', '2024-10-25 20:59:32', '2024-10-25 20:59:32'),
(47, '011-037', 'Frame 7D ETNA 488x767x1300', '5694300', '2024-10-25 20:59:32', '2024-10-25 20:59:32'),
(94, '011-018', 'Hydrant Box C', '1248750', '2024-10-25 21:12:35', '2024-10-25 21:12:35'),
(95, '011-019', 'Hydrant Box C (Outdoor)', '1248750', '2024-10-25 21:12:35', '2024-10-25 21:12:35'),
(96, '320-001', 'Mould Hosti', '26085000', '2024-10-25 21:12:35', '2024-10-25 21:12:35'),
(97, '321-001', 'Punch Hosti', '31635000', '2024-10-25 21:12:35', '2024-10-25 21:12:35'),
(98, '322-001', 'Printability Tester', '53946000', '2024-10-25 21:12:35', '2024-10-25 21:12:35'),
(99, '424-001', 'Kirana Dentech Satisfa', '45760059.69', '2024-10-25 21:12:35', '2024-10-25 21:12:35'),
(100, '424-002', 'Kirana Dentech Premia', '48089271.48', '2024-10-25 21:12:35', '2024-10-25 21:12:35'),
(101, '424-003', 'Kirana Dentech Lvxima', '50607211.02', '2024-10-25 21:12:35', '2024-10-25 21:12:35'),
(102, '005-009', 'Round Table', '1698300', '2024-10-25 21:12:35', '2024-10-25 21:12:35'),
(103, '005-010', 'Bar Table', '1798200', '2024-10-25 21:12:35', '2024-10-25 21:12:35'),
(104, '005-011', 'Folding Table', '2303250', '2024-10-25 21:12:35', '2024-10-25 21:12:35'),
(105, '105-016', 'School Table Z Computer', '2309910', '2024-10-25 21:12:35', '2024-10-25 21:12:35'),
(106, '105-029', 'Cubical Table + partisi', '3296700', '2024-10-25 21:12:35', '2024-10-25 21:12:35'),
(107, '105-030', 'Meeting Table 4200mm', '10989000', '2024-10-25 21:12:35', '2024-10-25 21:12:35'),
(108, '105-033', 'Guest Table', '832500', '2024-10-25 21:12:35', '2024-10-25 21:12:35'),
(109, '105-034', 'Guest Table & Guest Chair (1 set)', '3352200', '2024-10-25 21:12:35', '2024-10-25 21:12:35'),
(110, '104-998', 'Mobile File Manual Cabinet Single Dinamis', '6916410', '2024-10-25 21:12:35', '2024-10-25 21:12:35'),
(111, '205-001B', 'WB Drawer Block', '2756130', '2024-10-25 21:12:35', '2024-10-25 21:12:35'),
(112, '205-001A', 'WB Leg', '483960', '2024-10-25 21:12:35', '2024-10-25 21:12:35'),
(113, '205-001C', 'WB Leg Support 1250 x 800 x 30mm', '1250970', '2024-10-25 21:12:35', '2024-10-25 21:12:35'),
(114, '205-001D', 'WB Top Table 2000 x 800 x 50mm', '4802970', '2024-10-25 21:12:35', '2024-10-25 21:12:35'),
(115, '205-001E', 'WB Top Table 2500 x 800 x 50mm', '5841930', '2024-10-25 21:12:35', '2024-10-25 21:12:35'),
(116, '005-007', 'Practice Table', '5160390', '2024-10-25 21:12:35', '2024-10-25 21:12:35'),
(117, '205-010B', 'Workbench Modular 2270X700X2050', '19980000', '2024-10-25 21:12:35', '2024-10-25 21:12:35'),
(118, '005-012', 'Meja Lipat', '3596400', '2024-10-25 21:12:35', '2024-10-25 21:12:35'),
(119, '005-013', 'Multipurpose Table Type C ', '3496500', '2024-10-25 21:12:35', '2024-10-25 21:12:35'),
(120, '105-014', 'School Table Small Lite', '1398600', '2024-10-25 21:12:35', '2024-10-25 21:12:35'),
(121, '005-015', 'Meja Baca', '2547450', '2024-10-25 21:12:35', '2024-10-25 21:12:35'),
(122, '105-015', 'Square Table + Chair', '1168830', '2024-10-25 21:12:35', '2024-10-25 21:12:35'),
(123, '005-016', 'Bangku Kantin', '8291700', '2024-10-25 21:12:35', '2024-10-25 21:12:35'),
(124, '005-017', 'Meja Mootcourt', '13986000', '2024-10-25 21:12:35', '2024-10-25 21:12:35'),
(125, '001-001', 'Floor Cabinet 4Drawers', '4995000', '2024-10-25 21:12:35', '2024-10-25 21:12:35'),
(126, '101-001', 'Filing Cabinet 2D', '2267730', '2024-10-25 21:12:35', '2024-10-25 21:12:35'),
(127, '001-002', 'Floor Cabinet 2Drawers', '3996000', '2024-10-25 21:12:35', '2024-10-25 21:12:35'),
(128, '101-002', 'Filing Cabinet 3D', '2929290', '2024-10-25 21:12:35', '2024-10-25 21:12:35'),
(129, '001-003', 'Floor Cabinet 2doors - 2Drawers', '3593070', '2024-10-25 21:12:35', '2024-10-25 21:12:35'),
(130, '101-003', 'Filing Cabinet 4D', '3480960', '2024-10-25 21:12:35', '2024-10-25 21:12:35'),
(131, '001-004', 'Wall Cabinet', '3049170', '2024-10-25 21:12:35', '2024-10-25 21:12:35'),
(132, '101-004', 'Filing Cabinet 4D With  2 Locks', '4259070', '2024-10-25 21:12:35', '2024-10-25 21:12:35'),
(133, '001-005', 'Top hung Cabinet', '5894100', '2024-10-25 21:12:35', '2024-10-25 21:12:35'),
(134, '101-005', 'Filing Cabinet 4D With 4 Locks', '4846260', '2024-10-25 21:12:35', '2024-10-25 21:12:35'),
(135, '101-006', 'Filing Cabinet 5D', '4481070', '2024-10-25 21:12:35', '2024-10-25 21:12:35'),
(136, '101-007', 'Filing Cabinet 6D', '6418020', '2024-10-25 21:12:35', '2024-10-25 21:12:35'),
(137, '101-008', 'Filing Cabinet 2D - Eco', '1833720', '2024-10-25 21:12:35', '2024-10-25 21:12:35'),
(138, '101-009', 'Filing Cabinet 3D - Eco', '2271060', '2024-10-25 21:12:35', '2024-10-25 21:12:35'),
(139, '101-010', 'Filing Cabinet 4D - Eco', '2737260', '2024-10-25 21:12:35', '2024-10-25 21:12:35'),
(140, '101-011', 'Filing cabinet combination', '6095010', '2024-10-25 21:12:35', '2024-10-25 21:12:35'),
(141, '101-012', 'Five Drawers Tabanas Filing Cabinet', '3868350', '2024-10-25 21:12:35', '2024-10-25 21:12:35'),
(142, '101-013', 'Cabinet with Sliding Door (Big)', '3593070', '2024-10-25 21:14:13', '2024-10-25 21:14:13'),
(143, '101-014', 'Cabinet with Sliding Door (Small)', '2827170', '2024-10-25 21:14:13', '2024-10-25 21:14:13'),
(144, '101-015', 'Secureline Prima 2 Drawer', '1833720', '2024-10-25 21:14:13', '2024-10-25 21:14:13'),
(145, '101-016', 'Secureline Prima 3 Drawer', '2271060', '2024-10-25 21:14:13', '2024-10-25 21:14:13'),
(146, '101-017', 'Secureline Prima 4 Drawer', '2505270', '2024-10-25 21:14:13', '2024-10-25 21:14:13'),
(147, '101-018', 'Secureline Prima -X 4 Drawer', '1998000', '2024-10-25 21:14:13', '2024-10-25 21:14:13'),
(148, '101-019', 'Mobile Drawer (meja admin)', '3185700', '2024-10-25 21:14:13', '2024-10-25 21:14:13'),
(149, '101-020', 'Mobile Cabinet 1D1D', '4995000', '2024-10-25 21:14:13', '2024-10-25 21:14:13'),
(150, '101-021', 'Mobile Cabinet 2D1D', '7992000', '2024-10-25 21:14:13', '2024-10-25 21:14:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE `order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `so_number` varchar(255) NOT NULL,
  `quotation_number` varchar(255) NOT NULL,
  `kbli_code` varchar(255) NOT NULL,
  `reff_number` varchar(255) DEFAULT NULL,
  `order_date` date NOT NULL,
  `product_type` varchar(255) NOT NULL,
  `po_number` varchar(255) NOT NULL,
  `sale_price` int(11) NOT NULL,
  `production_cost` varchar(255) DEFAULT NULL,
  `information` text DEFAULT NULL,
  `information2` text DEFAULT NULL,
  `information3` text DEFAULT NULL,
  `order_status` enum('Queue','Started','Pending','Finished','Process Finished','Delivered','QC Pass') DEFAULT 'Queue',
  `customer` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `dod` date NOT NULL,
  `dod_forecast` date DEFAULT NULL,
  `sample` varchar(255) DEFAULT NULL,
  `material` varchar(255) DEFAULT NULL,
  `catalog_number` varchar(255) DEFAULT NULL,
  `material_cost` varchar(255) DEFAULT NULL,
  `dod_adj` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `produksi_status` varchar(255) DEFAULT NULL,
  `marketing_status` varchar(255) DEFAULT NULL,
  `surat_jalan_status` varchar(255) DEFAULT NULL,
  `produksi_description` varchar(255) DEFAULT NULL,
  `marketing_description` varchar(255) DEFAULT NULL,
  `surat_jalan_description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `order`
--

INSERT INTO `order` (`id`, `order_number`, `so_number`, `quotation_number`, `kbli_code`, `reff_number`, `order_date`, `product_type`, `po_number`, `sale_price`, `production_cost`, `information`, `information2`, `information3`, `order_status`, `customer`, `product`, `qty`, `dod`, `dod_forecast`, `sample`, `material`, `catalog_number`, `material_cost`, `dod_adj`, `created_at`, `updated_at`, `produksi_status`, `marketing_status`, `surat_jalan_status`, `produksi_description`, `marketing_description`, `surat_jalan_description`) VALUES
(3, '24-1234-M1', '24-1234-M', 'Q24-1234', '28299', 'R01', '2024-02-02', 'SPM', 'BPR01', 580000000, '400000000', NULL, 'WARNA\r\n- STANDAR COLOUR', '-', 'Pending', 'BAMBANG SUWITO', 'LEANTURN', '2', '2024-03-08', '2024-03-08', '-', 'PLAT', '-', '-', '2024-03-08', '2024-02-02 07:21:47', '2024-10-16 10:07:52', 'Disetujui', 'Disetujui', 'Disetujui', NULL, NULL, NULL),
(16, '24-1234-M7', '24-1234-M', 'Q24-1234', '28299', '22', '2024-07-11', 'SPM', 'BPR01', 1000000, '10000000', NULL, 'WARNA\r\n- STANDAR COLOUR', 'a', 'Delivered', 'BAMBANG SUWITO', 'Mobile File 2S2D-4 Row (Tinggi 2.8m)', '1', '2024-03-08', '2024-07-11', 'a', 'PLAT 3\'', 'a', 'b', '2024-07-11', '2024-07-11 04:47:07', '2024-10-16 10:19:25', 'Disetujui', 'Disetujui', 'Disetujui', 'acc 1', 'acc m', 'a'),
(17, '24-0245-W2', '24-0245-W', 'q24-9999', '31004', '22', '2024-07-03', 'Standart Product', '123451', 30000, '30000', NULL, 'Warna RAL-3020', 'b', 'Delivered', 'Pt. Acroe Indonesia', 'LEANTURN', '4', '2024-07-03', '2024-07-11', 'b', 'PLAT 3\'', 'a', 'b', '2024-07-11', '2024-07-11 04:49:36', '2024-10-28 14:07:57', 'Disetujui', 'Disetujui', 'Disetujui', 'ACC PRODUKSI', 'ACC MARKETING', '24/1101'),
(25, '24-0132-W1', '24-0132-W', 'Q24-0267', '28299', '213123', '2024-01-26', 'WF Customized Product', 'GI/01-26/2024', 12031203, '10000000', NULL, 'WF\r\n- Mobile File 2S16D-3 Row (Tinggi 2.8m)', 'a', 'QC Pass', 'GUNNEBO INDONESIA DISTRIBUTION PT', 'Meja Meeting', '1', '2024-03-19', '2024-09-14', 'a', 'PLAT 3\'', 'asfaasf', '1010101010', '2024-09-14', '2024-09-14 02:18:51', '2024-11-12 17:31:17', 'Disetujui', NULL, NULL, NULL, NULL, NULL),
(28, '24-0001-W1', '24-0001-W', 'Q24-0267', '25991', NULL, '2024-01-26', 'WF Standart Product', '1234', 529200000, NULL, NULL, 'WF\r\n- Mobile File 2S16D-3 Row (Tinggi 2.8m)', NULL, 'Finished', 'GUNNEBO INDONESIA DISTRIBUTION PT', 'Mobile File 2S16D-3 Row (Tinggi 2.8m)', '1', '2024-11-14', NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-14 13:53:01', '2024-10-16 10:17:04', 'Disetujui', NULL, NULL, '1', NULL, NULL),
(29, 'STWF-1024', 'STWF-1024', 'Q24-9098', '31004', 'R02', '2024-10-11', 'WF Standart Product', 'STWF-1024', 10000, '80000000', NULL, 'SIZE 500 X 300 X 1000', 'a', 'Queue', 'coba wf', 'Meja Kerja', '5', '2024-10-31', '2024-10-14', 'b', 'BRONZE', '90', '98000000', '2024-10-14', '2024-10-14 14:18:07', '2024-10-14 14:18:07', NULL, NULL, NULL, NULL, NULL, NULL),
(30, '24-0002-W1', '24-0001-W', 'Q24-0267', '25991', NULL, '2024-01-26', 'WF Standart Product', '1234', 529200000, NULL, NULL, 'WF\r\n- Mobile File 2S16D-3 Row (Tinggi 2.8m)', NULL, 'Finished', 'GUNNEBO INDONESIA DISTRIBUTION PT', 'Mobile File 2S16D-3 Row (Tinggi 2.8m)', '1', '2024-11-14', NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-14 15:07:24', '2024-10-14 15:07:24', NULL, NULL, NULL, NULL, NULL, NULL),
(31, '24-23001-W1', '24-23001-W', '23001', '25991', NULL, '2024-10-14', 'WF Standart Product', 'PO23001', 200000, '150000', NULL, 'barang andro', NULL, 'Finished', 'andro', 'product test', '2', '2024-10-30', '2024-10-15', 'a', 'testmaterial', '111111', '111111', '2024-10-22', '2024-10-14 16:16:21', '2024-10-14 17:01:05', NULL, NULL, NULL, NULL, NULL, NULL),
(32, '24-23001-W2', '24-23001-W', '23001', '25991', '1122', '2024-10-14', 'WF Standart Product', 'PO23001', 100000, '120000', NULL, 'barang andro', 'asdasd', 'Queue', 'andro', 'product test2', '3', '2024-10-30', NULL, 'a', 'asdasd', 'asdasd', 'asdasd', NULL, '2024-10-14 16:17:35', '2024-10-14 16:17:35', NULL, NULL, NULL, NULL, NULL, NULL),
(33, '24-24001-W1', '24-23001-W', '23001', '25991', NULL, '2024-10-14', 'WF Standart Product', 'PO23001', 200000, '150000', NULL, 'barang andro', NULL, 'Delivered', 'andro', 'product test', '2', '2024-10-30', '2024-10-15', 'a', 'testmaterial', '111111', '111111', '2024-10-22', '2024-10-14 17:04:15', '2024-10-28 14:10:17', 'Disetujui', 'Disetujui', 'Disetujui', 'ok', 'ok', '24/00023'),
(34, '24-25001-W1', '24-23001-W', '23001', '25991', NULL, '2024-10-14', 'WF Standart Product', 'PO23001', 200000, '150000', NULL, 'barang andro', NULL, 'Queue', 'andro', 'product test', '2', '2024-10-30', '2024-10-15', 'a', 'testmaterial', '111111', '111111', '2024-10-22', '2024-10-15 01:36:09', '2024-10-15 01:36:09', NULL, NULL, NULL, NULL, NULL, NULL),
(35, '24-23002-W1', '24-23001-W', '23001', '25991', NULL, '2024-10-14', 'WF Standart Product', 'PO23001', 200000, '150000', NULL, 'barang andro', NULL, 'Queue', 'andro', 'product test', '2', '2024-10-30', '2024-10-15', 'a', 'testmaterial', '111111', '111111', '2024-10-22', '2024-10-16 08:07:33', '2024-10-16 08:07:33', NULL, NULL, NULL, NULL, NULL, NULL),
(36, '24-23003-W1', '24-23001-W', '23001', '25991', NULL, '2024-10-14', 'WF Standart Product', 'PO23001', 200000, '150000', NULL, 'barang andro', NULL, 'Queue', 'andro', 'product test', '2', '2024-10-30', '2024-10-15', 'a', 'testmaterial', '111111', '111111', '2024-10-22', '2024-10-16 08:10:33', '2024-10-16 08:10:33', NULL, NULL, NULL, NULL, NULL, NULL),
(37, '24-23004-W1', '24-23004-W', 'Q24-23004', '28299', NULL, '2024-10-17', 'Precision Part', 'PO24-23004-W', 0, '0', NULL, 'gdgdfgdf', NULL, 'Started', 'Adi Widya', 'a', '1', '2024-10-17', NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-16 08:23:29', '2024-10-16 10:10:14', NULL, NULL, NULL, NULL, NULL, NULL),
(38, '24-2000-W1', '24-2000-W', 'STWF-200', '31004', NULL, '2024-10-21', 'SPM', 'GI/01-26/2024', 6487117, NULL, 'aa', NULL, NULL, 'Queue', 'Gerson Manuel', '302', '1', '2024-10-23', '2024-10-23', 'Sample', NULL, NULL, NULL, '2024-10-23', '2024-10-21 02:27:07', '2024-10-21 02:27:07', NULL, NULL, NULL, NULL, NULL, NULL),
(39, '24-2000-W2', '24-2000-W', 'STWF-200', '111111', NULL, '2024-10-21', 'Precision Part', 'GI/01-26/2024', 6487117, NULL, 'aa', NULL, NULL, 'Queue', 'Gerson Manuel', '9099', '1', '2024-10-23', '2024-10-23', 'Sample', NULL, NULL, NULL, '2024-10-23', '2024-10-21 02:27:07', '2024-10-21 02:27:07', NULL, NULL, NULL, NULL, NULL, NULL),
(40, '24-2000-W3', '24-2000-W', 'STWF-200', '28299', NULL, '2024-10-21', 'Precision Part', 'GI/01-26/2024', 6487117, NULL, 'aa', NULL, NULL, 'Queue', 'Gerson Manuel', '299', '1', '2024-10-23', '2024-10-23', 'Sample', NULL, NULL, NULL, '2024-10-23', '2024-10-21 02:27:07', '2024-10-21 02:27:07', NULL, NULL, NULL, NULL, NULL, NULL),
(43, 'BRP14', 'BRP14', 'Q24-9849', '31004', NULL, '2024-10-22', 'SPM', 'BRP14', 1221000, NULL, 'BRP14', NULL, NULL, 'Queue', 'name', '9099', '11', '2024-10-22', '2024-10-22', 'Photo', NULL, NULL, NULL, '2024-10-22', '2024-10-22 00:30:34', '2024-10-22 00:30:34', NULL, NULL, NULL, NULL, NULL, NULL),
(44, '24-0021-W1', '24-0021-W', 'Stwf1111', '25991', NULL, '2024-10-22', 'WF Standart Product', '234', 540594150, NULL, 'Aa', NULL, NULL, 'Queue', 'Gerson Manuel', 'Q24-0267-1', '1', '2024-10-22', '2024-10-22', 'Photo', NULL, NULL, NULL, '2024-10-22', '2024-10-22 04:45:05', '2024-10-22 04:45:05', NULL, NULL, NULL, NULL, NULL, NULL),
(45, '24-0021-W2', '24-0021-W', 'Stwf1111', '28221', NULL, '2024-10-22', 'WF Standart Product', '234', 540594150, NULL, 'Aa', NULL, NULL, 'Queue', 'Gerson Manuel', '300', '2', '2024-10-22', '2024-10-22', 'Photo', NULL, NULL, NULL, '2024-10-22', '2024-10-22 04:45:05', '2024-10-22 04:45:05', NULL, NULL, NULL, NULL, NULL, NULL),
(46, '24-0021-W3', '24-0021-W', 'Stwf1111', '32501', NULL, '2024-10-22', 'WF Standart Product', '234', 540594150, NULL, 'Aa', NULL, NULL, 'Queue', 'Gerson Manuel', '302', '3', '2024-10-22', '2024-10-22', 'Photo', NULL, NULL, NULL, '2024-10-22', '2024-10-22 04:45:05', '2024-10-22 04:45:05', NULL, NULL, NULL, NULL, NULL, NULL),
(47, '24-0005-W1', '24-0005-W', 'Q24-3003', '25991', NULL, '2024-10-24', 'Standart Product', '24-0005-W', 10093363, NULL, 'test 5: test ke 5', NULL, NULL, 'Delivered', 'bambang', '303', '2', '2024-10-23', '2024-10-23', 'Photo', NULL, NULL, NULL, '2024-10-23', '2024-10-23 14:41:28', '2024-10-25 09:23:20', 'Disetujui', 'Disetujui', 'Disetujui', 'oke', 'yes', 'lanjut kirim'),
(48, '24-0005-W2', '24-0005-W', 'Q24-3003', '28299', NULL, '2024-10-24', 'WF Customized Product', '24-0005-W', 10093363, NULL, 'test 5: test ke 5', NULL, NULL, 'Queue', 'bambang', '301', '2', '2024-10-23', '2024-10-23', 'Photo', NULL, NULL, NULL, '2024-10-23', '2024-10-23 14:41:28', '2024-10-23 14:41:28', NULL, NULL, NULL, NULL, NULL, NULL),
(52, 'STWF551', 'STWF55', 'STWF55', '31004', NULL, '2024-10-28', 'SPM', 'STWF55', 7565094, NULL, 'a', NULL, NULL, 'Queue', 'wf', '011-005', '5', '2024-10-28', '2024-10-28', 'Photo', NULL, NULL, NULL, '2024-10-28', '2024-10-28 14:34:00', '2024-10-28 14:34:00', NULL, NULL, NULL, NULL, NULL, NULL),
(53, 'STWF661', 'STWF66', 'STWF66', '31004', NULL, '2024-10-28', 'SPM', 'STWF66', 43437685, NULL, 'a', NULL, NULL, 'Queue', 'wf', '011-009', '5', '2024-10-28', '2024-10-28', 'Photo', NULL, NULL, NULL, '2024-10-28', '2024-10-28 14:58:19', '2024-10-28 14:58:19', NULL, NULL, NULL, NULL, NULL, NULL),
(54, 'STWF662', 'STWF66', 'STWF66', '26602', NULL, '2024-10-28', 'Precision Part', 'STWF66', 43437685, NULL, 'a', NULL, NULL, 'Queue', 'wf', '011-001', '5', '2024-10-28', '2024-10-28', 'Photo', NULL, NULL, NULL, '2024-10-28', '2024-10-28 14:58:19', '2024-10-28 14:58:19', NULL, NULL, NULL, NULL, NULL, NULL),
(55, 'STWF24061', 'STWF2406', 'Q24-internal', '28299', NULL, '2024-10-30', 'Standart Product', 'POSTWF2406', 2121676, NULL, 'test1', NULL, NULL, 'Queue', 'WF', '011-001', '1', '2024-10-30', '2024-10-30', 'Photo', NULL, NULL, NULL, '2024-10-30', '2024-10-29 09:27:32', '2024-10-29 09:27:32', NULL, NULL, NULL, NULL, NULL, NULL),
(56, 'STWF24062', 'STWF2406', 'Q24-internal', '28299', NULL, '2024-10-30', 'Standart Product', 'POSTWF2406', 2121676, NULL, 'test1', NULL, NULL, 'Queue', 'WF', '011-003', '1', '2024-10-30', '2024-10-30', 'Photo', NULL, NULL, NULL, '2024-10-30', '2024-10-29 09:27:32', '2024-10-29 09:27:32', NULL, NULL, NULL, NULL, NULL, NULL),
(58, '24-3007-W1', '24-3007-W', 'Q24-3006', '12345', NULL, '2024-10-28', 'WF Standart Product', 'GI/01-26/2024', 2203364, NULL, 'test', NULL, NULL, 'Queue', 'Bram', '011-001', '2', '2024-11-05', '2024-11-05', 'Photo', NULL, NULL, NULL, '2024-11-05', '2024-11-05 06:25:26', '2024-11-05 06:25:26', NULL, NULL, NULL, NULL, NULL, NULL),
(59, '24-3007-W2', '24-3007-W', 'Q24-3006', '28299', NULL, '2024-10-28', 'WF Standart Product', 'GI/01-26/2024', 2203364, NULL, 'test', NULL, NULL, 'Queue', 'Bram', '210-007', '3', '2024-11-05', '2024-11-05', 'Photo', NULL, NULL, NULL, '2024-11-05', '2024-11-05 06:25:26', '2024-11-05 06:25:26', NULL, NULL, NULL, NULL, NULL, NULL),
(60, '24-3307-W1', '24-3307-W', 'Q24-3006', '26602', NULL, '2024-10-28', 'WF Standart Product', 'GI/01-26/2024', 2203364, NULL, 'test', NULL, NULL, 'Queue', 'Bram', '011-001', '2', '2024-11-05', '2024-11-05', 'Photo', NULL, NULL, NULL, '2024-11-05', '2024-11-05 06:43:19', '2024-11-05 06:43:19', NULL, NULL, NULL, NULL, NULL, NULL),
(61, '24-3307-W2', '24-3307-W', 'Q24-3006', '26602', NULL, '2024-10-28', 'WF Customized Product', 'GI/01-26/2024', 2203364, NULL, 'test', NULL, NULL, 'Queue', 'Bram', '210-007', '3', '2024-11-05', '2024-11-05', 'Photo', NULL, NULL, NULL, '2024-11-05', '2024-11-05 06:43:19', '2024-11-05 06:43:19', NULL, NULL, NULL, NULL, NULL, NULL),
(62, '24-2308-W1', '24-2308-W', 'Q24-3007', '28221', NULL, '2024-11-06', 'SPM', 'PO24-2308-W', 21612266, NULL, 'yes', NULL, NULL, 'Queue', 'WF1', '210-003', '2', '2024-11-06', '2024-11-06', 'Photo', NULL, NULL, NULL, '2024-11-06', '2024-11-05 11:00:21', '2024-11-05 11:00:21', NULL, NULL, NULL, NULL, NULL, NULL),
(63, '24-2308-W2', '24-2308-W', 'Q24-3007', '28221', NULL, '2024-11-06', 'SPM', 'PO24-2308-W', 21612266, NULL, 'yes', NULL, NULL, 'Queue', 'WF1', '210-002', '2', '2024-11-06', '2024-11-06', 'Photo', NULL, NULL, NULL, '2024-11-06', '2024-11-05 11:00:21', '2024-11-05 11:00:21', NULL, NULL, NULL, NULL, NULL, NULL),
(64, '24-2309-W1', '24-2309-W', 'Q24-3008', '31004', NULL, '2024-11-11', 'SPM', 'PO24-2309-W', 21612266, NULL, 'test WF2', NULL, NULL, 'Finished', 'WF2', '210-002', '2', '2024-11-12', '2024-11-12', 'Photo', NULL, NULL, NULL, '2024-11-12', '2024-11-11 13:47:51', '2024-11-11 15:21:12', NULL, NULL, NULL, NULL, NULL, NULL),
(65, '24-2309-W2', '24-2309-W', 'Q24-3008', '31004', NULL, '2024-11-11', 'SPM', 'PO24-2309-W', 21612266, NULL, 'test WF2', NULL, NULL, 'Delivered', 'WF2', '210-003', '2', '2024-11-12', '2024-11-12', 'Photo', NULL, NULL, NULL, '2024-11-12', '2024-11-11 13:47:51', '2024-11-14 08:07:57', 'Disetujui', 'Disetujui', 'Disetujui', NULL, 'ok', 'ok'),
(66, '24-2310-W1', '24-2310-W', 'Q24-3009', '28221', NULL, '2024-11-22', 'Standart Product', 'po24-2310-W', 22812947, NULL, 'Q24-3009', NULL, NULL, 'Finished', 'Bram', '210-002', '2', '2024-11-22', '2024-11-22', 'Photo', NULL, NULL, NULL, '2024-11-22', '2024-11-15 06:05:04', '2024-11-15 06:39:14', NULL, NULL, NULL, NULL, NULL, NULL),
(67, '24-2310-W2', '24-2310-W', 'Q24-3009', '28221', NULL, '2024-11-22', 'Standart Product', 'po24-2310-W', 22812947, NULL, 'Q24-3009', NULL, NULL, 'Delivered', 'Bram', '210-003', '2', '2024-11-22', '2024-11-22', 'Photo', NULL, NULL, NULL, '2024-11-22', '2024-11-15 06:05:04', '2024-11-18 11:37:06', 'Disetujui', 'Disetujui', 'Disetujui', NULL, 'y', 'y'),
(68, '24-2311-W1', '24-2310-W', 'Q24-3009', '28221', NULL, '2024-11-22', 'Standart Product', 'po24-2310-W', 22812947, NULL, 'Q24-3009', NULL, NULL, 'Queue', 'Bram', '210-002', '2', '2024-11-22', '2024-11-22', 'Photo', NULL, NULL, NULL, '2024-11-22', '2024-11-19 19:39:48', '2024-11-19 22:00:12', NULL, NULL, NULL, NULL, NULL, NULL),
(69, '24-2311-W2', '24-2311-W', 'QINT24-2311-W', '26602', NULL, '2024-11-26', 'Standart Product', 'PO24-2311-W', 26802986, NULL, '1', NULL, NULL, 'Queue', 'ariel', '001-005', '3', '2024-11-26', '2024-11-26', 'Photo', NULL, NULL, NULL, '2024-11-26', '2024-11-19 19:39:48', '2024-11-19 19:39:48', NULL, NULL, NULL, NULL, NULL, NULL),
(70, '24-0021-W6', '24-0021-W', 'Stwf1111', '32501', NULL, '2024-10-22', 'WF Standart Product', '234', 540594150, NULL, 'Aa', NULL, NULL, 'Queue', 'Gerson Manuel', '302', '3', '2024-10-22', '2024-10-22', 'Photo', NULL, NULL, NULL, '2024-10-22', '2024-11-19 20:01:46', '2024-11-19 20:01:46', NULL, NULL, NULL, NULL, NULL, NULL),
(71, '24-0245-W6', '24-0245-W', 'q24-9999', '31004', '22', '2024-07-03', 'Standart Product', '123451', 30000, '30000', NULL, 'Warna RAL-3020', 'b', 'Queue', 'Pt. Acroe Indonesia', 'LEANTURN', '4', '2024-07-03', '2024-07-11', 'b', 'PLAT 3\'', 'a', 'b', '2024-07-11', '2024-11-19 20:13:16', '2024-11-19 20:13:16', 'Disetujui', 'Disetujui', 'Disetujui', 'ACC PRODUKSI', 'ACC MARKETING', '24/1101'),
(72, '24-1234-M9', '24-1234-M', 'Q24-1234', '28299', '22', '2024-07-11', 'SPM', 'BPR01', 1000000, '10000000', NULL, 'WARNA\r\n- STANDAR COLOUR', 'a', 'Delivered', 'BAMBANG SUWITO', 'Mobile File 2S2D-4 Row (Tinggi 2.8m)', '1', '2024-03-08', '2024-07-11', 'a', 'PLAT 3\'', 'a', 'b', '2024-07-11', '2024-11-19 20:15:25', '2024-11-19 20:15:25', 'Disetujui', 'Disetujui', 'Disetujui', 'acc 1', 'acc m', 'a'),
(73, '24-1234-M10', '24-1234-M', 'Q24-1234', '28299', '22', '2024-07-11', 'SPM', 'BPR01', 1000000, '10000000', NULL, 'WARNA\r\n- STANDAR COLOUR', 'a', 'Queue', 'BAMBANG SUWITO', 'Mobile File 2S2D-4 Row (Tinggi 2.8m)', '1', '2024-03-08', '2024-07-11', 'a', 'PLAT 3\'', 'a', 'b', '2024-07-11', '2024-11-19 21:08:43', '2024-11-19 21:08:43', 'Disetujui', 'Disetujui', 'Disetujui', 'acc 1', 'acc m', 'a'),
(74, '24-2310-W3', '24-2310-W', 'Q24-3009', '28221', NULL, '2024-11-22', 'Standart Product', 'po24-2310-W', 22812947, NULL, 'Q24-3009', NULL, NULL, 'Queue', 'Bram', '210-003', '2', '2024-11-22', '2024-11-22', 'Photo', NULL, NULL, NULL, '2024-11-22', '2024-11-19 21:34:28', '2024-11-19 21:34:28', 'Disetujui', 'Disetujui', 'Disetujui', NULL, 'y', 'y'),
(75, '24-2311-W1-1732027813', '24-2310-W', 'Q24-3009', '28221', NULL, '2024-11-22', 'Standart Product', 'po24-2310-W', 22812947, NULL, 'Q24-3009', NULL, NULL, 'Queue', 'Bram', '210-002', '2', '2024-11-22', '2024-11-22', 'Photo', NULL, NULL, NULL, '2024-11-22', '2024-11-19 21:50:13', '2024-11-19 21:50:13', NULL, NULL, NULL, NULL, NULL, NULL),
(77, '24-2312-W1', '24-2312-W', 'Q24-3009', '28299', NULL, '2024-11-22', 'Standart Product', 'PO24-2312-W', 22812947, NULL, 'Q24-3009', NULL, NULL, 'Queue', 'Bram', '210-002', '2', '2024-11-29', '2024-11-29', 'Photo', NULL, NULL, NULL, '2024-11-29', '2024-11-22 08:16:23', '2024-11-22 08:16:23', NULL, NULL, NULL, NULL, NULL, NULL),
(78, '24-2312-W2', '24-2312-W', 'Q24-3009', '26602', NULL, '2024-11-22', 'Standart Product', 'PO24-2312-W', 22812947, NULL, 'Q24-3009', NULL, NULL, 'Queue', 'Bram', '210-003', '2', '2024-11-29', '2024-11-29', 'Photo', NULL, NULL, NULL, '2024-11-29', '2024-11-22 08:16:24', '2024-11-22 08:16:24', NULL, NULL, NULL, NULL, NULL, NULL),
(79, '24-2311-M1', '24-2311-M', 'INT2311', '28299', NULL, '2024-11-23', 'Precision Part', '-', 3056974, NULL, '-', NULL, NULL, 'Delivered', 'Gerson Manuel', '011-005', '1', '2024-11-23', '2024-11-23', '3D Drawing', NULL, NULL, NULL, '2024-11-23', '2024-11-23 01:35:15', '2024-11-23 01:39:01', 'Disetujui', 'Disetujui', 'Disetujui', NULL, NULL, NULL),
(80, '24-2311-M2', '24-2311-M', 'INT2311', '26602', NULL, '2024-11-23', 'WF Standart Product', '-', 3056974, NULL, '-', NULL, NULL, 'Delivered', 'Gerson Manuel', '011-006', '1', '2024-11-23', '2024-11-23', '3D Drawing', NULL, NULL, NULL, '2024-11-23', '2024-11-23 01:35:15', '2024-11-23 02:14:43', 'Disetujui', 'Disetujui', 'Disetujui', NULL, NULL, NULL),
(81, '24-2313-W1', '24-2313-W', 'INT251124', '25991', NULL, '2024-12-04', 'Standart Product', 'PO24-2313-W', 21736708, NULL, 'test', NULL, NULL, 'Queue', 'Priyo', '210-002', '2', '2024-12-02', '2024-12-02', 'Photo', NULL, NULL, NULL, '2024-12-02', '2024-11-25 15:15:33', '2024-11-25 15:15:33', NULL, NULL, NULL, NULL, NULL, NULL),
(82, '24-2313-W2', '24-2313-W', 'INT251124', '25991', NULL, '2024-12-04', 'Standart Product', 'PO24-2313-W', 21736708, NULL, 'test', NULL, NULL, 'Queue', 'Priyo', '210-004', '2', '2024-12-02', '2024-12-02', 'Photo', NULL, NULL, NULL, '2024-12-02', '2024-11-25 15:15:33', '2024-11-25 15:15:33', NULL, NULL, NULL, NULL, NULL, NULL),
(83, 'STWF421', 'STWF42', 'BRP091231', '31004', NULL, '2024-11-25', 'SPM', 'STWF42', 6693300, NULL, 'a', NULL, NULL, 'Delivered', 'Adi Widya', '011-001', '5', '2024-11-25', '2024-11-25', 'Photo', NULL, NULL, NULL, '2024-11-25', '2024-11-25 18:46:34', '2024-12-06 11:57:38', 'Disetujui', 'Disetujui', 'Disetujui', NULL, 'silakan dikirim', 'DO24-1000'),
(84, 'STWF422', 'STWF42', 'BRP091231', '12345', NULL, '2024-11-25', 'SPM', 'STWF42', 6693300, NULL, 'a', NULL, NULL, 'Queue', 'Adi Widya', '011-014', '5', '2024-11-25', '2024-11-25', 'Photo', NULL, NULL, NULL, '2024-11-25', '2024-11-25 18:46:34', '2024-11-25 18:46:34', NULL, NULL, NULL, NULL, NULL, NULL),
(85, '24-2314-W1', '24-2314-W', 'INT24-2314-W', '25991', NULL, '2024-12-03', 'Standart Product', 'PO24-2314-W', 21736708, NULL, 'test1', NULL, NULL, 'Queue', 'Andy', '210-002', '2', '2024-12-03', '2024-12-03', 'Photo', NULL, NULL, NULL, '2024-12-03', '2024-11-26 10:34:15', '2024-11-26 10:34:15', NULL, NULL, NULL, NULL, NULL, NULL),
(86, '24-2314-W2', '24-2314-W', 'INT24-2314-W', '25991', NULL, '2024-12-03', 'Standart Product', 'PO24-2314-W', 21736708, NULL, 'test1', NULL, NULL, 'Queue', 'Andy', '210-004', '2', '2024-12-03', '2024-12-03', 'Photo', NULL, NULL, NULL, '2024-12-03', '2024-11-26 10:34:15', '2024-11-26 10:34:15', NULL, NULL, NULL, NULL, NULL, NULL),
(87, '24-2315-W1', '24-2315-W', 'Q24-3011', '28299', NULL, '2024-12-31', 'Standart Product', 'PO24-2315-W', 29921548, NULL, 'test1', NULL, NULL, 'Delivered', 'Kenshin', '210-002', '2', '2024-12-03', '2024-12-03', 'Photo', NULL, NULL, NULL, '2024-12-03', '2024-11-26 13:06:02', '2024-11-26 13:49:23', 'Disetujui', 'Disetujui', 'Disetujui', NULL, 'y', 'y'),
(88, '24-2315-W2', '24-2315-W', 'Q24-3011', '28299', NULL, '2024-12-31', 'Standart Product', 'PO24-2315-W', 29921548, NULL, 'test1', NULL, NULL, 'Delivered', 'Kenshin', '210-003', '3', '2024-12-03', '2024-12-03', 'Photo', NULL, NULL, NULL, '2024-12-03', '2024-11-26 13:06:02', '2024-11-26 13:49:54', 'Disetujui', 'Disetujui', 'Disetujui', NULL, 'ya', 'y'),
(89, '24-2811-W1', '24-2811-W', 'Q24-3012', '31004', NULL, '2024-11-28', 'SPM', '24-2811-W', 14181471, NULL, '28-11', NULL, NULL, 'QC Pass', 'bambang', '011-006', '5', '2024-11-28', '2024-11-28', 'Photo', NULL, NULL, NULL, '2024-11-28', '2024-11-28 16:35:12', '2024-11-28 16:41:41', 'Disetujui', NULL, NULL, NULL, NULL, NULL),
(90, '24-2811-W2', '24-2811-W', 'Q24-3012', '32502', NULL, '2024-11-28', 'Precision Part', '24-2811-W', 14181471, NULL, '28-11', NULL, NULL, 'Queue', 'bambang', '011-012', '5', '2024-11-28', '2024-11-28', 'Photo', NULL, NULL, NULL, '2024-11-28', '2024-11-28 16:35:12', '2024-11-28 16:35:12', NULL, NULL, NULL, NULL, NULL, NULL),
(93, '24-2911-W1', '24-2911-W', 'Q-24-2911-W', '31004', NULL, '2024-11-29', 'Standart Product', '24-2911-W', 1663335, NULL, 'ASD', NULL, NULL, 'Queue', 'WF', '210-010', '1', '2024-11-29', '2024-11-29', 'Photo', NULL, NULL, NULL, '2024-11-29', '2024-11-29 14:26:08', '2024-11-29 14:26:08', NULL, NULL, NULL, NULL, NULL, NULL),
(94, '24-2911-W2', '24-2911-W', 'Q-24-2911-W', '26602', NULL, '2024-11-29', 'WF Standart Product', '24-2911-W', 1663335, NULL, 'ASD', NULL, NULL, 'Queue', 'WF', '210-007', '5', '2024-11-29', '2024-11-29', 'Photo', NULL, NULL, NULL, '2024-11-29', '2024-11-29 14:26:08', '2024-11-29 14:26:08', NULL, NULL, NULL, NULL, NULL, NULL),
(95, 's1', 's', 'Q24-3008', '26602', NULL, '2024-11-11', 'Precision Part', 'BPR01', 21612266, NULL, 'test WF2', NULL, NULL, 'Queue', 'WF2', '210-002', '2', '2024-11-29', '2024-11-29', 'Photo', NULL, NULL, NULL, '2024-11-29', '2024-11-29 14:29:44', '2024-11-29 14:29:44', NULL, NULL, NULL, NULL, NULL, NULL),
(96, 's2', 's', 'Q24-3008', '25991', NULL, '2024-11-11', 'Precision Part', 'BPR01', 21612266, NULL, 'test WF2', NULL, NULL, 'Queue', 'WF2', '210-003', '2', '2024-11-29', '2024-11-29', 'Photo', NULL, NULL, NULL, '2024-11-29', '2024-11-29 14:29:44', '2024-11-29 14:29:44', NULL, NULL, NULL, NULL, NULL, NULL),
(97, '24-0212-W1', '24-0212-W', 'Q-0212-W', '21015', NULL, '2024-12-02', 'SPM', '24-0212-W', 3764065, NULL, 'A', NULL, NULL, 'Queue', 'COBA', '011-009', '1', '2024-12-02', '2024-12-02', 'Photo', NULL, NULL, NULL, '2024-12-02', '2024-12-02 12:40:44', '2024-12-02 12:40:44', NULL, NULL, NULL, NULL, NULL, NULL),
(98, '24-0212-W2', '24-0212-W', 'Q-0212-W', '32501', NULL, '2024-12-02', 'Precision Part', '24-0212-W', 3764065, NULL, 'A', NULL, NULL, 'Queue', 'COBA', '011-004', '2', '2024-12-02', '2024-12-02', 'Photo', NULL, NULL, NULL, '2024-12-02', '2024-12-02 12:40:44', '2024-12-02 12:40:44', NULL, NULL, NULL, NULL, NULL, NULL),
(99, 'STFW1011', 'STFW101', 'Q24-3014', '31004', NULL, '2024-12-02', 'SPM', 'STFW101', 8624700, NULL, 'a', NULL, NULL, 'QC Pass', 'UKM Futsal', '011-007', '1', '2024-12-02', '2024-12-02', 'Photo', NULL, NULL, NULL, '2024-12-02', '2024-12-02 12:58:58', '2024-12-02 13:27:33', 'Disetujui', NULL, NULL, NULL, NULL, NULL),
(100, 'STFW1012', 'STFW101', 'Q24-3014', '32502', NULL, '2024-12-02', 'Standart Product', 'STFW101', 8624700, NULL, 'a', NULL, NULL, 'QC Pass', 'UKM Futsal', '011-006', '4', '2024-12-02', '2024-12-02', 'Photo', NULL, NULL, NULL, '2024-12-02', '2024-12-02 12:58:58', '2024-12-02 13:27:40', 'Disetujui', NULL, NULL, NULL, NULL, NULL),
(101, 'STFW23101', 'STFW2310', 'INTSTFW2310', '25991', NULL, '2024-12-31', 'Standart Product', 'POSTFW2310', 3659337, NULL, '1', NULL, NULL, 'Queue', 'tommy', '105-029', '1', '2024-12-17', '2024-12-17', 'Photo', NULL, NULL, NULL, '2024-12-17', '2024-12-02 16:21:24', '2024-12-02 16:21:24', NULL, NULL, NULL, NULL, NULL, NULL),
(102, '24-1500-W1', '24-1500-W', 'Q24-3015', '31004', NULL, '2024-12-03', 'WF Customized Product', '1234', 7507185, NULL, '- Floor Cabinet 4D\r\nWarna RAL 1015 Gloss\r\n-  Filing Cabinet 2D\r\nWarna RAL 1015 Gloss', NULL, NULL, 'Delivered', 'Bp. Ag. Sigit Kurniawan', '001-001', '1', '2024-12-31', '2024-12-31', '3D Drawing', NULL, NULL, NULL, '2024-12-31', '2024-12-03 10:43:00', '2024-12-06 11:59:01', 'Disetujui', 'Disetujui', 'Disetujui', NULL, 'silakan kirim', 'DO1234'),
(103, '24-1500-W2', '24-1500-W', 'Q24-3015', '31004', NULL, '2024-12-03', 'WF Customized Product', '1234', 7507185, NULL, '- Floor Cabinet 4D\r\nWarna RAL 1015 Gloss\r\n-  Filing Cabinet 2D\r\nWarna RAL 1015 Gloss', NULL, NULL, 'Queue', 'Bp. Ag. Sigit Kurniawan', '101-001', '1', '2024-12-31', '2024-12-31', '3D Drawing', NULL, NULL, NULL, '2024-12-31', '2024-12-03 10:43:00', '2024-12-03 10:43:00', NULL, NULL, NULL, NULL, NULL, NULL),
(104, 'Int24-1500-W1', 'Int24-1500-W', 'Int24-1500-W', '31004', NULL, '2024-12-20', 'Standart Product', '-', 11088900, NULL, 'stock internal', NULL, NULL, 'Queue', 'coba wf', '001-001', '2', '2024-12-20', '2024-12-20', 'None', NULL, NULL, NULL, '2024-12-20', '2024-12-06 11:49:01', '2024-12-06 11:49:01', NULL, NULL, NULL, NULL, NULL, NULL),
(105, '24-0881-M1', '24-0881-M', 'Q24-1234', '31004', NULL, '2024-02-02', 'SPM', 'GI/01-26/2024', 410000000, NULL, 'WARNA\r\n- STANDAR COLOUR', NULL, NULL, 'Queue', 'BAMBANG SUWITO', '001', '2', '2024-12-15', '2024-12-15', '2D Drawing', NULL, NULL, NULL, '2024-12-15', '2024-12-15 11:45:30', '2024-12-15 11:45:30', NULL, NULL, NULL, NULL, NULL, NULL),
(106, '24-0881-M2', '24-0881-M', 'Q24-1234', '33122', NULL, '2024-02-02', 'SPM', 'GI/01-26/2024', 410000000, NULL, 'WARNA\r\n- STANDAR COLOUR', NULL, NULL, 'Queue', 'BAMBANG SUWITO', '002', '2', '2024-12-15', '2024-12-15', '2D Drawing', NULL, NULL, NULL, '2024-12-15', '2024-12-15 11:45:30', '2024-12-15 11:45:30', NULL, NULL, NULL, NULL, NULL, NULL),
(107, '24-1612-W1', '24-1612-W', '24-1612-W', '32501', NULL, '2024-12-16', 'SPM', '24-1612-W', 249750, NULL, 'a', NULL, NULL, 'Queue', 'Yulius', '210-007', '2', '2024-12-16', '2024-12-16', 'Photo', NULL, NULL, NULL, '2024-12-16', '2024-12-16 15:42:16', '2024-12-16 15:42:16', NULL, NULL, NULL, NULL, NULL, NULL),
(108, '24-1612-W2', '24-1612-W', '24-1612-W', '28221', NULL, '2024-12-16', 'Precision Part', '24-1612-W', 249750, NULL, 'a', NULL, NULL, 'Queue', 'Yulius', '210-010', '1', '2024-12-16', '2024-12-16', 'Photo', NULL, NULL, NULL, '2024-12-16', '2024-12-16 15:42:16', '2024-12-16 15:42:16', NULL, NULL, NULL, NULL, NULL, NULL),
(109, '24-1216-M1', '24-1216-M', 'Q24-1234', '21015', NULL, '2024-02-02', 'SPM', 'GI/01-26/2024', 580000000, NULL, 'WARNA\r\n- STANDAR COLOUR', NULL, NULL, 'Queue', 'BAMBANG SUWITO', '001', '2', '2024-12-16', '2024-12-16', '2D Drawing', NULL, NULL, NULL, '2024-12-16', '2024-12-16 16:32:21', '2024-12-16 16:32:21', NULL, NULL, NULL, NULL, NULL, NULL),
(110, '24-1216-M2', '24-1216-M', 'Q24-1234', '26602', NULL, '2024-02-02', 'SPM', 'GI/01-26/2024', 410000000, NULL, 'WARNA\r\n- STANDAR COLOUR', NULL, NULL, 'Queue', 'BAMBANG SUWITO', '002', '2', '2024-12-16', '2024-12-16', '2D Drawing', NULL, NULL, NULL, '2024-12-16', '2024-12-16 16:32:21', '2024-12-16 16:32:21', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_unit`
--

CREATE TABLE `order_unit` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_order_unit` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code_order` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `order_unit`
--

INSERT INTO `order_unit` (`id`, `id_order_unit`, `name`, `code_order`, `created_at`, `updated_at`) VALUES
(1, '1', 'MDC', 'M', '2024-01-29 02:43:45', '2024-01-29 02:43:45'),
(2, '2', 'WF', 'W', '2024-01-29 02:43:58', '2024-01-29 02:43:58'),
(3, '3', 'Internal', 'I', '2024-01-29 02:44:11', '2024-01-29 02:44:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `overhead`
--

CREATE TABLE `overhead` (
  `id` bigint(20) NOT NULL,
  `order_number` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `so_no` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `ref` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `info` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `overhead`
--

INSERT INTO `overhead` (`id`, `order_number`, `so_no`, `tanggal`, `description`, `ref`, `jumlah`, `keterangan`, `info`) VALUES
(1, '24-1234-M7', '2', '2024-08-17', 'transport', '22/', 3000000, 'transport', '5'),
(2, '24-0132-NEW', '1', '2024-09-13', 'aa', '22/', 30000, 'Z', 'aa'),
(3, '24-0132-NEW', '2', '2024-09-14', 'aa', '22/a', 30000, 'z', 'aa'),
(4, '24-0001-W1', '1', '2024-10-15', 'instal', 'SOW', 500000, 'instal dilokasi', 'instal dilokasi'),
(5, 'STWF661', '1', '2024-10-28', 'b', 'bb', 90000, 'b', 'k'),
(6, '24-2811-W1', '1', '2024-11-28', 'b', 'bb', 150000, 'a', 'a'),
(8, '24-1500-W1', '1', '2024-12-04', 'pengambilan material', 'SOW', 1000000, 'material dari customer', 'biaya ekspedisi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `plan`
--

CREATE TABLE `plan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plan_name` varchar(255) NOT NULL,
  `total_group` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `plan`
--

INSERT INTO `plan` (`id`, `plan_name`, `total_group`, `created_at`, `updated_at`) VALUES
(2, 'WF', 12, '2024-01-29 02:43:31', '2024-08-14 10:49:29'),
(3, 'EDU', 12, '2024-02-02 06:09:35', '2024-07-10 13:31:08'),
(4, 'MDC', 9, '2024-02-02 06:14:05', '2024-07-10 13:18:50'),
(5, 'Support', 10, '2024-07-10 01:44:21', '2024-07-10 13:41:08'),
(6, 'STP', 10, '2024-07-10 01:44:36', '2024-07-10 13:48:07'),
(7, 'tes', 1, '2024-08-14 11:40:28', '2024-08-14 11:40:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `planadd`
--

CREATE TABLE `planadd` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plan_name` varchar(255) NOT NULL,
  `group` varchar(255) DEFAULT NULL,
  `group_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `planadd`
--

INSERT INTO `planadd` (`id`, `plan_name`, `group`, `group_id`, `created_at`, `updated_at`) VALUES
(35, 'MDC', 'ASSY', '9', '2024-07-10 13:18:50', '2024-07-10 13:18:50'),
(36, 'MDC', 'MILLING', '10', '2024-07-10 13:18:50', '2024-07-10 13:18:50'),
(37, 'MDC', 'LW MDC', '7', '2024-07-10 13:18:50', '2024-07-10 13:18:50'),
(38, 'MDC', 'WELD MDC', '4', '2024-07-10 13:18:50', '2024-07-10 13:18:50'),
(39, 'MDC', 'SAW', '12', '2024-07-10 13:18:50', '2024-07-10 13:18:50'),
(40, 'MDC', 'ASSY EL', '8', '2024-07-10 13:18:50', '2024-07-10 13:18:50'),
(41, 'MDC', 'LW MANUAL', '72', '2024-07-10 13:18:50', '2024-07-10 13:18:50'),
(42, 'MDC', 'MILL MANUAL', '73', '2024-07-10 13:18:50', '2024-07-10 13:18:50'),
(43, 'MDC', 'UN GR ST', '74', '2024-07-10 13:18:50', '2024-07-10 13:18:50'),
(55, 'EDU', 'EDU MAKER', '99', '2024-07-10 13:31:08', '2024-07-10 13:31:08'),
(56, 'EDU', 'LW WBS', '41', '2024-07-10 13:31:08', '2024-07-10 13:31:08'),
(57, 'EDU', 'LW WAP', '35', '2024-07-10 13:31:08', '2024-07-10 13:31:08'),
(58, 'EDU', 'MILL WAP', '37', '2024-07-10 13:31:08', '2024-07-10 13:31:08'),
(59, 'EDU', 'TL GR CT', '23', '2024-07-10 13:31:08', '2024-07-10 13:31:08'),
(60, 'EDU', 'SLOT WAD', '30', '2024-07-10 13:31:08', '2024-07-10 13:31:08'),
(61, 'EDU', 'SF GR CT', '22', '2024-07-10 13:31:08', '2024-07-10 13:31:08'),
(62, 'EDU', 'LW CNC W', '27', '2024-07-10 13:31:08', '2024-07-10 13:31:08'),
(63, 'EDU', 'BW WAP', '32', '2024-07-10 13:31:08', '2024-07-10 13:31:08'),
(64, 'EDU', 'LW WBS', '41', '2024-07-10 13:31:08', '2024-07-10 13:31:08'),
(65, 'EDU', 'MILL WBS', '42', '2024-07-10 13:31:08', '2024-07-10 13:31:08'),
(66, 'EDU', 'DRILL WAP', '33', '2024-07-10 13:31:08', '2024-07-10 13:31:08'),
(78, 'Support', 'MN', '15', '2024-07-10 13:41:08', '2024-07-10 13:41:08'),
(79, 'Support', 'PPIC', '20', '2024-07-10 13:41:08', '2024-07-10 13:41:08'),
(80, 'Support', 'TC', '19', '2024-07-10 13:41:08', '2024-07-10 13:41:08'),
(81, 'Support', 'LOG', '11', '2024-07-10 13:41:08', '2024-07-10 13:41:08'),
(82, 'Support', 'IT', '16', '2024-07-10 13:41:08', '2024-07-10 13:41:08'),
(83, 'Support', 'CUT WF', '49', '2024-07-10 13:41:08', '2024-07-10 13:41:08'),
(84, 'Support', 'FTW WF', '51', '2024-07-10 13:41:08', '2024-07-10 13:41:08'),
(85, 'Support', 'GR CUT WF', '52', '2024-07-10 13:41:08', '2024-07-10 13:41:08'),
(86, 'Support', 'PUN MAN', '58', '2024-07-10 13:41:08', '2024-07-10 13:41:08'),
(87, 'Support', 'PUN CNC', '59', '2024-07-10 13:41:08', '2024-07-10 13:41:08'),
(88, 'STP', 'MILL MANUAL STP', '73', '2024-07-10 13:48:07', '2024-07-10 13:48:07'),
(89, 'STP', 'UN GR STP', '74', '2024-07-10 13:48:07', '2024-07-10 13:48:07'),
(90, 'STP', 'SF GR STP', '75', '2024-07-10 13:48:07', '2024-07-10 13:48:07'),
(91, 'STP', 'LW CNC STP', '76', '2024-07-10 13:48:07', '2024-07-10 13:48:07'),
(92, 'STP', 'MILL CNC STP', '77', '2024-07-10 13:48:07', '2024-07-10 13:48:07'),
(93, 'STP', 'HK', '10', '2024-07-10 13:48:07', '2024-07-10 13:48:07'),
(94, 'STP', 'MT', '17', '2024-07-10 13:48:07', '2024-07-10 13:48:07'),
(95, 'STP', 'MN', '15', '2024-07-10 13:48:07', '2024-07-10 13:48:07'),
(96, 'STP', 'PPIC', '20', '2024-07-10 13:48:07', '2024-07-10 13:48:07'),
(97, 'STP', 'TC', '19', '2024-07-10 13:48:07', '2024-07-10 13:48:07'),
(109, 'WF', 'PUNCH', '1', '2024-08-14 10:49:29', '2024-08-14 10:49:29'),
(110, 'WF', 'BEND', '2', '2024-08-14 10:49:29', '2024-08-14 10:49:29'),
(111, 'WF', 'WELD', '3', '2024-08-14 10:49:29', '2024-08-14 10:49:29'),
(112, 'WF', 'Assembly', '4', '2024-08-14 10:49:29', '2024-08-14 10:49:29'),
(113, 'WF', 'WELD WF', '44', '2024-08-14 10:49:29', '2024-08-14 10:49:29'),
(114, 'WF', 'BEND MAIN', '47', '2024-08-14 10:49:29', '2024-08-14 10:49:29'),
(115, 'WF', 'CUT WF', '49', '2024-08-14 10:49:29', '2024-08-14 10:49:29'),
(116, 'WF', 'DRILL WF', '50', '2024-08-14 10:49:29', '2024-08-14 10:49:29'),
(117, 'WF', 'SPOT WELD', '61', '2024-08-14 10:49:29', '2024-08-14 10:49:29'),
(118, 'WF', 'BEND CN', '46', '2024-08-14 10:49:29', '2024-08-14 10:49:29'),
(119, 'WF', 'Salvagnini', '86', '2024-08-14 10:49:29', '2024-08-14 10:49:29'),
(120, 'WF', 'FTW', '90', '2024-08-14 10:49:29', '2024-08-14 10:49:29'),
(121, 'tes', 'tes', '73', '2024-08-14 11:40:28', '2024-08-14 11:40:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `processing`
--

CREATE TABLE `processing` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(255) DEFAULT NULL,
  `item_no` varchar(255) DEFAULT NULL,
  `dod` date DEFAULT NULL,
  `item` varchar(255) DEFAULT NULL,
  `total_process` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `processing`
--

INSERT INTO `processing` (`id`, `order_number`, `item_no`, `dod`, `item`, `total_process`, `created_at`, `updated_at`) VALUES
(1, '24-0132-W1', '1', '2024-07-24', 'R', '90000', '2024-06-30 20:06:26', '2024-06-30 20:06:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `processingadd`
--

CREATE TABLE `processingadd` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(255) DEFAULT NULL,
  `no_process` varchar(255) DEFAULT NULL,
  `nos` varchar(255) DEFAULT NULL,
  `machine` varchar(255) DEFAULT NULL,
  `group_name` varchar(255) DEFAULT NULL,
  `operation` varchar(255) DEFAULT NULL,
  `estimated_time` varchar(255) DEFAULT NULL,
  `date_wanted` varchar(255) DEFAULT NULL,
  `barcode_id` varchar(255) DEFAULT NULL,
  `mach_cost` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `production_sheet`
--

CREATE TABLE `production_sheet` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `so_no` varchar(255) NOT NULL,
  `dod` date NOT NULL,
  `assy_drawing` varchar(255) NOT NULL,
  `po_ref` varchar(255) NOT NULL,
  `no_prod` varchar(255) NOT NULL,
  `no_item` varchar(255) NOT NULL,
  `no_drawing` varchar(255) NOT NULL,
  `date_wanted` date NOT NULL,
  `no_piece` varchar(255) NOT NULL,
  `material` varchar(255) NOT NULL,
  `no_blank` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `blank_size` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `rack` varchar(255) NOT NULL,
  `issued` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `amount` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `production_sheet`
--

INSERT INTO `production_sheet` (`id`, `order_number`, `customer`, `product`, `so_no`, `dod`, `assy_drawing`, `po_ref`, `no_prod`, `no_item`, `no_drawing`, `date_wanted`, `no_piece`, `material`, `no_blank`, `weight`, `blank_size`, `item_name`, `rack`, `issued`, `created_at`, `updated_at`, `amount`) VALUES
(1, '15-0114-W01', 'Almik Kurnia', 'Almik Kurnia', '15-0114-W', '2015-04-06', '', 'J15-0006', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_type`
--

CREATE TABLE `product_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_product_type` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `product_type`
--

INSERT INTO `product_type` (`id`, `id_product_type`, `product_name`, `created_at`, `updated_at`) VALUES
(1, '1', 'SPM', '2024-01-29 02:48:59', '2024-01-29 02:48:59'),
(2, '2', 'Precision Part', '2024-01-29 02:48:59', '2024-01-29 02:48:59'),
(3, '3', 'Standart Product', '2024-01-29 02:48:59', '2024-01-29 02:48:59'),
(4, '4', 'WF Standart Product', '2024-01-29 02:48:59', '2024-01-29 02:48:59'),
(5, '5', 'WF Customized Product', '2024-01-29 02:48:59', '2024-01-29 02:48:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `quotation`
--

CREATE TABLE `quotation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quotation_no` varchar(255) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `npwp` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `tax_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `confirmation` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `sample` varchar(255) DEFAULT NULL,
  `ass_type` varchar(255) DEFAULT NULL,
  `qc_statement` varchar(255) DEFAULT NULL,
  `packing_type` varchar(255) DEFAULT NULL,
  `top` varchar(255) DEFAULT NULL,
  `net_days` varchar(255) DEFAULT NULL,
  `ptp` varchar(255) DEFAULT NULL,
  `dod` varchar(255) DEFAULT NULL,
  `shipping_address` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `valid` date DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `salesman` varchar(255) DEFAULT NULL,
  `discount_percent` varchar(255) DEFAULT NULL,
  `tax_type` varchar(255) DEFAULT NULL,
  `subtotal` varchar(255) DEFAULT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `tax` varchar(255) DEFAULT NULL,
  `freight` varchar(255) DEFAULT NULL,
  `total_amount` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `quotation`
--

INSERT INTO `quotation` (`id`, `quotation_no`, `company_name`, `name`, `date`, `address`, `npwp`, `phone`, `fax`, `tax_address`, `email`, `confirmation`, `type`, `description`, `sample`, `ass_type`, `qc_statement`, `packing_type`, `top`, `net_days`, `ptp`, `dod`, `shipping_address`, `file`, `valid`, `mdp`, `salesman`, `discount_percent`, `tax_type`, `subtotal`, `discount`, `tax`, `freight`, `total_amount`, `created_at`, `updated_at`) VALUES
(1, 'Q24-0267', 'GUNNEBO INDONESIA DISTRIBUTION PT', 'GUNNEBO INDONESIA DISTRIBUTION PT', '2024-01-26', 'Grha Gunnebo Indonesia Lt. 5', '83.524.320.5-023.000', '02100000', '02100000', 'Grha Gunnebo Indonesia Lt. 5', NULL, 'Meet', 'New', 'WF\r\n- Mobile File 2S16D-3 Row (Tinggi 2.8m)', 'Photo', 'in ATMI', 'QC Sheet', 'Wood Packing', 'NET', '30', 'Exclude', '4', 'Grha Gunnebo Indonesia Lt. 5', NULL, '2024-02-16', '50', 'Mba Sales', '0', '1', ' 1682261000', ' 0', ' 185048710', ' 0', ' 1867309710', '2024-01-29 03:15:21', '2024-01-29 03:29:10'),
(2, 'Q24-1234', 'BUANA PRIMA RAYA PT', 'BAMBANG SUWITO', '2024-02-02', 'KALIMALANG, BEKASI', '12.345.678.9-098.765', '081232131231', '02132131', 'KALIMALANG, BEKASI', 'bambang@buana.com', 'by Phone', 'Repeat', 'WARNA\r\n- STANDAR COLOUR', '2D Drawing', 'in ATMI', 'Assy Test Report', 'Special Packing', 'NET', '30', 'Include', '4', 'KALIMALANG, BEKASI', NULL, '2024-03-08', '40', 'Mba Sales', '5', '1', ' 990000000', ' 49500000', ' 103455000', ' 0', ' 1043955000', '2024-02-02 07:12:09', '2024-02-02 07:12:54'),
(4, 'Q24-1408', 'GUNNEBO INDONESIA DISTRIBUTION PT', 'GUNNEBO INDONESIA DISTRIBUTION PT', '2024-08-14', 'Grha Gunnebo Indonesia Lt. 5', '83.524.320.5-023.000', '02100000', '02100000', 'Grha Gunnebo Indonesia Lt. 5', 'ycaesar01@gmail.com', 'Meet', 'New', '123', 'Photo', 'in ATMI', 'QC Sheet', 'Cartoon Packing', 'NET', '30', 'Include', '5', 'Grha Gunnebo Indonesia Lt. 5', NULL, '2024-08-14', '10', 'Eni W', '0', '3', ' 250000', ' 0', ' 5000', ' 0', '255000', '2024-08-14 11:48:55', '2024-08-14 11:48:55'),
(5, 'Q24-0100', 'ACROE INDONESIA PT', 'Pt. Acroe Indonesia', '2024-08-21', 'Komp. Roxy Mas Blok C-3 No. 5', '01.572.661.5-028.000', '021 - 630 3026 / 27', '021 - 633 1073', 'Komp. Roxy Mas Blok C-3 No. 5', 'acroe@centrin.net.id', 'Meet', 'New', 'Filing Cabinet 4D\r\nGrey RAL 7042 Matt', '2D Drawing', 'in ATMI', 'QC Sheet', 'Wood Packing', 'NET', '30', 'Exclude', '12', 'Komp. Roxy Mas Blok C-3 No. 5', NULL, '2024-09-20', '40', 'Albert Simanjuntak', '10', '1', ' 15680000', ' 1568000', ' 1552320', ' 0', ' 15664320', '2024-08-21 11:01:51', '2024-08-21 11:01:51'),
(6, 'Q24-0101', 'ACROE INDONESIA PT', 'Pt. Acroe Indonesia', '2024-09-11', 'Komp. Roxy Mas Blok C-3 No. 5', '01.572.661.5-028.000', '021 - 630 3026 / 27', '021 - 633 1073', 'Komp. Roxy Mas Blok C-3 No. 5', 'acroe@centrin.net.id', 'Meet', 'New', 'abc', 'Photo', 'in ATMI', 'QC Sheet', 'Cartoon Packing', 'CBD', '30', 'Include', '5', 'Komp. Roxy Mas Blok C-3 No. 5', NULL, '2024-09-11', '0', 'Albert Simanjuntak', '0', '2', ' 21289800', ' 0', ' 532245', ' 0', ' 21822045', '2024-09-11 14:27:07', '2024-09-11 14:27:07'),
(9, 'Q24-01345', 'Tokopedia', 'UKM Futsal', '2024-09-23', 'asd', '123123123', '123123123123', '123123', '123123', 'ycaesar01@gmail.com', 'Meet', 'New', 'asd', 'Photo', 'in ATMI', 'QC Sheet', 'Cartoon Packing', 'NET', '30', 'Include', '5', 'asd', NULL, '2024-09-23', '0', 'Albert Simanjuntak', '0', '1', ' 15967350', ' 0', ' 1756408', ' 0', ' 17723758', '2024-09-23 14:16:59', '2024-09-23 14:16:59'),
(10, 'Q24-1235', 'CAHAYA GUNUNG FOODS', 'Bp. Ag. Sigit Kurniawan', '2024-09-23', 'Boyolali', '01.572.661.5-028.000', '0271-714390', '-', 'Boyolali', 'email@email.com', 'Meet', 'New', 'despkripsi', 'Photo', 'in ATMI', 'QC Sheet', 'Wood Packing', 'NET', '14', 'Include', '6', 'Boyolali', NULL, '2024-09-24', '0', 'Mba Sales', '0', '1', ' 5494500', ' 0', ' 604395', ' 0', ' 6098895', '2024-09-23 14:17:30', '2024-09-23 14:17:30'),
(12, 'Q24-9987', 'PT Kembar', 'Adi Widya', '2024-10-03', 'a', '83.524.320.5-023.000', '1023019283012', '021 - 633 1073', 'a', '-', 'Meet', 'New', 'a', 'Photo', 'in ATMI', 'QC Sheet', 'Cartoon Packing', 'COD', '30', 'Include', '5', 'a', NULL, '2024-10-18', '0', 'Tes', '0', '1', ' 45465600', ' 0', ' 5001216', ' 0', ' 50466816', '2024-10-03 11:23:51', '2024-10-03 11:23:51'),
(13, 'Q24-0190', 'ATMI', 'atmi', '2024-10-03', 'a', '01.572.661.5-028.000', '85156389299', '021 - 633 1073', 'a', '-', 'Meet', 'New', 'a', 'Photo', 'in ATMI', 'QC Sheet', 'Cartoon Packing', 'NET', '30', 'Exclude', '5', 'a', NULL, '2024-10-03', '0', 'ruby', '10', '1', ' 2497500', ' 249750', ' 247252', ' 0', ' 2495002', '2024-10-03 14:01:29', '2024-10-14 15:35:06'),
(14, 'Q24-9098', 'ACROE INDONESIA PT', 'Pt. Acroe Indonesia', '2024-10-14', 'Komp. Roxy Mas Blok C-3 No. 5', '01.572.661.5-028.000', '021 - 630 3026 / 27', '021 - 633 1073', 'Komp. Roxy Mas Blok C-3 No. 5', 'acroe@centrin.net.id', 'Meet', 'New', '2662250', 'Photo', 'in ATMI', 'QC Sheet', 'Cartoon Packing', 'COD', '30', 'Include', '5', 'Komp. Roxy Mas Blok C-3 No. 5', NULL, '2024-10-14', '40', 'ruby', '10', '1', ' 23951025', ' 2395102', ' 2371151', ' 0', ' 23927073', '2024-10-14 14:03:09', '2024-10-14 14:03:09'),
(15, '23001', 'pt andro', 'andro', '2024-10-14', 'solo', '00.000.000.0-000.000', '0271001', '0271001', 'Solo', 'andro@andro.com', 'Meet', 'New', 'barang andro', '3D Drawing', 'in ATMI', 'QC Sheet', 'Cartoon Packing', 'COD', '30', 'Include', '123', 'solo', NULL, '2024-10-15', '10', 'natalia', '0', NULL, ' 97352550', ' 0', ' 0', ' 0', ' 97352550', '2024-10-14 15:25:28', '2024-10-14 15:34:10'),
(16, 'Q24-23002', 'PT Andalan Utama', 'bambang', '2024-10-15', 'solo', '00.000.000.0-000.000', '-', '-', 'solo', '-', 'Meet', 'Repeat', 'barang anda', 'Photo', 'in ATMI', 'QC Sheet', 'Cartoon Packing', 'COD', '30', 'Include', '123', 'Solo', NULL, '2024-10-16', '0', NULL, '0', NULL, ' 9619260', ' 0', ' 0', ' 0', ' 9619260', '2024-10-15 10:17:12', '2024-10-16 04:16:01'),
(18, 'Q24-3003', 'PT Andalan Utama', 'bambang', '2024-10-24', 'solo', '00.000.000.0-000.000', '-', '-', 'solo', '-', 'Meet', 'New', 'test 5: test ke 5', 'Photo', 'in ATMI', 'QC Sheet', 'Cartoon Packing', 'COD', NULL, 'Include', '111', 'Solo', NULL, '2024-10-23', '5', 'natalia', '0', NULL, ' 9093120', ' 0', ' 0', ' 0', ' 9093120', '2024-10-21 07:55:55', '2024-10-21 07:55:55'),
(19, 'Q24-3004', 'GUNNEBO INDONESIA DISTRIBUTION PT', 'GUNNEBO INDONESIA DISTRIBUTION PT', '2024-10-23', 'Grha Gunnebo Indonesia Lt. 5', '83.524.320.5-023.000', '02100000', '02100000', 'Grha Gunnebo Indonesia Lt. 5', 'admin@atmi.com', 'Meet', 'New', 'a', 'Photo', 'in ATMI', 'QC Sheet', 'Cartoon Packing', 'COD', '30', 'Include', '5', 'Grha Gunnebo Indonesia Lt. 5', NULL, '2024-10-23', '0', 'Albert Simanjuntak', '0', '1', ' 10816950', ' 0', ' 1189864', ' 0', '12006814', '2024-10-23 14:20:16', '2024-10-23 14:20:16'),
(20, 'Q24-3005', 'ACROE INDONESIA PT', 'Pt. Acroe Indonesia', '2024-10-24', 'Komp. Roxy Mas Blok C-3 No. 5', '01.572.661.5-028.000', '021 - 630 3026 / 27', '021 - 633 1073', 'Komp. Roxy Mas Blok C-3 No. 5', 'acroe@centrin.net.id', 'Meet', 'New', 'w', 'Photo', 'in ATMI', 'QC Sheet', 'Cartoon Packing', 'COD', '30', 'Include', '123', 'Komp. Roxy Mas Blok C-3 No. 5', NULL, '2024-10-24', '0', 'ruby', '0', NULL, ' 4546560', ' 0', ' 0', ' 0', '4546560', '2024-10-25 07:48:57', '2024-10-25 07:48:57'),
(21, 'Q24-3006', 'PT JAYA', 'Bram', '2024-10-28', 'jakarta', '00.000.000.0-000.000', '-', '-', 'jakarta', '-', 'Meet', 'New', 'test', 'Photo', 'in ATMI', 'QC Sheet', 'Cartoon Packing', 'COD', '0', 'Include', '10', 'jakarta', NULL, '2024-11-28', '40', 'Mba Sales', '10', '1', ' 2205570', ' 220557', ' 218351', ' 0', '2203364', '2024-10-28 10:54:46', '2024-10-30 17:49:12'),
(22, 'Q24-3007', 'WF1', 'WF1', '2024-11-06', 'solo', '00.000.000.0-000.000', '-', '-', 'solo', '-', 'Meet', 'New', 'yes', 'Photo', 'in ATMI', 'QC Sheet', 'Cartoon Packing', 'COD', '30', 'Include', '111', 'Solo', 'SURAT EDARAN Surat Edaran Tata Kelola Parkir Sehubungan dengan Acara Puncak Michael Day 2024.pdf', '2024-11-06', '10', 'Eni W', '10', '1', ' 21633900', ' 2163390', ' 2141756', ' 0', ' 21612266', '2024-11-05 08:40:04', '2024-11-05 08:40:19'),
(23, 'Q24-3008', 'WF2', 'WF2', '2024-11-11', 'WF2', '00.000.000.0-000.000', '-', '-', '-', '-', 'Meet', 'New', 'test WF2', 'Photo', 'in ATMI', 'QC Sheet', 'Cartoon Packing', 'COD', '30', 'Include', '10', 'Solo', NULL, '2024-11-12', '10', 'Natalia', '10', '1', ' 21633900', ' 2163390', ' 2141756', ' 0', ' 21612266', '2024-11-11 13:22:37', '2024-11-11 13:22:37'),
(24, 'Q24-3009', 'PT JAYA', 'Bram', '2024-11-22', 'jakarta', '00.000.000.0-000.000', '-', '-', 'jakarta', '-', 'Meet', 'New', 'Q24-3009', 'Photo', 'in ATMI', 'QC Sheet', 'Cartoon Packing', 'COD', '10', 'Include', '123', 'jakarta', 'Denah KOLESE MIKAEL_KARANGASEM-Model.pdf', '2024-11-22', '0', 'Ruby', '5', '1', ' 21633900', ' 1081695', ' 2260742', ' 0', ' 22812947', '2024-11-15 05:54:53', '2024-11-15 05:54:53'),
(25, 'Q24-3010', 'GUNNEBO INDONESIA DISTRIBUTION PT', 'GUNNEBO INDONESIA DISTRIBUTION PT', '2024-11-25', 'Grha Gunnebo Indonesia Lt. 5', '83.524.320.5-023.000', '02100000', '02100000', 'Grha Gunnebo Indonesia Lt. 5', '-', 'Meet', 'New', 'a', 'Photo', 'in ATMI', 'QC Sheet', 'Cartoon Packing', 'NET', '30', 'Include', '5', 'Grha Gunnebo Indonesia Lt. 5', NULL, '2024-11-25', '0', 'Albert Simanjuntak', '0', '1', ' 7115100', ' 0', ' 782661', ' 0', ' 7897761', '2024-11-25 18:44:56', '2024-11-25 18:44:56'),
(26, 'Q24-3011', 'JAWADWIPA', 'Kenshin', '2024-12-31', 'Solo', '52.462.456.3-456.345', '085642211111', '085642211111', 'Solo', 'kenshin@kenshin.com', 'Meet', 'New', 'test1', 'Photo', 'in ATMI', 'QC Sheet', 'Cartoon Packing', 'COD', '30', 'Include', '2', 'Solo', 'a.pdf', '2024-12-03', '0', 'Natalia', '0', '1', ' 26956350', ' 0', ' 2965198', ' 0', ' 29921548', '2024-11-26 13:04:10', '2024-11-26 13:04:10'),
(27, 'Q24-3012', 'PT Andalan Utama', 'bambang', '2024-11-28', 'solo', '00.000.000.0-000.000', '-', '-', 'solo', '-', 'Meet', 'New', '28-11', 'Photo', 'in ATMI', 'QC Sheet', 'Cartoon Packing', 'NET', '30', 'Include', '5', 'Solo', NULL, '2024-11-28', '10', 'Mba Sales', '0', '1', ' 12776100', ' 0', ' 1405371', ' 0', ' 14181471', '2024-11-28 16:33:42', '2024-11-28 16:33:42'),
(28, 'Q24-3013', 'Tokopedia', 'UKM Futsal', '2024-11-29', 'asd', '123123123', '123123123123', '123123', '123123', 'ycaesar01@gmail.com', 'Meet', 'New', 'asd', 'Photo', 'in ATMI', 'Assy Test Report', 'Cartoon Packing', 'NET', '30', 'Include', '5', 'asd', NULL, '2024-11-29', '0', 'Eni W', '0', '1', ' 32162250', ' 0', ' 3537847', ' 0', ' 35700097', '2024-11-29 13:47:12', '2024-11-29 13:47:12'),
(29, 'Q24-3014', 'Tokopedia', 'UKM Futsal', '2024-12-02', 'asd', '123123123', '123123123123', '123123', '123123', 'ycaesar01@gmail.com', 'Meet', 'New', 'a', 'Photo', 'in ATMI', 'QC Sheet', 'Wood Packing', 'CBD', '30', 'Include', '5', 'asd', NULL, '2024-12-02', '0', 'Mba Sales', '0', '1', ' 7770000', ' 0', ' 854700', ' 0', ' 8624700', '2024-12-02 12:57:46', '2024-12-02 12:57:46'),
(30, 'Q24-3015', 'CAHAYA GUNUNG FOODS', 'Bp. Ag. Sigit Kurniawan', '2024-12-03', 'Boyolali', '00.000.000.0-000.000', '0271-714390', '-', 'Boyolali', '-', 'Meet', 'New', '- Floor Cabinet 4D\r\nWarna RAL 1015 Gloss\r\n-  Filing Cabinet 2D\r\nWarna RAL 1015 Gloss', '3D Drawing', 'in ATMI', 'QC Sheet', 'Cartoon Packing', 'COD', '30', 'Include', '6', 'Boyolali', NULL, '2025-01-03', '30', 'Albert Simanjuntak', '0', '1', ' 9450000', ' 0', ' 1039500', ' 0', ' 10489500', '2024-12-03 10:32:16', '2024-12-03 11:03:32'),
(31, 'Q24-3016', 'CAHAYA GUNUNG FOODS', 'Bp. Ag. Sigit Kurniawan', '2024-12-03', 'Boyolali', '00.000.000.0-000.000', '0271-714390', '-', 'Boyolali', '-', 'Meet', 'New', 'w1 merah matt\r\nw2 putih matt', 'None', 'in ATMI', 'QC Sheet', 'Cartoon Packing', 'NET', '15', 'Include', '6', 'Boyolali', NULL, '2024-12-31', '0', 'Albert Simanjuntak', '0', NULL, ' 9450000', ' 0', ' 0', ' 0', ' 9450000', '2024-12-03 11:11:31', '2024-12-03 11:11:31'),
(33, 'Q24-3017', 'JAWADWIPA', 'Kenshin', '2024-12-10', 'Solo', '52.462.456.3-456.345', '085642211111', '085642211111', 'Solo', 'kenshin@kenshin.com', 'Meet', 'New', 'a', 'Photo', 'in ATMI', 'QC Sheet', 'Cartoon Packing', 'NET', '30', 'Include', '5', 'Solo', NULL, '2024-12-10', '0', 'Mba Sales', '0', '1', ' 6848700', ' 0', ' 753357', ' 0', ' 7602057', '2024-12-10 06:04:38', '2024-12-10 06:04:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `quotationadd`
--

CREATE TABLE `quotationadd` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quotation_no` varchar(255) NOT NULL,
  `item` varchar(255) DEFAULT NULL,
  `item_desc` varchar(255) DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `unit_price` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `disc` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `quotationadd`
--

INSERT INTO `quotationadd` (`id`, `quotation_no`, `item`, `item_desc`, `qty`, `unit_price`, `unit`, `disc`, `amount`, `deskripsi`, `created_at`, `updated_at`) VALUES
(7, 'Q24-0267', 'Q24-0267-1', 'Mobile File 2S16D-3 Row (Tinggi 2.8m)', '1', '529200000', 'unit', '0', '529200000', NULL, '2024-01-29 03:29:10', '2024-01-29 03:29:10'),
(8, 'Q24-0267', 'Q24-0267-2', 'Mobile File 2S2D-4 Row (Tinggi 2.8m)', '4', '139500000', 'unit', '0', '558000000', NULL, '2024-01-29 03:29:10', '2024-01-29 03:29:10'),
(9, 'Q24-0267', 'Q24-0267-3', 'Mobile File 2S1D (Tinggi 2.8m)', '2', '25197000', 'unit', '0', '50394000', NULL, '2024-01-29 03:29:10', '2024-01-29 03:29:10'),
(10, 'Q24-0267', 'Q24-0267-4', 'Mobile File 2S2D (Tinggi 2.8m)', '7', '46597000', 'unit', '0', '326179000', NULL, '2024-01-29 03:29:10', '2024-01-29 03:29:10'),
(11, 'Q24-0267', 'Q24-0267-5', 'Mobile File 2S3D (Tinggi 2.8m)', '1', '46597000', 'unit', '0', '46597000', NULL, '2024-01-29 03:29:10', '2024-01-29 03:29:10'),
(12, 'Q24-0267', 'Q24-0267-6', 'Mobile File 2S4D (Tinggi 2.8m)', '3', '57297000', 'unit', '0', '171891000', NULL, '2024-01-29 03:29:10', '2024-01-29 03:29:10'),
(15, 'Q24-1234', '001', 'LEANTURN', '2', '290000000', 'unit', '0', '580000000', NULL, '2024-02-02 07:12:54', '2024-02-02 07:12:54'),
(16, 'Q24-1234', '002', 'GREAT D1', '2', '205000000', 'unit', '0', '410000000', NULL, '2024-02-02 07:12:54', '2024-02-02 07:12:54'),
(18, 'Q24-1408', '001', 'WHITE BLOCK', '5', ' 50000', 'batang', '0', ' 250000', NULL, '2024-08-14 11:48:55', '2024-08-14 11:48:55'),
(19, 'Q24-0100', '100-400', 'Filing Cabinet 4D', '5', ' 3136000', 'unit', '0', ' 15680000', NULL, '2024-08-21 11:01:51', '2024-08-21 11:01:51'),
(20, 'Q24-0101', '300', 'Workshop Cart (Big)', '4', ' 5322450', 'kg', '0', ' 21289800', NULL, '2024-09-11 14:27:07', '2024-09-11 14:27:07'),
(21, 'Q24-01345', '300', 'Workshop Cart (Big)', '3', ' 5322450', 'batang', '0', ' 15967350', NULL, '2024-09-23 14:16:59', '2024-09-23 14:16:59'),
(22, 'Q24-1235', '299', 'Tool Chart', '1', ' 5494500', 'pcs', '0', ' 5494500', NULL, '2024-09-23 14:17:30', '2024-09-23 14:17:30'),
(23, 'Q24-9987', '302', 'Pahat ISO 2 16x16', '10', ' 249750', 'pcs', '0', ' 2497500', NULL, '2024-10-03 11:23:51', '2024-10-03 11:23:51'),
(24, 'Q24-9987', '301', 'Workshop Cart (Small)', '10', ' 4296810', 'unit', '0', ' 42968100', NULL, '2024-10-03 11:23:51', '2024-10-03 11:23:51'),
(26, 'Q24-9098', '300', 'Workshop Cart (Big)', '5', ' 5322450', 'batang', '10', ' 23951025', NULL, '2024-10-14 14:03:09', '2024-10-14 14:03:09'),
(28, '23001', '300', 'Workshop Cart (Big)', '10', '5322450', 'pcs', '10', '47902050', NULL, '2024-10-14 15:34:10', '2024-10-14 15:34:10'),
(29, '23001', '299', 'Tool Chart', '10', ' 5494500', 'pcs', '10', ' 49450500', NULL, '2024-10-14 15:34:10', '2024-10-14 15:34:10'),
(30, 'Q24-0190', '303', 'Pahat ISO 2 20x20', '10', '249750', 'kg', '0', '2497500', NULL, '2024-10-14 15:35:06', '2024-10-14 15:35:06'),
(34, 'Q24-23002', '300', 'Workshop Cart (Big)', '1', '5322450', 'unit', '0', '5322450', NULL, '2024-10-16 04:16:01', '2024-10-16 04:16:01'),
(35, 'Q24-23002', '301', 'Workshop Cart (Small)', '1', '4296810', 'unit', '0', '4296810', NULL, '2024-10-16 04:16:01', '2024-10-16 04:16:01'),
(40, 'Q24-3003', '303', 'Pahat ISO 2 20x20', '2', ' 249750', 'kg', '0', ' 499500', NULL, '2024-10-21 07:55:55', '2024-10-21 07:55:55'),
(41, 'Q24-3003', '301', 'Workshop Cart (Small)', '2', ' 4296810', 'unit', '0', ' 8593620', NULL, '2024-10-21 07:55:55', '2024-10-21 07:55:55'),
(42, 'Q24-3004', '299', 'Tool Chart', '1', ' 5494500', 'kg', '0', ' 5494500', NULL, '2024-10-23 14:20:16', '2024-10-23 14:20:16'),
(43, 'Q24-3004', '300', 'Workshop Cart (Big)', '1', ' 5322450', 'batang', '0', ' 5322450', NULL, '2024-10-23 14:20:16', '2024-10-23 14:20:16'),
(44, 'Q24-3005', '301', 'Workshop Cart (Small)', '1', ' 4296810', 'kg', '0', ' 4296810', NULL, '2024-10-25 07:48:57', '2024-10-25 07:48:57'),
(45, 'Q24-3005', '303', 'Pahat ISO 2 20x20', '1', ' 249750', 'kg', '0', ' 249750', NULL, '2024-10-25 07:48:57', '2024-10-25 07:48:57'),
(52, 'Q24-3006', '011-001', 'Hydrant Box A1', '2', '728160', 'unit', '0', '1456320', NULL, '2024-10-30 17:49:12', '2024-10-30 17:49:12'),
(53, 'Q24-3006', '210-007', 'Pahat ISO 6 16x16', '3', '249750', 'unit', '0', '749250', NULL, '2024-10-30 17:49:12', '2024-10-30 17:49:12'),
(56, 'Q24-3007', '210-003', 'Workshop Cart (Big)', '2', '5322450', 'batang', '0', '10644900', NULL, '2024-11-05 08:40:19', '2024-11-05 08:40:19'),
(57, 'Q24-3007', '210-002', 'Tool Chart', '2', '5494500', 'pcs', '0', '10989000', NULL, '2024-11-05 08:40:19', '2024-11-05 08:40:19'),
(58, 'Q24-3008', '210-002', 'Tool Chart', '2', ' 5494500', 'unit', '0', ' 10989000', NULL, '2024-11-11 13:22:37', '2024-11-11 13:22:37'),
(59, 'Q24-3008', '210-003', 'Workshop Cart (Big)', '2', ' 5322450', 'unit', '0', ' 10644900', NULL, '2024-11-11 13:22:37', '2024-11-11 13:22:37'),
(60, 'Q24-3009', '210-002', 'Tool Chart', '2', ' 5494500', 'unit', '0', ' 10989000', NULL, '2024-11-15 05:54:53', '2024-11-15 05:54:53'),
(61, 'Q24-3009', '210-003', 'Workshop Cart (Big)', '2', ' 5322450', 'unit', '0', ' 10644900', NULL, '2024-11-15 05:54:53', '2024-11-15 05:54:53'),
(62, 'Q24-3010', '011-004', 'Hydrant Box A2 Glass', '5', ' 1423020', 'kg', '0', ' 7115100', NULL, '2024-11-25 18:44:56', '2024-11-25 18:44:56'),
(63, 'Q24-3011', '210-002', 'Tool Chart', '2', ' 5494500', 'pcs', '0', ' 10989000', NULL, '2024-11-26 13:04:10', '2024-11-26 13:04:10'),
(64, 'Q24-3011', '210-003', 'Workshop Cart (Big)', '3', ' 5322450', 'pcs', '0', ' 15967350', NULL, '2024-11-26 13:04:10', '2024-11-26 13:04:10'),
(65, 'Q24-3012', '011-006', 'Hydrant Box B Glass', '5', ' 1649460', 'kg', '0', ' 8247300', NULL, '2024-11-28 16:33:42', '2024-11-28 16:33:42'),
(66, 'Q24-3012', '011-012', 'Fibox 004', '5', ' 905760', 'batang', '0', ' 4528800', NULL, '2024-11-28 16:33:42', '2024-11-28 16:33:42'),
(67, 'Q24-3013', '001-001', 'Floor Cabinet 4Drawers', '5', ' 4995000', 'unit', '0', ' 24975000', NULL, '2024-11-29 13:47:12', '2024-11-29 13:47:12'),
(68, 'Q24-3013', '011-008', 'Hydrant Box C Glass', '5', ' 1437450', 'batang', '0', ' 7187250', NULL, '2024-11-29 13:47:12', '2024-11-29 13:47:12'),
(69, 'Q24-3014', '011-007', 'Hydrant Box C', '1', ' 1172160', 'kg', '0', ' 1172160', NULL, '2024-12-02 12:57:46', '2024-12-02 12:57:46'),
(70, 'Q24-3014', '011-006', 'Hydrant Box B Glass', '4', ' 1649460', 'batang', '0', ' 6597840', NULL, '2024-12-02 12:57:46', '2024-12-02 12:57:46'),
(74, 'Q24-3015', '001-001', 'Floor Cabinet 4Drawers', '1', ' 5500000', 'unit', '10', ' 4950000', NULL, '2024-12-03 11:03:32', '2024-12-03 11:03:32'),
(75, 'Q24-3015', '101-001', 'Filing Cabinet 2D', '1', ' 4500000', 'unit', '0', ' 4500000', NULL, '2024-12-03 11:03:32', '2024-12-03 11:03:32'),
(76, 'Q24-3016', '001-001', 'Floor Cabinet 4Drawers', '1', ' 5500000', 'unit', '10', ' 4950000', NULL, '2024-12-03 11:11:31', '2024-12-03 11:11:31'),
(77, 'Q24-3016', '101-001', 'Filing Cabinet 2D', '1', ' 4500000', 'unit', '0', ' 4500000', NULL, '2024-12-03 11:11:31', '2024-12-03 11:11:31'),
(78, 'Q24-3017', '011-006', 'Hydrant Box B Glass', '2', ' 1649460', 'batang', '0', ' 3298920', 'a', '2024-12-10 06:04:38', '2024-12-10 06:04:38'),
(79, 'Q24-3017', '011-003', 'Hydrant Box A2', '3', ' 1183260', 'pcs', '0', ' 3549780', 'b', '2024-12-10 06:04:38', '2024-12-10 06:04:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekap_order`
--

CREATE TABLE `rekap_order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer` varchar(255) DEFAULT NULL,
  `product` varchar(255) DEFAULT NULL,
  `so_number` varchar(255) DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `harga` varchar(255) DEFAULT NULL,
  `total_harga` varchar(255) DEFAULT NULL,
  `tahun` date DEFAULT NULL,
  `kbli_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rekap_order`
--

INSERT INTO `rekap_order` (`id`, `customer`, `product`, `so_number`, `qty`, `harga`, `total_harga`, `tahun`, `kbli_code`, `created_at`, `updated_at`) VALUES
(1, 'KURNIA TEKNIK CV', 'Harden Shaft Washing Machine', '22-0644-M', '1', '700.000', '700.000', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `salesman`
--

CREATE TABLE `salesman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `salesman` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `salesman`
--

INSERT INTO `salesman` (`id`, `salesman`, `unit`, `created_at`, `updated_at`) VALUES
(1, 'Albert Simanjuntak', 'MA', NULL, '2024-10-03 03:11:41'),
(2, 'Mba Sales', 'MA', '2024-10-03 03:03:02', '2024-10-03 03:03:02'),
(3, 'Eni W', 'MA', '2024-10-03 03:03:59', '2024-10-03 03:03:59'),
(4, 'Ruby', 'MA', '2024-10-03 03:04:13', '2024-10-03 03:04:13'),
(6, 'Natalia', 'MA', '2024-10-03 03:11:56', '2024-10-03 03:11:56'),
(7, 'Tes', 'MA', '2024-10-03 11:21:15', '2024-10-03 11:21:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `salesorder`
--

CREATE TABLE `salesorder` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `so_number` varchar(255) NOT NULL,
  `quotation_no` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `order_unit` varchar(255) DEFAULT NULL,
  `sow_no` varchar(255) DEFAULT NULL,
  `tax_address` varchar(255) DEFAULT NULL,
  `npwp` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `confirmation` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `sample` varchar(255) DEFAULT NULL,
  `ass_type` varchar(255) DEFAULT NULL,
  `qc_statement` varchar(255) DEFAULT NULL,
  `packing_type` varchar(255) DEFAULT NULL,
  `ptp` varchar(255) DEFAULT NULL,
  `dod` date DEFAULT NULL,
  `shipping_address` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `top` varchar(255) DEFAULT NULL,
  `net_days` varchar(255) DEFAULT NULL,
  `fob` varchar(255) DEFAULT NULL,
  `shipping` varchar(255) DEFAULT NULL,
  `ship_date` date DEFAULT NULL,
  `po_number` varchar(255) DEFAULT NULL,
  `salesman` varchar(255) DEFAULT NULL,
  `dp` varchar(255) DEFAULT NULL,
  `dp_percent` varchar(255) DEFAULT NULL,
  `subtotal` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `tax` varchar(255) DEFAULT NULL,
  `freight` varchar(255) DEFAULT NULL,
  `total_amount` varchar(255) DEFAULT NULL,
  `discount_percent` varchar(255) DEFAULT NULL,
  `tax_type` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `salesorder`
--

INSERT INTO `salesorder` (`id`, `so_number`, `quotation_no`, `company_name`, `name`, `address`, `phone`, `order_unit`, `sow_no`, `tax_address`, `npwp`, `fax`, `email`, `confirmation`, `type`, `sample`, `ass_type`, `qc_statement`, `packing_type`, `ptp`, `dod`, `shipping_address`, `date`, `top`, `net_days`, `fob`, `shipping`, `ship_date`, `po_number`, `salesman`, `dp`, `dp_percent`, `subtotal`, `file`, `discount`, `tax`, `freight`, `total_amount`, `discount_percent`, `tax_type`, `description`, `created_at`, `updated_at`) VALUES
(6, '24-0132-W', 'Q24-0267', 'GUNNEBO INDONESIA DISTRIBUTION PT', 'GUNNEBO INDONESIA DISTRIBUTION PT', 'Grha Gunnebo Indonesia Lt. 5', '02100000', '2', '15-0004-W', 'Grha Gunnebo Indonesia Lt. 5', '83.524.320.5-023.000', '02100000', NULL, 'Meet', 'New', 'Photo', 'in ATMI', 'QC Sheet', 'Wood Packing', 'Exclude', '2024-03-19', 'Grha Gunnebo Indonesia Lt. 5', '2024-01-26', 'NET', '30', '1', NULL, '2024-03-20', 'GI/01-26/2024', 'Mba Sales', ' 0', '0', ' 3364822000', NULL, ' 0', ' 370130420', ' 0', ' 3734952420', '0', '1', 'WF\r\n- Mobile File 2S16D-3 Row (Tinggi 2.8m)', '2024-01-29 04:41:22', '2024-10-19 03:27:23'),
(7, '24-1234-M', 'Q24-1234', 'BUANA PRIMA RAYA PT', 'BAMBANG SUWITO', 'KALIMALANG, BEKASI', '081232131231', '1', 'SOW-1234-M', 'KALIMALANG, BEKASI', '12.345.678.9-098.765', '02132131', 'bambang@buana.com', 'by Phone', 'Repeat', '2D Drawing', 'in ATMI', 'Assy Test Report', 'Special Packing', 'Include', '2024-03-08', 'KALIMALANG, BEKASI', '2024-02-02', 'NET', '30', '2', NULL, '2024-03-09', 'BPR01', 'Mba Sales', '0', '0', ' 990000000', NULL, ' 49500000', ' 103455000', '0', '1043955000', '5', '1', 'WARNA\r\n- STANDAR COLOUR', '2024-02-02 07:18:05', '2024-02-02 07:18:05'),
(16, 'STWF-1024', NULL, 'WF', 'coba wf', 'WF', '0271-714466', '2', 'STWF-1024', 'WF', '123456789', '0271-714466', 'COBA@COBA.COM', 'Meet', 'New', 'None', 'in ATMI', 'QC Sheet', 'Cartoon Packing', 'Include', '2024-10-31', 'WF', '2024-10-11', 'COD', '30', '1', NULL, '2024-10-31', 'STWF-1024', 'Mba Sales', 'Rp 0', '0', ' 9000000', NULL, ' 0', ' 990000', ' 0', ' 9990000', '0', '1', 'SIZE 500 X 300 X 1000', '2024-10-11 16:18:28', '2024-10-11 16:18:28'),
(17, '24-0001-W', 'Q24-0267', 'GUNNEBO INDONESIA DISTRIBUTION PT', 'GUNNEBO INDONESIA DISTRIBUTION PT', 'Grha Gunnebo Indonesia Lt. 5', '02100000', '2', '-', 'Grha Gunnebo Indonesia Lt. 5', '83.524.320.5-023.000', '02100000', 'saksake@gmail.com', 'Meet', 'New', 'None', 'in ATMI', 'QC Sheet', 'Wood Packing', 'Exclude', '2024-11-14', 'Grha Gunnebo Indonesia Lt. 5', '2024-01-26', 'NET', '30', '2', NULL, '2024-11-14', '1234', 'Mba Sales', 'Rp 0', '0', ' 1655801000', NULL, ' 0', ' 182138110', ' 0', ' 1837939110', '0', '1', 'WF\r\n- Mobile File 2S16D-3 Row (Tinggi 2.8m)', '2024-10-14 13:37:29', '2024-10-14 13:37:29'),
(20, '24-23001-W', '23001', 'pt andro', 'andro', 'solo', '0271001', '2', 'SOW23001', 'Solo', '00.000.000.0-000.000', '0271001', 'andro@andro.com', 'Meet', 'New', '3D Drawing', 'in ATMI', 'QC Sheet', 'Cartoon Packing', 'Include', '2024-10-30', 'solo', '2024-10-14', 'COD', '30', '2', NULL, '2024-10-30', 'PO23001', 'natalia', ' 0', '0', ' 97352550', NULL, ' 0', ' 10708780', ' 0', ' 108061330', '0', '1', 'barang andro', '2024-10-14 15:50:52', '2024-10-14 16:01:13'),
(21, 'BRP10', NULL, 'WF', 'Adi Widya', 'a', '1023019283012', '2', '-', 'a', '23123123123', '02100000', '-', 'Meet', 'New', 'Photo', 'in ATMI', 'QC Sheet', 'Cartoon Packing', 'Include', '2024-10-16', 'a', '2024-10-16', 'COD', '30', '2', NULL, '2024-10-16', 'BRP10', 'Eni W', ' 0', '0', ' 9844035', NULL, ' 492201', ' 1028701', ' 0', ' 10380534', '5', '1', 'a', '2024-10-16 06:23:04', '2024-10-16 06:23:35'),
(22, '24-23004-W', 'Q24-23004', 'PT Kembar', 'Adi Widya', 'solo', '1023019283012', '2', '-', 'solo', '83.524.320.5-023.000', '-', '-', 'Meet', 'New', 'Photo', 'in ATMI', 'QC Sheet', 'Cartoon Packing', 'Include', '2024-10-17', 'a', '2024-10-17', 'COD', '0', '1', NULL, '2024-10-17', 'PO24-23004-W', 'Eni W', '0', '0', ' 699500', 'Manual Book Karyawan YKBS Untuk Presensi ke HRD.ID.pdf', ' 0', ' 76945', '0', '776445', '0', '1', 'gdgdfgdf', '2024-10-16 08:22:05', '2024-10-16 08:22:05'),
(23, 'BRP99', 'BRP99', 'BRP99', 'admin', 'A', '85802543185', '2', '-', 'A', '12.345.678.9-098.765', '021 - 633 1073', '-', 'Meet', 'New', 'Photo', 'in ATMI', 'QC Sheet', 'Cartoon Packing', 'Exclude', '2024-10-16', 'A', '2024-10-16', 'COD', '30', '2', NULL, '2024-10-16', 'BRP99', 'Albert Simanjuntak', 'Rp 0', '0', ' 100000', NULL, ' 0', ' 11000', ' 0', ' 111000', '0', '1', 'BRP99', '2024-10-16 10:18:22', '2024-10-16 10:18:22'),
(24, '24-2000-W', 'STWF-200', 'GUNNEBO INDONESIA DISTRIBUTION PT', 'Gerson Manuel', 'Karanganyar RT 09 RW 03 Gandrungmangu', '085156106221', '2', '-', 'Karanganyar RT 09 RW 03 Gandrungmangu', '11.111.111.1-111.111', '222', 'manuelsugianto@gmail.com', 'Meet', 'New', 'Sample', 'in ATMI', 'QC Sheet', 'Cartoon Packing', 'Include', '2024-10-23', 'Karanganyar RT 09 RW 03 Gandrungmangu', '2024-10-21', 'COD', '30', '1', NULL, '2024-10-21', 'GI/01-26/2024', 'natalia', 'Rp 129.742', '2', ' 5844250', NULL, ' 0', ' 642867', ' 0', ' 6487117', '0', '1', 'aa', '2024-10-21 02:27:07', '2024-10-21 02:27:07'),
(26, 'BRP14', 'Q24-9849', 'company', 'name', 'BRP14', '1023019283012', '2', '-', 'BRP14', '01.572.661.5-028.000', '02100000', '-', 'Meet', 'New', 'Photo', 'in ATMI', 'QC Sheet', 'Cartoon Packing', 'Include', '2024-10-22', 'BRP14', '2024-10-22', 'COD', '30', '1', NULL, '2024-10-22', 'BRP14', 'Albert Simanjuntak', 'Rp 0', '0', ' 1100000', NULL, ' 0', ' 121000', ' 0', ' 1221000', '0', '1', 'BRP14', '2024-10-22 00:30:34', '2024-10-22 00:30:34'),
(27, '24-0021-W', 'Stwf1111', 'Gunmeno', 'Gerson Manuel', 'Karanganyar RT 09 RW 03 Gandrungmangu', '085156106221', '2', '-', 'Hhgg', '11.111.111.1-111.111', '-', '-', 'by Phone', 'Repeat', 'Photo', 'in ATMI', 'QC Sheet', 'Cartoon Packing', 'Include', '2024-10-22', '22eed', '2024-10-22', 'COD', '30', '1', NULL, '2024-10-22', '234', 'Ruby', 'Rp 0', '0', ' 540594150', NULL, ' 0', ' 0', ' 0', ' 540594150', '0', '4', 'Aa', '2024-10-22 04:45:05', '2024-10-22 04:45:05'),
(31, '24-0005-W', 'Q24-3003', 'PT Andalan Utama', 'bambang', 'solo', '-', '2', '-', 'solo', '00.000.000.0-000.000', '-', '-', 'Meet', 'New', 'Photo', 'in ATMI', 'QC Sheet', 'Cartoon Packing', 'Include', '2024-10-23', 'Solo', '2024-10-24', 'COD', NULL, '1', NULL, '2024-10-23', '24-0005-W', 'natalia', 'Rp 0', '0', ' 9093120', NULL, ' 0', ' 1000243', ' 0', ' 10093363', '0', '1', 'test 5: test ke 5', '2024-10-23 14:41:28', '2024-10-23 14:41:28'),
(32, '24-2306-W', 'Q24-3006', 'PT JAYA', 'Bram', 'jakarta', '-', '2', '-', 'jakarta', '00.000.000.0-000.000', '-', '-', 'Meet', 'New', 'Photo', 'in ATMI', 'QC Sheet', 'Cartoon Packing', 'Include', '2024-11-04', 'jakarta', '2024-10-28', 'COD', '0', '2', NULL, '2024-11-04', 'PO24-2306-W', 'natalia', 'Rp 881.345', '40', ' 2205570', NULL, ' 220557', ' 218351', ' 0', ' 2203364', '10', '1', 'test', '2024-10-28 10:58:29', '2024-10-28 10:58:29'),
(34, 'STWF55', 'STWF55', 'wf', 'wf', 'WF', '1023019283012', '2', '-', 'a', '01.572.661.5-028.000', '02100000', '-', 'Meet', 'New', 'Photo', 'in ATMI', 'QC Sheet', 'Cartoon Packing', 'Include', '2024-10-28', 'wf', '2024-10-28', 'COD', '30', '1', NULL, '2024-10-28', 'STWF55', 'Natalia', 'Rp 0', '0', ' 6815400', NULL, ' 0', ' 749694', ' 0', ' 7565094', '0', '1', 'a', '2024-10-28 14:34:00', '2024-10-28 14:34:00'),
(35, 'STWF66', 'STWF66', 'wf', 'wf', 'wf', '-', '2', '-', '-', '23123123123', '-', '-', 'Meet', 'New', 'Photo', 'in ATMI', 'QC Sheet', 'Cartoon Packing', 'Include', '2024-10-28', 'wf', '2024-10-28', 'NET', '60', '2', NULL, '2024-10-28', 'STWF66', 'Albert Simanjuntak', 'Rp 0', '0', ' 39133050', NULL, ' 0', ' 4304635', ' 0', ' 43437685', '0', '1', 'a', '2024-10-28 14:58:19', '2024-10-28 14:58:19'),
(36, 'STWF2406', 'Q24-internal', 'WF', 'WF', 'WF', '-', '2', '-', 'WF', '00.000.000.0-000.000', '-', '-', 'Meet', 'New', 'Photo', 'in ATMI', 'QC Sheet', 'Cartoon Packing', 'Include', '2024-10-30', 'WF', '2024-10-30', 'COD', '10', '1', NULL, '2024-10-30', 'POSTWF2406', 'natalia', 'Rp 0', '0', ' 1911420', NULL, ' 0', ' 210256', ' 0', ' 2121676', '0', '1', 'test1', '2024-10-29 09:27:32', '2024-10-29 09:27:32'),
(42, '24-3007-W', 'Q24-3006', 'PT JAYA', 'Bram', 'jakarta', '-', '2', '-', 'jakarta', '00.000.000.0-000.000', '-', '-', 'Meet', 'New', 'Photo', 'in ATMI', 'QC Sheet', 'Cartoon Packing', 'Include', '2024-11-05', 'jakarta', '2024-10-28', 'COD', '0', '2', NULL, '2024-11-05', 'GI/01-26/2024', 'Mba Sales', '0', '0', ' 2205570', NULL, ' 220557', ' 218351', '0', ' 2203364', '10', '1', 'test', '2024-11-05 06:25:26', '2024-11-05 06:25:26'),
(44, '24-3307-W', 'Q24-3006', 'PT JAYA', 'Bram', 'jakarta', '-', '2', '-', 'jakarta', '00.000.000.0-000.000', '-', '-', 'Meet', 'New', 'Photo', 'in ATMI', 'QC Sheet', 'Cartoon Packing', 'Include', '2024-11-05', 'jakarta', '2024-10-28', 'COD', '0', '1', NULL, '2024-11-05', 'GI/01-26/2024', 'Mba Sales', '0', '0', ' 2205570', NULL, ' 220557', ' 218351', '0', ' 2203364', '10', '1', 'test', '2024-11-05 06:43:19', '2024-11-05 06:43:19'),
(46, '24-2308-W', 'Q24-3007', 'WF1', 'WF1', 'solo', '-', '2', '-', 'solo', '00.000.000.0-000.000', '-', '-', 'Meet', 'New', 'Photo', 'in ATMI', 'QC Sheet', 'Cartoon Packing', 'Include', '2024-11-06', 'Solo', '2024-11-06', 'COD', '30', '2', NULL, '2024-11-06', 'PO24-2308-W', 'Eni W', '0', '0', ' 21633900', 'SURAT EDARAN Surat Edaran Tata Kelola Parkir Sehubungan dengan Acara Puncak Michael Day 2024.pdf', ' 2163390', ' 2141756', '0', '21612266', '10', '1', 'yes', '2024-11-05 11:00:21', '2024-11-05 11:00:21'),
(48, '24-2309-W', 'Q24-3008', 'WF2', 'WF2', 'WF2', '-', '2', '-', '-', '00.000.000.0-000.000', '-', '-', 'Meet', 'New', 'Photo', 'in ATMI', 'QC Sheet', 'Cartoon Packing', 'Include', '2024-11-12', 'Solo', '2024-11-11', 'COD', '30', '1', NULL, '2024-11-12', 'PO24-2309-W', 'Natalia', '0', '0', ' 21633900', NULL, ' 2163390', ' 2141756', '0', '21612266', '10', '1', 'test WF2', '2024-11-11 13:47:51', '2024-11-11 13:47:51'),
(50, '24-2310-W', 'Q24-3009', 'PT JAYA', 'Bram', 'jakarta', '-', '2', '-', 'jakarta', '00.000.000.0-000.000', '-', '-', 'Meet', 'New', 'Photo', 'in ATMI', 'QC Sheet', 'Cartoon Packing', 'Include', '2024-11-22', 'jakarta', '2024-11-22', 'COD', '10', '2', NULL, '2024-11-29', 'po24-2310-W', 'Ruby', '0', '0', ' 21633900', NULL, ' 1081695', ' 2260742', '0', '22812947', '5', '1', 'Q24-3009', '2024-11-15 06:05:04', '2024-11-15 06:05:04'),
(53, '24-2311-W', 'QINT24-2311-W', 'ariel jaya', 'ariel', '-', '-', '2', '-', '-', '00.000.000.0-000.000', '-', '-', 'Meet', 'New', 'Photo', 'in ATMI', 'QC Sheet', 'Cartoon Packing', 'Include', '2024-11-26', '-', '2024-11-26', 'COD', '30', '2', NULL, '2024-11-26', 'PO24-2311-W', 'Ruby', 'Rp 0', '0', '26829816', NULL, '2682981', '2656151', '0', '26802986', '10', '1', '1', '2024-11-19 19:39:48', '2024-11-19 19:39:48'),
(63, '24-2311-M', 'INT2311', 'Gerson Manuel Sugianto', 'Gerson Manuel', 'Karanganyar RT 09 RW 03 Gandrungmangu', '085156106221', '1', '-', 'Karanganyar RT 09 RW 03 Gandrungmangu', '83.524.320.5-023.000', '-', '-', 'Meet', 'New', '3D Drawing', 'in ATMI', 'QC Sheet', 'Cartoon Packing', 'Include', '2024-11-23', 'Karanganyar RT 09 RW 03 Gandrungmangu', '2024-11-23', 'COD', '30', '1', NULL, '2024-11-23', '-', 'Albert Simanjuntak', 'Rp 0', '0', '3012540', NULL, '30125', '74560', '0', '3056974', '1', '2', '-', '2024-11-23 01:35:15', '2024-11-23 01:35:15'),
(64, '24-2313-W', 'INT251124', 'Berto Jaya', 'Priyo', 'solo', '-', '2', '-', '-', '00.000.000.0-000.000', '-', '-', 'Meet', 'New', 'Photo', 'in ATMI', 'QC Sheet', 'Cartoon Packing', 'Include', '2024-12-02', 'solo', '2024-12-04', 'COD', '30', '2', NULL, '2024-12-02', 'PO24-2313-W', 'Natalia', 'Rp 0', '0', '19582620', 'flowchart fixed asset 2024.pdf', '0', '2154088', '0', '21736708', '0', '1', 'test', '2024-11-25 15:15:33', '2024-11-25 15:15:33'),
(65, 'STWF42', 'BRP091231', 'wf', 'Adi Widya', 'a', '1023019283012', '2', '-', '-', '01.572.661.5-028.000', '-', '-', 'Meet', 'New', 'Photo', 'in ATMI', 'QC Sheet', 'Cartoon Packing', 'Include', '2024-11-25', 'a', '2024-11-25', 'NET', '30', '2', NULL, '2024-11-25', 'STWF42', 'Albert Simanjuntak', 'Rp 0', '0', '6693300', NULL, '0', '0', '0', '6693300', '0', '4', 'a', '2024-11-25 18:46:34', '2024-11-25 18:46:34'),
(66, '24-2314-W', 'INT24-2314-W', 'Andycorp', 'Andy', '-', '-', '2', '-', '-', '00.000.000.0-000.000', '-', '-', 'Meet', 'New', 'Photo', 'in ATMI', 'QC Sheet', 'Cartoon Packing', 'Include', '2024-12-03', 'Solo', '2024-12-03', 'COD', '30', '2', NULL, '2024-12-03', 'PO24-2314-W', 'Natalia', 'Rp 0', '0', '19582620', 'flowchart fixed asset 2024.pdf', '0', '2154088', '0', '21736708', '0', '1', 'test1', '2024-11-26 10:34:15', '2024-11-26 10:34:15'),
(67, '24-2315-W', 'Q24-3011', 'JAWADWIPA', 'Kenshin', 'Solo', '085642211111', '2', '-', 'Solo', '52.462.456.3-456.345', '085642211111', 'kenshin@kenshin.com', 'Meet', 'New', 'Photo', 'in ATMI', 'QC Sheet', 'Cartoon Packing', 'Include', '2024-12-03', 'Solo', '2024-12-31', 'COD', '30', '2', NULL, '2024-12-03', 'PO24-2315-W', 'Natalia', '0', '0', ' 26956350', NULL, ' 0', ' 2965198', '0', '29921548', '0', '1', 'test1', '2024-11-26 13:06:02', '2024-11-26 13:06:02'),
(68, '24-2811-W', 'Q24-3012', 'PT Andalan Utama', 'bambang', 'solo', '-', '2', '-', 'solo', '00.000.000.0-000.000', '-', '-', 'Meet', 'New', 'Photo', 'in ATMI', 'QC Sheet', 'Cartoon Packing', 'Include', '2024-11-28', 'Solo', '2024-11-28', 'NET', '30', '1', NULL, '2024-11-28', '24-2811-W', 'Mba Sales', 'Rp 7.090.735', '50', '12776100', NULL, '0', '1405371', '0', '14181471', '0', '1', '28-11', '2024-11-28 16:35:12', '2024-11-28 16:35:12'),
(70, '24-2911-W', 'Q-24-2911-W', 'WF', 'WF', 'A', '123123123123', '2', '-', 'A', '83.524.320.5-023.000', '-', '-', 'Meet', 'New', 'Photo', 'in ATMI', 'Assy Test Report', 'Cartoon Packing', 'Include', '2024-11-29', 'ASD', '2024-11-29', 'NET', '30', '2', NULL, '2024-11-29', '24-2911-W', 'Eni W', 'Rp 0', '0', '1498500', NULL, '0', '164835', '0', '1663335', '0', '1', 'ASD', '2024-11-29 14:26:08', '2024-11-29 14:26:08'),
(71, 's', 'Q24-3008', 'WF2', 'WF2', 'WF2', '-', '1', '-', '-', '00.000.000.0-000.000', '-', '-', 'Meet', 'New', 'Photo', 'in ATMI', 'QC Sheet', 'Cartoon Packing', 'Include', '2024-11-29', 'Solo', '2024-11-11', 'COD', '30', '1', NULL, '2024-11-29', 'BPR01', 'Natalia', '0', '0', ' 21633900', NULL, ' 2163390', ' 2141756', '0', '21612266', '10', '1', 'test WF2', '2024-11-29 14:29:44', '2024-11-29 14:29:44'),
(72, '24-0212-W', 'Q-0212-W', 'COBA', 'COBA', '-', '02100000', '2', '-', '-', '83.524.320.5-023.000', '-', '-', 'Meet', 'New', 'Photo', 'in ATMI', 'Assy Test Report', 'Wood Packing', 'Include', '2024-12-02', 'A', '2024-12-02', 'COD', '30', '1', NULL, '2024-12-02', '24-0212-W', 'Mba Sales', 'Rp 0', '0', '3391050', NULL, '0', '373015', '0', '3764065', '0', '1', 'A', '2024-12-02 12:40:44', '2024-12-02 12:40:44'),
(75, 'STFW101', 'Q24-3014', 'Tokopedia', 'UKM Futsal', 'asd', '123123123123', '2', '-', '123123', '123123123', '123123', 'ycaesar01@gmail.com', 'Meet', 'New', 'Photo', 'in ATMI', 'QC Sheet', 'Wood Packing', 'Include', '2024-12-02', 'asd', '2024-12-02', 'CBD', '30', '2', NULL, '2024-12-02', 'STFW101', 'Mba Sales', '0', '0', ' 7770000', NULL, ' 0', ' 854700', '0', '8624700', '0', '1', 'a', '2024-12-02 12:58:58', '2024-12-02 12:58:58'),
(76, 'STFW2310', 'INTSTFW2310', 'lee corp', 'tommy', '-', '-', '2', '-', '-', '00.000.000.0-000.000', '-', '-', 'Meet', 'New', 'Photo', 'in ATMI', 'QC Sheet', 'Cartoon Packing', 'Include', '2024-12-17', 'solo', '2024-12-31', 'NET', '30', '2', NULL, '2024-12-24', 'POSTFW2310', 'Natalia', 'Rp 0', '0', '3296700', NULL, '0', '362637', '0', '3659337', '0', '1', '1', '2024-12-02 16:21:24', '2024-12-02 16:21:24'),
(77, '24-1500-W', 'Q24-3016', 'CAHAYA GUNUNG FOODS', 'Bp. Ag. Sigit Kurniawan', 'Boyolali', '0271-714390', '2', '-', 'Boyolali', '00.000.000.0-000.000', '-', '-', 'Meet', 'New', '3D Drawing', 'in ATMI', 'QC Sheet', 'Cartoon Packing', 'Include', '2024-12-31', 'Boyolali', '2024-12-03', 'COD', '30', '2', NULL, '2024-12-31', '1234', 'Albert Simanjuntak', ' 0', '0', ' 6763230', NULL, ' 0', ' 743955', ' 0', ' 7507185', '0', '1', '- Floor Cabinet 4D\r\nWarna RAL 1015 Gloss\r\n-  Filing Cabinet 2D\r\nWarna RAL 1015 Gloss', '2024-12-03 10:43:00', '2024-12-03 11:12:18'),
(78, 'Int24-1500-W', 'Int24-1500-W', 'WF', 'coba wf', 'ATMI WF', '-', '2', '-', 'ATMI WF', '00.000.000.0-000.000', '-', '-', 'Meet', 'New', 'None', 'in ATMI', 'QC Sheet', 'Cartoon Packing', 'Include', '2024-12-20', 'WF', '2024-12-20', 'COD', '30', '1', NULL, '2024-12-20', '-', 'Tes', 'Rp 0', '0', '9990000', NULL, '0', '1098900', '0', '11088900', '0', '1', 'stock internal', '2024-12-06 11:49:01', '2024-12-06 11:49:01'),
(88, '24-0881-M', 'Q24-1234', 'BUANA PRIMA RAYA PT', 'BAMBANG SUWITO', 'KALIMALANG, BEKASI', '081232131231', '2', '-', 'KALIMALANG, BEKASI', '12.345.678.9-098.765', '02132131', 'bambang@buana.com', 'by Phone', 'Repeat', '2D Drawing', 'in ATMI', 'Assy Test Report', 'Special Packing', 'Include', '2024-12-15', 'KALIMALANG, BEKASI', '2024-02-02', 'NET', '30', '1', NULL, '2024-12-15', 'GI/01-26/2024', 'Mba Sales', 'Rp 0', '0', ' 990000000', NULL, ' 49500000', ' 103455000', '0', '1043955000', '5', '1', 'WARNA\r\n- STANDAR COLOUR', '2024-12-15 11:45:30', '2024-12-15 11:45:30'),
(89, '24-1612-W', '24-1612-W', 'wf', 'Yulius', 'wf', '085642211111', '2', '-', 'wf', '01.572.661.5-028.000', '02100000', '-', 'Meet', 'New', 'Photo', 'in ATMI', 'QC Sheet', 'Wood Packing', 'Exclude', '2024-12-16', 'wf', '2024-12-16', 'NET', '30', '1', NULL, '2024-12-16', '24-1612-W', 'Mba Sales', 'Rp 0', '0', '749250', NULL, '0', '82417', '0', '831667', '0', '1', 'a', '2024-12-16 15:42:16', '2024-12-16 15:42:16'),
(90, '24-1216-M', 'Q24-1234', 'BUANA PRIMA RAYA PT', 'BAMBANG SUWITO', 'KALIMALANG, BEKASI', '081232131231', '1', '-', 'KALIMALANG, BEKASI', '12.345.678.9-098.765', '02132131', 'bambang@buana.com', 'by Phone', 'Repeat', '2D Drawing', 'in ATMI', 'Assy Test Report', 'Special Packing', 'Include', '2024-12-16', 'KALIMALANG, BEKASI', '2024-02-02', 'NET', '30', '2', NULL, '2024-12-16', 'GI/01-26/2024', 'Mba Sales', '0', '0', ' 990000000', NULL, ' 49500000', ' 103455000', '0', '1043955000', '5', '1', 'WARNA\r\n- STANDAR COLOUR', '2024-12-16 16:32:21', '2024-12-16 16:32:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `shipping`
--

CREATE TABLE `shipping` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_shipping` varchar(255) NOT NULL,
  `shipping_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `shipping`
--

INSERT INTO `shipping` (`id`, `id_shipping`, `shipping_name`, `created_at`, `updated_at`) VALUES
(1, '1', 'RENTAL', '2024-01-29 02:49:11', '2024-01-29 02:49:11'),
(2, '2', 'RITRA CARGO', '2024-01-29 02:49:11', '2024-01-29 02:49:11'),
(3, '3', 'ROCKY', '2024-01-29 02:49:11', '2024-01-29 02:49:11'),
(4, '4', 'ROSALIA', '2024-01-29 02:49:11', '2024-01-29 02:49:11'),
(5, '5', 'SADAR JAYA', '2024-01-29 02:49:11', '2024-01-29 02:49:11'),
(6, '6', 'SANEX', '2024-01-29 02:49:11', '2024-01-29 02:49:11'),
(7, '7', 'SEHATI EKSPEDISI', '2024-01-29 02:49:11', '2024-01-29 02:49:11'),
(8, '8', 'SENAPATI LOGISTIC', '2024-01-29 02:49:11', '2024-01-29 02:49:11'),
(9, '9', 'SIBA SURYA', '2024-01-29 02:49:11', '2024-01-29 02:49:11'),
(10, '10', 'SOLID LOGISTIC', '2024-01-29 02:49:11', '2024-01-29 02:49:11'),
(11, '11', 'SUMBER REJEKI', '2024-01-29 02:49:11', '2024-01-29 02:49:11'),
(12, '12', 'SURYA CEMERLANG', '2024-01-29 02:49:11', '2024-01-29 02:49:11'),
(13, '13', 'SUMBER ALAM SHUTTLE', '2024-01-29 02:49:11', '2024-01-29 02:49:11'),
(14, '14', 'TAM CARGO', '2024-01-29 02:49:11', '2024-01-29 02:49:11'),
(15, '15', 'TAM LOGISTIC', '2024-01-29 02:49:11', '2024-01-29 02:49:11'),
(16, '16', 'TIKI JNE', '2024-01-29 02:49:11', '2024-01-29 02:49:11'),
(17, '17', 'TIKINDO', '2024-01-29 02:49:11', '2024-01-29 02:49:11'),
(18, '18', 'TNT', '2024-01-29 02:49:11', '2024-01-29 02:49:11'),
(19, '19', 'TNT Indonesia', '2024-01-29 02:49:11', '2024-01-29 02:49:11'),
(20, '20', 'TRAVEL', '2024-01-29 02:49:11', '2024-01-29 02:49:11'),
(21, '21', 'TRAVEL JAYA SAKTI', '2024-01-29 02:49:11', '2024-01-29 02:49:11'),
(22, '23', 'TRAVEL MELATI', '2024-01-29 02:49:11', '2024-01-29 02:49:11'),
(23, '24', 'TRISAKA', '2024-01-29 02:49:11', '2024-01-29 02:49:11'),
(24, '25', 'TRUCK ADE', '2024-01-29 02:49:11', '2024-01-29 02:49:11'),
(25, '26', 'TRUCK ATMI', '2024-01-29 02:49:11', '2024-01-29 02:49:11'),
(26, '27', 'UPS EXPRESS SAVE', '2024-01-29 02:49:11', '2024-01-29 02:49:11'),
(27, '28', 'VIA DSO', '2024-01-29 02:49:11', '2024-01-29 02:49:11'),
(28, '29', 'WAHANA', '2024-01-29 02:49:11', '2024-01-29 02:49:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `soadd`
--

CREATE TABLE `soadd` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `so_number` varchar(255) NOT NULL,
  `item` varchar(255) DEFAULT NULL,
  `item_desc` varchar(255) DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `unit_price` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `disc` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `product_type` varchar(255) DEFAULT NULL,
  `order_no` varchar(255) DEFAULT NULL,
  `spec` varchar(255) DEFAULT NULL,
  `kbli` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `soadd`
--

INSERT INTO `soadd` (`id`, `so_number`, `item`, `item_desc`, `qty`, `unit_price`, `unit`, `disc`, `amount`, `product_type`, `order_no`, `spec`, `kbli`, `created_at`, `updated_at`) VALUES
(43, '24-1234-M', '001', 'LEANTURN', '2', ' 290000000', 'unit', '0', ' 580000000', 'SPM', '1', '-', '28299', '2024-02-02 07:18:05', '2024-02-02 07:18:05'),
(44, '24-1234-M', '002', 'GREAT D1', '2', ' 205000000', 'unit', '0', ' 410000000', 'SPM', '2', '-', '28299', '2024-02-02 07:18:05', '2024-02-02 07:18:05'),
(55, 'STWF-1024', '-', 'BOX APAR', '10', ' 1000000', 'unit', '10', ' 9000000', 'Standart Product', 'STWF-1024', 'warna merah hydrant', '31004', '2024-10-11 16:18:28', '2024-10-11 16:18:28'),
(56, '24-0001-W', 'Q24-0267-1', 'Mobile File 2S16D-3 Row (Tinggi 2.8m)', '1', ' 529200000', 'unit', '5', ' 502740000', 'WF Standart Product', '24-0001-W1', 'Ral 7042 gloss', '25991', '2024-10-14 13:37:29', '2024-10-14 13:37:29'),
(57, '24-0001-W', 'Q24-0267-2', 'Mobile File 2S2D-4 Row (Tinggi 2.8m)', '4', ' 139500000', 'unit', '0', ' 558000000', 'WF Standart Product', '24-0001-W2', 'Ral 7042 gloss', '25991', '2024-10-14 13:37:29', '2024-10-14 13:37:29'),
(62, '24-23001-W', '300', 'Workshop Cart (Big)', '10', '5322450', 'pcs', '10', '47902050', 'WF Standart Product', '24-23001-W1', 'test1', '25991', '2024-10-14 16:01:13', '2024-10-14 16:01:13'),
(63, '24-23001-W', '299', 'Tool Chart', '10', '5494500', 'pcs', '10', '49450500', 'WF Standart Product', '24-23001-W2', 'test1', '28299', '2024-10-14 16:01:13', '2024-10-14 16:01:13'),
(66, 'BRP10', '300', 'Workshop Cart (Big)', '1', '5322450', 'batang', '0', '5322450', 'SPM', 'BRP10', 'abc', '31004', '2024-10-16 06:23:35', '2024-10-16 06:23:35'),
(67, 'BRP10', '302', 'Pahat ISO 2 16x16', '1', '249750', 'pcs', '10', '224775', 'Precision Part', 'BRP10', 'abc', '26602', '2024-10-16 06:23:35', '2024-10-16 06:23:35'),
(68, 'BRP10', '301', 'Workshop Cart (Small)', '1', ' 4296810', 'pcs', '0', ' 4296810', 'Standart Product', 'BRP10', 'abc', '12345', '2024-10-16 06:23:35', '2024-10-16 06:23:35'),
(69, '24-23004-W', '303', 'Pahat ISO 2 20x20', '2', ' 249750', 'pce', '0', ' 499500', 'Precision Part', '24-23004-W1', 'test1', '28299', '2024-10-16 08:22:05', '2024-10-16 08:22:05'),
(70, '24-23004-W', '9099', 'abc', '2', ' 100000', 'pce', '0', ' 200000', 'Standart Product', '24-23004-W2', 'test2', '25991', '2024-10-16 08:22:05', '2024-10-16 08:22:05'),
(71, 'BRP99', '9099', 'abc', '1', ' 100000', 'pcs', '0', ' 100000', 'Standart Product', 'BRP99', 'ABC', '32501', '2024-10-16 10:18:22', '2024-10-16 10:18:22'),
(72, '24-0132-W', 'Q24-0267-1', 'Mobile File 2S16D-3 Row (Tinggi 2.8m)', '1', '529200000', 'unit', '0', '529200000', 'WF Customized Product', '24-0132-W1', 'Mobile File', '28299', '2024-10-19 03:27:23', '2024-10-19 03:27:23'),
(73, '24-0132-W', 'Q24-0267-2', 'Mobile File 2S2D-4 Row (Tinggi 2.8m)', '4', '139500000', 'unit', '0', '558000000', 'WF Customized Product', '24-0132-W2', 'Mobile File', '28299', '2024-10-19 03:27:23', '2024-10-19 03:27:23'),
(74, '24-0132-W', 'Q24-0267-3', 'Mobile File 2S1D (Tinggi 2.8m)', '2', '25197000', 'unit', '0', '50394000', 'WF Customized Product', '24-0132-W3', 'Mobile File', '28299', '2024-10-19 03:27:23', '2024-10-19 03:27:23'),
(75, '24-0132-W', 'Q24-0267-4', 'Mobile File 2S2D (Tinggi 2.8m)', '7', '46597000', 'unit', '0', '326179000', 'WF Customized Product', '24-0132-W4', 'Mobile File', '28299', '2024-10-19 03:27:23', '2024-10-19 03:27:23'),
(76, '24-0132-W', 'Q24-0267-5', 'Mobile File 2S3D (Tinggi 2.8m)', '1', '46597000', 'unit', '0', '46597000', 'WF Customized Product', '24-0132-W5', 'Mobile File', '28299', '2024-10-19 03:27:23', '2024-10-19 03:27:23'),
(77, '24-0132-W', 'Q24-0267-6', 'Mobile File 2S4D (Tinggi 2.8m)', '3', '57297000', 'unit', '0', '171891000', 'WF Customized Product', '24-0132-W6', 'Mobile File', '28299', '2024-10-19 03:27:23', '2024-10-19 03:27:23'),
(78, '24-0132-W', 'Q24-0267-1', 'Mobile File 2S16D-3 Row (Tinggi 2.8m)', '1', '529200000', 'unit', '0', '529200000', 'WF Customized Product', '24-0132-W1', 'Mobile File', '25991', '2024-10-19 03:27:23', '2024-10-19 03:27:23'),
(79, '24-0132-W', 'Q24-0267-2', 'Mobile File 2S2D-4 Row (Tinggi 2.8m)', '4', '139500000', 'unit', '0', '558000000', 'WF Customized Product', '24-0132-W2', 'Mobile File', '25991', '2024-10-19 03:27:23', '2024-10-19 03:27:23'),
(80, '24-0132-W', 'Q24-0267-3', 'Mobile File 2S1D (Tinggi 2.8m)', '2', '25197000', 'unit', '0', '50394000', 'WF Customized Product', '24-0132-W3', 'Mobile File', '25991', '2024-10-19 03:27:23', '2024-10-19 03:27:23'),
(81, '24-0132-W', 'Q24-0267-4', 'Mobile File 2S2D (Tinggi 2.8m)', '7', '46597000', 'unit', '0', '326179000', 'WF Customized Product', '24-0132-W4', 'Mobile File', '25991', '2024-10-19 03:27:23', '2024-10-19 03:27:23'),
(82, '24-0132-W', 'Q24-0267-5', 'Mobile File 2S3D (Tinggi 2.8m)', '1', '46597000', 'unit', '0', '46597000', 'WF Customized Product', '24-0132-W5', 'Mobile File', '25991', '2024-10-19 03:27:23', '2024-10-19 03:27:23'),
(83, '24-0132-W', 'Q24-0267-6', 'Mobile File 2S4D (Tinggi 2.8m)', '3', '57297000', 'unit', '0', '171891000', 'WF Customized Product', '24-0132-W6', 'Mobile File', '25991', '2024-10-19 03:27:23', '2024-10-19 03:27:23'),
(84, '24-0132-W', '9099', 'abc', '3', ' 100000', 'kg', '0', ' 300000', 'SPM', '24-0132-W6', 'abc', '12345', '2024-10-19 03:27:23', '2024-10-19 03:27:23'),
(85, '24-2000-W', '302', 'Pahat ISO 2 16x16', '1', ' 249750', 'pce', '0', ' 249750', 'SPM', '24-2000-W1', '2', '31004', '2024-10-21 02:27:07', '2024-10-21 02:27:07'),
(86, '24-2000-W', '9099', 'abc', '1', ' 100000', 'batang', '0', ' 100000', 'Precision Part', '24-2000-W2', '1', '111111', '2024-10-21 02:27:07', '2024-10-21 02:27:07'),
(87, '24-2000-W', '299', 'Tool Chart', '1', ' 5494500', 'batang', '0', ' 5494500', 'Precision Part', '24-2000-W3', '1', '28299', '2024-10-21 02:27:07', '2024-10-21 02:27:07'),
(90, 'BRP14', '9099', 'abc', '11', ' 100000', 'kg', '0', ' 1100000', 'SPM', 'BRP14', 'abc', '31004', '2024-10-22 00:30:34', '2024-10-22 00:30:34'),
(91, '24-0021-W', 'Q24-0267-1', 'Mobile File 2S16D-3 Row (Tinggi 2.8m)', '1', ' 529200000', 'unit', '0', ' 529200000', 'WF Standart Product', '24-0021-W1', '66', '25991', '2024-10-22 04:45:05', '2024-10-22 04:45:05'),
(92, '24-0021-W', '300', 'Workshop Cart (Big)', '2', ' 5322450', 'pce', '0', ' 10644900', 'WF Standart Product', '24-0021-W2', '66', '28221', '2024-10-22 04:45:05', '2024-10-22 04:45:05'),
(93, '24-0021-W', '302', 'Pahat ISO 2 16x16', '3', ' 249750', 'unit', '0', ' 749250', 'WF Standart Product', '24-0021-W3', '88', '32501', '2024-10-22 04:45:05', '2024-10-22 04:45:05'),
(97, '24-0005-W', '303', 'Pahat ISO 2 20x20', '2', ' 249750', 'kg', '0', ' 499500', 'Standart Product', '24-0005-W1', 't1', '25991', '2024-10-23 14:41:28', '2024-10-23 14:41:28'),
(98, '24-0005-W', '301', 'Workshop Cart (Small)', '2', ' 4296810', 'unit', '0', ' 8593620', 'WF Customized Product', '24-0005-W2', 't2', '28299', '2024-10-23 14:41:28', '2024-10-23 14:41:28'),
(99, '24-2306-W', '011-001', 'Hydrant Box A1', '2', ' 728160', 'unit', '0', ' 1456320', 'Standart Product', '24-2306-W1', 'test1', '31004', '2024-10-28 10:58:29', '2024-10-28 10:58:29'),
(100, '24-2306-W', '210-007', 'Pahat ISO 6 16x16', '3', ' 249750', 'unit', '0', ' 749250', 'Standart Product', '24-2306-W2', 'test2', '28221', '2024-10-28 10:58:29', '2024-10-28 10:58:29'),
(102, 'STWF55', '011-005', 'Hydrant Box B', '5', ' 1363080', 'kg', '0', ' 6815400', 'SPM', 'STWF551', 'abc', '31004', '2024-10-28 14:34:00', '2024-10-28 14:34:00'),
(103, 'STWF66', '011-009', 'Fibox 001', '5', ' 545010', 'kg', '0', ' 2725050', 'SPM', 'STWF661', 'abc', '31004', '2024-10-28 14:58:19', '2024-10-28 14:58:19'),
(104, 'STWF66', '011-001', 'Hydrant Box A2', '5', ' 7281600', 'pcs', '0', ' 36408000', 'Precision Part', 'STWF662', 'abc', '26602', '2024-10-28 14:58:19', '2024-10-28 14:58:19'),
(105, 'STWF2406', '011-001', 'Hydrant Box A1', '1', ' 728160', 'pce', '0', ' 728160', 'Standart Product', 'STWF24061', 'test1', '28299', '2024-10-29 09:27:32', '2024-10-29 09:27:32'),
(106, 'STWF2406', '011-003', 'Hydrant Box A2', '1', ' 1183260', 'pcs', '0', ' 1183260', 'Standart Product', 'STWF24062', 'test2', '28299', '2024-10-29 09:27:32', '2024-10-29 09:27:32'),
(111, '24-3007-W', '011-001', 'Hydrant Box A1', '2', ' 728160', 'unit', '0', ' 1456320', 'WF Standart Product', '24-3007-W1', 'aa', '12345', '2024-11-05 06:25:26', '2024-11-05 06:25:26'),
(112, '24-3007-W', '210-007', 'Pahat ISO 6 16x16', '3', ' 249750', 'unit', '0', ' 749250', 'WF Standart Product', '24-3007-W2', 'aa', '28299', '2024-11-05 06:25:26', '2024-11-05 06:25:26'),
(114, '24-3307-W', '011-001', 'Hydrant Box A1', '2', ' 728160', 'unit', '0', ' 1456320', 'WF Standart Product', '24-3307-W1', 'aa', '26602', '2024-11-05 06:43:19', '2024-11-05 06:43:19'),
(115, '24-3307-W', '210-007', 'Pahat ISO 6 16x16', '3', ' 249750', 'unit', '0', ' 749250', 'WF Customized Product', '24-3307-W2', 'aa', '26602', '2024-11-05 06:43:19', '2024-11-05 06:43:19'),
(116, '24-2308-W', '210-003', 'Workshop Cart (Big)', '2', ' 5322450', 'batang', '0', ' 10644900', 'SPM', '24-2308-W1', '1', '28221', '2024-11-05 11:00:21', '2024-11-05 11:00:21'),
(117, '24-2308-W', '210-002', 'Tool Chart', '2', ' 5494500', 'pcs', '0', ' 10989000', 'SPM', '24-2308-W2', '2', '28221', '2024-11-05 11:00:21', '2024-11-05 11:00:21'),
(118, '24-2309-W', '210-002', 'Tool Chart', '2', ' 5494500', 'unit', '0', ' 10989000', 'SPM', '24-2309-W1', 'test1', '31004', '2024-11-11 13:47:51', '2024-11-11 13:47:51'),
(119, '24-2309-W', '210-003', 'Workshop Cart (Big)', '2', ' 5322450', 'unit', '0', ' 10644900', 'SPM', '24-2309-W2', 'test1', '31004', '2024-11-11 13:47:51', '2024-11-11 13:47:51'),
(120, '24-2310-W', '210-002', 'Tool Chart', '2', ' 5494500', 'unit', '0', ' 10989000', 'Standart Product', '24-2310-W1', 'test1', '28221', '2024-11-15 06:05:04', '2024-11-15 06:05:04'),
(121, '24-2310-W', '210-003', 'Workshop Cart (Big)', '2', ' 5322450', 'unit', '0', ' 10644900', 'Standart Product', '24-2310-W2', 'test2', '28221', '2024-11-15 06:05:04', '2024-11-15 06:05:04'),
(124, '24-2311-W', '001-004', 'Wall Cabinet', '3', ' 3049171', 'pcs', '0', ' 9147513', 'Standart Product', '24-2311-W1', '1', '26602', '2024-11-19 19:39:48', '2024-11-19 19:39:48'),
(125, '24-2311-W', '001-005', 'Top hung Cabinet', '3', ' 5894101', 'pcs', '0', ' 17682303', 'Standart Product', '24-2311-W2', '2', '26602', '2024-11-19 19:39:48', '2024-11-19 19:39:48'),
(136, '24-2311-M', '011-005', 'Hydrant Box B', '1', ' 1363080', 'pce', '0', ' 1363080', 'Precision Part', '24-2311-M1', 'aa', '28299', '2024-11-23 01:35:15', '2024-11-23 01:35:15'),
(137, '24-2311-M', '011-006', 'Hydrant Box B Glass', '1', ' 1649460', 'unit', '0', ' 1649460', 'WF Standart Product', '24-2311-M2', 'aa', '26602', '2024-11-23 01:35:15', '2024-11-23 01:35:15'),
(138, '24-2313-W', '210-002', 'Tool Chart', '2', ' 5494500', 'pcs', '0', ' 10989000', 'Standart Product', '24-2313-W1', 'test1', '25991', '2024-11-25 15:15:33', '2024-11-25 15:15:33'),
(139, '24-2313-W', '210-004', 'Workshop Cart (Small)', '2', ' 4296810', 'pcs', '0', ' 8593620', 'Standart Product', '24-2313-W2', 'test2', '25991', '2024-11-25 15:15:33', '2024-11-25 15:15:33'),
(140, 'STWF42', '011-001', 'Hydrant Box A1', '5', ' 728160', 'kg', '0', ' 3640800', 'SPM', 'STWF421', 'abc', '31004', '2024-11-25 18:46:34', '2024-11-25 18:46:34'),
(141, 'STWF42', '011-014', 'Box Hotel Safe', '5', ' 610500', 'batang', '0', ' 3052500', 'SPM', 'STWF422', 'abc', '12345', '2024-11-25 18:46:34', '2024-11-25 18:46:34'),
(142, '24-2314-W', '210-002', 'Tool Chart', '2', ' 5494500', 'pcs', '0', ' 10989000', 'Standart Product', '24-2314-W1', 'test1', '25991', '2024-11-26 10:34:15', '2024-11-26 10:34:15'),
(143, '24-2314-W', '210-004', 'Workshop Cart (Small)', '2', ' 4296810', 'pcs', '0', ' 8593620', 'Standart Product', '24-2314-W2', 'test2', '25991', '2024-11-26 10:34:15', '2024-11-26 10:34:15'),
(144, '24-2315-W', '210-002', 'Tool Chart', '2', ' 5494500', 'pcs', '0', ' 10989000', 'Standart Product', '24-2315-W1', 't1', '28299', '2024-11-26 13:06:02', '2024-11-26 13:06:02'),
(145, '24-2315-W', '210-003', 'Workshop Cart (Big)', '3', ' 5322450', 'pcs', '0', ' 15967350', 'Standart Product', '24-2315-W2', 't2', '28299', '2024-11-26 13:06:02', '2024-11-26 13:06:02'),
(146, '24-2811-W', '011-006', 'Hydrant Box B Glass', '5', ' 1649460', 'kg', '0', ' 8247300', 'SPM', '24-2811-W1', 'abc', '31004', '2024-11-28 16:35:12', '2024-11-28 16:35:12'),
(147, '24-2811-W', '011-012', 'Fibox 004', '5', ' 905760', 'batang', '0', ' 4528800', 'Precision Part', '24-2811-W2', 'abc', '32502', '2024-11-28 16:35:12', '2024-11-28 16:35:12'),
(150, '24-2911-W', '210-010', 'Pahat ISO 9 R20', '1', ' 249750', 'pcs', '0', ' 249750', 'Standart Product', '24-2911-W1', 'ABC', '31004', '2024-11-29 14:26:08', '2024-11-29 14:26:08'),
(151, '24-2911-W', '210-007', 'Pahat ISO 6 16x16', '5', ' 249750', 'pcs', '0', ' 1248750', 'WF Standart Product', '24-2911-W2', 'ABC', '26602', '2024-11-29 14:26:08', '2024-11-29 14:26:08'),
(152, 's', '210-002', 'Tool Chart', '2', ' 5494500', 'unit', '0', ' 10989000', 'Precision Part', 's1', 'qw', '26602', '2024-11-29 14:29:44', '2024-11-29 14:29:44'),
(153, 's', '210-003', 'Workshop Cart (Big)', '2', ' 5322450', 'unit', '0', ' 10644900', 'Precision Part', 's2', 'w', '25991', '2024-11-29 14:29:44', '2024-11-29 14:29:44'),
(154, '24-0212-W', '011-009', 'Fibox 001', '1', ' 545010', 'kg', '0', ' 545010', 'SPM', '24-0212-W1', 'ABC', '21015', '2024-12-02 12:40:44', '2024-12-02 12:40:44'),
(155, '24-0212-W', '011-004', 'Hydrant Box A2 Glass', '2', ' 1423020', 'batang', '0', ' 2846040', 'Precision Part', '24-0212-W2', 'ABC', '32501', '2024-12-02 12:40:44', '2024-12-02 12:40:44'),
(156, 'STFW101', '011-007', 'Hydrant Box C', '1', ' 1172160', 'kg', '0', ' 1172160', 'SPM', 'STFW1011', 'ABC', '31004', '2024-12-02 12:58:58', '2024-12-02 12:58:58'),
(157, 'STFW101', '011-006', 'Hydrant Box B Glass', '4', ' 1649460', 'batang', '0', ' 6597840', 'Standart Product', 'STFW1012', 'ABC', '32502', '2024-12-02 12:58:58', '2024-12-02 12:58:58'),
(158, 'STFW2310', '105-029', 'Cubical Table + partisi', '1', ' 3296700', 'pce', '0', ' 3296700', 'Standart Product', 'STFW23101', 'test1', '25991', '2024-12-02 16:21:24', '2024-12-02 16:21:24'),
(163, '24-1500-W', '001-001', 'Floor Cabinet 4Drawers', '1', '4995000', 'unit', '10', '4495500', 'WF Customized Product', '24-1500-W1', 'Warna RAL 1015 Gloss', '31004', '2024-12-03 11:12:18', '2024-12-03 11:12:18'),
(164, '24-1500-W', '101-001', 'Filing Cabinet 2D', '1', '2267730', 'unit', '0', '2267730', 'WF Customized Product', '24-1500-W2', 'Warna RAL 1015 Gloss', '31004', '2024-12-03 11:12:18', '2024-12-03 11:12:18'),
(165, 'Int24-1500-W', '001-001', 'Floor Cabinet 4Drawers', '2', ' 4995000', 'pce', '0', ' 9990000', 'Standart Product', 'Int24-1500-W1', 'Warna RAL 1015 Gloss', '31004', '2024-12-06 11:49:01', '2024-12-06 11:49:01'),
(173, '24-0881-M', '001', 'LEANTURN', '2', ' 290000000', 'unit', '0', '580000000', 'SPM', '24-0881-M1', '2', '31004', '2024-12-15 11:45:30', '2024-12-15 11:45:30'),
(174, '24-0881-M', '002', 'GREAT D1', '2', ' 205000000', 'unit', '0', '410000000', 'SPM', '24-0881-M2', '2', '33122', '2024-12-15 11:45:30', '2024-12-15 11:45:30'),
(175, '24-1612-W', '210-007', 'Pahat ISO 6 16x16', '2', ' 249750', 'kg', '0', '499500', 'SPM', '24-1612-W1', 'abc', '32501', '2024-12-16 15:42:16', '2024-12-16 15:42:16'),
(176, '24-1612-W', '210-010', 'Pahat ISO 9 R20', '1', ' 249750', 'kg', '0', '249750', 'Precision Part', '24-1612-W2', 'abc', '28221', '2024-12-16 15:42:16', '2024-12-16 15:42:16'),
(177, '24-1216-M', '001', 'LEANTURN', '2', ' 290000000', 'unit', '0', '580000000', 'SPM', '24-1216-M1', 'dsaf', '21015', '2024-12-16 16:32:21', '2024-12-16 16:32:21'),
(178, '24-1216-M', '002', 'GREAT D1', '2', ' 205000000', 'unit', '0', '410000000', 'SPM', '24-1216-M2', 'asf', '26602', '2024-12-16 16:32:21', '2024-12-16 16:32:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `so_target`
--

CREATE TABLE `so_target` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer` varchar(255) NOT NULL,
  `product_type` varchar(255) NOT NULL,
  `total_order` varchar(255) NOT NULL,
  `nominal_value` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `so_target`
--

INSERT INTO `so_target` (`id`, `customer`, `product_type`, `total_order`, `nominal_value`, `year`, `created_at`, `updated_at`) VALUES
(1, 'ACROE INDONESIA PT', 'WF Standart Produk', '445', 'Rp 25.000.000', '2024', '2024-01-29 02:55:30', '2024-01-29 02:55:30'),
(2, 'GUNNEBO INDONESIA DISTRIBUTION PT', 'WF Standart Produk', '200', 'Rp 5.000.000.000', '2024', '2024-02-02 07:01:39', '2024-02-02 07:01:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `standartpart_a_p_i_s`
--

CREATE TABLE `standartpart_a_p_i_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_barcode` varchar(255) NOT NULL,
  `no_item` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `kode_log` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `rak` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_minimal` int(11) NOT NULL,
  `no_katalog` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `no_akun` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `standartpart_a_p_i_s`
--

INSERT INTO `standartpart_a_p_i_s` (`id`, `no_barcode`, `no_item`, `nama_barang`, `kode_log`, `jumlah`, `satuan`, `harga`, `rak`, `total`, `tanggal`, `jumlah_minimal`, `no_katalog`, `merk`, `no_akun`, `created_at`, `updated_at`) VALUES
(6, 'SB-ABCD', '2', 'barang 2', 'B', 510, 'buah', 3000, '2', 1530000, '2024-06-04', 20, '10', 'ASUS', '112', '2024-06-18 02:13:31', '2024-06-18 07:34:25'),
(7, 'SB-EFGH', '3', 'barang 2', 'B', 300, 'buah', 4000, '2', 1200000, '2024-06-04', 20, '10', 'ASUS', '1212', '2024-06-18 02:13:31', '2024-06-18 07:11:49'),
(8, 'SB63JgRE8t', '4', 'Barcode new', 'B', 970, 'buah', 40000, '2', 38800000, '2024-06-04', 30, '10', 'ASUS', '1122', '2024-06-18 02:13:31', '2024-06-18 06:08:24'),
(9, 'SB-AoTOdXKw', '5', 'barang 3', 'C', 270, 'Buah', 4000, 'V', 1200000, '2024-06-04', 30, '23', 'ASUS', '1122', '2024-06-18 06:08:24', '2024-06-18 06:08:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `standartpart_sheet`
--

CREATE TABLE `standartpart_sheet` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `so_no` varchar(255) NOT NULL,
  `dod` date NOT NULL,
  `no_product` varchar(255) NOT NULL,
  `item_no` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `part_no` varchar(255) NOT NULL,
  `part_name` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `info` varchar(255) NOT NULL,
  `pemesanan` varchar(255) NOT NULL,
  `pesanan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `standartpart_sheet`
--

INSERT INTO `standartpart_sheet` (`id`, `order_number`, `customer`, `product`, `so_no`, `dod`, `no_product`, `item_no`, `item_name`, `part_no`, `part_name`, `qty`, `unit`, `price`, `total_price`, `info`, `pemesanan`, `pesanan`, `created_at`, `updated_at`) VALUES
(1, '15-0114-W01', 'Almik Kurnia Bersama PT', 'Almik Kurnia Bersama PT', '15-0114-W01', '2015-04-16', '2', '1.1', 'top assy', '1', 'nut m12', '8', '', '450', '3600', '', 'Almik Kurnia Bersama PT', 'Almik Kurnia Bersama PT', '2024-05-20 09:47:52', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `standart_part`
--

CREATE TABLE `standart_part` (
  `id` bigint(20) NOT NULL,
  `order_number` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `item_no` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `part_name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `item_name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `qty` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `price` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `total` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `info` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `unit` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `standart_part`
--

INSERT INTO `standart_part` (`id`, `order_number`, `item_no`, `date`, `part_name`, `item_name`, `qty`, `price`, `total`, `info`, `unit`) VALUES
(1, '24-0245-W2', '1', '2024-08-13', 'tes 1', 'I', '3', '40000', '120000.00', 's', 'm'),
(2, '24-1234-M1', '1', '2024-09-12', 'BAUT MS JF M 3 X 06', 'I', '2', '2000', '4000.00', 'a', 'pcs'),
(3, '24-1234-M1', '1', '2024-09-11', 'BAUT MS HEX M 12 X 70', 'I', '2', '1100', '2200.00', 'aa', 'pcs'),
(4, '24-1234-M1', '1', '2024-09-11', 'BAUT MS HEX M 12 X125', 't', '1', '1250', '1250.00', 'a', 'pcs'),
(5, '24-1234-M1', '1', '2024-09-11', 'BAUT MS HEX M 12 X110', 'e', '2', '159600', '319200.00', 'a', 'pcs'),
(6, '24-1408-W2', '2', '2024-09-13', 'BAUT MS HEX M 12 X125', 'b', '2', '1250', '2500.00', 'a', 'pcs'),
(7, '24-1408-W2', '2', '2024-09-20', 'DOWEL PIN ? 6 X 10', 'l', '2', '72464', '144928.00', 'a', 'pcs'),
(8, '24-23004-W1', '1', '2024-10-17', 'BAUT MS JF M 3 X 06', 'I', '23', '2000', '46000.00', '23', 'pcs'),
(9, '24-23004-W1', '1', '2024-10-17', 'BAUT MS HEX M 12 X125', 't', '23', '1250', '28750.00', '23', 'pcs'),
(10, '24-0005-W1', '1.1', '2024-10-28', 'SCRAPER SIZE 2\" - VIPER', 'p', '5', '26668', '133340.00', 'a', 'pcs'),
(11, '24-0005-W1', '1.2', '2024-10-28', 'BAUT MS HEX M 12 X125', 'r', '10', '1250', '12500.00', 'a', 'pcs'),
(12, '24-2811-W1', '1', '2024-11-28', 'INSERT ZTFD0303-MG/YBG302', '2', '3', '85000', '255000.00', 'A', 'pcs'),
(13, '24-2811-W2', '2', '2024-11-28', 'INSERT ZTFD0303-MG/YBG302', '0', '2', '85000', '170000.00', 'a', 'pcs'),
(14, '24-0245-W2', '1', '2024-11-28', 'Barang 4', 'b', '2', '72464', '144928.00', 'A', 'pcs'),
(15, '24-0245-W2', '2', '2024-11-28', 'BAUT MS JF M 3 X 06', 'b', '2', '2000', '4000.00', 'q', 'pcs'),
(16, '24-0245-W2', '3', '2024-11-28', 'Barang 4', 'b', '2', '72464', '144928.00', 'z', 'pcs'),
(17, '24-0132-W1', '1', '2024-11-28', 'BAUT MS HEX M 12 X125', '2', '2', '1250', '2500.00', 'a', 'pcs'),
(19, 'STFW1011', '1', '2024-12-02', 'BAUT MS HEX M 12 X110', '2', '2', '159600', '319200.00', 'a', 'pcs'),
(20, '24-1500-W1', '3', '2024-12-10', 'BAUT MS JF M 3 X 06', 'F', '6', '2000', '12000.00', 'ambil stock', 'pcs'),
(21, '24-1500-W1', '3', '2024-12-10', 'packing kardus', 'l', '1', '50000', '50000.00', 'purchase', 'pcs');

-- --------------------------------------------------------

--
-- Struktur dari tabel `standart_partadd`
--

CREATE TABLE `standart_partadd` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `item` varchar(255) DEFAULT NULL,
  `item_desc` varchar(255) DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `unit_price` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `disc` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_contract`
--

CREATE TABLE `sub_contract` (
  `id` bigint(20) NOT NULL,
  `order_number` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `item_no` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `dod` date NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `qty` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `unit` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `price_unit` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `total_price` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `info` varbinary(255) DEFAULT NULL,
  `vendor` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sub_contract`
--

INSERT INTO `sub_contract` (`id`, `order_number`, `item_no`, `dod`, `description`, `qty`, `unit`, `price_unit`, `total_price`, `info`, `vendor`) VALUES
(1, '24-0245-W2', '1', '2024-08-12', 'b', '2', 'buah', '10000', '20000.00', 0x62, 'abc'),
(2, '24-1234-M7', '2', '2024-08-13', 'transport', '3', 'buah', '3000', '9000.00', 0x61, '2'),
(3, '24-0245-W2', '2', '2024-09-04', 'A', '2', 'pcs', '5000', '10000.00', 0x61, 'A'),
(4, '24-0245-W2', '2', '2024-09-04', 'A', '3', 'pcs', '6000', '18000.00', 0x61, 'B'),
(5, '24-1408-W2', '2', '2024-09-12', 'aa', '2', 'pcs', '30000', '60000.00', 0x61, 'a'),
(6, '24-1408-W2', '2', '2024-09-12', 'aa', '2', 'pcs', '30000', '60000.00', 0x61, 'b'),
(7, '24-0001-W1', '1', '2024-10-15', 'Side wall', '1', 'pce', '10000', '10000.00', NULL, 'ADE'),
(8, '24-2306-W1', '1.2', '2024-10-29', 'Laser Cut', '1', 'pcs', '100000', '100000.00', NULL, 'ADE'),
(9, '24-2811-W1', '2', '2024-11-28', 'b', '3', 'pcs', '50000', '150000.00', 0x41, 'abc'),
(10, '24-2811-W2', '1', '2024-11-28', 'b', '2', 'pcs', '100000', '200000.00', 0x61, 'abc'),
(12, 'STFW1011', '2', '2024-12-02', 'asd', '2', 'pcs', '20000', '40000.00', 0x61, 'asd'),
(13, '24-1500-W1', '1.1', '2024-12-10', 'galvanish', '1', 'pcs', '500000', '500000.00', 0x67616c76616e6973, 'Chonghua');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tax_type`
--

CREATE TABLE `tax_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_tax` varchar(255) NOT NULL,
  `tax` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tax_type`
--

INSERT INTO `tax_type` (`id`, `id_tax`, `tax`, `created_at`, `updated_at`) VALUES
(1, '1', 'Pajak Pertambahan Nilai (PPN) ', '2024-01-29 02:48:39', '2024-01-29 02:48:39'),
(2, '2', 'Pajak Penghasilan Ps.22', '2024-01-29 02:48:39', '2024-01-29 02:48:39'),
(3, '3', 'Pajak Penghasilan Ps.23', '2024-01-29 02:48:39', '2024-01-29 02:48:39'),
(4, '4', 'Ekspor BPK Berwujud', '2024-01-29 02:48:39', '2024-01-29 02:48:39'),
(5, '5', 'PPN Khusus Dokumen', '2024-01-29 02:48:39', '2024-01-29 02:48:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit`
--

CREATE TABLE `unit` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_unit` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `unit`
--

INSERT INTO `unit` (`id`, `id_unit`, `unit`, `created_at`, `updated_at`) VALUES
(1, '1', 'kg', '2024-01-29 02:45:11', '2024-01-29 02:45:11'),
(2, '2', 'batang', '2024-01-29 02:45:21', '2024-01-29 02:45:21'),
(3, '3', 'pcs', '2024-01-29 02:45:28', '2024-01-29 02:45:28'),
(4, '4', 'unit', '2024-01-29 03:28:33', '2024-01-29 03:28:33'),
(5, '5', 'pce', '2024-10-16 07:56:10', '2024-10-16 07:56:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `used_times`
--

CREATE TABLE `used_times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `processing_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'not_started',
  `started_at` timestamp NULL DEFAULT NULL,
  `stopped_at` timestamp NULL DEFAULT NULL,
  `duration` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `unit` enum('ACC','ALL','EDU','FIN','HDC','HRD','MA','MDC','MEC','SECR','WF') NOT NULL,
  `role` enum('admin','superadmin','user') NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'offline'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `unit`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(1, 'MAS ADMIN', 'ADMIN', 'admin@atmi.com', 'ALL', 'superadmin', NULL, '$2y$10$ZMzusC748/DI/Qb7qXfKbuwOda.A450gr1KuWj6N9neBbdP.g3jJ.', NULL, '2024-01-29 01:36:38', '2024-07-03 07:56:36', 'offline'),
(2, 'Mba Sales', 'sales', 'sales@atmi.com', 'MA', 'user', NULL, '$2y$10$Z/glc7pVaIVb5mPGNNRcNu1PTLZuEW3oVF8Blr.6aW4UHomKY4c4C', NULL, '2024-01-29 01:36:38', '2024-05-20 04:51:11', 'offline'),
(4, 'ADMIN IT', 'adminit', 'admin22@atmi.com', 'ALL', 'superadmin', NULL, '$2y$10$5RG2tYnUyRCV2NY5uVgbM.IIdf.7GhIThtvabsf2waSlf06zOnOgq', NULL, NULL, '2025-01-03 13:58:06', 'online'),
(5, 'Gerson Manuel Sugianto', 'Gerson', 'manuelsugianto@gmail.com', 'ALL', 'superadmin', NULL, '$2y$10$MgsVKwxIJ1HnTEV4YKKglOIT7jogCPLqlQ6gJUoElhWQ3ReX.JCiK', NULL, '2024-05-20 04:52:07', '2024-08-13 14:20:01', 'online'),
(6, 'Adi Widya Wasana', 'ADI_WW', 'adi_ww@atmi.co.id', 'MDC', 'superadmin', NULL, '$2y$10$2DRRLMHO07KAjOzi.MKoseqHcptm9Tn/DugGvivGxZWWoC9VqWYfe', NULL, '2024-07-10 02:14:56', '2024-07-10 14:03:08', 'offline'),
(7, 'AE-Logistik', 'AE', 'ae@atmi.co.id', 'ALL', 'user', NULL, '$2y$10$S15OowthQgs5xwxS6d1WEu3Azauq6Db6fPhBA1Pt8XtLF5Y2xopie', NULL, '2024-07-10 02:18:29', '2024-07-10 02:18:29', 'offline'),
(8, 'Albert Simanjuntak', 'Albert', 'albert@atmi.co.id', 'MA', 'user', NULL, '$2y$10$VtdnaRTbrEtiw2s/2IuZtezlCnashL7Hw.xuIjyMcy01zGfgczHCa', NULL, '2024-07-10 02:19:25', '2024-08-19 08:51:48', 'online'),
(9, 'Anang', 'Anang R', 'anang@atmi.co.id', 'MDC', 'user', NULL, '$2y$10$3GrBLBk/7TG/w7o91cJCO.N9dAbJSxNI9hufxZQEvT6kmtd.h0dX2', NULL, '2024-07-10 02:20:54', '2024-07-10 02:20:54', 'offline'),
(10, 'Andrie', 'Andrie', 'andriep@atmi.co.id', 'MDC', 'admin', NULL, '$2y$10$vgs0ibonefp2vZ0aCNC4D.WaB3AZDfvaup4z4aIJGhLtaxBmzfavC', NULL, '2024-07-10 02:22:03', '2024-08-20 14:14:54', 'online'),
(11, 'Anton Dwi Sulastomo', 'Anton', 'antonds@atmi.co.id', 'ALL', 'superadmin', NULL, '$2y$10$a1I0FQWI0SeZNSZsKciG6.0Kqi/of6CP69yAfYrn7r6p9rvlidA7q', NULL, '2024-07-10 02:25:54', '2024-10-23 13:30:09', 'online'),
(12, 'Ary', 'ary', 'ary@atmi.co.id', 'WF', 'user', NULL, '$2y$10$ZmilXtnDn0AlJZNJ2.0oRuBTYXNVMVBvDlLqOklqqeV.cvd528C7a', NULL, '2024-07-10 02:27:48', '2024-07-10 02:27:48', 'offline'),
(13, 'Asih', 'Asih', 'asih@atmi.co.id', 'WF', 'user', NULL, '$2y$10$UD7ay/aAONp8SuTU.g1RL.4eo8omXJmIR4xV1PMeixohkstN.jWee', NULL, '2024-07-10 02:28:36', '2024-09-30 12:58:55', 'offline'),
(14, 'Assembly_MDC', 'ASSY_MDC', 'assymdc@atmi.co.id', 'MDC', 'user', NULL, '$2y$10$HDZ3bWyonGZ9Uevqedr0SuYxqy2k0nNC1x1uRSihmDBpKq7zozANG', NULL, '2024-07-10 02:30:24', '2024-07-10 02:30:24', 'offline'),
(15, 'Bintoro Setyo Hutomo', 'Bintoro', 'bintoro@atmi.co.id', 'WF', 'user', NULL, '$2y$10$69jYGwM/Dgom2eFg152.yOkwQV52Dj8/jWGkZZAaECYQjWbyAs75q', NULL, '2024-07-10 02:31:47', '2024-07-10 02:31:47', 'offline'),
(16, 'Cahyo BR', 'Cahyo_BR', 'cahyo@atmi.co.id', 'MDC', 'user', NULL, '$2y$10$Lk7zXC1dm8OJTqR4kO58NuNJBjWqPMHQft51qVeiF7jUhlMsEQmnK', NULL, '2024-07-10 02:32:44', '2024-07-10 02:32:44', 'offline'),
(17, 'Christian', 'Christian', 'christian_mebhu@atmi.co.id', 'FIN', 'user', NULL, '$2y$10$3lQdXqQs8BXIP529v9PGI.FaCiZUct8AA0zbtVgV3h0FvJcgglno6', NULL, '2024-07-10 02:35:29', '2024-07-10 02:36:14', 'offline'),
(18, 'CT', 'CT', 'CT@atmi.co.id', 'EDU', 'user', NULL, '$2y$10$e0KHglEvelkKLF86Tl6GAuxtyAO0WvaO1tSK0EABFm.BzGSDCbU6a', NULL, '2024-07-10 02:40:42', '2024-07-10 02:40:42', 'offline'),
(19, 'Cutting', 'Cutting', 'cutting@atmi.co.id', 'WF', 'user', NULL, '$2y$10$tlf1KKaRbRU.EPc4eaig0uYDydtqbHUPa22dGN3A6C9wTmaid2hyu', NULL, '2024-07-10 02:42:25', '2024-07-10 02:42:25', 'offline'),
(20, 'Deny S', 'Deny_S', 'Denys@atmi.co.id', 'ACC', 'user', NULL, '$2y$10$CGiiQveBi89TXBVL0unwgeD6NkUEw5XnoeQ8aoH37Aey9dMoR0DQK', NULL, '2024-07-10 02:43:36', '2024-07-10 02:43:36', 'offline'),
(21, 'Doddy Dia', 'Doddy_Dian', 'Doddy_dian@atmi.co.id', 'WF', 'user', NULL, '$2y$10$U0UsJVGN7j9acfJXouwGgOC1VctH8Vd4lukfXvvePTOXEy55jSjpm', NULL, '2024-07-10 02:44:47', '2024-07-10 02:44:47', 'offline'),
(22, 'Edy Yunianto', 'Edy', 'edy@atmi.co.id', 'EDU', 'user', NULL, '$2y$10$oOZb1N8BEN2K3DE2EpbVn.WDh45YsSY.kdap0.k0cY1tbhcTTB4He', NULL, '2024-07-10 02:45:47', '2024-07-10 02:45:47', 'offline'),
(23, 'Eko Yudah', 'Eko_y', 'eko_y@atmi.co.id', 'MDC', 'user', NULL, '$2y$10$xtzsMmT9hbcY9JR179.11eWkZiykhIhPnSGm.ZGDovtKmBYt6OygG', NULL, '2024-07-10 02:46:55', '2024-07-10 02:46:55', 'offline'),
(24, 'Endro SM', 'Endro', 'endro_sm@atmi.co.id', 'MDC', 'user', NULL, '$2y$10$FGiKKnrLdiudSQU93njmw.1Sp0W.eaWBzDSKdLyUBy/UvvZJ/VaR.', NULL, '2024-07-10 02:47:50', '2024-07-10 02:47:50', 'offline'),
(25, 'Eng', 'Eng', 'eng@atmi.co.is', 'ALL', 'user', NULL, '$2y$10$rACsdvgH8UnHvOYqvi1Mf.bKidw6Ov01ywy8cOlpgnfrb7qXS8quq', NULL, '2024-07-10 02:48:40', '2024-07-10 02:48:40', 'offline'),
(26, 'Eni W', 'Eni', 'marketing01@atmi.co.id', 'MA', 'user', NULL, '$2y$10$OfR3Z7BQsz4hVLCpQYVUXOccFl.hzIEYLkB71dpiRhLltLvaNYF8e', NULL, '2024-07-10 02:49:43', '2024-10-15 10:34:33', 'online'),
(27, 'Enos Kristian', 'Enos', 'enoskristian_s@atmi.co.id', 'WF', 'user', NULL, '$2y$10$KvrMPUdcNNF5TMBIkqHOeefmFgDYo6ZuYQiOzP34EWLuHYOTmqDsm', NULL, '2024-07-10 02:51:00', '2024-07-10 02:51:00', 'offline'),
(28, 'Fery', 'Fery', 'fery@atmi.co.id', 'ALL', 'user', NULL, '$2y$10$KyikNsOfVIe1CyRs9tGFw.NnMJqkxbHBjNk/u4cYet38nsoabjgoW', NULL, '2024-07-10 02:51:55', '2024-07-10 02:51:55', 'offline'),
(29, 'ftw', 'FTW', 'ftw@atmi.co.id', 'WF', 'user', NULL, '$2y$10$1Yic3QfX6IMb5UT6hDmf3eqatbfR0PlSM9wGKBt1Bt.krh5E2Xvq6', NULL, '2024-07-10 02:52:52', '2024-07-10 02:52:52', 'offline'),
(30, 'Gudang WF', 'Gudang_wf', 'gudangwg@atmi.co.id', 'WF', 'user', NULL, '$2y$10$mqnp3pDVBHsyaBnSgDc/pO2jFiOnnHr5O5SYJNmNOXt5XYfPxcYSK', NULL, '2024-07-10 02:54:34', '2024-07-10 02:54:34', 'offline'),
(31, 'Hadi Parbowo', 'Hadi_P', 'hadi_p@atmi.co.id', 'WF', 'user', NULL, '$2y$10$xaZCOrDs/nzMRxO2RZfUBOWPgQhxiNH9.v/y3FmGpb9hpi33zF9Vy', NULL, '2024-07-10 02:55:38', '2024-10-11 21:42:39', 'offline'),
(32, 'Handi Dwi C', 'Handi', 'handi@atmi.co.id', 'WF', 'user', NULL, '$2y$10$pzMft204/7ooN6sjMSn7tu6MltZf0QrcDgg8DZhhJBU2m2.6IxFzS', NULL, '2024-07-10 02:58:04', '2024-07-10 02:58:04', 'offline'),
(33, 'Hanna M', 'Hanna', 'fransesca@atmi.co.id', 'ACC', 'superadmin', NULL, '$2y$10$elU85w2KFSY28bL8Fz2YXeasDNFtY1LS.efcml6NM5WPweG9aei/a', NULL, '2024-07-10 02:59:11', '2024-10-14 13:09:48', 'online'),
(34, 'Harun Kabit', 'Harun_kabit', 'harun_kabit@atmi.co.id', 'WF', 'user', NULL, '$2y$10$zUsvF8qbUSaii2ABcLl2ped6uK3NHv7AxfYZwgUO1OgpCt50WFVPa', NULL, '2024-07-10 03:00:59', '2024-07-10 03:00:59', 'offline'),
(35, 'Hermawan B P', 'Hermawan', 'default@atmi.co.id', 'ALL', 'superadmin', NULL, '$2y$10$TD9URkOagiMVx0vnJa6YoeypMMzu6YpUoW7D/MDzpXQwQBbbe8IPC', NULL, '2024-07-10 03:02:42', '2024-07-10 03:02:42', 'offline'),
(36, 'Heru Joko', 'Herujoko', 'herujoko@atmi.co.id', 'MDC', 'user', NULL, '$2y$10$qBk0LDiHBjho0y.mCOQduO2pGLFoY0NZ79TClZNQHvGxHPree5lvC', NULL, '2024-07-10 03:03:38', '2024-07-10 03:03:38', 'offline'),
(37, 'HT', 'HT', 'ht@atmi.co.id', 'ALL', 'user', NULL, '$2y$10$TAYb2G1ivlOMzYcKzg7cleUD35ITYZhYNA/oj.1o0CcM5wb1/zLra', NULL, '2024-07-10 03:06:39', '2024-07-10 03:06:39', 'offline'),
(38, 'Ika Hartari', 'Ika', 'ika@atmi.co.id', 'FIN', 'user', NULL, '$2y$10$yvxmK6Z9bWUy0N22gkWQuO0gPtB0cKupKluz02vl2we.AqMtvV2HO', NULL, '2024-07-10 03:10:27', '2024-07-10 03:10:27', 'offline'),
(39, 'Jaka Waluya', 'Jaka', 'jaka@atmi.co.id', 'MDC', 'user', NULL, '$2y$10$ZedX8JCU37wy4ZW6SoJV7OO3Xh8.A1faLRR4Rz.44QPJY7kpu.HlW', NULL, '2024-07-10 03:12:59', '2024-07-10 03:12:59', 'offline'),
(40, 'Jakub Ari Darmawan', 'Jakub', 'jakub_ari@atmi.co.id', 'WF', 'user', NULL, '$2y$10$pQJwOZy.hI3UpLz/zrYNWOcQvA3cppUkRavBbwSow1c6.Mp7I.wZq', NULL, '2024-07-10 03:14:08', '2024-07-10 03:14:08', 'offline'),
(41, 'Victor', 'victor', 'victor@atmi.co.id', 'ALL', 'superadmin', NULL, '$2y$10$VmQV7eLZVbGN3FUNrr7DrO75FR0lNQj8AkL6RZQ9qFAqb8yBggIeq', NULL, '2024-07-10 14:05:30', '2024-12-06 08:31:14', 'online'),
(42, 'Yulius', 'Yulius', 'ycaesar01@gmail.com', 'MA', 'user', NULL, '$2y$10$xURbp1U06AP0B40Ep75oM.v4GXBllBWfNoDyEo.VRQAArZT2MHphi', NULL, '2024-07-10 14:10:48', '2024-12-16 15:39:32', 'offline'),
(43, 'ruby', 'ruby', 'ruby@atmisolo.co.id', 'MA', 'user', NULL, '$2y$10$P.PgwLitUcKMnuEl7LkCv.099oznU4ot1hQHLxO4hE8noPTLwRGOa', NULL, '2024-08-19 14:44:12', '2024-08-26 11:09:31', 'online'),
(44, 'Rini', 'Rini', 'rini@atmi.co.id', 'FIN', 'user', NULL, '$2y$10$GYsyMw6jICjVZwT3BV7FwuELUXASAbChjKKks.qt.MTBzDKd3dUOC', NULL, '2024-08-20 10:57:11', '2024-08-20 10:57:11', 'offline'),
(45, 'natalia', 'lia', 'natalia@gmail.com', 'MA', 'admin', NULL, '$2y$10$8SvT1IMv.wlMOibgOy3tBOIW8mI/e8SbW8fWkhc4/AHe5gA2RQ/NC', NULL, '2024-09-20 08:04:55', '2024-12-03 10:26:23', 'online'),
(46, 'userwf', 'userwf', 'userwf@gmail.com', 'WF', 'user', NULL, '$2y$10$NSQA0s6psQJqsoo.2HwhXeUrTpB9d14dHteFsBuTcCoNpwj9dEtU.', NULL, '2024-10-23 13:19:44', '2024-10-23 13:21:56', 'offline'),
(47, 'userma', 'userma', 'userma@gmail.com', 'MA', 'user', NULL, '$2y$10$sepG82dHw6RkIGNCfoshJ.EPZVcTtHE0Zw9nYn/XH/UhxDBj0wIAm', NULL, '2024-10-23 13:23:46', '2024-10-23 13:27:14', 'offline');

-- --------------------------------------------------------

--
-- Struktur dari tabel `work_unit`
--

CREATE TABLE `work_unit` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `work_unit` varchar(10) NOT NULL,
  `group` varchar(10) NOT NULL,
  `information` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `work_unit`
--

INSERT INTO `work_unit` (`id`, `work_unit`, `group`, `information`, `created_at`, `updated_at`) VALUES
(1, 'WF', 'WF', 'Maker', '2024-01-29 02:42:26', '2024-07-10 02:29:34'),
(2, 'MDC', 'MDC', 'Maker', '2024-02-02 06:38:51', '2024-07-10 02:32:04'),
(3, 'FIN', 'FIN', 'Finance', '2024-07-10 02:09:57', '2024-07-10 02:29:53'),
(4, 'PROD_WF', 'WF', 'App Prod', '2024-07-10 02:10:39', '2024-07-10 02:47:24'),
(5, 'MA', 'MA', 'App MA', '2024-07-10 02:15:11', '2024-07-10 02:30:13'),
(6, 'LOG', 'LOG', 'Logistik', '2024-07-10 02:18:22', '2024-07-10 02:30:35'),
(7, 'FIN-5', 'FIN-5', 'Finance', '2024-07-10 02:18:36', '2024-07-10 02:34:29'),
(8, 'PROD_MDC', 'MDC', 'App Prod', '2024-07-10 02:18:56', '2024-07-10 02:47:11'),
(9, 'SJ_WF', 'SJ_WF', 'Cetak Surat Jalan', '2024-07-10 02:19:31', '2024-07-10 02:32:26'),
(10, 'SJ_MDC', 'SJ_MDC', 'SJ_MDC', '2024-07-10 02:19:56', '2024-07-10 02:19:56'),
(11, 'IT', 'IT', 'IT', '2024-07-10 02:20:14', '2024-07-10 02:20:14'),
(12, 'PROD_IT', 'IT', 'PROD_IT', '2024-07-10 02:20:27', '2024-07-10 02:46:57'),
(13, 'EDU', 'EDU', 'Maker', '2024-07-10 02:21:07', '2024-07-10 02:34:12'),
(14, 'SJ_IT', 'SJ_IT', 'SJ_IT', '2024-07-10 02:21:25', '2024-07-10 02:21:25'),
(15, 'TES', 'TES', 'tes', '2024-08-14 11:40:49', '2024-08-14 11:40:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `w_i_p_s`
--

CREATE TABLE `w_i_p_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_number` varchar(255) DEFAULT NULL,
  `total_sales` decimal(15,2) NOT NULL,
  `total_material_cost` decimal(15,2) NOT NULL,
  `total_labor_cost` decimal(15,2) NOT NULL,
  `total_machine_cost` decimal(15,2) NOT NULL,
  `total_standard_part_cost` decimal(15,2) NOT NULL,
  `total_sub_contract_cost` decimal(15,2) NOT NULL,
  `total_overhead_cost` decimal(15,2) NOT NULL,
  `cogs` decimal(15,2) NOT NULL,
  `gpm` decimal(15,2) NOT NULL,
  `oh_org` decimal(15,2) NOT NULL,
  `noi` decimal(15,2) NOT NULL,
  `bnp` decimal(15,2) NOT NULL,
  `lsp` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `wip_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `w_i_p_s`
--

INSERT INTO `w_i_p_s` (`id`, `order_id`, `order_number`, `total_sales`, `total_material_cost`, `total_labor_cost`, `total_machine_cost`, `total_standard_part_cost`, `total_sub_contract_cost`, `total_overhead_cost`, `cogs`, `gpm`, `oh_org`, `noi`, `bnp`, `lsp`, `created_at`, `updated_at`, `wip_date`) VALUES
(14, 15, '24-0132-W4', '1867309710.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1867309710.00', '186730971.00', '1680578739.00', '37346194.20', '1643232544.80', '2024-10-06 22:23:31', '2024-10-07 08:44:19', '2024-10-07'),
(15, 3, '24-1234-M1', '1043955000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1043955000.00', '104395500.00', '939559500.00', '20879100.00', '918680400.00', '2024-10-06 22:23:31', '2024-10-07 08:44:19', '2024-10-07'),
(16, 9, '24-0132-NEW', '1867309710.00', '0.00', '0.00', '0.00', '0.00', '0.00', '60000.00', '60000.00', '1867249710.00', '186730971.00', '1680518739.00', '37346194.20', '1643172544.80', '2024-10-06 22:23:31', '2024-10-07 08:44:19', '2024-10-07'),
(17, 16, '24-1234-M7', '1043955000.00', '0.00', '21970565.89', '18138325.44', '0.00', '9000.00', '3000000.00', '43117891.33', '1000837108.67', '104395500.00', '896441608.67', '20879100.00', '875562508.67', '2024-10-06 22:23:31', '2024-10-06 22:23:37', '2024-10-06'),
(18, 17, '24-0245-W2', '10545000.00', '0.00', '670.51', '3997.37', '5015000.00', '48000.00', '0.00', '5067667.88', '5477332.12', '1054500.00', '4422832.12', '210900.00', '4211932.12', '2024-10-06 22:23:31', '2024-10-06 22:23:37', '2024-10-06'),
(19, 25, '24-0132-W5', '1867309710.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1867309710.00', '186730971.00', '1680578739.00', '37346194.20', '1643232544.80', '2024-10-06 22:23:31', '2024-10-07 08:44:19', '2024-10-07'),
(20, 27, '24-1408-W3', '255000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '255000.00', '25500.00', '229500.00', '5100.00', '224400.00', '2024-10-06 22:23:31', '2024-10-07 08:44:19', '2024-10-07'),
(22, 3, '24-1234-M1', '1043955000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1043955000.00', '104395500.00', '939559500.00', '20879100.00', '918680400.00', '2024-10-07 08:39:25', '2024-10-07 08:39:29', '2024-10-07'),
(23, 16, '24-1234-M7', '1043955000.00', '0.00', '21970565.89', '18138325.44', '0.00', '9000.00', '3000000.00', '43117891.33', '1000837108.67', '104395500.00', '896441608.67', '20879100.00', '875562508.67', '2024-10-07 08:39:25', '2024-10-07 08:44:19', '2024-10-07'),
(24, 17, '24-0245-W2', '10545000.00', '0.00', '670.51', '3997.37', '5015000.00', '48000.00', '0.00', '5067667.88', '5477332.12', '1054500.00', '4422832.12', '210900.00', '4211932.12', '2024-10-07 08:39:25', '2024-10-07 08:44:19', '2024-10-07'),
(25, 25, '24-0132-W5', '1867309710.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1867309710.00', '186730971.00', '1680578739.00', '37346194.20', '1643232544.80', '2024-10-07 08:39:25', '2024-10-07 08:39:25', '2024-10-07'),
(26, 27, '24-1408-W3', '255000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '255000.00', '25500.00', '229500.00', '5100.00', '224400.00', '2024-10-07 08:39:25', '2024-10-07 08:39:31', '2024-10-07'),
(27, 25, '24-0132-W5', '1867309710.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1867309710.00', '186730971.00', '1680578739.00', '37346194.20', '1643232544.80', '2024-10-08 13:51:24', '2024-10-08 13:51:24', '2024-10-08'),
(28, 3, '24-1234-M1', '1043955000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1043955000.00', '104395500.00', '939559500.00', '20879100.00', '918680400.00', '2024-10-08 13:51:24', '2024-10-08 13:51:24', '2024-10-08'),
(29, 9, '24-0132-NEW', '1867309710.00', '0.00', '0.00', '0.00', '0.00', '0.00', '60000.00', '60000.00', '1867249710.00', '186730971.00', '1680518739.00', '37346194.20', '1643172544.80', '2024-10-08 13:51:24', '2024-10-08 13:51:24', '2024-10-08'),
(30, 15, '24-0132-W4', '1867309710.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1867309710.00', '186730971.00', '1680578739.00', '37346194.20', '1643232544.80', '2024-10-08 13:51:24', '2024-10-08 13:51:24', '2024-10-08'),
(31, 16, '24-1234-M7', '1043955000.00', '0.00', '21970565.89', '18138325.44', '0.00', '9000.00', '3000000.00', '43117891.33', '1000837108.67', '104395500.00', '896441608.67', '20879100.00', '875562508.67', '2024-10-08 13:51:24', '2024-10-08 13:51:24', '2024-10-08'),
(32, 17, '24-0245-W2', '10545000.00', '0.00', '670.51', '3997.37', '5015000.00', '48000.00', '0.00', '5067667.88', '5477332.12', '1054500.00', '4422832.12', '210900.00', '4211932.12', '2024-10-08 13:51:24', '2024-10-08 13:51:24', '2024-10-08'),
(33, 27, '24-1408-W3', '255000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '255000.00', '25500.00', '229500.00', '5100.00', '224400.00', '2024-10-08 13:51:24', '2024-10-08 13:51:24', '2024-10-08'),
(34, 28, '24-0001-W1', '1837939110.00', '450000.00', '0.00', '0.00', '2544000.00', '10000.00', '500000.00', '3504000.00', '1834435110.00', '183793911.00', '1650641199.00', '36758782.20', '1613882416.80', '2024-10-14 14:47:37', '2024-10-14 14:49:19', '2024-10-14'),
(35, 3, '24-1234-M1', '1043955000.00', '4000000.00', '0.00', '0.00', '1925000.00', '0.00', '0.00', '5925000.00', '1038030000.00', '104395500.00', '933634500.00', '20879100.00', '912755400.00', '2024-10-14 14:47:37', '2024-10-14 14:49:19', '2024-10-14'),
(36, 16, '24-1234-M7', '1043955000.00', '0.00', '21970565.89', '18138325.44', '0.00', '9000.00', '3000000.00', '43117891.33', '1000837108.67', '104395500.00', '896441608.67', '20879100.00', '875562508.67', '2024-10-14 14:47:37', '2024-10-14 14:49:19', '2024-10-14'),
(37, 17, '24-0245-W2', '0.00', '0.00', '670.51', '3997.37', '5015000.00', '48000.00', '0.00', '5067667.88', '-5067667.88', '0.00', '-5067667.88', '0.00', '-5067667.88', '2024-10-14 14:47:37', '2024-10-14 14:49:19', '2024-10-14'),
(38, 25, '24-0132-W1', '1867309710.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1867309710.00', '186730971.00', '1680578739.00', '37346194.20', '1643232544.80', '2024-10-14 14:47:37', '2024-10-14 14:49:19', '2024-10-14'),
(39, 29, 'STWF-1024', '9990000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '9990000.00', '999000.00', '8991000.00', '199800.00', '8791200.00', '2024-10-14 14:47:37', '2024-10-14 14:49:19', '2024-10-14'),
(40, 16, '24-1234-M7', '1043955000.00', '0.00', '21970565.89', '18138325.44', '0.00', '9000.00', '3000000.00', '43117891.33', '1000837108.67', '104395500.00', '896441608.67', '20879100.00', '875562508.67', '2024-10-16 10:20:42', '2024-10-16 11:14:20', '2024-10-16'),
(41, 3, '24-1234-M1', '1043955000.00', '4000000.00', '14564258.33', '17458661.94', '1925000.00', '0.00', '0.00', '37947920.27', '1006007079.73', '104395500.00', '901611579.73', '20879100.00', '880732479.73', '2024-10-16 10:20:42', '2024-10-16 11:14:20', '2024-10-16'),
(42, 17, '24-0245-W2', '0.00', '0.00', '670.51', '3997.37', '5015000.00', '48000.00', '0.00', '5067667.88', '-5067667.88', '0.00', '-5067667.88', '0.00', '-5067667.88', '2024-10-16 10:20:42', '2024-10-16 11:14:20', '2024-10-16'),
(43, 25, '24-0132-W1', '1867309710.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1867309710.00', '186730971.00', '1680578739.00', '37346194.20', '1643232544.80', '2024-10-16 10:20:42', '2024-10-16 11:14:20', '2024-10-16'),
(44, 28, '24-0001-W1', '1837939110.00', '450000.00', '1161.78', '8875.52', '2544000.00', '10000.00', '500000.00', '3514037.30', '1834425072.70', '183793911.00', '1650631161.70', '36758782.20', '1613872379.50', '2024-10-16 10:20:42', '2024-10-16 11:14:20', '2024-10-16'),
(45, 29, 'STWF-1024', '9990000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '9990000.00', '999000.00', '8991000.00', '199800.00', '8791200.00', '2024-10-16 10:20:42', '2024-10-16 11:14:20', '2024-10-16'),
(46, 30, '24-0002-W1', '1837939110.00', '0.00', '1161.78', '8875.52', '0.00', '0.00', '0.00', '10037.30', '1837929072.70', '183793911.00', '1654135161.70', '36758782.20', '1617376379.50', '2024-10-16 10:20:42', '2024-10-16 11:14:20', '2024-10-16'),
(47, 31, '24-23001-W1', '108061330.00', '150000.00', '1274.16', '10486.75', '8116800.00', '0.00', '0.00', '8278560.91', '99782769.09', '10806133.00', '88976636.09', '2161226.60', '86815409.49', '2024-10-16 10:20:42', '2024-10-16 11:14:20', '2024-10-16'),
(48, 32, '24-23001-W2', '108061330.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '108061330.00', '10806133.00', '97255197.00', '2161226.60', '95093970.40', '2024-10-16 10:20:42', '2024-10-16 11:14:20', '2024-10-16'),
(49, 33, '24-24001-W1', '108061330.00', '0.00', '1274.16', '10486.75', '0.00', '0.00', '0.00', '11760.91', '108049569.09', '10806133.00', '97243436.09', '2161226.60', '95082209.49', '2024-10-16 10:20:42', '2024-10-16 11:14:20', '2024-10-16'),
(50, 34, '24-25001-W1', '108061330.00', '0.00', '1274.16', '10486.75', '0.00', '0.00', '0.00', '11760.91', '108049569.09', '10806133.00', '97243436.09', '2161226.60', '95082209.49', '2024-10-16 10:20:42', '2024-10-16 11:14:20', '2024-10-16'),
(51, 35, '24-23002-W1', '108061330.00', '0.00', '1274.16', '10486.75', '0.00', '0.00', '0.00', '11760.91', '108049569.09', '10806133.00', '97243436.09', '2161226.60', '95082209.49', '2024-10-16 10:20:42', '2024-10-16 11:14:20', '2024-10-16'),
(52, 36, '24-23003-W1', '108061330.00', '0.00', '1274.16', '10486.75', '0.00', '0.00', '0.00', '11760.91', '108049569.09', '10806133.00', '97243436.09', '2161226.60', '95082209.49', '2024-10-16 10:20:42', '2024-10-16 11:14:20', '2024-10-16'),
(53, 37, '24-23004-W1', '776445.00', '1348650.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1348650.00', '-572205.00', '77644.50', '-649849.50', '15528.90', '-665378.40', '2024-10-16 11:14:11', '2024-10-16 11:14:20', '2024-10-16'),
(54, 3, '24-1234-M1', '1043955000.00', '4000000.00', '14564258.33', '17458661.94', '1925000.00', '0.00', '0.00', '37947920.27', '1006007079.73', '104395500.00', '901611579.73', '20879100.00', '880732479.73', '2024-10-19 04:52:41', '2024-10-19 04:52:41', '2024-10-19'),
(55, 16, '24-1234-M7', '1043955000.00', '0.00', '21970565.89', '18138325.44', '0.00', '9000.00', '3000000.00', '43117891.33', '1000837108.67', '104395500.00', '896441608.67', '20879100.00', '875562508.67', '2024-10-19 04:52:41', '2024-10-19 04:52:41', '2024-10-19'),
(56, 17, '24-0245-W2', '0.00', '0.00', '670.51', '3997.37', '5015000.00', '48000.00', '0.00', '5067667.88', '-5067667.88', '0.00', '-5067667.88', '0.00', '-5067667.88', '2024-10-19 04:52:41', '2024-10-19 04:52:41', '2024-10-19'),
(57, 25, '24-0132-W1', '3734952420.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3734952420.00', '373495242.00', '3361457178.00', '74699048.40', '3286758129.60', '2024-10-19 04:52:41', '2024-10-19 04:52:41', '2024-10-19'),
(58, 28, '24-0001-W1', '1837939110.00', '450000.00', '1161.78', '8875.52', '2544000.00', '10000.00', '500000.00', '3514037.30', '1834425072.70', '183793911.00', '1650631161.70', '36758782.20', '1613872379.50', '2024-10-19 04:52:41', '2024-10-19 04:52:41', '2024-10-19'),
(59, 29, 'STWF-1024', '9990000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '9990000.00', '999000.00', '8991000.00', '199800.00', '8791200.00', '2024-10-19 04:52:41', '2024-10-19 04:52:41', '2024-10-19'),
(60, 30, '24-0002-W1', '1837939110.00', '0.00', '1161.78', '8875.52', '0.00', '0.00', '0.00', '10037.30', '1837929072.70', '183793911.00', '1654135161.70', '36758782.20', '1617376379.50', '2024-10-19 04:52:41', '2024-10-19 04:52:41', '2024-10-19'),
(61, 31, '24-23001-W1', '108061330.00', '150000.00', '1274.16', '10486.75', '8116800.00', '0.00', '0.00', '8278560.91', '99782769.09', '10806133.00', '88976636.09', '2161226.60', '86815409.49', '2024-10-19 04:52:41', '2024-10-19 04:52:41', '2024-10-19'),
(62, 32, '24-23001-W2', '108061330.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '108061330.00', '10806133.00', '97255197.00', '2161226.60', '95093970.40', '2024-10-19 04:52:41', '2024-10-19 04:52:41', '2024-10-19'),
(63, 33, '24-24001-W1', '108061330.00', '0.00', '1274.16', '10486.75', '0.00', '0.00', '0.00', '11760.91', '108049569.09', '10806133.00', '97243436.09', '2161226.60', '95082209.49', '2024-10-19 04:52:41', '2024-10-19 04:52:41', '2024-10-19'),
(64, 34, '24-25001-W1', '108061330.00', '0.00', '1274.16', '10486.75', '0.00', '0.00', '0.00', '11760.91', '108049569.09', '10806133.00', '97243436.09', '2161226.60', '95082209.49', '2024-10-19 04:52:41', '2024-10-19 04:52:41', '2024-10-19'),
(65, 35, '24-23002-W1', '108061330.00', '0.00', '1274.16', '10486.75', '0.00', '0.00', '0.00', '11760.91', '108049569.09', '10806133.00', '97243436.09', '2161226.60', '95082209.49', '2024-10-19 04:52:41', '2024-10-19 04:52:41', '2024-10-19'),
(66, 36, '24-23003-W1', '108061330.00', '0.00', '1274.16', '10486.75', '0.00', '0.00', '0.00', '11760.91', '108049569.09', '10806133.00', '97243436.09', '2161226.60', '95082209.49', '2024-10-19 04:52:41', '2024-10-19 04:52:41', '2024-10-19'),
(67, 37, '24-23004-W1', '776445.00', '1348650.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1348650.00', '-572205.00', '77644.50', '-649849.50', '15528.90', '-665378.40', '2024-10-19 04:52:41', '2024-10-19 04:52:41', '2024-10-19'),
(68, 16, '24-1234-M7', '1043955000.00', '0.00', '21970565.89', '18138325.44', '0.00', '9000.00', '3000000.00', '43117891.33', '1000837108.67', '104395500.00', '896441608.67', '20879100.00', '875562508.67', '2024-10-21 02:28:30', '2024-10-21 02:28:36', '2024-10-21'),
(69, 3, '24-1234-M1', '1043955000.00', '4000000.00', '14564258.33', '17458661.94', '1925000.00', '0.00', '0.00', '37947920.27', '1006007079.73', '104395500.00', '901611579.73', '20879100.00', '880732479.73', '2024-10-21 02:28:30', '2024-10-21 02:28:36', '2024-10-21'),
(70, 17, '24-0245-W2', '0.00', '0.00', '670.51', '3997.37', '5015000.00', '48000.00', '0.00', '5067667.88', '-5067667.88', '0.00', '-5067667.88', '0.00', '-5067667.88', '2024-10-21 02:28:30', '2024-10-21 02:28:36', '2024-10-21'),
(71, 25, '24-0132-W1', '3734952420.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3734952420.00', '373495242.00', '3361457178.00', '74699048.40', '3286758129.60', '2024-10-21 02:28:30', '2024-10-21 02:28:36', '2024-10-21'),
(72, 28, '24-0001-W1', '1837939110.00', '450000.00', '1161.78', '8875.52', '2544000.00', '10000.00', '500000.00', '3514037.30', '1834425072.70', '183793911.00', '1650631161.70', '36758782.20', '1613872379.50', '2024-10-21 02:28:30', '2024-10-21 02:28:36', '2024-10-21'),
(73, 29, 'STWF-1024', '9990000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '9990000.00', '999000.00', '8991000.00', '199800.00', '8791200.00', '2024-10-21 02:28:30', '2024-10-21 02:28:36', '2024-10-21'),
(74, 30, '24-0002-W1', '1837939110.00', '0.00', '1161.78', '8875.52', '0.00', '0.00', '0.00', '10037.30', '1837929072.70', '183793911.00', '1654135161.70', '36758782.20', '1617376379.50', '2024-10-21 02:28:30', '2024-10-21 02:28:36', '2024-10-21'),
(75, 31, '24-23001-W1', '108061330.00', '150000.00', '1274.16', '10486.75', '8116800.00', '0.00', '0.00', '8278560.91', '99782769.09', '10806133.00', '88976636.09', '2161226.60', '86815409.49', '2024-10-21 02:28:30', '2024-10-21 02:28:36', '2024-10-21'),
(76, 32, '24-23001-W2', '108061330.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '108061330.00', '10806133.00', '97255197.00', '2161226.60', '95093970.40', '2024-10-21 02:28:30', '2024-10-21 02:28:36', '2024-10-21'),
(77, 33, '24-24001-W1', '108061330.00', '0.00', '1274.16', '10486.75', '0.00', '0.00', '0.00', '11760.91', '108049569.09', '10806133.00', '97243436.09', '2161226.60', '95082209.49', '2024-10-21 02:28:30', '2024-10-21 02:28:36', '2024-10-21'),
(78, 34, '24-25001-W1', '108061330.00', '0.00', '1274.16', '10486.75', '0.00', '0.00', '0.00', '11760.91', '108049569.09', '10806133.00', '97243436.09', '2161226.60', '95082209.49', '2024-10-21 02:28:30', '2024-10-21 02:28:36', '2024-10-21'),
(79, 35, '24-23002-W1', '108061330.00', '0.00', '1274.16', '10486.75', '0.00', '0.00', '0.00', '11760.91', '108049569.09', '10806133.00', '97243436.09', '2161226.60', '95082209.49', '2024-10-21 02:28:30', '2024-10-21 02:28:36', '2024-10-21'),
(80, 36, '24-23003-W1', '108061330.00', '0.00', '1274.16', '10486.75', '0.00', '0.00', '0.00', '11760.91', '108049569.09', '10806133.00', '97243436.09', '2161226.60', '95082209.49', '2024-10-21 02:28:30', '2024-10-21 02:28:36', '2024-10-21'),
(81, 37, '24-23004-W1', '776445.00', '1348650.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1348650.00', '-572205.00', '77644.50', '-649849.50', '15528.90', '-665378.40', '2024-10-21 02:28:30', '2024-10-21 02:28:36', '2024-10-21'),
(82, 38, '24-2000-W1', '6487117.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '6487117.00', '648711.70', '5838405.30', '129742.34', '5708662.96', '2024-10-21 02:28:30', '2024-10-21 02:28:36', '2024-10-21'),
(83, 39, '24-2000-W2', '6487117.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '6487117.00', '648711.70', '5838405.30', '129742.34', '5708662.96', '2024-10-21 02:28:30', '2024-10-21 02:28:36', '2024-10-21'),
(84, 40, '24-2000-W3', '6487117.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '6487117.00', '648711.70', '5838405.30', '129742.34', '5708662.96', '2024-10-21 02:28:30', '2024-10-21 02:28:36', '2024-10-21'),
(85, 48, '24-0005-W2', '10093363.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '10093363.00', '1009336.30', '9084026.70', '201867.26', '8882159.44', '2024-10-25 09:14:41', '2024-10-25 09:25:51', '2024-10-25'),
(86, 3, '24-1234-M1', '1043955000.00', '4000000.00', '14564258.33', '17458661.94', '1925000.00', '0.00', '0.00', '37947920.27', '1006007079.73', '104395500.00', '901611579.73', '20879100.00', '880732479.73', '2024-10-25 09:14:41', '2024-10-25 09:25:51', '2024-10-25'),
(87, 16, '24-1234-M7', '1043955000.00', '0.00', '21970565.89', '18138325.44', '0.00', '9000.00', '3000000.00', '43117891.33', '1000837108.67', '104395500.00', '896441608.67', '20879100.00', '875562508.67', '2024-10-25 09:14:41', '2024-10-25 09:25:51', '2024-10-25'),
(88, 17, '24-0245-W2', '0.00', '0.00', '670.51', '3997.37', '5015000.00', '48000.00', '0.00', '5067667.88', '-5067667.88', '0.00', '-5067667.88', '0.00', '-5067667.88', '2024-10-25 09:14:41', '2024-10-25 09:25:51', '2024-10-25'),
(89, 25, '24-0132-W1', '3734952420.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3734952420.00', '373495242.00', '3361457178.00', '74699048.40', '3286758129.60', '2024-10-25 09:14:41', '2024-10-25 09:25:51', '2024-10-25'),
(90, 28, '24-0001-W1', '1837939110.00', '450000.00', '1161.78', '8875.52', '2544000.00', '10000.00', '500000.00', '3514037.30', '1834425072.70', '183793911.00', '1650631161.70', '36758782.20', '1613872379.50', '2024-10-25 09:14:41', '2024-10-25 09:25:51', '2024-10-25'),
(91, 29, 'STWF-1024', '9990000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '9990000.00', '999000.00', '8991000.00', '199800.00', '8791200.00', '2024-10-25 09:14:41', '2024-10-25 09:25:51', '2024-10-25'),
(92, 30, '24-0002-W1', '1837939110.00', '0.00', '1161.78', '8875.52', '0.00', '0.00', '0.00', '10037.30', '1837929072.70', '183793911.00', '1654135161.70', '36758782.20', '1617376379.50', '2024-10-25 09:14:41', '2024-10-25 09:25:51', '2024-10-25'),
(93, 31, '24-23001-W1', '108061330.00', '150000.00', '1274.16', '10486.75', '8116800.00', '0.00', '0.00', '8278560.91', '99782769.09', '10806133.00', '88976636.09', '2161226.60', '86815409.49', '2024-10-25 09:14:41', '2024-10-25 09:25:51', '2024-10-25'),
(94, 32, '24-23001-W2', '108061330.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '108061330.00', '10806133.00', '97255197.00', '2161226.60', '95093970.40', '2024-10-25 09:14:41', '2024-10-25 09:25:51', '2024-10-25'),
(95, 33, '24-24001-W1', '108061330.00', '0.00', '1274.16', '10486.75', '0.00', '0.00', '0.00', '11760.91', '108049569.09', '10806133.00', '97243436.09', '2161226.60', '95082209.49', '2024-10-25 09:14:41', '2024-10-25 09:25:51', '2024-10-25'),
(96, 34, '24-25001-W1', '108061330.00', '0.00', '1274.16', '10486.75', '0.00', '0.00', '0.00', '11760.91', '108049569.09', '10806133.00', '97243436.09', '2161226.60', '95082209.49', '2024-10-25 09:14:41', '2024-10-25 09:25:51', '2024-10-25'),
(97, 35, '24-23002-W1', '108061330.00', '0.00', '1274.16', '10486.75', '0.00', '0.00', '0.00', '11760.91', '108049569.09', '10806133.00', '97243436.09', '2161226.60', '95082209.49', '2024-10-25 09:14:41', '2024-10-25 09:25:51', '2024-10-25'),
(98, 36, '24-23003-W1', '108061330.00', '0.00', '1274.16', '10486.75', '0.00', '0.00', '0.00', '11760.91', '108049569.09', '10806133.00', '97243436.09', '2161226.60', '95082209.49', '2024-10-25 09:14:41', '2024-10-25 09:25:51', '2024-10-25'),
(99, 37, '24-23004-W1', '776445.00', '1348650.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1348650.00', '-572205.00', '77644.50', '-649849.50', '15528.90', '-665378.40', '2024-10-25 09:14:41', '2024-10-25 09:25:51', '2024-10-25'),
(100, 38, '24-2000-W1', '6487117.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '6487117.00', '648711.70', '5838405.30', '129742.34', '5708662.96', '2024-10-25 09:14:41', '2024-10-25 09:25:51', '2024-10-25'),
(101, 39, '24-2000-W2', '6487117.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '6487117.00', '648711.70', '5838405.30', '129742.34', '5708662.96', '2024-10-25 09:14:41', '2024-10-25 09:25:51', '2024-10-25'),
(102, 40, '24-2000-W3', '6487117.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '6487117.00', '648711.70', '5838405.30', '129742.34', '5708662.96', '2024-10-25 09:14:41', '2024-10-25 09:25:51', '2024-10-25'),
(103, 43, 'BRP14', '1221000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1221000.00', '122100.00', '1098900.00', '24420.00', '1074480.00', '2024-10-25 09:14:41', '2024-10-25 09:25:51', '2024-10-25'),
(104, 44, '24-0021-W1', '540594150.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '540594150.00', '54059415.00', '486534735.00', '10811883.00', '475722852.00', '2024-10-25 09:14:41', '2024-10-25 09:25:51', '2024-10-25'),
(105, 45, '24-0021-W2', '540594150.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '540594150.00', '54059415.00', '486534735.00', '10811883.00', '475722852.00', '2024-10-25 09:14:41', '2024-10-25 09:25:51', '2024-10-25'),
(106, 46, '24-0021-W3', '540594150.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '540594150.00', '54059415.00', '486534735.00', '10811883.00', '475722852.00', '2024-10-25 09:14:41', '2024-10-25 09:25:51', '2024-10-25'),
(107, 47, '24-0005-W1', '10093363.00', '0.00', '1158.93', '10690.83', '0.00', '0.00', '0.00', '11849.75', '10081513.25', '1009336.30', '9072176.95', '201867.26', '8870309.69', '2024-10-25 09:14:41', '2024-10-25 09:25:51', '2024-10-25'),
(108, 49, '24-2306-W1', '2203364.00', '375000.00', '3681.68', '11510.27', '4058400.00', '100000.00', '0.00', '4548591.95', '-2345227.95', '220336.40', '-2565564.35', '44067.28', '-2609631.63', '2024-10-28 13:19:27', '2024-10-28 13:57:17', '2024-10-28'),
(109, 3, '24-1234-M1', '1043955000.00', '4000000.00', '14564258.33', '17458661.94', '1925000.00', '0.00', '0.00', '37947920.27', '1006007079.73', '104395500.00', '901611579.73', '20879100.00', '880732479.73', '2024-10-28 13:19:27', '2024-10-28 13:57:16', '2024-10-28'),
(110, 16, '24-1234-M7', '1043955000.00', '0.00', '21970565.89', '18138325.44', '0.00', '9000.00', '3000000.00', '43117891.33', '1000837108.67', '104395500.00', '896441608.67', '20879100.00', '875562508.67', '2024-10-28 13:19:27', '2024-10-28 13:57:16', '2024-10-28'),
(111, 17, '24-0245-W2', '0.00', '0.00', '670.51', '3997.37', '5015000.00', '48000.00', '0.00', '5067667.88', '-5067667.88', '0.00', '-5067667.88', '0.00', '-5067667.88', '2024-10-28 13:19:27', '2024-10-28 13:57:16', '2024-10-28'),
(112, 25, '24-0132-W1', '3734952420.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3734952420.00', '373495242.00', '3361457178.00', '74699048.40', '3286758129.60', '2024-10-28 13:19:27', '2024-10-28 13:57:16', '2024-10-28'),
(113, 28, '24-0001-W1', '1837939110.00', '450000.00', '1161.78', '8875.52', '2544000.00', '10000.00', '500000.00', '3514037.30', '1834425072.70', '183793911.00', '1650631161.70', '36758782.20', '1613872379.50', '2024-10-28 13:19:27', '2024-10-28 13:57:16', '2024-10-28'),
(114, 29, 'STWF-1024', '9990000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '9990000.00', '999000.00', '8991000.00', '199800.00', '8791200.00', '2024-10-28 13:19:27', '2024-10-28 13:57:16', '2024-10-28'),
(115, 30, '24-0002-W1', '1837939110.00', '0.00', '1161.78', '8875.52', '0.00', '0.00', '0.00', '10037.30', '1837929072.70', '183793911.00', '1654135161.70', '36758782.20', '1617376379.50', '2024-10-28 13:19:27', '2024-10-28 13:57:16', '2024-10-28'),
(116, 31, '24-23001-W1', '108061330.00', '150000.00', '1274.16', '10486.75', '8116800.00', '0.00', '0.00', '8278560.91', '99782769.09', '10806133.00', '88976636.09', '2161226.60', '86815409.49', '2024-10-28 13:19:27', '2024-10-28 13:57:16', '2024-10-28'),
(117, 32, '24-23001-W2', '108061330.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '108061330.00', '10806133.00', '97255197.00', '2161226.60', '95093970.40', '2024-10-28 13:19:27', '2024-10-28 13:57:16', '2024-10-28'),
(118, 33, '24-24001-W1', '108061330.00', '0.00', '1274.16', '10486.75', '0.00', '0.00', '0.00', '11760.91', '108049569.09', '10806133.00', '97243436.09', '2161226.60', '95082209.49', '2024-10-28 13:19:27', '2024-10-28 13:57:16', '2024-10-28'),
(119, 34, '24-25001-W1', '108061330.00', '0.00', '1274.16', '10486.75', '0.00', '0.00', '0.00', '11760.91', '108049569.09', '10806133.00', '97243436.09', '2161226.60', '95082209.49', '2024-10-28 13:19:27', '2024-10-28 13:57:16', '2024-10-28'),
(120, 35, '24-23002-W1', '108061330.00', '0.00', '1274.16', '10486.75', '0.00', '0.00', '0.00', '11760.91', '108049569.09', '10806133.00', '97243436.09', '2161226.60', '95082209.49', '2024-10-28 13:19:27', '2024-10-28 13:57:16', '2024-10-28'),
(121, 36, '24-23003-W1', '108061330.00', '0.00', '1274.16', '10486.75', '0.00', '0.00', '0.00', '11760.91', '108049569.09', '10806133.00', '97243436.09', '2161226.60', '95082209.49', '2024-10-28 13:19:27', '2024-10-28 13:57:16', '2024-10-28'),
(122, 37, '24-23004-W1', '776445.00', '1348650.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1348650.00', '-572205.00', '77644.50', '-649849.50', '15528.90', '-665378.40', '2024-10-28 13:19:27', '2024-10-28 13:57:16', '2024-10-28'),
(123, 38, '24-2000-W1', '6487117.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '6487117.00', '648711.70', '5838405.30', '129742.34', '5708662.96', '2024-10-28 13:19:27', '2024-10-28 13:57:16', '2024-10-28'),
(124, 39, '24-2000-W2', '6487117.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '6487117.00', '648711.70', '5838405.30', '129742.34', '5708662.96', '2024-10-28 13:19:27', '2024-10-28 13:57:16', '2024-10-28'),
(125, 40, '24-2000-W3', '6487117.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '6487117.00', '648711.70', '5838405.30', '129742.34', '5708662.96', '2024-10-28 13:19:27', '2024-10-28 13:57:16', '2024-10-28'),
(126, 43, 'BRP14', '1221000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1221000.00', '122100.00', '1098900.00', '24420.00', '1074480.00', '2024-10-28 13:19:27', '2024-10-28 13:57:16', '2024-10-28'),
(127, 44, '24-0021-W1', '540594150.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '540594150.00', '54059415.00', '486534735.00', '10811883.00', '475722852.00', '2024-10-28 13:19:27', '2024-10-28 13:57:16', '2024-10-28'),
(128, 45, '24-0021-W2', '540594150.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '540594150.00', '54059415.00', '486534735.00', '10811883.00', '475722852.00', '2024-10-28 13:19:27', '2024-10-28 13:57:17', '2024-10-28'),
(129, 46, '24-0021-W3', '540594150.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '540594150.00', '54059415.00', '486534735.00', '10811883.00', '475722852.00', '2024-10-28 13:19:27', '2024-10-28 13:57:17', '2024-10-28'),
(130, 47, '24-0005-W1', '10093363.00', '0.00', '1158.93', '10690.83', '0.00', '0.00', '0.00', '11849.75', '10081513.25', '1009336.30', '9072176.95', '201867.26', '8870309.69', '2024-10-28 13:19:27', '2024-10-28 13:57:17', '2024-10-28'),
(131, 48, '24-0005-W2', '10093363.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '10093363.00', '1009336.30', '9084026.70', '201867.26', '8882159.44', '2024-10-28 13:19:27', '2024-10-28 13:57:17', '2024-10-28'),
(132, 50, '24-2306-W2', '2203364.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2203364.00', '220336.40', '1983027.60', '44067.28', '1938960.32', '2024-10-28 13:19:27', '2024-10-28 13:57:17', '2024-10-28'),
(133, 51, '24-2307-W1', '2203364.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2203364.00', '220336.40', '1983027.60', '44067.28', '1938960.32', '2024-10-28 13:19:27', '2024-10-28 13:57:17', '2024-10-28'),
(134, 28, '24-0001-W1', '1837939110.00', '450000.00', '1161.78', '8875.52', '2544000.00', '10000.00', '500000.00', '3514037.30', '1834425072.70', '183793911.00', '1650631161.70', '36758782.20', '1613872379.50', '2024-11-05 09:12:00', '2024-11-05 11:01:21', '2024-11-05'),
(135, 16, '24-1234-M7', '1043955000.00', '0.00', '21970565.89', '18138325.44', '0.00', '9000.00', '3000000.00', '43117891.33', '1000837108.67', '104395500.00', '896441608.67', '20879100.00', '875562508.67', '2024-11-05 09:12:00', '2024-11-05 11:01:21', '2024-11-05'),
(136, 17, '24-0245-W2', '0.00', '0.00', '670.51', '3997.37', '5015000.00', '48000.00', '0.00', '5067667.88', '-5067667.88', '0.00', '-5067667.88', '0.00', '-5067667.88', '2024-11-05 09:12:00', '2024-11-05 11:01:21', '2024-11-05'),
(137, 30, '24-0002-W1', '1837939110.00', '0.00', '1161.78', '8875.52', '0.00', '0.00', '0.00', '10037.30', '1837929072.70', '183793911.00', '1654135161.70', '36758782.20', '1617376379.50', '2024-11-05 09:12:00', '2024-11-05 11:01:21', '2024-11-05'),
(138, 31, '24-23001-W1', '108061330.00', '150000.00', '1274.16', '10486.75', '8116800.00', '0.00', '0.00', '8278560.91', '99782769.09', '10806133.00', '88976636.09', '2161226.60', '86815409.49', '2024-11-05 09:12:00', '2024-11-05 11:01:21', '2024-11-05'),
(139, 33, '24-24001-W1', '108061330.00', '0.00', '1274.16', '10486.75', '0.00', '0.00', '0.00', '11760.91', '108049569.09', '10806133.00', '97243436.09', '2161226.60', '95082209.49', '2024-11-05 09:12:00', '2024-11-05 11:01:21', '2024-11-05'),
(140, 47, '24-0005-W1', '10093363.00', '0.00', '1158.93', '10690.83', '0.00', '0.00', '0.00', '11849.75', '10081513.25', '1009336.30', '9072176.95', '201867.26', '8870309.69', '2024-11-05 09:12:00', '2024-11-05 11:01:21', '2024-11-05'),
(141, 52, 'STWF551', '7565094.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '7565094.00', '756509.40', '6808584.60', '151301.88', '6657282.72', '2024-11-05 11:01:18', '2024-11-05 11:01:18', '2024-11-05'),
(142, 33, '24-24001-W1', '108061330.00', '0.00', '1274.16', '10486.75', '0.00', '0.00', '0.00', '11760.91', '108049569.09', '10806133.00', '97243436.09', '2161226.60', '95082209.49', '2024-11-06 09:56:43', '2024-11-06 10:14:51', '2024-11-06'),
(143, 16, '24-1234-M7', '1043955000.00', '0.00', '21970565.89', '18138325.44', '0.00', '9000.00', '3000000.00', '43117891.33', '1000837108.67', '104395500.00', '896441608.67', '20879100.00', '875562508.67', '2024-11-06 09:56:43', '2024-11-06 10:14:51', '2024-11-06'),
(144, 17, '24-0245-W2', '0.00', '0.00', '670.51', '3997.37', '5015000.00', '48000.00', '0.00', '5067667.88', '-5067667.88', '0.00', '-5067667.88', '0.00', '-5067667.88', '2024-11-06 09:56:43', '2024-11-06 10:14:51', '2024-11-06'),
(145, 28, '24-0001-W1', '1837939110.00', '450000.00', '1161.78', '8875.52', '2544000.00', '10000.00', '500000.00', '3514037.30', '1834425072.70', '183793911.00', '1650631161.70', '36758782.20', '1613872379.50', '2024-11-06 09:56:43', '2024-11-06 10:14:51', '2024-11-06'),
(146, 30, '24-0002-W1', '1837939110.00', '0.00', '1161.78', '8875.52', '0.00', '0.00', '0.00', '10037.30', '1837929072.70', '183793911.00', '1654135161.70', '36758782.20', '1617376379.50', '2024-11-06 09:56:43', '2024-11-06 10:14:51', '2024-11-06'),
(147, 31, '24-23001-W1', '108061330.00', '150000.00', '1274.16', '10486.75', '8116800.00', '0.00', '0.00', '8278560.91', '99782769.09', '10806133.00', '88976636.09', '2161226.60', '86815409.49', '2024-11-06 09:56:43', '2024-11-06 10:14:51', '2024-11-06'),
(148, 47, '24-0005-W1', '10093363.00', '0.00', '1158.93', '10690.83', '0.00', '0.00', '0.00', '11849.75', '10081513.25', '1009336.30', '9072176.95', '201867.26', '8870309.69', '2024-11-06 09:56:43', '2024-11-06 10:14:51', '2024-11-06'),
(149, 34, '24-25001-W1', '108061330.00', '0.00', '1274.16', '10486.75', '0.00', '0.00', '0.00', '11760.91', '108049569.09', '10806133.00', '97243436.09', '2161226.60', '95082209.49', '2024-11-06 10:14:51', '2024-11-06 10:14:51', '2024-11-06'),
(150, 46, '24-0021-W3', '540594150.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '540594150.00', '54059415.00', '486534735.00', '10811883.00', '475722852.00', '2024-11-12 17:37:41', '2024-11-12 17:37:41', '2024-11-12'),
(151, 16, '24-1234-M7', '1043955000.00', '0.00', '21970565.89', '18138325.44', '0.00', '9000.00', '3000000.00', '43117891.33', '1000837108.67', '104395500.00', '896441608.67', '20879100.00', '875562508.67', '2024-11-12 17:37:41', '2024-11-12 17:39:10', '2024-11-12'),
(152, 17, '24-0245-W2', '0.00', '0.00', '670.51', '3997.37', '5015000.00', '48000.00', '0.00', '5067667.88', '-5067667.88', '0.00', '-5067667.88', '0.00', '-5067667.88', '2024-11-12 17:37:41', '2024-11-12 17:39:10', '2024-11-12'),
(153, 28, '24-0001-W1', '1837939110.00', '450000.00', '1161.78', '8875.52', '2544000.00', '10000.00', '500000.00', '3514037.30', '1834425072.70', '183793911.00', '1650631161.70', '36758782.20', '1613872379.50', '2024-11-12 17:37:41', '2024-11-12 17:39:10', '2024-11-12'),
(154, 30, '24-0002-W1', '1837939110.00', '0.00', '1161.78', '8875.52', '0.00', '0.00', '0.00', '10037.30', '1837929072.70', '183793911.00', '1654135161.70', '36758782.20', '1617376379.50', '2024-11-12 17:37:41', '2024-11-12 17:39:10', '2024-11-12'),
(155, 31, '24-23001-W1', '108061330.00', '150000.00', '1274.16', '10486.75', '8116800.00', '0.00', '0.00', '8278560.91', '99782769.09', '10806133.00', '88976636.09', '2161226.60', '86815409.49', '2024-11-12 17:37:41', '2024-11-12 17:39:10', '2024-11-12'),
(156, 33, '24-24001-W1', '108061330.00', '0.00', '1274.16', '10486.75', '0.00', '0.00', '0.00', '11760.91', '108049569.09', '10806133.00', '97243436.09', '2161226.60', '95082209.49', '2024-11-12 17:37:41', '2024-11-12 17:39:10', '2024-11-12'),
(157, 47, '24-0005-W1', '10093363.00', '0.00', '1158.93', '10690.83', '0.00', '0.00', '0.00', '11849.75', '10081513.25', '1009336.30', '9072176.95', '201867.26', '8870309.69', '2024-11-12 17:37:41', '2024-11-12 17:39:10', '2024-11-12'),
(158, 44, '24-0021-W1', '540594150.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '540594150.00', '54059415.00', '486534735.00', '10811883.00', '475722852.00', '2024-11-12 17:39:02', '2024-11-12 17:39:02', '2024-11-12'),
(159, 64, '24-2309-W1', '21612266.00', '0.00', '2419.66', '19948.72', '0.00', '0.00', '0.00', '22368.38', '21589897.62', '2161226.60', '19428671.02', '432245.32', '18996425.70', '2024-11-12 17:39:02', '2024-11-12 17:39:10', '2024-11-12'),
(160, 43, 'BRP14', '1221000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1221000.00', '122100.00', '1098900.00', '24420.00', '1074480.00', '2024-11-12 17:39:06', '2024-11-12 17:39:06', '2024-11-12'),
(161, 63, '24-2308-W2', '21612266.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '21612266.00', '2161226.60', '19451039.40', '432245.32', '19018794.08', '2024-11-12 17:39:08', '2024-11-12 17:39:08', '2024-11-12'),
(162, 65, '24-2309-W2', '21612266.00', '0.00', '19444.69', '107417.91', '0.00', '0.00', '0.00', '126862.59', '21485403.41', '2161226.60', '19324176.81', '432245.32', '18891931.49', '2024-11-14 08:10:29', '2024-11-14 14:30:10', '2024-11-14'),
(163, 16, '24-1234-M7', '1043955000.00', '0.00', '21970565.89', '18138325.44', '0.00', '9000.00', '3000000.00', '43117891.33', '1000837108.67', '104395500.00', '896441608.67', '20879100.00', '875562508.67', '2024-11-14 08:10:29', '2024-11-14 14:30:10', '2024-11-14'),
(164, 17, '24-0245-W2', '0.00', '0.00', '670.51', '3997.37', '5015000.00', '48000.00', '0.00', '5067667.88', '-5067667.88', '0.00', '-5067667.88', '0.00', '-5067667.88', '2024-11-14 08:10:29', '2024-11-14 14:30:10', '2024-11-14'),
(165, 28, '24-0001-W1', '1837939110.00', '450000.00', '1161.78', '8875.52', '2544000.00', '10000.00', '500000.00', '3514037.30', '1834425072.70', '183793911.00', '1650631161.70', '36758782.20', '1613872379.50', '2024-11-14 08:10:29', '2024-11-14 14:30:10', '2024-11-14'),
(166, 30, '24-0002-W1', '1837939110.00', '0.00', '1161.78', '8875.52', '0.00', '0.00', '0.00', '10037.30', '1837929072.70', '183793911.00', '1654135161.70', '36758782.20', '1617376379.50', '2024-11-14 08:10:29', '2024-11-14 14:30:10', '2024-11-14'),
(167, 31, '24-23001-W1', '108061330.00', '150000.00', '1274.16', '10486.75', '8116800.00', '0.00', '0.00', '8278560.91', '99782769.09', '10806133.00', '88976636.09', '2161226.60', '86815409.49', '2024-11-14 08:10:29', '2024-11-14 14:30:10', '2024-11-14'),
(168, 33, '24-24001-W1', '108061330.00', '0.00', '1274.16', '10486.75', '0.00', '0.00', '0.00', '11760.91', '108049569.09', '10806133.00', '97243436.09', '2161226.60', '95082209.49', '2024-11-14 08:10:29', '2024-11-14 14:30:10', '2024-11-14'),
(169, 47, '24-0005-W1', '10093363.00', '0.00', '1158.93', '10690.83', '0.00', '0.00', '0.00', '11849.75', '10081513.25', '1009336.30', '9072176.95', '201867.26', '8870309.69', '2024-11-14 08:10:29', '2024-11-14 14:30:10', '2024-11-14'),
(170, 64, '24-2309-W1', '21612266.00', '0.00', '2419.66', '19948.72', '0.00', '0.00', '0.00', '22368.38', '21589897.62', '2161226.60', '19428671.02', '432245.32', '18996425.70', '2024-11-14 08:10:29', '2024-11-14 14:30:10', '2024-11-14'),
(171, 29, 'STWF-1024', '9990000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '9990000.00', '999000.00', '8991000.00', '199800.00', '8791200.00', '2024-11-14 08:10:37', '2024-11-14 08:10:37', '2024-11-14'),
(172, 34, '24-25001-W1', '108061330.00', '0.00', '1274.16', '10486.75', '0.00', '0.00', '0.00', '11760.91', '108049569.09', '10806133.00', '97243436.09', '2161226.60', '95082209.49', '2024-11-14 08:10:48', '2024-11-14 08:10:48', '2024-11-14'),
(173, 44, '24-0021-W1', '540594150.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '540594150.00', '54059415.00', '486534735.00', '10811883.00', '475722852.00', '2024-11-14 10:07:28', '2024-11-14 10:17:32', '2024-11-14'),
(174, 45, '24-0021-W2', '540594150.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '540594150.00', '54059415.00', '486534735.00', '10811883.00', '475722852.00', '2024-11-14 10:25:58', '2024-11-14 10:25:58', '2024-11-14'),
(175, 30, '24-0002-W1', '1837939110.00', '0.00', '1161.78', '8875.52', '0.00', '0.00', '0.00', '10037.30', '1837929072.70', '183793911.00', '1654135161.70', '36758782.20', '1617376379.50', '2024-11-18 13:29:20', '2024-11-18 14:08:06', '2024-11-18'),
(176, 16, '24-1234-M7', '1043955000.00', '0.00', '21970565.89', '18138325.44', '0.00', '9000.00', '3000000.00', '43117891.33', '1000837108.67', '104395500.00', '896441608.67', '20879100.00', '875562508.67', '2024-11-18 13:29:20', '2024-11-18 14:08:06', '2024-11-18'),
(177, 17, '24-0245-W2', '0.00', '0.00', '670.51', '3997.37', '5015000.00', '48000.00', '0.00', '5067667.88', '-5067667.88', '0.00', '-5067667.88', '0.00', '-5067667.88', '2024-11-18 13:29:20', '2024-11-18 14:08:06', '2024-11-18'),
(178, 28, '24-0001-W1', '1837939110.00', '450000.00', '1161.78', '8875.52', '2544000.00', '10000.00', '500000.00', '3514037.30', '1834425072.70', '183793911.00', '1650631161.70', '36758782.20', '1613872379.50', '2024-11-18 13:29:20', '2024-11-18 14:08:06', '2024-11-18'),
(179, 31, '24-23001-W1', '108061330.00', '150000.00', '1274.16', '10486.75', '8116800.00', '0.00', '0.00', '8278560.91', '99782769.09', '10806133.00', '88976636.09', '2161226.60', '86815409.49', '2024-11-18 13:29:20', '2024-11-18 14:08:06', '2024-11-18'),
(180, 33, '24-24001-W1', '108061330.00', '0.00', '1274.16', '10486.75', '0.00', '0.00', '0.00', '11760.91', '108049569.09', '10806133.00', '97243436.09', '2161226.60', '95082209.49', '2024-11-18 13:29:20', '2024-11-18 14:08:06', '2024-11-18'),
(181, 47, '24-0005-W1', '10093363.00', '0.00', '1158.93', '10690.83', '0.00', '0.00', '0.00', '11849.75', '10081513.25', '1009336.30', '9072176.95', '201867.26', '8870309.69', '2024-11-18 13:29:20', '2024-11-18 14:08:06', '2024-11-18'),
(182, 64, '24-2309-W1', '21612266.00', '0.00', '2419.66', '19948.72', '0.00', '0.00', '0.00', '22368.38', '21589897.62', '2161226.60', '19428671.02', '432245.32', '18996425.70', '2024-11-18 13:29:20', '2024-11-18 14:08:06', '2024-11-18'),
(183, 65, '24-2309-W2', '21612266.00', '0.00', '19444.69', '107417.91', '0.00', '0.00', '0.00', '126862.59', '21485403.41', '2161226.60', '19324176.81', '432245.32', '18891931.49', '2024-11-18 13:29:20', '2024-11-18 14:08:06', '2024-11-18'),
(184, 66, '24-2310-W1', '22812947.00', '0.00', '6906.22', '29606.99', '0.00', '0.00', '0.00', '36513.21', '22776433.79', '2281294.70', '20495139.09', '456258.94', '20038880.15', '2024-11-18 13:32:32', '2024-11-18 14:08:06', '2024-11-18'),
(185, 67, '24-2310-W2', '22812947.00', '0.00', '4638.11', '27873.17', '0.00', '0.00', '0.00', '32511.28', '22780435.72', '2281294.70', '20499141.02', '456258.94', '20042882.08', '2024-11-18 13:32:32', '2024-11-18 14:08:06', '2024-11-18'),
(186, 3, '24-1234-M1', '1043955000.00', '4000000.00', '14564258.33', '17458661.94', '1925000.00', '0.00', '0.00', '37947920.27', '1006007079.73', '104395500.00', '901611579.73', '20879100.00', '880732479.73', '2024-11-18 13:32:33', '2024-11-18 13:32:33', '2024-11-18'),
(187, 44, '24-0021-W1', '540594150.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '540594150.00', '54059415.00', '486534735.00', '10811883.00', '475722852.00', '2024-11-18 13:45:39', '2024-11-18 13:58:30', '2024-11-18'),
(188, 46, '24-0021-W3', '540594150.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '540594150.00', '54059415.00', '486534735.00', '10811883.00', '475722852.00', '2024-11-18 13:58:04', '2024-11-18 14:07:45', '2024-11-18'),
(189, 45, '24-0021-W2', '540594150.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '540594150.00', '54059415.00', '486534735.00', '10811883.00', '475722852.00', '2024-11-18 13:58:06', '2024-11-18 14:08:06', '2024-11-18'),
(190, 16, '24-1234-M7', '1043955000.00', '0.00', '21970565.89', '18138325.44', '0.00', '9000.00', '3000000.00', '43117891.33', '1000837108.67', '104395500.00', '896441608.67', '20879100.00', '875562508.67', '2024-11-19 04:01:38', '2024-11-19 22:36:37', '2024-11-19'),
(191, 17, '24-0245-W2', '0.00', '0.00', '670.51', '3997.37', '5015000.00', '48000.00', '0.00', '5067667.88', '-5067667.88', '0.00', '-5067667.88', '0.00', '-5067667.88', '2024-11-19 04:01:38', '2024-11-19 22:36:37', '2024-11-19'),
(192, 28, '24-0001-W1', '1837939110.00', '450000.00', '1161.78', '8875.52', '2544000.00', '10000.00', '500000.00', '3514037.30', '1834425072.70', '183793911.00', '1650631161.70', '36758782.20', '1613872379.50', '2024-11-19 04:01:38', '2024-11-19 22:36:37', '2024-11-19'),
(193, 30, '24-0002-W1', '1837939110.00', '0.00', '1161.78', '8875.52', '0.00', '0.00', '0.00', '10037.30', '1837929072.70', '183793911.00', '1654135161.70', '36758782.20', '1617376379.50', '2024-11-19 04:01:38', '2024-11-19 22:36:37', '2024-11-19'),
(194, 31, '24-23001-W1', '108061330.00', '150000.00', '1274.16', '10486.75', '8116800.00', '0.00', '0.00', '8278560.91', '99782769.09', '10806133.00', '88976636.09', '2161226.60', '86815409.49', '2024-11-19 04:01:38', '2024-11-19 22:36:37', '2024-11-19'),
(195, 33, '24-24001-W1', '108061330.00', '0.00', '1274.16', '10486.75', '0.00', '0.00', '0.00', '11760.91', '108049569.09', '10806133.00', '97243436.09', '2161226.60', '95082209.49', '2024-11-19 04:01:38', '2024-11-19 22:36:37', '2024-11-19'),
(196, 47, '24-0005-W1', '10093363.00', '0.00', '1158.93', '10690.83', '0.00', '0.00', '0.00', '11849.75', '10081513.25', '1009336.30', '9072176.95', '201867.26', '8870309.69', '2024-11-19 04:01:38', '2024-11-19 22:36:37', '2024-11-19'),
(197, 64, '24-2309-W1', '21612266.00', '0.00', '2419.66', '19948.72', '0.00', '0.00', '0.00', '22368.38', '21589897.62', '2161226.60', '19428671.02', '432245.32', '18996425.70', '2024-11-19 04:01:38', '2024-11-19 22:36:37', '2024-11-19'),
(198, 65, '24-2309-W2', '21612266.00', '0.00', '19444.69', '107417.91', '0.00', '0.00', '0.00', '126862.59', '21485403.41', '2161226.60', '19324176.81', '432245.32', '18891931.49', '2024-11-19 04:01:38', '2024-11-19 22:36:37', '2024-11-19'),
(199, 66, '24-2310-W1', '22812947.00', '0.00', '6906.22', '29606.99', '0.00', '0.00', '0.00', '36513.21', '22776433.79', '2281294.70', '20495139.09', '456258.94', '20038880.15', '2024-11-19 04:01:38', '2024-11-19 22:36:37', '2024-11-19'),
(200, 67, '24-2310-W2', '22812947.00', '0.00', '4638.11', '27873.17', '0.00', '0.00', '0.00', '32511.28', '22780435.72', '2281294.70', '20499141.02', '456258.94', '20042882.08', '2024-11-19 04:01:38', '2024-11-19 22:36:37', '2024-11-19'),
(201, 46, '24-0021-W3', '540594150.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '540594150.00', '54059415.00', '486534735.00', '10811883.00', '475722852.00', '2024-11-19 21:43:14', '2024-11-19 21:43:14', '2024-11-19'),
(202, 45, '24-0021-W2', '540594150.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '540594150.00', '54059415.00', '486534735.00', '10811883.00', '475722852.00', '2024-11-19 21:43:17', '2024-11-19 21:43:17', '2024-11-19'),
(203, 44, '24-0021-W1', '540594150.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '540594150.00', '54059415.00', '486534735.00', '10811883.00', '475722852.00', '2024-11-19 21:43:18', '2024-11-19 21:43:18', '2024-11-19'),
(204, 16, '24-1234-M7', '1043955000.00', '0.00', '21970565.89', '18138325.44', '0.00', '9000.00', '3000000.00', '43117891.33', '1000837108.67', '104395500.00', '896441608.67', '20879100.00', '875562508.67', '2024-11-21 13:55:32', '2024-11-21 16:46:42', '2024-11-21'),
(205, 17, '24-0245-W2', '0.00', '0.00', '670.51', '3997.37', '5015000.00', '48000.00', '0.00', '5067667.88', '-5067667.88', '0.00', '-5067667.88', '0.00', '-5067667.88', '2024-11-21 13:55:32', '2024-11-21 16:46:42', '2024-11-21'),
(206, 28, '24-0001-W1', '1837939110.00', '450000.00', '1161.78', '8875.52', '2544000.00', '10000.00', '500000.00', '3514037.30', '1834425072.70', '183793911.00', '1650631161.70', '36758782.20', '1613872379.50', '2024-11-21 13:55:32', '2024-11-21 16:46:42', '2024-11-21'),
(207, 30, '24-0002-W1', '1837939110.00', '0.00', '1161.78', '8875.52', '0.00', '0.00', '0.00', '10037.30', '1837929072.70', '183793911.00', '1654135161.70', '36758782.20', '1617376379.50', '2024-11-21 13:55:32', '2024-11-21 16:46:42', '2024-11-21'),
(208, 31, '24-23001-W1', '108061330.00', '150000.00', '1274.16', '10486.75', '8116800.00', '0.00', '0.00', '8278560.91', '99782769.09', '10806133.00', '88976636.09', '2161226.60', '86815409.49', '2024-11-21 13:55:32', '2024-11-21 16:46:42', '2024-11-21'),
(209, 33, '24-24001-W1', '108061330.00', '0.00', '1274.16', '10486.75', '0.00', '0.00', '0.00', '11760.91', '108049569.09', '10806133.00', '97243436.09', '2161226.60', '95082209.49', '2024-11-21 13:55:32', '2024-11-21 16:46:42', '2024-11-21'),
(210, 47, '24-0005-W1', '10093363.00', '0.00', '1158.93', '10690.83', '0.00', '0.00', '0.00', '11849.75', '10081513.25', '1009336.30', '9072176.95', '201867.26', '8870309.69', '2024-11-21 13:55:32', '2024-11-21 16:46:42', '2024-11-21'),
(211, 64, '24-2309-W1', '21612266.00', '0.00', '2419.66', '19948.72', '0.00', '0.00', '0.00', '22368.38', '21589897.62', '2161226.60', '19428671.02', '432245.32', '18996425.70', '2024-11-21 13:55:32', '2024-11-21 16:46:42', '2024-11-21'),
(212, 65, '24-2309-W2', '21612266.00', '0.00', '19444.69', '107417.91', '0.00', '0.00', '0.00', '126862.59', '21485403.41', '2161226.60', '19324176.81', '432245.32', '18891931.49', '2024-11-21 13:55:32', '2024-11-21 16:46:42', '2024-11-21'),
(213, 66, '24-2310-W1', '22812947.00', '0.00', '6906.22', '29606.99', '0.00', '0.00', '0.00', '36513.21', '22776433.79', '2281294.70', '20495139.09', '456258.94', '20038880.15', '2024-11-21 13:55:32', '2024-11-21 16:46:42', '2024-11-21'),
(214, 67, '24-2310-W2', '22812947.00', '0.00', '4638.11', '27873.17', '0.00', '0.00', '0.00', '32511.28', '22780435.72', '2281294.70', '20499141.02', '456258.94', '20042882.08', '2024-11-21 13:55:32', '2024-11-21 16:46:42', '2024-11-21'),
(215, 16, '24-1234-M7', '1043955000.00', '0.00', '21970565.89', '18138325.44', '0.00', '9000.00', '3000000.00', '43117891.33', '1000837108.67', '104395500.00', '896441608.67', '20879100.00', '875562508.67', '2024-11-22 07:43:03', '2024-11-22 15:54:24', '2024-11-22'),
(216, 17, '24-0245-W2', '0.00', '0.00', '670.51', '3997.37', '5015000.00', '48000.00', '0.00', '5067667.88', '-5067667.88', '0.00', '-5067667.88', '0.00', '-5067667.88', '2024-11-22 07:43:03', '2024-11-22 15:54:24', '2024-11-22'),
(217, 28, '24-0001-W1', '1837939110.00', '450000.00', '1161.78', '8875.52', '2544000.00', '10000.00', '500000.00', '3514037.30', '1834425072.70', '183793911.00', '1650631161.70', '36758782.20', '1613872379.50', '2024-11-22 07:43:03', '2024-11-22 15:54:24', '2024-11-22'),
(218, 30, '24-0002-W1', '1837939110.00', '0.00', '1161.78', '8875.52', '0.00', '0.00', '0.00', '10037.30', '1837929072.70', '183793911.00', '1654135161.70', '36758782.20', '1617376379.50', '2024-11-22 07:43:03', '2024-11-22 15:54:24', '2024-11-22'),
(219, 31, '24-23001-W1', '108061330.00', '150000.00', '1274.16', '10486.75', '8116800.00', '0.00', '0.00', '8278560.91', '99782769.09', '10806133.00', '88976636.09', '2161226.60', '86815409.49', '2024-11-22 07:43:03', '2024-11-22 15:54:24', '2024-11-22');
INSERT INTO `w_i_p_s` (`id`, `order_id`, `order_number`, `total_sales`, `total_material_cost`, `total_labor_cost`, `total_machine_cost`, `total_standard_part_cost`, `total_sub_contract_cost`, `total_overhead_cost`, `cogs`, `gpm`, `oh_org`, `noi`, `bnp`, `lsp`, `created_at`, `updated_at`, `wip_date`) VALUES
(220, 33, '24-24001-W1', '108061330.00', '0.00', '1274.16', '10486.75', '0.00', '0.00', '0.00', '11760.91', '108049569.09', '10806133.00', '97243436.09', '2161226.60', '95082209.49', '2024-11-22 07:43:03', '2024-11-22 15:54:24', '2024-11-22'),
(221, 47, '24-0005-W1', '10093363.00', '0.00', '1158.93', '10690.83', '0.00', '0.00', '0.00', '11849.75', '10081513.25', '1009336.30', '9072176.95', '201867.26', '8870309.69', '2024-11-22 07:43:03', '2024-11-22 15:54:24', '2024-11-22'),
(222, 64, '24-2309-W1', '21612266.00', '0.00', '2419.66', '19948.72', '0.00', '0.00', '0.00', '22368.38', '21589897.62', '2161226.60', '19428671.02', '432245.32', '18996425.70', '2024-11-22 07:43:03', '2024-11-22 15:54:24', '2024-11-22'),
(223, 65, '24-2309-W2', '21612266.00', '0.00', '19444.69', '107417.91', '0.00', '0.00', '0.00', '126862.59', '21485403.41', '2161226.60', '19324176.81', '432245.32', '18891931.49', '2024-11-22 07:43:03', '2024-11-22 15:54:24', '2024-11-22'),
(224, 66, '24-2310-W1', '22812947.00', '0.00', '11544.33', '57480.16', '0.00', '0.00', '0.00', '69024.49', '22743922.51', '2281294.70', '20462627.81', '456258.94', '20006368.87', '2024-11-22 07:43:03', '2024-11-22 15:54:24', '2024-11-22'),
(225, 67, '24-2310-W2', '22812947.00', '0.00', '4638.11', '27873.17', '0.00', '0.00', '0.00', '32511.28', '22780435.72', '2281294.70', '20499141.02', '456258.94', '20042882.08', '2024-11-22 07:43:03', '2024-11-22 15:54:24', '2024-11-22'),
(226, 48, '24-0005-W2', '10093363.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '10093363.00', '1009336.30', '9084026.70', '201867.26', '8882159.44', '2024-11-22 10:07:10', '2024-11-22 10:07:14', '2024-11-22'),
(227, 16, '24-1234-M7', '1043955000.00', '0.00', '21970565.89', '18138325.44', '0.00', '9000.00', '3000000.00', '43117891.33', '1000837108.67', '104395500.00', '896441608.67', '20879100.00', '875562508.67', '2024-11-23 02:15:10', '2024-11-23 02:22:37', '2024-11-23'),
(228, 17, '24-0245-W2', '0.00', '0.00', '670.51', '3997.37', '5015000.00', '48000.00', '0.00', '5067667.88', '-5067667.88', '0.00', '-5067667.88', '0.00', '-5067667.88', '2024-11-23 02:15:10', '2024-11-23 02:22:37', '2024-11-23'),
(229, 28, '24-0001-W1', '1837939110.00', '450000.00', '1161.78', '8875.52', '2544000.00', '10000.00', '500000.00', '3514037.30', '1834425072.70', '183793911.00', '1650631161.70', '36758782.20', '1613872379.50', '2024-11-23 02:15:11', '2024-11-23 02:22:37', '2024-11-23'),
(230, 30, '24-0002-W1', '1837939110.00', '0.00', '1161.78', '8875.52', '0.00', '0.00', '0.00', '10037.30', '1837929072.70', '183793911.00', '1654135161.70', '36758782.20', '1617376379.50', '2024-11-23 02:15:11', '2024-11-23 02:22:37', '2024-11-23'),
(231, 31, '24-23001-W1', '108061330.00', '150000.00', '1274.16', '10486.75', '8116800.00', '0.00', '0.00', '8278560.91', '99782769.09', '10806133.00', '88976636.09', '2161226.60', '86815409.49', '2024-11-23 02:15:11', '2024-11-23 02:22:37', '2024-11-23'),
(232, 33, '24-24001-W1', '108061330.00', '0.00', '1274.16', '10486.75', '0.00', '0.00', '0.00', '11760.91', '108049569.09', '10806133.00', '97243436.09', '2161226.60', '95082209.49', '2024-11-23 02:15:11', '2024-11-23 02:22:37', '2024-11-23'),
(233, 47, '24-0005-W1', '10093363.00', '0.00', '1158.93', '10690.83', '0.00', '0.00', '0.00', '11849.75', '10081513.25', '1009336.30', '9072176.95', '201867.26', '8870309.69', '2024-11-23 02:15:11', '2024-11-23 02:22:37', '2024-11-23'),
(234, 64, '24-2309-W1', '21612266.00', '0.00', '2419.66', '19948.72', '0.00', '0.00', '0.00', '22368.38', '21589897.62', '2161226.60', '19428671.02', '432245.32', '18996425.70', '2024-11-23 02:15:11', '2024-11-23 02:22:37', '2024-11-23'),
(235, 65, '24-2309-W2', '21612266.00', '0.00', '19444.69', '107417.91', '0.00', '0.00', '0.00', '126862.59', '21485403.41', '2161226.60', '19324176.81', '432245.32', '18891931.49', '2024-11-23 02:15:11', '2024-11-23 02:22:37', '2024-11-23'),
(236, 66, '24-2310-W1', '22812947.00', '0.00', '11544.33', '57480.16', '0.00', '0.00', '0.00', '69024.49', '22743922.51', '2281294.70', '20462627.81', '456258.94', '20006368.87', '2024-11-23 02:15:11', '2024-11-23 02:22:37', '2024-11-23'),
(237, 67, '24-2310-W2', '22812947.00', '0.00', '4638.11', '27873.17', '0.00', '0.00', '0.00', '32511.28', '22780435.72', '2281294.70', '20499141.02', '456258.94', '20042882.08', '2024-11-23 02:15:11', '2024-11-23 02:22:37', '2024-11-23'),
(238, 79, '24-2311-M1', '3056974.00', '0.00', '85.96', '512.48', '0.00', '0.00', '0.00', '598.45', '3056375.55', '305697.40', '2750678.15', '61139.48', '2689538.67', '2024-11-23 02:15:11', '2024-11-23 02:22:37', '2024-11-23'),
(239, 80, '24-2311-M2', '3056974.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3056974.00', '305697.40', '2751276.60', '61139.48', '2690137.12', '2024-11-23 02:15:11', '2024-11-23 02:22:38', '2024-11-23'),
(240, 25, '24-0132-W1', '3734952420.00', '0.00', '889.20', '6431.74', '0.00', '0.00', '0.00', '7320.94', '3734945099.06', '373495242.00', '3361449857.06', '74699048.40', '3286750808.66', '2024-11-23 02:22:23', '2024-11-23 02:22:26', '2024-11-23'),
(241, 32, '24-23001-W2', '108061330.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '108061330.00', '10806133.00', '97255197.00', '2161226.60', '95093970.40', '2024-11-23 02:22:37', '2024-11-23 02:22:37', '2024-11-23'),
(242, 16, '24-1234-M7', '1043955000.00', '0.00', '21970565.89', '18138325.44', '0.00', '9000.00', '3000000.00', '43117891.33', '1000837108.67', '104395500.00', '896441608.67', '20879100.00', '875562508.67', '2024-11-25 15:10:59', '2024-11-25 20:18:36', '2024-11-25'),
(243, 17, '24-0245-W2', '0.00', '0.00', '670.51', '3997.37', '5015000.00', '48000.00', '0.00', '5067667.88', '-5067667.88', '0.00', '-5067667.88', '0.00', '-5067667.88', '2024-11-25 15:10:59', '2024-11-25 20:18:36', '2024-11-25'),
(244, 28, '24-0001-W1', '1837939110.00', '450000.00', '1161.78', '8875.52', '2544000.00', '10000.00', '500000.00', '3514037.30', '1834425072.70', '183793911.00', '1650631161.70', '36758782.20', '1613872379.50', '2024-11-25 15:10:59', '2024-11-25 20:18:37', '2024-11-25'),
(245, 30, '24-0002-W1', '1837939110.00', '0.00', '1161.78', '8875.52', '0.00', '0.00', '0.00', '10037.30', '1837929072.70', '183793911.00', '1654135161.70', '36758782.20', '1617376379.50', '2024-11-25 15:10:59', '2024-11-25 20:18:37', '2024-11-25'),
(246, 31, '24-23001-W1', '108061330.00', '150000.00', '1274.16', '10486.75', '8116800.00', '0.00', '0.00', '8278560.91', '99782769.09', '10806133.00', '88976636.09', '2161226.60', '86815409.49', '2024-11-25 15:10:59', '2024-11-25 20:18:37', '2024-11-25'),
(247, 33, '24-24001-W1', '108061330.00', '0.00', '1274.16', '10486.75', '0.00', '0.00', '0.00', '11760.91', '108049569.09', '10806133.00', '97243436.09', '2161226.60', '95082209.49', '2024-11-25 15:10:59', '2024-11-25 20:18:37', '2024-11-25'),
(248, 47, '24-0005-W1', '10093363.00', '0.00', '1158.93', '10690.83', '0.00', '0.00', '0.00', '11849.75', '10081513.25', '1009336.30', '9072176.95', '201867.26', '8870309.69', '2024-11-25 15:10:59', '2024-11-25 20:18:37', '2024-11-25'),
(249, 64, '24-2309-W1', '21612266.00', '0.00', '2419.66', '19948.72', '0.00', '0.00', '0.00', '22368.38', '21589897.62', '2161226.60', '19428671.02', '432245.32', '18996425.70', '2024-11-25 15:10:59', '2024-11-25 20:18:37', '2024-11-25'),
(250, 65, '24-2309-W2', '21612266.00', '0.00', '19444.69', '107417.91', '0.00', '0.00', '0.00', '126862.59', '21485403.41', '2161226.60', '19324176.81', '432245.32', '18891931.49', '2024-11-25 15:10:59', '2024-11-25 20:18:37', '2024-11-25'),
(251, 66, '24-2310-W1', '22812947.00', '0.00', '11544.33', '57480.16', '0.00', '0.00', '0.00', '69024.49', '22743922.51', '2281294.70', '20462627.81', '456258.94', '20006368.87', '2024-11-25 15:11:00', '2024-11-25 20:18:37', '2024-11-25'),
(252, 67, '24-2310-W2', '22812947.00', '0.00', '4638.11', '27873.17', '0.00', '0.00', '0.00', '32511.28', '22780435.72', '2281294.70', '20499141.02', '456258.94', '20042882.08', '2024-11-25 15:11:00', '2024-11-25 20:18:37', '2024-11-25'),
(253, 79, '24-2311-M1', '3056974.00', '0.00', '85.96', '512.48', '0.00', '0.00', '0.00', '598.45', '3056375.55', '305697.40', '2750678.15', '61139.48', '2689538.67', '2024-11-25 15:11:00', '2024-11-25 20:18:37', '2024-11-25'),
(254, 80, '24-2311-M2', '3056974.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3056974.00', '305697.40', '2751276.60', '61139.48', '2690137.12', '2024-11-25 15:11:00', '2024-11-25 20:18:37', '2024-11-25'),
(255, 45, '24-0021-W2', '540594150.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '540594150.00', '54059415.00', '486534735.00', '10811883.00', '475722852.00', '2024-11-25 18:23:09', '2024-11-25 18:23:09', '2024-11-25'),
(256, 66, '24-2310-W1', '22812947.00', '0.00', '11544.33', '57480.16', '0.00', '0.00', '0.00', '69024.49', '22743922.51', '2281294.70', '20462627.81', '456258.94', '20006368.87', '2024-11-26 13:48:25', '2024-11-26 15:17:04', '2024-11-26'),
(257, 16, '24-1234-M7', '1043955000.00', '0.00', '21970565.89', '18138325.44', '0.00', '9000.00', '3000000.00', '43117891.33', '1000837108.67', '104395500.00', '896441608.67', '20879100.00', '875562508.67', '2024-11-26 13:48:25', '2024-11-26 15:17:04', '2024-11-26'),
(258, 17, '24-0245-W2', '0.00', '0.00', '670.51', '3997.37', '5015000.00', '48000.00', '0.00', '5067667.88', '-5067667.88', '0.00', '-5067667.88', '0.00', '-5067667.88', '2024-11-26 13:48:25', '2024-11-26 15:17:04', '2024-11-26'),
(259, 28, '24-0001-W1', '1837939110.00', '450000.00', '1161.78', '8875.52', '2544000.00', '10000.00', '500000.00', '3514037.30', '1834425072.70', '183793911.00', '1650631161.70', '36758782.20', '1613872379.50', '2024-11-26 13:48:25', '2024-11-26 15:17:04', '2024-11-26'),
(260, 30, '24-0002-W1', '1837939110.00', '0.00', '1161.78', '8875.52', '0.00', '0.00', '0.00', '10037.30', '1837929072.70', '183793911.00', '1654135161.70', '36758782.20', '1617376379.50', '2024-11-26 13:48:25', '2024-11-26 15:17:04', '2024-11-26'),
(261, 31, '24-23001-W1', '108061330.00', '150000.00', '1274.16', '10486.75', '8116800.00', '0.00', '0.00', '8278560.91', '99782769.09', '10806133.00', '88976636.09', '2161226.60', '86815409.49', '2024-11-26 13:48:25', '2024-11-26 15:17:04', '2024-11-26'),
(262, 33, '24-24001-W1', '108061330.00', '0.00', '1274.16', '10486.75', '0.00', '0.00', '0.00', '11760.91', '108049569.09', '10806133.00', '97243436.09', '2161226.60', '95082209.49', '2024-11-26 13:48:25', '2024-11-26 15:17:04', '2024-11-26'),
(263, 47, '24-0005-W1', '10093363.00', '0.00', '1158.93', '10690.83', '0.00', '0.00', '0.00', '11849.75', '10081513.25', '1009336.30', '9072176.95', '201867.26', '8870309.69', '2024-11-26 13:48:25', '2024-11-26 15:17:04', '2024-11-26'),
(264, 64, '24-2309-W1', '21612266.00', '0.00', '2419.66', '19948.72', '0.00', '0.00', '0.00', '22368.38', '21589897.62', '2161226.60', '19428671.02', '432245.32', '18996425.70', '2024-11-26 13:48:25', '2024-11-26 15:17:04', '2024-11-26'),
(265, 65, '24-2309-W2', '21612266.00', '0.00', '19444.69', '107417.91', '0.00', '0.00', '0.00', '126862.59', '21485403.41', '2161226.60', '19324176.81', '432245.32', '18891931.49', '2024-11-26 13:48:25', '2024-11-26 15:17:04', '2024-11-26'),
(266, 67, '24-2310-W2', '22812947.00', '0.00', '4638.11', '27873.17', '0.00', '0.00', '0.00', '32511.28', '22780435.72', '2281294.70', '20499141.02', '456258.94', '20042882.08', '2024-11-26 13:48:25', '2024-11-26 15:17:04', '2024-11-26'),
(267, 79, '24-2311-M1', '3056974.00', '0.00', '85.96', '512.48', '0.00', '0.00', '0.00', '598.45', '3056375.55', '305697.40', '2750678.15', '61139.48', '2689538.67', '2024-11-26 13:48:25', '2024-11-26 15:17:04', '2024-11-26'),
(268, 80, '24-2311-M2', '3056974.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3056974.00', '305697.40', '2751276.60', '61139.48', '2690137.12', '2024-11-26 13:48:25', '2024-11-26 15:17:04', '2024-11-26'),
(269, 68, '24-2311-W1', '22812947.00', '0.00', '6906.22', '29606.99', '0.00', '0.00', '0.00', '36513.21', '22776433.79', '2281294.70', '20495139.09', '456258.94', '20038880.15', '2024-11-26 14:35:01', '2024-11-26 14:35:01', '2024-11-26'),
(270, 44, '24-0021-W1', '540594150.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '540594150.00', '54059415.00', '486534735.00', '10811883.00', '475722852.00', '2024-11-26 14:35:08', '2024-11-26 14:35:08', '2024-11-26'),
(271, 70, '24-0021-W6', '540594150.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '540594150.00', '54059415.00', '486534735.00', '10811883.00', '475722852.00', '2024-11-26 14:36:32', '2024-11-26 14:51:09', '2024-11-26'),
(272, 87, '24-2315-W1', '29921548.00', '0.00', '6367.57', '32831.99', '0.00', '0.00', '0.00', '39199.56', '29882348.44', '2992154.80', '26890193.64', '598430.96', '26291762.68', '2024-11-26 14:36:33', '2024-11-26 15:17:04', '2024-11-26'),
(273, 88, '24-2315-W2', '29921548.00', '0.00', '4738.33', '14383.20', '0.00', '0.00', '0.00', '19121.53', '29902426.47', '2992154.80', '26910271.67', '598430.96', '26311840.71', '2024-11-26 14:36:33', '2024-11-26 15:17:04', '2024-11-26'),
(274, 74, '24-2310-W3', '22812947.00', '0.00', '4638.11', '27873.17', '0.00', '0.00', '0.00', '32511.28', '22780435.72', '2281294.70', '20499141.02', '456258.94', '20042882.08', '2024-11-26 14:36:39', '2024-11-26 14:36:39', '2024-11-26'),
(275, 45, '24-0021-W2', '540594150.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '540594150.00', '54059415.00', '486534735.00', '10811883.00', '475722852.00', '2024-11-26 14:45:13', '2024-11-26 14:45:13', '2024-11-26'),
(276, 46, '24-0021-W3', '540594150.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '540594150.00', '54059415.00', '486534735.00', '10811883.00', '475722852.00', '2024-11-28 09:53:49', '2024-11-28 09:53:49', '2024-11-28'),
(277, 16, '24-1234-M7', '1043955000.00', '0.00', '21970565.89', '18138325.44', '0.00', '9000.00', '3000000.00', '43117891.33', '1000837108.67', '104395500.00', '896441608.67', '20879100.00', '875562508.67', '2024-11-28 09:53:49', '2024-11-28 17:29:32', '2024-11-28'),
(278, 17, '24-0245-W2', '0.00', '0.00', '670.51', '3997.37', '5015000.00', '48000.00', '0.00', '5067667.88', '-5067667.88', '0.00', '-5067667.88', '0.00', '-5067667.88', '2024-11-28 09:53:49', '2024-11-28 17:29:32', '2024-11-28'),
(279, 28, '24-0001-W1', '1837939110.00', '450000.00', '1161.78', '8875.52', '2544000.00', '10000.00', '500000.00', '3514037.30', '1834425072.70', '183793911.00', '1650631161.70', '36758782.20', '1613872379.50', '2024-11-28 09:53:49', '2024-11-28 17:29:32', '2024-11-28'),
(280, 30, '24-0002-W1', '1837939110.00', '0.00', '1161.78', '8875.52', '0.00', '0.00', '0.00', '10037.30', '1837929072.70', '183793911.00', '1654135161.70', '36758782.20', '1617376379.50', '2024-11-28 09:53:49', '2024-11-28 17:29:32', '2024-11-28'),
(281, 31, '24-23001-W1', '108061330.00', '150000.00', '1274.16', '10486.75', '8116800.00', '0.00', '0.00', '8278560.91', '99782769.09', '10806133.00', '88976636.09', '2161226.60', '86815409.49', '2024-11-28 09:53:49', '2024-11-28 17:29:32', '2024-11-28'),
(282, 33, '24-24001-W1', '108061330.00', '0.00', '1274.16', '10486.75', '0.00', '0.00', '0.00', '11760.91', '108049569.09', '10806133.00', '97243436.09', '2161226.60', '95082209.49', '2024-11-28 09:53:49', '2024-11-28 17:29:32', '2024-11-28'),
(283, 47, '24-0005-W1', '10093363.00', '0.00', '1158.93', '10690.83', '0.00', '0.00', '0.00', '11849.75', '10081513.25', '1009336.30', '9072176.95', '201867.26', '8870309.69', '2024-11-28 09:53:49', '2024-11-28 17:29:32', '2024-11-28'),
(284, 64, '24-2309-W1', '21612266.00', '0.00', '2419.66', '19948.72', '0.00', '0.00', '0.00', '22368.38', '21589897.62', '2161226.60', '19428671.02', '432245.32', '18996425.70', '2024-11-28 09:53:49', '2024-11-28 17:29:32', '2024-11-28'),
(285, 65, '24-2309-W2', '21612266.00', '0.00', '19444.69', '107417.91', '0.00', '0.00', '0.00', '126862.59', '21485403.41', '2161226.60', '19324176.81', '432245.32', '18891931.49', '2024-11-28 09:53:49', '2024-11-28 17:29:32', '2024-11-28'),
(286, 66, '24-2310-W1', '22812947.00', '0.00', '11544.33', '57480.16', '0.00', '0.00', '0.00', '69024.49', '22743922.51', '2281294.70', '20462627.81', '456258.94', '20006368.87', '2024-11-28 09:53:49', '2024-11-28 17:29:32', '2024-11-28'),
(287, 67, '24-2310-W2', '22812947.00', '0.00', '4638.11', '27873.17', '0.00', '0.00', '0.00', '32511.28', '22780435.72', '2281294.70', '20499141.02', '456258.94', '20042882.08', '2024-11-28 09:53:49', '2024-11-28 17:29:32', '2024-11-28'),
(288, 72, '24-1234-M9', '1043955000.00', '0.00', '21970565.89', '18138325.44', '0.00', '0.00', '0.00', '40108891.33', '1003846108.67', '104395500.00', '899450608.67', '20879100.00', '878571508.67', '2024-11-28 09:53:49', '2024-11-28 17:29:32', '2024-11-28'),
(289, 79, '24-2311-M1', '3056974.00', '0.00', '85.96', '512.48', '0.00', '0.00', '0.00', '598.45', '3056375.55', '305697.40', '2750678.15', '61139.48', '2689538.67', '2024-11-28 09:53:49', '2024-11-28 17:29:32', '2024-11-28'),
(290, 80, '24-2311-M2', '3056974.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3056974.00', '305697.40', '2751276.60', '61139.48', '2690137.12', '2024-11-28 09:53:49', '2024-11-28 17:29:32', '2024-11-28'),
(291, 87, '24-2315-W1', '29921548.00', '0.00', '6367.57', '32831.99', '0.00', '0.00', '0.00', '39199.56', '29882348.44', '2992154.80', '26890193.64', '598430.96', '26291762.68', '2024-11-28 09:53:49', '2024-11-28 17:29:32', '2024-11-28'),
(292, 88, '24-2315-W2', '29921548.00', '0.00', '4738.33', '14383.20', '0.00', '0.00', '0.00', '19121.53', '29902426.47', '2992154.80', '26910271.67', '598430.96', '26311840.71', '2024-11-28 09:53:49', '2024-11-28 17:29:32', '2024-11-28'),
(293, 56, 'STWF24062', '2121676.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2121676.00', '212167.60', '1909508.40', '42433.52', '1867074.88', '2024-11-28 09:54:04', '2024-11-28 09:54:04', '2024-11-28'),
(294, 89, '24-2811-W1', '14181471.00', '0.00', '387.02', '3632.83', '0.00', '150000.00', '150000.00', '304019.85', '13877451.15', '1418147.10', '12459304.05', '283629.42', '12175674.63', '2024-11-28 16:42:15', '2024-11-28 16:42:15', '2024-11-28'),
(295, 90, '24-2811-W2', '14181471.00', '0.00', '0.00', '0.00', '0.00', '200000.00', '0.00', '200000.00', '13981471.00', '1418147.10', '12563323.90', '283629.42', '12279694.48', '2024-11-28 17:29:32', '2024-11-28 17:29:32', '2024-11-28'),
(296, 91, 'STFW1011', '35700097.00', '0.00', '364.78', '3624.00', '0.00', '50000.00', '10000.00', '63988.79', '35636108.21', '3570009.70', '32066098.51', '714001.94', '31352096.57', '2024-11-29 14:20:53', '2024-11-29 14:22:08', '2024-11-29'),
(297, 16, '24-1234-M7', '1043955000.00', '0.00', '21970565.89', '18138325.44', '0.00', '9000.00', '3000000.00', '43117891.33', '1000837108.67', '104395500.00', '896441608.67', '20879100.00', '875562508.67', '2024-11-29 14:20:53', '2024-11-29 14:30:17', '2024-11-29'),
(298, 17, '24-0245-W2', '0.00', '0.00', '670.51', '3997.37', '5015000.00', '48000.00', '0.00', '5067667.88', '-5067667.88', '0.00', '-5067667.88', '0.00', '-5067667.88', '2024-11-29 14:20:53', '2024-11-29 14:30:17', '2024-11-29'),
(299, 28, '24-0001-W1', '1837939110.00', '450000.00', '1161.78', '8875.52', '2544000.00', '10000.00', '500000.00', '3514037.30', '1834425072.70', '183793911.00', '1650631161.70', '36758782.20', '1613872379.50', '2024-11-29 14:20:53', '2024-11-29 14:30:17', '2024-11-29'),
(300, 30, '24-0002-W1', '1837939110.00', '0.00', '1161.78', '8875.52', '0.00', '0.00', '0.00', '10037.30', '1837929072.70', '183793911.00', '1654135161.70', '36758782.20', '1617376379.50', '2024-11-29 14:20:53', '2024-11-29 14:30:17', '2024-11-29'),
(301, 31, '24-23001-W1', '108061330.00', '150000.00', '1274.16', '10486.75', '8116800.00', '0.00', '0.00', '8278560.91', '99782769.09', '10806133.00', '88976636.09', '2161226.60', '86815409.49', '2024-11-29 14:20:53', '2024-11-29 14:30:17', '2024-11-29'),
(302, 33, '24-24001-W1', '108061330.00', '0.00', '1274.16', '10486.75', '0.00', '0.00', '0.00', '11760.91', '108049569.09', '10806133.00', '97243436.09', '2161226.60', '95082209.49', '2024-11-29 14:20:53', '2024-11-29 14:30:17', '2024-11-29'),
(303, 47, '24-0005-W1', '10093363.00', '0.00', '1158.93', '10690.83', '0.00', '0.00', '0.00', '11849.75', '10081513.25', '1009336.30', '9072176.95', '201867.26', '8870309.69', '2024-11-29 14:20:53', '2024-11-29 14:30:17', '2024-11-29'),
(304, 64, '24-2309-W1', '21612266.00', '0.00', '2419.66', '19948.72', '0.00', '0.00', '0.00', '22368.38', '21589897.62', '2161226.60', '19428671.02', '432245.32', '18996425.70', '2024-11-29 14:20:53', '2024-11-29 14:30:17', '2024-11-29'),
(305, 65, '24-2309-W2', '21612266.00', '0.00', '19444.69', '107417.91', '0.00', '0.00', '0.00', '126862.59', '21485403.41', '2161226.60', '19324176.81', '432245.32', '18891931.49', '2024-11-29 14:20:53', '2024-11-29 14:30:17', '2024-11-29'),
(306, 66, '24-2310-W1', '22812947.00', '0.00', '11544.33', '57480.16', '0.00', '0.00', '0.00', '69024.49', '22743922.51', '2281294.70', '20462627.81', '456258.94', '20006368.87', '2024-11-29 14:20:53', '2024-11-29 14:30:17', '2024-11-29'),
(307, 67, '24-2310-W2', '22812947.00', '0.00', '4638.11', '27873.17', '0.00', '0.00', '0.00', '32511.28', '22780435.72', '2281294.70', '20499141.02', '456258.94', '20042882.08', '2024-11-29 14:20:53', '2024-11-29 14:30:17', '2024-11-29'),
(308, 72, '24-1234-M9', '1043955000.00', '0.00', '21970565.89', '18138325.44', '0.00', '0.00', '0.00', '40108891.33', '1003846108.67', '104395500.00', '899450608.67', '20879100.00', '878571508.67', '2024-11-29 14:20:53', '2024-11-29 14:30:17', '2024-11-29'),
(309, 79, '24-2311-M1', '3056974.00', '0.00', '85.96', '512.48', '0.00', '0.00', '0.00', '598.45', '3056375.55', '305697.40', '2750678.15', '61139.48', '2689538.67', '2024-11-29 14:20:53', '2024-11-29 14:30:17', '2024-11-29'),
(310, 80, '24-2311-M2', '3056974.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3056974.00', '305697.40', '2751276.60', '61139.48', '2690137.12', '2024-11-29 14:20:53', '2024-11-29 14:30:17', '2024-11-29'),
(311, 87, '24-2315-W1', '29921548.00', '0.00', '6367.57', '32831.99', '0.00', '0.00', '0.00', '39199.56', '29882348.44', '2992154.80', '26890193.64', '598430.96', '26291762.68', '2024-11-29 14:20:53', '2024-11-29 14:30:17', '2024-11-29'),
(312, 88, '24-2315-W2', '29921548.00', '0.00', '4738.33', '14383.20', '0.00', '0.00', '0.00', '19121.53', '29902426.47', '2992154.80', '26910271.67', '598430.96', '26311840.71', '2024-11-29 14:20:53', '2024-11-29 14:30:17', '2024-11-29'),
(313, 92, 'STFW1012', '35700097.00', '0.00', '601.74', '3587.38', '0.00', '0.00', '0.00', '4189.12', '35695907.88', '3570009.70', '32125898.18', '714001.94', '31411896.24', '2024-11-29 14:23:17', '2024-11-29 14:23:17', '2024-11-29'),
(314, 3, '24-1234-M1', '1043955000.00', '4000000.00', '14564258.33', '17458661.94', '1925000.00', '0.00', '0.00', '37947920.27', '1006007079.73', '104395500.00', '901611579.73', '20879100.00', '880732479.73', '2024-11-29 14:29:55', '2024-11-29 14:29:55', '2024-11-29'),
(315, 95, 's1', '21612266.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '21612266.00', '2161226.60', '19451039.40', '432245.32', '19018794.08', '2024-11-29 14:30:17', '2024-11-29 14:30:17', '2024-11-29'),
(316, 99, 'STFW1011', '8624700.00', '0.00', '1758.52', '5523.50', '0.00', '40000.00', '0.00', '47282.02', '8577417.98', '862470.00', '7714947.98', '172494.00', '7542453.98', '2024-12-02 13:27:50', '2024-12-02 13:27:50', '2024-12-02'),
(317, 16, '24-1234-M7', '1043955000.00', '0.00', '21970565.89', '18138325.44', '0.00', '9000.00', '3000000.00', '43117891.33', '1000837108.67', '104395500.00', '896441608.67', '20879100.00', '875562508.67', '2024-12-02 13:27:50', '2024-12-02 13:29:48', '2024-12-02'),
(318, 17, '24-0245-W2', '0.00', '0.00', '670.51', '3997.37', '5015000.00', '48000.00', '0.00', '5067667.88', '-5067667.88', '0.00', '-5067667.88', '0.00', '-5067667.88', '2024-12-02 13:27:50', '2024-12-02 13:29:48', '2024-12-02'),
(319, 28, '24-0001-W1', '1837939110.00', '450000.00', '1161.78', '8875.52', '2544000.00', '10000.00', '500000.00', '3514037.30', '1834425072.70', '183793911.00', '1650631161.70', '36758782.20', '1613872379.50', '2024-12-02 13:27:50', '2024-12-02 13:29:48', '2024-12-02'),
(320, 30, '24-0002-W1', '1837939110.00', '0.00', '1161.78', '8875.52', '0.00', '0.00', '0.00', '10037.30', '1837929072.70', '183793911.00', '1654135161.70', '36758782.20', '1617376379.50', '2024-12-02 13:27:50', '2024-12-02 13:29:48', '2024-12-02'),
(321, 31, '24-23001-W1', '108061330.00', '150000.00', '1274.16', '10486.75', '8116800.00', '0.00', '0.00', '8278560.91', '99782769.09', '10806133.00', '88976636.09', '2161226.60', '86815409.49', '2024-12-02 13:27:50', '2024-12-02 13:29:48', '2024-12-02'),
(322, 33, '24-24001-W1', '108061330.00', '0.00', '1274.16', '10486.75', '0.00', '0.00', '0.00', '11760.91', '108049569.09', '10806133.00', '97243436.09', '2161226.60', '95082209.49', '2024-12-02 13:27:50', '2024-12-02 13:29:48', '2024-12-02'),
(323, 47, '24-0005-W1', '10093363.00', '0.00', '1158.93', '10690.83', '0.00', '0.00', '0.00', '11849.75', '10081513.25', '1009336.30', '9072176.95', '201867.26', '8870309.69', '2024-12-02 13:27:50', '2024-12-02 13:29:49', '2024-12-02'),
(324, 64, '24-2309-W1', '21612266.00', '0.00', '2419.66', '19948.72', '0.00', '0.00', '0.00', '22368.38', '21589897.62', '2161226.60', '19428671.02', '432245.32', '18996425.70', '2024-12-02 13:27:50', '2024-12-02 13:29:49', '2024-12-02'),
(325, 65, '24-2309-W2', '21612266.00', '0.00', '19444.69', '107417.91', '0.00', '0.00', '0.00', '126862.59', '21485403.41', '2161226.60', '19324176.81', '432245.32', '18891931.49', '2024-12-02 13:27:50', '2024-12-02 13:29:49', '2024-12-02'),
(326, 66, '24-2310-W1', '22812947.00', '0.00', '11544.33', '57480.16', '0.00', '0.00', '0.00', '69024.49', '22743922.51', '2281294.70', '20462627.81', '456258.94', '20006368.87', '2024-12-02 13:27:50', '2024-12-02 13:29:49', '2024-12-02'),
(327, 67, '24-2310-W2', '22812947.00', '0.00', '4638.11', '27873.17', '0.00', '0.00', '0.00', '32511.28', '22780435.72', '2281294.70', '20499141.02', '456258.94', '20042882.08', '2024-12-02 13:27:50', '2024-12-02 13:29:49', '2024-12-02'),
(328, 72, '24-1234-M9', '1043955000.00', '0.00', '21970565.89', '18138325.44', '0.00', '0.00', '0.00', '40108891.33', '1003846108.67', '104395500.00', '899450608.67', '20879100.00', '878571508.67', '2024-12-02 13:27:50', '2024-12-02 13:29:49', '2024-12-02'),
(329, 79, '24-2311-M1', '3056974.00', '0.00', '85.96', '512.48', '0.00', '0.00', '0.00', '598.45', '3056375.55', '305697.40', '2750678.15', '61139.48', '2689538.67', '2024-12-02 13:27:50', '2024-12-02 13:29:49', '2024-12-02'),
(330, 80, '24-2311-M2', '3056974.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3056974.00', '305697.40', '2751276.60', '61139.48', '2690137.12', '2024-12-02 13:27:50', '2024-12-02 13:29:49', '2024-12-02'),
(331, 87, '24-2315-W1', '29921548.00', '0.00', '6367.57', '32831.99', '0.00', '0.00', '0.00', '39199.56', '29882348.44', '2992154.80', '26890193.64', '598430.96', '26291762.68', '2024-12-02 13:27:50', '2024-12-02 13:29:49', '2024-12-02'),
(332, 88, '24-2315-W2', '29921548.00', '0.00', '4738.33', '14383.20', '0.00', '0.00', '0.00', '19121.53', '29902426.47', '2992154.80', '26910271.67', '598430.96', '26311840.71', '2024-12-02 13:27:50', '2024-12-02 13:29:49', '2024-12-02'),
(333, 100, 'STFW1012', '8624700.00', '0.00', '1083.01', '8016.05', '0.00', '0.00', '0.00', '9099.06', '8615600.94', '862470.00', '7753130.94', '172494.00', '7580636.94', '2024-12-02 13:27:54', '2024-12-02 13:27:54', '2024-12-02'),
(334, 93, '24-2911-W1', '1663335.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1663335.00', '166333.50', '1497001.50', '33266.70', '1463734.80', '2024-12-02 13:29:48', '2024-12-02 13:29:48', '2024-12-02'),
(335, 102, '24-1500-W1', '7507185.00', '1500000.00', '26504.06', '188397.48', '4058400.00', '500000.00', '1000000.00', '7273301.54', '233883.46', '750718.50', '-516835.04', '150143.70', '-666978.74', '2024-12-06 08:50:10', '2024-12-06 23:23:43', '2024-12-06'),
(336, 16, '24-1234-M7', '1043955000.00', '0.00', '21970565.89', '18138325.44', '0.00', '9000.00', '3000000.00', '43117891.33', '1000837108.67', '104395500.00', '896441608.67', '20879100.00', '875562508.67', '2024-12-06 08:50:10', '2024-12-06 23:23:43', '2024-12-06'),
(337, 17, '24-0245-W2', '0.00', '0.00', '670.51', '3997.37', '5015000.00', '48000.00', '0.00', '5067667.88', '-5067667.88', '0.00', '-5067667.88', '0.00', '-5067667.88', '2024-12-06 08:50:10', '2024-12-06 23:23:43', '2024-12-06'),
(338, 28, '24-0001-W1', '1837939110.00', '450000.00', '1161.78', '8875.52', '2544000.00', '10000.00', '500000.00', '3514037.30', '1834425072.70', '183793911.00', '1650631161.70', '36758782.20', '1613872379.50', '2024-12-06 08:50:10', '2024-12-06 23:23:43', '2024-12-06'),
(339, 30, '24-0002-W1', '1837939110.00', '0.00', '1161.78', '8875.52', '0.00', '0.00', '0.00', '10037.30', '1837929072.70', '183793911.00', '1654135161.70', '36758782.20', '1617376379.50', '2024-12-06 08:50:10', '2024-12-06 23:23:43', '2024-12-06'),
(340, 31, '24-23001-W1', '108061330.00', '150000.00', '1274.16', '10486.75', '8116800.00', '0.00', '0.00', '8278560.91', '99782769.09', '10806133.00', '88976636.09', '2161226.60', '86815409.49', '2024-12-06 08:50:10', '2024-12-06 23:23:43', '2024-12-06'),
(341, 33, '24-24001-W1', '108061330.00', '0.00', '1274.16', '10486.75', '0.00', '0.00', '0.00', '11760.91', '108049569.09', '10806133.00', '97243436.09', '2161226.60', '95082209.49', '2024-12-06 08:50:10', '2024-12-06 23:23:43', '2024-12-06'),
(342, 47, '24-0005-W1', '10093363.00', '0.00', '1158.93', '10690.83', '0.00', '0.00', '0.00', '11849.75', '10081513.25', '1009336.30', '9072176.95', '201867.26', '8870309.69', '2024-12-06 08:50:10', '2024-12-06 23:23:43', '2024-12-06'),
(343, 64, '24-2309-W1', '21612266.00', '0.00', '2419.66', '19948.72', '0.00', '0.00', '0.00', '22368.38', '21589897.62', '2161226.60', '19428671.02', '432245.32', '18996425.70', '2024-12-06 08:50:10', '2024-12-06 23:23:43', '2024-12-06'),
(344, 65, '24-2309-W2', '21612266.00', '0.00', '19444.69', '107417.91', '0.00', '0.00', '0.00', '126862.59', '21485403.41', '2161226.60', '19324176.81', '432245.32', '18891931.49', '2024-12-06 08:50:10', '2024-12-06 23:23:43', '2024-12-06'),
(345, 66, '24-2310-W1', '22812947.00', '0.00', '11544.33', '57480.16', '0.00', '0.00', '0.00', '69024.49', '22743922.51', '2281294.70', '20462627.81', '456258.94', '20006368.87', '2024-12-06 08:50:10', '2024-12-06 23:23:43', '2024-12-06'),
(346, 67, '24-2310-W2', '22812947.00', '0.00', '4638.11', '27873.17', '0.00', '0.00', '0.00', '32511.28', '22780435.72', '2281294.70', '20499141.02', '456258.94', '20042882.08', '2024-12-06 08:50:10', '2024-12-06 23:23:43', '2024-12-06'),
(347, 72, '24-1234-M9', '1043955000.00', '0.00', '21970565.89', '18138325.44', '0.00', '0.00', '0.00', '40108891.33', '1003846108.67', '104395500.00', '899450608.67', '20879100.00', '878571508.67', '2024-12-06 08:50:10', '2024-12-06 23:23:43', '2024-12-06'),
(348, 79, '24-2311-M1', '3056974.00', '0.00', '85.96', '512.48', '0.00', '0.00', '0.00', '598.45', '3056375.55', '305697.40', '2750678.15', '61139.48', '2689538.67', '2024-12-06 08:50:10', '2024-12-06 23:23:43', '2024-12-06'),
(349, 80, '24-2311-M2', '3056974.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3056974.00', '305697.40', '2751276.60', '61139.48', '2690137.12', '2024-12-06 08:50:10', '2024-12-06 23:23:43', '2024-12-06'),
(350, 87, '24-2315-W1', '29921548.00', '0.00', '6367.57', '32831.99', '0.00', '0.00', '0.00', '39199.56', '29882348.44', '2992154.80', '26890193.64', '598430.96', '26291762.68', '2024-12-06 08:50:10', '2024-12-06 23:23:43', '2024-12-06'),
(351, 88, '24-2315-W2', '29921548.00', '0.00', '4738.33', '14383.20', '0.00', '0.00', '0.00', '19121.53', '29902426.47', '2992154.80', '26910271.67', '598430.96', '26311840.71', '2024-12-06 08:50:10', '2024-12-06 23:23:43', '2024-12-06'),
(352, 83, 'STWF421', '6693300.00', '0.00', '146.35', '1456.36', '0.00', '0.00', '0.00', '1602.71', '6691697.29', '669330.00', '6022367.29', '133866.00', '5888501.29', '2024-12-06 16:06:09', '2024-12-06 23:23:43', '2024-12-06'),
(353, 70, '24-0021-W6', '540594150.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '540594150.00', '54059415.00', '486534735.00', '10811883.00', '475722852.00', '2024-12-07 11:48:59', '2024-12-07 11:49:08', '2024-12-07'),
(354, 16, '24-1234-M7', '1043955000.00', '0.00', '21970565.89', '18138325.44', '0.00', '9000.00', '3000000.00', '43117891.33', '1000837108.67', '104395500.00', '896441608.67', '20879100.00', '875562508.67', '2024-12-07 11:48:59', '2024-12-07 11:49:08', '2024-12-07'),
(355, 17, '24-0245-W2', '0.00', '0.00', '670.51', '3997.37', '5015000.00', '48000.00', '0.00', '5067667.88', '-5067667.88', '0.00', '-5067667.88', '0.00', '-5067667.88', '2024-12-07 11:48:59', '2024-12-07 11:49:08', '2024-12-07'),
(356, 28, '24-0001-W1', '1837939110.00', '450000.00', '1161.78', '8875.52', '2544000.00', '10000.00', '500000.00', '3514037.30', '1834425072.70', '183793911.00', '1650631161.70', '36758782.20', '1613872379.50', '2024-12-07 11:48:59', '2024-12-07 11:49:08', '2024-12-07'),
(357, 30, '24-0002-W1', '1837939110.00', '0.00', '1161.78', '8875.52', '0.00', '0.00', '0.00', '10037.30', '1837929072.70', '183793911.00', '1654135161.70', '36758782.20', '1617376379.50', '2024-12-07 11:48:59', '2024-12-07 11:49:08', '2024-12-07'),
(358, 31, '24-23001-W1', '108061330.00', '150000.00', '1274.16', '10486.75', '8116800.00', '0.00', '0.00', '8278560.91', '99782769.09', '10806133.00', '88976636.09', '2161226.60', '86815409.49', '2024-12-07 11:48:59', '2024-12-07 11:49:08', '2024-12-07'),
(359, 33, '24-24001-W1', '108061330.00', '0.00', '1274.16', '10486.75', '0.00', '0.00', '0.00', '11760.91', '108049569.09', '10806133.00', '97243436.09', '2161226.60', '95082209.49', '2024-12-07 11:48:59', '2024-12-07 11:49:08', '2024-12-07'),
(360, 47, '24-0005-W1', '10093363.00', '0.00', '1158.93', '10690.83', '0.00', '0.00', '0.00', '11849.75', '10081513.25', '1009336.30', '9072176.95', '201867.26', '8870309.69', '2024-12-07 11:48:59', '2024-12-07 11:49:08', '2024-12-07'),
(361, 64, '24-2309-W1', '21612266.00', '0.00', '2419.66', '19948.72', '0.00', '0.00', '0.00', '22368.38', '21589897.62', '2161226.60', '19428671.02', '432245.32', '18996425.70', '2024-12-07 11:48:59', '2024-12-07 11:49:08', '2024-12-07'),
(362, 65, '24-2309-W2', '21612266.00', '0.00', '19444.69', '107417.91', '0.00', '0.00', '0.00', '126862.59', '21485403.41', '2161226.60', '19324176.81', '432245.32', '18891931.49', '2024-12-07 11:48:59', '2024-12-07 11:49:08', '2024-12-07'),
(363, 66, '24-2310-W1', '22812947.00', '0.00', '11544.33', '57480.16', '0.00', '0.00', '0.00', '69024.49', '22743922.51', '2281294.70', '20462627.81', '456258.94', '20006368.87', '2024-12-07 11:48:59', '2024-12-07 11:49:08', '2024-12-07'),
(364, 67, '24-2310-W2', '22812947.00', '0.00', '4638.11', '27873.17', '0.00', '0.00', '0.00', '32511.28', '22780435.72', '2281294.70', '20499141.02', '456258.94', '20042882.08', '2024-12-07 11:48:59', '2024-12-07 11:49:08', '2024-12-07'),
(365, 72, '24-1234-M9', '1043955000.00', '0.00', '21970565.89', '18138325.44', '0.00', '0.00', '0.00', '40108891.33', '1003846108.67', '104395500.00', '899450608.67', '20879100.00', '878571508.67', '2024-12-07 11:48:59', '2024-12-07 11:49:08', '2024-12-07'),
(366, 79, '24-2311-M1', '3056974.00', '0.00', '85.96', '512.48', '0.00', '0.00', '0.00', '598.45', '3056375.55', '305697.40', '2750678.15', '61139.48', '2689538.67', '2024-12-07 11:48:59', '2024-12-07 11:49:08', '2024-12-07'),
(367, 80, '24-2311-M2', '3056974.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3056974.00', '305697.40', '2751276.60', '61139.48', '2690137.12', '2024-12-07 11:48:59', '2024-12-07 11:49:08', '2024-12-07'),
(368, 83, 'STWF421', '6693300.00', '0.00', '146.35', '1456.36', '0.00', '0.00', '0.00', '1602.71', '6691697.29', '669330.00', '6022367.29', '133866.00', '5888501.29', '2024-12-07 11:48:59', '2024-12-07 11:49:08', '2024-12-07'),
(369, 87, '24-2315-W1', '29921548.00', '0.00', '6367.57', '32831.99', '0.00', '0.00', '0.00', '39199.56', '29882348.44', '2992154.80', '26890193.64', '598430.96', '26291762.68', '2024-12-07 11:48:59', '2024-12-07 11:49:08', '2024-12-07'),
(370, 88, '24-2315-W2', '29921548.00', '0.00', '4738.33', '14383.20', '0.00', '0.00', '0.00', '19121.53', '29902426.47', '2992154.80', '26910271.67', '598430.96', '26311840.71', '2024-12-07 11:48:59', '2024-12-07 11:49:08', '2024-12-07'),
(371, 102, '24-1500-W1', '7507185.00', '1500000.00', '26504.06', '188397.48', '4058400.00', '500000.00', '1000000.00', '7273301.54', '233883.46', '750718.50', '-516835.04', '150143.70', '-666978.74', '2024-12-07 11:48:59', '2024-12-07 11:49:08', '2024-12-07'),
(372, 44, '24-0021-W1', '540594150.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '540594150.00', '54059415.00', '486534735.00', '10811883.00', '475722852.00', '2024-12-07 11:49:02', '2024-12-07 11:49:02', '2024-12-07'),
(373, 45, '24-0021-W2', '540594150.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '540594150.00', '54059415.00', '486534735.00', '10811883.00', '475722852.00', '2024-12-07 11:49:04', '2024-12-07 11:49:04', '2024-12-07'),
(374, 46, '24-0021-W3', '540594150.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '540594150.00', '54059415.00', '486534735.00', '10811883.00', '475722852.00', '2024-12-07 11:49:05', '2024-12-07 11:49:05', '2024-12-07'),
(375, 45, '24-0021-W2', '540594150.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '540594150.00', '54059415.00', '486534735.00', '10811883.00', '475722852.00', '2024-12-10 07:37:46', '2024-12-10 07:37:51', '2024-12-10'),
(376, 16, '24-1234-M7', '1043955000.00', '0.00', '21970565.89', '18138325.44', '0.00', '9000.00', '3000000.00', '43117891.33', '1000837108.67', '104395500.00', '896441608.67', '20879100.00', '875562508.67', '2024-12-10 07:37:46', '2024-12-10 07:37:57', '2024-12-10'),
(377, 17, '24-0245-W2', '0.00', '0.00', '670.51', '3997.37', '5015000.00', '48000.00', '0.00', '5067667.88', '-5067667.88', '0.00', '-5067667.88', '0.00', '-5067667.88', '2024-12-10 07:37:46', '2024-12-10 07:37:57', '2024-12-10'),
(378, 28, '24-0001-W1', '1837939110.00', '450000.00', '1161.78', '8875.52', '2544000.00', '10000.00', '500000.00', '3514037.30', '1834425072.70', '183793911.00', '1650631161.70', '36758782.20', '1613872379.50', '2024-12-10 07:37:46', '2024-12-10 07:37:57', '2024-12-10'),
(379, 30, '24-0002-W1', '1837939110.00', '0.00', '1161.78', '8875.52', '0.00', '0.00', '0.00', '10037.30', '1837929072.70', '183793911.00', '1654135161.70', '36758782.20', '1617376379.50', '2024-12-10 07:37:46', '2024-12-10 07:37:57', '2024-12-10'),
(380, 31, '24-23001-W1', '108061330.00', '150000.00', '1274.16', '10486.75', '8116800.00', '0.00', '0.00', '8278560.91', '99782769.09', '10806133.00', '88976636.09', '2161226.60', '86815409.49', '2024-12-10 07:37:46', '2024-12-10 07:37:57', '2024-12-10'),
(381, 33, '24-24001-W1', '108061330.00', '0.00', '1274.16', '10486.75', '0.00', '0.00', '0.00', '11760.91', '108049569.09', '10806133.00', '97243436.09', '2161226.60', '95082209.49', '2024-12-10 07:37:46', '2024-12-10 07:37:57', '2024-12-10'),
(382, 47, '24-0005-W1', '10093363.00', '0.00', '1158.93', '10690.83', '0.00', '0.00', '0.00', '11849.75', '10081513.25', '1009336.30', '9072176.95', '201867.26', '8870309.69', '2024-12-10 07:37:46', '2024-12-10 07:37:57', '2024-12-10'),
(383, 64, '24-2309-W1', '21612266.00', '0.00', '2419.66', '19948.72', '0.00', '0.00', '0.00', '22368.38', '21589897.62', '2161226.60', '19428671.02', '432245.32', '18996425.70', '2024-12-10 07:37:46', '2024-12-10 07:37:57', '2024-12-10'),
(384, 65, '24-2309-W2', '21612266.00', '0.00', '19444.69', '107417.91', '0.00', '0.00', '0.00', '126862.59', '21485403.41', '2161226.60', '19324176.81', '432245.32', '18891931.49', '2024-12-10 07:37:46', '2024-12-10 07:37:57', '2024-12-10'),
(385, 66, '24-2310-W1', '22812947.00', '0.00', '11544.33', '57480.16', '0.00', '0.00', '0.00', '69024.49', '22743922.51', '2281294.70', '20462627.81', '456258.94', '20006368.87', '2024-12-10 07:37:46', '2024-12-10 07:37:57', '2024-12-10'),
(386, 67, '24-2310-W2', '22812947.00', '0.00', '4638.11', '27873.17', '0.00', '0.00', '0.00', '32511.28', '22780435.72', '2281294.70', '20499141.02', '456258.94', '20042882.08', '2024-12-10 07:37:46', '2024-12-10 07:37:57', '2024-12-10'),
(387, 72, '24-1234-M9', '1043955000.00', '0.00', '21970565.89', '18138325.44', '0.00', '0.00', '0.00', '40108891.33', '1003846108.67', '104395500.00', '899450608.67', '20879100.00', '878571508.67', '2024-12-10 07:37:46', '2024-12-10 07:37:57', '2024-12-10'),
(388, 79, '24-2311-M1', '3056974.00', '0.00', '85.96', '512.48', '0.00', '0.00', '0.00', '598.45', '3056375.55', '305697.40', '2750678.15', '61139.48', '2689538.67', '2024-12-10 07:37:46', '2024-12-10 07:37:57', '2024-12-10'),
(389, 80, '24-2311-M2', '3056974.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3056974.00', '305697.40', '2751276.60', '61139.48', '2690137.12', '2024-12-10 07:37:46', '2024-12-10 07:37:57', '2024-12-10'),
(390, 83, 'STWF421', '6693300.00', '0.00', '146.35', '1456.36', '0.00', '0.00', '0.00', '1602.71', '6691697.29', '669330.00', '6022367.29', '133866.00', '5888501.29', '2024-12-10 07:37:46', '2024-12-10 07:37:57', '2024-12-10'),
(391, 87, '24-2315-W1', '29921548.00', '0.00', '6367.57', '32831.99', '0.00', '0.00', '0.00', '39199.56', '29882348.44', '2992154.80', '26890193.64', '598430.96', '26291762.68', '2024-12-10 07:37:46', '2024-12-10 07:37:57', '2024-12-10'),
(392, 88, '24-2315-W2', '29921548.00', '0.00', '4738.33', '14383.20', '0.00', '0.00', '0.00', '19121.53', '29902426.47', '2992154.80', '26910271.67', '598430.96', '26311840.71', '2024-12-10 07:37:46', '2024-12-10 07:37:57', '2024-12-10'),
(393, 102, '24-1500-W1', '7507185.00', '1500000.00', '26504.06', '188397.48', '4058400.00', '500000.00', '1000000.00', '7273301.54', '233883.46', '750718.50', '-516835.04', '150143.70', '-666978.74', '2024-12-10 07:37:46', '2024-12-10 07:37:57', '2024-12-10'),
(394, 44, '24-0021-W1', '540594150.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '540594150.00', '54059415.00', '486534735.00', '10811883.00', '475722852.00', '2024-12-10 07:37:50', '2024-12-10 07:37:50', '2024-12-10'),
(395, 46, '24-0021-W3', '540594150.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '540594150.00', '54059415.00', '486534735.00', '10811883.00', '475722852.00', '2024-12-10 07:37:52', '2024-12-10 07:37:52', '2024-12-10'),
(396, 70, '24-0021-W6', '540594150.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '540594150.00', '54059415.00', '486534735.00', '10811883.00', '475722852.00', '2024-12-10 07:37:57', '2024-12-10 07:37:57', '2024-12-10');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `capacity`
--
ALTER TABLE `capacity`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `company_info`
--
ALTER TABLE `company_info`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_company_unique` (`company`);

--
-- Indeks untuk tabel `delivered`
--
ALTER TABLE `delivered`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `finish_good`
--
ALTER TABLE `finish_good`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `inspection_sheet`
--
ALTER TABLE `inspection_sheet`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `inspection_sheet_item_no_unique` (`item_no`),
  ADD UNIQUE KEY `inspection_sheet_so_no_unique` (`so_no`);

--
-- Indeks untuk tabel `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `itemadd`
--
ALTER TABLE `itemadd`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kbli_code`
--
ALTER TABLE `kbli_code`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kbli_code_kbli_code_unique` (`kbli_code`);

--
-- Indeks untuk tabel `machine`
--
ALTER TABLE `machine`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `machine_id_machine_unique` (`id_machine`);

--
-- Indeks untuk tabel `machine_state`
--
ALTER TABLE `machine_state`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `machine_state_code_unique` (`code`),
  ADD UNIQUE KEY `machine_state_state_unique` (`state`);

--
-- Indeks untuk tabel `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `material_id_material_unique` (`id_material`);

--
-- Indeks untuk tabel `material_sheet`
--
ALTER TABLE `material_sheet`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `material_sheet_order_number_unique` (`order_number`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `newprocessing`
--
ALTER TABLE `newprocessing`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `no_katalog`
--
ALTER TABLE `no_katalog`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_order_number_unique` (`order_number`);

--
-- Indeks untuk tabel `order_unit`
--
ALTER TABLE `order_unit`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_unit_id_order_unit_unique` (`id_order_unit`),
  ADD UNIQUE KEY `order_unit_name_unique` (`name`),
  ADD UNIQUE KEY `order_unit_code_order_unique` (`code_order`);

--
-- Indeks untuk tabel `overhead`
--
ALTER TABLE `overhead`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_number` (`order_number`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `plan_plan_name_unique` (`plan_name`);

--
-- Indeks untuk tabel `planadd`
--
ALTER TABLE `planadd`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `processing`
--
ALTER TABLE `processing`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `processingadd`
--
ALTER TABLE `processingadd`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `production_sheet`
--
ALTER TABLE `production_sheet`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `production_sheet_order_number_unique` (`order_number`),
  ADD UNIQUE KEY `production_sheet_so_no_unique` (`so_no`);

--
-- Indeks untuk tabel `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_type_id_product_type_unique` (`id_product_type`),
  ADD UNIQUE KEY `product_type_product_name_unique` (`product_name`);

--
-- Indeks untuk tabel `quotation`
--
ALTER TABLE `quotation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `quotation_quotation_no_unique` (`quotation_no`);

--
-- Indeks untuk tabel `quotationadd`
--
ALTER TABLE `quotationadd`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rekap_order`
--
ALTER TABLE `rekap_order`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `salesman`
--
ALTER TABLE `salesman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `salesorder`
--
ALTER TABLE `salesorder`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `salesorder_so_number_unique` (`so_number`);

--
-- Indeks untuk tabel `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `shipping_id_shipping_unique` (`id_shipping`),
  ADD UNIQUE KEY `shipping_shipping_name_unique` (`shipping_name`);

--
-- Indeks untuk tabel `soadd`
--
ALTER TABLE `soadd`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `so_target`
--
ALTER TABLE `so_target`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `standartpart_a_p_i_s`
--
ALTER TABLE `standartpart_a_p_i_s`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `standartpart_sheet`
--
ALTER TABLE `standartpart_sheet`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `standart_part`
--
ALTER TABLE `standart_part`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_number` (`order_number`);

--
-- Indeks untuk tabel `standart_partadd`
--
ALTER TABLE `standart_partadd`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sub_contract`
--
ALTER TABLE `sub_contract`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_number` (`order_number`);

--
-- Indeks untuk tabel `tax_type`
--
ALTER TABLE `tax_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tax_type_id_tax_unique` (`id_tax`),
  ADD UNIQUE KEY `tax_type_tax_unique` (`tax`);

--
-- Indeks untuk tabel `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unit_id_unit_unique` (`id_unit`),
  ADD UNIQUE KEY `unit_unit_unique` (`unit`);

--
-- Indeks untuk tabel `used_times`
--
ALTER TABLE `used_times`
  ADD PRIMARY KEY (`id`),
  ADD KEY `processing_id` (`processing_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `work_unit`
--
ALTER TABLE `work_unit`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `work_unit_work_unit_unique` (`work_unit`);

--
-- Indeks untuk tabel `w_i_p_s`
--
ALTER TABLE `w_i_p_s`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `capacity`
--
ALTER TABLE `capacity`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `company_info`
--
ALTER TABLE `company_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `delivered`
--
ALTER TABLE `delivered`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `department`
--
ALTER TABLE `department`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `finish_good`
--
ALTER TABLE `finish_good`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `inspection_sheet`
--
ALTER TABLE `inspection_sheet`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `item`
--
ALTER TABLE `item`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT untuk tabel `itemadd`
--
ALTER TABLE `itemadd`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=513;

--
-- AUTO_INCREMENT untuk tabel `kbli_code`
--
ALTER TABLE `kbli_code`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `machine`
--
ALTER TABLE `machine`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `machine_state`
--
ALTER TABLE `machine_state`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `material`
--
ALTER TABLE `material`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `material_sheet`
--
ALTER TABLE `material_sheet`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `newprocessing`
--
ALTER TABLE `newprocessing`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;

--
-- AUTO_INCREMENT untuk tabel `no_katalog`
--
ALTER TABLE `no_katalog`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT untuk tabel `order`
--
ALTER TABLE `order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT untuk tabel `order_unit`
--
ALTER TABLE `order_unit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `overhead`
--
ALTER TABLE `overhead`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `plan`
--
ALTER TABLE `plan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `planadd`
--
ALTER TABLE `planadd`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT untuk tabel `processing`
--
ALTER TABLE `processing`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `processingadd`
--
ALTER TABLE `processingadd`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `production_sheet`
--
ALTER TABLE `production_sheet`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `quotation`
--
ALTER TABLE `quotation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `quotationadd`
--
ALTER TABLE `quotationadd`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT untuk tabel `rekap_order`
--
ALTER TABLE `rekap_order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `salesman`
--
ALTER TABLE `salesman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `salesorder`
--
ALTER TABLE `salesorder`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT untuk tabel `shipping`
--
ALTER TABLE `shipping`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `soadd`
--
ALTER TABLE `soadd`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT untuk tabel `so_target`
--
ALTER TABLE `so_target`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `standartpart_a_p_i_s`
--
ALTER TABLE `standartpart_a_p_i_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `standartpart_sheet`
--
ALTER TABLE `standartpart_sheet`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `standart_part`
--
ALTER TABLE `standart_part`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `standart_partadd`
--
ALTER TABLE `standart_partadd`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sub_contract`
--
ALTER TABLE `sub_contract`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tax_type`
--
ALTER TABLE `tax_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `unit`
--
ALTER TABLE `unit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `used_times`
--
ALTER TABLE `used_times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `work_unit`
--
ALTER TABLE `work_unit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `w_i_p_s`
--
ALTER TABLE `w_i_p_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=397;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
