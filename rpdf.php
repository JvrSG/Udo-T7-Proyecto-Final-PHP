<?php
    //Libros
    include('Plantilla.php');
    include('abrirconexion.php');
    $query = "SELECT * FROM v_busqueda_libros";
    $res = mysqli_query($conexion, $query);

    $pdf = new PDF();
    $pdf -> AliasNbPages();
    $pdf -> AddPage('L');
    $pdf -> SetFont('Arial','B',12);
    $pdf -> Cell(100,15,"Reporte Libros",0,1,'C');

    $pdf -> SetFillColor(232,232,232);
    $pdf -> SetFont('Arial','B',12);
    $pdf -> Cell(20,6,'ID',1,0,'C',1);
    $pdf -> Cell(40,6,'TITULO',1,0,'C',1);
    $pdf -> Cell(40,6,'VOLUMEN',1,0,'C',1);
    $pdf -> Cell(30,6,'AUTOR',1,0,'C',1);
    $pdf -> Cell(40,6,'EDITORIALES',1,0,'C',1);
    $pdf -> Cell(20,6,'TIENDAS',1,0,'C',1);
    $pdf -> Cell(40,6,'TIENDAS ONLINE',1,0,'C',1);
    $pdf -> Cell(20,6,'PRECIO',1,1,'C',1);

    $pdf -> SetFont('Arial','',10);

    while ($row = mysqli_fetch_array($res)) 
    {
        $pdf -> Cell(20,6,utf8_decode($row['Id']),1,0,'C');
        $pdf -> Cell(40,6,$row['titulo'],1,0,'C');
        $pdf -> Cell(40,6,utf8_decode($row['volumen']),1,0,'C');
        $pdf -> Cell(30,6,utf8_decode($row['nombre_autor']),1,0,'C');
        $pdf -> Cell(40,6,utf8_decode($row['nombre_editorial']),1,0,'C');
        $pdf -> Cell(20,6,utf8_decode($row['nombre_tienda']),1,0,'C');
        $pdf -> Cell(40,6,utf8_decode($row['nombre_tonline']),1,0,'C');
        $pdf -> Cell(20,6,utf8_decode($row['precio']),1,1,'C');
    }

    //Autores
    $query = "SELECT * FROM autores";
    $res = mysqli_query($conexion, $query);

    $pdf -> SetFont('Arial','B',12);
    $pdf -> Cell(100,15,"Reporte Autores",0,2,'C');

    $pdf -> SetFillColor(232,232,232);
    $pdf -> SetFont('Arial','B',12);
    $pdf -> Cell(20,6,'ID',1,0,'C',1);
    $pdf -> Cell(60,6,'AUTOR',1,1,'C',1);

    $pdf -> SetFont('Arial','',10);

    while ($row = mysqli_fetch_array($res)) 
    {
        $pdf -> Cell(20,6,utf8_decode($row['idautor']),1,0,'C');
        $pdf -> Cell(60,6,$row['nombre_autor'],1,1,'C');
    }
    
    //Editoriales
    $query = "SELECT * FROM editorial";
    $res = mysqli_query($conexion, $query);

    $pdf -> SetFont('Arial','B',12);
    $pdf -> Cell(100,15,"Reporte Editoriales",0,3,'C');

    $pdf -> SetFillColor(232,232,232);
    $pdf -> SetFont('Arial','B',12);
    $pdf -> Cell(20,6,'ID',1,0,'C',1);
    $pdf -> Cell(60,6,'EDITORIAL',1,1,'C',1);

    $pdf -> SetFont('Arial','',10);

    while ($row = mysqli_fetch_array($res)) 
    {
        $pdf -> Cell(20,6,utf8_decode($row['ideditorial']),1,0,'C');
        $pdf -> Cell(60,6,$row['nombre_editorial'],1,1,'C');
    }
    require("cerrarconexion.php");
    $pdf ->Output();
?>