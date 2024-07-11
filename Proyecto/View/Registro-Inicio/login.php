<?php include_once '../layout.php';
include_once '../../Controller/usuarioController.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <?php  HeadCSS(); ?>
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
                <h4 class="text-white">¡Hola! Empecemos</h4>
                <h6 class="font-weight-light text-white">Inicie su sesión para continuar.</h6>
                <br />
                <?php
                    if(isset($_POST["msj"]))
                    {
                        echo '<div class="alert alert-danger">' . $_POST["msj"] . '</div>';
                    }
                ?>
                <form class="pt-3" action="" method="post">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="txtCredencial" name="txtCredencial" placeholder="Usuario o Correo" required>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" name="txtPassword" id="txtPassword" placeholder="Contraseña" required>
                  </div>
                  <div class="mt-3">
                  <button type="submit" id="btnRegistrarUsuario"  name="btnIniciarSesion" 
                  class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Iniciar Sesión</button>  
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <a href="recuperarContrasenna.php" class="auth-link text-white">¿Olvidó su contraseña?</a>
                  </div>
                  <div class="text-center mt-4 font-weight-light text-white">
                    ¿Aún no tienes una cuenta? <a href="register.php" class="text-success">Creála</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../vendors/base/vendor.bundle.base.js"></script>
  <script src="../js/template.js"></script>
  <script src="../js/jquery.cookie.js" type="text/javascript"></script>
</body>

</html>
