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


-- usuario
INSERT INTO `usuarios`(`id`, `usuario`, `password`, `nivel`) VALUES (1,'base','123',1);

-- libros
INSERT INTO `libros` (`id`, `titulo`, `vol`, `autores`, `editorial`, `tienda`, `tienda_online`, `precio`) VALUES 
('1', 'The Ancient Magus Bride', '1', '3', '1', '1', '1', '109'),
('2', 'The Seven Deadly Sins', '5', '1', '1', '3', '3', '85'),
('3', 'Kamisama Darling', '3', '5', '2', '2', '2', '110');

-- autores
INSERT INTO `autores` (`id`, `nombre`) VALUES
(1, 'Nakaba Suzuki'),
(2, 'Eiichiro Oda'),
(3, 'Kore Yamazaki'),
(4, 'CLAMP'),
(5, 'Kyoko Aiba');


-- editorial
INSERT INTO `editorial`(`id`, `nombre`) VALUES (1,'Panini Manga'),(2,'Kamite Manga');

-- tienda
INSERT INTO `tienda` (`id`, `nombre`, `direccion`) VALUES
(1, 'Dokkan', 'Francisco gonzalez bocanegra esq. con educación, MZ Plaza las Glorias, local #7, Col. Las Huertas. (1,15 km) 81075 Guasave'),
(2, 'Junopi Shop', 'Calle General Ángel Flores 317 (136,88 km) 80000 Culiacan'),
(3, 'Mexicómics', 'FrikiPlaza,Local #12 en el Sótano, Eje Central Lazaro Cardenas # 9, Col. Centro y Friki-Plaza Republica de Uruguay #17 local 152 primer piso, Col. Centro. (1.176,17 km) 06050 Ciudad de México');

-- tienda online
INSERT INTO `tienda_online`(`id`, `nombre`, `link`) VALUES (1,'panini comics','http://comics.panini.com.mx/store/pub_mex_es_magazines/manga.html'),(2,'editorial kamite','https://kamite.com.mx/13-mangas'),(3,'Mangrabreria','https://www.mangraberia.com');


-- IMPLEMENTACION DE LAS VISTAS

create view v_busqueda_libros
AS
select l.Id,
    l.titulo,
    l.volumen,
    l.autor,
    a.nombre_autor,
    l.editoriales,
    e.nombre_editorial,
    l.tiendas,
    t.nombre_tienda,
    l.tiendasonline,
    o.nombre_tiendaonline,
    l.precio
        from libros l 
            inner join autores a 
            on a.idautor = l.autor
            inner join editorial e
            on e.ideditorial = l.editoriales
            inner join tienda t 
            on t.idtienda = l.tiendas
            inner join tiendaonline o
            on o.idtonline = l.tiendasonline;

-- MISCELANEO

-- mas campos en libros para sus relaciones

-- USE directorio;
-- DROP TABLE libros;
-- create table libros(
--     id int NOT NULL,
--     titulo varchar(100),
--     vol int,
--     autores int,
--     editorial int,
--     tienda int,
--     tienda_online int,
--     precio double) ENGINE=INNODB;