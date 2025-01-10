<?php
if (isset($_FILES['file'])) {
    $uploadDir = __DIR__ . '/files/';
    $fileName = uniqid() . '_' . basename($_FILES['file']['name']);
    $uploadFile = $uploadDir . $fileName;

    if (!is_dir($uploadDir)) {
        if (!mkdir($uploadDir, 0755, true)) {
            echo json_encode(['success' => false, 'error' => 'No se pudo crear la carpeta de destino.']);
            exit;
        }
    }

    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {
        echo json_encode(['success' => true, 'filePath' => 'files/' . $fileName]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Error al mover el archivo al directorio de destino.']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'No se recibió ningún archivo.']);
}
