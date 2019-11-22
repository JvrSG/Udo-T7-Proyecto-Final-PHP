<?php
    session_start();
    if (session_destroy())
    {
        echo "sesion cerrada";
        header("Location: index.php"); // Convertirlo en mensaje de JS
        
    }
    else
        echo "algo anda mal"; // Convertirlo en mensaje de JS
?>