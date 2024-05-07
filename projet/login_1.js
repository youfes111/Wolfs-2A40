document.getElementById("btnConnexion").addEventListener("click", function() {
    document.getElementById("connexion").style.display = "flex";
    document.getElementById("creationCompte").style.display = "none";
});
document.getElementById("btnCreation").addEventListener("click", function() {
    document.getElementById("connexion").style.display = "none";
    document.getElementById("creationCompte").style.display = "flex";
});
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

        setErrorFor(document.getElementById('userNom'), 'Le nom partenaire doit commencer par une lettre majuscule et ne pas dépasser 30 caractères');

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
    
    



    // Validation pour l'email du partenaire
    if (email === '') {
        isValid = false;
        setErrorFor(document.getElementById('email'), 'Email ne peut pas être vide');
    } else if (!isValidEmail(email)) {
        isValid = false;
        setErrorFor(document.getElementById('email'), 'Email  invalide');
    } else {
        setSuccessFor(document.getElementById('email'));
    }
    // Validation pour le mot de passe
    if (mdp === '') {
        isValid = false;
        setErrorFor(document.getElementById('mdp'), 'Mot de passe ne doit pas être vide');
    } else if (!/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{4,}$/.test(mdp)) {
        isValid = false;
        setErrorFor(document.getElementById('mdp'), 'Le mot de passe doit contenir au moins une lettre minuscule, une lettre majuscule, un chiffre et avoir une longueur minimale de 4 caractères');
    } else {
        setSuccessFor(document.getElementById('mdp'));
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

