<?php

require_once '../config/ConexionDataBase.class.php';

class Patients
{
    public  function __construct() {}

    public function getPatients() {}

    public function getPatient($PatientID) {}

    public static function createPatients($Name, $BirthDate, $Address)
    {
        $conn = self::hanldeConexion();
        $str = $conn->prepare('INSERT INTO patients (`PatientID`, `Name`, `BirthDate`, `Address`) VALUES (NULL, :Name, :BirthDate, :Address)');
        $str->bindParam(':Name', $Name);
        $str->bindParam(':BirthDate', $BirthDate);
        $str->bindParam(':Address', $Address);
        self::hanldeResponse($str->execute());
    }

    public function updatePatients($PatientID, $Name, $BirthDate, $Address) {}

    public function deletePatients($PatientID) {}

    private function hanldeResponse($resp)
    {
        $resp ? header('HTTP/1.1 201 creado correctamente') : header('HTTP/1.1 404 No se pudo crear correctamente');
    }

    private function hanldeConexion()
    {
        $database = new ConexionDataBase();
        return $conn = $database->conectar();
    }
}
