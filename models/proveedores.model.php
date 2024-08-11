<?php

require_once('../config/config.php');

class Proveedores
{
    private $con;

    // TODO: Establecer conexión a la base de datos en el constructor
    public function __construct()
    {
        $this->con = (new ClaseConectar())->conectar();
    }

    // TODO: Obtener todos los proveedores de la base de datos
    public function todos()
    {
        try {
            $query = "SELECT * FROM proveedores";
            $stmt = $this->con->prepare($query);
            $stmt->execute();
            return $stmt->get_result();
        } catch (Exception $th) {
            throw new Exception("Error al obtener proveedores: " . $th->getMessage());
        } finally {
            $this->con->close();
        }
    }

    // TODO: Obtener un proveedor por ID de la base de datos
    public function uno($idProveedores)
    {
        try {
            $query = "SELECT * FROM proveedores WHERE idProveedores = ?";
            $stmt = $this->con->prepare($query);
            $stmt->bind_param("i", $idProveedores);
            $stmt->execute();
            return $stmt->get_result();
        } catch (Exception $th) {
            throw new Exception("Error al obtener proveedor: " . $th->getMessage());
        } finally {
            $this->con->close();
        }
    }

    // TODO: Insertar un nuevo proveedor en la base de datos
    public function insertar($Nombre_Empresa, $Direccion, $Telefono, $Contacto_Empresa, $Teleofno_Contacto)
    {
        try {
            $query = "INSERT INTO proveedores (Nombre_Empresa, Direccion, Telefono, Contacto_Empresa, Teleofno_Contacto) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->con->prepare($query);
            $stmt->bind_param("sssss", $Nombre_Empresa, $Direccion, $Telefono, $Contacto_Empresa, $Teleofno_Contacto);
            $stmt->execute();
            return $this->con->insert_id;
        } catch (Exception $th) {
            throw new Exception("Error al insertar proveedor: " . $th->getMessage());
        } finally {
            $this->con->close();
        }
    }

    // TODO: Actualizar un proveedor existente en la base de datos
    public function actualizar($idProveedores, $Nombre_Empresa, $Direccion, $Telefono, $Contacto_Empresa, $Teleofno_Contacto)
    {
        try {
            $query = "UPDATE proveedores SET Nombre_Empresa = ?, Direccion = ?, Telefono = ?, Contacto_Empresa = ?, Teleofno_Contacto = ? WHERE idProveedores = ?";
            $stmt = $this->con->prepare($query);
            $stmt->bind_param("sssssi", $Nombre_Empresa, $Direccion, $Telefono, $Contacto_Empresa, $Teleofno_Contacto, $idProveedores);
            $stmt->execute();
            return $idProveedores;
        } catch (Exception $th) {
            throw new Exception("Error al actualizar proveedor: " . $th->getMessage());
        } finally {
            $this->con->close();
        }
    }

    // TODO: Eliminar un proveedor de la base de datos
    public function eliminar($idProveedores)
    {
        try {
            $query = "DELETE FROM proveedores WHERE idProveedores = ?";
            $stmt = $this->con->prepare($query);
            $stmt->bind_param("i", $idProveedores);
            $stmt->execute();
            return 1;
        } catch (Exception $th) {
            throw new Exception("Error al eliminar proveedor: " . $th->getMessage());
        } finally {
            $this->con->close();
        }
    }
}