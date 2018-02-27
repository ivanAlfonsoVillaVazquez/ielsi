<?php 
include_once '../funciones/mail.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	if (isset($_GET['operation'])){
		$operation = $_GET['operation'];
		if (!empty($operation)){
			//---- NUEVO CONTACTO ----//
			if ($operation == 'nuevoContacto'){
				if ( isset($_POST['nombre']) 
					&& isset($_POST['correo'])
					&& isset($_POST['asunto'])
					&& isset($_POST['mensaje'])

					&& !empty($_POST['nombre'])
					&& !empty($_POST['correo'])
					&& !empty($_POST['asunto'])
					&& !empty($_POST['mensaje'])
					)
				{
					$_nombre = $_POST['nombre'];
					$_correo = $_POST['correo'];
					$_asunto = $_POST['asunto'];
					$_mensaje = $_POST['mensaje'];

					if(mailContacto($_nombre, $_correo, $_asunto, $_mensaje)){
						echo "mensaje enviado";
					}else{
						//echo '<script language = javascript>alert("Error al agregar valor.");self.location = "../../semaforo2.php"</script>';
					}
				}
				else{	
					echo "Incorrect parameters";
				}
			}
			else{
				echo "Operation not found!";
			}
		}else{
			echo "Parameter should not be empty !";
		}
	}else{
		echo "Invalid Parameters";
	}
}else if ($_SERVER['REQUEST_METHOD'] == 'GET'){
	echo "Ielsi";
}



 ?>