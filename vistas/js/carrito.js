/* visualizar productos en la pagina de carrito */
if(localStorage.getItem("listaProductos") != null){
    var listaCarrito = JSON.parse(localStorage.getItem("listaProductos"));
    var rutaOculta = $("#rutaOculta").val();
    var html = '';
    var precio = 0;
    listaCarrito.forEach(functionForEach);

    function functionForEach(item, index){
        console.log("item", item);
        if(item.oferta != ""){
            precio = item.oferta;
        }else{
            precio = item.precio;
        }
        html += '<div class="ibox-content">' +
        '<div class="table-responsive">'+
            '<table class="table shoping-cart-table">'+
                '<tbody>'+
                '<tr>'+
                    '<td width="90">'+
                        '<div class="cart-product-imitation">'+
                            '<img class="img-fluid"  src="'+item.imagen+'" alt="">'+
                        '</div>'+
                    '</td>'+
                    '<td class="desc">'+
                        '<h3>'+
                        '<a href="#" class="text-navy productoCarrito">'+
                        item.producto+
                        '</a>'+
                        '</h3>'+

                        '<dl class="small m-b-none">'+
                            '<dt>Tallas</dt>'+
                            '<dd>'+item.talla+'</dd>'+
                        '</dl>'+

                        '<div class="m-t-sm">'+
                            '<a href="#" class="text-muted quitarItemCarrtio" idProducto='+item.idProducto+' precio="'+item.precio+'" oferta="'+item.oferta+'" talla="'+item.talla+'"><i class="fa fa-trash"></i> Eliminar Articulo</a>'+
                        '</div>'+
                    '</td>';
                    if(item.oferta != ""){
                        html += '<td>'+
                                '$'+item.oferta+'.00'+
                                '<br>'+
                                '<s class="small text-muted"><del>$'+item.precio+'.00'+'</del> </s>'+
                                '</td>';
                    }else{
                        html += '<td class="precioCarrito">'+
                                '$'+item.precio+'.00'+
                                '<br>'
                                '</td>';
                    }
                    html += '<td width="79">'+
                                '<input type="number" class="form-control cantidadCarrito" placeholder="'+item.cantidad+'" value="'+item.cantidad+'">'+
                            '</td>';
                    if(item.oferta != ""){
                        html += '<td>'+
                                    '<h4>'+
                                        '$'+item.oferta+'.00'+
                                    '</h4>'+
                                '</td>';
                    }else{
                        html += '<td>'+
                                    '<h4>'+
                                    '$'+item.precio+'.00'+
                                    '</h4>'+
                                '</td>';                    
                    }

                    html += '</tr>'+
                            '</tbody>'+
                        '</table>'+
                    '</div>'+

                '</div>'

        
    }
    $(".mostrarCarrito").append(html);
}else{
    $(".mostrarCarrito").html('<div class="alert alert-warning" role="alert">Aún no hay productos en el carrito de compras.</div>');
    $(".totalCarrito").hide();
    $(".generarPedido").hide();
}

/* agregar al carrito desde la card */

$(".botonCarrito").click(function(){
    var rutaOculta = $("#rutaOculta").val();
    var idProducto = $(this).attr("producto");
    var producto = $(this).attr("modelo");
    var precio = $(this).attr("precio");
    var oferta = $(this).attr("oferta");
    var imagen = $(this).attr("imagen");
    var talla = $('input[name="size1"]:checked').val();
    var agregarAlCarrito = false;


    
    if(talla == undefined){
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Debes seleccionar una talla',
            showConfirmButton: false,
            timer: 1500
          });
          agregarAlCarrito = false;
    }else{
        var listaProductos = JSON.parse(localStorage.getItem("listaProductos"));
        if(listaProductos != null){
            for(var i = 0; i < listaProductos.length; i++){

                if(listaProductos[i]["idProducto"] == idProducto && listaProductos[i]["talla"] == talla){
    
    
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'El producto ya está agregado al carrito de compras',
                        showConfirmButton: false,
                        timer: 1500
                      });
    
                    return;
    
                }else{
                    agregarAlCarrito = true;
                }
    
            }
        }else{
            agregarAlCarrito = true;
        }

        
    }
    


    /* se almacenan en localstorage los productos seleccionados al carrito */
    if(agregarAlCarrito){

        /* recuperar almacenamiento del localstorage  */
        if(localStorage.getItem("listaProductos") == null){
            listaCarrito = [];
        }else{
            listaCarrito.concat(localStorage.getItem("listaProductos"));
       
        }
        
        listaCarrito.push({"idProducto": idProducto,
                            "producto": producto,
                            "talla": talla,
                            "precio": precio,
                            "oferta": oferta,
                            "imagen": imagen,
                            "cantidad": "1"
                        });

        localStorage.setItem("listaProductos", JSON.stringify(listaCarrito));
        

       // $(this).find('input[type="size1"]').prop('checked','false');

       const radioTalla = document.querySelectorAll("input[type='radio'][name='size1']");
        
       radioTalla.forEach(radioTalla =>{
        if(radioTalla.checked === true){
            radioTalla.checked = false;
    
           }
       });

        
    }  

    /* mostrar alerta de que el producto ya fue agregado */
    Swal.fire({
        title: '',
        text: "¡Se ha agregado un nuevo producto al carrito de compras!",
        icon: 'success',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: '!continuar comprando!',
        confirmButtonText: '!Ir a mi carrito de compras!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location = rutaOculta + "carrito";
        }
      });
        

 

});


