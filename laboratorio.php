<?php
$host = 'localhost';
$db = 'laboratorio_final';
$user = 'sbullon';
$password = 'pwrgjl2';

$conn = new mysqli($host, $user, $password, $db);

    if ($conn->connect_error) {
        die('Error de conexión: ' . $conn->connect_error);
    }

$nombre = $_POST['nombre'];
$apellido1 = $_POST['apellido1'];
$apellido2 = $_POST['apellido2'];
$email = $_POST['email'];
$login = $_POST['login'];
$password = $_POST['password'];

if (!preg_match("/^([a-zA-ZÁÉÍÓÚáéíóúÑñ]+\s)*[a-zA-ZÁÉÍÓÚáéíóúÑñ]+$/", $nombre) || !preg_match("/^([a-zA-ZÁÉÍÓÚáéíóúÑñ]+\s)*[a-zA-ZÁÉÍÓÚáéíóúÑñ]+$/", $apellido1) || !preg_match("/^([a-zA-ZÁÉÍÓÚáéíóúÑñ]+\s)*[a-zA-ZÁÉÍÓÚáéíóúÑñ]+$/", $apellido2)) {
    die('Los nombres y apellidos solo deben contener letras y espacios.');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die('El email ingresado no es válido.');
}

if (!preg_match("/^[a-zA-Z0-9]+$/", $login)) {
    die('El login solo debe contener caracteres alfanuméricos.');
}

if (strlen($password) < 4 || strlen($password) > 8) {
    die('La contraseña debe tener entre 4 y 8 caracteres.');
}

try {
    $consulta = "SELECT * FROM usuarios WHERE email = '$email'";
    $resultado = $conn->query($consulta);

    if ($resultado->num_rows > 0) {
        die('El email ya está registrado.');
    }

} catch   (mysqli_sql_exception $e) {
    die('Error en la operación de la base de datos: ' . $e->getMessage());
}   

$insertar = "INSERT INTO usuarios (nombre, apellido1, apellido2, email, login, password)
             VALUES ('$nombre', '$apellido1', '$apellido2', '$email', '$login', '$password')";

if ($conn->query($insertar) === TRUE) {
    echo 'Registro completado con éxito.';
    echo '<br>';
    echo '<a href="laboratorio.html">Volver</a>';
    echo '<button onclick="getUserList()">Consulta</button>';
    echo '<script src="validation.js"></script>';
    echo '<div id="userList">';
    echo '<ul>';
} else {
    echo 'Error al registrar los datos: ' . $conn->error;
}

$conn->close();
?>
