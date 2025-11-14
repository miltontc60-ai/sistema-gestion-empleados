<?php
class ProyectoModel {
    private $conn;
    private $table_name = "proyectos";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function insertar($nombre, $descripcion, $fecha_inicio, $fecha_fin) {
        $query = "INSERT INTO " . $this->table_name . " 
                 (nombre, descripcion, fecha_inicio, fecha_fin) 
                 VALUES (:nombre, :descripcion, :fecha_inicio, :fecha_fin)";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":descripcion", $descripcion);
        $stmt->bindParam(":fecha_inicio", $fecha_inicio);
        $stmt->bindParam(":fecha_fin", $fecha_fin);

        return $stmt->execute();
    }

    public function seleccionarTodos() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id DESC";
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