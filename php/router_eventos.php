<?php
include 'conexion_eventos.php';

$query = 'SELECT id, nombre, descripcion, profesor, horario, duracion, cupo, bloque FROM eventos';
$stmt = $db-> prepare($query);
$stmt->execute();

//Obtenemos todos los resultados de la tabla eventos
$eventos = $stmt->fetchAll(PDO::FETCH_ASSOC);