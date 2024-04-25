

<?php 
require '../controler/loginc.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $l=new loginc();
        $id = $_POST['id'];
        $nom = $_POST['userNom'];
        $prenom = $_POST['userPrenom'];
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];    
        $l->updateUser($id,$nom, $prenom, $email, $mdp);
        header("Location: users.php");



}
    
    
    
    
    ?>