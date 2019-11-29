<?php
    $host = "localhost";
    $basededatos = "directorio";

    $usuariodb = "root";
    // $usuariodb = "base";

    $password = "";
    // $password = "123";

    $conexion = new mysqli($host,$usuariodb,$password,$basededatos);
    // $conexion = mysqli_connect($host,$usuariodb,$password,$basededatos);
    // $conexion = new mysqli("localhost","root","","directorio");
                
    if($conexion->connect_errno)
    {
        echo "Error de Conexion";
        exit();
    }
?>