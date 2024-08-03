<?php

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

function superior()
{
  if (!isset($_SESSION["IdUsuario"])) {
    header("location: Registro-Inicio/login.php");
  }

  echo '<div class="container-scroller">
		<!-- partial:partials/_horizontal-navbar.html -->
    <div class="horizontal-menu">
      <nav class="navbar top-navbar col-lg-12 col-12 p-0" style="background-color: black;">
        <div class="container-fluid">
          <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
            <ul class="navbar-nav navbar-nav-left">
            </ul>
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center" >
                <a class="navbar-brand brand-logo" href="/Proyecto/View/home.php"><img src="/Proyecto/View/images/AFLogoBlanco.svg" style="width: 120px ; heigth: 100px"  alt="logo"/></a>
            </div>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                    <span class="nav-profile-name text-white">' . $_SESSION["nombreUsuario"] . '</span> <!-----Nombre de usuario registrado--->
                    <i class="mdi mdi-account icon-sm text-white"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                      <a class="dropdown-item">
                        <i class="mdi mdi-settings menu-icon text-primary"></i>
                        Settings
                      </a>
                      <form action="" method="POST">
                        <button id="btnCerrarSesion" name="btnCerrarSesion" type="submit" class="dropdown-item">
                          <i class="mdi mdi-logout menu-icon text-primary"></i> Salir
                        </button>
                      </form>
                  </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        </div>
      </nav>
      <nav class="bottom-navbar navbar-blur">
        <div class="container">
            <ul class="nav page-navigation">
              <li class="nav-item">
                <a class="nav-link" href="/Proyecto/View/Modulo-Productos/productos.php">
                  <i class="mdi mdi-cube menu-icon"></i>
                  <span class="menu-title">Productos</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/Proyecto/View/Modulo-Productos/proveedores.php">
                  <i class="mdi mdi-truck menu-icon"></i>
                  <span class="menu-title">Proveedores</span>
                </a>
              </li>
              <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="mdi mdi-brush menu-icon"></i>
                    <span class="menu-title">Cotizar</span>
                    <i class="menu-arrow"></i>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="/Proyecto/View/about.php" class="nav-link">
                    <i class="mdi mdi-human-greeting menu-icon"></i>
                    <span class="menu-title">Conózcanos</span>
                    <i class="menu-arrow"></i>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="/Proyecto/View/perfil.php" class="nav-link">
                    <i class="mdi mdi-account-circle menu-icon"></i>
                    <span class="menu-title">Perfil</span>
                    <i class="menu-arrow"></i>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="/Proyecto/View/contacto.php" class="nav-link">
                    <i class="mdi mdi-comment-processing menu-icon"></i>
                    <span class="menu-title">Contáctenos</span>
                    <i class="menu-arrow"></i>
                  </a>
              </li>
            </ul>
        </div>
      </nav>
    </div>
    <!-- partial -->
		<div>
			<div class="main-panel">
				<div class="content-wrapper">
					<div class="row">
						<div class="col-sm-6">
							<div class="d-flex align-items-center justify-content-md-end">
								<!----Espacio para agregar contenido de ser necesario--->
							</div>
						</div>
					</div>
					<div class="row mt-4">
					</div>';
}
?>

<?php
function inferior()
{
  echo '<div class="row">
						<div class="col-lg-2 grid-margin stretch-card">
							<div class="card">
								<div class="card-body pb-0">
									<div class="d-flex align-items-center justify-content-between">
										<h2 class="text-dark font-weight-bold">PRODUCTO</h2>

									</div>
								</div>
								<canvas id="newClient"></canvas>
								<div class="line-chart-row-title">DESCRIPCION</div>
							</div>
						</div>
						<div class="col-lg-2 grid-margin stretch-card">
							<div class="card">
								<div class="card-body pb-0">
									<div class="d-flex align-items-center justify-content-between">
										<h2 class="text-danger font-weight-bold">PRODUCTO</h2>
									</div>
								</div>
								<canvas id="allProducts"></canvas>
								<div class="line-chart-row-title">DESCRIPCION</div>
							</div>
						</div>
						<div class="col-lg-2 grid-margin stretch-card">
							<div class="card">
								<div class="card-body pb-0">
									<div class="d-flex align-items-center justify-content-between">
										<h2 class="text-info font-weight-bold">PRODUCTO</h2>
									</div>
								</div>
								<canvas id="invoices"></canvas>
								<div class="line-chart-row-title">DESCRIPCION</div>
							</div>
						</div>
						<div class="col-lg-2 grid-margin stretch-card">
							<div class="card">
								<div class="card-body pb-0">
									<div class="d-flex align-items-center justify-content-between">
										<h2 class="text-warning font-weight-bold">PRODUCTO</h2>
									</div>
								</div>
								<canvas id="projects"></canvas>
								<div class="line-chart-row-title">DESCRIPCION</div>
							</div>
						</div>
						<div class="col-lg-2 grid-margin stretch-card">
							<div class="card">
								<div class="card-body pb-0">
									<div class="d-flex align-items-center justify-content-between">
										<h2 class="text-secondary font-weight-bold">PRODUCTO</h2>
									</div>
								</div>
								<canvas id="orderRecieved"></canvas>
								<div class="line-chart-row-title">DESCRIPCION</div>
							</div>
						</div>
						<div class="col-lg-2 grid-margin stretch-card">
							<div class="card">
								<div class="card-body pb-0">
									<div class="d-flex align-items-center justify-content-between">
										<h2 class="text-dark font-weight-bold">PRODUCTO</h2>
									</div>
								</div>
								<canvas id="transactions"></canvas>
								<div class="line-chart-row-title">DESCRIPCION</div>
							</div>
						</div>
					</div>
				</div>';
}
?>

<?php
function bajo()
{
  echo ' <footer class="footer">
          <div class="footer-wrap">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-dark text-center text-sm-left d-block d-sm-inline-block ">Proyecto grupo #2</span>
            </div>
          </div>
        </footer>';
}

function HeadCSS()
{
  echo '<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Tienda</title>
      <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
      <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
      <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/arenal.css">
      <link rel="shortcut icon" href="images/AFIcon.png" />
      <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap4.css">
    </head>';
}
