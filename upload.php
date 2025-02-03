<?php
if (isset($_FILES['file'])) {
    $uploadDir = __DIR__ . '/files/';
    $fileName = uniqid() . '_' . basename($_FILES['file']['name']);
    $uploadFile = $uploadDir . $fileName;

    // Verificar errores de carga del archivo
    if ($_FILES['file']['error'] !== UPLOAD_ERR_OK) {
        echo json_encode([
            'success' => false,
            'error' => 'Error en la carga del archivo.',
            'debug' => $_FILES['file']['error'] // Código de error de PHP
        ]);
        exit;
    }

    // Crear el directorio si no existe
    if (!is_dir($uploadDir)) {
        if (!mkdir($uploadDir, 0755, true)) {
            echo json_encode([
                'success' => false,
                'error' => 'No se pudo crear la carpeta de destino.',
                'debug' => error_get_last()
            ]);
            exit;
        }
    }

    // Mover el archivo al destino
    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {
        echo json_encode([
            'success' => true,
            'filePath' => $_POST['basePath'] . 'files/' . $fileName
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'error' => 'Error al mover el archivo al directorio de destino.',
            'debug' => error_get_last()
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'error' => 'No se recibió ningún archivo.',
        'debug' => $_POST
    ]);
}
