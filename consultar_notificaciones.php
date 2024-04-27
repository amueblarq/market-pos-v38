<?php
// Conexión a la base de datos (suponiendo que ya tienes esta parte configurada)
$servername = "217.15.171.64";
$username = "Amueblarq1";
$password = "Amueblarq.270";
$dbname = "sistema_poss";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consultar todas las notificaciones
$sql = "SELECT * FROM notificaciones";
$result = $conn->query($sql);

// Construir HTML para todas las notificaciones
$html = '<div class="container">';
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $html .= '<div class="notification" style="border: 1px solid #006400; border-radius: 5px; padding: 10px; margin-bottom: 10px;">';
        $html .= '<p>' . $row["mensaje"] . '</p>';
        $html .= '</div>';
    }
} else {
    $html .= '<div class="notification">';
    $html .= '<p>No hay notificaciones</p>';
    $html .= '</div>';
}
$html .= '</div>';

// Devolver HTML como respuesta
echo $html;

// Cerrar conexión
$conn->close();
?>
