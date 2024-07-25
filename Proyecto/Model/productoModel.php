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

    function RegistrarProducto($Nombre,$Precio,$material,$categoria,$img,$Existencias)
    {
        $conexion = AbrirBaseDatos();
        $sentencia = "CALL AgregarProducto('$Nombre','$Precio','$material','$categoria','$img','$Existencias')";
        $respuesta = $conexion -> query($sentencia);
        CerrarBaseDatos($conexion);
        return $respuesta;
    }

    function ConsultarProductoBD($IdProducto)
    {
        $conexion = AbrirBaseDatos();
        $sentencia = "CALL consultarProducto('$IdProducto')";
        $respuesta = $conexion -> query($sentencia);
        CerrarBaseDatos($conexion);
        return $respuesta;
    }

    function ActualizarProducto($idProducto,$Nombre,$Precio,$img,$Categoria,$Material,$Existencias)
    {
        $conexion = AbrirBaseDatos();
        $sentencia = "CALL editarProducto('$idProducto','$Nombre','$Precio','$Material','$Categoria','$img','$Existencias')";
        $respuesta = $conexion -> query($sentencia);
        CerrarBaseDatos($conexion);
        return $respuesta;
    }

    function eliminarProducto($idProducto)
    {
        $conexion = AbrirBaseDatos();
        $sentencia = "CALL eliminarProducto('$idProducto')";
        $respuesta = $conexion -> query($sentencia);
        CerrarBaseDatos($conexion);
        return $respuesta;
    }

