
<?php

require_once '../controler/loginc.php';
if (isset($_POST['iduser1'])) {
    $l = new loginc();

    $idUser = $_POST['iduser1'];
    
    $l->updatebloque($idUser);  
    header("Location: users.php");
} else {
    
    echo "Error: No user id provided";
    
    
    
}
?>