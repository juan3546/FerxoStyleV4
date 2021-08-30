/* agregar al carrito */
if(localStorage.getItem("listaProductos") != null){
    var listaCarrito = JSON.parse(localStorage.getItem("listaProductos"));
}

$(".botonCarrito").click(function(){
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
        

 

});


$(document).on("click", "#btnCarrito", function(){

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

});