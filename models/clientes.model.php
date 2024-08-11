<?php

require_once('../config/config.php');

class Clientes
{
    private $con;

    // TODO: Establecer conexión a la base de datos en el constructor
    public function __construct()
    {
        $this->con = (new ClaseConectar())->conectar();
    }

    // TODO: Obtener todos los clientes de la base de datos
    public function todos()
    {
        try {
            $query = "SELECT * FROM clientes";
            $stmt = $this->con->prepare($query);
            $stmt->execute();
            return $stmt->get_result();
        } catch (Exception $th) {
            throw new Exception("Error al obtener clientes: " . $th->getMessage());
        } finally {
            $this->con->close();
        }
    }

    // TODO: Obtener un cliente por ID de la base de datos
    public function uno($idClientes)
    {
        try {
            $query = "SELECT * FROM clientes WHERE idClientes = ?";
            $stmt = $this->con->prepare($query);
            $stmt->bind_param("i", $idClientes);
            $stmt->execute();
            return $stmt->get_result();
        } catch (Exception $th) {
            throw new Exception("Error al obtener cliente: " . $th->getMessage());
        } finally {
            $this->con->close();
        }
    }

    // TODO: Insertar un nuevo cliente en la base de datos
    public function insertar($Nombres, $Direccion, $Telefono, $Cedula, $Correo)
    {
        try {
            $query = "INSERT INTO clientes (Nombres, Direccion, Telefono, Cedula, Correo) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->con->prepare($query);
            $stmt->bind_param("sssss", $Nombres, $Direccion, $Telefono, $Cedula, $Correo);
            $stmt->execute();
            return $this->con->insert_id;
        } catch (Exception $th) {
            throw new Exception("Error al insertar cliente: " . $th->getMessage());
        } finally {
            $this->con->close();
        }
    }

    // TODO: Actualizar un cliente existente en la base de datos
    public function actualizar($idClientes, $Nombres, $Direccion, $Telefono, $Cedula, $Correo)
    {
        try {
            $query = "UPDATE clientes SET Nombres = ?, Direccion = ?, Telefono = ?, Cedula = ?, Correo = ? WHERE idClientes = ?";
            $stmt = $this->con->prepare($query);
            $stmt->bind_param("sssssi", $Nombres, $Direccion, $Telefono, $Cedula, $Correo, $idClientes);
            $stmt->execute();
            return $idClientes;
        } catch (Exception $th) {
            throw new Exception("Error al actualizar cliente: " . $th->getMessage());
        } finally {
            $this->con->close();
        }
    }

    // TODO: Eliminar un cliente de la base de datos
    public function eliminar($idClientes)
    {
        try {
            $query = "DELETE FROM clientes WHERE idClientes = ?";
            $stmt = $this->con->prepare($query);
            $stmt->bind_param("i", $idClientes);
            $stmt->execute();
            return 1;
        } catch (Exception $th) {
            throw new Exception("Error al eliminar cliente: " . $th->getMessage());
        } finally {
            $this->con->close();
        }
    }
}