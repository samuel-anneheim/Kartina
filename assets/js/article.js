const changeImage = (id, lien) => {
    document.getElementById(`${id}`).addEventListener('click', function () {
        document.getElementById('imagePrincipal').setAttribute('src', lien)
    });
}
changeImage('second1', './assets/img/article/mong-kok-minibus.jpg');
changeImage('second2', './assets/img/article/nicon-deco.png');

let formatTable = [
    "Classique",
    "Grand",
    "Géant",
    "Collector"
];

let finitionTable = {
    "Supportaluminium": 2.6,
    "Supportaluminiumavecverreacrylique": 3.35,
    "Artshot": 1.4,
    "Tiragesurpapierphoto": 1,
    "Blackout": 1
};

let cadreTable = {
    'Sansencadrement': 1,
    'Encadrementnoirsatin': 1.45,
    "Encadrementblancsatin": 1.45,
    'Encadrementnoyer': 1.45,
    'Encadrementchêne': 1.45,
    'Aluminumnoir': 1,
    'Boisblanc': 1,
    'Acajoumat': 1,
    'Aluminiumbrossé': 1,
}

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
let price = document.getElementById('price');
let price1;
let price2;
let price3;

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
        price.innerHTML = price1
        for (const el in finitionTable) {
            let imgrefresh = document.getElementById(`img-${el}`);
            imgrefresh.setAttribute('src', 'assets/img/article/check.png')
    
            let elementUncheck = document.getElementById(el);
            elementUncheck.classList.remove('checkIn');
    
            let inputValidation = document.getElementById(`input-${el}`);
            inputValidation.checked = false;
        }
    }
    if (i == 1) {
        price.innerHTML = price2;
        for (const el in cadreTable) {
            let imgrefresh = document.getElementById(`img-${el}`);
            imgrefresh.setAttribute('src', 'assets/img/article/check.png')
    
            let elementUncheck = document.getElementById(el);
            elementUncheck.classList.remove('checkIn');
    
            let inputValidation = document.getElementById(`input-${el}`);
            inputValidation.checked = false;
        }
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
    next.disabled = true;
})
mouv();


/**
 * Transition 
 */
function invisible(id) {
    document.getElementById(id).style.display = "none";
}
function initial(id) {
    document.getElementById(id).style.display = "flex";
}

for (const id of formatTable) {

    let element = document.getElementById(id);

    element.addEventListener('click', function () {

        next.disabled = false;

        for (const id of formatTable) {
            let imgrefresh = document.getElementById(`img-${id}`);
            imgrefresh.setAttribute('src', 'assets/img/article/check.png')
            let elementUncheck = document.getElementById(id);
            elementUncheck.classList.remove('checkIn');
            let inputValidation = document.getElementById(`input-${id}`);
            inputValidation.checked = false;
        }

        for (const el in finitionTable) {
            initial(el)
        }

        /**
         * Changement du style de la div
         */
        let input = document.getElementById(`input-${id}`);
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
        if (id == 'Classique') {
            invisible("Supportaluminium");
            invisible('Supportaluminiumavecverreacrylique');
            invisible('Tiragesurpapierphoto');
        } else {
            invisible('Blackout');
            invisible('Artshot');
        }

        /**
         * Calcul des prix
         */
        let spanAnt = parseInt(document.getElementById(`p-${id}`).dataset.prix);
        price1 = spanAnt + '.00€';
        price.innerHTML = price1

        for (const el in finitionTable) {
            let span = document.getElementById(`p-${el}`);
            span.innerHTML = Math.round(spanAnt * finitionTable[el]) + '€';
            span.dataset.prix = Math.round(spanAnt * finitionTable[el]) + '€';
        }

        for (const name in finitionTable) {

            let element = document.getElementById(name);

            element.addEventListener("click", function () {

                next.disabled = false;
                for (const el in finitionTable) {
                    let imgrefresh = document.getElementById(`img-${el}`);
                    imgrefresh.setAttribute('src', 'assets/img/article/check.png')

                    let elementUncheck = document.getElementById(el);
                    elementUncheck.classList.remove('checkIn');

                    let inputValidation = document.getElementById(`input-${el}`);
                    inputValidation.checked = false;
                }

                for (const el in cadreTable) {
                    initial(el)
                }

                /**
                * Changement du style de la div
                */
                let input = document.getElementById(`input-${name}`);
                input.checked = true;
                element.classList.add('checkIn');

                /**
                 * Changer la couleur du ckeck
                 */
                let img = document.getElementById(`img-${name}`);
                img.setAttribute('src', 'assets/img/article/checked.png');

                /**
                *  enlever les elements inutile au parcours d'achat
                */
                if ((name == 'Artshot') || (name == 'Blackout')) {
                    invisible('Sansencadrement');
                    invisible('Encadrementnoirsatin');
                    invisible("Encadrementblancsatin");
                    invisible('Encadrementnoyer');
                    invisible('Encadrementchêne');
                } else if ((name == 'Supportaluminium') || (name == 'Supportaluminiumavecverreacrylique')) {
                    invisible('Aluminumnoir');
                    invisible('Boisblanc');
                    invisible('Acajoumat');
                    invisible('Aluminiumbrossé');
                } else if (name == "Tiragesurpapierphoto") {
                    invisible('Encadrementnoirsatin');
                    invisible("Encadrementblancsatin");
                    invisible('Encadrementnoyer');
                    invisible('Encadrementchêne');
                    invisible('Aluminumnoir');
                    invisible('Boisblanc');
                    invisible('Acajoumat');
                    invisible('Aluminiumbrossé');
                }

                /**
                 * calcul des prix
                 */
                let spanAnt = parseInt(document.getElementById(`p-${name}`).dataset.prix);
                price2 = spanAnt + '.00€';
                price.innerHTML = price2

                for (const el in cadreTable) {
                    let span = document.getElementById(`p-${el}`);
                    span.innerHTML = Math.round(spanAnt * cadreTable[el]) + '€';
                    span.dataset.prix = Math.round(spanAnt * cadreTable[el]) + '€';
                }

                for (const name in cadreTable) {
                    let element = document.getElementById(name);

                    element.addEventListener('click', function () {

                        for (const el in cadreTable) {
                            let imgrefresh = document.getElementById(`img-${el}`);
                            imgrefresh.setAttribute('src', 'assets/img/article/check.png')

                            let elementUncheck = document.getElementById(el);
                            elementUncheck.classList.remove('checkIn');

                            let inputValidation = document.getElementById(`input-${el}`);
                            inputValidation.checked = false;
                        }

                        /**
                        * Changement du style de la div
                        */
                        let input = document.getElementById(`input-${name}`);
                        input.checked = true;
                        element.classList.add('checkIn');

                        /**
                         * Changer la couleur du ckeck
                         */
                        let img = document.getElementById(`img-${name}`);
                        img.setAttribute('src', 'assets/img/article/checked.png');

                        let spanAnt = parseInt(document.getElementById(`p-${name}`).dataset.prix);
                        price3 = spanAnt + '.00€';
                        price.innerHTML = price3

                    })
                }
            })
        }

    })
}