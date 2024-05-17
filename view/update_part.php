<?php

require("C:/xampp/htdocs/projet_v5/config/connexion.php");

// Fonction de validation du formulaire
function validateForm($nompart, $pays, $adresse, $emailpart)
{
    $errors = array();

    // Validation du champ Nom partenaire
    if (empty($nompart)) {
        $errors[] = "Le champ Nom partenaire est obligatoire.";
    }

    // Validation du champ Pays
    if (empty($pays)) {
        $errors[] = "Le champ Pays est obligatoire.";
    }

    // Validation du champ Ville
    if (empty($adresse)) {
        $errors[] = "Le champ Adresse est obligatoire.";
    }

    // Validation du champ Email partenaire
    if (empty($emailpart)) {
        $errors[] = "Le champ Email partenaire est obligatoire.";
    } elseif (!filter_var($emailpart, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Le champ Email partenaire n'est pas valide.";
    }

    return $errors;
}

// Vérifier si le formulaire de modification a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les valeurs mises à jour à partir de la superglobale $_POST
    $idpart = $_POST['idpart'];
    $nompart = $_POST['nompart'];
    $pays = $_POST['pays'];
    $adresse = $_POST['adresse'];
    $emailpart = $_POST['emailpart'];

    // Validation du formulaire
    $errors = validateForm($nompart, $pays, $adresse, $emailpart);

    // Si aucune erreur de validation n'est détectée, procéder à la mise à jour dans la base de données
    if (empty($errors)) {
        // Effectuer la mise à jour dans la base de données
        $query = $access->prepare('UPDATE partenariat SET NomPart = :nompart, pays = :pays, adresse = :adresse, EmailPart = :emailpart WHERE IDpart = :idpart');
        $query->bindValue(':nompart', $nompart);
        $query->bindValue(':pays', $pays);
        $query->bindValue(':adresse', $adresse);
        $query->bindValue(':emailpart', $emailpart);
        $query->bindValue(':idpart', $idpart);
        $query->execute();

        // Rediriger vers la page principale ou afficher un message de succès
        header('Location: backendNouha.php');
        exit();
    } else {
        // Afficher les erreurs de validation
        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }
    }
}
?>