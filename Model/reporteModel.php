<?php include_once 'baseDatosModel.php';

function obtenerDatosReporteVentas($idUsuario) {
    $conexion = AbrirBaseDatos();

    $sentencia = "CALL ObtenerReporteVentasXCliente('$idUsuario')";
    $respuesta = $conexion -> query($sentencia);
    CerrarBaseDatos($conexion);
    return $respuesta;
}
?>
