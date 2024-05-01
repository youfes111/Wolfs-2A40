
<?php

require_once '../controler/loginc.php';
if (isset($_POST['iduser2'])) {
    $l = new loginc();

    $idUser = $_POST['iduser2'];
    
    $l->updatedebloque($idUser);  
    header("Location: users.php");
} else {
    
    echo "Error: No user id provided";
    
    
    
}
?>