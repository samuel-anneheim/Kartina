document.getElementById('validation').addEventListener('click', function() {
    let f = document.formulaire;
    let i = 0;

    if (f.lastname.value == '') {
        f.lastname.style = "border: 2px solid red";
    } else {
        f.lastname.style = "border: 2px solid green";
        i += 1;
    }
    if (f.firstname.value == '') {
        f.firstname.style = "border: 2px solid red";
    } else {
        f.firstname.style = "border: 2px solid green";
        i += 1;
    }
    if (f.email.value == '') {
        f.email.style = "border: 2px solid red";
    } else {
        f.email.style = "border: 2px solid green";
        i += 1;
    }

    if (f.phone.value == '') {
        f.phone.style = "border: 2px solid red";
    } else {
        f.phone.style = "border: 2px solid green";
        i += 1;
    }
    
    if (i == 4) {
        f.v.style.display = "none";
        f.send.style.display = "block";
        f.send.style = "border: 2px solid green";
    } else {
        alert ("Votre formulaire n'est pas complet.");
    }
});