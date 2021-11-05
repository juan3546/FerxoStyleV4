$(document).ready(function(){
    
    $(".owl-carousel").owlCarousel({
        autoplay: true,
        autoplayhoverpause: true,
        autoplaytimeout: 50,
        items: 3,
        nav: true,
        loop: true,
        lazyLoad: true,
        margin: 5,
        padding: 5,
        stagePadding: 5,
        responsive: {
            0 : {
                items: 1,
                docts: false
            },

            485: {
                items: 2,
                docts: false
            },
            728: {
                items: 3,
                docts: false
            },
            960: {
                items: 4,
                docts: false
            },
            1200: {
                items: 5,
                docts: true
            }
        }

    });
    
});



$(document).on("click","#cnNinio", function(){
    window.location = "articulos-para-ninios";
});

$(document).on("click", "#cnHombre", function(){
    window.location = "articulos-para-hombre";
});

$(document).on("click", "#cnMujer", function(){
    window.location = "articulos-para-mujeres";
});

$(document).on("click", ".botonH", function(){
    var rutaOculta = $("#rutaOculta").val();
    window.location = rutaOculta+"articulos-para-hombre/1/Personalizados";
});




let items = document.querySelectorAll('.carousel .carousel-item')
 console.log(items)
items.forEach((el) => {
    const minPerSlide = 4
    let next = el.nextElementSibling
    for (var i=1; i<minPerSlide; i++) {
        if (!next) {
            // wrap carousel by using first child
        	next = items[0]
      	}
        let cloneChild = next.cloneNode(true)
        el.appendChild(cloneChild.children[0])
        next = next.nextElementSibling
    }
})


window.onload = function(){
    $('#onload').fadeOut();
    $('body').removeClass('hidden');
}