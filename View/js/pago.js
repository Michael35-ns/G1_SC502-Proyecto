function IniciarPago()
{ 

  $.ajax({
    type : 'POST',
    url : '../../Controller/carritoController.php',
    dataType : 'text',
    data: {
      "PagarCarrito" : "FUNCION"
    },
    success: function(respuesta){
    console.log(respuesta);
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
        window.location.href = '/Proyecto/View/home.php';
    }
});
}