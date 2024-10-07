<?php
    include 'conexion.php';

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];
    $contrasenaRepetida = $_POST['contrasena-repetida'];
    $escuela = $_POST['escuela'];
    $ano = $_POST['ano'];
    $curso = isset($_POST['curso']) && $_POST['curso'] !== "" ? $_POST['curso'] : '';

    if ($contrasena !== $contrasenaRepetida) {
        die("Las contraseñas no coinciden.");
    }

    $contrasenaHashed = password_hash($contrasena, PASSWORD_DEFAULT);

    $query = "INSERT INTO usuarios (nombre, apellido, email, contrasena, escuela, ano, curso) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexion, $query);

    mysqli_stmt_bind_param($stmt, 'sssssss', $nombre, $apellido, $email, $contrasenaHashed, $escuela, $ano, $curso);

    $checkEmailQuery = "SELECT * FROM usuarios WHERE email = ?";
    $checkStmt = mysqli_prepare($conexion, $checkEmailQuery);
    mysqli_stmt_bind_param($checkStmt, 's', $email);
    mysqli_stmt_execute($checkStmt);
    mysqli_stmt_store_result($checkStmt);

    if (mysqli_stmt_num_rows($checkStmt) > 0) {
        die("El correo electrónico ya está registrado. ");
    }
    mysqli_stmt_close($checkStmt);

    if (mysqli_stmt_execute($stmt)) {
        echo "Registro exitoso.";
    } else {
        echo "Error al registrar: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conexion);
?>