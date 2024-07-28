<?php   include_once 'layout.php'; 
        include_once '../Controller/usuarioController.php'; 

        $datos = ConsultarUsuario($_SESSION["IdUsuario"]);
?>
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
    <link rel="shortcut icon" href="images/AFIcon.png" />
  </head>
  <body>

  <!--LLamado al layout-->
		<?php 
		superior()
		?>
        <div class="card bg-white mt-5 mb-5 navbar-blur2">
          <div class="card-body">
            <div class="p-3 py-5">
                    <h2 class="card-title">Editar perfil</h2>
                <form action="" method="post">
                  <input id="txtIdUsuario" name="txtIdUsuario" type="hidden" value="<?php echo $datos["id_usuario"] ?>">
                  <div class="row mt-3">
                      <div class="col-md-12"><label class="labels">Nombre</label><input type="text" id="txtNombre" name="txtNombre" class="form-control" value="<?php echo $datos["nombre"] ?>"></div>
                  </div>
                  <div class="row mt-3">
                      <div class="col-md-12"><label class="labels">Correo</label><input type="text" id="txtCorreo" name="txtCorreo" class="form-control" value="<?php echo $datos["correo"] ?>"></div>
                  </div>
                  <div class="row mt-3">
                      <div class="col-md-12"><label class="labels">Usuario</label><input type="text" id="txtUsername" name="txtUsername" class="form-control" value="<?php echo $datos["username"] ?>"></div> <br>
                  </div>
                  <div class="mt-5 text-center">
                    <button id="btnActualizarUsuario" name="btnActualizarUsuario" class="btn btn-inverse-info btn-lg font-weight-medium btn-rounded" type="submit">Actualizar</button>
                  </div>
                </form>
            </div>
          </div>
        </div>

		<?php 
		bajo()
		?>
					
					
				
			</div>
		</div>
    </div>
    <script src="vendors/base/vendor.bundle.base.js"></script> <!----- Listo ------>
    <script src="js/template.js"></script><!----- Listo ------>
    <script src="vendors/chart.js/Chart.min.js"></script> <!----- Listo ------>
    <script src="vendors/progressbar.js/progressbar.min.js"></script><!----- Listo ------>
		<script src="vendors/chartjs-plugin-datalabels/chartjs-plugin-datalabels.js"></script><!----- Listo ------>
		<script src="vendors/justgage/raphael-2.1.4.min.js"></script><!----- Listo ------>
		<script src="vendors/justgage/justgage.js"></script><!----- Listo ------>
    <script src="js/jquery.cookie.js" type="text/javascript"></script>
    <script src="js/dashboard.js"></script>
  </body>
</html>
