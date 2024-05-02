
    <?php

require("C:/xampp/htdocs/PROJET WEB NOUHA/config/connexion.php");

// Fonction de validation du formulaire
function validateForm($programme, $domaine, $niveau, $bac,$nbplace, $frais, $bourse, $idpart, $img)
{
    $errors = array();

    // Validation du champ Nom partenaire
    if (empty($programme)) {
        $errors[] = "Le champ programme est obligatoire.";
    }

    // Validation du champ Pays
    if (empty($domaine)) {
        $errors[] = "Le champ domaine est obligatoire.";
    }

    // Validation du champ Ville
    if (empty($niveau)) {
        $errors[] = "Le champ niveau est obligatoire.";
    }

    // Validation du champ Email partenaire
    
    if (empty($bac)) {
        $errors[] = "Le champ bac partenaire est obligatoire.";
    }

    // Validation du champ Pays
    if (empty($nbplace)) {
        $errors[] = "Le champ nbplace est obligatoire.";
    }

    // Validation du champ Ville
    if (empty($frais)) {
        $errors[] = "Le champ frais est obligatoire.";
    }
    if (empty($bourse)) {
        $errors[] = "Le champ bourse est obligatoire.";
    }

    // Validation du champ Pays
    if (empty($idpart)) {
        $errors[] = "Le champ idpart est obligatoire.";
    }
    if (empty($img)) {
        $errors[] = "Le champ image est obligatoire.";
    }

  
    return $errors;
}

// Vérifier si le formulaire de modification a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les valeurs mises à jour à partir de la superglobale $_POST
    $programme = $_POST['programme'];
    $domaine = $_POST['domaine'];
    $niveau = $_POST['niveau'];
    $bac = $_POST['bac'];
    $nbplace = $_POST['nbplace'];
    $frais = $_POST['frais'];
    $bourse = $_POST['bourse'];
    $idpart = $_POST['idpart'];
    $img = $_POST['img'];
    $idoffre = $_POST['idoffre'];

    // Validation du formulaire
    $errors = validateForm($programme, $domaine, $niveau, $bac,$nbplace, $frais, $bourse, $idpart, $img);


    // Si aucune erreur de validation n'est détectée, procéder à la mise à jour dans la base de données
    if (empty($errors)) {
        // Effectuer la mise à jour dans la base de données
        $query = $access->prepare('UPDATE offre SET programme = :programme, domaine = :domaine, niveau = :niveau, bac = :bac, NbPlace = :nbplace, frais = :frais, bourse = :bourse, IDpart = :idpart, img = :img WHERE IDoffre = :idoffre');
        $query->bindValue(':programme', $programme);
        $query->bindValue(':domaine', $domaine);
        $query->bindValue(':niveau', $niveau);
        $query->bindValue(':bac', $bac);
        $query->bindValue(':nbplace', $nbplace);
        $query->bindValue(':frais', $frais);
        $query->bindValue(':bourse', $bourse);
        $query->bindValue(':idpart', $idpart);
        $query->bindValue(':img', $img);
        $query->bindValue(':idoffre', $idoffre);
        $query->execute();

        // Rediriger vers la page principale ou afficher un message de succès
        header('Location: backendNouha.php?sup');
        exit();
    } else {
        // Afficher les erreurs de validation
        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }
    }
}
?>