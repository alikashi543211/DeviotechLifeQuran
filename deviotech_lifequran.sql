-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2021 at 07:49 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deviotech_lifequran`
--

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `response_id` int(11) DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `object` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `priorirty` enum('low','medium','high') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'medium',
  `status` enum('close','open') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_inquiries`
--

CREATE TABLE `contact_inquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive','pending','cancel','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_inquiries`
--

INSERT INTO `contact_inquiries` (`id`, `name`, `email`, `phone`, `subject`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'lkjkhk', 'hhjh@mail.com', 'hki98', 'jhjhj', 'jhjuyhjkk;', 'pending', '2021-03-24 04:44:19', '2021-03-24 04:44:19');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `time_start` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_end` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `study_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_of_students` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('trial','pending','active','rejected','paused','cancel','continue') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `rejected_reason` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tutor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `time_zone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weekly_sessions` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monthly_sessions` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`id`, `student_id`, `time_start`, `time_end`, `study_type`, `no_of_students`, `status`, `rejected_reason`, `tutor_id`, `created_at`, `updated_at`, `time_zone`, `weekly_sessions`, `monthly_sessions`, `price`, `payment_start_date`, `is_paid`) VALUES
(18, 24, '07:00', '07:30', 'nazra,tajweed', '3', 'active', NULL, 10, '2021-03-27 07:39:59', '2021-03-29 23:22:04', '-90', '2', '8', '45.22', NULL, 0),
(19, 28, '07:30', '09:30', 'nazra,hifz', '3', 'trial', NULL, 39, '2021-03-29 02:41:11', '2021-04-11 23:39:54', '0', NULL, NULL, NULL, NULL, 0),
(20, 29, '09:30', '10:30', 'nazra', '3', 'active', NULL, 25, '2021-03-31 08:19:59', '2021-04-02 05:57:13', '0', '2', '8', '567', '12', 1),
(21, 30, '08:00', '09:00', 'nazra', '3', 'rejected', 'kgfxfcgvhjk', 25, '2021-04-04 23:48:22', '2021-04-05 00:57:13', '0', NULL, NULL, NULL, NULL, 0),
(22, 30, '06:30', '07:30', 'nazra,hifz', '3', 'trial', NULL, 35, '2021-04-05 00:53:41', '2021-04-06 07:26:27', '0', NULL, NULL, NULL, NULL, 0),
(23, 30, '08:30', '09:30', 'nazra,tajweed', '2', 'trial', NULL, 27, '2021-04-05 06:29:49', '2021-04-05 07:19:34', '0', NULL, NULL, NULL, NULL, 0),
(24, 40, '06:00', '08:00', 'nazra', '4', 'active', NULL, 39, '2021-04-12 00:28:12', '2021-04-12 02:15:02', '0', '3', '12', '345', '15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `inquiry_sessions`
--

CREATE TABLE `inquiry_sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inquiry_id` bigint(20) UNSIGNED NOT NULL,
  `start_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_url` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `join_url` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `meeting_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inquiry_sessions`
--

INSERT INTO `inquiry_sessions` (`id`, `inquiry_id`, `start_time`, `start_url`, `duration`, `join_url`, `created_at`, `updated_at`, `meeting_id`) VALUES
(24, 18, NULL, 'https://zoom.us/s/93401723636?zak=eyJ6bV9za20iOiJ6bV9vMm0iLCJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJjbGllbnQiLCJ1aWQiOiIweG1lQTVBMlROQ2NIdTRRMFdHMXRnIiwiaXNzIjoid2ViIiwic3R5IjoxMDAsIndjZCI6ImF3MSIsImNsdCI6MCwic3RrIjoiM25QcWJ3TW1UYVJPb3NhYzc1Z1hvWXZMVXNmaU1OSDZOV09HOGhNOERkRS5CZ1k0YlRZclRYcDZRazlZTmpSTVYyOW1OMWt3U1hRelF6Y3dkVGhpVGtFdlJWRjRLemc1Tml0eWJVNVRSM2RKZFcxbGExUjZhVTEzUFQxQU9XSTVaalppWW1JMU1EZG1aVFZqTjJKa1ptTTNZMk5sWTJGbE1EaGxOemd4TURZMU5UQTFNR0poWW1Rek5tRmxaRFl4WVRFNU1tUTVNamszTWpObU13QWdRbEEzZEc1WFVtcGxXSFpPS3pSdlJWSXJNR1V3ZUVaR2VDdHpVV05IU1drQUEyRjNNUUFBQVhoenpqeHdBQkoxQUFBQSIsImV4cCI6MTYxNjg1Nzc5OSwiaWF0IjoxNjE2ODUwNTk5LCJhaWQiOiJZanN4UEFTbVFEUzUtYno4R1RUVXJnIiwiY2lkIjoiIn0.6WbegR9gqJoSlGVuj5THcjI_nwAIzKfJIsK_FVLwX04', NULL, 'https://zoom.us/j/93401723636?pwd=Z0ZEN2dONnI2c3U4SWhjYXhFUjlQdz09', '2021-03-27 08:10:01', '2021-03-27 08:10:01', NULL),
(38, 20, NULL, 'https://zoom.us/s/92194993222?zak=eyJ6bV9za20iOiJ6bV9vMm0iLCJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJjbGllbnQiLCJ1aWQiOiIweG1lQTVBMlROQ2NIdTRRMFdHMXRnIiwiaXNzIjoid2ViIiwic3R5IjoxMDAsIndjZCI6ImF3MSIsImNsdCI6MCwic3RrIjoibzBvd29FdDJGY2NVRWcwMjZSTWoyUVNQdjZrNW5aLW1jVGwyV0xzYjBBUS5CZ1k0YlRZclRYcDZRazlZTmpSTVYyOW1OMWt3U1hRelF6Y3dkVGhpVGtFdlJWRjRLemc1Tml0eWJVNVRSM2RKZFcxbGExUjZhVTEzUFQxQU9XSTVaalppWW1JMU1EZG1aVFZqTjJKa1ptTTNZMk5sWTJGbE1EaGxOemd4TURZMU5UQTFNR0poWW1Rek5tRmxaRFl4WVRFNU1tUTVNamszTWpObU13QWdRbEEzZEc1WFVtcGxXSFpPS3pSdlJWSXJNR1V3ZUVaR2VDdHpVV05IU1drQUEyRjNNUUFBQVhpTnM0QjNBQkoxQUFBQSIsImV4cCI6MTYxNzI5MjI1NCwiaWF0IjoxNjE3Mjg1MDU0LCJhaWQiOiJZanN4UEFTbVFEUzUtYno4R1RUVXJnIiwiY2lkIjoiIn0.3HuZ4iqPHTA_GOhnOex8NUjCwpckPnH0hyrhoK9IcdE', NULL, 'https://zoom.us/j/92194993222?pwd=V0oxY0Z0YlZKY0h4MENoNm42RUxIQT09', '2021-04-01 08:50:58', '2021-04-01 08:50:58', NULL),
(39, 21, NULL, 'https://zoom.us/s/97635278058?zak=eyJ6bV9za20iOiJ6bV9vMm0iLCJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJjbGllbnQiLCJ1aWQiOiIweG1lQTVBMlROQ2NIdTRRMFdHMXRnIiwiaXNzIjoid2ViIiwic3R5IjoxMDAsIndjZCI6ImF3MSIsImNsdCI6MCwic3RrIjoiX0JmUUV1WnZKODZ5NGVza2FQdmJVQ0luRldvN3pBRWg1czdXM3hUVTViYy5CZ1k0YlRZclRYcDZRazlZTmpSTVYyOW1OMWt3U1hRelF6Y3dkVGhpVGtFdlJWRjRLemc1Tml0eWJVNVRSM2RKZFcxbGExUjZhVTEzUFQxQU9XSTVaalppWW1JMU1EZG1aVFZqTjJKa1ptTTNZMk5sWTJGbE1EaGxOemd4TURZMU5UQTFNR0poWW1Rek5tRmxaRFl4WVRFNU1tUTVNamszTWpObU13QWdRbEEzZEc1WFVtcGxXSFpPS3pSdlJWSXJNR1V3ZUVaR2VDdHpVV05IU1drQUEyRjNNUUFBQVhpZ2hGQjRBQkoxQUFBQSIsImV4cCI6MTYxNzYwNzkyOSwiaWF0IjoxNjE3NjAwNzI5LCJhaWQiOiJZanN4UEFTbVFEUzUtYno4R1RUVXJnIiwiY2lkIjoiIn0.4bHXaBZ6RAKHbsh1KccRWQ-l2WHN95VBsm9cygI_DAs', NULL, 'https://zoom.us/j/97635278058?pwd=d1pzQnhEejZqUzY0NFNVK3hRaGtadz09', '2021-04-05 00:32:16', '2021-04-05 00:32:16', NULL),
(40, 20, NULL, 'https://zoom.us/s/99306335622?zak=eyJ6bV9za20iOiJ6bV9vMm0iLCJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJjbGllbnQiLCJ1aWQiOiIweG1lQTVBMlROQ2NIdTRRMFdHMXRnIiwiaXNzIjoid2ViIiwic3R5IjoxMDAsIndjZCI6ImF3MSIsImNsdCI6MCwic3RrIjoic3hmTUM4QTVHUzNPcHI4NV93cGgtSjhhT1o0Z3p4VnlWMWJWRWVqTmdNMC5CZ1k0YlRZclRYcDZRazlZTmpSTVYyOW1OMWt3U1hRelF6Y3dkVGhpVGtFdlJWRjRLemc1Tml0eWJVNVRSM2RKZFcxbGExUjZhVTEzUFQxQU9XSTVaalppWW1JMU1EZG1aVFZqTjJKa1ptTTNZMk5sWTJGbE1EaGxOemd4TURZMU5UQTFNR0poWW1Rek5tRmxaRFl4WVRFNU1tUTVNamszTWpObU13QWdRbEEzZEc1WFVtcGxXSFpPS3pSdlJWSXJNR1V3ZUVaR2VDdHpVV05IU1drQUEyRjNNUUFBQVhpcTdLWXhBQkoxQUFBQSIsImV4cCI6MTYxNzc4MjUzOSwiaWF0IjoxNjE3Nzc1MzM5LCJhaWQiOiJZanN4UEFTbVFEUzUtYno4R1RUVXJnIiwiY2lkIjoiIn0.MRfMY1_7sauTrGr1WFH5N0VHaS1nBVC9Haz246YKXz4', NULL, 'https://zoom.us/j/99306335622?pwd=SXordk5zOThJUzFsaHYrMlhoV0xOdz09', '2021-04-07 01:02:20', '2021-04-07 01:02:20', '99306335622'),
(41, 24, NULL, 'https://zoom.us/s/92796464968?zak=eyJ6bV9za20iOiJ6bV9vMm0iLCJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJjbGllbnQiLCJ1aWQiOiIweG1lQTVBMlROQ2NIdTRRMFdHMXRnIiwiaXNzIjoid2ViIiwic3R5IjoxMDAsIndjZCI6ImF3MSIsImNsdCI6MCwic3RrIjoickVYejQ3QktaYWI4WkpyMEQ0M211cXZwV2pNemVMZGY1LXVsVG9tN0tlZy5CZ1k0YlRZclRYcDZRazlZTmpSTVYyOW1OMWt3U1hRelF6Y3dkVGhpVGtFdlJWRjRLemc1Tml0eWJVNVRSM2RKZFcxbGExUjZhVTEzUFQxQU9XSTVaalppWW1JMU1EZG1aVFZqTjJKa1ptTTNZMk5sWTJGbE1EaGxOemd4TURZMU5UQTFNR0poWW1Rek5tRmxaRFl4WVRFNU1tUTVNamszTWpObU13QWdRbEEzZEc1WFVtcGxXSFpPS3pSdlJWSXJNR1V3ZUVaR2VDdHpVV05IU1drQUEyRjNNUUFBQVhqRTZudGpBQkoxQUFBQSIsImV4cCI6MTYxODIxODYwNCwiaWF0IjoxNjE4MjExNDA0LCJhaWQiOiJZanN4UEFTbVFEUzUtYno4R1RUVXJnIiwiY2lkIjoiIn0.EWuMEF6BhUa0T6Z4s93HUr81IO7Ss-w8wbcEULfPrpo', NULL, 'https://zoom.us/j/92796464968?pwd=S05WKzBkNTB5RUhEZEc2R3NBUDlzUT09', '2021-04-12 02:10:11', '2021-04-12 02:10:11', '92796464968');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_03_11_050805_create_settings_table', 1),
(5, '2021_03_12_112500_create_permission_tables', 1),
(6, '2021_03_15_053743_alter_users_for_add_new_column_', 1),
(7, '2021_03_16_051259_add_columns_to_users', 2),
(10, '2021_03_18_091239_create_inquiries_table', 4),
(11, '2021_03_24_093354_create_contact_inquiries_table', 5),
(13, '2021_03_16_062327_create_profiles_table', 6),
(14, '2021_03_24_134413_add_columns_to_profiles', 6),
(16, '2021_03_25_051336_create_schedules_table', 7),
(17, '2021_03_25_061614_create_inquiry_sessions_table', 8),
(18, '2021_03_25_090416_add_status_to_inquiries', 9),
(19, '2021_03_26_043201_add_time_zone_column_to_inquiries', 9),
(20, '2021_03_27_074033_create_inquiry_plans_table', 10),
(21, '2021_03_27_075646_add_day_column_to_schedules', 10),
(22, '2021_03_27_101416_add_column_to_inquiries_for_plan', 11),
(23, '2021_03_27_132333_add_column_to_profiles', 12),
(26, '2021_04_01_060820_add_payment_columnto_inquiries', 15),
(27, '2021_04_01_072736_create_payments_table', 16),
(28, '2021_04_05_053609_add_column_to_profile_detail', 17),
(31, '2021_04_05_054550_add_column_to_users_slug', 18),
(32, '2021_04_05_085608_create_testimonials_table', 19),
(33, '2021_04_05_132808_add_colum_to_inquiry_sessions', 20),
(34, '2021_04_09_131136_create_chats_table', 21),
(35, '2021_04_11_200612_add_response_id_to_chats', 21);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 41);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('majeed@mail.com', '$2y$10$ix.Rxi7uT06hFCZORWDWm.DUjq4NcH6Evgjvc8o23vhbIUTE6AoAS', '2021-03-19 01:35:29');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inquiry_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receipt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','confirmed','due') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'due',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `inquiry_id`, `student_id`, `date_from`, `date_to`, `amount`, `receipt`, `pay_date`, `status`, `created_at`, `updated_at`) VALUES
(6, 20, 29, '12/05/2021', '11/06/2021', '567', 'receipts/hifz.jpg', '04/14/2021', 'confirmed', '2021-04-01 09:00:33', '2021-04-02 05:57:13'),
(7, 20, 29, '12/06/2021', '11/07/2021', '567', NULL, NULL, 'due', '2021-04-02 05:57:14', '2021-04-02 05:57:14'),
(8, 24, 40, '15/04/2021', '14/05/2021', '345', NULL, NULL, 'due', '2021-04-12 02:15:02', '2021-04-12 02:15:02');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'browse_admin', 'web', '2021-03-15 07:33:10', '2021-03-15 07:33:10'),
(2, 'browse_users', 'web', '2021-03-15 07:56:30', '2021-03-15 07:56:30'),
(3, 'browse_roles', 'web', '2021-03-15 07:56:30', '2021-03-15 07:56:30'),
(4, 'browse_teams', 'web', '2021-03-15 07:56:31', '2021-03-15 07:56:31');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iban_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zoom_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `salary`, `created_at`, `updated_at`, `bank_name`, `bank_address`, `iban_no`, `branch_code`, `account_no`, `account_title`, `video_id`, `video_image`, `zoom_token`, `detail`, `course`) VALUES
(1, 10, '35000', '2021-03-08 19:00:00', '2021-03-24 23:02:29', 'Meezan Bank pvt.ltd', 'Lahore', 'PAK008', '6890', '00887654579', 'Ali Raza', NULL, NULL, NULL, NULL, NULL),
(2, 25, '50000', '2021-03-27 08:39:49', '2021-03-27 08:39:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 27, '50000', '2021-03-27 08:45:38', '2021-03-27 08:45:38', NULL, NULL, NULL, NULL, NULL, NULL, 'P5CpgtN0fTs', 'uploads/video_image/1616852738.jpg', NULL, NULL, NULL),
(4, 31, '50000', '2021-04-05 00:38:02', '2021-04-05 00:38:02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>jhlkjjjh</p><p>kjhjlgj</p><p>kjjgkjjg</p><p>likhhuoguh&nbsp;</p><p>\'i hdgofsahfas</p><ul><li>kjhljkg</li><li>lkjhkjgljnuyoug&nbsp;</li></ul><blockquote><ul><li>lkj;lo;\'k;l</li><li>lihkh lkhk;</li><li>&nbsp;</li></ul></blockquote>', 'hifz,tajweed'),
(5, 33, '50000', '2021-04-05 00:51:31', '2021-04-05 00:51:31', NULL, NULL, NULL, NULL, NULL, NULL, 'P5CpgtN0fTs', 'uploads/video_image/1617601891.png', NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><ul><li>Lorem ipsum dolor sit amet,</li><li>consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li><li>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</li><li>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</li></ul><blockquote><ul><li>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li><li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li><li>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</li><li>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</li><li>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li></ul></blockquote>', 'tajweed'),
(6, 34, '500000', '2021-04-05 01:11:00', '2021-04-05 01:11:00', NULL, NULL, NULL, NULL, NULL, NULL, 'P5CpgtN0fTs', 'uploads/video_image/1617603060.jpg', NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'hifz'),
(7, 35, '50000', '2021-04-05 01:14:32', '2021-04-05 08:09:03', 'MCB', 'Lahore', NULL, 'Ahmad raza', '565454767', 'Ahmad raza', 'P5CpgtN0fTs', 'uploads/video_image/1617603272.jpg', NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><blockquote><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.&nbsp;</p><p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p></blockquote><ul><li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</li><li>tempor incididunt ut labore et dolore magna aliqua.</li><li>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</li><li>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</li><li>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li></ul>', 'hifz'),
(8, 36, '49920', '2021-04-06 04:51:09', '2021-04-06 04:51:09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><blockquote><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.&nbsp;</p><p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p></blockquote><ul><li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</li><li>tempor incididunt ut labore et dolore magna aliqua.</li><li>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</li><li>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</li><li>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li></ul>', 'hifz'),
(9, 37, '50000', '2021-04-06 04:52:06', '2021-04-06 04:52:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><blockquote><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.&nbsp;</p><p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p></blockquote><ul><li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</li><li>tempor incididunt ut labore et dolore magna aliqua.</li><li>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</li><li>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</li><li>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li></ul>', 'tajweed'),
(10, 38, '80000', '2021-04-06 04:52:51', '2021-04-06 04:52:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><blockquote><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.&nbsp;</p><p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p></blockquote><ul><li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</li><li>tempor incididunt ut labore et dolore magna aliqua.</li><li>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</li><li>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</li><li>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li></ul>', 'nazra');
INSERT INTO `profiles` (`id`, `user_id`, `salary`, `created_at`, `updated_at`, `bank_name`, `bank_address`, `iban_no`, `branch_code`, `account_no`, `account_title`, `video_id`, `video_image`, `zoom_token`, `detail`, `course`) VALUES
(11, 39, '60000', '2021-04-06 06:15:19', '2021-04-12 02:56:44', 'Bank of Punjab ltd', 'lahore', NULL, 'Majid Muneer', '7657657647574', 'Majid Muneer', NULL, NULL, NULL, '<p><img src=\"data:image/jpeg;base64,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\" data-filename=\"best_tutor.jpg\" style=\"width: 665.99px;\"></p><p style=\"text-align: justify; \"><b><span style=\"font-family: &quot;Comic Sans MS&quot;;\">Lorem ipsum dolor sit amet,</span></b> consectetur adipiscing elit, sed do eiusmod tempor incididunt <font color=\"#000000\" style=\"background-color: rgb(255, 255, 0);\">ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat </font>cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><blockquote><p style=\"text-align: justify; \">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.&nbsp;</p><p style=\"text-align: justify;\">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p></blockquote><ul><li style=\"text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</li><li style=\"text-align: justify;\">tempor incididunt ut labore et dolore magna aliqua.</li><li style=\"text-align: justify;\">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</li><li style=\"text-align: justify;\">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</li><li style=\"text-align: justify;\">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li></ul>', 'hifz');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2021-03-15 07:33:10', '2021-03-15 07:33:10'),
(2, 'Kashif', 'web', '2021-04-12 07:50:04', '2021-04-12 07:50:04'),
(3, 'Test', 'web', '2021-04-12 07:51:00', '2021-04-12 07:51:00'),
(4, 'Aaao G', 'web', '2021-04-12 07:51:10', '2021-04-12 07:51:10'),
(5, 'Editor', 'web', '2021-04-12 08:01:29', '2021-04-12 08:01:29');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(4, 1),
(4, 2),
(4, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inquiry_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('trial_class','live_class') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'trial_class',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_done` tinyint(1) NOT NULL DEFAULT 0,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `inquiry_id`, `student_id`, `date`, `time`, `status`, `created_at`, `updated_at`, `is_done`, `day`) VALUES
(24, 18, 24, '03/27/2021', '08:00', 'trial_class', '2021-03-27 07:57:01', '2021-03-27 08:10:01', 1, NULL),
(27, 18, 24, NULL, '07:00', 'live_class', '2021-03-29 01:19:46', '2021-03-29 01:19:46', 0, '4'),
(28, 18, 24, NULL, '16:00', 'live_class', '2021-03-29 01:19:46', '2021-03-29 01:19:46', 0, '5'),
(66, 20, 29, '04/01/2021', '05:30', 'trial_class', '2021-04-01 08:49:54', '2021-04-01 08:51:08', 1, NULL),
(67, 20, 29, NULL, '09:30', 'live_class', '2021-04-01 08:53:58', '2021-04-01 08:53:58', 0, '2'),
(68, 20, 29, NULL, '09:30', 'live_class', '2021-04-01 08:53:58', '2021-04-01 08:53:58', 0, '3'),
(69, 21, 30, '04/05/2021', '09:00', 'trial_class', '2021-04-05 00:31:27', '2021-04-05 00:32:25', 1, NULL),
(70, 23, 30, '04/05/2021', '06:00', 'trial_class', '2021-04-05 07:19:35', '2021-04-05 07:19:35', 0, NULL),
(71, 22, 30, '06/04/2021', '06:30', 'trial_class', '2021-04-06 07:26:27', '2021-04-06 07:26:27', 0, NULL),
(72, 19, 28, '04/14/2021', '08:30', 'trial_class', '2021-04-11 23:39:54', '2021-04-11 23:39:54', 0, NULL),
(74, 24, 40, '04/12/2021', '9:00', 'trial_class', '2021-04-12 01:30:34', '2021-04-12 02:10:12', 1, NULL),
(75, 24, 40, NULL, '06:00', 'live_class', '2021-04-12 02:15:02', '2021-04-12 02:15:02', 0, '3'),
(76, 24, 40, NULL, '06:00', 'live_class', '2021-04-12 02:15:02', '2021-04-12 02:15:02', 0, '5'),
(77, 24, 40, NULL, '06:00', 'live_class', '2021-04-12 02:15:02', '2021-04-12 02:15:02', 0, '6');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'banner_heading', 'LifeQuran a Place for Quran Learning', '2021-03-15 00:01:31', '2021-03-15 00:01:31'),
(2, 'banner_description', 'Learn Quran Live with the talented and best scholars round the globe', '2021-03-15 00:01:31', '2021-03-15 00:01:31'),
(3, 'favicon', 'uploads/cms/best_tutor.jpg', '2021-03-15 00:01:31', '2021-04-02 08:14:36'),
(4, 'logo', 'uploads/cms/LifeQuran.png', '2021-03-15 00:01:44', '2021-04-05 04:48:56'),
(5, 'footer_description', 'LifeQuran a Place for Quran Learning where the world\'s best scholars are availabe', '2021-03-24 05:01:02', '2021-03-24 05:01:02'),
(6, 'phone', '+923217404880', '2021-03-24 05:01:02', '2021-03-24 05:01:02'),
(7, 'email', 'info@deviotech.com', '2021-03-24 05:01:02', '2021-03-24 05:01:02'),
(8, 'fax', '+332244555', '2021-03-24 05:01:02', '2021-03-24 05:01:02'),
(9, 'address', 'deviotech address', '2021-03-24 05:01:02', '2021-03-24 05:01:02'),
(10, 'copyright', 'deviotech', '2021-03-24 05:01:02', '2021-03-24 05:01:02'),
(11, 'who_we_are', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '2021-03-24 05:20:19', '2021-03-26 01:17:39'),
(12, 'our_story_video_id', 'r_DN7Ky_CUg', '2021-03-24 05:20:19', '2021-03-24 05:20:19'),
(13, 'our_story', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '2021-03-24 05:20:19', '2021-03-26 01:17:39'),
(14, 'who_we_are_image', 'uploads/cms/960x0.jpg', '2021-03-24 05:20:19', '2021-03-24 05:20:20'),
(15, 'our_story_image', 'uploads/cms/Sky.jpg', '2021-03-24 05:20:20', '2021-03-24 05:20:20'),
(16, 'logo_footer', 'uploads/cms/lif quran.png', '2021-03-26 02:39:15', '2021-04-05 04:44:56'),
(17, 'home_banner', 'uploads/cms/caligraphy 2.png', '2021-04-02 08:12:15', '2021-04-07 00:28:42'),
(18, 'img_nazra', 'uploads/cms/best_tutor.jpg', '2021-04-02 08:30:27', '2021-04-02 08:30:28'),
(19, 'img_hifz', 'uploads/cms/hifz.jpg', '2021-04-02 08:30:28', '2021-04-02 08:30:28'),
(20, 'img_tajweed', 'uploads/cms/login.jpg', '2021-04-02 08:30:28', '2021-04-02 08:30:28'),
(21, 'slider_background', 'uploads/cms/bg05.jpg', '2021-04-02 08:30:56', '2021-04-06 01:15:38'),
(22, 'home_title', 'home', '2021-04-05 04:27:41', '2021-04-05 04:27:41'),
(23, 'home_meta_tag', 'home,text,title', '2021-04-05 04:27:41', '2021-04-12 07:57:29'),
(24, 'home_meta_description', 'Here we have the description', '2021-04-05 04:27:41', '2021-04-05 04:27:41'),
(25, 'about_title', 'About', '2021-04-05 04:34:50', '2021-04-05 04:34:50'),
(26, 'about_meta_tag', 'about,title', '2021-04-05 04:34:50', '2021-04-05 04:34:50'),
(27, 'about_meta_description', 'kjjjhg yfytf', '2021-04-05 04:34:50', '2021-04-05 04:34:50'),
(28, 'contact_title', 'Contact', '2021-04-05 04:34:50', '2021-04-05 04:34:50'),
(29, 'contact_meta_tag', 'contact,tag', '2021-04-05 04:34:51', '2021-04-05 04:34:51'),
(30, 'contact_meta_description', 'kjh k contact us', '2021-04-05 04:34:51', '2021-04-05 04:34:51'),
(31, 'tutor_title', 'Tutor List', '2021-04-05 04:34:51', '2021-04-05 04:34:51'),
(32, 'tutor_meta_tag', 'tutor list,tag', '2021-04-05 04:34:51', '2021-04-05 04:34:51'),
(33, 'tutor_meta_description', 'Tutors list page', '2021-04-05 04:34:51', '2021-04-05 04:34:51'),
(34, 'tutor_detail_title', 'Tutor Detail', '2021-04-05 04:34:51', '2021-04-05 04:34:51'),
(35, 'tutor_detail_meta_tag', 'Tutor Detail,tag', '2021-04-05 04:34:51', '2021-04-05 04:34:51'),
(36, 'tutor_detail_meta_description', 'Tutor Detail page content description', '2021-04-05 04:34:51', '2021-04-05 04:34:51'),
(37, 'facebook', 'https://www.google.com/', '2021-04-05 04:46:19', '2021-04-05 04:46:19');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `rating`, `review`, `date`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Ali Raza', '3.5', 'This is awsome platform for Online Quran Learning', '04/05/2020', 'uploads/testimonials/1617619692.jpg', 0, '2021-04-05 05:48:12', '2021-04-05 05:48:12'),
(3, 'Taimoor', '5', 'Here are the worls\'d best tutors for teaching', '04/05/2021', 'uploads/testimonials/1617619782.jpg', 0, '2021-04-05 05:49:42', '2021-04-05 05:49:42'),
(4, 'Muhammad Khalid', '4', 'Here we are testing for the testimonial and this slider is best and perfect for the testimonial,', '05/12/2021', 'uploads/testimonials/1617704359.jpg', 1, '2021-04-06 05:19:19', '2021-04-06 05:19:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','student','tutor') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'student',
  `auth_provider` enum('site','google','facebook','twitter') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'site',
  `status` enum('active','inactive','pending','reject') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `block_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_home_show` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `avatar`, `remember_token`, `created_at`, `updated_at`, `phone`, `role`, `auth_provider`, `status`, `block_reason`, `slug`, `is_home_show`) VALUES
(1, 'Admin update', 'admin@lifequran.com', '2020-08-07 12:00:00', '$2y$10$b9zWxtvWzQYjBioZiGQ8MuSl4X0ZB77.1M.9/wR.W5Us2W45YVVVW', 'uploads/users/1615813729.jpg', NULL, '2021-03-15 07:33:09', '2021-03-15 08:08:49', NULL, 'admin', 'site', 'active', NULL, NULL, 0),
(10, 'Raza Tutor', 'raza@mail.com', NULL, '$2y$10$WXtPpFtdCxKW1YyCtKaDuOh5/A30.F05io29OXIeiNu79pCEdgmpO', 'uploads/users/1616592075.jpg', NULL, '2021-03-16 05:58:28', '2021-03-24 08:21:15', '7876', 'tutor', 'site', 'active', NULL, NULL, 0),
(24, 'Ali Raza', 'ali@mail.com', NULL, '$2y$10$WXtPpFtdCxKW1YyCtKaDuOh5/A30.F05io29OXIeiNu79pCEdgmpO', 'uploads/users/default.png', NULL, '2021-03-27 07:39:52', '2021-03-27 07:39:52', '687689', 'student', 'site', 'active', NULL, NULL, 0),
(25, 'Devio Tech', 'deviotech@mail.com', NULL, '$2y$10$7cMz1n1xRbI06I0CYVS2sOgZyXgFUwLlAnpIG1pU4CmuQm1kD6Y9.', 'uploads/users/default.png', NULL, '2021-03-27 08:39:49', '2021-03-27 08:39:49', NULL, 'tutor', 'site', 'active', NULL, NULL, 0),
(27, 'Saib', 'saib@mail.com', NULL, '$2y$10$b9zWxtvWzQYjBioZiGQ8MuSl4X0ZB77.1M.9/wR.W5Us2W45YVVVW', 'uploads/users/default.png', NULL, '2021-03-27 08:45:38', '2021-03-27 08:45:38', NULL, 'tutor', 'site', 'active', NULL, NULL, 0),
(28, 'Shehran Ahmad', 'shehran@mail.com', NULL, '$2y$10$b9zWxtvWzQYjBioZiGQ8MuSl4X0ZB77.1M.9/wR.W5Us2W45YVVVW', 'uploads/users/default.png', NULL, '2021-03-29 02:41:00', '2021-03-29 02:41:00', '03217404880', 'student', 'site', 'active', NULL, NULL, 0),
(29, 'New Inquiry', 'new@mail.com', NULL, '$2y$10$b9zWxtvWzQYjBioZiGQ8MuSl4X0ZB77.1M.9/wR.W5Us2W45YVVVW', 'uploads/users/1617257883.jpg', NULL, '2021-03-31 08:19:47', '2021-04-01 01:18:04', '87647', 'student', 'site', 'active', NULL, NULL, 0),
(30, 'Shehzad Ahmad', 'shehzad@mail.com', NULL, '$2y$10$b9zWxtvWzQYjBioZiGQ8MuSl4X0ZB77.1M.9/wR.W5Us2W45YVVVW', 'uploads/users/1617622578.jpg', NULL, '2021-04-04 23:48:13', '2021-04-05 06:36:18', '98786785', 'student', 'site', 'active', NULL, NULL, 0),
(31, 'Fareeda', 'fareeda@mail.com', NULL, '$2y$10$yX1CJvodp57kWrb8kiTu3u4EEhNA.BrNSbNUfxHx6s.KbxlA/iaxm', 'uploads/users/default.png', NULL, '2021-04-05 00:38:02', '2021-04-05 00:38:02', NULL, 'tutor', 'site', 'active', NULL, NULL, 0),
(33, 'Shehran Ahmad', 'Shehran.mail@mail.com', NULL, '$2y$10$b9zWxtvWzQYjBioZiGQ8MuSl4X0ZB77.1M.9/wR.W5Us2W45YVVVW', 'uploads/users/default.png', NULL, '2021-04-05 00:51:30', '2021-04-05 00:51:30', NULL, 'tutor', 'site', 'active', NULL, NULL, 0),
(34, 'Qari Amjad', 'amjad@mail.com', NULL, '$2y$10$cO3GZSXkDcBu.cuctDbU4utGc908nl4/ylHxST5GgkoldE6osmh7a', 'uploads/users/1617603060.jpg', NULL, '2021-04-05 01:11:00', '2021-04-05 01:11:00', NULL, 'tutor', 'site', 'active', NULL, NULL, 0),
(35, 'Ahmad Raza', 'ahmad@mail.com', NULL, '$2y$10$b9zWxtvWzQYjBioZiGQ8MuSl4X0ZB77.1M.9/wR.W5Us2W45YVVVW', 'uploads/users/1617603271.jpg', NULL, '2021-04-05 01:14:32', '2021-04-05 08:09:03', NULL, 'tutor', 'site', 'active', NULL, 'ahmad-raza-35-5684', 1),
(36, 'Molana Jameel', 'jameel@mail.com', NULL, '$2y$10$0OJzwezm1FDuArg2lhaP/uqAgI9JcLCt2rFBOqNpmjwBsb2GTiO86', 'uploads/users/1617702669.jpg', NULL, '2021-04-06 04:51:09', '2021-04-06 04:51:09', NULL, 'tutor', 'site', 'active', NULL, 'molana-jameel-36-5684', 1),
(37, 'Ahmad Raza', 'ahmadraza@mail.com', NULL, '$2y$10$wKhGXnEwgKmoj9Oggm45XecXt149tXq/fzOS4obAWWVBxROnfxB1S', 'uploads/users/1617702725.jpg', NULL, '2021-04-06 04:52:05', '2021-04-06 04:52:06', NULL, 'tutor', 'site', 'active', NULL, 'ahmad-raza-37-5684', 1),
(38, 'Molana tariq', 'molanatariq@mail.com', NULL, '$2y$10$OJB21tvhmRyed.XvvZDkT.fs4bSnzIm4HJJJpYaxkKNX8vqBjjkmS', 'uploads/users/1617702771.jpg', NULL, '2021-04-06 04:52:51', '2021-04-06 04:52:51', NULL, 'tutor', 'site', 'active', NULL, 'molana-tariq-38-5684', 1),
(39, 'Majid Muneer', 'majid@ali.com', NULL, '$2y$10$b9zWxtvWzQYjBioZiGQ8MuSl4X0ZB77.1M.9/wR.W5Us2W45YVVVW', 'uploads/users/1618201502.jpg', NULL, '2021-04-06 06:15:18', '2021-04-12 02:56:44', '8979675', 'tutor', 'site', 'active', NULL, 'majid-muneer-39-5684', 1),
(40, 'Test Support', 'testsupport@mail.com', NULL, '$2y$10$Cto8fvO2Bl9Fjnif5RSthuRawrESkSw2Zm8nSm4SUF4iLagQF3gKe', 'uploads/users/default.png', NULL, '2021-04-12 00:28:05', '2021-04-12 00:28:05', '76585', 'student', 'site', 'active', NULL, NULL, 0),
(41, 'Test', 'test@test.com', NULL, '$2y$10$brhNOhOKtMYMig2ZI3Q7/.22Cnx7sBaMJ4W.mhJ1m54qbq07UrV2W', NULL, NULL, '2021-04-12 07:59:33', '2021-04-12 07:59:33', NULL, 'admin', 'site', 'active', NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chats_student_id_foreign` (`student_id`);

--
-- Indexes for table `contact_inquiries`
--
ALTER TABLE `contact_inquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inquiries_student_id_foreign` (`student_id`);

--
-- Indexes for table `inquiry_sessions`
--
ALTER TABLE `inquiry_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inquiry_sessions_inquiry_id_foreign` (`inquiry_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_inquiry_id_foreign` (`inquiry_id`),
  ADD KEY `payments_student_id_foreign` (`student_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedules_inquiry_id_foreign` (`inquiry_id`),
  ADD KEY `schedules_student_id_foreign` (`student_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
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
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_inquiries`
--
ALTER TABLE `contact_inquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `inquiry_sessions`
--
ALTER TABLE `inquiry_sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `chats_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD CONSTRAINT `inquiries_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `inquiry_sessions`
--
ALTER TABLE `inquiry_sessions`
  ADD CONSTRAINT `inquiry_sessions_inquiry_id_foreign` FOREIGN KEY (`inquiry_id`) REFERENCES `inquiries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_inquiry_id_foreign` FOREIGN KEY (`inquiry_id`) REFERENCES `inquiries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_inquiry_id_foreign` FOREIGN KEY (`inquiry_id`) REFERENCES `inquiries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `schedules_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
