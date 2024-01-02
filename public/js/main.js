// jquaryforstickyheader--------------------->

window.addEventListener("scroll",function(){
  var header = this.document.querySelector("header");
  header.classList.toggle('sticky', window.scrollY > 0);
});

// jquaryfordropdownmenu---------------------->
$(document).ready(function(){
$('.sub-btn').click(function(){
  $(this).next('.sub-menu').slideToggle();
  $(this).find('.dropdown').toggleClass('rotate');
});

// jqueryforsidbarcloseandactive----------------------->
$('.menu-btn').click(function(){
$('.side-bar').addClass('active');
});

$('.close-btn').click(function(){
  $('.side-bar').removeClass('active');
  });
});
// ----------------------------*------------------->
// -----------------------searchbox------------------->


// -----------------------searchbox------------------->

// jqueryfor-cart-closeandactive----------------------->

const openBtn = document.getElementById('open_cart_btn')
const cart = document.getElementById('sidecart')
const closeBtn = document.getElementById('close_btn')


openBtn.addEventListener('click', openCart)
closeBtn.addEventListener('click', closeCart)


function openCart(){
  cart.classList.add('open')
}
function closeCart(){
  cart.classList.remove('open')
}



// jqueryfor-cart-closeandactive----------------------->





const carousel = document.querySelector(".carousel");
const arrowBtns = document.querySelectorAll (".wrapper i");
const firstCardWidth = document.querySelector(".card").offsetWidth;


let isDragging = false, startX, startScrollLeft;

const dragStart = (e) =>{
  isDragging = true;
  carousel.classList.add("dragging");
  startX = e.pageX;
  startScrollLeft = carousel.scrollLeft;
}

arrowBtns.forEach(btn => {
  btn.addEventListener("click", () =>{
    carousel.scrollLeft += btn.id === "left" ? -firstCardWidth : firstCardWidth; 
  });
});





const dragging = (e) => {
  if(!isDragging )return;     //if isDragging is false return here
  carousel.scrollLeft = startScrollLeft - (e.pageX - startX);
}

const dragStop = () => {
  isDragging = false;
  carousel.classList.remove("dragging");
}

carousel .addEventListener("mousedown", dragStart);
carousel .addEventListener("mousemove", dragging);
document .addEventListener("mouseup", dragStop);

// productbladejs--------------------------------------->

// productbladejs--------------------------------------->


  