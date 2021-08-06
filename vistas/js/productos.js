$(document).on("click", ".chkFiltro", function(){
    var categoria = $(this).attr("categoria");
    var genero = $(this).attr("genero");
    var avanzado = $(this).attr("avanzado");

    $(".product-layout").html("");
    
    if($(this).prop('checked')){
        
        if(genero != undefined){
            localStorage.setItem("genero", genero);
            
        }else if (categoria != undefined) {
            localStorage.setItem("categoria", categoria);
        }else if (avanzado != undefined) {
            localStorage.setItem("avanzado", avanzado);
        }
        
        // ajax
        
    }else{
        if(genero != undefined){
            localStorage.removeItem("genero");
        }else if (categoria != undefined) {
            localStorage.removeItem("categoria");
        }else if (avanzado != undefined) {
            localStorage.removeItem("avanzado");
        }

        // ajax
    }
});