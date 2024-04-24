<?php
require '../controler/loginc.php';
$l=new loginc();

if(isset($_GET['id'])) {
    $userId = $_GET['id'];

    
    $userDetails = $l->selectLogin($userId);

    if($userDetails) {
        $id = $userDetails['idUser'];
        $nom = $userDetails['user'];
        $prenom = $userDetails['userPrenom'];
        $email = $userDetails['email'];
        $mdp = $userDetails['mdp'];

    } else {
        echo "User details not found";
    }

    
} else {
    echo "User ID not provided";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login_2.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>
<body>
 
<div class="container" id="form-container" >
        <div class="header">
        <h1>Mis a jour du compte</h1>
            

    <form id="updateForm" action="updateUser.php" method="post" onsubmit="return validateForm()">
        <input type="hidden" name="id" id="id" value="<?= $id; ?>">
        <div class="form-control ">
        <input type="text" placeholder="Nom" id="userNom1" name="userNom" value="<?= $nom; ?>">
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation"></i>
        <br>
        <small>Message d'erreur</small>
        </div>
        <div class="form-control ">
        <input type="text" placeholder="Prénom" id="userPrenom1" name="userPrenom" value="<?= $prenom; ?>">
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation"></i>
        <br>
        <small>Message d'erreur</small>
        </div>
        <div class="form-control ">
        <input type="email" placeholder="StudyGo@exemple.com" id="email1" name="email" value="<?= $email; ?>">
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation"></i>
        <br>
        <small>Message d'erreur</small>
        </div>
        <div class="form-control ">
        <input type="password" placeholder="Mot de passe" id="mdp1" name="mdp" value="<?= $mdp; ?>">
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation"></i>
        <br>
        <small>Message d'erreur</small>
        </div>
        
        <input type="submit" name="submit" value="Mettre a jour client" id="btn">
        <input type="button" value="Retouner" id="btn" onclick="window.location.href='users.php';">
       
        
    </form>
</div></div>
<script>// document.getElementById('toggleButton').addEventListener('click', function() {
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

var form = document.getElementById('updateForm');
form.addEventListener('submit',(event)  => {
    
       
    let nom = document.getElementById('userNom1').value.trim();
    let prenompart = document.getElementById('userPrenom1').value.trim();
    let mdp = document.getElementById('mdp1').value.trim();
    let email = document.getElementById('email1').value.trim();

    let isValid = true;

    
    if (nom === '') {
        event.preventDefault();

        setErrorFor(document.getElementById('userNom1'), 'Le nom  ne doit pas etre vide');
        
    } else if(!/^[a-zA-Z]{1,30}$/.test(nom)) {
        event.preventDefault();

        setErrorFor(document.getElementById('userNom1'), 'Le nom partenaire doit commencer par une lettre majuscule et être exactement de 4 caractères');

    }
    else{
        setSuccessFor(document.getElementById('userNom1'));
    }

    // Validation pour le nom du partenaire
    if (prenompart === '') {
        event.preventDefault();
        setErrorFor(document.getElementById('userPrenom1'), 'Prenom partenaire ne doit pas etre vide');

    } else if(!/^[a-zA-Z]{1,30}$/.test(prenompart)){
        event.preventDefault();
        setErrorFor(document.getElementById('userPrenom1'), 'Prenom partenaire doit contenir uniquement des lettres et ne pas dépasser 30 caractères');
    }
    else{
        setSuccessFor(document.getElementById('userPrenom1'));

    }
    // Validation pour le pays
    if (mdp === '' ) {
        event.preventDefault();
        setErrorFor(document.getElementById('mdp1'), 'Mot de passe ne doit pas etre vide');
    } else if(!/^[a-zA-Z0-9 ]{1,30}$/.test(pays)){
        event.preventDefault();
        setErrorFor(document.getElementById('mdp1'), 'Mot de passe  doit contenir uniquement des lettres ,des chiffres et ne pas dépasser 30 caractères');
    }
    else {
        setSuccessFor(document.getElementById('mdp1'));
    }


    // Validation pour l'email du partenaire
    if (email === '') {
        ievent.preventDefault();
        setErrorFor(document.getElementById('email1'), 'Email ne peut pas être vide');
    } else if (!isValidEmail(emailpart)) {
        event.preventDefault();
        setErrorFor(document.getElementById('email1'), 'Email  invalide');
    } else {
        setSuccessFor(document.getElementById('email1'));
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

</script>
</body>
</html>
