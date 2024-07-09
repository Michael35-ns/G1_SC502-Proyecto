<?php include_once '../Model/usuarioModel.php';
      include_once 'comunController.php';

    if (isset($_POST["btnRegistrarUsuario"])) 
    {
        $Nombre = $_POST["txtNombre"];
        $Email = $_POST["txtEmail"];
        $Password = $_POST["txtPassword"];
        $Username = $_POST["txtUsername"];
        $correoUnico = ValidarUsuario($Email);
        $usuarioUnico = ValidarUsuario($Username);

        if($correoUnico->num_rows == 0)
        {
            if($usuarioUnico->num_rows == 0)
            {
                $respuesta = RegistrarUsuario($Nombre,$Email,$Password,$Username);

                if($respuesta == true)
                {
                    header("location: ../View/login.php");
                }
                else  
                {
                    $_POST["msj"] = "Su información no se ha registrado correctamente.";
                }
            }
            else
            {
                $_POST["msj"] = "El nombre de usuario " . $Username . " ya se encuentra ocupado";
            }
        }
        else
        {
            $_POST["msj"] = "Su correo ya se encuentra registrado";
        }

        
    }

    if (isset($_POST["btnIniciarSesion"])) 
    {
        $Credencial = $_POST["txtCredencial"];
        $Password = $_POST["txtPassword"];
        $respuesta = IniciarSesion($Credencial,$Password);

        if($respuesta->num_rows > 0)
        {
            $datos = mysqli_fetch_array($respuesta);
            $_SESSION["NombreUsuario"] = $datos[2];
            header("location: ../View/home.php");
        }
        else  
        {
            $_POST["msj"] = "Su información no se ha validado correctamente.";
        }
    }

    if (isset($_POST["btnRecuperarAcceso"])) 
    {
        $Email = $_POST["txtCorreo"];
        $respuesta = ValidarUsuario($Email);

        if($respuesta->num_rows > 0)
        {
            $datos = mysqli_fetch_array($respuesta);
            $Token = generarToken();
            $Expiracion = time() + 3600;

            $resultado = AgregarTokenAUsuario($datos["id_usuario"],$Token,$Expiracion);
            
            if($resultado == true)
            {
                $enlaceRestablecimiento = "http://localhost/Proyecto/View/cambiarContrasenna.php?token=" . urldecode($Token);

                $contenido = "<html><body>
                    Estimado(a) " . $datos["username"] . "<br/><br/>
                    Por favor ingrese al siguiente enlace: <b>" . $enlaceRestablecimiento . "</b><br/>
                    Recuerde realizar el cambio de contraseña una vez que ingrese a nuestro sistema<br/><br/>
                    Muchas gracias.
                    </body></html>";

                EnviarCorreo('Acceso al Sistema', $contenido, $datos["correo"]);
                header("location: ../View/login.php");
            }
            else  
            {
                $_POST["msj"] = "Su información no se ha registrado correctamente.";
            }
        }
        else  
        {
            $_POST["msj"] = "Su información no se ha validado correctamente.";
        }
    }

    if (isset($_GET['token']))
    {
        $token = $_GET['token'];

        $respuesta = ValidarExpiracion($token);
        if($respuesta->num_rows > 0)
        {
            $datos = mysqli_fetch_array($respuesta);
            $horaExpiracion = $datos["expiracion"];
            if($horaExpiracion > time())
            {
                $idUsuario = $datos["id_usuario"];
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["btnConfirmarCambio"])) 
                {
                    $Contrasenna = $_POST["txtContrasennaVerif"];
                    $respuesta = ActualizarContrasenna($idUsuario, $Contrasenna);

                    if($respuesta == true)
                    {
                        header("location: ../View/login.php");
                    }
                    else  
                    {
                        $_POST["msj"] = "Su información no se ha registrado correctamente.";
                    }

                }
                
            }
            else  
            {
                $_POST["msj"] = "El enlace de recuperación de contraseña es inválido o ha expirado.";
            }
        }
        else  
        {
            $_POST["msj"] = "Hubo problemas para validar su token.";
        }
    }

