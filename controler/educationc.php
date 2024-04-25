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
            $query->bindParam(':ID_Diplome_E', $ID_Diplome_E, PDO::PARAM_STR);
            $query->execute();
            
        } catch(Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    public static function updateeducation($ID_EDUCATION,$photo,$Etat,$emplacement,$ID_Diplome_E)
    {
        $conn = config::getConnexion();
    try {

        $query = $conn->prepare("UPDATE education SET photo=:photo,
       Etat=:Etat,emplacement=:emplacement,ID_Diplome_E=:ID_Diplome_E  where ID_Education=:ID_EDUCATION");
       $query->bindParam(':ID_EDUCATION', $ID_EDUCATION, PDO::PARAM_INT);
       $query->bindParam(':photo', $photo, PDO::PARAM_STR);
       $query->bindParam(':Etat', $Etat, PDO::PARAM_STR);
       $query->bindParam(':emplacement', $emplacement, PDO::PARAM_STR);
       $query->bindParam(':ID_Diplome_E', $ID_Diplome_E, PDO::PARAM_STR);

        $query->execute();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    }
   
  
    
    public static function listeducation()
    {
        $conn = config::getConnexion();
  try {
    $query = $conn->prepare("SELECT * from education ");
    $query->execute();
    $result = $query->fetchAll();
  } catch (PDOException $e) {
    echo 'echec de connexion:' . $e->getMessage();
  }

 return $result;
    }

    public static function selecteducation($user) {
        
        try {
            $sql = "SELECT * FROM education WHERE ID_Education = :user";
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