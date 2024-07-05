<?php include_once '../Controller/usuarioController.php';?>
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
                <h4>Registrese, es gratis!</h4>
                <h6 class="font-weight-light">Complete el formulario</h6>
                <?php
                    if(isset($_POST["msj"]))
                    {
                        echo '<div class="alert alert-info">' . $_POST["msj"] . '</div>';
                    }
                ?>
                <form class="pt-3" action="" method="post">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="txtNombre" 
                     name="txtNombre" placeholder="Ingrese su nombre">
                  </div>

                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="txtUsername" 
                     name="txtUsername" placeholder="Ingrese su nombre de usuario">
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control form-control-lg" id="txtEmail" 
                    name="txtEmail" placeholder="Ingrese su email" required>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" 
                    name="txtPassword" id="txtPassword" placeholder="Ingrese su contraseña" required>
                  </div>  
                  <div class="mt-3">
                    <button type="submit" id="btnRegistrarUsuario"  name="btnRegistrarUsuario" 
                    class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Registrar</button>
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