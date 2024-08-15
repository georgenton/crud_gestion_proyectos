<?php
// app/Controllers/EmpleadoController.php

require_once '../app/Models/Empleado.php';

class EmpleadoController {

    // Obtener todos los empleados
    public function index() {
        $empleado = new Empleado();
        $stmt = $empleado->read();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
    }

    // Crear un nuevo empleado
    public function store() {
        $empleado = new Empleado();

        $data = json_decode(file_get_contents("php://input"));

        $empleado->nombre = $data->nombre;
        $empleado->apellido = $data->apellido;
        $empleado->email = $data->email;
        $empleado->posicion = $data->posicion;

        if ($empleado->create()) {
            echo json_encode(["message" => "Empleado creado correctamente."]);
        } else {
            echo json_encode(["message" => "Error al crear el empleado."]);
        }
    }

    // Obtener un empleado por ID
    public function show($id) {
        $empleado = new Empleado();
        $empleado->empleado_id = $id;
        $result = $empleado->readOne();
        echo json_encode($result);
    }

    // Actualizar un empleado
    public function update($id) {
        $empleado = new Empleado();
        $empleado->empleado_id = $id;

        $data = json_decode(file_get_contents("php://input"));

        $empleado->nombre = $data->nombre;
        $empleado->apellido = $data->apellido;
        $empleado->email = $data->email;
        $empleado->posicion = $data->posicion;

        if ($empleado->update()) {
            echo json_encode(["message" => "Empleado actualizado correctamente."]);
        } else {
            echo json_encode(["message" => "Error al actualizar el empleado."]);
        }
    }

    // Eliminar un empleado
    public function destroy($id) {
        $empleado = new Empleado();
        $empleado->empleado_id = $id;

        if ($empleado->delete()) {
            echo json_encode(["message" => "Empleado eliminado correctamente."]);
        } else {
            echo json_encode(["message" => "Error al eliminar el empleado."]);
        }
    }
}
