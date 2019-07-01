-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2018 at 01:52 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_admin`
--

CREATE TABLE `t_admin` (
  `username` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_handphone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_date` date NOT NULL,
  `created_user` char(50) NOT NULL,
  `updated_date` date NOT NULL,
  `updated_user` char(50) NOT NULL,
  `active` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_admin`
--

INSERT INTO `t_admin` (`username`, `nama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_handphone`, `email`, `password`, `created_date`, `created_user`, `updated_date`, `updated_user`, `active`) VALUES
('admin_akademik', 'admin akademik', 'semarang', '2018-06-07', 'Jln, soekarno, tembalang', '085281271984', 'din@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2018-06-06', 'admin_akademik', '0000-00-00', '0', '1'),
('admin_keuangan', 'admin keuangan', 'semarang', '2018-06-07', 'Jln. Prof. Soedarto, Tembalang', '085281271936', 'keuangan@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2018-06-06', 'admin_keuangan', '0000-00-00', '0', '1'),
('super_admin', 'super admin', 'semarang', '2018-06-07', 'Jln. Imam Barjo, Peleburan', '085281271912', 'super@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2018-06-06', 'super_admin', '0000-00-00', '0', '1');

-- --------------------------------------------------------

--
-- Table structure for table `t_alasan`
--

CREATE TABLE `t_alasan` (
  `id_alasan` int(11) NOT NULL,
  `nama_alasan` varchar(100) NOT NULL,
  `created_date` date NOT NULL,
  `created_user` char(18) NOT NULL,
  `updated_date` date NOT NULL,
  `updated_user` char(18) NOT NULL,
  `active` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_alasan`
--

