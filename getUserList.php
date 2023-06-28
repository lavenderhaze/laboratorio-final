<?php
$host = 'localhost';
$db = 'laboratorio_final';
$user = 'sbullon';
$password = 'pwrgjl2';

$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    die('Error de conexión: ' . $conn->connect_error);
}

$consulta = "SELECT * FROM usuarios";
$resultado = $conn->query($consulta);

if ($resultado->num_rows > 0) {
    echo '<h2>Listado de Usuarios Registrados</h2>';
    echo '<ul>';
    while ($row = $resultado->fetch_assoc()) {
        echo '<li>' . $row['nombre'] . ' ' . $row['apellido1'] . ' ' . $row['apellido2'] . '</li>';
    }
    echo '</ul>';
} else {
    echo 'No se encontraron usuarios registrados.';
}

$conn->close();
?>
