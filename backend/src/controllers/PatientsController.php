<?php

require_once '../services/patients.php';

class PatientsController
{
    public function __construct() {}

    public function handleGetAllPatients()
    {
        Patients::getAllPatients();
    }

    public function handleGetByIdPatients($id)
    {
        if (!isset($id)) {
            http_response_code(400);
        }

        Patients::getByIdPatient($id);
    }

    public function handleCreatePatients($name, $birthDate, $address)
    {
        if (!isset($name) && !isset($birthDate) && !isset($address)) {
            http_response_code(400);
        }

        Patients::createPatients($name, $birthDate, $address);
    }

    public function handleUpdatePatients($id, $name, $birthDate, $address) {
        if (!isset($id) && !isset($name) && !isset($birthDate) && !isset($address)) {
            http_response_code(400);
        }

        Patients::updatePatients($id, $name, $birthDate, $address);
    }

    public function handleDeletePatients($id) {
        if (!isset($id)) {
            http_response_code(400);
        }

        Patients::deletePatients($id);
    }
}

$controller = new PatientsController();
$data = json_decode(file_get_contents('php://input'), true);

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if (isset($_GET['id'])) {
            $controller->handleGetByIdPatients($_GET['id']);
        } else {
            $controller->handleGetAllPatients();
        }
        break;
    case 'POST':
        $controller->handleCreatePatients($data['name'], $data['birthDate'], $data['address']);
        break;
    case 'PUT':
        $controller->handleUpdatePatients($_GET['id'], $data['name'], $data['birthDate'], $data['address']);
        break;
    case 'DELETE':
        $controller->handleDeletePatients($_GET['id']);
        break;
    default:
        http_response_code(405);
        echo json_encode(['error' => 'Metodo no permitido']);
        break;
}
