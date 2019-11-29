<html>
    <?php
        include("abrirconexion.php");
        $id = isset($_POST['id']);
        $nombre = isset($_POST['Nombre']);

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
                $res = mysqli_query($conexion,"select * from v_busqueda_libros where id = '$id'");
                while($consulta = mysqli_fetch_array($res))
                {
                    $id = $consulta['id'];
                    $nombre = $consulta['Nombre'];
                    $existe++;
                }
                if ($existe == 0) 
                    echo "<script type=\"text/javascript\"> alert ('El Autor No Existe En La Base De Datos'); <script>";
            }
        }
        include("cerrarconexion.php")
    ?>
    <head>
        <title>Autores</title>
    </head>
    <body>
        <center>
            <h1>Autores</h1>
        </center>
            <form method="POST" action="autores.php">
                <center>
                <label for = "txtId">ID: </label>
                <input type="text" name="txtId" id="Id" value = "<?php echo $id ?>">
                <br>
                <label for = "txtAutor">Nombre: </label>
                <input type="text" name="txtAutor" id="Autor" value = "<?php echo $nombre ?>">
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
                    $nombre = "";
                if(isset($_POST['btnGuardar']))
                {
                    $id = $_POST['txtId'];
                    $nombre = $_POST['txtAutor'];

                    //Actualizar
                    $res = mysqli_query($conexion, "select * from autores where id = '$id'");
                    
                    while($consulta = mysqli_fetch_array($res))
                    {
                        $id = $consulta['id'];
                    }
                    if($id != "")
                    {
                        $query = "update autores set nombre = '$nombre' where id = '$id'";
                        mysqli_query($conexion,$query);
                        echo "<script type =\"text/javascript\"> alert ('REGISTRO ACTUALIZADO.'); </script>";
                    }
                    else
                    {
                    
                        if($id == "" || $nombre == "")
                        {
                            echo "Los Campos Son Obligatorios";
                        }
                        else
                        {
                            $res = mysqli_query($conexion,"select MAX(id) from autores");
                            $consulta = mysqli_fetch_array($res);
                            $maxid = $consulta[0];
                            $maxid++;
                            if($maxid == "")
                                $maxid = 1;
                            //Insertar Datos A La BD
                            mysqli_query($conexion,"INSERT INTO autores(id,nombre) values('$maxid','$nombre')");
                            echo "<script typle=\"text/javascript\"> alert ('REGISTRO GUARDADO.'); </script>";
                        } 
                    }  
                }

                if(isset($_POST['btnActualizar']))
                {
                    $id = $_POST['txtId'];
                    $nombre = $_POST['txtAutor'];
                    
                    //Actualizar
                    $res = mysqli_query($conexion, "select * from autores where id = '$id'");
                    
                    while($consulta = mysqli_fetch_array($res))
                    {
                        $id = $consulta['id'];
                    }
                    if($id != "")
                    {
                        $query = "UPDATE autores SET nombre = '$nombre' where id = '$id'";
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
                        $res = mysqli_query($conexion,"select * from autores where id = '$id'");
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
                            $query = "delete from autores where id = '$id'";
                            mysqli_query($conexion,$query);
                            echo "<script type =\"text/javascript\"> alert ('REGISTRO ELIMINADO.'); </script>";
                        }
                    }
                }
                include("cerrarconexion.php");
            ?>
    </body>
</html>