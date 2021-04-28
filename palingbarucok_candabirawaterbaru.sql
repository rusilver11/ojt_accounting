/*
SQLyog Community v12.4.0 (64 bit)
MySQL - 10.1.34-MariaDB : Database - candabirawa
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`candabirawa` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `candabirawa`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nama` varchar(25) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`username`,`password`,`nama`) values 
('admin','admin','admin');

/*Table structure for table `akun` */

DROP TABLE IF EXISTS `akun`;

CREATE TABLE `akun` (
  `idakun` int(11) NOT NULL AUTO_INCREMENT,
  `kodeakun` varchar(25) NOT NULL,
  `namaakun` text NOT NULL,
  `posisi` enum('debit','kredit','','') NOT NULL,
  `laporan` varchar(20) NOT NULL,
  `neraca` varchar(12) NOT NULL,
  `aruskas` enum('no','Penerimaan','Pengeluaran') NOT NULL,
  PRIMARY KEY (`idakun`)
) ENGINE=InnoDB AUTO_INCREMENT=628 DEFAULT CHARSET=latin1;

/*Data for the table `akun` */

insert  into `akun`(`idakun`,`kodeakun`,`namaakun`,`posisi`,`laporan`,`neraca`,`aruskas`) values 
(529,'101','Kas','debit','0','18','no'),
(541,'302','Prive','debit','24','0',''),
(554,'301','Modal Dasar','kredit','null','22','no'),
(559,'201','Bank BCA','debit','0','31','Pengeluaran'),
(560,'202','Bank Mandiri','debit','0','31','Pengeluaran'),
(561,'601','Hutang Satpam\r\n','kredit','0','40','no'),
(562,'501','Penjualan','debit','38','0','no'),
(563,'602','Hutang Pekan Budaya','kredit','0','40','no'),
(564,'603','Hutang Demplot','kredit','0','40','no'),
(565,'604','Hutang Family Gathering','kredit','0','40','no'),
(566,'605','Hutang Sewa Tanah','kredit','0','40','no'),
(567,'606','Hutang Halah Bihalal','kredit','0','40','no'),
(568,'607','Prediksi PPN','kredit','0','40','no'),
(569,'608','Hutang Audit','kredit','0','40','no'),
(570,'609','Hutang Cetak','kredit','0','40','no'),
(571,'303','Piutang','debit','0','32','no'),
(578,'901','Gaji Karyawan','kredit','41','0','Pengeluaran'),
(579,'902','Eksploitasi','kredit','41','0','Pengeluaran'),
(580,'401','Bangunan','kredit','0','34','no'),
(581,'402','Penyusutan Bangunan','kredit','0','35','no'),
(582,'403','Peralatan','kredit','0','36','no'),
(583,'404','Penyusutan Peralatan','kredit','0','37','no'),
(584,'903','Perjalanan Dinas Luar Kota','kredit','41','0','Pengeluaran'),
(585,'904','Perjalanan Dinas Dalam Kota','kredit','41','0','Pengeluaran'),
(586,'905','Ongkos Angkut','kredit','41','0','Pengeluaran'),
(587,'906','Pengeluaran Kantor','kredit','41','0','Pengeluaran'),
(588,'907','Pemeliharaan','kredit','41','0','Pengeluaran'),
(589,'908','Bahan Bakar','kredit','41','0','Pengeluaran'),
(590,'909','Biaya Konsumsi','kredit','41','0','Pengeluaran'),
(591,'910','Lembur','kredit','41','0','no'),
(592,'911','PPn.','kredit','41','0','no'),
(593,'912','Pemasaran','kredit','41','0','Pengeluaran'),
(594,'913','Pembinaan','kredit','41','0','no'),
(595,'914','Temu Kios','kredit','41','0','Pengeluaran'),
(596,'915','Administrasi','kredit','41','0','no'),
(597,'916','Halal Bihalal','kredit','41','0','no'),
(598,'917','PPh Pasal 23','kredit','41','0','no'),
(599,'918','Sosialisasi Demplot','kredit','41','0','no'),
(600,'919','Penyusutan','kredit','41','0','no'),
(601,'920','Biaya Audit','kredit','41','0','no'),
(602,'921','Family Gathering','kredit','41','0','no'),
(603,'922','Satpam','kredit','41','0','no'),
(604,'923','Pekan Budaya','kredit','41','0','no'),
(605,'924','Pengembalian Potongan Penjualan','kredit','41','0','no'),
(606,'925','Sewa Tanah Pemda','kredit','41','0','no'),
(607,'926','BPJS','kredit','41','0','no'),
(608,'927','Lain-Lain','kredit','41','0','no'),
(609,'502','Pembelian','kredit','39','0','no'),
(610,'503','Persediaan','debit','0','33','no'),
(611,'610','Taksiran Pajak','kredit','0','40','no'),
(612,'611','Direksi','kredit','0','40','no'),
(613,'612','Pihak Ketiga','kredit','0','40','no'),
(615,'614','Hutang Pajak Masa','kredit','0','40','no'),
(616,'615','Pajak PPN','kredit','0','40','no'),
(617,'616','Hutang Sarpras','kredit','0','40','no'),
(618,'617','Hutang Audit','kredit','0','40','no'),
(619,'618','Hutang THR','kredit','0','40','no'),
(620,'619','Hutang Pemasaran','kredit','0','40','no'),
(621,'620','Hutang Potongan Penjualan','kredit','0','40','no'),
(622,'504','HPP','kredit','38','0','no'),
(623,'505','Pot. Ijin','debit','41','0','no'),
(624,'506','Bunga Bank','debit','38','0','no'),
(625,'507','Pendapatan Lain Lain','debit','38','0','no'),
(626,'621','Hutang Kios','kredit','0','40','no'),
(627,'304','Laba / Rugi Tahun ..','kredit','39','0','no');

/*Table structure for table `anggaran` */

DROP TABLE IF EXISTS `anggaran`;