$(document).on("click", "#btnCarrito", function(){
    var rutaOculta = $("#rutaOculta").val();
    var idProducto = $(this).attr("producto");
    var producto = $(this).attr("modelo");
    var precio = $(this).attr("precio");
    var oferta = $(this).attr("oferta");
    var imagen = $(this).attr("imagen");
    var talla = $('#tallas').val();
    var agregarAlCarrito = false;



    if(talla == ""){
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Debes seleccionar una talla',
            showConfirmButton: false,
            timer: 1500
          });
          agregarAlCarrito = false;
    }else{
        var listaProductos = JSON.parse(localStorage.getItem("listaProductos"));
        if(listaProductos != null){
            for(var i = 0; i < listaProductos.length; i++){

                if(listaProductos[i]["idProducto"] == idProducto && listaProductos[i]["talla"] == talla){
    
    
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'El producto ya está agregado al carrito de compras',
                        showConfirmButton: false,
                        timer: 1500
                      });
    
                    return;
    
                }else{
                    agregarAlCarrito = true;
                }
    
            }
        }else{
            agregarAlCarrito = true;
        }

        
    }
    


    /* se almacenan en localstorage los productos seleccionados al carrito */
    if(agregarAlCarrito){

        /* recuperar almacenamiento del localstorage  */
        if(localStorage.getItem("listaProductos") == null){
            listaCarrito = [];
        }else{
            listaCarrito.concat(localStorage.getItem("listaProductos"));
       
        }
        
        listaCarrito.push({"idProducto": idProducto,
                            "producto": producto,
                            "talla": talla,
                            "precio": precio,
                            "oferta": oferta,
                            "imagen": imagen,
                            "cantidad": "1"
                        });

        localStorage.setItem("listaProductos", JSON.stringify(listaCarrito));
    }
    
    /* mostrar alerta de que el producto ya fue agregado */
    Swal.fire({
        title: '',
        text: "¡Se ha agregado un nuevo producto al carrito de compras!",
        icon: 'success',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: '!continuar comprando!',
        confirmButtonText: '!Ir a mi carrito de compras!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location = rutaOculta + "carrito";
        }
      });

});

/* quitar productos del carrito */
$(document).on("click", ".quitarItemCarrtio", function(){
    
    $(this).parent().parent().parent().remove()

    
    var idProducto = $(".mostrarCarrito .quitarItemCarrtio");
    var imagen = $(".mostrarCarrito img");
    var producto = $(".mostrarCarrito .productoCarrito");
    var cantidad = $(".mostrarCarrito .cantidadCarrito");

    /* Si aun quedan productos volver agregar al carrito */
   
    listaCarrito = [];
 
    if(idProducto.length != 0){
        for (let i = 0; i < idProducto.length; i++) {
            var idProductoArray = $(idProducto[i]).attr("idProducto");
            var precioArray = $(idProducto[i]).attr("precio");
            var ofertaArray = $(idProducto[i]).attr("oferta");
            var tallaArray = $(idProducto[i]).attr("talla");
            var productoArray = $(producto[i]).html();
            var cantidadArray = $(cantidad[i]).val();
            var imagenArray = $(imagen[i]).attr("src");

            listaCarrito.push({"idProducto": idProductoArray,
                                "producto": productoArray,
                                "talla": tallaArray,
                                "precio": precioArray,
                                "oferta": ofertaArray,
                                "imagen": imagenArray,
                                "cantidad": cantidadArray
            });
            
        }
        localStorage.setItem("listaProductos", JSON.stringify(listaCarrito));

    }else{
        /* sino quedan productos se borra todo */
        localStorage.removeItem("listaProductos");

        $(".mostrarCarrito").html('<div class="alert alert-warning" role="alert">Aún no hay productos en el carrito de compras.</div>');

        $(".totalCarrito").hide();
        $(".generarPedido").hide();
    }
});