<?php
// app/Models/Asignacion.php

require_once 'config/database.php';

class Asignacion {
    private $conn;
    private $table_name = "Asignaciones";

    public $asignacion_id;
    public $proyecto_id;
    public $empleado_id;
    public $fecha_asignacion;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Crear una nueva asignación
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET proyecto_id=:proyecto_id, empleado_id=:empleado_id, fecha_asignacion=:fecha_asignacion";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":proyecto_id", $this->proyecto_id);
        $stmt->bindParam(":empleado_id", $this->empleado_id);
        $stmt->bindParam(":fecha_asignacion", $this->fecha_asignacion);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Leer todas las asignaciones
    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // Leer una sola asignación por ID
    public function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE asignacion_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->asignacion_id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Actualizar una asignación
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET proyecto_id=:proyecto_id, empleado_id=:empleado_id, fecha_asignacion=:fecha_asignacion WHERE asignacion_id = :asignacion_id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":proyecto_id", $this->proyecto_id);
        $stmt->bindParam(":empleado_id", $this->empleado_id);
        $stmt->bindParam(":fecha_asignacion", $this->fecha_asignacion);
        $stmt->bindParam(":asignacion_id", $this->asignacion_id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Eliminar una asignación
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE asignacion_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->asignacion_id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
