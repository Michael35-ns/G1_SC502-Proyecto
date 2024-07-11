<?php include_once '../layout.php';
include_once '../../Controller/productoController.php'; ?>
<!DOCTYPE html>
<html lang="en">
<?php HeadCSS(); ?>

<body>
    <?php superiorProductos(); ?>
    <button id="add-product-btn" type="button">Agregar producto</button>

<!-- Ventana modal -->
<div class="modal" id="add-product-modal" style="display: none">
  <div class="modal-content">
    <h2>Agregar producto</h2>
    <form>
      <div class="form-group">
        <label for="product-name">Nombre del producto:</label>
        <input type="text" id="product-name" name="product-name" class="form-control">
      </div>
      <div class="form-group">
        <label for="product-description">Descripción del producto:</label>
        <textarea id="product-description" name="product-description" class="form-control"></textarea>
      </div>
      <div class="form-group">
        <label for="product-price">Precio del producto:</label>
        <input type="number" id="product-price" name="product-price" class="form-control">
      </div>
      <div class="form-group">
        <label for="product-image">Imagen del producto:</label>
        <input type="file" id="product-image" name="product-image" class="form-control">
      </div>
      <button id="add-product-submit" class="btn btn-primary">Agregar producto</button>
    </form>
  </div>
</div>
    <?php ConsultarProductos(3); ?>

    <?php bajo(); ?>

    <script src="vendors/base/vendor.bundle.base.js"></script>
    <script src="js/template.js"></script>
    <script src="vendors/chart.js/Chart.min.js"></script>
    <script src="vendors/progressbar.js/progressbar.min.js"></script>
    <script src="vendors/chartjs-plugin-datalabels/chartjs-plugin-datalabels.js"></script>
    <script src="vendors/justgage/raphael-2.1.4.min.js"></script>
    <script src="vendors/justgage/justgage.js"></script>
    <script src="js/jquery.cookie.js" type="text/javascript"></script>
    <script src="js/dashboard.js"></script>
    <script src="js/rutinas.js"></script>
</body>

</html>