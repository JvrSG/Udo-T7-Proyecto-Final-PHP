<?php
    include("abrirconexion.php");
    session_start();

    $user_check = $_SESSION['login_user'];
    $ses_sql = "Select Usuario from usuarios where Usuario = '$user_check'";
    $resultados = mysqli_query($conexion, $ses_sql);

    $row = mysqli_fetch_array($resultados);

    $login_session = $row['Usuario'];

    if(!isset($_SESSION['login_user']))
    {
        header("location:index.php");
    }
?>