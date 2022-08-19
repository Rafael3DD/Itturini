
const debounce = function(func, wait, immediate) {
    let timeout;
    return function(...args) {
      const context = this;
      const later = function () {
        timeout = null;
        if (!immediate) func.apply(context, args);
      };
      const callNow = immediate && !timeout;
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
      if (callNow) func.apply(context, args);
    };
  };

const elementos = document.querySelectorAll('[data-anima]'); //seleciona o data da animação

const textoapresenta = document.getElementById('texto-apresentacao'); //texto apresentação
var posicaotexto = textoapresenta.getBoundingClientRect();



//texto-animado

//Remove a animação em dispositivo mobile
if(window.screen.width < 1024){
    for(i =0; i< elementos.length; i++){
       // console.log(document.querySelectorAll('[data-anima="topDown"]')[i].removeAttribute('data-anima'))
        document.querySelectorAll('[data-anima="topDown"]')[i].style.opacity = "1"
        document.querySelectorAll('[data-anima="topDown"]')[i].style.transform = "translate3d(0,0,0)" 
    } 
}


const animacaoClass = 'animacao'; //seleciona de animação do css
iconeZap = document.getElementById('iconeZap');

function animaScroll(){
    const windowTop = window.pageYOffset;
    
    if(windowTop >=1250){
        textoapresenta.style.display = "block"
    }
    
    if(windowTop > iconeZap.offsetTop + ((window.innerHeight+300)/3)){
        iconeZap.style.opacity = "1"; //Mostra botão
    }else{
        iconeZap.style.opacity = "0"; //Esconde botão
    }

  
    elementos.forEach(function (elemento){
        
        if((windowTop) > elemento.offsetTop - (window.innerHeight*3)/4 ){
            elemento.classList.add(animacaoClass); //Adiciona a classe de animação
        }else{
            elemento.classList.remove(animacaoClass); //Remove a classe de animação
        }

    })
}


if(elementos.length >0){ //Verifica se existe o elemento data-anima na página / Evita ficar rodando no site
    window.addEventListener('scroll',debounce(()=>{//Chama a função toda vez que rola o scroll
        animaScroll();       
    },50))
}



