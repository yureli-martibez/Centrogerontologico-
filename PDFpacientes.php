<?php
// Cargar la biblioteca TCPDF
require_once('library/tcpdf.php');

// Crear una instancia de TCPDF
$pdf = new TCPDF();

// Establecer las propiedades del documento
$pdf->SetCreator('Panel de Administrador');
$pdf->SetAuthor('Tu Nombre');
$pdf->SetTitle('Lista de Pacientes');
$pdf->SetSubject('Lista de Pacientes en PDF');
$pdf->SetKeywords('Pacientes, Lista, PDF');

// Agregar una página
$pdf->AddPage();

// Agregar encabezado con nombre de la página y logotipo
// Agregar encabezado personalizado con logotipo, nombre de la página y título centrado
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
            <h1>Lista de Pacientes</h1>
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
            <th style="font-weight: bold; font-size: 10px;">Nombre</th>
            <th style="font-weight: bold; font-size: 10px;">Apellido</th>
            <th style="font-weight: bold; font-size: 10px;">Correo</th>
            <th style="font-weight: bold; font-size: 10px;">Teléfono</th>
            <th style="font-weight: bold; font-size: 10px;">Domicilio</th>
            <th style="font-weight: bold; font-size: 10px;">Fecha de Nacimiento</th>
            <th style="font-weight: bold; font-size: 10px;">Tutor</th>
            <th style="font-weight: bold; font-size: 10px;">Teléfono del Tutor</th>
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

$sql = "SELECT * FROM paciente";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        // Cambiar el color de fondo alternadamente
        $backgroundStyle = $greyBackground ? 'background-color: #DDDDDD;' : '';
        $greyBackground = !$greyBackground;

        $html .= '<tr style="' . $backgroundStyle . '">';
        $html .= '<td style="font-size: 10px;">' . $fila['Nombre'] . '</td>';
        $html .= '<td style="font-size: 10px;">' . $fila['Apellidos'] . '</td>';
        $html .= '<td style="font-size: 10px;">' . $fila['Correo'] . '</td>';
        $html .= '<td style="font-size: 10px;">' . $fila['Teléfono'] . '</td>';
        $html .= '<td style="font-size: 10px;">' . $fila['Domicilio'] . '</td>';
        $html .= '<td style="font-size: 10px;">' . $fila['Fecha_nac'] . '</td>';
        $html .= '<td style="font-size: 10px;">' . $fila['Pers_contact'] . '</td>';
        $html .= '<td style="font-size: 10px;">' . $fila['tel_contac'] . '</td>';
        $html .= '</tr>';
    }
}

$html .= '</tbody></table>';



// Registra el reporte en la base de datos

date_default_timezone_set('America/Mexico_City');
$nombreReporte = 'pacientes'; // Reemplaza esto con el nombre real del reporte
$fechaReporte = date('Y-m-d'); // Obtiene la fecha actual en formato YYYY-MM-DD
$horaReporte = date('H:i:s'); // Obtiene la hora actual en formato HH:MM:SS
$idAdmin = 1; // Reemplaza con el ID del administrador correspondiente

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Inserta el reporte en la tabla "reportes"
$sqlReporte = "INSERT INTO reportes (nombre_re, fecha, hora, id_admin) VALUES ('$nombreReporte', '$fechaReporte', '$horaReporte', $idAdmin)";

if ($conexion->query($sqlReporte) === TRUE) {
    // El reporte se ha registrado correctamente en la base de datos
} else {
    // Manejo de errores si la inserción falla
    $error = "Error al registrar el reporte: " . $conexion->error;
    echo $error; // Muestra el mensaje de error
}

$conexion->close();

// Escribir el contenido en el PDF
$pdf->writeHTML($html, true, 0, true, 0);

// Generar el PDF y ofrecer la descarga
$pdf->Output('lista_pacientes.pdf', 'D');


?>

