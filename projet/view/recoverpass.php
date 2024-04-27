<?php session_start() ?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!------ Include the above in your HEAD tag ---------->

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="style.css">

    <link rel="icon" href="Favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title>
Formulaire de connexion</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="#">Récupération du mot de passe utilisateur</a>
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
                    <div class="card-header">Récupération de mot de passe</div>
                    <div class="card-body">
                        <form action="#" method="POST" name="recover_psw">
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Email Addresse</label>
                                <div class="col-md-6">
                                    <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <input type="submit" value="Récupération" name="recover">
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
    if(isset($_POST["recover"])){
        require '../controler/loginc.php';
        require '../Model/login.php'; 
        $email = $_POST["email"];

        $l=new loginc();
        $etat=$l->selectemail($email);
       
        
        

        if($etat==false){
            echo $etat;
            ?>
           
            <?php
        }else{
            // generate token by binaryhexa 
            $token = bin2hex(random_bytes(50));

            //session_start ();
            $_SESSION['token'] = $token;
            $_SESSION['email'] = $email;

            require "../mail/PHPMailerAutoload.php";
            $mail = new PHPMailer;

            $mail->isSMTP();
            $mail->Host='smtp.gmail.com';
            $mail->Port=587;
            $mail->SMTPAuth=true;
            $mail->SMTPSecure='tls';

            // h-hotel account
            $mail->Username='youssef.dhib@esprit.tn';
            $mail->Password='Youssef135798642';

            // send by h-hotel email
            $mail->setFrom('email', 'Password Reset');
            // get email from input
            $mail->addAddress($_POST["email"]);

            // HTML body
            $mail->isHTML(true);
            $mail->Subject = "Récupération de votre mot de passe";
            $mail->Body = '<b>Cher utilisateur</b>
                           <h3>Nous avons reçu une demande de réinitialisation de votre mot de passe.</h3>
                           <p>Veuillez cliquer sur le lien ci-dessous pour réinitialiser votre mot de passe</p>
                           <a href="http://localhost/projet/view/reset_psw.php">Réinitialiser votre mot de passe</a>
                           <br><br>
                           <p>Cordialement,</p>
                           <b>Programming with Lam</b>';

            if(!$mail->send()){
                ?>
                    <script>
                Swal.fire("Email invalide");
                    </script>
                <?php
            }else{
                ?>
                    <script>
                       Swal.fire({
                            position: "block",
                            icon: "success",
                            title: "Ton email a été envoyer avec succés",
                            showConfirmButton: false,
                            timer: 1500
                            });
                    </script>
                <?php
            }
        }
    }


?>
