<?php include_once '../Model/usuarioModel.php';

  if (isset($_POST["btnRegistrarUsuario"])) 
  {
    $Nombre = $_POST["txtNombre"];
    $Email = $_POST["txtEmail"];
    $Password = $_POST["txtPassword"];
    $Username = $_POST["txtUsername"];
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


