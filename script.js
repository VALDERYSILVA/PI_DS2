// deslizando pagina home

let count = 1;
document.getElementById("radio1").checked = true;

setInterval(function () {
  nextImage();
}, 4000)

function nextImage() {
  count++;
  if (count > 4) {
    count = 1;
  }

  document.getElementById("radio" + count).checked = true;

}

// pagina sobre

window.sr = ScrollReveal({ reset: true });

sr.reveal('#container-sobre', {
  rotate: { x: 0, y: 80, z: 0 },
  duration: 2000
});

//testo "assine" piscando

var assine = 0;
setInterval(piscar, 400);
function piscar() {
  if (assine < 1) {
    assine++;
    document.getElementById('piscando').style.opacity = '1';
  } else {
    assine = 0;
    document.getElementById('piscando').style.opacity = '0';
  }
};

