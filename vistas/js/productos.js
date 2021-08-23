/* Filtrado por nombre de Hombres*/
$(document).on("keyup", "#txtArticulosHombre", function(ev){

    var producto = $(this).val();
    var rutaOculta = $("#rutaOculta").val();
    var rutaOcultaServidor = $("#rutaOcultaServidor").val();
    var teclaPulsada = ev.keyCode;

    //if(producto == '' && teclaPulsada != 20 || teclaPulsada != 16 || teclaPulsada != 17 || teclaPulsada != 18 || teclaPulsada != 40 || teclaPulsada != 39 || teclaPulsada != 38 || teclaPulsada != 39){
    if(producto == ''){
        window.location = rutaOculta+"articulos-para-hombre/1";
    }else{
        var datos = new FormData();
        datos.append("MostrarProductoHombre", "");
        datos.append("producto", producto);
         $.ajax({
            url: rutaOculta+"ajax/productos.ajax.php",
            method:"POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success:function(respuesta){
                var codigoHtml = '';
                if(respuesta){
                    for (let i = 0; i < respuesta.length; i++) {
                        $(".mostrarProductoHombre").html("");
                        codigoHtml += '<div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">';
                        codigoHtml += '<div class="card-sl h-100">';
                        codigoHtml += '<div class="card-image">';
                        codigoHtml += '<img src="'+rutaOcultaServidor+respuesta[i]["foto"]+'" />';
                        codigoHtml += '</div>';
                        codigoHtml += '<a class="card-action" href="#"><i class="fas fa-cart-plus"></i></a>';
                        codigoHtml += '<div class="card-heading">';
                        codigoHtml += respuesta[i]["nombre"];
                        codigoHtml += '</div>';
                        codigoHtml += '<div class="card-text">';
                        if(respuesta[i]["descripcion"] != null){
                            codigoHtml += respuesta[i]["descripcion"];
                        } 
                        codigoHtml += '</div>';
                        codigoHtml += '<div class="card-text">';
                        if(respuesta[i]["precioOferta"] != null){
                            codigoHtml += '<del>$'+respuesta[i]["precio"]+' </del> &nbsp;&nbsp; $'+respuesta[i]["precioOferta"]+'';
                        }else{
                            codigoHtml += '$'+respuesta[i]["precio"];
                        }
                        codigoHtml += ' </div>';
                        codigoHtml += '<a href="#" class="card-button"> Solicitar pedido</a>';
                        codigoHtml += '</div>';
                        codigoHtml += '</div>';
                    }
                    $(".mostrarProductoHombre").append(codigoHtml);
    
    
                }
    
            }
    
        });
    }

});

/* Filtrado por nombre de Mujeres*/
$(document).on("keyup", "#txtArticulosMujeres", function(){

    var producto = $(this).val();
    var rutaOculta = $("#rutaOculta").val();
    var rutaOcultaServidor = $("#rutaOcultaServidor").val();
 
    if(producto == ''){
        window.location = rutaOculta+"articulos-para-mujeres/1";
    }else{
        var datos = new FormData();
        datos.append("MostrarProductoMujer", "");
        datos.append("producto", producto);
         $.ajax({
            url: rutaOculta+"ajax/productos.ajax.php",
            method:"POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success:function(respuesta){
                var codigoHtml = '';
                
                if(respuesta){
                    
                    for (let i = 0; i < respuesta.length; i++) {
                        
                        $(".pagination").html("");
                        $(".mostrarProductoMujeres").html("");
                        codigoHtml += '<div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">';
                        codigoHtml += '<div class="card-sl h-100">';
                        codigoHtml += '<div class="card-image">';
                        codigoHtml += '<img src="'+rutaOcultaServidor+respuesta[i]["foto"]+'" />';
                        codigoHtml += '</div>';
                        codigoHtml += '<a class="card-action" href="#"><i class="fas fa-cart-plus"></i></a>';
                        codigoHtml += '<div class="card-heading">';
                        codigoHtml += respuesta[i]["nombre"];
                        codigoHtml += '</div>';
                        codigoHtml += '<div class="card-text">';
                        if(respuesta[i]["descripcion"] != null){
                            codigoHtml += respuesta[i]["descripcion"];
                        } 
                        codigoHtml += '</div>';
                        codigoHtml += '<div class="card-text">';
                        if(respuesta[i]["precioOferta"] != null){
                            codigoHtml += '<del>$'+respuesta[i]["precio"]+' </del> &nbsp;&nbsp; $'+respuesta[i]["precioOferta"]+'';
                        }else{
                            codigoHtml += '$'+respuesta[i]["precio"];
                        }
                        codigoHtml += ' </div>';
                        codigoHtml += '<a href="#" class="card-button"> Solicitar pedido</a>';
                        codigoHtml += '</div>';
                        codigoHtml += '</div>';
                    }
                    $(".mostrarProductoMujeres").append(codigoHtml);
    
    
                }
    
            }
    
        });
    }

});

