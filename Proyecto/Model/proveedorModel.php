<?php include_once 'baseDatosModel.php';
    function ConsultarUsuarioBD($IdUsuario)
    {
        $conexion = AbrirBaseDatos();
        $sentencia = "CALL ConsultarUsuario('$IdUsuario')";
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

    function RegistrarProveedores($Descripcion)
    {
        $conexion = AbrirBaseDatos();
        $sentencia = "CALL AgregarProveedor('$Descripcion')";
        $respuesta = $conexion -> query($sentencia);
        CerrarBaseDatos($conexion);
        return $respuesta;
    }

    function ConsultarProveedoresDB()
    {
        $conexion = AbrirBaseDatos();
        $sentencia = "CALL ConsultarProveedores()";
        $respuesta = $conexion -> query($sentencia);
        CerrarBaseDatos($conexion);
        return $respuesta;
    }

    function ConsultarProveedorDB($IdProveedor)
    {
        $conexion = AbrirBaseDatos();
        $sentencia = "CALL consultarProveedor('$IdProveedor')";
        $respuesta = $conexion -> query($sentencia);
        CerrarBaseDatos($conexion);
        return $respuesta;
    }

    function ActualizarProveedor($IdProveedor,$Descripcion)
    {
        $conexion = AbrirBaseDatos();
        $sentencia = "CALL editarProveedor('$IdProveedor','$Descripcion')";
        $respuesta = $conexion -> query($sentencia);
        CerrarBaseDatos($conexion);
        return $respuesta;
    }