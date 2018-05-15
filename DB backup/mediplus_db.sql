-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 13, 2018 at 11:52 PM
-- Server version: 10.2.14-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mediplus_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `medical_staff_id` int(11) NOT NULL,
  `type` enum('Regular','Preserved') NOT NULL DEFAULT 'Regular',
  `status` enum('None','Scheduled','Unscheduled') NOT NULL DEFAULT 'None',
  `appointment_date` date DEFAULT NULL,
  `appointment_time` time DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `medical_staff_type` enum('Doctor','Nurse') NOT NULL DEFAULT 'Doctor'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` int(11) NOT NULL,
  `template_name` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `from_email_id` varchar(100) NOT NULL,
  `template_body` text NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `template_name`, `subject`, `from_email_id`, `template_body`, `status`, `created_at`, `updated_at`) VALUES
(1, 'User Forgot Password', 'User Forgot Password', 'icancominc@gmail.com', '<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"background:#fff; border-radius:10px; box-shadow:1px 2px 0 #E6EBF1; width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"[SITE_NAME]\" src=\"[IMG_LOGO_PATH]\" style=\"height:50px\" title=\"[SITE_NAME]\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<h1>Hi [USERNAME],</h1>\r\n\r\n			<p>There was recently a request to change the password for your account on [SITE_NAME].</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Please click below image to reset password.</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td><a href=\"[LINK]\" style=\"cursor: pointer;\"><img src=\"[BUTTON_LINK]\" style=\"height:36px\" title=\"Forgot Password Link\" /></a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Our copy this link and open in new tab:[LINK]</p>\r\n			</td>\r\n		</tr>\r\n		\r\n		<tr>\r\n			<td>\r\n			<p>[SITE_NAME]</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 'Active', '2015-08-18 00:00:00', '2018-03-28 08:47:09'),
(2, 'Patient Registration', 'Patient Registration', 'icancominc@gmail.com', '<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"background:#fff; border-radius:10px; box-shadow:1px 2px 0 #E6EBF1; width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"[SITE_NAME]\" src=\"[IMG_LOGO_PATH]\" style=\"height:50px\" title=\"[SITE_NAME]\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<h1>Hi [USERNAME],</h1>\r\n\r\n			<p>You are registerd as a patient on  [SITE_NAME].</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		\r\n		<tr>\r\n			<td>\r\n			<p>This is the information about your account:<br>\r\n            <b>Email Id:</b>  [EMAILID]\r\n            <b>Password:</b> [PASSWORD]\r\n\r\n			</p>\r\n			</td>\r\n		</tr>\r\n		\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		\r\n		<tr>\r\n			<td>\r\n			<p>[SITE_NAME]</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 'Active', '2015-08-18 00:00:00', '2018-03-28 08:47:09'),
(3, 'Medical Staff Registration', 'Medical Staff Registration', 'icancominc@gmail.com', '<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"background:#fff; border-radius:10px; box-shadow:1px 2px 0 #E6EBF1; width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"[SITE_NAME]\" src=\"[IMG_LOGO_PATH]\" style=\"height:50px\" title=\"[SITE_NAME]\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<h1>Hi [USERNAME],</h1>\r\n\r\n			<p>You are registerd as a [USER_ROLE] on  [SITE_NAME].</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		\r\n		<tr>\r\n			<td>\r\n			<p>This is the information about your account:<br>\r\n            <b>Email Id:</b>  [EMAILID]\r\n            <b>Password:</b> [PASSWORD]\r\n\r\n			</p>\r\n			</td>\r\n		</tr>\r\n		\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		\r\n		<tr>\r\n			<td>\r\n			<p>[SITE_NAME]</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 'Active', '2015-08-18 00:00:00', '2018-03-28 08:47:09'),
(4, 'Contact Person Detailes of the patient', 'Contact Person Detailes of the patient', 'icancominc@gmail.com', '<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"background:#fff; border-radius:10px; box-shadow:1px 2px 0 #E6EBF1; width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"[SITE_NAME]\" src=\"[IMG_LOGO_PATH]\" style=\"height:50px\" title=\"[SITE_NAME]\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<h1>Hi [CONTACT_PERSON_NAME],</h1>\r\n\r\n			<p>Youre relative [USER_NAME] was registered to   [SITE_NAME].</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		\r\n		<tr>\r\n			<td>\r\n			<p>You will recieve alerts and status about your relative.\r\n\r\n			</p>\r\n			</td>\r\n		</tr>\r\n		\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		\r\n		<tr>\r\n			<td>\r\n			<p>[SITE_NAME]</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 'Active', '2015-08-18 00:00:00', '2018-03-28 08:47:09');

-- --------------------------------------------------------

--
-- Table structure for table `medications`
--

CREATE TABLE `medications` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `strength` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medications`
--

