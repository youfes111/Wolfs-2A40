<?php
require_once '../controler/diplomec.php';

if(isset($_POST['delete'])) {
    $l = new diplomec();

    $iddiplome = $_POST['ID_DIPLOME'];

    $l->deletediplome($iddiplome);
    header("Location: diplome_back.php");

} else {
    echo "Error: No user1 id provided";
}
?>
