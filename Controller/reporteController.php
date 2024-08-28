<?php
require('../View/fpdf/fpdf.php');
include_once '../Model/reporteModel.php';  // Incluye el modelo que contiene la función

if (isset($_GET['q']) && is_numeric($_GET['q'])) {

    
    $idUsuario = intval($_GET['q']);
    $datos = obtenerDatosReporteVentas($idUsuario);  // Llama a la función del modelo

    if ($datos && $datos->num_rows > 0) {
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->AliasNbPages();
        $pdf->SetFont('Arial', '', 12);
        $pdf->SetDrawColor(163, 163, 163);

        // Agrega la cabecera de la tabla
        $pdf->SetFillColor(100, 60, 158);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(18, 10, 'N', 1, 0, 'C', 1); // Cambié el ancho a 18
        $pdf->Cell(37, 10, 'Nombre del Cliente', 1, 0, 'C', 1);
        $pdf->Cell(20, 10, 'Sub Total', 1, 0, 'C', 1);
        $pdf->Cell(20, 10, 'Impuesto', 1, 0, 'C', 1);
        $pdf->Cell(20, 10, 'Total', 1, 0, 'C', 1);
        $pdf->Cell(20, 10, 'Cantidad', 1, 0, 'C', 1);
        $pdf->Cell(60, 10, 'Fecha de Facturacion', 1, 1, 'C', 1);

        // Agrega los datos de la tabla
        while ($fila = $datos->fetch_assoc()) {
            $pdf->Cell(18, 10, utf8_decode($fila['id_maestro'] ?? ''), 1, 0, 'C');
            $pdf->Cell(37, 10, utf8_decode($fila['usuario_nombre'] ?? ''), 1, 0, 'C');
            $pdf->Cell(20, 10, number_format($fila['sub_total'] ?? 0, 2, ',', '.'), 1, 0, 'C');
            $pdf->Cell(20, 10, number_format($fila['impuesto'] ?? 0, 2, ',', '.'), 1, 0, 'C');
            $pdf->Cell(20, 10, number_format($fila['total_precio'] ?? 0, 2, ',', '.'), 1, 0, 'C');
            $pdf->Cell(20, 10, number_format($fila['total_cantidad'] ?? 0, 2, ',', '.'), 1, 0, 'C');
            $pdf->Cell(60, 10, date('d/m/Y', strtotime($fila['fecha_factura'] ?? '')), 1, 1, 'C');
        }

        $pdf->Output('reporte_ventas.pdf', 'I');
    } else {
        echo "No se encontraron datos para el ID especificado.";
    }
} else {
    echo "ID de Usuario inválido.";
}
?>
