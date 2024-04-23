<?php
require_once '../controler/loginc.php';
if (isset($_POST['id_user'])) {
    $l = new loginc();

    $idUser = $_POST['id_user'];
    
    

    $l->deleteuser($idUser);

    header("Location: users.php");
} else {
    
    echo "Error: No user id provided";
    
    
    
}
?>