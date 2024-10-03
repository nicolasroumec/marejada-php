<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marejada 2024</title>
</head>
<body>
    <h1>LOGIN EXITOSO</h1>
    <a href="php/cerrar_sesion.php">Cerrar sesión</a>
</body>
</html>
