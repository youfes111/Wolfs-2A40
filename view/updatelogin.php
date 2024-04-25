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
    <link rel="stylesheet" href="login_1.css">
    <script src="login_1.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>
<body>
 
<div class="container" id="form-container" >
        <div class="header">
        <h1>Mis a jour du compte</h1>
            

    <form id="updateForm" action="updateUser.php" method="post" onsubmit="return validateForm()">
        <input type="hidden" name="id" id="id" value="<?= $id; ?>">
        <div class="form-control ">
        <input type="text" placeholder="Nom" id="userNom" name="userNom" value="<?= $nom; ?>">
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation"></i>
        <br>
        <small>Message d'erreur</small>
        </div>
        <div class="form-control ">
        <input type="text" placeholder="Prénom" id="userPrenom" name="userPrenom" value="<?= $prenom; ?>">
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation"></i>
        <br>
        <small>Message d'erreur</small>
        </div>
        <div class="form-control ">
        <input type="email" placeholder="StudyGo@exemple.com" id="email" name="email" value="<?= $email; ?>">
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation"></i>
        <br>
        <small>Message d'erreur</small>
        </div>
        <div class="form-control ">
        <input type="password" placeholder="Mot de passe" id="mdp" name="mdp" value="<?= $mdp; ?>">
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation"></i>
        <br>
        <small>Message d'erreur</small>
        </div>
        
        <input type="submit" name="submit" value="Update user" id="btn">
<input type="button" value="cancel" onclick="window.location.href='users.php';">
       
        
    </form>
</div></div>
</body>
</html>
