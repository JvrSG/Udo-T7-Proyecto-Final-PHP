<?php
    session_start();
    if (session_destroy())
    {
        echo "sesion cerrada";
        header("Location: index.php");
        
    }
    else
        echo "algo anda mal";
?>