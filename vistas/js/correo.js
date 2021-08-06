$(document).on("click", ".btnWhatsApp", function(){
    window.open("https://api.whatsapp.com/send?phone=4451196663");

});

$(document).on("click", ".btnInstagram", function(){
    window.open("https://instagram.com/ferxo_style?utm_medium=copy_link");
});

$(".fotoCorreo").change(function(){
    var imagen = this.files[0];
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

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

            $(".previsualizar").append('<div class="carousel-item img-1 min-vh-100"><img src="'+rutaImagen+'" class="d-block w-100 " alt="..."></div>');

            

        });
      }
});

$(document).ready(function(){

    // Modal

    $(".modal").on("click", function (e) {
        console.log(e);
        if (($(e.target).hasClass("modal-main") || $(e.target).hasClass("close-modal")) && $("#loading").css("display") == "none") {
            closeModal();
        }
    });

    // -> Modal

    // Abrir el inspector de archivos
    
    $(document).on("click", "#add-photo", function(){
        $("#add-new-photo").click();
    });
    
    // -> Abrir el inspector de archivos

    // Cachamos el evento change
    
    $(document).on("change", "#add-new-photo", function () {
    
        console.log(this.files);
        var files = this.files;
        var element;
        var supportedImages = ["image/jpeg", "image/png", "image/gif"];
        var seEncontraronElementoNoValidos = false;

        for (var i = 0; i < files.length; i++) {
            element = files[i];
            
            if (supportedImages.indexOf(element.type) != -1) {
                createPreview(element);
            }
            else {
                seEncontraronElementoNoValidos = true;
            }
        }

        if (seEncontraronElementoNoValidos) {
            showMessage("Se encontraron archivos no validos.");
        }
        else {
            showMessage("Todos los archivos se subieron correctamente.");
        }
    
    });
    
    // -> Cachamos el evento change

    // Eliminar previsualizaciones
    
    $(document).on("click", ".image-container", function(e){
        $(this).parent().remove();
    });
    
    // -> Eliminar previsualizaciones

});

//Genera las previsualizaciones
function createPreview(file) {
    var imgCodified = URL.createObjectURL(file);
    var img = $('<div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-xs-12"><div class="image-container"> <figure> <img src="' + imgCodified + '" alt="Foto del usuario" height = "200" width = "200" class="figure-img img-fluid rounded"> <figcaption> <i class="icon-cross"></i> </figcaption> </figure> </div></div>');
    $(img).insertBefore("#add-photo-container");
}