CREATE TABLE `anggaran` (
  `idanggaran` int(11) NOT NULL AUTO_INCREMENT,
  `kodeakun` varchar(25) NOT NULL,
  `nominal` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `idsoal` varchar(10) NOT NULL,
  PRIMARY KEY (`idanggaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `anggaran` */

/*Table structure for table `barang` */

DROP TABLE IF EXISTS `barang`;

CREATE TABLE `barang` (
  `id` varchar(10) NOT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `harga` varchar(10) DEFAULT NULL,
  `kategori` varchar(20) DEFAULT NULL,
  `stok` int(10) DEFAULT NULL,
  `link` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `barang` */

insert  into `barang`(`id`,`nama`,`harga`,`kategori`,`stok`,`link`) values 
('0','Phonska','','SUBSIDI',20,'33'),
('p03','Urea','40000','SUBSIDI',114,'33'),
('p04','Phonska','50000','NON-SUBSIDI',-281,'33');

/*Table structure for table `bukubesar` */

DROP TABLE IF EXISTS `bukubesar`;

CREATE TABLE `bukubesar` (
  `idbb` int(11) NOT NULL AUTO_INCREMENT,
  `skpd` varchar(100) DEFAULT NULL,
  `kodeakun` varchar(25) DEFAULT NULL,
  `namaakun` text,
  `tgl` date DEFAULT NULL,
  `uraianbb` text,
  `ref` varchar(25) DEFAULT NULL,
  `debit` double(20,2) DEFAULT '0.00',
  `kredit` double(20,2) DEFAULT '0.00',
  `saldo` double(20,2) NOT NULL DEFAULT '0.00',
  `idtrx` int(11) NOT NULL,
  PRIMARY KEY (`idbb`)
) ENGINE=InnoDB AUTO_INCREMENT=909 DEFAULT CHARSET=latin1;

/*Data for the table `bukubesar` */

insert  into `bukubesar`(`idbb`,`skpd`,`kodeakun`,`namaakun`,`tgl`,`uraianbb`,`ref`,`debit`,`kredit`,`saldo`,`idtrx`) values 
(760,'Dinas Pendapatan Daerah','201','Bank BCA','2019-05-01','Bank BCA','201',377818560.00,0.00,377818560.00,760),
(776,'Dinas Pendapatan Daerah','201','Bank BCA','2019-05-01','Bank BCA','201',0.00,434513308.00,-56694748.00,776),
(778,'Dinas Pendapatan Daerah','202','Bank Mandiri','2019-05-01','Bank Mandiri','202',2735549973.00,0.00,2735549973.00,778),
(780,'Dinas Pendapatan Daerah','202','Bank Mandiri','2019-05-01','Bank Mandiri','202',0.00,2700076903.00,35473070.00,780),
(782,'Dinas Pendapatan Daerah','303','Piutang','2019-05-01','Piutang','303',822639620.00,0.00,822639620.00,782),
(784,'Dinas Pendapatan Daerah','303','Piutang','2019-05-01','Piutang','303',0.00,1033793780.00,-211154160.00,784),
(790,'Dinas Pendapatan Daerah','611','Direksi','2019-05-01','Direksi','611',15000000.00,0.00,15000000.00,790),
(792,'Dinas Pendapatan Daerah','609','Hutang Cetak','2019-05-01','Hutang Cetak','609',0.00,100000000.00,-100000000.00,792),
(794,'Dinas Pendapatan Daerah','503','Persediaan','2019-05-01','Persedian Pupuk','503',252479214.00,0.00,252479214.00,794),
(796,'Dinas Pendapatan Daerah','621','Hutang Kios','2019-05-01','Hutang Kios','621',3527280.00,0.00,3527280.00,796),
(798,'Dinas Pendapatan Daerah','101','Kas','2019-05-01','Kas - Penjualan Pupuk','101',1788094000.00,0.00,1788094000.00,798),
(799,'Dinas Pendapatan Daerah','101','Kas','2019-05-01','Kas - Penerimaan Piutang Bulan Mei 2019','101',1033793780.00,0.00,2821887780.00,799),
(800,'Dinas Pendapatan Daerah','101','Kas','2019-05-01','Kas - Pot. Ijin','101',47120.00,0.00,2821934900.00,800),
(801,'Dinas Pendapatan Daerah','101','Kas','2019-05-01','Pot. THT','101',228421.00,0.00,2822163321.00,801),
(802,'Dinas Pendapatan Daerah','101','Kas','2019-05-01','Kas - Diterima dari  BCA','101',434500000.00,0.00,3256663321.00,802),
(803,'Dinas Pendapatan Daerah','101','Kas','2019-05-01','Kas - Diterima dari Percetakan','101',100000000.00,0.00,3356663321.00,803),
(808,'Dinas Pendapatan Daerah','101','Kas','2019-05-01','Kas - Gaji Karyawan','101',0.00,25237700.00,3331425621.00,808),
(810,'Dinas Pendapatan Daerah','101','Kas','2019-05-01','Kas - Setor Bank Mandiri','101',0.00,2735500000.00,595925621.00,810),
(811,'Dinas Pendapatan Daerah','101','Kas','2019-05-01','Kas - Eksploitasi','101',0.00,3624120.00,592301501.00,811),
(812,'Dinas Pendapatan Daerah','101','Kas','2019-05-01','Kas - Perjalanan Dinas Luar Kota','101',0.00,2750000.00,589551501.00,812),
(813,'Dinas Pendapatan Daerah','101','Kas','2019-05-01','Kas - Perjalanan Dinas Dalam Kota','101',0.00,1885000.00,587666501.00,813),
(814,'Dinas Pendapatan Daerah','101','Kas','2019-05-01','Kas - Ongkos Angkut','101',0.00,76500000.00,511166501.00,814),
(815,'Dinas Pendapatan Daerah','101','Kas','2019-05-01','Kas - Pengeluaran Kantor','101',0.00,2192000.00,508974501.00,815),
(816,'Dinas Pendapatan Daerah','101','Kas','2019-05-01','Kas - Pemeliharaan','101',0.00,2040000.00,506934501.00,816),
(817,'Dinas Pendapatan Daerah','101','Kas','2019-05-01','Kas - Bahan Bakar','101',0.00,1990000.00,504944501.00,817),
(819,'Dinas Pendapatan Daerah','101','Kas','2019-05-01','Kas - Jamsostek','101',0.00,1017123.00,503927378.00,819),
(820,'Dinas Pendapatan Daerah','101','Kas','2019-05-01','Kas - Biaya Konsumsi','101',0.00,939050.00,502988328.00,820),
(821,'Dinas Pendapatan Daerah','101','Kas','2019-05-01','Kas - Lain Lain','101',0.00,400000.00,502588328.00,821),
(822,'Dinas Pendapatan Daerah','101','Kas','2019-05-01','Kas - Dibayar hutang laba 2017','101',0.00,56500000.00,446088328.00,822),
(823,'Dinas Pendapatan Daerah','101','Kas','2019-05-01','Kas - Pembinaan','101',0.00,2954500.00,443133828.00,823),
(824,'Dinas Pendapatan Daerah','101','Kas','2019-05-01','Kas - Temu Kios','101',0.00,1147000.00,441986828.00,824),
(825,'Dinas Pendapatan Daerah','101','Kas','2019-05-01','Kas - Dibayar Direksi','101',0.00,15000000.00,426986828.00,825),
(826,'Dinas Pendapatan Daerah','101','Kas','2019-05-01','Kas - Pemasaran','101',0.00,2775000.00,424211828.00,826),
(828,'Dinas Pendapatan Daerah','101','Kas','2019-05-01','Kas - Setor bank BCA','101',0.00,377818560.00,46393268.00,828),
(829,'Dinas Pendapatan Daerah','501','Penjualan','2019-05-01','Penjualan Pupuk','501',0.00,2614260900.00,-2614260900.00,829),
(830,'Dinas Pendapatan Daerah','502','Pembelian','2019-05-01','Pembelian  Pupuk','502',2700054408.00,0.00,2700054408.00,830),
(831,'Dinas Pendapatan Daerah','504','HPP','2019-05-01','HPP','504',0.00,252479214.00,-252479214.00,831),
(832,'Dinas Pendapatan Daerah','901','Gaji Karyawan','2019-05-01','Gaji Karyawan','901',25237700.00,0.00,25237700.00,832),
(833,'Dinas Pendapatan Daerah','902','Eksploitasi','2019-05-01','Exploitasi','902',3624120.00,0.00,3624120.00,833),
(834,'Dinas Pendapatan Daerah','903','Perjalanan Dinas Luar Kota','2019-05-01','perjalanan dinas luar kota','903',2750000.00,0.00,2750000.00,834),
(835,'Dinas Pendapatan Daerah','904','Perjalanan Dinas Dalam Kota','2019-05-01','perjalanan dinas dalam kota','904',1885000.00,0.00,1885000.00,835),
(836,'Dinas Pendapatan Daerah','905','Ongkos Angkut','2019-05-01','ongkos angkut','905',76500000.00,0.00,76500000.00,836),
(837,'Dinas Pendapatan Daerah','906','Pengeluaran Kantor','2019-05-01','Pengeluaran Kantor','906',2192000.00,0.00,2192000.00,837),
(838,'Dinas Pendapatan Daerah','907','Pemeliharaan','2019-05-01','Pemeliharaan','907',2040000.00,0.00,2040000.00,838),
(839,'Dinas Pendapatan Daerah','908','Bahan Bakar','2019-05-01','bahan bakar','908',1990000.00,0.00,1990000.00,839),
(840,'Dinas Pendapatan Daerah','909','Biaya Konsumsi','2019-05-01','Biaya Konsumsi','909',939050.00,0.00,939050.00,840),
(841,'Dinas Pendapatan Daerah','912','Pemasaran','2019-05-01','Pemasaran','912',2775000.00,0.00,2775000.00,841),
(842,'Dinas Pendapatan Daerah','913','Pembinaan','2019-05-01','Pembinaan','913',2954500.00,0.00,2954500.00,842),
(843,'Dinas Pendapatan Daerah','914','Temu Kios','2019-05-01','Temu Kios','914',1147000.00,0.00,1147000.00,843),
(844,'Dinas Pendapatan Daerah','927','Lain-Lain','2019-05-01','Lain-Lain','927',400000.00,0.00,400000.00,844),
(845,'Dinas Pendapatan Daerah','505','Pot. Ijin','2019-05-01','Potongan Ijin','505',0.00,47120.00,-47120.00,845),
(846,'Dinas Pendapatan Daerah','506','Bunga Bank','2019-05-01','Bunga Bank','506',35802.00,0.00,35802.00,846),
(847,'Dinas Pendapatan Daerah','506','Bunga Bank','2019-05-01','Bunga Bank','506',0.00,49972.00,-14170.00,847),
(848,'Dinas Pendapatan Daerah','926','BPJS','2019-05-01','BPJS Kesehatan','926',1017123.00,0.00,1017123.00,848),
(851,'Dinas Pendapatan Daerah','926','BPJS','2019-05-01','BPJS Kesehatan','926',0.00,228421.00,788702.00,851),
(852,'Dinas Pendapatan Daerah','304','Laba / Rugi Tahun ..','2019-05-01','Laba Rugi Tahun 2017','304',56500000.00,0.00,56500000.00,852),
(853,'Dinas Pendapatan Daerah','101','Kas','2019-06-01','Kas - Penjualan Pupuk','101',486075840.00,0.00,532469108.00,853),
(854,'Dinas Pendapatan Daerah','101','Kas','2019-06-01','Kas - Perimaan Piutang Bulan Mei 2018','101',622567740.00,0.00,1155036848.00,854),
(855,'Dinas Pendapatan Daerah','101','Kas','2019-06-01','Kas - Pot THT','101',228421.50,0.00,1155265269.50,855),
(856,'Dinas Pendapatan Daerah','101','Kas','2019-06-01','Kas - Diterima dari BCA','101',222000000.00,0.00,1377265269.50,856),
(857,'Dinas Pendapatan Daerah','101','Kas','2019-06-01','Kas - Diterima dari Direksi','101',100000000.00,0.00,1477265269.50,857),
(860,'Dinas Pendapatan Daerah','101','Kas','2019-06-01','Kas - Gaji Karyawan','101',0.00,16069850.00,1461195419.50,860),
(861,'Dinas Pendapatan Daerah','101','Kas','2019-06-01','Kas - Setor bank BCA','101',0.00,263745760.00,1197449659.50,861),
(862,'Dinas Pendapatan Daerah','101','Kas','2019-06-01','Kas - Setor Bank Mandiri','101',0.00,1066000000.00,131449659.50,862),
(863,'Dinas Pendapatan Daerah','101','Kas','2019-06-01','Kas - Eksploitasi','101',0.00,2026100.00,129423559.50,863),
(864,'Dinas Pendapatan Daerah','101','Kas','2019-06-01','Kas - Perjalanan Dinas Luar Kota','101',0.00,300000.00,129123559.50,864),
(865,'Dinas Pendapatan Daerah','101','Kas','2019-06-01','Kas - Perjalana Dinas Dalam Kota','101',0.00,2252500.00,126871059.50,865),
(866,'Dinas Pendapatan Daerah','101','Kas','2019-06-01','Kas - Ongkos Angkut','101',0.00,43500000.00,83371059.50,866),
(867,'Dinas Pendapatan Daerah','101','Kas','2019-06-01','Kas - Pengeluaran Kantor','101',0.00,2149000.00,81222059.50,867),
(868,'Dinas Pendapatan Daerah','101','Kas','2019-06-01','Kas -Pemeliharaan','101',0.00,1173000.00,80049059.50,868),
(869,'Dinas Pendapatan Daerah','101','Kas','2019-06-01','Kas - Bahan Bakar','101',0.00,2220000.00,77829059.50,869),
(870,'Dinas Pendapatan Daerah','101','Kas','2019-06-01','Kas - Pemasaran','101',0.00,1513500.00,76315559.50,870),
(871,'Dinas Pendapatan Daerah','101','Kas','2019-06-01','Kas - Jamsostek','101',0.00,1017123.02,75298436.48,871),
(872,'Dinas Pendapatan Daerah','101','Kas','2019-06-01','Kas - Biaya Konsumsi','101',0.00,1221700.00,74076736.48,872),
(874,'Dinas Pendapatan Daerah','101','Kas','2019-06-01','Kas - Dibayar hutang laba 2017','101',0.00,80000000.00,-5923263.52,874),
(875,'Dinas Pendapatan Daerah','101','Kas','2019-06-01','Kas - Pembinaan','101',0.00,2200000.00,-8123263.52,875),
(876,'Dinas Pendapatan Daerah','101','Kas','2019-06-01','Kas - Dibayar Demplot','101',0.00,4000000.00,-12123263.52,876),
(877,'Dinas Pendapatan Daerah','101','Kas','2019-06-01','Kas - Lain - Lain','101',0.00,916000.00,-13039263.52,877),
(878,'Dinas Pendapatan Daerah','202','Bank Mandiri','2019-06-01','Bank Mandiri','202',1066039029.47,0.00,1101512099.47,878),
(879,'Dinas Pendapatan Daerah','202','Bank Mandiri','2019-06-01','Bank Mandiri','202',0.00,1119354405.89,-17842306.42,879),
(880,'Dinas Pendapatan Daerah','201','Bank BCA','2019-06-01','Bank BCA','201',263754413.32,0.00,207059665.32,880),
(882,'Dinas Pendapatan Daerah','201','Bank BCA','2019-06-01','Bank BCA','201',0.00,222018730.66,-14959065.34,882),
(883,'Dinas Pendapatan Daerah','303','Piutang','2019-06-01','Piutang','303',849452922.00,0.00,638298762.00,883),
(884,'Dinas Pendapatan Daerah','303','Piutang','2019-06-01','Piutang','303',0.00,622567740.00,15731022.00,884),
(885,'Dinas Pendapatan Daerah','503','Persediaan','2019-06-01','Persedian','503',0.00,129069647.42,123409566.58,885),
(886,'Dinas Pendapatan Daerah','611','Direksi','2019-06-01','Direksi','611',0.00,100000000.00,-85000000.00,886),
(887,'Dinas Pendapatan Daerah','603','Hutang Demplot','2019-06-01','Hutang Demplot','603',4000000.00,0.00,4000000.00,887),
(888,'Dinas Pendapatan Daerah','304','Laba / Rugi Tahun ..','2019-06-01','Laba Rugi Tahun 2017','304',80000000.00,0.00,136500000.00,888),
(889,'Dinas Pendapatan Daerah','501','Penjualan','2019-06-01','penjualan pupuk','501',0.00,1335528762.00,-3949789662.00,889),
(890,'Dinas Pendapatan Daerah','502','Pembelian','2019-06-01','Pembelian - Pupuk','502',1119309100.00,0.00,3819363508.00,890),
(891,'Dinas Pendapatan Daerah','504','HPP','2019-06-01','HPP','504',129069647.42,0.00,-123409566.58,891),
(892,'Dinas Pendapatan Daerah','901','Gaji Karyawan','2019-06-01','Gaji Karyawan','901',16069850.00,0.00,41307550.00,892),
(893,'Dinas Pendapatan Daerah','902','Eksploitasi','2019-06-01','Eksploitasi','902',2026100.00,0.00,5650220.00,893),
(894,'Dinas Pendapatan Daerah','903','Perjalanan Dinas Luar Kota','2019-06-01','perjalanan dinas luar kota','903',300000.00,0.00,3050000.00,894),
(895,'Dinas Pendapatan Daerah','904','Perjalanan Dinas Dalam Kota','2019-06-01','perjalanan dinas dalam kota','904',2252500.00,0.00,4137500.00,895),
(896,'Dinas Pendapatan Daerah','905','Ongkos Angkut','2019-06-01','ongkos angkut','905',43500000.00,0.00,120000000.00,896),
(897,'Dinas Pendapatan Daerah','906','Pengeluaran Kantor','2019-06-01','Pengeluaran Kantor','906',2149000.00,0.00,4341000.00,897),
(898,'Dinas Pendapatan Daerah','907','Pemeliharaan','2019-06-01','pemeliharaan','907',1173000.00,0.00,3213000.00,898),
(899,'Dinas Pendapatan Daerah','908','Bahan Bakar','2019-06-01','Pemeliharaan','908',2220000.00,0.00,4210000.00,899),
(900,'Dinas Pendapatan Daerah','909','Biaya Konsumsi','2019-06-01','biaya konsumsi','909',1221700.00,0.00,2160750.00,900),
(901,'Dinas Pendapatan Daerah','912','Pemasaran','2019-06-01','Pemasaran','912',1513500.00,0.00,4288500.00,901),
(902,'Dinas Pendapatan Daerah','913','Pembinaan','2019-06-01','Pembinaan','913',2200000.00,0.00,5154500.00,902),
(903,'Dinas Pendapatan Daerah','927','Lain-Lain','2019-06-01','lain - lain','927',916000.00,0.00,1316000.00,903),
(904,'Dinas Pendapatan Daerah','506','Bunga Bank','2019-06-01','Bunga Bank','506',64036.55,0.00,49866.55,904),
(905,'Dinas Pendapatan Daerah','506','Bunga Bank','2019-06-01','Bunga Bank','506',0.00,47682.79,2183.76,905),
(906,'Dinas Pendapatan Daerah','926','BPJS','2019-06-01','BPJS Kesehatan','926',1017132.02,0.00,1805834.02,906),
(907,'Dinas Pendapatan Daerah','926','BPJS','2019-06-01','BPJS Kesehatan','926',0.00,228421.50,1577412.52,907),
(908,'Dinas Pendapatan Daerah','201','Bank BCA','2019-07-01','Bank BCA','Bank BCA',184345680.00,0.00,169386614.66,908);

/*Table structure for table `jurnalpenyesuaian` */

DROP TABLE IF EXISTS `jurnalpenyesuaian`;

CREATE TABLE `jurnalpenyesuaian` (
  `tgl` date NOT NULL,
  `nobukti` int(11) NOT NULL AUTO_INCREMENT,
  `nojp` int(11) NOT NULL,
  `nosubjp` int(11) NOT NULL,
  `kodeakun` varchar(25) NOT NULL,
  `uraianjurnal` text NOT NULL,
  `ref` varchar(25) NOT NULL,
  `debit` int(11) NOT NULL,
  `kredit` int(11) NOT NULL,
  `idtrx` int(11) NOT NULL,
  PRIMARY KEY (`nobukti`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `jurnalpenyesuaian` */

/*Table structure for table `jurnalumum` */

DROP TABLE IF EXISTS `jurnalumum`;

CREATE TABLE `jurnalumum` (
  `tgl` date NOT NULL,
  `nobukti` int(11) NOT NULL AUTO_INCREMENT,
  `noju` int(11) DEFAULT NULL,
  `nosubju` int(11) DEFAULT NULL,
  `kodeakun` varchar(25) NOT NULL,
  `uraianjurnal` text NOT NULL,
  `ref` varchar(25) DEFAULT NULL,
  `debit` double(20,2) NOT NULL DEFAULT '0.00',
  `kredit` double(20,2) NOT NULL DEFAULT '0.00',
  `idtrx` int(11) NOT NULL,
  KEY `nobukti` (`nobukti`)
) ENGINE=InnoDB AUTO_INCREMENT=873 DEFAULT CHARSET=latin1;

/*Data for the table `jurnalumum` */

insert  into `jurnalumum`(`tgl`,`nobukti`,`noju`,`nosubju`,`kodeakun`,`uraianjurnal`,`ref`,`debit`,`kredit`,`idtrx`) values 
('2019-05-01',724,1,1,'201','Bank BCA','201',377818560.00,0.00,760),
('2019-05-01',740,1,3,'201','Bank BCA','201',0.00,434513308.00,776),
('2019-05-01',742,1,5,'202','Bank Mandiri','202',2735549973.00,0.00,778),
('2019-05-01',744,1,7,'202','Bank Mandiri','202',0.00,2700076903.00,780),
('2019-05-01',746,1,9,'303','Piutang','303',822639620.00,0.00,782),
('2019-05-01',748,1,11,'303','Piutang','303',0.00,1033793780.00,784),
('2019-05-01',754,1,15,'611','Direksi','611',15000000.00,0.00,790),
('2019-05-01',756,1,17,'609','Hutang Cetak','609',0.00,100000000.00,792),
('2019-05-01',758,1,19,'503','Persedian Pupuk','503',252479214.00,0.00,794),
('2019-05-01',760,1,21,'621','Hutang Kios','621',3527280.00,0.00,796),
('2019-05-01',762,1,23,'101','Kas - Penjualan Pupuk','101',1788094000.00,0.00,798),
('2019-05-01',763,1,24,'101','Kas - Penerimaan Piutang Bulan Mei 2019','101',1033793780.00,0.00,799),
('2019-05-01',764,1,25,'101','Kas - Pot. Ijin','101',47120.00,0.00,800),
('2019-05-01',765,1,26,'101','Pot. THT','101',228421.00,0.00,801),
('2019-05-01',766,1,27,'101','Kas - Diterima dari BCA','101',434500000.00,0.00,802),
('2019-05-01',767,1,28,'101','Kas - Diterima dari Percetakan','101',100000000.00,0.00,803),
('2019-05-01',772,1,29,'101','Kas - Gaji Karyawan','101',0.00,25237700.00,808),
('2019-05-01',774,1,31,'101','Kas - Setor Bank Mandiri','101',0.00,2735500000.00,810),
('2019-05-01',775,1,32,'101','Kas - Eksploitasi','101',0.00,3624120.00,811),
('2019-05-01',776,1,33,'101','Kas - Perjalanan Dinas Luar Kota','101',0.00,2750000.00,812),
('2019-05-01',777,1,34,'101','Kas - Perjalanan Dinas Dalam Kota','101',0.00,1885000.00,813),
('2019-05-01',778,1,35,'101','Kas - Ongkos Angkut','101',0.00,76500000.00,814),
('2019-05-01',779,1,36,'101','Kas - Pengeluaran Kantor','101',0.00,2192000.00,815),
('2019-05-01',780,1,37,'101','Kas - Pemeliharaan','101',0.00,2040000.00,816),
('2019-05-01',781,1,38,'101','Kas - Bahan Bakar','101',0.00,1990000.00,817),
('2019-05-01',783,1,40,'101','Kas - Jamsostek','101',0.00,1017123.00,819),
('2019-05-01',784,1,41,'101','Kas - Biaya Konsumsi','101',0.00,939050.00,820),
('2019-05-01',785,1,42,'101','Kas - Lain Lain','101',0.00,400000.00,821),
('2019-05-01',786,1,43,'101','Kas - Dibayar hutang laba 2017','101',0.00,56500000.00,822),
('2019-05-01',787,1,44,'101','Kas - Pembinaan','101',0.00,2954500.00,823),
('2019-05-01',788,1,45,'101','Kas - Temu Kios','101',0.00,1147000.00,824),
('2019-05-01',789,1,46,'101','Kas - Dibayar Direksi','101',0.00,15000000.00,825),
('2019-05-01',790,1,47,'101','Kas - Pemasaran','101',0.00,2775000.00,826),
('2019-05-01',792,1,48,'101','Kas - Setor bank BCA','101',0.00,377818560.00,828),
('2019-05-01',793,1,49,'501','Penjualan Pupuk','501',0.00,2614260900.00,829),
('2019-05-01',794,1,50,'502','Pembelian  Pupuk','502',2700054408.00,0.00,830),
('2019-05-01',795,1,51,'504','HPP','504',0.00,252479214.00,831),
('2019-05-01',796,1,52,'901','Gaji Karyawan','901',25237700.00,0.00,832),
('2019-05-01',797,1,53,'902','Exploitasi','902',3624120.00,0.00,833),
('2019-05-01',798,1,54,'903','perjalanan dinas luar kota','903',2750000.00,0.00,834),
('2019-05-01',799,1,55,'904','perjalanan dinas dalam kota','904',1885000.00,0.00,835),
('2019-05-01',800,1,56,'905','ongkos angkut','905',76500000.00,0.00,836),
('2019-05-01',801,1,57,'906','Pengeluaran Kantor','906',2192000.00,0.00,837),
('2019-05-01',802,1,58,'907','Pemeliharaan','907',2040000.00,0.00,838),
('2019-05-01',803,1,59,'908','bahan bakar','908',1990000.00,0.00,839),
('2019-05-01',804,1,60,'909','Biaya Konsumsi','909',939050.00,0.00,840),
('2019-05-01',805,1,61,'912','Pemasaran','912',2775000.00,0.00,841),
('2019-05-01',806,1,62,'913','Pembinaan','913',2954500.00,0.00,842),
('2019-05-01',807,1,63,'914','Temu Kios','914',1147000.00,0.00,843),
('2019-05-01',808,1,64,'927','Lain-Lain','927',400000.00,0.00,844),
('2019-05-01',809,1,65,'505','Potongan Ijin','505',0.00,47120.00,845),
('2019-05-01',810,1,66,'506','Bunga Bank','506',35802.00,0.00,846),
('2019-05-01',811,1,67,'506','Bunga Bank','506',0.00,49972.00,847),
('2019-05-01',812,1,68,'926','BPJS Kesehatan','926',1017123.00,0.00,848),
('2019-05-01',815,1,69,'926','BPJS Kesehatan','926',0.00,228421.00,851),
('2019-05-01',816,1,70,'304','Laba Rugi Tahun 2017','304',56500000.00,0.00,852),
('2019-06-01',817,2,1,'101','Kas - Penjualan Pupuk','101',486075840.00,0.00,853),
('2019-06-01',818,2,2,'101','Kas - Perimaan Piutang Bulan Mei 2018','101',622567740.00,0.00,854),
('2019-06-01',819,2,3,'101','Kas - Pot THT','101',228421.50,0.00,855),
('2019-06-01',820,2,4,'101','Kas - Diterima dari BCA','101',222000000.00,0.00,856),
('2019-06-01',821,2,5,'101','Kas - Diterima dari Direksi','101',100000000.00,0.00,857),
('2019-06-01',824,2,6,'101','Kas - Gaji Karyawan','101',0.00,16069850.00,860),
('2019-06-01',825,2,7,'101','Kas - Setor bank BCA','101',0.00,263745760.00,861),
('2019-06-01',826,2,8,'101','Kas - Setor Bank Mandiri','101',0.00,1066000000.00,862),
('2019-06-01',827,2,9,'101','Kas - Eksploitasi','101',0.00,2026100.00,863),
('2019-06-01',828,2,10,'101','Kas - Perjalanan Dinas Luar Kota','101',0.00,300000.00,864),
('2019-06-01',829,2,11,'101','Kas - Perjalana Dinas Dalam Kota','101',0.00,2252500.00,865),
('2019-06-01',830,2,12,'101','Kas - Ongkos Angkut','101',0.00,43500000.00,866),
('2019-06-01',831,2,13,'101','Kas - Pengeluaran Kantor','101',0.00,2149000.00,867),
('2019-06-01',832,2,14,'101','Kas -Pemeliharaan','101',0.00,1173000.00,868),
('2019-06-01',833,2,15,'101','Kas - Bahan Bakar','101',0.00,2220000.00,869),
('2019-06-01',834,2,16,'101','Kas - Pemasaran','101',0.00,1513500.00,870),
('2019-06-01',835,2,17,'101','Kas - Jamsostek','101',0.00,1017123.02,871),
('2019-06-01',836,2,18,'101','Kas - Biaya Konsumsi','101',0.00,1221700.00,872),
('2019-06-01',838,2,20,'101','Kas - Dibayar hutang laba 2017','101',0.00,80000000.00,874),
('2019-06-01',839,2,21,'101','Kas - Pembinaan','101',0.00,2200000.00,875),
('2019-06-01',840,2,22,'101','Kas - Dibayar Demplot','101',0.00,4000000.00,876),
('2019-06-01',841,2,23,'101','Kas - Lain - Lain','101',0.00,916000.00,877),
('2019-06-01',842,2,24,'202','Bank Mandiri','202',1066039029.47,0.00,878),
('2019-06-01',843,2,25,'202','Bank Mandiri','202',0.00,1119354405.89,879),
('2019-06-01',844,2,26,'201','Bank BCA','201',263754413.32,0.00,880),
('2019-06-01',846,2,27,'201','Bank BCA','201',0.00,222018730.66,882),
('2019-06-01',847,2,28,'303','Piutang','303',849452922.00,0.00,883),
('2019-06-01',848,2,29,'303','Piutang','303',0.00,622567740.00,884),
('2019-06-01',849,2,30,'503','Persediaan','503',0.00,129069647.42,885),
('2019-06-01',850,2,31,'611','Direksi','611',0.00,100000000.00,886),
('2019-06-01',851,2,32,'603','Hutang Demplot','603',4000000.00,0.00,887),
('2019-06-01',852,2,33,'304','Laba Rugi Tahun 2017','304',80000000.00,0.00,888),
('2019-06-01',853,2,34,'501','penjualan pupuk','501',0.00,1335528762.00,889),
('2019-06-01',854,2,35,'502','Pembelian - Pupuk','502',1119309100.00,0.00,890),
('2019-06-01',855,2,36,'504','HPP','504',129069647.42,0.00,891),
('2019-06-01',856,2,37,'901','Gaji Karyawan','901',16069850.00,0.00,892),
('2019-06-01',857,2,38,'902','Eksploitasi','902',2026100.00,0.00,893),
('2019-06-01',858,2,39,'903','perjalanan dinas luar kota','903',300000.00,0.00,894),
('2019-06-01',859,2,40,'904','perjalanan dinas dalam kota','904',2252500.00,0.00,895),
('2019-06-01',860,2,41,'905','ongkos angkut','905',43500000.00,0.00,896),
('2019-06-01',861,2,42,'906','Pengeluaran Kantor','906',2149000.00,0.00,897),
('2019-06-01',862,2,43,'907','pemeliharaan','907',1173000.00,0.00,898),
('2019-06-01',863,2,44,'908','Pemeliharaan','908',2220000.00,0.00,899),
('2019-06-01',864,2,45,'909','biaya konsumsi','909',1221700.00,0.00,900),
('2019-06-01',865,2,46,'912','Pemasaran','912',1513500.00,0.00,901),
('2019-06-01',866,2,47,'913','Pembinaan','913',2200000.00,0.00,902),
('2019-06-01',867,2,48,'927','lain - lain','927',916000.00,0.00,903),
('2019-06-01',868,2,49,'506','Bunga Bank','506',64036.55,0.00,904),
('2019-06-01',869,2,50,'506','Bunga Bank','506',0.00,47682.79,905),
('2019-06-01',870,2,51,'926','BPJS Kesehatan','926',1017132.02,0.00,906),
('2019-06-01',871,2,52,'926','BPJS Kesehatan','926',0.00,228421.50,907),
('2019-07-01',872,3,1,'201','Bank BCA','Bank BCA',184345680.00,0.00,908);

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `nokategori` int(2) DEFAULT NULL,
  `namakategori` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kategori` */

insert  into `kategori`(`nokategori`,`namakategori`) values 
(1,'Aktiva'),
(2,'Pasiva'),
(3,'Ekuitas'),
(4,'Pendapatan'),
(5,'Pembelian'),
(6,'Beban'),
(7,'Ekuitas(SaldoAwal)'),
(8,'deviden'),
(9,'pajak');

/*Table structure for table `kios` */

DROP TABLE IF EXISTS `kios`;

CREATE TABLE `kios` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `kode` varchar(5) NOT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `alamat` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`kode`,`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

/*Data for the table `kios` */

insert  into `kios`(`id`,`kode`,`nama`,`alamat`) values 
(1,'K01','Adam, UD','Banyakan'),
(2,'K02','Amin Tani, TOKO','Banyakan'),
(3,'K03','Barik Rizqi, UD','Banyakan'),
(4,'K04','Berkah Tani, UD, Sun','Banyakan'),
(5,'K05','Puspito, TOKO','Banyakan'),
(6,'K06','Rukun Jaya, TOKO','Banyakan'),
(7,'K07','Sempulur, KIOS','Banyakan'),
(8,'K08','Sidodadi, UD','Banyakan'),
(9,'K09','Suka Subur, UD','Banyakan'),
(10,'K10','Sumber Mulyo, UD','Banyakan'),
(11,'K11','Suroto, UD','Banyakan'),
(12,'K12','Usaha Tani, UD','Banyakan'),
(13,'K13','Berkah Tani, UD, Rin','Grogol'),
(14,'K14','Kuning,  TOKO','Grogol'),
(15,'K15','Lestari, UD','Grogol'),
(16,'K16','Margodadi, UD','Grogol'),
(17,'K17','Sumber Tani, TOKO','Grogol'),
(18,'K18','Adam, TOKO','Semen'),
(19,'K19','Eka Jaya, UD','Semen'),
(20,'K20','Kanti Makmur, UD','Semen'),
(21,'K21','Kencana, UD','Semen'),
(22,'K22','Lancar Agro Mandiri,','Semen'),
(23,'K23','Manunggal Sejati, UD','Semen'),
(24,'K24','Mitra Sejahtera, UD','Semen'),
(25,'K25','Surya Alam, UD','Semen'),
(26,'K26','Tani Makmur, UD','Semen'),
(27,'K27','Tani Rukun Jaya, UD','Semen'),
(28,'K28','Al Arafah, TOKO','Tarokan'),
(29,'K29','Barokah, UD','Tarokan'),
(30,'K30','Karya Makmur, UD','Tarokan'),
(31,'K31','Lancar, TOKO','Tarokan'),
(32,'K32','Lestari, UD','Tarokan'),
(33,'K33','Lika Lia, UD','Tarokan'),
(34,'K34','Lumintu, UD','Tarokan'),
(35,'K35','Riski, UD','Tarokan'),
(36,'K36','Riya, TOKO','Tarokan'),
(37,'K37','Rizquina Jaya, TOKO','Tarokan'),
(38,'K38','Sumber Pangan, UD','Tarokan'),
(39,'K39','Tanada Tani, UD','Tarokan'),
(40,'K40','Tani Makmur, TOKO','Tarokan');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

/*Table structure for table `neracaawal` */

DROP TABLE IF EXISTS `neracaawal`;

CREATE TABLE `neracaawal` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kodeakun` varchar(10) DEFAULT NULL,
  `namaakun` varchar(30) DEFAULT NULL,
  `debit` double(20,2) NOT NULL DEFAULT '0.00',
  `kredit` double(20,2) NOT NULL DEFAULT '0.00',
  `tgl` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

/*Data for the table `neracaawal` */

insert  into `neracaawal`(`id`,`kodeakun`,`namaakun`,`debit`,`kredit`,`tgl`) values 
(1,'303','Piutang',1292091648.00,0.00,'2019-05-01'),
(2,'201','Bank BCA',57245892.00,0.00,'2019-05-14'),
(3,'202','Bank Mandiri',24412650.00,0.00,'2019-05-14'),
(4,'503','Persediaan',125452112.00,0.00,'2019-05-14'),
(5,'401','Bangunan',11691500.00,0.00,'2019-05-14'),
(6,'402','Penyusutan Bangunan',11691500.00,0.00,'2019-05-14'),
(7,'403','Peralatan',24139250.00,0.00,'2019-05-14'),
(8,'404','Penyusutan Peralatan',22780084.00,0.00,'2019-05-14'),
(9,'101','Kas',25413476.00,0.00,'2019-05-14'),
(10,'611','Direksi',0.00,19000000.00,'2019-05-14'),
(11,'602','Hutang Pekan Budaya',0.00,22307200.00,'2019-05-14'),
(12,'603','Hutang Demplot',0.00,4000000.00,'2019-05-14'),
(13,'604','Hutang Family Gathering',0.00,42000000.00,'2019-05-14'),
(14,'605','Hutang Sewa Tanah Plemahan',0.00,12000000.00,'2019-05-14'),
(15,'606','Hutang Halal Bihalal',0.00,6500000.00,'2019-05-14'),
(17,'613','Prediksi PPN ',0.00,43051152.00,'2019-05-14'),
(18,'615','Pajak PPN',1512694.00,0.00,'2019-05-14'),
(19,'621','Hutang Kios',0.00,3527280.00,'2019-05-14'),
(20,'601','Hutang Satpam',0.00,1500000.00,'2019-05-14'),
(21,'617','Hutang Audit',0.00,24362800.00,'2019-05-14'),
(22,'301','Modal Dasar',0.00,544819648.00,'2019-05-14'),
(23,'501','Penjualan',0.00,9994372096.00,'2019-05-14'),
(24,'502','Pembelian',8546967552.00,0.00,'2019-05-14'),
(25,'504','HPP',760958784.00,0.00,'2019-05-14'),
(26,'901','Gaji Karyawan',51544952.00,0.00,'2019-05-14'),
(27,'902','Eksploitasi',5755230.00,0.00,'2019-05-14'),
(28,'903','Perjalanan Dinas Luar Kota',8670000.00,0.00,'2019-05-14'),
(29,'904','Perjalanan Dinas Dalam Kota',5102500.00,0.00,'2019-05-14'),
(30,'905','Ongkos Angkut',323000000.00,0.00,'2019-05-14'),
(31,'906','Pengeluaran Kantor',11304244.00,0.00,'2019-05-14'),
(32,'907','Pemeliharaan',19426000.00,0.00,'2019-05-14'),
(33,'908','Bahan Bakar',7770300.00,0.00,'2019-05-14'),
(34,'909','Biaya Konsumsi',3930400.00,0.00,'2019-05-14'),
(35,'910','Lembur',1650000.00,0.00,'2019-05-14'),
(36,'912','Pemasaran',8737500.00,0.00,'2019-05-14'),
(37,'913','Pembinaan',7896000.00,0.00,'2019-05-14'),
(38,'914','Temu Kios',8101000.00,0.00,'2019-05-14'),
(39,'915','Administrasi',138500.00,0.00,'2019-05-14'),
(40,'916','Halal Bihalal',4000000.00,0.00,'2019-05-14'),
(41,'918','Sosialisasi Demplot',6000000.00,0.00,'2019-05-14'),
(42,'920','Biaya Audit',19000000.00,0.00,'2019-05-14'),
(43,'921','Family Gathering',10000000.00,0.00,'2019-05-14'),
(44,'923','Pekan Budaya',2500000.00,0.00,'2019-05-14'),
(45,'925','Sewa Tanah Pemda',2000000.00,0.00,'2019-05-14'),
(46,'927','Lain - Lain',1212000.00,0.00,'2019-05-14'),
(47,'304','Laba / Rugi Tahun..',0.00,175550128.00,'2019-05-14'),
(48,'505','Pot. Ijin',0.00,260760.00,'2019-05-14'),
(49,'506','Bunga Bank',0.00,99759.45,'2019-05-14'),
(50,'607','Prediksi PPN',0.00,43051152.00,'2019-05-14'),
(51,'608','Hutang Audit',0.00,24362800.00,'2019-05-14'),
(52,'609','Hutang Cetak',0.00,0.00,'2019-05-14'),
(53,'616','Hutang Sarpras',0.00,0.00,'2019-05-14'),
(54,'612','Pihak Ketiga',0.00,0.00,'2019-05-14'),
(55,'610','Taksiran Pajak',0.00,0.00,'2019-05-14'),
(56,'614','Hutang Pajak Masa',0.00,0.00,'2019-05-14'),
(57,'619','Hutang Pemasaran',0.00,0.00,'2019-05-14'),
(58,'620','Hutang Potongan Penjualan',0.00,0.00,'2019-05-14'),
(59,'911','PPn',0.00,0.00,'2019-05-14'),
(60,'926','BPJS',2612592.50,0.00,'2019-05-14');

/*Table structure for table `owner` */

DROP TABLE IF EXISTS `owner`;

CREATE TABLE `owner` (
  `username` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `nama` varchar(55) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `owner` */

insert  into `owner`(`username`,`password`,`nama`) values 
('owner','owner','owner ari');

/*Table structure for table `piutang` */

DROP TABLE IF EXISTS `piutang`;

CREATE TABLE `piutang` (
  `idpiutang` int(11) NOT NULL AUTO_INCREMENT,
  `tglfaktur` date DEFAULT NULL,
  `nofaktur` varchar(10) DEFAULT NULL,
  `kios` varchar(20) DEFAULT NULL,
  `ton` int(15) DEFAULT '0',
  `totaluang` int(15) DEFAULT '0',
  `piutang` int(15) DEFAULT '0',
  `sisa` int(15) DEFAULT '0',
  `tunai` int(15) DEFAULT '0',
  `tglbayar` date DEFAULT NULL,
  PRIMARY KEY (`idpiutang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `piutang` */

/*Table structure for table `staffit` */

DROP TABLE IF EXISTS `staffit`;

CREATE TABLE `staffit` (
  `username` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `nama` varchar(55) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `staffit` */

insert  into `staffit`(`username`,`password`,`nama`) values 
('it','it','it');

/*Table structure for table `staffkeuangan` */

DROP TABLE IF EXISTS `staffkeuangan`;

CREATE TABLE `staffkeuangan` (
  `username` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `nama` varchar(55) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `staffkeuangan` */

insert  into `staffkeuangan`(`username`,`password`,`nama`) values 
('pupuk','pupuk','Unit Pupuk');

/*Table structure for table `subkategori` */

DROP TABLE IF EXISTS `subkategori`;

CREATE TABLE `subkategori` (
  `idkategori` int(11) NOT NULL AUTO_INCREMENT,
  `laporan` varchar(50) NOT NULL,
  `kategori` int(11) NOT NULL,
  `idsubkategori` int(5) DEFAULT NULL,
  `subkategori` varchar(50) NOT NULL,
  PRIMARY KEY (`idkategori`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

/*Data for the table `subkategori` */

insert  into `subkategori`(`idkategori`,`laporan`,`kategori`,`idsubkategori`,`subkategori`) values 
(18,'Neraca',1,1,'Kas'),
(22,'Neraca',2,21,'Modal '),
(23,'Laporan Perubahan Ekuitas',8,81,'deviden'),
(24,'Laporan Perubahan Ekuitas',3,31,'Ekuitas'),
(31,'Neraca',1,2,'Bank'),
(32,'Neraca',1,3,'Piutang'),
(33,'Neraca',1,4,'Persediaan'),
(34,'Neraca',1,5,'Bangunan'),
(35,'Neraca',1,6,'Penyusutan Bangunan'),
(36,'Neraca',1,7,'Peralatan'),
(37,'Neraca',1,8,'Penyusutan Peralatan'),
(38,'Laporan Laba Rugi',4,41,'Pendapatan Pupuk'),
(39,'Laporan Laba Rugi',5,51,'Pengeluaran'),
(40,'Neraca',2,9,'Hutang'),
(41,'Laporan Laba Rugi',5,52,'Biaya');

/*Table structure for table `tb_barang` */

DROP TABLE IF EXISTS `tb_barang`;

CREATE TABLE `tb_barang` (
  `kode_barang` varchar(30) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `tgl_input` date NOT NULL,
  `harga_beli` double(10,2) NOT NULL,
  `harga_jual` double(10,2) NOT NULL,
  `kategori_id` char(5) NOT NULL,
  `jml_stok` varchar(20) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  PRIMARY KEY (`kode_barang`),
  KEY `FK_tb_produk_tb_kategori_produk` (`kategori_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_barang` */

insert  into `tb_barang`(`kode_barang`,`nama_barang`,`deskripsi`,`tgl_input`,`harga_beli`,`harga_jual`,`kategori_id`,`jml_stok`,`satuan`) values 
('P01','UREA','','2019-06-01',86591.00,86591.00,'C01','72','TON'),
('P02','ZA','','2019-06-01',66591.00,66591.00,'C01','10','TON'),
('P03','SP36','','2019-06-01',96591.00,96591.00,'C01','1','TON'),
('P04','PHONSKA','','2019-06-01',111591.00,111591.00,'C01','88','TON'),
('P05','PETROGANIK','','2019-06-01',17272.80,17272.80,'C01','170','TON');

/*Table structure for table `tb_detail_pembelian` */

DROP TABLE IF EXISTS `tb_detail_pembelian`;

CREATE TABLE `tb_detail_pembelian` (
  `no_faktur` varchar(30) NOT NULL,
  `kode_barang` varchar(30) NOT NULL,
  `harga_beli` double(10,2) NOT NULL,
  `qty` varchar(10) NOT NULL,
  `petugas` int(11) NOT NULL,
  `timestmp` datetime NOT NULL,
  PRIMARY KEY (`no_faktur`,`kode_barang`),
  KEY `FK_tb_detailbeli_tb_produk` (`kode_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_detail_pembelian` */

insert  into `tb_detail_pembelian`(`no_faktur`,`kode_barang`,`harga_beli`,`qty`,`petugas`,`timestmp`) values 
('3100446789-B385','P01',86591.00,'104',1,'2019-08-14 10:50:16'),
('3100446790-B385','P02',66591.00,'30',1,'2019-08-14 11:02:47'),
('3100446791-B385','P02',66591.00,'50',1,'2019-08-14 11:03:10'),
('3100447220-B385','P04',111591.00,'100',1,'2019-08-14 10:56:10'),
('3100447986-B385','P03',96591.00,'32',1,'2019-08-14 11:06:22'),
('3100448285-B385','P05',17272.80,'100',1,'2019-08-14 11:01:07'),
('3100449107-B385','P02',66591.00,'100',1,'2019-08-14 11:03:38'),
('3100450197-B385','P04',111591.00,'56',1,'2019-08-14 10:56:37'),
('3100450889-B385','P01',86591.00,'56',1,'2019-08-14 10:50:50'),
('3100450893-B385','P04',111591.00,'50',1,'2019-08-14 10:57:05'),
('3100451438-B385','P01',86591.00,'64',1,'2019-08-14 10:51:21'),
('3100451604-B385','P04',111591.00,'40',1,'2019-08-14 10:57:36'),
('3100452344-B385','P01',86591.00,'40',1,'2019-08-14 10:51:52'),
('3100453009-B385','P04',111591.00,'54',1,'2019-08-14 10:57:59'),
('3100453332-B385','P03',96591.00,'20',1,'2019-08-14 11:06:51'),
('3100453582-B385','P02',66591.00,'50',1,'2019-08-14 11:04:17'),
('3100453586-B385','P01',86591.00,'50',1,'2019-08-14 10:52:20'),
('3100454543-B385','P02',66591.00,'50',1,'2019-08-14 11:04:39'),
('3100454709-B385','P05',17272.80,'50',1,'2019-08-14 11:01:31'),
('3100455102-B385','P01',86591.00,'50',1,'2019-08-14 10:52:38'),
('3100456178-B385','P04',111591.00,'70',1,'2019-08-14 10:58:20'),
('3100456463-B385','P02',66591.00,'50',1,'2019-08-14 11:05:15'),
('3100457609-B385','P01',86591.00,'50',1,'2019-08-14 10:52:58'),
('3100457613-B385','P04',111591.00,'38',1,'2019-08-14 10:58:53'),
('3100458965-B385','P01',86591.00,'50',1,'2019-08-14 10:53:22'),
('3100459448-B385','P02',66591.00,'100',1,'2019-08-14 11:05:45'),
('3100459720-B385','P01',86591.00,'40',1,'2019-08-14 10:53:46'),
('3100460016-B385','P04',111591.00,'26',1,'2019-08-14 10:59:33'),
('3100460512-B385','P01',86591.00,'72',1,'2019-08-14 10:54:20'),
('3100460513-B385','P04',111591.00,'56',1,'2019-08-14 10:59:59'),
('3100461064-B385','P05',17272.80,'150',1,'2019-08-14 11:02:05'),
('3100462393-B385','P01',86591.00,'72',1,'2019-08-14 10:34:27'),
('3100462396-B385','P04',111591.00,'32',1,'2019-08-14 10:42:15'),
('3100464541-B385','P02',66591.00,'50',1,'2019-08-14 10:45:59'),
('3100465262-B385','P02',66591.00,'50',1,'2019-08-14 10:46:26'),
('3100465276-B385','P04',111591.00,'72',1,'2019-08-14 10:42:49'),
('3100465441-B385','P01',86591.00,'40',1,'2019-08-14 10:37:49'),
('3100465714-B385','P01',86591.00,'64',1,'2019-08-14 10:38:31'),
('3100465781-B385','P03',96591.00,'20',1,'2019-08-14 10:47:41'),
('3100466785-B385','P04',111591.00,'50',1,'2019-08-14 10:43:46'),
('3100466786-B385','P01',86591.00,'50',1,'2019-08-14 10:38:54'),
('3100468095-B385','P02',66591.00,'50',1,'2019-08-14 10:46:53'),
('3100469540-B385','P01',86591.00,'72',1,'2019-08-14 10:39:41'),
('3100471329-B385','P04',111591.00,'40',1,'2019-08-14 10:44:35'),
('34647635835423','P05',17272.80,'60',1,'2019-08-14 11:31:42');

/*Table structure for table `tb_detail_pembelian_tmp` */

DROP TABLE IF EXISTS `tb_detail_pembelian_tmp`;

CREATE TABLE `tb_detail_pembelian_tmp` (
  `kode_barang` varchar(30) NOT NULL,
  `harga_beli` double(10,2) NOT NULL,
  `qty` varchar(10) NOT NULL,
  `petugas` int(11) NOT NULL,
  `timestmp` datetime NOT NULL,
  PRIMARY KEY (`kode_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_detail_pembelian_tmp` */

/*Table structure for table `tb_detail_penjualan` */

DROP TABLE IF EXISTS `tb_detail_penjualan`;

CREATE TABLE `tb_detail_penjualan` (
  `no_transaksi` varchar(30) NOT NULL,
  `no_do` varchar(30) DEFAULT NULL,
  `kode_barang` varchar(30) NOT NULL,
  `qty` varchar(10) NOT NULL,
  `harga` double(20,2) NOT NULL,
  `disc` double(5,2) NOT NULL,
  `petugas` int(11) NOT NULL,
  `timestmp` datetime NOT NULL,
  PRIMARY KEY (`no_transaksi`,`kode_barang`),
  KEY `FK_tb_detailproduk_tb_produk` (`kode_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_detail_penjualan` */

insert  into `tb_detail_penjualan`(`no_transaksi`,`no_do`,`kode_barang`,`qty`,`harga`,`disc`,`petugas`,`timestmp`) values 
('CA14081900001','','P01','8',86591.00,0.00,1,'2019-08-14 15:23:07'),
('CA14081900001','','P02','8',66591.00,0.00,1,'2019-08-14 15:23:02'),
('CA14081900002','','P01','24',86591.00,0.00,1,'2019-08-14 15:25:25'),
('CA14081900002','','P02','24',66591.00,0.00,1,'2019-08-14 15:25:30'),
('CA14081900002','','P04','24',111591.00,0.00,1,'2019-08-14 15:25:34'),
('CA14081900002','','P05','16',17272.80,0.00,1,'2019-08-14 15:25:36'),
('CA14081900003','','P01','4',86591.00,0.00,1,'2019-08-14 15:36:19'),
('CA14081900003','','P04','4',111591.00,0.00,1,'2019-08-14 15:36:37'),
('CA14081900004','','P01','16',86591.00,0.00,1,'2019-08-14 15:43:36'),
('CA14081900004','','P02','8',66591.00,0.00,1,'2019-08-14 15:43:39'),
('CA14081900004','','P04','16',111591.00,0.00,1,'2019-08-14 15:43:46'),
('CA14081900005','','P01','4',86591.00,0.00,1,'2019-08-14 15:45:17'),
('CA14081900005','','P04','4',111591.00,0.00,1,'2019-08-14 15:45:19'),
('CA14081900006','','P01','12',86591.00,0.00,1,'2019-08-14 15:46:33'),
('CA14081900006','','P04','8',111591.00,0.00,1,'2019-08-14 15:46:36'),
('CA14081900006','','P05','4',17272.80,0.00,1,'2019-08-14 15:46:38'),
('CA14081900007','','P01','8',86591.00,0.00,1,'2019-08-14 15:47:50'),
('CA14081900007','','P02','8',66591.00,0.00,1,'2019-08-14 15:47:52'),
('CA14081900007','','P04','8',111591.00,0.00,1,'2019-08-14 15:47:54'),
('CA14081900007','','P05','8',17272.80,0.00,1,'2019-08-14 15:47:56'),
('CA14081900008','','P01','4',86591.00,0.00,1,'2019-08-14 15:49:01'),
('CA14081900008','','P02','4',66591.00,0.00,1,'2019-08-14 15:49:03'),
('CA14081900008','','P04','4',111591.00,0.00,1,'2019-08-14 15:49:05'),
('CA14081900008','','P05','4',17272.80,0.00,1,'2019-08-14 15:49:09'),
('CA14081900009','','P01','8',86591.00,0.00,1,'2019-08-14 15:50:49'),
('CA14081900009','','P03','1',96591.00,0.00,1,'2019-08-14 15:50:46'),
('CA14081900009','','P04','16',111591.00,0.00,1,'2019-08-14 15:50:44'),
('CA14081900011','','P01','8',86591.00,0.00,1,'2019-08-14 15:54:09'),
('CA14081900011','','P02','8',66591.00,0.00,1,'2019-08-14 15:54:00'),
('CA14081900011','','P04','8',111591.00,0.00,1,'2019-08-14 15:54:28'),
('CA14081900011','','P05','8',17272.80,0.00,1,'2019-08-14 15:53:57'),
('CA14081900012','','P01','24',86591.00,0.00,1,'2019-08-14 15:55:34'),
('CA14081900012','','P02','8',66591.00,0.00,1,'2019-08-14 15:55:32'),
('CA14081900012','','P04','20',111591.00,0.00,1,'2019-08-14 15:55:30'),
('CA14081900013','','P01','16',86591.00,0.00,1,'2019-08-14 16:11:45'),
('CA14081900013','','P02','12',66591.00,0.00,1,'2019-08-14 16:11:47'),
('CA14081900013','','P03','8',96591.00,0.00,1,'2019-08-14 16:12:01'),
('CA14081900013','','P04','16',111591.00,0.00,1,'2019-08-14 16:12:07'),
('CA14081900014','','P01','16',86591.00,0.00,1,'2019-08-14 16:13:47'),
('CA14081900014','','P02','8',66591.00,0.00,1,'2019-08-14 16:13:50'),
('CA14081900014','','P04','8',111591.00,0.00,1,'2019-08-14 16:13:55'),
('CA14081900014','','P05','8',17272.80,0.00,1,'2019-08-14 16:13:10'),
('CA14081900015','','P01','16',86591.00,0.00,1,'2019-08-14 16:15:16'),
('CA14081900015','','P02','16',66591.00,0.00,1,'2019-08-14 16:15:18'),
('CA14081900015','','P03','4',96591.00,0.00,1,'2019-08-14 16:15:20'),
('CA14081900015','','P04','16',111591.00,0.00,1,'2019-08-14 16:15:22'),
('CA14081900015','','P05','8',17272.80,0.00,1,'2019-08-14 16:15:24'),
('CA14081900016','','P01','24',86591.00,0.00,1,'2019-08-14 16:16:45'),
('CA14081900016','','P02','16',66591.00,0.00,1,'2019-08-14 16:16:43'),
('CA14081900016','','P04','24',111591.00,0.00,1,'2019-08-14 16:16:41'),
('CA14081900017','','P01','48',86591.00,0.00,1,'2019-08-14 16:21:08'),
('CA14081900017','','P02','32',66591.00,0.00,1,'2019-08-14 16:21:06'),
('CA14081900017','','P03','8',96591.00,0.00,1,'2019-08-14 16:21:03'),
('CA14081900017','','P04','32',111591.00,0.00,1,'2019-08-14 16:21:01'),
('CA14081900018','','P01','8',86591.00,0.00,1,'2019-08-14 16:23:05'),
('CA14081900018','','P02','16',66591.00,0.00,1,'2019-08-14 16:23:08'),
('CA14081900018','','P04','8',111591.00,0.00,1,'2019-08-14 16:23:11'),
('CA14081900019','','P01','20',86591.00,0.00,1,'2019-08-14 16:38:10'),
('CA14081900019','','P02','16',66591.00,0.00,1,'2019-08-14 16:38:17'),
('CA14081900019','','P04','6',111591.00,0.00,1,'2019-08-14 16:38:29'),
('CA14081900019','','P05','8',17272.80,0.00,1,'2019-08-14 16:38:32'),
('CA14081900020','','P01','16',86591.00,0.00,1,'2019-08-14 16:39:49'),
('CA14081900020','','P02','16',66591.00,0.00,1,'2019-08-14 16:39:51'),
('CA14081900020','','P04','4',111591.00,0.00,1,'2019-08-14 16:39:55'),
('CA14081900021','','P01','2',86591.00,0.00,1,'2019-08-14 16:40:59'),
('CA14081900021','','P02','4',66591.00,0.00,1,'2019-08-14 16:41:02'),
('CA14081900021','','P04','4',111591.00,0.00,1,'2019-08-14 16:41:04'),
('CA14081900022','','P01','32',86591.00,0.00,1,'2019-08-14 16:42:17'),
('CA14081900022','','P02','24',66591.00,0.00,1,'2019-08-14 16:42:15'),
('CA14081900022','','P03','4',96591.00,0.00,1,'2019-08-14 16:42:12'),
('CA14081900022','','P04','16',111591.00,0.00,1,'2019-08-14 16:42:10'),
('CA14081900022','','P05','4',17272.80,0.00,1,'2019-08-14 16:42:08'),
('CA14081900023','','P01','20',86591.00,0.00,1,'2019-08-14 16:44:09'),
('CA14081900023','','P02','8',66591.00,0.00,1,'2019-08-14 16:44:20'),
('CA14081900023','','P04','16',111591.00,0.00,1,'2019-08-14 16:44:33'),
('CA14081900024','','P01','12',86591.00,0.00,1,'2019-08-14 16:45:11'),
('CA14081900024','','P02','8',66591.00,0.00,1,'2019-08-14 16:45:17'),
('CA14081900024','','P04','14',111591.00,0.00,1,'2019-08-14 16:45:26'),
('CA14081900025','','P01','16',86591.00,0.00,1,'2019-08-14 16:46:50'),
('CA14081900025','','P02','8',66591.00,0.00,1,'2019-08-14 16:46:48'),
('CA14081900025','','P04','8',111591.00,0.00,1,'2019-08-14 16:46:32'),
('CA14081900026','','P02','12',66591.00,0.00,1,'2019-08-14 16:48:04'),
('CA14081900026','','P04','8',111591.00,0.00,1,'2019-08-14 16:48:06'),
('CA14081900026','','P05','12',17272.80,0.00,1,'2019-08-14 16:48:08'),
('CA14081900027','','P01','12',86591.00,0.00,1,'2019-08-14 16:50:11'),
('CA14081900027','','P02','16',66591.00,0.00,1,'2019-08-14 16:50:29'),
('CA14081900027','','P04','8',111591.00,0.00,1,'2019-08-14 16:50:21'),
('CA14081900027','','P05','8',17272.80,0.00,1,'2019-08-14 16:50:23'),
('CA14081900028','','P01','12',86591.00,0.00,1,'2019-08-14 16:51:22'),
('CA14081900028','','P02','4',66591.00,0.00,1,'2019-08-14 16:51:44'),
('CA14081900028','','P04','8',111591.00,0.00,1,'2019-08-14 16:51:54'),
('CA14081900029','','P01','8',86591.00,0.00,1,'2019-08-14 16:53:15'),
('CA14081900029','','P02','8',66591.00,0.00,1,'2019-08-14 16:53:18'),
('CA14081900029','','P04','8',111591.00,0.00,1,'2019-08-14 16:53:22'),
('CA14081900029','','P05','4',17272.80,0.00,1,'2019-08-14 16:53:25'),
('CA14081900030','','P01','8',86591.00,0.00,1,'2019-08-14 16:54:08'),
('CA14081900030','','P02','8',66591.00,0.00,1,'2019-08-14 16:54:14'),
('CA14081900030','','P04','8',111591.00,0.00,1,'2019-08-14 16:54:21'),
('CA14081900030','','P05','16',17272.80,0.00,1,'2019-08-14 16:54:37'),
('CA14081900031','','P01','8',86591.00,0.00,1,'2019-08-14 16:55:38'),
('CA14081900031','','P02','8',66591.00,0.00,1,'2019-08-14 16:55:36'),
('CA14081900031','','P03','2',96591.00,0.00,1,'2019-08-14 16:55:34'),
('CA14081900031','','P04','6',111591.00,0.00,1,'2019-08-14 16:55:32'),
('CA14081900032','','P01','4',86591.00,0.00,1,'2019-08-14 16:56:50'),
('CA14081900032','','P02','8',66591.00,0.00,1,'2019-08-14 16:56:55'),
('CA14081900032','','P03','4',96591.00,0.00,1,'2019-08-14 16:58:15'),
('CA14081900032','','P04','8',111591.00,0.00,1,'2019-08-14 16:58:19'),
('CA14081900033','','P01','16',86591.00,0.00,1,'2019-08-14 17:00:34'),
('CA14081900033','','P02','8',66591.00,0.00,1,'2019-08-14 17:00:28'),
('CA14081900033','','P03','4',96591.00,0.00,1,'2019-08-14 17:00:40'),
('CA14081900033','','P04','8',111591.00,0.00,1,'2019-08-14 17:00:46'),
('CA14081900033','','P05','8',17272.80,0.00,1,'2019-08-14 17:00:49'),
('CA14081900034','','P01','24',86591.00,0.00,1,'2019-08-14 17:01:34'),
('CA14081900034','','P02','16',66591.00,0.00,1,'2019-08-14 17:01:39'),
('CA14081900034','','P03','4',96591.00,0.00,1,'2019-08-14 17:01:44'),
('CA14081900034','','P04','16',111591.00,0.00,1,'2019-08-14 17:01:53'),
('CA14081900034','','P05','8',17272.80,0.00,1,'2019-08-14 17:01:57'),
('CA14081900035','','P01','24',86591.00,0.00,1,'2019-08-14 17:03:01'),
('CA14081900035','','P02','12',66591.00,0.00,1,'2019-08-14 17:03:04'),
('CA14081900035','','P03','4',96591.00,0.00,1,'2019-08-14 17:03:10'),
('CA14081900035','','P04','24',111591.00,0.00,1,'2019-08-14 17:03:16'),
('CA14081900036','','P01','24',86591.00,0.00,1,'2019-08-14 17:04:05'),
('CA14081900036','','P02','8',66591.00,0.00,1,'2019-08-14 17:04:12'),
('CA14081900036','','P03','4',96591.00,0.00,1,'2019-08-14 17:04:15'),
('CA14081900036','','P04','12',111591.00,0.00,1,'2019-08-14 17:04:18'),
('CA14081900036','','P05','8',17272.80,0.00,1,'2019-08-14 17:04:22'),
('CA14081900037','','P01','16',86591.00,0.00,1,'2019-08-14 17:05:52'),
('CA14081900037','','P04','8',111591.00,0.00,1,'2019-08-14 17:06:02'),
('CA14081900037','','P05','8',17272.80,0.00,1,'2019-08-14 17:06:07'),
('CA14081900038','','P01','8',86591.00,0.00,1,'2019-08-14 17:07:35'),
('CA14081900038','','P02','16',66591.00,0.00,1,'2019-08-14 17:08:35'),
('CA14081900038','','P04','8',111591.00,0.00,1,'2019-08-14 17:08:45'),
('CA14081900038','','P05','8',17272.80,0.00,1,'2019-08-14 17:08:48'),
('CA14081900039','','P01','12',86591.00,0.00,1,'2019-08-14 17:10:19'),
('CA14081900039','','P02','4',66591.00,0.00,1,'2019-08-14 17:10:35'),
('CA14081900039','','P04','8',111591.00,0.00,1,'2019-08-14 17:10:44'),
('CA14081900040','','P01','8',86591.00,0.00,1,'2019-08-14 17:11:29'),
('CA14081900040','','P02','8',66591.00,0.00,1,'2019-08-14 17:11:36'),
('CA14081900040','','P04','8',111591.00,0.00,1,'2019-08-14 17:11:59'),
('CA14081900040','','P05','8',17272.80,0.00,1,'2019-08-14 17:12:20'),
('CA16061900001','','P01','12',86591.00,0.00,1,'2019-06-16 15:27:07'),
('CA16061900001','','P02','4',66591.00,0.00,1,'2019-06-16 15:27:09'),
('CA16061900001','','P03','4',96591.00,0.00,1,'2019-06-16 15:27:10'),
('CA16061900001','','P04','4',111591.00,0.00,1,'2019-06-16 15:27:12'),
('CA16061900002','','P01','16',86591.00,0.00,1,'2019-06-16 15:28:52'),
('CA16061900002','','P02','8',66591.00,0.00,1,'2019-06-16 15:28:54'),
('CA16061900002','','P04','8',111591.00,0.00,1,'2019-06-16 15:28:56'),
('CA16061900002','','P05','8',17272.80,0.00,1,'2019-06-16 15:28:58'),
('CA16061900003','','P05','8',17272.80,0.00,1,'2019-06-16 15:30:27'),
('CA16061900004','','P01','32',86591.00,0.00,1,'2019-06-16 15:31:42'),
('CA16061900004','','P02','8',66591.00,0.00,1,'2019-06-16 15:31:44'),
('CA16061900004','','P04','16',111591.00,0.00,1,'2019-06-16 15:31:46'),
('CA16061900004','','P05','8',17272.80,0.00,1,'2019-06-16 15:31:48'),
('CA16061900005','','P01','48',86591.00,0.00,1,'2019-06-16 15:33:02'),
('CA16061900005','','P02','24',66591.00,0.00,1,'2019-06-16 15:33:03'),
('CA16061900005','','P04','32',111591.00,0.00,1,'2019-06-16 15:33:05'),
('CA16061900005','','P05','16',17272.80,0.00,1,'2019-06-16 15:33:06'),
('CA16061900006','','P01','8',86591.00,0.00,1,'2019-06-16 15:36:25'),
('CA16061900006','','P04','8',111591.00,0.00,1,'2019-06-16 15:36:28'),
('CA16061900007','','P04','3',111591.00,0.00,1,'2019-06-16 15:37:30'),
('CA16061900008','','P01','5',86591.00,0.00,1,'2019-06-16 15:38:49'),
('CA16061900008','','P04','4',111591.00,0.00,1,'2019-06-16 15:38:53'),
('CA16061900008','','P05','4',17272.80,0.00,1,'2019-06-16 15:38:55'),
('CA16061900009','','P01','4',86591.00,0.00,1,'2019-06-16 15:41:41'),
('CA16061900009','','P02','8',66591.00,0.00,1,'2019-06-16 15:41:42'),
('CA16061900009','','P03','4',96591.00,0.00,1,'2019-06-16 15:41:43'),
('CA16061900009','','P04','12',111591.00,0.00,1,'2019-06-16 15:41:45'),
('CA16061900009','','P05','4',17272.80,0.00,1,'2019-06-16 15:41:46'),
('CA16061900010','','P01','4',86591.00,0.00,1,'2019-06-16 15:43:16'),
('CA16061900010','','P02','4',66591.00,0.00,1,'2019-06-16 15:43:18'),
('CA16061900010','','P04','8',111591.00,0.00,1,'2019-06-16 15:43:20'),
('CA16061900010','','P05','4',17272.80,0.00,1,'2019-06-16 15:43:22'),
('CA16061900011','','P01','4',86591.00,0.00,1,'2019-06-16 15:44:18'),
('CA16061900012','','P02','8',66591.00,0.00,1,'2019-06-16 15:45:32'),
('CA16061900012','','P04','8',111591.00,0.00,1,'2019-06-16 15:45:34'),
('CA16061900013','','P01','8',86591.00,0.00,1,'2019-06-16 15:46:54'),
('CA16061900014','','P01','8',86591.00,0.00,1,'2019-06-16 15:47:59'),
('CA16061900014','','P04','8',111591.00,0.00,1,'2019-06-16 15:48:02'),
('CA16061900015','','P01','8',86591.00,0.00,1,'2019-06-16 15:54:30'),
('CA16061900015','','P02','8',66591.00,0.00,1,'2019-06-16 15:54:23'),
('CA16061900015','','P04','8',111591.00,0.00,1,'2019-06-16 15:54:13'),
('CA16061900015','','P05','8',17272.80,0.00,1,'2019-06-16 15:53:54'),
('CA16061900016','','P01','16',86591.00,0.00,1,'2019-06-16 15:57:05'),
('CA16061900016','','P02','8',66591.00,0.00,1,'2019-06-16 15:57:11'),
('CA16061900016','','P04','8',111591.00,0.00,1,'2019-06-16 15:57:20'),
('CA16061900017','','P02','8',66591.00,0.00,1,'2019-06-16 15:59:18'),
('CA16061900018','','P01','8',86591.00,0.00,1,'2019-06-16 16:00:36'),
('CA16061900018','','P02','4',66591.00,0.00,1,'2019-06-16 16:00:38'),
('CA16061900018','','P04','4',111591.00,0.00,1,'2019-06-16 16:00:40'),
('CA16061900019','','P01','8',86591.00,0.00,1,'2019-06-16 16:03:03'),
('CA16061900019','','P02','4',66591.00,0.00,1,'2019-06-16 16:03:01'),
('CA16061900019','','P04','8',111591.00,0.00,1,'2019-06-16 16:03:30'),
('CA16061900019','','P05','4',17272.80,0.00,1,'2019-06-16 16:03:28'),
('CA16061900020','','P01','8',86591.00,0.00,1,'2019-06-16 16:04:50'),
('CA16061900020','','P02','8',66591.00,0.00,1,'2019-06-16 16:04:48'),
('CA16061900020','','P04','8',111591.00,0.00,1,'2019-06-16 16:04:46'),
('CA16061900021','','P01','8',86591.00,0.00,1,'2019-06-16 16:05:52'),
('CA16061900022','','P01','16',86591.00,0.00,1,'2019-06-16 16:07:41'),
('CA16061900022','','P02','3',66591.00,0.00,1,'2019-06-16 16:08:27'),
('CA16061900022','','P03','2',96591.00,0.00,1,'2019-06-16 16:08:24'),
('CA16061900022','','P04','8',111591.00,0.00,1,'2019-06-16 16:08:16'),
('CA16061900022','','P05','3',17272.80,0.00,1,'2019-06-16 16:08:20'),
('CA16061900023','','P01','8',86591.00,0.00,1,'2019-06-16 16:09:43'),
('CA16061900023','','P04','8',111591.00,0.00,1,'2019-06-16 16:09:45'),
('CA16061900024','','P01','16',86591.00,0.00,1,'2019-06-16 16:11:26'),
('CA16061900024','','P02','8',66591.00,0.00,1,'2019-06-16 16:11:28'),
('CA16061900024','','P04','8',111591.00,0.00,1,'2019-06-16 16:11:29'),
('CA16061900024','','P05','8',17272.80,0.00,1,'2019-06-16 16:11:31'),
('CA16061900025','','P01','4',86591.00,0.00,1,'2019-06-16 16:12:30'),
('CA16061900025','','P02','4',66591.00,0.00,1,'2019-06-16 16:12:59'),
('CA16061900025','','P04','4',111591.00,0.00,1,'2019-06-16 16:12:57'),
('CA16061900025','','P05','4',17272.80,0.00,1,'2019-06-16 16:13:05'),
('CA16061900026','','P01','16',86591.00,0.00,1,'2019-06-16 16:26:08'),
('CA16061900026','','P02','8',66591.00,0.00,1,'2019-06-16 16:25:50'),
('CA16061900026','','P04','8',111591.00,0.00,1,'2019-06-16 16:25:43'),
('CA16061900026','','P05','8',17272.80,0.00,1,'2019-06-16 16:25:38'),
('CA16081900001','','P01','10',86591.00,0.00,1,'2019-08-16 10:54:53'),
('CA16081900001','','P02','8',66591.00,0.00,1,'2019-08-16 10:55:11'),
('CA16081900001','','P04','8',111591.00,0.00,1,'2019-08-16 13:41:34'),
('CA16081900001','','P05','16',17272.80,0.00,1,'2019-08-16 10:56:33'),
('CA16081900002','','P01','10',86591.00,0.00,1,'2019-08-16 13:42:21'),
('CA16081900002','','P02','8',66591.00,0.00,1,'2019-08-16 10:58:47'),
('CA16081900002','','P04','8',111591.00,0.00,1,'2019-08-16 10:59:08'),
('CA16081900003','','P02','6',66591.00,0.00,1,'2019-08-16 10:22:08'),
('CA16081900004','','P01','4',86591.00,0.00,1,'2019-08-16 14:00:44'),
('CA16081900004','','P02','8',66591.00,0.00,1,'2019-08-16 14:00:42'),
('CA16081900004','','P03','4',96591.00,0.00,1,'2019-08-16 14:00:41'),
('CA16081900004','','P04','8',111591.00,0.00,1,'2019-08-16 14:00:39'),
('CA16081900005','','P01','24',86591.00,0.00,1,'2019-08-16 14:07:03'),
('CA16081900005','','P02','12',66591.00,0.00,1,'2019-08-16 14:07:05'),
('CA16081900005','','P03','4',96591.00,0.00,1,'2019-08-16 14:07:06'),
('CA16081900005','','P04','24',111591.00,0.00,1,'2019-08-16 14:07:08'),
('CA16081900005','','P05','8',17272.80,0.00,1,'2019-08-16 14:07:10'),
('CA17051900012','','P02','8',66591.00,0.00,1,'2019-05-17 08:22:33'),
('CA17051900012','','P04','8',111591.00,0.00,1,'2019-05-17 08:22:30'),
('CA17051900013','','P01','10',86591.00,0.00,1,'2019-05-17 08:28:19'),
('CA17051900013','','P02','8',66591.00,0.00,1,'2019-05-17 08:28:17'),
('CA17051900013','','P04','16',111591.00,0.00,1,'2019-05-17 08:28:14'),
('CA17061900001','','P01','4',86591.00,0.00,1,'2019-06-17 06:54:43'),
('CA17061900001','','P04','4',111591.00,0.00,1,'2019-06-17 06:54:45'),
('CA17061900001','','P05','8',17272.80,0.00,1,'2019-06-17 06:54:46'),
('CA17061900002','','P01','4',86591.00,0.00,1,'2019-06-17 06:56:25'),
('CA17061900002','','P04','4',111591.00,0.00,1,'2019-06-17 06:56:23'),
('CA17061900002','','P05','4',17272.80,0.00,1,'2019-06-17 06:56:21'),
('CA17061900003','','P01','8',86591.00,0.00,1,'2019-06-17 06:57:16'),
('CA17061900004','','P01','8',86591.00,0.00,1,'2019-06-17 06:58:33'),
('CA17061900004','','P04','4',111591.00,0.00,1,'2019-06-17 06:58:36'),
('CA17061900004','','P05','4',17272.80,0.00,1,'2019-06-17 06:58:37'),
('CA17061900005','','P01','8',86591.00,0.00,1,'2019-06-17 06:59:46'),
('CA17061900005','','P02','8',66591.00,0.00,1,'2019-06-17 06:59:47'),
('CA17061900005','','P04','4',111591.00,0.00,1,'2019-06-17 07:00:04'),
('CA17061900005','','P05','8',17272.80,0.00,1,'2019-06-17 07:00:06'),
('CA17061900006','','P01','8',86591.00,0.00,1,'2019-06-17 07:24:22'),
('CA17061900006','','P02','8',66591.00,0.00,1,'2019-06-17 07:24:23'),
('CA17061900006','','P04','8',111591.00,0.00,1,'2019-06-17 07:24:25'),
('CA17061900006','','P05','8',17272.80,0.00,1,'2019-06-17 07:24:26'),
('CA17061900007','','P01','24',86591.00,0.00,1,'2019-06-17 07:25:36'),
('CA17061900007','','P02','8',66591.00,0.00,1,'2019-06-17 07:25:37'),
('CA17061900007','','P04','8',111591.00,0.00,1,'2019-06-17 07:25:38'),
('CA17061900007','','P05','8',17272.80,0.00,1,'2019-06-17 07:25:39'),
('CA17061900008','','P02','4',66591.00,0.00,1,'2019-06-17 07:27:07'),
('CA17061900008','','P04','8',111591.00,0.00,1,'2019-06-17 07:27:11'),
('CA17061900008','','P05','4',17272.80,0.00,1,'2019-06-17 07:27:12'),
('CA17061900009','','P01','8',86591.00,0.00,1,'2019-06-17 07:28:24'),
('CA17061900010','','P01','8',86591.00,0.00,1,'2019-06-17 07:29:53'),
('CA17061900010','','P02','4',66591.00,0.00,1,'2019-06-17 07:29:55'),
('CA17061900010','','P04','4',111591.00,0.00,1,'2019-06-17 07:29:56'),
('CA17061900011','','P01','12',86591.00,0.00,1,'2019-06-17 08:09:47'),
('CA17061900011','','P02','4',66591.00,0.00,1,'2019-06-17 08:09:48'),
('CA17061900011','','P04','8',111591.00,0.00,1,'2019-06-17 08:09:49'),
('CA17061900011','','P05','4',17272.80,0.00,1,'2019-06-17 08:09:50');

/*Table structure for table `tb_detail_penjualan_tmp` */

DROP TABLE IF EXISTS `tb_detail_penjualan_tmp`;

CREATE TABLE `tb_detail_penjualan_tmp` (
  `kode_barang` varchar(50) NOT NULL,
  `no_do` varchar(30) NOT NULL,
  `harga` double(20,2) NOT NULL,
  `disc` double(10,2) NOT NULL,
  `qty` varchar(10) NOT NULL,
  `petugas` int(11) NOT NULL,
  `timestmp` datetime NOT NULL,
  PRIMARY KEY (`petugas`,`kode_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_detail_penjualan_tmp` */

insert  into `tb_detail_penjualan_tmp`(`kode_barang`,`no_do`,`harga`,`disc`,`qty`,`petugas`,`timestmp`) values 
('P05','',17272.80,0.00,'2',1,'2019-08-31 12:19:21');

/*Table structure for table `tb_kategori_barang` */

DROP TABLE IF EXISTS `tb_kategori_barang`;

CREATE TABLE `tb_kategori_barang` (
  `kategori_id` char(5) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_kategori_barang` */

insert  into `tb_kategori_barang`(`kategori_id`,`nama_kategori`) values 
('C01','SUBSIDI'),
('C02','NON-SUBSIDI');

/*Table structure for table `tb_log` */

DROP TABLE IF EXISTS `tb_log`;

CREATE TABLE `tb_log` (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `deskripsi` text NOT NULL,
  `timestmp` datetime NOT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=InnoDB AUTO_INCREMENT=222 DEFAULT CHARSET=latin1;

/*Data for the table `tb_log` */

insert  into `tb_log`(`id_log`,`deskripsi`,`timestmp`) values 
(26,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA03081600001','2016-08-03 21:07:25'),
(27,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA03081600002','2016-08-03 21:13:24'),
(28,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA04081600001','2016-08-04 13:33:06'),
(29,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA04081600001','2016-08-04 13:34:36'),
(30,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA24111600001','2016-11-24 22:04:59'),
(31,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA24111600002','2016-11-24 22:33:42'),
(32,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA25111600001','2016-11-25 21:17:44'),
(33,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA25111600002','2016-11-25 22:09:47'),
(34,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA25111600003','2016-11-25 22:26:49'),
(35,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA25111600003','2016-11-25 22:30:21'),
(36,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA25111600003','2016-11-25 22:34:45'),
(37,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA26111600001','2016-11-26 08:30:50'),
(38,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA27111600001','2016-11-27 13:34:28'),
(39,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA28111600001','2016-11-28 10:22:11'),
(40,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA28111600002','2016-11-28 11:14:44'),
(41,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA28111600003','2016-11-28 11:19:06'),
(42,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA28111600004','2016-11-28 11:25:55'),
(43,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA28111600003','2016-11-29 08:50:37'),
(44,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA28111600001','2016-11-29 08:50:47'),
(45,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA29111600001','2016-11-29 08:53:50'),
(46,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA29111600002','2016-11-29 09:13:38'),
(47,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA29111600003','2016-11-29 10:11:30'),
(48,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA27111600001','2016-12-03 07:00:05'),
(49,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA25111600002','2016-12-03 07:00:15'),
(50,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA24111600001','2016-12-03 07:00:22'),
(51,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA26111600001','2016-12-03 07:00:45'),
(52,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA24111600002','2016-12-03 07:00:59'),
(53,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA03081600001','2016-12-03 07:01:07'),
(54,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA03081600002','2016-12-03 07:01:14'),
(55,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA25111600003','2016-12-03 07:01:27'),
(56,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA03121600001','2016-12-03 07:13:59'),
(57,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA25111600001','2016-12-03 07:16:27'),
(58,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA28111600002','2016-12-03 07:16:36'),
(59,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA02071900001','2019-07-02 05:50:33'),
(60,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA02071900002','2019-07-02 05:55:08'),
(61,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA02071900003','2019-07-02 16:05:32'),
(62,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA03071900001','2019-07-03 13:19:06'),
(63,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA03071900002','2019-07-03 14:19:48'),
(64,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA28111600004','2019-07-03 14:23:11'),
(65,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA29111600001','2019-07-03 14:23:17'),
(66,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA29111600002','2019-07-03 14:23:19'),
(67,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA29111600003','2019-07-03 14:23:22'),
(68,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA03121600001','2019-07-03 14:23:24'),
(69,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA02071900001','2019-07-03 14:23:30'),
(70,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA02071900002','2019-07-03 14:23:34'),
(71,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA02071900003','2019-07-03 14:23:36'),
(72,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA03071900001','2019-07-05 09:09:03'),
(73,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA03071900002','2019-07-05 09:09:03'),
(74,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA05071900001','2019-07-05 09:15:41'),
(75,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA05071900001','2019-07-05 15:09:42'),
(76,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA05071900001','2019-07-05 15:29:42'),
(77,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA08071900001','2019-07-08 14:40:00'),
(78,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA08071900002','2019-07-08 14:50:18'),
(79,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA05071900001','2019-07-08 14:56:00'),
(80,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA08071900001','2019-07-08 14:56:02'),
(81,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA08071900002','2019-07-08 14:56:05'),
(82,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA08071900001','2019-07-08 15:02:29'),
(83,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA08071900002','2019-07-08 15:15:37'),
(84,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA08071900003','2019-07-08 15:27:18'),
(85,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA08071900004','2019-07-08 15:31:35'),
(86,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA12071900001','2019-07-12 08:53:43'),
(87,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA18071900001','2019-07-18 13:53:48'),
(88,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA18071900002','2019-07-18 14:54:07'),
(89,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA18071900003','2019-07-18 15:01:42'),
(90,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA18071900004','2019-07-18 15:06:14'),
(91,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA18071900005','2019-07-18 15:10:19'),
(92,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA22071900001','2019-07-22 10:17:34'),
(93,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA22071900002','2019-07-22 12:48:08'),
(94,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA08071900001','2019-08-12 14:18:38'),
(95,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA08071900002','2019-08-12 14:18:38'),
(96,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA08071900003','2019-08-12 14:18:38'),
(97,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA08071900004','2019-08-12 14:18:38'),
(98,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA12071900001','2019-08-12 14:18:38'),
(99,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA18071900001','2019-08-12 14:18:38'),
(100,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA18071900002','2019-08-12 14:18:38'),
(101,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA18071900003','2019-08-12 14:18:38'),
(102,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA18071900004','2019-08-12 14:18:38'),
(103,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA18071900005','2019-08-12 14:18:38'),
(104,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA22071900001','2019-08-12 14:18:38'),
(105,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA22071900002','2019-08-12 14:18:38'),
(106,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA12081900001','2019-08-12 14:27:24'),
(107,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA12081900002','2019-08-12 14:29:10'),
(108,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA12081900003','2019-08-12 14:43:07'),
(109,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA12081900004','2019-08-12 14:47:28'),
(110,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA12081900003','2019-08-12 14:48:09'),
(111,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA12081900001','2019-08-12 14:48:12'),
(112,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA12081900002','2019-08-12 14:48:15'),
(113,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA13081900001','2019-08-13 05:35:52'),
(114,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA12081900004','2019-08-13 12:44:16'),
(115,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA13081900001','2019-08-13 12:44:16'),
(116,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA13081900001','2019-08-13 14:00:50'),
(117,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA13081900001','2019-08-13 14:06:38'),
(118,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA14081900001','2019-08-14 14:22:18'),
(119,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA14081900001','2019-08-14 15:23:36'),
(120,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA14081900002','2019-08-14 15:25:59'),
(121,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA14081900003','2019-08-14 15:37:05'),
(122,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA14081900004','2019-08-14 15:44:15'),
(123,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA14081900005','2019-08-14 15:45:33'),
(124,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA14081900006','2019-08-14 15:46:56'),
(125,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA14081900007','2019-08-14 15:48:18'),
(126,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA14081900008','2019-08-14 15:49:29'),
(127,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA14081900009','2019-08-14 15:51:05'),
(128,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA14081900010','2019-08-14 15:52:17'),
(129,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA14081900011','2019-08-14 15:54:45'),
(130,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA14081900012','2019-08-14 15:56:27'),
(131,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA14081900013','2019-08-14 16:12:32'),
(132,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA14081900014','2019-08-14 16:14:15'),
(133,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA14081900015','2019-08-14 16:15:43'),
(134,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA14081900016','2019-08-14 16:17:00'),
(135,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA14081900017','2019-08-14 16:21:24'),
(136,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA14081900018','2019-08-14 16:23:56'),
(137,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA14081900019','2019-08-14 16:39:03'),
(138,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA14081900020','2019-08-14 16:40:15'),
(139,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA14081900021','2019-08-14 16:41:19'),
(140,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA14081900022','2019-08-14 16:42:33'),
(141,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA14081900023','2019-08-14 16:44:51'),
(142,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA14081900024','2019-08-14 16:45:58'),
(143,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA14081900025','2019-08-14 16:47:04'),
(144,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA14081900026','2019-08-14 16:48:51'),
(145,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA14081900027','2019-08-14 16:50:49'),
(146,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA14081900028','2019-08-14 16:52:20'),
(147,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA14081900029','2019-08-14 16:53:42'),
(148,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA14081900030','2019-08-14 16:54:55'),
(149,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA14081900031','2019-08-14 16:55:54'),
(150,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA14081900032','2019-08-14 16:59:09'),
(151,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA14081900033','2019-08-14 17:01:02'),
(152,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA14081900034','2019-08-14 17:02:09'),
(153,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA14081900035','2019-08-14 17:03:43'),
(154,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA14081900036','2019-08-14 17:04:38'),
(155,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA14081900037','2019-08-14 17:06:30'),
(156,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA14081900038','2019-08-14 17:09:10'),
(157,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA14081900039','2019-08-14 17:11:03'),
(158,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA14081900040','2019-08-14 17:12:50'),
(159,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA14081900010','2019-08-14 17:38:08'),
(160,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA16081900001','2019-08-16 10:15:18'),
(161,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA16081900001','2019-08-16 10:16:08'),
(162,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA16081900001','2019-08-16 10:16:55'),
(163,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA16081900002','2019-08-16 10:21:05'),
(164,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA16081900001','2019-08-16 10:21:27'),
(165,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA16081900003','2019-08-16 10:22:25'),
(166,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA16081900002','2019-08-16 10:53:03'),
(167,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA16081900003','2019-08-16 10:53:03'),
(168,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA14081900023','2019-08-16 10:54:42'),
(169,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA16081900001','2019-08-16 10:57:14'),
(170,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA16081900002','2019-08-16 10:59:52'),
(171,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA16081900001','2019-08-16 13:39:09'),
(172,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA14081900006','2019-08-16 13:39:47'),
(173,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA14081900032','2019-08-16 13:40:17'),
(174,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA14081900035','2019-08-16 13:40:30'),
(175,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA16081900001','2019-08-16 13:41:53'),
(176,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA16081900002','2019-08-16 13:47:34'),
(177,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA16081900004','2019-08-16 14:05:14'),
(178,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA16081900005','2019-08-16 14:07:34'),
(179,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA16061900001','2019-06-16 15:27:45'),
(180,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA16061900002','2019-06-16 15:29:19'),
(181,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA16061900003','2019-06-16 15:30:45'),
(182,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA16061900004','2019-06-16 15:32:03'),
(183,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA16061900005','2019-06-16 15:33:23'),
(184,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA16061900006','2019-06-16 15:36:42'),
(185,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA16061900007','2019-06-16 15:37:46'),
(186,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA16061900008','2019-06-16 15:39:12'),
(187,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA16061900009','2019-06-16 15:42:04'),
(188,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA16061900010','2019-06-16 15:43:36'),
(189,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA16061900011','2019-06-16 15:44:35'),
(190,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA16061900012','2019-06-16 15:45:50'),
(191,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA16061900013','2019-06-16 15:47:08'),
(192,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA16061900014','2019-06-16 15:48:16'),
(193,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA16061900015','2019-06-16 15:55:02'),
(194,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA16061900016','2019-06-16 15:57:55'),
(195,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA16061900017','2019-06-16 15:59:57'),
(196,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA16061900018','2019-06-16 16:01:02'),
(197,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA16061900019','2019-06-16 16:03:56'),
(198,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA16061900020','2019-06-16 16:05:06'),
(199,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA16061900021','2019-06-16 16:06:13'),
(200,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA16061900022','2019-06-16 16:09:00'),
(201,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA16061900023','2019-06-16 16:10:02'),
(202,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA16061900024','2019-06-16 16:11:46'),
(203,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA16061900025','2019-06-16 16:13:19'),
(204,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA16061900016','2019-06-16 16:25:22'),
(205,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA16061900026','2019-06-16 16:26:27'),
(206,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA17061900001','2019-06-17 06:55:05'),
(207,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA17061900002','2019-06-17 06:56:38'),
(208,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA17061900003','2019-06-17 06:57:39'),
(209,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA17061900004','2019-06-17 06:58:52'),
(210,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA17061900005','2019-06-17 07:00:22'),
(211,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA17061900006','2019-06-17 07:24:39'),
(212,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA17061900007','2019-06-17 07:25:58'),
(213,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA17061900008','2019-06-17 07:27:33'),
(214,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA17061900009','2019-06-17 07:28:36'),
(215,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA17061900010','2019-06-17 07:30:07'),
(216,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA16081900001','2019-06-17 08:08:54'),
(217,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA17061900011','2019-06-17 08:10:06'),
(218,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA16081900003','2019-05-17 08:20:53'),
(219,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA17051900012','2019-05-17 08:22:42'),
(220,'<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA16081900002','2019-05-17 08:27:56'),
(221,'<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA17051900013','2019-05-17 08:28:33');

/*Table structure for table `tb_menu` */

DROP TABLE IF EXISTS `tb_menu`;

CREATE TABLE `tb_menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(50) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tb_menu` */

insert  into `tb_menu`(`id_menu`,`nama_menu`,`posisi`) values 
(1,'Master',1),
(2,'Transaksi',2),
(3,'Laporan',3);

/*Table structure for table `tb_modul` */

DROP TABLE IF EXISTS `tb_modul`;

CREATE TABLE `tb_modul` (
  `id_modul` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` int(11) NOT NULL,
  `nama_modul` varchar(150) NOT NULL,
  `link_menu` text NOT NULL,
  `posisi` int(11) NOT NULL,
  `icon_menu` varchar(150) NOT NULL,
  PRIMARY KEY (`id_modul`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `tb_modul` */

insert  into `tb_modul`(`id_modul`,`id_menu`,`nama_modul`,`link_menu`,`posisi`,`icon_menu`) values 
(6,1,'Kategori Pupuk','med.php?mod=kategori',1,'fa fa-folder-open'),
(7,1,'Data Pupuk','med.php?mod=barang',2,'fa fa-cubes'),
(8,1,'Data Kios','med.php?mod=pelanggan',3,'fa fa-building'),
(9,1,'Data Supplier','med.php?mod=supplier',4,'fa fa-truck'),
(11,2,'Data Transaksi Penjualan','med.php?mod=penjualan&act=list',2,'fa fa-book'),
(12,2,'Data Transaksi Pembelian','med.php?mod=pembelian',3,'fa fa-calculator'),
(13,3,'Laporan Stok Barang','med.php?mod=laporan&act=stokbarang',1,'fa fa-line-chart'),
(17,8,'Retur Penjualan','med.php?mod=returpenjualan',1,'fa fa-cart-arrow-down'),
(18,8,'Retur Pembelian','med.php?mod=returpembelian',2,'fa fa-cart-arrow-down');

/*Table structure for table `tb_pembelian` */

DROP TABLE IF EXISTS `tb_pembelian`;

CREATE TABLE `tb_pembelian` (
  `no_faktur` varchar(30) NOT NULL,
  `kode_supplier` varchar(10) NOT NULL,
  `nama_toko` varchar(50) NOT NULL,
  `tgl_beli` date NOT NULL,
  `nama_kasir` varchar(50) NOT NULL,
  `petugas` int(11) NOT NULL,
  `timestmp` datetime NOT NULL,
  PRIMARY KEY (`no_faktur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_pembelian` */

insert  into `tb_pembelian`(`no_faktur`,`kode_supplier`,`nama_toko`,`tgl_beli`,`nama_kasir`,`petugas`,`timestmp`) values 
('3100446789-B385','S01','Petrokimia Gresik','2019-05-01','admin',1,'2019-08-14 10:50:16'),
('3100446790-B385','S01','Petrokimia Gresik','2019-05-01','admin',1,'2019-08-14 11:02:47'),
('3100446791-B385','S01','Petrokimia Gresik','2019-05-01','admin',1,'2019-08-14 11:03:10'),
('3100447220-B385','S01','Petrokimia Gresik','2019-05-02','admin',1,'2019-08-14 10:56:09'),
('3100447986-B385','S01','Petrokimia Gresik','2019-05-03','admin',1,'2019-08-14 11:06:22'),
('3100448285-B385','S01','Petrokimia Gresik','2019-05-04','admin',1,'2019-08-14 11:01:07'),
('3100449107-B385','S01','Petrokimia Gresik','2019-05-06','admin',1,'2019-08-14 11:03:38'),
('3100450197-B385','S01','Petrokimia Gresik','2019-05-08','admin',1,'2019-08-14 10:56:37'),
('3100450889-B385','S01','Petrokimia Gresik','2019-05-08','admin',1,'2019-08-14 10:50:50'),
('3100450893-B385','S01','Petrokimia Gresik','2019-05-08','admin',1,'2019-08-14 10:57:05'),
('3100451438-B385','S01','Petrokimia Gresik','2019-05-09','admin',1,'2019-08-14 10:51:21'),
('3100451604-B385','S01','Petrokimia Gresik','2019-05-09','admin',1,'2019-08-14 10:57:36'),
('3100452344-B385','S01','Petrokimia Gresik','2019-05-10','admin',1,'2019-08-14 10:51:52'),
('3100453009-B385','S01','Petrokimia Gresik','2019-05-13','admin',1,'2019-08-14 10:57:59'),
('3100453332-B385','S01','Petrokimia Gresik','2019-05-13','admin',1,'2019-08-14 11:06:51'),
('3100453582-B385','S01','Petrokimia Gresik','2019-05-13','admin',1,'2019-08-14 11:04:17'),
('3100453586-B385','S01','Petrokimia Gresik','2019-05-13','admin',1,'2019-08-14 10:52:20'),
('3100454543-B385','S01','Petrokimia Gresik','2019-05-14','admin',1,'2019-08-14 11:04:39'),
('3100454709-B385','S01','Petrokimia Gresik','2019-05-15','admin',1,'2019-08-14 11:01:31'),
('3100455102-B385','S01','Petrokimia Gresik','2019-05-15','admin',1,'2019-08-14 10:52:38'),
('3100456178-B385','S01','Petrokimia Gresik','2019-05-17','admin',1,'2019-08-14 10:58:20'),
('3100456463-B385','S01','Petrokimia Gresik','2019-05-17','admin',1,'2019-08-14 11:05:15'),
('3100457609-B385','S01','Petrokimia Gresik','2019-05-20','admin',1,'2019-08-14 10:52:58'),
('3100457613-B385','S01','Petrokimia Gresik','2019-05-20','admin',1,'2019-08-14 10:58:53'),
('3100458965-B385','S01','Petrokimia Gresik','2019-05-22','admin',1,'2019-08-14 10:53:22'),
('3100459448-B385','S01','Petrokimia Gresik','2019-05-23','admin',1,'2019-08-14 11:05:45'),
('3100459720-B385','S01','Petrokimia Gresik','2019-05-24','admin',1,'2019-08-14 10:53:45'),
('3100460016-B385','S01','Petrokimia Gresik','2019-05-24','admin',1,'2019-08-14 10:59:33'),
('3100460512-B385','S01','Petrokimia Gresik','2019-05-27','admin',1,'2019-08-14 10:54:19'),
('3100460513-B385','S01','Petrokimia Gresik','2019-05-27','admin',1,'2019-08-14 10:59:59'),
('3100461064-B385','S01','Petrokimia Gresik','2019-05-30','admin',1,'2019-08-14 11:02:05'),
('3100462393-B385','S01','Petrokimia Gresik','2019-06-11','admin',1,'2019-08-14 10:34:27'),
('3100462396-B385','S01','Petrokimia Gresik','2019-06-11','admin',1,'2019-08-14 10:42:15'),
('3100464541-B385','S01','Petrokimia Gresik','2019-06-15','admin',1,'2019-08-14 10:45:59'),
('3100465262-B385','S01','Petrokimia Gresik','2019-06-17','admin',1,'2019-08-14 10:46:26'),
('3100465276-B385','S01','Petrokimia Gresik','2019-06-17','admin',1,'2019-08-14 10:42:49'),
('3100465441-B385','S01','Petrokimia Gresik','2019-06-17','admin',1,'2019-08-14 10:37:49'),
('3100465714-B385','S01','Petrokimia Gresik','2019-06-18','admin',1,'2019-08-14 10:38:31'),
('3100465781-B385','S01','Petrokimia Gresik','2019-06-18','admin',1,'2019-08-14 10:47:41'),
('3100466785-B385','S01','Petrokimia Gresik','2019-06-19','admin',1,'2019-08-14 10:43:45'),
('3100466786-B385','S01','Petrokimia Gresik','2019-06-19','admin',1,'2019-08-14 10:38:54'),
('3100468095-B385','S01','Petrokimia Gresik','2019-06-21','admin',1,'2019-08-14 10:46:53'),
('3100469540-B385','S01','Petrokimia Gresik','2019-06-25','admin',1,'2019-08-14 10:39:41'),
('3100471329-B385','S01','Petrokimia Gresik','2019-06-29','admin',1,'2019-08-14 10:44:35');

/*Table structure for table `tb_penjualan` */

DROP TABLE IF EXISTS `tb_penjualan`;

CREATE TABLE `tb_penjualan` (
  `no_transaksi` varchar(30) NOT NULL,
  `kode_pelanggan` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `petugas` int(11) NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `bayar` double(20,2) DEFAULT NULL,
  `potongan` double(10,2) NOT NULL,
  `timestmp` datetime NOT NULL,
  PRIMARY KEY (`no_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_penjualan` */

insert  into `tb_penjualan`(`no_transaksi`,`kode_pelanggan`,`nama_pelanggan`,`tgl_transaksi`,`petugas`,`status`,`bayar`,`potongan`,`timestmp`) values 
('CA14081900001','K01','Adam, UD','2019-05-14',1,'LUNAS',24509120.00,0.00,'2019-08-14 15:23:36'),
('CA14081900002','K02','Amin Tani, TOKO','2019-05-14',1,'LUNAS',132618335.99,0.00,'2019-08-14 15:25:59'),
('CA14081900003','K03','Barik Rizqi, UD','2019-05-14',1,'LUNAS',15854560.00,0.00,'2019-08-14 15:37:05'),
('CA14081900004','K04','Berkah Tani, UD, Sun','2019-05-14',1,'LUNAS',74072800.00,0.00,'2019-08-14 15:44:15'),
('CA14081900005','K05','Puspito, TOKO','2019-05-14',1,'LUNAS',15854560.00,0.00,'2019-08-14 15:45:33'),
('CA14081900007','K07','Sempulur, KIOS','2019-05-14',1,'LUNAS',45127328.00,0.00,'2019-08-14 15:48:18'),
('CA14081900008','K08','Sidodadi, UD','2019-05-14',1,'LUNAS',22563664.00,0.00,'2019-08-14 15:49:29'),
('CA14081900009','K09','Suka Subur, UD','2019-05-14',1,'LUNAS',51495500.00,0.00,'2019-08-14 15:51:05'),
('CA14081900011','K11','Suroto, UD','2019-05-14',1,'LUNAS',45127328.00,0.00,'2019-08-14 15:54:45'),
('CA14081900012','K12','Usaha Tani, UD','2019-05-14',1,'LUNAS',96854640.00,0.00,'2019-08-14 15:56:27'),
('CA14081900013','K13','Berkah Tani, UD, Rin','2019-05-14',1,'LUNAS',94854640.00,0.00,'2019-08-14 16:12:32'),
('CA14081900014','K14','Kuning,  TOKO','2019-05-14',1,'LUNAS',58981888.00,0.00,'2019-08-14 16:14:15'),
('CA14081900015','K15','Lestari, UD','2019-05-14',1,'LUNAS',95218288.00,0.00,'2019-08-14 16:15:43'),
('CA14081900016','K16','Margodadi, UD','2019-05-14',1,'LUNAS',116436480.00,0.00,'2019-08-14 16:17:00'),
('CA14081900017','K17','Sumber Tani, TOKO','2019-05-14',1,'LUNAS',212618400.00,0.00,'2019-08-14 16:21:24'),
('CA14081900018','K18','Adam, TOKO','2019-05-14',1,'LUNAS',53018240.00,0.00,'2019-08-14 16:23:56'),
('CA14081900019','K19','Eka Jaya, UD','2019-05-14',1,'LUNAS',72100088.00,0.00,'2019-08-14 16:39:03'),
('CA14081900020','K20','Kanti Makmur, UD','2019-05-14',1,'LUNAS',57945520.00,0.00,'2019-08-14 16:40:15'),
('CA14081900021','K21','Kencana, UD','2019-05-14',1,'LUNAS',17718200.00,0.00,'2019-08-14 16:41:19'),
('CA14081900022','K22','Lancar Agro Mandiri,','2019-05-14',1,'LUNAS',132200144.00,0.00,'2019-08-14 16:42:33'),
('CA14081900024','K24','Mitra Sejahtera, UD','2019-05-14',1,'LUNAS',62681880.00,0.00,'2019-08-14 16:45:58'),
('CA14081900025','K25','Surya Alam, UD','2019-05-14',1,'LUNAS',56218240.00,0.00,'2019-08-14 16:47:04'),
('CA14081900026','K26','Tani Makmur, UD','2019-05-14',1,'LUNAS',37981872.00,0.00,'2019-08-14 16:48:51'),
('CA14081900027','K27','Tani Rukun Jaya, UD','2019-05-14',1,'LUNAS',62709168.00,0.00,'2019-08-14 16:50:49'),
('CA14081900028','K28','Al Arafah, TOKO','2019-05-14',1,'LUNAS',43963680.00,0.00,'2019-08-14 16:52:20'),
('CA14081900029','K29','Barokah, UD','2019-05-14',1,'LUNAS',43745504.00,0.00,'2019-08-14 16:53:42'),
('CA14081900030','K30','Karya Makmur, UD','2019-05-14',1,'LUNAS',47890976.00,0.00,'2019-08-14 16:54:55'),
('CA14081900031','K31','Lancar, TOKO','2019-05-14',1,'LUNAS',41763680.00,0.00,'2019-08-14 16:55:54'),
('CA14081900033','K33','Lika Lia, UD','2019-05-14',1,'LUNAS',66709168.00,0.00,'2019-08-14 17:01:02'),
('CA14081900034','K34','Lumintu, UD','2019-05-14',1,'LUNAS',109072848.00,0.00,'2019-08-14 17:02:09'),
('CA14081900036','K36','Riya, TOKO','2019-05-14',1,'LUNAS',89491008.00,0.00,'2019-08-14 17:04:38'),
('CA14081900037','K37','Rizquina Jaya, TOKO','2019-05-14',1,'LUNAS',48327328.00,0.00,'2019-08-14 17:06:30'),
('CA14081900038','K38','Sumber Pangan, UD','2019-05-14',1,'LUNAS',55781888.00,0.00,'2019-08-14 17:09:10'),
('CA14081900039','K39','Tanada Tani, UD','2019-05-14',1,'LUNAS',43963680.00,0.00,'2019-08-14 17:11:03'),
('CA14081900040','K40','Tani Makmur, TOKO','2019-05-14',1,'LUNAS',45127328.00,0.00,'2019-08-14 17:12:50'),
('CA16061900001','K13','Berkah Tani, UD, Rin','2019-06-16',1,'LUNAS',42763680.00,0.00,'2019-06-16 15:27:45'),
('CA16061900002','K14','Kuning,  TOKO','2019-06-16',1,'LUNAS',58981888.00,0.00,'2019-06-16 15:29:19'),
('CA16061900003','K15','Lestari, UD','2019-06-16',1,'LUNAS',2763648.00,0.00,'2019-06-16 15:30:45'),
('CA16061900004','K16','Margodadi, UD','2019-06-16',1,'LUNAS',104545568.00,0.00,'2019-06-16 15:32:03'),
('CA16061900005','K17','Sumber Tani, TOKO','2019-06-16',1,'LUNAS',192036576.00,0.00,'2019-06-16 15:33:23'),
('CA16061900006','K18','Adam, TOKO','2019-06-16',1,'LUNAS',31709120.00,0.00,'2019-06-16 15:36:42'),
('CA16061900007','K19','Eka Jaya, UD','2019-06-16',1,'LUNAS',6695460.00,0.00,'2019-06-16 15:37:46'),
('CA16061900008','K20','Kanti Makmur, UD','2019-06-16',1,'LUNAS',18968204.00,0.00,'2019-06-16 15:39:12'),
('CA16061900009','K22','Lancar Agro Mandiri,','2019-06-16',1,'LUNAS',53472784.00,0.00,'2019-06-16 15:42:04'),
('CA16061900010','K23','Manunggal Sejati, UD','2019-06-16',1,'LUNAS',31490944.00,0.00,'2019-06-16 15:43:36'),
('CA16061900011','K24','Mitra Sejahtera, UD','2019-06-16',1,'LUNAS',6927280.00,0.00,'2019-06-16 15:44:35'),
('CA16061900012','K25','Surya Alam, UD','2019-06-16',1,'LUNAS',28509120.00,0.00,'2019-06-16 15:45:50'),
('CA16061900013','K26','Tani Makmur, UD','2019-06-16',1,'LUNAS',13854560.00,0.00,'2019-06-16 15:47:08'),
('CA16061900014','K27','Tani Rukun Jaya, UD','2019-06-16',1,'LUNAS',49563680.00,0.00,'2019-06-16 15:48:16'),
('CA16061900015','K01','Adam, UD','2019-06-16',1,'LUNAS',45127328.00,0.00,'2019-06-16 15:55:02'),
('CA16061900017','K04','Berkah Tani, UD, Sun','2019-06-16',1,'LUNAS',10654560.00,0.00,'2019-06-16 15:59:57'),
('CA16061900018','K05','Puspito, TOKO','2019-06-16',1,'LUNAS',28109120.00,0.00,'2019-06-16 16:01:02'),
('CA16061900019','K06','Rukun Jaya, TOKO','2019-06-16',1,'LUNAS',38418224.00,0.00,'2019-06-16 16:03:56'),
('CA16061900020','K07','Sempulur, KIOS','2019-06-16',1,'LUNAS',42363680.00,0.00,'2019-06-16 16:05:06'),
('CA16061900021','K08','Sidodadi, UD','2019-06-16',1,'LUNAS',13854560.00,0.00,'2019-06-16 16:06:13'),
('CA16061900022','K09','Suka Subur, UD','2019-06-16',1,'LUNAS',54459148.00,0.00,'2019-06-16 16:09:00'),
('CA16061900023','K10','Sumber Mulyo, UD','2019-06-16',1,'LUNAS',31709120.00,0.00,'2019-06-16 16:10:02'),
('CA16061900024','K11','Suroto, UD','2019-06-16',1,'LUNAS',58981888.00,0.00,'2019-06-16 16:11:46'),
('CA16061900025','K12','Usaha Tani, UD','2019-06-16',1,'LUNAS',22563664.00,0.00,'2019-06-16 16:13:19'),
('CA16061900026','K02','Amin Tani, TOKO','2019-06-16',1,'LUNAS',58981888.00,0.00,'2019-06-16 16:26:27'),
('CA16081900004','K32','Lestari, UD','2019-05-16',1,'LUNAS',43163680.00,0.00,'2019-08-16 14:05:14'),
('CA16081900005','K35','Riski, UD','2019-05-16',1,'PIUTANG',122100128.00,0.00,'2019-08-16 14:07:34'),
('CA17051900012','K10','Sumber Mulyo, UD','2019-05-17',1,'LUNAS',28509120.00,0.00,'2019-05-17 08:22:42'),
('CA17051900013','K23','Manunggal Sejati, UD','2019-05-17',1,'LUNAS',63681880.00,0.00,'2019-05-17 08:28:33'),
('CA17061900001','K28','Al Arafah, TOKO','2019-06-17',1,'LUNAS',18618208.00,0.00,'2019-06-17 06:55:05'),
('CA17061900002','K29','Barokah, UD','2019-06-17',1,'LUNAS',17236384.00,0.00,'2019-06-17 06:56:38'),
('CA17061900003','K30','Karya Makmur, UD','2019-06-17',1,'LUNAS',13854560.00,0.00,'2019-06-17 06:57:39'),
('CA17061900004','K31','Lancar, TOKO','2019-06-17',1,'LUNAS',24163664.00,0.00,'2019-06-17 06:58:52'),
('CA17061900005','K33','Lika Lia, UD','2019-06-17',1,'LUNAS',36200048.00,0.00,'2019-06-17 07:00:22'),
('CA17061900006','K34','Lumintu, UD','2019-06-17',1,'LUNAS',45127328.00,0.00,'2019-06-17 07:24:39'),
('CA17061900007','K35','Riski, UD','2019-06-17',1,'LUNAS',72836448.00,0.00,'2019-06-17 07:25:58'),
('CA17061900008','K36','Riya, TOKO','2019-06-17',1,'LUNAS',24563664.00,0.00,'2019-06-17 07:27:33'),
('CA17061900009','K38','Sumber Pangan, UD','2019-06-17',1,'LUNAS',13854560.00,0.00,'2019-06-17 07:28:36'),
('CA17061900010','K40','Tani Makmur, TOKO','2019-06-17',1,'LUNAS',28109120.00,0.00,'2019-06-17 07:30:07'),
('CA17061900011','K06','Rukun Jaya, TOKO','2019-05-17',1,'LUNAS',45345504.00,0.00,'2019-06-17 08:10:06');

/*Table structure for table `tb_retur_pembelian` */

DROP TABLE IF EXISTS `tb_retur_pembelian`;

CREATE TABLE `tb_retur_pembelian` (
  `no_faktur` varchar(30) NOT NULL,
  `kode_barang` varchar(30) NOT NULL,
  `harga_beli` double(10,2) NOT NULL,
  `qty` int(4) NOT NULL,
  `petugas` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `timestmp` datetime NOT NULL,
  PRIMARY KEY (`no_faktur`,`kode_barang`),
  KEY `FK_tb_detailbeli_tb_produk` (`kode_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_retur_pembelian` */

/*Table structure for table `tb_retur_penjualan` */

DROP TABLE IF EXISTS `tb_retur_penjualan`;

CREATE TABLE `tb_retur_penjualan` (
  `no_transaksi` varchar(30) NOT NULL,
  `kode_barang` varchar(30) NOT NULL,
  `qty` int(4) NOT NULL,
  `harga` double(10,2) NOT NULL,
  `disc` double(5,2) NOT NULL,
  `petugas` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `timestmp` datetime NOT NULL,
  PRIMARY KEY (`kode_barang`,`no_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_retur_penjualan` */

/*Table structure for table `tb_satuan_barang` */

DROP TABLE IF EXISTS `tb_satuan_barang`;

CREATE TABLE `tb_satuan_barang` (
  `id_satuan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_satuan` varchar(10) NOT NULL,
  PRIMARY KEY (`id_satuan`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `tb_satuan_barang` */

insert  into `tb_satuan_barang`(`id_satuan`,`nama_satuan`) values 
(18,'PCS'),
(19,'UNIT');

/*Table structure for table `tb_stok` */

DROP TABLE IF EXISTS `tb_stok`;

CREATE TABLE `tb_stok` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT NULL,
  `stok` varchar(20) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `tb_stok` */

insert  into `tb_stok`(`id`,`kode`,`stok`,`tanggal`) values 
(11,'P01','2','2019-05-01'),
(12,'P02','0','2019-05-01'),
(13,'P03','0','2019-05-01'),
(14,'P04','24','2019-05-01'),
(15,'P05','30','2019-05-01'),
(16,'P01','72','2019-06-01'),
(17,'P04','88','2019-06-01'),
(18,'P05','170','2019-06-01'),
(19,'P02','10','2019-06-01'),
(20,'P03','1','2019-06-01');

/*Table structure for table `tb_supplier` */

DROP TABLE IF EXISTS `tb_supplier`;

CREATE TABLE `tb_supplier` (
  `kode_supplier` varchar(10) NOT NULL,
  `nama_toko` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`kode_supplier`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_supplier` */

insert  into `tb_supplier`(`kode_supplier`,`nama_toko`,`alamat`,`telepon`,`email`) values 
('S01','Petrokimia Gresik','Gresik, Jawa Timur','085676543321','Petrokimiagresik@gmail.com');

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(45) NOT NULL,
  `usernm` varchar(20) NOT NULL,
  `passwd` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL,
  `last_login` datetime NOT NULL,
  `akses_master` text NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `tb_user` */

insert  into `tb_user`(`id_user`,`nama_lengkap`,`usernm`,`passwd`,`level`,`last_login`,`akses_master`) values 
(1,'ADMINISTRATOR','admin','21232f297a57a5a743894a0e4a801fc3','admin','2019-07-17 11:06:43',''),
(2,'CACA','caca','d2104a400c7f629a197f33bb33fe80c0','user','2016-11-25 22:31:11','pelanggan, supplier'),
(3,'AGUS','agus','fdf169558242ee051cca1479770ebac3','admin','2016-11-25 22:33:02','');

/*Table structure for table `transaksi` */

DROP TABLE IF EXISTS `transaksi`;

CREATE TABLE `transaksi` (
  `tgl` date DEFAULT NULL,
  `nobukti` int(11) NOT NULL AUTO_INCREMENT,
  `notrx` int(11) NOT NULL,
  `nosubtrx` int(11) NOT NULL,
  `idakun` varchar(25) NOT NULL,
  `uraianjurnal` longtext,
  `uraianbb` longtext,
  `jurnal` enum('umum','penyesuaian','','') NOT NULL,
  `ref` varchar(25) DEFAULT NULL,
  `debit` double(20,2) DEFAULT '0.00',
  `kredit` double(20,2) DEFAULT '0.00',
  PRIMARY KEY (`nobukti`)
) ENGINE=InnoDB AUTO_INCREMENT=909 DEFAULT CHARSET=latin1;

/*Data for the table `transaksi` */

insert  into `transaksi`(`tgl`,`nobukti`,`notrx`,`nosubtrx`,`idakun`,`uraianjurnal`,`uraianbb`,`jurnal`,`ref`,`debit`,`kredit`) values 
('2019-05-01',760,1,1,'201','Bank BCA','Bank BCA','umum','201',377818560.00,0.00),
('2019-05-01',776,1,3,'201','Bank BCA','Bank BCA','umum','201',0.00,434513308.00),
('2019-05-01',778,1,5,'202','Bank Mandiri','Bank Mandiri','umum','202',2735549973.00,0.00),
('2019-05-01',780,1,7,'202','Bank Mandiri','Bank Mandiri','umum','202',0.00,2700076903.00),
('2019-05-01',782,1,9,'303','Piutang','Piutang','umum','303',822639620.00,0.00),
('2019-05-01',784,1,11,'303','Piutang','Piutang','umum','303',0.00,1033793780.00),
('2019-05-01',790,1,15,'611','Direksi','Direksi','umum','611',15000000.00,0.00),
('2019-05-01',792,1,17,'609','Hutang Cetak','Hutang Cetak','umum','609',0.00,100000000.00),
('2019-05-01',794,1,19,'503','Persedian Pupuk','Persedian Pupuk','umum','503',252479214.00,0.00),
('2019-05-01',796,1,21,'621','Hutang Kios','Hutang Kios','umum','621',3527280.00,0.00),
('2019-05-01',798,1,23,'101','Kas - Penjualan Pupuk','Kas - Penjualan Pupuk','umum','101',1788094000.00,0.00),
('2019-05-01',799,1,24,'101','Kas - Penerimaan Piutang Bulan Mei 2019','Kas - Penerimaan Piutang Bulan Mei 2019','umum','101',1033793780.00,0.00),
('2019-05-01',800,1,25,'101','Kas - Pot. Ijin','Kas - Pot. Ijin','umum','101',47120.00,0.00),
('2019-05-01',801,1,26,'101','Pot. THT','Pot. THT','umum','101',228421.00,0.00),
('2019-05-01',802,1,27,'101','Kas - Diterima dari BCA','Kas - Diterima dari  BCA','umum','101',434500000.00,0.00),
('2019-05-01',803,1,28,'101','Kas - Diterima dari Percetakan','Kas - Diterima dari Percetakan','umum','101',100000000.00,0.00),
('2019-05-01',808,1,29,'101','Kas - Gaji Karyawan','Kas - Gaji Karyawan','umum','101',0.00,25237700.00),
('2019-05-01',810,1,31,'101','Kas - Setor Bank Mandiri','Kas - Setor Bank Mandiri','umum','101',0.00,2735500000.00),
('2019-05-01',811,1,32,'101','Kas - Eksploitasi','Kas - Eksploitasi','umum','101',0.00,3624120.00),
('2019-05-01',812,1,33,'101','Kas - Perjalanan Dinas Luar Kota','Kas - Perjalanan Dinas Luar Kota','umum','101',0.00,2750000.00),
('2019-05-01',813,1,34,'101','Kas - Perjalanan Dinas Dalam Kota','Kas - Perjalanan Dinas Dalam Kota','umum','101',0.00,1885000.00),
('2019-05-01',814,1,35,'101','Kas - Ongkos Angkut','Kas - Ongkos Angkut','umum','101',0.00,76500000.00),
('2019-05-01',815,1,36,'101','Kas - Pengeluaran Kantor','Kas - Pengeluaran Kantor','umum','101',0.00,2192000.00),
('2019-05-02',816,1,37,'101','Kas - Pemeliharaan','Kas - Pemeliharaan','umum','101',0.00,2040000.00),
('2019-05-01',817,1,38,'101','Kas - Bahan Bakar','Kas - Bahan Bakar','umum','101',0.00,1990000.00),
('2019-05-01',819,1,40,'101','Kas - Jamsostek','Kas - Jamsostek','umum','101',0.00,1017123.00),
('2019-05-01',820,1,41,'101','Kas - Biaya Konsumsi','Kas - Biaya Konsumsi','umum','101',0.00,939050.00),
('2019-05-01',821,1,42,'101','Kas - Lain Lain','Kas - Lain Lain','umum','101',0.00,400000.00),
('2019-05-01',822,1,43,'101','Kas - Dibayar hutang laba 2017','Kas - Dibayar hutang laba 2017','umum','101',0.00,56500000.00),
('2019-05-01',823,1,44,'101','Kas - Pembinaan','Kas - Pembinaan','umum','101',0.00,2954500.00),
('2019-05-01',824,1,45,'101','Kas - Temu Kios','Kas - Temu Kios','umum','101',0.00,1147000.00),
('2019-05-01',825,1,46,'101','Kas - Dibayar Direksi','Kas - Dibayar Direksi','umum','101',0.00,15000000.00),
('2019-05-01',826,1,47,'101','Kas - Pemasaran','Kas - Pemasaran','umum','101',0.00,2775000.00),
('2019-05-01',828,1,48,'101','Kas - Setor bank BCA','Kas - Setor bank BCA','umum','101',0.00,377818560.00),
('2019-05-01',829,1,49,'501','Penjualan Pupuk','Penjualan Pupuk','umum','501',0.00,2614260900.00),
('2019-05-01',830,1,50,'502','Pembelian  Pupuk','Pembelian  Pupuk','umum','502',2700054408.00,0.00),
('2019-05-01',831,1,51,'504','HPP','HPP','umum','504',0.00,252479214.00),
('2019-05-01',832,1,52,'901','Gaji Karyawan','Gaji Karyawan','umum','901',25237700.00,0.00),
('2019-05-01',833,1,53,'902','Exploitasi','Exploitasi','umum','902',3624120.00,0.00),
('2019-05-01',834,1,54,'903','perjalanan dinas luar kota','perjalanan dinas luar kota','umum','903',2750000.00,0.00),
('2019-05-01',835,1,55,'904','perjalanan dinas dalam kota','perjalanan dinas dalam kota','umum','904',1885000.00,0.00),
('2019-05-01',836,1,56,'905','ongkos angkut','ongkos angkut','umum','905',76500000.00,0.00),
('2019-05-01',837,1,57,'906','Pengeluaran Kantor','Pengeluaran Kantor','umum','906',2192000.00,0.00),
('2019-05-01',838,1,58,'907','Pemeliharaan','Pemeliharaan','umum','907',2040000.00,0.00),
('2019-05-01',839,1,59,'908','bahan bakar','bahan bakar','umum','908',1990000.00,0.00),
('2019-05-01',840,1,60,'909','Biaya Konsumsi','Biaya Konsumsi','umum','909',939050.00,0.00),
('2019-05-01',841,1,61,'912','Pemasaran','Pemasaran','umum','912',2775000.00,0.00),
('2019-05-01',842,1,62,'913','Pembinaan','Pembinaan','umum','913',2954500.00,0.00),
('2019-05-01',843,1,63,'914','Temu Kios','Temu Kios','umum','914',1147000.00,0.00),
('2019-05-01',844,1,64,'927','Lain-Lain','Lain-Lain','umum','927',400000.00,0.00),
('2019-05-01',845,1,65,'505','Potongan Ijin','Potongan Ijin','umum','505',0.00,47120.00),
('2019-05-01',846,1,66,'506','Bunga Bank','Bunga Bank','umum','506',35802.00,0.00),
('2019-05-01',847,1,67,'506','Bunga Bank','Bunga Bank','umum','506',0.00,49972.00),
('2019-05-01',848,1,68,'926','BPJS Kesehatan','BPJS Kesehatan','umum','926',1017123.00,0.00),
('2019-05-01',851,1,69,'926','BPJS Kesehatan','BPJS Kesehatan','umum','926',0.00,228421.00),
('2019-05-01',852,1,70,'304','Laba Rugi Tahun 2017','Laba Rugi Tahun 2017','umum','304',56500000.00,0.00),
('2019-06-01',853,2,1,'101','Kas - Penjualan Pupuk','Kas - Penjualan Pupuk','umum','101',486075840.00,0.00),
('2019-06-01',854,2,2,'101','Kas - Perimaan Piutang Bulan Mei 2018','Kas - Perimaan Piutang Bulan Mei 2018','umum','101',622567740.00,0.00),
('2019-06-01',855,2,3,'101','Kas - Pot THT','Kas - Pot THT','umum','101',228421.50,0.00),
('2019-06-01',856,2,4,'101','Kas - Diterima dari BCA','Kas - Diterima dari BCA','umum','101',222000000.00,0.00),
('2019-06-01',857,2,5,'101','Kas - Diterima dari Direksi','Kas - Diterima dari Direksi','umum','101',100000000.00,0.00),
('2019-06-01',860,2,6,'101','Kas - Gaji Karyawan','Kas - Gaji Karyawan','umum','101',0.00,16069850.00),
('2019-06-01',861,2,7,'101','Kas - Setor bank BCA','Kas - Setor bank BCA','umum','101',0.00,263745760.00),
('2019-06-01',862,2,8,'101','Kas - Setor Bank Mandiri','Kas - Setor Bank Mandiri','umum','101',0.00,1066000000.00),
('2019-06-01',863,2,9,'101','Kas - Eksploitasi','Kas - Eksploitasi','umum','101',0.00,2026100.00),
('2019-06-01',864,2,10,'101','Kas - Perjalanan Dinas Luar Kota','Kas - Perjalanan Dinas Luar Kota','umum','101',0.00,300000.00),
('2019-06-01',865,2,11,'101','Kas - Perjalana Dinas Dalam Kota','Kas - Perjalana Dinas Dalam Kota','umum','101',0.00,2252500.00),
('2019-06-01',866,2,12,'101','Kas - Ongkos Angkut','Kas - Ongkos Angkut','umum','101',0.00,43500000.00),
('2019-06-01',867,2,13,'101','Kas - Pengeluaran Kantor','Kas - Pengeluaran Kantor','umum','101',0.00,2149000.00),
('2019-06-01',868,2,14,'101','Kas -Pemeliharaan','Kas -Pemeliharaan','umum','101',0.00,1173000.00),
('2019-06-01',869,2,15,'101','Kas - Bahan Bakar','Kas - Bahan Bakar','umum','101',0.00,2220000.00),
('2019-06-01',870,2,16,'101','Kas - Pemasaran','Kas - Pemasaran','umum','101',0.00,1513500.00),
('2019-06-01',871,2,17,'101','Kas - Jamsostek','Kas - Jamsostek','umum','101',0.00,1017123.02),
('2019-06-01',872,2,18,'101','Kas - Biaya Konsumsi','Kas - Biaya Konsumsi','umum','101',0.00,1221700.00),
('2019-06-01',874,2,20,'101','Kas - Dibayar hutang laba 2017','Kas - Dibayar hutang laba 2017','umum','101',0.00,80000000.00),
('2019-06-01',875,2,21,'101','Kas - Pembinaan','Kas - Pembinaan','umum','101',0.00,2200000.00),
('2019-06-01',876,2,22,'101','Kas - Dibayar Demplot','Kas - Dibayar Demplot','umum','101',0.00,4000000.00),
('2019-06-01',877,2,23,'101','Kas - Lain - Lain','Kas - Lain - Lain','umum','101',0.00,916000.00),
('2019-06-01',878,2,24,'202','Bank Mandiri','Bank Mandiri','umum','202',1066039029.47,0.00),
('2019-06-01',879,2,25,'202','Bank Mandiri','Bank Mandiri','umum','202',0.00,1119354405.89),
('2019-06-01',880,2,26,'201','Bank BCA','Bank BCA','umum','201',263754413.32,0.00),
('2019-06-01',882,2,27,'201','Bank BCA','Bank BCA','umum','201',0.00,222018730.66),
('2019-06-01',883,2,28,'303','Piutang','Piutang','umum','303',849452922.00,0.00),
('2019-06-01',884,2,29,'303','Piutang','Piutang','umum','303',0.00,622567740.00),
('2019-06-01',885,2,30,'503','Persediaan','Persedian','umum','503',0.00,129069647.42),
('2019-06-01',886,2,31,'611','Direksi','Direksi','umum','611',0.00,100000000.00),
('2019-06-01',887,2,32,'603','Hutang Demplot','Hutang Demplot','umum','603',4000000.00,0.00),
('2019-06-01',888,2,33,'304','Laba Rugi Tahun 2017','Laba Rugi Tahun 2017','umum','304',80000000.00,0.00),
('2019-06-01',889,2,34,'501','penjualan pupuk','penjualan pupuk','umum','501',0.00,1335528762.00),
('2019-06-01',890,2,35,'502','Pembelian - Pupuk','Pembelian - Pupuk','umum','502',1119309100.00,0.00),
('2019-06-01',891,2,36,'504','HPP','HPP','umum','504',129069647.42,0.00),
('2019-06-01',892,2,37,'901','Gaji Karyawan','Gaji Karyawan','umum','901',16069850.00,0.00),
('2019-06-01',893,2,38,'902','Eksploitasi','Eksploitasi','umum','902',2026100.00,0.00),
('2019-06-01',894,2,39,'903','perjalanan dinas luar kota','perjalanan dinas luar kota','umum','903',300000.00,0.00),
('2019-06-01',895,2,40,'904','perjalanan dinas dalam kota','perjalanan dinas dalam kota','umum','904',2252500.00,0.00),
('2019-06-01',896,2,41,'905','ongkos angkut','ongkos angkut','umum','905',43500000.00,0.00),
('2019-06-01',897,2,42,'906','Pengeluaran Kantor','Pengeluaran Kantor','umum','906',2149000.00,0.00),
('2019-06-01',898,2,43,'907','pemeliharaan','pemeliharaan','umum','907',1173000.00,0.00),
('2019-06-01',899,2,44,'908','Pemeliharaan','Pemeliharaan','umum','908',2220000.00,0.00),
('2019-06-01',900,2,45,'909','biaya konsumsi','biaya konsumsi','umum','909',1221700.00,0.00),
('2019-06-01',901,2,46,'912','Pemasaran','Pemasaran','umum','912',1513500.00,0.00),
('2019-06-01',902,2,47,'913','Pembinaan','Pembinaan','umum','913',2200000.00,0.00),
('2019-06-01',903,2,48,'927','lain - lain','lain - lain','umum','927',916000.00,0.00),
('2019-06-01',904,2,49,'506','Bunga Bank','Bunga Bank','umum','506',64036.55,0.00),
('2019-06-01',905,2,50,'506','Bunga Bank','Bunga Bank','umum','506',0.00,47682.79),
('2019-06-01',906,2,51,'926','BPJS Kesehatan','BPJS Kesehatan','umum','926',1017132.02,0.00),
('2019-06-01',907,2,52,'926','BPJS Kesehatan','BPJS Kesehatan','umum','926',0.00,228421.50),
('2019-07-01',908,3,1,'201','Bank BCA','Bank BCA','umum','Bank BCA',184345680.00,0.00);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `id_user` int(5) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`username`,`password`,`nama`,`id_user`) values 
('pupuk','pupuk','Administrator',1);

/* Trigger structure for table `tb_detail_pembelian` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `after_insert_tmp_beli` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `after_insert_tmp_beli` AFTER INSERT ON `tb_detail_pembelian` FOR EACH ROW BEGIN
	DELETE FROM tb_detail_pembelian_tmp 
	WHERE kode_barang = NEW.kode_barang 
	AND petugas = NEW.petugas;
END */$$


DELIMITER ;

/* Trigger structure for table `tb_penjualan` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `after_insert_penjualan` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `after_insert_penjualan` AFTER INSERT ON `tb_penjualan` FOR EACH ROW BEGIN
	INSERT INTO tb_log(deskripsi, timestmp) 
	VALUES(CONCAT("<span class='w3-text-green'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>", NEW.no_transaksi), NOW());
END */$$


DELIMITER ;

/* Trigger structure for table `tb_penjualan` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `after_delete_penjualan` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `after_delete_penjualan` AFTER DELETE ON `tb_penjualan` FOR EACH ROW BEGIN
	INSERT INTO tb_log(deskripsi, timestmp) 
	VALUES(CONCAT("<span class='w3-text-red'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :", OLD.no_transaksi), NOW());
END */$$


DELIMITER ;

/*Table structure for table `barang_laris` */

DROP TABLE IF EXISTS `barang_laris`;

/*!50001 DROP VIEW IF EXISTS `barang_laris` */;
/*!50001 DROP TABLE IF EXISTS `barang_laris` */;

/*!50001 CREATE TABLE  `barang_laris`(
 `kode_barang` varchar(30) ,
 `nama_barang` varchar(50) ,
 `jumlah` bigint(21) ,
 `satuan` varchar(10) 
)*/;

/*View structure for view barang_laris */

/*!50001 DROP TABLE IF EXISTS `barang_laris` */;
/*!50001 DROP VIEW IF EXISTS `barang_laris` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `barang_laris` AS select `a`.`kode_barang` AS `kode_barang`,`a`.`nama_barang` AS `nama_barang`,count(`a`.`kode_barang`) AS `jumlah`,`a`.`satuan` AS `satuan` from (`tb_barang` `a` join `tb_detail_penjualan` `b`) where (`a`.`kode_barang` = `b`.`kode_barang`) group by `a`.`kode_barang` */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
