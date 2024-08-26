<?php

$modelPath = (strpos(__DIR__, 'Controller') !== false) ? __DIR__ . '/../Model/productoModel.php' :
                     __DIR__ . '/../../Model/productoModel.php';

if (file_exists($modelPath)) {
    include_once($modelPath);
} else {
    echo "Error: No se pudo incluir el archivo productoModel.php";
}



include_once 'usuarioController.php';


function ConsultarProductos($idCategoria)
{
    $respuesta = ProductosXCategoria($idCategoria);
    if (ValidarRol() == true) {
    echo '<a href="agregarProducto.php">
            <button type="submit" id="btnRegistrarUsuario" name="btnIniciarSesion" class="btn btn-block btn-outline-primary btn-md font-weight-bold auth-form-btn">
                Agregar producto
            </button>
          </a>';
    echo '<br/>';
    }
    if ($respuesta->num_rows > 0) {
        echo '<br/>';
        echo '<div class="row">';
        while ($row = mysqli_fetch_array($respuesta)) {
            echo '<div class="col-md-3 mb-3">';
            echo '<div class="card h-90" >';
            echo '<img src="' . $row["url_img"] . '" alt="' . $row["nombre_producto"] . '" class="card-img-top imagen-producto" style="height:200px;width">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $row["nombre_producto"] . '</h5>';
            echo '<p class="card-text">Precio: ₡ ' . number_format($row["precio"], 0, ',', '.') . '</p>';
            echo '<p class="card-text">Existencias: ' . $row["existencias"] . ' unidades</p>';
            echo '</div>';
            echo '<div class="card-footer text-center" style = "background-color:white; border-color: white; height:100px">';
            if (ValidarRol() == true) {
                echo '<a href="editarProducto.php?q=' . $row["id_producto"] . '" class="btn btn-outline-dark mx-1">
                <i class="mdi mdi-table-edit"></i>
              </a>';
              echo '<button type="button" class="btn btn-outline-primary mx-2 btn-md font-weight-medium AbrirModalProducto" 
              data-toggle="modal" data-target="#ModalProductos" 
              data-id="' . $row["id_producto"] . '" data-name="' . $row["nombre_producto"] . '">
              <i class="mdi mdi-pen"></i>
          </button>';
            } else {
                echo '
                <div class="card-body row ">
                                <div class="col-1">
                                </div>
                                <div class="col-4">
                <input id=prd-'. $row["id_producto"] .' type="number" class="form-control" style="text-align:center; width:70px" 
                onkeypress="return SoloNumeros(event)" value="0" min="1" max='. $row["existencias"] .' />
            </div>
            <div class="col-6">
                <a class="card-link btn btn-outline-primary" 
                onclick="AnnadirProducto('. $row["id_producto"] .', '. $row["existencias"] .');">Añadir al Carrito</a>
            </div>
            </div>';
            }
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    }
}

if(isset($_POST["btnCambiarEstadoProducto"]))
{
    $idProducto = $_POST["idProducto"];
    $respuesta = CambiarEstadoProducto($idProducto);

    if($respuesta == true)
    {
        header("location: ../Modulo-Productos/productos.php");
    }
    else
    {
        $_POST["msj"] = "No se ha podido inactivar la información del usuario.";
    }
}


function VistaFavoritos()
{
    $respuesta = verProductosFavoritos();

    if ($respuesta->num_rows > 0) {
        echo '<br/>';
        echo '<div class="row">';
        while ($row = mysqli_fetch_array($respuesta)) {
            echo '<div class="col-md-2 mb-3">';
            echo '<div class="card h-90">';
            echo '<img src="' . $row["url_img"] . '" alt="' . $row["nombre_producto"] . '" class="card-img-top imagen-producto" style= "height: 200px">';
            echo '<div class="card-body" style= "height: 100px">';
            echo '<h6 class="card-title">' . $row["nombre_producto"] . '</h6>';
            echo '<p class="card-text">Precio: ₡ ' . number_format($row["precio"], 0, ',', '.') . '</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    }
    }


function ConsultarProducto($IdProducto)
{
    $respuesta = ConsultarProductoBD($IdProducto);
    if ($respuesta->num_rows > 0) {
        return mysqli_fetch_array($respuesta);
    }
}

if (isset($_POST["btnAgregarProducto"])) {
    $Nombre = $_POST["txtNombreProducto"];
    $Precio = $_POST["txtPrecio"];
    $Categoria = $_POST["cboCategoria"];
    $Material = $_POST["cboMaterial"];
    $Existencias = $_POST["txtExistencias"];

    $img = '../View/img/' . $_FILES["txtUrl"]["name"];

    $origen = $_FILES["txtUrl"]["tmp_name"];
    $destino = __DIR__ . '/../View/img/' . $_FILES["txtUrl"]["name"];
    move_uploaded_file($origen, $destino);
    $respuesta = RegistrarProducto($Nombre, $Precio, $Material, $Categoria, $img, $Existencias);
    if ($respuesta == true) {
        header("Location: ../Modulo-Productos/productos.php");
        exit();
    }
}

if (isset($_POST["btnEditarProducto"])) {
    $idProducto = $_POST["txtIdProducto"];
    $Nombre = $_POST["txtNombreProducto"];
    $Precio = $_POST["txtPrecio"];
    $img = $_POST["txtUrl"];
    $Categoria = $_POST["cboCategoria"];
    $Material = $_POST["cboMaterial"];
    $Existencias = $_POST["txtExistencias"];
    $Favorito = $_POST["cboFavorito"];
    $respuesta = ActualizarProducto($idProducto, $Nombre, $Precio, $img, $Categoria, $Material, $Existencias, $Favorito);
    if ($respuesta == true) {
        header("Location: ../Modulo-Productos/productos.php");
        exit();
    }
}

