-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Apr 2021 pada 03.50
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
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
(36, 2, 'BK-299290199', 'Bagus', NULL, 1, '2021-04-27', '2021-04-27');

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
(4, 'Komik', '');

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
(3, 'Promise', 'default.png', 1, 1, 1, 'Dwitasari', 'Gramedia', 2016, NULL, 80000, '2021-04-13 19:01:10', '2021-04-25 11:54:42'),
(4, 'Senja Pagi', 'Screen Shot 2019-06-09 at 11.19.57 AM_2.png', 0, 2, 2, 'Alffi Rev', 'REV Team', 2017, '2350-4878-2-PB.pdf', NULL, '2021-04-13 21:05:22', '2021-04-13 22:07:52');

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
  `class` varchar(128) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `class`
--

INSERT INTO `class` (`id`, `class`, `description`) VALUES
(1, '7', NULL),
(2, '8', NULL),
(3, '9', NULL);

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
(10, 53, '098', 1, 1);

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
(3, 15, 'Ini notifikasi 1', NULL, '2021-04-27', '2021-04-27'),
(4, 15, 'Ini notifikasi 2', NULL, '2021-04-27', '2021-04-27');

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
(1, 15, '3282819299299', 'Kepala Perpustakaan'),
(16, 52, '123', '');

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
(1, 15, 'Senja Pagi', 'Alffi Rev', 'Gramedia', 2018, '2021-04-19 11:47:01', '2021-04-19 11:47:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rombel`
--

CREATE TABLE `rombel` (
  `id` int(11) NOT NULL,
  `rombel` varchar(128) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rombel`
--

INSERT INTO `rombel` (`id`, `rombel`, `description`) VALUES
(1, 'A', ''),
(2, 'B', ''),
(3, 'C', ''),
(4, 'D', ''),
(5, 'E', ''),
(6, 'F', ''),
(7, 'G', '');

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
(1, 'TRA-12050401', 15, '2021-04-21', '2021-04-21');

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
  `reminder` int(11) NOT NULL DEFAULT 0,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(15, 1, 'tiya', '$2y$10$SvHfJMkxCONwUnIhPlfOY.MZju9Yp3JkL/XuyTexPdQIuuGr/zaei', 1, '2021-03-07 02:19:31', '2021-03-07 02:19:31'),
(52, 1, '123', '$2y$10$yz4r3zYYfG4gvlSIe6jl3OQV/jkyG3xcdSoZd0YwomPMtoiS9DdYu', 1, '2021-04-27 19:52:15', '2021-04-27 20:00:12'),
(53, 3, '098', '$2y$10$ks7BJjzvGfzwgMEHN/21P.oMaDMf7DXTeia7eHBPbKw8YfF5Zawr2', 1, '2021-04-27 20:11:36', '2021-04-27 20:11:36');

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
  `contact` varchar(13) NOT NULL,
  `email` varchar(128) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users_profile`
--

INSERT INTO `users_profile` (`id`, `user_id`, `full_name`, `user_image`, `sex`, `place_of_birth`, `date_of_birth`, `contact`, `email`, `address`) VALUES
(1, 15, 'Tiya Fatmalia', 'default.svg', 'P', 'Tasikmalaya', '2000-02-02', '081292040869', 'tiyafatmalia02@gmail.com', 'Kp. Nagarawangi RT/RW. 002/004 Nusawangi Kec. Cisayong Kab. Tasikmalaya'),
(33, 52, 'Winda ', 'default.svg', 'P', 'tasikmalaya', '2021-04-28', '08297197289', 'winda@gmail.com', 'fafaf'),
(34, 53, 'Arsal', 'default.svg', 'L', 'tasikmalaya', '2021-04-28', '08297197289', 'arsal@gmail.com', 'kjhkhl');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `books_category`
--
ALTER TABLE `books_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `books_data`
--
ALTER TABLE `books_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `books_type`
--
ALTER TABLE `books_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `fine`
--
ALTER TABLE `fine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `officer`
--
ALTER TABLE `officer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `rombel`
--
ALTER TABLE `rombel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `transaction_detail`
--
ALTER TABLE `transaction_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `users_profile`
--
ALTER TABLE `users_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
