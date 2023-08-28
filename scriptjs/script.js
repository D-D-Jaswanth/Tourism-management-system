window.addEventListener("scroll", function(){
    var header = document.querySelector("header");
    header.classList.toggle("sticky", window.scrollY > 0);
})


var swiper = new Swiper(".home-slider", {
    loop:true,
    grabCursor:true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
});




/* ==================== Menu Items ================= */


let homelinks = document.querySelector('header .home-links');
document.querySelector('.menu').onclick = () =>{
  homelinks.classList.add('active');
}

document.querySelector('.close').onclick = () =>{
  homelinks.classList.remove('active');
}
