<?php
require("../config/commandes1.php");

require("../config/connexion.php");
// Vérifier si le formulaire de modification a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les valeurs mises à jour à partir de la superglobale $_POST
    $idrep = $_POST['idrep'];
    $descrep = $_POST['descrep'];
    $idrec = $_POST['idrec'];
    // Effectuer la validation des champs
    $errors = array();

    // Validation du champ iduser
    if (empty($descrep)) {
        $errors[] = "Le champ ID utilisateur est obligatoire.";
    }


    // Vérifier s'il y a des erreurs de validation
    if (count($errors) > 0) {
        // Afficher les erreurs
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
        // Arrêter l'exécution du script en cas d'erreurs
        exit();
    }

    // Effectuer la mise à jour dans la base de données
    $query = $access->prepare('UPDATE reponse SET Descrep = :descrep WHERE Idrep = :idrep');
    $query->bindValue(':idrep', $idrep);
    $query->bindValue(':descrep', $descrep);
    $query->bindValue(':idrec', $idrec);
    $query->execute();
    header('location:backendTalel.php');

    // Rediriger vers la page principale ou afficher un message de succès
    exit();
}

?>