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

    function RegistrarProducto($Nombre,$Precio,$img)
    {
        $conexion = AbrirBaseDatos();
        $sentencia = "CALL AgregarProducto('$Nombre','$Precio','$img')";
        $respuesta = $conexion -> query($sentencia);
        CerrarBaseDatos($conexion);
        return $respuesta;
    }