<?php
    include('Plantilla.php');
    include('abrirconexion.php');
    $query = "SELECT * FROM vbusquedalibros";
    $res = mysqli_query($conexion, $query);

    $pdf = new PDF();
    $pdf -> AliasNbPages();
    $pdf -> AddPage();

    $pdf -> SetFillColor(232,232,232);
    $pdf -> SetFont('Arial','B',12);
    $pdf -> Cell(20,6,'ID',1,0,'C',1);
    $pdf -> Cell(60,6,'TITULO',1,0,'C',1);
    $pdf -> Cell(60,6,'VOLUMEN',1,1,'C',1);
    $pdf -> Cell(60,6,'AUTOR',1,2,'C',1);
    $pdf -> Cell(60,6,'EDITORIALES',1,3,'C',1);
    $pdf -> Cell(60,6,'TIENDAS',1,4,'C',1);
    $pdf -> Cell(60,6,'TIENDAS ONLINE',1,5,'C',1);
    $pdf -> Cell(60,6,'PRECIO',1,6,'C',1);

    $pdf -> SetFont('Arial','',10);

    while ($row = mysqli_fetch_array($res)) 
    {
        $pdf -> Cell(20,6,utf8_decode($row['id']),1,0,'C');
        $pdf -> Cell(60,6,$row['titulo'],1,0,'C');
        $pdf -> Cell(60,6,utf8_decode($row['volumen']),1,1,'C');
        $pdf -> Cell(60,6,utf8_decode($row['autor']),1,1,'C');
        $pdf -> Cell(60,6,utf8_decode($row['editoriales']),1,1,'C');
        $pdf -> Cell(60,6,utf8_decode($row['tiendas']),1,1,'C');
        $pdf -> Cell(60,6,utf8_decode($row['tiendasoline']),1,1,'C');
        $pdf -> Cell(60,6,utf8_decode($row['precio']),1,1,'C');
    }
    require("cerrarconexion.php");
    $pdf ->Output();
?>