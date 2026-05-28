-- =============================================
-- Database: db_kusen
-- Rizz Furniture – Kusen & Interior Modern
-- =============================================

CREATE DATABASE IF NOT EXISTS `db_kusen` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `db_kusen`;

-- Tabel admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(150) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Akun admin default (password: admin123)
INSERT INTO `admin` (`username`, `password`, `nama_lengkap`) VALUES
('admin', MD5('admin123'), 'Administrator');

-- Tabel produk
CREATE TABLE IF NOT EXISTS `produk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` text,
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data produk sample (gambar menggunakan placeholder dari carousel)
INSERT INTO `produk` (`nama_produk`, `harga`, `deskripsi`, `gambar`) VALUES
('Kusen Aluminium Minimalis Series A', 1850000, 'Kusen aluminium profil minimalis dengan finishing powder coating. Cocok untuk pintu dan jendela rumah modern. Tersedia dalam berbagai warna pilihan. Tahan karat dan anti rayap.', 'carousel_kusen.jpg'),
('Pintu Aluminium Full Panel', 2750000, 'Pintu aluminium full panel dengan desain elegan dan modern. Material tebal 1.2mm, dilengkapi karet seal kedap suara dan air. Tersedia ukuran standar dan custom.', 'carousel1.png'),
('Jendela Sliding Aluminium 2 Panel', 1450000, 'Jendela geser aluminium 2 panel dengan rel stainless steel berkualitas. Mudah dibuka tutup, hemat ruang, dan tampilan modern. Kaca tempered 5mm tersedia.', 'carousel2.png'),
('Set Meja Makan Kayu Jati Minimalis', 4500000, 'Set meja makan 4 kursi dari kayu jati pilihan dengan finishing natural. Desain minimalis modern cocok untuk ruang makan rumah maupun cafe. Ukuran 120x70cm.', 'kayu.jpg'),
('Kusen Aluminium Casement Window', 1650000, 'Kusen jendela casement aluminium dengan engsel tersembunyi. Sistem buka ke dalam atau ke luar, kedap angin dan hujan. Profil 40x40mm, tersedia warna putih, coklat, dan hitam.', 'alumunium.jpg'),
('Partisi Aluminium Kaca Tempered', 3200000, 'Partisi ruangan berbahan aluminium dengan kaca tempered 8mm. Cocok untuk kantor, cafe, dan ruang komersial. Desain modern dan elegan, mudah dipasang dan dibongkar.', 'carousel_kusen.jpg'),
('Pintu Lipat Aluminium 4 Panel', 3800000, 'Pintu lipat aluminium 4 panel untuk area teras, balkon, atau ruang terbuka. Sistem folding yang halus dan kuat. Material aluminium 1.4mm dengan kaca tempered 5mm.', 'carousel1.png'),
('Kusen Pintu Aluminium Heavy Duty', 2100000, 'Kusen pintu aluminium profil heavy duty untuk bangunan komersial. Ketebalan profil 1.5mm, tahan beban berat, dan cocok untuk pintu double. Tersedia warna anodize silver dan bronze.', 'carousel2.png');
