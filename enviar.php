<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Formulario</title> <!-- Aquí va el título de la página -->

</head>

<body>
<?php

$Nombre = $_POST['nombre'];
$Email = $_POST['email'];
$Ciudad = $_POST['ciudad'];
$Mensaje = $_POST['mensaje'];

if ($Nombre=='' || $Email=='' || $Ciudad =='' || $Mensaje==''){ // Si falta un dato en el formulario mandara una alerta al usuario.

echo "<script>alert('Los campos marcados con * son obligatorios');location.href ='javascript:history.back()';</script>";

}else{


    require("class.phpmailer.php"); // Requiere PHPMAILER para poder enviar el formulario desde el SMTP de google
    $mail = new PHPMailer();

    $mail->From     = $Email;
    $mail->FromName = $Nombre; 
    $mail->AddAddress("aprendiz_ti@vcb.com.co"); // Dirección a la que llegaran los mensajes.

// Aquí van los datos que apareceran en el correo que reciba

    $mail->WordWrap = 50; 
    $mail->IsHTML(true);     
    $mail->Subject  =  "Contacto"; // Asunto del mensaje.
    $mail->Body     =  "nombre: $Nombre \n<br />". // Nombre del usuario
    "email: $Email \n<br />".    // Email del usuario
    "ciudad: $Ciudad \n<br />".    // Ciudad del usuario
    "menasje: $Mensaje \n<br />"; // Mensaje del usuario

// Datos del servidor SMTP, podemos usar el de Google, Outlook, etc...

    $mail->IsSMTP(); 
    $mail->Host = "ssl://smtp.gmail.com:465";  // Servidor de Salida. 465 es uno de los puertos que usa Google para su servidor SMTP
    $mail->SMTPAuth = true; 
    $mail->Username = "aprendiz_ti@vcb.com.co";  // Correo Electrónico
    $mail->Password = "asdqwe123"; // Contraseña del correo

    if ($mail->Send())
    echo "<h1> Enviado </h1>";
    else
    echo "<h1> Enviado </h1>";

}

?>
</body>
</html>