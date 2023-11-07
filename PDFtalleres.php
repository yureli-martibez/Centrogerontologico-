<?php
require_once('library/tcpdf.php');

// Crear una instancia de TCPDF
$pdf = new TCPDF();

// Establecer las propiedades del documento
$pdf->SetCreator('Panel de Administrador');
$pdf->SetAuthor('Tu Nombre');
$pdf->SetTitle('Lista de Talleres');
$pdf->SetSubject('Lista de Talleres en PDF');
$pdf->SetKeywords('Talleres, Lista, PDF');

// Agregar una página
$pdf->AddPage();

// Agregar encabezado con nombre de la página y logotipo
$htmlHeader = '<table width="100%">
    <tr>
        <td align="left">
            <img src="images/logo_ce2.jpg" alt="Logotipo" width="90">
        </td>
        <td align="right">
            <h1>Centro Gerontológico Integral de Ixmiquilpan</h1>
        </td>
    </tr>
    <tr>
        <td align="center"> 
            <h1>Lista de Pacientes con Talleres</h1>
        </td>
    </tr>
</table>';
$pdf->writeHTML($htmlHeader, true, false, false, false);

// Configurar los estilos de la tabla (Bootstrap)
$pdf->SetTextColor(0);

// Configurar el contenido de la tabla (Bootstrap)
$html = '<table class="table table-responsive">
    <thead>
        <tr style="background-color: #9B9B9B;">
            <th style="font-weight: bold; font-size: 12px;">Nombre</th>
            <th style="font-weight: bold; font-size: 12px;">Apellidos</th>
            <th style="font-weight: bold; font-size: 12px;">Talleres</th>
        </tr>
    </thead>
    <tbody>';

// Variable para alternar el color de fondo
$greyBackground = false;

// Obtener los datos de la base de datos y agregarlos a la tabla
include_once('conex.php');
$conexion = conn();

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

$sql = "SELECT pa.Nombre, pa.Apellidos, GROUP_CONCAT(pt.nombre_ta SEPARATOR ', ') AS talleres
        FROM paciente pa
        INNER JOIN pertaller pt ON pa.id_paciente = pt.id_paciente
        GROUP BY pa.Nombre, pa.Apellidos";

$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        // Cambiar el color de fondo alternadamente
        $backgroundStyle = $greyBackground ? 'background-color: #DDDDDD;' : '';
        $greyBackground = !$greyBackground;

        $html .= '<tr style="' . $backgroundStyle . '">';
        $html .= '<td style="font-size: 11px;">' . $fila['Nombre'] . '</td>';
        $html .= '<td style="font-size: 11px;">' . $fila['Apellidos'] . '</td>';
        $html .= '<td style="font-size: 11px;">' . $fila['talleres'] . '</td>';
        $html .= '</tr>';
    }
}

$html .= '</tbody></table>';

// Escribir el contenido en el PDF
$pdf->writeHTML($html, true, 0, true, 0);

// Generar el PDF y ofrecer la descarga
$pdf->Output('lista_talleres.pdf', 'D');

$conexion->close();
?>
