-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2026 at 02:28 PM
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
-- Database: `survey_kori`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `response_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_text` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `response_id`, `question_id`, `answer_text`) VALUES
(1, 1, 5, '10'),
(2, 1, 6, 'Always'),
(3, 1, 7, '3'),
(4, 2, 1, '2nd Year'),
(5, 2, 2, '2'),
(6, 2, 3, 'Desktop'),
(7, 2, 4, 'bolbona'),
(8, 3, 21, 'Rehan Khan - IT'),
(9, 3, 22, 'I am a software engineer'),
(10, 3, 23, 'Male'),
(11, 3, 24, 'food'),
(12, 3, 25, '4'),
(13, 4, 10, 'ok'),
(14, 4, 11, 'Option 1'),
(15, 5, 1, '4th Year'),
(16, 5, 2, '5'),
(17, 5, 3, 'Mobile Phone, Laptop'),
(18, 5, 4, 'majhe majhe churite dhora khai'),
(19, 6, 32, 'khaite'),
(20, 6, 33, 'mela ghotona mela mela mela ghotona'),
(21, 6, 34, 'male'),
(22, 6, 35, 'Movie, Khana pina'),
(23, 6, 36, '5'),
(24, 6, 37, ''),
(25, 7, 8, 'More than 5 hours');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `message`, `is_read`, `created_at`) VALUES
(1, 2, 'Welcome to Survey Kori! You received 100 bonus points.', 1, '2026-08-16 04:56:44'),
(2, 2, 'Your survey \"Online Class Experience of University Students\" was approved by the admin.', 0, '2026-08-16 04:56:44'),
(3, 3, 'Welcome to Survey Kori! You received 100 bonus points.', 0, '2026-08-16 04:56:44'),
(4, 4, 'Your survey \"Mental Health & Study Pressure\" is now active.', 0, '2026-08-16 04:56:44'),
(5, 5, 'Welcome to Survey Kori! You received 100 bonus points.', 0, '2026-08-16 04:56:44'),
(6, 1, 'Your survey \"Test survey\" was sent to the admin for approval.', 1, '2026-08-16 05:07:45'),
(7, 6, 'Welcome to Survey Kori! You received 50 starting points.', 0, '2026-08-16 05:25:59'),
(8, 6, 'Your survey \"Test Survey\" was sent to the admin for approval.', 0, '2026-08-16 05:26:53'),
(9, 6, 'You received a refund of 50 points from \"Test Survey\".', 0, '2026-08-16 05:28:07'),
(10, 6, 'Your survey \"Test Survey\" was rejected: trrgfd', 0, '2026-08-16 05:28:07'),
(11, 4, 'Your survey \"Mental Health & Study Pressure\" received a new response.', 0, '2026-08-16 05:28:58'),
(12, 1, 'You earned 4 points from completing \"Mental Health & Study Pressure\".', 0, '2026-08-16 05:28:58'),
(13, 1, 'Your survey \"Test survey\" was approved and is now live.', 1, '2026-08-17 06:42:12'),
(14, 2, 'Your survey \"Online Class Experience of University Students\" received a new response.', 0, '2026-08-17 06:43:32'),
(15, 1, 'You earned 5 points from completing \"Online Class Experience of University Students\".', 1, '2026-08-17 06:43:32'),
(16, 1, 'Your survey \"a survey title\" was sent to the admin for approval.', 0, '2026-08-17 09:13:49'),
(17, 1, 'Your survey \"a survey title\" was approved and is now live.', 1, '2026-08-17 09:14:25'),
(18, 7, 'Welcome to Survey Kori! You received 50 starting points.', 1, '2026-08-17 09:16:17'),
(19, 1, 'Your survey \"a survey title\" received a new response.', 1, '2026-08-17 09:17:12'),
(20, 7, 'You earned 1 points from completing \"a survey title\".', 1, '2026-08-17 09:17:12'),
(21, 8, 'Welcome to Survey Kori! You received 50 starting points.', 1, '2026-08-19 14:45:41'),
(22, 1, 'Your survey \"Test survey\" received a new response.', 1, '2026-08-19 14:48:01'),
(23, 8, 'You earned 5 points from completing \"Test survey\".', 1, '2026-08-19 14:48:01'),
(24, 2, 'Your survey \"Online Class Experience of University Students\" received a new response.', 0, '2026-08-19 14:55:13'),
(25, 8, 'You earned 5 points from completing \"Online Class Experience of University Students\".', 0, '2026-08-19 14:55:13'),
(26, 8, 'Your survey \"Amra kno duniyate ashci ei niye survey\" was sent to the admin for approval.', 0, '2026-08-19 14:55:28'),
(27, 9, 'Welcome to Survey Kori! You received 50 starting points.', 0, '2026-08-19 14:56:18'),
(28, 8, 'Your survey \"Amra kno duniyate ashci ei niye survey\" was approved and is now live.', 0, '2026-08-19 15:09:33'),
(29, 8, 'Your survey \"Amra kno duniyate ashci ei niye survey\" received a new response.', 0, '2026-08-19 15:12:02'),
(30, 9, 'You earned 6 points from completing \"Amra kno duniyate ashci ei niye survey\".', 0, '2026-08-19 15:12:02'),
(31, 3, 'Your survey \"Social Media Usage Habits\" was approved and is now live.', 0, '2026-08-30 14:42:57'),
(32, 2, 'Your account has been blocked by an administrator.', 0, '2026-08-30 14:43:14'),
(33, 3, 'Your survey \"Social Media Usage Habits\" received a new response.', 0, '2026-08-31 19:40:06'),
(34, 1, 'You earned 3 points from completing \"Social Media Usage Habits\".', 0, '2026-08-31 19:40:06'),
(35, 3, 'Your survey \"rthfv\" was sent to the admin for approval.', 0, '2026-08-31 19:47:32'),
(36, 9, 'An administrator gave you 4 bonus points.', 0, '2026-08-31 20:03:49'),
(37, 2, 'Your account has been unblocked.', 0, '2026-08-31 20:03:53');

