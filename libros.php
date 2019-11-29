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
                <input type="text" name="txtId" id="Id" value = "<?php echo $id ?>">
                <br>
                <label for = "txtTitulo">Titulo: </label>
                <input type="text" name="txtTitulo" id="Titulo" value = "<?php echo $titulo ?>">
                <br>
                <label for = "txtVol">Volumen: </label>
                <input type="text" name="txtVol" id="Volumen" value = "<?php echo $volumen ?>">
                <br>
                <!--  -->
                <label for = "ddlAutor">Autor: </label>
                <select type="select" name="ddlAutor" id="Autor">
                    <?php
                        include("abrirconexion.php");
                        if($autor != "")
                        {
                            $res = mysqli_query($conexion, "select * from autores where idautor = '$idautor'");
                            if(mysqli_num_rows($res)>0)
                            while($reg = mysqli_fetch_assoc($res))
                            {
                                echo '<option selected ="'.$reg['idautor'].'">';
                                echo $reg['nombre_autor'];
                                echo '</option>';
                            }
                        }
                        $res = mysqli_query($conexion,"select idautor, nombre_autor from autores where idautor <> '$idautor'");
                        if(mysqli_num_rows($res)>0)
                        while ($reg = mysqli_fetch_assoc($res)) 
                        {
                            echo '<option selected = "'.$reg['idautor'].'">';
                            echo $reg['nombre_autor'];
                            echo '</option>';
                        }
                        include("cerrarconexion.php");
                    ?>
                </select>
                <br>
                <label for = "ddlEditorial">Editorial: </label>
                <select type="select" name="ddlEditorial" id="Editorial">
                    <?php
                        include("abrirconexion.php");
                        if($editoriales != "")
                        {
                            $res = mysqli_query($conexion, "select * from editorial where idediitorial = '$ideditorial'");
                            if(mysqli_num_rows($res)>0)
                            while($reg = mysqli_fetch_assoc($res))
                            {
                                echo '<option selected ="'.$reg['ideditorial'].'">';
                                echo $reg['nombre_editorial'];
                                echo '</option>';
                            }
                        }
                        $res = mysqli_query($conexion,"select ideditorial, nombre_editorial from editorial where ideditorial <> '$ideditorial'");
                        if(mysqli_num_rows($res)>0)
                        while ($reg = mysqli_fetch_assoc($res)) 
                        {
                            echo '<option selected = "'.$reg['ideditorial'].'">';
                            echo $reg['nombre_editorial'];
                            echo '</option>';
                        }
                        include("cerrarconexion.php");
                    ?>
                </select>
                <br>
                <label for = "ddlTienda">Tienda: </label>
                <select type="select" name="ddlTienda" id="Tienda">
                    <?php
                        include("abrirconexion.php");
                        if($tiendas != "")
                        {
                            $res = mysqli_query($conexion, "select * from tienda where idtienda = '$idtienda'");
                            if(mysqli_num_rows($res)>0)
                            while($reg = mysqli_fetch_assoc($res))
                            {
                                echo '<option selected ="'.$reg['idtienda'].'">';
                                echo $reg['nombre_tienda'];
                                echo '</option>';
                            }
                        }
                        $res = mysqli_query($conexion,"select idtienda, nombre_tienda from tienda where idtienda <> '$idtienda'");
                        if(mysqli_num_rows($res)>0)
                        while ($reg = mysqli_fetch_assoc($res)) 
                        {
                            echo '<option selected = "'.$reg['idtienda'].'">';
                            echo $reg['nombre_tienda'];
                            echo '</option>';
                        }
                        include("cerrarconexion.php");
                    ?>
                </select>
                <br>
                <label for = "txtTiendaOnline">Tienda Online: </label>
                <select type="select" name="ddlTiendaOnline" id="TiendaOnline">
                    <?php
                        include("abrirconexion.php");
                        if($tiendas != "")
                        {
                            $res = mysqli_query($conexion, "select * from tiendaonline where idtonline = '$idtonline'");
                            if(mysqli_num_rows($res)>0)
                            while($reg = mysqli_fetch_assoc($res))
                            {
                                echo '<option selected ="'.$reg['idtonline'].'">';
                                echo $reg['nombre_tonline'];
                                echo '</option>';
                            }
                        }
                        $res = mysqli_query($conexion,"select idtonline, nombre_tonline from tiendaonline where idtonline <> '$idtonline'");
                        if(mysqli_num_rows($res)>0)
                        while ($reg = mysqli_fetch_assoc($res)) 
                        {
                            echo '<option selected = "'.$reg['idtonline'].'">';
                            echo $reg['nombre_tonline'];
                            echo '</option>';
                        }
                        include("cerrarconexion.php");
                    ?>
                </select>
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
                    $autor = $_POST['ddlAutor'];
                    $editoriales = $_POST['ddlEditorial'];
                    $tiendas = $_POST['ddlTienda'];
                    $tiendasOnline = $_POST['ddlTiendaOnline'];
                    $precio = $_POST['txtPrecio'];
                    
                    if($titulo == "" || $volumen == "" || $autor == "" || $editoriales == "" || $tiendas == "" || $tiendasOnline == "" || $precio == "")
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
                        mysqli_query($conexion,"INSERT INTO libros(id,titulo,volumen,autor,editoriales,tiendas,tiendasonline,precio) values('$maxid','$titulo',$volumen,$autor,$editoriales,$tiendas,$tiendasOnline,$precio)");
                        echo "<script typle=\"text/javascript\"> alert ('REGISTRO GUARDADO.'); </script>";
                    }   // `id`, `titulo`, `volumen`, `autores`, `editorial`, `tienda`, `tienda_online`, `precio`
                }

                if(isset($_POST['btnActualizar']))
                {
                    $id = $_POST['txtId'];
                    $titulo = $_POST['txtTitulo'];
                    $volumen = $_POST['txtVol'];
                    $autor = $_POST['ddlAutor'];
                    $editoriales = $_POST['ddlEditorial'];
                    $tiendas = $_POST['ddlTienda'];
                    $tiendasOnline = $_POST['ddlTiendaOnline'];
                    $precio = $_POST['txtPrecio'];
                    
                    //Actualizar
                    $res = mysqli_query($conexion, "select * from libros where id = '$id'");
                    
                    while($consulta = mysqli_fetch_array($res))
                    {
                        $id = $consulta['id'];
                    }
                    if($id != "")
                    {
                        $query = "update libros set titulo = '$titulo', volumen = '$volumen',autor = '$autor', editoriales = '$editoriales', tiendas = ''$tiendas, tiendasonline = '$tiendasOnline', precio = '$precio' where id = '$id'";
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