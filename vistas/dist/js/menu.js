/*
var menuItems = document.getElementById("menu-items");
menuItems.style.maxHeight = "0px";


$(document).on("click",".icono-menu", function(){
    if(menuItems.style.maxHeight == "0px"){
        menuItems.style.maxHeight = "295px";
    }else{
        menuItems.style.maxHeight = "0px";
    }
});

*/
window.addEventListener('scroll',function(){

<<<<<<< HEAD
    var header = document.querySelector('.navbar');
    header.classList.toggle ('sticky', window.scrollY > 0 );
=======
   var header = document.querySelector('.scrol');
   header.classList.toggle ('sticky', window.scrollY > 0 );
>>>>>>> parent of a16285e (borrado de archivos)

});

$(window).on('scroll', function(){
<<<<<<< HEAD
    
});

function toggleMune() {
    var menuToggle = document.querySelector('.toggle');
    var menu = document.querySelector('.menu-items');
    menuToggle.classList.toggle('active');
    menu.classList.toggle('menu');
=======
   
});

function toggleMune() {
   var menuToggle = document.querySelector('.toggle');
   var menu = document.querySelector('.menu-items');
   menuToggle.classList.toggle('active');
   menu.classList.toggle('menu');
>>>>>>> parent of a16285e (borrado de archivos)
}

