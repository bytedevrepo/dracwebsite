-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2021 at 01:33 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dracweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(3, 'Nemo illo dolor dele', 'nemo-illo-dolor-dele', '2021-10-04 00:10:11', '2021-10-04 00:10:11'),
(4, 'Dolores consequuntur', 'dolores-consequuntur', '2021-10-04 00:10:16', '2021-10-04 00:10:16'),
(6, 'In sint culpa volu', 'in-sint-culpa-volu', '2021-10-04 01:28:36', '2021-10-04 01:28:36');

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'home_background', 'cms/VfZsYwGXF2J6hRAjUZyDIXFxZDNMxRHKBir8DHgD.jpg', '2021-10-04 04:53:05', '2021-10-04 05:45:57');

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
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_selected` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `title`, `is_selected`, `created_at`, `updated_at`) VALUES
(1, 'Main Menu', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu_pages`
--

CREATE TABLE `menu_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `parent_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custom_css` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_pages`
--

INSERT INTO `menu_pages` (`id`, `page_id`, `menu_id`, `order`, `parent_id`, `display_name`, `slug`, `image`, `alt_text`, `target`, `custom_css`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 1, 0, 'Home', 'home', 'menu_images/Is2N42whtMsMMoPyXXJaGBF9TAiQBOI7daFN0prd.png', 'This is alt text from home menu', '_blank', 'background-color:red !important;\r\nheight:200px;', '2021-10-04 03:14:21', '2021-10-04 03:52:41'),
(2, 0, 1, 1, 1, 'STS', 'sts', 'menu_images/nkZt2H1cGfdcja9Rvbt1XnNGyTXhX3PQ1mOFFuSJ.png', NULL, '_blank', NULL, '2021-10-04 03:28:59', '2021-10-04 03:45:49'),
(3, 0, 1, 2, 1, 'Info Nepal', 'info-nepal', 'menu_images/JDKTBOl8u1Te8VLTBLOuFbQwuGKl9Jrr1hsb7TUB.png', NULL, NULL, NULL, '2021-10-04 03:40:51', '2021-10-04 03:41:07'),
(4, 0, 1, 3, 1, 'DRAC', 'drac', 'menu_images/AyWqzYd8YGhLyhBhTzP6pKC2L1FMr5txi2wR8Yjo.png', NULL, NULL, NULL, '2021-10-04 03:41:00', '2021-10-04 03:41:07'),
(5, 6, 1, 3, 2, 'Bonjour', 'bonjour', 'menu_images/8YLb752DPaV328e0XaOPurciHHsib2fxRyHNG0z9.png', NULL, '_blank', NULL, '2021-10-04 03:46:00', '2021-10-04 03:48:54'),
(6, 0, 1, 4, 1, 'Smart ERP', 'smart-erp', 'menu_images/aGsy5d93H3k6UxPvMrfNY1GTxjjmuTBO0G8xIjy0.png', NULL, NULL, NULL, '2021-10-04 03:46:13', '2021-10-04 03:47:17'),
(7, 0, 1, 5, 1, 'Tree Technolory', 'tree-technolory', 'menu_images/076PKRJ82VTQwtF1ssPhyXIZEsldAKO5oFZJBDzl.png', NULL, NULL, NULL, '2021-10-04 03:46:27', '2021-10-04 03:47:17'),
(8, 0, 1, 6, 1, 'SD Gases', 'sd-gases', 'menu_images/di5k5J4kpV35gBpeAVVXyjuYGZzUZtUj15JrjF9M.png', NULL, NULL, NULL, '2021-10-04 03:46:36', '2021-10-04 03:47:17'),
(9, 3, 1, 4, 2, 'fdsa', 'fdsa', '', NULL, NULL, NULL, '2021-10-04 03:47:39', '2021-10-04 03:48:14'),
(10, 4, 1, 5, 2, 'hjhjhh', 'hjhjhh', '', NULL, NULL, NULL, '2021-10-04 03:47:42', '2021-10-04 03:48:14'),
(11, 6, 1, 6, 2, 'Veniam atque offici', 'veniam-atque-offici', '', NULL, NULL, NULL, '2021-10-04 03:47:45', '2021-10-04 03:48:14'),
(12, 4, 1, 1, 2, 'hjhjhh', 'hjhjhh', '', NULL, NULL, NULL, '2021-10-04 03:48:04', '2021-10-04 03:48:14'),
(13, 3, 1, 2, 2, 'fdsa', 'fdsa', '', NULL, NULL, NULL, '2021-10-04 03:48:07', '2021-10-04 03:48:14');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_09_28_111502_create_pages_table', 1),
(6, '2021_09_28_111503_create_menus_table', 1),
(8, '2021_09_30_093836_create_categories_table', 1),
(9, '2021_09_28_111502_create_posts_table', 2),
(10, '2021_09_30_065829_create_menu_pages_table', 3),
(11, '2021_10_04_102143_create_cms_table', 4);

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
('bishal.khatri343@gmail.com', '$2y$10$xJVd/iR8eDS6PQwKdwMJZ.byBTAk/vKjPJhgK4Bs8Luz3TQ0YcG2y', '2021-10-03 22:26:01');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `background_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0->draft, 1->published',
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `published_date` datetime DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `background_image`, `excerpt`, `body`, `category_id`, `status`, `created_by`, `published_date`, `meta_title`, `meta_keyword`, `meta_description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Fugiat necessitatibu', 'fugiat-necessitatibu', 'post_background_images/JacZRdBFDBmztESPRDD9WCril53aTfINBam4PfBl.png', 'Perferendis commodi', '<p>A one-to-one relationship is a very basic type of database relationship. For example, a User model might be associated with one Phone model. To define this relationship, we will place a phone method on the User model. The phone method should call the hasOne method and return its result. The hasOne method is available to your model via the model\'s Illuminate\\Database\\Eloquent\\Model base class:\r\n\r\n<!--?php\r\n\r\nnamespace App\\Models;\r\n\r\nuse Illuminate\\Database\\Eloquent\\Model;\r\n\r\nclass User extends Model\r\n{\r\n    /**\r\n     * Get the phone associated with the user.\r\n     */\r\n    public function phone()\r\n    {\r\n        return $this--->hasOne(Phone::class);\r\n    }\r\n}\r\nThe first argument passed to the hasOne method is the name of the related model class. Once the relationship is defined, we may retrieve the related record using Eloquent\'s dynamic properties. Dynamic properties allow you to access relationship methods as if they were properties defined on the model:\r\n\r\n$phone = User::find(1)-&gt;phone;\r\nEloquent determines the foreign key of the relationship based on the parent model name. In this case, the Phone model is automatically assumed to have a use</p><p style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; margin: 0px 0px 2em; font-size: medium; line-height: 1.8em; color: rgba(181,181,189,var(--tw-text-opacity)) !important; --tw-text-opacity:1 !important; font-family: scandia-web, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(23, 25, 35); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">A one-to-one relationship is a very basic type of database relationship. For example, a<span>&nbsp;</span><code style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; font-family: source-code-pro, ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, &quot;Liberation Mono&quot;, &quot;Courier New&quot;, monospace; font-size: 0.8rem; color: rgba(255,124,117,var(--tw-text-opacity)) !important; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: rgba(37,42,55,var(--tw-bg-opacity)) !important; text-align: left; white-space: pre; word-spacing: normal; word-break: normal; overflow-wrap: normal; tab-size: 4; hyphens: none; line-height: 1.9; font-weight: 500; padding: 0px 0.125rem; box-shadow: rgba(0, 0, 0, 0.075) 0px 1px 1px; user-select: auto; display: inline-flex; max-width: 100%; overflow-x: auto; vertical-align: middle; --tw-text-opacity:1 !important; --tw-bg-opacity:1 !important;\">User</code><span>&nbsp;</span>model might be associated with one<span>&nbsp;</span><code style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; font-family: source-code-pro, ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, &quot;Liberation Mono&quot;, &quot;Courier New&quot;, monospace; font-size: 0.8rem; color: rgba(255,124,117,var(--tw-text-opacity)) !important; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: rgba(37,42,55,var(--tw-bg-opacity)) !important; text-align: left; white-space: pre; word-spacing: normal; word-break: normal; overflow-wrap: normal; tab-size: 4; hyphens: none; line-height: 1.9; font-weight: 500; padding: 0px 0.125rem; box-shadow: rgba(0, 0, 0, 0.075) 0px 1px 1px; user-select: auto; display: inline-flex; max-width: 100%; overflow-x: auto; vertical-align: middle; --tw-text-opacity:1 !important; --tw-bg-opacity:1 !important;\">Phone</code><span>&nbsp;</span>model. To define this relationship, we will place a<span>&nbsp;</span><code style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; font-family: source-code-pro, ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, &quot;Liberation Mono&quot;, &quot;Courier New&quot;, monospace; font-size: 0.8rem; color: rgba(255,124,117,var(--tw-text-opacity)) !important; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: rgba(37,42,55,var(--tw-bg-opacity)) !important; text-align: left; white-space: pre; word-spacing: normal; word-break: normal; overflow-wrap: normal; tab-size: 4; hyphens: none; line-height: 1.9; font-weight: 500; padding: 0px 0.125rem; box-shadow: rgba(0, 0, 0, 0.075) 0px 1px 1px; user-select: auto; display: inline-flex; max-width: 100%; overflow-x: auto; vertical-align: middle; --tw-text-opacity:1 !important; --tw-bg-opacity:1 !important;\">phone</code><span>&nbsp;</span>method on the<span>&nbsp;</span><code style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; font-family: source-code-pro, ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, &quot;Liberation Mono&quot;, &quot;Courier New&quot;, monospace; font-size: 0.8rem; color: rgba(255,124,117,var(--tw-text-opacity)) !important; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: rgba(37,42,55,var(--tw-bg-opacity)) !important; text-align: left; white-space: pre; word-spacing: normal; word-break: normal; overflow-wrap: normal; tab-size: 4; hyphens: none; line-height: 1.9; font-weight: 500; padding: 0px 0.125rem; box-shadow: rgba(0, 0, 0, 0.075) 0px 1px 1px; user-select: auto; display: inline-flex; max-width: 100%; overflow-x: auto; vertical-align: middle; --tw-text-opacity:1 !important; --tw-bg-opacity:1 !important;\">User</code><span>&nbsp;</span>model. The<span>&nbsp;</span><code style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; font-family: source-code-pro, ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, &quot;Liberation Mono&quot;, &quot;Courier New&quot;, monospace; font-size: 0.8rem; color: rgba(255,124,117,var(--tw-text-opacity)) !important; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: rgba(37,42,55,var(--tw-bg-opacity)) !important; text-align: left; white-space: pre; word-spacing: normal; word-break: normal; overflow-wrap: normal; tab-size: 4; hyphens: none; line-height: 1.9; font-weight: 500; padding: 0px 0.125rem; box-shadow: rgba(0, 0, 0, 0.075) 0px 1px 1px; user-select: auto; display: inline-flex; max-width: 100%; overflow-x: auto; vertical-align: middle; --tw-text-opacity:1 !important; --tw-bg-opacity:1 !important;\">phone</code><span>&nbsp;</span>method should call the<span>&nbsp;</span><code style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; font-family: source-code-pro, ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, &quot;Liberation Mono&quot;, &quot;Courier New&quot;, monospace; font-size: 0.8rem; color: rgba(255,124,117,var(--tw-text-opacity)) !important; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: rgba(37,42,55,var(--tw-bg-opacity)) !important; text-align: left; white-space: pre; word-spacing: normal; word-break: normal; overflow-wrap: normal; tab-size: 4; hyphens: none; line-height: 1.9; font-weight: 500; padding: 0px 0.125rem; box-shadow: rgba(0, 0, 0, 0.075) 0px 1px 1px; user-select: auto; display: inline-flex; max-width: 100%; overflow-x: auto; vertical-align: middle; --tw-text-opacity:1 !important; --tw-bg-opacity:1 !important;\">hasOne</code><span>&nbsp;</span>method and return its result. The<span>&nbsp;</span><code style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; font-family: source-code-pro, ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, &quot;Liberation Mono&quot;, &quot;Courier New&quot;, monospace; font-size: 0.8rem; color: rgba(255,124,117,var(--tw-text-opacity)) !important; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: rgba(37,42,55,var(--tw-bg-opacity)) !important; text-align: left; white-space: pre; word-spacing: normal; word-break: normal; overflow-wrap: normal; tab-size: 4; hyphens: none; line-height: 1.9; font-weight: 500; padding: 0px 0.125rem; box-shadow: rgba(0, 0, 0, 0.075) 0px 1px 1px; user-select: auto; display: inline-flex; max-width: 100%; overflow-x: auto; vertical-align: middle; --tw-text-opacity:1 !important; --tw-bg-opacity:1 !important;\">hasOne</code><span>&nbsp;</span>method is available to your model via the model\'s<span>&nbsp;</span><code style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; font-family: source-code-pro, ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, &quot;Liberation Mono&quot;, &quot;Courier New&quot;, monospace; font-size: 0.8rem; color: rgba(255,124,117,var(--tw-text-opacity)) !important; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: rgba(37,42,55,var(--tw-bg-opacity)) !important; text-align: left; white-space: pre; word-spacing: normal; word-break: normal; overflow-wrap: normal; tab-size: 4; hyphens: none; line-height: 1.9; font-weight: 500; padding: 0px 0.125rem; box-shadow: rgba(0, 0, 0, 0.075) 0px 1px 1px; user-select: auto; display: inline-flex; max-width: 100%; overflow-x: auto; vertical-align: middle; --tw-text-opacity:1 !important; --tw-bg-opacity:1 !important;\">Illuminate\\Database\\Eloquent\\Model</code><span>&nbsp;</span>base class:</p><p><br></p><pre class=\" language-php\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; font-family: source-code-pro, ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, &quot;Liberation Mono&quot;, &quot;Courier New&quot;, monospace; font-size: medium; margin: 0.5em 0px 2em; color: rgba(255,124,117,var(--tw-text-opacity)) !important; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: rgba(37,42,55,var(--tw-bg-opacity)) !important; text-align: left; white-space: pre; word-spacing: 0px; word-break: normal; overflow-wrap: normal; tab-size: 4; hyphens: none; padding: 1em; overflow: auto; max-width: 100%; box-shadow: rgba(0, 0, 0, 0.075) 0px 1px 1px; user-select: auto; --tw-bg-opacity:1 !important; --tw-text-opacity:1 !important; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; -webkit-text-stroke-width: 0px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><code class=\" language-php\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; font-family: source-code-pro, ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, &quot;Liberation Mono&quot;, &quot;Courier New&quot;, monospace; font-size: 0.8rem; color: rgba(231,232,242,var(--tw-text-opacity)) !important; background: none; text-align: left; white-space: pre; word-spacing: normal; word-break: normal; overflow-wrap: normal; tab-size: 4; hyphens: none; line-height: 1.9; font-weight: 500; --tw-text-opacity:1 !important;\"><span class=\"token php language-php\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent;\"><span class=\"token delimiter important\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; color: rgba(10,178,245,var(--tw-text-opacity)) !important; font-weight: 700; --tw-text-opacity:1 !important;\">&lt;?php</span>\r\n\r\n<span class=\"token keyword\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; color: rgba(10,178,245,var(--tw-text-opacity)) !important; --tw-text-opacity:1 !important;\">namespace</span> <span class=\"token package\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent;\">App<span class=\"token punctuation\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; color: rgba(231,232,242,var(--tw-text-opacity)) !important; --tw-text-opacity:1 !important;\">\\</span>Models</span><span class=\"token punctuation\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; color: rgba(231,232,242,var(--tw-text-opacity)) !important; --tw-text-opacity:1 !important;\">;</span>\r\n\r\n<span class=\"token keyword\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; color: rgba(10,178,245,var(--tw-text-opacity)) !important; --tw-text-opacity:1 !important;\">use</span> <span class=\"token package\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent;\">Illuminate<span class=\"token punctuation\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; color: rgba(231,232,242,var(--tw-text-opacity)) !important; --tw-text-opacity:1 !important;\">\\</span>Database<span class=\"token punctuation\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; color: rgba(231,232,242,var(--tw-text-opacity)) !important; --tw-text-opacity:1 !important;\">\\</span>Eloquent<span class=\"token punctuation\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; color: rgba(231,232,242,var(--tw-text-opacity)) !important; --tw-text-opacity:1 !important;\">\\</span>Model</span><span class=\"token punctuation\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; color: rgba(231,232,242,var(--tw-text-opacity)) !important; --tw-text-opacity:1 !important;\">;</span>\r\n\r\n<span class=\"token keyword\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; color: rgba(10,178,245,var(--tw-text-opacity)) !important; --tw-text-opacity:1 !important;\">class</span> <span class=\"token class-name\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; color: rgba(255,124,117,var(--tw-text-opacity)) !important; --tw-text-opacity:1 !important;\">User</span> <span class=\"token keyword\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; color: rgba(10,178,245,var(--tw-text-opacity)) !important; --tw-text-opacity:1 !important;\">extends</span> <span class=\"token class-name\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; color: rgba(255,124,117,var(--tw-text-opacity)) !important; --tw-text-opacity:1 !important;\">Model</span>\r\n<span class=\"token punctuation\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; color: rgba(231,232,242,var(--tw-text-opacity)) !important; --tw-text-opacity:1 !important;\">{</span>\r\n    <span class=\"token comment\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; color: rgb(147, 147, 158);\">/**\r\n     * Get the phone associated with the user.\r\n     */</span>\r\n    <span class=\"token keyword\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; color: rgba(10,178,245,var(--tw-text-opacity)) !important; --tw-text-opacity:1 !important;\">public</span> <span class=\"token keyword\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; color: rgba(10,178,245,var(--tw-text-opacity)) !important; --tw-text-opacity:1 !important;\">function</span> <span class=\"token function\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; color: rgba(255,124,117,var(--tw-text-opacity)) !important; --tw-text-opacity:1 !important;\">phone</span><span class=\"token punctuation\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; color: rgba(231,232,242,var(--tw-text-opacity)) !important; --tw-text-opacity:1 !important;\">(</span><span class=\"token punctuation\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; color: rgba(231,232,242,var(--tw-text-opacity)) !important; --tw-text-opacity:1 !important;\">)</span>\r\n    <span class=\"token punctuation\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; color: rgba(231,232,242,var(--tw-text-opacity)) !important; --tw-text-opacity:1 !important;\">{</span>\r\n        <span class=\"token keyword\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; color: rgba(10,178,245,var(--tw-text-opacity)) !important; --tw-text-opacity:1 !important;\">return</span> <span class=\"token variable\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; color: rgba(10,178,245,var(--tw-text-opacity)) !important; --tw-text-opacity:1 !important;\">$this</span><span class=\"token operator\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; color: rgba(231,232,242,var(--tw-text-opacity)) !important; --tw-text-opacity:1 !important;\">-</span><span class=\"token operator\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; color: rgba(231,232,242,var(--tw-text-opacity)) !important; --tw-text-opacity:1 !important;\">&gt;</span><span class=\"token function\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; color: rgba(255,124,117,var(--tw-text-opacity)) !important; --tw-text-opacity:1 !important;\">hasOne</span><span class=\"token punctuation\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; color: rgba(231,232,242,var(--tw-text-opacity)) !important; --tw-text-opacity:1 !important;\">(</span>Phone<span class=\"token punctuation\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; color: rgba(231,232,242,var(--tw-text-opacity)) !important; --tw-text-opacity:1 !important;\">:</span><span class=\"token punctuation\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; color: rgba(231,232,242,var(--tw-text-opacity)) !important; --tw-text-opacity:1 !important;\">:</span><span class=\"token keyword\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; color: rgba(10,178,245,var(--tw-text-opacity)) !important; --tw-text-opacity:1 !important;\">class</span><span class=\"token punctuation\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; color: rgba(231,232,242,var(--tw-text-opacity)) !important; --tw-text-opacity:1 !important;\">)</span><span class=\"token punctuation\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; color: rgba(231,232,242,var(--tw-text-opacity)) !important; --tw-text-opacity:1 !important;\">;</span>\r\n    <span class=\"token punctuation\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; color: rgba(231,232,242,var(--tw-text-opacity)) !important; --tw-text-opacity:1 !important;\">}</span>\r\n<span class=\"token punctuation\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; color: rgba(231,232,242,var(--tw-text-opacity)) !important; --tw-text-opacity:1 !important;\">}</span></span></code></pre><p><br></p><p style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; margin: 0px 0px 2em; font-size: medium; line-height: 1.8em; color: rgba(181,181,189,var(--tw-text-opacity)) !important; --tw-text-opacity:1 !important; font-family: scandia-web, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(23, 25, 35); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">The first argument passed to the<span>&nbsp;</span><code style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; font-family: source-code-pro, ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, &quot;Liberation Mono&quot;, &quot;Courier New&quot;, monospace; font-size: 0.8rem; color: rgba(255,124,117,var(--tw-text-opacity)) !important; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: rgba(37,42,55,var(--tw-bg-opacity)) !important; text-align: left; white-space: pre; word-spacing: normal; word-break: normal; overflow-wrap: normal; tab-size: 4; hyphens: none; line-height: 1.9; font-weight: 500; padding: 0px 0.125rem; box-shadow: rgba(0, 0, 0, 0.075) 0px 1px 1px; user-select: auto; display: inline-flex; max-width: 100%; overflow-x: auto; vertical-align: middle; --tw-text-opacity:1 !important; --tw-bg-opacity:1 !important;\">hasOne</code><span>&nbsp;</span>method is the name of the related model class. Once the relationship is defined, we may retrieve the related record using Eloquent\'s dynamic properties. Dynamic properties allow you to access relationship methods as if they were properties defined on the model:</p><p><br></p><pre class=\" language-php\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; font-family: source-code-pro, ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, &quot;Liberation Mono&quot;, &quot;Courier New&quot;, monospace; font-size: medium; margin: 0.5em 0px 2em; color: rgba(255,124,117,var(--tw-text-opacity)) !important; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: rgba(37,42,55,var(--tw-bg-opacity)) !important; text-align: left; white-space: pre; word-spacing: 0px; word-break: normal; overflow-wrap: normal; tab-size: 4; hyphens: none; padding: 1em; overflow: auto; max-width: 100%; box-shadow: rgba(0, 0, 0, 0.075) 0px 1px 1px; user-select: auto; --tw-bg-opacity:1 !important; --tw-text-opacity:1 !important; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; -webkit-text-stroke-width: 0px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><code class=\" language-php\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; font-family: source-code-pro, ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, &quot;Liberation Mono&quot;, &quot;Courier New&quot;, monospace; font-size: 0.8rem; color: rgba(231,232,242,var(--tw-text-opacity)) !important; background: none; text-align: left; white-space: pre; word-spacing: normal; word-break: normal; overflow-wrap: normal; tab-size: 4; hyphens: none; line-height: 1.9; font-weight: 500; --tw-text-opacity:1 !important;\"><span class=\"token variable\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; color: rgba(10,178,245,var(--tw-text-opacity)) !important; --tw-text-opacity:1 !important;\">$phone</span> <span class=\"token operator\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; color: rgba(231,232,242,var(--tw-text-opacity)) !important; --tw-text-opacity:1 !important;\">=</span> User<span class=\"token punctuation\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; color: rgba(231,232,242,var(--tw-text-opacity)) !important; --tw-text-opacity:1 !important;\">:</span><span class=\"token punctuation\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; color: rgba(231,232,242,var(--tw-text-opacity)) !important; --tw-text-opacity:1 !important;\">:</span><span class=\"token function\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; color: rgba(255,124,117,var(--tw-text-opacity)) !important; --tw-text-opacity:1 !important;\">find</span><span class=\"token punctuation\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; color: rgba(231,232,242,var(--tw-text-opacity)) !important; --tw-text-opacity:1 !important;\">(</span><span class=\"token number\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; color: rgba(255,124,117,var(--tw-text-opacity)) !important; --tw-text-opacity:1 !important;\">1</span><span class=\"token punctuation\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; color: rgba(231,232,242,var(--tw-text-opacity)) !important; --tw-text-opacity:1 !important;\">)</span><span class=\"token operator\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; color: rgba(231,232,242,var(--tw-text-opacity)) !important; --tw-text-opacity:1 !important;\">-</span><span class=\"token operator\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; color: rgba(231,232,242,var(--tw-text-opacity)) !important; --tw-text-opacity:1 !important;\">&gt;</span><span class=\"token property\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; color: rgba(255,124,117,var(--tw-text-opacity)) !important; --tw-text-opacity:1 !important;\">phone</span><span class=\"token punctuation\" style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; color: rgba(231,232,242,var(--tw-text-opacity)) !important; --tw-text-opacity:1 !important;\">;</span></code></pre><p><br></p><p style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; margin: 0px 0px 2em; font-size: medium; line-height: 1.8em; color: rgba(181,181,189,var(--tw-text-opacity)) !important; --tw-text-opacity:1 !important; font-family: scandia-web, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(23, 25, 35); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Eloquent determines the foreign key of the relationship based on the parent model name. In this case, the<span>&nbsp;</span><code style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; font-family: source-code-pro, ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, &quot;Liberation Mono&quot;, &quot;Courier New&quot;, monospace; font-size: 0.8rem; color: rgba(255,124,117,var(--tw-text-opacity)) !important; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: rgba(37,42,55,var(--tw-bg-opacity)) !important; text-align: left; white-space: pre; word-spacing: normal; word-break: normal; overflow-wrap: normal; tab-size: 4; hyphens: none; line-height: 1.9; font-weight: 500; padding: 0px 0.125rem; box-shadow: rgba(0, 0, 0, 0.075) 0px 1px 1px; user-select: auto; display: inline-flex; max-width: 100%; overflow-x: auto; vertical-align: middle; --tw-text-opacity:1 !important; --tw-bg-opacity:1 !important;\">Phone</code><span>&nbsp;</span>model is automatically assumed to have a<span>&nbsp;</span><code style=\"box-sizing: border-box; border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(10,178,245,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; font-family: source-code-pro, ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, &quot;Liberation Mono&quot;, &quot;Courier New&quot;, monospace; font-size: 0.8rem; color: rgba(255,124,117,var(--tw-text-opacity)) !important; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: rgba(37,42,55,var(--tw-bg-opacity)) !important; text-align: left; white-space: pre; word-spacing: normal; word-break: normal; overflow-wrap: normal; tab-size: 4; hyphens: none; line-height: 1.9; font-weight: 500; padding: 0px 0.125rem; box-shadow: rgba(0, 0, 0, 0.075) 0px 1px 1px; user-select: auto; display: inline-flex; max-width: 100%; overflow-x: auto; vertical-align: middle; --tw-text-opacity:1 !important; --tw-bg-opacity:1 !important;\">use</code></p><p><br></p>', NULL, 0, 1, NULL, 'Corrupti unde iusto', 'In aute aut qui ipsu', 'Libero irure cupidat', '2021-10-04 00:51:17', '2021-10-04 01:40:31', NULL),
(2, 'Sunt qui anim ad ali', 'sunt-qui-anim-ad-ali', NULL, 'Omnis qui veniam su', NULL, '6', 0, 1, NULL, 'Ut in et quo aut nih', 'Culpa provident rem', 'Distinctio Necessit', '2021-10-04 01:33:40', '2021-10-04 01:33:40', NULL),
(3, 'fdsa', 'fdsa', NULL, NULL, NULL, NULL, 1, 1, '2021-10-04 07:20:55', NULL, NULL, NULL, '2021-10-04 01:35:55', '2021-10-04 01:35:55', NULL),
(4, 'hjhjhh', 'hjhjhh', NULL, NULL, NULL, NULL, 1, 1, '2021-10-04 07:21:51', NULL, NULL, NULL, '2021-10-04 01:36:51', '2021-10-04 01:36:51', NULL),
(5, 'fasfasdf', 'fasfasdf', 'post_background_images/lsIVsv8yEpAlOH95CsxMJ3Zg8BZ3GZOTGYrU49sg.png', 'asdffsdsdaf', NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, '2021-10-04 01:38:29', '2021-10-04 01:38:52', NULL),
(6, 'Veniam atque offici', 'veniam-atque-offici', 'post_background_images/Jz2yu22yDYelmJfEPw4OHxKCbPm8OQTuwC4miLDT.jpg', 'A qui vel eveniet d', NULL, NULL, 1, 1, '2021-10-04 07:38:07', 'Laboriosam aute bla', 'Velit quis et dolori', 'Quia iure eius tempo', '2021-10-04 01:52:57', '2021-10-04 01:53:07', NULL);

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Lacey Cameron', 'bishal.khatri343@gmail.com', NULL, '$2y$10$b34VcmL7GR7q5YbOYCmrsuoBjC87OFotFs3z7KYv80umr9SiwulWG', NULL, '2021-09-27 00:50:10', '2021-09-27 00:50:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_pages`
--
ALTER TABLE `menu_pages`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu_pages`
--
ALTER TABLE `menu_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
