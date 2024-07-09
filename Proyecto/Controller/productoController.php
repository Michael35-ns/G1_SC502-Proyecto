<?php include_once '../Model/productoModel.php';
$css = file_get_contents('../View/css/arenal.css');
echo '<style>'. $css. '</style>';
function ConsultarProductos()
{
    $respuesta = ConsultarProducto();

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