<?php
require_once('../models/clientes.model.php');

$clientes = new Clientes();

// Probar el método todos()
echo "<br> Todos los clientes:" . PHP_EOL;
$datos = $clientes->todos();
var_dump($datos);

$clientes = new Clientes();

// Probar el método uno()
$idClientes = 1;
echo "<br> Cliente con ID $idClientes:" . PHP_EOL;
$datos = $clientes->uno($idClientes);
var_dump($datos);

$clientes = new Clientes();

// Probar el método insertar()
$Nombres = 'Cliente de prueba';
$Direccion = 'Dirección de prueba';
$Telefono = 'Tlf-1';
$Cedula = 'Cedula-1';
$Correo = 'correo-1@example.com';
echo "Insertar cliente:" . PHP_EOL;
$resultado = $clientes->insertar($Nombres, $Direccion, $Telefono, $Cedula, $Correo);
var_dump($resultado);

$clientes = new Clientes();

// Probar el método actualizar()
$idClientes = 1;
$Nombres = 'Cliente de prueba actualizado';
$Direccion = 'Dirección de prueba actualizada';
$Telefono = 'Tlf-2';
$Cedula = 'Cedula-2';
$Correo = 'correo-2@example.com';
echo "<br> Actualizar cliente con ID $idClientes:" . PHP_EOL;
$resultado = $clientes->actualizar($idClientes, $Nombres, $Direccion, $Telefono, $Cedula, $Correo);
var_dump($resultado);

$clientes = new Clientes();

// Probar el método eliminar()
$idClientes = 12;
echo "<br> Eliminar cliente con ID $idClientes:" . PHP_EOL;
$resultado = $clientes->eliminar($idClientes);
var_dump($resultado);
?>