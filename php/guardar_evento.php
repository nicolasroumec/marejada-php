<?php
$conexion = mysqli_connect("localhost", "root", "", "marejada");

if (!$conexion) {
    die("No se ha podido conectar a la base de datos: " . mysqli_connect_error());
}

mysqli_begin_transaction($conexion);

try {
    $stmt = mysqli_prepare($conexion, "INSERT INTO eventos (nombre, descripcion, autor, ubicacion) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssss", $_POST['nombre'], $_POST['descripcion'], $_POST['autor'], $_POST['ubicacion']);
    mysqli_stmt_execute($stmt);
    
    $id_evento = mysqli_insert_id($conexion);
    
    $stmt = mysqli_prepare($conexion, "INSERT INTO horarios (id_evento, horario, capacidad) VALUES (?, ?, ?)");
    $capacidad = $_POST['capacidad'];
    foreach ($_POST['horarios'] as $horario) {
        mysqli_stmt_bind_param($stmt, "isi", $id_evento, $horario, $capacidad);
        mysqli_stmt_execute($stmt);
    }
    
    mysqli_commit($conexion);
    $message = "Evento guardado con éxito";
} catch (Exception $e) {
    mysqli_rollback($conexion);
    $message = "Error al guardar el evento: " . $e->getMessage();
}

mysqli_close($conexion);

header("Location: ../admin.php?message=" . urlencode($message));
exit();
?>