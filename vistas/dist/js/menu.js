$( document ).ready(function() {
    var nav = document.querySelector('nav');
 window.addEventListener('scroll', function(){
  if (window.pageYOffset > 0) {
       nav.classList.add('bg-light');
  } else {
     nav.classList.remove('bg-light');
     
  }
 })
 })