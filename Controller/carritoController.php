<?php include_once 'comunController.php';
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

    if(isset($_POST["btnPagarCarrito"]))
    {
        $IdUsuario = $_SESSION["IdUsuario"];

        $respuesta = ValidarExistenciasPago($IdUsuario);

        if($respuesta -> num_rows <= 0)
        {
            PagarCarrito($IdUsuario);
            header("location: /Proyecto/View/home.php");
        }
        else
        {
            $_POST["msj"] = "En su carrito hay " . $respuesta -> num_rows . ' productos que superan el disponible de nuestro inventario';
        }

    }
?>
    
    
    
