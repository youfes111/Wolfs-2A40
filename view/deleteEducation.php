<?php
require_once '../controler/educationc.php';

if(isset($_POST['delete'])) {
    $l = new educationc();

    $idEducation = $_POST['ID_Education'];

    $l->deleteeducation($idEducation);
    header("Location: education_back.php");

} else {
    echo "Error: No user id provided";
}
?>
