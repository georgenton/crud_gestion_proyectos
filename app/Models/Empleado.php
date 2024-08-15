<?php
// app/Models/Empleado.php

require_once 'config/database.php';

class Empleado {
    private $conn;
    private $table_name = "Empleados";

    public $empleado_id;
    public $nombre;
    public $apellido;
    public $email;
    public $posicion;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Crear un nuevo empleado
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET nombre=:nombre, apellido=:apellido, email=:email, posicion=:posicion";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":apellido", $this->apellido);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":posicion", $this->posicion);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Leer todos los empleados
    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // Leer un solo empleado por ID
    public function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE empleado_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->empleado_id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Actualizar un empleado
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET nombre=:nombre, apellido=:apellido, email=:email, posicion=:posicion WHERE empleado_id = :empleado_id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":apellido", $this->apellido);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":posicion", $this->posicion);
        $stmt->bindParam(":empleado_id", $this->empleado_id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Eliminar un empleado
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE empleado_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->empleado_id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
