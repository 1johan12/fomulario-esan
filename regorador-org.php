<?php
	// Configura la conexión a la base de datos
	$host = "10.204.0.55";
	$username = "usr_prd_webue";
	$password = "i.Hd37h2kpU-J";
	$dbname = "prd_web_pregrado";

	// Crear conexión
	$conn = new mysqli($host, $username, $password, $dbname);

	// Verificar conexión
	if ($conn->connect_error) {
		die("Error en la conexión: " . $conn->connect_error);
	}

	$input = file_get_contents("php://input");
	$data = json_decode($input, true); // true para convertirlo a array asociativo

	// Capturar el cuerpo de la solicitud (JSON enviado desde JavaScript)
	$inputJSON = file_get_contents('php://input'); 

	// Convertir el JSON a un objeto o array asociativo PHP
	$data = json_decode($inputJSON, true); // Cambia a `false` si prefieres un objeto

	// Verificar si se recibió correctamente el JSON
	if ($data === null) {
		http_response_code(400); // Código de error para solicitud incorrecta
		echo json_encode(["error" => "Formato de JSON inválido"]);
		exit;
	}

	// Acceder a los datos recibidos
	$nomcentroestudio = $data['schoolName'];
	$ubigeocolegio = $data['district'];
	$idcentro = $data['ueidCentro'];
	$departamento = $data['department'];
	$provincia = $data['province'];
	$distrito = $data['district'];
	$procedencia = $data['procedencia'];
	$tramitedatos = "";
	$publicidad = "";
	$participante = "";
	if($data["acceptDataPolicy"] == true)
	{
		$tramitedatos = "SI";
	}
	else
	{
		$tramitedatos = "NO";
	}

	if($data["authorizeDataUsage"] == true)
	{
		$publicidad = "SI";
	}
	else
	{
		$publicidad = "NO";
	}
	$nreg = 0;
	$idform = 0;
	$referenc = "";
	$title = "";
	$idcharla = 0;
	$grupo = 0;

	$sqlcons = "select idcharla, idform, titulo, referencia, (grupo + 1) as grupo from formcharlas where idcharla=(select max(idcharla) from formcharlas where idform=13)";
	$resultado = $conn->query($sqlcons);
	echo $sqlcons;
	if ($resultado->num_rows > 0) {
		while ($fila = $resultado->fetch_assoc()) 
		{
			// Acceso a los valores por nombres de columna
			$idcharla = $fila['idcharla'];
			$idform = $fila['idform'];
			$title = $fila['titulo'];
			$referenc = $fila['referencia'];
			$grupo = $fila['grupo'];
		}
	}
	else 
	{
		echo "No se encontraron resultados.";
	}
	
	//$texto = "<b><span style='color:rgb(0, 105, 179); font-size:16px'>".$title."</span>" . "</b> <br/> <br/>";
	$texto = "<div style='font-family: Arial, Helvetica, sans-serif; width: 600px;'>
	<img src='https://ue.edu.pe/pregrado/images/cabeceracampeonato.png' alt='Universidad Esan'>
	<div style='padding: 20px; font-size: 16px; color: #333;'><br>";	
	
		$textorpta .= "<div style='font-family: Arial, Helvetica, sans-serif; width: 600px;'>
    <img src='https://ue.edu.pe/pregrado/images/cabeceracampeonato.png' alt='Universidad Esan'>
    <div style='padding: 20px; font-size: 16px; color: #333;'>
	<span style='color:rgb(0, 105, 179); font-size:16px'>".$title."</span> </b> <br/> <br/>";
	
	
	$lsemail = "";
	$unir = "";
	$listemail = "";
	$grado = "";
	foreach ($data['team'] as $participant) 
	{
		$nombre = $participant["name"];
		$apaterno = $participant["paternalname"];
		$amaterno = $participant["maternalname"];
		$dni = $participant["dni"];
		$email = $participant["email"];
		$genero = $participant["race"];
		$celular = $participant["phone"];
		$edad = "0";
		$idinteresado = 0;
		$nivelestudio = "";
		$urlarchivos = $participant["file"];
		$participante = $nombre." ".$apaterno." ".$amaterno;
		$tipopart = "";
		if($participant["participantType"]=="speaker")
		{
			$tipopart = "Orador";
			$nivelestudio = $participant["degree"];
			$estado = 2;

			$grado = match ($nivelestudio) {
				"1" => "Tercer Año",
				"4" => "Cuarto Año",
				"6" => "Quinto Año",
				default => "Desconocido",
			};

			echo $mensaje;

			
			
			
			$edad = $participant["age"];
		}
		else
		{
			$tipopart = "Profesor";
			$nivelestudio = "0";
			$edad = "0";
		}		
		
		
		$sql = "INSERT INTO forminteresados (nombre, apaterno, amaterno, dni, email, edad, genero, celular, ubigeocolegio, nomcentroestudio, idcestudios, control_insert)
				VALUES ('$nombre', '$apaterno', '$amaterno', '$dni', '$email', '$edad', '$genero', '$celular', '$ubigeocolegio', '$nomcentroestudio', '$idcentro', now())";
				
		if ($conn->query($sql) === TRUE) 
		{
			$idinteresado = $conn->insert_id;
		} 
		else 
		{
			echo json_encode(["success" => false, "message" => "Error: " . $conn->error]);
		}
		

		
		if($idinteresado > 0)
		{
			$sql2 = "INSERT INTO forminteresadosdetalle (idinteresado, nivelestudio, control_insert, tramitedatos, publicidad, urlarchivos, idform, infcookie, GrupoEstudio)
					VALUES ('$idinteresado', '$nivelestudio', now(), '$tramitedatos', '$publicidad', '$urlarchivos', '$idform', '$procedencia','$grupo')";	

			
			if ($conn->query($sql2) === FALSE) 
			{
				echo json_encode(["success" => false, "message" => "Error: " . $conn->error]);
			}

			$sql3 = "UPDATE formcharlas SET grupo='".$grupo."' WHERE idcharla='".$idcharla."'";	
			if ($conn->query($sql3) === FALSE) 
			{
				echo json_encode(["success" => false, "message" => "Error: " . $conn->error]);
			}
		}
		

		$texto .= "Tipo de Participante :" . $tipopart . "<br>";
		$texto .= "Nombre del Colegio :" . $nomcentroestudio . "<br>";
		$texto .= "Distrito del Colegio :" . $distrito ." - ". $provincia ." - ". $departamento . "<br>";
		$texto .= "nombres y apellidos :" . $participante . "<br>";
		$texto .= "DNI :" . $dni . "<br>";
		$texto .= "Email :" . $email . "<br>";
		$texto .= "Celular :" . $celular . "<br>";
		$texto .= "Genero :" . $genero . "<br>";		
		if($tipopart != "Profesor")
		{
			$texto .= "Edad :" . $edad . "<br>";
			$texto .= "Grado :" . $grado . "<br>";	
		}

		$texto .= "Archivos Adjuntos :" . $urlarchivos . "<br>";
		$texto .= "Acepto las condiciones de tratamiento para mis datos personales :" . $tramitedatos . "<br>";
		$texto .= "Autorizo a UESAN a utilizar mis datos para el envío de publicidad sobre los servicios educativos y actividades que brinda, así como la realización de encuestas de satisfacción al cliente. :" . $publicidad . "<br>";
		$texto .= "<br /> <hr> <br />";
		$listemail .= $unir.$email;
		$unir = ",";
		//enviarcorreo($textorpta, $title, $email);
		//$textorpta = "";
	}

	$texto .= "    </div>
		<div style='background-color: #e3173e; padding: 20px; font-size: 20px; font-weight: 600; color: white;'>
			Atentamente, <br>
			Universidad Esan
		</div>
	</div> <br> <br> <br>";
	

	$textorpta .= "Tu registro se ha realizado de manera satisfactoria al " .$title." a realizar el ".$referenc.". Te esperamos en nuestro campus: Alonso de Molina 1652, Monterrico, Surco.";
	$textorpta .= "<br>";
	$textorpta .= "<br>";
	$textorpta .= "Para mayor información escribir al siguiente correo: debate@esan.edu.pe";
	$textorpta .= "<br>";
	$textorpta .= "<br>";
	$textorpta .= "Atentamente,\n\n";
	$textorpta .= "<br>";
	$textorpta .= "<br>";
	$textorpta .= "Universidad ESAN.\n\n";
	$textorpta .= "<br>";
	$textorpta .= "</div>
    <div style='background-color: #e3173e; padding: 20px; font-size: 20px; font-weight: 600; color: white;'>
        Atentamente, <br>
        Universidad Esan
    </div>
