-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Feb 2024 pada 10.32
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

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
(4, 'GUNNEBO INDONESIA DISTRIBUTION PT', 'GUNNEBO INDONESIA DISTRIBUTION PT', 'Grha Gunnebo Indonesia Lt. 5', NULL, '02100000', '02100000', NULL, '83.524.320.5-023.000', 'Grha Gunnebo Indonesia Lt. 5', 'Grha Gunnebo Indonesia Lt. 5', NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-29 03:15:20', '2024-01-29 03:15:20'),
(5, 'BUANA PRIMA RAYA PT', 'BAMBANG SUWITO', 'KALIMALANG, BEKASI', NULL, '081232131231', '02132131', 'bambang@buana.com', '12.345.678.9-098.765', 'KALIMALANG, BEKASI', 'KALIMALANG, BEKASI', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-02 07:12:09', '2024-02-02 07:12:09');

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
(2, '1105', 'WF', 'VICTOR HARIMURTI', 'victor@atmisolo.co.id', 'WF', '-', 'WF', '626/12/03', '2024-02-02 06:45:16', '2024-02-02 06:45:16');

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
(1, '24-0132-W1', 'GUNNEBO INDONESIA DISTRIBUTION PT', '2024-03-19', 'Mobile File 2S16D-3 Row (Tinggi 2.8m)', '24-0132-W', '2024-02-02 05:13:25', '2024-02-02 05:13:25'),
(2, '24-1234-M1', 'BAMBANG SUWITO', '2024-03-08', 'LEANTURN', '24-1234-M', '2024-02-02 07:26:33', '2024-02-02 07:26:33');

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `itemadd`
--

INSERT INTO `itemadd` (`id`, `order_number`, `id_item`, `no_item`, `item`, `dod_item`, `material`, `weight`, `length`, `width`, `thickness`, `qty`, `nos`, `nob`, `issued_item`, `ass_drawing`, `drawing_no`, `created_at`, `updated_at`) VALUES
(1, '24-0132-W1', '1', '1.1.1', 'ROW 1', '2024-02-20', 'PLAT 3\'', '700', '500', '500', '3', NULL, '1', '1', '2024-02-11', '240202001', '240202001A', '2024-02-02 05:13:25', '2024-02-02 05:13:25'),
(2, '24-0132-W1', '2', '1.1.2', 'ROW 2', '2024-02-20', 'PLAT 3\'', '700', '500', '500', '3', NULL, '1', '1', '2024-02-12', '240202002', '240202002B', '2024-02-02 05:13:25', '2024-02-02 05:13:25'),
(3, '24-0132-W1', '3', '1.1.3', 'ROW 3', '2024-02-20', 'PLAT 3\'', '700', '500', '500', '3', NULL, '1', '1', '2024-02-13', '240202003', '240202003C', '2024-02-02 05:13:25', '2024-02-02 05:13:25'),
(4, '24-1234-M1', '1', '1', 'ASSY', '2024-02-09', 'NONE', '0', '0', '0', '0', NULL, '2', '2', '2024-02-02', '0000001', '0000011', '2024-02-02 07:26:33', '2024-02-02 07:26:33'),
(5, '24-1234-M1', '2', '1.1', 'COVER', '2024-02-10', 'PLAT 3\'', '0', '0', '0', '0', NULL, '4', '4', '2024-02-02', '00000011', '00000012', '2024-02-02 07:26:33', '2024-02-02 07:26:33');

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
(7, '46696', 'Besi Skrap', '2024-01-29 02:47:59', '2024-01-29 02:47:59'),
(8, '28299', 'Mesin Perkakas Khusus', '2024-01-29 02:47:59', '2024-01-29 02:47:59');

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
(2, 'MDC', 'MDC001', 'CNC MILLING VMC 60E', 'MILLING MACHINE', 'MILLING', '10', 'MDC', '08:00', '21:00', '3', 'BEND;MILL MKN', 'OK', 'MILLING', NULL, '2023', ' 500000000', '5', 15, 13, 276, '6', '25', '15', ' 75000000', ' 150000', '3', ' 1500', ' 30000', ' 0', ' 13006', ' 4181', ' 1045', ' 4500', ' 20903', ' 43635', ' 73635', '2024-02-02 06:23:05', '2024-02-02 06:23:05');

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
(1, '00001', 'PLAT 3\'', '10', '10', '3', '2024-02-02 05:08:54', '2024-02-02 05:08:54'),
(2, '00000', 'NONE', '0', '0', '0', '2024-02-02 07:23:58', '2024-02-02 07:23:58');

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
(29, '2023_12_04_080652_order', 2);

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
  `sale_price` varchar(255) NOT NULL,
  `production_cost` varchar(255) DEFAULT NULL,
  `information` text DEFAULT NULL,
  `information2` text DEFAULT NULL,
  `information3` text DEFAULT NULL,
  `order_status` varchar(255) DEFAULT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `order`
--

INSERT INTO `order` (`id`, `order_number`, `so_number`, `quotation_number`, `kbli_code`, `reff_number`, `order_date`, `product_type`, `po_number`, `sale_price`, `production_cost`, `information`, `information2`, `information3`, `order_status`, `customer`, `product`, `qty`, `dod`, `dod_forecast`, `sample`, `material`, `catalog_number`, `material_cost`, `dod_adj`, `created_at`, `updated_at`) VALUES
(1, '24-0132-W1', '24-0132-W', 'Q24-0267', '28299', NULL, '2024-01-26', 'WF Customized Product', 'GI/01-26/2024', '529200000', NULL, NULL, 'WF\r\n- Mobile File 2S16D-3 Row (Tinggi 2.8m)', NULL, NULL, 'GUNNEBO INDONESIA DISTRIBUTION PT', 'Mobile File 2S16D-3 Row (Tinggi 2.8m)', '1', '2024-03-19', NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-29 06:14:22', '2024-01-29 06:14:22'),
(2, '24-0132-W2', '24-0132-W', 'Q24-0267', '28299', NULL, '2024-01-26', 'WF Customized Product', 'GI/01-26/2024', '558000000', NULL, NULL, 'WF\r\n- Mobile File 2S2D-4 Row (Tinggi 2.8m)', NULL, NULL, 'GUNNEBO INDONESIA DISTRIBUTION PT', 'Mobile File 2S2D-4 Row (Tinggi 2.8m)', '4', '2024-03-19', NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-29 06:18:46', '2024-01-29 06:18:46'),
(3, '24-1234-M1', '24-1234-M', 'Q24-1234', '28299', 'R01', '2024-02-02', 'SPM', 'BPR01', '580000000', '400000000', NULL, 'WARNA\r\n- STANDAR COLOUR', '-', 'URGENT', 'BAMBANG SUWITO', 'LEANTURN', '2', '2024-03-08', '2024-03-08', '-', 'PLAT', '-', '-', '2024-03-08', '2024-02-02 07:21:47', '2024-02-02 07:21:47');

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
(2, 'WF', 3, '2024-01-29 02:43:31', '2024-02-02 06:11:35'),
(3, 'EDU', 1, '2024-02-02 06:09:35', '2024-02-02 06:09:35'),
(4, 'MDC', 2, '2024-02-02 06:14:05', '2024-02-02 06:15:35');

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
(3, 'EDU', 'EDU MAKER', '99', '2024-02-02 06:09:35', '2024-02-02 06:09:35'),
(7, 'WF', 'PUNCH', '1', '2024-02-02 06:11:35', '2024-02-02 06:11:35'),
(8, 'WF', 'BEND', '2', '2024-02-02 06:11:35', '2024-02-02 06:11:35'),
(9, 'WF', 'WELD', '3', '2024-02-02 06:11:35', '2024-02-02 06:11:35'),
(11, 'MDC', 'ASSY', '9', '2024-02-02 06:15:35', '2024-02-02 06:15:35'),
(12, 'MDC', 'MILLING', '10', '2024-02-02 06:15:35', '2024-02-02 06:15:35');

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, 'Q24-1234', 'BUANA PRIMA RAYA PT', 'BAMBANG SUWITO', '2024-02-02', 'KALIMALANG, BEKASI', '12.345.678.9-098.765', '081232131231', '02132131', 'KALIMALANG, BEKASI', 'bambang@buana.com', 'by Phone', 'Repeat', 'WARNA\r\n- STANDAR COLOUR', '2D Drawing', 'in ATMI', 'Assy Test Report', 'Special Packing', 'NET', '30', 'Include', '4', 'KALIMALANG, BEKASI', NULL, '2024-03-08', '40', 'Mba Sales', '5', '1', ' 990000000', ' 49500000', ' 103455000', ' 0', ' 1043955000', '2024-02-02 07:12:09', '2024-02-02 07:12:54');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `quotationadd`
--

INSERT INTO `quotationadd` (`id`, `quotation_no`, `item`, `item_desc`, `qty`, `unit_price`, `unit`, `disc`, `amount`, `created_at`, `updated_at`) VALUES
(7, 'Q24-0267', 'Q24-0267-1', 'Mobile File 2S16D-3 Row (Tinggi 2.8m)', '1', '529200000', 'unit', '0', '529200000', '2024-01-29 03:29:10', '2024-01-29 03:29:10'),
(8, 'Q24-0267', 'Q24-0267-2', 'Mobile File 2S2D-4 Row (Tinggi 2.8m)', '4', '139500000', 'unit', '0', '558000000', '2024-01-29 03:29:10', '2024-01-29 03:29:10'),
(9, 'Q24-0267', 'Q24-0267-3', 'Mobile File 2S1D (Tinggi 2.8m)', '2', '25197000', 'unit', '0', '50394000', '2024-01-29 03:29:10', '2024-01-29 03:29:10'),
(10, 'Q24-0267', 'Q24-0267-4', 'Mobile File 2S2D (Tinggi 2.8m)', '7', '46597000', 'unit', '0', '326179000', '2024-01-29 03:29:10', '2024-01-29 03:29:10'),
(11, 'Q24-0267', 'Q24-0267-5', 'Mobile File 2S3D (Tinggi 2.8m)', '1', '46597000', 'unit', '0', '46597000', '2024-01-29 03:29:10', '2024-01-29 03:29:10'),
(12, 'Q24-0267', 'Q24-0267-6', 'Mobile File 2S4D (Tinggi 2.8m)', '3', '57297000', 'unit', '0', '171891000', '2024-01-29 03:29:10', '2024-01-29 03:29:10'),
(15, 'Q24-1234', '001', 'LEANTURN', '2', '290000000', 'unit', '0', '580000000', '2024-02-02 07:12:54', '2024-02-02 07:12:54'),
(16, 'Q24-1234', '002', 'GREAT D1', '2', '205000000', 'unit', '0', '410000000', '2024-02-02 07:12:54', '2024-02-02 07:12:54');

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
(6, '24-0132-W', 'Q24-0267', 'GUNNEBO INDONESIA DISTRIBUTION PT', 'GUNNEBO INDONESIA DISTRIBUTION PT', 'Grha Gunnebo Indonesia Lt. 5', '02100000', '2', '15-0004-W', 'Grha Gunnebo Indonesia Lt. 5', '83.524.320.5-023.000', '02100000', NULL, 'Meet', 'New', 'Photo', 'in ATMI', 'QC Sheet', 'Wood Packing', 'Exclude', '2024-03-19', 'Grha Gunnebo Indonesia Lt. 5', '2024-01-26', 'NET', '30', '1', NULL, '2024-03-20', 'GI/01-26/2024', 'Mba Sales', 'Rp 0', '0', ' 1682261000', NULL, ' 0', ' 185048710', ' 0', ' 1867309710', '0', '1', 'WF\r\n- Mobile File 2S16D-3 Row (Tinggi 2.8m)', '2024-01-29 04:41:22', '2024-01-29 04:41:22'),
(7, '24-1234-M', 'Q24-1234', 'BUANA PRIMA RAYA PT', 'BAMBANG SUWITO', 'KALIMALANG, BEKASI', '081232131231', '1', 'SOW-1234-M', 'KALIMALANG, BEKASI', '12.345.678.9-098.765', '02132131', 'bambang@buana.com', 'by Phone', 'Repeat', '2D Drawing', 'in ATMI', 'Assy Test Report', 'Special Packing', 'Include', '2024-03-08', 'KALIMALANG, BEKASI', '2024-02-02', 'NET', '30', '2', NULL, '2024-03-09', 'BPR01', 'Mba Sales', '0', '0', ' 990000000', NULL, ' 49500000', ' 103455000', '0', ' 1043955000', '5', '1', 'WARNA\r\n- STANDAR COLOUR', '2024-02-02 07:18:05', '2024-02-02 07:18:05');

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
(19, '24-0132-W', 'Q24-0267-1', 'Mobile File 2S16D-3 Row (Tinggi 2.8m)', '1', '529200000', 'unit', '0', '529200000', 'WF Customized Product', '24-0132-W1', 'Mobile File', '28299', '2024-01-29 04:22:42', '2024-01-29 04:22:42'),
(20, '24-0132-W', 'Q24-0267-2', 'Mobile File 2S2D-4 Row (Tinggi 2.8m)', '4', '139500000', 'unit', '0', '558000000', 'WF Customized Product', '24-0132-W2', 'Mobile File', '28299', '2024-01-29 04:22:42', '2024-01-29 04:22:42'),
(21, '24-0132-W', 'Q24-0267-3', 'Mobile File 2S1D (Tinggi 2.8m)', '2', '25197000', 'unit', '0', '50394000', 'WF Customized Product', '24-0132-W3', 'Mobile File', '28299', '2024-01-29 04:22:42', '2024-01-29 04:22:42'),
(22, '24-0132-W', 'Q24-0267-4', 'Mobile File 2S2D (Tinggi 2.8m)', '7', '46597000', 'unit', '0', '326179000', 'WF Customized Product', '24-0132-W4', 'Mobile File', '28299', '2024-01-29 04:22:42', '2024-01-29 04:22:42'),
(23, '24-0132-W', 'Q24-0267-5', 'Mobile File 2S3D (Tinggi 2.8m)', '1', '46597000', 'unit', '0', '46597000', 'WF Customized Product', '24-0132-W5', 'Mobile File', '28299', '2024-01-29 04:22:42', '2024-01-29 04:22:42'),
(24, '24-0132-W', 'Q24-0267-6', 'Mobile File 2S4D (Tinggi 2.8m)', '3', '57297000', 'unit', '0', '171891000', 'WF Customized Product', '24-0132-W6', 'Mobile File', '28299', '2024-01-29 04:22:42', '2024-01-29 04:22:42'),
(37, '24-0132-W', 'Q24-0267-1', 'Mobile File 2S16D-3 Row (Tinggi 2.8m)', '1', ' 529200000', 'unit', '0', ' 529200000', 'WF Customized Product', '24-0132-W1', 'Mobile File', '25991', '2024-01-29 04:41:22', '2024-01-29 04:41:22'),
(38, '24-0132-W', 'Q24-0267-2', 'Mobile File 2S2D-4 Row (Tinggi 2.8m)', '4', ' 139500000', 'unit', '0', ' 558000000', 'WF Customized Product', '24-0132-W2', 'Mobile File', '25991', '2024-01-29 04:41:22', '2024-01-29 04:41:22'),
(39, '24-0132-W', 'Q24-0267-3', 'Mobile File 2S1D (Tinggi 2.8m)', '2', ' 25197000', 'unit', '0', ' 50394000', 'WF Customized Product', '24-0132-W3', 'Mobile File', '25991', '2024-01-29 04:41:22', '2024-01-29 04:41:22'),
(40, '24-0132-W', 'Q24-0267-4', 'Mobile File 2S2D (Tinggi 2.8m)', '7', ' 46597000', 'unit', '0', ' 326179000', 'WF Customized Product', '24-0132-W4', 'Mobile File', '25991', '2024-01-29 04:41:22', '2024-01-29 04:41:22'),
(41, '24-0132-W', 'Q24-0267-5', 'Mobile File 2S3D (Tinggi 2.8m)', '1', ' 46597000', 'unit', '0', ' 46597000', 'WF Customized Product', '24-0132-W5', 'Mobile File', '25991', '2024-01-29 04:41:22', '2024-01-29 04:41:22'),
(42, '24-0132-W', 'Q24-0267-6', 'Mobile File 2S4D (Tinggi 2.8m)', '3', ' 57297000', 'unit', '0', ' 171891000', 'WF Customized Product', '24-0132-W6', 'Mobile File', '25991', '2024-01-29 04:41:22', '2024-01-29 04:41:22'),
(43, '24-1234-M', '001', 'LEANTURN', '2', ' 290000000', 'unit', '0', ' 580000000', 'SPM', '1', '-', '28299', '2024-02-02 07:18:05', '2024-02-02 07:18:05'),
(44, '24-1234-M', '002', 'GREAT D1', '2', ' 205000000', 'unit', '0', ' 410000000', 'SPM', '2', '-', '28299', '2024-02-02 07:18:05', '2024-02-02 07:18:05');

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
(4, '4', 'unit', '2024-01-29 03:28:33', '2024-01-29 03:28:33');

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
  `role` enum('administrator','supervisor','user') NOT NULL DEFAULT 'user',
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
(1, 'MAS ADMIN', 'ADMIN', 'admin@atmi.com', 'ALL', 'administrator', NULL, '$2y$10$1MB3ZJvzxr585cFslBRBgO/W4qQADfy0ffel/s7gEdC8pPq3LI7Qq', NULL, '2024-01-29 01:36:38', '2024-02-02 07:44:20', 'offline'),
(2, 'Mba Sales', 'sales', 'sales@atmi.com', 'MA', 'user', NULL, '$2y$10$Z/glc7pVaIVb5mPGNNRcNu1PTLZuEW3oVF8Blr.6aW4UHomKY4c4C', NULL, '2024-01-29 01:36:38', '2024-01-29 01:36:38', 'offline');

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
(1, 'WF', 'WF', 'WF', '2024-01-29 02:42:26', '2024-01-29 02:42:26'),
(2, 'MDC', 'MDC', 'NONE', '2024-02-02 06:38:51', '2024-02-02 06:38:51');

--
-- Indexes for dumped tables
--

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
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
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
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `company_info`
--
ALTER TABLE `company_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `department`
--
ALTER TABLE `department`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `item`
--
ALTER TABLE `item`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `itemadd`
--
ALTER TABLE `itemadd`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kbli_code`
--
ALTER TABLE `kbli_code`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `machine`
--
ALTER TABLE `machine`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `machine_state`
--
ALTER TABLE `machine_state`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `material`
--
ALTER TABLE `material`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `order`
--
ALTER TABLE `order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `order_unit`
--
ALTER TABLE `order_unit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `plan`
--
ALTER TABLE `plan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `planadd`
--
ALTER TABLE `planadd`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `production_sheet`
--
ALTER TABLE `production_sheet`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `quotation`
--
ALTER TABLE `quotation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `quotationadd`
--
ALTER TABLE `quotationadd`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `salesorder`
--
ALTER TABLE `salesorder`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `shipping`
--
ALTER TABLE `shipping`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `soadd`
--
ALTER TABLE `soadd`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `so_target`
--
ALTER TABLE `so_target`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tax_type`
--
ALTER TABLE `tax_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `unit`
--
ALTER TABLE `unit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `work_unit`
--
ALTER TABLE `work_unit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