INSERT INTO `t_alasan` (`id_alasan`, `nama_alasan`, `created_date`, `created_user`, `updated_date`, `updated_user`, `active`) VALUES
(1, 'Dinas', '2015-11-04', '1', '2018-05-23', '199402142017092002', '1'),
(2, 'Cuti', '2015-11-04', '1', '0000-00-00', '0', '1'),
(3, 'Ijin', '2015-11-04', '1', '0000-00-00', '0', '1'),
(4, 'Mangkir', '2015-11-04', '1', '0000-00-00', '0', '1'),
(5, 'Lupa Absen', '2015-11-24', '1', '0000-00-00', '0', '1'),
(6, 'Lainnya', '2015-11-26', '1', '0000-00-00', '0', '1'),
(7, 'Hadir', '2015-11-26', '0', '0000-00-00', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `t_dummy`
--

CREATE TABLE `t_dummy` (
  `no_ijazah_universitas_s1` varchar(50) NOT NULL,
  `jumlah` int(15) NOT NULL,
  `keluar_1` int(15) NOT NULL,
  `keluar_2` int(15) NOT NULL,
  `keluar_3` int(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `created_date` date NOT NULL,
  `created_user` varchar(50) NOT NULL,
  `updated_date` date NOT NULL,
  `updated_user` varchar(50) NOT NULL,
  `active` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_dummy`
--

INSERT INTO `t_dummy` (`no_ijazah_universitas_s1`, `jumlah`, `keluar_1`, `keluar_2`, `keluar_3`, `username`, `created_date`, `created_user`, `updated_date`, `updated_user`, `active`) VALUES
('1234/SH', 100000000, 21000000, 19000000, 18000000, 'idosocute', '2018-06-25', 'super_admin', '0000-00-00', '', '1'),
('1245/SA', 140000000, 20000000, 15000000, 25000000, '	 cosx', '0000-00-00', '', '0000-00-00', '', '1'),
('13305/ST', 130000001, 15000000, 18000000, 19900000, 'galuh', '2018-06-25', 'super_admin', '2018-06-26', 'admin', '1'),
('2345/SK', 120000000, 25000000, 30000000, 40000000, 'ramadhani', '0000-00-00', '', '2018-06-25', 'admin_keuangan', '1'),
('4132/ST', 125000000, 30000000, 25000000, 21000000, 'kedua', '2018-06-06', 'admin_akademik', '0000-00-00', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `t_dummy2`
--

CREATE TABLE `t_dummy2` (
  `username` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `jenis_kelamin` enum('1','2') NOT NULL DEFAULT '1',
  `status_perkawinan` enum('0','1','2','3') NOT NULL DEFAULT '0',
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL DEFAULT '1990-01-01',
  `provinsi_lahir` varchar(100) NOT NULL,
  `kewarganegaraan` varchar(100) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `golongan_darah` enum('0','1','2','3','4') NOT NULL DEFAULT '0',
  `sumber_biaya` varchar(50) NOT NULL,
  `alamat_lengkap` varchar(200) NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `provinsi_tinggal` varchar(50) NOT NULL,
  `status_tempat_tinggal` varchar(20) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `perguruan_tinggi_s1` varchar(100) NOT NULL,
  `kota_pt_s1` varchar(50) NOT NULL,
  `provinsi_pt_s1` varchar(50) NOT NULL,
  `jurusan_s1` varchar(50) NOT NULL,
  `tahun_lulus_s1` varchar(4) NOT NULL,
  `lama_studi_s1` varchar(50) NOT NULL,
  `no_ijazah_universitas_s1` varchar(50) NOT NULL,
  `ipk_s1` varchar(5) NOT NULL,
  `no_ijazah_fakultas_s1` varchar(50) NOT NULL,
  `perguruan_tinggi_s2` varchar(100) NOT NULL,
  `kota_pt_s2` varchar(50) NOT NULL,
  `provinsi_pt_s2` varchar(50) NOT NULL,
  `prodi_s2` varchar(50) NOT NULL,
  `tahun_lulus_s2` varchar(4) NOT NULL,
  `lama_studi_s2` varchar(50) NOT NULL,
  `no_ijazah_universitas_s2` varchar(50) NOT NULL,
  `ipk_s2` varchar(5) NOT NULL,
  `no_ijazah_fakultas_s2` varchar(50) NOT NULL,
  `perguruan_tinggi_s3` varchar(100) NOT NULL,
  `kota_pt_s3` varchar(50) NOT NULL,
  `provinsi_pt_s3` varchar(50) NOT NULL,
  `prodi_s3` varchar(50) NOT NULL,
  `tahun_lulus_s3` varchar(4) NOT NULL,
  `lama_studi_s3` varchar(50) NOT NULL,
  `no_ijazah_universitas_s3` varchar(50) NOT NULL,
  `ipk_s3` varchar(5) NOT NULL,
  `no_ijazah_fakultas_s3` varchar(50) NOT NULL,
  `jenis_pekerjaan` varchar(100) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `nama_instansi` varchar(100) NOT NULL,
  `alamat_instansi` varchar(200) NOT NULL,
  `no_telepon_instansi` varchar(20) NOT NULL,
  `gaji` int(15) NOT NULL,
  `mulai_bekerja` varchar(20) NOT NULL,
  `masa_tunggu` varchar(50) NOT NULL,
  `judul_nasional` varchar(300) NOT NULL,
  `penyelenggara_nasional` varchar(300) NOT NULL,
  `prosiding_nasional` varchar(300) NOT NULL,
  `tahun_nasional` varchar(4) NOT NULL,
  `web_nasional` varchar(300) NOT NULL,
  `judul_internasional` varchar(300) NOT NULL,
  `penyelenggara_internasional` varchar(300) NOT NULL,
  `prosiding_internasional` varchar(300) NOT NULL,
  `tahun_internasional` varchar(4) NOT NULL,
  `web_internasional` varchar(300) NOT NULL,
  `judul_jurnal_nasional` varchar(300) NOT NULL,
  `pengarang_jurnal_nasional` varchar(50) NOT NULL,
  `nama_jurnal_nasional` varchar(300) NOT NULL,
  `volume_jurnal_nasional` varchar(50) NOT NULL,
  `tahun_jurnal_nasional` varchar(4) NOT NULL,
  `web_jurnal_nasional` varchar(300) NOT NULL,
  `judul_jurnal_terindeks` varchar(300) NOT NULL,
  `pengarang_jurnal_terindeks` varchar(50) NOT NULL,
  `nama_jurnal_terindeks` varchar(300) NOT NULL,
  `volume_jurnal_terindeks` varchar(50) NOT NULL,
  `tahun_jurnal_terindeks` varchar(4) NOT NULL,
  `web_jurnal_terindeks` varchar(300) NOT NULL,
  `judul_jurnal_internasional` varchar(300) NOT NULL,
  `pengarang_jurnal_internasional` varchar(300) NOT NULL,
  `nama_jurnal_internasional` varchar(300) NOT NULL,
  `volume_jurnal_internasional` varchar(50) NOT NULL,
  `tahun_jurnal_internasional` varchar(4) NOT NULL,
  `web_jurnal_internasional` varchar(300) NOT NULL,
  `judul_jurnal_bereputasi` varchar(300) NOT NULL,
  `pengarang_jurnal_bereputasi` varchar(50) NOT NULL,
  `nama_jurnal_bereputasi` varchar(300) NOT NULL,
  `volume_jurnal_bereputasi` varchar(50) NOT NULL,
  `tahun_jurnal_bereputasi` varchar(4) NOT NULL,
  `indeks_jurnal_bereputasi` varchar(50) NOT NULL,
  `web_jurnal_bereputasi` varchar(300) NOT NULL,
  `terima` enum('0','1','2') NOT NULL DEFAULT '0',
  `created_date` date NOT NULL,
  `created_user` varchar(50) NOT NULL,
  `updated_date` date NOT NULL,
  `updated_user` varchar(50) NOT NULL,
  `active` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_dummy2`
--

INSERT INTO `t_dummy2` (`username`, `nama_lengkap`, `jenis_kelamin`, `status_perkawinan`, `tempat_lahir`, `tanggal_lahir`, `provinsi_lahir`, `kewarganegaraan`, `agama`, `golongan_darah`, `sumber_biaya`, `alamat_lengkap`, `kabupaten`, `provinsi_tinggal`, `status_tempat_tinggal`, `no_hp`, `email`, `perguruan_tinggi_s1`, `kota_pt_s1`, `provinsi_pt_s1`, `jurusan_s1`, `tahun_lulus_s1`, `lama_studi_s1`, `no_ijazah_universitas_s1`, `ipk_s1`, `no_ijazah_fakultas_s1`, `perguruan_tinggi_s2`, `kota_pt_s2`, `provinsi_pt_s2`, `prodi_s2`, `tahun_lulus_s2`, `lama_studi_s2`, `no_ijazah_universitas_s2`, `ipk_s2`, `no_ijazah_fakultas_s2`, `perguruan_tinggi_s3`, `kota_pt_s3`, `provinsi_pt_s3`, `prodi_s3`, `tahun_lulus_s3`, `lama_studi_s3`, `no_ijazah_universitas_s3`, `ipk_s3`, `no_ijazah_fakultas_s3`, `jenis_pekerjaan`, `jabatan`, `nama_instansi`, `alamat_instansi`, `no_telepon_instansi`, `gaji`, `mulai_bekerja`, `masa_tunggu`, `judul_nasional`, `penyelenggara_nasional`, `prosiding_nasional`, `tahun_nasional`, `web_nasional`, `judul_internasional`, `penyelenggara_internasional`, `prosiding_internasional`, `tahun_internasional`, `web_internasional`, `judul_jurnal_nasional`, `pengarang_jurnal_nasional`, `nama_jurnal_nasional`, `volume_jurnal_nasional`, `tahun_jurnal_nasional`, `web_jurnal_nasional`, `judul_jurnal_terindeks`, `pengarang_jurnal_terindeks`, `nama_jurnal_terindeks`, `volume_jurnal_terindeks`, `tahun_jurnal_terindeks`, `web_jurnal_terindeks`, `judul_jurnal_internasional`, `pengarang_jurnal_internasional`, `nama_jurnal_internasional`, `volume_jurnal_internasional`, `tahun_jurnal_internasional`, `web_jurnal_internasional`, `judul_jurnal_bereputasi`, `pengarang_jurnal_bereputasi`, `nama_jurnal_bereputasi`, `volume_jurnal_bereputasi`, `tahun_jurnal_bereputasi`, `indeks_jurnal_bereputasi`, `web_jurnal_bereputasi`, `terima`, `created_date`, `created_user`, `updated_date`, `updated_user`, `active`) VALUES
('idosocute', 'Rifqi Ramadhani Muhammad', '1', '0', '', '1990-01-01', '', '', '', '0', '', '', '', '', '', '', 'rifqiido@yahoo.com', '', '', '', '', '', '', '1234/SH', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '2018-06-17', 'admin_akademik', '2018-06-21', 'admin', '1'),
('cosx', 'Remnant', '1', '0', '', '1990-01-01', '', '', '', '0', '', '', '', '', '', '', 'remnant@gmail.com', '', '', '', '', '', '', '1245/SA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2', '2018-06-17', 'admin_akademik', '2018-06-21', 'admin', '1'),
('galuh', 'Citrasmara Galuh Nuansa, S.T., M,Ling.', '2', '2', 'Batang', '1988-05-13', 'Jawa Tengah', 'Indonesia', 'Islam', '4', 'Beasiswa', 'Desa Kalimanggis, RT 2, RW 2, Kec. Subah', 'Batang', 'Jawa Tengah', 'Rumah Orang Tua', '081326880905', 'galuh.citra@gmail.com', 'Universitas Diponegoro', 'Semarang', 'Jawa Tengah', 'Teknik Kimia', '2010', '3 Tahun 10 Bulan', '13305/ST', '3,44', '18238', 'Unversitas Diponegoro', 'Semarang', 'Jawa Tengah', 'Magister Ilmu Lingkungan', '2018', '1 Tahun 6 Bulan', '13797/MIL', '3,80', '544/M.Ling./SPS/2018', '', '', '', '', '', '', '', '', '', 'Aparatur Sipil Negara', 'Staf', 'Pusat Pengendalian Pembangunan Ekoregion Kalimantan (Kemenerian LHK)', 'Jln. Jend. Sudirman 19A, Balikpapan, Kalimantan Timur - 76111', '0542-738375', 2594600, 'Januari 2011', '6 Bulan', 'Hipotesis Enviromental Kuznets Curve: Sebuah Pandangan Hubungan Antara Pertumbuhan Ekonomi dengan Kualitas Lingkungan', 'Balai Besar Teknologi Pencegahan Pencemaran Industri - Kemenperin', 'Peran Teknologi Ramah Lingkungan untuk Mendukung Industri Hijau', '2017', 'http://sntih.kemenperin.go.id/prosiding/?hal=prosiding', 'Enviromental Kuznets Curve Hypothesis: A Perspective of Sustainable Development in Indonesia', 'Sekolah Pascasarjana, Universitas Diponegoro', 'The 2nd International Conference on Energy, Enviromental and Information Sysetem (ICENIS 2017)', '2018', 'https://wwww.e3s-conferences.org/articles/e3sconf/abs/2018/06/contents/contents.hyml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '2018-06-06', 'ido', '2018-06-26', 'admin', '1'),
('pertama', 'Peserta Pertama', '1', '0', '', '1990-01-01', '', '', '', '0', '', '', '', '', '', '', 'pertama@gmail.com', '', '', '', '', '', '', '1876/SP', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '2018-06-17', '0', '0000-00-00', '', '1'),
('rodho', 'Muhammad', '1', '0', '', '1990-01-01', '', '', '', '0', '', '', '', '', '', '', 'muhammad@gmail.com', '', '', '', '', '', '', '2198/SE', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '2018-06-17', '0', '0000-00-00', '', '1'),
('ramadhani', 'Ramadhani', '1', '1', 'Pacitan', '1990-03-15', 'Jawa Timur', 'Indonesia', 'Islam', '2', 'Beasiswa', 'Jl. Patimura 5', 'Pacitan', 'Jawa Timur', 'Rumah Kontrak', '082127140334', 'ramadhani@gmail.com', 'Universitas Pendidikan Indonesia', 'Bandung', 'Jawa Barat', 'Pendidikan Bahasa Inggris', '2017', '5 Tahun 2 Bulan', '2345/SK', '3,54', '2314', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '2018-06-17', '0', '2018-06-25', 'admin', '1'),
('kedua', 'Peserta Kedua', '2', '0', 'Brebes', '1994-12-12', '', '', '', '4', '', '', '', '', '', '', 'kedua@gmail.com', '', '', '', '', '', '', '4132/ST', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '2018-06-17', '0', '2018-06-25', 'admin', '1');

-- --------------------------------------------------------

--
-- Table structure for table `t_keuangan`
--

CREATE TABLE `t_keuangan` (
  `no_ijazah_universitas_s1` varchar(50) NOT NULL,
  `jumlah` int(15) NOT NULL,
  `keluar_1` int(15) NOT NULL,
  `keluar_2` int(15) NOT NULL,
  `keluar_3` int(15) NOT NULL,
  `created_date` date NOT NULL,
  `created_user` varchar(50) NOT NULL,
  `updated_date` date NOT NULL,
  `updated_user` varchar(50) NOT NULL,
  `active` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_keuangan`
--

INSERT INTO `t_keuangan` (`no_ijazah_universitas_s1`, `jumlah`, `keluar_1`, `keluar_2`, `keluar_3`, `created_date`, `created_user`, `updated_date`, `updated_user`, `active`) VALUES
('13305/ST', 100000000, 12000000, 24000000, 44000000, '2018-06-20', 'super_admin', '0000-00-00', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `t_pengguna`
--

CREATE TABLE `t_pengguna` (
  `username` varchar(50) NOT NULL,
  `id_pengguna` int(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tipe_pengguna` int(5) NOT NULL DEFAULT '99',
  `created_date` date NOT NULL,
  `created_user` varchar(50) NOT NULL,
  `updated_date` date NOT NULL,
  `updated_user` varchar(50) NOT NULL,
  `active` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_pengguna`
--

INSERT INTO `t_pengguna` (`username`, `id_pengguna`, `nama`, `email`, `password`, `tipe_pengguna`, `created_date`, `created_user`, `updated_date`, `updated_user`, `active`) VALUES
('admin', 1, 'Super Admin', 'super@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 1, '2018-06-06', 'admin', '0000-00-00', '0', '1'),
('admin_akademik', 2, 'Admin Akademik', 'akademik@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 2, '2018-06-06', 'admin_akademik', '0000-00-00', '0', '1'),
('admin_keuangan', 3, 'Admin Keuangan', 'keuangan@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 3, '2018-06-06', 'admin_keuangan', '0000-00-00', '0', '1'),
('galuh', 4, 'Citrasmara ', 'galuh@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 99, '2018-06-06', '0', '0000-00-00', '0', '1'),
('idosocute', 6, 'Rifqi Ramadhani Muhammad', 'rifqiido@yahoo.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 99, '2018-06-17', 'admin_akademik', '0000-00-00', '', '1'),
('jinx', 7, 'Remnant', 'remnant@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 99, '2018-06-17', 'admin_akademik', '0000-00-00', '', '1'),
('ramadhani', 8, 'Ramadhani', 'email@gmial.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 99, '2018-06-17', '0', '0000-00-00', '', '1'),
('rodho', 9, 'Muhammad', 'muhammad@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 99, '2018-06-17', '0', '0000-00-00', '', '1'),
('pertama', 10, 'Peserta Pertama', 'pertama@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 99, '2018-06-17', '0', '0000-00-00', '', '1'),
('kedua', 11, 'Peserta Kedua', 'kedua@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 99, '2018-06-17', '0', '0000-00-00', '', '1'),
('ketiga', 15, 'Peserta Ketiga', 'ketiga@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 99, '2018-06-23', '0', '0000-00-00', '', '1'),
('keempat', 16, 'Peserta keempat', 'keempat@gmai.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 99, '2018-06-23', '0', '0000-00-00', '', '1'),
('kelima', 17, 'Peserta Kelima', 'kelma@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 99, '2018-06-24', '0', '0000-00-00', '', '1'),
('keenam', 18, 'Peserta Keenam', 'keenam@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 99, '2018-06-24', '0', '0000-00-00', '', '1'),
('ketujuh', 19, 'Peserta Ketujuh', 'ketujuh@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 99, '2018-06-24', '0', '0000-00-00', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `t_peserta`
--

CREATE TABLE `t_peserta` (
  `username` varchar(50) NOT NULL,
  `id_peserta` int(20) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `jenis_kelamin` enum('1','2') NOT NULL DEFAULT '1',
  `status_perkawinan` enum('0','1','2','3') NOT NULL DEFAULT '0',
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL DEFAULT '1990-01-01',
  `provinsi_lahir` varchar(100) NOT NULL,
  `kewarganegaraan` varchar(100) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `golongan_darah` enum('0','1','2','3','4') NOT NULL DEFAULT '0',
  `sumber_biaya` varchar(50) NOT NULL,
  `alamat_lengkap` varchar(200) NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `provinsi_tinggal` varchar(50) NOT NULL,
  `status_tempat_tinggal` varchar(20) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `perguruan_tinggi_s1` varchar(100) NOT NULL,
  `kota_pt_s1` varchar(50) NOT NULL,
  `provinsi_pt_s1` varchar(50) NOT NULL,
  `jurusan_s1` varchar(50) NOT NULL,
  `tahun_lulus_s1` varchar(4) NOT NULL,
  `lama_studi_s1` varchar(50) NOT NULL,
  `no_ijazah_universitas_s1` varchar(50) NOT NULL,
  `ipk_s1` varchar(5) NOT NULL,
  `no_ijazah_fakultas_s1` varchar(50) NOT NULL,
  `perguruan_tinggi_s2` varchar(100) NOT NULL,
  `kota_pt_s2` varchar(50) NOT NULL,
  `provinsi_pt_s2` varchar(50) NOT NULL,
  `prodi_s2` varchar(50) NOT NULL,
  `tahun_lulus_s2` varchar(4) NOT NULL,
  `lama_studi_s2` varchar(50) NOT NULL,
  `no_ijazah_universitas_s2` varchar(50) NOT NULL,
  `ipk_s2` varchar(5) NOT NULL,
  `no_ijazah_fakultas_s2` varchar(50) NOT NULL,
  `perguruan_tinggi_s3` varchar(100) NOT NULL,
  `kota_pt_s3` varchar(50) NOT NULL,
  `provinsi_pt_s3` varchar(50) NOT NULL,
  `prodi_s3` varchar(50) NOT NULL,
  `tahun_lulus_s3` varchar(4) NOT NULL,
  `lama_studi_s3` varchar(50) NOT NULL,
  `no_ijazah_universitas_s3` varchar(50) NOT NULL,
  `ipk_s3` varchar(5) NOT NULL,
  `no_ijazah_fakultas_s3` varchar(50) NOT NULL,
  `jenis_pekerjaan` varchar(100) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `nama_instansi` varchar(100) NOT NULL,
  `alamat_instansi` varchar(200) NOT NULL,
  `no_telepon_instansi` varchar(20) NOT NULL,
  `gaji` int(15) NOT NULL,
  `mulai_bekerja` varchar(20) NOT NULL,
  `masa_tunggu` varchar(50) NOT NULL,
  `judul_nasional` varchar(300) NOT NULL,
  `penyelenggara_nasional` varchar(300) NOT NULL,
  `prosiding_nasional` varchar(300) NOT NULL,
  `tahun_nasional` varchar(4) NOT NULL,
  `web_nasional` varchar(300) NOT NULL,
  `judul_internasional` varchar(300) NOT NULL,
  `penyelenggara_internasional` varchar(300) NOT NULL,
  `prosiding_internasional` varchar(300) NOT NULL,
  `tahun_internasional` varchar(4) NOT NULL,
  `web_internasional` varchar(300) NOT NULL,
  `judul_jurnal_nasional` varchar(300) NOT NULL,
  `pengarang_jurnal_nasional` varchar(50) NOT NULL,
  `nama_jurnal_nasional` varchar(300) NOT NULL,
  `volume_jurnal_nasional` varchar(50) NOT NULL,
  `tahun_jurnal_nasional` varchar(4) NOT NULL,
  `web_jurnal_nasional` varchar(300) NOT NULL,
  `judul_jurnal_terindeks` varchar(300) NOT NULL,
  `pengarang_jurnal_terindeks` varchar(50) NOT NULL,
  `nama_jurnal_terindeks` varchar(300) NOT NULL,
  `volume_jurnal_terindeks` varchar(50) NOT NULL,
  `tahun_jurnal_terindeks` varchar(4) NOT NULL,
  `web_jurnal_terindeks` varchar(300) NOT NULL,
  `judul_jurnal_internasional` varchar(300) NOT NULL,
  `pengarang_jurnal_internasional` varchar(300) NOT NULL,
  `nama_jurnal_internasional` varchar(300) NOT NULL,
  `volume_jurnal_internasional` varchar(50) NOT NULL,
  `tahun_jurnal_internasional` varchar(4) NOT NULL,
  `web_jurnal_internasional` varchar(300) NOT NULL,
  `judul_jurnal_bereputasi` varchar(300) NOT NULL,
  `pengarang_jurnal_bereputasi` varchar(50) NOT NULL,
  `nama_jurnal_bereputasi` varchar(300) NOT NULL,
  `volume_jurnal_bereputasi` varchar(50) NOT NULL,
  `tahun_jurnal_bereputasi` varchar(4) NOT NULL,
  `indeks_jurnal_bereputasi` varchar(50) NOT NULL,
  `web_jurnal_bereputasi` varchar(300) NOT NULL,
  `terima` enum('0','1','2') NOT NULL DEFAULT '0',
  `created_date` date NOT NULL,
  `created_user` varchar(50) NOT NULL,
  `updated_date` date NOT NULL,
  `updated_user` varchar(50) NOT NULL,
  `active` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_peserta`
--

INSERT INTO `t_peserta` (`username`, `id_peserta`, `nama_lengkap`, `jenis_kelamin`, `status_perkawinan`, `tempat_lahir`, `tanggal_lahir`, `provinsi_lahir`, `kewarganegaraan`, `agama`, `golongan_darah`, `sumber_biaya`, `alamat_lengkap`, `kabupaten`, `provinsi_tinggal`, `status_tempat_tinggal`, `no_hp`, `email`, `perguruan_tinggi_s1`, `kota_pt_s1`, `provinsi_pt_s1`, `jurusan_s1`, `tahun_lulus_s1`, `lama_studi_s1`, `no_ijazah_universitas_s1`, `ipk_s1`, `no_ijazah_fakultas_s1`, `perguruan_tinggi_s2`, `kota_pt_s2`, `provinsi_pt_s2`, `prodi_s2`, `tahun_lulus_s2`, `lama_studi_s2`, `no_ijazah_universitas_s2`, `ipk_s2`, `no_ijazah_fakultas_s2`, `perguruan_tinggi_s3`, `kota_pt_s3`, `provinsi_pt_s3`, `prodi_s3`, `tahun_lulus_s3`, `lama_studi_s3`, `no_ijazah_universitas_s3`, `ipk_s3`, `no_ijazah_fakultas_s3`, `jenis_pekerjaan`, `jabatan`, `nama_instansi`, `alamat_instansi`, `no_telepon_instansi`, `gaji`, `mulai_bekerja`, `masa_tunggu`, `judul_nasional`, `penyelenggara_nasional`, `prosiding_nasional`, `tahun_nasional`, `web_nasional`, `judul_internasional`, `penyelenggara_internasional`, `prosiding_internasional`, `tahun_internasional`, `web_internasional`, `judul_jurnal_nasional`, `pengarang_jurnal_nasional`, `nama_jurnal_nasional`, `volume_jurnal_nasional`, `tahun_jurnal_nasional`, `web_jurnal_nasional`, `judul_jurnal_terindeks`, `pengarang_jurnal_terindeks`, `nama_jurnal_terindeks`, `volume_jurnal_terindeks`, `tahun_jurnal_terindeks`, `web_jurnal_terindeks`, `judul_jurnal_internasional`, `pengarang_jurnal_internasional`, `nama_jurnal_internasional`, `volume_jurnal_internasional`, `tahun_jurnal_internasional`, `web_jurnal_internasional`, `judul_jurnal_bereputasi`, `pengarang_jurnal_bereputasi`, `nama_jurnal_bereputasi`, `volume_jurnal_bereputasi`, `tahun_jurnal_bereputasi`, `indeks_jurnal_bereputasi`, `web_jurnal_bereputasi`, `terima`, `created_date`, `created_user`, `updated_date`, `updated_user`, `active`) VALUES
('idosocute', 1, 'Rifqi Ramadhani Muhammad', '1', '0', '', '1990-01-01', '', '', '', '0', '', '', '', '', '', '', 'rifqiido@yahoo.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '2018-06-17', 'admin_akademik', '2018-06-25', 'admin', '1'),
('galuh', 2, 'Citrasmara Galuh Nuansa, S.T., M,Ling.', '2', '2', 'Batang', '1988-05-13', 'Jawa Tengah', 'Indonesia', 'Islam', '4', 'Beasiswa', 'Desa Kalimanggis, RT 2, RW 2, Kec. Subah', 'Batang', 'Jawa Tengah', 'Rumah Orang Tua', '081326880905', 'galuh.citra@gmail.com', 'Universitas Diponegoro', 'Semarang', 'Jawa Tengah', 'Teknik Kimia', '2010', '3 Tahun 10 Bulan', '13305/ST', '3,44', '18238', 'Unversitas Diponegoro', 'Semarang', 'Jawa Tengah', 'Magister Ilmu Lingkungan', '2018', '1 Tahun 6 Bulan', '13797/MIL', '3,80', '544/M.Ling./SPS/2018', '', '', '', '', '', '', '', '', '', 'Aparatur Sipil Negara', 'Staf', 'Pusat Pengendalian Pembangunan Ekoregion Kalimantan (Kemenerian LHK)', 'Jln. Jend. Sudirman 19A, Balikpapan, Kalimantan Timur - 76111', '0542-738375', 2594600, 'Januari 2011', '6 Bulan', 'Hipotesis Enviromental Kuznets Curve: Sebuah Pandangan Hubungan Antara Pertumbuhan Ekonomi dengan Kualitas Lingkungan', 'Balai Besar Teknologi Pencegahan Pencemaran Industri - Kemenperin', 'Peran Teknologi Ramah Lingkungan untuk Mendukung Industri Hijau', '2017', 'http://sntih.kemenperin.go.id/prosiding/?hal=prosiding', 'Enviromental Kuznets Curve Hypothesis: A Perspective of Sustainable Development in Indonesia', 'Sekolah Pascasarjana, Universitas Diponegoro', 'The 2nd International Conference on Energy, Enviromental and Information Sysetem (ICENIS 2017)', '2018', 'https://wwww.e3s-conferences.org/articles/e3sconf/abs/2018/06/contents/contents.hyml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '2018-06-06', 'ido', '2018-06-25', 'galuh', '1'),
('cosx', 3, 'Remnant', '1', '0', '', '1990-01-01', '', '', '', '0', '', '', '', '', '', '', 'remnant@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2', '2018-06-17', 'admin_akademik', '2018-06-21', 'admin', '1'),
('ramadhani', 4, 'Ramadhani', '1', '0', '', '1990-01-01', '', '', '', '0', '', '', '', '', '', '', 'email@gmial.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '2018-06-17', '0', '0000-00-00', '', '1'),
('rodho', 5, 'Muhammad', '1', '0', '', '1990-01-01', '', '', '', '0', '', '', '', '', '', '', 'muhammad@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '2018-06-17', '0', '0000-00-00', '', '1'),
('pertama', 6, 'Peserta Pertama', '1', '0', '', '1990-01-01', '', '', '', '0', '', '', '', '', '', '', 'pertama@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '2018-06-17', '0', '0000-00-00', '', '1'),
('kedua', 7, 'Peserta Kedua', '2', '0', 'Brebes', '1994-12-12', '', '', '', '4', '', '', '', '', '', '', 'kedua@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '2018-06-17', '0', '0000-00-00', '', '1'),
('ketiga', 8, 'Peserta Ketiga', '1', '0', '', '1990-01-01', '', '', '', '0', '', '', '', '', '', '', 'ketiga@gmail.com', '', '', '', '', '', '', '2131/SP', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '2018-06-23', '0', '0000-00-00', '', '1'),
('keempat', 9, 'Peserta keempat', '2', '0', '', '1990-01-01', '', '', '', '0', '', '', '', '', '', '', 'keempat@gmai.com', '', '', '', '', '', '', '3121/SA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '2018-06-23', '0', '0000-00-00', '', '1'),
('kelima', 10, 'Peserta Kelima', '2', '0', '', '1990-01-01', '', '', '', '0', '', '', '', '', '', '', 'kelma@gmail.com', '', '', '', '', '', '', '3121/SH', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '2018-06-24', '0', '0000-00-00', '', '1'),
('keenam', 11, 'Peserta Keenam', '2', '0', '', '1990-01-01', '', '', '', '0', '', '', '', '', '', '', 'keenam@gmail.com', '', '', '', '', '', '', ' 2891/ST', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '2018-06-24', '0', '0000-00-00', '', '1'),
('ketujuh', 12, 'Peserta Ketujuh', '1', '0', '', '1990-01-01', '', '', '', '0', '', '', '', '', '', '', 'ketujuh@gmail.com', '', '', '', '', '', '', '3745/SL', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '2018-06-24', '0', '0000-00-00', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `t_tipe_pengguna`
--

CREATE TABLE `t_tipe_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_tipe_pengguna` varchar(50) NOT NULL,
  `created_date` date NOT NULL,
  `created_user` varchar(50) NOT NULL,
  `update_date` date NOT NULL,
  `update_user` varchar(50) NOT NULL,
  `active` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_tipe_pengguna`
--

INSERT INTO `t_tipe_pengguna` (`id_pengguna`, `nama_tipe_pengguna`, `created_date`, `created_user`, `update_date`, `update_user`, `active`) VALUES
(1, 'Super Admin', '2018-06-06', '1234567890', '2018-06-06', '0', '1'),
(2, 'Admin Lab', '2018-06-06', '1234567890', '2018-06-06', '0', '1'),
(3, 'Admin Keuangan', '2018-06-06', '1234567890', '0000-00-00', '0', '1'),
(99, 'Pendaftar', '2018-06-06', '1234567890', '0000-00-00', '0', '1');

-- --------------------------------------------------------

--
-- Table structure for table `t_user_type`
--

CREATE TABLE `t_user_type` (
  `id_user_type` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `nama_user_type` varchar(50) NOT NULL,
  `created_date` date NOT NULL,
  `created_user` char(18) NOT NULL,
  `updated_date` date NOT NULL,
  `updated_user` char(18) NOT NULL,
  `active` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user_type`
--

INSERT INTO `t_user_type` (`id_user_type`, `id_jabatan`, `nama_user_type`, `created_date`, `created_user`, `updated_date`, `updated_user`, `active`) VALUES
(1, 1, 'administrator', '2014-11-04', '1', '2014-11-04', '1', '1'),
(2, 2, 'Dekan', '2014-11-04', '1', '2017-08-07', '1', '1'),
(3, 3, 'Wakil Dekan I', '2014-11-04', '1', '2017-08-07', '1', '1'),
(4, 4, 'Wakil Dekan II', '2014-11-04', '1', '2017-08-07', '1', '1'),
(5, 5, 'Kabag Tata Usaha', '2014-11-04', '1', '2018-05-25', '199402142017092002', '1'),
(6, 6, 'Kabag Akademik', '2017-09-15', '0', '2017-09-15', '1', '1'),
(7, 7, 'Kabag Keuangan', '2017-09-15', '0', '2017-09-15', '1', '1'),
(8, 8, 'Kabag Pengelola Aset', '2017-09-15', '0', '2017-09-15', '1', '1'),
(99, 99, 'Pegawai', '2017-09-15', '0', '2017-09-15', '1', '1'),
(100, 6, 'Kabag Puskom', '2018-05-25', '199402142017092002', '0000-00-00', '', '0'),
(101, 6, 'Kabag Puskom', '2018-05-25', '199402142017092002', '0000-00-00', '', '0'),
(102, 8, 'Kabag Puskom', '2018-05-25', '199402142017092002', '0000-00-00', '', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_admin`
--
ALTER TABLE `t_admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `t_alasan`
--
ALTER TABLE `t_alasan`
  ADD PRIMARY KEY (`id_alasan`);

--
-- Indexes for table `t_dummy`
--
ALTER TABLE `t_dummy`
  ADD PRIMARY KEY (`no_ijazah_universitas_s1`);

--
-- Indexes for table `t_dummy2`
--
ALTER TABLE `t_dummy2`
  ADD PRIMARY KEY (`no_ijazah_universitas_s1`);

--
-- Indexes for table `t_keuangan`
--
ALTER TABLE `t_keuangan`
  ADD PRIMARY KEY (`no_ijazah_universitas_s1`);

--
-- Indexes for table `t_pengguna`
--
ALTER TABLE `t_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `t_peserta`
--
ALTER TABLE `t_peserta`
  ADD PRIMARY KEY (`id_peserta`);

--
-- Indexes for table `t_tipe_pengguna`
--
ALTER TABLE `t_tipe_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `t_user_type`
--
ALTER TABLE `t_user_type`
  ADD PRIMARY KEY (`id_user_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_alasan`
--
ALTER TABLE `t_alasan`
  MODIFY `id_alasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `t_pengguna`
--
ALTER TABLE `t_pengguna`
  MODIFY `id_pengguna` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `t_peserta`
--
ALTER TABLE `t_peserta`
  MODIFY `id_peserta` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `t_tipe_pengguna`
--
ALTER TABLE `t_tipe_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `t_user_type`
--
ALTER TABLE `t_user_type`
  MODIFY `id_user_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
