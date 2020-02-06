-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2020 at 01:06 PM
-- Server version: 10.2.30-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u606691039_tour_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `company`, `created_at`, `updated_at`) VALUES
(1, 'laxyo', '2020-01-15 09:59:09', '2020-01-15 09:59:09');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department`, `created_at`, `updated_at`) VALUES
(1, 'IT', '2020-01-15 09:59:17', '2020-01-15 09:59:17');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `designation`, `created_at`, `updated_at`) VALUES
(1, 'manager', '2020-01-15 09:59:24', '2020-01-15 09:59:24');

-- --------------------------------------------------------

--
-- Table structure for table `emp_masts`
--

CREATE TABLE `emp_masts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `emp_code` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comp_id` int(10) UNSIGNED DEFAULT NULL,
  `dept_id` int(10) UNSIGNED DEFAULT NULL,
  `desg_id` int(10) UNSIGNED DEFAULT NULL,
  `grade_id` int(10) UNSIGNED DEFAULT NULL,
  `emp_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_img` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'emp_default_image.png',
  `emp_gender` enum('M','F','O') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emp_dob` date DEFAULT NULL,
  `curr_addr` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `perm_addr` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_grp` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_contact` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driv_lic` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aadhar_no` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `voter_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pan_no` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emp_type` int(10) UNSIGNED DEFAULT NULL,
  `emp_status` int(10) UNSIGNED DEFAULT NULL,
  `old_uan` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `curr_uan` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `old_pf` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `curr_pf` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `old_esi` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `curr_esi` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `join_dt` date DEFAULT NULL,
  `leave_dt` date DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `leave_allotted` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emp_masts`
--

