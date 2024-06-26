<?php
require '../config.php';
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
    public static function updateUser($id,$nom, $prenom, $email, $mdp)
    {
        $conn = config::getConnexion();
    try {

        $query = $conn->prepare("UPDATE login SET user=:nom,
       userPrenom=:prenom,email=:email,mdp=:dob  where idUser=:id");
       $query->bindParam(':id', $id, PDO::PARAM_STR);
       $query->bindParam(':nom', $nom, PDO::PARAM_STR);
       $query->bindParam(':prenom', $prenom, PDO::PARAM_STR);
       $query->bindParam(':email', $email, PDO::PARAM_STR);
       $query->bindParam(':dob', $mdp, PDO::PARAM_STR);

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
    $query = $conn->prepare("SELECT * from login where etat=0");
    $query->execute();
    $result = $query->fetchAll();
  } catch (PDOException $e) {
    echo 'echec de connexion:' . $e->getMessage();
  }

 return $result;
    }
    function selectLogin($userId) {
        
        try {
            $sql = "SELECT * FROM login WHERE idUser = :userId";
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



}

   



?>