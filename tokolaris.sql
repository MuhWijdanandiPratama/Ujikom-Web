-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2020 at 12:36 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokolaris`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `bayarProduk` (IN `idPesanan` INT(5), IN `totalHarga` INT(15), IN `tglPembayaran` VARCHAR(20))  BEGIN
DECLARE cekPembayaran BOOLEAN;
START TRANSACTION;
INSERT INTO tbl_pembayaran
VALUES (null,idPesanan,totalHarga,tglPembayaran);
SET cekPembayaran = ROW_COUNT();
IF cekPembayaran IS TRUE THEN
COMMIT;
ELSE 
ROLLBACK;
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getDetailPesanan` (IN `id` INT(5))  BEGIN
SELECT * FROM `tbl_pesanan` 
LEFT JOIN tbl_pembayaran USING(id_pesanan) 
JOIN tbl_produk USING(id_produk) 
JOIN tbl_user ON id_pembeli = id_user
WHERE id_pesanan = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getDetailProduk` (IN `id` INT(5))  BEGIN
SELECT p.id_produk, p.nama_produk, 
p.harga_produk, p.stok, p.deskripsi_produk
,p.id_supplier,u.username 
FROM `tbl_produk` p 
JOIN `tbl_user` u ON 
p.id_supplier = u.id_user 
WHERE p.id_produk = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getPesanan` ()  BEGIN
SELECT * FROM `tbl_pesanan` 
LEFT JOIN tbl_pembayaran USING(id_pesanan) 
JOIN tbl_produk USING(id_produk) 
JOIN tbl_user ON id_pembeli = id_user;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pesanProduk` (IN `idProduk` INT(5), IN `idPembeli` INT(5), IN `qty` INT(5), IN `tglPesanan` VARCHAR(20), IN `pesan` TEXT)  BEGIN
DECLARE cekPesanan BOOLEAN;
START TRANSACTION;
INSERT INTO tbl_pesanan
VALUES (null,idProduk,idPembeli,qty,tglPesanan,pesan);
SET cekPesanan = ROW_COUNT();
IF cekPesanan IS TRUE THEN
COMMIT;
ELSE 
ROLLBACK;
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tambahStok` (IN `idProduk` INT(5), IN `tambahanStok` INT(5))  BEGIN
UPDATE tbl_produk
SET stok = stok + tambahanStok
WHERE id_produk = idProduk;

INSERT INTO tbl_arus_barang
VALUES(null,idProduk,tambahanStok,
'masuk',CURRENT_TIMESTAMP);

END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `getIdProduk` (`idPesanan` INT(5)) RETURNS INT(5) BEGIN
DECLARE idProduk INT;
SELECT id_produk INTO idProduk 
FROM tbl_pesanan
WHERE id_pesanan = idPesanan;
RETURN idProduk;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `getQty` (`idPesanan` INT(5)) RETURNS INT(5) BEGIN
DECLARE getQty INT;
SELECT qty INTO getQty 
FROM tbl_pesanan
WHERE id_pesanan = idPesanan;
RETURN getQty;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_arus_barang`
--

CREATE TABLE `tbl_arus_barang` (
  `id_arus_barang` int(5) NOT NULL,
  `id_produk` int(5) NOT NULL,
  `qty` int(5) NOT NULL,
  `keterangan` varchar(10) NOT NULL,
  `tgl_arus_barang` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_arus_barang`
--

