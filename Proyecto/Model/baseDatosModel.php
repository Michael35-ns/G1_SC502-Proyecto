<?php

    function AbrirBaseDatos()
    {
        return mysqli_connect('127.0.0.1:3308', 'root', '', 'arenal_frames_bd');
    }

    function CerrarBaseDatos($conexion)
    {
        mysqli_close($conexion);
    }
?>