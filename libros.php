<html>
    <?php
        include("abrirconexion.php");
        $id = isset($_POST['id']);
        $titulo = isset($_POST['titulo']);
        $volumen = isset($_POST['volumen']);
        $autor = isset($_POST['autor']);
        $editoriales = isset($_POST['editoriales']);
        $tiendas = isset($_POST['tiendas']);
        $tiendasOnline = isset($_POST['tiendasonline']);
        $precio = isset($_POST['precio']);

        if(isset($_POST['btnBuscar']))
        {
            $id = $_POST['txtId'];
            $existe = 0;
            if($id == "")
            {
                echo "El Campo Id es Obligatorio";
            }
            else
            {
                //Buscar
                $res = mysqli_query($conexion,"select * from v_busqueda_libros where Id = '$id'");
                while($consulta = mysqli_fetch_array($res))
                {                    
                    $id = $consulta['Id'];
                    $titulo = $consulta['titulo'];
                    $volumen = $consulta['volumen'];
                    $autor = $consulta['autor'];
                    $editoriales = $consulta['editoriales'];
                    $tiendas = $consulta['tiendas'];
                    $tiendasOnline = $consulta['tiendasonline'];
                    $precio = $consulta['precio'];
                    $existe++;
                }
                if ($existe == 0) 
                    echo "<script type=\"text/javascript\"> alert ('El libro No Existe En La Base De Datos'); <script>";
            }
        }
        include("cerrarconexion.php")
    ?>
    <head>
        <title>Libros</title>
    </head>
    <body>
        <center>
            <h1>Libros</h1>
        </center>
            <form method="POST" action="libros.php">
                <center>
                <label for = "txtId">ID: </label>
                <input type="text" name="txtId" id="Id" value = "<?php echo $id; ?>">
                <br>
                <label for = "txtTitulo">Titulo: </label>
                <input type="text" name="txtTitulo" id="Titulo" value = "<?php echo $titulo; ?>">
                <br>
                <label for = "txtVol">Volumen: </label>
                <input type="text" name="txtVol" id="Volumen" value = "<?php echo $volumen; ?>">
                <br>
                <!--  -->
                <label for = "txtAutor">Autor: </label>
                <input type="text" name="txtAutor" id="Autor" value="<?php echo $autor; ?>">
                <br>
                <label for = "txtEditorial">Editorial: </label>
                <input type="text" name="txtEditorial" id="Editorial" value="<?php echo $editoriales; ?>">
                <br>
                <label for = "txtTienda">Tienda: </label>
                <input type="text" name="txtTienda" id="Tienda" value="<?php echo $tiendas; ?>">
                <br>
                <label for = "txtTiendaOnline">Tienda Online: </label>
                <input type="text" name="txtTiendaOnline" id="TiendaOnline" value="<?php echo $tiendasOnline; ?>">
                <br>
                <label for = "txtPrecio">Precio: </label>
                <input type="text" name="txtPrecio" id="Precio" value = "<?php echo $precio ?>">
                <br>
                </center>
                <center>
                <input type="submit" value="Guardar" name="btnGuardar">
                <input type="submit" value="Buscar" name="btnBuscar">
                <input type="submit" value="Actualizar" name="btnActualizar">
                <input type="submit" value="Eliminar" name="btnEliminar">
                </center>
            </form>
            <?php
                include("abrirconexion.php");
                    $id = "";
                    $titulo = "";
                    $volumen = "";
                    $autor = "";
                    $editoriales = "";
                    $tiendas = "";
                    $tiendasOnline = "";
                    $precio = "";

                if(isset($_POST['btnGuardar']))
                {
                    $id = $_POST['txtId'];
                    $titulo = $_POST['txtTitulo'];
                    $volumen = $_POST['txtVol'];
                    $autor = $_POST['txtAutor'];
                    $editoriales = $_POST['txtEditorial'];
                    $tiendas = $_POST['txtTienda'];
                    $tiendasOnline = $_POST['txtTiendaOnline'];
                    $precio = $_POST['txtPrecio'];
                    
                    if($titulo == "" || $volumen == "" || $autor == "" || $editoriales == "" || $tiendas == "" || $tiendasOnline == "" || $precio == "")
                    {
                        echo "Los Campos Son Obligatorios";
                    }
                    else
                    {
                        $res = mysqli_query($conexion,"select MAX(id) from libros");
                        $consulta = mysqli_fetch_array($res);
                        $maxid = $consulta[0];
                        $maxid++;
                        if($maxid == "")
                            $maxid = 1;
                        //Insertar Datos A La BD
                        mysqli_query($conexion,"INSERT INTO libros(id,titulo,volumen,autor,editoriales,tiendas,tiendasonline,precio) 
                        VALUES('$maxid','$titulo','$volumen','$autor','$editoriales','$tiendas','$tiendasOnline','$precio')");
                        echo "<script typle=\"text/javascript\"> alert ('REGISTRO GUARDADO.'); </script>";
                    } 
                }

                if(isset($_POST['btnActualizar']))
                {
                    $id = $_POST['txtId'];
                    $titulo = $_POST['txtTitulo'];
                    $volumen = $_POST['txtVol'];
                    $autor = $_POST['txtAutor'];
                    $editoriales = $_POST['txtEditorial'];
                    $tiendas = $_POST['txtTienda'];
                    $tiendasOnline = $_POST['txtTiendaOnline'];
                    $precio = $_POST['txtPrecio'];
                    
                    //Actualizar
                    $res = mysqli_query($conexion, "SELECT * from libros where id = '$id'");
                    
                    while($consulta = mysqli_fetch_array($res))
                    {
                        $id = $consulta['id'];
                    }
                    if($id != "")
                    {
                        $query = "UPDATE libros SET titulo = '$titulo', volumen = '$volumen',autor = '$autor', editoriales = '$editoriales', tiendas = '$tiendas', tiendasonline = '$tiendasOnline', precio = '$precio' where id = '$id'";
                        mysqli_query($conexion,$query);
                        echo "<script type =\"text/javascript\"> alert ('REGISTRO ACTUALIZADO.'); </script>";
                    }
                }

                if(isset($_POST['btnEliminar']))
                {
                    $id = $_POST['txtId'];
                    $existe = 0;
                    if($id == 0)
                        echo "El Campo es Obligatorio";
                    else
                    {
                        $res = mysqli_query($conexion,"select * from libros where id = '$id'");
                        while($consulta = mysqli_fetch_array($res))
                        {
                            $existe++;
                        }
                        if($existe == 0)
                        {
                            echo "El Id No Existe.";
                        }
                        else
                        {
                            //Eliminar
                            $query = "delete from libros where id = '$id'";
                            mysqli_query($conexion,$query);
                            echo "<script type =\"text/javascript\"> alert ('REGISTRO ELIMINADO.'); </script>";
                        }
                    }
                }
                include("cerrarconexion.php")
            ?>
    </body>
</html>