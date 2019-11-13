<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <form action="" method="post">
    <center>
        <label>Usuario</label>
        <br>
        <input type="text" name="txtUsuario"/><br><br>
        <label>Contraseña</label>
        <br>
        <input type="password" name="txtPassword"/><br><br>
        <input type="submit" value="Iniciar Sesion" name="btnAceptar"/>
    </center>
    </form>
</body>
</html>

<?php
    if (isset($_POST['btnAceptar'])) 
    {
        $User = $_POST['txtUsuario'];
        $Password = $_POST['txtPassword'];
        include("abrirconexion.php");
        session_start();

        $sql = "SELECT id FROM usuario WHERE Usuario = '$User' and Password = '$Password'";
        $result = mysqli_query($conexion,$sql);
        $row = mysqli_fetch_array($result);
        $count = mysqli_num_rows($result);

        if ($count == 1) 
        {
            $_SESSION['login_user'] = $User;

            header("location: libros.php");
        }
        else
            echo "Usuario O Contraseña Invalidos";
    }
?>