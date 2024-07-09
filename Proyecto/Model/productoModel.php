<?php include_once 'baseDatosModel.php';
    function ConsultarProducto()
    {
        $conexion = AbrirBaseDatos();
        $sentencia = "CALL GetProducts()";
        $respuesta = $conexion -> query($sentencia);
        CerrarBaseDatos($conexion);
        return $respuesta;
    }