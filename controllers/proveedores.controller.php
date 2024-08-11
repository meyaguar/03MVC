<?php

// TODO: Configuración de cabeceras CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

// TODO: Función para manejar errores
function handle_error($message) {
    http_response_code(500);
    echo json_encode(['error' => $message]);
    exit;
}

// TODO: Función para validar datos
function validate_data($data, $required_fields) {
    foreach ($required_fields as $field) {
        if (!isset($data[$field]) || empty($data[$field])) {
            handle_error("Campo '$field' es requerido");
        }
    }
}

// TODO: Inclusión del modelo de Proveedor
require_once('../models/proveedores.model.php');

// TODO: Creación de instancia de Proveedor
$proveedores = new Proveedores();

// TODO: Obtención del método de solicitud
$method = isset($_SERVER["REQUEST_METHOD"]) ? $_SERVER["REQUEST_METHOD"] : null;

// TODO: Manejo de la solicitud OPTIONS
if ($method === "OPTIONS") {
    die();
}

// TODO: Obtención de la operación
$op = isset($_GET["op"]) ? $_GET["op"] : null;

// TODO: Manejo de operaciones CRUD
switch ($op) {
    case 'todos':
        try {
            // TODO: Obtener todos los proveedores
            $datos = $proveedores->todos();
            echo json_encode($datos->fetch_all(MYSQLI_ASSOC));
        } catch (Exception $e) {
            handle_error($e->getMessage());
        }
        break;

    case 'uno':
        try {
            // TODO: Obtener un proveedor por ID
            validate_data($_POST, ['idProveedores']);
            $idProveedores = $_POST["idProveedores"];
            $datos = $proveedores->uno($idProveedores);
            echo json_encode($datos->fetch_assoc());
        } catch (Exception $e) {
            handle_error($e->getMessage());
        }
        break;

    case 'insertar':
        try {
            // TODO: Insertar un nuevo proveedor
            validate_data($_POST, ['Nombre_Empresa', 'Direccion', 'Telefono', 'Contacto_Empresa', 'Teleofno_Contacto']);
            $datos = $proveedores->insertar(
                $_POST["Nombre_Empresa"],
                $_POST["Direccion"],
                $_POST["Telefono"],
                $_POST["Contacto_Empresa"],
                $_POST["Teleofno_Contacto"]
            );
            echo json_encode($datos);
        } catch (Exception $e) {
            handle_error($e->getMessage());
        }
        break;

    case 'actualizar':
        try {
            // TODO: Actualizar un proveedor existente
            validate_data($_POST, ['idProveedores', 'Nombre_Empresa', 'Direccion', 'Telefono', 'Contacto_Empresa', 'Teleofno_Contacto']);
            $datos = $proveedores->actualizar(
                $_POST["idProveedores"],
                $_POST["Nombre_Empresa"],
                $_POST["Direccion"],
                $_POST["Telefono"],
                $_POST["Contacto_Empresa"],
                $_POST["Teleofno_Contacto"]
            );
            echo json_encode($datos);
        } catch (Exception $e) {
            handle_error($e->getMessage());
        }
        break;

    case 'eliminar':
        try {
            // TODO: Eliminar un proveedor
            validate_data($_POST, ['idProveedores']);
            $datos = $proveedores->eliminar($_POST["idProveedores"]);
            echo json_encode($datos);
        } catch (Exception $e) {
            handle_error($e->getMessage());
        }
        break;

    default:
        handle_error("Operación no válida");
        break;
}