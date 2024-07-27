<?php 
ob_start();
include_once '../layout.php';
include_once '../../Controller/productoController.php';
include_once '../../Controller/categoriaController.php'; 
$datos = ConsultarProducto($_GET["q"]);
$opcionesCategorias = ObtenerOpcionesCategorias();
$opcionesMaterial = ObtenerOpcionesMaterial();
ob_end_flush();?>
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

    <div class="container-fluid page-body-wrapper" style="height: 100vh; display: flex; justify-content: center; align-items: center;">
        <div class="main-panel" style="max-width: 500px; margin: 0 auto;">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="heading text-danger  text-center font-weight-bold">Editar Productos</h2>
                                <br />
                                <form class="forms-sample" action="" method="post">
                                <input id="txtIdProducto" name="txtIdProducto" type="hidden" value="<?php echo $datos["id_producto"] ?>">
                                    <div class="form-group">
                                        <label class="text-dark font-weight-bold">Nombre del producto</label>
                                        <input type="text" class="form-control" name="txtNombreProducto" value="<?php echo $datos["nombre_producto"] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark font-weight-bold">Precio del producto</label>
                                        <input type="number" name="txtPrecio" class="form-control" id="txtPrecio" value="<?php echo $datos["precio"] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark font-weight-bold">Imagen del producto</label>
                                        <input type="text" name="txtUrl" class="form-control" id="txtUrl" value="<?php echo $datos["url_img"] ?>">
                                    </div>
                                    <div class="form-group">
                                            <label class="text-dark font-weight-bold">Categoria del producto</label>
                                            <select id="selectCategoria" name="cboCategoria" class="form-control" required>
                                            <?php echo $opcionesCategorias; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                            <label class="text-dark font-weight-bold">Categoria del producto</label>
                                            <select id="selectCategoria" name="cboMaterial" class="form-control" required>
                                            <?php echo $opcionesMaterial; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark font-weight-bold">Existencias producto</label>
                                        <input type="number" name="txtExistencias" class="form-control" id="exampleInputEmail1" placeholder="Ingrese las existencias del producto">
                                    </div>
                                    <button name="btnEditarProducto" type="submit" class="btn btn-inverse-primary me-2">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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