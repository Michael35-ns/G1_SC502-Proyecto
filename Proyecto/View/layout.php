<?php 
    function superior()
    {
        echo '<div class="container-scroller">
		<!-- partial:partials/_horizontal-navbar.html -->
    <div class="horizontal-menu">
      <nav class="navbar top-navbar col-lg-12 col-12 p-0" style="background-color: black;">
        <div class="container-fluid">
          <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
            <ul class="navbar-nav navbar-nav-left">
             
              
              
            </ul>
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center" >
                <a class="navbar-brand brand-logo" href="home.php"><img src="images/log.png" style="width: 70px ; heigth: 70px"  alt="logo"/></a>
                <a class="navbar-brand brand-logo-mini" href="home.php"><img src="images/log.png" alt="logo"/></a>
            </div>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                    <span class="nav-profile-name"></span> <!-----Nombre de usuario registrado--->
                    <i class="mdi mdi-account"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                      <a class="dropdown-item">
                        <i class="mdi mdi-settings text-primary"></i>
                        Settings
                      </a>
                      <a href="login.php" class="dropdown-item">
                        <i class="mdi mdi-logout text-primary"></i>
                        Logout
                      </a>
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
                <a class="nav-link" href="productos.php">
                  <i class="mdi mdi-cube menu-icon"></i>
                  <span class="menu-title">Productos</span>
                </a>
              </li>
              <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="mdi mdi-brush menu-icon"></i>
                    <span class="menu-title">Cotizar</span>
                    <i class="menu-arrow"></i>
                  </a>
                  <div class="submenu">
                      <ul>
                          <li class="nav-item"><a class="nav-link" href="pages/ui-features/buttons.html">OPCION 1</a></li>
                          <li class="nav-item"><a class="nav-link" href="pages/ui-features/typography.html">OPCION 2	</a></li>
                      </ul>	
                  </div>
              </li>
              <li class="nav-item">
                  <a href="about.php" class="nav-link">
                    <i class="mdi mdi-human-greeting menu-icon"></i>
                    <span class="menu-title">Conózcanos</span>
                    <i class="menu-arrow"></i>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="perfil.php" class="nav-link">
                    <i class="mdi mdi-account-circle menu-icon"></i>
                    <span class="menu-title">Perfil</span>
                    <i class="menu-arrow"></i>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="contacto.php" class="nav-link">
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
		<div class="container-fluid page-body-wrapper">
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
?>