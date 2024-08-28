<?php include_once 'comunController.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Proyecto/Model/facturaModel.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Proyecto/Controller/comunController.php';
    $modelPath = (strpos(__DIR__, 'Controller') !== false) ? __DIR__ . '../../Model/carritoModel.php' :
        __DIR__ . '/../Model/carritoModel.php';

    if (file_exists($modelPath)) {
        include_once($modelPath);
    } else {
        echo "Error: No se pudo incluir el archivo productoModel.php";
    }

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_POST["RegistrarCarrito"])) {
        $IdProducto = $_POST["IdProducto"];
        $Cantidad = $_POST["Cantidad"];

        RegistrarCarrito($_SESSION["IdUsuario"], $IdProducto, $Cantidad);
  
        echo "Producto añadido correctamente al carrito";
    }

    function ConsultarResumenCarrito($currentPage)
    {
        $respuesta = ConsultarResumenCarritoBD($_SESSION["IdUsuario"]);
        $row = mysqli_fetch_array($respuesta);
        $_SESSION["Cantidad"] = $row["Cantidad"];
        $_SESSION["SubTotal"] = $row["SubTotal"];
        $_SESSION["Impuesto"] = $row["Impuesto"];
        $_SESSION["Total"] = $row["Total"];
        
        if($row["Cantidad"]!=0 && $currentPage!="/Proyecto/View/Modulo-Productos/checkout.php"){
          echo '
        <div class="col-2 align-self-center">
          <h5 class="mb-1">Cantidad</h5>
          <h3 class="mb-0">'.$row["Cantidad"].'</h2>
        </div>
        <div class="col-2 align-self-center">
          <h5 class="h5 mb-1">Subtotal</h5>
          <h3 class="h3 mb-0">₡'.number_format($row["SubTotal"], 0, ',', '.').'</h3>
        </div>
        <div class="col-6 align-self-center"></div>
        <div class="col-2 align-self-center">
                <a href="/Proyecto/View/Modulo-Productos/checkout.php" class="col-12 btn btn-inverse-success btn-block font-weight-medium btn-rounded">Ver Carrito</a>
              </div>
        <br>
        <br>
        <br>
</div>';
        }

        
    }

    function RealizarPagoCarrito()
    {
        if ($_SESSION["Total"] != "0") {
            // Formatea el total
            $subtotal = number_format($_SESSION["SubTotal"], 2);
            $impuesto = number_format($_SESSION["Impuesto"], 2);
            $total = number_format($_SESSION["Total"], 2);
            
            // Imprime la tarjeta que actuará como botón de pago
            echo '
            <div class="fixed">
                <form action="" method="POST">
                    <div class="col-lg-12 d-flex stretch-card">
                        <div class="card card-container-arenal" style="border-radius: 20px;">
                            <div class="card-body">
                                <h5 style="color: #007bff;">Subtotal: <b>¢' . $subtotal . '</b></h5>
                                <h5 style="color: #007bff;">IVA: <b>¢' . $impuesto . '</b></h5>
                                <h3 style="color: #007bff;">Total: <b>¢' . $total . '</b></h3>
                            </div>
                                <a class="btn btn-inverse-success btn-rounded btn-lg pay-button" style="width:200px" onclick="IniciarPago(' . $_SESSION["IdUsuario"] . ');">Pagar<i class="mdi mdi-arrow-right" style="position: fixed;"></i></a>
                            </div>
                            
                        </div>
                    </div>
                </form>
            </div>';
        } else {
            echo '
                <div class="col-lg-12 d-flex grid-margin stretch-card">
                    <div class="card bg-primary navbar-blur2">
                        <div class="card-body" style="text-align: center;">
                            <h3 style="color: black;">No hay artículos en su carrito</h3>
                            <a href="/Proyecto/View/Modulo-Productos/productos.php">
                                <button class="btn btn-inverse-success btn-rounded btn-lg back-button" style="width:200px"><i class="mdi mdi-arrow-left" style="position: fixed; left: 50px;"></i>Productos</button>
                            </a>
                        </div>
                    </div>
                </div>
            ';
        }
    }

    function ConsultarCarrito()
    {
        $respuesta = ConsultarCarritoBD($_SESSION["IdUsuario"]);
       
        if($respuesta -> num_rows > 0)
        {
          echo '<div class="card-container">';
            while ($row = mysqli_fetch_array($respuesta)) 
            { 

                echo '
                  <div class="card card-product">
                      
                      <img src="' . $row["url_img"] . '" class="card-img-top" alt="Imagen del Producto">
                      <div class="card-body navbar-blur2">
                          <h5 class="card-title">' . $row["nombre_producto"] . '</h5>
                          <p class="card-text">Cantidad: ' . $row["Cantidad"] . '</p>
                          <p class="card-text">Precio: ₡'.number_format($row["precio"], 0, ',', '.'). '</p>
                          <p class="card-price">Subtotal: ₡'.number_format($row["SubTotal"], 0, ',', '.'). '</p>
                          <p style="font-size: 10px;">**IVA no incluído</p>
                      </div>
                      <button class="btn btn-inverse-danger AbrirModal" data-toggle="modal" data-target="#ModalCarrito" 
                        data-id=' . $row["id_producto"] . ' data-name="' . $row["nombre_producto"] . '">
                          <h5>Eliminar</h5>
                      </button>
                  </div>';
            }
          echo '</div>';
          
        }
    }

    if(isset($_POST["btnEliminarProductoCarrito"]))
    {
        $IdProducto = $_POST["txtIdProducto"];

        EliminarProductoCarrito($_SESSION["IdUsuario"],$IdProducto);
        header("location: /Proyecto/View/Modulo-Productos/checkout.php");
    }  

    if (isset($_POST["PagarCarrito"])) {
        $IdUsuario = $_SESSION["IdUsuario"];
        $respuesta = ValidarExistenciasPago($IdUsuario);
    
        if ($respuesta->num_rows <= 0) {
            $completo = PagarCarrito($IdUsuario);
            if ($completo->num_rows > 0) {
                $row = mysqli_fetch_array($completo);

                $IdMaestro = $row["id_maestro"];
    
                ob_start();
    
                $detalle = VerDetalles($row["id_maestro"]);
    
                if ($detalle->num_rows > 0) {
                    while ($row = mysqli_fetch_array($detalle)) {
                        echo '<tr class="text-center">';
                        echo '<td>' . $row["NOMBRE_PRODUCTO"] . "</td>";
                        echo "<td>" . $row["CANTIDAD"] . "</td>";
                        echo "<td> ₡ " . number_format($row["PRECIO"], 0, ',', '.')  . "</td>";
                        echo "</tr>";
                    }
                }
    
                $htmlContent = ob_get_clean();


                $factura = VerFacturaPorMaestro($IdMaestro);
                $fila = mysqli_fetch_array($factura);
                $NombreUsuario = $fila["NOMBRE_USUARIO"];
                $TotalPagado = $fila["TOTAL_PAGADO"];
                $Fecha = $fila["FECHA_FACTURA"];
                

                $contenido = '<!DOCTYPE html>
                    <html lang="es">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Factura</title>
                    </head>
                    <body>
                        <div class="invoice-container">
                            <div class="invoice-header">
                                <h1>Arenal Frames</h1>
                            </div>
                            <div class="invoice-details">
                                <div>
                                    <h2>Detalles del Cliente</h2>
                                    <p><strong>Nombre: </strong>' . $NombreUsuario . '</p>
                                    <p><strong>Correo: </strong>' . $_SESSION["Correo"] . '</p>
                                </div>
                                <div>
                                    <h2>Detalles de la Factura</h2>
                                    <p><strong>Factura N° :</strong>' . $IdMaestro . '</p>
                                    <p><strong>Fecha de Emisión: </strong>' . $Fecha . '</p>
                                </div>
                            </div>
                            <table class="invoice-table">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio Unitario</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    ' . $htmlContent . '
                                </tbody>
                            </table>
                            <div class="invoice-summary">
                                <div>
                                    <p><span>Total: </span><strong>₡' . $TotalPagado . '</strong></p>
                                    <p style="font-size: 12px; color: gray;"><strong></strong>**IVA incluído en el total</p>
                                </div>
                            </div>
                            <div class="invoice-footer">
                                <p>Gracias por su compra!</p>
                                <p>Si tiene alguna pregunta, no dude en contactarnos en <a href="mailto:arenal.framescr@outlook.com">arenal.framescr@outlook.com</a></p>
                            </div>
                        </div>
                    </body>
                    </html>';
    
                EnviarCorreo('Factura', $contenido, $_SESSION["Correo"]);
                echo "Compra realizada con éxito, se le ha enviado un correo con la factura";
            } else {
                echo "No se pudo realizar la compra";
            }
        } else {
            echo "No se pudo realizar la compra";
        }
    }
    
    
    
?>
    
    
    
