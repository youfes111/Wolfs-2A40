function validateForm() {
    let statut = document.getElementById('statut').value.trim();
   
    let descrec = document.getElementById('descrec').value.trim();
    var typerec = document.querySelector('input[name="typerec"]:checked');

    let isValid = true;

    // Validation pour l'ID du reclamation
    
   
    

    // Validation pour la description
    if (descrec === '') {
        isValid = false;
        setErrorFor(document.getElementById('descrec'), 'description ne doit pas etre vide');
    }else if(!/^[a-zA-Z ]{1,150}$/.test(descrec)){
        isValid = false;
        setErrorFor(document.getElementById('descrec'), 'descrec doit contenir uniquement des lettres et ne pas dépasser 150 caractères');
    } 
    else {
        setSuccessFor(document.getElementById('descrec'));
    }
     // Validation pour la description
     if (statut === '') {
        isValid = false;
        setErrorFor(document.getElementById('statut'), 'description ne doit pas etre vide');
    }else if(!/^[a-zA-Z ]{1,150}$/.test(descrec)){
        isValid = false;
        setErrorFor(document.getElementById('statut'), 'statut doit contenir uniquement des lettres et ne pas dépasser 30 caractères');
    } 
    else {
        setSuccessFor(document.getElementById('statut'));
    }

    // Validation pour le type de reclamation
 
    if (!typerec) {
        isValid = false;
        alert("Veuillez sélectionner un choix.");
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


// 
function validateForm2() {
    let descrep = document.getElementById('descrep').value.trim();
   

    let isValid = true;

    // Validation pour l'ID du reclamation
    
    // Validation pour le id user du reclamation
    if (descrep === '') {
        isValid = false;
        setErrorFor(document.getElementById('descrep'), 'la descreption de reponse ne doit pas etre vide');

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


