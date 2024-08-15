# Gestión de Proyectos - README

Este proyecto es una aplicación CRUD básica para la gestión de proyectos y asignaciones de empleados. La aplicación está construida con PHP y MySQL y sigue una arquitectura MVC.

## 1. Diseño de Base de Datos

### Tablas Principales

1. **Proyectos**
    - **proyecto_id**: INT, PRIMARY KEY, AUTO_INCREMENT
    - **nombre**: VARCHAR(100), NOT NULL
    - **descripcion**: TEXT, NULL
    - **fecha_inicio**: DATE, NULL
    - **fecha_fin**: DATE, NULL

2. **Empleados**
    - **empleado_id**: INT, PRIMARY KEY, AUTO_INCREMENT
    - **nombre**: VARCHAR(50), NOT NULL
    - **apellido**: VARCHAR(50), NOT NULL
    - **email**: VARCHAR(100), NOT NULL
    - **posicion**: VARCHAR(50), NOT NULL

3. **Asignaciones**
    - **asignacion_id**: INT, PRIMARY KEY, AUTO_INCREMENT
    - **proyecto_id**: INT, FOREIGN KEY (REFERENCES Proyectos(proyecto_id) ON DELETE CASCADE)
    - **empleado_id**: INT, FOREIGN KEY (REFERENCES Empleados(empleado_id) ON DELETE CASCADE)
    - **fecha_asignacion**: DATE, NULL

## 2. Arquitectura y Funcionalidades

### Arquitectura

El proyecto sigue una arquitectura **MVC (Model-View-Controller)**, organizada de la siguiente manera:

- **Modelos (Models)**: Representan las tablas de la base de datos y contienen la lógica relacionada con el acceso a los datos.
- **Vistas (Views)**: No se implementan en este proyecto ya que se trata de una API. Sin embargo, en un proyecto completo, las vistas se encargarían de la presentación de datos.
- **Controladores (Controllers)**: Contienen la lógica de negocio y manejan las solicitudes HTTP, interactuando con los modelos para procesar datos y devolver respuestas adecuadas.

### Funcionalidades

1. **Proyectos**
   - Crear un nuevo proyecto.
   - Leer (obtener) la lista de proyectos o un proyecto específico.
   - Actualizar un proyecto existente.
   - Eliminar un proyecto.

2. **Empleados**
   - Crear un nuevo empleado.
   - Leer (obtener) la lista de empleados o un empleado específico.
   - Actualizar un empleado existente.
   - Eliminar un empleado.

3. **Asignaciones**
   - Crear una nueva asignación de empleado a un proyecto.
   - Leer (obtener) la lista de asignaciones o una asignación específica.
   - Actualizar una asignación existente.
   - Eliminar una asignación.

## 3. Estructura del Proyecto

gestion_proyectos/
│
├── app/
│ ├── Controllers/
│ │ ├── ProyectoController.php
│ │ ├── EmpleadoController.php
│ │ └── AsignacionController.php
│ ├── Models/
│ │ ├── Proyecto.php
│ │ ├── Empleado.php
│ │ └── Asignacion.php
│ └── Config/
│ └── Database.php
│
├── public/
│ ├── index.php
│ └── .htaccess
│
├── routes/
│ └── web.php
│
└── README.md


## 4. Ejemplos de Uso de Todas las Rutas

### Proyectos

- **GET** `/proyectos`: Obtener todos los proyectos.
- **GET** `/proyectos/{id}`: Obtener un proyecto específico.
- **POST** `/proyectos`: Crear un nuevo proyecto.
- **PUT** `/proyectos/{id}`: Actualizar un proyecto existente.
- **DELETE** `/proyectos/{id}`: Eliminar un proyecto.

### Empleados

- **GET** `/empleados`: Obtener todos los empleados.
- **GET** `/empleados/{id}`: Obtener un empleado específico.
- **POST** `/empleados`: Crear un nuevo empleado.
- **PUT** `/empleados/{id}`: Actualizar un empleado existente.
- **DELETE** `/empleados/{id}`: Eliminar un empleado.

### Asignaciones

- **GET** `/asignaciones`: Obtener todas las asignaciones.
- **GET** `/asignaciones/{id}`: Obtener una asignación específica.
- **POST** `/asignaciones`: Crear una nueva asignación.
- **PUT** `/asignaciones/{id}`: Actualizar una asignación existente.
- **DELETE** `/asignaciones/{id}`: Eliminar una asignación.

## 5. Ejemplo de Uso en Postman

### Crear un Proyecto

- **URL**: `POST /proyectos`
- **Body** (JSON):
    ```json
    {
        "nombre": "Nuevo Proyecto",
        "descripcion": "Descripción del proyecto",
        "fecha_inicio": "2024-01-01",
        "fecha_fin": "2024-12-31"
    }
    ```

### Obtener todos los Proyectos

- **URL**: `GET /proyectos`

### Actualizar un Proyecto

- **URL**: `PUT /proyectos/{id}`
- **Body** (JSON):
    ```json
    {
        "nombre": "Proyecto Actualizado",
        "descripcion": "Descripción actualizada",
        "fecha_inicio": "2024-01-15",
        "fecha_fin": "2024-11-30"
    }
    ```

### Eliminar un Proyecto

- **URL**: `DELETE /proyectos/{id}`

### Otros Ejemplos

El mismo patrón de solicitudes **GET**, **POST**, **PUT** y **DELETE** se aplica a las rutas de **Empleados** y **Asignaciones**.

## Conclusión

Este proyecto sirve como una base para crear aplicaciones CRUD básicas utilizando PHP y MySQL. Siguiendo la estructura de MVC y utilizando un archivo `.htaccess`, se logra una separación clara entre la lógica de negocio, la base de datos y la gestión de rutas.
