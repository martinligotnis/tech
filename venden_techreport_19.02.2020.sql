-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2021 at 03:37 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `venden_techreport`
--
CREATE DATABASE IF NOT EXISTS `venden_techreport` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `venden_techreport`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `first_name`, `last_name`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'admin', 'Mārtiņš', 'Līgotnis', 'XPReQddB-HZnlGUCZSbodIQyo03t9wFM', '$2y$13$ljyWKcAct0M11ZDKfYpoaO5YVtcjKDpLaHef7Zn3eYTqTEqH8cvta', NULL, 'martinligotnis@gmail.com', 10, 1613137650, 1613137650, 'uUpZsg2OPcnHKMyR_uNQjQ5zv93hJAx6_1613137650');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

DROP TABLE IF EXISTS `equipment`;
CREATE TABLE `equipment` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `production_line_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`id`, `name`, `production_line_id`) VALUES
(1, 'Preformu bunkurs', 1),
(2, 'PET Pūtējs', 1),
(3, 'Gaisa Transportieris', 1),
(4, 'Stikla transportieris pie pildāmās mašīnas', 1),
(5, 'Pildītājs un korķu bunkurs', 1),
(6, 'Transportieris starp pildītāju un etiķētāju', 1),
(7, 'Ukrpack etiķētājs', 1),
(8, 'Slīverotājs', 1),
(9, 'Videojet Tintes printeris', 1),
(10, 'Transportieris zem tvaika tuneļa un nopūtēja', 1),
(11, 'Tvaika tunelis', 1),
(12, 'Nopūtējs', 1),
(13, 'Transportieris starp nopūtēju un plēvotāju', 1),
(14, 'Stikla etiķētājs', 1),
(15, 'Plēvotājs', 1),
(16, 'Transportieris aiz plēvotāja', 1),
(17, 'Pakošanas un gravitācijas transportieri', 1),
(18, 'Palešu aptinējs', 1),
(19, 'Saturators un Starptvertne', 1),
(20, 'CIP Sistēma ar pārsūknēšanu', 1),
(21, 'Konteineru transportieris un pudeļu padeves mehānisms', 2),
(22, 'Pudeļu izlādes transportieris', 2),
(23, 'Brāķēšanas ekrāns ar ekrānu', 2),
(24, 'Atkorķētājs', 2),
(25, 'Priekšmazgātājs ar transportieri', 2),
(26, 'Transportieris starp priekšmazgātāju un pudeļu hermētiskuma pārbaudes mezglu', 2),
(27, 'Pudeļu hermētiskuma pārbaudes mezgls ar transportieriem', 2),
(28, 'Mazgāšanas mašīna ar ieejas un izejas transportieriem', 2),
(29, 'Transportieris starp mazgājumo mašīnu un Pildāmo bloku', 2),
(30, 'Pildīšanas bloks ar ieejas un izejas transportieri, darba sūkni un 5m3 starptvertne', 2),
(31, 'Aizkorķēšanas bloks ar korķu bunkuru', 2),
(32, 'Tintes printeris', 2),
(33, 'Slīverotājs', 2),
(34, 'Gatavā produkta brāķēšanas ekrāns ar transportieri', 2),
(35, 'Termo tunelis', 2),
(36, 'Gatavās produkcijas pagrieziena transportieris', 2),
(37, 'Robota ielādes transportieris', 2),
(38, 'Robota transportieris ar vārstiem', 2),
(39, 'Robots', 2),
(40, 'Filtri ar paneli', 2),
(41, 'Āra mucas ar diviem pārsūknēšanas sūkņiem', 2);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1613136619),
('m130524_201442_init', 1613136625),
('m190124_110200_add_verification_token_column_to_user_table', 1613136625),
('m210212_135137_admin', 1613139145),
('m210216_130013_production_line', 1613739535),
('m210216_130014_equipment', 1613739535),
('m210216_133958_create_junction_table_for_production_line_and_equipment_tables', 1613739536),
('m210216_134001_unit_type', 1613739536),
('m210216_134002_unit', 1613739536),
('m210216_145519_create_junction_table_for_unit_andequipment_tables', 1613739536),
('m210216_145600_spare_part', 1613739536);

-- --------------------------------------------------------

--
-- Table structure for table `production_line`
--

DROP TABLE IF EXISTS `production_line`;
CREATE TABLE `production_line` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `production_line`
--

INSERT INTO `production_line` (`id`, `name`) VALUES
(2, '5 Gallon Līnija'),
(1, 'PET Līnija');

-- --------------------------------------------------------

--
-- Table structure for table `production_line_equipment`
--

DROP TABLE IF EXISTS `production_line_equipment`;
CREATE TABLE `production_line_equipment` (
  `production_line_id` int(11) NOT NULL,
  `equipment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spare_part`
--

DROP TABLE IF EXISTS `spare_part`;
CREATE TABLE `spare_part` (
  `id` int(11) NOT NULL,
  `producer` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit_type_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

DROP TABLE IF EXISTS `unit`;
CREATE TABLE `unit` (
  `id` int(11) NOT NULL,
  `equipment_id` int(11) DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `unit_type_id` int(11) NOT NULL,
  `function` text COLLATE utf8_unicode_ci NOT NULL,
  `service_interval` int(11) NOT NULL,
  `installation_date` int(11) NOT NULL,
  `last_maintenance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unit_equipment`
--

DROP TABLE IF EXISTS `unit_equipment`;
CREATE TABLE `unit_equipment` (
  `unit_id` int(11) NOT NULL,
  `equipment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unit_type`
--

DROP TABLE IF EXISTS `unit_type`;
CREATE TABLE `unit_type` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `first_name`, `last_name`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'martins', 'Mārtiņš', 'Līgotnis', 'XPReQddB-HZnlGUCZSbodIQyo03t9wFM', '$2y$13$ljyWKcAct0M11ZDKfYpoaO5YVtcjKDpLaHef7Zn3eYTqTEqH8cvta', NULL, 'martinligotnis@gmail.com', 10, 1613137650, 1613137650, 'uUpZsg2OPcnHKMyR_uNQjQ5zv93hJAx6_1613137650'),
(2, 'arnis', 'Arnis', 'Celms', 'elWtyYYulChgpk470X-jTdDlI969NtKq', '$2y$13$Wwd3yk2mZ0AgLyQ9.aWMfeXoAEGWrrpMwSCFl8I3pOalL3b1bWxne', NULL, 'arnis.celms@venden.lv', 10, 1613478018, 1613478018, 'E3K_Fj8BUlPtf1IQWqivRpNzCMjl9549_1613478018');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-equipment-production_line_id` (`production_line_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `production_line`
--
ALTER TABLE `production_line`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `production_line_equipment`
--
ALTER TABLE `production_line_equipment`
  ADD PRIMARY KEY (`production_line_id`,`equipment_id`),
  ADD KEY `idx-production_line_equipment-production_line_id` (`production_line_id`),
  ADD KEY `idx-production_line_equipment-equipment_id` (`equipment_id`);

--
-- Indexes for table `spare_part`
--
ALTER TABLE `spare_part`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-spare_part-unit_type_id` (`unit_type_id`),
  ADD KEY `idx-spare_part-unit_id` (`unit_id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-unit-unit_type_id` (`unit_type_id`),
  ADD KEY `idx-unit-equipment_id` (`equipment_id`);

--
-- Indexes for table `unit_equipment`
--
ALTER TABLE `unit_equipment`
  ADD PRIMARY KEY (`unit_id`,`equipment_id`),
  ADD KEY `idx-unit_equipment-unit_id` (`unit_id`),
  ADD KEY `idx-unit_equipment-equipment_id` (`equipment_id`);

--
-- Indexes for table `unit_type`
--
ALTER TABLE `unit_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `production_line`
--
ALTER TABLE `production_line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `spare_part`
--
ALTER TABLE `spare_part`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unit_type`
--
ALTER TABLE `unit_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `equipment`
--
ALTER TABLE `equipment`
  ADD CONSTRAINT `fk-equipment-production_line_id` FOREIGN KEY (`production_line_id`) REFERENCES `production_line` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `production_line_equipment`
--
ALTER TABLE `production_line_equipment`
  ADD CONSTRAINT `fk-production_line_equipment-equipment_id` FOREIGN KEY (`equipment_id`) REFERENCES `equipment` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-production_line_equipment-production_line_id` FOREIGN KEY (`production_line_id`) REFERENCES `production_line` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `spare_part`
--
ALTER TABLE `spare_part`
  ADD CONSTRAINT `fk-spare_part-unit_id` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-spare_part-unit_type_id` FOREIGN KEY (`unit_type_id`) REFERENCES `unit_type` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `unit`
--
ALTER TABLE `unit`
  ADD CONSTRAINT `fk-unit-equipment_id` FOREIGN KEY (`equipment_id`) REFERENCES `equipment` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-unit-unit_type_id` FOREIGN KEY (`unit_type_id`) REFERENCES `unit_type` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `unit_equipment`
--
ALTER TABLE `unit_equipment`
  ADD CONSTRAINT `fk-unit_equipment-equipment_id` FOREIGN KEY (`equipment_id`) REFERENCES `equipment` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-unit_equipment-unit_id` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
