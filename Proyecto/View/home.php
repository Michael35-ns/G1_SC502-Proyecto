<?php include_once 'layout.php'; ?>


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
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="css/estilosnuevos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/log.png" />
  </head>
  <body class="body-icons">

  <!--LLamado al layout-->
		<?php 
		superior()
		?>

<?php if($_SESSION["RolUsuario"] == 1) 
                { echo '
<section class="py-5 overflow-hidden">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
          <div class="section-header d-flex flex-wrap justify-content-between mb-5">
              <h2 class="section-title">Category</h2>

              <div class="d-flex align-items-center">
                <a href="#" class="btn-link text-decoration-none">View All Categories →</a>
                <div class="swiper-buttons">
                  <button class="swiper-prev category-carousel-prev btn btn-yellow">❮</button>
                  <button class="swiper-next category-carousel-next btn btn-yellow">❯</button>
                </div>
              </div>
            </div>

            
            <div class="category-carousel swiper">
              <div class="swiper-wrapper">
                <a href="Registro-Inicio/consultarUsuarios.php" class="nav-link navbar-blur2 category-item swiper-slide">
                <i class="mdi mdi-account icon-lg"></i>
                  <h3 class="category-title">Usuarios</h3>
                </a>
                <a href="category.html" class="nav-link navbar-blur2 category-item swiper-slide">
                <i class="mdi mdi-chart-areaspline icon-lg"></i>
                  <h3 class="category-title">Estadísticas</h3>
                </a>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>';
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
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

  </body>
</html>