<?php
    $conexion = mysqli_connect("localhost","root","","marejada");

    if($conexion){
        echo 'Conectado exitosamente a la base de datos ';
    }else{
        echo 'No se ha podido conectar a la base de datos ';
    }
    
?>