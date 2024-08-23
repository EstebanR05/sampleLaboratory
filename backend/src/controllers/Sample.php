<?php
class Sample {
    private $conn;
    private $table_name = "Samples";

    public $SampleID;
    public $SampleType;
    public $CollectionDate;
    public $PatientID;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Crear una nueva muestra
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (SampleType, CollectionDate, PatientID) VALUES (:SampleType, :CollectionDate, :PatientID)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":SampleType", $this->SampleType);
        $stmt->bindParam(":CollectionDate", $this->CollectionDate);
        $stmt->bindParam(":PatientID", $this->PatientID);

        return $stmt->execute();
    }

    // Leer todas las muestras
    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Actualizar una muestra
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET SampleType = :SampleType, CollectionDate = :CollectionDate, PatientID = :PatientID WHERE SampleID = :SampleID";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":SampleType", $this->SampleType);
        $stmt->bindParam(":CollectionDate", $this->CollectionDate);
        $stmt->bindParam(":PatientID", $this->PatientID);
        $stmt->bindParam(":SampleID", $this->SampleID);

        return $stmt->execute();
    }

    // Eliminar una muestra
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE SampleID = :SampleID";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":SampleID", $this->SampleID);

        return $stmt->execute();
    }
}
?>
