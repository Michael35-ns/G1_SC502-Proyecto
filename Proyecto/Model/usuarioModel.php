<?php include_once 'baseDatosModel.php';
    function RegistrarUsuario($Nombre,$Email,$Password,$Username)
    {
        $conexion = AbrirBaseDatos();
        $sentencia = "CALL RegistrarUsuario('$Nombre','$Username','$Email','$Password')";
        $respuesta = $conexion -> query($sentencia);
        CerrarBaseDatos($conexion);
        return $respuesta;
    }

    function IniciarSesion($Credencial,$Password)
    {
        $conexion = AbrirBaseDatos();
        $sentencia = "CALL IniciarSesion('$Credencial','$Password')";
        $respuesta = $conexion -> query($sentencia);
        CerrarBaseDatos($conexion);
        return $respuesta;
    }

    function AgregarTokenAUsuario($IdUsuario,$Token,$Expiracion)
    {
        $conexion = AbrirBaseDatos();
        $sentencia = "CALL AgregarTokenAUsuario('$IdUsuario','$Token','$Expiracion')";
        $respuesta = $conexion -> query($sentencia);
        CerrarBaseDatos($conexion);
        return $respuesta;
    }

    function ValidarUsuario($dato)
    {
        $conexion = AbrirBaseDatos();
        $sentencia = "CALL ValidarUsuario('$dato')";
        $respuesta = $conexion -> query($sentencia);
        CerrarBaseDatos($conexion);
        return $respuesta;
    }

    function ValidarExpiracion($Token)
    {
        $conexion = AbrirBaseDatos();
        $sentencia = "CALL ValidarExpiracion('$Token')";
        $respuesta = $conexion -> query($sentencia);
        CerrarBaseDatos($conexion);
        return $respuesta;
    }

    function ActualizarContrasenna($idUsuario, $Contrasenna)
    {
        $conexion = AbrirBaseDatos();
        $sentencia = "CALL ActualizarContrasenna('$idUsuario','$Contrasenna')";
        $respuesta = $conexion -> query($sentencia);
        CerrarBaseDatos($conexion);
        return $respuesta;
    }

    function ConsultarUsuariosBD($ConsecutivoLogueado)
    {
        $conexion = AbrirBaseDatos();
        $sentencia = "CALL ConsultarUsuarios('$ConsecutivoLogueado')";
        $respuesta = $conexion -> query($sentencia);
        CerrarBaseDatos($conexion);
        return $respuesta;
    }

    function ConsultarUsuarioBD($IdUsuario)
    {
        $conexion = AbrirBaseDatos();
        $sentencia = "CALL ConsultarUsuario('$IdUsuario')";
        $respuesta = $conexion -> query($sentencia);
        CerrarBaseDatos($conexion);
        return $respuesta;
    }

    function CambiarEstadoUsuario($Consecutivo)
    {
        $conexion = AbrirBaseDatos();
        $sentencia = "CALL CambiarEstadoUsuario('$Consecutivo')";
        $respuesta = $conexion -> query($sentencia);
        CerrarBaseDatos($conexion);
        return $respuesta;
    }

    function ActualizarUsuario($IdUsuario,$Nombre,$Correo,$Username)
    {
        $conexion = AbrirBaseDatos();
        $sentencia = "CALL ActualizarUsuario('$IdUsuario','$Nombre','$Correo','$Username')";
        $respuesta = $conexion -> query($sentencia);
        CerrarBaseDatos($conexion);
        return $respuesta;
    }