INSERT INTO `emp_masts` (`id`, `user_id`, `parent_id`, `emp_code`, `comp_id`, `dept_id`, `desg_id`, `grade_id`, `emp_name`, `emp_img`, `emp_gender`, `emp_dob`, `curr_addr`, `perm_addr`, `blood_grp`, `contact`, `alt_contact`, `email`, `password`, `alt_email`, `driv_lic`, `aadhar_no`, `voter_id`, `pan_no`, `emp_type`, `emp_status`, `old_uan`, `curr_uan`, `old_pf`, `curr_pf`, `old_esi`, `curr_esi`, `join_dt`, `leave_dt`, `active`, `leave_allotted`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, NULL, NULL, 1, 1, 1, 1, 'Kishan', 'emp_default_image.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kishan@laxyo.org', '12345678', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-01-15 09:59:58', '2020-01-23 12:54:13', NULL),
(2, 3, NULL, NULL, 1, 1, 1, 1, 'test', 'emp_default_image.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test@gmail.com', '12345678', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-01-25 04:55:38', '2020-01-25 04:58:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `entitle_classes`
--

CREATE TABLE `entitle_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `entitleclass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `grade`, `created_at`, `updated_at`) VALUES
(1, 'grade A', '2020-01-15 09:59:33', '2020-01-15 09:59:33');

-- --------------------------------------------------------

--
-- Table structure for table `local_ta_bill_amounts`
--

CREATE TABLE `local_ta_bill_amounts` (
  `ids` int(11) NOT NULL,
  `last_id` int(11) DEFAULT NULL,
  `local_tour_dt` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mode_of_con_used` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_dt` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_dt` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `con_approx_km` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `con_amount` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_amount_pr_km` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `local_ta_bill_amounts`
--

INSERT INTO `local_ta_bill_amounts` (`ids`, `last_id`, `local_tour_dt`, `mode_of_con_used`, `from_dt`, `to_dt`, `con_approx_km`, `con_amount`, `total_amount_pr_km`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-02-18', 'test', '2020-02-18', '2020-02-19', '4', '4', '16', '2020-02-04 09:27:29', '2020-02-04 09:27:29'),
(2, 1, '2020-02-18', 'test', '2020-02-18', '2020-02-18', '5', '5', '25', '2020-02-04 09:27:29', '2020-02-04 09:27:29');

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
(3, '2020_01_04_052355_create_tour_requests_table', 1),
(4, '2020_01_04_060258_create_grades_table', 1),
(5, '2020_01_07_084936_create_departments_table', 1),
(6, '2020_01_08_052509_create_entitle_classes_table', 1),
(7, '2020_01_08_062420_create_designations_table', 1),
(8, '2020_01_08_083433_create_emp_masts_table', 1),
(9, '2020_01_08_105244_create_companies_table', 1),
(10, '2020_01_10_093048_create_permission_tables', 1);

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
(1, 'App\\User', 6),
(1, 'App\\User', 18),
(2, 'App\\User', 1),
(2, 'App\\User', 2),
(2, 'App\\User', 3),
(2, 'App\\User', 5),
(2, 'App\\User', 6),
(2, 'App\\User', 7),
(2, 'App\\User', 8),
(2, 'App\\User', 10),
(2, 'App\\User', 15),
(3, 'App\\User', 6),
(3, 'App\\User', 17),
(4, 'App\\User', 16);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'add', 'web', '2020-01-15 09:56:14', '2020-01-23 12:54:57'),
(4, 'edit', 'web', '2020-01-23 12:51:47', '2020-01-23 12:55:09'),
(5, 'view', 'web', '2020-01-23 12:55:21', '2020-01-23 12:55:21'),
(6, 'delete', 'web', '2020-01-23 12:55:28', '2020-01-23 12:55:28'),
(7, 'approve', 'web', '2020-01-23 12:55:39', '2020-01-23 12:55:39'),
(8, 'decline', 'web', '2020-01-23 12:55:54', '2020-01-23 12:55:54');

-- --------------------------------------------------------

--
-- Table structure for table `purpose_of_journy_details`
--

CREATE TABLE `purpose_of_journy_details` (
  `id` int(11) NOT NULL,
  `last_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purpose_of_journy` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departure_dt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departure_tm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departure_station` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arrival_dt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arrival_tm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arrival_station` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fare_rs` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ticket_no` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purpose_of_journy_details`
--

INSERT INTO `purpose_of_journy_details` (`id`, `last_id`, `purpose_of_journy`, `departure_dt`, `departure_tm`, `departure_station`, `arrival_dt`, `arrival_tm`, `arrival_station`, `class_by`, `fare_rs`, `ticket_no`, `remark`, `created_at`, `updated_at`) VALUES
(1, '1', 'test', '2020-02-17', '02:53', 'indore', '2020-02-11', '02:53', 'pune', 'A', '22', '22124', 'dfgdfgdf', '2020-02-04 09:27:29', '2020-02-04 09:27:29'),
(2, '1', 'test', '2020-02-17', '02:53', 'indore', '2020-02-11', '02:53', 'pune', 'B', '11', '4234234', 'test', '2020-02-04 09:27:29', '2020-02-04 09:27:29');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'level_1', 'web', 'Level 1', '2020-01-23 04:54:45', '2020-01-23 04:54:45'),
(2, 'level_2', 'web', 'Level 2', '2020-01-23 04:55:00', '2020-01-23 04:55:00'),
(3, 'manager', 'web', 'Manager', '2020-01-23 04:55:13', '2020-01-23 04:55:13'),
(4, 'users', 'web', 'Users', NULL, NULL);

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
(4, 1),
(5, 1),
(5, 2),
(6, 1),
(7, 1),
(8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tour_amount_bills`
--

CREATE TABLE `tour_amount_bills` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ta_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT current_timestamp(),
  `time_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT current_timestamp(),
  `grd` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tour_from` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tour_to` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_fare_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_fare_amount` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `daily_allowance_day` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `daily_allowance_amonut` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metropolitan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metropolitan_amonut` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `daily_allownce_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `daily_allownce_amount` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_localities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_localities_amount` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `conveyance_chages_detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `conveyance_chages_amount` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_charge_detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_charge_amount` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `less_advance_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `less_advance_amount` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due_blance_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due_amount` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level1_status` int(11) DEFAULT 0,
  `level2_status` int(11) DEFAULT 0,
  `manager_status` int(11) DEFAULT 0,
  `bills` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tour_amount_bills`
--

INSERT INTO `tour_amount_bills` (`id`, `user_id`, `ta_no`, `bill_no`, `time_from`, `time_to`, `grd`, `designation`, `tour_from`, `tour_to`, `total_fare_details`, `total_fare_amount`, `daily_allowance_day`, `daily_allowance_amonut`, `metropolitan`, `metropolitan_amonut`, `daily_allownce_details`, `daily_allownce_amount`, `other_localities`, `other_localities_amount`, `conveyance_chages_detail`, `conveyance_chages_amount`, `other_charge_detail`, `other_charge_amount`, `less_advance_time`, `less_advance_amount`, `due_blance_time`, `due_amount`, `level1_status`, `level2_status`, `manager_status`, `bills`, `request`, `status`, `created_at`, `updated_at`) VALUES
(1, 16, '2342', '342343', '2020-02-19', '2020-02-25', 'grade A', 'manager', 'indore', 'Bjopal', 'test', '33', 'test', '1', '1', '1', '1', '1', 'test1', '1', 'test3', '1', NULL, '1', 'test', '33', 'test', '333', 1, 1, 1, '[\"cms-solutions.png\",\"Customize ERP solution.png\"]', 'testing 2', 0, '2020-02-04 09:27:29', '2020-02-04 14:06:22');

-- --------------------------------------------------------

--
-- Table structure for table `tour_request`
--

CREATE TABLE `tour_request` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `emp_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tour_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tour_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_from` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_to` timestamp NOT NULL DEFAULT current_timestamp(),
  `purpuse_of_tour` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mode_of_travel` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entitlement` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `proposed_class` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `justification` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `level1_status` int(11) NOT NULL DEFAULT 0,
  `level2_status` int(11) NOT NULL DEFAULT 0,
  `manager_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `request` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tour_request`
--

INSERT INTO `tour_request` (`id`, `user_id`, `emp_name`, `grd`, `designation`, `department`, `tour_from`, `tour_to`, `time_from`, `time_to`, `purpuse_of_tour`, `mode_of_travel`, `entitlement`, `proposed_class`, `justification`, `level1_status`, `level2_status`, `manager_status`, `created_at`, `updated_at`, `deleted_at`, `request`) VALUES
(1, 16, 'test', 'grade A', 'manager', 'IT', 'indore', 'guna', '2020-02-04 11:38:05', '2020-01-29 00:00:00', 'test', NULL, 'test', 'test', 'test', 1, 1, 1, '2020-01-28 07:18:05', '2020-01-28 08:48:06', '2020-01-28 07:18:05', 'test'),
(2, 16, 'Test', 'grade A', 'manager', 'IT', 'Indore', 'Guna', '2020-02-04 11:38:10', '2020-01-31 00:00:00', 'Hdhd', NULL, 'Dhdh', 'Hdhd', 'Hdhdh', 1, 1, 1, '2020-01-29 03:25:36', '2020-01-29 03:30:59', '2020-01-29 03:25:36', 'test2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', 1, NULL, '$2y$10$mnA3.IzXgr7TM0AxVmlFI.CnFhMHRWbpzDNJ3gd8AVw74i6UqYi4S', 'Apba1kdFLFprSy8yQxFcjLURICD6m7NqNhGzYa3TfEqpF9wLTpdnUcbAEKXJ', '2020-01-23 04:52:12', '2020-01-27 06:00:13'),
(16, 'Ojasvi', 'ojasvi@laxyo.in', 1, NULL, '$2y$10$5R7e3GyRa.oPj6ZS0FSh0ONr/RbqZ0RQ/q/yFG5p4XdnhpYXDCUES', NULL, '2020-01-25 05:49:47', '2020-01-27 06:00:30'),
(17, 'Manager', 'manager@laxyo.in', 1, NULL, '$2y$10$8IcjqfK09GT6b8EzE0fhK.2ZM5o9F8tD6VmszOY1Df1R70zANPgTW', NULL, '2020-01-27 07:13:06', '2020-01-27 07:13:06'),
(18, 'Hitesh', 'hitesh@laxyo.in', 1, NULL, '$2y$10$dWAb.BvNfE3EUXaD70ctU.ugFnvyiOXB4F/kodR8sGga1kpJ/lz1m', NULL, '2020-01-27 07:13:40', '2020-01-27 07:13:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_masts`
--
ALTER TABLE `emp_masts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entitle_classes`
--
ALTER TABLE `entitle_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `local_ta_bill_amounts`
--
ALTER TABLE `local_ta_bill_amounts`
  ADD PRIMARY KEY (`ids`);

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purpose_of_journy_details`
--
ALTER TABLE `purpose_of_journy_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `tour_amount_bills`
--
ALTER TABLE `tour_amount_bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_request`
--
ALTER TABLE `tour_request`
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
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `emp_masts`
--
ALTER TABLE `emp_masts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `entitle_classes`
--
ALTER TABLE `entitle_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `local_ta_bill_amounts`
--
ALTER TABLE `local_ta_bill_amounts`
  MODIFY `ids` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `purpose_of_journy_details`
--
ALTER TABLE `purpose_of_journy_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tour_amount_bills`
--
ALTER TABLE `tour_amount_bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tour_request`
--
ALTER TABLE `tour_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
