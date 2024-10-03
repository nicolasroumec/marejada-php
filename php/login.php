<?php
session_start();
require_once 'conexion.php';

function limpiarEntrada($dato) {
    return htmlspecialchars(stripslashes(trim($dato)));
}

if (isset($_SESSION['usuario'])) {
    header("Location: ../cartelera.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = limpiarEntrada($_POST['email']);
    $contrasena = limpiarEntrada($_POST['contrasena']); 

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Formato de email inválido.";
        header("Location: ../index.php");
        exit();
    }

    $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();
        if (password_verify($contrasena, $usuario['contrasena'])) {
            $_SESSION['usuario'] = $email;
            $_SESSION['usuario_id'] = $usuario['id'];
            header("Location: ../cartelera.php");
            exit();
        } else {
            $_SESSION['error'] = "Contraseña incorrecta.";
        }
    } else {
        $_SESSION['error'] = "Usuario no encontrado.";
    }

    header("Location: ../index.php");
    exit();
}

header("Location: ../index.php");
exit();