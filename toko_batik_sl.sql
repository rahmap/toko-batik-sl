-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 24, 2022 at 07:06 PM
-- Server version: 10.5.16-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u136045072_toko_batik`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE `data_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `zip_code` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `provinsi` varchar(200) DEFAULT NULL,
  `kabupaten` varchar(200) DEFAULT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `saldo` int(11) NOT NULL DEFAULT 0,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`id_user`, `nama`, `no_hp`, `zip_code`, `address`, `provinsi`, `kabupaten`, `kecamatan`, `email`, `password`, `saldo`, `level`) VALUES
(1, 'Lilik', NULL, NULL, NULL, NULL, NULL, NULL, 'srilestaribatik03@gmail.com', '$2y$10$4.OCboz6MYOYsGNOjpGteO8TMJwssdD5otIUhxRbCXpTSSmM7lxz6', 0, 'Owner'),
(2, 'penjual', NULL, NULL, NULL, NULL, NULL, NULL, 'admin@admin.com', '$2y$10$LmFWCdzCXFrzzz5WJeKFMOatmrEBiEU9QoIpv/h4T9xNWKfi7l37.', 0, 'Admin'),
(73, 'Lilik Nur Hidayat', '0872112211', '5711', 'tepus gunungkidul', 'DI Yogyakarta', 'Gunung Kidul', 'gunung kidul', 'liliktari78@gmail.com', '$2y$10$OMJlRhgSvL701/pmoWb5auQRxpi2loXNXGxe6cKVHyRWOw.adIcT.', 0, 'Member'),
(76, 'Sri Lestari', '0817582929', '55711', 'tegaldowo', 'DI Yogyakarta', 'Bantul', 'bantul', 'lilikhidayat76@gmail.com', '$2y$10$4G1KcPPDs8ersLJ94fKuW.ezObaVE59RkXcsGugoMmEmtEXnI8ud2', 0, 'Seller');

-- --------------------------------------------------------

--
-- Table structure for table `detail_produk`
--

