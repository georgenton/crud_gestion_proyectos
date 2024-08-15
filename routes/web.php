<?php
// routes/web.php

require_once '../app/Controllers/EmpleadoController.php';
require_once '../app/Controllers/ProyectoController.php';
require_once '../app/Controllers/AsignacionController.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

switch ($uri) {
    // Rutas para Empleados
    case '/empleados':
        $controller = new EmpleadoController();
        if ($method == 'GET') {
            $controller->index();
        } elseif ($method == 'POST') {
            $controller->store();
        }
        break;

    case (preg_match('/\/empleados\/\d+/', $uri) ? true : false):
        $id = basename($uri);
        $controller = new EmpleadoController();
        if ($method == 'GET') {
            $controller->show($id);
        } elseif ($method == 'PUT') {
            $controller->update($id);
        } elseif ($method == 'DELETE') {
            $controller->destroy($id);
        }
        break;

    // Rutas para Proyectos
    case '/proyectos':
        $controller = new ProyectoController();
        if ($method == 'GET') {
            $controller->index();
        } elseif ($method == 'POST') {
            $controller->store();
        }
        break;

    case (preg_match('/\/proyectos\/\d+/', $uri) ? true : false):
        $id = basename($uri);
        $controller = new ProyectoController();
        if ($method == 'GET') {
            $controller->show($id);
        } elseif ($method == 'PUT') {
            $controller->update($id);
        } elseif ($method == 'DELETE') {
            $controller->destroy($id);
        }
        break;

    // Rutas para Asignaciones
    case '/asignaciones':
        $controller = new AsignacionController();
        if ($method == 'GET') {
            $controller->index();
        } elseif ($method == 'POST') {
            $controller->store();
        }
        break;

    case (preg_match('/\/asignaciones\/\d+/', $uri) ? true : false):
        $id = basename($uri);
        $controller = new AsignacionController();
        if ($method == 'GET') {
            $controller->show($id);
        } elseif ($method == 'PUT') {
            $controller->update($id);
        } elseif ($method == 'DELETE') {
            $controller->destroy($id);
        }
        break;

    // Ruta por defecto
    default:
        echo json_encode(["message" => "Ruta no encontrada"]);
        break;
}
