-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 01 Jun 2017 pada 10.03
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bukulapuk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bio` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `bio`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ahmad riyadh al faathin', 'ahmad.riyadh.al@faathin.com', '$2y$10$O5MkMC09mwyMYRcgOSXVxO5I6fMGcyyJzA/TYiTcBcRCkukU/TOSS', 1, 'b2S5BJ1oBKYD8OjpvODkeDtyxzktVG7JYbTwNodvEvtTn0sDj97AfvSxDcQT', '2017-05-27 01:32:21', '2017-05-27 06:42:09'),
(2, 'ahmad riyadh al faathin', 'joko8joki@gmail.com', '$2y$10$AwqaSfGy/Ucv5Ci2nuBzw.LgrIyu3vDaaBLXd7IZc0TDpXrQDW8vS', 2, 'E3yj2d9Eq5Dx2nlJ5nbuKsvrO268rAWrVKpKECoxnrjUtNeqoh6kMKfugXE6', '2017-05-27 06:50:03', '2017-05-27 06:50:08'),
(3, 'admin', 'admin1@bukulapuk.com', '$2y$10$VH31aNZOXuolSEQpbU1ZO.quclnKR8oOknuLGqqJ8.gUAaSVUvHPK', 9, 'iYVJ6aDIhPKyeU4X8IS6hXbZprJaOWCKll9RoVEyJ5yboWtIk2ngEnN21KwQ', '2017-05-27 07:42:55', '2017-05-27 07:42:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `admin_password_resets`
--

INSERT INTO `admin_password_resets` (`email`, `token`, `created_at`) VALUES
('ahmad.riyadh.al@faathin.com', 'e558e548b4ec68d86e610ea899a3d1b4397685b0d5eab2377bcaf40b566fe662', '2017-05-27 06:58:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bios`
--

