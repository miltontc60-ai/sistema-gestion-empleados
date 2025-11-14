<?php
require_once 'models/ParticipacionModel.php';
require_once 'models/EmpleadoModel.php';
require_once 'models/ProyectoModel.php';

class ParticipacionController {
    private $participacionModel;
    private $empleadoModel;
    private $proyectoModel;

    public function __construct($db) {
        $this->participacionModel = new ParticipacionModel($db);
        $this->empleadoModel = new EmpleadoModel($db);
        $this->proyectoModel = new ProyectoModel($db);
    }

    public function index() {
        $participaciones = $this->participacionModel->seleccionarTodos();
        include 'views/participaciones/index.php';
    }

    public function create() {
        $empleados = $this->empleadoModel->seleccionarTodos();
        $proyectos = $this->proyectoModel->seleccionarTodos();

        if ($_POST) {
            $empleado_id = $_POST['empleado_id'];
            $proyecto_id = $_POST['proyecto_id'];
            $horas_asignadas = $_POST['horas_asignadas'];
            $rol = $_POST['rol'];

            if ($this->participacionModel->insertar($empleado_id, $proyecto_id, $horas_asignadas, $rol)) {
                header("Location: index.php?controller=participacion&action=index");
                exit();
            }
        }
        include 'views/participaciones/create.php';
    }

    public function delete() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if ($this->participacionModel->eliminar($id)) {
                header("Location: index.php?controller=participacion&action=index");
                exit();
            }
        }
    }
}
?>