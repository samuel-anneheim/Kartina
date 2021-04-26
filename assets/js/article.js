const changeImage = (id, lien) => {
    document.getElementById(`${id}`).addEventListener('click', function(){document.getElementById('imagePrincipal').setAttribute('src', lien)});
}
changeImage('second1', './assets/img/article/mong-kok-minibus.jpg');
changeImage('second2', './assets/img/article/nicon-deco.png');

function mouv(){
    if (i == 0) {
        hauteur = document.getElementById('format').offsetHeight;
        document.getElementById('slide').style.maxHeight = `${hauteur}px`;
        document.getElementById('addProduct').style.visibility = "hidden";
    }else if (i == 1){
        hauteur = document.getElementById('finition').offsetHeight;
        document.getElementById('slide').style.maxHeight = `${hauteur}px`;
        document.getElementById('addProduct').style.visibility = "hidden";
    }
    else if(i == 2){
        hauteur = document.getElementById('cadre').offsetHeight;
        document.getElementById('slide').style.maxHeight = `${hauteur}px`;
        document.getElementById('addProduct').style.visibility = "visible";
    }
}

let previous = document.getElementById('previous');
let next = document.getElementById('next');
let i = 0;
let slide = document.getElementById('slide');


previous.addEventListener("click", function () {
    i--
    mouv();
    let str = i * 33.33
    if (i > 1){
        previous.disabled = false
    }if(i < 2 ){
        next.disabled = false
    }if (i == 0) {
        previous.disabled= true
    }
    if (i < 0){
        i++
        previous.disabled= true
        return
    }
    slide.style.transform= `translateX(-${str}%)`

    console.log(i);
})

next.addEventListener("click",function (){

    i++
    mouv();
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

mouv();



let test = document.querySelector('input[value="Collector"]');
test = test.dataset.prix;
console.log(test);


let formatTable = ["Classique", "Grand", "Géant", "Collector"];

for (const id of formatTable) {
    console.log(id);
    let element = document.getElementById(id);
    let input = document.getElementById(`format-${id}`);

    element.addEventListener('click',function () {

        /**
         * Changement du style de la div
         */
        input.checked = true;
        console.log(element);
        element.style.background = 'blue';

        /**
         *  enlever les elements inutile au parcours d'achat
         */

        function invisible(id) {
            document.getElementById(id).style.display = "none";
        }

        if (id == 'Classique') {
            console.log('c\'est bien classique');
            invisible("v-Supportaluminium");
            invisible('v-Supportaluminiumavecverreacrylique');
            invisible('v-Tiragesurpapierphoto');
        }else {
            console.log("cest dif de classique");
            invisible('v-Blackout');
            invisible('v-Artshot');
        }

        /**
         * Calcul des prix
         */
        let alu = document.getElementById('Supportaluminium');
        input = input.dataset.prix;
        alu.innerHTML = Math.round(input * 2.6)+'€';
    }) 
}
