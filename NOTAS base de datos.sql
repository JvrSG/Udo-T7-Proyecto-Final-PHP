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
    autores int,
    editorial int,
    tienda int,
    tienda_online int,
    precio double) ENGINE=INNODB;

create table autores(
    id int NOT null,
    nombre varchar(100)) ENGINE=INNODB;




-- LOS "INSERT" DE PRUEBA

INSERT INTO `usuarios`(`id`, `usuario`, `password`, `nivel`) VALUES (1,'base','123',1);

-- IMPLEMENTACION DE LAS VISTAS

create view v_busqueda_libros
AS
select l.Id,
    l.titulo,
    l.autores,
    l.editorial,
    l.tienda,
    l.tienda_online,
    l.precio
        from libros l 
            inner join autores a 
            on a.id = l.autores
            inner join editorial e
            on e.id = l.editorial
            inner join tienda t 
            on t.id = l.tienda
            inner join tienda_online o
            on o.id = l.tienda_online;



-- MISCELANEO

-- mas campos en libros para sus relaciones
USE directorio;
DROP TABLE libros;
create table libros(
    id int NOT NULL,
    titulo varchar(100),
    vol int,
    autores int,
    editorial int,
    tienda int,
    tienda_online int,
    precio double) ENGINE=INNODB;