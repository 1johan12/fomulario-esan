<?php
$db_host = "10.204.0.55";
$db_user = "jmamanisi";
$db_pass = "jM4man1sl%$";
$db_name = "prd_web_pregrado";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// echo "<script> alert('ingresa conexion2');</script>";
if (mysqli_connect_errno()) {
    echo 'No se pudo conectar a la base de datos : ' . mysqli_connect_error();
}
