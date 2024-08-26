<?php include_once 'baseDatosModel.php';
function VerCategorias()
{
        $conexion = AbrirBaseDatos();
        $sentencia = "CALL obtenerCategorias()";
        $respuesta = $conexion -> query($sentencia);
        CerrarBaseDatos($conexion);
        return $respuesta;
}

function VerMateriales()
{
        $conexion = AbrirBaseDatos();
        $sentencia = "CALL obtenerMaterial()";
        $respuesta = $conexion -> query($sentencia);
        CerrarBaseDatos($conexion);
        return $respuesta;
}