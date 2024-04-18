// document.getElementById('toggleButton').addEventListener('click', function() {
//     var creationCompte = document.getElementById('creationCompte');
//     var connexion = document.getElementById('connexion');

//     if (creationCompte.style.display === 'none') {
//         creationCompte.style.display = 'block';
//         connexion.style.display = 'none';
//         this.textContent = 'Se connecter';
//     } else {
//         creationCompte.style.display = 'none';
//         connexion.style.display = 'block';
//         this.textContent = 'Créer un compte';
//     }
// });

function validateForm() {
    
    let nom = document.getElementById('userNom').value.trim();
    let prenompart = document.getElementById('userPrenom').value.trim();
    let mdp = document.getElementById('mdp').value.trim();
    let email = document.getElementById('email').value.trim();

    let isValid = true;

    
    if (nom === '') {
        isValid = false;
        setErrorFor(document.getElementById('userNom'), 'Le nom  ne doit pas etre vide');
    } else if(!/^[a-zA-Z]{1,30}$/.test(nom)) {
        isValid = false;

        setErrorFor(document.getElementById('userNom'), 'Le nom partenaire doit commencer par une lettre majuscule et être exactement de 4 caractères');

    }
    else{
        setSuccessFor(document.getElementById('userNom'));
    }

    // Validation pour le nom du partenaire
    if (prenompart === '') {
        isValid = false;
        setErrorFor(document.getElementById('userPrenom'), 'Prenom partenaire ne doit pas etre vide');

    } else if(!/^[a-zA-Z]{1,30}$/.test(prenompart)){
        isValid = false;
        setErrorFor(document.getElementById('userPrenom'), 'Prenom partenaire doit contenir uniquement des lettres et ne pas dépasser 30 caractères');
    }
    else{
        setSuccessFor(document.getElementById('userPrenom'));

    }
    // Validation pour le pays
    if (mdp === '' ) {
        isValid = false;
        setErrorFor(document.getElementById('mdp'), 'Mot de passe ne doit pas etre vide');
    } else if(!/^[a-zA-Z0-9 ]{1,30}$/.test(pays)){
        isValid = false;
        setErrorFor(document.getElementById('mdp'), 'Mot de passe  doit contenir uniquement des lettres ,des chiffres et ne pas dépasser 30 caractères');
    }
    else {
        setSuccessFor(document.getElementById('mdp'));
    }


    // Validation pour l'email du partenaire
    if (email === '') {
        isValid = false;
        setErrorFor(document.getElementById('email'), 'Email ne peut pas être vide');
    } else if (!isValidEmail(emailpart)) {
        isValid = false;
        setErrorFor(document.getElementById('email'), 'Email  invalide');
    } else {
        setSuccessFor(document.getElementById('email'));
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

