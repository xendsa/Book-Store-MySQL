-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2023 at 10:59 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `description`, `image_path`, `harga`) VALUES
(1, 'World History', 'Sejarah adalah salah satu topik yang tidak pernah membosankan untuk kita bahas. Hal itu seringkali menyangkut mengenai sebuah peristiwa besar yang terjadi di masa lalu. Adapun hal yang paling disukai oleh banyak orang yaitu tentang bagaimana sebuah efek domino bekerja. Efek tersebut berarti bahwa peristiwa-peristiwa besar selanjutnya. Berikut ini adalah beberapa rangkuman mengenai rekomendasi buku sejarah dunia yang tidak kalah seru untuk kita baca.', 'buku1.jpeg\"', 90000),
(2, 'The Tempest', 'The Tempest is thought by many to be Shakespeare\'s greatest and most perfect play. When the magician Prospero deliberately summons a storm to overcome his enemy King Alonso of Naples ship the passengers are washed ashore on a fantastical island. Prospero manipulates the king, his entourage, apparitions and fiends as he schemes revenge on the hapless Alonso. Prospero\'s daughter and the King\'s son Ferdinand fall in love and their fraught lover provides the catalyst for their fathers\' reconciliation, contrition and clemency.', 'buku2.jpg', 110000),
(3, 'The Winter\'s Tale', 'The Winter\'s Tale is a play by William Shakespeare originally published in the First Folio of 1623. Although it was grouped among the comedies, many modern editors have relabelled the play as one of Shakespeare\'s late romances. Some critics consider it to be one of Shakespeare\'s \"problem plays\" because the first three acts are filled with intense psychological drama, while the last two acts are comedic and supply a happy ending.', 'uploads/buku3.jpg', 99000),
(4, 'The Complete Works of William Shakespear', 'Hamlet. Romeo and Juliet. Henry V. Macbeth. A Midsummer Night\'s Dream. King Lear. Lovers of literature will immediately recognise these as signature works of William Shakespeare, whose plays still rank as the greatest dramas ever produced in the English language four centuries after they were written. The Complete Works of William Shakespeare collects all thirty-seven of the immortal Bard\'s comedies, tragedies, and historical plays in a beautiful edition. This volume also features Shakespeare\'s complete poetry, including the sonnets. With this beautiful edition, you can enjoy Shakespeare\'s enduring literary legacy again and again. The Complete Works of William Shakespeare is one of Barnes & Noble\'s Leatherbound Editions. Each volume presents classic works by the world\'s best-loved authors in a beautifully designed edition bound in bonded leather. The attractive covers are embossed with colourful foils and the books have many special details including decorative endpapers, gilded edges, and ribbon markers. Elegant and affordable, these volumes are cornerstones for any home library.', 'uploads/buku4.jpg', 100000),
(5, 'Romeo & juliet', 'Romeo and Juliet is a tragedy written early in the career of William Shakespeare about two young star-crossed lovers whose deaths ultimately reconcile their feuding families. It was among Shakespeare\'s most popular plays during his lifetime and, along with Hamlet, is one of his most frequently performed plays. Today, the title characters are regarded as archetypal young lovers.\r\n\r\nRomeo and Juliet belongs to a tradition of tragic romances stretching back to antiquity. Its plot is based on an Italian tale, translated into verse as The Tragical History of Romeus and Juliet by Arthur Brooke in 1562 and retold in prose in Palace of Pleasure by William Painter in 1567. Shakespeare borrowed heavily from both but, to expand the plot, developed supporting characters, particularly Mercutio and Paris. Believed to have been written between 1591 and 1595, the play was first published in a quarto version in 1597. This text was of poor quality, and later editions corrected it, bringing it more in line with Shakespeare\'s original.', 'uploads/buku5.jpg', 75000),
(15, 'Hamlet', 'This edition of Hamlet represents a radically new text of the best known and most widely discussed of all Shakespearean tragedies. Arguing that the text currently accepted is not, in fact, the most authoritative version of the play, this new edition turns to the First Folio of 1623--Shakespeare\'s \"fair copy\"--that has been preserved for us in the Second Quarto. Introducing fresh theatrical momentum, this revision provides, as Shakespeare intended, a better, more practical acting script.', 'uploads/Hamlet-ebook-William-Shakespeare.jpg', 140000),
(16, 'Antony and Cleopatra', 'Antony and Cleopatra is a tragedy by William Shakespeare. The play was first performed around 1607, by the King\'s Men at either the Blackfriars Theatre or the Globe Theatre. Its first appearance in print was in the First Folio published in 1623, under the title The Tragedie of Anthonie, and Cleopatra.', 'uploads/images (1).jpeg', 95000),
(17, 'Othello', 'Othello is a tragedy written by William Shakespeare, around 1603. The story revolves around two characters, Othello and Iago. Othello is a Moorish military commander who was serving as a general of the Venetian army in defence of Cyprus against invasion by Ottoman Turks.', 'uploads/images.jpeg', 110000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`) VALUES
(3, '0', 'root@localhost', '*31AF8EA7C45151D5B63B8528910E54409749909A'),
(33, 'kai', 'kai@gmail.com', 'kaikun123');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `title`, `description`, `image_path`) VALUES
(1, 'kai@gmail.com', 'kaikun123', 'user', NULL, NULL, NULL),
(2, 'admin', 'admin123', 'admin', NULL, NULL, NULL),
(3, 'kaikun@gmail.com', 'kaikai', 'user', NULL, NULL, NULL),
(37, 'kaisan', 'kaisan', '', NULL, NULL, NULL),
(38, 'test', 'test', '', NULL, NULL, NULL),
(39, 'tester', 'test', '', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
