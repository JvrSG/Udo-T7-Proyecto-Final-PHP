<html>
    <?php
        include("abrirconexion.php");
        $ideditorial = isset($_POST['ideditorial']);
        $nombre = isset($_POST['nombre_editorial']);

        if(isset($_POST['btnBuscar']))
        {
            $ideditorial = $_POST['txtId'];
            $existe = 0;
            if($ideditorial == "")
            {
                echo "El Campo Id es Obligatorio";
            }
            else
            {
                //Buscar
                $res = mysqli_query($conexion,"select * from editorial where ideditorial = '$ideditorial'");
                while($consulta = mysqli_fetch_array($res))
                {
                    $ideditorial = $consulta['ideditorial'];
                    $nombre = $consulta['nombre_editorial'];
                    $existe++;
                }
                if ($existe == 0) 
                    echo "<script type=\"text/javascript\"> alert ('La Editorial No Existe En La Base De Datos'); <script>";
            }
        }
        include("cerrarconexion.php")
    ?>
    <head>
        <title>Editoriales</title>
    </head>
    <body>
        <center>
            <h1>Editoriales</h1>
        </center>
            <form method="POST" action="editorial.php">
                <center>
                <label for = "txtId">ID: </label>
                <input type="text" name="txtId" id="Id" value = "<?php echo $ideditorial ?>">
                <br>
                <label for = "txtEditorial">Nombre: </label>
                <input type="text" name="txtEditorial" id="Editorial" value = "<?php echo $nombre ?>">
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
                    $ideditorial = "";
                    $nombre = "";
                if(isset($_POST['btnGuardar']))
                {
                    $ideditorial = $_POST['txtId'];
                    $nombre = $_POST['txtEditorial'];

                    if($nombre == "")
                    {
                        echo "Los Campos Son Obligatorios";
                    }
                    else
                    {
                        $res = mysqli_query($conexion,"select max(ideditorial) from editorial");
                        $consulta = mysqli_fetch_array($res);
                        $maxid = $consulta[0];
                        $maxid++;
                        if($maxid == "")
                            $maxid = 1;
                        //Insertar Datos A La BD
                        mysqli_query($conexion,"INSERT INTO editorial(ideditorial,nombre_editorial) values('$maxid','$nombre')");
                        echo "<script typle=\"text/javascript\"> alert ('REGISTRO GUARDADO.'); </script>";
                    }
                }

                if(isset($_POST['btnActualizar']))
                {
                    $ideditorial = $_POST['txtId'];
                    $nombre = $_POST['txtEditorial'];
                    
                    //Actualizar
                    $res = mysqli_query($conexion, "select * from editorial where ideditorial = '$ideditorial'");
                    
                    while($consulta = mysqli_fetch_array($res))
                    {
                        $ideditorial = $consulta['ideditorial'];
                    }
                    if($ideditorial != "")
                    {
                        $query = "update editorial set nombre_editorial = '$nombre' where ideditorial = '$ideditorial'";
                        mysqli_query($conexion,$query);
                        echo "<script type =\"text/javascript\"> alert ('REGISTRO ACTUALIZADO.'); </script>";
                    }
                }

                if(isset($_POST['btnEliminar']))
                {
                    $ideditorial = $_POST['txtId'];
                    $existe = 0;
                    if($ideditorial == 0)
                        echo "El Campo es Obligatorio";
                    else
                    {
                        $res = mysqli_query($conexion,"select * from editorial where ideditorial = '$ideditorial'");
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
                            $query = "delete from editorial where ideditorial = '$ideditorial'";
                            mysqli_query($conexion,$query);
                            echo "<script type =\"text/javascript\"> alert ('REGISTRO ELIMINADO.'); </script>";
                        }
                    }
                }
                include("cerrarconexion.php");
            ?>
    </body>
</html>