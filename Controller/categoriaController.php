<?php include_once '../../Model/categoriaModel.php';

function ObtenerOpcionesCategorias()
{
    $categorias = VerCategorias();
    $htmlOpciones = '';

    if ($categorias !== false) {
        while ($categoria = mysqli_fetch_assoc($categorias)) {
            $htmlOpciones .= '<option value="' . $categoria['id_categoria'] . '">' . $categoria['nombre_categoria'] . '</option>';
        }
    } else {
        $htmlOpciones = '<option value="">No se encontraron categorías</option>';
    }

    return $htmlOpciones;
}

function VerCategoriasCard()
{
    $respuesta = VerCategorias();
    if ($respuesta->num_rows > 0) {
        echo '<br/>';
        echo '<div class="container">';
        echo '<div class="row">';
        while ($row = mysqli_fetch_array($respuesta)) {
            echo '<div class="col-lg-4 col-md-6 mb-4">';
            echo '<div class="card">';
            echo '<div class="card-body">';
            echo '<h2 class="text-primary font-weight-bold "> ' . $row['nombre_categoria'] . '</h2>';
            echo '<div class="card-product">';
            echo '<br />';
            echo '<div class="responsive-square">';
            echo '<a href="productoVista.php?q=' . $row["id_categoria"] . '"><img src="' . $row["img_categoria"] . '" alt="Imagen" class="img-fluid"></a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
        echo '</div>';
    }
}



function ObtenerOpcionesMaterial()
{
    $materiales = VerMateriales();
    $htmlOpciones = '';

    if ($materiales !== false) {
        while ($material = mysqli_fetch_assoc($materiales)) {
            $htmlOpciones .= '<option value="' . $material['id_material'] . '">' . $material['descripcion'] . '</option>';
        }
    } else {
        $htmlOpciones = '<option value="">No se encontraron materiales</option>';
    }

    return $htmlOpciones;
}
