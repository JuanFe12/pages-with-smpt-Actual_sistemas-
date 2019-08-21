
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$Nombre = $_POST["nombre"];
$Email  = $_POST["email"];
$Ciudad = $_POST["ciudad"];
$Mensaje = $_POST["mensaje"];


$body= "Nombre: " . $Nombre . "<br>Mensaje: " . $Mensaje . "<br>Ciudad: " . $Ciudad . "<br>Correo: ". $Email;

include 'phpmailer/Exception.php';
include 'phpmailer/PHPMailer.php';
include 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'juanfelipeariastabares007@gmail.com';                     // SMTP username
    $mail->Password   = '*';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('juanfelipeariastabares007@gmail.com', $Nombre);
    $mail->addAddress('juanfelipeariastabares007@gmail.com', $Email);     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $Mensaje;
    $mail->Body    = $body;
    $mail ->Charset = 'UTF-8';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Se envio correctamente';
} catch (Exception $e) {
    echo "Hubo un error al enviar el mensaje: {$mail->ErrorInfo}";
}
?>
</body>
</html>