<?php include_once '../layout.php';
include_once '../../Controller/usuarioController.php';
include_once '../../Controller/carritoController.php';
include_once '../../Controller/facturaController.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$q = isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '';
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

    <!--LLamado al layout-->
    <?php
    superior()
    ?>
    <div class="card navbar-blur2">
        <div class="card-body">
            <h1 class="card-title text-primary">Consulta de Facturas</h1>
            
            <div>
                <a href="../../Controller/reporteController.php?q=<?php echo htmlspecialchars($q); ?>" target="_blank" class="btn btn-primary">Generar Reporte</a>
            </div>

            <br />
            <div class="row d-flex justify-content-center">
                <table id="tablaFacturas" class="table table-hover table-bordered">
                    <thead>
                        <tr class="text-dark text-center">
                            <th class="text-center"><strong>Nombre</strong></th>
                            <th class="text-center"><strong>Cantidad Comprada</strong></th>
                            <th class="text-center"><strong>Total Factura</strong></th>
                            <th class="text-center"><strong>Fecha</strong></th>
                            <th class="text-center"><strong>Información</strong></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($_SESSION["RolUsuario"] == 2) {
                            VerFacturasDB($_SESSION["IdUsuario"]);
                        } else {
                            VerFacturasDB($_GET["q"]);
                        }
                        ?>
                    </tbody>
                </table>
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
    <script>
        $(document).ready(function() {
            $("#tablaFacturas").DataTable({
                language: {
                    url: '../vendors/language.json'
                },
                columnDefs: [{
                    type: 'string',
                    target: [0, 1, 2, 3, 4]
                }]
            });
        });
    </script>
</body>

</html>