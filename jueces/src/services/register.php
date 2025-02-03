<?php

require("../../../../includes/class.phpmailer.php");
include '../db/conexion.php';

if ($conn->connect_error) {
    die(json_encode(['success' => false, 'error' => 'Error de conexión: ' . $conn->connect_error]));
}


$data = json_decode(file_get_contents("php://input"), true);

if (!$data) {
    echo json_encode(['success' => false, 'error' => 'No se recibieron datos.']);
    exit;
}

$name = $conn->real_escape_string($data['name']);
$paternalLastname = $conn->real_escape_string($data['paternalLastname']);
$maternalLastname = $conn->real_escape_string($data['maternalLastname']);
$documentType = $conn->real_escape_string($data['documentType']);
$identificationNumber = $conn->real_escape_string($data['identificationNumber']);
$age = intval($data['age']);
$gender = $conn->real_escape_string($data['race']);
$email = $conn->real_escape_string($data['email']);
$phone = $conn->real_escape_string($data['phone']);
$country = $conn->real_escape_string($data['country']);
$independentOrInstitution = $conn->real_escape_string($data['independentOrInstitution']);

$acceptDataPolicy = fnConvertYesOrNo(intval($data['acceptDataPolicy']));
$authorizePublicity = fnConvertYesOrNo(intval($data['authorizeDataUsage']));
$institutionName = $conn->real_escape_string($data['institutionName'] ?? "");
$cookie = $conn->real_escape_string($data['cookie']);

// try {
//     echo $acceptDataPolicy . "<br>" . $authorizePublicity;
//     exit;
// } catch (\Throwable $th) {
//     echo $th;
//     exit;
// }

$fechahora = date("Y-m-d H:i:s");
$form_id = 13;
$title = "IX Campeonato de Debate Escolar-Jueces";

$query = "
    INSERT INTO eventos (
        nombre,
        apaterno,
        amaterno,
        tipoDocumento,
        dni,
        edad,
        genero,
        email, 
        celular,
        pais,
        cronograma,
        aceptarPoliticaDatos, 
        aceptarEnvioPublicidad,
        empresa,
        fechahora,
        form_id,
        title,
        cookie
    ) VALUES (
        '$name', 
        '$paternalLastname', 
        '$maternalLastname', 
        '$documentType',
        '$identificationNumber', 
        $age, 
        '$gender', 
        '$email', 
        '$phone',
        '$country', 
        '$independentOrInstitution', 
        '$acceptDataPolicy',
        '$authorizePublicity', 
        '$institutionName',
        '$fechahora',
        $form_id,
        '$title',
        '$cookie'
    )
";

if ($conn->query($query) === TRUE) {
    echo json_encode(['success' => true, 'message' => 'Datos registrados con éxito.']);
} else {
    echo json_encode(['success' => false, 'error' => 'Error al registrar los datos: ' . $conn->error]);
}

$conn->close();

function fnConvertYesOrNo($isAccept): string
{
    return $isAccept ? "SI" : "NO";
}

include 'sentEmail.php';