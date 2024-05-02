function validateForm() {
    let nompart = document.getElementById('nompart').value.trim();
    let pays = document.getElementById('pays').value.trim();
    let ville = document.getElementById('ville').value.trim();
    let emailpart = document.getElementById('emailpart').value.trim();

    let isValid = true;

    // Validation pour l'ID du partenaire
  
    

    // Validation pour le nom du partenaire
    if (nompart === '') {
        isValid = false;
        setErrorFor(document.getElementById('nompart'), 'Nom partenaire ne doit pas etre vide');

    } else if(!/^[a-zA-Z ]{1,30}$/.test(nompart)){
        isValid = false;
        setErrorFor(document.getElementById('nompart'), 'Nom partenaire doit contenir uniquement des lettres et ne pas dépasser 30 caractères');
    }
    else{
        setSuccessFor(document.getElementById('nompart'));

    }
    // Validation pour le pays
    if (pays === '' ) {
        isValid = false;
        setErrorFor(document.getElementById('pays'), 'Pays ne doit pas etre vide');
    } else if(!/^[a-zA-Z ]{1,30}$/.test(pays)){
        isValid = false;
        setErrorFor(document.getElementById('pays'), 'Pays doit contenir uniquement des lettres et ne pas dépasser 30 caractères');
    }
    else {
        setSuccessFor(document.getElementById('pays'));
    }

    // Validation pour la ville
    if (ville === '') {
        isValid = false;
        setErrorFor(document.getElementById('ville'), 'Ville ne doit pas etre vide');
    }else if(!/^[a-zA-Z ]{1,30}$/.test(ville)){
        isValid = false;
        setErrorFor(document.getElementById('ville'), 'Ville doit contenir uniquement des lettres et ne pas dépasser 30 caractères');
    } 
    else {
        setSuccessFor(document.getElementById('ville'));
    }

    // Validation pour l'email du partenaire
    if (emailpart === '') {
        isValid = false;
        setErrorFor(document.getElementById('emailpart'), 'Email partenaire ne peut pas être vide');
    } else if (!isValidEmail(emailpart)) {
        isValid = false;
        setErrorFor(document.getElementById('emailpart'), 'Email partenaire invalide');
    } else {
        setSuccessFor(document.getElementById('emailpart'));
    }

    
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

function isValidEmail(email) {
    // Expression régulière pour valider l'email
    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}



// form2 ::offre

function validateForm2() {
    let programme = document.getElementById('programme').value.trim();
    let domaine = document.getElementById('domaine').value.trim();
    let nbplace = document.getElementById('nbplace').value.trim();
    let frais = document.getElementById('frais').value.trim();

    let img = document.getElementById('img').value.trim();

    let isValid = true;

    // Validation pour l'ID du partenaire
  
    

   
    // Validation pour le pays
    if (programme === '' ) {
        isValid = false;
        setErrorFor(document.getElementById('programme'), 'le programme ne doit pas etre vide');
    } else if(!/^[a-zA-Z ]{1,30}$/.test(programme)){
        isValid = false;
        setErrorFor(document.getElementById('programme'), 'le champ programme doit contenir uniquement des lettres ');
    }
    else {
        setSuccessFor(document.getElementById('programme'));
    }

    // Validation pour la ville
    if (domaine === '') {
        isValid = false;
        setErrorFor(document.getElementById('domaine'), 'domaine d\'étude ne doit pas etre vide');
    }else if(!/^[a-zA-Z ]{1,30}$/.test(domaine)){
        isValid = false;
        setErrorFor(document.getElementById('domaine'), 'domaine doit contenir uniquement des lettres');
    } 
    else {
        setSuccessFor(document.getElementById('domaine'));
    }
    //
    if (nbplace === '') {
        isValid = false;
        setErrorFor(document.getElementById('nbplace'), 'Le domaine d\'étude ne doit pas être vide');
    } else if (!preg_match('/^\d+$/',nbplace)) {
        isValid = false;
        setErrorFor(document.getElementById('nbplace'), 'Le domaine d\'étude doit contenir uniquement des entiers positifs');
    } else {
        setSuccessFor(document.getElementById('nbplace'));
    }

    if (frais === '') {
        isValid = false;
        setErrorFor(document.getElementById('frais'), 'Le frais ne doit pas être vide');
    } else if (!preg_match('/^\d+$/',frais)) {
        isValid = false;
        setErrorFor(document.getElementById('frais'), 'Le frais doit contenir uniquement des entiers positifs');
    } else {
        setSuccessFor(document.getElementById('frais'));
    }
     
    if (img === '' ) {
        isValid = false;
        setErrorFor(document.getElementById('img'), 'l image ne doit pas etre vide');
    } 
    else {
        setSuccessFor(document.getElementById('img'));
    }
    
    return isValid;
}

function setErrorFor(input, message) {
    let formControl2 = input.parentElement;
    let small = formControl2.querySelector('small');
    formControl2.className = 'form-control2 error';
    small.innerText = message;
}

function setSuccessFor(input) {
    let formControl2 = input.parentElement;
    formControl2.className = 'form-control2 success';
}