INSERT INTO `tbl_arus_barang` (`id_arus_barang`, `id_produk`, `qty`, `keterangan`, `tgl_arus_barang`) VALUES
(1, 1, 1, 'keluar', '2020-11-04 03:48:28'),
(2, 2, 2, 'keluar', '2020-11-04 03:49:12'),
(4, 3, 1, 'keluar', '2020-11-05 09:19:43'),
(5, 4, 1, 'keluar', '2020-11-05 13:44:58'),
(6, 4, 2, 'keluar', '2020-11-05 13:45:11'),
(7, 5, 5, 'keluar', '2020-11-05 14:39:52'),
(8, 5, 10, 'masuk', '2020-11-05 14:42:07'),
(9, 4, 11, 'keluar', '2020-11-05 16:35:14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `id_pembayaran` int(5) NOT NULL,
  `id_pesanan` int(5) NOT NULL,
  `total_harga` int(15) NOT NULL,
  `tgl_pembayaran` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pembayaran`
--

INSERT INTO `tbl_pembayaran` (`id_pembayaran`, `id_pesanan`, `total_harga`, `tgl_pembayaran`) VALUES
(1, 1, 5000000, '2020-11-04 03:48:28'),
(2, 2, 400000, '2020-11-04 03:49:12'),
(3, 4, 300000, '2020-11-05 09:19:43'),
(4, 3, 250000, '2020-11-05 13:44:58'),
(5, 6, 500000, '2020-11-05 13:45:11'),
(6, 7, 10000000, '2020-11-05 14:39:52'),
(7, 9, 2750000, '2020-11-05 16:35:14');

--
-- Triggers `tbl_pembayaran`
--
DELIMITER $$
CREATE TRIGGER `produkTerjual` AFTER INSERT ON `tbl_pembayaran` FOR EACH ROW BEGIN
DECLARE newQty INT;
DECLARE newIdProduk INT;
SET newQty = getQty(NEW.id_pesanan);
SET newIdProduk = getIdProduk(NEW.id_pesanan);

UPDATE tbl_produk
SET stok = stok - newQty
WHERE id_produk = newIdProduk;

INSERT INTO tbl_arus_barang
VALUES(null,newIdProduk,newQty,
'keluar',NEW.tgl_pembayaran);

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pesanan`
--

CREATE TABLE `tbl_pesanan` (
  `id_pesanan` int(5) NOT NULL,
  `id_produk` int(5) NOT NULL,
  `id_pembeli` int(5) NOT NULL,
  `qty` int(5) NOT NULL,
  `tgl_pesanan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pesanan`
--

INSERT INTO `tbl_pesanan` (`id_pesanan`, `id_produk`, `id_pembeli`, `qty`, `tgl_pesanan`, `pesan`) VALUES
(1, 1, 1, 1, '2020-11-04 12:57:32', 'Cepat diantar'),
(2, 2, 2, 2, '2020-11-04 12:57:42', 'Cepat diantar'),
(3, 4, 2, 1, '2020-11-04 12:58:46', 'Cepat diantar'),
(4, 3, 1, 1, '2020-11-04 12:59:17', 'Cepat diantar'),
(6, 4, 2, 2, '2020-11-04 15:48:28', 'Tolong cepat diantar'),
(7, 5, 1, 5, '2020-11-05 14:39:43', 'Cepat dikirim dan hati-hati'),
(8, 1, 1, 5, '2020-11-05 16:19:37', 'Tolong Hati -hati bawanya'),
(9, 4, 7, 11, '2020-11-05 16:35:04', 'Tolong dibawa yang hati2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_produk` int(5) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga_produk` int(5) NOT NULL,
  `stok` int(5) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `id_supplier` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `nama_produk`, `harga_produk`, `stok`, `deskripsi_produk`, `id_supplier`) VALUES
(1, 'Sepatu Kulit Buaya', 5000000, 15, 'Sepatu Ori', 3),
(2, 'Sepatu Sepak Bola NIKE', 200000, 25, 'Sepatu Ori', 4),
(3, 'Sepatu High Heels', 300000, 29, 'Sepatu Ori', 3),
(4, 'Sepatu Sepak Bola Adidas', 250000, 6, 'Sepatu Ori', 4),
(5, 'Sepatu Kulit Ular', 2000000, 15, 'Sepatu Ori', 3),
(6, 'Sepatu Bulutangkis NIKE', 200000, 20, 'Sepatu Ori', 6);

--
-- Triggers `tbl_produk`
--
DELIMITER $$
CREATE TRIGGER `insertProduk` AFTER INSERT ON `tbl_produk` FOR EACH ROW BEGIN

INSERT INTO tbl_arus_barang
VALUES(null,NEW.id_produk,NEW.stok,
'masuk',CURRENT_TIMESTAMP);

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `email`, `role`) VALUES
(1, 'nana', 'nana', 'nana@gmail.com', 'pembeli'),
(2, 'kaka', 'kaka', 'kaka@gmail.com', 'pembeli'),
(3, 'budi', 'budi', 'budi@gmail.com', 'supplier'),
(4, 'eko', 'eko', 'eko@gmail.com', 'supplier'),
(5, 'admin', 'admin', 'admin@gmail.com', 'admin'),
(6, 'agus', 'agus', 'agus@gmail.com', 'supplier'),
(7, 'bambang', 'bambang', 'bambang@gmail.com', 'pembeli'),
(8, 'cahyono', 'cahyono', 'cahyono@gmail.com', 'supplier');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_supplier`
-- (See below for the actual view)
--
CREATE TABLE `v_supplier` (
`id_user` int(5)
,`username` varchar(50)
,`role` varchar(10)
);

-- --------------------------------------------------------

--
-- Structure for view `v_supplier`
--
DROP TABLE IF EXISTS `v_supplier`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_supplier`  AS  select `tbl_user`.`id_user` AS `id_user`,`tbl_user`.`username` AS `username`,`tbl_user`.`role` AS `role` from `tbl_user` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_arus_barang`
--
ALTER TABLE `tbl_arus_barang`
  ADD PRIMARY KEY (`id_arus_barang`);

--
-- Indexes for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_arus_barang`
--
ALTER TABLE `tbl_arus_barang`
  MODIFY `id_arus_barang` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  MODIFY `id_pembayaran` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  MODIFY `id_pesanan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_produk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
