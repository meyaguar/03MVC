<?php

require_once('../config/config.php');

class Productos
{
    private $con;

    // TODO: Establecer conexión a la base de datos en el constructor
    public function __construct()
    {
        $this->con = (new ClaseConectar())->conectar();
    }

    // TODO: Obtener todos los productos de la base de datos
    public function todos()
    {
        try {
            $query = "SELECT * FROM productos";
            $stmt = $this->con->prepare($query);
            $stmt->execute();
            return $stmt->get_result();
        } catch (Exception $th) {
            throw new Exception("Error al obtener productos: " . $th->getMessage());
        } finally {
            $this->con->close();
        }
    }

    // TODO: Obtener un producto por ID de la base de datos
    public function uno($idProductos)
    {
        try {
            $query = "SELECT * FROM productos WHERE idProductos = ?";
            $stmt = $this->con->prepare($query);
            $stmt->bind_param("i", $idProductos);
            $stmt->execute();
            return $stmt->get_result();
        } catch (Exception $th) {
            throw new Exception("Error al obtener producto: " . $th->getMessage());
        } finally {
            $this->con->close();
        }
    }

    // TODO: Insertar un nuevo producto en la base de datos
    public function insertar($Codigo_Barras, $Nombre_Producto, $Graba_IVA)
    {
        try {
            $query = "INSERT INTO productos (Codigo_Barras, Nombre_Producto, Graba_IVA) VALUES (?, ?, ?)";
            $stmt = $this->con->prepare($query);
            $stmt->bind_param("ssi", $Codigo_Barras, $Nombre_Producto, $Graba_IVA);
            $stmt->execute();
            return $this->con->insert_id;
        } catch (Exception $th) {
            throw new Exception("Error al insertar producto: " . $th->getMessage());
        } finally {
            $this->con->close();
        }
    }

    // TODO: Actualizar un producto existente en la base de datos
    public function actualizar($idProductos, $Codigo_Barras, $Nombre_Producto, $Graba_IVA)
    {
        try {
            $query = "UPDATE productos SET Codigo_Barras = ?, Nombre_Producto = ?, Graba_IVA = ? WHERE idProductos = ?";
            $stmt = $this->con->prepare($query);
            $stmt->bind_param("ssii", $Codigo_Barras, $Nombre_Producto, $Graba_IVA, $idProductos);
            $stmt->execute();
            return $idProductos;
        } catch (Exception $th) {
            throw new Exception("Error al actualizar producto: " . $th->getMessage());
        } finally {
            $this->con->close();
        }
    }

    // TODO: Eliminar un producto de la base de datos
    public function eliminar($idProductos)
    {
        try {
            $query = "DELETE FROM productos WHERE idProductos = ?";
            $stmt = $this->con->prepare($query);
            $stmt->bind_param("i", $idProductos);
            $stmt->execute();
            return 1;
        } catch (Exception $th) {
            throw new Exception("Error al eliminar producto: " . $th->getMessage());
        } finally {
            $this->con->close();
        }
    }
}