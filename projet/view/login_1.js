var form = document.getElementById('updateForm1');
form.addEventListener('submit',(event)  => {
    
       
    let nom = document.getElementById('userNom').value.trim();
    let prenompart = document.getElementById('userPrenom').value.trim();
    let mdp = document.getElementById('mdp').value.trim();
    let email = document.getElementById('email').value.trim();

    let isValid = true;

    
    if (nom === '') {
        event.preventDefault();

        setErrorFor(document.getElementById('userNom'), 'Le nom  ne doit pas etre vide');
        
    } else if(!/^[a-zA-Z]{1,30}$/.test(nom)) {
        event.preventDefault();

        setErrorFor(document.getElementById('userNom'), 'Le nom partenaire doit commencer par une lettre majuscule et être exactement de 4 caractères');

    }
    else{
        setSuccessFor(document.getElementById('userNom'));
    }

    // Validation pour le nom du partenaire
    if (prenompart === '') {
        event.preventDefault();
        setErrorFor(document.getElementById('userPrenom'), 'Prenom partenaire ne doit pas etre vide');

    } else if(!/^[a-zA-Z]{1,30}$/.test(prenompart)){
        event.preventDefault();
        setErrorFor(document.getElementById('userPrenom'), 'Prenom partenaire doit contenir uniquement des lettres et ne pas dépasser 30 caractères');
    }
    else{
        setSuccessFor(document.getElementById('userPrenom'));

    }
    // Validation pour le pays
    if (mdp === '' ) {
        event.preventDefault();
        setErrorFor(document.getElementById('mdp'), 'Mot de passe ne doit pas etre vide');
    } else if(!/^[a-zA-Z0-9 ]{1,30}$/.test(pays)){
        event.preventDefault();
        setErrorFor(document.getElementById('mdp'), 'Mot de passe  doit contenir uniquement des lettres ,des chiffres et ne pas dépasser 30 caractères');
    }
    else {
        setSuccessFor(document.getElementById('mdp'));
    }


    // Validation pour l'email du partenaire
    if (email === '') {
        ievent.preventDefault();
        setErrorFor(document.getElementById('email'), 'Email ne peut pas être vide');
    } else if (!isValidEmail(emailpart)) {
        event.preventDefault();
        setErrorFor(document.getElementById('email'), 'Email  invalide');
    } else {
        setSuccessFor(document.getElementById('email'));
    }

}) 


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