INSERT INTO `medications` (`id`, `name`, `strength`, `created_at`, `updated_at`) VALUES
(4, 'E-R-O (Otic)', NULL, '2018-05-12 06:00:34', '2018-05-12 11:13:39');

-- --------------------------------------------------------

--
-- Table structure for table `medication_treatment`
--

CREATE TABLE `medication_treatment` (
  `medication_id` int(10) UNSIGNED NOT NULL,
  `treatment_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_04_23_182351_create_medications_table', 1),
(4, '2018_04_23_185150_create_symptoms_table', 1),
(5, '2018_04_23_185838_create_treatments_table', 1),
(6, '2018_04_28_102014_create_patient_data_table', 1),
(7, '2018_04_28_124956_create_patient_treatment_table', 1),
(8, '2018_05_07_141010_create_symptom_reports_table', 1),
(9, '2018_05_07_162654_add_patient_id_field_to_treatments_table', 1),
(10, '2018_05_07_170922_create_treatment_medications_table', 1),
(11, '2018_05_07_173824_add_strength_field_to_medications_table', 1),
(12, '2018_05_08_191502_add_birthday_field_to_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('Tomerchatsky@gmail.com', '$2y$10$t7ZrFgZLF3Ouyu8uMe5gDeaM88S7Y.uIVYXz15lbMDkHFBrt18HTO', '2018-05-10 17:41:06'),
('jones@hospital.com', '$2y$10$/L9WvqkHf9eVP.82t6ksz.6IeEi2oevyw408MEHSzJL1gOFo7madm', '2018-05-11 08:32:49');

-- --------------------------------------------------------

--
-- Table structure for table `patient_data`
--

CREATE TABLE `patient_data` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_relation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_data`
--

INSERT INTO `patient_data` (`id`, `user_id`, `doctor_id`, `gender`, `type`, `contact_relation`, `contact_name`, `contact_phone`, `contact_email`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, 'Male', 'Breast', 'Child', 'tom', '0912038182', '44@sadasdas', 0, '2018-05-10 08:31:33', '2018-05-10 08:31:33'),
(2, 4, NULL, 'Female', 'Breast', 'Sibling', 'sdsd', '0129390812', 'tomer22@gmail.com', 0, '2018-05-11 12:02:54', '2018-05-11 12:02:54'),
(3, 5, NULL, 'Male', 'Liver', 'Sibling', 'tom', '01289321312', '44@sadasdas', 1, '2018-05-12 11:16:45', '2018-05-12 11:16:45'),
(4, 6, NULL, 'Female', 'Brain', 'Spouse', 'iidsd', '921839123', '424@sadasdas', 1, '2018-05-12 22:09:57', '2018-05-12 22:09:57'),
(5, 9, NULL, 'Female', 'Brain', 'Spouse', 'dskljfsdf', '21039120839012', '123123123@123', 1, '2018-05-12 23:10:41', '2018-05-12 23:10:41'),
(6, 11, NULL, 'Female', 'Brain', 'Spouse', 'asdad', '123456789', 'sssss@gmail.com', 1, '2018-05-13 03:38:30', '2018-05-13 03:38:30'),
(7, 12, NULL, 'Female', 'Brain', 'Spouse', 'ddd', '123456789', 'ss@gmail.com', 1, '2018-05-13 03:59:35', '2018-05-13 03:59:35'),
(8, 13, NULL, 'Female', 'Brain', 'Spouse', 'Yossi', '121213131233', 'icancominc@gmail.com', 1, '2018-05-13 04:09:08', '2018-05-13 04:09:08'),
(9, 14, NULL, 'Female', 'Brain', 'Spouse', 'iamtheking', '12131313312', 'icancominc@gmail.com', 1, '2018-05-13 04:12:42', '2018-05-13 04:12:42'),
(10, 19, NULL, 'Female', 'Brain', 'Spouse', 'dfdsf', '2321313123', 'asasd@gmail.com', 1, '2018-05-13 08:18:13', '2018-05-13 08:18:13'),
(11, 20, NULL, 'Female', 'Brain', 'Spouse', 'hdhdh', '76767688787878', 'hjhjh@gmail.com', 1, '2018-05-13 08:22:57', '2018-05-13 08:22:57'),
(12, 21, 1, 'Female', 'Breast', 'Sibling', 'dhdh', '767676767667', 'dddddddd@gmail.com', 1, '2018-05-13 08:27:40', '2018-05-13 08:27:40'),
(13, 22, 1, 'Male', 'Liver', 'Sibling', 'Dieter Decker', '+123-83-9834198', 'lelybiha@mailinator.com', 0, '2018-05-13 08:29:59', '2018-05-13 08:29:59'),
(14, 23, 1, 'Male', 'Brain', 'Child', '908uods', '0981231273', '4422@sadasdas', 1, '2018-05-13 10:01:01', '2018-05-13 10:01:01');

-- --------------------------------------------------------

--
-- Table structure for table `patient_treatment`
--

CREATE TABLE `patient_treatment` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `treatment_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `ends_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `symptoms`
--

CREATE TABLE `symptoms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `importance_level` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `symptoms`
--

INSERT INTO `symptoms` (`id`, `name`, `importance_level`, `image`, `created_at`, `updated_at`) VALUES
(8, 'test2', 444, NULL, '2018-05-11 12:01:31', '2018-05-11 12:01:31'),
(10, 'tom', 4, NULL, '2018-05-12 21:14:38', '2018-05-12 21:14:38'),
(11, 'tom', 4, NULL, '2018-05-12 21:51:21', '2018-05-12 21:51:21');

-- --------------------------------------------------------

--
-- Table structure for table `symptom_reports`
--

CREATE TABLE `symptom_reports` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `symptom_treatment`
--

CREATE TABLE `symptom_treatment` (
  `symptom_id` int(10) UNSIGNED NOT NULL,
  `treatment_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `treatments`
--

CREATE TABLE `treatments` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ends_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `treatment_medications`
--

CREATE TABLE `treatment_medications` (
  `id` int(10) UNSIGNED NOT NULL,
  `treatment_id` int(10) UNSIGNED NOT NULL,
  `medication_id` int(10) UNSIGNED NOT NULL,
  `day_part` int(11) NOT NULL,
  `ends_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `identification_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `forgot_password_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Forgot Password code use when send email',
  `forgot_password_date` datetime DEFAULT NULL COMMENT 'Forgot Password date when send email',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `identification_number`, `first_name`, `last_name`, `email`, `phone`, `password`, `role`, `forgot_password_code`, `forgot_password_date`, `remember_token`, `birth_date`, `created_at`, `updated_at`) VALUES
(1, '1234567890', 'Dr.', 'Jones', 'jones@hospital.com', '0501234567', '$2y$10$Ui9HpOMQaKcA4p1nkdw7qef.Nn214MVnUnLNfo5gqGScu6DPob2iS', '1', NULL, NULL, 'f8ujRMzyRO4h1HgfuZ7D6Wdh0Q2hoGDsyyhUoZUrJGFR8MRoqSnDWU9aqn3K', NULL, '2018-05-09 18:12:33', '2018-05-09 18:12:33'),
(2, '3243241', 'tom', 'or', 'Tomerchatsky@gmail.com', '091231212312', '$2y$10$.By5MqrLxuR2cKfvA9sgXu7ToZKv3vNTR6dNRTPDmolWSPwa8p5fi', '3', '', '2018-05-13 15:34:17', 'NYNuaHL1OoDTzmRGQhQQ8muGlhCk8Oio06LVLVBmgRMarmun42IPYu7g4xVc', NULL, '2018-05-10 08:31:33', '2018-05-13 09:34:54'),
(3, '12212', 'to', 'wqe', 'jones44@hospital.com', '0120312903', '$2y$10$Xw9ZvJq07Agt7lFU5bIXJeDRlxy/bmZSmtJYICRGaKj.ON4F8BWBu', '1', NULL, NULL, 'XUfE0Ye8Gbr0tZgGtd4Onuc8Pvh9MxivEoFAUDsGgFIOVSEfI4g4Yy2o3rI7', NULL, '2018-05-11 03:26:46', '2018-05-11 03:26:46'),
(4, '583492', 'to', 'qweqw', '22y@gmail.com', '0912312123122', '$2y$10$kM43/GjgksUtNmLydHy6BeYNwWJtFgrBjNpS1rKqN63PNJc.zMH7G', '3', NULL, NULL, NULL, NULL, '2018-05-11 12:02:54', '2018-05-11 12:02:54'),
(6, '44', 'ererw', 'werew', 'jonqwqs@hospital.com', '213123123', '$2y$10$YjrS0bB4LpRs/LU6v.s8mOGXlsKTUuOu6cQ21SgdVSRnYtDFYBdoW', '3', NULL, NULL, NULL, NULL, '2018-05-12 22:09:57', '2018-05-12 22:09:57'),
(7, '123123', 'weoiruew', 'werwe', 'Tomerchatsky@gmail.com11', '0547445575', '$2y$10$I0CAPeOKktDltQ56n87SWuZcDyIZVEzUadE4NZNP9yPkzrdi3GKNS', '3', NULL, NULL, NULL, NULL, '2018-05-12 23:09:04', '2018-05-12 23:09:04'),
(9, '123123', '12312', '12312', 'asdkljdkasl@adadssa', '213123213123', '$2y$10$5cvsql5hL4d3MpqJT/X.8uYRPqlOGC9kCauZUEwKFaK9gDARzk6Vu', '3', NULL, NULL, NULL, NULL, '2018-05-12 23:10:41', '2018-05-12 23:10:41'),
(11, '1234567', 'sasi', 'sasisla', 'weiawe0-ae@gmail.com', '123345678', '$2y$10$iEoiVQ/NG9RZgNHF3.0e6.eHnZtmeKk2kZQJACEHLIeWZaYX5ZyC6', '3', NULL, NULL, NULL, NULL, '2018-05-13 03:38:30', '2018-05-13 03:38:30'),
(18, '121113113123', 'iamkk', 'iamkk', 'shimi54@gmail.com', '547427995', '$2y$10$rAPfMH4lIYXkDg5b3264relHf.rYJu4HSRCFPTCiFuqCqyAI.7cyG', '2', NULL, NULL, NULL, NULL, '2018-05-13 04:34:37', '2018-05-13 04:34:37'),
(19, '1234567', 'yosi', 'yosi', 'sssssss@gmail.com', '0454545454', '$2y$10$uQFuDwGk1n/6iwYlbvz.kuJXeOQ.86tp3Mbja6ZhMaujkBaHgnmV.', '3', NULL, NULL, NULL, NULL, '2018-05-13 08:18:13', '2018-05-13 08:18:13'),
(20, '746476', 'dhdghg', 'ghghg', 'shshs@gmail.com', '67676677676767', '$2y$10$PwpzlV6.PSrfQDvqQxIdTOzKBn7qOaqu1z6QGBhRFp.D9tXZSk7W6', '3', NULL, NULL, NULL, NULL, '2018-05-13 08:22:57', '2018-05-13 08:22:57'),
(21, 'jhdjjdjhh12222', 'kjdkjd', 'kjddkjk', 'hdgdhdghdgdhggh@gmail.com', '876878787', '$2y$10$HC7ErLkAc8wz2CQZWqJsxu3QW1bAXxcSGXhe/iyqXSefOD0CF0fJW', '3', NULL, NULL, NULL, NULL, '2018-05-13 08:27:40', '2018-05-13 08:27:40'),
(22, '530', 'Autumn', 'Craft', 'gabekone@mailinator.com', '+665-73-2148067', '$2y$10$OTUaphxx6.RYI.h9EzRzoO3qLwpgkES64p6Z71dxE7Dajwyjo.t0S', '3', NULL, NULL, NULL, NULL, '2018-05-13 08:29:59', '2018-05-13 08:29:59'),
(23, '5834921', 'iowuqeqw', 'qweqwe', 'it@hospital.comqweqw', '0921398192', '$2y$10$MUQVs78y/eYxpDigRTszwuwtE1GmE5m5NljlcVElFSk3ygW8x02hK', '3', NULL, NULL, NULL, NULL, '2018-05-13 10:01:01', '2018-05-13 10:01:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medications`
--
ALTER TABLE `medications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `patient_data`
--
ALTER TABLE `patient_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_treatment`
--
ALTER TABLE `patient_treatment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `symptoms`
--
ALTER TABLE `symptoms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `symptom_reports`
--
ALTER TABLE `symptom_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `treatments`
--
ALTER TABLE `treatments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `treatment_medications`
--
ALTER TABLE `treatment_medications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `medications`
--
ALTER TABLE `medications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `patient_data`
--
ALTER TABLE `patient_data`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `patient_treatment`
--
ALTER TABLE `patient_treatment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `symptoms`
--
ALTER TABLE `symptoms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `symptom_reports`
--
ALTER TABLE `symptom_reports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `treatments`
--
ALTER TABLE `treatments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `treatment_medications`
--
ALTER TABLE `treatment_medications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
