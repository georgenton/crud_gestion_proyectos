<?php
// app/Controllers/ProyectoController.php

require_once '../app/Models/Proyecto.php';

class ProyectoController {

    // Obtener todos los proyectos
    public function index() {
        $proyecto = new Proyecto();
        $stmt = $proyecto->read();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
    }

    // Crear un nuevo proyecto
    public function store() {
        $proyecto = new Proyecto();

        $data = json_decode(file_get_contents("php://input"));

        $proyecto->nombre = $data->nombre;
        $proyecto->descripcion = $data->descripcion;
        $proyecto->fecha_inicio = $data->fecha_inicio;
        $proyecto->fecha_fin = $data->fecha_fin;

        if ($proyecto->create()) {
            echo json_encode(["message" => "Proyecto creado correctamente."]);
        } else {
            echo json_encode(["message" => "Error al crear el proyecto."]);
        }
    }

    // Obtener un proyecto por ID
    public function show($id) {
        $proyecto = new Proyecto();
        $proyecto->proyecto_id = $id;
        $result = $proyecto->readOne();
        echo json_encode($result);
    }

    // Actualizar un proyecto
    public function update($id) {
        $proyecto = new Proyecto();
        $proyecto->proyecto_id = $id;

        $data = json_decode(file_get_contents("php://input"));

        $proyecto->nombre = $data->nombre;
        $proyecto->descripcion = $data->descripcion;
        $proyecto->fecha_inicio = $data->fecha_inicio;
        $proyecto->fecha_fin = $data->fecha_fin;

        if ($proyecto->update()) {
            echo json_encode(["message" => "Proyecto actualizado correctamente."]);
        } else {
            echo json_encode(["message" => "Error al actualizar el proyecto."]);
        }
    }

    // Eliminar un proyecto
    public function destroy($id) {
        $proyecto = new Proyecto();
        $proyecto->proyecto_id = $id;

        if ($proyecto->delete()) {
            echo json_encode(["message" => "Proyecto eliminado correctamente."]);
        } else {
            echo json_encode(["message" => "Error al eliminar el proyecto."]);
        }
    }
}
