<?php
// app/Controllers/AsignacionController.php

require_once '../app/Models/Asignacion.php';

class AsignacionController {

    // Obtener todas las asignaciones
    public function index() {
        $asignacion = new Asignacion();
        $stmt = $asignacion->read();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
    }

    // Crear una nueva asignación
    public function store() {
        $asignacion = new Asignacion();

        $data = json_decode(file_get_contents("php://input"));

        $asignacion->proyecto_id = $data->proyecto_id;
        $asignacion->empleado_id = $data->empleado_id;
        $asignacion->fecha_asignacion = $data->fecha_asignacion;

        if ($asignacion->create()) {
            echo json_encode(["message" => "Asignación creada correctamente."]);
        } else {
            echo json_encode(["message" => "Error al crear la asignación."]);
        }
    }

    // Obtener una asignación por ID
    public function show($id) {
        $asignacion = new Asignacion();
        $asignacion->asignacion_id = $id;
        $result = $asignacion->readOne();
        echo json_encode($result);
    }

    // Actualizar una asignación
    public function update($id) {
        $asignacion = new Asignacion();
        $asignacion->asignacion_id = $id;

        $data = json_decode(file_get_contents("php://input"));

        $asignacion->proyecto_id = $data->proyecto_id;
        $asignacion->empleado_id = $data->empleado_id;
        $asignacion->fecha_asignacion = $data->fecha_asignacion;

        if ($asignacion->update()) {
            echo json_encode(["message" => "Asignación actualizada correctamente."]);
        } else {
            echo json_encode(["message" => "Error al actualizar la asignación."]);
        }
    }

    // Eliminar una asignación
    public function destroy($id) {
        $asignacion = new Asignacion();
        $asignacion->asignacion_id = $id;

        if ($asignacion->delete()) {
            echo json_encode(["message" => "Asignación eliminada correctamente."]);
        } else {
            echo json_encode(["message" => "Error al eliminar la asignación."]);
        }
    }
}
