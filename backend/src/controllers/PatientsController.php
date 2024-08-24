<?php

require_once '../services/patients.php';

class PatientsController
{
    public function __construct() {}

    public function handleGetAllPatients() {
        Patients::getAllPatients();
    }

    public function handleGetByIdPatients($id) {}

    public function handleCreatePatients($name, $birthDate, $address)
    {
        if (!isset($name) && !isset($birthDate) && !isset($address)) {
            http_response_code(400);
        }

        Patients::createPatients($name, $birthDate, $address);
    }

    public function handleUpdatePatients($id) {}

    public function handleDeletePatients($id) {}
}

$controller = new PatientsController();
$data = json_decode(file_get_contents('php://input'), true);

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if (isset($data['id'])) {
            $controller->handleGetByIdPatients($data['id']);
        } else {
            $controller->handleGetAllPatients();
        }
        break;
    case 'POST':
        $controller->handleCreatePatients($data['name'], $data['birthDate'], $data['address']);
        break;
    case 'PUT':
        $controller->handleUpdatePatients($data['id']);
        break;
    case 'DELETE':
        $controller->handleDeletePatients($data['id']);
        break;
    default:
        http_response_code(405);
        echo json_encode(['error' => 'Método no permitido']);
        break;
}
