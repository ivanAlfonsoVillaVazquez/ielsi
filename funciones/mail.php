<?php 
include_once '../PHPMailer-master/PHPMailerAutoload.php';

function mailContacto($nombre, $correo, $asun, $mensaje)
{
    	
	$destino1 = "drg_henri@hotmail.com";
    $asunto = "Nuevo mensaje del area de Contacto";
    $mensaje = "

    <!DOCTYPE html>
    <html lang=\"es-MX\">
    <head>
    	<meta charset=\"utf-8\"/>
    	<title></title>
    </head>
    <body>
    	<table cellpadding='5' cellspacing='3' align='center' width='100%'>
    		<tr>
    			<th style='background-color: #18b735 ; color:#FFF; font-size:16px;' colspan='3' align='center'>Un nuevo mensaje se ha generado</th>
    		</tr>
    		<tr align='left'>
    			<th style='background-color:#B0B0B0; font-size:12px; width:35%; height:10%'>Nombre:</th>
    			<td style='background-color:#DBDBDB; font-size:12px; width:35%; height:10%'>TC" . $nombre . "</td>
    		</tr>
    		<tr align='left'>
    			<th style='background-color:#B0B0B0; font-size:12px; width:35%; height:10%'>Correo:</th>
    			<td style='background-color:#DBDBDB; font-size:12px; width:35%; height:10%'>" . $correo . "</td>
    		</tr>
    		<tr align='left'>
    			<th style='background-color:#B0B0B0; font-size:12px; width:35%; height:10%'>Asunto:</th>
    			<td style='background-color:#DBDBDB; font-size:12px; width:35%; height:10%'>" . $asun . "</td>
    		</tr>
    		<tr align='left'>
    			<th style='background-color:#B0B0B0; font-size:12px; width:35%; height:10%'>Mensaje:</th>
    			<td style='background-color:#DBDBDB; font-size:12px; width:35%; height:10%'>" . $mensaje . "</td>
    		</tr>
    	</table>
    	<br>
    	<p><b>No contestar este mensaje, se genera automaticamente por el sistema</b></p>
    	<br>
    	<p style='color: #7C7C5F;'>Ielsi | 2017 | Desarrollado por Iván Villa (<a target='_blank' href='mailto:ivan.villa@gmail.com'>ivan.villa@gmail.com</a>)</p>
    </body>
    </html>";

$mail = new PHPMailer(); // defaults to using php "mail()"
$mail->SetFrom('no-reply@ielsi.com', 'no-reply');
$mail->AddAddress($destino1);
$mail->Subject = $asunto;
$mail->MsgHTML($mensaje);
$mail->AltBody = "No contestar este mensaje, se genera automaticamente por el sistema"; // optional, comment out and test
$mail->CharSet = 'UTF-8';
//$mail->AddReplyTo("silvarud@mx1.ibm.com");
//$mail->AddAttachment("img/camara.jpg");      // attachment

if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}

    
}


 ?>