<?php
session_start(); // Assurez-vous de démarrer la session

require '../controler/loginc.php';
require '../Model/login.php';




if(isset($_POST['submit'])) {
    $e=new loginc();
    $user = $_POST['user1'];
    $mdp = $_POST['mdp1'];
  
      if ($e->checkUserExists($user, $mdp)) {
        $userDetails=$e->selectuser($user);
          if ($userDetails['etat'] == 1) {

              header("Location: backend_1.php");
          } else {

              $_SESSION['user1']= $user;
              header("Location: userprofile.php");
          }
      }
      exit(); 
  }

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $e=new loginc();
    $l=new login();
    $userNom = $_POST['userNom'];
    $userPrenom = $_POST['userPrenom'];
    $mdp = $_POST['mdp'];
    $email= $_POST['email'];
    $hashedPassword = password_hash($mdp, PASSWORD_DEFAULT);

    $l->setuser($userNom);
    $l->setPrenom($userPrenom);
    $l->setEmail($email);
    $l->setmdp($hashedPassword);

    $e->addaccount($l->getuser() ,$l->getPrenom(), $l->getEmail(), $l->getmdp()); 

    
}
       



  


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="login_2.css">
    <link rel="icon" href="10.png">
    <script src="login_1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>

    
 
    <title>Login</title>
</head>

<body>
    
<div id="creationCompte" style="display: none;">  
<div class="container" id="form-container" >
        <div class="header">
        <h1>Création du compte</h1>
            

    <form action="" method="post" onsubmit="return validateForm()">
        
        <div class="form-control ">
        <input type="text" placeholder="Nom" id="userNom" name="userNom">
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation"></i>
        <br>
        <small>Message d'erreur</small>
        </div>
        <div class="form-control ">
        <input type="text" placeholder="Prénom" id="userPrenom" name="userPrenom">
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation"></i>
        <br>
        <small>Message d'erreur</small>
        </div>
        <div class="form-control ">
        <input type="email" placeholder="StudyGo@exemple.com" id="email" name="email">
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation"></i>
        <br>
        <small>Message d'erreur</small>
        </div>
        <div class="form-control ">
        <input type="password" placeholder="Mot de passe" id="mdp" name="mdp">
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation"></i>
        <br>
        <small>Message d'erreur</small>
        </div>
        
        <input type="submit" name="submit2" value="S'inscrire" id="btn">
        <br>
        <br>
        <hr>
        <h3>Connectez-vous à votre espace</h3>
        <button type="button" id="btnConnexion">Se connecter</button>
    </form>
</div></div></div>

<div id="connexion" style="display: flex;">
<div class="container" id="form-container" >
        <div class="header">
        <h1>Se Connecter</h1>
    <form action="" method="post">
        <div class="form-control "> 
        <input type="text" placeholder="User" name="user1" id="user" required></div>
        <div class="form-control ">  
        <input type="password" placeholder="Mot de passe" name="mdp1" id="motdp" required></div>
        
        <input type="submit" name="submit" value="Se connecter" id="clickin">
        <br><br><br><br>
        <a href="#">Forget Your Password?</a>
        <br>
        <br>
        <hr>
        <h3>Devenez membre dès maintenant</h3>
        <button type="button" id="btnCreation">Créer un compte</button>
    </form>
</div></div></div>

 


</body>
<script>



document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("btnConnexion").addEventListener("click", function() {
        document.getElementById("connexion").style.display = "flex";
        document.getElementById("creationCompte").style.display = "none";
    });

    document.getElementById("btnCreation").addEventListener("click", function() {
        document.getElementById("connexion").style.display = "none";
        document.getElementById("creationCompte").style.display = "block";
    });
});
</script>



</html>