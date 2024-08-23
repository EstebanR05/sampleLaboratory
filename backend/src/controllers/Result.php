<?php
class Result {
    private $conn;
    private $table_name = "Results";

    public $ResultID;
    public $SampleID;
    public $Parameter;
    public $Value;
    public $ResultDate;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Crear un nuevo resultado
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (SampleID, Parameter, Value, ResultDate) VALUES (:SampleID, :Parameter, :Value, :ResultDate)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":SampleID", $this->SampleID);
        $stmt->bindParam(":Parameter", $this->Parameter);
        $stmt->bindParam(":Value", $this->Value);
        $stmt->bindParam(":ResultDate", $this->ResultDate);

        return $stmt->execute();
    }

    // Leer todos los resultados
    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Actualizar un resultado
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET SampleID = :SampleID, Parameter = :Parameter, Value = :Value, ResultDate = :ResultDate WHERE ResultID = :ResultID";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":SampleID", $this->SampleID);
        $stmt->bindParam(":Parameter", $this->Parameter);
        $stmt->bindParam(":Value", $this->Value);
        $stmt->bindParam(":ResultDate", $this->ResultDate);
        $stmt->bindParam(":ResultID", $this->ResultID);

        return $stmt->execute();
    }

    // Eliminar un resultado
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE ResultID = :ResultID";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":ResultID", $this->ResultID);

        return $stmt->execute();
    }
}
?>
