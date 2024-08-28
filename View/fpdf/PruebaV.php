<?php
require_once '../../Model/baseDatosModel.php';
require('./fpdf.php');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        $this->Image('../images/Group 2.png', 185, 5, 20); // Logo de la empresa
        $this->SetFont('Arial', 'B', 19);
        $this->Cell(45); // Movernos a la derecha
        $this->SetTextColor(0, 0, 0);
        $this->Cell(110, 15, utf8_decode('ARENAL FRAMES'), 1, 1, 'C');
        $this->Ln(3);
        $this->SetTextColor(103);

        // Información adicional
        $this->Cell(110);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(96, 10, utf8_decode("Ubicación : "), 0, 0);
        $this->Ln(5);

        $this->Cell(110);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(59, 10, utf8_decode("Teléfono : "), 0, 0);
        $this->Ln(5);

        $this->Cell(110);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(85, 10, utf8_decode("Correo : "), 0, 0);
        $this->Ln(5);

        $this->Cell(110);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(85, 10, utf8_decode("Sucursal : "), 0, 0);
        $this->Ln(10);

        // Título de la tabla
        $this->SetTextColor(100, 60, 158);
        $this->Cell(50);
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(100, 10, utf8_decode("REPORTE DE VENTAS"), 0, 1, 'C');
        $this->Ln(6);

        // Campos de la tabla
        $this->SetFillColor(100, 60, 158);
        $this->SetTextColor(255, 255, 255);
        $this->SetDrawColor(163, 163, 163);
        $this->SetFont('Arial', 'B', 11);
        $this->Cell(10, 10, utf8_decode('N'), 1, 0, 'C', 1);
        $this->Cell(25, 10, utf8_decode('Nombre del Usua'), 1, 0, 'C', 1);
        $this->Cell(25, 10, utf8_decode('Impuesto'), 1, 0, 'C', 1);
        $this->Cell(25, 10, utf8_decode('Total'), 1, 0, 'C', 1);
        $this->Cell(60, 10, utf8_decode('Fecha de Facturación'), 1, 0, 'C', 1);
        $this->Cell(25, 10, utf8_decode('Cliente'), 1, 1, 'C', 1);
    }

    // Pie de página
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
        $this->SetY(-10); // Ajustar la posición del pie de página
        $this->Cell(0, 10, utf8_decode(date('d/m/Y')), 0, 0, 'C');
    }
}

// Abrir la conexión a la base de datos
$conexion = AbrirBaseDatos();

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Validar el parámetro $_GET["q"] y escapar datos
$id_maestro = isset($_GET["q"]) ? intval($_GET["q"]) : 0;

if ($id_maestro > 0) {
    $query = "SELECT * FROM maestro WHERE id_usuario = $id_maestro";
    $consulta_info = $conexion->query($query);

    if (!$consulta_info) {
        die("Error en la consulta: " . $conexion->error);
    }

    if ($consulta_info->num_rows > 0) {
        $pdf = new PDF();
        $pdf->AddPage();
        $pdf->AliasNbPages();

        $pdf->SetFont('Arial', '', 12);
        $pdf->SetDrawColor(163, 163, 163);

        while ($dato_info = $consulta_info->fetch_object()) {
            // Formatear los valores numéricos y de fecha
            $pdf->Cell(10, 10, utf8_decode($dato_info->ID_maestro ?? ''), 1, 0, 'C');
            $pdf->Cell(25, 10, utf8_decode(number_format($dato_info->sub_total ?? 0, 2, ',', '.')), 1, 0, 'C');
            $pdf->Cell(25, 10, utf8_decode(number_format($dato_info->impuesto ?? 0, 2, ',', '.')), 1, 0, 'C');
            $pdf->Cell(25, 10, utf8_decode(number_format($dato_info->total ?? 0, 2, ',', '.')), 1, 0, 'C');
            $pdf->Cell(60, 10, utf8_decode(date('d/m/Y', strtotime($dato_info->fecha_factura ?? ''))), 1, 0, 'C');
            $pdf->Cell(25, 10, utf8_decode($dato_info->id_usuario ?? ''), 1, 1, 'C');
        }

        $pdf->Output('Prueba.pdf', 'I');
    } else {
        echo "No se encontraron datos en la consulta.";
    }
} else {
    echo "ID de maestro inválido.";
}

// Cerrar la conexión a la base de datos
CerrarBaseDatos($conexion);
?>
