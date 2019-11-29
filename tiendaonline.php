<html>
    <?php
        include("abrirconexion.php");
        $id = isset($_POST['idtonline']); //
        $nombre = isset($_POST['nombre_tonline']); //
        $link = isset($_POST['link']);
        
        if(isset($_POST['btnBuscar']))
        {
            $id = $_POST['txtIdtonline'];
            $existe = 0;
            if($id == "")
            {
                echo "El Campo Id es Obligatorio";
            }
            else
            {
                //Buscar
                $res = mysqli_query($conexion,"select * from tiendaonline where idtonline = '$id'");
                while($consulta = mysqli_fetch_array($res)) //
                {
                    $id = $consulta['idtonline'];
                    $nombre = $consulta['nombre_tonline'];
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
                <input type="text" name="txtIdtonline" id="Id" value = "<?php echo $id; ?>">
                <br>
                <label for = "txtTienda">Nombre: </label>
                <input type="text" name="txtTiendaOnline" id="Nombre" value = "<?php echo $nombre; ?>">
                <br>
                <label for = "txtlink">Link: </label>
                <input type="text" name="txtlink" id="link" value = "<?php echo $link; ?>">
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
                    $id = $_POST['txtIdtonline'];
                    $nombre = $_POST['txtTiendaOnline'];
                    $link = $_POST['txtlink'];
                    
                    if($nombre == "" || $link == "")
                    {
                        echo "Los Campos Son Obligatorios";
                    }
                    else
                    {
                        $res = mysqli_query($conexion,"select max(idtonline) from tiendaonline");
                        $consulta = mysqli_fetch_array($res);
                        $maxid = $consulta[0];
                        $maxid++;
                        if($maxid == "")
                            $maxid = 1;
                        //Insertar Datos A La BD
                        mysqli_query($conexion,"INSERT INTO tiendaonline(idtonline,nombre_tonline,link) values('$maxid','$nombre','$link')");
                        echo "<script typle=\"text/javascript\"> alert ('REGISTRO GUARDADO.'); </script>";
                    }
                }

                if(isset($_POST['btnActualizar']))
                {
                    $id = $_POST['txtIdtonline'];
                    $nombre = $_POST['txtTiendaOnline'];
                    $link = $_POST['txtlink'];
                    
                    //Actualizar
                    $res = mysqli_query($conexion, "select * from tiendaonline where idtonline = '$id'");
                    
                    while($consulta = mysqli_fetch_array($res))
                    {
                        $id = $consulta['idtonline'];
                    }
                    if($id != "")
                    {
                        $query = "UPDATE tiendaonline set nombre_tonline = '$nombre', link = '$link' where idtonline = '$id'";
                        mysqli_query($conexion,$query);
                        echo "<script type =\"text/javascript\"> alert ('REGISTRO ACTUALIZADO.'); </script>";
                    }
                }

                if(isset($_POST['btnEliminar']))
                {
                    $id = $_POST['txtIdtonline'];
                    $existe = 0;
                    if($id == 0)
                        echo "El Campo es Obligatorio";
                    else
                    {
                        $res = mysqli_query($conexion,"select * from tiendaonline where idtonline = '$id'");
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
                            $query = "delete from tiendaonline where idtonline = '$id'";
                            mysqli_query($conexion,$query);
                            echo "<script type =\"text/javascript\"> alert ('REGISTRO ELIMINADO.'); </script>";
                        }
                    }
                }
                include("cerrarconexion.php")
            ?>
    </body>
</html>