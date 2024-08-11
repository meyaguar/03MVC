<?php
require_once('../models/productos.model.php');

$productos = new Productos();

// Probar el método todos()
echo "<br> Todos los productos:" . PHP_EOL;
$datos = $productos->todos();
var_dump($datos);

$productos = new Productos();

// Probar el método uno()
$idProductos = 1;
echo "<br> Producto con ID $idProductos:" . PHP_EOL;
$datos = $productos->uno($idProductos);
var_dump($datos);

$productos = new Productos();

// Probar el método insertar()
$Codigo_Barras = '123456789012';
$Nombre_Producto = 'Producto de prueba';
$Graba_IVA = 1;
echo "Insertar producto:" . PHP_EOL;
$resultado = $productos->insertar($Codigo_Barras, $Nombre_Producto, $Graba_IVA);
var_dump($resultado);

$productos = new Productos();

// Probar el método actualizar()
$idProductos = 1;
$Codigo_Barras = '123456789013';
$Nombre_Producto = 'Producto de prueba actualizado';
$Graba_IVA = 0;
echo "<br> Actualizar producto con ID $idProductos:" . PHP_EOL;
$resultado = $productos->actualizar($idProductos, $Codigo_Barras, $Nombre_Producto, $Graba_IVA);
var_dump($resultado);

$productos = new Productos();

// Probar el método eliminar()
$idProductos = 12;
echo "<br> Eliminar producto con ID $idProductos:" . PHP_EOL;
$resultado = $productos->eliminar($idProductos);
var_dump($resultado);
?>