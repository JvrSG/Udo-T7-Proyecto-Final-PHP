<?php
    //Libros
    include('Plantilla.php');
    include('abrirconexion.php');
    $query = "SELECT * FROM v_busqueda_libros";
    $res = mysqli_query($conexion, $query);

    $pdf = new PDF();
    $pdf -> AliasNbPages();
    $pdf -> AddPage('L');

    $pdf -> SetFont('Arial', 'B', 12);
    $pdf -> Cell(100,15,"Reporte Libros",0,2,'C');

    $pdf -> SetFillColor(232,232,232);
    $pdf -> SetFont('Arial','B',12);
    $pdf -> Cell(15,6,'ID',1,0,'C',1);
    $pdf -> Cell(50,6,'TITULO',1,0,'C',1);
    $pdf -> Cell(30,6,'VOLUMEN',1,0,'C',1);
    $pdf -> Cell(20,6,'AUTOR',1,0,'C',1);
    $pdf -> Cell(30,6,'EDITORIALES',1,0,'C',1);
    $pdf -> Cell(40,6,'TIENDAS',1,0,'C',1);
    $pdf -> Cell(50,6,'TIENDAS ONLINE',1,0,'C',1);
    $pdf -> Cell(20,6,'PRECIO',1,1,'C',1);

    $pdf -> SetFont('Arial','',10);

    while ($row = mysqli_fetch_array($res)) 
    {
        $pdf -> Cell(15,6,utf8_decode($row['id']),1,0,'C');
        $pdf -> Cell(50,6,$row['titulo'],1,0,'C');
        $pdf -> Cell(30,6,utf8_decode($row['vol']),1,0,'C');
        $pdf -> Cell(20,6,utf8_decode($row['autores']),1,0,'C');
        $pdf -> Cell(30,6,utf8_decode($row['editorial']),1,0,'C');
        $pdf -> Cell(40,6,utf8_decode($row['tienda']),1,0,'C');
        $pdf -> Cell(50,6,utf8_decode($row['tienda_online']),1,0,'C');
        $pdf -> Cell(20,6,utf8_decode($row['precio']),1,1,'C');
    }



    //Autores
    $query = "SELECT * FROM autores";
    $res = mysqli_query($conexion, $query);

    $pdf -> SetFont('Arial', 'B', 12);
    $pdf -> Cell(100,15,"Reporte Autores",0,2,'C');

    $pdf -> SetFillColor(232,232,232);
    $pdf -> SetFont('Arial','B',12);
    $pdf -> Cell(20,6,'ID',1,0,'C',1);
    $pdf -> Cell(60,6,'AUTOR',1,1,'C',1);

    $pdf -> SetFont('Arial','',10);

    while ($row = mysqli_fetch_array($res)) 
    {
        $pdf -> Cell(20,6,utf8_decode($row['id']),1,0,'C');
        $pdf -> Cell(60,6,$row['nombre'],1,1,'C');
    }

    //Editorial
    $query = "SELECT * FROM editorial";
    $res = mysqli_query($conexion, $query);

    $pdf -> SetFont('Arial', 'B', 12);
    $pdf -> Cell(100,15,"Reporte Editorial",0,2,'C');

    $pdf -> SetFillColor(232,232,232);
    $pdf -> SetFont('Arial','B',12);
    $pdf -> Cell(20,6,'ID',1,0,'C',1);
    $pdf -> Cell(60,6,'EDITORIAL',1,1,'C',1);

    $pdf -> SetFont('Arial','',10);

    while ($row = mysqli_fetch_array($res)) 
    {
        $pdf -> Cell(20,6,utf8_decode($row['id']),1,0,'C');
        $pdf -> Cell(60,6,$row['nombre'],1,1,'C');
    }
    require("cerrarconexion.php");
    $pdf ->Output();
?>