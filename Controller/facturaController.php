<?php include_once '../../Model/facturaModel.php';

    function VerFacturasDB($idUsuario)
    {
        $respuesta = VerFacturas($idUsuario);

        if ($respuesta->num_rows > 0) {
            while ($row = mysqli_fetch_array($respuesta)) {
                echo '<tr class = "text-center">';
                echo '<td>' . $row["NOMBRE_USUARIO"] . "</td>";
                echo "<td>" . $row["TOTAL_COMPRADO"] . "</td>";
                echo "<td> ₡ " . number_format($row["TOTAL_PAGADO"], 0, ',', '.')  . "</td>";
                echo "<td>" . $row["FECHA_FACTURA"] . "</td>";
                echo '<td>
        <a href="verFactura.php?q=' . $row["ID_MAESTRO"] . '" class="btn btn-outline-dark mx-1">
                    <i class="mdi mdi-information-outline"></i>
                </a>
                    </td>';
                echo "</tr>";
            }
        }
    }

    function verDetallesDB($idMaestro)
    {
        $respuesta = VerDetalles($idMaestro);

        if ($respuesta->num_rows > 0) {
            while ($row = mysqli_fetch_array($respuesta)) {
                echo '<tr class = "text-center">';
                echo '<td>' . $row["NOMBRE_PRODUCTO"] . "</td>";
                echo "<td>" . $row["CANTIDAD"] . "</td>";
                echo "<td> ₡ " . number_format($row["PRECIO"], 0, ',', '.')  . "</td>";
                echo '<td> <img src="' . $row["URL_IMG"] . '" alt="' . $row["NOMBRE_PRODUCTO"] . '"> </td>';
                echo "</tr>";
            }
        }
    }
