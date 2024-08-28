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
    <link rel="shortcut icon" href="images/log.png" />
    <style>
      .btn {
        display: flex;
        align-items: center; /* Centra verticalmente el texto y el icono */
        justify-content: center; /* Centra horizontalmente el texto y el icono */
        gap: 8px; /* Espacio entre el texto y el icono, ajusta según sea necesario */
        text-decoration: none; /* Elimina el subrayado del enlace */
      }

      .mdi-whatsapp {
        font-size: 24px; /* Tamaño del icono */
      }
    </style>
  </head>
  <body>

  <!--LLamado al layout-->
		<?php 
		superior()
		?>
<div class="container mt-4 mb-4 p-3 d-flex justify-content-center"> 
  <div class="card p-4 navbar-blur2"> <div class=" image d-flex flex-column justify-content-center align-items-center"> 
    <button class="btn btn-secondary"> <img src="/Proyecto/View/images/ArenalFramesLogo.svg" height="110" width="110"/>
    </button>
    <span class="name mt-3">Arenal Frames S.A.</span> 
  <div class="d-flex flex-row justify-content-center align-items-center gap-2">
  </div> 
  <div class="d-flex flex-row justify-content-center align-items-center mt-3">
     <span class="follow"><a href="mailto:arenal.framescr@outlook.com">arenal.framescr@outlook.com</a></span>
  </div>

  <div class="text mt-3"> 
    <span>Arenal Frames es un proyecto que busca hacerse con el mercado de corte láser y diseño en 3D<br></span> 
  </div> 
  <div class="gap-3 mt-3 icons d-flex flex-row justify-content-center align-items-center"> 
    <span><i class="fa fa-twitter"></i></span> 
    <span><i class="fa fa-facebook-f"></i></span> 
    <span><i class="fa fa-instagram"></i></span> 
    <span><i class="fa fa-linkedin"></i></span> 
  </div> 
  <br>
  <a class="btn btn-inverse-success btn-rounded btn-fw" href="https://wa.me/50660017174" target="_blank">Contactenos por whatsapp
  <i class="mdi mdi-whatsapp mdi-24px"></i>
</a>
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