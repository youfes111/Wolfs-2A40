<?php
require 'C:/xampp/htdocs/projet_v5/config.php';
class loginc{
    function checkUserExists($user, $mdp) {
        $sql = "SELECT * FROM LOGIN WHERE user = :username";
        $db = config::getConnexion();
    
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':username', $user);
            $query->execute();
    
            $login = $query->fetch(PDO::FETCH_ASSOC);
    
            if ($login && password_verify($mdp, $login['mdp'])) {
                return true;
            } else if ($login && !password_verify($mdp, $login['mdp'])) {
                echo 'Mot de passe incorrect';
                return false;
            } else {
                echo 'L\'utilisateur n\'existe pas dans la base de données';
                return false;
            }
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
   public static function deleteuser($id) {
        $db = config::getConnexion();
        $sql = "DELETE FROM login WHERE idUser = :id";
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->execute();
            
        } catch(Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    public static function addaccount($userNom,$userPrenom,$email,$mdp) {
        $db = config::getConnexion();
        $sql = "INSERT INTO LOGIN (user,userPrenom,email,mdp) VALUES (:user,:userPrenom,:email,:mdp)";
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':user', $userNom, PDO::PARAM_STR);
            $query->bindParam(':userPrenom', $userPrenom, PDO::PARAM_STR);
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->bindParam(':mdp', $mdp, PDO::PARAM_STR);
            $query->execute();
            
        } catch(Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    public static function updateUser($id, $nom, $prenom, $email, $mdp_hash, $id_education, $photoString, $Etat, $emplacement, $id_diplome, $nom_diplome, $documentString, $Moyenne, $date)
    {
        $conn = config::getConnexion();
      
            try {
                $query = $conn->prepare("
                    UPDATE education AS e
                    JOIN login AS l ON l.idUser = e.ID_USER_E
                    JOIN diplome AS d ON e.ID_Diplome_E = d.ID_DIPLOME
                    SET l.user = :nom, l.userPrenom = :prenom, l.email = :email, l.mdp = :dob,
                        e.photo = :photo, e.Etat = :Etat, e.emplacement = :emplacement,
                        d.nom = :nom_diplome, d.document = :document, d.Moyenne = :Moyenne, d.date_diplome = :date_diplome
                    WHERE  l.idUser = :id 
                     
                ");
    //e.ID_Education = :id_education    AND e.ID_Diplome_E = :id_diplome  AND
 
             //   $query->bindParam(':id_education', $id_education, PDO::PARAM_INT);
              //  $query->bindParam(':id_diplome', $id_diplome, PDO::PARAM_INT);
                $query->bindParam(':id', $id, PDO::PARAM_INT);
                $query->bindParam(':nom', $nom, PDO::PARAM_STR);
                $query->bindParam(':prenom', $prenom, PDO::PARAM_STR);
                $query->bindParam(':email', $email, PDO::PARAM_STR);
                $query->bindParam(':dob', $mdp_hash, PDO::PARAM_STR);
                $query->bindParam(':photo', $photoString, PDO::PARAM_STR);
                $query->bindParam(':Etat', $Etat, PDO::PARAM_STR);
                $query->bindParam(':emplacement', $emplacement, PDO::PARAM_STR);
                $query->bindParam(':nom_diplome', $nom_diplome, PDO::PARAM_STR);
                $query->bindParam(':document', $documentString, PDO::PARAM_STR);
                $query->bindParam(':Moyenne', $Moyenne, PDO::PARAM_STR);
                $query->bindParam(':date_diplome', $date, PDO::PARAM_STR);
        
                $query->execute();
            } catch (Exception $e) {
                echo $e->getMessage();
            }
    }
    public static function checkadmin($userName)
{
    $sql = "SELECT * FROM LOGIN WHERE user = :username";
    $db = config::getConnexion();

    try {
        $query = $db->prepare($sql);
        $query->bindParam(':username', $userName);
        $query->execute();

        $result = $query->fetch(PDO::FETCH_ASSOC);

        if ($result && $result['user'] == "admin") {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}
    public static function listlogin()
    {
        $conn = config::getConnexion();
  try {
    $query = $conn->prepare("
    SELECT l.*, e.* ,d.*
    FROM login l
    JOIN education e ON l.idUser = e.ID_USER_E
    JOIN diplome d ON e.ID_Diplome_E = d.ID_DIPLOME
    WHERE l.etat = 0
");
    $query->execute();
    $result = $query->fetchAll();
  } catch (PDOException $e) {
    echo 'echec de connexion:' . $e->getMessage();
  }

 return $result;
    }
    function selectLogin($userId) {
      
        try {
            $sql = "SELECT l.*, d.*,e.*
            FROM login l
            JOIN education e ON l.idUser = e.ID_USER_E
            JOIN diplome d ON e.ID_Diplome_E = d.ID_DIPLOME
            WHERE l.idUser = :userId";
            $conn = config::getConnexion();
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
            $stmt->execute();
    
            $userDetails = $stmt->fetch(PDO::FETCH_ASSOC);
    
            return $userDetails;
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public static function selectuser($user) {
        
        try {
            $sql = "
            SELECT l.*, e.Etat,e.emplacement, d.nom,d.date_diplome
            FROM login l
            JOIN education e ON l.idUser = e.ID_USER_E
            JOIN diplome d ON e.ID_Diplome_E = d.ID_DIPLOME
            WHERE l.user=:user ";
        
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
    
    public static function selectuser1($user) {
        
        try {
            $sql = "SELECT * FROM login WHERE user = :user";
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
    public function isEmailUnique($email) {
        try {
            $sql = "SELECT * FROM login WHERE email = :email";
            $conn = config::getConnexion();
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
    
            $rowCount = $stmt->rowCount();
    
            if ($rowCount === 0) {
                return true;
            } else {
                
                return false;
            }
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            // return false;
        }
    }
    function selectemail($email) {
        
        try {
            $sql = "SELECT * FROM login WHERE email = :email";
            $conn = config::getConnexion();
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
    
             $rowCount = $stmt->rowCount();

             if( $rowCount > 0){
              return true;
             }else{
               return false;
             }          
             
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            
        }
    }
    function updatepass($pass,$email) {
        
        try {
            $sql =  "UPDATE login SET mdp='$pass' WHERE email='$email'";
            $conn = config::getConnexion();
            $stmt = $conn->prepare($sql);
            $stmt->execute();
    
                    
             
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            
        }
    }
    function updatebloque($id) {
        
        try {
            $sql ="UPDATE login SET bloquage=1 WHERE idUser='$id'";
            $conn = config::getConnexion();
            $stmt = $conn->prepare($sql);
            $stmt->execute();
    
                    
             
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            
        }
    }
    function updatedebloque($id) {
        
        try {
            $sql ="UPDATE login SET bloquage=0 WHERE idUser='$id'";
            $conn = config::getConnexion();
            $stmt = $conn->prepare($sql);
            $stmt->execute();
    
                    
             
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            
        }
    }
    function totalusers() {
        
        try {
            $sql = "SELECT COUNT(*) FROM login";
            $conn = config::getConnexion();
            $stmt = $conn->prepare($sql);
            $stmt->execute();
    
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;     
             
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            
        }
    }
    function totalusersbloquer() {
        
        try {
            $sql = "SELECT COUNT(*) FROM login where bloquage=1";
            $conn = config::getConnexion();
            $stmt = $conn->prepare($sql);
            $stmt->execute();
    
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;     
             
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            
        }
    }


    public static function selectPDF($user) {
        
        try {
            $sql = "
            SELECT l.*, e.*, d.*
            FROM login l
            JOIN education e ON l.idUser = e.ID_USER_E
            JOIN diplome d ON e.ID_Diplome_E = d.ID_DIPLOME
            WHERE l.user=:user ";
        
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
    
    public static function selectoffre($user) {
        try {
            $sql = "SELECT o.NomPart, o.programme,o.domaine ,x.ETAT FROM offre_user x
                    JOIN offre o ON o.IDoffre = x.ID_OFFRE
                    JOIN login l ON l.idUser = x.ID_USER
                    WHERE l.user=:user";
            $conn = config::getConnexion();
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':user', $user, PDO::PARAM_INT);
            $stmt->execute();
    
            $userDetails = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            return $userDetails;
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    
}

   



?>