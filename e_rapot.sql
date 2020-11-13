-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2020 at 12:34 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_rapot`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tgl` varchar(25) NOT NULL,
  `jk` varchar(25) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `user_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `banksoal`
--

CREATE TABLE `banksoal` (
  `kode_soal` varchar(20) NOT NULL,
  `soal` text NOT NULL,
  `sa` varchar(200) DEFAULT NULL,
  `sb` varchar(200) DEFAULT NULL,
  `sc` varchar(200) DEFAULT NULL,
  `sd` varchar(200) DEFAULT NULL,
  `kunci` varchar(10) DEFAULT NULL,
  `kategori` int(11) DEFAULT NULL,
  `nama_mapel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banksoal`
--

INSERT INTO `banksoal` (`kode_soal`, `soal`, `sa`, `sb`, `sc`, `sd`, `kunci`, `kategori`, `nama_mapel`) VALUES
('Sl4HNHB92', 'Proklamasi kemerdekaan 17 Agustus 1945 bagi bangsa Indonesia secara yuridis mengandung makna....', 'berakhirnya hukum kolonial menuju hukum tertib hukum nasional', 'akhir perjuangan suatu bangsa', 'kebebasan yang seluas-luasnya bagi diri dan bangsa', 'terlepas dari pengaruh dan kekuasaan negara lain', 'A', 1, 'PKN'),
('SlGMU1K4J', 'Sikap dan perilaku mentaati aturan-aturan hukum yang berlaku tanpa paksaan dari pihak manapun merupakan pengertian…..', 'kesadaran hukum ', 'penegakkan hukum ', 'sosialisasi hukum', 'aturan  hukum', 'C', 1, 'PKN'),
('SlJIJ1C0O', 'Sanksi bagi orang yang melanggar norma kesopanan berupa ….', 'pembayaran denda  ', 'dicela dan dicemoohkan ', 'penderitaan fisik', 'rasa penyesalan', 'D', 1, 'PKN'),
('SlXO6NPGD', 'Peraturan yang mengatur tata pergaulan dalam hidup bermasyarakat, dinamakan', 'Moral', 'Norma', 'Nialai', 'Kebiasaan', 'B', 1, 'PKN');

-- --------------------------------------------------------

--
-- Table structure for table `ctrl`
--

CREATE TABLE `ctrl` (
  `id` int(11) NOT NULL,
  `lvl_usr` varchar(11) NOT NULL,
  `nama_ctrl` varchar(100) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `ikon` varchar(100) DEFAULT NULL,
  `kategori` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ctrl`
--

