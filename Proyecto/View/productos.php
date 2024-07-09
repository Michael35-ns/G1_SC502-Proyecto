<?php include_once 'layout.php';
include_once '../Controller/productoController.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Tienda</title>
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/arenal.css">
  <link rel="shortcut icon" href="images/log.png" />
</head>

<body>
  <?php superior(); ?>

  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card">
          <div class="card-body">
            <h2 class="text-dark font-weight-bold">Corte Laser en Plástico</h2>
            <div class="card-product">
            <br />
              <br />
              <br />
              <div class="responsive-square">
                <img src="https://th.bing.com/th/id/OIP.W8zHv4Dyf5d-e3WROtibwQHaE7?rs=1&pid=ImgDetMain" alt="Imagen" class="img-fluid">
              </div>
              <div class="mt-3">
                <button type="submit" id="btnRegistrarUsuario" name="btnIniciarSesion" class="btn btn-inverse-dark btn-lg font-weight-medium btn-rounded auth-form-btn ">Ver más</button>
              </div>  
            </div>

          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card">
          <div class="card-body">
            <h2 class="text-danger font-weight-bold">Impresión 3D con Filamento</h2>
            <div class="card-product">
              <br />
              <br />
              <br />
              <div class="responsive-square">
                <a href="impresion3D.php"><img src="https://th.bing.com/th/id/OIP.dZ67ZT3PnP-4tIIPb_T4ngHaE7?rs=1&pid=ImgDetMain" alt="Imagen" class="img-fluid"></a>
              </div>
              <div class="mt-3">
                <button type="submit" id="btnRegistrarUsuario" name="btnIniciarSesion" class="btn btn-inverse-danger btn-lg font-weight-medium btn-rounded auth-form-btn ">Ver más</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card">
          <div class="card-body">
            <h2 class="text-info font-weight-bold">Impresión 3D con Resina</h2>
            <div class="card-product">
              <br />
              <br />
              <br />
              <div class="responsive-square">
                <img src="https://th.bing.com/th/id/OIP.ODAS8zB2p4u2yDM0afjbgAHaEj?rs=1&pid=ImgDetMain" alt="Imagen" class="img-fluid">
              </div>
              <div class="mt-3">
                <button type="submit" id="btnRegistrarUsuario" name="btnIniciarSesion" class="btn btn-inverse-success btn-lg font-weight-medium btn-rounded auth-form-btn">Ver más</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card">
          <div class="card-body">
            <h2 class="text-warning font-weight-bold">Sublimación en Camisetas</h2>
            <div class="card-product">
              <div class="responsive-square">
                <img src="https://th.bing.com/th/id/OIP.TRrtVjivyR2tw8fcv-3aJgHaEM?rs=1&pid=ImgDetMain" alt="Imagen" class="img-fluid">
              </div>
            </div>
            <canvas id="projects"></canvas>
            <div class="line-chart-row-title">DESCRIPCION</div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card">
          <div class="card-body">
            <h2 class="text-secondary font-weight-bold">Corte Laser en Madera</h2>
            <div class="card-product">
              <div class="responsive-square">
                <img src="https://th.bing.com/th/id/OIP.jUgCa77aPDz4PdUvRuw63gAAAA?rs=1&pid=ImgDetMain" alt="Imagen" class="img-fluid">
              </div>
            </div>
            <canvas id="orderRecieved"></canvas>
            <div class="line-chart-row-title">DESCRIPCION</div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card">
          <div class="card-body">
            <h2 class="text-dark font-weight-bold">PRODUCTO</h2>
            <div class="card-product">
              <div class="responsive-square">
                <img src="https://th.bing.com/th/id/R.cb48a4d0a0aeddd9299620dacd9a2d85?rik=BY8h%2ft11HX%2fO0Q&pid=ImgRaw&r=0" alt="Imagen" class="img-fluid">
              </div>
            </div>
            <canvas id="transactions"></canvas>
            <div class="line-chart-row-title">DESCRIPCION</div>
          </div>
        </div>
      </div>
    </div>
  </div>

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
</body>

</html>