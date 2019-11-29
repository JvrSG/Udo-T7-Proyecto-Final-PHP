<html>
    <?php
        include("abrirconexion.php");
        $idautor = isset($_POST['idautor']);
        $nombre = isset($_POST['nombre_autor']);

        if(isset($_POST['btnBuscar']))
        {
            $idautor = $_POST['txtId'];
            $existe = 0;
            if($idautor == " ")
            {
                echo "El Campo Id es Obligatorio";
            }
            else
            {
                //Buscar
                $res = mysqli_query($conexion,"select * from autores where idautor = '$idautor'");
                while($consulta = mysqli_fetch_array($res))
                {
                    $idautor = $consulta['idautor'];
                    $nombre = $consulta['nombre_autor'];
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
                <input type="text" name="txtId" id="Id" value = "<?php echo $idautor ?>">
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
                    $idautor = "";
                    $nombre = "";
                if(isset($_POST['btnGuardar']))
                {
                    $idautor = $_POST['txtId'];
                    $nombre = $_POST['txtAutor'];

                    if($nombre == "")
                    {
                        echo "Los Campos Son Obligatorios";
                    }
                    else
                    {
                        $res = mysqli_query($conexion,"select max(idautor) from autores");
                        $consulta = mysqli_fetch_array($res);
                        $maxid = $consulta[0];
                        $maxid++;
                        if($maxid == "")
                            $maxid = 1;
                        //Insertar Datos A La BD
                        mysqli_query($conexion,"INSERT INTO autores(idautor,nombre_autor) values('$maxid','$nombre')");
                        echo "<script typle=\"text/javascript\"> alert ('REGISTRO GUARDADO.'); </script>";
                    } 
                }

                if(isset($_POST['btnActualizar']))
                {
                    $idautor = $_POST['txtId'];
                    $nombre = $_POST['txtAutor'];
                    
                    //Actualizar
                    $res = mysqli_query($conexion, "select * from autores where idautor = '$idautor'");
                    
                    while($consulta = mysqli_fetch_array($res))
                    {
                        $idautor = $consulta['idautor'];
                    }
                    if($idautor != "")
                    {
                        $query = "update autores set nombre_autor = '$nombre' where idautor = '$idautor'";
                        mysqli_query($conexion,$query);
                        echo "<script type =\"text/javascript\"> alert ('REGISTRO ACTUALIZADO.'); </script>";
                    }
                }

                if(isset($_POST['btnEliminar']))
                {
                    $idautor = $_POST['txtId'];
                    $existe = 0;
                    if($idautor == 0)
                        echo "El Campo es Obligatorio";
                    else
                    {
                        $res = mysqli_query($conexion,"select * from autores where idautor = '$idautor'");
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
                            $query = "delete from autores where idautor = '$idautor'";
                            mysqli_query($conexion,$query);
                            echo "<script type =\"text/javascript\"> alert ('REGISTRO ELIMINADO.'); </script>";
                        }
                    }
                }
                include("cerrarconexion.php")
            ?>
    </body>
</html>