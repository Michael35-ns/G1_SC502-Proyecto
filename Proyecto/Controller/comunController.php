<?php

function EnviarCorreo($asunto,$contenido,$destinatario)
{
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $correoSalida = "clasesphp@outlook.com";
    $contrasennaSalida = "phpclases2024*";

    $mail = new PHPMailer();
    $mail -> CharSet = 'UTF-8';

    $mail -> IsSMTP();
    $mail -> IsHTML(true); 
    $mail -> Host = 'smtp.office365.com';
    $mail -> SMTPSecure = 'tls';
    $mail -> Port = 587;                      
    $mail -> SMTPAuth = true;
    $mail -> Username = $correoSalida;               
    $mail -> Password = $contrasennaSalida;                                
    
    $mail -> SetFrom($correoSalida);
    $mail -> Subject = $asunto;
    $mail -> MsgHTML($contenido);   
    $mail -> AddAddress($destinatario);

    $mail -> send();
}

?>