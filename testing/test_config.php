<?php
/*
require_once('../../config/config.php');

// Crear una instancia de la clase ClaseConectar
$conectar = new ClaseConectar();

// Llamar al método ProcedimientoParaConectar
$conectar->ProcedimientoParaConectar();

// Imprimir mensaje de conexión exitosa
echo "Conexión exitosa con la base de datos." . PHP_EOL;

// Imprimir el objeto de conexión
var_dump($conectar->conexion);
*/

require_once('../config/config.php');

try {
    $conectar = new ClaseConectar();
    $conexion = $conectar->conectar();
    echo "Conexión exitosa con la base de datos." . PHP_EOL;
    var_dump($conexion);
} catch (Exception $e) {
    echo "Error al conectar con la base de datos: " . $e->getMessage() . PHP_EOL;
}

?>