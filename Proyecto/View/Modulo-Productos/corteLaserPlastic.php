<?php 
include_once '../layout.php';
include_once '../../Controller/productoController.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<?php HeadCSS(); ?>

<body>
    <?php superiorProductos(); ?>
    <a href="agregarProducto.php"><button type="submit" id="btnRegistrarUsuario" name="btnIniciarSesion" 
    class="btn btn-block btn-outline-primary btn-md font-weight-bold auth-form-btn ">Agregar producto</button></a>
    <?php ConsultarProductos(2); ?>
    <?php bajo(); ?>



    <!-- Carga de Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.1/js/bootstrap.min.js"></script>

    <!-- Otros Scripts -->
    <script src="../vendors/base/vendor.bundle.base.js"></script>
    <script src="../js/template.js"></script>
    <script src="../vendors/chart.js/Chart.min.js"></script>
    <script src="../vendors/progressbar.js/progressbar.min.js"></script>
    <script src="../vendors/chartjs-plugin-datalabels/chartjs-plugin-datalabels.js"></script>
    <script src="../vendors/justgage/raphael-2.1.4.min.js"></script>
    <script src="../vendors/justgage/justgage.js"></script>
    <script src="../js/jquery.cookie.js" type="text/javascript"></script>
    <script src="../js/dashboard.js"></script>

</body>
</html>
