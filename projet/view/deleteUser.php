<?php
require_once '../controler/loginc.php';

if(isset($_POST['delete'])) {
    $l = new loginc();

    $idUser = $_POST['id_user'];

    $l->deleteuser($idUser);
    header("Location: backend_1.php");

} else {
    echo "Error: No user id provided";
}
?>
