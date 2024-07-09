<?php

function EnviarCorreo($asunto,$contenido,$destinatario)
{
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $correoSalida = "G2_SC502@outlook.com";
    $contrasennaSalida = "AmbientWeb2";

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

function generarToken($lenght = 32)
{
    return bin2hex(random_bytes($lenght));
}

?>