INSERT INTO `ctrl` (`id`, `lvl_usr`, `nama_ctrl`, `nama`, `ikon`, `kategori`) VALUES
(1, 'admin', 'A_dashboard', 'Dashboard', NULL, '1'),
(2, 'admin', 'A_guru', 'Guru', '<i class=\"fas fa-chalkboard-teacher\"></i>', '1'),
(3, 'admin', 'A_murid', 'Murid', NULL, '1'),
(4, 'admin', 'A_mapel', 'Mata Pelajaran', NULL, '1'),
(5, 'admin', 'A_kelas', 'Kelas', NULL, '1'),
(6, 'guru', 'G_dashboard', 'Dashboard', NULL, NULL),
(7, 'guru', 'G_materi', 'Materi', NULL, NULL),
(8, 'guru', 'G_tugas', 'Tugas', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `kode_guru` varchar(20) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tgl` varchar(25) NOT NULL,
  `jk` varchar(25) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `kode_mapel` varchar(20) DEFAULT NULL,
  `user_code` varchar(10) DEFAULT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`kode_guru`, `nip`, `nama`, `tgl`, `jk`, `alamat`, `kode_mapel`, `user_code`, `image`) VALUES
('G_NW596XX3', '2543252525', 'INO Puspa ,Spd', '22/01/1989', 'Perempuan', ' Sragen Jateng', 'Ma_IM5POI1', 'U_ZICYD995', ''),
('G_SM5DDVQQ', 'L200160113', 'Ahmad Kholid S.Kom, Phd.', '13/07/1998', 'LAKI-LAKI', 'Desa Sidomukti, Kecamatan Weleri, Kab. Kendal, Jawa Tengah', 'Ma_VJ1O22U', 'U_OA69OHYL', 'Capture2111.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jwbsiswa`
--

CREATE TABLE `jwbsiswa` (
  `id` int(11) NOT NULL,
  `kode_quiz` varchar(20) NOT NULL,
  `kode_soal` varchar(20) NOT NULL,
  `kode_murid` varchar(20) NOT NULL,
  `jawaban` varchar(250) DEFAULT NULL,
  `ket` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jwbsiswa`
--

INSERT INTO `jwbsiswa` (`id`, `kode_quiz`, `kode_soal`, `kode_murid`, `jawaban`, `ket`) VALUES
(115, 'Qz49QK2XP', 'SlXO6NPGD', 'M_Y4D818TE', 'B', 1),
(116, 'Qz49QK2XP', 'Sl4HNHB92', 'M_Y4D818TE', 'A', 1),
(117, 'Qz49QK2XP', 'SlGMU1K4J', 'M_Y4D818TE', 'C', 1),
(118, 'Qz49QK2XP', 'SlJIJ1C0O', 'M_Y4D818TE', 'D', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kode_kls` varchar(20) NOT NULL,
  `nama_kls` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kode_kls`, `nama_kls`) VALUES
('Kl2K38AAC', '7A'),
('Kl66MRLEQ', '7B'),
('KlCSXZ7QT', '8A'),
('KlOAJ639I', '7C');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_has_guru`
--

CREATE TABLE `kelas_has_guru` (
  `id` int(11) NOT NULL,
  `kode_guru` varchar(20) DEFAULT NULL,
  `kode_kls` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas_has_guru`
--

INSERT INTO `kelas_has_guru` (`id`, `kode_guru`, `kode_kls`) VALUES
(25, 'G_SM5DDVQQ', 'KlCSXZ7QT'),
(26, 'G_SM5DDVQQ', 'Kl2K38AAC'),
(27, 'G_NW596XX3', 'Kl2K38AAC');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `kode_mapel` varchar(20) NOT NULL,
  `nama_mapel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`kode_mapel`, `nama_mapel`) VALUES
('Ma_IM5POI1', 'IPA'),
('Ma_MN2Q3IV', 'IPS'),
('Ma_R638IZE', 'Sejarah'),
('Ma_VJ1O22U', 'PKN'),
('Ma_ZIV4BPS', 'Ekonomi');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id` int(11) NOT NULL,
  `nama_materi` varchar(100) NOT NULL,
  `nama_file` varchar(100) NOT NULL,
  `ukuran_file` int(11) NOT NULL,
  `tipe_file` varchar(50) NOT NULL,
  `kode_mapel` varchar(20) NOT NULL,
  `kode_kls` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id`, `nama_materi`, `nama_file`, `ukuran_file`, `tipe_file`, `kode_mapel`, `kode_kls`) VALUES
(2, 'contoh', 'D_11_L200160106.docx', 1554, 'application/vnd.openxmlformats-officedocument.word', 'Ma_VJ1O22U', 'Kl2K38AAC'),
(3, 'wkwkw', 'D_11_L2001601061.docx', 1554, 'application/vnd.openxmlformats-officedocument.word', 'Ma_VJ1O22U', 'Kl2K38AAC'),
(4, 'qq', 'group4.ppt', 3341, 'application/vnd.ms-powerpoint', 'Ma_VJ1O22U', 'Kl2K38AAC'),
(5, 'fdsd', 'group41.ppt', 3341, 'application/vnd.ms-powerpoint', 'Ma_VJ1O22U', 'Kl2K38AAC'),
(6, 'vv', 'group42.ppt', 3341, 'application/vnd.ms-powerpoint', 'Ma_VJ1O22U', 'Kl2K38AAC'),
(7, 'Materi ke 1', 'Modul_6_sbd1.docx', 114, 'application/vnd.openxmlformats-officedocument.word', 'Ma_VJ1O22U', 'Kl66MRLEQ'),
(8, 'Materi ke 1', 'Modul_6_sbd2.docx', 114, 'application/vnd.openxmlformats-officedocument.word', 'Ma_VJ1O22U', 'KlOAJ639I'),
(9, 'Materi ke 7', 'PKM-K.docx', 36, 'application/vnd.openxmlformats-officedocument.word', 'Ma_VJ1O22U', 'Kl66MRLEQ'),
(10, 'Materi 9', 'SPK_6_.ppt', 1929, 'application/vnd.ms-powerpoint', 'Ma_VJ1O22U', 'Kl66MRLEQ'),
(11, 'Audit', 'Audit_dan_Tata_Kelola_TI_(L200160089,_L200160113,_L200160122,_L200160137).pdf', 37, 'application/pdf', 'Ma_MN2Q3IV', 'Kl2K38AAC'),
(12, 'matematikaaa', 'CV_YAN.docx', 87, 'application/vnd.openxmlformats-officedocument.word', 'Ma_VJ1O22U', 'Kl2K38AAC'),
(13, 'matematikaaa', 'wawancara_AI.docx', 15, 'application/vnd.openxmlformats-officedocument.word', 'Ma_VJ1O22U', 'Kl2K38AAC');

-- --------------------------------------------------------

--
-- Table structure for table `murid`
--

CREATE TABLE `murid` (
  `kode_murid` varchar(20) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tgl` varchar(30) NOT NULL,
  `jk` varchar(30) NOT NULL,
  `alamat` varchar(220) NOT NULL,
  `user_code` varchar(10) NOT NULL,
  `kode_kls` varchar(20) DEFAULT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `murid`
--

INSERT INTO `murid` (`kode_murid`, `nis`, `nama`, `tgl`, `jk`, `alamat`, `user_code`, `kode_kls`, `image`) VALUES
('M_52PEHLNY', '15005', 'RAIHAN DAMAR KAYANA', '', 'L', '', 'U_DFHT7S8D', 'Kl2K38AAC', 'default.png'),
('M_9KOG41HO', '15006', 'RANU RYAN WICAKSONO', '', 'L', '', 'U_IIA497HC', 'Kl2K38AAC', 'default.png'),
('M_CA8SSBLM', '15001', 'ABIAN MUSA KAILANG ', '', 'L', '', 'U_0MS9DUM8', 'Kl2K38AAC', 'default.png'),
('M_EQBE6IQX', '15002', 'FAVIAN PUTRAMA ADI SUCIPTO', '', 'L', '', 'U_TV62KBFE', 'Kl2K38AAC', 'default.png'),
('M_GB65L7XU', '15008', 'SATRIA LISNA FADILLAH', '', 'L', '', 'U_27A03ONP', 'Kl2K38AAC', 'default.png'),
('M_HAU47683', '15004', 'MUHAMMAD RIZAL RASYID', '', 'L', '', 'U_CA4JB3T9', NULL, 'default.png'),
('M_O8QP73E3', '15007', 'RIZKY WAHYU NUGROHO', '', 'L', '', 'U_II12XV8Q', NULL, 'default.png'),
('M_SG3JOHVJ', '15010', 'ADELIA RAYANI PUTRI PRAYITNO', '', 'P', '', 'U_1IPLQCKD', NULL, 'default.png'),
('M_ST57XKU4', '11212', 'Wawan', '11/11/2011', 'Laki - Laki', ' Solo', 'U_W9OPXX5J', 'Kl66MRLEQ', ''),
('M_T3ZKKJDU', '15009', 'ZUFAR AHMADINEJAD KUSUMA WIDJAYA', '', 'L', '', 'U_1QD9BFZK', NULL, 'default.png'),
('M_UFHZEWO5', '23232', 'Nukman', '12/12/2012', 'Laki - Laki', ' Solo', 'U_6VJXL4TD', 'Kl2K38AAC', ''),
('M_Y4D818TE', '113', 'kholllid ahmad', '13/07/1998', 'Laki - Laki', 'Kendal, Jawa Tengah, indonesia', 'U_HWNEHCZ1', 'Kl2K38AAC', 'mecrop.JPG'),
('M_YSPR7LM8', '15003', 'MUHAMMAD HABIB LUTHFI', '', 'L', '', 'U_0IWO5CDO', NULL, 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `uts` int(11) DEFAULT NULL,
  `uas` int(11) DEFAULT NULL,
  `lain` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `kode_murid` varchar(20) DEFAULT NULL,
  `kode_guru` varchar(20) DEFAULT NULL,
  `kode_mapel` varchar(20) DEFAULT NULL,
  `kode_kls` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `uts`, `uas`, `lain`, `total`, `kode_murid`, `kode_guru`, `kode_mapel`, `kode_kls`) VALUES
(22, NULL, NULL, NULL, NULL, 'M_ST57XKU4', NULL, 'Ma_MN2Q3IV', 'Kl66MRLEQ'),
(33, NULL, NULL, NULL, NULL, 'M_UFHZEWO5', 'G_SM5DDVQQ', 'Ma_VJ1O22U', 'Kl2K38AAC'),
(48, NULL, NULL, NULL, NULL, 'M_Y4D818TE', 'G_SM5DDVQQ', 'Ma_VJ1O22U', 'Kl2K38AAC'),
(53, NULL, NULL, NULL, NULL, 'M_UFHZEWO5', NULL, 'Ma_ZIV4BPS', NULL),
(57, NULL, NULL, NULL, NULL, 'M_Y4D818TE', NULL, 'Ma_ZIV4BPS', 'Kl2K38AAC'),
(59, NULL, NULL, NULL, NULL, 'M_ST57XKU4', NULL, 'Ma_ZIV4BPS', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(11) NOT NULL,
  `isi` varchar(1000) NOT NULL,
  `kode_kls` varchar(50) NOT NULL,
  `kode_mapel` varchar(50) NOT NULL,
  `tgl` datetime NOT NULL,
  `jm` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `isi`, `kode_kls`, `kode_mapel`, `tgl`, `jm`) VALUES
(1, '<p>PENGUMUMAN UNTUK KELAS 7A BAHWA TANGGAL 1 JANUARI PREI.</p>', 'Kl2K38AAC', 'Ma_IM5POI1', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `kode_quiz` varchar(20) NOT NULL,
  `nama_quiz` varchar(100) NOT NULL,
  `kode_kls` varchar(20) NOT NULL,
  `kode_mapel` varchar(20) NOT NULL,
  `tgl_finish` varchar(20) NOT NULL,
  `time_finish` varchar(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`kode_quiz`, `nama_quiz`, `kode_kls`, `kode_mapel`, `tgl_finish`, `time_finish`, `status`) VALUES
('Qz3WKO4CR', 'pancasil', 'KlCSXZ7QT', 'Ma_VJ1O22U', '11/11/2020', '', 1),
('Qz49QK2XP', 'quiz ppkn', 'Kl2K38AAC', 'Ma_IM5POI1', '11/11/2020', '', 1),
('QzAFP8VD9', 'matematikaaa', 'Kl2K38AAC', 'Ma_VJ1O22U', '01/02/2020', '12:19 AM', 1),
('QzEHXFRNU', 'Quiz_8A_matematika', 'KlCSXZ7QT', 'Ma_VJ1O22U', '24/11/2019', '01:00 AM', 0),
('QzGBWJNTI', 'Quiz ke 1', 'Kl66MRLEQ', 'Ma_VJ1O22U', '11/11/2020', '02:03 PM', 1),
('QzL72ZE2B', 'quiz 1', 'Kl2K38AAC', 'Ma_VJ1O22U', '23/04/2019', '09:42 AM', 0);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_has_soal`
--

CREATE TABLE `quiz_has_soal` (
  `id` int(11) NOT NULL,
  `kode_quiz` varchar(20) NOT NULL,
  `kode_soal` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_has_soal`
--

INSERT INTO `quiz_has_soal` (`id`, `kode_quiz`, `kode_soal`) VALUES
(32, 'Qz49QK2XP', 'SlXO6NPGD'),
(33, 'Qz49QK2XP', 'Sl4HNHB92'),
(34, 'Qz49QK2XP', 'SlGMU1K4J'),
(35, 'Qz49QK2XP', 'SlJIJ1C0O');

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `kode_tugas` varchar(20) NOT NULL,
  `nama_tugas` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `tgl_finish` varchar(20) NOT NULL,
  `time_finish` varchar(20) NOT NULL,
  `kode_mapel` varchar(20) NOT NULL,
  `kode_kls` varchar(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`kode_tugas`, `nama_tugas`, `deskripsi`, `tgl_finish`, `time_finish`, `kode_mapel`, `kode_kls`, `status`) VALUES
('Tg5Q36JRU', 'Tugas ke 5', '<p style=\"text-align: center;\">Tugas Ke 5</p>\n<p style=\"text-align: left;\">1. Sebutkan macam - macam iwak</p>\n<p style=\"text-align: left;\">2. Jelaskan perbedaan kamu</p>\n<p style=\"text-align: left;\">3. Jelakan apa itu cinta</p>', '05/11/2019', '11:20 AM', 'Ma_VJ1O22U', 'Kl2K38AAC', 0),
('Tg81RHLCD', 'matematikaaa', '<p>1. Berapakah <em>1 + 1</em> ?</p>\n<p>2. Berapa hasil dari <strong>2 x 2</strong>?&nbsp;</p>', '24/11/2019', '01:00 AM', 'Ma_VJ1O22U', 'Kl2K38AAC', 0),
('Tg9S4SQZS', 'Audit', '<p>materi audit</p>', '14/11/2019', '02:15 PM', 'Ma_MN2Q3IV', 'Kl2K38AAC', 0),
('TgK97XHFE', 'matematikaaa', '<p><strong>tugas matematika</strong></p>\n<p>1. 1+1=?</p>\n<p>2. sebutkan macam macam ikan?</p>\n<p>3. siapakah presiden pertama indonesia?</p>', '13/01/2020', '12:17 AM', 'Ma_VJ1O22U', 'Kl2K38AAC', 0),
('TgN6W2ASD', 'Tugas ke 4', '<p>Cara membuat baju</p>', '11/11/2011', '02:01 PM', 'Ma_VJ1O22U', 'Kl66MRLEQ', 0),
('TgOQN13ZA', 'tugas kelas 8A_matematika', '<p>1) 1+1=...</p>\n<p>2) 0.01/1.234=...</p>\n<p>3) 0.0001 x 0.1 =....</p>', '24/11/2019', '01:00 AM', 'Ma_VJ1O22U', 'KlCSXZ7QT', 0),
('TgPEYJ5OB', 'Tugas ke-1', '1.Sebutkan macam - macam hewan\n2.Jelaskan apa itu karnivora\n3.Sebutkan macam - macam tumbuhan\n4.Jelaskan apa itu nabati dan hewani', '31/10/2019', '09:50 PM', 'Ma_VJ1O22U', 'Kl2K38AAC', 0),
('TgPFFH163', 'Tugas ke 3', '', '11/11/2011', '01:35 PM', 'Ma_VJ1O22U', 'Kl2K38AAC', 0),
('TgQSV3ZJF', 'tugas matematika 1', '<p>jelaskan...</p>', '11/11/2020', '', 'Ma_IM5POI1', 'Kl2K38AAC', 1),
('TgULB8Y5B', 'Tugas ke 1', '1. Jelaskan bala bala\r\n2. Sebutkan kelebihan sam kholid', '05/11/2019', '04:12 PM', 'Ma_VJ1O22U', 'Kl66MRLEQ', 0),
('TgVSO2E9O', 'contoh tugas', '1.Sebutkan', '31/10/2019', '08:40 PM', 'Ma_VJ1O22U', 'Kl2K38AAC', 0),
('TgYJM8VP2', 'Tugas Ke 2', '1.Sebutkan\n2.Jelaskan', '12/11/2019', '01:36 PM', 'Ma_VJ1O22U', 'Kl2K38AAC', 0);

-- --------------------------------------------------------

--
-- Table structure for table `upload_tugas`
--

CREATE TABLE `upload_tugas` (
  `id` int(11) NOT NULL,
  `nama_tugas` varchar(100) NOT NULL,
  `kode_murid` varchar(20) NOT NULL,
  `nama_file` varchar(100) NOT NULL,
  `kode_tugas` varchar(20) NOT NULL,
  `ukuran_file` int(11) NOT NULL,
  `rev` int(11) NOT NULL,
  `tipe_file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload_tugas`
--

INSERT INTO `upload_tugas` (`id`, `nama_tugas`, `kode_murid`, `nama_file`, `kode_tugas`, `ukuran_file`, `rev`, `tipe_file`) VALUES
(1, 'Upload Tugas ke 1', 'M_Y4D818TE', 'wawancara_AI3.docx', 'TgK97XHFE', 15, 1, 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'),
(2, 'Upload Tugas ke 1', 'M_Y4D818TE', 'ATM.docx', 'TgQSV3ZJF', 264, 1, 'application/vnd.openxmlformats-officedocument.wordprocessingml.document');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `code` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `lvl_usr` varchar(20) NOT NULL,
  `akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`code`, `username`, `password`, `lvl_usr`, `akses`) VALUES
('ACYSW94O0P', 'admin', '123', 'admin', 1),
('U_0C8ZAAE4', 'abc', 'QHMLH8', 'murid', 1),
('U_0IWO5CDO', '15003', 'G9A1D2', 'murid', 1),
('U_0JTTR80D', '98167', 'TYB63X', 'murid', 1),
('U_0MS9DUM8', '15001', 'XXOIS2', 'murid', 1),
('U_0UVOVN5F', '311 3124213', 'IHI46V', 'guru', 1),
('U_19D711N9', '21312', 'NO65IX', 'murid', 1),
('U_1I3HLMU0', '23123', 'BJ9TRR', 'murid', 1),
('U_1IPLQCKD', '15010', '9LZCC1', 'murid', 1),
('U_1LYL2M1U', '1233123131', 'B2KDCW', 'guru', 1),
('U_1QD9BFZK', '15009', 'KLF4RX', 'murid', 1),
('U_1QDJ4X8U', '321 3213123', 'T4VA3S', 'guru', 1),
('U_1YCKAKC6', '232 1312312', 'MHE3C4', 'guru', 1),
('U_22ZSLIRA', '23123', 'NVXO35', 'murid', 1),
('U_27A03ONP', '15008', 'ZOOPTQ', 'murid', 1),
('U_4HERBGO0', '3463436346', '1DUMLD', 'guru', 1),
('U_4Y16B5AV', '23132', '44YLDL', 'murid', 1),
('U_6VJXL4TD', '23232', 'WI2UID', 'murid', 1),
('U_8QZL90JD', '111 1112131', '9WE3HX', 'guru', 1),
('U_A1GB6XM1', '12312', '5LPI96', 'murid', 1),
('U_B2TQB4PD', '21213', 'H3NBIW', 'murid', 1),
('U_BCVT0OAC', '11111', 'MTOW1U', 'murid', 1),
('U_BS7UA1NK', '12312', '18IR7H', 'murid', 1),
('U_BVTHUFKW', '123 1243432', 'TNEWZD', 'guru', 1),
('U_BYOEBL01', '323 1232132', 'PCITM6', 'guru', 1),
('U_CA4JB3T9', '15004', 'E8TIL6', 'murid', 1),
('U_DBOVKMIT', '12312', '1ZXVCH', 'murid', 1),
('U_DFHT7S8D', '15005', '2B7OAK', 'murid', 1),
('U_EIFYTKV7', '32131', 'EJCY5D', 'murid', 1),
('U_EU2HNOB7', '2342342343', 'DKLHQI', 'guru', 1),
('U_FEIVH35E', '11111', '7EFQ5G', 'murid', 1),
('U_GH8YB3TI', '23123', '2NZP4D', 'murid', 1),
('U_HAOIO8YX', 'U_HAOIO8YX', 'OVA5WS', 'guru', 1),
('U_HWNEHCZ1', 'kholid', '123', 'murid', 1),
('U_IADHF1AY', '21232', 'N0THAL', 'murid', 1),
('U_II12XV8Q', '15007', '9191F9', 'murid', 1),
('U_IIA497HC', '15006', '1T1OH8', 'murid', 1),
('U_J7J4S0AQ', '32131', 'B6YN44', 'murid', 1),
('U_JDX0IVJL', '23132', '4UHVX2', 'murid', 1),
('U_KK7DGMGI', '231 2312312', '4SVFP5', 'guru', 1),
('U_L1W2X6B8', '23123', '5ZP72N', 'murid', 1),
('U_LWGGGQKB', '11111', 'ECXC78', 'murid', 1),
('U_M4ZJO1J6', '32323', 'W8UA82', 'murid', 1),
('U_OA69OHYL', 'ahmadkholid', '123', 'guru', 1),
('U_PHAOPRKN', '21231', 'YOA10U', 'murid', 1),
('U_Q9D835EZ', '21212', 'FBS4N9', 'murid', 1),
('U_QBPYFT4N', '23231', '41TFB2', 'murid', 1),
('U_QUTI2TU0', '12313', 'P8O01Y', 'murid', 1),
('U_R33C0ZLL', '21312', 'YTCVKD', 'murid', 1),
('U_SZ103230', '12312', '62XRRD', 'murid', 1),
('U_TU5BA768', '43242', 'JFT3D8', 'murid', 1),
('U_TV62KBFE', '15002', 'SK3EGH', 'murid', 1),
('U_W74XN28H', '31213', '8DD0M8', 'murid', 1),
('U_W9OPXX5J', '11212', 'LL2A70', 'murid', 1),
('U_XQVUER23', '12413', 'JIMMID', 'murid', 1),
('U_YA9FL74G', 'U_YA9FL74G', '6ESWPC', 'guru', 1),
('U_Z9UV66T9', '6563524522', 'XGK1S5', 'guru', 1),
('U_ZICYD995', 'ino', '123', 'guru', 1),
('U_ZLWS0Q81', '2001601133', '7NOBJQ', 'guru', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userAdminFK` (`user_code`);

--
-- Indexes for table `banksoal`
--
ALTER TABLE `banksoal`
  ADD PRIMARY KEY (`kode_soal`);

--
-- Indexes for table `ctrl`
--
ALTER TABLE `ctrl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`kode_guru`),
  ADD KEY `userMapelFK` (`kode_mapel`),
  ADD KEY `usercodefk` (`user_code`);

--
-- Indexes for table `jwbsiswa`
--
ALTER TABLE `jwbsiswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kodeJWB_quizFK` (`kode_quiz`),
  ADD KEY `kodeJWB_soalFK` (`kode_soal`),
  ADD KEY `kodeJWB_muridFK` (`kode_murid`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kode_kls`);

--
-- Indexes for table `kelas_has_guru`
--
ALTER TABLE `kelas_has_guru`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guruFK` (`kode_guru`),
  ADD KEY `klsFK` (`kode_kls`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`kode_mapel`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kodeMapelMateri` (`kode_mapel`),
  ADD KEY `kodeKlsMateri` (`kode_kls`);

--
-- Indexes for table `murid`
--
ALTER TABLE `murid`
  ADD PRIMARY KEY (`kode_murid`),
  ADD KEY `userMuridFK` (`user_code`),
  ADD KEY `muridKelasFK` (`kode_kls`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilaiKodeMurid` (`kode_murid`),
  ADD KEY `nilaiKodeGuru` (`kode_guru`),
  ADD KEY `nilaikodemapelFK` (`kode_mapel`),
  ADD KEY `nilaiKodeKlsFK` (`kode_kls`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`kode_quiz`),
  ADD KEY `kodeKlsugasFK` (`kode_kls`),
  ADD KEY `kodeMapeQuizzFK` (`kode_mapel`);

--
-- Indexes for table `quiz_has_soal`
--
ALTER TABLE `quiz_has_soal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_quizFK` (`kode_quiz`),
  ADD KEY `kode_soalFK` (`kode_soal`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`kode_tugas`),
  ADD KEY `kodeMapelTugas` (`kode_mapel`),
  ADD KEY `kodeKlsTugas` (`kode_kls`);

--
-- Indexes for table `upload_tugas`
--
ALTER TABLE `upload_tugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uploadTugasMuridFK` (`kode_murid`),
  ADD KEY `uploadTugasFK` (`kode_tugas`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ctrl`
--
ALTER TABLE `ctrl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jwbsiswa`
--
ALTER TABLE `jwbsiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `kelas_has_guru`
--
ALTER TABLE `kelas_has_guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quiz_has_soal`
--
ALTER TABLE `quiz_has_soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `upload_tugas`
--
ALTER TABLE `upload_tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `userAdminFK` FOREIGN KEY (`user_code`) REFERENCES `user` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `userMapelFK` FOREIGN KEY (`kode_mapel`) REFERENCES `mapel` (`kode_mapel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usercodefk` FOREIGN KEY (`user_code`) REFERENCES `user` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jwbsiswa`
--
ALTER TABLE `jwbsiswa`
  ADD CONSTRAINT `kodeJWB_muridFK` FOREIGN KEY (`kode_murid`) REFERENCES `murid` (`kode_murid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kodeJWB_quizFK` FOREIGN KEY (`kode_quiz`) REFERENCES `quiz` (`kode_quiz`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kodeJWB_soalFK` FOREIGN KEY (`kode_soal`) REFERENCES `banksoal` (`kode_soal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelas_has_guru`
--
ALTER TABLE `kelas_has_guru`
  ADD CONSTRAINT `guruFK` FOREIGN KEY (`kode_guru`) REFERENCES `guru` (`kode_guru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `klsFK` FOREIGN KEY (`kode_kls`) REFERENCES `kelas` (`kode_kls`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `kodeKlsMateri` FOREIGN KEY (`kode_kls`) REFERENCES `kelas` (`kode_kls`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kodeMapelMateri` FOREIGN KEY (`kode_mapel`) REFERENCES `mapel` (`kode_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `murid`
--
ALTER TABLE `murid`
  ADD CONSTRAINT `muridKelasFK` FOREIGN KEY (`kode_kls`) REFERENCES `kelas` (`kode_kls`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userMuridFK` FOREIGN KEY (`user_code`) REFERENCES `user` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilaiKodeGuru` FOREIGN KEY (`kode_guru`) REFERENCES `guru` (`kode_guru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilaiKodeKlsFK` FOREIGN KEY (`kode_kls`) REFERENCES `kelas` (`kode_kls`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilaiKodeMurid` FOREIGN KEY (`kode_murid`) REFERENCES `murid` (`kode_murid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilaikodemapelFK` FOREIGN KEY (`kode_mapel`) REFERENCES `mapel` (`kode_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `kodeKlsugasFK` FOREIGN KEY (`kode_kls`) REFERENCES `kelas` (`kode_kls`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kodeMapeQuizzFK` FOREIGN KEY (`kode_mapel`) REFERENCES `mapel` (`kode_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quiz_has_soal`
--
ALTER TABLE `quiz_has_soal`
  ADD CONSTRAINT `kode_quizFK` FOREIGN KEY (`kode_quiz`) REFERENCES `quiz` (`kode_quiz`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kode_soalFK` FOREIGN KEY (`kode_soal`) REFERENCES `banksoal` (`kode_soal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tugas`
--
ALTER TABLE `tugas`
  ADD CONSTRAINT `kodeKlsTugas` FOREIGN KEY (`kode_kls`) REFERENCES `kelas` (`kode_kls`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kodeMapelTugas` FOREIGN KEY (`kode_mapel`) REFERENCES `mapel` (`kode_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `upload_tugas`
--
ALTER TABLE `upload_tugas`
  ADD CONSTRAINT `uploadTugasFK` FOREIGN KEY (`kode_tugas`) REFERENCES `tugas` (`kode_tugas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `uploadTugasMuridFK` FOREIGN KEY (`kode_murid`) REFERENCES `murid` (`kode_murid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
