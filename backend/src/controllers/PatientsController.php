<?php

require_once '../services/patients.php';

class PatientsController
{
    public function __construct() {}

    public function handleCreatePatients()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($data['name']) && isset($data['birthDate']) && isset($data['address'])) {
            Patients::createPatients($data['name'], $data['birthDate'], $data['address']);
        }
    }
}

$controller = new PatientsController();

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        # code...
        break;
    case 'POST':
        $controller->handleCreatePatients();
        break;
    case 'PUT':
        # code...
        break;
    case 'DELETE':
        # code...
        break;
    default:
        http_response_code(405); // Método no permitido
        echo json_encode(['error' => 'Método no permitido']);
        break;
}
