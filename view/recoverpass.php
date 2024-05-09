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
            echo "mail n existe pas";
        }else{
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
            $mail->setFrom('youssef.dhib@esprit.tn', 'Reinitialisation du mot de passe');
            // get email from input
            $mail->addAddress($_POST["email"]);

            // HTML body
            $mail->isHTML(true);
            $mail->Subject = "Recuperation de votre mot de passe";
            $mail->Body = '<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reinitialisation du mot de passe</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            padding: 40px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333333;
        }
        p {
            color: #555555;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 24px;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
    <img src="https://attachments.office.net/owa/Youssef.Dhib%40esprit.tn/service.svc/s/GetAttachmentThumbnail?id=AAMkAGViYzc3NWNjLTRlNDUtNDZlMi05Y2E4LTkyZmU3NTVkZWNkYgBGAAAAAAAHRcptvlbeQoVkk5e1JhzfBwDsX0esRnDySL56L4kdUVrsAAAAAAEMAADsX0esRnDySL56L4kdUVrsAAB%2FjFeOAAABEgAQAPy4uOBwKwZJn1UtGGvIoFU%3D&token=eyJhbGciOiJSUzI1NiIsImtpZCI6IkU1RDJGMEY4REE5M0I2NzA5QzQzQTlFOEE2MTQzQzAzRDYyRjlBODAiLCJ0eXAiOiJKV1QiLCJ4NXQiOiI1ZEx3LU5xVHRuQ2NRNm5vcGhROEE5WXZtb0EifQ.eyJvcmlnaW4iOiJodHRwczovL291dGxvb2sub2ZmaWNlMzY1LmNvbSIsInVjIjoiZmJkNzM5NTVkNDI0NDUwNWE0NjYxMzI2YTM0ZjkwNGUiLCJzaWduaW5fc3RhdGUiOiJrbXNpIiwidmVyIjoiRXhjaGFuZ2UuQ2FsbGJhY2suVjEiLCJhcHBjdHhzZW5kZXIiOiJPd2FEb3dubG9hZEA2MDRmMWE5Ni1jYmU4LTQzZjgtYWJiZi1mOGVhZjVkODU3MzAiLCJpc3NyaW5nIjoiV1ciLCJhcHBjdHgiOiJ7XCJtc2V4Y2hwcm90XCI6XCJvd2FcIixcInB1aWRcIjpcIjExNTM4MDExMjY5NTYyODUzODZcIixcInNjb3BlXCI6XCJPd2FEb3dubG9hZFwiLFwib2lkXCI6XCJiYWY1MGJhYi1iYWRiLTQ4ZTYtYTFkNi0xMjY2NjRmYTZmOGZcIixcInByaW1hcnlzaWRcIjpcIlMtMS01LTIxLTMzMzc0NTUzNjgtMTk2MTk0ODg2OS0xMzQ1NDcwMzA1LTEwNTk0NzMxXCJ9IiwibmJmIjoxNzE1MTgzMTgzLCJleHAiOjE3MTUxODM3ODMsImlzcyI6IjAwMDAwMDAyLTAwMDAtMGZmMS1jZTAwLTAwMDAwMDAwMDAwMEA2MDRmMWE5Ni1jYmU4LTQzZjgtYWJiZi1mOGVhZjVkODU3MzAiLCJhdWQiOiIwMDAwMDAwMi0wMDAwLTBmZjEtY2UwMC0wMDAwMDAwMDAwMDAvYXR0YWNobWVudHMub2ZmaWNlLm5ldEA2MDRmMWE5Ni1jYmU4LTQzZjgtYWJiZi1mOGVhZjVkODU3MzAiLCJoYXBwIjoib3dhIn0.K_OmvDPySpr_itScO9yEjik5mhrXz88CnZ77XrSgN8poaROmgDjxFQ-JrCb5rzKnp7dv5SMZXy2u4kgOG61QCoJ0cx-JsZI4b1NB1OhEc2WpQOG5PszzzIBTspn29yA4PNUp85SqWPS_icAu9obhLkzv2qhGCWVjinoY5Pgd3LAleZID4yK-BqRDRngMkTw5FxA8SijPftUDx1wYOZVJtb6_eWZ8axWz-OCs2vvO9FMeDlIFiWqyU7AAKST12RMV2GDj0XPlLBMs6IS_MpQNC5wAW2_RzSIT2mrNDVwrNsIbrYkX6JU5pU609fN5OMBqV_qBfqloJ4ec3VaNZHhYMw&X-OWA-CANARY=bdvoVz-zqQkAAAAAAAAAAFANaxl2b9wYyWyfmc3dMX1WYkqV0HoRYTOOzrQX40W6OIhMX97vwTA.&owa=outlook.office365.com&scriptVer=20240419007.35&clientId=8334F5F6B34443B0B805543054567390&animation=true" style="display: block; margin: 0 auto 20px; max-width: 200px;">

        <h1>Reinitialisation du mot de passe</h1>
        <p>Cher utilisateur,</p>
        <p>Nous avons recu une demande de reinitialisation de votre mot de passe.</p>
        <p>Veuillez cliquer sur le bouton ci-dessous pour reinitialiser votre mot de passe :</p>
        <a href="http://localhost/projet/view/reset_psw.php">Reinitialiser votre mot de passe</a>
        <br><br>
        <p>Cordialement,</p>
        <b>StudyGo</b>
    </div>
</body>
</html>';

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
