<?php

require_once('../controllers/clientes.controller.php');

// Pruebas del controller
echo "<br> Pruebas del controller\n";

// Obtener todos los clientes
echo "<br> Obtener todos los clientes:\n";
$datos = $clientes->todos();
print_r($datos);

// Obtener un cliente por ID
echo "<br> Obtener un cliente por ID:\n";
$idClientes = 1;
$datos = $clientes->uno($idClientes);
print_r($datos);

// Insertar un nuevo cliente
echo "<br> Insertar un nuevo cliente:\n";
$datos = $clientes->insertar(
    "Cliente 1",
    "Calle 1",
    "1234567890",
    "1723456789",
    "cliente1@example.com"
);
echo "<br> Cliente insertado con ID: $datos\n";

// Actualizar un cliente existente
echo "<br> Actualizar un cliente existente:\n";
$datos = $clientes->actualizar(
    1,
    "Cliente 1 Actualizado",
    "Calle 1 Actualizada",
    "1234567890",
    "1723456789",
    "cliente1actualizado@example.com"
);
echo "<br> Cliente actualizado con éxito\n";

// Eliminar un cliente
echo "<br> Eliminar un cliente:\n";
$datos = $clientes->eliminar(1);
echo "Cliente eliminado con éxito\n";

?>