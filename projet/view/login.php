<?php session_start(); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="login_6.css">
    <link rel="icon" href="10.png">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet">
    <script src="../login_1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

 
    <title>Login</title>
</head>

<body>
    
<div id="creationCompte" style="display: none;">  
<div class="container creationCompte-container" id="form-container" >
        <div class="header">
           
        <img src="Fichier 3 1.png" alt="">            

    <form id="updateForm1"action="" method="post" onsubmit="return validateForm()" >
        
        <div class="form-control ">
        <input type="text" placeholder="Nom" id="userNom" name="userNom">
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation"></i>
        
        <small></small>
        </div>
        <div class="form-control ">
        <input type="text" placeholder="Prénom" id="userPrenom" name="userPrenom">
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation"></i>
        
        <small></small>
        </div>
        <div class="form-control ">
        <input type="email" placeholder="StudyGo@exemple.com" id="email" name="email">
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation"></i>
        
        <small></small>
        </div>
        <div class="form-control ">
        <input type="password" placeholder="Mot de passe" id="mdp" name="mdp">
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation"></i>
        
        <small></small>
        </div>
        
        <input type="submit" name="submit2" value="S'inscrire" id="btn" >
        
    
        <hr>
        <h3>Connectez-vous à votre espace</h3>
        <button type="button" id="btnConnexion">Se connecter</button>
    </form>
</div></div></div>

<div id="connexion" style="display: flex;">
<div class="container" id="form-container" >
        <div class="header">
        <img src="Fichier 3 1.png" alt="">
        <br>
    <form action="" method="post" name="form" id="form" onsubmit="return checkdelete()">
        <div class="form-control "> 
        <input type="text" placeholder="Votre Nom" name="user1" id="user" required></div>
        <div class="form-control ">  
        <input type="password" placeholder="Mot de passe" name="mdp1" id="motdp" required></div>
        <span style="position: absolute; top: 226px; right: 40%; transform: translateY(-50%);">
            <i class="bi bi-eye-slash" id="togglePassword"></i>
        </span>       
        <a href="recoverpass.php" >Mot de passe oublié?</a>
        <br>
        <br>
        <div class="g-recaptcha" data-sitekey="6LfBoM8pAAAAAAmg_SDGe_NJLadbjsEdFFtuVHNh"></div>
        <br>
        <input type="submit"  name="submit" value="Se connecter" id="clickin" >
       
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
const password = document.getElementById('motdp');

    // Ajouter un gestionnaire d'événements pour le clic sur l'icône d'œil
    const togglePassword = document.getElementById('togglePassword');
    togglePassword.addEventListener('click', function(){
        // Vérifier le type de l'input de mot de passe et basculer entre 'password' et 'text'
        if(password.type === "password"){
            password.type = 'text';
        } else {
            password.type = 'password';
        }
        // Basculer entre les classes pour changer l'icône de l'œil
        this.classList.toggle('bi-eye');
        this.classList.toggle('bi-eye-slash');
    });
</script>



</html>
<?php
 

require '../controler/loginc.php';
require '../Model/login.php';
require "autoload.php";




if (isset($_POST['submit'])) {
    $e = new loginc();
    $user = $_POST['user1'];
    $mdp = $_POST['mdp1'];

    if (isset($_POST["g-recaptcha-response"])) {
        $recaptcha = new \ReCaptcha\ReCaptcha("6LfBoM8pAAAAACFtub4ANtfY5bGksVmxvIorxO0A");
        $resp = $recaptcha->verify($_POST["g-recaptcha-response"]);

        if ($resp->isSuccess()) {
            // La vérification reCAPTCHA a réussi, continuez avec le code de connexion
            if ($e->checkUserExists($user, $mdp)) {
                $userDetails = $e->selectuser($user);
                if ($userDetails['bloquage'] == 1) {
                    ?>      
                    <script>
                        Swal.fire({
                            title: "Votre compte est bloqué, vous pouvez nous envoyer un mail sur studygo@gmail.com",
                            icon: "warning",
                            showCancelButton: false,
                            confirmButtonColor: "#3085d6",
                            confirmButtonText: "OK"
                        });
                    </script>
                    <?php
                } else {
                    if ($userDetails['etat'] == 1) {
                        ?>      
                        <script>
                            Swal.fire({
                                position: "block",
                                icon: "success",
                                title: "Bonjour Mr. <?php echo $user; ?>",
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                window.location.replace("backend_1.php");
                            });
                        </script>
                        <?php
                    } else {
                        $_SESSION['user1'] = $user;
                        ?>      
                        <script>
                            Swal.fire({
                                position: "block",
                                icon: "success",
                                title: "Bonjour Mr. <?php echo $user; ?>",
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                window.location.replace("userprofile.php");
                            });
                        </script>
                        <?php
                    }
                }
            } else {
                ?>      
                <script>
                    Swal.fire({
                        title: "Mot de passe incorrect",
                        icon: "error",
                        showCancelButton: false,
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "OK"
                    });
                </script>
                <?php
            }
        } else {
            ?>      
            <script>
                Swal.fire({
                    title: "Veuillez passer par le captcha avant de vous connecter!!",
                    icon: "warning",
                    showCancelButton: false,
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.replace("login.php");
                    }
                });
            </script>
            <?php
        }
    }

    exit();
}

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $e = new loginc();
    $l = new login();
    $userNom = $_POST['userNom'];
    $userPrenom = $_POST['userPrenom'];
    $mdp = $_POST['mdp'];
    $email = $_POST['email'];
    $hashedPassword = password_hash($mdp, PASSWORD_DEFAULT);

    if ($e->isEmailUnique($email)) {
        $l->setuser($userNom);
        $l->setPrenom($userPrenom);
        $l->setEmail($email);
        $l->setmdp($hashedPassword);

        $e->addaccount($l->getuser(), $l->getPrenom(), $l->getEmail(), $l->getmdp());
        ?>      
                        <script>
                            Swal.fire({
                                position: "block",
                                icon: "success",
                                title: "Votre compte a été créer avec succés!",
                                showConfirmButton: false,
                                timer: 1500
                            });
                        </script>
                        <?php
    } 
    else{  ?>      
        <script>
             Swal.fire({
                        title: "Votre email existe deja essayer un autre email",
                        icon: "error",
                        showCancelButton: false,
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "OK"
                    });
        </script>
        <?php
        }
}
       



  


?>