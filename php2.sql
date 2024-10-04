-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2024 at 02:20 PM
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
-- Database: `php2`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_type` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `id_user`, `id_type`, `ip_address`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '120.0.0.1', '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(2, 2, 2, '120.0.0.1', '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(3, 3, 3, '120.0.0.1', '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(4, 4, 4, '120.0.0.1', '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(5, 1, 5, '120.0.0.1', '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(6, 2, 6, '120.0.0.1', '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(7, 3, 1, '120.0.0.1', '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(8, 4, 3, '120.0.0.1', '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(9, 1, 4, '120.0.0.1', '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(10, 2, 5, '120.0.0.1', '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(11, 3, 6, '120.0.0.1', '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(12, 4, 1, '120.0.0.1', '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(13, 1, 2, '120.0.0.1', '2024-03-09 12:19:25', '2024-03-09 12:19:25');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `active` int(11) NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `subject`, `message`, `active`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 'Restaurant recommendations', 'The restaurant is very good, all recommendations for this restaurant', 1, 1, '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(2, 'Kudos to the staff', 'The friendliest staff I have ever met in a restaurant, all praises', 1, 2, '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(3, 'Good specialties', 'This restaurant has the best specialties in town, all praises', 1, 3, '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(4, 'Affordable prices', 'The prices are not very high, everyone can afford this kind of pleasure', 1, 4, '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(5, 'BAD RESTAURANT', 'BAD RESTAURANT', 0, 6, '2024-03-09 12:19:25', '2024-03-09 12:19:25');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `id_category` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `name`, `description`, `id_category`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Spaghetti Bolognese', 'A classic Italian dish consisting of spaghetti pasta topped with a rich tomato-based meat sauce', 6, '1.jpg', '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(2, 'Chicken Tikka Masala', 'A popular Indian dish featuring marinated and grilled chicken pieces in a creamy tomato curry sauce', 1, '2.jpg', '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(3, 'Sushi', 'A Japanese dish consisting of vinegared rice, often combined with other ingredients such as seafood and vegetables', 1, '33.jpg', '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(4, 'Hamburger', 'A sandwich consisting of one or more cooked patties of ground meat, usually beef, placed inside a sliced bread roll or bun', 5, '4.jpg', '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(5, 'Pad Thai', 'A Thai stir-fried noodle dish typically made with rice noodles, shrimp, tofu, peanuts, and bean sprouts', 3, '55.jpg', '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(6, 'Lasagna', 'An Italian dish made with layers of wide, flat pasta, typically with meat, cheese, and tomato sauce', 6, '6.jpg', '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(7, 'Margherita Pizza', 'A classic Italian pizza topped with tomato sauce, fresh mozzarella cheese, basil, and olive oil', 6, '7.jpg', '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(8, 'Baklava', 'A rich, sweet dessert pastry made of layers of filo filled with chopped nuts and sweetened and held together with syrup or honey', 2, '22.jpg', '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(9, 'Sandwich', 'A food typically consisting of vegetables, sliced cheese or meat, placed on or between slices of bread', 5, '66.jpg', '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(10, 'Scallops', 'A type of shellfish with a sweet, delicate flavor, often prepared by searing or grilling', 7, '5.jpg', '2024-03-09 12:19:25', '2024-03-09 12:19:25');

-- --------------------------------------------------------

--
-- Table structure for table `home_texts`
--

CREATE TABLE `home_texts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) NOT NULL,
  `text1` varchar(255) NOT NULL,
  `text2` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_texts`
--

INSERT INTO `home_texts` (`id`, `heading`, `text1`, `text2`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Delicious Dining Delights: A Culinary Journey at Global Food', 'Indulge in a culinary adventure at Global Food, where every dish is a masterpiece crafted with passion and precision. Join us and discover why Global Food is a destination for food lovers seeking exceptional dining in Belgrade', 'At Global food, our menu is a celebration of flavors and textures that will tantalize your taste buds. Each dish is meticulously prepared by our talented chefs, who draw inspiration from both local traditions and international cuisines.', '1.jpg', '2024-03-09 12:19:25', '2024-03-09 12:19:25');

-- --------------------------------------------------------

--
-- Table structure for table `meal_categories`
--

CREATE TABLE `meal_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meal_categories`
--

INSERT INTO `meal_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Asian', '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(2, 'Serbian Traditional', '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(3, 'Mexican', '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(4, 'Scandinavian', '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(5, 'North American', '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(6, 'European', '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(7, 'Mediterranean', '2024-03-09 12:19:25', '2024-03-09 12:19:25');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `href` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `href`, `created_at`, `updated_at`) VALUES
(1, 'Home', '/', '2024-03-09 12:19:22', '2024-03-09 12:19:22'),
(2, 'Gallery', 'gallery', '2024-03-09 12:19:22', '2024-03-09 12:19:22'),
(3, 'Reservation', 'reservation', '2024-03-09 12:19:22', '2024-03-09 12:19:22'),
(4, 'Checkout', 'checkout', '2024-03-09 12:19:22', '2024-03-09 12:19:22'),
(5, 'Reservations', 'reservations', '2024-03-09 12:19:22', '2024-03-09 12:19:22'),
(6, 'Contact', 'contact', '2024-03-09 12:19:22', '2024-03-09 12:19:22'),
(7, 'Account', 'account', '2024-03-09 12:19:22', '2024-03-09 12:19:22'),
(8, 'Author', 'author', '2024-03-09 12:19:22', '2024-03-09 12:19:22'),
(9, 'Admin', 'adminPage', '2024-03-09 12:19:22', '2024-03-09 12:19:22');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'User User', 'user@gmail.com', 'Message from user', '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(2, 'User User', 'user@gmail.com', 'Message from user', '2024-03-09 12:19:25', '2024-03-09 12:19:25');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_27_141050_create_menus_table', 1),
(6, '2024_02_27_143634_create_roles_table', 1),
(7, '2024_02_27_144137_create_our_users_table', 1),
(8, '2024_02_27_212559_create_messages_table', 1),
(9, '2024_02_28_122621_create_newsletters_table', 1),
(10, '2024_02_28_145443_create_comments_table', 1),
(11, '2024_02_28_204858_create_meal_categorys_table', 1),
(12, '2024_02_29_071948_create_gallerys_table', 1),
(13, '2024_02_29_194832_create_social_networks_table', 1),
(14, '2024_02_29_195003_create_social_network_users_table', 1),
(15, '2024_03_02_074702_create_table_premium_levels_table', 1),
(16, '2024_03_02_074841_create_number_of_chairs_table', 1),
(17, '2024_03_02_091950_create_tables_table', 1),
(18, '2024_03_02_114007_create_reservations_table', 1),
(19, '2024_03_02_114015_create_reservation_lines_table', 1),
(20, '2024_03_06_111817_create_home_texts_table', 1),
(21, '2024_03_07_181528_create_type_of_activities_table', 1),
(22, '2024_03_07_183208_create_activities_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `number_of_chairs`
--

CREATE TABLE `number_of_chairs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `number_of_chairs`
--

INSERT INTO `number_of_chairs` (`id`, `number`, `name`, `created_at`, `updated_at`) VALUES
(1, 4, 'Four', '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(2, 6, 'Six', '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(3, 8, 'Eight', '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(4, 10, 'Ten', '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(5, 12, 'Twelve', '2024-03-09 12:19:25', '2024-03-09 12:19:25');

-- --------------------------------------------------------

--
-- Table structure for table `our_users`
--

CREATE TABLE `our_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` int(11) NOT NULL,
  `id_role` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'avatar2.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `our_users`
--

INSERT INTO `our_users` (`id`, `name`, `lastname`, `email`, `password`, `active`, `id_role`, `image`, `created_at`, `updated_at`) VALUES
(1, 'John', 'Smith', 'john@gmail.com', '$2y$12$uEKr9tEUOf.LBjyXPISQG.TiS6Q56yqoaMLrRbxt1WhaLP5/qbxQW', 1, 1, 'f3.jpg', '2024-03-09 12:19:22', '2024-03-09 12:19:25'),
(2, 'Michael', 'Johnson', 'michael@gmail.com', '$2y$12$UxVNPSLAeeC..Xu0I3DlKesMAMK8EAO1L/CfgcAZwWiQm/SozFTby', 1, 1, 'f1.jpg', '2024-03-09 12:19:23', '2024-03-09 12:19:25'),
(3, 'David', 'Brown', 'davidBrown@gmail.com', '$2y$12$qPIHkvxMo8u3dqihHWJRWecfaAy5IS846sN8FYHDEPyyo/ZKGIvm6', 1, 1, 'avatar2.png', '2024-03-09 12:19:23', '2024-03-09 12:19:23'),
(4, 'Emily', 'Davis', 'emily@gmail.com', '$2y$12$Z/UMe3XP6ymGJoDY4JWD1e6AfyfgfLaif3FzmJXv922ViMObDgLFy', 1, 1, 'f2.jpg', '2024-03-09 12:19:23', '2024-03-09 12:19:25'),
(5, 'Administrator', 'Administrator', 'administrator@gmail.com', '$2y$12$CR4FlqnPSY5H2RQMg1mDRuQcH0/nowPVcgVm7/6liZV.pCF1djFvu', 1, 2, 'avatar2.png', '2024-03-09 12:19:24', '2024-03-09 12:19:24'),
(6, 'User', 'User', 'user@gmail.com', '$2y$12$icvt05CjMcPNpU9khMWBA.HU8nkhkihYJMHNt1chSvK4Ndqkp3l3O', 1, 1, 'avatar2.png', '2024-03-09 12:19:24', '2024-03-09 12:19:24'),
(7, 'David', 'Watson', 'david@gmail.com', '$2y$12$rBOkcwQXr7Fez8jsYtBTeuu5FOWAYEtLFXKj.KqKLzUB3rmg2hFY.', 1, 3, 't1.jpg', '2024-03-09 12:19:24', '2024-03-09 12:19:25'),
(8, 'Shane', 'Smith', 'shane@gmail.com', '$2y$12$x4re8WxGw7WKWINIk.fxM.zvowCGapoXDMWjJbkt.uacryUb5gXhe', 1, 3, 't2.jpg', '2024-03-09 12:19:24', '2024-03-09 12:19:25'),
(9, 'Steve', 'Warner', 'steve@gmail.com', '$2y$12$ZRIzpn92yRY52q.SuDv9uOmMySb0/gERo6vwb1nsAYv8ZYhKWtL5a', 1, 3, 't3.jpg', '2024-03-09 12:19:25', '2024-03-09 12:19:25');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(2, 2, '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(3, 3, '2024-03-09 12:19:25', '2024-03-09 12:19:25');

-- --------------------------------------------------------

--
-- Table structure for table `reservation_lines`
--

CREATE TABLE `reservation_lines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_reservation` bigint(20) UNSIGNED NOT NULL,
  `date_time_of` datetime NOT NULL,
  `id_table` bigint(20) UNSIGNED NOT NULL,
  `date_time_until` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservation_lines`
--

INSERT INTO `reservation_lines` (`id`, `id_reservation`, `date_time_of`, `id_table`, `date_time_until`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-03-19 00:00:00', 1, '2024-03-24 00:00:00', '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(2, 2, '2024-03-19 00:00:00', 2, '2024-03-24 00:00:00', '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(3, 3, '2024-03-19 00:00:00', 3, '2024-03-24 00:00:00', '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(4, 1, '2024-03-19 00:00:00', 4, '2024-03-24 00:00:00', '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(5, 1, '2024-03-19 00:00:00', 5, '2024-03-24 00:00:00', '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(6, 2, '2024-03-19 00:00:00', 6, '2024-03-24 00:00:00', '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(7, 2, '2024-03-19 00:00:00', 7, '2024-03-24 00:00:00', '2024-03-09 12:19:25', '2024-03-09 12:19:25');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'User', '2024-03-09 12:19:22', '2024-03-09 12:19:22'),
(2, 'Admin', '2024-03-09 12:19:22', '2024-03-09 12:19:22'),
(3, 'Chef', '2024-03-09 12:19:22', '2024-03-09 12:19:22');

-- --------------------------------------------------------

--
-- Table structure for table `social_networks`
--

CREATE TABLE `social_networks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_networks`
--

INSERT INTO `social_networks` (`id`, `name`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Facebook', 'fa fa-facebook', '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(2, 'Twitter', 'fa fa-twitter', '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(3, 'Instagram', 'fa fa-instagram', '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(4, 'Linkedin', 'fa fa-linkedin', '2024-03-09 12:19:25', '2024-03-09 12:19:25');

-- --------------------------------------------------------

--
-- Table structure for table `social_network_users`
--

CREATE TABLE `social_network_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `href` varchar(255) NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_social` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_network_users`
--

INSERT INTO `social_network_users` (`id`, `href`, `id_user`, `id_social`, `created_at`, `updated_at`) VALUES
(1, 'https://www.facebook.com/', 7, 1, '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(2, 'https://twitter.com/', 7, 2, '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(3, 'https://instagram.com/', 7, 3, '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(4, 'https://twitter.com/', 8, 2, '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(5, 'https://instagram.com/', 8, 3, '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(6, 'https://linkedin.com/', 9, 4, '2024-03-09 12:19:25', '2024-03-09 12:19:25');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `id_number` bigint(20) UNSIGNED NOT NULL,
  `id_level` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `name`, `description`, `image`, `id_number`, `id_level`, `created_at`, `updated_at`) VALUES
(1, 'Table 1', 'Description for table 1', 't1.png', 1, 1, '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(2, 'Table 2', 'Description for table 2', 't2.png', 2, 2, '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(3, 'Table 3', 'Description for table 3', 't3.png', 3, 3, '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(4, 'Table 4', 'Description for table 4', 't5.jpg', 2, 3, '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(5, 'Table 5', 'Description for table 5', 't6.jpg', 3, 1, '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(6, 'Table 6', 'Description for table 6', 't7.jpg', 2, 3, '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(7, 'Table 7', 'Description for table 7', 't8.jpg', 3, 2, '2024-03-09 12:19:25', '2024-03-09 12:19:25');

-- --------------------------------------------------------

--
-- Table structure for table `table_premium_levels`
--

CREATE TABLE `table_premium_levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_premium_levels`
--

INSERT INTO `table_premium_levels` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Exclusive', '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(2, 'Premium', '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(3, 'Classic', '2024-03-09 12:19:25', '2024-03-09 12:19:25');

-- --------------------------------------------------------

--
-- Table structure for table `type_of_activities`
--

CREATE TABLE `type_of_activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type_of_activities`
--

INSERT INTO `type_of_activities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Login', '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(2, 'Logout', '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(3, 'Add table to reservation', '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(4, 'Checkout reservation', '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(5, 'Remove reservation from cart', '2024-03-09 12:19:25', '2024-03-09 12:19:25'),
(6, 'Leave a comment', '2024-03-09 12:19:25', '2024-03-09 12:19:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activities_id_user_foreign` (`id_user`),
  ADD KEY `activities_id_type_foreign` (`id_type`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_id_user_foreign` (`id_user`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galleries_id_category_foreign` (`id_category`);

--
-- Indexes for table `home_texts`
--
ALTER TABLE `home_texts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meal_categories`
--
ALTER TABLE `meal_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `number_of_chairs`
--
ALTER TABLE `number_of_chairs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_users`
--
ALTER TABLE `our_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `our_users_id_role_foreign` (`id_role`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservations_id_user_foreign` (`id_user`);

--
-- Indexes for table `reservation_lines`
--
ALTER TABLE `reservation_lines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservation_lines_id_reservation_foreign` (`id_reservation`),
  ADD KEY `reservation_lines_id_table_foreign` (`id_table`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_networks`
--
ALTER TABLE `social_networks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_network_users`
--
ALTER TABLE `social_network_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `social_network_users_id_user_foreign` (`id_user`),
  ADD KEY `social_network_users_id_social_foreign` (`id_social`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tables_name_unique` (`name`),
  ADD KEY `tables_id_number_foreign` (`id_number`),
  ADD KEY `tables_id_level_foreign` (`id_level`);

--
-- Indexes for table `table_premium_levels`
--
ALTER TABLE `table_premium_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_of_activities`
--
ALTER TABLE `type_of_activities`
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
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `home_texts`
--
ALTER TABLE `home_texts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `meal_categories`
--
ALTER TABLE `meal_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `number_of_chairs`
--
ALTER TABLE `number_of_chairs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `our_users`
--
ALTER TABLE `our_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reservation_lines`
--
ALTER TABLE `reservation_lines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `social_networks`
--
ALTER TABLE `social_networks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `social_network_users`
--
ALTER TABLE `social_network_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `table_premium_levels`
--
ALTER TABLE `table_premium_levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `type_of_activities`
--
ALTER TABLE `type_of_activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_id_type_foreign` FOREIGN KEY (`id_type`) REFERENCES `type_of_activities` (`id`),
  ADD CONSTRAINT `activities_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `our_users` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `our_users` (`id`);

--
-- Constraints for table `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `galleries_id_category_foreign` FOREIGN KEY (`id_category`) REFERENCES `meal_categories` (`id`);

--
-- Constraints for table `our_users`
--
ALTER TABLE `our_users`
  ADD CONSTRAINT `our_users_id_role_foreign` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `our_users` (`id`);

--
-- Constraints for table `reservation_lines`
--
ALTER TABLE `reservation_lines`
  ADD CONSTRAINT `reservation_lines_id_reservation_foreign` FOREIGN KEY (`id_reservation`) REFERENCES `reservations` (`id`),
  ADD CONSTRAINT `reservation_lines_id_table_foreign` FOREIGN KEY (`id_table`) REFERENCES `tables` (`id`);

--
-- Constraints for table `social_network_users`
--
ALTER TABLE `social_network_users`
  ADD CONSTRAINT `social_network_users_id_social_foreign` FOREIGN KEY (`id_social`) REFERENCES `social_networks` (`id`),
  ADD CONSTRAINT `social_network_users_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `our_users` (`id`);

--
-- Constraints for table `tables`
--
ALTER TABLE `tables`
  ADD CONSTRAINT `tables_id_level_foreign` FOREIGN KEY (`id_level`) REFERENCES `table_premium_levels` (`id`),
  ADD CONSTRAINT `tables_id_number_foreign` FOREIGN KEY (`id_number`) REFERENCES `number_of_chairs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
