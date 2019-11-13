<?php
    include("abrirconexion.php");
    $consulta = "Select * From vbusquedalibros";
    $resultado = mysqli_query($conexion, $consulta);

    echo "<table border = '2'>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>TITULO</th>";
    echo "<th>AUTOR</th>";
    echo "</tr>";

    while ($columna = mysqli_fetch_array($resultado))
    {
        echo "<tr>";
        echo "<td>" . $columna['id'] . "</td><td>" . $columna['Titulo'] . "</td>";
        echo "<td>" . $columna['Nombre'] . "</td>";
        echo "</tr>";
    }

    include("cerrarconexion.php");
?>
<button><a href="rpdf.php">Imprimir PDF</a></button>