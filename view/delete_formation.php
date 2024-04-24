<?php
require '../config/connexion.php';
require '../config/commandes.php';


if (isset($_GET['id']))
{
    $id=$_GET['id'];
}

supprimer($id);
header('location:backendNadine.php');


?>