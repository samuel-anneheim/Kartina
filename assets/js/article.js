const changeImage = (id, lien) => {
    document.getElementById(`${id}`).addEventListener('click', function(){document.getElementById('imagePrincipal').setAttribute('src', lien)});
}
changeImage('second1', './assets/img/article/mong-kok-minibus.jpg');
changeImage('second2', './assets/img/article/nicon-deco.png');

function titi (){
    if (i == 0) {
        hauteur = document.getElementById('format').offsetHeight;
        document.getElementById('slide').style.maxHeight = `${hauteur}px`;
    }else if (i == 1){
        hauteur = document.getElementById('finition').offsetHeight;
        document.getElementById('slide').style.maxHeight = `${hauteur}px`;
    }
    else if(i == 2){
        hauteur = document.getElementById('cadre').offsetHeight;
        document.getElementById('slide').style.maxHeight = `${hauteur}px`;
    }
}

let previous = document.getElementById('previous');
let next = document.getElementById('next');
let i = 0;
let slide = document.getElementById('slide');


previous.addEventListener("click", function () {
    i--
    titi();
    let str = i * 33.33
    if (i > 1){
        previous.disabled = false
    }if(i < 2 ){
        next.disabled = false
    }if (i == 0) {
        previous.disabled= true
    }
    if (i < 0){
        previous.disabled= true
        return
    }
    slide.style.transform= `translateX(-${str}%)`

    console.log(i);
})

next.addEventListener("click",function (){

    i++
    titi();
    let str = i * 33.33
    if (i == 2){
        next.disabled = true;
    }
    if (i > 2) {
        i--
        next.disabled = true;
        return
    }
    if (i > 0 ){
        previous.disabled = false;
        
    }
    slide.style.transform = `translateX(-${str}%)`
    console.log(i);
    
} )

titi();

