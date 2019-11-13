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
    $pdf -> Cell(60,6,'AUTOR',1,1,'C',1);

    $pdf -> SetFont('Arial','',10);

    while ($row = mysqli_fetch_array($res)) 
    {
        $pdf -> Cell(20,6,utf8_decode($row['id']),1,0,'C');
        $pdf -> Cell(60,6,$row['Titulo'],1,0,'C');
        $pdf -> Cell(60,6,utf8_decode($row['Autor']),1,1,'C');
    }
    require("cerrarconexion.php");
    $pdf ->Output();
?>