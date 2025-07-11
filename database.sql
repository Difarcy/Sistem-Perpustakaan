SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `buku` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isbn` int(20) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `section` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `buku` (`id`, `isbn`, `judul`, `pengarang`, `penerbit`, `section`, `status`, `cover`, `created_at`, `updated_at`) VALUES
(1, 423543, 'Animal Farm', 'George Orwell', 'Penguin Essentials', '5A', 'Rusak', '1603644119_6ce3f9345a8e98cc0c7a.jpg', '2020-10-25 11:41:59', '2020-10-26 09:25:46'),
(2, 2344243, 'My Little Pony  Daring Do and the Forbidden City of Clouds', 'A K Yearling', 'Little, Brown Books for Young Readers', '4B', 'Dipinjam', '1603644202_ad905fdaec9f3327dada.jpg', '2020-10-25 11:43:22', '2020-10-26 09:27:16'),
(3, 653242, 'My Little Pony Daring Do and the Marked Thief of Marapore', 'A K Yearling', 'Little, Brown Books for Young Readers', '2A', 'Tersedia', '1603644233_742baa7d9c84012da5cc.jpg', '2020-10-25 11:43:53', '2020-10-26 04:43:37'),
(4, 56723, 'My Little Pony The Manga - A Day in the Life of Equestria Vol. 1', 'David Lumsdon', 'Seven Seas Entertainment, LLC', '2B', 'Rusak', '1603644260_05cd30b581dd48c226b3.jpg', '2020-10-25 11:44:20', '2020-10-25 11:57:52'),
(5, 12743, 'Normal People', 'Sally Rooney', 'FABER & FABER', '2C', 'Tersedia', '1603644286_024eea07503adb8ea823.jpg', '2020-10-25 11:44:46', '2020-10-26 05:30:16'),
(6, 12124, 'The Silent Patient The Richard and Judy bookclub pick and Sunday Times Bestseller', 'Alex Michaelides', 'Orion Publishing Co', '1C', 'Rusak', '1603644328_f7860492eb9a97e2eb31.jpg', '2020-10-25 11:45:28', '2020-10-25 11:51:36'),
(7, 423543, 'Animal Farm', 'George Orwell', 'Penguin Essentials', '5A', 'Tersedia', '1603644119_6ce3f9345a8e98cc0c7a.jpg', '2020-10-25 11:41:59', '2020-10-26 03:16:25'),
(8, 423543, 'Animal Farm', 'George Orwell', 'Penguin Essentials', '5A', 'Tersedia', '1603644119_6ce3f9345a8e98cc0c7a.jpg', '2020-10-25 11:41:59', '2020-11-06 16:34:24'),
(9, 2344243, 'My Little Pony  Daring Do and the Forbidden City of Clouds', 'A K Yearling', 'Little, Brown Books for Young Readers', '4B', 'Tersedia', '1603644202_ad905fdaec9f3327dada.jpg', '2020-10-25 11:43:22', '2020-10-25 11:43:22'),
(10, 653242, 'My Little Pony Daring Do and the Marked Thief of Marapore', 'A K Yearling', 'Little, Brown Books for Young Readers', '2A', 'Tersedia', '1603644233_742baa7d9c84012da5cc.jpg', '2020-10-25 11:43:53', '2020-10-25 11:43:53'),
(11, 56723, 'My Little Pony The Manga - A Day in the Life of Equestria Vol. 1', 'David Lumsdon', 'Seven Seas Entertainment, LLC', '<i> <b>', 'Hilang', '1603644260_05cd30b581dd48c226b3.jpg', '2020-10-25 11:44:20', '2020-11-06 16:33:37'),
(12, 12743, 'Normal People', 'Sally Rooney', 'FABER & FABER', '2C', 'Tersedia', '1603644286_024eea07503adb8ea823.jpg', '2020-10-25 11:44:46', '2020-10-25 11:44:46'),
(13, 12124, 'The Silent Patient The Richard and Judy bookclub pick and Sunday Times Bestseller', 'Alex Michaelides', 'Orion Publishing Co', '1C', 'Tersedia', '1603644328_f7860492eb9a97e2eb31.jpg', '2020-10-25 11:45:28', '2020-10-25 11:45:28'),
(14, 423543, 'Animal Farm', 'George Orwell', 'Penguin Essentials', '5A', 'Hilang', '1603644119_6ce3f9345a8e98cc0c7a.jpg', '2020-10-25 11:41:59', '2020-10-25 11:58:10'),
(15, 423543, 'Animal Farm', 'George Orwell', 'Penguin Essentials', '5A', 'Tersedia', '1603644119_6ce3f9345a8e98cc0c7a.jpg', '2020-10-25 11:41:59', '2020-10-25 11:41:59'),
(16, 2344243, 'My Little Pony  Daring Do and the Forbidden City of Clouds', 'A K Yearling', 'Little, Brown Books for Young Readers', '4B', 'Tersedia', '1603644202_ad905fdaec9f3327dada.jpg', '2020-10-25 11:43:22', '2020-10-26 03:22:03'),
(17, 653242, 'My Little Pony Daring Do and the Marked Thief of Marapore', 'A K Yearling', 'Little, Brown Books for Young Readers', '2A', 'Tersedia', '1603644233_742baa7d9c84012da5cc.jpg', '2020-10-25 11:43:53', '2020-10-25 11:43:53'),
(18, 56723, 'My Little Pony The Manga - A Day in the Life of Equestria Vol. 1', 'David Lumsdon', 'Seven Seas Entertainment, LLC', '2B', 'Rusak', '1603644260_05cd30b581dd48c226b3.jpg', '2020-10-25 11:44:20', '2020-10-25 11:58:04'),
(19, 12743, 'Normal People', 'Sally Rooney', 'FABER & FABER', '2C', 'Tersedia', '1603644286_024eea07503adb8ea823.jpg', '2020-10-25 11:44:46', '2020-10-25 11:44:46'),
(20, 12124, 'The Silent Patient The Richard and Judy bookclub pick and Sunday Times Bestseller', 'Alex Michaelides', 'Orion Publishing Co', '1C', 'Rusak', '1603644328_f7860492eb9a97e2eb31.jpg', '2020-10-25 11:45:28', '2020-10-27 08:09:56'),
(21, 423543, 'Animal Farm', 'George Orwell', 'Penguin Essentials', '5A', 'Hilang', '1603644119_6ce3f9345a8e98cc0c7a.jpg', '2020-10-25 11:41:59', '2020-10-26 09:26:46'),
(22, 423543, 'Animal Farm', 'George Orwell', 'Penguin Essentials', '5A', 'Tersedia', '1603644119_6ce3f9345a8e98cc0c7a.jpg', '2020-10-25 11:41:59', '2020-10-26 03:25:05'),
(23, 2344243, 'My Little Pony  Daring Do and the Forbidden City of Clouds', 'A K Yearling', 'Little, Brown Books for Young Readers', '4B', 'Dipinjam', '1603644202_ad905fdaec9f3327dada.jpg', '2020-10-25 11:43:22', '2020-10-27 09:03:06'),
(24, 653242, 'My Little Pony Daring Do and the Marked Thief of Marapore', 'A K Yearling', 'Little, Brown Books for Young Readers', '2A', 'Tersedia', '1603644233_742baa7d9c84012da5cc.jpg', '2020-10-25 11:43:53', '2020-10-26 06:14:36'),
(25, 56723, 'My Little Pony The Manga - A Day in the Life of Equestria Vol. 1', 'David Lumsdon', 'Seven Seas Entertainment, LLC', '2B', 'Hilang', '1603644260_05cd30b581dd48c226b3.jpg', '2020-10-25 11:44:20', '2020-10-29 20:46:03'),
(26, 12743, 'Normal People', 'Sally Rooney', 'FABER & FABER', '2C', 'Tersedia', '1603644286_024eea07503adb8ea823.jpg', '2020-10-25 11:44:46', '2020-10-26 05:28:52'),
(27, 12124, 'The Silent Patient The Richard and Judy bookclub pick and Sunday Times Bestseller', 'Alex Michaelides', 'Orion Publishing Co', '1C', 'Tersedia', '1603644328_f7860492eb9a97e2eb31.jpg', '2020-10-25 11:45:28', '2020-10-27 01:06:17'),
(28, 423543, 'Animal Farm', 'George Orwell', 'Penguin Essentials', '5A', 'Tersedia', '1603644119_6ce3f9345a8e98cc0c7a.jpg', '2020-10-25 11:41:59', '2020-10-25 11:41:59'),
(30, 653242, 'My Little Pony Daring Do and the Marked Thief of Marapore', 'A K Yearling', 'Little, Brown Books for Young Readers', '5A', 'Tersedia', '1603644233_742baa7d9c84012da5cc.jpg', '2020-10-29 20:29:36', '2020-10-29 20:29:36');

CREATE TABLE `denda` (
  `id_denda` int(11) NOT NULL AUTO_INCREMENT,
  `no_anggota` varchar(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `denda` int(20) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_denda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `denda` (`id_denda`, `no_anggota`, `id_buku`, `denda`, `status`, `created_at`, `updated_at`) VALUES
(3, '20102583681', 25, 5000, 1, '2020-10-26 09:23:34', '2020-09-27 08:09:35'),
(4, '20102545600', 1, 50000, 1, '2020-09-26 09:25:46', '2020-10-29 20:29:52'),
(5, '20102545600', 21, 75000, 1, '2020-10-26 09:26:46', '2020-08-27 08:51:41'),
(6, '20102583681', 27, 5000, 1, '2020-10-27 01:06:17', '2020-08-27 01:51:59'),
(7, '20102583681', 20, 50000, 1, '2020-10-27 08:09:56', '2020-10-27 05:09:22'),
(8, '20102583681', 20, 5000, 1, '2020-10-27 08:09:56', '2020-10-27 08:09:56'),
(9, '20102725842', 25, 75000, 0, '2020-10-29 20:46:03', '2020-10-29 20:46:03'),
(10, '20102725842', 25, 5000, 0, '2020-10-29 20:46:03', '2020-10-29 20:46:03');

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT,
  `id_buku` int(11) NOT NULL,
  `no_anggota` varchar(11) NOT NULL,
  `deadline` datetime DEFAULT NULL,
  `tanggal_peminjaman` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_peminjaman`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `peminjaman` (`id_peminjaman`, `id_buku`, `no_anggota`, `deadline`, `tanggal_peminjaman`, `created_at`, `updated_at`, `deleted_at`) VALUES
