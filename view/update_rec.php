<?php
require("../config/commandes1.php");

require("../config/connexion.php");
// Vérifier si le formulaire de modification a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["form_submit"])) {
    // Récupérer les valeurs mises à jour à partir de la superglobale $_POST
    $idrec = $_POST['idrec'];
    $iduser = $_POST['iduser'];
    $daterec = date('Y-m-d');
    $descrec = $_POST['descrec'];
    $typerec = $_POST['typerec'];
    $statut = $_POST['statut'];

    // Effectuer la validation des champs
    $errors = array();

    // Validation du champ iduser
    if (empty($iduser)) {
        $errors[] = "Le champ ID utilisateur est obligatoire.";
    }

    // Validation du champ descrec
    if (empty($descrec)) {
        $errors[] = "Le champ Description de la réclamation est obligatoire.";
    }

    // Validation du champ typerec
    if (empty($typerec)) {
        $errors[] = "Le champ Type de réclamation est obligatoire.";
    }

    // Validation du champ statut
    if (empty($statut)) {
        $errors[] = "Le champ Statut est obligatoire.";
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
    $query = $access->prepare('UPDATE reclamationsss SET IDuser = :iduser, Daterec = :daterec, Descrec = :descrec, Typerec = :typerec, Statut = :statut WHERE IDrec = :idrec');
    $query->bindValue(':iduser', $iduser);
    $query->bindValue(':daterec', $daterec);
    $query->bindValue(':descrec', $descrec);
    $query->bindValue(':typerec', $typerec);
    $query->bindValue(':statut', $statut);
    $query->bindValue(':idrec', $idrec);
    $query->execute();
    header('location:backendTalel.php');

    // Rediriger vers la page principale ou afficher un message de succès
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["form2_submit"])) {
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
    $query = $access->prepare('UPDATE reponse SET Descrep = :descrep, IDrec = :idrec WHERE IDrep = :idrep');
    $query->bindValue(':idrep', $idrep);
    $query->bindValue(':descrep', $descrep);
    $query->bindValue(':idrec', $idrec);
    $query->execute();
    header('location:backendTalel.php');

    // Rediriger vers la page principale ou afficher un message de succès
    exit();
}

?>