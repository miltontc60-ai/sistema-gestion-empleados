<?php
require_once 'models/ProyectoModel.php';

class ProyectoController {
    private $proyectoModel;

    public function __construct($db) {
        $this->proyectoModel = new ProyectoModel($db);
    }

    public function index() {
        $proyectos = $this->proyectoModel->seleccionarTodos();
        include 'views/proyectos/index.php';
    }

    public function create() {
        if ($_POST) {
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $fecha_inicio = $_POST['fecha_inicio'];
            $fecha_fin = $_POST['fecha_fin'];

            if ($this->proyectoModel->insertar($nombre, $descripcion, $fecha_inicio, $fecha_fin)) {
                header("Location: index.php?controller=proyecto&action=index");
                exit();
            }
        }
        include 'views/proyectos/create.php';
    }

    public function delete() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if ($this->proyectoModel->eliminar($id)) {
                header("Location: index.php?controller=proyecto&action=index");
                exit();
            }
        }
    }
}
?>