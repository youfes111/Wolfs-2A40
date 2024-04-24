<?php

require '../config/connexion.php' ;
// Vérifier si le formulaire de modification a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les valeurs mises à jour à partir de la superglobale $_POST
    $idlangue = $_POST['idlangue'];
    $iduser = $_POST['iduser'];
    $idniveau = $_POST['idniveau'];
    $duree = $_POST['duree'];

    // Effectuer la mise à jour dans la base de données
    $query = $access->prepare('UPDATE formation SET iduser = :iduser, idniveau = :idniveau, duree = :duree WHERE idlangue = :idlangue');
    $query->bindValue(':iduser', $iduser);
    $query->bindValue(':idniveau', $idniveau);
    $query->bindValue(':duree', $duree);
    $query->bindValue(':idlangue', $idlangue);
    $query->execute();
   
    // Rediriger vers la page principale ou afficher un message de succès
    header('Location: backendNadine.php');
    exit();
}