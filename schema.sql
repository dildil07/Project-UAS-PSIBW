DROP DATABASE IF EXISTS sia;
CREATE DATABASE sia;
USE sia;

CREATE TABLE IF NOT EXISTS `accounts` (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
  	`email` varchar(50) NOT NULL,
  	`password` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nim` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

CREATE TABLE dosen (
 id_dosen int(11) NOT NULL AUTO_INCREMENT,
 nama varchar(100) NOT NULL,
 alamat varchar(100) NOT NULL,
 PRIMARY KEY (`id_dosen`)
 );
 

CREATE TABLE fakultas (
 id_fakultas int(11) NOT NULL AUTO_INCREMENT,
 nama_fakultas varchar(100) NOT NULL,
PRIMARY KEY (`id_fakultas`)
 );
 
CREATE TABLE jurusan (
 id_jurusan int(11) NOT NULL AUTO_INCREMENT,
 nama_jurusan varchar(100) NOT NULL,
PRIMARY KEY (`id_jurusan`)
 );

CREATE TABLE matakuliah (
 id_matakuliah int(11) NOT NULL AUTO_INCREMENT,
 nama_matakuliah varchar(100) NOT NULL,
PRIMARY KEY (`id_matakuliah`)
 );