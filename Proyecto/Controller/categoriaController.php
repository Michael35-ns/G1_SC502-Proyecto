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

function ObtenerOpcionesMaterial() 
{
    $materiales = VerMateriales();
    $htmlOpciones = '';

    if ($materiales !== false) {
        while ($material = mysqli_fetch_assoc($materiales)) {
            $htmlOpciones .= '<option value="' . $material['id_material'] . '">' . $material['descripcion'] . '</option>';
        }
    } else {
        $htmlOpciones = '<option value="">No se encontraron categorías</option>';
    }

    return $htmlOpciones;
}