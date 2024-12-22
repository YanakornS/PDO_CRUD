-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2024 at 05:05 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pdocrud`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gmail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `gmail`) VALUES
(1, 'YanakornS', '$2y$10$gRAtgovZPR3IlMnspJaSXOiq5lckwQfmEgFJHEHmSCGYViZpXDo/u', 'yanakorn@gmail.com'),
(2, 'Best', '$2y$10$jte4QKQSlbvN17vOzRISouMOBUIyTC083shU6k1RlUmM5bFLNuiim', 'best@gmail.com'),
(3, 'OXE', '$2y$10$GdvjECR.ohSoVMm9rcqVzu.AHr9SPNJ90gewmi1URNvKvx7deTJAu', 'yanakorn@gmail.com'),
(4, 'YanakornS', '$2y$10$47xsZjy41ph7heE8CqQr5.YGVL5191Azg0nfViAH6qVMrfOuuEpbW', 'YanakornS@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT 'ไอดีผู้ใช้',
  `email` varchar(255) NOT NULL COMMENT 'อีเมล',
  `password` varchar(255) NOT NULL COMMENT 'รหัสผ่าน',
  `fname` varchar(255) NOT NULL COMMENT 'ชื่อจริง',
  `lname` varchar(255) NOT NULL COMMENT 'นามสกุล',
  `role` varchar(255) NOT NULL COMMENT 'สถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `fname`, `lname`, `role`) VALUES
(1, 'wasuchokop@gmail.com', '$2y$10$W6EE4TuuF.4PppQ./CWAg.DTTbo2zPDF9u7NceN4aD0EEUAVtyPnW', 'สมชาย', 'มาดี', 'member'),
(5, 'Best@gmail.com', '$2y$10$7coUimlzBdjffKBjOzOueOTkBMFL3mFDMR0oA0a.IqO4WGYErejPe', 'Besteiei', 'Iwnza', 'member'),
(6, 'aal_08@hotmail.com', '$2y$10$O7GWWaCaqxFY8HJuDk0UM.fWb0w9ookL1d1Z7Vjo5lfJ3khJZ8o9m', 'Bestza', 'Iwnza', 'member'),
(8, 'K@gmail.com', '$2y$10$VIf1uR70GR3sP4P3EOB02.evBfLUJgEJQWocULnD0c8xCOn518w0G', 'Kay', 'S', 'member'),
(9, 'Vick@gmail.com', '$2y$10$ud3I8.ZDkJ/VneGkFa3wsOkT/mqfzEwDGexktR.qeCMJAYBdzIqUW', 'Vick', 'Kuy', 'member'),
(10, 'XXXR@gmail.com', '$2y$10$DKJj26F8085huuABc5MfseDbvwTROqhfnJnw7iFbU1/t6AFKoJ/Pm', 'Besteiei', 'Iwnza', 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ไอดีผู้ใช้', AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
