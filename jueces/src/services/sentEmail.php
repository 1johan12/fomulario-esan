<?php
$texto = "
<html>
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
                line-height: 1.6;
                color: #333;
            }
            h1 {
                color: #cf1111;
                font-size: 20px;
            }
            table {
                width: 100%;
                border-collapse: collapse;
            }
            table, th, td {
                border: 1px solid #ddd;
            }
            th, td {
                padding: 10px;
                text-align: left;
            }
            th {
                background-color: #f4f4f4;
            }
            .separator {
                border-top: 2px solid #cf1111;
                margin: 10px 0;
            }
            .footer {
                margin-top: 20px;
                font-size: 12px;
                color: #888;
            }
        </style>
    </head>
    <body>
        <h1>$title</h1>
        <table>
            <tr>
                <th>Nombres y Apellidos</th>
                <td>$name $paternalLastname $maternalLastname</td>
            </tr>
            <tr>
                <th>DNI</th>
                <td>$identificationNumber</td>
            </tr>
            <tr>
                <th>Género</th>
                <td>$gender</td>
            </tr>
            <tr>
                <th>Edad</th>
                <td>$age</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>$email</td>
            </tr>
            <tr>
                <th>Celular</th>
                <td>$phone</td>
            </tr>
            <tr>
                <th>País</th>
                <td>$country</td>
            </tr>
            <tr>
                <th>Tipo</th>
                <td>$independentOrInstitution</td>
            </tr>
            <tr>
                <th>Institución</th>
                <td>$institutionName</td>
            </tr>
            <tr>
                <th>Acepta Políticas</th>
                <td>$acceptDataPolicy</td>
            </tr>
            <tr>
                <th>Acepta Publicidad</th>
                <td>$authorizePublicity</td>
            </tr>
        </table>
        <div class='footer'>
            Este correo es sólo para envío.
        </div>
    </body>
</html>
";

$imageData = base64_encode(file_get_contents('https://qaspre.ue.edu.pe/pregrado/inscripcioncampeonatodebate2/assets/esan_logo_gris.jpeg'));
$src = 'data:image/jpeg;base64,' . $imageData;

$textoSentToJudge = "
<div style='font-family: Arial, Helvetica, sans-serif; width: 600px;margin: 0 auto; text-align: center;'>

    <img src='cid:image_cid'>

    <div style='padding: 20px; font-size: 16px; color: #333;'>

        Estimado(a) <strong>$name $paternalLastname $maternalLastname</strong>, gracias por registrarte. <br><br>

        Te estaremos informando del taller de jueces.<br>
        Enviaremos más información al correo que registraste.<br><br>

        Gracias por tu participación. Estaremos en contacto.
    </div>

    <div style='background-color: #e3173e; padding: 20px; font-size: 20px; font-weight: 600; color: white;'>
        Atentamente, <br>
        Universidad Esan
    </div>
</div>

";

$administrators = [
    "debate@ue.edu.pe",
    "rratto@esan.edu.pe",
    "cvelazco@esan.edu.pe",
    "jhuamanv@esan.edu.pe",
    "laponte@esan.edu.pe",
    "jmamanisi@esan.edu.pe",
];
$_fromName = "IX Campeonato Escolar Debate ESAN | Universidad ESAN";

$mail = new PHPMailer();
$mail->CharSet = 'UTF-8';

$mail->WordWrap = 50;
$mail->IsHTML(true);

$mail->IsSMTP();
$mail->Host = "172.25.0.42";
$mail->SMTPAuth = false;
$mail->Username = "";
$mail->Password = "";
$mail->From = ("debate@esan.edu.pe");
$mail->FromName = $_fromName;
foreach ($administrators as $value) {
    $mail->AddAddress($value);
}
$mail->Subject  =  $title;
$mail->Body     =  $texto;
$mail->Send();
$mail->ClearAllRecipients();

$mail->From = "debate@esan.edu.pe";
$mail->isHTML(true);
$mail->FromName = $_fromName;
$mail->AddAddress($email);
$mail->Subject  =  $title;
$mail->IsHTML(true);
$mail->addEmbeddedImage("../../../assets/esan_logo_gris.jpeg", 'image_cid');
$mail->Body =  $textoSentToJudge;
$mail->Send();
$mail->ClearAllRecipients();
// function fnConvertYesOrNo($isAccept): string
// {
//     return $isAccept ? "Si" : "No";
// }
