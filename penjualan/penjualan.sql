/*
Navicat MySQL Data Transfer

Source Server         : yogas
Source Server Version : 50616
Source Host           : localhost:3306
Source Database       : penjualan

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2019-07-17 14:02:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(50) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('1', 'Master', '1');
INSERT INTO `menu` VALUES ('2', 'Transaksi', '2');
INSERT INTO `menu` VALUES ('3', 'Laporan', '3');

-- ----------------------------
-- Table structure for modul
-- ----------------------------
DROP TABLE IF EXISTS `modul`;
CREATE TABLE `modul` (
  `id_modul` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` int(11) NOT NULL,
  `nama_modul` varchar(150) NOT NULL,
  `link_menu` text NOT NULL,
  `posisi` int(11) NOT NULL,
  `icon_menu` varchar(150) NOT NULL,
  PRIMARY KEY (`id_modul`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of modul
-- ----------------------------
INSERT INTO `modul` VALUES ('6', '1', 'Kategori Pupuk', 'med.php?mod=kategori', '1', 'fa fa-folder-open');
INSERT INTO `modul` VALUES ('7', '1', 'Data Pupuk', 'med.php?mod=barang', '2', 'fa fa-cubes');
INSERT INTO `modul` VALUES ('8', '1', 'Data Kios', 'med.php?mod=pelanggan', '3', 'fa fa-building');
INSERT INTO `modul` VALUES ('9', '1', 'Data Supplier', 'med.php?mod=supplier', '4', 'fa fa-truck');
INSERT INTO `modul` VALUES ('11', '2', 'Data Transaksi Penjualan', 'med.php?mod=penjualan&act=list', '2', 'fa fa-book');
INSERT INTO `modul` VALUES ('12', '2', 'Data Transaksi Pembelian', 'med.php?mod=pembelian', '3', 'fa fa-calculator');
INSERT INTO `modul` VALUES ('13', '3', 'Laporan Stok Barang', 'med.php?mod=laporan&act=stokbarang', '1', 'fa fa-line-chart');
INSERT INTO `modul` VALUES ('17', '8', 'Retur Penjualan', 'med.php?mod=returpenjualan', '1', 'fa fa-cart-arrow-down');
INSERT INTO `modul` VALUES ('18', '8', 'Retur Pembelian', 'med.php?mod=returpembelian', '2', 'fa fa-cart-arrow-down');

-- ----------------------------
-- Table structure for tb_barang
-- ----------------------------
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

-- ----------------------------
-- Records of tb_barang
-- ----------------------------
INSERT INTO `tb_barang` VALUES ('P01', 'pupuk za', 'Petrokimia Gresik', '2019-07-02', '60000.00', '60000.00', 'C01', '195', 'TON');
INSERT INTO `tb_barang` VALUES ('P02', 'Pupuk ZA ', 'Petrokimia Gresik', '2019-07-02', '70000.00', '80000.00', 'C02', '100', 'TON');

-- ----------------------------
-- Table structure for tb_detail_pembelian
-- ----------------------------
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

-- ----------------------------
-- Records of tb_detail_pembelian
-- ----------------------------
INSERT INTO `tb_detail_pembelian` VALUES (' BVV7678Y9', 'P01', '60000.00', '3.5', '1', '2019-07-09 13:05:56');

-- ----------------------------
-- Table structure for tb_detail_pembelian_tmp
-- ----------------------------
DROP TABLE IF EXISTS `tb_detail_pembelian_tmp`;
CREATE TABLE `tb_detail_pembelian_tmp` (
  `kode_barang` varchar(30) NOT NULL,
  `harga_beli` double(10,2) NOT NULL,
  `qty` varchar(10) NOT NULL,
  `petugas` int(11) NOT NULL,
  `timestmp` datetime NOT NULL,
  PRIMARY KEY (`kode_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_detail_pembelian_tmp
-- ----------------------------

-- ----------------------------
-- Table structure for tb_detail_penjualan
-- ----------------------------
DROP TABLE IF EXISTS `tb_detail_penjualan`;
CREATE TABLE `tb_detail_penjualan` (
  `no_transaksi` varchar(30) NOT NULL,
  `no_do` varchar(30) DEFAULT NULL,
  `kode_barang` varchar(30) NOT NULL,
  `qty` varchar(10) NOT NULL,
  `harga` double(10,2) NOT NULL,
  `disc` double(5,2) NOT NULL,
  `petugas` int(11) NOT NULL,
  `timestmp` datetime NOT NULL,
  PRIMARY KEY (`no_transaksi`,`kode_barang`),
  KEY `FK_tb_detailproduk_tb_produk` (`kode_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_detail_penjualan
-- ----------------------------
INSERT INTO `tb_detail_penjualan` VALUES ('CA08071900001', 'BHK3092JND', 'P01', '1.5', '60000.00', '0.00', '1', '2019-07-08 15:02:13');
INSERT INTO `tb_detail_penjualan` VALUES ('CA08071900002', 'NFFFF1292', 'P02', '2.5', '80000.00', '0.00', '1', '2019-07-08 15:14:08');
INSERT INTO `tb_detail_penjualan` VALUES ('CA08071900003', 'BHK3092JND', 'P01', '1.5', '60000.00', '0.00', '1', '2019-07-08 15:24:54');
INSERT INTO `tb_detail_penjualan` VALUES ('CA08071900003', 'NFFFF1292', 'P02', '1.5', '80000.00', '0.00', '1', '2019-07-08 15:24:56');
INSERT INTO `tb_detail_penjualan` VALUES ('CA08071900004', 'BHK3092JND', 'P01', '1', '60000.00', '0.00', '1', '2019-07-08 15:31:00');
INSERT INTO `tb_detail_penjualan` VALUES ('CA12071900001', 'BHK3092JND', 'P01', '8', '60000.00', '0.00', '1', '2019-07-12 08:50:58');

-- ----------------------------
-- Table structure for tb_detail_penjualan_tmp
-- ----------------------------
DROP TABLE IF EXISTS `tb_detail_penjualan_tmp`;
CREATE TABLE `tb_detail_penjualan_tmp` (
  `kode_barang` varchar(50) NOT NULL,
  `no_do` varchar(30) NOT NULL,
  `harga` double(10,2) NOT NULL,
  `disc` double(10,2) NOT NULL,
  `qty` varchar(10) NOT NULL,
  `petugas` int(11) NOT NULL,
  `timestmp` datetime NOT NULL,
  PRIMARY KEY (`petugas`,`kode_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_detail_penjualan_tmp
-- ----------------------------

-- ----------------------------
-- Table structure for tb_kategori_barang
-- ----------------------------
DROP TABLE IF EXISTS `tb_kategori_barang`;
CREATE TABLE `tb_kategori_barang` (
  `kategori_id` char(5) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_kategori_barang
-- ----------------------------
INSERT INTO `tb_kategori_barang` VALUES ('C01', 'SUBSIDI');
INSERT INTO `tb_kategori_barang` VALUES ('C02', 'NON-SUBSIDI');

-- ----------------------------
-- Table structure for tb_log
-- ----------------------------
DROP TABLE IF EXISTS `tb_log`;
CREATE TABLE `tb_log` (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `deskripsi` text NOT NULL,
  `timestmp` datetime NOT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_log
-- ----------------------------
INSERT INTO `tb_log` VALUES ('26', '<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA03081600001', '2016-08-03 21:07:25');
INSERT INTO `tb_log` VALUES ('27', '<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA03081600002', '2016-08-03 21:13:24');
INSERT INTO `tb_log` VALUES ('28', '<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA04081600001', '2016-08-04 13:33:06');
INSERT INTO `tb_log` VALUES ('29', '<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA04081600001', '2016-08-04 13:34:36');
INSERT INTO `tb_log` VALUES ('30', '<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA24111600001', '2016-11-24 22:04:59');
INSERT INTO `tb_log` VALUES ('31', '<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA24111600002', '2016-11-24 22:33:42');
INSERT INTO `tb_log` VALUES ('32', '<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA25111600001', '2016-11-25 21:17:44');
INSERT INTO `tb_log` VALUES ('33', '<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA25111600002', '2016-11-25 22:09:47');
INSERT INTO `tb_log` VALUES ('34', '<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA25111600003', '2016-11-25 22:26:49');
INSERT INTO `tb_log` VALUES ('35', '<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA25111600003', '2016-11-25 22:30:21');
INSERT INTO `tb_log` VALUES ('36', '<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA25111600003', '2016-11-25 22:34:45');
INSERT INTO `tb_log` VALUES ('37', '<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA26111600001', '2016-11-26 08:30:50');
INSERT INTO `tb_log` VALUES ('38', '<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA27111600001', '2016-11-27 13:34:28');
INSERT INTO `tb_log` VALUES ('39', '<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA28111600001', '2016-11-28 10:22:11');
INSERT INTO `tb_log` VALUES ('40', '<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA28111600002', '2016-11-28 11:14:44');
INSERT INTO `tb_log` VALUES ('41', '<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA28111600003', '2016-11-28 11:19:06');
INSERT INTO `tb_log` VALUES ('42', '<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA28111600004', '2016-11-28 11:25:55');
INSERT INTO `tb_log` VALUES ('43', '<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA28111600003', '2016-11-29 08:50:37');
INSERT INTO `tb_log` VALUES ('44', '<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA28111600001', '2016-11-29 08:50:47');
INSERT INTO `tb_log` VALUES ('45', '<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA29111600001', '2016-11-29 08:53:50');
INSERT INTO `tb_log` VALUES ('46', '<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA29111600002', '2016-11-29 09:13:38');
INSERT INTO `tb_log` VALUES ('47', '<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA29111600003', '2016-11-29 10:11:30');
INSERT INTO `tb_log` VALUES ('48', '<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA27111600001', '2016-12-03 07:00:05');
INSERT INTO `tb_log` VALUES ('49', '<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA25111600002', '2016-12-03 07:00:15');
INSERT INTO `tb_log` VALUES ('50', '<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA24111600001', '2016-12-03 07:00:22');
INSERT INTO `tb_log` VALUES ('51', '<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA26111600001', '2016-12-03 07:00:45');
INSERT INTO `tb_log` VALUES ('52', '<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA24111600002', '2016-12-03 07:00:59');
INSERT INTO `tb_log` VALUES ('53', '<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA03081600001', '2016-12-03 07:01:07');
INSERT INTO `tb_log` VALUES ('54', '<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA03081600002', '2016-12-03 07:01:14');
INSERT INTO `tb_log` VALUES ('55', '<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA25111600003', '2016-12-03 07:01:27');
INSERT INTO `tb_log` VALUES ('56', '<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA03121600001', '2016-12-03 07:13:59');
INSERT INTO `tb_log` VALUES ('57', '<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA25111600001', '2016-12-03 07:16:27');
INSERT INTO `tb_log` VALUES ('58', '<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA28111600002', '2016-12-03 07:16:36');
INSERT INTO `tb_log` VALUES ('59', '<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA02071900001', '2019-07-02 05:50:33');
INSERT INTO `tb_log` VALUES ('60', '<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA02071900002', '2019-07-02 05:55:08');
INSERT INTO `tb_log` VALUES ('61', '<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA02071900003', '2019-07-02 16:05:32');
INSERT INTO `tb_log` VALUES ('62', '<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA03071900001', '2019-07-03 13:19:06');
INSERT INTO `tb_log` VALUES ('63', '<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA03071900002', '2019-07-03 14:19:48');
INSERT INTO `tb_log` VALUES ('64', '<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA28111600004', '2019-07-03 14:23:11');
INSERT INTO `tb_log` VALUES ('65', '<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA29111600001', '2019-07-03 14:23:17');
INSERT INTO `tb_log` VALUES ('66', '<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA29111600002', '2019-07-03 14:23:19');
INSERT INTO `tb_log` VALUES ('67', '<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA29111600003', '2019-07-03 14:23:22');
INSERT INTO `tb_log` VALUES ('68', '<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA03121600001', '2019-07-03 14:23:24');
INSERT INTO `tb_log` VALUES ('69', '<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA02071900001', '2019-07-03 14:23:30');
INSERT INTO `tb_log` VALUES ('70', '<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA02071900002', '2019-07-03 14:23:34');
INSERT INTO `tb_log` VALUES ('71', '<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA02071900003', '2019-07-03 14:23:36');
INSERT INTO `tb_log` VALUES ('72', '<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA03071900001', '2019-07-05 09:09:03');
INSERT INTO `tb_log` VALUES ('73', '<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA03071900002', '2019-07-05 09:09:03');
INSERT INTO `tb_log` VALUES ('74', '<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA05071900001', '2019-07-05 09:15:41');
INSERT INTO `tb_log` VALUES ('75', '<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA05071900001', '2019-07-05 15:09:42');
INSERT INTO `tb_log` VALUES ('76', '<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA05071900001', '2019-07-05 15:29:42');
INSERT INTO `tb_log` VALUES ('77', '<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA08071900001', '2019-07-08 14:40:00');
INSERT INTO `tb_log` VALUES ('78', '<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA08071900002', '2019-07-08 14:50:18');
INSERT INTO `tb_log` VALUES ('79', '<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA05071900001', '2019-07-08 14:56:00');
INSERT INTO `tb_log` VALUES ('80', '<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA08071900001', '2019-07-08 14:56:02');
INSERT INTO `tb_log` VALUES ('81', '<span class=\'w3-text-red\'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA08071900002', '2019-07-08 14:56:05');
INSERT INTO `tb_log` VALUES ('82', '<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA08071900001', '2019-07-08 15:02:29');
INSERT INTO `tb_log` VALUES ('83', '<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA08071900002', '2019-07-08 15:15:37');
INSERT INTO `tb_log` VALUES ('84', '<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA08071900003', '2019-07-08 15:27:18');
INSERT INTO `tb_log` VALUES ('85', '<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA08071900004', '2019-07-08 15:31:35');
INSERT INTO `tb_log` VALUES ('86', '<span class=\'w3-text-green\'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA12071900001', '2019-07-12 08:53:43');

-- ----------------------------
-- Table structure for tb_pelanggan
-- ----------------------------
DROP TABLE IF EXISTS `tb_pelanggan`;
CREATE TABLE `tb_pelanggan` (
  `kode_pelanggan` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `nomor_telp` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`kode_pelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_pelanggan
-- ----------------------------
INSERT INTO `tb_pelanggan` VALUES ('K001', 'UD. Tani Jaya', '08567898760', 'Kepung');
INSERT INTO `tb_pelanggan` VALUES ('K002', 'UD. Agro Kediri', '085856146696', 'Kras');

-- ----------------------------
-- Table structure for tb_pembelian
-- ----------------------------
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

-- ----------------------------
-- Records of tb_pembelian
-- ----------------------------
INSERT INTO `tb_pembelian` VALUES (' BVV7678Y9', 'S01', 'Petrokimia Gresik', '2019-07-09', 'YOGAS', '1', '2019-07-09 13:05:56');

-- ----------------------------
-- Table structure for tb_penjualan
-- ----------------------------
DROP TABLE IF EXISTS `tb_penjualan`;
CREATE TABLE `tb_penjualan` (
  `no_transaksi` varchar(30) NOT NULL,
  `kode_pelanggan` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `petugas` int(11) NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `bayar` double(10,2) DEFAULT NULL,
  `potongan` double(10,2) NOT NULL,
  `timestmp` datetime NOT NULL,
  PRIMARY KEY (`no_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_penjualan
-- ----------------------------
INSERT INTO `tb_penjualan` VALUES ('CA08071900001', 'K001', 'UD. Tani Jaya', '2019-07-08', '1', 'LUNAS', '2000000.00', '0.00', '2019-07-08 15:02:29');
INSERT INTO `tb_penjualan` VALUES ('CA08071900002', 'K002', 'UD. Agro Kediri', '2019-07-08', '1', 'LUNAS', '4000000.00', '0.00', '2019-07-08 15:15:37');
INSERT INTO `tb_penjualan` VALUES ('CA08071900003', 'K001', 'UD. Tani Jaya', '2019-07-08', '1', 'LUNAS', '4200000.00', '0.00', '2019-07-08 15:27:18');
INSERT INTO `tb_penjualan` VALUES ('CA08071900004', 'K001', 'UD. Tani Jaya', '2019-07-08', '1', 'LUNAS', '1300000.00', '0.00', '2019-07-08 15:31:35');
INSERT INTO `tb_penjualan` VALUES ('CA12071900001', 'K002', 'UD. Agro Kediri', '2019-07-12', '1', 'PIUTANG', '1000000.00', '0.00', '2019-07-12 08:53:43');

-- ----------------------------
-- Table structure for tb_retur_pembelian
-- ----------------------------
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

-- ----------------------------
-- Records of tb_retur_pembelian
-- ----------------------------

-- ----------------------------
-- Table structure for tb_retur_penjualan
-- ----------------------------
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

-- ----------------------------
-- Records of tb_retur_penjualan
-- ----------------------------

-- ----------------------------
-- Table structure for tb_satuan_barang
-- ----------------------------
DROP TABLE IF EXISTS `tb_satuan_barang`;
CREATE TABLE `tb_satuan_barang` (
  `id_satuan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_satuan` varchar(10) NOT NULL,
  PRIMARY KEY (`id_satuan`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_satuan_barang
-- ----------------------------
INSERT INTO `tb_satuan_barang` VALUES ('18', 'PCS');
INSERT INTO `tb_satuan_barang` VALUES ('19', 'UNIT');

-- ----------------------------
-- Table structure for tb_supplier
-- ----------------------------
DROP TABLE IF EXISTS `tb_supplier`;
CREATE TABLE `tb_supplier` (
  `kode_supplier` varchar(10) NOT NULL,
  `nama_toko` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`kode_supplier`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_supplier
-- ----------------------------
INSERT INTO `tb_supplier` VALUES ('S01', 'Petrokimia Gresik', 'Gresik, Jawa Timur', '085676543321', 'Petrokimiagresik@gmail.com');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(45) NOT NULL,
  `usernm` varchar(20) NOT NULL,
  `passwd` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL,
  `last_login` datetime NOT NULL,
  `akses_master` text NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'ADMINISTRATOR', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '2019-07-17 11:06:43', '');
INSERT INTO `user` VALUES ('2', 'CACA', 'caca', 'd2104a400c7f629a197f33bb33fe80c0', 'user', '2016-11-25 22:31:11', 'pelanggan, supplier');
INSERT INTO `user` VALUES ('3', 'AGUS', 'agus', 'fdf169558242ee051cca1479770ebac3', 'admin', '2016-11-25 22:33:02', '');

-- ----------------------------
-- View structure for barang_laris
-- ----------------------------
DROP VIEW IF EXISTS `barang_laris`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `barang_laris` AS select `a`.`kode_barang` AS `kode_barang`,`a`.`nama_barang` AS `nama_barang`,count(`a`.`kode_barang`) AS `jumlah`,`a`.`satuan` AS `satuan` from (`tb_barang` `a` join `tb_detail_penjualan` `b`) where (`a`.`kode_barang` = `b`.`kode_barang`) group by `a`.`kode_barang` ;
DROP TRIGGER IF EXISTS `after_insert_tmp_beli`;
DELIMITER ;;
CREATE TRIGGER `after_insert_tmp_beli` AFTER INSERT ON `tb_detail_pembelian` FOR EACH ROW BEGIN
	DELETE FROM tb_detail_pembelian_tmp 
	WHERE kode_barang = NEW.kode_barang 
	AND petugas = NEW.petugas;
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `after_insert_delete_tmp`;
DELIMITER ;;
CREATE TRIGGER `after_insert_delete_tmp` AFTER INSERT ON `tb_detail_penjualan` FOR EACH ROW BEGIN
	DELETE FROM tb_detail_penjualan_tmp 
	WHERE kode_barang = NEW.kode_barang 
	AND petugas = NEW.petugas;
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `after_insert_penjualan`;
DELIMITER ;;
CREATE TRIGGER `after_insert_penjualan` AFTER INSERT ON `tb_penjualan` FOR EACH ROW BEGIN
	INSERT INTO tb_log(deskripsi, timestmp) 
	VALUES(CONCAT("<span class='w3-text-green'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>", NEW.no_transaksi), NOW());
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `after_delete_penjualan`;
DELIMITER ;;
CREATE TRIGGER `after_delete_penjualan` AFTER DELETE ON `tb_penjualan` FOR EACH ROW BEGIN
	INSERT INTO tb_log(deskripsi, timestmp) 
	VALUES(CONCAT("<span class='w3-text-red'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :", OLD.no_transaksi), NOW());
END
;;
DELIMITER ;
SET FOREIGN_KEY_CHECKS=1;