(18, 1, '20102545600', '2020-11-02 05:30:07', '2020-10-26 05:30:07', '2020-10-26 05:30:07', '2020-10-26 05:30:16', '2020-10-26 05:30:16'),
(19, 1, '20102545600', '2020-11-02 05:33:21', '2020-10-26 05:33:21', '2020-10-26 05:33:21', '2020-10-26 09:25:46', '2020-10-26 09:25:46'),
(20, 24, '20102583681', '2020-11-02 06:12:24', '2020-10-15 00:00:00', '2020-10-26 06:12:24', '2020-10-26 06:14:36', '2020-10-26 06:14:36'),
(21, 25, '20102583681', '2020-11-02 06:14:44', '2020-10-15 00:00:00', '2020-10-26 06:14:44', '2020-10-26 06:15:08', '2020-10-26 06:15:08'),
(22, 25, '20102583681', '2020-10-21 00:00:00', '2020-10-14 00:00:00', '2020-10-26 06:23:30', '2020-10-26 09:23:34', '2020-10-26 09:23:34'),
(23, 21, '20102545600', '2020-11-02 09:26:39', '2020-10-26 09:26:39', '2020-10-26 09:26:39', '2020-10-26 09:26:46', '2020-10-26 09:26:46'),
(24, 2, '20102597583', '2020-10-29 00:00:00', '2020-10-22 00:00:00', '2020-10-26 09:27:16', '2020-10-26 09:27:16', NULL),
(25, 27, '20102583681', '2020-10-22 00:00:00', '2020-10-15 00:00:00', '2020-10-26 20:53:25', '2020-10-27 01:06:17', '2020-10-27 01:06:17'),
(26, 20, '20102583681', '2020-10-22 00:00:00', '2020-10-15 00:00:00', '2020-10-27 08:08:27', '2020-10-27 08:09:56', '2020-10-27 08:09:56'),
(27, 25, '20102725842', '2020-10-29 00:00:00', '2020-10-22 00:00:00', '2020-10-27 08:49:23', '2020-10-27 08:49:40', '2020-10-27 08:49:40'),
(28, 25, '20102725842', '2020-10-23 00:00:00', '2020-10-16 00:00:00', '2020-10-27 08:49:47', '2020-10-29 20:46:03', '2020-10-29 20:46:03'),
(29, 23, '20102545600', '2020-11-03 09:03:06', '2020-10-27 09:03:06', '2020-10-27 09:03:06', '2020-10-27 09:03:06', NULL);

CREATE TABLE `pengembalian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_peminjaman` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_denda` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `status_buku` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `status_buku` (`id`, `keterangan`) VALUES
(1, 'Tersedia'),
(2, 'Dipinjam'),
(3, 'Hilang'),
(4, 'Rusak');

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_anggota` varchar(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `no_telp` int(20) NOT NULL,
  `ttl` varchar(255) NOT NULL,
  `profil` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Hapus semua akun lama, tambahkan 3 akun baru
INSERT INTO `user` (`no_anggota`, `nama`, `jenis_kelamin`, `no_telp`, `ttl`, `profil`, `email`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
('0001', 'Admin', 'L', 0, 'Jakarta, 01-01-2000', 'no-profil.png', 'admin@email.com', 'admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, NOW(), NOW()),
('0002', 'Petugas', 'L', 0, 'Jakarta, 01-01-2000', 'no-profil.png', 'petugas@email.com', 'petugas', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, NOW(), NOW()),
('0003', 'Anggota', 'L', 0, 'Jakarta, 01-01-2000', 'no-profil.png', 'anggota@email.com', 'anggota', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 2, NOW(), NOW());

COMMIT; 