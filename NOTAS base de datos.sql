-- Windows 10 
-- XAMMP 7.3.8
-- phpMyAdmin 4.9.0.1 
-- mysql Ver 15.1 Distrib 10.4.6-MariaDB, for Win64 (AMD64)


-- ///////////////////////////////////////////


-- CREACION DE LA BASE DE DATOS

CREATE DATABASE directorio;
USE directorio;

-- CREACION DE TABLAS

create table usuarios(
	id int not null,
	usuario varchar(100) not null,
	password varchar(100) not null,
	nivel int not null) ENGINE=INNODB;

create table tienda_online(
	id int not null,
	nombre varchar(100) not null,
	link varchar(100) not null) ENGINE=INNODB;

create table editorial(
    id int NOT NULL,
    nombre varchar(100)) ENGINE=INNODB;

create table tienda(
    id int NOT null,
    nombre varchar(100),
    direccion varchar(200)) ENGINE=INNODB;

create table libros(
    id int NOT NULL,
    titulo varchar(100),
    vol int,
    precio double) ENGINE=INNODB;

create table autores(
    id int NOT null,
    nombre varchar(100)) ENGINE=INNODB;




-- LOS "INSERT" DE PRUEBA

INSERT INTO `usuarios`(`id`, `usuario`, `password`, `nivel`) VALUES (1,'base','123',1);

-- IMPLEMENTACION DE LAS VISTAS


-- MISCELANEO