</div>";
	
		
	enviarcorreo($texto, $textorpta, $title, "jhuamanv@esan.edu.pe", $listemail);
	//enviarcorreo($texto, $title, "jhuamanv@esan.edu.pe");
	$conn->close();	
	echo json_encode(["success" => true, "message" => "registro exitos: "]);
	
	//header('Location: https://www.ue.edu.pe/pregrado/gracias-campeonato-debate-escolar');

	function enviarcorreo($texto, $textorpta, $title, $esan, $correos)
	{
			require("../includes/class.phpmailer.php");
			$mail = new PHPMailer();
			$mail->CharSet = 'UTF-8';

			$mail->WordWrap = 50; 
			$mail->IsHTML(true);     
			
			// Datos del servidor SMTP

			$mail->IsSMTP(); 
			$mail->Host = "172.25.0.42";  // Servidor de Salida.
			$mail->SMTPAuth = false; 
			$mail->Username = "";  // Correo Electrónico
			$mail->Password = ""; // Contraseña
			
			$mail->From = ("debate@esan.edu.pe"); //Dirección desde la que se enviarán los mensajes. Debe ser la misma de los datos de el servidor SMTP.
			$mail->FromName = "Universidad ESAN  ";  
			$mail->AddAddress($esan); // Dirección a la que llegaran los mensajes.
			//$mail->addEmbeddedImage("assets/esan_logo_gris.jpeg", 'image_cid');
			$mail->Subject  =  ($title);
			$mail->Body     =  $texto;
			$mail->Send();	
			$mail->ClearAllRecipients( );
			
			$mail->From = ("debate@esan.edu.pe"); //Dirección desde la que se enviarán los mensajes. Debe ser la misma de los datos de el servidor SMTP.
			$mail->FromName = "IX Campeonato Escolar Debate ESAN | Universidad ESAN  ";  
			$lsemail = explode(',', $correos);
			foreach ($lsemail as $email) 
			{
				$mail->AddAddress($email);
			}
			//$mail->addEmbeddedImage("assets/esan_logo_gris.jpeg", 'image_cid');
			$mail->Subject  =  ($title);
			$mail->Body     =  $textorpta;
			$mail->Send();	
			$mail->ClearAllRecipients( );
	}
?>
