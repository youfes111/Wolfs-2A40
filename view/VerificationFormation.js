function validateForm() {
    let idformation = document.getElementById('idformation').value.trim();
    let langue= document.getElementById('langue').value.trim();
    let niveau = document.getElementById('niveau').value.trim();
    let date_de_debut= document.getElementById('date_de_debut').value.trim();
  
    let date_de_fin = document.getElementById('date_de_fin').value.trim();
    let duree = document.getElementById('duree').value.trim();
    let prix = document.getElementById('prix').value.trim();
    let titre = document.getElementById('titre').value.trim();
    let description = document.getElementById('description').value.trim();
  
    let isValid = true;

    // Validation pour l'ID du partenaire
    if (idformation === '') {
        isValid = false;
        setErrorFor(document.getElementById('idformation'), 'ID formation  ne doit pas etre vide');
    } else if(!/^[A-Z][a-zA-Z0-9]{3}$/.test(idformation)) {
        isValid = false;

        setErrorFor(document.getElementById('idformation'), 'ID formation doit commencer par une lettre majuscule et être exactement de 4 caractères');

    }
    else{
        setSuccessFor(document.getElementById('idformation'));
    }

    // Validation pour le id user
    if (langue === '') {
        isValid = false;
        setErrorFor(document.getElementById('langue'), 'Nom formation ne doit pas etre vide');

    } else if(!/^[A-Z][a-zA-Z0-9]{3}$/.test(langue)){
        isValid = false;
        setErrorFor(document.getElementById('langue'), 'Nom formation doit contenir uniquement des lettres et ne pas dépasser 30 caractères');
    }
    else{
        setSuccessFor(document.getElementById('langue'));

    }
    // Validation pour le id niveau
   
    if (niveau === '') {
        isValid = false;
        setErrorFor(document.getElementById('niveau'), 'Nom formation ne doit pas etre vide');

    } else if(!/^[A-Z][a-zA-Z0-9]{3}$/.test(niveau)){
        isValid = false;
        setErrorFor(document.getElementById('niveau'), 'Nom formation doit contenir uniquement des lettres et ne pas dépasser 30 caractères');
    }
    else{
        setSuccessFor(document.getElementById('niveau'));

    }
     // Validation pour la duree
     if (date_de_debut=== '') {
        isValid = false;
        setErrorFor(document.getElementById('date_de_debut'), 'Duree ne doit pas etre vide');
    } else if (isNaN(date_de_debut) || parseInt(date_de_debut) < 0 || parseInt(date_de_debut) > 6  ) {
        isValid = false;
        setErrorFor(document.getElementById('date_de_debut'), 'Duree doit être un nombre numérique inférieur ou égal à 6');
    } else {
        setSuccessFor(document.getElementById('date_de_debut'));
    }
    // Validation pour la duree
    if (date_de_fin=== '') {
        isValid = false;
        setErrorFor(document.getElementById('date_de_fin'), 'Duree ne doit pas etre vide');
    } else if (isNaN(date_de_fin) || parseInt(date_de_fin) < 0 || parseInt(date_de_fin) > 6  ) {
        isValid = false;
        setErrorFor(document.getElementById('date_de_fin'), 'Duree doit être un nombre numérique inférieur ou égal à 6');
    } else {
        setSuccessFor(document.getElementById('date_de_fin'));
    }
    // Validation pour la duree
    if (duree === '') {
        isValid = false;
        setErrorFor(document.getElementById('duree'), 'Duree ne doit pas etre vide');
    } else if (isNaN(duree) || parseInt(duree) < 0 || parseInt(duree) > 6  ) {
        isValid = false;
        setErrorFor(document.getElementById('duree'), 'Duree doit être un nombre numérique inférieur ou égal à 6');
    } else {
        setSuccessFor(document.getElementById('duree'));
    }
// Validation pour la duree
if (prix=== '') {
    isValid = false;
    setErrorFor(document.getElementById('prix'), 'Duree ne doit pas etre vide');
} else if (isNaN(prix) || parseInt(prix) < 0 || parseInt(prix) > 6  ) {
    isValid = false;
    setErrorFor(document.getElementById('prix'), 'Duree doit être un nombre numérique inférieur ou égal à 6');
} else {
    setSuccessFor(document.getElementById('prix'));
}
// Validation pour la duree
if (titre=== '') {
    isValid = false;
    setErrorFor(document.getElementById('titre'), 'Duree ne doit pas etre vide');
} else if (isNaN(titre) || parseInt(titre) < 0 || parseInt(titre) > 6  ) {
    isValid = false;
    setErrorFor(document.getElementById('titre'), 'Duree doit être un nombre numérique inférieur ou égal à 6');
} else {
    setSuccessFor(document.getElementById('titre'));
}
// Validation pour la duree
if (description=== '') {
    isValid = false;
    setErrorFor(document.getElementById('description'), 'Duree ne doit pas etre vide');
} else if (isNaN(description) || parseInt(description) < 0 || parseInt(description) > 6  ) {
    isValid = false;
    setErrorFor(document.getElementById('description'), 'Duree doit être un nombre numérique inférieur ou égal à 6');
} else {
    setSuccessFor(document.getElementById('description'));
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

