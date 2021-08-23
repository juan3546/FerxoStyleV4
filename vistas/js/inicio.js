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
//   all ------------------
function initParadoxWay() {
    "use strict";
   
    if ($(".testimonials-carousel").length > 0) {
        var j2 = new Swiper(".testimonials-carousel .swiper-container", {
            preloadImages: false,
            slidesPerView: 1,
            spaceBetween: 10,
            loop: true,
            grabCursor: true,
            mousewheel: false,
            centeredSlides: true,
            pagination: {
                el: '.tc-pagination',
                clickable: true,
                dynamicBullets: true,
            },
            navigation: {
                nextEl: '.listing-carousel-button-next',
                prevEl: '.listing-carousel-button-prev',
            },
            breakpoints: {
                1024: {
                    slidesPerView: 3,
                },
                
            }
        });
    }
    
// bubbles -----------------
    
    
    setInterval(function () {
        // var size = randomValue(sArray);
        $('.bubbles').append('<div class="individual-bubble" style="left: ' + 20 + 'px; width: ' + 20 + 'px; height:' + 20 + 'px;"></div>');
        $('.individual-bubble').animate({
            'bottom': '100%',
            'opacity': '-=0.7'
        }, 4000, function () {
            $(this).remove()
        });
    }, 350);
    
}

//   Init All ------------------
$(document).ready(function () {
    initParadoxWay();
});