<html>
    <?php
        include("abrirconexion.php");
        $id = isset($_POST['id']);
        $titulo = isset($_POST['titulo']);
        $vol = isset($_POST['vol']);
        $autores = isset($_POST['autores']);
        $editorial = isset($_POST['editorial']);
        $tienda = isset($_POST['tienda']);
        $tiendaOnline = isset($_POST['tienda_online']);
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
                $res = mysqli_query($conexion,"select * from v_busqueda_libros where id = '$id'");
                while($consulta = mysqli_fetch_array($res))
                {                    
                    $id = $consulta['id'];
                    $titulo = $consulta['titulo'];
                    $vol = $consulta['vol'];
                    $autores = $consulta['autores'];
                    $editorial = $consulta['editorial'];
                    $tienda = $consulta['tienda'];
                    $tiendaOnline = $consulta['tienda_online'];
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
            <h1>Lbros</h1>
        </center>
            <form method="POST" action="libros.php">
                <center>
                <label for = "txtId">ID: </label>
                <input type="text" name="txtId" id="Id" value = "<?php echo $id ?>">
                <br>
                <label for = "txtTitulo">Titulo: </label>
                <input type="text" name="txtTitulo" id="titulo" value = "<?php echo $titulo ?>">
                <br>
                <label for = "txtVol">Volumen: </label>
                <input type="text" name="txtVol" id="vol" value = "<?php echo $vol ?>">
                <br>
                <!--  -->
                <label for = "txtAutores">Autores: </label>
                <input type="text" name="txtAutores" id="autores" value = "<?php echo $autores ?>">
                <br>
                <label for = "txtEditorial">Editorial: </label>
                <input type="text" name="txtEditorial" id="editorial" value = "<?php echo $editorial ?>">
                <br>
                <label for = "txtTienda">Tienda: </label>
                <input type="text" name="txtTienda" id="tienda" value = "<?php echo $tienda ?>">
                <br>
                <label for = "txtTiendaOnline">Tienda Online: </label>
                <input type="text" name="txtTiendaOnline" id="tiendaOnline" value = "<?php echo $tiendaOnline ?>">
                <br>
                <label for = "txtPrecio">Precio: </label>
                <input type="text" name="txtPrecio" id="precio" value = "<?php echo $precio ?>">
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
                    $vol = "";
                    $autores = "";
                    $editorial = "";
                    $tienda = "";
                    $tiendaOnline = "";
                    $precio = "";

                if(isset($_POST['btnGuardar']))
                {
                    $id = $_POST['txtId'];
                    $titulo = $_POST['txtTitulo'];
                    $vol = $_POST['txtVol'];
                    $autores = $_POST['txtAutores'];
                    $editorial = $_POST['txtEditorial'];
                    $tienda = $_POST['txtTienda'];
                    $tiendaOnline = $_POST['txtTiendaOnline'];
                    $precio = $_POST['txtPrecio'];

                    //Actualizar
                    $res = mysqli_query($conexion, "select * from liros where id = '$id'");
                    
                    while($consulta = mysqli_fetch_array($res))
                    {
                        $id = $consulta['id'];
                    }
                    if($id != "")
                    {
                        $query = "update libros set titulo = '$titulo', vol = '$vol', autores = '$autores', editorial = '$editorial', tienda = '$tienda', tienda_online = '$tiendaOnline', precio = '$precio', where id = '$id'";
                        mysqli_query($conexion,$query);
                        echo "<script type =\"text/javascript\"> alert ('REGISTRO ACTUALIZADO.'); </script>";
                    }
                    else
                    {
                    
                        if($titulo == "" || $vol == "" || $autores == "" || $editorial == "" || $tienda == "" || $tiendaOnline == "" || $precio == "")
                        {
                            echo "Los Campos Son Obligatorios";
                        }
                        else
                        {
                            $res = mysqli_query($conexion,"select max(id) from libros");
                            $consulta = mysqli_fetch_array($res);
                            $maxid = $consulta[0];
                            $maxid++;
                            if($maxid == "")
                                $maxid = 1;
                            //Insertar Datos A La BD
                            mysqli_query($conexion,"INSERT INTO libros(id,titulo,vol,autores,editorial,tienda,tienda_online,precio) values('$maxid','$titulo',$vol,$autores,$editorial,$tienda,$tiendaOnline,$precio)");
                            echo "<script typle=\"text/javascript\"> alert ('REGISTRO GUARDADO.'); </script>";
                        } 
                    }  // `id`, `titulo`, `vol`, `autores`, `editorial`, `tienda`, `tienda_online`, `precio`
                }

                if(isset($_POST['btnActualizar']))
                {
                    $id = $_POST['txtId'];
                    $titulo = $_POST['txtTitulo'];
                    $vol = $_POST['txtVol'];
                    $autores = $_POST['txtAutores'];
                    $editorial = $_POST['txtEditorial'];
                    $tienda = $_POST['txtTienda'];
                    $tiendaOnline = $_POST['txtTiendaOnline'];
                    $precio = $_POST['txtPrecio'];
                    
                    //Actualizar
                    $res = mysqli_query($conexion, "select * from libros where id = '$id'");
                    
                    while($consulta = mysqli_fetch_array($res))
                    {
                        $id = $consulta['id'];
                    }
                    if($id != "")
                    {
                        $query = "update libros set titulo = '$titulo', vol = '$vol',autores = '$autores', editorial = '$editorial', tienda = '$tienda', tienda_online = '$tiendaOnline', precio = '$precio' where id = '$id'";
                        mysqli_query($conexion,$query);
                        echo "<script type =\"text/javascript\"> alert ('REGISTRO ACTUALIZADO.'); </script>";
                    }
                }// `id`, `titulo`, `vol`, `autores`, `editorial`, `tienda`, `tienda_online`, `precio`

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
                include("cerrarconexion.php");
            ?>
    </body>
</html>