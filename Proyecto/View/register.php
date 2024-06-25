<?php $path = realpath('../Controller/usuarioController.php');
if ($path) {
  include_once $path;
} else {
  echo 'Path not found: ' . $path;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Kapella Bootstrap Admin Dashboard Template</title>
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/arenal.css">
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="main-panel">
        <div class="content-wrapper d-flex align-items-center auth px-0">
          <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <div class="brand-logo">
                  <img src="images/logo.svg" alt="logo">
                </div>
                <h4>New here?</h4>
                <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                <form class="pt-3" method="post" action="">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="txtIdentificacion" name="txtIdentificacion" onkeyup="GetNombre();" placeholder="ID" required>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" readOnly id="txtNombre" name="txtNombre" placeholder="Nombre" required>
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control form-control-lg" id="txtEmail" name="txtEmail" placeholder="Email" required>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="txtContra" name="txtContra" placeholder="Password" required>
                  </div>
                  <div class="mt-3">
                    <button type="submit" id="btnProcesar" name="btnProcesar" class="btn btn-primary btn-block">Procesar</button>
                  </div>
                  <div class="text-center mt-4 font-weight-light">
                    Already have an account? <a href="login.php" class="text-primary">Login</a>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <script src="js/template.js"></script>
  <script src="js/rutinas.js"></script>

</body>

</html>