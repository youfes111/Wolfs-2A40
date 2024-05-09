<?php
require_once '../config.php' ;
class formationC{





    public function logOperation($operation, $item_id) {
        $sql = "INSERT INTO crud_log (operation, item_id) VALUES (:operation, :item_id)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':operation', $operation);
            $query->bindParam(':item_id', $item_id);
            $query->execute();
            echo $query->rowCount() . " record logged successfully <br>";
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    public function fetchLogEntries() {
        try {
            $db = config::getConnexion();
            $stmt = $db->query("SELECT * FROM crud_log ORDER BY timestamp DESC");
            $log_entries = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $log_entries;
        } catch(PDOException $e) {
            echo "Error fetching log entries: " . $e->getMessage();
            return false;
        }
    }

    public function switchEtat($id_formation,$etat){
        $sql = "UPDATE formation SET etat=:etat  WHERE id_formation = :id_formation";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':id_formation', $id_formation);
            $query->bindParam(':etat', $etat);
            $query->execute();
           /* $result = $query->fetchAll(PDO::FETCH_ASSOC); // Assurez-vous de récupérer les données sous forme de tableau associatif
            return $result;*/
            //cho $query->rowCount() . " records UPDATED successfully <br>";
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function getFormationByEtat1($etat){
        $sql = "SELECT * FROM formation WHERE etat=:etat";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':etat', $etat);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC); // Assurez-vous de récupérer les données sous forme de tableau associatif
            $tableHTML = '<table class="table">';
            $tableHTML .= '<thead>';
            $tableHTML .= '<tr>';
            $tableHTML .= '<th>id formation</th>';
            $tableHTML .= '<th>Langue</th>';
            $tableHTML .= '<th>Niveau</th>';
            $tableHTML .= '<th>Date de debut</th>';
            $tableHTML .= '<th>Date de fin</th>';
            $tableHTML .= '<th>Durée</th>';
            $tableHTML .= '<th>Prix</th>';
            $tableHTML .= '<th>Titre</th>';
            $tableHTML .= '<th>Description</th>';
            $tableHTML .= '</tr>';
            $tableHTML .= '</thead>';
            $tableHTML .= '<tbody>';
    
            foreach ($result as $row) {
                $tableHTML .= '<tr>';
                $tableHTML .= '<td>' . $row['id_formation'] . '</td>';
                $tableHTML .= '<td>' . $row['langue'] . '</td>';
                $tableHTML .= '<td>' . $row['niveau'] . '</td>';
                
                $tableHTML .= '<td>' . $row['date_de_debut'] . '</td>';
                $tableHTML .= '<td>' . $row['date_de_fin'] . '</td>';
                $tableHTML .= '<td>' . $row['duree'] . '</td>';
                $tableHTML .= '<td>' . $row['prix'] . '</td>';
                $tableHTML .= '<td>' . $row['titre'] . '</td>';
                $tableHTML .= '<td>' . $row['description'] . '</td>';
                $tableHTML .= '<td><a href="delete_formation.php?id='.$row['id_formation'].'"> <i class="fas fa-trash-alt icon"></i> </a></td>';
                $tableHTML .= '<td><a href="restaurer_formation.php?id='.$row['id_formation'].'"> <i class="fas fa-trash-alt icon"></i> </a></td>';
                $tableHTML .= '</tr>';
            }
    
            $tableHTML .= '</tbody>';
            $tableHTML .= '</table>';
    
