<?php include_once '../layout.php';
include_once '../../Controller/productoController.php'; 
include_once '../../Controller/categoriaController.php'; 
include_once '../../Controller/usuarioController.php'; 
$datos = ConsultarUsuario($_SESSION["IdUsuario"]);?>
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
</head>

<body>
  <?php superior(); ?>
<?php VerCategoriasCard(); ?>


  <?php bajo(); ?>

  <script src="../vendors/base/vendor.bundle.base.js"></script>
  <script src="../js/template.js"></script>
  <script src="../vendors/chart.js/Chart.min.js"></script>
  <script src="../vendors/progressbar.js/progressbar.min.js"></script>
  <script src="../vendors/chartjs-plugin-datalabels/chartjs-plugin-datalabels.js"></script>
  <script src="../vendors/justgage/raphael-2.1.4.min.js"></script>
  <script src="../vendors/justgage/justgage.js"></script>
  <script src="../js/jquery.cookie.js" type="text/javascript"></script>
  <script src="../js/dashboard.js"></script>
  <script src="../js/rutinas.js"></script>
</body>

</html>