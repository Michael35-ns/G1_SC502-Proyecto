<?php include_once '../Controller/usuarioController.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Proyecto Ambiente Web Cliente-Servidor</title>
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
                <h4>Hello! let's get started</h4>
                <h6 class="font-weight-light">Sign in to continue.</h6>
                <br />
                <?php
                    if(isset($_POST["msj"]))
                    {
                        echo '<div class="alert alert-danger">' . $_POST["msj"] . '</div>';
                    }
                ?>
                <form class="pt-3" action="" method="post">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="txtCredencial" name="txtCredencial" placeholder="Username o Email" required>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" name="txtPassword" id="txtPassword" placeholder="Password" required>
                  </div>
                  <div class="mt-3">
                  <button type="submit" id="btnRegistrarUsuario"  name="btnIniciarSesion" 
                  class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Iniciar Sesión</button>  
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <a href="#" class="auth-link text-black">¡Olvidó su contraseña?</a>
                  </div>
                  <div class="text-center mt-4 font-weight-light">
                    ¿Aún no tienes una cuenta? <a href="register.php" class="text-primary">Creála</a>
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
  <script src="js/jquery.cookie.js" type="text/javascript"></script>
</body>

</html>
