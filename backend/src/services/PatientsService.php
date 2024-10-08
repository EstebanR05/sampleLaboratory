<?php

require_once '../config/handleMesages.php';

class PatientsService
{
    private static $handleMessages;

    public static function initialize()
    {
        self::$handleMessages = new handleMesages();
    }

    public static function getAllPatients()
    {
        self::initialize();
        $conn = self::$handleMessages->hanldeConexion();
        $str = $conn->prepare('SELECT * FROM patients');
        $str->execute();

        $patients = $str->fetchAll(PDO::FETCH_ASSOC);
        self::$handleMessages->hanldeResponse($patients);
        echo json_encode($patients);
    }

    public static function getByIdPatient($PatientID)
    {
        self::initialize();
        $conn = self::$handleMessages->hanldeConexion();
        $str = $conn->prepare('SELECT * FROM patients WHERE PatientID = :PatientID');
        $str->bindParam(':PatientID', $PatientID);
        $str->execute();

        $patients = $str->fetch(PDO::FETCH_ASSOC);
        self::$handleMessages->hanldeResponse($patients);
        echo json_encode($patients);
    }

    public static function createPatients($Name, $BirthDate, $Address)
    {
        self::initialize();
        $conn = self::$handleMessages->hanldeConexion();
        $str = $conn->prepare('INSERT INTO patients (`PatientID`, `Name`, `BirthDate`, `Address`) VALUES (NULL, :Name, :BirthDate, :Address)');
        $str->bindParam(':Name', $Name);
        $str->bindParam(':BirthDate', $BirthDate);
        $str->bindParam(':Address', $Address);

        self::$handleMessages->hanldeResponse($str->execute());
        echo json_encode(['message' => 'Creado correctamente']);
    }

    public static function updatePatients($PatientID, $Name, $BirthDate, $Address)
    {
        self::initialize();
        $conn = self::$handleMessages->hanldeConexion();
        $str = $conn->prepare('UPDATE patients SET Name = :Name, BirthDate = :BirthDate, Address = :Address WHERE PatientID = :PatientID');
        $str->bindParam(':Name', $Name);
        $str->bindParam(':BirthDate', $BirthDate);
        $str->bindParam(':Address', $Address);
        $str->bindParam(':PatientID', $PatientID);

        self::$handleMessages->hanldeResponse($str->execute());
        echo json_encode(['message' => 'Actualizado correctamente']);
    }

    public static function deletePatients($PatientID)
    {
        self::initialize();
        $conn = self::$handleMessages->hanldeConexion();
        $str = $conn->prepare('DELETE FROM patients WHERE PatientID = :PatientID');
        $str->bindParam(':PatientID', $PatientID);
        self::$handleMessages->hanldeResponse($str->execute());
        echo json_encode(['message' => 'Eliminado correctamente']);
    }
}
