<?php session_start() ; ?>

<!-- Inclure les feuilles de style et les scripts nécessaires -->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<!doctype html>
<html lang="fr">
<head>
    <!-- Balises meta requises -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Polices -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="style.css">

    <link rel="icon" href="Favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    <title>Formulaire de réinitialisation du mot de passe</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="#">Formulaire de réinitialisation du mot de passe</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Réinitialisez votre mot de passe</div>
                    <div class="card-body">
                        <form action="#" method="POST" name="login">

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Nouveau mot de passe</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password" required autofocus>
                                    <span style="position: absolute; top: 50%; right: 30px; transform: translateY(-50%);">
                                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                                    </span>
                                    <span id="passwordError" class="text-danger" style="position: absolute; top: calc(100% + 5px); right: 30px;"></span>
                                </div>
                            </div>
                            <br><br>
                            <div class="form-group row">
                                <label for="confirm_password" class="col-md-4 col-form-label text-md-right">Confirmez le nouveau mot de passe</label>
                                <div class="col-md-6">
                                    <input type="password" id="confirm_password" class="form-control" name="confirm_password" required>
                                    <span style="position: absolute; top: 50%; right: 30px; transform: translateY(-50%);">
                                    <i class="bi bi-eye-slash" id="toggleConfirmPassword"></i>

                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <input type="submit" value="Réinitialiser" name="reset">
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

</main>
</body>
</html>
<?php
    if(isset($_POST["reset"])){
        require '../controler/loginc.php';
        require '../Model/login.php'; 

        $psw = $_POST["password"];
        $confirm_password = $_POST["confirm_password"];

        $token = $_SESSION['token'];
        $Email = $_SESSION['email'];

        $hash = password_hash( $psw , PASSWORD_DEFAULT );
        if ($psw!== $confirm_password) {
            ?>
            <script>
                Swal.fire({
                    title: "Les mots de passe ne correspondent pas",
                    icon: "error",
                    showCancelButton: false,
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK"
                });
            </script>
            <?php
            // Arrêter le script si les mots de passe ne correspondent pas
            exit();
        }
    
        $l=new loginc();
        $etat=$l->selectemail($Email);

        if($etat){
            $new_pass = $hash;
            $l->updatepass($new_pass,$Email);

            
            ?>
            <script>
                Swal.fire({
        title: "Votre mot de passe a été réinitialisé avec succès",
        icon: "success",
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
        }else{
            ?>
            <script>
                Swal.fire("Resseyer");
            </script>
            <?php
        }
    }

?>
<script>
  document.addEventListener("DOMContentLoaded", function() {
        const togglePassword = document.getElementById('togglePassword');
        const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('confirm_password');
        const passwordError = document.getElementById('passwordError');
        const confirmPasswordError = document.getElementById('confirmPasswordError');

        togglePassword.addEventListener('click', function(){
            if(password.type === "password"){
                password.type = 'text';
            }else{
                password.type = 'password';
            }
            this.classList.toggle('bi-eye');
        });

        toggleConfirmPassword.addEventListener('click', function(){
            if(confirmPassword.type === "password"){
                confirmPassword.type = 'text';
            }else{
                confirmPassword.type = 'password';
            }
            this.classList.toggle('bi-eye');
        });

        
function validatePassword() {
    const passwordValue = password.value.trim();

    const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{4,}$/;

    if (passwordValue.length < 5) {
        passwordError.textContent = "Le mot de passe doit comporter au moins 4 caractères.";
        return false;
    } else if (!regex.test(passwordValue)) {
        passwordError.textContent = "Le mot de passe doit contenir au moins une lettre majuscule, une lettre minuscule et un chiffre";
        return false;
    } else {
        passwordError.textContent = "";
        return true;
    }
}

        document.querySelector('form[name="login"]').addEventListener('submit', function(event) {
            if (!validatePassword()) {
                event.preventDefault();
            }
        });
    });
</script>