/* Filtrado por nombre de Niños*/
$(document).on("keyup", "#txtArticulosInfante", function(){

    var producto = $(this).val();
    var rutaOculta = $("#rutaOculta").val();
    var rutaOcultaServidor = $("#rutaOcultaServidor").val();

    if(producto == ''){
        window.location = rutaOculta+"articulos-para-ninios/1";
    }else{
        var datos = new FormData();
        datos.append("MostrarProductoInfante", "");
        datos.append("producto", producto);
         $.ajax({
            url: rutaOculta+"ajax/productos.ajax.php",
            method:"POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success:function(respuesta){
                var codigoHtml = '';
                if(respuesta){
                    for (let i = 0; i < respuesta.length; i++) {
                        $(".mostrarProductoInfante").html("");
                        $(".pagination").html("");
                        codigoHtml += '<div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">';
                        codigoHtml += '<div class="card-sl h-100">';
                        codigoHtml += '<div class="card-image">';
                        codigoHtml += '<img src="'+rutaOcultaServidor+respuesta[i]["foto"]+'" />';
                        codigoHtml += '</div>';
                        codigoHtml += '<a class="card-action" href="#"><i class="fas fa-cart-plus"></i></a>';
                        codigoHtml += '<div class="card-heading">';
                        codigoHtml += respuesta[i]["nombre"];
                        codigoHtml += '</div>';
                        codigoHtml += '<div class="card-text">';
                        if(respuesta[i]["descripcion"] != null){
                            codigoHtml += respuesta[i]["descripcion"];
                        } 
                        codigoHtml += '</div>';
                        codigoHtml += '<div class="card-text">';
                        if(respuesta[i]["precioOferta"] != null){
                            codigoHtml += '<del>$'+respuesta[i]["precio"]+' </del> &nbsp;&nbsp; $'+respuesta[i]["precioOferta"]+'';
                        }else{
                            codigoHtml += '$'+respuesta[i]["precio"];
                        }
                        codigoHtml += ' </div>';
                        codigoHtml += '<a href="#" class="card-button"> Solicitar pedido</a>';
                        codigoHtml += '</div>';
                        codigoHtml += '</div>';
                    }
                    $(".mostrarProductoInfante").append(codigoHtml);
    
    
                }
    
            }
    
        });
    }

});


/* enviar llave prmaria a detalle*/
$(document).on("click", ".cursor", function(){
    var rutaOculta = $("#rutaOculta").val();
    var producto = $(this).attr("producto");
    window.location = rutaOculta+"detalle-del-producto/"+producto;
});


/* REVISAR SI HAN INICIADO SESION */

$(document).on("click", ".card-action", function(){
    var rutaOculta = $("#rutaOculta").val();
    var usu = $(this).attr("id");
    /*
    var datos = new FormData();
    datos.append("revisarSession", "");
     $.ajax({
        url: rutaOculta+"ajax/productos.ajax.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success:function(respuesta){
            */
            if(usu != "ok"){
                Swal.fire({
                    title: 'Debes de iniciar sesión',
                    showClass: {
                      popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                      popup: 'animate__animated animate__fadeOutUp'
                    }
                  });
            }
/*
        }

    });
    */
});