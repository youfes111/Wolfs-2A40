<?php
require '../config.php';
class diplomec{
 
   public static function deletediplome($id) {
   
        $db = config::getConnexion();
        $sql = "DELETE FROM diplome WHERE ID_DIPLOME = :id";
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->execute();
            
        } catch(Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public static function adddiplome($nom, $document, $moyenne, $date_diplome)
{
    $conn = config::getConnexion();
    try {
        $sql = "INSERT INTO diplome (nom, document, Moyenne, date_diplome) VALUES (:nom, :document, :moyenne, :date_diplome)";
        $query = $conn->prepare($sql);
        
        $query->bindParam(':nom', $nom, PDO::PARAM_STR);
        $query->bindParam(':document', $document, PDO::PARAM_STR);
        $query->bindParam(':moyenne', $moyenne, PDO::PARAM_STR);
        $query->bindParam(':date_diplome', $date_diplome, PDO::PARAM_STR);
        $query->execute();
        
        $lastInsertId = $conn->lastInsertId();
        
        return $lastInsertId;
    } catch (Exception $e) {
        echo $e->getMessage();
        return false;
    }
}
    public static function updatediplome($ID_DIPLOME,$nom, $document, $moyenne, $date_diplome)
    {
        $conn = config::getConnexion();
    try {

        $query = $conn->prepare("UPDATE diplome SET nom=:nom,
       document=:document,Moyenne=:moyenne,date_diplome=:date_diplome  where ID_DIPLOME=:ID_DIPLOME");
       $query->bindParam(':ID_DIPLOME', $ID_DIPLOME, PDO::PARAM_INT);
       $query->bindParam(':nom', $nom, PDO::PARAM_STR);
       $query->bindParam(':document', $document, PDO::PARAM_STR);
       $query->bindParam(':moyenne', $moyenne, PDO::PARAM_STR);
       $query->bindParam(':date_diplome', $date_diplome, PDO::PARAM_STR);

        $query->execute();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    }
   
    public static function listdiplome()
    {
        $conn = config::getConnexion();
  try {
    $query = $conn->prepare("SELECT * from diplome ");
    $query->execute();
    $result = $query->fetchAll();
  } catch (PDOException $e) {
    echo 'echec de connexion:' . $e->getMessage();
  }

 return $result;
    }
    public static function selectdiplome($user) {
        
        try {
            $sql = "SELECT * FROM diplome WHERE ID_DIPLOME = :user";
            $conn = config::getConnexion();
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':user', $user, PDO::PARAM_STR);
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