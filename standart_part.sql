-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 03 Jan 2025 pada 07.42
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
-- Struktur dari tabel `material`
--

CREATE TABLE `material` (
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
-- Dumping data untuk tabel `material`
--

INSERT INTO `material` (`id`, `order_number`, `item_no`, `date`, `part_name`, `item_name`, `qty`, `price`, `total`, `info`, `unit`) VALUES
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

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_number` (`order_number`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `material`
--
ALTER TABLE `material`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
