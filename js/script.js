//swiper 1
var swiper = new Swiper(".mySwiperHeader", {
      slidesPerView: 1,
      centeredSlides: true,
      loop: true,
      spaceBetween: 30,
      grabCursor: true,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",

    }
  });

//opiniones
var reviewsSwiper = new Swiper(".reviews-slider", {
  loop:true,
  spaceBetween: 20,  
  autoHeight: true,   
  grabCursor: true,    
  breakpoints: {
    640: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 3,
    },
  },
});

//preguntas frecuentes
document.querySelectorAll('.contact .row .faq .box h3 ').forEach(faqBox => {
  faqBox.onclick = () =>{
     faqBox.parentElement.classList.toggle('active');
  }
});


//destinos
let loadMoreBtn = document.querySelector('.packages2 .load-more .btn');
let currentItem = 3; 

loadMoreBtn.onclick = () => {
  let boxes = document.querySelectorAll('.packages2 .box-container .box'); 
  for (let i = currentItem; i < currentItem + 3; i++) { //el indice inicia en 3
      boxes[i].style.display = 'inline-block';

    };
    currentItem += 3;  // Incrementar el contador para el próximo conjunto de elementos a mostrar

    if(currentItem >= boxes.length){// Verificar si se han mostrado todos los elementos disponibles
      loadMoreBtn.style.display = 'none';
    }
}

