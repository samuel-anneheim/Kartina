const changeImage = (id, lien) => {
    document.getElementById(`${id}`).addEventListener('click', function(){document.getElementById('imagePrincipal').setAttribute('src', lien)});
}
changeImage('second1', './assets/img/article/mong-kok-minibus.jpg');
changeImage('second2', './assets/img/article/nicon-deco.png');

let previous = document.getElementById('previous');
let next = document.getElementById('next');
let i = 0;
let slide = document.getElementById('slide');


previous.addEventListener("click", function () {
    
    i--
    let str = i * 33.33
    slide.style.transform= `translateX(-${str}%)`
    if (i > 1){
        previous.disabled = false
    }else if (i == 3){
        next.disabled = true
    }

    console.log(slide.style.transform);
})

next.addEventListener("click",function (){

    i++
    let str = i * 33.33
    slide.style.transform = `translateX(-${str}%)`
    if (i > 1 ){
        previous.disabled = false;

    }
    console.log(slide.style.transform);

} )

