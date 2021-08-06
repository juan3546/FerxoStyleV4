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

    $(".corrousel").owlCarousel({
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