<?php
// delete_file.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    if (!isset($data['filePath'])) {
        echo json_encode(['success' => false, 'error' => 'No se proporcionó la ruta del archivo.']);
        exit;
    }

    $filePath = $data['filePath'];
    $absolutePath = __DIR__ . '/files/' . basename($filePath);

    error_log("Ruta recibida: $filePath");
    error_log("Ruta absoluta: $absolutePath");

    if (file_exists($absolutePath)) {
        if (unlink($absolutePath)) {
            echo json_encode(['success' => true, 'message' => 'Archivo eliminado con éxito.']);
        } else {
            echo json_encode(['success' => false, 'error' => 'No se pudo eliminar el archivo.']);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'El archivo no existe.']);
    }
}
?>
