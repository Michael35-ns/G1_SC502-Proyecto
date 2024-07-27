<?php include_once __DIR__ . '/../Model/usuarioModel.php';

      include_once 'comunController.php';
      
    if(session_status() === PHP_SESSION_NONE) {
        session_start();
    }

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
                    header("location: ../Registro-Inicio/login.php");
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
            $_SESSION["nombreUsuario"] = $datos["nombre"];
            $_SESSION["IdUsuario"] = $datos["id_usuario"];
            $_SESSION["RolUsuario"] = $datos["id_rol"];
            header("location: ../home.php");
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
                $enlaceRestablecimiento = "http://localhost/Proyecto/View/Registro-Inicio/cambiarContrasenna.php?token=" . urldecode($Token);

                $contenido = "<html><body>
                    Estimado(a) " . $datos["nombre"] . "<br/><br/>
                    Por favor ingrese al siguiente enlace: <b>" . $enlaceRestablecimiento . "</b><br/>
                    Recuerde realizar el cambio de contraseña una vez que ingrese a nuestro sistema<br/><br/>
                    Muchas gracias.
                    </body></html>";

                EnviarCorreo('Acceso al Sistema', $contenido, $datos["correo"]);
                header("location: ../Registro-Inicio/login.php");
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
                        header("location: ../Registro-Inicio/login.php");
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

    function ConsultarUsuarios()
    {
        $ConsecutivoLogueado = $_SESSION["IdUsuario"];
        $respuesta = ConsultarUsuariosBD($ConsecutivoLogueado);

        if($respuesta -> num_rows > 0)
        {
            while ($row = mysqli_fetch_array($respuesta)) 
            { 
                echo "<tr>";
                echo "<td>" . $row["nombre"] . "</td>";
                echo "<td>" . $row["correo"] . "</td>";
                echo "<td>" . $row["NombreEstado"] . "</td>";
                echo "<td>" . $row["nombre_rol"] . "</td>";
                echo '<td>
                        <button type="button" class="btn btn-inverse-danger btn-md font-weight-medium btn-rounded AbrirModal" data-toggle="modal" data-target="#ModalUsuarios" 
                        data-id=' . $row["id_usuario"] . ' data-name="' . $row["nombre"] . '">
                            <label>Cambiar estado</label>
                            <i class="mdi mdi-pen"></i>
                        </button>

                        <a href="mostrarFacturas.php" class="btn btn-inverse-info btn-md font-weight-medium btn-rounded">
                            <label>Facturas</label>
                            <i class="mdi mdi-clipboard-text"></i>
                        </a>

                     </td>';
                echo "</tr>";
            }
        }
    }

    function ConsultarUsuario($Consecutivo)
    {
        $respuesta = ConsultarUsuarioBD($Consecutivo);
        if($respuesta -> num_rows > 0)
        {
            return mysqli_fetch_array($respuesta);
        }
    }

    if(isset($_POST["btnActualizarUsuario"]))
    {
        $IdUsuario = $_POST["txtIdUsuario"];
        $Nombre = $_POST["txtNombre"];
        $Correo = $_POST["txtCorreo"];
        $Username = $_POST["txtUsername"];

        $respuesta = ActualizarUsuario($IdUsuario,$Nombre,$Correo,$Username);
        if($respuesta == true)
                {
                    header("location: ../View/home.php");
                    $_SESSION["nombreUsuario"] = $Nombre;
                }
                else  
                {
                    $_POST["msj"] = "Su información no se ha registrado correctamente.";
                }
    }

    if(isset($_POST["btnCerrarSesion"]))
    {
        session_destroy();
        header("location: /Proyecto/View/Registro-Inicio/login.php");
    }

    if(isset($_POST["btnCambiarEstadoUsuario"]))
    {
        $Consecutivo = $_POST["IdUsuario"];
        $respuesta = CambiarEstadoUsuario($Consecutivo);

        if($respuesta == true)
        {
            header("location: ../Registro-Inicio/consultarUsuarios.php");
        }
        else
        {
            $_POST["msj"] = "No se ha podido inactivar la información del usuario.";
        }
    }

    function ValidarAdmin(){
        if($_SESSION["RolUsuario"] != 1) {
            header("location: /Proyecto/View/home.php");
        }
    }

?>