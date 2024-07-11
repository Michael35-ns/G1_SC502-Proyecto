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
                <h6 class="font-weight-light text-white">Cambie su contraseña</h6>
                <br />
                <?php
                    if(isset($_POST["msj"]))
                    {
                        echo '<div class="alert alert-danger">' . $_POST["msj"] . '</div>';
                    }
                ?>
                <form class="pt-3" action="" method="post">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="txtContrasenna" id="txtContrasenna" placeholder="Contraseña nueva">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="txtContrasennaVerif" name="txtContrasennaVerif" placeholder="Verificar contraseña nueva">
                  </div>
                  <div class="mt-3">
                    <button type="submit" id="btnConfirmarCambio"  name="btnConfirmarCambio" 
                    class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Cambiar contraseña</button>
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="text-center mt-4 font-weight-light text-white">
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
  <script src="../vendors/base/vendor.bundle.base.js"></script>
  <script src="../js/template.js"></script>
</body>

</html>