-- --------------------------------------------------------

--
-- Table structure for table `point_transactions`
--

CREATE TABLE `point_transactions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `survey_id` int(11) DEFAULT NULL,
  `transaction_type` enum('EARN','SPEND','LOCK','REFUND','BONUS') NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `point_transactions`
--

INSERT INTO `point_transactions` (`id`, `user_id`, `survey_id`, `transaction_type`, `points`, `description`, `created_at`) VALUES
(1, 2, NULL, 'BONUS', 100, 'Welcome bonus', '2026-08-16 04:56:44'),
(2, 3, NULL, 'BONUS', 100, 'Welcome bonus', '2026-08-16 04:56:44'),
(3, 4, NULL, 'BONUS', 100, 'Welcome bonus', '2026-08-16 04:56:44'),
(4, 5, NULL, 'BONUS', 100, 'Welcome bonus', '2026-08-16 04:56:44'),
(5, 2, 1, 'SPEND', 50, 'Published survey \"Online Class Experience of University Students\"', '2026-08-16 04:56:44'),
(6, 2, 1, 'LOCK', 50, 'Points locked for \"Online Class Experience of University Students\"', '2026-08-16 04:56:44'),
(7, 4, 2, 'SPEND', 80, 'Published survey \"Mental Health & Study Pressure\"', '2026-08-16 04:56:44'),
(8, 4, 2, 'LOCK', 80, 'Points locked for \"Mental Health & Study Pressure\"', '2026-08-16 04:56:44'),
(9, 2, 2, 'EARN', 60, 'Earned points from answering surveys', '2026-08-16 04:56:44'),
(10, 3, 1, 'EARN', 20, 'Earned points from answering surveys', '2026-08-16 04:56:44'),
(11, 1, 5, 'SPEND', 50, 'Published survey \"Test survey\"', '2026-08-16 05:07:45'),
(12, 1, 5, 'LOCK', 50, 'Points locked for \"Test survey\"', '2026-08-16 05:07:45'),
(13, 6, NULL, 'EARN', 50, 'Welcome bonus points', '2026-08-16 05:25:59'),
(14, 6, 6, 'SPEND', 50, 'Published survey \"Test Survey\"', '2026-08-16 05:26:53'),
(15, 6, 6, 'LOCK', 50, 'Points locked for \"Test Survey\"', '2026-08-16 05:26:53'),
(16, 6, 6, 'REFUND', 50, 'Refund of unused points from \"Test Survey\"', '2026-08-16 05:28:07'),
(17, 1, 2, 'EARN', 4, 'Completed survey \"Mental Health & Study Pressure\"', '2026-08-16 05:28:58'),
(18, 1, 1, 'EARN', 5, 'Completed survey \"Online Class Experience of University Students\"', '2026-08-17 06:43:32'),
(19, 1, 7, 'SPEND', 10, 'Published survey \"a survey title\"', '2026-08-17 09:13:49'),
(20, 1, 7, 'LOCK', 10, 'Points locked for \"a survey title\"', '2026-08-17 09:13:49'),
(21, 7, NULL, 'EARN', 50, 'Welcome bonus points', '2026-08-17 09:16:17'),
(22, 7, 7, 'EARN', 1, 'Completed survey \"a survey title\"', '2026-08-17 09:17:12'),
(23, 8, NULL, 'EARN', 50, 'Welcome bonus points', '2026-08-19 14:45:41'),
(24, 8, 5, 'EARN', 5, 'Completed survey \"Test survey\"', '2026-08-19 14:48:01'),
(25, 8, 1, 'EARN', 5, 'Completed survey \"Online Class Experience of University Students\"', '2026-08-19 14:55:13'),
(26, 8, 8, 'SPEND', 60, 'Published survey \"Amra kno duniyate ashci ei niye survey\"', '2026-08-19 14:55:28'),
(27, 8, 8, 'LOCK', 60, 'Points locked for \"Amra kno duniyate ashci ei niye survey\"', '2026-08-19 14:55:28'),
(28, 9, NULL, 'EARN', 50, 'Welcome bonus points', '2026-08-19 14:56:18'),
(29, 9, 8, 'EARN', 6, 'Completed survey \"Amra kno duniyate ashci ei niye survey\"', '2026-08-19 15:12:02'),
(30, 1, 3, 'EARN', 3, 'Completed survey \"Social Media Usage Habits\"', '2026-08-31 19:40:06'),
(31, 3, 9, 'SPEND', 50, 'Published survey \"rthfv\"', '2026-08-31 19:47:32'),
(32, 3, 9, 'LOCK', 50, 'Points locked for \"rthfv\"', '2026-08-31 19:47:32'),
(33, 9, NULL, 'EARN', 4, 'Bonus points given by admin', '2026-08-31 20:03:49');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `survey_id` int(11) NOT NULL,
  `question_text` varchar(500) NOT NULL,
  `question_type` enum('short_answer','paragraph','multiple_choice','checkbox','rating') NOT NULL DEFAULT 'short_answer',
  `is_required` tinyint(1) NOT NULL DEFAULT 0,
  `question_order` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `survey_id`, `question_text`, `question_type`, `is_required`, `question_order`) VALUES
(1, 1, 'Which year of study are you in?', 'multiple_choice', 1, 1),
(2, 1, 'How would you rate your online class experience?', 'rating', 1, 2),
(3, 1, 'Which devices do you use for online classes?', 'checkbox', 0, 3),
(4, 1, 'What is the biggest problem you face in online classes?', 'paragraph', 0, 4),
(5, 2, 'What is your age?', 'short_answer', 1, 1),
(6, 2, 'How often do you feel study pressure?', 'multiple_choice', 1, 2),
(7, 2, 'Rate your overall stress level', 'rating', 1, 3),
(8, 3, 'How many hours per day do you use social media?', 'multiple_choice', 1, 1),
(9, 4, 'How is the canteen food quality?', 'rating', 1, 1),
(10, 5, 'We want to make a system', 'short_answer', 1, 1),
(11, 5, 'Male or female', 'multiple_choice', 1, 2),
(12, 6, 'tbfdverefds', 'short_answer', 1, 1),
(13, 6, 'rtvdcwrefsx', 'paragraph', 1, 2),
(14, 6, 'erdcd', 'checkbox', 1, 3),
(15, 6, 'egrfe4rewd', 'multiple_choice', 1, 4),
(21, 7, 'What is your name', 'short_answer', 1, 1),
(22, 7, 'write about your self', 'paragraph', 1, 2),
(23, 7, 'Your Gender', 'multiple_choice', 1, 3),
(24, 7, 'Your interest', 'checkbox', 1, 4),
(25, 7, 'How was our services', 'rating', 1, 5),
(32, 8, 'apni duniyate kno ashcen ki monehoy', 'short_answer', 1, 1),
(33, 8, 'apnar jibon brittato den', 'paragraph', 1, 2),
(34, 8, 'apni beda na bedi?', 'multiple_choice', 1, 3),
(35, 8, 'apni kishe kishe anondo pan', 'checkbox', 1, 4),
(36, 8, 'apnar jion k apni koto diben rating a.', 'rating', 1, 5),
(37, 8, 'hudai kihcu maren', 'short_answer', 0, 6),
(38, 9, '5tsed4r', 'short_answer', 1, 1),
(39, 9, 'a5fsf', 'paragraph', 1, 2),
(40, 9, 'era34', 'checkbox', 1, 3),
(41, 9, 'rf4redd3ew', 'rating', 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `question_options`
--

CREATE TABLE `question_options` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `option_text` varchar(255) NOT NULL,
  `option_order` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question_options`
