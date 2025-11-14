<?php
require_once 'models/EmpleadoModel.php';

class EmpleadoController {
    private $empleadoModel;

    public function __construct($db) {
        $this->empleadoModel = new EmpleadoModel($db);
    }

    public function index() {
        $empleados = $this->empleadoModel->seleccionarTodos();
        include 'views/empleados/index.php';
    }

    public function create() {
        if ($_POST) {
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $puesto = $_POST['puesto'];
            $salario = $_POST['salario'];

            if ($this->empleadoModel->insertar($nombre, $email, $puesto, $salario)) {
                header("Location: index.php?controller=empleado&action=index");
                exit();
            }
        }
        include 'views/empleados/create.php';
    }

    public function delete() {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $empleado = $this->empleadoModel->seleccionarPorId($id);
        
        if (!$empleado) {
            header("Location: index.php?controller=empleado&action=index");
            exit();
        }
        
        // Si es POST, eliminar; si es GET, mostrar confirmación
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->empleadoModel->eliminar($id)) {
                $_SESSION['mensaje'] = "Empleado eliminado correctamente";
                $_SESSION['tipo_mensaje'] = "success";
            } else {
                $_SESSION['mensaje'] = "Error al eliminar el empleado";
                $_SESSION['tipo_mensaje'] = "error";
            }
            header("Location: index.php?controller=empleado&action=index");
            exit();
        } else {
            // Mostrar vista de confirmación
            include 'views/empleados/delete.php';
        }
    } else {
        header("Location: index.php?controller=empleado&action=index");
        exit();
    }
}
}
?>