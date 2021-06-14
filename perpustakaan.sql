-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 14 Jun 2021 pada 07.42
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id16716850_perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `book_data_id` int(11) NOT NULL,
  `book_code` varchar(30) NOT NULL,
  `quality` varchar(255) NOT NULL,
  `source_book` varchar(255) DEFAULT NULL,
  `can_borrow` int(11) NOT NULL DEFAULT 1,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `books`
--

INSERT INTO `books` (`id`, `book_data_id`, `book_code`, `quality`, `source_book`, `can_borrow`, `created_at`, `updated_at`) VALUES
(33, 2, 'BK-608827292024A', 'Baik', 'Bantuan BOS', 1, '2021-04-27', '2021-04-27'),
(37, 2, 'BK-6088E9B193ACD', 'Baik', 'Bantuan BOS', 0, '2021-04-28', '2021-04-28'),
(38, 2, 'BK-6088E9B19BC6B', 'Baik', 'Bantuan BOS', 1, '2021-04-28', '2021-04-28'),
(39, 2, 'BK-6088E9B19FAF8', 'Baik', 'Bantuan BOS', 1, '2021-04-28', '2021-04-28'),
(40, 2, 'BK-6088E9B1A0739', 'Baik', 'Bantuan BOS', 1, '2021-04-28', '2021-04-28'),
(41, 2, 'BK-6088E9B1A1546', 'Baik', 'Bantuan BOS', 1, '2021-04-28', '2021-04-28'),
(42, 9, 'BK-608B8C26903D2', 'Baik', 'Donasi', 1, '2021-04-30', '2021-04-30'),
(43, 9, 'BK-608B8C2698C89', 'Baik', 'Donasi', 1, '2021-04-30', '2021-04-30'),
(45, 10, 'BK-608B949E06A43', 'Baik', 'Donasi', 1, '2021-04-30', '2021-04-30'),
(46, 12, 'BK-608B987A86D09', 'Baik', 'BOS', 0, '2021-04-30', '2021-04-30'),
(47, 12, 'BK-608B987A8B5A7', 'Baik', 'BOS', 0, '2021-04-30', '2021-04-30'),
(48, 12, 'BK-608B987A8BF75', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(49, 12, 'BK-608B987A8C391', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(50, 12, 'BK-608B987A8C7AE', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(51, 12, 'BK-608B987A8CBFF', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(52, 12, 'BK-608B987A8CF9A', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(53, 12, 'BK-608B987A8D34F', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(54, 12, 'BK-608B987A8D757', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(55, 12, 'BK-608B987A8DAC1', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(56, 12, 'BK-608B987A8DE0E', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(57, 12, 'BK-608B987A8E128', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(58, 12, 'BK-608B987A8E47A', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(59, 12, 'BK-608B987A8E757', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(60, 12, 'BK-608B987A8EAD0', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(61, 12, 'BK-608B987A8EE96', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(62, 12, 'BK-608B987A8F254', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(63, 12, 'BK-608B987A8F621', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(64, 12, 'BK-608B987A8F94A', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(65, 12, 'BK-608B987A8FC1C', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(66, 12, 'BK-608B987A8FEB2', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(67, 12, 'BK-608B987A90173', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(68, 12, 'BK-608B987A90531', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(69, 12, 'BK-608B987A90849', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(70, 12, 'BK-608B987A90B91', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(71, 12, 'BK-608B987A90E4A', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(72, 12, 'BK-608B987A91134', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(73, 12, 'BK-608B987A91408', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(74, 12, 'BK-608B987A9172D', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(75, 12, 'BK-608B987A919E8', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(76, 12, 'BK-608B987A91D33', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(77, 12, 'BK-608B987A920F9', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(78, 12, 'BK-608B987A9241A', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(79, 12, 'BK-608B987A92768', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(80, 12, 'BK-608B987A92AF8', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(81, 12, 'BK-608B987A92D92', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(82, 12, 'BK-608B987A93056', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(83, 12, 'BK-608B987A93336', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(84, 12, 'BK-608B987A93631', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(85, 12, 'BK-608B987A938E7', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(86, 12, 'BK-608B987A93C1F', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(87, 12, 'BK-608B987A93F40', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(88, 12, 'BK-608B987A942C3', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(89, 12, 'BK-608B987A945CC', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(90, 12, 'BK-608B987A94914', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(91, 12, 'BK-608B987A94CA9', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(92, 12, 'BK-608B987A94FEF', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(93, 12, 'BK-608B987A952E7', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(94, 12, 'BK-608B987A955C8', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(95, 12, 'BK-608B987A95870', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(96, 12, 'BK-608B987A95BED', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(97, 12, 'BK-608B987A95F4D', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(98, 12, 'BK-608B987A962DE', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(99, 12, 'BK-608B987A96622', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(100, 12, 'BK-608B987A96922', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(101, 12, 'BK-608B987A96C4C', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(102, 12, 'BK-608B987A96F84', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(103, 12, 'BK-608B987A97351', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(104, 12, 'BK-608B987A976E8', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(105, 12, 'BK-608B987A97A69', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(106, 12, 'BK-608B987A97E38', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(107, 12, 'BK-608B987A98214', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(108, 12, 'BK-608B987A98587', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(109, 12, 'BK-608B987A98940', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(110, 12, 'BK-608B987A98C84', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(111, 12, 'BK-608B987A98F4F', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(112, 12, 'BK-608B987A9923A', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(113, 12, 'BK-608B987A99650', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(114, 12, 'BK-608B987A99A0C', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(115, 12, 'BK-608B987A99E0F', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(116, 12, 'BK-608B987A9A1C7', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(117, 12, 'BK-608B987A9A80F', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(118, 12, 'BK-608B987A9ABFF', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(119, 12, 'BK-608B987A9AF6D', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(120, 12, 'BK-608B987A9B2AB', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(121, 12, 'BK-608B987A9B6B8', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(122, 12, 'BK-608B987A9BA3D', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(123, 12, 'BK-608B987A9BE14', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(124, 12, 'BK-608B987A9E6B7', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(125, 12, 'BK-608B987A9EAE1', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(126, 12, 'BK-608B987A9EE85', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(127, 12, 'BK-608B987A9F1E2', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(128, 12, 'BK-608B987A9F52A', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(129, 12, 'BK-608B987A9F889', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(130, 12, 'BK-608B987A9FBF2', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(131, 12, 'BK-608B987A9FF67', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(132, 12, 'BK-608B987AA02AA', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(133, 12, 'BK-608B987AA071C', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(134, 12, 'BK-608B987AA0AD1', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(135, 12, 'BK-608B987AA0E7F', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(136, 12, 'BK-608B987AA1246', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(137, 12, 'BK-608B987AA16AD', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(138, 12, 'BK-608B987AA1A60', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(139, 12, 'BK-608B987AA1D67', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(140, 12, 'BK-608B987AA20A3', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(141, 12, 'BK-608B987AA23BE', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(142, 12, 'BK-608B987AA27E8', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(143, 12, 'BK-608B987AA2B04', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(144, 12, 'BK-608B987AA2E9F', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(145, 12, 'BK-608B987AA31BD', 'Baik', 'BOS', 1, '2021-04-30', '2021-04-30'),
(146, 14, 'BK-608B9D60D199B', 'Baik', 'Donasi', 1, '2021-04-30', '2021-04-30'),
(147, 16, 'BK-60B5EEF2E3A8A', 'Baik', 'Beli', 1, '2021-06-01', '2021-06-01'),
(148, 16, 'BK-60B5EEF2E981E', 'Baik', 'Beli', 1, '2021-06-01', '2021-06-01'),
(149, 16, 'BK-60B5EEF2E9BA1', 'Baik', 'Beli', 1, '2021-06-01', '2021-06-01'),
(150, 16, 'BK-60B5EEF2E9E2B', 'Baik', 'Beli', 1, '2021-06-01', '2021-06-01'),
(151, 16, 'BK-60B5EEF2EA0A5', 'Baik', 'Beli', 1, '2021-06-01', '2021-06-01'),
(152, 17, 'BK-60B74B0A215BE', 'Baik', 'Beli', 1, '2021-06-02', '2021-06-02'),
(153, 17, 'BK-60B74B0A27C63', 'Baik', 'Beli', 1, '2021-06-02', '2021-06-02'),
(154, 17, 'BK-60B74B0A27F73', 'Baik', 'Beli', 1, '2021-06-02', '2021-06-02'),
(155, 18, 'BK-60B74B93496A1', 'Baik', 'Beli', 1, '2021-06-02', '2021-06-02'),
(156, 18, 'BK-60B74B935064B', 'Tentukan Kualitas Buku', 'Beli', 1, '2021-06-02', '2021-06-02'),
(157, 3, 'BK-60B7A1BF876B1', 'Baik', 'Beli', 1, '2021-06-02', '2021-06-02'),
(158, 3, 'BK-60B7A1BF8E277', 'Baik', 'Beli', 1, '2021-06-02', '2021-06-02'),
(159, 15, 'BK-60B7A1EA27805', 'Baik', 'Beli', 1, '2021-06-02', '2021-06-02'),
(160, 15, 'BK-60B7A1EA3178A', 'Baik', 'Beli', 1, '2021-06-02', '2021-06-02'),
(161, 3, 'BK-60B8510428A3A', 'Baik', 'Beli', 1, '2021-06-03', '2021-06-03'),
(162, 3, 'BK-60B851042C9CF', 'Baik', 'Beli', 1, '2021-06-03', '2021-06-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `books_category`
--

CREATE TABLE `books_category` (
  `id` int(11) NOT NULL,
  `category` varchar(128) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `books_category`
--

INSERT INTO `books_category` (`id`, `category`, `description`) VALUES
(1, 'Novel', ''),
(2, 'Dongeng', ''),
(4, 'Komik', ''),
(5, 'Umum', 'Buku bacaan umum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `books_data`
--

CREATE TABLE `books_data` (
  `id` int(11) NOT NULL,
  `book_title` varchar(128) NOT NULL,
  `book_cover` varchar(255) NOT NULL,
  `buku_paket` int(11) NOT NULL DEFAULT 0,
  `book_category_id` int(11) NOT NULL,
  `book_type_id` int(11) NOT NULL DEFAULT 1,
  `author` varchar(128) NOT NULL,
  `publisher` varchar(128) NOT NULL,
  `publication_year` year(4) NOT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `books_data`
--

INSERT INTO `books_data` (`id`, `book_title`, `book_cover`, `buku_paket`, `book_category_id`, `book_type_id`, `author`, `publisher`, `publication_year`, `file_name`, `price`, `created_at`, `updated_at`) VALUES
(2, 'Saat Kita Jatuh Cinta', 'cover-buku-cerita-fabel.jpg', 0, 1, 1, 'AIU AHRA', 'Gramedia', 2017, NULL, 80000, '2021-04-13 01:28:02', '2021-04-13 01:28:02'),
(3, 'Promise', 'default.png', 0, 1, 1, 'Dwitasari', 'Gramedia', 2016, NULL, 80000, '2021-04-13 19:01:10', '2021-04-30 02:57:01'),
(9, 'Dilan-Dia Adalah Dilanku Tahun 1990', 'Dilan 1 by Pidi Baiq_3.jpg', 0, 1, 1, 'Pidi Baiq', 'Dar! Mizan', 2014, NULL, 79000, '2021-04-29 23:47:52', '2021-04-29 23:47:52'),
(10, 'Imperfect', 'nHBfsgAA0AAAABoADcUU4QABUMo.jpg', 0, 5, 1, 'Meira Anastasia', 'Gramedia', 2018, NULL, 115000, '2021-04-30 00:20:06', '2021-04-30 00:24:12'),
(11, 'Imperfect-', 'nHBfsgAA0AAAABoADcUU4QABUMo_1.jpg', 0, 5, 2, 'Meira Anastasia', 'Gramedia', 2018, 'Imperfect by Meira Anastasia.pdf', NULL, '2021-04-30 00:27:38', '2021-04-30 00:27:38'),
(12, 'Ilmu Pengetahuan Sosial SMP/MTSn Kelas VII', 'bse-a_59f978c490b17318000180.jpg', 1, 5, 1, 'Iwan Setiawan, S.Pd.,M.Si', 'KEMENDIKBUD', 2016, NULL, 55000, '2021-04-30 00:40:52', '2021-04-30 00:40:52'),
(13, '5 cm', '5 cm by Donny Dhirgantoro.jpg', 0, 1, 2, 'Donny Dhirgantoro', 'PT Grasindo', 2010, '5 cm by Donny Dhirgantoro √.pdf', NULL, '2021-04-30 00:50:59', '2021-04-30 00:50:59'),
(14, 'Ayah ', 'novel-ayah-andrea-hirata.jpg', 0, 1, 1, 'Andrea Hirata', 'Bentang Pustaka', 2015, NULL, 99000, '2021-04-30 01:01:47', '2021-04-30 01:03:00'),
(15, 'Smart Math', 'default.png', 0, 5, 1, 'Optima Team', 'CV. Putra Pratama', 2011, NULL, 50000, '2021-06-01 03:03:20', '2021-06-01 03:03:20'),
(16, 'Sains Dalam Al-Quran', 'default.png', 0, 5, 1, 'Dr.Nadiah Thayyarah', 'Zaman', 2013, NULL, 95500, '2021-06-01 03:06:00', '2021-06-01 03:06:00'),
(17, 'Dunia Cecilia : Kisah Indah Dialog Surga dan Bumi', 'default.png', 0, 1, 1, 'Jostein Gaarder', 'Mizan', 2016, NULL, 79000, '2021-06-02 04:10:17', '2021-06-02 04:10:17'),
(18, 'Putri Sirkus dan Lelaki Penjual Dongeng', 'default.png', 0, 1, 1, 'Jostein Gaarder', 'Mizan', 2016, NULL, 85000, '2021-06-02 04:12:28', '2021-06-02 04:12:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `books_type`
--

CREATE TABLE `books_type` (
  `id` int(11) NOT NULL,
  `type` varchar(128) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `books_type`
--

INSERT INTO `books_type` (`id`, `type`, `description`) VALUES
(1, 'cetak', ''),
(2, 'ebook', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `class` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `class`
--

INSERT INTO `class` (`id`, `class`) VALUES
(1, '7'),
(2, '8'),
(3, '9');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fine`
--

CREATE TABLE `fine` (
  `id` int(11) NOT NULL,
  `fine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fine`
--

INSERT INTO `fine` (`id`, `fine`) VALUES
(1, 500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nis` varchar(30) NOT NULL,
  `class_id` int(11) NOT NULL,
  `rombel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id`, `user_id`, `nis`, `class_id`, `rombel_id`) VALUES
(20, 67, '432002', 1, 1),
(21, 68, '432001', 3, 4),
(22, 70, '432003', 2, 2),
(23, 71, '432004', 2, 2),
(24, 72, '432005', 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `notification`
--

INSERT INTO `notification` (`id`, `user_id`, `message`, `link`, `created_at`, `updated_at`) VALUES
(14, 68, 'Masa peminjaman buku Saat Kita Jatuh Cinta telah habis, harap melapor kepada petugas perpustakaan', '/user/transaction', '2021-06-01', '2021-06-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `officer`
--

CREATE TABLE `officer` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `officer_status` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `officer`
--

INSERT INTO `officer` (`id`, `user_id`, `nip`, `officer_status`) VALUES
(1, 15, '432007006180222', ''),
(17, 62, '432007006180000', 'Petugas'),
(18, 69, '432007006180103', 'Petugas'),
(19, 73, '432007006180105', 'Petugas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `author` varchar(128) DEFAULT NULL,
  `publisher` varchar(128) DEFAULT NULL,
  `publication_year` year(4) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `request`
--

INSERT INTO `request` (`id`, `user_id`, `title`, `author`, `publisher`, `publication_year`, `created_at`, `updated_at`) VALUES
(2, 68, 'Boyman Ragam Latih Pramuka', 'Andri Bob Sunardi', 'Darma Utama', 2016, '2021-06-02 10:26:29', '2021-06-02 10:26:29'),
(4, 71, 'Bulan', 'Tere Liye', 'PT. Gramedia Pustaka', 2018, '2021-06-02 10:30:15', '2021-06-02 10:30:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rombel`
--

CREATE TABLE `rombel` (
  `id` int(11) NOT NULL,
  `rombel` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rombel`
--

INSERT INTO `rombel` (`id`, `rombel`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D'),
(5, 'E'),
(6, 'F'),
(7, 'G');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `transaction_code` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaction`
--

INSERT INTO `transaction` (`id`, `transaction_code`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'TRA-12050401', 15, '2021-04-21', '2021-04-21'),
(12, 'TRA-608B73C8', 62, '2021-04-29', '2021-04-29'),
(14, 'TRA-608B7851', 67, '2021-04-29', '2021-04-29'),
(15, 'TRA-608B7A3C', 68, '2021-04-29', '2021-04-29'),
(16, 'TRA-608B8373', 69, '2021-04-29', '2021-04-29'),
(17, 'TRA-608B83DE', 70, '2021-04-29', '2021-04-29'),
(18, 'TRA-608B846A', 71, '2021-04-29', '2021-04-29'),
(19, 'TRA-608B853A', 72, '2021-04-29', '2021-04-29'),
(20, 'TRA-60B85017', 73, '2021-06-02', '2021-06-02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction_detail`
--

CREATE TABLE `transaction_detail` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `status` varchar(12) NOT NULL,
  `borrow_date` date NOT NULL,
  `return_date` date NOT NULL,
  `amount_late` int(11) DEFAULT 0,
  `fine` int(11) NOT NULL DEFAULT 0,
  `reminder_notification` int(11) NOT NULL DEFAULT 0,
  `late_notification` int(11) DEFAULT 0,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaction_detail`
--

INSERT INTO `transaction_detail` (`id`, `transaction_id`, `book_id`, `status`, `borrow_date`, `return_date`, `amount_late`, `fine`, `reminder_notification`, `late_notification`, `created_at`, `updated_at`) VALUES
(12, 1, 33, 'Dikembalikan', '2021-04-30', '2021-06-01', 26, 13000, 1, 1, '2021-04-30', '2021-06-01'),
(14, 15, 38, 'Dikembalikan', '2021-04-30', '2021-06-03', 28, 14000, 0, 1, '2021-04-30', '2021-06-03'),
(15, 18, 46, 'Dipinjam', '2021-06-01', '2022-06-01', 0, 0, 0, 0, '2021-06-01', '2021-06-01'),
(16, 14, 155, 'Dikembalikan', '2021-06-02', '2021-06-03', 0, 0, 0, 0, '2021-06-02', '2021-06-03'),
(17, 17, 47, 'Dipinjam', '2021-06-02', '2022-06-02', 0, 0, 0, 0, '2021-06-02', '2021-06-02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` int(1) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `role_id`, `username`, `password`, `active`, `created_at`, `updated_at`) VALUES
(15, 1, '432007006180222', '$2y$10$YFHi.I3GXo.TEGc8m2T6EeteOeRkAfUJLs/t.ST0Ujr.E/2sUO7pG', 1, '2021-03-07 02:19:31', '2021-04-29 23:09:30'),
(62, 1, '432007006180000', '$2y$10$J8et9QIFKvL.WtJ.oFlvhuvfVzwuylmgmrSbitXlkc/y6vcTE2pRC', 1, '2021-04-29 22:04:40', '2021-04-29 22:04:40'),
(67, 3, '432002', '$2y$10$xIijudjBRZ9KzrSbglOzFuk.bPnv5sdetEU/6axIg/FD9gvj/S1me', 1, '2021-04-29 22:24:01', '2021-04-29 22:24:01'),
(68, 3, '432001', '$2y$10$DX6FncTWEUpMKZSLwVWIVekRKNRYPgnk.NOwMAN5CAnXIw6AX3CgK', 1, '2021-04-29 22:32:12', '2021-04-29 22:32:12'),
(69, 2, '432007006180103', '$2y$10$vPJjxFQL19YwZ2HHFkPKeO92EUq9ADFtY4Gp3r9ojhOXkgBAMYNBu', 1, '2021-04-29 23:11:31', '2021-04-29 23:11:31'),
(70, 3, '432003', '$2y$10$tsBs3R3FmjRAC6avD5zZLeySAbte5UC6n9/tGWqOtNT6eH/AdAlIW', 1, '2021-04-29 23:13:18', '2021-04-29 23:13:18'),
(71, 3, '432004', '$2y$10$ReGgcGRIY.i1zkC1dQ82F.nlKhgm0cd6oKotSR38Cm0WyAVR6YT1e', 1, '2021-04-29 23:15:38', '2021-04-29 23:15:38'),
(72, 3, '432005', '$2y$10$bMxILL/feW2s8JkrKKngfuGE1p5A0R4dnsY9Gab1gjkLpZ4f8rSau', 1, '2021-04-29 23:19:06', '2021-04-29 23:19:06'),
(73, 2, '432007006180105', '$2y$10$k49dkMLKMJ3oRRlMKy/diui540omZ5JOD09IrgoCFZIpNpNccZ1ba', 1, '2021-06-02 22:44:23', '2021-06-02 22:44:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_profile`
--

CREATE TABLE `users_profile` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `full_name` varchar(128) NOT NULL,
  `user_image` varchar(255) NOT NULL DEFAULT 'default.svg',
  `sex` varchar(1) NOT NULL,
  `place_of_birth` varchar(128) NOT NULL,
  `date_of_birth` date NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(128) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users_profile`
--

INSERT INTO `users_profile` (`id`, `user_id`, `full_name`, `user_image`, `sex`, `place_of_birth`, `date_of_birth`, `contact`, `email`, `address`) VALUES
(1, 15, 'Tiya Fatmalia', 'default.svg', 'P', 'Tasikmalaya', '2000-02-02', '081292040869', 'tiyafatmalia02@gmail.com', 'Kp. Bongkor Rt.09 Rw.02 Desa Indrajaya Kecamatan Sukaratu Kabupaten Tasikmalaya'),
(43, 62, 'Nanang Suciyono', 'default.svg', 'L', 'Tasikmalaya', '2021-04-30', '085227669419', 'nanangsuciyono@gmail.com', 'Tasikmalaya'),
(45, 67, 'Firdha', 'default.svg', 'P', 'Tasikmalaya', '2021-04-30', '08297197289', 'firda@gmail.com', 'Tasikmalaya'),
(46, 68, 'Rika Nurjanah', 'default.svg', 'P', 'Tasikmalaya', '1999-12-31', '0877085685252', 'rikanurjanah@gmail.com', 'Sukaratu'),
(47, 69, 'Winda Andriani', 'default.svg', 'P', 'Tasikmalaya', '2000-05-27', '085283831275', 'windadr27@gmail.com', 'Indihiang'),
(48, 70, 'Ita Fatimah', 'default.svg', 'P', 'Tasikmalaya', '1999-05-15', '082217489827', 'itafatimah@gmail.com', 'Rajapolah'),
(49, 71, 'Fitria Nurjihaan', 'default.svg', 'P', 'Tasikmalaya', '2000-01-07', '082310779624', 'fitrianurjihaan@gmail.com', 'Ciamis'),
(50, 72, 'Desty Mustika', 'default.svg', 'P', 'Tasikmalaya', '1999-12-22', '0881024199908', 'destymustika@gmail.com', 'Indihiang'),
(51, 73, 'Dini', 'default.svg', 'P', 'Tasikmalaya', '2021-06-03', '087708567890', 'dini@gmail.com', 'Tasikmalaya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_role`
--

CREATE TABLE `users_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users_role`
--

INSERT INTO `users_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Petugas'),
(3, 'Anggota');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_data_id` (`book_data_id`);

--
-- Indeks untuk tabel `books_category`
--
ALTER TABLE `books_category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `books_data`
--
ALTER TABLE `books_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_category_id` (`book_category_id`),
  ADD KEY `book_type_id` (`book_type_id`);

--
-- Indeks untuk tabel `books_type`
--
ALTER TABLE `books_type`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `fine`
--
ALTER TABLE `fine`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `user_id_2` (`user_id`),
  ADD KEY `rombel_id` (`rombel_id`);

--
-- Indeks untuk tabel `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `officer`
--
ALTER TABLE `officer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `rombel`
--
ALTER TABLE `rombel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_id` (`transaction_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indeks untuk tabel `users_profile`
--
ALTER TABLE `users_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `users_role`
--
ALTER TABLE `users_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT untuk tabel `books_category`
--
ALTER TABLE `books_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `books_data`
--
ALTER TABLE `books_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `books_type`
--
ALTER TABLE `books_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `fine`
--
ALTER TABLE `fine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `officer`
--
ALTER TABLE `officer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `rombel`
--
ALTER TABLE `rombel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `transaction_detail`
--
ALTER TABLE `transaction_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT untuk tabel `users_profile`
--
ALTER TABLE `users_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `users_role`
--
ALTER TABLE `users_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`book_data_id`) REFERENCES `books_data` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `books_data`
--
ALTER TABLE `books_data`
  ADD CONSTRAINT `books_data_ibfk_3` FOREIGN KEY (`book_category_id`) REFERENCES `books_category` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `books_data_ibfk_4` FOREIGN KEY (`book_type_id`) REFERENCES `books_type` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `member_ibfk_3` FOREIGN KEY (`rombel_id`) REFERENCES `rombel` (`id`),
  ADD CONSTRAINT `member_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `officer`
--
ALTER TABLE `officer`
  ADD CONSTRAINT `officer_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD CONSTRAINT `transaction_detail_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_detail_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `users_role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `users_profile`
--
ALTER TABLE `users_profile`
  ADD CONSTRAINT `users_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
