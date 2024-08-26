<?php include_once '../layout.php';
include_once '../../Controller/productoController.php'; 
include_once '../../Controller/categoriaController.php'; 
include_once '../../Controller/usuarioController.php';
include_once '../../Controller/carritoController.php'; 
$datos = ConsultarUsuario($_SESSION["IdUsuario"]);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Tienda</title>
  <link rel="stylesheet" href="../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../vendors/base/vendor.bundle.base.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/arenal.css">
  <link rel="shortcut icon" href="../images/AFIcon.png" />
  <link rel="stylesheet" href="../https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap4.css">
    <style>
        .card-product {
            position: relative;
            max-width: 300px;
        }
        .card-product img {
            width: 100%;
            height: auto;
        }
        .card-product .card-body {
            padding: 15px;
        }
        .card-product .card-title {
            font-size: 1.25rem;
            font-weight: bold;
        }

        .card-product img {
    width: 100%;
    height: 200px; /* Altura fija para todas las imágenes */
    object-fit: cover; /* Recorta la imagen para que se ajuste al contenedor */
}

        .card-product .card-text {
            font-size: 1rem;
            margin: 10px 0;
        }
        .card-product .card-price {
            font-size: 1.25rem;
            color: #007bff;
            font-weight: bold;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            margin: 10px;
            gap: 20px; /* Espacio entre las tarjetas */
        }
        
        .card-product {
            flex: 1 1 calc(33.333% - 15px); /* Tres tarjetas por fila */
            box-sizing: border-box;
        }

        .card {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(30px);
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: scale(1.02);
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.3);
        }


        .fixed {
            position: fixed;
            bottom: 0; /* Ajusta el elemento a la parte inferior de la pantalla */
            left: 0; /* Alinea el elemento al borde izquierdo de la pantalla */
            width: 100%; /* Hace que el elemento ocupe todo el ancho de la pantalla */
            z-index: 1000; /* Asegura que el elemento esté por encima de otros elementos */
            padding-left: 40px; /* Espacio a la izquierda */
            padding-right: 40px; /* Espacio a la derecha */
            box-sizing: border-box; /* Incluye el padding en el cálculo del ancho total */
        }

        .pay-button {
            position: absolute; /* Position the button absolutely within the card */
            right: 20px; /* Distance from the right edge of the card */
            top: 50%; /* Position the top of the button at the middle of the card */
            transform: translateY(-50%); /* Adjust to perfectly center vertically */
        }

        .back-button {
            position: absolute; /* Position the button absolutely within the card */
            left: 20px; /* Distance from the right edge of the card */
            top: 50%; /* Position the top of the button at the middle of the card */
            transform: translateY(-50%); /* Adjust to perfectly center vertically */
        }

    </style>
</head>

<body>
  <?php superior(); ?>

    
  
  <?php ConsultarCarrito(); ?>

  <?php
        if(isset($_POST["msj"]))
        {
            echo '<div class="alert alert-info TextoCentrado">' . $_POST["msj"] . '</div>';
        }
    ?>

        
    <?php
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
                                <button type="submit" id="btnPagarCarrito" name="btnPagarCarrito" type="submit" class="btn btn-inverse-success btn-rounded btn-lg pay-button" style="width:200px">Pagar<i class="mdi mdi-arrow-right" style="position: fixed;"></i></button>
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
    ?>




    <div class="modal fade" id="ModalCarrito" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content navbar-blur2" style="width:600px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
                </div>

                <form action="" method="POST">
                    <div class="modal-body">
                        <input type="hidden" id="txtIdProducto" name="txtIdProducto">
                        ¿Desea eliminar el producto <label id="lblNombreProducto"></label> de su carrito?
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="btnEliminarProductoCarrito"
                            name="btnEliminarProductoCarrito">Procesar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


  <?php bajo(); ?>

    <script src="../vendors/base/vendor.bundle.base.js"></script> <!----- Listo ------>
    <script src="../js/template.js"></script><!----- Listo ------>
    <script src="../vendors/chart.js/Chart.min.js"></script> <!----- Listo ------>
    <script src="../vendors/progressbar.js/progressbar.min.js"></script><!----- Listo ------>
    <script src="../vendors/chartjs-plugin-datalabels/chartjs-plugin-datalabels.js"></script><!----- Listo ------>
    <script src="../vendors/justgage/raphael-2.1.4.min.js"></script><!----- Listo ------>
    <script src="../vendors/justgage/justgage.js"></script><!----- Listo ------>
    <script src="../js/jquery.cookie.js" type="text/javascript"></script>
    <script src="../js/dashboard.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap4.js"></script>
  <script>

        $(document).on("click", ".AbrirModal", function() {
            $("#lblNombreProducto").text($(this).attr('data-name'));
            $("#txtIdProducto").val($(this).attr('data-id'));
        });
    </script>  
</body>

</html>