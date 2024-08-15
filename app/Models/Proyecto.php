<?php
// app/Models/Proyecto.php

require_once 'config/database.php';

class Proyecto {
    private $conn;
    private $table_name = "Proyectos";

    public $proyecto_id;
    public $nombre;
    public $descripcion;
    public $fecha_inicio;
    public $fecha_fin;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Crear un nuevo proyecto
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET nombre=:nombre, descripcion=:descripcion, fecha_inicio=:fecha_inicio, fecha_fin=:fecha_fin";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":descripcion", $this->descripcion);
        $stmt->bindParam(":fecha_inicio", $this->fecha_inicio);
        $stmt->bindParam(":fecha_fin", $this->fecha_fin);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Leer todos los proyectos
    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // Leer un solo proyecto por ID
    public function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE proyecto_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->proyecto_id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Actualizar un proyecto
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET nombre=:nombre, descripcion=:descripcion, fecha_inicio=:fecha_inicio, fecha_fin=:fecha_fin WHERE proyecto_id = :proyecto_id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":descripcion", $this->descripcion);
        $stmt->bindParam(":fecha_inicio", $this->fecha_inicio);
        $stmt->bindParam(":fecha_fin", $this->fecha_fin);
        $stmt->bindParam(":proyecto_id", $this->proyecto_id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Eliminar un proyecto
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE proyecto_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->proyecto_id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
