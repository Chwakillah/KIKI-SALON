-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2024 at 01:45 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kikisalon`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `latest_login` date NOT NULL,
  `status_login` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `no_hp`, `alamat`, `email`, `password`, `latest_login`, `status_login`) VALUES
(1, 'lucky', '082179406195', 'Prabumulih', '09031282227065@student.unsri.a', '123', '2024-03-02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `ID_Booking` int(11) NOT NULL,
  `ID_Klien` int(11) DEFAULT NULL,
  `Email` varchar(30) NOT NULL,
  `treatment` varchar(200) NOT NULL,
  `Tanggal_Booking` datetime NOT NULL,
  `Harga` double NOT NULL,
  `status` varchar(10) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`ID_Booking`, `ID_Klien`, `Email`, `treatment`, `Tanggal_Booking`, `Harga`, `status`) VALUES
(64, 8, '09031282227065@student.unsri.a', 'Coloring, Cutting, Styling, Smoothing', '2024-05-12 00:00:00', 155000, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `ID_Konfirmasi` int(11) NOT NULL,
  `ID_Booking` int(11) NOT NULL,
  `Harga` double NOT NULL,
  `Foto_Transfer` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ID_Login` int(11) NOT NULL,
  `ID_Klien` int(11) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Register_Date` date NOT NULL,
  `Latest_Login` date NOT NULL,
  `Status_Login` int(11) NOT NULL,
  `ID_Admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID_Login`, `ID_Klien`, `username`, `Email`, `Password`, `Register_Date`, `Latest_Login`, `Status_Login`, `ID_Admin`) VALUES
(7, 8, 'zidan', '09031282227065@student.unsri.a', '12345', '2024-03-09', '2024-05-11', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `ID_Klien` int(11) NOT NULL,
  `Nama_Klien` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Alamat` text NOT NULL,
  `Handphone` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`ID_Klien`, `Nama_Klien`, `Email`, `Alamat`, `Handphone`) VALUES
(8, 'Muammar Ramadhani Maulizidan', '09031282227065@aa', 'ZZZ', '0821');

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE `treatment` (
  `ID_Treatment` int(11) NOT NULL,
  `Jenis_Treatment` varchar(30) NOT NULL,
  `Gambar` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Keterangan` text NOT NULL,
  `Harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `treatment`
--

INSERT INTO `treatment` (`ID_Treatment`, `Jenis_Treatment`, `Gambar`, `Keterangan`, `Harga`) VALUES
(1, 'Coloring', 'img/ListTreatment/coloring.jpeg', 'Coloring hair dengan beberapa warna pilihan', 100000),
(2, 'Cutting', 'img/ListTreatment/cutting.jpeg', '', 50000),
(3, 'Styling', 'img/ListTreatment/styling.jpeg', '', 80000),
(4, 'Smoothing', 'img/ListTreatment/smoothing.jpeg', '', 100000),
(5, 'Creambath', 'img/ListTreatment/creambath.jpeg', '', 80000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`ID_Booking`),
  ADD KEY `ID_Klien` (`ID_Klien`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`ID_Konfirmasi`),
  ADD KEY `ID_Booking` (`ID_Booking`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID_Login`),
  ADD KEY `ID_Klien` (`ID_Klien`),
  ADD KEY `ID_Admin` (`ID_Admin`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`ID_Klien`);

--
-- Indexes for table `treatment`
--
ALTER TABLE `treatment`
  ADD PRIMARY KEY (`ID_Treatment`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `ID_Booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `ID_Konfirmasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID_Login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `ID_Klien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`ID_Klien`) REFERENCES `pelanggan` (`ID_Klien`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD CONSTRAINT `konfirmasi_ibfk_2` FOREIGN KEY (`ID_Booking`) REFERENCES `booking` (`ID_Booking`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`ID_Klien`) REFERENCES `pelanggan` (`ID_Klien`) ON DELETE CASCADE,
  ADD CONSTRAINT `login_ibfk_2` FOREIGN KEY (`ID_Admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
