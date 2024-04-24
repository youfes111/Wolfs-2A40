<?php
require '../config/connexion.php' ;

function ajouter($idlangue, $iduser, $idniveau, $duree)
{
    require("connexion.php");

    if ($access) {
        $req = $access->prepare("INSERT INTO formation(idlangue, iduser, idniveau, duree) VALUES (?, ?, ?, ?)");
        $req->execute(array($idlangue, $iduser, $idniveau, $duree));
        $rowCount = $req->rowCount(); // Récupère le nombre de lignes affectées

        if ($rowCount > 0) {
            echo '<script>alert("Ajout réussi");</script>';
        } else {
            echo '<script>alert("Erreur d  ajout");</script>';
        }

        $req->closeCursor();
    }
}
function afficher()
{
    if(require("connexion.php"))
    {
        $req=$access->prepare("SELECT * FROM formation ORDER BY idlangue DESC");
        $req->execute();
        $data=$req->fetchAll(PDO::FETCH_OBJ);
        return $data;
        $req->closeCursor();
    }
}

function supprimer($idlangue)
{
    if(require("connexion.php"))
    {
        $req=$access->prepare("DELETE FROM formation WHERE idlangue=?");
        $req->execute(array($idlangue));

        $req->execute();
        $data=$req->fetchAll(PDO::FETCH_OBJ);
        return $data;
        $req->closeCursor();
    }
}

?>