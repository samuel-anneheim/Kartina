const changeImage = (id, lien) => {
    document.getElementById(`${id}`).addEventListener('click', function () {
        document.getElementById('imagePrincipal').setAttribute('src', lien)
    });
}
changeImage('second1', './assets/img/article/mong-kok-minibus.jpg');
changeImage('second2', './assets/img/article/nicon-deco.png');

function mouv() {
    if (i == 0) {
        hauteur = document.getElementById('format').offsetHeight;
        document.getElementById('slide').style.maxHeight = `${hauteur}px`;
        document.getElementById('addProduct').style.visibility = "hidden";
    } else if (i == 1) {
        hauteur = document.getElementById('finition').offsetHeight;
        document.getElementById('slide').style.maxHeight = `${hauteur}px`;
        document.getElementById('addProduct').style.visibility = "hidden";
    }
    else if (i == 2) {
        hauteur = document.getElementById('cadre').offsetHeight;
        document.getElementById('slide').style.maxHeight = `${hauteur}px`;
        document.getElementById('addProduct').style.visibility = "visible";
    }
}

let previous = document.getElementById('previous');
let next = document.getElementById('next');
next.disabled = true
let i = 0;
let slide = document.getElementById('slide');

previous.addEventListener("click", function () {
    i--
    mouv();
    let str = i * 33.33
    if (i > 1) {
        previous.disabled = false
    } if (i < 2) {
        next.disabled = false
    } if (i == 0) {
        previous.disabled = true
    }
    if (i < 0) {
        i++
        previous.disabled = true
        return
    }
    slide.style.transform = `translateX(-${str}%)`
})

next.addEventListener("click", function () {
    i++
    mouv();
    let str = i * 33.33
    if (i == 2) {
        next.disabled = true;
    }
    if (i > 2) {
        i--
        next.disabled = true;
        return
    }
    if (i > 0) {
        previous.disabled = false;
    }
    slide.style.transform = `translateX(-${str}%)`
})
mouv();


/**
 * Transition 
 */

let formatTable = ["Classique", "Grand", "Géant", "Collector"];

for (const id of formatTable) {

    let element = document.getElementById(id);
    
    element.addEventListener('click', function () {

        next.disabled = false;
        
        let input = document.getElementById(`format-${id}`);
        for (const id of formatTable) {
            let imgrefresh = document.getElementById(`img-${id}`);
            imgrefresh.setAttribute('src', 'assets/img/article/check.png')
            let elementUncheck = document.getElementById(id);
            elementUncheck.classList.remove('checkIn');

            let inputValidation = document.getElementById(`format-${id}`);
            inputValidation.checked = false;
        }
        initial('v-Blackout');
        initial('v-Artshot');
        initial("v-Supportaluminium");
        initial('v-Supportaluminiumavecverreacrylique');
        initial('v-Tiragesurpapierphoto');



        /**
         * Changement du style de la div
         */
        input.checked = true;
        element.classList.add('checkIn');

        /**
         * Changer la couleur du ckeck
         */
        let img = document.getElementById(`img-${id}`);
        img.setAttribute('src', 'assets/img/article/checked.png')
        

        /**
         *  enlever les elements inutile au parcours d'achat
         */

        function invisible(id) {
            document.getElementById(id).style.display = "none";
        }
        function initial(id) {
            document.getElementById(id).style.display = "flex";
        }

        if (id == 'Classique') {
            console.log('c\'est bien classique');
            invisible("v-Supportaluminium");
            invisible('v-Supportaluminiumavecverreacrylique');
            invisible('v-Tiragesurpapierphoto');
        } else {
            console.log("cest dif de classique");
            invisible('v-Blackout');
            invisible('v-Artshot');
        }

        /**
         * Calcul des prix
         */
        let alu = document.getElementById('Supportaluminium');
        let aluVerre = document.getElementById('Supportaluminiumavecverreacrylique')
        let tirage = document.getElementById('Tiragesurpapierphoto')
        let ppNoir = document.getElementById('Blackout')
        let ppBlanc = document.getElementById('Artshot')
        
        input = input.dataset.prix;

        alu.innerHTML = Math.round(input * 2.6) + '€';
        aluVerre.innerHTML = Math.round(input * 3.35)+ '€';
        tirage.innerHTML = input+ '€';
        ppNoir.innerHTML = input+ '€';
        ppBlanc.innerHTML = Math.round(input * 1.4)+ '€';
    })
}
