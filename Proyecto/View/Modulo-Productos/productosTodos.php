<?php include_once '../layout.php';
include_once '../../Controller/productoController.php'; ?>
<!DOCTYPE html>
<html lang="en">
<?php HeadCSS(); ?>

<body>
    <?php superiorProductos(); ?>
    
    <table class="table table-hover">
                    <thead>
                        <tr class="text-danger font-weight-bold tab-productos" >
                            <th style="font-size: larger;">Producto</th>
                            <th style="font-size: larger;">Precio</th>
                            <th style="font-size: larger;">Categoria</th>
                            <th style="font-size: larger;">Material</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php VistaProductos(); ?>
                    </tbody>
                </table>
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