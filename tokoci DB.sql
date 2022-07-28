-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 22 Jan 2021 pada 11.41
-- Versi server: 5.7.24
-- Versi PHP: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokoci`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_user`
--

CREATE TABLE `data_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_user`
--

INSERT INTO `data_user` (`id_user`, `nama`, `email`, `password`, `level`) VALUES
(1, 'Rahma', 'purwantiibuku@gmail.com', '$2y$10$LmFWCdzCXFrzzz5WJeKFMOatmrEBiEU9QoIpv/h4T9xNWKfi7l37.', 'Owner'),
(2, 'Admin Toko', 'admin@admin.com', '$2y$10$LmFWCdzCXFrzzz5WJeKFMOatmrEBiEU9QoIpv/h4T9xNWKfi7l37.', 'Admin'),
(3, 'Owner Toko', 'owner@owner.com', '$2y$10$LmFWCdzCXFrzzz5WJeKFMOatmrEBiEU9QoIpv/h4T9xNWKfi7l37.', 'Owner'),
(56, 'Demo Member', 'presentasiaan@gmail.com', '$2y$10$r5dzj2sm0TcOIwUUPklGL.m2cuIHpNXqNyWbSJtI/Tuv/jDcm19By', 'Member'),
(57, 'Sito Karuniawan', 'riyadigini@gmail.com', '$2y$10$aLxx7F83i3UYR.fjTtChPu/GwPYWyKDVj6Mx/eQ7E3fTMeLKJ3Qwy', 'Member'),
(58, 'Rahma Purnama', 'cobavoba17@gmail.com', '$2y$10$jA6Q4zcjJL7QZy1X703bp.3JOgV05HIS713B1ynrnzmUrdTkztoPa', 'Member'),
(59, 'Kusuma Syariah Hotel', 'kusumasyariahhotel@gmail.com', '$2y$10$8HtcQXkPpx08DxNMNsVJQuBUGt8zWjmLME2raN28ciJ6xPal4N4v2', 'Member'),
(60, 'Kusuma Syariah Hotel', 'admdsdsin@admin.com', '$2y$10$utA5sWGNx/22oEHoHoM1luD1ah/XkS2qKcrx6/lQTEFr/JoJg1NmG', 'Member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_produk`
--

CREATE TABLE `detail_produk` (
  `id_detail` int(10) NOT NULL,
  `stok` int(20) DEFAULT '0',
  `diskon` int(10) DEFAULT '0',
  `ukuran` varchar(50) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL,
  `aktif` int(1) NOT NULL DEFAULT '0',
  `id_produk` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_produk`
--

INSERT INTO `detail_produk` (`id_detail`, `stok`, `diskon`, `ukuran`, `berat`, `aktif`, `id_produk`) VALUES
(27, 9, 15, 'XS, ', 250, 1, 42),
(28, 100, 0, 'all size, ', 250, 1, 43),
(29, 100, 0, 'all size, ', 250, 1, 44),
(30, 99, 5, 'XS, S, M, L, ', 250, 1, 45),
(31, 100, 0, 'M, L, XL, ', 250, 1, 46),
(32, 100, 0, 'S, M, L, ', 250, 1, 47),
(33, 84, 0, 'all size, ', 250, 0, 48),
(34, 98, 0, 'S, M, L, ', 250, 1, 49),
(35, 98, 20, 'M, L, ', 250, 0, 50),
(36, 100, 10, 'all size, ', 500, 1, 51),
(37, 100, 0, 'all size, ', 250, 1, 52),
(38, 100, 0, 'S, M, L, ', 250, 1, 53);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_user`
--

CREATE TABLE `detail_user` (
  `id_detail` int(11) NOT NULL,
  `foto` varchar(50) DEFAULT 'default.png',
  `is_active` int(1) DEFAULT '1',
  `create_date` int(11) DEFAULT NULL,
  `delete_at` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_user`
--

INSERT INTO `detail_user` (`id_detail`, `foto`, `is_active`, `create_date`, `delete_at`, `id_user`) VALUES
(1, 'owner.jpg', 1, 1566678130, NULL, 1),
(2, '1609003137145.png', 1, 1566678360, NULL, 2),
(3, 'owner.jpg', 1, 1566678260, NULL, 3),
(58, '1609003244476.png', 0, 1587938386, NULL, 56),
(59, 'default.png', 0, 1609252334, NULL, 57),
(60, 'default.png', 1, 1609252720, NULL, 58),
(61, 'default.png', 1, 1609339786, NULL, 59),
(62, 'default.png', 1, 1609340750, NULL, 60);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_cat` int(10) NOT NULL,
  `nama_cat` varchar(50) NOT NULL,
  `ket_cat` varchar(50) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_cat`, `nama_cat`, `ket_cat`, `active`) VALUES
(1, 'Baju', 'Pakaian berbentuk baju', 1),
(5, 'Topi', 'Tutup kepala', 1),
(9, 'Tas', 'Untuk angkut barang', 1),
(13, 'Sandal', 'Sejenis alas kaki', 1),
(14, 'Pendek', 'Celana Pendek', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `midtrans`
--

CREATE TABLE `midtrans` (
  `id_midtrans` int(10) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `status_message` text NOT NULL,
  `va_number` varchar(50) DEFAULT NULL,
  `bank` varchar(50) DEFAULT NULL,
  `payment_type` varchar(50) DEFAULT NULL,
  `order_id` varchar(50) DEFAULT NULL,
  `gross_amount` int(11) NOT NULL,
  `transaction_time` varchar(100) NOT NULL,
  `transaction_status` varchar(20) NOT NULL,
  `settlement_time` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `midtrans`
--

INSERT INTO `midtrans` (`id_midtrans`, `transaction_id`, `status_message`, `va_number`, `bank`, `payment_type`, `order_id`, `gross_amount`, `transaction_time`, `transaction_status`, `settlement_time`) VALUES
(75, 'd2fdf30c-d43e-4851-b2cd-1f8adb9130d2', 'midtrans payment notification', NULL, 'Gopay', 'gopay', 'Millano-5ea2bab5bd15d', 78000, '2020-04-24 17:09:10', 'settlement', '2020-04-24 17:10:10'),
(77, '75738a13-b51f-4d05-a01f-bd521bcf638c', 'midtrans payment notification', '194008982659021', 'permata', 'bank_transfer', 'Millano-5f3d015a2facc', 374000, '2020-08-19 17:39:44', 'settlement', '2020-08-19 17:44:25'),
(78, 'a7446d67-309e-49c0-be2c-3209b1af62b6', 'midtrans payment notification', NULL, 'Gopay', 'gopay', 'Millano-5f3d0f126a2b0', 270000, '2020-08-19 18:38:09', 'cancel', '2020-08-19 18:40:42'),
(79, '8eba5beb-1ce3-4b61-b967-28d437a7f1f5', 'midtrans payment notification', NULL, 'Gopay', 'gopay', 'Millano-5f3d10b4dfde5', 456000, '2020-08-19 18:45:04', 'settlement', '2020-08-19 18:46:43'),
(80, 'e513e192-5e2e-4fbb-a654-ce75acfb1e08', 'midtrans payment notification', '382968280123', 'mandiri-kode bank-70012', 'echannel', 'Millano-5fe76836c46e6', 79000, '2020-12-26 23:44:46', 'settlement', '2020-12-26 23:47:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id_orders` varchar(50) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `status_order` varchar(50) DEFAULT NULL,
  `tanggal_order` varchar(50) NOT NULL,
  `total_harga_barang` int(11) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `nomer_resi` varchar(50) DEFAULT NULL,
  `status_pengiriman` varchar(50) DEFAULT NULL,
  `tanggal_selesai` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id_orders`, `id_user`, `status_order`, `tanggal_order`, `total_harga_barang`, `keterangan`, `nomer_resi`, `status_pengiriman`, `tanggal_selesai`) VALUES
('Millano-5ea2bab5bd15d', 56, 'Selesai', '1587722934', 72000, 'Nomer Resi telah di inputkan', 'TEST-0423444559', 'Terkirim', '25/04/2020'),
('Millano-5ee0248f0ba12', 56, NULL, '1591747727', 120000, 'Menunggu Pembayaran', NULL, NULL, NULL),
('Millano-5f3d015a2facc', 56, 'Selesai', '1597833562', 368000, 'Pembayaran Berhasil Dilakukan', NULL, NULL, NULL),
('Millano-5f3d0f126a2b0', 56, 'cancel', '1597837074', 264000, 'Menunggu Pembayaran', NULL, NULL, NULL),
('Millano-5f3d10b4dfde5', 56, 'Selesai', '1597837493', 450000, 'Pembayaran Berhasil Dilakukan', NULL, NULL, NULL),
('Millano-5f63496fd83fc', 56, 'Selesai', '1600342384', 150000, 'Menunggu Pembayaran', NULL, NULL, NULL),
('Millano-5f634a66b7fb2', 56, 'Selesai', '1600342631', 150000, 'Menunggu Pembayaran', NULL, NULL, NULL),
('Millano-5f63514764cf5', 56, NULL, '1600344392', 150000, 'Menunggu Pembayaran', NULL, NULL, NULL),
('Millano-5f6352274609d', 56, NULL, '1600344615', 150000, 'Menunggu Pembayaran', NULL, NULL, NULL),
('Millano-5fe76836c46e6', 56, 'Selesai', '1609001015', 72000, 'Nomer Resi telah di inputkan', 'JNE-98424334BEE', 'Terkirim', '26/12/2020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders_produk`
--

CREATE TABLE `orders_produk` (
  `id_orders_produk` int(10) NOT NULL,
  `id_orders` varchar(50) NOT NULL,
  `id_produk` int(10) NOT NULL,
  `ukuran_orders` varchar(10) DEFAULT NULL,
  `qty` varchar(10) NOT NULL,
  `diskon_orders` int(11) DEFAULT NULL,
  `harga_orders` int(11) DEFAULT NULL,
  `nama_orders` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `orders_produk`
--

INSERT INTO `orders_produk` (`id_orders_produk`, `id_orders`, `id_produk`, `ukuran_orders`, `qty`, `diskon_orders`, `harga_orders`, `nama_orders`) VALUES
(180, 'Millano-5ea2bab5bd15d', 42, 'S', '1', 10, 72000, 'Baju Bahan Tipis'),
(187, 'Millano-5ee0248f0ba12', 49, 'S', '1', 0, 120000, 'Celana Pendek Dickies'),
(188, 'Millano-5f3d015a2facc', 50, 'M', '2', 20, 184000, 'SCHUTZ Women Black Naama Nubuck'),
(189, 'Millano-5f3d0f126a2b0', 48, 'all size', '1', 0, 150000, 'Topi Converse Original'),
(190, 'Millano-5f3d0f126a2b0', 45, 'S', '1', 5, 114000, 'Kaos Old For All'),
(191, 'Millano-5f3d10b4dfde5', 48, 'all size', '3', 0, 150000, 'Topi Converse Original'),
(193, 'Millano-5f63496fd83fc', 48, 'all size', '1', 0, 150000, 'Topi Converse Original'),
(194, 'Millano-5f634a66b7fb2', 43, 'all size', '1', 0, 150000, 'Topi Converse Original'),
(195, 'Millano-5f63514764cf5', 48, 'all size', '1', 0, 150000, 'Topi Converse Original'),
(196, 'Millano-5f6352274609d', 48, 'all size', '1', 0, 150000, 'Topi Converse Original'),
(197, 'Millano-5fe76836c46e6', 42, 'all size', '1', 10, 72000, 'Baju Bahan Tipis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `parent_kategori`
--

CREATE TABLE `parent_kategori` (
  `parent_kategori_id` int(11) NOT NULL,
  `parent_kategori_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `parent_kategori`
--

INSERT INTO `parent_kategori` (`parent_kategori_id`, `parent_kategori_nama`) VALUES
(5, 'Pakaian'),
(7, 'Alas Kaki'),
(8, 'Celana');

-- --------------------------------------------------------

--
-- Struktur dari tabel `parent_kategori_kategori`
--

CREATE TABLE `parent_kategori_kategori` (
  `parent_kategori_kategori_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `parent_kategori_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `parent_kategori_kategori`
--

INSERT INTO `parent_kategori_kategori` (`parent_kategori_kategori_id`, `kategori_id`, `parent_kategori_id`) VALUES
(22, 1, 5),
(24, 5, 5),
(26, 9, 5),
(31, 13, 7),
(34, 14, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_ongkir` int(10) NOT NULL,
  `id_orders` varchar(50) NOT NULL,
  `kurir` varchar(50) NOT NULL,
  `service` varchar(100) NOT NULL,
  `estimasi` varchar(50) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `kode_pos` varchar(20) DEFAULT NULL,
  `nama_penerima` varchar(50) DEFAULT NULL,
  `no_penerima` varchar(20) DEFAULT NULL,
  `berat` int(10) DEFAULT NULL,
  `total_ongkir` int(11) NOT NULL,
  `notifikasi_email` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengiriman`
--

INSERT INTO `pengiriman` (`id_ongkir`, `id_orders`, `kurir`, `service`, `estimasi`, `alamat_pengiriman`, `kode_pos`, `nama_penerima`, `no_penerima`, `berat`, `total_ongkir`, `notifikasi_email`) VALUES
(119, 'Millano-5ea2bab5bd15d', 'jne', 'CTC', 'Estimasi 1-2 Hari', 'Jalan Cendana, Kalimantan', '55551', 'Putri Wahyu', '089669413260', 250, 6000, 1587969988),
(124, 'Millano-5ee0248f0ba12', 'jne', 'CTC', 'Estimasi 1-2 Hari', 'jineman, Girikerto, Turi, Sleman, DIY', '55551', 'Rahma', '089669413260', 250, 6000, NULL),
(125, 'Millano-5f3d015a2facc', 'jne', 'CTCYES', 'Estimasi 1-2 Hari', 'Jineman.Kloposawit, Girikerto, Turi, Sleman, DIY RT/RW 004/006', '55551', 'Kimmi Kimmo', '089669413260', 500, 6000, NULL),
(126, 'Millano-5f3d0f126a2b0', 'jne', 'CTC', 'Estimasi 1-2 Hari', 'Jineman.Kloposawit, Girikerto, Turi, Sleman, DIY RT/RW 004/006', '55551', 'Zanika', '089669413260', 500, 6000, NULL),
(127, 'Millano-5f3d10b4dfde5', 'jne', 'CTC', 'Estimasi 1-2 Hari', 'Jineman.Kloposawit, Girikerto, Turi, Sleman, DIY RT/RW 004/006', '55551', 'Hananta Guntur', '089669413260', 750, 6000, NULL),
(129, 'Millano-5f63496fd83fc', 'jne', 'CTC', 'Estimasi 1-2 Hari', 'JINEMAN.KLOPOSAWIT\r\n004/006', '55551', 'Rahma A P', '089669413260', 250, 6000, NULL),
(130, 'Millano-5f634a66b7fb2', 'jne', 'CTC', 'Estimasi 1-2 Hari', 'Jineman.Kloposawit, Girikerto, Turi, Sleman, DIY RT/RW 004/006', '55551', 'Rahma A P', '08982002040', 250, 6000, NULL),
(131, 'Millano-5f63514764cf5', 'jne', 'CTC', 'Estimasi 1-2 Hari', 'jineman, Girikerto, Turi, Sleman, DIY', '55551', 'Hananta Guntur', '089669413260', 250, 6000, NULL),
(132, 'Millano-5f6352274609d', 'jne', 'CTC', 'Estimasi 1-2 Hari', 'Jineman.Kloposawit, Girikerto, Turi, Sleman, DIY RT/RW 004/006', '55551', 'Rahma A P', '08982002040', 250, 6000, NULL),
(133, 'Millano-5fe76836c46e6', 'tiki', 'ECO', 'Estimasi 4 Hari', 'Jineman.Kloposawit, Girikerto, Turi, Sleman, DIY RT/RW 004/006', '55551', 'Rahma', '08982002040', 250, 7000, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(10) NOT NULL,
  `unik_produk` varchar(50) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `ket_produk` text NOT NULL,
  `id_cat` int(10) DEFAULT NULL,
  `harga_produk` int(12) NOT NULL,
  `gambar_produk` varchar(50) NOT NULL,
  `gambar_tambahan` varchar(255) DEFAULT NULL,
  `create_date` int(11) NOT NULL,
  `delete_at` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `unik_produk`, `nama_produk`, `ket_produk`, `id_cat`, `harga_produk`, `gambar_produk`, `gambar_tambahan`, `create_date`, `delete_at`) VALUES
(42, 'BAJU000001', 'Baju Bahan Tipis Tipis', 'Baju ini sangat cocok untuk digunakan tidur dimalam hari  karena bahanya yang tipis ', 13, 90000, '1587722854652.png', '1609005209893.jpg', 1587722854, 0),
(43, 'TAS000043', 'Totebag Motif Big Hero', 'Tas buatan tangan dengan gaya anak muda jaman sekarang ', 9, 60000, '1587724039221.jpeg', NULL, 1587724039, 0),
(44, 'TAS000044', 'Totebag Motif The Simpsons', 'Bahan awet dengan pembuatan menggunakan tangan secara langsung.', 9, 60000, '1587724093216.jpeg', NULL, 1587724093, 0),
(45, 'BAJU000045', 'Kaos Old For All', 'Kaos untuk pecinta motor cross dan trabas ', 1, 120000, '1587724321138.png', NULL, 1587724321, 0),
(46, 'BAJU000046', 'Kaos Sni Licious', 'Kaos untuk pecinta motor cross dan trabas.', 1, 120000, '1587724372425.png', NULL, 1587724372, 0),
(47, 'BAJU000047', 'Long Sleeve', 'Untuk trabas di ngalasan juga bisa, untuk pergi ke kantor juga oke.', 1, 135000, '1587724452592.png', NULL, 1587724452, 0),
(48, 'TOPI000048', 'Topi Converse Original', 'Topi anak muda, cocok digunakan ketika ngarit di kebun.', 5, 150000, '1587726545981.jpg', NULL, 1587726546, 1609275997),
(49, 'CELANA000049', 'Celana Pendek Dickies', 'Celana dede gemes yang bagus digunakan untuk renang ', 14, 120000, '1608936721270.jpg', '1608936721291.jpg', 1587726652, 0),
(50, 'SENDAL000050', 'SCHUTZ Women Black Naama Nubuck', 'SCHUTZ Women Black Naama nubuck sandals Product code: 14693524283349729 CKVYNVJ', 13, 230000, '1587726796949.jpg', NULL, 1587726797, 1609338173),
(51, 'WANITA000051', 'Women Alexander Mcqueen Mini Leather', 'Details :\r\nMade in Italy\r\nExterior design details: gold-tone hardware\r\nInterior design details: suede lining, interior pocket\r\nMeasures 9in wide x 6.75in high x 3.25in deep\r\nImported', 9, 300000, '1587727164811.jpg', NULL, 1587727164, 0),
(52, 'TOPI000052', 'Topi Miring', 'Untuk menutupi kepala dari sinar matahari', 5, 80000, '1601280510839.jpg', NULL, 1601280510, 0),
(53, 'PENDEK000053', 'Celana Pendek Sadewa Blue', 'Celana pendek model Sadewa Blue untuk anak muda jaman sekarang', 14, 120000, '1608804398335.jpg', NULL, 1608804398, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tags`
--

CREATE TABLE `tags` (
  `id_tags` int(10) NOT NULL,
  `nama_tag` varchar(50) NOT NULL,
  `ket_tag` varchar(50) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tags`
--

INSERT INTO `tags` (`id_tags`, `nama_tag`, `ket_tag`, `active`) VALUES
(1, 'Casual', 'Dipakai untuk kegiatan santai, seperti hangout.', 1),
(3, 'Sport', 'Cocok dipakai untuk kegiatan olahraga', 1),
(4, 'Holiday', 'Untuk digunakan berlibur', 1),
(5, 'Pria', 'Produk untuk pria', 1),
(7, 'Jogging', 'Cocok untuk jogging di pagi hari.', 1),
(8, 'Handmade', 'Buatan tangan', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tags_produk`
--

CREATE TABLE `tags_produk` (
  `id_tags_produk` int(11) NOT NULL,
  `id_produk` int(10) NOT NULL,
  `id_tags` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tags_produk`
--

INSERT INTO `tags_produk` (`id_tags_produk`, `id_produk`, `id_tags`) VALUES
(41, 44, 8),
(42, 45, 1),
(43, 45, 3),
(44, 45, 5),
(45, 46, 1),
(46, 46, 3),
(47, 46, 5),
(48, 47, 1),
(49, 47, 5),
(50, 48, 1),
(51, 48, 3),
(55, 50, 1),
(56, 51, 1),
(57, 52, 1),
(58, 52, 3),
(59, 53, 1),
(60, 53, 4),
(61, 53, 5),
(69, 43, 1),
(70, 43, 8),
(92, 49, 1),
(93, 49, 5),
(94, 49, 7),
(102, 42, 1),
(103, 42, 3),
(104, 42, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id_token` int(11) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `expire_at` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id_token`, `token`, `expire_at`, `id_user`) VALUES
(2, 'KCiXRO8SP0M1NJO3eqKDFNQpLLcent7xPjurXAEj959wTB1rWaisYgHxY3Tcm5qkaftnM', 1609339006, 57);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `detail_produk`
--
ALTER TABLE `detail_produk`
  ADD PRIMARY KEY (`id_detail`),
  ADD UNIQUE KEY `id_produk_2` (`id_produk`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `detail_user`
--
ALTER TABLE `detail_user`
  ADD PRIMARY KEY (`id_detail`),
  ADD UNIQUE KEY `id_user` (`id_user`),
  ADD KEY `detail_user_ibfk_1` (`id_user`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indeks untuk tabel `midtrans`
--
ALTER TABLE `midtrans`
  ADD PRIMARY KEY (`id_midtrans`),
  ADD UNIQUE KEY `order_id` (`order_id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_orders`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `orders_produk`
--
ALTER TABLE `orders_produk`
  ADD PRIMARY KEY (`id_orders_produk`),
  ADD KEY `id_orders` (`id_orders`),
  ADD KEY `orders_produk_ibfk_2` (`id_produk`);

--
-- Indeks untuk tabel `parent_kategori`
--
ALTER TABLE `parent_kategori`
  ADD PRIMARY KEY (`parent_kategori_id`);

--
-- Indeks untuk tabel `parent_kategori_kategori`
--
ALTER TABLE `parent_kategori_kategori`
  ADD PRIMARY KEY (`parent_kategori_kategori_id`),
  ADD KEY `parent_kategori_id` (`parent_kategori_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indeks untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id_ongkir`),
  ADD UNIQUE KEY `id_orders` (`id_orders`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_cat` (`id_cat`);

--
-- Indeks untuk tabel `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id_tags`);

--
-- Indeks untuk tabel `tags_produk`
--
ALTER TABLE `tags_produk`
  ADD PRIMARY KEY (`id_tags_produk`),
  ADD KEY `produk` (`id_produk`),
  ADD KEY `id_tag` (`id_tags`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id_token`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `detail_produk`
--
ALTER TABLE `detail_produk`
  MODIFY `id_detail` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `detail_user`
--
ALTER TABLE `detail_user`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_cat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `midtrans`
--
ALTER TABLE `midtrans`
  MODIFY `id_midtrans` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT untuk tabel `orders_produk`
--
ALTER TABLE `orders_produk`
  MODIFY `id_orders_produk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT untuk tabel `parent_kategori`
--
ALTER TABLE `parent_kategori`
  MODIFY `parent_kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `parent_kategori_kategori`
--
ALTER TABLE `parent_kategori_kategori`
  MODIFY `parent_kategori_kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id_ongkir` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `tags`
--
ALTER TABLE `tags`
  MODIFY `id_tags` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tags_produk`
--
ALTER TABLE `tags_produk`
  MODIFY `id_tags_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_produk`
--
ALTER TABLE `detail_produk`
  ADD CONSTRAINT `detail_produk_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_user`
--
ALTER TABLE `detail_user`
  ADD CONSTRAINT `detail_user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `data_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `midtrans`
--
ALTER TABLE `midtrans`
  ADD CONSTRAINT `midtrans_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id_orders`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `data_user` (`id_user`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Ketidakleluasaan untuk tabel `orders_produk`
--
ALTER TABLE `orders_produk`
  ADD CONSTRAINT `orders_produk_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_produk_ibfk_3` FOREIGN KEY (`id_orders`) REFERENCES `orders` (`id_orders`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `parent_kategori_kategori`
--
ALTER TABLE `parent_kategori_kategori`
  ADD CONSTRAINT `parent_kategori_kategori_ibfk_1` FOREIGN KEY (`parent_kategori_id`) REFERENCES `parent_kategori` (`parent_kategori_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parent_kategori_kategori_ibfk_2` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id_cat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `pengiriman_ibfk_1` FOREIGN KEY (`id_orders`) REFERENCES `orders` (`id_orders`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `kategori` (`id_cat`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tags_produk`
--
ALTER TABLE `tags_produk`
  ADD CONSTRAINT `tags_produk_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tags_produk_ibfk_2` FOREIGN KEY (`id_tags`) REFERENCES `tags` (`id_tags`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD CONSTRAINT `user_token_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `data_user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