            return $tableHTML;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function getFormationByEtat($etat){
        $sql = "SELECT * FROM formation WHERE etat=:etat";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':etat', $etat);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC); // Assurez-vous de récupérer les données sous forme de tableau associatif
            $tableHTML = '<table class="table id="formationTab" ">';
            $tableHTML .= '<thead>';
            $tableHTML .= '<tr>';
            $tableHTML .= '<th>id formation</th>';
            $tableHTML .= '<th>Langue</th>';
            $tableHTML .= '<th>Niveau</th>';
            $tableHTML .= '<th>Date de debut</th>';
            $tableHTML .= '<th>Date de fin</th>';
            $tableHTML .= '<th>Durée</th>';
            $tableHTML .= '<th>Prix</th>';
            $tableHTML .= '<th>Titre</th>';
            $tableHTML .= '<th>Description</th>';
            $tableHTML .= '</tr>';
            $tableHTML .= '</thead>';
            $tableHTML .= '<tbody>';
    
            foreach ($result as $row) {
                $tableHTML .= '<tr>';
                $tableHTML .= '<td>' . $row['id_formation'] . '</td>';
                $tableHTML .= '<td>' . $row['langue'] . '</td>';
                $tableHTML .= '<td>' . $row['niveau'] . '</td>';
                $tableHTML .= '<td>' . $row['date_de_debut'] . '</td>';
                $tableHTML .= '<td>' . $row['date_de_fin'] . '</td>';
                $tableHTML .= '<td>' . $row['duree'] . '</td>';
                $tableHTML .= '<td>' . $row['prix'] . '</td>';
                $tableHTML .= '<td>' . $row['titre'] . '</td>';
                $tableHTML .= '<td>' . $row['description'] . '</td>';
                $tableHTML .= '<td><a href="update_formation.php?id='.$row['id_formation'].'"> <i class="fas fa-edit icon"></i> </a> </td>';
                $tableHTML .= '<td><a href="goToTrash.php?id='.$row['id_formation'].'"> <i class="fas fa-trash-alt icon"></i> </a></td>';
                $tableHTML .= '</tr>';
            }
    
            $tableHTML .= '</tbody>';
            $tableHTML .= '</table>';
    
            return $tableHTML;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }





























    public function list_formations(){
        $conn = config::getConnexion();
        try {
            // Modify the SQL query to join the formation table with the niveau table
            $query = $conn->prepare("SELECT formation.*, niveau.certificat, niveau.organisme, niveau.score FROM formation INNER JOIN niveau ON formation.niveau = niveau.id_niveau");
            $query->execute();
            $result = $query->fetchAll();
            $tableHTML = '<table class="table">';
            $tableHTML .= '<thead>';
            $tableHTML .= '<tr>';
            $tableHTML .= '<th>id formation</th>';
            $tableHTML .= '<th>Langue</th>';
            $tableHTML .= '<th>Niveau</th>';
            $tableHTML .= '<th>Certificat</th>';
            $tableHTML .= '<th>Organisme</th>';
            $tableHTML .= '<th>Score</th>';
            $tableHTML .= '<th>Date de debut</th>';
            $tableHTML .= '<th>Date de fin</th>';
            $tableHTML .= '<th>Durée</th>';
            $tableHTML .= '<th>Prix</th>';
            $tableHTML .= '<th>Titre</th>';
            $tableHTML .= '<th>Description</th>';
            $tableHTML .= '</tr>';
            $tableHTML .= '</thead>';
            $tableHTML .= '<tbody>';
    
            foreach ($result as $row) {
                $tableHTML .= '<tr>';
                $tableHTML .= '<td>' . $row['id_formation'] . '</td>';
                $tableHTML .= '<td>' . $row['langue'] . '</td>';
                $tableHTML .= '<td>' . $row['niveau'] . '</td>';
                $tableHTML .= '<td>' . $row['certificat'] . '</td>';
                $tableHTML .= '<td>' . $row['organisme'] . '</td>';
                $tableHTML .= '<td>' . $row['score'] . '</td>';
                $tableHTML .= '<td>' . $row['date_de_debut'] . '</td>';
                $tableHTML .= '<td>' . $row['date_de_fin'] . '</td>';
                $tableHTML .= '<td>' . $row['duree'] . '</td>';
                $tableHTML .= '<td>' . $row['prix'] . '</td>';
                $tableHTML .= '<td>' . $row['titre'] . '</td>';
                $tableHTML .= '<td>' . $row['description'] . '</td>';
                $tableHTML .= '<td><a href="update_formation.php?id='.$row['id_formation'].'"> <i class="fas fa-edit icon"></i> </a> </td>';
                $tableHTML .= '<td><a href="delete_formation.php?id='.$row['id_formation'].'"> <i class="fas fa-trash-alt icon"></i> </a></td>';
                $tableHTML .= '</tr>';
            }
    
            $tableHTML .= '</tbody>';
            $tableHTML .= '</table>';
    
            return $tableHTML;
        } catch (Exeption $e) {
            die('Error : ' . $e->getMessage());
            return "";
        }   
    }
    
    public function deleteFormation($id_formation)
    {
        $conn = config::getConnexion();
        try {
            $query = $conn->prepare("DELETE FROM formation WHERE id_formation = :id_formation");
            $query->bindParam(':id_formation', $id_formation);
            $query->execute();
            if ($query->rowCount() > 0) {
                $this->logOperation("DELETE", $id_formation); // Log the "DELETE" operation
            }
            return true;
        } catch (PDOException $e) {
            echo 'Error deleting formation: ' . $e->getMessage();
            return false;
        }
    }
    public function ajouterFormation($langue, $niveau, $date_de_debut, $date_de_fin, $duree, $prix, $titre, $description)
        {
            $conn = config::getConnexion();
            try {
                // Prepare SQL statement to insert formation data
                $query = $conn->prepare("INSERT INTO formation (langue, niveau, date_de_debut, date_de_fin, duree, prix, titre, description ,etat) 
                                        VALUES (:langue, :niveau, :date_de_debut, :date_de_fin, :duree, :prix, :titre, :description , 'nonsuprime')");

                // Bind parameters
                $query->bindParam(':langue', $langue);
                $query->bindParam(':niveau', $niveau);
                $query->bindParam(':date_de_debut', $date_de_debut);
                $query->bindParam(':date_de_fin', $date_de_fin);
                $query->bindParam(':duree', $duree);
                $query->bindParam(':prix', $prix);
                $query->bindParam(':titre', $titre);
                $query->bindParam(':description', $description);

                // Execute the query
                $query->execute();
                $item_id = $conn->lastInsertId(); // Get the ID of the inserted item
         
                if ($query->rowCount() > 0) {
                    //$item_id = $conn->lastInsertId(); // Get the ID of the inserted item
                    $this->logOperation("ADD", $item_id); // Log the "ADD" operationoperation
                }
                // Return true if insertion was successful
                return true;
            } catch (PDOException $e) {
                // Log and return false if insertion fails
                error_log('Error inserting formation: ' . $e->getMessage());
                return false;
            }
        }

        public function getFormation($id_formation)
        {
            $conn = config::getConnexion();
            try {
                // Prepare SQL statement to retrieve formation data
                $query = $conn->prepare("SELECT * FROM formation WHERE id_formation = :id_formation");
        
                // Bind parameter
                $query->bindParam(':id_formation', $id_formation);
        
                // Execute the query
                $query->execute();
        
                // Fetch the formation data
                $formation = $query->fetch(PDO::FETCH_ASSOC);
        
                // Return the formation data
                return $formation;
            } catch (PDOException $e) {
                // Log and return false if retrieval fails
                error_log('Error retrieving formation: ' . $e->getMessage());
                return false;
            }
        }
        
    public function updateFormation($id_formation,$langue,$niveau,$date_de_debut,$date_de_fin,$duree,$prix,$titre,$description)
    {
        $conn = config::getConnexion();
        try {
            // Prepare SQL statement to update voyage data
            $query = $conn->prepare("UPDATE formation  SET langue = :langue, niveau = :niveau, date_de_debut = :date_de_debut, date_de_fin = :date_de_fin, duree = :duree,  prix = :prix,  titre = :titre, description = :description WHERE id_formation = :id_formation");

            // Bind parameters
            $query->bindParam(':id_formation', $id_formation);
            $query->bindParam(':langue', $langue);
            $query->bindParam(':niveau', $niveau);
            $query->bindParam(':date_de_debut', $date_de_debut);
            $query->bindParam(':date_de_fin', $date_de_fin);
            $query->bindParam(':duree', $duree);
            $query->bindParam(':prix', $prix);
            $query->bindParam(':titre', $titre);
            $query->bindParam(':description', $description);

            // Execute the query
            $query->execute();
            if ($query->rowCount() > 0) {
                $this->logOperation("UPDATE", $id_formation); // Log the "UPDATE" operation
            }
            // Return true if update was successful
            return true;
        } catch (PDOException $e) {
            // Log and return false if update fails
            error_log('Error updating voyage: ' . $e->getMessage());
            return false;
        }   
    }

    public function generateFormationStatistics() {
        $conn = config::getConnexion();
        try {
            // Count of Formations by Language
            $query = $conn->prepare("SELECT langue, COUNT(*) as formation_count FROM formation GROUP BY langue");
            $query->execute();
            $formationCountByLanguage = $query->fetchAll();
    
            // Total Duration of Formations by Language
            $query = $conn->prepare("SELECT langue, SUM(duree) as total_duration FROM formation GROUP BY langue");
            $query->execute();
            $totalDurationByLanguage = $query->fetchAll();
    
            // Average Price of Formations by Language
            $query = $conn->prepare("SELECT langue, AVG(prix) as avg_price FROM formation GROUP BY langue");
            $query->execute();
            $averagePriceByLanguage = $query->fetchAll();
    
            // Return the statistics
            return array(
                'formation_count_by_language' => $formationCountByLanguage,
                'total_duration_by_language' => $totalDurationByLanguage,
                'average_price_by_language' => $averagePriceByLanguage
            );
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return null;
        }
    }
    
}
?>