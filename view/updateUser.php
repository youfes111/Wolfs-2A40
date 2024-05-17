<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
        
</body>
</html>





<?php 
require '../controler/loginc.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Vérification des deux mots de passe
    if ($_POST['mdp'] !== $_POST['mdp_confirm']) {
        ?>      
        <script>
             Swal.fire({
                title: "Les mots de passe ne correspondent pas",
                icon: "error",
                showCancelButton: false,
                confirmButtonColor: "#3085d6",
                confirmButtonText: "OK"
                }).then((result) => {
                // Rediriger vers updatelogin.php lorsque l'utilisateur clique sur "OK"
                if (result.isConfirmed) {
                        window.history.back();
                }
                });

        </script>
        <?php
        exit; // Arrêter l'exécution du script
    }
    
    // Si les deux mots de passe sont identiques
    $l = new loginc();
    $id = $_POST['id'];
    $nom = $_POST['userNom'];
    $prenom = $_POST['userPrenom'];
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];

    $photoString='';
    $id_education= $_POST['id_diplome'];
    $Etat = $_POST['etat'];
    $emplacement = $_POST['emplacement'];
    //$diplome = $_POST['diplome'];
   $id_diplome = $_POST['id_diplome'];
    $nom_diplome = $_POST['nom_diploma'];
    /*$document = $_FILES['document']['tmp_name'];
    $photodocument = file_get_contents($document);
    $documentString = base64_encode($photodocument);*/
    $documentString='';
    $Moyenne = $_POST['moyenne'];    
    $date = $_POST['date_obtention'];     

    
    $mdp_hash = password_hash($mdp, PASSWORD_DEFAULT);
    
    $l->updateUser($id, $nom, $prenom, $email, $mdp_hash,$id_education,$photoString,$Etat,$emplacement,$id_diplome,$nom_diplome,$documentString,$Moyenne,$date);
    ?>      
                        <script>
                            Swal.fire({
                                position: "block",
                                icon: "success",
                                title: "Votre compte a été modifier!",
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                window.location.replace("userprofile.php");
                            });
                        </script>
                        <?php
    
   
    exit; // Arrêter l'exécution du script
}
?>
