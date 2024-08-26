<?php include_once __DIR__ . '/../Model/proveedorModel.php';

      include_once 'comunController.php';
      
    if(session_status() === PHP_SESSION_NONE) {
        session_start();
    }


    function ConsultarProveedores()
    {
        $respuesta = ConsultarProveedoresDB();
        if($respuesta -> num_rows > 0)
        {
            echo '<a href="agregarProveedor.php">
                    <button type="submit" id="btnRegistrarProveedor" name="btnRegistrarProveedor" class="btn btn-inverse-info btn-md font-weight-medium btn-rounded" style="margin-bottom: 20px;">
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
                        <button type="button" class="btn btn-inverse-warning btn-md font-weight-medium btn-rounded AbrirModal" data-toggle="modal" data-target="#ModalProveedores" 
                        data-id=' . $row["id_proveedor"] . ' data-name="' . $row["descripcion"] . '">
                            <label>Editar</label>
                            <i class="mdi mdi-pen"></i>
                        </button>
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

    if (isset($_POST["btnCambiarDescripcionProveedor"])) {
        $idProveedor = $_POST["txtIdProveedor"];
        $Descripcion = $_POST["txtIdNuevaDescripcion"];
        $respuesta = ActualizarProveedor($idProveedor, $Descripcion);
        if ($respuesta == true) {
            header("Location: ../Modulo-Productos/proveedores.php");
            exit();
        }
    }
?>