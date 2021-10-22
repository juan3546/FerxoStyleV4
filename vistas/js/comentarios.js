$(document).on("click", "#btnComentario", function(){
    var comentario = $("#txtComentario").val();
    //var producto = $("#btnPedido").attr("producto");
    var rutaOculta = $("#rutaOculta").val();
    var servidorOculta = $("#rutaOcultaServidor").val();
    var cliente = $(this).attr("cl");
    var producto = $(this).attr("producto");
    
    if(cliente == ""){
        Swal.fire({
            icon: 'error',
            title: 'Debe iniciar sesión para comentar.',
            text: '',
            footer: ''
        });  
    }
    if(document.getElementById("txtComentario").value.trim()==""){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Escriba un comentario en el campo.',
            footer: ''
        });
    }else{
        var datos = new FormData();
        datos.append("insertarComentario", "");
        datos.append("comentario", comentario);
        datos.append("producto", producto);
        datos.append("cliente", cliente);
    
         $.ajax({
            url: rutaOculta+"ajax/comentario.ajax.php",
            method:"POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success:function(respuesta){
                var codigoHtml = '';
                if(respuesta == "ErrorSesion" || cliente == ""){
                    Swal.fire({
                        icon: 'error',
                        title: 'Debe iniciar sesión para comentar.',
                        text: '',
                        footer: ''
                    });   
                }else{
                    location.reload();

                    
                    $("#txtComentario").val(" ");
                    for (let i = 0; i < respuesta.length; i++) {
                        
                        codigoHtml += '<div class="card p-3 mb-2 mt-3">';
                        codigoHtml += '<div class="d-flex flex-row"> <img src="'+servidorOculta+respuesta[i]["foto"]+'" height="40" width="40" class="rounded-circle">';
                        codigoHtml += '<div class="d-flex flex-column ms-2">';
                        codigoHtml += '<h6 class="mb-1 text-primary">'+respuesta[i]["usuario"]+'</h6>';
                        codigoHtml += '<p class="comment-text">';
                        codigoHtml += respuesta[i]["comentario"];
                        codigoHtml += '</p>';
                        codigoHtml += '</div>';    
                        codigoHtml += '</div>';
                        codigoHtml += '<div class="d-flex justify-content-end">';
                        codigoHtml += '<div class="d-flex flex-row"> <span class="text-muted fw-normal fs-10">'+respuesta[i]["fecha"]+'</span> </div>';
                        codigoHtml += '</div>';
                        codigoHtml += '</div>';
                        
                    }
                    $(".mostComentario").append(codigoHtml);
                    
 
                  //  console.log("respuesta",respuesta);
                }
                
            }
    
        });
    }


});