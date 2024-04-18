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

<form action="updateUser.php" method="post">
    <input type="hidden" name="id" value="<?= $id; ?>">
    <label for="nom">Nom:</label>
    <input type="text" id="nom" name="nom" value="<?= $nom; ?>"><br><br>
    <label for="prenom">Prénom:</label>
    <input type="text" id="prenom" name="prenom" value="<?= $prenom; ?>"><br><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?= $email; ?>"><br><br>
    <label for="mdp">Mot de passe:</label>
    <input type="password" id="mdp" name="mdp" value="<?= $mdp; ?>"><br><br>
    <input type="submit" name="submit" value="Update user">
    <input type="button" value="cancel" onclick="window.location.href='users.php';">
</form>
