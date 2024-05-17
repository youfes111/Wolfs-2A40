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
        $id_education = $userDetails['ID_Education'];
        $photo = $userDetails['photo'];
        $Etat = $userDetails['Etat'];
        $emplacement = $userDetails['emplacement'];
        $id_diplome = $userDetails['ID_Diplome_E'];
        $nom_diplome = $userDetails['nom'];
        $document = $userDetails['document'];
        $Moyenne = $userDetails['Moyenne'];
        $date_diplome = $userDetails['date_diplome'];
       

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
    <title>Mis a jour du compte</title>
    <link rel="stylesheet" href="login_8.css">
    <link rel="icon" href="10.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    

</head>
<body>
 
<div class="container" id="form-container">
    <div class="header">
    <img src="Fichier 3 1.png" alt="">            

        <form id="updateForm" action="updateUser.php" method="post" onsubmit="return validateForm()">
            <input type="hidden" name="id" id="id" value="<?= $id; ?>">

            <a href="userprofile.php" class="return-button">
                <button type="button" class="transparent-button">
                    <span class="icon"><i class="fas fa-arrow-left"></i></span>
                </button>
            </a>

            <!-- Champ Nom -->
            <div class="form-control">
                <input type="text" placeholder="Nom" id="userNom1" name="userNom" value="<?= $nom; ?>">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation"></i>
                <br>
                <small></small>
            </div>

            <!-- Champ Prénom -->
            <div class="form-control">
                <input type="text" placeholder="Prénom" id="userPrenom1" name="userPrenom" value="<?= $prenom; ?>">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation"></i>
                <br>
                <small></small>
            </div>

            <!-- Champ Email -->
            <div class="form-control">
                <input type="email" placeholder="StudyGo@exemple.com" id="email1" name="email" value="<?= $email; ?>">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation"></i>
                <br>
                <small></small>
            </div>

            <!-- Champ Nouveau mot de passe -->
            <div class="form-control">
                <input type="password" placeholder="Nouveau mot de passe" id="mdp1" name="mdp">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation"></i>
                <br>
                <small></small>
            </div>

            <!-- Champ Confirmer mot de passe -->
            <div class="form-control">
                <input type="password" placeholder="Confirmer mot de passe" id="mdp_confirm" name="mdp_confirm">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation"></i>
                <br>
                <small></small>
            </div>

            <!-- Hidden Fields -->
            <input type="hidden" id="id_education" name="id_education" value="<?= $id_education; ?>">
            <input type="hidden" id="id_diplome" name="id_diplome" value="<?= $id_diplome; ?>">

            <!-- Photo de profil -->
            <div class="form-control">
                <label for="profile-photo" style="color:white">Photo de profil:</label>
                <input type="file" id="profile-photo" name="profile_photo" onchange="previewProfilePhoto(event)">
            </div>

            <!-- État -->
            <div class="form-control">
                <label for="etat" style="color:white;">État:</label>
                <select id="etat" name="etat" style="width:100%;height:40px;border-raduis:5px;">
                    <option value="Bac" <?php if ($Etat == 'Bac') echo 'selected'; ?>>Bac</option>
                    <option value="Bac+1" <?php if ($Etat == 'Bac+1') echo 'selected'; ?>>Bac+1</option>
                    <option value="Bac+2" <?php if ($Etat == 'Bac+2') echo 'selected'; ?>>Bac+2</option>
                    <option value="Bac+3" <?php if ($Etat == 'Bac+3') echo 'selected'; ?>>Bac+3</option>
                    <option value="Bac+4" <?php if ($Etat == 'Bac+4') echo 'selected'; ?>>Bac+4</option>
                    <option value="Bac+5" <?php if ($Etat == 'Bac+5') echo 'selected'; ?>>Bac+5</option>
                    <option value="Bac+6" <?php if ($Etat == 'Bac+6') echo 'selected'; ?>>Bac+6</option>
                </select>
            </div>

            <!-- Emplacement -->
            <div class="form-control">
                <label for="emplacement" style="color:white">Emplacement:</label>
                <select id="emplacement" name="emplacement" style="width:100%;height:40px;border-raduis:5px;">
                    <option value="Selectionnez" <?php if ($emplacement == 'Selectionnez') echo 'selected'; ?>>Sélectionnez un emplacement</option>
                    <option value="Ariana" <?php if ($emplacement == 'Ariana') echo 'selected'; ?>>Ariana</option>
                    <option value="Béja" <?php if ($emplacement == 'Béja') echo 'selected'; ?>>Béja</option>
                    <option value="Ben Arous" <?php if ($emplacement == 'Ben Arous') echo 'selected'; ?>>Ben Arous</option>
                    <option value="Bizerte" <?php if ($emplacement == 'Bizerte') echo 'selected'; ?>>Bizerte</option>
                    <option value="Gabès" <?php if ($emplacement == 'Gabès') echo 'selected'; ?>>Gabès</option>
                    <option value="Gafsa" <?php if ($emplacement == 'Gafsa') echo 'selected'; ?>>Gafsa</option>
                    <option value="Jendouba" <?php if ($emplacement == 'Jendouba') echo 'selected'; ?>>Jendouba</option>
                    <option value="Kairouan" <?php if ($emplacement == 'Kairouan') echo 'selected'; ?>>Kairouan</option>
                    <option value="Kasserine" <?php if ($emplacement == 'Kasserine') echo 'selected'; ?>>Kasserine</option>
                    <option value="Kébili" <?php if ($emplacement == 'Kébili') echo 'selected'; ?>>Kébili</option>
                    <option value="Le Kef" <?php if ($emplacement == 'Le Kef') echo 'selected'; ?>>Le Kef</option>
                    <option value="Mahdia" <?php if ($emplacement == 'Mahdia') echo 'selected'; ?>>Mahdia</option>
                    <option value="La Manouba" <?php if ($emplacement == 'La Manouba') echo 'selected'; ?>>La Manouba</option>
                    <option value="Médenine" <?php if ($emplacement == 'Médenine') echo 'selected'; ?>>Médenine</option>
                    <option value="Monastir" <?php if ($emplacement == 'Monastir') echo 'selected'; ?>>Monastir</option>
                    <option value="Nabeul" <?php if ($emplacement == 'Nabeul') echo 'selected'; ?>>Nabeul</option>
                    <option value="Sfax" <?php if ($emplacement == 'Sfax') echo 'selected'; ?>>Sfax</option>
                    <option value="Sidi Bouzid" <?php if ($emplacement == 'Sidi Bouzid') echo 'selected'; ?>>Sidi Bouzid</option>
                    <option value="Siliana" <?php if ($emplacement == 'Siliana') echo 'selected'; ?>>Siliana</option>
                    <option value="Sousse" <?php if ($emplacement == 'Sousse') echo 'selected'; ?>>Sousse</option>
                    <option value="Tataouine" <?php if ($emplacement == 'Tataouine') echo 'selected'; ?>>Tataouine</option>
                    <option value="Tozeur" <?php if ($emplacement == 'Tozeur') echo 'selected'; ?>>Tozeur</option>
                    <option value="Tunis" <?php if ($emplacement == 'Tunis') echo 'selected'; ?>>Tunis</option>
                    <option value="Zaghouan" <?php if ($emplacement == 'Zaghouan') echo 'selected'; ?>>Zaghouan</option>
                </select>
            </div>

            <!-- Diploma and Document Upload -->
            <div class="diploma-container">
                <div class="form-control">
                    <label for="nom-diploma-1" style="color:white">Nom du diplôme:</label>
                    <select id="nom-diploma-1" name="nom_diploma" style="width:100%;height:40px;border-raduis:5px;">
                        <option value="Select a diploma" <?php if ($nom_diplome == 'Select a diploma') echo 'selected'; ?>>Select a diploma</option>
                        <option value="Computer Science" <?php if ($nom_diplome == 'Computer Science') echo 'selected'; ?>>Computer Science</option>
                        <option value="Electrical Engineering" <?php if ($nom_diplome == 'Electrical Engineering') echo 'selected'; ?>>Electrical Engineering</option>
                        <option value="Mechanical Engineering" <?php if ($nom_diplome == 'Mechanical Engineering') echo 'selected'; ?>>Mechanical Engineering</option>
                        <option value="Physics" <?php if ($nom_diplome == 'Physics') echo 'selected'; ?>>Physics</option>
                        <option value="bac math" <?php if ($nom_diplome == 'bac_math') echo 'selected'; ?>>bac math</option>
                        <option value="bac science" <?php if ($nom_diplome == 'bac_science') echo 'selected'; ?>>bac science</option>
                        <option value="bac tech" <?php if ($nom_diplome == 'bac_tech') echo 'selected'; ?>>bac tech</option>
                        <option value="bac eco" <?php if ($nom_diplome == 'bac_eco') echo 'selected'; ?>>bac eco</option>
                        <option value="bac lettre" <?php if ($nom_diplome == 'bac_lettre') echo 'selected'; ?>>bac lettre</option>
                    </select>
                </div>
                <div class="form-control">
                    <label for="document-1" style="color:white">Document (file/pdf):</label>
                    <input type="file" id="document-1" name="document" value="<?php echo $document ?>">
                </div>
                <div class="form-control" style="display:flex">
                    <label style="color:white">moyenne:</label>
                    <input type="radio" id="moyenne-1" name="moyenne" value="Excellent" <?php if ($Moyenne === 'Excellent') echo ' checked'; ?>><label style="color:white;"> Excellent</label>
                    <input type="radio" id="moyenne-2" name="moyenne" value="Très bien" <?php if ($Moyenne === 'Très bien') echo ' checked'; ?>> <label style="color:white;">Très bien</label>
                    <input type="radio" id="moyenne-3" name="moyenne" value="Bien" <?php if ($Moyenne === 'Bien') echo ' checked'; ?>><label style="color:white;"> Bien</label>
                    <input type="radio" id="moyenne-4" name="moyenne" value="Passable" <?php if ($Moyenne === 'Passable') echo ' checked'; ?>><label style="color:white;"> Passable</label>
                </div>
                <div class="form-control">
                    <label for="date-obtention-1" style="color:white">Date d'obtention:</label>
                    <input type="date" id="date-obtention-1" name="date_obtention" value="<?php echo $date_diplome ?>">
                </div>
            </div>

            <button type="submit"  name="submit" id="clickin" style=" width:50%;
  padding: 16px;
  margin-bottom: 20px;
  border: none;
  border-radius: 5px;
  background:  #E78D1E; 
color: white;
font-size: 16px;
font-family: Arial, sans-serif;
  cursor: pointer;">Mettre à jour</button>
        </form>
    </div>
</div>


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
    if (mdp === '') {
    event.preventDefault();
    setErrorFor(document.getElementById('mdp1'), 'Mot de passe ne doit pas être vide');
} else if (!/^(?=.*\d)(?=.*[a-zA-Z])[a-zA-Z0-9]{4,}$/.test(mdp)) {
    event.preventDefault();
    setErrorFor(document.getElementById('mdp1'), 'Le mot de passe doit contenir au moins 4 caractères, dont au moins une lettre et un chiffre');
} else {
    setSuccessFor(document.getElementById('mdp1'));
}


    // Validation pour l'email du partenaire
    if (email === '') {
        ievent.preventDefault();
        setErrorFor(document.getElementById('email1'), 'Email ne peut pas être vide');
    } else if (!isValidEmail(email)) {
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
