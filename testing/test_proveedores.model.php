<?php
/*
// test_provedores.php

require_once('../../models/proveedores.model.php');

$provedores = new Provedores();

// Probar el método todos()
$datos = $provedores->todos();
var_dump($datos);

// Probar el método uno()
$idProveedores = 1;
$datos = $provedores->uno($idProveedores);
var_dump($datos);

// Probar el método insertar()
$Nombre_Empresa = 'Empresa de prueba';
$Direccion = 'Dirección de prueba';
$Telefono = 'Tlf-1';
$Contacto_Empresa = 'Contacto de prueba';
$Teleofno_Contacto = 'Tlf-1';
$resultado = $provedores->insertar($Nombre_Empresa, $Direccion, $Telefono, $Contacto_Empresa, $Teleofno_Contacto);
var_dump($resultado);

// Probar el método actualizar()
$idProveedores = 1;
$Nombre_Empresa = 'Empresa de prueba actualizada';
$Direccion = 'Dirección de prueba actualizada';
$Telefono = 'Tlf-2';
$Contacto_Empresa = 'Contacto de prueba actualizada';
$Teleofno_Contacto = 'Tlf-2';
$resultado = $provedores->actualizar($idProveedores, $Nombre_Empresa, $Direccion, $Telefono, $Contacto_Empresa, $Teleofno_Contacto);
var_dump($resultado);

// Probar el método eliminar()
$idProveedores = 1;
$resultado = $provedores->eliminar($idProveedores);
var_dump($resultado);

*/

require_once('../models/proveedores.model.php');

$proveedores = new Proveedores();

// Probar el método todos()
echo "<br> Todos los proveedores:" . PHP_EOL;
$datos = $proveedores->todos();
var_dump($datos);

$proveedores = new Proveedores();

// Probar el método uno()
$idProveedores = 1;
echo "<br> Proveedor con ID $idProveedores:" . PHP_EOL;
$datos = $proveedores->uno($idProveedores);
var_dump($datos);

$proveedores = new Proveedores();

// Probar el método insertar()
$Nombre_Empresa = 'Empresa de prueba';
$Direccion = 'Dirección de prueba';
$Telefono = 'Tlf-1';
$Contacto_Empresa = 'Contacto de prueba';
$Teleofno_Contacto = 'Tlf-1';
echo "Insertar proveedor:" . PHP_EOL;
$resultado = $proveedores->insertar($Nombre_Empresa, $Direccion, $Telefono, $Contacto_Empresa, $Teleofno_Contacto);
var_dump($resultado);

$proveedores = new Proveedores();

// Probar el método actualizar()
$idProveedores = 1;
$Nombre_Empresa = 'Empresa de prueba actualizada';
$Direccion = 'Dirección de prueba actualizada';
$Telefono = 'Tlf-2';
$Contacto_Empresa = 'Contacto de prueba actualizada';
$Teleofno_Contacto = 'Tlf-2';
echo "<br> Actualizar proveedor con ID $idProveedores:" . PHP_EOL;
$resultado = $proveedores->actualizar($idProveedores, $Nombre_Empresa, $Direccion, $Telefono, $Contacto_Empresa, $Teleofno_Contacto);
var_dump($resultado);

$proveedores = new Proveedores();
// Probar el método eliminar()
$idProveedores = 12;
echo "<br> Eliminar proveedor con ID $idProveedores:" . PHP_EOL;
$resultado = $proveedores->eliminar($idProveedores);
var_dump($resultado);
?>