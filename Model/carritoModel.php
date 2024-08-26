<?php include_once 'baseDatosModel.php';

function RegistrarCarrito($Consecutivo,$IdProducto,$Cantidad)
{
    $conexion = AbrirBaseDatos();
    $sentencia = "CALL agregarCarrito('$Consecutivo','$IdProducto','$Cantidad')";
    $respuesta = $conexion -> query($sentencia);
    CerrarBaseDatos($conexion);
    return $respuesta;
}

function ConsultarResumenCarritoBD($Consecutivo)
{
    $conexion = AbrirBaseDatos();
    $sentencia = "CALL ConsultarResumenCarrito('$Consecutivo')";
    $respuesta = $conexion -> query($sentencia);
    CerrarBaseDatos($conexion);
    return $respuesta;
}

function ConsultarCarritoBD($Consecutivo)
{
    $conexion = AbrirBaseDatos();
    $sentencia = "CALL ConsultarCarrito('$Consecutivo')";
    $respuesta = $conexion -> query($sentencia);
    CerrarBaseDatos($conexion);
    return $respuesta;
}

function ValidarExistenciasPago($Consecutivo)
{
    $conexion = AbrirBaseDatos();
    $sentencia = "CALL ValidarExistenciasPago('$Consecutivo')";
    $respuesta = $conexion -> query($sentencia);
    CerrarBaseDatos($conexion);
    return $respuesta;
}

function PagarCarrito($Consecutivo)
{
    $conexion = AbrirBaseDatos();
    $sentencia = "CALL PagarCarrito('$Consecutivo')";
    $respuesta = $conexion -> query($sentencia);
    CerrarBaseDatos($conexion);
    return $respuesta;
}

function EliminarProductoCarrito($Consecutivo, $IdProducto)
{
    $conexion = AbrirBaseDatos();
    $sentencia = "CALL EliminarProductoCarrito('$Consecutivo','$IdProducto')";
    $respuesta = $conexion -> query($sentencia);
    CerrarBaseDatos($conexion);
    return $respuesta;
}

?>  