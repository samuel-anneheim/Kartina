let formatTable = {
    "Classique": "classique.png",
    "Grand": "grand.png",
    "Géant": "geant.png",
    "Collector": "collector.png"
};

let finitionTable = {
    "Supportaluminium": 2.6,
    "Supportaluminiumavecverreacrylique": 3.35,
    "Artshot": 1.4,
    "Tiragesurpapierphoto": 1,
    "Blackout": 1
};

let finitionTableBg = {
    "Supportaluminium": "aluminium.jpeg",
    "Supportaluminiumavecverreacrylique": "acrylique.jpeg",
    "Artshot": 'artshot.jpeg',
    "Tiragesurpapierphoto": "papier.jpeg",
    "Blackout": "blackout.jpeg",
}

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

let cadreTableBg = {
    'Sansencadrement': "sansEncad.jpeg",
    'Encadrementnoirsatin': "encadNoirSatin.jpeg",
    "Encadrementblancsatin": "encaBlancSatin.jpeg",
    'Encadrementnoyer': "encaNoyer.jpeg",
    'Encadrementchêne': "encaChene.jpeg",
    'Aluminumnoir': "aluNoir.jpeg",
    'Boisblanc': "boisBlanc.jpeg",
    'Acajoumat': "acajouMat.jpeg",
    'Aluminiumbrossé': "aluBrosse.jpeg",
}

function mouv() {
    if (i == 0) {
        hauteur = document.getElementById('format').offsetHeight;
        document.getElementById('slide').style.maxHeight = `${hauteur}px`;
        document.getElementById('addProduct').style.display = "none";
    } else if (i == 1) {
        hauteur = document.getElementById('finition').offsetHeight;
        document.getElementById('slide').style.maxHeight = `${hauteur}px`;
        document.getElementById('addProduct').style.display = "none";
    }
    else if (i == 2) {
        hauteur = document.getElementById('cadre').offsetHeight;
        document.getElementById('slide').style.maxHeight = `${hauteur}px`;
        document.getElementById('addProduct').style.display = "flex";
        document.getElementById('addProduct').disabled = true;
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
let bgFormat = document.getElementById('bg-format');
let bgFinition = document.getElementById('bg-finition');
let imgPrince2 = document.getElementById('image-principal-big-border');
let bgCadre = document.getElementById('bg-cadre');
let borderImgPrin = document.getElementById('image-decor-big-border');
let borderImg = document.getElementById('image-decor-min-border-size');

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
        bgFinition.style.background = "";
        document.getElementById('sFi').innerHTML = '2';
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
        bgCadre.style.background = "";
        document.getElementById('sC').innerHTML = '3';
        borderImg.style.border = `none`;
        borderImgPrin.style.border = `none`;
        imgPrince2.style.border = `none`
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

for (const id in formatTable) {

    let element = document.getElementById(id);

    element.addEventListener('click', function () {

        next.disabled = false;

        for (const id in formatTable) {
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
         * Changer la miniature en fonctionde la taille
         */

        let imgSuperMin = document.getElementById('image-decor-min-border-size');
        if (id == 'Classique') {
            imgSuperMin.style.height = '20%'
        }
        if (id == 'Grand') {
            imgSuperMin.style.height = '30%'
        }
        if (id == 'Géant') {
            imgSuperMin.style.height = '40%'
        }
        if (id == 'Collector') {
            imgSuperMin.style.height = '55%'
        }

        let imgSuper = document.getElementById('image-decor-big-border')
        if (id == 'Classique') {
            imgSuper.style.height = '20%'
        }
        if (id == 'Grand') {
            imgSuper.style.height = '30%'
        }
        if (id == 'Géant') {
            imgSuper.style.height = '40%'
        }
        if (id == 'Collector') {
            imgSuper.style.height = '55%'
        }


        /**
         * Changer la couleur du ckeck
         */
        let img = document.getElementById(`img-${id}`);
        img.setAttribute('src', 'assets/img/article/checked.png');

        /**
         * Mettre le bg au cercle
         */
        for (const i in formatTable) {
            if (id == i) {
                bgFormat.style.background = `URL('assets/img/format/${formatTable[i]}')center no-repeat, #fff`;
                bgFormat.style.backgroundSize = '90%';
                document.getElementById('sF').innerHTML = ''
            }
        }


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

                for (const i in finitionTableBg) {
                    if (name == i) {
                        bgFinition.style.background = `URL('assets/img/finition/${finitionTableBg[i]}')center no-repeat`;
                        bgFinition.style.backgroundSize = 'cover';
                        document.getElementById('sFi').innerHTML = ''
                    }
                }

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
                         * Gestion des cadres
                         */
                        function Transform_border(el, color) {
                            if (name == el) {
                                borderImg.style.border = `ridge 3px ${color}`;
                                borderImgPrin.style.border = `ridge 6px ${color}`;
                                imgPrince2.style.border = `ridge 8px ${color}`;
                            }
                        }
                        if (name == 'Sansencadrement' ) {
                            borderImg.style.border = `none`;
                            borderImgPrin.style.border = `none`;
                            imgPrince2.style.border = `none`;
                        }

                        Transform_border('Encadrementnoirsatin', '#1E1D21');
                        Transform_border("Encadrementblancsatin", '#E5E7E8');
                        Transform_border('Encadrementnoyer', '#8B6852');
                        Transform_border('Encadrementchêne', '#D3C1A9');
                        Transform_border('Aluminumnoir', '#181214');
                        Transform_border('Boisblanc', '#E8E8E8');
                        Transform_border('Acajoumat', "#785137");
                        Transform_border('Aluminiumbrossé', '#D3CDCB');



                        /**
                        * Changement du style de la div
                        */
                        let input = document.getElementById(`input-${name}`);
                        input.checked = true;
                        element.classList.add('checkIn');
                        document.getElementById('addProduct').disabled = false;

                        /**
                         * Changer la couleur du ckeck
                         */
                        let img = document.getElementById(`img-${name}`);
                        img.setAttribute('src', 'assets/img/article/checked.png');

                        let spanAnt = parseInt(document.getElementById(`p-${name}`).dataset.prix);
                        price3 = spanAnt + '.00€';
                        price.innerHTML = price3;

                        for (const i in cadreTableBg) {
                            if (name == i) {
                                bgCadre.style.background = `URL('assets/img/cadre/${cadreTableBg[i]}')center no-repeat, #fff`;
                                bgCadre.style.backgroundSize = '95%';
                                document.getElementById('sC').innerHTML = ''
                            }
                        }

                    })
                }
            })
        }
    })
}