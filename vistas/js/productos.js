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
                        codigoHtml += '<div class="card card2">';
                        codigoHtml += '<div class="img-container">';
                        codigoHtml += '<div class="d-flex justify-content-between align-items-center p-2 first">';
                        if(rutaOcultaServidor+respuesta[i]["estado"] == "Nuevo"){
                            codigoHtml += '<span class="percent">Nuevo</span>';
                        }else if(rutaOcultaServidor+respuesta[i]["estado"] == "Oferta"){
                            codigoHtml += '<span class="ofert">Oferta</span>';
                        }
                        codigoHtml += '</div>';
                        
                        codigoHtml += '<img src="'+rutaOcultaServidor+respuesta[i]["foto"]+'" class="img-fluid" />';
                        codigoHtml += '</div>';
                        codigoHtml += '<div class="product-detail-container">';
                        codigoHtml += '<div class="d-flex justify-content-between align-items-center">';
                        codigoHtml += '<h6 class="mb-0">'+respuesta[i]["nombre"]+'</h6> ';
                        codigoHtml += '<span class="text-danger font-weight-bold">';
                        if(respuesta[i]["precioOferta"] != null){
                            codigoHtml += '<del>$'+respuesta[i]["precio"]+' </del> &nbsp;&nbsp; $'+respuesta[i]["precioOferta"]+'';
                        }else{
                            codigoHtml += '$'+respuesta[i]["precio"];
                        }
                        codigoHtml += '</span>';
                        codigoHtml += '</div>';
                        codigoHtml += '<div class="d-flex justify-content-between align-items-center mt-2">';
                        codigoHtml += '<div class="size"> ';

                        
                        
                        //MOSTRAR LAS TALLAS DEL ARTICULO

                        //tallas(respuesta[i]["id"]);
                        //codigoHtml += '<span>'+i+'</span>';
                        
                        var datosTalla = new FormData();

                        datosTalla.append("tallas", "");
                        datosTalla.append("articulo", respuesta[i]["id"]);
                         $.ajax({
                            url: rutaOculta+"ajax/productos.ajax.php",
                            method:"POST",
                            data: datosTalla,
                            cache: false,
                            contentType: false,
                            processData: false,
                            dataType: "json",
                            success:function(respuestaTalla){
                                var codigoHtmlTalla = '';
                                $(".size").html("");
                                for (let i = 0; i < respuestaTalla.length; i++) {
                                    
                                    codigoHtmlTalla += '<label class="radio">';
                                    codigoHtmlTalla += '<input type="radio" name="size1" value="small"> ';
                                    codigoHtmlTalla += '<span>'+respuestaTalla[i]["talla"]+'</span>';
                                    codigoHtmlTalla += '</label> ';
                                    
                                }
                                $(".size").append(codigoHtmlTalla);
                                
                    
                    
                            }
                    
                        });

                        //codigoHtml += '<span>15</span> </label> ';
                        
                        codigoHtml += '</div>';
                        codigoHtml += '</div>';
                        codigoHtml += '<div class="mt-3"> <button class="btn btn-block form-control botonCarrito text-white" >Agregar a carrito</button> </div>';
                        codigoHtml += '</div>';
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

function tallas(articulo){
    var rutaOculta = $("#rutaOculta").val();
    var datos = new FormData();
    datos.append("tallas", "");
    datos.append("articulo", articulo);
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
            for (let i = 0; i < respuesta.length; i++) {
                //codigoHtml += '<input type="radio" name="size1" value="small"> '; 
                codigoHtml += '';
                codigoHtml += '';
                codigoHtml += '<span>'+respuesta[i]["talla"]+'</span>';
                codigoHtml += '';
            }


        }

    });
    
}


/* enviar llave prmaria a detalle*/
$(document).on("click", ".cursor", function(){
    var rutaOculta = $("#rutaOculta").val();
    var producto = $(this).attr("producto");
    window.location = rutaOculta+"detalle-del-producto/"+producto;
});


/* REVISAR SI HAN INICIADO SESION */

$(document).on("click", ".botonCarrito", function(){
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