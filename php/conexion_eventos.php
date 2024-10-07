<?php
// conexion.php
$host = 'localhost';
$dbname = 'marejada';
$username = 'root';
$password = '';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error en la conexión; no se pudieron obtener los eventos : " . $e->getMessage();
    exit;  // Termina el script si no se puede conectar
}
