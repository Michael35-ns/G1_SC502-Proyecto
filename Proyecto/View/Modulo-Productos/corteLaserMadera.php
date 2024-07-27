<?php include_once '../layout.php';
include_once '../../Controller/productoController.php'; 
include_once '../../Controller/usuarioController.php'; ?>
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



  <!-- Ventana modal -->
  <div class="modal" id="add-product-modal" style="display: none">
    <div class="modal-content">
      <h2>Agregar producto</h2>
      <form id="add-product-form" action="<?php echo $_SERVER['REQUEST_URI'] ?>/Controller/productoController.php" method="post">
        <div class="form-group">
          <label for="product-name">Nombre del producto:</label>
          <input type="text" id="product-name" name="txtName" placeholder="Ingrese el nombre del producto" class="form-control">
        </div>
        <div class="form-group">
          <label for="product-description">Precio del producto:</label>
          <input type="text" placeholder="Ingrese el precio del producto" id="product-description" name="txtPrecio" class="form-control">
        </div>
        <div class="form-group">
          <label for="product-image">Imagen del producto:</label>
          <input type="file" id="product-image" name="product-image" class="form-control">
        </div>
        <button id="add-product-submit" name="btnAgregarLaserMadera" type="submit" class="btn btn-primary">Agregar producto</button>
      </form>
    </div>
  </div>
  <?php ConsultarProductos(4); ?>

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
  <script>
    document.getElementById('add-product-submit').addEventListener('click', function(event) {
      event.preventDefault();
      document.getElementById('add-product-form').submit();
    });
  </script>
</body>

</html>