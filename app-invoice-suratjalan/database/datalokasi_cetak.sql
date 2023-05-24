# Host: localhost  (Version 5.5.5-10.1.38-MariaDB)
# Date: 2021-01-04 08:36:50
# Generator: MySQL-Front 6.0  (Build 1.163)


#
# Structure for table "data_barang_dp"
#

DROP TABLE IF EXISTS `data_barang_dp`;
CREATE TABLE `data_barang_dp` (
  `IdDP` int(11) NOT NULL AUTO_INCREMENT,
  `no_invoice` int(11) DEFAULT NULL,
  `uang_muka` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`IdDP`),
  KEY `data_barang_dp_ibfk_2` (`no_invoice`),
  CONSTRAINT `data_barang_dp_ibfk_2` FOREIGN KEY (`no_invoice`) REFERENCES `invoice` (`no_invoice`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "data_barang_dp"
#


#
# Structure for table "invoice"
#

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE `invoice` (
  `Id_Invoice` int(11) NOT NULL AUTO_INCREMENT,
  `no_invoice` int(11) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `nama_customer` varchar(30) DEFAULT NULL,
  `alamat_customer` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_Invoice`),
  KEY `no_invoice` (`no_invoice`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "invoice"
#


#
# Structure for table "data_barang"
#

DROP TABLE IF EXISTS `data_barang`;
CREATE TABLE `data_barang` (
  `IdBarang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(30) DEFAULT NULL,
  `harga_satuan` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `no_invoice` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdBarang`),
  KEY `no_invoice` (`no_invoice`),
  CONSTRAINT `data_barang_ibfk_2` FOREIGN KEY (`no_invoice`) REFERENCES `invoice` (`no_invoice`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "data_barang"
#


#
# Structure for table "user"
#

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(30) DEFAULT NULL,
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `level` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "user"
#

INSERT INTO `user` VALUES (3,'Administrator','admin','admin','Administrator'),(4,'Asep Tomcat','tomcat','050577','Administrator'),(5,'tanti','ajizah','598188','Administrator');
