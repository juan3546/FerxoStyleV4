/* visualizar productos en la pagina de carrito */
if(localStorage.getItem("listaProductos") != null){
    var listaCarrito = JSON.parse(localStorage.getItem("listaProductos"));
    var rutaOculta = $("#rutaOculta").val();
    listaCarrito.forEach(functionForEach);

    function functionForEach(item, index){
        console.log("item", item);

        $(".mostrarCarrito").append(
                '<div class="ibox-content">' +
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
                                    '<a href="#" class="text-navy">'+
                                    item.producto+
                                    '</a>'+
                                    '</h3>'+

                                    '<dl class="small m-b-none">'+
                                        '<dt>Tallas</dt>'+
                                        '<dd>'+item.talla+'</dd>'+
                                    '</dl>'+

                                    '<div class="m-t-sm">'+
                                        '<a href="#" class="text-muted"><i class="fa fa-trash"></i> Eliminar Articulo</a>'+
                                    '</div>'+
                                '</td>'+

                                '<td>'+
                                    '$'+item.precio+'.00'+
                                    '<br>'+
                                    '<s class="small text-muted"><del>$'+item.oferta+'.00'+'</del> </s>'+
                                '</td>'+
                                '<td width="65">'+
                                    '<input type="text" class="form-control" placeholder="'+item.cantidad+'" values="'+item.cantidad+'">'+
                                '</td>'+
                                '<td>'+
                                    '<h4>'+
                                        item.precio+'.00'+
                                    '</h4>'+
                                '</td>'+
                            '</tr>'+
                            '</tbody>'+
                        '</table>'+
                    '</div>'+

                '</div>');
    }
}

/* agregar al carrito */

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