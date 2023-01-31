-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 27, 2015 at 08:45 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `faultpoint`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_gallery`
--

CREATE TABLE IF NOT EXISTS `tb_gallery` (
  `kd_gallery` int(11) NOT NULL AUTO_INCREMENT,
  `nis` varchar(10) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(100) NOT NULL,
  PRIMARY KEY (`kd_gallery`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tb_gallery`
--

INSERT INTO `tb_gallery` (`kd_gallery`, `nis`, `deskripsi`, `foto`) VALUES
(1, '31013028', '<p>Website ini mencakup tentang data pelanggaran, poin pelanggaran dan total poin pelanggaran yang telah dilakukan oleh siswa SMK Adi Sanggoro.</p>\r\n', '787902=p$~dhe~dh.jpg'),
(2, '21013013', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', ''),
(3, '21013018', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n', '655181DANBO DANBO RAMBO.jpg'),
(5, '21013033', '<p>asdadadadsadasdsad</p>\r\n', ''),
(6, '31013029', '<p>adasd</p>\r\n', '693542can-i-live-with-you.jpg'),
(7, '21013015', '<p>ini nama nya yosi yuniar, kelas XI RPL 2.</p>\r\n', ''),
(10, '21013020', '<p>ini nama nya recka novita Hodiningsih, kelas XI RPL 2 Jurusan Teknik Informatika</p>\r\n', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jurusan`
--

CREATE TABLE IF NOT EXISTS `tb_jurusan` (
  `kd_jurusan` int(11) NOT NULL AUTO_INCREMENT,
  `jurusan` varchar(50) NOT NULL,
  PRIMARY KEY (`kd_jurusan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`kd_jurusan`, `jurusan`) VALUES
(1, 'Teknik Survei dan Pemetaan'),
(2, 'Teknik Komputer dan Informatika'),
(3, 'Geologi Pertambangan'),
(4, 'Tata Busana / Garmen'),
(5, 'Mekatronika / Robotik');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE IF NOT EXISTS `tb_kategori` (
  `id_kategori` varchar(3) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `kategori`) VALUES
('1', 'Ringan'),
('2', 'Sedang'),
('3', 'Berat');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE IF NOT EXISTS `tb_kelas` (
  `kd_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `kelas` varchar(12) NOT NULL,
  `wali_kelas` varchar(30) NOT NULL,
  PRIMARY KEY (`kd_kelas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`kd_kelas`, `kelas`, `wali_kelas`) VALUES
(1, 'XI RPL 1', ''),
(2, 'XI RPL 2', 'Gita Juniar.spd'),
(3, 'XI RPL 3', ''),
(4, 'XI GMTK 1', ''),
(5, 'XI GMTK 2', ''),
(6, 'XI GMTK 3', ''),
(7, 'XI GMTK 4', ''),
(8, 'X TI 1', ''),
(9, 'X TI 2', ''),
(10, 'X TI 3', ''),
(11, 'X TI 4', ''),
(12, 'X GMTK 1', ''),
(13, 'X GMTK 2', ''),
(14, 'X GMTK 3', ''),
(15, 'X GMTK 4', ''),
(16, 'X GMTK 5', ''),
(17, 'X GMTK 6', ''),
(18, 'X GEO 1', ''),
(19, 'X GEO 2', ''),
(20, 'X GEO 3', ''),
(21, 'X GEO 4', ''),
(22, 'X GEO 5', ''),
(23, 'X GEO 6', ''),
(24, 'X TB', ''),
(25, 'XII RPL 1', ''),
(26, 'XII RPL 2', ''),
(27, 'XII SURTA 1', ''),
(28, 'XII SURTA 2', ''),
(29, 'XII SURTA 3', ''),
(30, 'XII SURTA 4', ''),
(31, 'XII SURTA 5', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggaran`
--

CREATE TABLE IF NOT EXISTS `tb_pelanggaran` (
  `kd_pel` int(11) NOT NULL AUTO_INCREMENT,
  `nis` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kd_kelas` int(11) NOT NULL,
  `kd_sanksi` varchar(6) NOT NULL,
  `point` int(3) NOT NULL,
  `sanksi` varchar(150) NOT NULL,
  `tanggal` date NOT NULL,
  `kronologi` text NOT NULL,
  `foto` varchar(100) NOT NULL,
  `status` enum('0','1') NOT NULL,
  PRIMARY KEY (`kd_pel`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `tb_pelanggaran`
--

INSERT INTO `tb_pelanggaran` (`kd_pel`, `nis`, `nama`, `kd_kelas`, `kd_sanksi`, `point`, `sanksi`, `tanggal`, `kronologi`, `foto`, `status`) VALUES
(1, '31013028', 'Iren Mauliddina', 2, 'SK08', 15, 'Diberikan peringatan oleh wali kelas dan diberikan surat panggilan untuk orang tua/wali', '2015-05-18', 'asdasda', '', '1'),
(36, '21013019', 'Reftiana Susilawati', 2, 'SK04', 10, 'Dicatat oleh guru piket dan diberikan tugas untuk membersihkan lingkungan sekolah', '2015-05-21', 'sadad', '', '0'),
(2, '21013015', 'Yosi Yuniar', 2, 'SK08', 15, 'Diberikan peringatan oleh wali kelas dan diberikan surat panggilan untuk orang tua/wali', '2015-05-14', 'asdadasd', '', '1'),
(37, '21013020', 'Recka Novita Hodiningsih', 2, 'SK05', 10, 'Diberikan peringatan oleh wali kelas dan diberikan surat panggilan untuk orang tua/wali setelah lebih dari tiga kali\r\n', '2015-05-21', 'asdad', '', '0'),
(32, '21013013', 'Feisal Jamaludin Kahfi', 2, 'SK02', 5, 'Diberi tugas membersihkan lingkungan sekolah', '2015-05-19', 'sdsad', '', '0'),
(35, '21013018', 'David Pangestu', 2, 'SK10', 5, 'Tidak diperkenankan mengikuti jam pelajaran olah raga diberi tugas untuk membersihkan lingkungan sekolah', '2015-05-26', 'Baju ketinggalan', '', '0'),
(34, '21013018', 'David Pangestu', 2, 'SK05', 10, 'Diberikan peringatan oleh wali kelas dan diberikan surat panggilan untuk orang tua/wali setelah lebih dari tiga kali\r\n', '2015-05-20', 'Bolos sekolah', '', '1'),
(31, '21013018', 'David Pangestu', 2, 'SK08', 15, 'Diberikan peringatan oleh wali kelas dan diberikan surat panggilan untuk orang tua/wali', '2015-05-18', 'Ketika meminta izin untuk makan, tidak diberikan izin oleh guru piket, lalu di berikan nasihat untuk makan di kantin dengan nasi dan juga garam.', '', '1'),
(40, '21013031', 'Figar Januari Ramadhan', 3, 'SK06', 15, 'Diberikan peringatan oleh walikelas dan diberikan surat panggilan untuk orang tua/wali', '2015-05-25', 'ini tindakan tidak baik, jangan ditiru yahh..', '', '0'),
(42, '21013020', 'Recka Novita Hodiningsih', 2, 'SK02', 5, 'Diberi tugas membersihkan lingkungan sekolah', '2015-05-26', 'Lorem ipsum dolor sit amet.', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_peraturan`
--

CREATE TABLE IF NOT EXISTS `tb_peraturan` (
  `kd_peraturan` varchar(6) NOT NULL,
  `BAB` varchar(6) NOT NULL,
  `Judul` varchar(50) NOT NULL,
  `Peraturan` text NOT NULL,
  PRIMARY KEY (`kd_peraturan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_peraturan`
--

INSERT INTO `tb_peraturan` (`kd_peraturan`, `BAB`, `Judul`, `Peraturan`) VALUES
('PR001', 'I', 'PENDAHULUAN', '<p>Sekolah mempunyai tugas dan fungsi menyelenggarkan proses pendidikan. Pendidikan itu sendiri berfungsi untuk mengembangkan kemampuan serta meningkatkan mutu kehidupan dan martabat manusia dalam upaya mewujudkan tujuan pendidikan nasional. Proses pendidikan disekolah SMK Adi Sanggoro dapat berlangsung baik apabila warga sekolah berhasil mengupayakan suasana sekolah yang kondusif. Banyak faktor yang perlu dan harus ditumbuh kembangkan dalam menciptakan suasana sekolah yang kondusif antara lain, keimanan dan ketaqwaan, kejujuran, ketertiban, kediiplinan, keteladanan, keamanan, suasana demokratis, kebersihan, kesehatan, keindahan, sopan santun, kepedulian, keterbukaan dan kebersamaan. Salah satu peraturan yang harus ada dalam upaya menciptakan suasana sekolah yang kondusif adalah &ldquo; Tata Tertib Sekolah&rdquo;. Tata tertib sekolah disusun untuk mengatur tingkah laku dan sikap siswa dalam pergaulan disekolah, baik dengan sesama siswa, guru, staf tata usaha maupun masyarakat dilingkungan sekolah. Dalam tata tertib siswa ini memuat hak, kewajiban, larangan dan sanksi.</p>\r\n'),
('PR002', 'II', 'KEHADIRAN SISWA DISEKOLAH', '1.Hadir disekolah 10 menit sebelum jam pelajaran pertama dimulai<br> \r\n2.Siswa terlambat hadir wajib melapor kepada guru piket <br>\r\n3.Masuk kelas tepat pada pukul 08.00 pagi, dan mengikuti pelajaran dengan tertib. Bagi yang terlambat masuk ke kelas lebih dari 15 menit, diharuskan melapor kepada guru piket. Apabila terlambat lebih dari 30 menit, maka siswa tidak diperkenankan mengikuti KBM pada saat jam berlangsung, dan diperkenankan mengikuti KBM di pelajaran selanjutnya.<br>\r\n4.Siswa yang berhalangan hadir wajib menyampaikan pemberitahuan tertulis ( telepon ) dari orang tua/wali, apabila sakit melampirkan surat keterangan dokter berlaku selama 3 hari<br>\r\n5.Siswa yang tidak hadir sekolah tanpa keterangan akan dikenakan sanksi dari sekolah <br>\r\n6.Siswa yang sudah hadir disekolah tapi karena sesuatu sebab tidak dapat mengikuti proses pembelajaran sampai selesai, wajib memberitahukan atau meminta ijin terlebih dahulu kepada guru piket. <br>\r\n7.Siswa harus mengikuti proses pembelajaran minimal 75 % setiap mata pelajaran. <br>\r\n8.Mengikuti secara aktif dan tertib segala kegiatan sekolah yang menunjang pendidikan baik di dalam maupun di luar lingkungan sekolah.<br>\r\n9.Melaporkan kepada Kepala Sekolah atau guru piket akan hal-hal negatif yang dilakukan oleh siswa lain di dalam atau di luar lingkungan sekolah<br>\r\n10.Lima belas menit setelah sekolah usai segera meninggalkan sekolah/pulang kecuali jika ada ijin dari guru piket, bilamana ada tugas dan kegiatan dari sekolah paling lambat sebelum magrib<br>\r\n11.Ijin ke luar dari sekolah harus di ketahui guru kelas dan guru piket di sertai surat ijin keluar<br>\r\n'),
('PR003', 'III', 'PROSES PEMBELAJARAN', '<p>1.Siswa wajib mengikuti keseluruhan proses pembelajaran yang telah dijadwalkan sekolah sebagai berikut, <strong>( senin &ndash; jumat mulai pukul 08.00-15.40 ) </strong></p>\r\n\r\n<p>2.Setiap hari proses pembelajaran diawali dan diakhiri dengan do&#39;a bersama</p>\r\n\r\n<p>3.Setiap pergantian jam pelajaran dimulai dan diakhiri dengan salam</p>\r\n\r\n<p>4.Siswa tidak diperkenankan meninggalkan kelas selama proses pembelajaran berlangsung , kecuali mendapat ijin dari guru mata pelajaran</p>\r\n\r\n<p>5.Apabila guru sedang mengajar, siswa dilarang mengerjakan tugas mata pelajaran lain, menggunanakan telepon seluler dan alat yang lain yang mengganggu KBM</p>\r\n\r\n<p>6.Siswa wajib membuat tugas yang dibuat guru mata pelajaran dengan baik dan tepat waktu</p>\r\n\r\n<p>7.Siswa wajib mengikuti berbagai kegiatan sekolah yang ditugaskan guru mata pelajaran untuk prestasi pribadi atau nama baik sekolah</p>\r\n'),
('PR004', 'IV', 'KETERTIBAN, KEBERSIHAN DAN KEINDAHAN SEKOLAH', '<p>1.Siswa wajib turut berpartisipasi memelihara keamanan, ketertiban, kebersihan, keindahan, kekeluargaan, ketaqwaan, kesehatan, kerindangan dan keharmonisan sekolah.</p>\r\n\r\n<p>2.Siswa dilarang membuat keributan dalam kelas hingga mengganggu kelas yang lain.</p>\r\n\r\n<p>3.Siswa dilarang membuang sampah sembarangan, menulis atau mengotori meja kursi, tembok, WC dan tempat lain dalam lingkungan sekolah dengan spidol, tipe ex, cat/pilox, dan alat lainnya.</p>\r\n\r\n<p>4.Siswa dilarang merusak kelengkapan kelas, hiasan dan tumbuh-tumbuhan yang ada diligkungan sekolah.</p>\r\n\r\n<p>5.Sebelum dan setelah proses pembelajaran siswa wajib membersihkan kelasnya masing-masing sesuai dengan jadwal piket yang ada.</p>\r\n\r\n<p>6.Siswa dilarang menempelkan gambar yang tidak bermanfaat dan tidak ada hubungan dengan proses pembelajaran di dinding, jendela atau pintu kelas.</p>\r\n\r\n<p>7.Siswa wajib menjaga dan memelihara peralatan dan prasarana kelas, laboratorium komputer, IPA dan geologi. Kerusakan atau kehilangan perlatan atau prasarana tersebut yang dilakukan siswa wajib diganti oleh siswa yang bersangkutan.</p>\r\n\r\n<p>8.Siswa yang membawa kendaraan bermotor wajib menyimpan ditempat yang telah disediakan.</p>\r\n\r\n<p>9.Siswa yang membawa kendaraan bermotor kesekolah wajib membawa STNK, SIM dan perlengkapan keselamatan seperti helm SNI.</p>\r\n\r\n<p>10.Siswa dilarang duduk-duduk diatas motor atau berada ditempat parkir selama pelajaran berlangsung.</p>\r\n\r\n<p>11.Siswa dilarang kawin/menikah sebelum atau selama mengikuti pendidikan di SMK Adi Sanggoro Bogor .</p>\r\n'),
('PR005', 'V', 'KETAHANAN DAN KEAMANAN SEKOLAH', '<p>1.Siswa wajib memelihara ketahanan dan keamanan sekolah terhadap ancaman, gangguan baik yang datang dari luar maupun dari dalam dengan tidak bermain hakim sendiri atau sewenang-wenang.</p>\r\n\r\n<p>2.Siswa dilarang membawa senjata tajam, senjata api dan alat lain yang membahayakan diri sendiri atau orang lain, buku atau kaset/CD/VCD/DVD porno, rokok, narkoba dan peralatan make up.</p>\r\n\r\n<p>3.Siswa dilarang mengaktifkan Hand Phone (HP) di lingkungan sekolah / selama KBM</p>\r\n\r\n<p>4.Siswa wajib mengikti setiap upacara bendera hari Senin, maupun upacara bendera hari-hari besar lainnya.</p>\r\n\r\n<p>5.Siswa dilarang keras berkelahi antar sesama siswa atau tindakan kekerasan lainnya di kelas atau dilingkungan sekolah yang dapat membahayakan keselamatan dirinya dan orang lain.</p>\r\n\r\n<p>6.Siswa dilarang menerima tamu kecuali setelah mendapatkan izin dari guru piket.</p>\r\n\r\n<p>7.Semua siswa dihimbau menggunakan bahasa Indonesia yang baik dan benar dilingkungan sekolah.</p>\r\n'),
('PR006', 'VI', 'SIKAP, PERILAKU DAN PAKAIAN SISWA', '<p>1.Siswa wajib berlaku sopan, saling menghormati terhadap sesama siswa, guru, staf tata usaha dan masyarakat sekolah serta membudayakan salam.</p>\r\n\r\n<p>2.Siswa dilarang mengucapkan kata-kata kasar dan kotor.</p>\r\n\r\n<p>3.Siswa bersikap jujur, sportif, berani bertanggung jawab mengakui kesalahan dan menerima sanksi yang diberikan akibat perbuatannya.</p>\r\n\r\n<p>4.Siswa wajib mengenakan pakaian seragam yang benar dan sopan sesuai dengan ketentuan peraturan pakaian seragam siswa sebagai berikut : Hari Senin &bull; Pakaian seragam utama ( PU ) dengan atribut lengkap.( meliputi : topi, dasi, pangkat, nama dan ikat pinggang hitam) &bull; Bagi siswi yang berkerudung wajib memakai kerudung warna putih dan tidak diwajibkan memakai topi ketika upacara. &bull; Wajib memakai sepatu hitam dan kaos kaki putih Hari Selasa &bull; Pakaian seragam Nasional putih abu-abu lengkap dengan dasi &bull; Bagi siswi yang berkerudung wajib memakai kerudung berwarna putih Hari Rabu &bull; Pakaian batik sesuai dengan program keahlian DAN DISESUAIKAN KETENTUAN KAPROG. Hari Kamis &bull; Pakaian Praktek sesuai dengan program keahlian DAN DISESUAIKAN KETENTUAN KAPROG. Hari Jum&#39;at &bull; Muslim :siswa memakai baju koko warna putih dan bawahan abu-abu. Sedangkan untuk siswi memakai putih abu-abu panjang dan kerudung warna putih. &bull; Non muslim memakai pakaian Nasional yaitu seragam putih abu-abu lengkap dengan dasi Hari Sabtu &bull; Untuk kelas X dan XI memakai seragam pramuka dengan atribut lengkap (stangan leher, ring, sabuk hitam, sepatu + kaos kaki hitam) &bull; Untuk kelas XII memakai seragam Nasional putih abu-abu lengkap dengan dasi.</p>\r\n\r\n<p>5.Celana + Rok Celana panjang untuk pria : standar / bukan pensil Rok panjang untuk perempuan : span panjang / bukan rempel</p>\r\n\r\n<p>6.Kaos kaki + sepatu Senin : sepatu hitam 85%, tali hitam/ putih dan kaos kaki putih dengan panjang di atas mata kaki. Selasa-Jum&rsquo;at : sepatu dan kaos kaki bebas, kaos kaki putih dengan panjang di atas mata kaki. Sabtu : sepatudan kaos kaki bebas, kaos kaki dengan panjang di atas mata kaki. (kecuali kelas X dan XI yang mengikuti ekstrakurikuler Pramuka)</p>\r\n\r\n<p>7.Jaket, switer, rompi dan topi yang bukan topi yang telah ditentukan dilarang digunakan dilingkungan sekolah.</p>\r\n\r\n<p>8.Pakaian olah raga hanya dipakai pada saat kegiatan olah raga dan kegiatan sekolah lainnya yang telah ditentukan oleh sekolah.</p>\r\n\r\n<p>9.Siswa pria dilarang berambut gondrong atau panjang panjang maksimal 5 cm (rambut bagian depan tidak melewati alis mata, bagian samping tidak melewati daun telinga dan bagian belakang tidak melewati krah baju), serta model potongan rambut rapi (tidak skin atau mohak) Siswa putri wajib berambut rapi. Bagi yang berambut panjang (melewati bahu) harap diikat rapi dan serasi. Siswa dan siswi dilarang mengecat atau mewarnai rambut.</p>\r\n\r\n<p>10.Siswa pria dilarang menggunakan kalung, gelang, anting-anting dan ikat pinggang yang berkepala besar. Siswa wanita dilarang menggunakan perhiasaan yang berlebihan.</p>\r\n\r\n<p>11.Siswa dilarang bertindik dan bertato.</p>\r\n\r\n<p>12.Siswa dan siswi dilarang berpacaran di dalam lingkungan sekolah. Siswa dan siswi dilarang berpacaran dengan guru.</p>\r\n'),
('PR007', 'VII', 'ORGANISASI SISWA', '<p>1.Disekolah hanya ada satu organisasi siswa yaitu OSIS (Organisasi Siswa Intra Sekolah). Setiap siswa wajib menjadi anggota aktif dan berpartisipasi dalam kegiatan OSIS.</p>\r\n\r\n<p>2.Organisasi Ekstrakurikuler disekolah yang diperbolekan sesuai dengan ketentuan Yayasan dan izin Kepala Sekolah antara lain : &bull; Pramuka &bull; Reisas &bull; Paladis &bull; Karawitan &bull; Ektrakurikuler Band &bull; Futsal &bull; Paduan Suara &bull; Paskibra &bull; BKC &bull; PMR</p>\r\n\r\n<p>3.Siswa dilarang membawa pengaruh organisasi luar atau berpolitik praktis dan aliran sesat di lingkungan sekolah.</p>\r\n\r\n<p>4.Jadwal ekstrakurikuler berlangsung dari hari Senin &ndash; Sabtu di luar KBM, jadwal dan waktu diatur kemudian.</p>\r\n\r\n<p>5.Siswa baru wajib mengikuti kegiatan Masa Orientasi Peserta Didik Baru (MOPDB) dan Outbond.</p>\r\n\r\n<p>6.Siswa kelas X dan XI, wajib mengikuti ekstrakurikuler max 2.</p>\r\n'),
('PR008', 'VIII', 'HUBUNGAN ANTARA SISWA, GURU DAN STAF TATA USAHA', '<p>1.Hubungan antara siswa bersifat persaudaraan yang akrab secara kekeluargaan.</p>\r\n\r\n<p>2.Hubungan antara siswa dengan guru dan staf Tata Usaha seperti orang tua dan fasilitator.</p>\r\n\r\n<p>3.Hubungan yang baik dengan seluruh warga di lingkungan Yayasan Adi Sanggoro</p>\r\n\r\n<p>4.Hubungan yang tidak serasi yang menimbulkan pertengkaran baik sendiri/kelompok harus diselesaikan dengan musyawarah serta menghindari penyelesaian secara kekerasan.</p>\r\n'),
('PR009', 'IX', 'KEWAJIBAN ADMINISTRASI SEKOLAH', '<p>1.Siswa wajib memberikan data pribadi atau administrasi yang sebenarnya dalam angket atau wawancara sekolah yang disiapkan oleh pihak sekolah.</p>\r\n\r\n<p>2.Siswa harus memenuhi kewajiban administarsi keuangan / SPP sesuai dengan kesepakatan atau ketentuan sekolah, paling lambat tanggal 10 setiap bulan. Apabila ada keterlambatan orang tua atau wali diharapkan memberitahukan kepada pihak sekolah.</p>\r\n\r\n<p>3.Siswa wajib memelihara buku raport, kartu siswa dan buku-buku yang dipinjamkan pihak sekolah dengan baik.</p>\r\n\r\n<p>4.Siswa kelas X dan XI yang tidak memenuhi batas minimal untuk naik kekelas XI, maka siswa tersebut dinyatakan gugur dan mengulang pada kelas yang sama.</p>\r\n'),
('PR010', 'X', 'HAK DAN KEWAJIBAN SISWA', '<p>1.Setiap siswa berhak mendapatkan pelayanan pendidikan yang sama dan sebaik-baiknya dari pihak sekolah.</p>\r\n\r\n<p>2.Siswa berkewajiban menjaga nama baik sekolah, baik di dalam maupun di luar lingkungan sekolah.</p>\r\n\r\n<p>3.Siswa dilindungi haknya oleh sekolah dari tindakan atau perilaku sewenang-wenang yang dapat merugikan pribadinya.</p>\r\n\r\n<p>4.Siswa berhak mengadukan masalah, menyampaikan keluhan secara lisan maupun tertulis kepada guru mata pelajaran, wali kelas, guru BK, Kesiswaan dan Kepala Sekolah untuk mendapat tanggapan dan perhatian.</p>\r\n\r\n<p>5.Siswa wajib mengikuti kegiatan Praktek Kerja Industri (Prakerin) sesuai dengan jadwal yang telah dibuat oleh pihak sekolah.</p>\r\n\r\n<p>6.Siswa wajib mematuhi Tata Tertib secara keseluruhan dan bersedia menerima sanksi yang dikenakan sebagai akibat dari sikap, perilaku dan pelanggaran yang telah dilakukan.</p>\r\n'),
('PR011', 'XI', 'PELANGGARAN DAN SANKSI', 'Sanksi-sanksi akibat pelanggaran peraturan tata tertib sekolah ini sebagai berikut : \r\n• Peringatan lisan dan tertulis dari sekolah yang disampaikan pada pihak orang tua. \r\n• Skorsing mengikuti kegiatan pembelajaran dalam jangka waktu tertentu. \r\n• Hukuman tertentu. \r\n• Tidak naik kelas. \r\n• Dikeluarkan dari sekolah \r\n• Mendapatkan point setiap pelanggaran yang dilakukan\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesan`
--

CREATE TABLE IF NOT EXISTS `tb_pesan` (
  `kd_pesan` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telepon` varchar(12) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`kd_pesan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tb_pesan`
--

INSERT INTO `tb_pesan` (`kd_pesan`, `nama`, `email`, `no_telepon`, `message`) VALUES
(1, 'Iren Mauliddina', 'asdad@gmail.com', '077228123212', 'asdasdasd'),
(2, 'Helmi', 'hemli@gmail.com', '088827381723', 'apakah benar david total pelanggaran nya 115??'),
(3, 'andika', 'andika@gmail.com', '1723812', 'kepo');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sanksi`
--

CREATE TABLE IF NOT EXISTS `tb_sanksi` (
  `kd_sanksi` varchar(6) NOT NULL,
  `jns_pelanggaran` varchar(150) NOT NULL,
  `id_kategori` varchar(3) NOT NULL,
  `point` int(3) NOT NULL,
  `sanksi` text NOT NULL,
  PRIMARY KEY (`kd_sanksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sanksi`
--

INSERT INTO `tb_sanksi` (`kd_sanksi`, `jns_pelanggaran`, `id_kategori`, `point`, `sanksi`) VALUES
('SK01', 'Terlambat sekolah Satu Kali', '1', 5, 'Dicatat, diperingatkan oleh guru piket dan wali kelas\r\n'),
('SK02', 'Terlambat sekolah Dua Kali', '1', 5, 'Diberi tugas membersihkan lingkungan sekolah'),
('SK03', 'Terlambat sekolah lebih dari Tiga Kali', '1', 5, 'Diberikan surat panggilan untuk orang tua/wali dan membuat surat pernyataan'),
('SK04', 'Siswa meninggalkan kelas tanpa ijin pada saat jam pelajaran', '1', 10, 'Dicatat oleh guru piket dan diberikan tugas untuk membersihkan lingkungan sekolah'),
('SK05', 'Tidak masuk tanpa keterangan', '1', 10, 'Diberikan peringatan oleh wali kelas dan diberikan surat panggilan untuk orang tua/wali setelah lebih dari tiga kali\r\n'),
('SK06', 'Tidak masuk dan membuat surat palsu', '1', 15, 'Diberikan peringatan oleh walikelas dan diberikan surat panggilan untuk orang tua/wali'),
('SK07', 'Pemalsuan dokumen sekolah atau surat edaran palsu', '3', 100, 'Dikeluarkan dari sekolah'),
('SK08', 'Keluar dari lingkungan sekolah tanpa izin', '1', 15, 'Diberikan peringatan oleh wali kelas dan diberikan surat panggilan untuk orang tua/wali'),
('SK09', 'Tidak memakai atribut sekolah dengan lengkap, baik dan benar', '1', 5, 'Diperingatkan dan tidak diperkenankan mengikuti kegiatan pembelajaran sebelum melengkapi atribut pakaian. Orangtua/wali diberikan surat panggilan dan dibuatkan surat pernyataan.'),
('SK10', 'Tidak menggunakan seragam olah raga pada saat jam pelajaran olah raga', '1', 5, 'Tidak diperkenankan mengikuti jam pelajaran olah raga diberi tugas untuk membersihkan lingkungan sekolah'),
('SK11', 'Memakai aksesoris seperti, gelang, kalung, topi (bukan seragam sekolah), rantai bagi siswa putra', '1', 5, 'Aksesoris tersebut diambil oleh pihak sekolah dan tidak dikembalikan.'),
('SK12', 'Menggunakan perhiasan dan berdandan yang berlebihan bagi siswa putri', '1', 5, 'Aksesoris tersebut diambil oleh pihak Sekolah dan dapat diambil oleh orang tua siswa.'),
('SK13', 'Membawa, menyimpan dan menggunakan Rokok', '1', 25, 'Barang disita dan dibuat surat panggilan untuk orang tua serta diberikan sanksi skorsing (1 minggu)'),
('SK14', 'Membawa, menyimpan dan menggunakan Minuman Ber-alkohol', '3', 100, 'Dikeluarkan dari Sekolah.'),
('SK15', 'Membawa, menyimpan dan menggunakan Buku, Kaset CD,VCD,DVD Porno, HP isi video porno/gambar porno', '3', 100, 'Dikeluarkan dari Sekolah.'),
('SK16', 'Membawa, menyimpan dan menggunakan Senjata tajam dan alat-alat yang bisa dipergunakan untuk perkelahian', '3', 100, 'Dikeluarkan dari Sekolah.'),
('SK17', 'Siswa putra berambut gondrong melebihi kerah baju dan dianggap tidak pantas gaya rambutnya', '1', 10, 'Dicukur oleh pihak Sekolah.'),
('SK18', 'Berjudi', '3', 100, 'Dikeluarkan dari Sekolah.'),
('Sk19', 'Mencuri', '3', 100, 'Dikeluarkan dari sekolah dan dapat diproses oleh pihak kepolisian.'),
('SK20', 'Melakukan pelecehan seksual', '3', 100, 'Dikeluarkan dari sekolah.'),
('SK21', 'Mengedarkan gambar atau situs porno di internet', '3', 100, 'Dikeluarkan dari Sekolah.'),
('SK22', 'Melakukan tindakan asusila dilingkungan sekolah', '3', 100, 'Dikeluarkan dari Sekolah.'),
('SK23', 'Merusak barang orang lain atau fasilitas sekolah', '2', 50, 'Dibuatkan surat panggilan untuk orang tua, mengganti barang yang dirusakan dan di skors.'),
('SK24', 'Mengaktifkan  HP dilingkungan sekolah / menggunakan saat KBM', '1', 10, 'HP ditahan oleh pihak sekolah dan dikembalikan setelah jangka waktu tertentu.'),
('SK25', 'Melakukan pemerasan terhadap siswa lain', '2', 50, 'Diberikan surat panggilan untuk orang tua dan dibuatkan surat perjanjian serta di skors.'),
('SK26', 'Berkelahi dengan siswa lain', '2', 50, 'Diberikan surat panggilan untuk orang tua dan dibuatkan surat perjanjian serta di skors.'),
('SK27', 'Berkelahi dengan siswa luar sekolah', '3', 100, 'Dikeluarkan dari Sekolah.'),
('SK28', 'Melakukan pemukulan terhadap guru dan staf tata usaha', '3', 100, 'Dikeluarkan dari sekolah'),
('SK29', 'Membuang sampah sembarangan', '1', 3, 'Diberi peringatan oleh wali kelas dan dicatat.'),
('SK30', 'Tidak melaksanakan piket kelas', '1', 3, 'Diberi peringatan oleh wali kelas dan dicatat.'),
('Sk31', 'Siswa/siswi berpacaran dengan sesama siswa/guru di dalam lingkungan SMK Adi Sanggoro', '2', 50, 'Diberi peringatan oleh guru BP dan dibuatkan surat perjanjian, apabila masih melakukan pelanggaran akan dilakukan pemanggilan orang tua.'),
('SK32', 'Melakukan pernikahan selama berstatus menjadi siswa SMK Adi Sanggoro', '3', 100, 'Dikeluarkan dari Sekolah.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE IF NOT EXISTS `tb_siswa` (
  `nis` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kd_kelas` int(11) NOT NULL,
  `kd_jurusan` int(11) NOT NULL,
  `jenkel` varchar(20) NOT NULL,
  `no_telpon` varchar(12) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  PRIMARY KEY (`nis`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`nis`, `nama`, `kd_kelas`, `kd_jurusan`, `jenkel`, `no_telpon`, `alamat`, `foto`) VALUES
('21013013', 'Feisal Jamaludin Kahfi', 2, 2, 'Laki-Laki', '085712345890', 'Cikampak', 'Feisal.jpg'),
('21013015', 'Yosi Yuniar', 2, 2, 'Laki-Laki', '085791632008', 'Carang Pulang', 'Yosi.jpg'),
('31013028', 'Iren Mauliddina', 2, 2, 'Perempuan', '085891632008', 'asdad', 'iren.jpg'),
('21013018', 'David Pangestu', 2, 2, 'Laki-Laki', '085791632008', 'Babakan Lebak', 'David.jpg'),
('21013020', 'Recka Novita Hodiningsih', 2, 2, 'Perempuan', '085791632008', 'Cikampak', 'Recka.jpg'),
('21013031', 'Figar Januari Ramadhan', 3, 2, 'Laki-Laki', '085712345892', 'asdad', 'figar.png'),
('21013033', 'Widia Erniawati', 3, 2, 'Perempuan', '085891632008', 'sadadsad', 'widia.png'),
('21013019', 'Reftiana Susilawati', 2, 2, 'Perempuan', '085991632008', 'asdadas', 'Refti.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE IF NOT EXISTS `tb_users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `jenkel` varchar(20) NOT NULL,
  `no_telpon` varchar(12) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `level` enum('user','admin') NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `username`, `password`, `nama_lengkap`, `jenkel`, `no_telpon`, `alamat`, `level`) VALUES
(1, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'David Pangestu', 'Laki-Laki', '085791632008', 'Balio', 'user'),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Feisal Jamaludin Kahfi', 'Laki-Laki', '085791632008', 'Cikampak', 'admin'),
(3, 'admin2', 'c84258e9c39059a89ab77d846ddab909', 'admin', 'Laki-Laki', '085791632008', 'Carang Pulang', 'admin'),
(4, 'yosi', '21232f297a57a5a743894a0e4a801fc3', 'yosi yuniar', 'Perempuan', '085791632008', 'Carang Pulang', 'admin'),
(7, 'Recka', 'af0dec3a169645451b5330739a29bd54', 'Recka Novita Hodiningsih', 'Perempuan', '077228123212', 'asdsad', 'admin'),
(8, 'rija', '3e41d683692dd2ae8afac316def47adb', 'Rija Maulana', 'Laki-Laki', '088827381723', 'asdsa', 'user');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
