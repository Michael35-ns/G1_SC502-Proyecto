<?php
include_once '../../Model/productoModel.php';

$css = file_get_contents('../../View/css/arenal.css');
echo '<style>' . $css . '</style>';

function ConsultarProductos($idCategoria)
{
    $respuesta = ProductosXCategoria($idCategoria);
    echo '  <a href="agregarProducto.php"><button type="submit" id="btnRegistrarUsuario" name="btnIniciarSesion" 
  class="btn btn-block btn-outline-primary btn-md font-weight-bold auth-form-btn ">Agregar producto</button></a>';
    if ($respuesta->num_rows > 0) {

        echo '<div class="cards-container">';
        while ($row = mysqli_fetch_array($respuesta)) {
            echo '<div class="col-md-3">';
            echo '<div class="card">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $row["nombre_producto"] . '</h5>';
            echo '<p class="card-text">Precio: ₡ ' . number_format($row["precio"], 0, ',', '.') . '</p>';
            echo '<p class="card-text">Existencias: ' .$row["existencias"]. ' unidades </p>';
            echo '<img src="' . $row["url_img"] . '" alt="' . $row["nombre_producto"] . '" class="imagen-producto">';
            echo '<div class="text-center">';
            echo '<br />';
            echo ' <a href="editarProducto.php?q=' . $row["id_producto"] . '" class="btn btn-outline-dark flex">
                <i class="fas fa-edit"></i></a>
            <a href="actualizarUsuario.php" class="btn btn-outline-primary flex">
                <i class="mdi mdi-cart"></i></a>';
            echo ' <a href="actualizarUsuario.php" class="btn btn-outline-danger flex  ">
                <i class="fa fa-trash"></i></a>';
            echo '</div>'; // Cerrar el div text-center
            echo '</div>'; // Cerrar el div card-body
            echo '</div>'; // Cerrar el div card
            echo '</div>'; // Cerrar el div col-md-3
            echo '<br />';
        }
        echo '</div>'; // Cerrar el div cards-container
    }
}

function VistaProductos()
{
    $respuesta = VistaProducto();

    if ($respuesta->num_rows > 0) {
        while ($row = mysqli_fetch_array($respuesta)) {
            echo '<tr class="text-dark font-weight-bold table-active">';
            echo '<td style="font-size: larger;">' . $row["nombre_producto"] . "</td>";
            echo '<td style="font-size: larger;">' . '₡' . number_format($row["precio"], 0, ',', '.') . "</td>";
            echo '<td style="font-size: larger;">' . $row["nombre_categoria"] . "</td>";
            echo '<td style="font-size: larger;">' . $row["descripcion"] . "</td>";
            echo '</tr>';
        }
    }
}

function ConsultarProducto($IdProducto)
{
    $respuesta = ConsultarProductoBD($IdProducto);
    if($respuesta -> num_rows > 0)
    {
        return mysqli_fetch_array($respuesta);
    }
}

if (isset($_POST["btnAgregarProducto"])) {
    $Nombre = $_POST["txtNombreProducto"];
    $Precio = $_POST["txtPrecio"];
    $img = $_POST["txtUrl"];
    $Categoria = $_POST["cboCategoria"];
    $Material = $_POST["cboMaterial"];
    $Existencias = $_POST["txtExistencias"];
    $respuesta = RegistrarProducto($Nombre, $Precio,$Material,$Categoria ,$img,$Existencias);
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
    $respuesta = ActualizarProducto($idProducto, $Nombre, $Precio, $img, $Categoria, $Material,$Existencias);
    if ($respuesta == true) {
        header("Location: ../Modulo-Productos/productos.php");
        exit();
    }
}