--

INSERT INTO `question_options` (`id`, `question_id`, `option_text`, `option_order`) VALUES
(1, 1, '1st Year', 1),
(2, 1, '2nd Year', 2),
(3, 1, '3rd Year', 3),
(4, 1, '4th Year', 4),
(5, 3, 'Mobile Phone', 1),
(6, 3, 'Laptop', 2),
(7, 3, 'Desktop', 3),
(8, 3, 'Tablet', 4),
(9, 6, 'Always', 1),
(10, 6, 'Often', 2),
(11, 6, 'Sometimes', 3),
(12, 6, 'Never', 4),
(13, 8, 'Less than 1 hour', 1),
(14, 8, '1-3 hours', 2),
(15, 8, '3-5 hours', 3),
(16, 8, 'More than 5 hours', 4),
(17, 11, 'Option 1', 1),
(18, 11, 'Option 2', 2),
(19, 14, 'Option 1', 1),
(20, 14, 'Option 2', 2),
(21, 15, 'Option 1', 1),
(22, 15, 'Option 2', 2),
(27, 23, 'Male', 1),
(28, 23, 'Female', 2),
(29, 24, 'food', 1),
(30, 24, 'movie', 2),
(37, 34, 'male', 1),
(38, 34, 'female', 2),
(39, 35, 'Movie', 1),
(40, 35, 'Khana pina', 2),
(41, 35, 'manush pidani', 3),
(42, 35, 'kichui bhalo lagena', 4),
(43, 40, 'Option 1', 1),
(44, 40, 'Option 2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `responses`
--

CREATE TABLE `responses` (
  `id` int(11) NOT NULL,
  `survey_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `earned_points` int(11) NOT NULL DEFAULT 0,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `responses`
--

INSERT INTO `responses` (`id`, `survey_id`, `user_id`, `earned_points`, `submitted_at`) VALUES
(1, 2, 1, 4, '2026-08-16 05:28:58'),
(2, 1, 1, 5, '2026-08-17 06:43:32'),
(3, 7, 7, 1, '2026-08-17 09:17:12'),
(4, 5, 8, 5, '2026-08-19 14:48:01'),
(5, 1, 8, 5, '2026-08-19 14:55:13'),
(6, 8, 9, 6, '2026-08-19 15:12:02'),
(7, 3, 1, 3, '2026-08-31 19:40:06');

-- --------------------------------------------------------

--
-- Table structure for table `surveys`
--

CREATE TABLE `surveys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text DEFAULT NULL,
  `category` varchar(60) NOT NULL DEFAULT 'Other',
  `required_responses` int(11) NOT NULL DEFAULT 10,
  `reward_per_response` int(11) NOT NULL DEFAULT 5,
  `total_points` int(11) NOT NULL DEFAULT 0,
  `collected_responses` int(11) NOT NULL DEFAULT 0,
  `deadline` date DEFAULT NULL,
  `status` enum('draft','pending','active','completed','rejected','closed') NOT NULL DEFAULT 'draft',
  `rejection_reason` varchar(255) DEFAULT NULL,
  `approved_at` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surveys`
--

INSERT INTO `surveys` (`id`, `user_id`, `title`, `description`, `category`, `required_responses`, `reward_per_response`, `total_points`, `collected_responses`, `deadline`, `status`, `rejection_reason`, `approved_at`, `created_at`) VALUES
(1, 2, 'Online Class Experience of University Students', 'A short survey about how students feel about online classes after the pandemic.', 'Education', 10, 5, 50, 2, '2026-12-31', 'active', NULL, '2026-08-17 12:41:37', '2026-08-16 04:56:44'),
(2, 4, 'Mental Health & Study Pressure', 'Research survey on study pressure among undergraduate students.', 'Health', 20, 4, 80, 1, '2026-12-31', 'active', NULL, '2026-08-17 12:41:37', '2026-08-16 04:56:44'),
(3, 3, 'Social Media Usage Habits', 'How much time do students spend on social media every day?', 'Social Media', 10, 3, 30, 1, '2026-11-30', 'active', NULL, '2026-08-30 20:42:57', '2026-08-16 04:56:44'),
(4, 5, 'Campus Food Quality', 'Draft survey about canteen food quality.', 'Student Life', 5, 2, 0, 0, '2026-10-30', 'draft', NULL, NULL, '2026-08-16 04:56:44'),
(5, 1, 'Test survey', 'hello', 'Education', 10, 5, 50, 1, '2026-08-19', 'active', NULL, '2026-08-17 12:42:12', '2026-08-16 05:07:09'),
(6, 6, 'Test Survey', 'Onek likha', 'Education', 10, 5, 50, 0, '2026-08-18', 'rejected', 'trrgfd', NULL, '2026-08-16 05:26:26'),
(7, 1, 'a survey title', 'a description fo the srvey', 'Social Media', 10, 1, 10, 1, '2026-08-19', 'active', NULL, '2026-08-17 15:14:25', '2026-08-17 09:11:00'),
(8, 8, 'Amra kno duniyate ashci ei niye survey', 'apni kno duniyate ashcen ei niye survey korchi. apnar jibon theke relate kore kichu proshner uttor diben.', 'Research', 10, 6, 60, 1, '2026-08-20', 'active', NULL, '2026-08-19 21:09:33', '2026-08-19 14:52:17'),
(9, 3, 'rthfv', 'ytgg', 'Education', 10, 5, 50, 0, '2026-09-03', 'pending', NULL, NULL, '2026-08-31 19:47:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(120) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `university` varchar(150) DEFAULT NULL,
  `department` varchar(150) DEFAULT NULL,
  `user_type` enum('student','researcher') NOT NULL DEFAULT 'student',
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `status` enum('active','blocked') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `university`, `department`, `user_type`, `role`, `status`, `created_at`) VALUES
(1, 'System Admin', 'admin@surveykori.com', '$2y$10$D8ZQSwvqvqMoPohiayscUerRhRO3YaKGEe.5HJXps9gxI2q3pb9.O', 'Survey Kori', 'Administration', 'researcher', 'admin', 'active', '2026-08-16 04:56:44'),
(2, 'Rahim Uddin', 'rahim@student.com', '$2y$10$46nkG2WMjTT6Q07yGWkK2e8V3N4DM.cIcgSwi6j5POpp.1AbcVL4e', 'Dhaka University', 'CSE', 'student', 'user', 'active', '2026-08-16 04:56:44'),
(3, 'Karima Akter', 'karima@student.com', '$2y$10$46nkG2WMjTT6Q07yGWkK2e8V3N4DM.cIcgSwi6j5POpp.1AbcVL4e', 'BUET', 'EEE', 'student', 'user', 'active', '2026-08-16 04:56:44'),
(4, 'Dr. Nasir Hossain', 'nasir@research.com', '$2y$10$46nkG2WMjTT6Q07yGWkK2e8V3N4DM.cIcgSwi6j5POpp.1AbcVL4e', 'NSU', 'Public Health', 'researcher', 'user', 'active', '2026-08-16 04:56:44'),
(5, 'Sabbir Ahmed', 'sabbir@student.com', '$2y$10$46nkG2WMjTT6Q07yGWkK2e8V3N4DM.cIcgSwi6j5POpp.1AbcVL4e', 'Jahangirnagar University', 'Business', 'student', 'user', 'active', '2026-08-16 04:56:44'),
(6, 'Rehan Khan', 'rehanthestar5@gmail.com', '$2y$10$zoIsk8X.tp9mo2SAX2P9guaWTxnN0gC24JTVe7UlWqdlXIvE8FUCi', 'AIUB', 'CSE', 'student', 'user', 'active', '2026-08-16 05:25:59'),
(7, 'Rehan Khan', 'itpagla24@gmail.com', '$2y$10$UeUyHv606mvEPTMHpo31CucaYZjLuIx.nrD5r647sesFofQ/ql9QC', 'AIUB', 'CSE', 'researcher', 'user', 'active', '2026-08-17 09:16:17'),
(8, 'Nupur begum', 'nupur@ksgbrg.com', '$2y$10$J80eVwWI2xKuvI/t84FPQuikItkcqmQC7YSU/A5vsgru0lWDK/VKe', 'AIUB Supreme', 'Arts', 'student', 'user', 'active', '2026-08-19 14:45:41'),
(9, 'Nawmi afa', 'n@gmail.com', '$2y$10$64Rd5MKw1orGyGGGQGo7vuDbXOgLb2DOkB.u.cQMK7QrjXkW0xdSO', 'Open University', 'Biology', 'researcher', 'user', 'active', '2026-08-19 14:56:18');

-- --------------------------------------------------------

--
-- Table structure for table `user_points`
--

CREATE TABLE `user_points` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `available_points` int(11) NOT NULL DEFAULT 100,
  `locked_points` int(11) NOT NULL DEFAULT 0,
  `earned_points` int(11) NOT NULL DEFAULT 0,
  `spent_points` int(11) NOT NULL DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_points`
--

INSERT INTO `user_points` (`id`, `user_id`, `available_points`, `locked_points`, `earned_points`, `spent_points`, `updated_at`) VALUES
(1, 1, 52, 54, 12, 60, '2026-08-31 19:40:06'),
(2, 2, 150, 40, 60, 50, '2026-08-19 14:55:13'),
(3, 3, 70, 50, 20, 50, '2026-08-31 19:47:32'),
(4, 4, 300, 76, 0, 80, '2026-08-16 05:28:58'),
(5, 5, 100, 0, 0, 0, '2026-08-16 04:56:44'),
(6, 6, 50, 0, 50, 0, '2026-08-16 05:28:07'),
(7, 7, 51, 0, 51, 0, '2026-08-17 09:17:12'),
(8, 8, 0, 54, 60, 60, '2026-08-19 15:12:02'),
(9, 9, 60, 0, 60, 0, '2026-08-31 20:03:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_answer_response` (`response_id`),
  ADD KEY `fk_answer_question` (`question_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_notif_user` (`user_id`);

--
-- Indexes for table `point_transactions`
--
ALTER TABLE `point_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tx_user` (`user_id`),
  ADD KEY `fk_tx_survey` (`survey_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_question_survey` (`survey_id`);

--
-- Indexes for table `question_options`
--
ALTER TABLE `question_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_option_question` (`question_id`);

--
-- Indexes for table `responses`
--
ALTER TABLE `responses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniq_response` (`survey_id`,`user_id`),
  ADD KEY `fk_response_user` (`user_id`);

--
-- Indexes for table `surveys`
--
ALTER TABLE `surveys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_survey_user` (`user_id`),
  ADD KEY `idx_survey_status` (`status`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_points`
--
ALTER TABLE `user_points`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `point_transactions`
--
ALTER TABLE `point_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `question_options`
--
ALTER TABLE `question_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `responses`
--
ALTER TABLE `responses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `surveys`
--
ALTER TABLE `surveys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_points`
--
ALTER TABLE `user_points`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `fk_answer_question` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_answer_response` FOREIGN KEY (`response_id`) REFERENCES `responses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `fk_notif_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `point_transactions`
--
ALTER TABLE `point_transactions`
  ADD CONSTRAINT `fk_tx_survey` FOREIGN KEY (`survey_id`) REFERENCES `surveys` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_tx_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `fk_question_survey` FOREIGN KEY (`survey_id`) REFERENCES `surveys` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `question_options`
--
ALTER TABLE `question_options`
  ADD CONSTRAINT `fk_option_question` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `responses`
--
ALTER TABLE `responses`
  ADD CONSTRAINT `fk_response_survey` FOREIGN KEY (`survey_id`) REFERENCES `surveys` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_response_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `surveys`
--
ALTER TABLE `surveys`
  ADD CONSTRAINT `fk_survey_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_points`
--
ALTER TABLE `user_points`
  ADD CONSTRAINT `fk_points_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
