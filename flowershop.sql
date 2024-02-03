-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2024 at 08:30 PM
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
-- Database: `flowershop`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_form_entries`
--

CREATE TABLE `contact_form_entries` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_form_entries`
--

INSERT INTO `contact_form_entries` (`id`, `name`, `email`, `message`, `submission_date`) VALUES
(8, 'test', 'testt@gwe.com', '234', '2024-01-26 00:19:20'),
(9, 'rinesa', 'rinesagerxhaliu1@gmail.com', 'Pershendetje!', '2024-01-26 13:23:06'),
(13, 'rinesa', 'rinesagerxhaliu1@gmail.com', 'eee', '2024-02-01 00:45:18'),
(14, 'erleta', 'erletaparduzi@gmail.com', 'Si mund te gjeje dyqanin?', '2024-02-01 00:57:57'),
(15, 'Erdi', 'erdiger@gmail.com', 'Ku gjendeni?', '2024-02-01 17:53:43'),
(16, 'Elsa Gerxhaliu', 'elsagerxhaliu@gmail.com', 'Cilat jane lulet me te lira?', '2024-02-01 17:54:27');

-- --------------------------------------------------------

--
-- Table structure for table `flowers`
--

CREATE TABLE `flowers` (
  `flower_id` int(11) NOT NULL,
  `flower_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `addedbyuser` int(11) DEFAULT NULL,
  `category` varchar(255) NOT NULL DEFAULT 'Uncategorized',
  `added_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flowers`
--

INSERT INTO `flowers` (`flower_id`, `flower_name`, `price`, `image`, `addedbyuser`, `category`, `added_date`) VALUES
(4, 'The Jojo\n\n', 76.00, 'bestsell2.png', 20, 'best_seller', '2024-01-30 19:48:14'),
(5, 'The Darragh\n\n', 76.00, 'bestsell3.png', 20, 'best_seller', '2024-01-30 19:48:14'),
(6, 'PLUMBERRY', 76.00, 'bestsell4.png', 20, 'best_seller', '2024-01-30 19:48:14'),
(7, 'AUTUMN', 76.00, 'flower1.png', 20, 'best_seller', '2024-01-30 19:48:14'),
(8, 'FARMER\'CHOICE \n\n', 76.00, 'flower2.png', 20, 'best_seller', '2024-01-30 19:48:14'),
(9, 'The Vivienne Liberty Bouquet\r\n\r\n', 56.00, 'bestsell1.png', 20, 'Uncategorized', '2024-01-30 19:48:14'),
(20, 'ORCHARD', 14.00, 'flower3.png', 20, 'best_seller', '2024-01-30 20:13:28'),
(21, 'The Rue & Festive Brownies\n', 123.00, 'flower4.png', 20, 'best_seller', '2024-01-30 20:15:35'),
(22, 'The Jingle Bell Tree', 35.00, 'tree1.webp', 20, 'plants_trees_collection', '2024-01-30 22:22:11'),
(23, 'The Natural Sparkle Tree', 63.00, 'tree2.webp', 20, 'plants_trees_collection', '2024-01-30 22:22:58'),
(24, 'The Stary Night Tree', 39.00, 'tree3.webp', 20, 'plants_trees_collection', '2024-01-30 22:23:46'),
(25, 'The Snowman Tree', 45.00, 'tree4.webp', 20, 'plants_trees_collection', '2024-01-30 22:24:03'),
(26, 'The Pachira Monwy Tree', 76.00, 'plant1.webp', 20, 'plants_trees_collection', '2024-01-30 22:27:02'),
(27, 'The Bromeliad', 29.00, 'plant2.webp', 20, 'plants_trees_collection', '2024-01-30 22:27:44'),
(28, 'The Snake Plan', 96.00, 'plant3.webp', 20, 'plants_trees_collection', '2024-01-30 22:28:07'),
(29, 'The Festive Orange Tree', 44.00, 'plant4.webp', 20, 'plants_trees_collection', '2024-01-30 22:28:50'),
(30, 'The Hangig Hoya', 77.00, 'plant5.webp', 20, 'plants_trees_collection', '2024-01-30 22:29:16'),
(31, 'The Chinese Evergreen', 56.00, 'plant6.webp', 20, 'plants_trees_collection', '2024-01-30 22:29:52'),
(32, 'The Zanzibar Gem', 35.00, 'plant7.webp', 20, 'plants_trees_collection', '2024-01-30 22:30:41'),
(33, 'The Flamingo Flower', 98.00, 'plant8.webp', 20, 'plants_trees_collection', '2024-01-30 22:30:59'),
(34, 'The Becca', 27.00, 'a1.webp', 23, 'winter_collection', '2024-01-30 22:50:07'),
(35, 'The Maria', 33.00, 'a2.webp', 23, 'winter_collection', '2024-01-30 22:50:59'),
(36, 'The Yui', 68.00, 'a3.webp', 23, 'winter_collection', '2024-01-30 22:51:25'),
(37, 'The Nadia', 47.00, 'a4.webp', 23, 'winter_collection', '2024-01-30 22:51:48'),
(42, 'The Monika', 76.00, 'a5.webp', 23, 'winter_collection', '2024-01-30 23:03:54'),
(43, 'The Yanlin', 33.00, 'a6webp.webp', 23, 'winter_collection', '2024-01-30 23:04:20'),
(44, 'The Kiri & Sage Studio ', 65.00, 'a7.webp', 23, 'winter_collection', '2024-01-30 23:04:51'),
(45, 'he Yanlin & Gingerbread ', 54.00, 'a8.webp', 23, 'winter_collection', '2024-01-30 23:05:20'),
(46, 'The Hadley', 45.00, 'driedf`.webp', 20, 'dried_flowers_collection', '2024-01-30 23:25:31'),
(47, 'The Anya', 43.00, 'dried2.webp', 20, 'dried_flowers_collection', '2024-01-30 23:27:33'),
(48, 'The Wilma', 56.00, 'dried3.webp', 20, 'dried_flowers_collection', '2024-01-30 23:28:17'),
(49, 'The Wild Dried Wreath', 44.00, 'dried4.webp', 20, 'dried_flowers_collection', '2024-01-30 23:28:37'),
(50, 'Spring promise', 102.00, 'winterCol1.avif', 20, 'winter_collection', '2024-01-31 13:49:07'),
(51, 'Natural classic - Large', 46.00, 'wintercol2.avif', 20, 'winter_collection', '2024-01-31 13:50:18'),
(52, 'Serene Snow', 67.00, 'wintercol3.avif', 20, 'winter_collection', '2024-01-31 13:50:54'),
(58, 'The Monika', 34.00, 'winterc13.jpg', 20, 'winter_collection', '2024-02-01 17:09:57'),
(59, 'The Vivienne Liberty', 98.00, 'a4.webp', 20, 'best_seller', '2024-02-01 18:29:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(20, 'admin', 'admin@gmail.com', '$2y$10$l0Q3vL2Z8jvhZMn8.4dzcu.ErPiaI.cIPhbNcSe1WehH41aZMqngO', 'admin'),
(22, 'flowershopuser', 'test@testt.com', '$2y$10$t.Q2i3n.8siLEdinuBmHHeDJHl8vWI49KXkV.mNruy7LtSe10AvWa', 'user'),
(23, 'rinesa', 'rinesagerxhaliu1@gmail.com', '$2y$10$XrJIBvvGghcjTgAtIpkrceDBODWKOU3q2zbriGyH9G28DNV6IiZJq', 'user'),
(24, 'erleta', 'erletaparduzi@gmail.com', '$2y$10$wNiWXOo.Dxw0RvqJnIuMs.J0QB.8Vc79I1u46rSK7D6QTTY6U9E/C', 'user'),
(25, 'test', 'test@test.com', '$2y$10$WNleVcwEOesW5e.VybV3Oe7G0O7kOb390oy3sGbQ1SIxLy1qDWq1.', 'user'),
(26, 'Erdi', 'erdiger@gmail.com', '$2y$10$WbMSI61kz7U0AGmCjE0hn.ya0nv0bSWL9hDheBshqLiwrw8N8MD5C', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_form_entries`
--
ALTER TABLE `contact_form_entries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flowers`
--
ALTER TABLE `flowers`
  ADD PRIMARY KEY (`flower_id`),
  ADD KEY `fk_addedbyuser` (`addedbyuser`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_form_entries`
--
ALTER TABLE `contact_form_entries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `flowers`
--
ALTER TABLE `flowers`
  MODIFY `flower_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `flowers`
--
ALTER TABLE `flowers`
  ADD CONSTRAINT `fk_addedbyuser` FOREIGN KEY (`addedbyuser`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
