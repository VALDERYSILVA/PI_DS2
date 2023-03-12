// deslizando pagina home

let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 5000); // 5 segundos
}

// pagina sobre

window.sr = ScrollReveal({ reset: true });

sr.reveal('#container-sobre', {
  rotate: {x: 0, y: 80, z: 0},
  duration: 2000
});

//testo piscando

var teste = 0;
 setInterval(piscar, 400);
 function piscar(){
	if(teste<1){
	  teste++;
	  document.getElementById('piscando').style.opacity = '1';
	} else{
	  teste = 0; 
	  document.getElementById('piscando').style.opacity = '0';
	}};