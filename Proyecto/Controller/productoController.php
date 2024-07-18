<?php
include_once '../../Model/productoModel.php';

// Manejar la acción de agregar producto antes de cualquier salida
if (isset($_POST["btnAgregarProducto"])) {
    $Nombre = $_POST["txtNombreProducto"];
    $Precio = $_POST["txtPrecio"];
    $img = $_POST["txtUrl"];
    $respuesta = RegistrarProducto($Nombre, $Precio, $img);
    if ($respuesta == true) {
        header("Location: ../Modulo-Productos/productos.php");
        exit(); 
    }
}

$css = file_get_contents('../../View/css/arenal.css');
echo '<style>' . $css . '</style>';

function ConsultarProductos($idCategoria)
{
    $respuesta = ProductosXCategoria($idCategoria);

    if ($respuesta->num_rows > 0) {
        echo '<div class="cards-container">';
        while ($row = mysqli_fetch_array($respuesta)) {
            echo '<div class="col-md-3">';
            echo '<div class="card">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $row["nombre_producto"] . '</h5>';
            echo '<p class="card-text">Precio: ₡ ' . number_format($row["precio"], 0, ',', '.') . '</p>';
            echo '<img src="' . $row["url_img"] . '" alt="' . $row["nombre_producto"] . '" class="imagen-producto">';
            echo '<div class="text-center">';
            echo '<br />';
            echo ' <button type="button" class="btn btn-warning AbrirModal" id="btnAbrirModalProductos" data-toggle="modal" data-target="#ModalUsuarios" 
            data-id=' . $row["id_producto"] . ' data-name="' . $row["nombre_producto"] . '">
                <i class="fa fa-edit"></i>
            </button>
            <a href="actualizarUsuario.php" class="btn btn-danger">
                <i class="fa fa-user"></i>
                  </a>';
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
?>
