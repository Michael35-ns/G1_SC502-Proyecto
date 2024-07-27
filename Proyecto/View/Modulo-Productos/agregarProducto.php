<?php
ob_start();
include_once '../layout.php';
include_once '../../Controller/productoController.php';
include_once '../../Controller/categoriaController.php';
include_once '../../Controller/usuarioController.php'; 
$opcionesCategorias = ObtenerOpcionesCategorias();
$opcionesMaterial = ObtenerOpcionesMaterial();
ob_end_flush();
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="shortcut icon" href="../images/log.png" />
    <link rel="shortcut icon" href="../images/AFIcon.png" />
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
                                <h2 class="heading text-danger  text-center font-weight-bold">Agregar Productos</h2>
                                <br />
                                <form class="forms-sample" action="" method="post">
                                    <div class="form-group">
                                        <label class="text-dark font-weight-bold">Nombre del producto</label>
                                        <input type="text" class="form-control" name="txtNombreProducto" placeholder="Ingrese el nombre del producto">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark font-weight-bold">Precio del producto</label>
                                        <input type="number" name="txtPrecio" class="form-control" id="exampleInputEmail1" placeholder="Ingrese el precio del producto">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark font-weight-bold">Imagen del producto</label>
                                        <input type="text" name="txtUrl" class="form-control" id="exampleInputEmail1" placeholder="Ingrese el precio del producto">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark font-weight-bold">Categoria del producto</label>
                                        <select id="cboCategoria" name="cboCategoria" class="form-control" required>
                                            <?php echo $opcionesCategorias; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark font-weight-bold">Material del producto</label>
                                        <select id="cboMaterial" name="cboMaterial" class="form-control" required>
                                            <?php echo $opcionesMaterial; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark font-weight-bold">Existencias producto</label>
                                        <input type="number" name="txtExistencias" class="form-control" id="exampleInputEmail1" placeholder="Ingrese las existencias del producto">
                                    </div>
                                    <button name="btnAgregarProducto" type="submit" class="btn btn-inverse-primary me-2">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br />
    <br />
    <br />

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