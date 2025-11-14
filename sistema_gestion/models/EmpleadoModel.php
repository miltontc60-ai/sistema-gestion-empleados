<?php
class EmpleadoModel {
    private $conn;
    private $table_name = "empleados";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function insertar($nombre, $email, $puesto, $salario) {
        $query = "INSERT INTO " . $this->table_name . " 
                 (nombre, email, puesto, salario) 
                 VALUES (:nombre, :email, :puesto, :salario)";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":puesto", $puesto);
        $stmt->bindParam(":salario", $salario);

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