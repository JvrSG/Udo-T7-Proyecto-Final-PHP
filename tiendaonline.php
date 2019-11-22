<html>
    <?php
        include("abrirconexion.php");
        $id = isset($_POST['id']); //
        $nombre = isset($_POST['nombre']); //
        $link = isset($_POST['link']);

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
                $res = mysqli_query($conexion,"select * tienda_online where id = '$id'");
                while($consulta = mysqli_fetch_array($res)) //
                {
                    $id = $consulta['id'];
                    $nombre = $consulta['Nombre'];
                    $link = $consulta['link']; 
                    $existe++;
                }
                if ($existe == 0) 
                    echo "<script type=\"text/javascript\"> alert ('La Tienda online No Existe En La Base De Datos'); <script>";
            }
        }
        include("cerrarconexion.php")
    ?>
    <head>
        <title>Tienda online</title>
    </head>
    <body>
        <center>
            <h1>Tiendas online</h1>
        </center>
            <form method="POST" action="tiendaonline.php">
                <center>
                <label for = "txtId">ID: </label>
                <input type="text" name="txtId" id="Id" value = "<?php echo $id ?>">
                <br>
                <label for = "txtTienda">Nombre: </label>
                <input type="text" name="txtTienda" id="tiendaonline" value = "<?php echo $nombre ?>">
                <br>
                <label for = "txtlink">Link: </label>
                <input type="text" name="txtlink" id="link" value = "<?php echo $link ?>">
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
                    $link = "";
                if(isset($_POST['btnGuardar']))
                {
                    $id = $_POST['txtId'];
                    $nombre = $_POST['txtTienda'];
                    $link = $_POST['txtlink'];

                    //Actualizar
                    $res = mysqli_query($conexion, "select * from tienda_online where id = '$id'");
                    
                    while($consulta = mysqli_fetch_array($res))
                    {
                        $id = $consulta['id'];
                    }
                    if($id != "")
                    {
                        $query = "UPDATE 'tienda_online' SET nombre = '$nombre', link = '$link' where id = '$id'";
                        // UPDATE `tienda_online` SET `id`=[value-1],`nombre`=[value-2],`link`=[value-3] WHERE 1
                        mysqli_query($conexion,$query);
                        echo "<script type =\"text/javascript\"> alert ('REGISTRO ACTUALIZADO.'); </script>";
                    }
                    else
                    {
                    
                        if($nombre == "" || $link == "")
                        {
                            echo "Los Campos Son Obligatorios";
                        }
                        else
                        {
                            $res = mysqli_query($conexion,"select max(id) from tienda_online");
                            $consulta = mysqli_fetch_array($res);
                            $maxid = $consulta[0];
                            $maxid++;
                            if($maxid == "")
                                $maxid = 1;
                            //Insertar Datos A La BD
                            mysqli_query($conexion,"INSERT INTO tienda_online(id,nombre,link) values($maxid,'$nombre','$link')");
                            echo "<script typle=\"text/javascript\"> alert ('REGISTRO GUARDADO.'); </script>";
                        } 
                    }  
                }

                if(isset($_POST['btnActualizar']))
                {
                    $id = $_POST['txtId'];
                    $nombre = $_POST['txtTienda'];
                    $link = $_POST['txtlink'];
                    
                    //Actualizar
                    $res = mysqli_query($conexion, "select * from tienda_online where id = '$id'");
                    
                    while($consulta = mysqli_fetch_array($res))
                    {
                        $id = $consulta['id'];
                    }
                    if($id != "")
                    {
                        $query = "update tienda_tienda set nombre = '$nombre', link = '$link' where id = '$id'";
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
                        $res = mysqli_query($conexion,"select * from tienda_online where id = '$id'");
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
                            $query = "delete from tienda_online where id = '$id'";
                            mysqli_query($conexion,$query);
                            echo "<script type =\"text/javascript\"> alert ('REGISTRO ELIMINADO.'); </script>";
                        }
                    }
                }
                include("cerrarconexion.php");
            ?>
    </body>
</html>