CREATE TABLE `bios` (
  `id` int(10) UNSIGNED NOT NULL,
  `TagLine` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `bios`
--

INSERT INTO `bios` (`id`, `TagLine`, `img`, `created_at`, `updated_at`) VALUES
(1, 'Just For You!', 'noImg.png', NULL, NULL),
(2, 'Just For You!', 'noImg.png', NULL, NULL),
(9, 'Incredible is Absolute', 'noImg.png', '2017-05-27 07:42:55', '2017-05-27 07:42:55'),
(11, 'Just Incredible', 'noImg.png', '2017-05-27 07:52:46', '2017-05-27 07:52:46'),
(12, 'Just Incredible', 'noImg.png', '2017-05-27 07:54:16', '2017-05-27 07:54:16'),
(18, 'Just Incredible', 'noImg.png', '2017-05-27 08:56:52', '2017-05-27 08:56:52'),
(19, 'Just Incredible', 'noImg.png', '2017-05-29 08:18:47', '2017-05-29 08:18:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Balita', 'Buku Khusus Anak Bayi dibawah 5 Tahun', NULL, NULL),
(3, 'Remaja', 'Buku Khusus Remaja diatas 13 Tahun', NULL, NULL),
(4, 'Dewasa', 'Buku Khusus Dewasa 17+', '2017-05-29 01:17:55', '2017-05-29 01:17:55'),
(7, 'Romansa', 'Kategori 5', '2017-05-29 01:51:22', '2017-05-29 02:23:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `chats`
--

CREATE TABLE `chats` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_person` int(10) UNSIGNED NOT NULL,
  `second_person` int(10) UNSIGNED NOT NULL,
  `chat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `member` int(10) UNSIGNED NOT NULL,
  `product` int(10) UNSIGNED NOT NULL,
  `status` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `commentary` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `comments`
--

INSERT INTO `comments` (`id`, `member`, `product`, `status`, `commentary`, `created_at`, `updated_at`) VALUES
(3, 10, 53, 1, 'Ini Contoh Komen', '2017-05-29 09:47:43', '2017-05-29 09:47:43'),
(4, 10, 56, 1, 'Test', '2017-05-29 15:43:22', '2017-05-29 19:03:38'),
(5, 9, 56, 1, 'halo', '2017-05-29 15:48:00', '2017-05-29 15:48:00'),
(6, 10, 57, 1, 'Coba', '2017-05-29 18:48:52', '2017-05-29 18:48:52'),
(7, 10, 59, 1, 'tes', '2017-05-31 23:36:15', '2017-05-31 23:36:15'),
(8, 10, 59, 1, 'tes', '2017-05-31 23:36:56', '2017-05-31 23:36:56'),
(9, 10, 59, 1, 'tes', '2017-05-31 23:37:35', '2017-05-31 23:37:35'),
(10, 10, 53, 1, 'test', '2017-06-01 00:49:08', '2017-06-01 00:49:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `comment__statuses`
--

CREATE TABLE `comment__statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `comment__statuses`
--

INSERT INTO `comment__statuses` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Aktif', 'Komen Aktif dan Disetujui', NULL, NULL),
(2, 'Terminate', 'Komentar Ditangguhkan\r\n', NULL, '2017-05-29 14:21:22'),
(3, 'Uji', 'Uji', '2017-05-29 14:22:00', '2017-05-29 14:22:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `members`
--

CREATE TABLE `members` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `email_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `members`
--

INSERT INTO `members` (`id`, `name`, `email`, `password`, `status`, `email_token`, `bio`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'member1', 'member1@gmail.com', '$2y$10$Oo0W/w/QvF7LR5QR6Hqut.ap1Jnn/QVijRhiMQcqjAnNKlfQAgY8m', 1, 'NwUaETbyUkyFscGUf15v4uauCPg5ZnvE', 11, NULL, '2017-05-27 07:52:46', '2017-05-29 08:39:47'),
(3, 'Bukulapuk Dummy 2', 'member2@gmail.com', '$2y$10$sm9VS.cUzKrbf1Fc1s62j.NilZZvR0dAI2lkuBG7xWXMWDd9r/UVm', 1, 'fOdbK1FCl8nvmacVD5a4O2jRuP2aZB7Z', 12, NULL, '2017-05-27 07:54:16', '2017-05-29 08:46:44'),
(9, 'Bukulapuk Dummy 3', 'buku@myu.com', '$2y$10$qm6pSUVVhe6WlOrIu.A1OuWM9hPYLruQBKjPbt02HXFK4YfYcy1h.', 1, 'alT9I3RG6y21JaB6wYF4jadgCqRwSall', 18, 'RlIYDBDmB36cJbzuu0WBjtOyQSYQYoJfK0qtpBhAdobnYNkyO8wyUhVCltAs', '2017-05-27 08:56:52', '2017-05-29 08:46:13'),
(10, 'Bukulapuk Dummy 4', 'bukulapuk3@me.com', '$2y$10$DVTj007eq7IKH3zRJvK12.1V5zHyv49Ei74uneh6ncyP/oW3fKhmu', 1, NULL, 19, 'P2rGrsAUmI8EGIrwZeB8SRIl6PvzKxdCI88cMgPT3OuA6u0DroFHl4OfVmMU', '2017-05-29 08:18:47', '2017-05-29 08:46:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member_password_resets`
--

CREATE TABLE `member_password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `member_password_resets`
--

INSERT INTO `member_password_resets` (`email`, `token`, `created_at`) VALUES
('buku@myu.com', '$2y$10$gbOK7KRNjpdKaqbChiBh.eV74HMRH4p7tEoIZX25MY.i2kK6OKSDm', '2017-05-29 08:17:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member__addresses`
--

CREATE TABLE `member__addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `member` int(10) UNSIGNED NOT NULL,
  `alamat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `member__statuses`
--

CREATE TABLE `member__statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `member__statuses`
--

INSERT INTO `member__statuses` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Belum Diaktivasi', 'User sudah mendaftar dan belum mengaktivasi', NULL, '2017-05-29 04:23:36'),
(2, 'Aktif', 'Uses sudah mendaftar dan sudah diaktivasi', NULL, NULL),
(3, 'Banned', 'User Di Banned karena melanggar peraturan yang sudah ditetapkan', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(26, '2017_05_17_060101_create_bios_table', 1),
(27, '2017_05_18_01_create_member__statuses_table', 1),
(28, '2017_05_18_102745_create_admins_table', 1),
(29, '2017_05_18_102746_create_admin_password_resets_table', 1),
(30, '2017_05_18_102817_create_members_table', 1),
(31, '2017_05_18_102818_create_member_password_resets_table', 1),
(32, '2017_05_19_081032_create_payment__methods_table', 1),
(33, '2017_05_19_081038_create_payments_table', 1),
(34, '2017_05_19_081112_create_member__addresses_table', 1),
(35, '2017_05_19_0811490_create_shipping__methods_table', 1),
(36, '2017_05_19_081706_create_product__statuses_table', 1),
(37, '2017_05_19_081814_create_categories_table', 1),
(38, '2017_05_19_081835_create_products_table', 1),
(39, '2017_05_19_081950_create_product__images_table', 1),
(40, '2017_05_19_082007_create_order__statuses_table', 1),
(41, '2017_05_19_082008_create_orders_table', 1),
(42, '2017_05_19_082141_create_shippings_table', 1),
(43, '2017_05_19_082204_create_comment__statuses_table', 1),
(44, '2017_05_19_082206_create_comments_table', 1),
(45, '2017_05_19_082216_create_chats_table', 1),
(46, '2017_05_19_082310_create_notification_types_table', 1),
(47, '2017_05_19_082312_create_notifications_table', 1),
(48, '2017_05_27_020737_create_order_details_table', 1),
(49, '2017_05_28_051226_create_publishers_table', 2),
(50, '2017_05_28_051310_create_product__metas_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(10) UNSIGNED NOT NULL,
  `member` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `notifications`
--

INSERT INTO `notifications` (`id`, `text`, `type`, `member`, `created_at`, `updated_at`) VALUES
(3, 'Bukulapuk Dummy 4 Telah Memesan XXX.', 2, 10, '2017-05-31 23:19:13', '2017-05-31 23:19:13'),
(4, 'Bukulapuk Dummy 4 Telah Memesan Dummy 1.', 2, 10, '2017-05-31 23:29:05', '2017-05-31 23:29:05'),
(5, 'Bukulapuk Dummy 4 Telah Memesan A Song of Ice And Fire.', 2, 10, '2017-05-31 23:29:26', '2017-05-31 23:29:26'),
(6, 'Bukulapuk Dummy 4 Telah Memesan A Game Of Thrones.', 2, 10, '2017-05-31 23:29:58', '2017-05-31 23:29:58'),
(7, 'Bukulapuk Dummy 4 Telah Membatalkan Pesanan A Game Of Thrones.', 4, 10, '2017-05-31 23:31:55', '2017-05-31 23:31:55'),
(8, 'Bukulapuk Dummy 4 telah berkomentar pada produk XXX.', 8, 10, '2017-05-31 23:37:35', '2017-05-31 23:37:35'),
(9, 'Bukulapuk Dummy 4 telah memesan xx.', 2, 9, '2017-06-01 00:46:46', '2017-06-01 00:46:46'),
(10, 'Bukulapuk Dummy 4 telah berkomentar pada produk A Song Of Ice And Fire.', 8, 9, '2017-06-01 00:49:08', '2017-06-01 00:49:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notification__types`
--

CREATE TABLE `notification__types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `notification__types`
--

INSERT INTO `notification__types` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'info', 'info dari administrator', NULL, NULL),
(2, 'order available', 'terdapat order baru pada sebuah produk\r\n', NULL, NULL),
(3, 'order ok', 'order diterima oleh seller', NULL, NULL),
(4, 'order cancel', 'order dibatalkan oleh pembeli\r\n', NULL, NULL),
(5, 'order terminate', 'order dibatalkan oleh admin', NULL, NULL),
(6, 'product accepted', 'product diterima oleh admin', NULL, NULL),
(7, 'product terminated', 'product di terminate oleh admin', NULL, NULL),
(8, 'comment on product', 'Telah Berkomentar di produk', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `member` int(10) UNSIGNED NOT NULL,
  `status` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `payment` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `member`, `status`, `payment`, `created_at`, `updated_at`) VALUES
(2, 9, 1, NULL, '2017-05-31 06:55:01', '2017-05-31 06:55:01'),
(3, 10, 1, NULL, '2017-05-31 23:19:13', '2017-05-31 23:19:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order__details`
--

CREATE TABLE `order__details` (
  `id` int(10) UNSIGNED NOT NULL,
  `order` int(10) UNSIGNED NOT NULL,
  `product` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `order__details`
--

INSERT INTO `order__details` (`id`, `order`, `product`, `quantity`, `created_at`, `updated_at`) VALUES
(2, 2, 58, 2, '2017-05-31 07:17:05', '2017-05-31 07:17:07'),
(4, 2, 56, 1, '2017-05-31 07:21:01', '2017-05-31 07:21:01'),
(5, 3, 59, 1, '2017-05-31 23:19:13', '2017-05-31 23:19:13'),
(6, 3, 57, 1, '2017-05-31 23:29:05', '2017-05-31 23:29:05'),
(7, 3, 58, 1, '2017-05-31 23:29:26', '2017-05-31 23:29:26'),
(8, 3, 71, 1, '2017-06-01 00:46:46', '2017-06-01 00:46:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order__statuses`
--

CREATE TABLE `order__statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `order__statuses`
--

INSERT INTO `order__statuses` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'On Hold', 'Order belum di checkout', NULL, NULL),
(2, 'On Wait', 'Order masih belum disetujui seller', NULL, NULL),
(3, 'Terminate by User', 'Order di batalkan user', NULL, NULL),
(4, 'Terminate by Admin', 'Order di batalkan oleh admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `total` int(11) NOT NULL,
  `method` int(10) UNSIGNED NOT NULL,
  `verified` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment__methods`
--

CREATE TABLE `payment__methods` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `payment__methods`
--

INSERT INTO `payment__methods` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'COD', 'Metode Paling Aman\r\n', '2017-05-29 14:37:57', '2017-05-29 14:38:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `penerbit` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `category` int(10) UNSIGNED NOT NULL,
  `status` int(10) UNSIGNED NOT NULL,
  `tahun_terbit` int(11) NOT NULL,
  `member` int(10) UNSIGNED NOT NULL,
  `img_main` varchar(255) COLLATE utf8_unicode_ci DEFAULT '/assets/images/notfound.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `judul`, `harga`, `penerbit`, `description`, `kuantitas`, `category`, `status`, `tahun_terbit`, `member`, `img_main`, `created_at`, `updated_at`) VALUES
(53, 'A Song Of Ice And Fire', 50000, 1, 'Buku Asoiaf karya George R.R Martin', 10, 3, 1, 1960, 9, '/assets/images/notfound.jpg', '2017-05-29 00:45:34', '2017-05-29 08:33:31'),
(56, 'A Game Of Thrones', 200000, 1, 'A Game of Thrones adalah buku karya George R.RMartin dari seri A song Of Ice and Fire', 10, 4, 1, 1950, 10, '/assets/images/notfound.jpg', '2017-05-29 15:26:02', '2017-05-29 18:14:55'),
(57, 'Dummy 1', 200000, 1, 'Dummy', 10, 2, 1, 1950, 10, '/assets/images/notfound.jpg', '2017-05-29 15:32:15', '2017-05-29 15:33:09'),
(58, 'A Song of Ice And Fire', 200000, 1, 'Buku ASOIAF', 3, 4, 1, 1950, 10, '/assets/images/notfound.jpg', '2017-05-29 18:58:46', '2017-05-29 18:59:59'),
(59, 'XXX', 200000, 1, 'XXX', 10, 2, 1, 1950, 10, '/assets/images/notfound.jpg', '2017-05-29 19:20:12', '2017-05-29 19:20:26'),
(71, 'xx', 200000, 1, 'xx', 10, 2, 1, 1950, 9, '/assets/images/products/a4096435fcb231961694f918689daa3b26e3056d43721ac5e7ebbd2ead6302bcf18b6413957f185c7496603ebe6f46bdb05a9a888b9aabccb216d2e1513f7115.jpg', '2017-05-30 07:27:46', '2017-05-30 07:29:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product__images`
--

CREATE TABLE `product__images` (
  `id` int(10) UNSIGNED NOT NULL,
  `product` int(10) UNSIGNED NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `product__metas`
--

CREATE TABLE `product__metas` (
  `id` int(10) UNSIGNED NOT NULL,
  `product` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `product__metas`
--

INSERT INTO `product__metas` (`id`, `product`, `title`, `keywords`, `description`, `created_at`, `updated_at`) VALUES
(50, 53, 'A Song Of Ice And Fire', 'GOT, ASOIAF, Game Of Thrones', 'Game Of Thrones, GOT, ASOIAF', '2017-05-29 00:45:34', '2017-05-29 00:45:34'),
(52, 56, 'A Game Of Thrones', 'ASOIAF, GOT', 'A Game of Thrones adalah buku karya George R.RMartin dari seri A song Of Ice and Fire', '2017-05-29 15:26:02', '2017-05-29 15:43:00'),
(53, 57, 'Dummy', 'Dummy', 'Dummy', '2017-05-29 15:32:15', '2017-05-29 15:32:15'),
(54, 58, 'Buku ASOIAF', 'Buku ASOIAF', 'Buku ASOIAF', '2017-05-29 18:58:46', '2017-05-29 18:58:46'),
(55, 59, 'XXX', 'XXX', 'XXX', '2017-05-29 19:20:12', '2017-05-29 19:20:12'),
(64, 71, 'xx', 'xx', 'xxx', '2017-05-30 07:27:46', '2017-05-30 07:27:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product__statuses`
--

CREATE TABLE `product__statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `product__statuses`
--

INSERT INTO `product__statuses` (`id`, `name`, `details`, `created_at`, `updated_at`) VALUES
(1, 'Aktif', 'Produk sudah disetujui oleh administrator', NULL, NULL),
(2, 'Pending', 'Produk masih di monitor oleh Admin untuk proses aktivasi', NULL, NULL),
(3, 'Banned', 'Produk di Banned karena melanggar peraturan', '2017-05-29 14:24:39', '2017-05-29 14:24:39'),
(4, 'Draft', 'Produk masih dalam bentuk draft belum di finalisasi.\r\n', NULL, '2017-05-29 14:13:14'),
(5, 'Offline', 'Produk Di Nonaktifkan Oleh Pengguna', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `publishers`
--

CREATE TABLE `publishers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `publishers`
--

INSERT INTO `publishers` (`id`, `name`, `description`, `img`, `created_at`, `updated_at`) VALUES
(1, 'Kompas', 'Kompas Gramedia', '/assets/img/pub/kompas.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `shippings`
--

CREATE TABLE `shippings` (
  `id` int(10) UNSIGNED NOT NULL,
  `order` int(10) UNSIGNED NOT NULL,
  `methods` int(10) UNSIGNED NOT NULL,
  `address` int(10) UNSIGNED NOT NULL,
  `resi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `shipping__methods`
--

CREATE TABLE `shipping__methods` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `shipping__methods`
--

INSERT INTO `shipping__methods` (`id`, `name`, `description`, `price`, `created_at`, `updated_at`) VALUES
(1, 'JNE Reguler', 'JNE Reguler memakan waktu 3-7 Hari Kerja', 10000, NULL, NULL),
(2, 'JNE YES', 'JNE YES memakan waktu 1-2 Hari Kerja', 28000, NULL, NULL),
(3, 'POS Indonesia', 'POS Indonesia Memakan waktu 5-7 Hari Kerja', 8000, NULL, NULL),
(4, 'POS Indonesia Ekspress', 'POS Indonesia Ekspress memakan waktu 1-3 Hari Kerja', 15000, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD KEY `admins_bio_index` (`bio`);

--
-- Indexes for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD KEY `admin_password_resets_email_index` (`email`),
  ADD KEY `admin_password_resets_token_index` (`token`);

--
-- Indexes for table `bios`
--
ALTER TABLE `bios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chats_first_person_index` (`first_person`),
  ADD KEY `chats_second_person_index` (`second_person`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_member_index` (`member`),
  ADD KEY `comments_product_index` (`product`),
  ADD KEY `comments_status_index` (`status`);

--
-- Indexes for table `comment__statuses`
--
ALTER TABLE `comment__statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `members_email_unique` (`email`),
  ADD KEY `members_status_foreign` (`status`),
  ADD KEY `members_bio_index` (`bio`);

--
-- Indexes for table `member_password_resets`
--
ALTER TABLE `member_password_resets`
  ADD KEY `member_password_resets_email_index` (`email`),
  ADD KEY `member_password_resets_token_index` (`token`);

--
-- Indexes for table `member__addresses`
--
ALTER TABLE `member__addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member__addresses_member_index` (`member`);

--
-- Indexes for table `member__statuses`
--
ALTER TABLE `member__statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_type_index` (`type`),
  ADD KEY `notifications_member_index` (`member`);

--
-- Indexes for table `notification__types`
--
ALTER TABLE `notification__types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_member_index` (`member`),
  ADD KEY `orders_status_index` (`status`),
  ADD KEY `orders_payment_index` (`payment`);

--
-- Indexes for table `order__details`
--
ALTER TABLE `order__details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_index` (`order`),
  ADD KEY `product` (`product`);

--
-- Indexes for table `order__statuses`
--
ALTER TABLE `order__statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_method_foreign` (`method`);

--
-- Indexes for table `payment__methods`
--
ALTER TABLE `payment__methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_index` (`category`),
  ADD KEY `products_status_index` (`status`),
  ADD KEY `member` (`member`),
  ADD KEY `penerbit` (`penerbit`),
  ADD KEY `img_main` (`img_main`);

--
-- Indexes for table `product__images`
--
ALTER TABLE `product__images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product__images_product_index` (`product`);

--
-- Indexes for table `product__metas`
--
ALTER TABLE `product__metas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreignkey_product_metas_product` (`product`);

--
-- Indexes for table `product__statuses`
--
ALTER TABLE `product__statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shippings_order_index` (`order`),
  ADD KEY `shippings_methods_index` (`methods`),
  ADD KEY `shippings_address_index` (`address`);

--
-- Indexes for table `shipping__methods`
--
ALTER TABLE `shipping__methods`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `bios`
--
ALTER TABLE `bios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `comment__statuses`
--
ALTER TABLE `comment__statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `member__addresses`
--
ALTER TABLE `member__addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `member__statuses`
--
ALTER TABLE `member__statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `notification__types`
--
ALTER TABLE `notification__types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `order__details`
--
ALTER TABLE `order__details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `order__statuses`
--
ALTER TABLE `order__statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment__methods`
--
ALTER TABLE `payment__methods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `product__images`
--
ALTER TABLE `product__images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product__metas`
--
ALTER TABLE `product__metas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `product__statuses`
--
ALTER TABLE `product__statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shipping__methods`
--
ALTER TABLE `shipping__methods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_bio_foreign` FOREIGN KEY (`bio`) REFERENCES `bios` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `chats_first_person_foreign` FOREIGN KEY (`first_person`) REFERENCES `members` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chats_second_person_foreign` FOREIGN KEY (`second_person`) REFERENCES `members` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_member_foreign` FOREIGN KEY (`member`) REFERENCES `members` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_product_foreign` FOREIGN KEY (`product`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_status_foreign` FOREIGN KEY (`status`) REFERENCES `comment__statuses` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_bio_foreign` FOREIGN KEY (`bio`) REFERENCES `bios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `members_status_foreign` FOREIGN KEY (`status`) REFERENCES `member__statuses` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `member__addresses`
--
ALTER TABLE `member__addresses`
  ADD CONSTRAINT `member__addresses_member_foreign` FOREIGN KEY (`member`) REFERENCES `members` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_member_foreign` FOREIGN KEY (`member`) REFERENCES `members` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notifications_type_foreign` FOREIGN KEY (`type`) REFERENCES `notification__types` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_member_foreign` FOREIGN KEY (`member`) REFERENCES `members` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_payment_foreign` FOREIGN KEY (`payment`) REFERENCES `payments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_status_foreign` FOREIGN KEY (`status`) REFERENCES `order__statuses` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `order__details`
--
ALTER TABLE `order__details`
  ADD CONSTRAINT `order_details_order_foreign` FOREIGN KEY (`order`) REFERENCES `members` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_product_foreign` FOREIGN KEY (`product`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_method_foreign` FOREIGN KEY (`method`) REFERENCES `payment__methods` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_foreign` FOREIGN KEY (`category`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_member_foreign` FOREIGN KEY (`member`) REFERENCES `members` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_publishers_foreign` FOREIGN KEY (`penerbit`) REFERENCES `publishers` (`id`),
  ADD CONSTRAINT `products_status_foreign` FOREIGN KEY (`status`) REFERENCES `product__statuses` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `product__images`
--
ALTER TABLE `product__images`
  ADD CONSTRAINT `product__images_product_foreign` FOREIGN KEY (`product`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `product__metas`
--
ALTER TABLE `product__metas`
  ADD CONSTRAINT `foreignkey_product_metas_product` FOREIGN KEY (`product`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `shippings`
--
ALTER TABLE `shippings`
  ADD CONSTRAINT `shippings_address_foreign` FOREIGN KEY (`address`) REFERENCES `member__addresses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `shippings_methods_foreign` FOREIGN KEY (`methods`) REFERENCES `shipping__methods` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `shippings_order_foreign` FOREIGN KEY (`order`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
