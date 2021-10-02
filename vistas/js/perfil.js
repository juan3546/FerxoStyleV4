/*=============================================
SUBIENDO LA FOTO DEL CLIENTE
=============================================*/

$(".foto").change(function(){
	var imagen = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/
	
  	if(  imagen["type"] != "image/jpeg" &&   imagen["type"] != "image/png"){
  		$(".foto").val("");

  		 Swal.fire({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      icon: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(imagen["size"] > 2000000){

  		$(".foto").val("");

  		 Swal.fire({
		      title: "Error al subir la imagen",
		      text: "¡La imagen no debe pesar más de 2MB!",
		      icon: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagen);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;

  			$(".previsualizar").attr("src", rutaImagen);

  		});

  	}
});

$(document).on("click", ".btnViewPedidoPdf", function(){
    var pedido = $(this).attr("pedido");
	var pdf = $(this).attr("pdf");
    var rutaOculta = $("#rutaOculta").val();

  
    $("#mostrarPerfilpdf").attr("data", rutaOculta+"ajax/pedidos.pdf.php?pedido="+pedido+"&pdf="+pdf);
  });

  $(document).on("click", ".cerrarPerfilPdf", function(){
	  location.reload();
  });