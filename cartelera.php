<?php
include ('php/conexion_usuarios.php'); //Incluyo la conexion y consultas a usuarios
include ('php/router_eventos.php');  //Incluyo la conexion y consultas a eventos

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
    <title>Cartelera - Marejada 2024</title>
</head>
<body style="font-family: Arial, sans-serif;">
    <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']);?> </h1> <!--Por ahora se muestra el mail, en vez del nombre-->
    <a href="php/cerrar_sesion.php">Cerrar sesión</a>
    <div id="events" style=" background-color:aliceblue">
        <h2 style = "margin: 0; padding: 0; background-color:aqua">lista de eventos actuales:</h2>
        <ul>
            <?php foreach ($eventos as $evento): ?>
                <?php echo "*" .  $evento["id"] . " | " . $evento['nombre'] . " | " . $evento['descripcion'] ." | ". $evento['profesor'] ." | ". $evento['horario'] ." | ". $evento['duracion'] ." | ". $evento['cupo'] ." | ". $evento['bloque']  ;?> <br>
            <?php endforeach; ?>    
            
        </ul>
        
    </div>
</body>
</html>
