<?php include_once 'baseDatosModel.php';
    function ProductosXCategoria($idCategoria)
    {
        $conexion = AbrirBaseDatos();
        $sentencia = "CALL ProductosXCategoria('$idCategoria')";
        $respuesta = $conexion -> query($sentencia);
        CerrarBaseDatos($conexion);
        return $respuesta;
    }
    function VistaProducto()
    {
        $conexion = AbrirBaseDatos();
        $sentencia = "CALL ConsultarProductos()";
        $respuesta = $conexion -> query($sentencia);
        CerrarBaseDatos($conexion);
        return $respuesta;
    }

    function RegistrarProducto($Nombre,$Precio,$IdMaterial,$IdCategoria)
    {
        $conexion = AbrirBaseDatos();
        $sentencia = "CALL AgregarProducto('$Nombre','$Precio',$IdMaterial,$IdCategoria)";
        $respuesta = $conexion -> query($sentencia);
        CerrarBaseDatos($conexion);
        return $respuesta;
    }