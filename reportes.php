<button><a href="rpdf.php">Imprimir PDF</a></button>

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
        echo "<td>" . $columna['Id'] . "</td>";
        echo "<td>" . $columna['titulo'] . "</td>";
        echo "<td>" . $columna['volumen'] . "</td>";
        echo "<td>" . $columna['autor'] . "</td>";
        echo "<td>" . $columna['editoriales'] . "</td>";
        echo "<td>" . $columna['tiendas'] . "</td>";
        echo "<td>" . $columna['tiendasonline'] . "</td>";
        echo "<td>" . $columna['precio'] . "</td>";
        echo "</tr>";
    }
    
    echo "<h2>Libros</h2>";
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
        echo "<td>" . $columna['idautor'] . "</td>";
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
        echo "<td>" . $columna['ideditorial'] . "</td>";
        echo "<td>" . $columna['nombre'] . "</td>";
        echo "</tr>";
    }
    
    echo "<h2>Editorial</h2>";
    include("cerrarconexion.php");
?>