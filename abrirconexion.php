<?php
    $host = "localhost";
    $basededatos = "directorio";
    $usuariodb = "root";
    $password = "";

    $conexion = new mysqli($host,$usuariodb,$password,$basededatos);
    if($conexion -> connect_errno)
    {
        echo "Error de Conexion";
        exit();
    }
?>