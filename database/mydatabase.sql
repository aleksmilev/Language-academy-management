-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Apr 21, 2024 at 05:54 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int NOT NULL,
  `email` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `first_name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `last_name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `email`, `password`, `first_name`, `last_name`) VALUES
(1, 'user1@example.com', 'password1', 'John', 'Doe'),
(2, 'user2@example.com', 'password2', 'Jane', 'Smith'),
(3, 'user3@example.com', 'password3', 'Alice', 'Johnson');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int NOT NULL,
  `title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lecturer` int NOT NULL,
  `description` longtext NOT NULL,
  `price` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `level` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `date`, `lecturer`, `description`, `price`, `level`, `status`) VALUES
(1, 'English for Beginners', '2024-04-19', 1, 'A course designed to introduce beginners to the English language.', '100', 'Beginner', 0),
(2, 'Intermediate Spanish', '2024-04-20', 2, 'Take your Spanish skills to the next level with this intermediate course.', '120', 'Intermediate', 0),
(3, 'Advanced French Conversation', '2024-04-21', 3, 'Enhance your fluency in French through advanced conversational practice.', '150', 'Advanced', 0),
(4, 'German Grammar Essentials', '2024-04-22', 1, 'Master the essential grammar rules of the German language.', '90', 'Beginner', 0),
(5, 'Japanese Writing Workshop', '2024-04-23', 2, 'Learn the intricacies of Japanese writing systems in this specialized workshop.', '110', 'Intermediate', 0),
(6, 'Chinese Characters Mastery', '2024-04-24', 3, 'Become proficient in recognizing and writing Chinese characters.', '130', 'Advanced', 0),
(7, 'Italian Pronunciation Bootcamp', '2024-04-25', 1, 'Perfect your Italian pronunciation through intensive practice sessions.', '95', 'Beginner', 0),
(8, 'Russian Reading Club', '2024-04-26', 2, 'Join a community of Russian learners and improve your reading skills together.', '125', 'Intermediate', 0),
(9, 'Arabic Speaking Intensive', '2024-04-27', 3, 'Immerse yourself in Arabic conversation practice for rapid skill development.', '155', 'Advanced', 0),
(10, 'Spanish for Travelers', '2024-04-28', 1, 'Learn essential Spanish phrases and vocabulary for traveling in Spanish-speaking countries.', '105', 'Beginner', 0),
(11, 'French Film Appreciation', '2024-04-29', 2, 'Explore French cinema and culture while improving your language skills.', '115', 'Intermediate', 0),
(12, 'Portuguese Song Lyrics Analysis', '2024-04-30', 3, 'Analyze Portuguese song lyrics to deepen your understanding of the language.', '140', 'Advanced', 0),
(13, 'English Business Communication', '2024-05-01', 1, 'Develop effective business communication skills in English for professional success.', '85', 'Beginner', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sign`
--

CREATE TABLE `sign` (
  `id` int NOT NULL,
  `client_id` int NOT NULL,
  `course_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sign`
--

INSERT INTO `sign` (`id`, `client_id`, `course_id`) VALUES
(1, 1, 8),
(2, 1, 8),
(3, 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `email` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `first_name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `last_name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `first_name`, `last_name`, `admin`) VALUES
(1, 'dummy1@example.com', 'password1', 'John', 'Doe', 1),
(2, 'dummy2@example.com', 'password2', 'Jane', 'Smith', 0),
(3, 'dummy3@example.com', 'password3', 'Alice', 'Johnson', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lecturer` (`lecturer`);

--
-- Indexes for table `sign`
--
ALTER TABLE `sign`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`,`course_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sign`
--
ALTER TABLE `sign`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`lecturer`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sign`
--
ALTER TABLE `sign`
  ADD CONSTRAINT `sign_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sign_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
