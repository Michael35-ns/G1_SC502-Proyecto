function SoloNumeros(e) {
    var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode;
  
    if (keyCode >= 48 && keyCode <= 57) {
      return true;
    }

    return false;
  }

  function SoloMontos(e, elemento)
  {
    let valor = elemento.value;
    let keyCode = e.keyCode == 0 ? e.charCode : e.keyCode;
  
    if (keyCode >= 48 && keyCode <= 57) {
      return true;
    }
    else if(keyCode == 46){
        //el indexOf valida si un caracter se encuentra en un string = -1 es que no existe
        if(valor.indexOf(".") == -1){ 
            return true;
        }
    }

    return false;
  }

  function AnnadirProducto(idProducto, cantidad)
  { 
    let cantidadIngresada = $("#prd-" + idProducto).val();

    if(cantidadIngresada > cantidad)
    {
      MostrarMensaje("Información","Debe ingresar una cantidad inferior al inventario", "info");
      return;
    }
    
    if(cantidadIngresada <= 0)
    {
      MostrarMensaje("Información","Debe ingresar una cantidad válida", "info");
      return;
    }

    $.ajax({
      type : 'POST',
      url : '../../Controller/carritoController.php',
      dataType : 'text',
      data: {
        "RegistrarCarrito" : "FUNCION",
        "IdProducto" : idProducto,
        "Cantidad": cantidadIngresada
      },
      success: function(respuesta){
        MostrarMensajeRecarga("Confirmación",respuesta, "success");
      }
  });  

  }

  function MostrarMensaje(titulo, mensaje, icono)
  {
    Swal.fire({
      title: titulo,
      text: mensaje,
      icon: icono
    });
  }

  function MostrarMensajeRecarga(titulo, mensaje, icono)
  {
    Swal.fire({
      title: titulo,
      showDenyButton: false,
      showCancelButton: false,
      confirmButtonText: "Aceptar",
      text: mensaje,
      icon: icono
  }).then((result) => {
      if (result.isConfirmed) {
          window.location.reload();
      }
  });
  }