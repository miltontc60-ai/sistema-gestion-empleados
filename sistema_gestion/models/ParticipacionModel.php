<?php
class ParticipacionModel {
    private $conn;
    private $table_name = "participaciones";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function insertar($empleado_id, $proyecto_id, $horas_asignadas, $rol) {
        $query = "INSERT INTO " . $this->table_name . " 
                 (empleado_id, proyecto_id, horas_asignadas, rol) 
                 VALUES (:empleado_id, :proyecto_id, :horas_asignadas, :rol)";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":empleado_id", $empleado_id);
        $stmt->bindParam(":proyecto_id", $proyecto_id);
        $stmt->bindParam(":horas_asignadas", $horas_asignadas);
        $stmt->bindParam(":rol", $rol);

        return $stmt->execute();
    }

    public function seleccionarTodos() {
        $query = "SELECT p.*, e.nombre as empleado_nombre, pr.nombre as proyecto_nombre 
                  FROM " . $this->table_name . " p
                  LEFT JOIN empleados e ON p.empleado_id = e.id
                  LEFT JOIN proyectos pr ON p.proyecto_id = pr.id
                  ORDER BY p.id DESC";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function eliminar($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    public function seleccionarPorId($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>