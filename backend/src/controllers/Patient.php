<?php
class Patient {
    private $conn;
    private $table_name = "Patients";

    public $PatientID;
    public $Name;
    public $BirthDate;
    public $Address;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Crear un nuevo paciente
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (Name, BirthDate, Address) VALUES (:Name, :BirthDate, :Address)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":Name", $this->Name);
        $stmt->bindParam(":BirthDate", $this->BirthDate);
        $stmt->bindParam(":Address", $this->Address);

        return $stmt->execute();
    }

    // Leer todos los pacientes
    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Actualizar un paciente
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET Name = :Name, BirthDate = :BirthDate, Address = :Address WHERE PatientID = :PatientID";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":Name", $this->Name);
        $stmt->bindParam(":BirthDate", $this->BirthDate);
        $stmt->bindParam(":Address", $this->Address);
        $stmt->bindParam(":PatientID", $this->PatientID);

        return $stmt->execute();
    }

    // Eliminar un paciente
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE PatientID = :PatientID";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":PatientID", $this->PatientID);

        return $stmt->execute();
    }
}
?>
