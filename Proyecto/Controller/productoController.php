<?php include_once '../../Model/productoModel.php';
$css = file_get_contents('../../View/css/arenal.css');
echo '<style>'. $css. '</style>';
function ConsultarProductos($idCategoria)
{
    $respuesta = ProductosXCategoria($idCategoria);

    if($respuesta -> num_rows > 0)
    {
        echo '<div class="cards-container">';
        while ($row = mysqli_fetch_array($respuesta)) 
        { 
            echo '<div class="col-md-3">';
            echo '<div class="card">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">'. $row["nombre_producto"]. '</h5>';
            echo '<p class="card-text">Precio: ₡ '. number_format($row["precio"], 0, ',', '.'). '</p>';
            echo '<img  src="'. $row["url_img"]. '" alt="'. $row["nombre_producto"]. '" class = "imagen-producto">'; 
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '<br />';
        }
    }
}

function VistaProductos()
{
    $respuesta = VistaProducto();

    if($respuesta -> num_rows > 0)
    {
        while ($row = mysqli_fetch_array($respuesta)) 
        { 
            echo '<tr class="text-dark font-weight-bold table-active">';
            echo '<td style="font-size: larger;">' . $row["nombre_producto"] . "</td>";
            echo '<td style="font-size: larger;">' .'₡'. number_format($row["precio"], 0, ',', '.') . "</td>";
            echo '<td style="font-size: larger;">' . $row["nombre_categoria"] . "</td>";
            echo '<td style="font-size: larger;">' . $row["descripcion"] . "</td>";
            echo '</tr>';
        }
    }
}

if (isset($_POST["btnAgregarLaserMadera"])) 
{
    $Nombre = $_POST["txtNombre"];
    $Precio = $_POST["txtPrecio"];
    $IdCategoria = 4;
    $IdMaterial = 4;
    $respuesta = RegistrarProducto($Nombre,$Precio,$IdMaterial,$IdCategoria);
    if($respuesta == true)
    {
        header("location: ../Modulo-Productos/corteLaserMadera.php");
    }
}