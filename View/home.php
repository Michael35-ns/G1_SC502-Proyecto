<?php include_once 'layout.php'; 
 include_once '../Controller/usuarioController.php'; ?>


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


    <?php if($_SESSION["RolUsuario"] == 1) 
                { echo '
                        <div class="card-container-arenal">
                        <div class="my-card-arenal">
                          <a href="Registro-Inicio/consultarUsuarios.php" class="nav-link  category-item" style=" text-align:center">
                            <i class="mdi mdi-account icon-lg text-align:center"></i>
                            <h3 class="category-title">Usuarios</h3>
                          </a>
                        </div>
                        <div class="my-card-arenal">
                          <a href="Registro-Inicio/consultarUsuarios.php" class="nav-link category-item" style=" text-align:center">
                            <i class="mdi mdi-receipt icon-lg text-align:center"></i>
                            <h3 class="category-title">Facturas</h3>
                          </a>
                        </div>
                        <div class="my-card-arenal">
                          <a href="Modulo-Productos/proveedores.php" class="nav-link category-item" style=" text-align:center">
                            <i class="mdi mdi-dropbox icon-lg"></i>
                            <h3 class="category-title">Proveedores</h3>
                          </a>
                        </div>
                        <div class="my-card-arenal">
                          <a href="Modulo-Productos/proveedores.php" class="nav-link category-item" style=" text-align:center">
                            <i class="mdi mdi-chart-areaspline icon-lg text-align:center"></i>
                            <h3 class="category-title">Estadísticas</h3>
                          </a>
                        </div>
                        </div>';
    }
    else{
      echo '<div class="card-container-arenal">
      <div class="my-card-arenal">
                <a href="/Proyecto/View/Modulo-Facturas/listaFacturas.php" class="nav-link navbar-blur2 category-item">
              <i class="mdi mdi-file-multiple menu-icon icon-lg"></i>
              <h3 class="category-title">Compras </h3>
            </a>
            </div>
            </div>';
    }
  ?>

  
		

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