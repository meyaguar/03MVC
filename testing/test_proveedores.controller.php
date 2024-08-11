<?php

require_once('../controllers/proveedores.controller.php');

// Pruebas del controller
echo "<br> Pruebas del controller\n";

// Obtener todos los proveedores
echo "<br> Obtener todos los proveedores:\n";
$datos = $proveedores->todos();
print_r($datos);

// Obtener un proveedor por ID
echo "<br> Obtener un proveedor por ID:\n";
$idProveedores = 1;
$datos = $proveedores->uno($idProveedores);
print_r($datos);

// Insertar un nuevo proveedor
echo "<br> Insertar un nuevo proveedor:\n";
$datos = $proveedores->insertar(
    "Proveedor 1",
    "Calle 1",
    "1234567890",
    "Juan",
    "0987654321"
);
echo "<br> Proveedor insertado con ID: $datos\n";

// Actualizar un proveedor existente
echo "<br> Actualizar un proveedor existente:\n";
$datos = $proveedores->actualizar(
    1,
    "Proveedor 1 Actualizado",
    "Calle 1 Actualizada",
    "1234567890",
    "Juan",
    "0987654321"
);
echo "<br> Proveedor actualizado con éxito\n";

// Eliminar un proveedor
echo "<br> Eliminar un proveedor:\n";
$datos = $proveedores->eliminar(1);
echo "Proveedor eliminado con éxito\n";

?>
