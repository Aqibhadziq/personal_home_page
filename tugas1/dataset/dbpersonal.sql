-- Database: `dbpersonal`
-- Personal Home Page - Tugas 1

CREATE DATABASE IF NOT EXISTS `dbpersonal`;
USE `dbpersonal`;

-- --------------------------------------------------------
-- Table: users (untuk autentikasi)
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`nama`, `username`, `password`, `role`) VALUES
('Administrator', 'admin', MD5('admin123'), 'admin'),
('John Doe', 'user1', MD5('user123'), 'user');

-- --------------------------------------------------------
-- Table: level (jenjang pendidikan)
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `level` (`nama`) VALUES
('TK'),
('SD'),
('SMP'),
('SMA'),
('D3'),
('S1'),
('S2'),
('S3');

-- --------------------------------------------------------
-- Table: studies (riwayat pendidikan)
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `studies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) NOT NULL,
  `idlevel` int(11) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `tahun_lulus` year(4) NOT NULL,
  `foto_sekolah` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`idlevel`) REFERENCES `level`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `studies` (`nama`, `idlevel`, `keterangan`, `tahun_lulus`, `foto_sekolah`) VALUES
('TK Tunas Harapan', 1, 'Taman Kanak-Kanak di Jakarta Selatan', 2005, NULL),
('SDN 01 Menteng', 2, 'Sekolah Dasar Negeri di Jakarta Pusat, lulus dengan nilai memuaskan', 2011, NULL),
('SMPN 5 Jakarta', 3, 'Sekolah Menengah Pertama Negeri, aktif dalam kegiatan pramuka dan OSIS', 2014, NULL),
('SMAN 8 Jakarta', 4, 'Sekolah Menengah Atas Negeri, jurusan IPA, Ketua OSIS periode 2015-2016', 2017, NULL),
('STMIK Nusa Mandiri', 6, 'Program Studi Teknik Informatika, fokus pada pengembangan web dan mobile', 2022, NULL);
