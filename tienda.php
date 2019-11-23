<html>
    <?php
        include("abrirconexion.php");
        $idtienda = isset($_POST['idtienda']);
        $nombre = isset($_POST['nombre_tienda']);
        $direccion = isset($_POST['direccion']);

        if(isset($_POST['btnBuscar']))
        {
            $idtienda = $_POST['txtId'];
            $existe = 0;
            if($id == "")
            {
                echo "El Campo Id es Obligatorio";
            }
            else
            {
                //Buscar
                $res = mysqli_query($conexion,"select * from tienda where idtienda = '$idtienda'");
                while($consulta = mysqli_fetch_array($res))
                {
                    $idtienda = $consulta['idtienda'];
                    $nombre = $consulta['nombre_tienda'];
                    $direccion = $consulta['direccion'];
                    $existe++;
                }
                if ($existe == 0) 
                    echo "<script type=\"text/javascript\"> alert ('La Tienda No Existe En La Base De Datos'); <script>";
            }
        }
        include("cerrarconexion.php")
    ?>
    <head>
        <title>Tienda</title>
    </head>
    <body>
        <center>
            <h1>Tiendas</h1>
        </center>
            <form method="POST" action="tienda.php">
                <center>
                <label for = "txtId">ID: </label>
                <input type="text" name="txtId" id="Id" value = "<?php echo $idtienda ?>">
                <br>
                <label for = "txtTienda">Nombre: </label>
                <input type="text" name="txtTienda" id="tienda" value = "<?php echo $nombre ?>">
                <br>
                <label for = "txtdireccion">Direccion: </label>
                <input type="text" name="txtdireccion" id="Direccion" value = "<?php echo $direccion ?>">
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
                    $idtienda = "";
                    $nombre = "";
                    $direccion = "";
                if(isset($_POST['btnGuardar']))
                {
                    $idtienda = $_POST['txtId'];
                    $nombre = $_POST['txtTienda'];
                    $direccion = $_POST['txtdireccion'];

                    //Actualizar
                    $res = mysqli_query($conexion, "select * from tienda where idtienda = '$idtienda'");
                    
                    while($consulta = mysqli_fetch_array($res))
                    {
                        $idtienda = $consulta['idtienda'];
                    }
                    if($idtienda != "")
                    {
                        $query = "update tienda set nombre_tienda = '$nombre', direccion = '$direccion' where idtienda = '$idtienda'";
                        mysqli_query($conexion,$query);
                        echo "<script type =\"text/javascript\"> alert ('REGISTRO ACTUALIZADO.'); </script>";
                    }
                    else
                    {
                    
                        if($nombre == "" || $direccion == "")
                        {
                            echo "Los Campos Son Obligatorios";
                        }
                        else
                        {
                            $res = mysqli_query($conexion,"select max(idtienda) from tienda");
                            $consulta = mysqli_fetch_array($res);
                            $maxid = $consulta[0];
                            $maxid++;
                            if($maxid == "")
                                $maxid = 1;
                            //Insertar Datos A La BD
                            mysqli_query($conexion,"INSERT INTO tienda(idtienda,nombre_tienda,direccion) values('$maxid','$nombre','$direccion')");
                            echo "<script typle=\"text/javascript\"> alert ('REGISTRO GUARDADO.'); </script>";
                        } 
                    }  
                }

                if(isset($_POST['btnActualizar']))
                {
                    $idtienda = $_POST['txtId'];
                    $nombre = $_POST['txtTienda'];
                    $direccion = $_POST['txtdireccion'];
                    
                    //Actualizar
                    $res = mysqli_query($conexion, "select * from tienda where idtienda = '$idtienda'");
                    
                    while($consulta = mysqli_fetch_array($res))
                    {
                        $idtienda = $consulta['idtienda'];
                    }
                    if($idtienda != "")
                    {
                        $query = "update tienda set nombre_tienda = '$nombre', direccion = '$direccion' where idtienda = '$idtienda'";
                        mysqli_query($conexion,$query);
                        echo "<script type =\"text/javascript\"> alert ('REGISTRO ACTUALIZADO.'); </script>";
                    }
                }

                if(isset($_POST['btnEliminar']))
                {
                    $idtienda = $_POST['txtId'];
                    $existe = 0;
                    if($idtienda == 0)
                        echo "El Campo es Obligatorio";
                    else
                    {
                        $res = mysqli_query($conexion,"select * from tienda where idtienda = '$idtienda'");
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
                            $query = "delete from tienda where idtienda = '$idtienda'";
                            mysqli_query($conexion,$query);
                            echo "<script type =\"text/javascript\"> alert ('REGISTRO ELIMINADO.'); </script>";
                        }
                    }
                }
                include("cerrarconexion.php");
            ?>
    </body>
</html>