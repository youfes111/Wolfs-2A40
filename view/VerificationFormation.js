function validateForm() {
    let idlangue = document.getElementById('idlangue').value.trim();
    let iduser = document.getElementById('iduser').value.trim();
    let idniveau = document.getElementById('idniveau').value.trim();
    let duree = document.getElementById('duree').value.trim();
  

    let isValid = true;

    // Validation pour l'ID du partenaire
    if (idlangue === '') {
        isValid = false;
        setErrorFor(document.getElementById('idlangue'), 'ID formation  ne doit pas etre vide');
    } else if(!/^[A-Z][a-zA-Z0-9]{3}$/.test(idlangue)) {
        isValid = false;

        setErrorFor(document.getElementById('idlangue'), 'ID formation doit commencer par une lettre majuscule et être exactement de 4 caractères');

    }
    else{
        setSuccessFor(document.getElementById('idlangue'));
    }

    // Validation pour le nom du partenaire
    if (iduser === '') {
        isValid = false;
        setErrorFor(document.getElementById('iduser'), 'Nom formation ne doit pas etre vide');

    } else if(!/^[A-Z][a-zA-Z0-9]{3}$/.test(iduser)){
        isValid = false;
        setErrorFor(document.getElementById('iduser'), 'Nom formation doit contenir uniquement des lettres et ne pas dépasser 30 caractères');
    }
    else{
        setSuccessFor(document.getElementById('iduser'));

    }
    // Validation pour le pays
   
    if (idniveau === '') {
        isValid = false;
        setErrorFor(document.getElementById('idniveau'), 'Nom formation ne doit pas etre vide');

    } else if(!/^[A-Z][a-zA-Z0-9]{3}$/.test(idniveau)){
        isValid = false;
        setErrorFor(document.getElementById('idniveau'), 'Nom formation doit contenir uniquement des lettres et ne pas dépasser 30 caractères');
    }
    else{
        setSuccessFor(document.getElementById('idniveau'));

    }
    // Validation pour la ville
    if (duree === '') {
        isValid = false;
        setErrorFor(document.getElementById('duree'), 'Duree ne doit pas etre vide');
    } else if (isNaN(duree) || parseInt(duree) < 0 || parseInt(duree) > 6  ) {
        isValid = false;
        setErrorFor(document.getElementById('duree'), 'Duree doit être un nombre numérique inférieur ou égal à 6');
    } else {
        setSuccessFor(document.getElementById('duree'));
    }

   /* // Validation pour l'email du partenaire
    if (emailpart === '') {
        isValid = false;
        setErrorFor(document.getElementById('emailpart'), 'Email partenaire ne peut pas être vide');
    } else if (!isValidEmail(emailpart)) {
        isValid = false;
        setErrorFor(document.getElementById('emailpart'), 'Email partenaire invalide');
    } else {
        setSuccessFor(document.getElementById('emailpart'));
    }
*/
    
    return isValid;
}

function setErrorFor(input, message) {
    let formControl = input.parentElement;
    let small = formControl.querySelector('small');
    formControl.className = 'form-control error';
    small.innerText = message;
}

function setSuccessFor(input) {
    let formControl = input.parentElement;
    formControl.className = 'form-control success';
}

