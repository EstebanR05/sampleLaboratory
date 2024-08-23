<?php 
include_once '../config/ConexionDataBase.php';
include_once '../src/controllers/Patient.php';
include_once '../src/controllers/Sample.php';
include_once '../src/controllers/Result.php';

// Funciones para manejar las solicitudes para los pacientes
function handlePatientRequests($method, $patient)
{
    switch ($method) {
        case 'GET':
            echo json_encode($patient->read());
            break;
        case 'POST':
            $data = json_decode(file_get_contents("php://input"));
            if (!empty($data->Name) && !empty($data->BirthDate) && !empty($data->Address)) {
                $patient->Name = $data->Name;
                $patient->BirthDate = $data->BirthDate;
                $patient->Address = $data->Address;
                if ($patient->create()) {
                    echo json_encode(['message' => 'Paciente creado']);
                } else {
                    echo json_encode(['message' => 'Error al crear el paciente']);
                }
            } else {
                echo json_encode(['message' => 'Datos incompletos']);
            }
            break;
        case 'PUT':
            $data = json_decode(file_get_contents("php://input"));
            if (!empty($data->PatientID) && !empty($data->Name) && !empty($data->BirthDate) && !empty($data->Address)) {
                $patient->PatientID = $data->PatientID;
                $patient->Name = $data->Name;
                $patient->BirthDate = $data->BirthDate;
                $patient->Address = $data->Address;
                if ($patient->update()) {
                    echo json_encode(['message' => 'Paciente actualizado']);
                } else {
                    echo json_encode(['message' => 'Error al actualizar el paciente']);
                }
            } else {
                echo json_encode(['message' => 'Datos incompletos']);
            }
            break;
        case 'DELETE':
            $data = json_decode(file_get_contents("php://input"));
            if (!empty($data->PatientID)) {
                $patient->PatientID = $data->PatientID;
                if ($patient->delete()) {
                    echo json_encode(['message' => 'Paciente eliminado']);
                } else {
                    echo json_encode(['message' => 'Error al eliminar el paciente']);
                }
            } else {
                echo json_encode(['message' => 'Datos incompletos']);
            }
            break;
        default:
            echo json_encode(['message' => 'Método no permitido']);
            break;
    }
}

// Funciones para manejar las solicitudes para las muestras
function handleSampleRequests($method, $sample)
{
    switch ($method) {
        case 'GET':
            echo json_encode($sample->read());
            break;
        case 'POST':
            $data = json_decode(file_get_contents("php://input"));
            if (!empty($data->SampleType) && !empty($data->CollectionDate) && !empty($data->PatientID)) {
                $sample->SampleType = $data->SampleType;
                $sample->CollectionDate = $data->CollectionDate;
                $sample->PatientID = $data->PatientID;
                if ($sample->create()) {
                    echo json_encode(['message' => 'Muestra creada']);
                } else {
                    echo json_encode(['message' => 'Error al crear la muestra']);
                }
            } else {
                echo json_encode(['message' => 'Datos incompletos']);
            }
            break;
        case 'PUT':
            $data = json_decode(file_get_contents("php://input"));
            if (!empty($data->SampleID) && !empty($data->SampleType) && !empty($data->CollectionDate) && !empty($data->PatientID)) {
                $sample->SampleID = $data->SampleID;
                $sample->SampleType = $data->SampleType;
                $sample->CollectionDate = $data->CollectionDate;
                $sample->PatientID = $data->PatientID;
                if ($sample->update()) {
                    echo json_encode(['message' => 'Muestra actualizada']);
                } else {
                    echo json_encode(['message' => 'Error al actualizar la muestra']);
                }
            } else {
                echo json_encode(['message' => 'Datos incompletos']);
            }
            break;
        case 'DELETE':
            $data = json_decode(file_get_contents("php://input"));
            if (!empty($data->SampleID)) {
                $sample->SampleID = $data->SampleID;
                if ($sample->delete()) {
                    echo json_encode(['message' => 'Muestra eliminada']);
                } else {
                    echo json_encode(['message' => 'Error al eliminar la muestra']);
                }
            } else {
                echo json_encode(['message' => 'Datos incompletos']);
            }
            break;
        default:
            echo json_encode(['message' => 'Método no permitido']);
            break;
    }
}

// Funciones para manejar las solicitudes para los resultados
function handleResultRequests($method, $result)
{
    switch ($method) {
        case 'GET':
            echo json_encode($result->read());
            break;
        case 'POST':
            $data = json_decode(file_get_contents("php://input"));
            if (!empty($data->SampleID) && !empty($data->Parameter) && !empty($data->Value) && !empty($data->ResultDate)) {
                $result->SampleID = $data->SampleID;
                $result->Parameter = $data->Parameter;
                $result->Value = $data->Value;
                $result->ResultDate = $data->ResultDate;
                if ($result->create()) {
                    echo json_encode(['message' => 'Resultado creado']);
                } else {
                    echo json_encode(['message' => 'Error al crear el resultado']);
                }
            } else {
                echo json_encode(['message' => 'Datos incompletos']);
            }
            break;
        case 'PUT':
            $data = json_decode(file_get_contents("php://input"));
            if (!empty($data->ResultID) && !empty($data->SampleID) && !empty($data->Parameter) && !empty($data->Value) && !empty($data->ResultDate)) {
                $result->ResultID = $data->ResultID;
                $result->SampleID = $data->SampleID;
                $result->Parameter = $data->Parameter;
                $result->Value = $data->Value;
                $result->ResultDate = $data->ResultDate;
                if ($result->update()) {
                    echo json_encode(['message' => 'Resultado actualizado']);
                } else {
                    echo json_encode(['message' => 'Error al actualizar el resultado']);
                }
            } else {
                echo json_encode(['message' => 'Datos incompletos']);
            }
            break;
        case 'DELETE':
            $data = json_decode(file_get_contents("php://input"));
            if (!empty($data->ResultID)) {
                $result->ResultID = $data->ResultID;
                if ($result->delete()) {
                    echo json_encode(['message' => 'Resultado eliminado']);
                } else {
                    echo json_encode(['message' => 'Error al eliminar el resultado']);
                }
            } else {
                echo json_encode(['message' => 'Datos incompletos']);
            }
            break;
        default:
            echo json_encode(['message' => 'Método no permitido']);
            break;
    }
}
