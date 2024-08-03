<?php include_once __DIR__ . '/../Model/proveedorModel.php';

      include_once 'comunController.php';
      
    if(session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    function ConsultarUsuario($Consecutivo)
    {
        $respuesta = ConsultarUsuarioBD($Consecutivo);
        if($respuesta -> num_rows > 0)
        {
            return mysqli_fetch_array($respuesta);
        }
    }

    function ConsultarProveedores()
    {
        $respuesta = ConsultarProveedoresDB();
        if($respuesta -> num_rows > 0)
        {
            echo '<a href="agregarProveedor.php">
                    <button type="submit" id="btnRegistrarProveedor" name="btnRegistrarProveedor" class="btn btn-block btn-outline-primary btn-md font-weight-bold auth-form-btn">
                        Agregar Proveedor
                    </button>
                </a>';
            echo'<br/>';
            while ($row = mysqli_fetch_array($respuesta)) 
            { 
                echo "<tr>";
                echo "<td>" . $row["id_proveedor"] . "</td>";
                echo "<td>" . $row["descripcion"] . "</td>";
                echo '<td>
                        <a href="editarProveedor.php?q=' . $row["id_proveedor"] . '" class="btn btn-outline-dark mx-1">
                            <i class="mdi mdi-table-edit"></i>
                        </a>
                     </td>';
                echo "</tr>";
            }
        }
    }

    function ConsultarProveedor($idProveedor)
    {
        $respuesta = ConsultarProveedorDB($idProveedor);
        if($respuesta -> num_rows > 0)
        {
            return mysqli_fetch_array($respuesta);
        }
    }

    if (isset($_POST["btnAgregarProveedor"])) {
        $Descripcion = $_POST["txtDescripcion"];
        $respuesta = RegistrarProveedores($Descripcion);
        if ($respuesta == true) {
            header("Location: ../Modulo-Productos/proveedores.php");
            exit();
        }
    }

    if (isset($_POST["btnEditarProveedor"])) {
        $idProveedor = $_POST["txtIdProveedor"];
        $Descripcion = $_POST["txtDescripcionProveedor"];
        $respuesta = ActualizarProveedor($idProveedor, $Descripcion);
        if ($respuesta == true) {
            header("Location: ../Modulo-Productos/proveedores.php");
            exit();
        }
    }

    function ValidarAdmin(){
        if($_SESSION["RolUsuario"] != 1) {
            header("location: /Proyecto/View/home.php");
        }
    }

?>