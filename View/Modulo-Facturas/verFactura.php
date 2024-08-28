<?php include_once '../layout.php';
include_once '../../Controller/usuarioController.php';
include_once '../../Controller/carritoController.php';
include_once '../../Controller/facturaController.php';
$idMaestro = VerFacturasDB($_GET["q"]);
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
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
</head>

<body>
    <?php
    superior()
    ?>
    <div class="card navbar-blur2">
        <div class="container d-flex justify-content-center align-items-center" >
    <div class=" card w-75">
            <div class="card-body">
                <h1 class="card-title text-primary text-center">Consulta de Detalles</h1>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <table id="tablaDetalles" class="table table-hover table-bordered">
                            <thead>
                                <tr class="text-dark text-center">
                                    <th class="text-center"><strong>Nombre Producto</strong></th>
                                    <th class="text-center"><strong>Cantidad</strong></th>
                                    <th class="text-center"><strong>Precio</strong></th>
                                    <th class="text-center"><strong>Producto</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                verDetallesDB($_GET["q"]);
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    </div>

    <?php
    bajo()
    ?>


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
</body>

</html>