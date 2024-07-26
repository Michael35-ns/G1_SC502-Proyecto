<?php

    function AbrirBaseDatos()
    {
        return mysqli_connect('localhost', 'root', '', 'arenal_frames_bd');
    }

    function CerrarBaseDatos($conexion)
    {
        mysqli_close($conexion);
    }
?>