CREATE TABLE `detail_produk` (
  `id_detail` int(11) NOT NULL,
  `stok` int(11) DEFAULT 0,
  `diskon` int(11) DEFAULT 0,
  `ukuran` varchar(50) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL,
  `aktif` int(11) NOT NULL DEFAULT 0,
  `id_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_produk`
--

INSERT INTO `detail_produk` (`id_detail`, `stok`, `diskon`, `ukuran`, `berat`, `aktif`, `id_produk`) VALUES
(44, 100, 0, 'all size, ', 200, 0, 59),
(45, 99, 0, 'all size, ', 200, 1, 60),
(46, 100, 0, 'all size, ', 200, 1, 61),
(47, 100, 0, 'all size, ', 200, 1, 62),
(48, 100, 0, 'all size, ', 200, 1, 63),
(49, 97, 0, 'all size, ', 200, 1, 64);

-- --------------------------------------------------------

--
-- Table structure for table `detail_user`
--

CREATE TABLE `detail_user` (
  `id_detail` int(11) NOT NULL,
  `foto` varchar(50) DEFAULT 'default.png',
  `is_active` int(11) DEFAULT 1,
  `create_date` int(11) DEFAULT NULL,
  `delete_at` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_user`
--

INSERT INTO `detail_user` (`id_detail`, `foto`, `is_active`, `create_date`, `delete_at`, `id_user`) VALUES
(1, '1661242303100.png', 1, 1566678130, NULL, 1),
(2, '1609003137145.png', 1, 1566678360, NULL, 2),
(73, 'default.png', 1, 1661242681, NULL, 73),
(74, 'default.png', 1, 1661243383, NULL, 76);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_cat` int(11) NOT NULL,
  `nama_cat` varchar(50) NOT NULL,
  `ket_cat` varchar(50) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_cat`, `nama_cat`, `ket_cat`, `active`) VALUES
(1, 'Baju', 'Pakaian berbentuk baju', 1),
(5, 'Jarek', 'Buat Kondangan', 1),
(9, 'Tas', 'Untuk angkut barang', 1),
(14, 'Kain', 'Berbentuk Kain batik', 1);

-- --------------------------------------------------------

--
-- Table structure for table `midtrans`
--

CREATE TABLE `midtrans` (
  `id_midtrans` int(11) NOT NULL,
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
-- Dumping data for table `midtrans`
--

INSERT INTO `midtrans` (`id_midtrans`, `transaction_id`, `status_message`, `va_number`, `bank`, `payment_type`, `order_id`, `gross_amount`, `transaction_time`, `transaction_status`, `settlement_time`) VALUES
(99, '61dadfec-cd44-42d0-8d6f-111fc3c7ba57', 'midtrans payment notification', '10440677950', 'bca', 'bank_transfer', 'Batik-630491e749f33', 256000, '2022-08-23 15:38:59', 'settlement', '2022-08-23 15:39:15'),
(100, '699a3f7d-a17e-4eeb-93ea-8894b90bb3ed', 'midtrans payment notification', '10440376643', 'bca', 'bank_transfer', 'Batik-63062dc3a67c7', 31000, '2022-08-24 20:55:28', 'settlement', '2022-08-24 20:55:46');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
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
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_orders`, `id_user`, `status_order`, `tanggal_order`, `total_harga_barang`, `keterangan`, `nomer_resi`, `status_pengiriman`, `tanggal_selesai`) VALUES
('Batik-630491e749f33', 73, 'Selesai', '1661243880', 250000, 'Nomer Resi telah di inputkan', 'qweeqw', 'Terkirim', '23/08/2022'),
('Batik-63062d4d6990a', 73, NULL, '1661349198', 25000, 'Menunggu Pembayaran', NULL, NULL, NULL),
('Batik-63062d84e251a', 73, NULL, '1661349253', 25000, 'Menunggu Pembayaran', NULL, NULL, NULL),
('Batik-63062dc3a67c7', 73, 'Selesai', '1661349315', 25000, 'Nomer Resi telah di inputkan', 'qweqe', 'Terkirim', '24/08/2022');

-- --------------------------------------------------------

--
-- Table structure for table `orders_produk`
--

CREATE TABLE `orders_produk` (
  `id_orders_produk` int(11) NOT NULL,
  `id_orders` varchar(50) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `ukuran_orders` varchar(10) DEFAULT NULL,
  `qty` varchar(10) NOT NULL,
  `diskon_orders` int(11) DEFAULT NULL,
  `harga_orders` int(11) DEFAULT NULL,
  `nama_orders` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_produk`
--

INSERT INTO `orders_produk` (`id_orders_produk`, `id_orders`, `id_produk`, `ukuran_orders`, `qty`, `diskon_orders`, `harga_orders`, `nama_orders`) VALUES
(213, 'Batik-630491e749f33', 60, 'all size', '1', 0, 250000, 'Batik Abtrak'),
(214, 'Batik-63062d4d6990a', 64, 'all size', '1', 0, 25000, 'Abtrak Abtrak'),
(215, 'Batik-63062d84e251a', 64, 'all size', '1', 0, 25000, 'Abtrak Abtrak'),
(216, 'Batik-63062dc3a67c7', 64, 'all size', '1', 0, 25000, 'Abtrak Abtrak');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_ongkir` int(11) NOT NULL,
  `id_orders` varchar(50) NOT NULL,
  `kurir` varchar(50) NOT NULL,
  `service` varchar(100) NOT NULL,
  `estimasi` varchar(50) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `kode_pos` varchar(20) DEFAULT NULL,
  `nama_penerima` varchar(50) DEFAULT NULL,
  `no_penerima` varchar(20) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL,
  `total_ongkir` int(11) NOT NULL,
  `notifikasi_email` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`id_ongkir`, `id_orders`, `kurir`, `service`, `estimasi`, `alamat_pengiriman`, `kode_pos`, `nama_penerima`, `no_penerima`, `berat`, `total_ongkir`, `notifikasi_email`) VALUES
(150, 'Batik-630491e749f33', 'jne', 'CTC', 'Estimasi 1-2 Hari', 'DI Yogyakarta, Gunung Kidul, gunung kidul, tepus gunungkidul', '5711', 'Lilik Nur Hidayat', '0872112211', 200, 6000, NULL),
(151, 'Batik-63062d4d6990a', 'jne', 'CTC', 'Estimasi 1-2 Hari', 'DI Yogyakarta, Gunung Kidul, gunung kidul, tepus gunungkidul', '5711', 'Lilik Nur Hidayat', '0872112211', 200, 6000, NULL),
(152, 'Batik-63062d84e251a', 'jne', 'CTC', 'Estimasi 1-2 Hari', 'DI Yogyakarta, Gunung Kidul, gunung kidul, tepus gunungkidul', '5711', 'Lilik Nur Hidayat', '0872112211', 200, 6000, NULL),
(153, 'Batik-63062dc3a67c7', 'jne', 'CTC', 'Estimasi 1-2 Hari', 'DI Yogyakarta, Gunung Kidul, gunung kidul, tepus gunungkidul', '5711', 'Lilik Nur Hidayat', '0872112211', 200, 6000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `fk_seller` int(11) NOT NULL,
  `unik_produk` varchar(50) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `ket_produk` text NOT NULL,
  `id_cat` int(11) DEFAULT NULL,
  `harga_produk` int(11) NOT NULL,
  `gambar_produk` varchar(50) NOT NULL,
  `gambar_tambahan` varchar(255) DEFAULT NULL,
  `create_date` int(11) NOT NULL,
  `delete_at` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `fk_seller`, `unik_produk`, `nama_produk`, `ket_produk`, `id_cat`, `harga_produk`, `gambar_produk`, `gambar_tambahan`, `create_date`, `delete_at`) VALUES
(59, 76, 'KAIN000001', 'Batik Abstrak', 'Batik adalah kain Indonesia bergambar yang pembuatannya secara khusus dengan menuliskan atau menerakan malam pada kain itu', 14, 250, '1661243561267.jpg', '1661243561269.jpg', 1661243561, 1661243682),
(60, 76, 'KAIN000060', 'Batik Abtrak', 'Batik adalah kain Indonesia bergambar yang pembuatannya secara khusus dengan menuliskan atau menerakan malam pada kain itu', 14, 250000, '1661243775921.jpg', '1661243775923.jpg', 1661243775, 0),
(61, 76, 'KAIN000061', 'Batik Abtrak', 'Batik pesisir Indonesia dari pulau Jawa memiliki sejarah akulturasi yang panjang,', 14, 250000, '1661348657547.jpeg', '1661348657552.jpeg', 1661348657, 0),
(62, 76, 'KAIN000062', 'Batik Abtrak', 'Batik pesisir Indonesia dari pulau Jawa memiliki sejarah akulturasi yang panjang,', 14, 250000, '1661348780313.jpeg', '1661348780315.jpeg', 1661348780, 0),
(63, 76, 'KAIN000063', 'Batik Kotempoler', 'Batik pesisir Indonesia dari pulau Jawa memiliki sejarah akulturasi yang panjang,', 14, 250000, '1661348844676.jpeg', '1661348844677.jpeg', 1661348844, 0),
(64, 76, 'KAIN000064', 'Abtrak Abtrak', 'Batik pesisir Indonesia dari pulau Jawa memiliki sejarah akulturasi yang panjang,', 14, 25000, '1661348900226.jpeg', '1661348900228.jpeg', 1661348900, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id_token` int(11) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `expire_at` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `detail_produk`
--
ALTER TABLE `detail_produk`
  ADD PRIMARY KEY (`id_detail`),
  ADD UNIQUE KEY `id_produk_2` (`id_produk`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `detail_user`
--
ALTER TABLE `detail_user`
  ADD PRIMARY KEY (`id_detail`),
  ADD UNIQUE KEY `id_user` (`id_user`),
  ADD KEY `detail_user_ibfk_1` (`id_user`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indexes for table `midtrans`
--
ALTER TABLE `midtrans`
  ADD PRIMARY KEY (`id_midtrans`),
  ADD UNIQUE KEY `order_id` (`order_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_orders`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `orders_produk`
--
ALTER TABLE `orders_produk`
  ADD PRIMARY KEY (`id_orders_produk`),
  ADD KEY `id_orders` (`id_orders`),
  ADD KEY `orders_produk_ibfk_2` (`id_produk`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id_ongkir`),
  ADD UNIQUE KEY `id_orders` (`id_orders`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_cat` (`id_cat`),
  ADD KEY `fk_seller` (`fk_seller`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id_token`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `detail_produk`
--
ALTER TABLE `detail_produk`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `detail_user`
--
ALTER TABLE `detail_user`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `midtrans`
--
ALTER TABLE `midtrans`
  MODIFY `id_midtrans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `orders_produk`
--
ALTER TABLE `orders_produk`
  MODIFY `id_orders_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_produk`
--
ALTER TABLE `detail_produk`
  ADD CONSTRAINT `detail_produk_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_user`
--
ALTER TABLE `detail_user`
  ADD CONSTRAINT `detail_user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `data_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `midtrans`
--
ALTER TABLE `midtrans`
  ADD CONSTRAINT `midtrans_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id_orders`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `data_user` (`id_user`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `orders_produk`
--
ALTER TABLE `orders_produk`
  ADD CONSTRAINT `orders_produk_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_produk_ibfk_3` FOREIGN KEY (`id_orders`) REFERENCES `orders` (`id_orders`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `pengiriman_ibfk_1` FOREIGN KEY (`id_orders`) REFERENCES `orders` (`id_orders`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `kategori` (`id_cat`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `produk_ibfk_2` FOREIGN KEY (`fk_seller`) REFERENCES `data_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_token`
--
ALTER TABLE `user_token`
  ADD CONSTRAINT `user_token_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `data_user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
