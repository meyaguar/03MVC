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

// TODO: Inclusión del modelo de Cliente
require_once('../models/clientes.model.php');

// TODO: Creación de instancia de Cliente
$clientes = new Clientes();

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
            // TODO: Obtener todos los clientes
            $datos = $clientes->todos();
            echo json_encode($datos->fetch_all(MYSQLI_ASSOC));
        } catch (Exception $e) {
            handle_error($e->getMessage());
        }
        break;

    case 'uno':
        try {
            // TODO: Obtener un cliente por ID
            validate_data($_POST, ['idClientes']);
            $idClientes = $_POST["idClientes"];
            $datos = $clientes->uno($idClientes);
            echo json_encode($datos->fetch_assoc());
        } catch (Exception $e) {
            handle_error($e->getMessage());
        }
        break;

    case 'insertar':
        try {
            // TODO: Insertar un nuevo cliente
            validate_data($_POST, ['Nombres', 'Direccion', 'Telefono', 'Cedula', 'Correo']);
            $datos = $clientes->insertar(
                $_POST["Nombres"],
                $_POST["Direccion"],
                $_POST["Telefono"],
                $_POST["Cedula"],
                $_POST["Correo"]
            );
            echo json_encode($datos);
        } catch (Exception $e) {
            handle_error($e->getMessage());
        }
        break;

    case 'actualizar':
        try {
            // TODO: Actualizar un cliente existente
            validate_data($_POST, ['idClientes', 'Nombres', 'Direccion', 'Telefono', 'Cedula', 'Correo']);
            $datos = $clientes->actualizar(
                $_POST["idClientes"],
                $_POST["Nombres"],
                $_POST["Direccion"],
                $_POST["Telefono"],
                $_POST["Cedula"],
                $_POST["Correo"]
            );
            echo json_encode($datos);
        } catch (Exception $e) {
            handle_error($e->getMessage());
        }
        break;

    case 'eliminar':
        try {
            // TODO: Eliminar un cliente
            validate_data($_POST, ['idClientes']);
            $datos = $clientes->eliminar($_POST["idClientes"]);
            echo json_encode($datos);
        } catch (Exception $e) {
            handle_error($e->getMessage());
        }
        break;

    default:
        handle_error("Operación no válida");
        break;
}