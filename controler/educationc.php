<?php
require '../config.php';
class educationc{
   
   public static function deleteeducation($id) {
        $db = config::getConnexion();
        $sql = "DELETE FROM education WHERE ID_Education = :id";
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->execute();
            
        } catch(Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    public static function addeducation($photo,$Etat,$emplacement,$ID_Diplome_E) {
  
        $db = config::getConnexion();
        $sql = "INSERT INTO education (photo,Etat,emplacement,ID_Diplome_E) VALUES (:photo,:Etat,:emplacement,:ID_Diplome_E)";
        try {
            $query = $db->prepare($sql);
          
            $query->bindParam(':photo', $photo, PDO::PARAM_STR);
            $query->bindParam(':Etat', $Etat, PDO::PARAM_STR);
            $query->bindParam(':emplacement', $emplacement, PDO::PARAM_STR);
            $query->bindParam(':ID_Diplome_E', $ID_Diplome_E, PDO::PARAM_INT);
            $query->execute();
            
        } catch(Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    public function updateeducation($id, $photo, $Etat, $emplacement, $diplome, $nom, $document, $Moyenne, $date)
     {
        try {
            $conn = config::getConnexion();
            
            // Begin transaction
            $conn->beginTransaction();
            
            // Update education and diploma records
            $query = $conn->prepare("
                UPDATE education AS e
                JOIN diplome AS d ON e.ID_Diplome_E = d.ID_DIPLOME
                SET e.photo=:photo, e.Etat=:Etat, e.emplacement=:emplacement, d.nom=:nom, d.document=:document, d.Moyenne=:Moyenne, d.date_diplome=:date_diplome
                WHERE e.ID_Education=:ID_Education
            ");
            $query->bindParam(':photo', $photo, PDO::PARAM_STR);
            $query->bindParam(':Etat', $Etat, PDO::PARAM_STR);
            $query->bindParam(':emplacement', $emplacement, PDO::PARAM_STR);
            $query->bindParam(':nom', $nom, PDO::PARAM_STR);
            $query->bindParam(':document', $document, PDO::PARAM_STR);
            $query->bindParam(':Moyenne', $Moyenne, PDO::PARAM_STR);
            $query->bindParam(':date_diplome', $date, PDO::PARAM_STR);
            $query->bindParam(':ID_Education', $id, PDO::PARAM_INT);
            $query->execute();

            // Commit the transaction
            $conn->commit();

        } catch(PDOException $e) {
            // Rollback the transaction on error
            $conn->rollback();
            echo "Error: " . $e->getMessage();
        }
    }
   
  
    
    public static function listeducation()
    {
        $conn = config::getConnexion();
  try {
    $query = $conn->prepare(" SELECT e.*, d.nom, d.document, d.Moyenne, d.date_diplome
    FROM education e
    JOIN diplome d ON e.ID_Diplome_E = d.ID_DIPLOME");
    $query->execute();
    $result = $query->fetchAll();
  } catch (PDOException $e) {
    echo 'echec de connexion:' . $e->getMessage();
  }

 return $result;
    }

    public static function selecteducation($user) {
        try {
            $sql = "SELECT e.*, d.nom, d.document, d.Moyenne, d.date_diplome
                    FROM education e 
                    JOIN diplome d ON e.ID_Diplome_E = d.ID_DIPLOME 
                    WHERE e.ID_Education = :user";
            $conn = config::getConnexion();
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':user', $user, PDO::PARAM_INT);
            $stmt->execute();
    
            $userDetails = $stmt->fetch(PDO::FETCH_ASSOC);
    
            return $userDetails;
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}

   



?>