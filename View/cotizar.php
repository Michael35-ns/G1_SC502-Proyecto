<?php include_once 'layout.php'; 
 include_once '../Controller/usuarioController.php'; 
 include_once '../Controller/comunController.php';?>


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
    <link rel="shortcut icon" href="images/log.png" />
  </head>
  <body>

  <!--LLamado al layout-->
		<?php 
		superior()
		?>

<div class="row">

<div class="col-1">
</div>
<div class="col-10 grid-margin stretch-card">
              <div class="card navbar-blur2">
                <div class="card-body">
                  <h3 class="card-title">Cotización</h3>
                  <p class="card-description" style="font-size: 14px;">
                  En ArenalFrmes, nos especializamos en la creación de productos personalizados para eventos, ofreciendo soluciones innovadoras en impresiones 3D y corte láser. Nuestro equipo está listo para atender tus solicitudes de cotización, asegurando que cada detalle se ajuste a tus necesidades específicas. Desde artículos decorativos hasta piezas funcionales, estamos comprometidos en transformar tus ideas en realidad con la máxima calidad y precisión. No dudes en contactarnos para recibir la mejor atención y el asesoramiento que necesitas para hacer de tu evento algo inolvidable.
                  </p>
                  <br>
                  <form class="forms-sample" id="cotizarForm" action="" method="post">
                    <div class="form-group">
                      <label for="exampleInputName1">Nombre Completo</label>
                      <input type="text" class="form-control" id="txtNombre"  name="txtNombre" placeholder="Nombre Completo">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Teléfono</label>
                      <input type="text" class="form-control" id="txtTelefono"  name="txtTelefono" placeholder="Número de teléfono de contacto">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Correo Electrónico</label>
                      <input type="email" class="form-control" id="txtCorreo"  name="txtCorreo" placeholder="Correo eléctronico de contacto">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Dirección</label>
                      <input type="text" class="form-control" id="txtDireccion"  name="txtDireccion" placeholder="Dirección exacta de ubicación">
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Descripción</label>
                      <textarea class="form-control" id="txtDescripcion"  name="txtDescripcion" rows="4" placeholder="Favor use este espacio para detallar el tipo de evento o producto que requiere, incluída la cantidad"></textarea>
                    </div>
                    <button type="submit" id="btnCotizar"  name="btnCotizar" class="btn btn-inverse-success btn-rounded">Enviar</button>
                    <a class="btn btn-inverse-light btn-rounded" href="home.php">Cancelar</a>
                  </form>
                </div>
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
    <script src="js/jquery-1.11.0.min.js" type="text/javascript"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>