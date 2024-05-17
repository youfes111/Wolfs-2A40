

<?php
require("../config/commandes.php");

require("../config/connexion.php");
// Vérifier si le formulaire de modification a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les valeurs mises à jour à partir de la superglobale $_POST

    $descrep = $_POST['descrep'];
    $idrec = $_POST['idrec'];
   

  
        $req = $access->prepare("INSERT INTO reponse( Descrep, IDrec) VALUES (?, ?)");
        $reqq = $access->query('SELECT * FROM filtre');
        $mots = [];
        $rp = [];
        while ($m = $reqq->fetch()) {
            array_push($mots, $m['mot']);
            $r = "";
            for ($i = 0; $i < strlen($m['mot']); $i++) {
                $r .= '*';
            }
            array_push($rp, $r);
        }
        $descrep = str_replace($mots, $rp, strtolower($descrep));

        $hasNoStar = strpos($descrep, "*") === false;

    if ($hasNoStar) {
        $req->execute(array($descrep, $idrec));
         $query = $access->prepare('UPDATE reclamationsss SET Statut ="répondue" WHERE idrec = :idrec');
        $query->bindValue(':idrec', $idrec);
        $query->execute();
        if ($req->rowCount() > 0) {
           
            echo '<script>alert("Ajout avec succès");</script>';
        } else {
            echo '<script>alert("Ajout échoué!");</script>';
        }
    } 
        

       
       
            
        

        $req->closeCursor();





  header('location:backendTalel.php?msg');



 exit();
  
    // Rediriger vers la page principale ou afficher un message de succès
   
}


?>
