/* visualizar productos en la pagina de carrito */
if(localStorage.getItem("listaProductos") != null){
    var listaCarrito = JSON.parse(localStorage.getItem("listaProductos"));
    var rutaOculta = $("#rutaOculta").val();
    var html = '';
    var precio = 0;
    listaCarrito.forEach(functionForEach);

    function functionForEach(item, index){
        
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
                            '<dd class="tallasItem">'+item.talla+'</dd>'+
                        '</dl>'+

                        '<div class="m-t-sm">'+
                            '<a href="#" class="text-muted quitarItemCarrtio" idProducto='+item.idProducto+' precio="'+item.precio+'" oferta="'+item.oferta+'" talla="'+item.talla+'"><i class="fa fa-trash"></i> Eliminar Articulo</a>'+
                        '</div>'+
                    '</td>';
                    if(item.oferta != ""){
                        html += '<td class="precioCarrito">'+
                                '$<span>'+item.oferta+'</span> .00'+
                                '<br>'+
                                '<s class="small text-muted"><del>$'+item.precio+'.00'+'</del> </s>'+
                                '</td>';
                    }else{
                        html += '<td class="precioCarrito">'+
                                '$ <span>'+item.precio+'</span> .00'+
                                '<br>'
                                '</td>';
                    }
                    html += '<td width="79">'+
                                '<input type="number" class="form-control cantidadCarrito" precio="'+precio+'" idProducto='+item.idProducto+' talla='+item.talla+' placeholder="'+item.cantidad+'" value="'+item.cantidad+'">'+
                            '</td>';
                    if(item.oferta != ""){
                        html += '<td class="subtotal'+item.idProducto+item.talla+' subtotales">'+
                                    '<h4>'+
                                        '$<span class="preciaProducto">'+item.oferta+'</span>.00'+
                                    '</h4>'+
                                '</td>';
                    }else{
                        html += '<td class="subtotal'+item.idProducto+item.talla+' subtotales">'+
                                    '<h4>'+
                                    '$<span class="preciaProducto">'+item.precio+'</span>.00'+
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
$(document).on("click", ".botonCarrito", function(){
//$(".botonCarrito").click(function(){
    var rutaOculta = $("#rutaOculta").val();
    var idProducto = $(this).attr("producto");
    var producto = $(this).attr("modelo");
    var precio = $(this).attr("precio");
    var oferta = $(this).attr("oferta");
    var imagen = $(this).attr("imagen");
    var talla = $('input[name="size1"]:checked').val();
    var agregarAlCarrito = false;


    
    if((talla == undefined) || (talla =='')){
        Swal.fire({
            position: 'center',
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
                        position: 'center',
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
    }  

   
  
        

 

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
                        position: 'center',
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
    
    $(this).parent().parent().parent().parent().remove()

    
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
        sumaTotal();

    }else{
        /* sino quedan productos se borra todo */
        localStorage.removeItem("listaProductos");

        $(".mostrarCarrito").html('<div class="alert alert-warning" role="alert">Aún no hay productos en el carrito de compras.</div>');

        $(".totalCarrito").hide();
        $(".generarPedido").hide();
    }
});

$(".cantidadCarrito").change(function(){

    var cantidad = $(this).val();
    var precio  = $(this).attr("precio");
    var idProducto  = $(this).attr("idProducto");
    var talla  = $(this).attr("talla");

    $(".subtotal"+idProducto+talla).html('<h4>$<span class="preciaProducto">'+(cantidad*precio)+'</span>.00</h4>');



    
    /* actualizar la cantidad en localStorage */

    var idProducto = $(".mostrarCarrito .quitarItemCarrtio");
    var imagen = $(".mostrarCarrito img");
    var producto = $(".mostrarCarrito .productoCarrito");
    var cantidad = $(".mostrarCarrito .cantidadCarrito");

    listaCarrito = [];

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
    sumaTotal();
    
});

/* Actualizar subtotal */

var precioCarritoCompra = $(".mostrarCarrito .precioCarrito span");
var cantidadItem = $(".mostrarCarrito .cantidadCarrito"); 


for (let i = 0; i < precioCarritoCompra.length; i++) {
    var precioCarritoArray = $(precioCarritoCompra[i]).html();
    var cantidadItemArray = $(cantidadItem[i]).val();
    var idProductoArray = $(cantidadItem[i]).attr("idProducto");
    var tallasItemArray = $(cantidadItem[i]).attr("talla");


    $(".subtotal"+idProductoArray+tallasItemArray).html('<h4>$<span class="preciaProducto">'+(precioCarritoArray * cantidadItemArray)+'</span>.00</h4>');
    sumaTotal();
}


/* Suma de todos los subtotales */
function sumaTotal(){
    var subtotales = $(".subtotales .preciaProducto");

    var arraySumaSubtotales = [];

    for (let i = 0; i < subtotales.length; i++) {

        var sumatotalArray = $(subtotales[i]).html(); 
        arraySumaSubtotales.push(Number(sumatotalArray));
    }

   

    function sumaArrayTotales(total, numero){
        
        return total + numero;
    }

    var sumatotal = arraySumaSubtotales.reduce(sumaArrayTotales);

    $(".totalPedido").html('$'+sumatotal+'.00');
    
}


$(document).on("click", ".generarPedido", function(){

    var productos = localStorage.getItem("listaProductos");
    var usu = $("#usuariocr").val();
    var ses = $("#iniciar").val();

    console.log(ses);

    if(ses != "ok"){
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Debes Iniciar sesión para solicitar pedido',
            showConfirmButton: false,
            timer: 1700
          });
    }else{
        const jsonProduntos = productos; // JSON.stringify(productos);

        var datos = new FormData();
        datos.append("jsonProductos", jsonProduntos);
        datos.append("usuario", usu);
    
    
        $.ajax({
            url: rutaOculta+"ajax/carrito.ajax.php",
            method:"POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success:function(respuesta){
                $('#btnCarritoPdf').modal('show');
                $("#mostrarPedidopdf").attr("data", rutaOculta+"ajax/pedidos.pdf.php?pedido="+respuesta+"&pdf="+usu);
                localStorage.removeItem("listaProductos");
                $(".mostrarCarrito").html('');
                $(".mostrarCarrito").html('<div class="alert alert-warning" role="alert">Aún no hay productos en el carrito de compras.</div>');
                $(".totalPedido").html('$0.00');
            }
        });
    }

});

