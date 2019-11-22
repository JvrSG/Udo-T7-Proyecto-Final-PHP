
<center>
<h2>Reportes</h2>
<button><a href="rpdf.php">Imprimir PDF</a></button>
</center>

<?php
    //libros
    include("abrirconexion.php");
    $consulta = "Select * From v_busqueda_libros";
    $resultado = mysqli_query($conexion, $consulta);
    
    echo "<table border = '2'>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>TITULO</th>";
    echo "<th>VOLUMEN</th>";
    echo "<th>AUTOR</th>";
    echo "<th>EDITORIALES</th>";
    echo "<th>TIENDAS</th>";
    echo "<th>TIENDAS ONLINE</th>";
    echo "<th>PRECIO</th>";
    echo "</tr>";
    
    while ($columna = mysqli_fetch_array($resultado))
    {
        echo "<tr>";
        echo "<td>" . $columna['id'] . "</td>";
        echo "<td>" . $columna['titulo'] . "</td>";
        echo "<td>" . $columna['vol'] . "</td>";
        echo "<td>" . $columna['autores'] . "</td>";
        echo "<td>" . $columna['editorial'] . "</td>";
        echo "<td>" . $columna['tienda'] . "</td>";
        echo "<td>" . $columna['tienda_online'] . "</td>";
        echo "<td>" . $columna['precio'] . "</td>";
        echo "</tr>";
    }
    
    
    echo "<h2>libros</h2>"; 
    include("cerrarconexion.php");
    
    ?>

<?php
    //Autores
    include("abrirconexion.php");
    $consulta = "Select * From autores";
    $resultado = mysqli_query($conexion, $consulta);
    
    echo "<table border = '2'>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>NOMBRE</th>";
    echo "</tr>";
    
    while ($columna = mysqli_fetch_array($resultado))
    {
        echo "<tr>";
        echo "<td>" . $columna['id'] . "</td>";
        echo "<td>" . $columna['nombre'] . "</td>";
        echo "</tr>";
    }
    
    echo "<h2>Autores</h2>";
    include("cerrarconexion.php");
    ?>

<?php
    //Editorial
    include("abrirconexion.php");
    $consulta = "Select * From editorial";
    $resultado = mysqli_query($conexion, $consulta);
    
    echo "<table border = '2'>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>NOMBRE</th>";
    echo "</tr>";
    
    while ($columna = mysqli_fetch_array($resultado))
    {
        echo "<tr>";
        echo "<td>" . $columna['id'] . "</td>";
        echo "<td>" . $columna['nombre'] . "</td>";
        echo "</tr>";
    }
    
    echo "<h2>Editorial</h2>";
    include("cerrarconexion.php");
?>


