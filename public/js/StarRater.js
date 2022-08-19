class StarRater extends HTMLElement{
    constructor(){
        super();
        this.build(); 
    }
    build(){
        const shadow = this.attachShadow({mode: 'open'})
        shadow.appendChild(this.styles())
        const rater = this.createRater();
        this.stars = this.createStars();
        this.stars.forEach( star =>rater.appendChild(star))  
        this.resetRating();
        shadow.appendChild(rater)
       
    }

    createRater(){
        const rater = document.createElement('div');
        rater.classList.add('star-rater');
        rater.addEventListener('mouseout', this.resetRating.bind(this))
        
        return rater;
    }

    createStars(){
        
        const createStar = (_, id)=>{
            const star = document.createElement('span');
            star.classList.add('star')
            star.setAttribute('data-value', Number(id)+1)

            star.innerHTML = '&#9733;';
            star.addEventListener('click', this.setRating.bind(this))
            star.addEventListener('mouseover', this.ratingHover.bind(this))

            star.addEventListener('click', this.setval.bind(this))

            return star; 

        }
        
        return Array.from({ length: 5 }, createStar)
    }

    resetRating(){ //reseta valor
        this.currentRatingValue = this.getAttribute('data-rating') || 0
        this.hightlightRating();
    }
    setRating(event){ //Seta valor
        this.setAttribute('data-rating', event.currentTarget.getAttribute('data-value'))
        
    }
    
    setval(event){
       const valEstrela = event.currentTarget.getAttribute('data-value');
       const valcodigo = this.getAttribute('data-id');
       //console.log(event.currentTarget.getAttribute('data-value'))//pega o valor da estrela
       //console.log(this.getAttribute('data-id') )//pega id

       $.ajax({
        method: "POST",
        url: "/avaliacao",
        data: { estrela: valEstrela, codigo:valcodigo}
       })
       
    }

    ratingHover(event){
        this.currentRatingValue = event.currentTarget.getAttribute('data-value');
        this.hightlightRating();
     
    }

    hightlightRating(){ //Modifica a cor das estrelas
        this.stars.forEach(star => {
            star.style.color = this.currentRatingValue >= star.getAttribute('data-value')
            ? '#F9CF48' 
            : 'gray'
        });
    }

    styles(){
    const style = document.createElement('style')
    style.textContent = `
    .star{
        font-size:25px;
        cursor:pointer;
        transition: 0.2s
    }`
    return style;
    }
}

customElements.define('star-rater', StarRater);