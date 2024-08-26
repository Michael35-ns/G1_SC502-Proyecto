<?php
ob_start();
include_once '../layout.php';
include_once '../../Controller/productoController.php';
include_once '../../Controller/usuarioController.php';
include_once '../../Controller/carritoController.php';
ob_end_flush();
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
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
</head>

<body>

    <?php superior(); ?>
 
    <?php
    $datos = ConsultarProductos($_GET["q"]);
    bajo();
    ?>
    <div class="modal fade" id="ModalProductos" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content navbar-blur2" style="width:600px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
                </div>
                <form action="" method="POST">
                    <div class="modal-body">
                        <input type="hidden" id="idProducto" name="idProducto">
                        ¿Desea cambiar el estado del producto <label id="lblNombre"></label>?
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-inverse-info btn-md font-weight-medium btn-rounded" id="btnCambiarEstadoProducto" name="btnCambiarEstadoProducto">Procesar</button>
                        <button type="button" class="btn btn-inverse-danger btn-md font-weight-medium btn-rounded" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">Cancelar</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="../vendors/base/vendor.bundle.base.js"></script> <!----- Listo ------>
    <script src="../js/template.js"></script><!----- Listo ------>
    <script src="../vendors/chart.js/Chart.min.js"></script> <!----- Listo ------>
    <script src="../vendors/progressbar.js/progressbar.min.js"></script><!----- Listo ------>
    <script src="../vendors/chartjs-plugin-datalabels/chartjs-plugin-datalabels.js"></script><!----- Listo ------>
    <script src="../vendors/justgage/raphael-2.1.4.min.js"></script><!----- Listo ------>
    <script src="../vendors/justgage/justgage.js"></script><!----- Listo ------>
    <script src="../js/jquery.cookie.js" type="text/javascript"></script>
    <script src="../js/dashboard.js"></script>
    <script src="../js/producto.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap4.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.all.min.js"></script>
    <script>
        $(document).on("click", ".AbrirModalProducto", function() {
            $("#lblNombre").text($(this).attr('data-name'));
            $("#idProducto").val($(this).attr('data-id'));
        });
    </script>

</body>

</html>