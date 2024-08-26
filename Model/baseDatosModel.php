<?php

    function AbrirBaseDatos()
    {
        return mysqli_connect('localhost', 'root', '', 'arenal_frames_db');
    }

    function CerrarBaseDatos($conexion)
    {
        mysqli_close($conexion);
    }
?>