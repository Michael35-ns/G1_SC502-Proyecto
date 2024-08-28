<?php include_once 'baseDatosModel.php';

function VerFacturas($idUsuario)
{
    $conexion = AbrirBaseDatos();
    $sentencia = "CALL verFactura($idUsuario)";
    $respuesta = $conexion -> query($sentencia);
    CerrarBaseDatos($conexion);
    return $respuesta;
}

function VerDetalles($idMaestro)
{
    $conexion = AbrirBaseDatos();
    $sentencia = "CALL verDetalle($idMaestro)";
    $respuesta = $conexion -> query($sentencia);
    CerrarBaseDatos($conexion);
    return $respuesta;
}

function VerFacturaPorMaestro($idMaestro)
{
    $conexion = AbrirBaseDatos();
    $sentencia = "CALL verFacturaPorMaestro($idMaestro)";
    $respuesta = $conexion -> query($sentencia);
    CerrarBaseDatos($conexion);
    return $respuesta;
}
