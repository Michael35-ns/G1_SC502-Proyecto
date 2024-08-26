<?php include_once '../../Controller/usuarioController.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Registro</title>
  <link rel="stylesheet" href="../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../vendors/base/vendor.bundle.base.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/arenal.css">
  <link rel="shortcut icon" href="../images/AFIcon.png" />
</head>
<body>
  <div class="container-scroller background-arenal">
    <div class="container-fluid page-body-wrapper full-page-wrapper background-arenal">
      <div class="main-panel background-arenal">
        <div class="content-wrapper d-flex align-items-center auth px-0 background-arenal">
          <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left py-5 px-4 px-sm-5 navbar-blur">
                <div class="brand-logo">
                  <img src="../images/AFLogoBlanco.svg" alt="logo">
                </div>
                <h4 class="letra-blanca">Registrese, es gratis!</h4>
                <h6 class="font-weight-light letra-blanca">Complete el formulario</h6>
                <br />
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
                    class="btn btn-inverse-success btn-lg font-weight-medium btn-rounded auth-form-btn">Registrarse</button>
                  </div>
                  <div class="text-center mt-4 font-weight-light letra-blanca">
                    ¿Ya tiene una cuenta? <a href="login.php" class="text-primary">Inicie sesión</a>
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