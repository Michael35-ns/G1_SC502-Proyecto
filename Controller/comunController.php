<?php

function EnviarCorreo($asunto,$contenido,$destinatario)
{
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $correoSalida = "arenal.framescr@outlook.com";
    $contrasennaSalida = "AFDes1gn";

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

    if ($mail -> send()) {
        return true;
    } else {
        return false;
    }
}

function generarToken($lenght = 32)
{
    return bin2hex(random_bytes($lenght));
}

if (isset($_POST["btnCotizar"])) {
    $Nombre = $_POST["txtNombre"];
    $Telefono = $_POST["txtTelefono"];
    $Email = $_POST["txtCorreo"];
    $Direccion = $_POST["txtDireccion"];
    $Descripcion = $_POST["txtDescripcion"];


            $contenido = '
                    <!DOCTYPE html>
                    <html lang="es">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <style>
                            body {
                                font-family: Arial, sans-serif;
                                color: #333;
                                margin: 0;
                                padding: 20px;
                            }
                            .container {
                                max-width: 600px;
                                margin: 0 auto;
                                padding: 20px;
                                border: 1px solid #ddd;
                                border-radius: 5px;
                                background-color: #f9f9f9;
                            }
                            h2 {
                                color: #007BFF;
                            }
                            .info {
                                margin-bottom: 10px;
                            }
                            .info label {
                                font-weight: bold;
                            }
                            .info p {
                                margin: 0;
                            }
                        </style>
                    </head>
                    <body>
                        <div class="container">
                            <h2>Solicitud de Cotización</h2>
                            <div class="info">
                                <label>Nombre:</label>
                                <p>' . $Nombre . '</p>
                            </div>
                            <div class="info">
                                <label>Teléfono:</label>
                                <p>' . $Telefono . '</p>
                            </div>
                            <div class="info">
                                <label>Email:</label>
                                <p>' . $Email . '</p>
                            </div>
                            <div class="info">
                                <label>Dirección:</label>
                                <p>' . $Direccion . '</p>
                            </div>
                            <div class="info">
                                <label>Descripción:</label>
                                <p>' . $Descripcion . '</p>
                            </div>
                        </div>
                    </body>
                    </html>
                    ';

            $respuesta = EnviarCorreo('Cotización Nueva', $contenido, 'arenal.framescr@outlook.com');

            

            if($respuesta){
                header("location: /Proyecto/View/home.php");
            }    
        }
?>