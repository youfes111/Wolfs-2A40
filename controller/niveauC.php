<?php
require_once '../config.php';

class niveauC
{
    public function ListNiveaux(){
        $conn = config::getConnexion();
        try {
            $query = $conn->prepare("SELECT * FROM niveau");
            $query->execute();
            $result = $query->fetchAll();
            $tableHTML = '<table >';
            $tableHTML .= '<thead>';
            $tableHTML .= '<tr>';
            $tableHTML .= '<th>ID Niveau</th>';
            $tableHTML .= '<th>Certificat</th>';
            $tableHTML .= '<th>Organisme</th>';
            $tableHTML .= '<th>Score</th>';
            $tableHTML .= '</tr>';
            $tableHTML .= '</thead>';
            $tableHTML .= '<tbody>';
            
            foreach ($result as $row) {
                $tableHTML .= '<tr>';
                $tableHTML .= '<td>'.$row['id_niveau'].'</td>';
                $tableHTML .= '<td>'.$row['certificat'].'</td>';
                $tableHTML .= '<td>'.$row['organisme'].'</td>';
                $tableHTML .= '<td>'.$row['score'].'</td>';
                $tableHTML .= '<td><a href="updateNiveau.php?id='.$row['id_niveau'].'"> <i class="fas fa-edit icon"></i> </a> </td>';
                $tableHTML .= '<td><a href="deleteNiveau.php?id='.$row['id_niveau'].'"> <i class="fas fa-trash-alt icon"></i> </a></td>';
                $tableHTML .= '</tr>';
            }
            
            $tableHTML .= '</tbody>';
            $tableHTML .= '</table>';
            
            return $tableHTML;
        } catch ( Exception $e) {
            die ('Error : ' . $e->getMessage());
            return '';
        }
    }
    
    public function listNiveaux1()
    {
        $conn = config::getConnexion();
        try {
            $query = $conn->prepare("SELECT * FROM `niveau`");
            $query->execute();
            $result = $query->fetchAll();
            return $result;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
            return array();
        }
    }

    public function ajouterNiveau($certificat, $organisme, $score)
    {
        $conn = config::getConnexion();
        try {
            // Prepare SQL statement to insert niveau data
            $query = $conn->prepare("INSERT INTO niveau (certificat, organisme, score) 
                                    VALUES (:certificat, :organisme, :score)");

            // Bind parameters
            $query->bindParam(':certificat', $certificat);
            $query->bindParam(':organisme', $organisme);
            $query->bindParam(':score', $score);

            // Execute the query
            $query->execute();

            // Return true if insertion was successful
            return true;
        } catch (PDOException $e) {
            // Log and return false if insertion fails
            error_log('Error inserting niveau: ' . $e->getMessage());
            return false;
        }
    }

    public function deleteNiveau($id_niveau)
    {
        $conn = config::getConnexion();
        try {
            $query = $conn->prepare("DELETE FROM niveau WHERE id_niveau = :id_niveau");
            $query->bindParam(':id_niveau', $id_niveau);
            $query->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Error deleting niveau: ' . $e->getMessage();
            return false;
        }
    }

    public function getNiveau($id_niveau)
    {
        $conn = config::getConnexion();
        try {
            // Prepare SQL statement to retrieve niveau data
            $query = $conn->prepare("SELECT * FROM niveau WHERE id_niveau = :id_niveau");

            // Bind parameter
            $query->bindParam(':id_niveau', $id_niveau);

            // Execute the query
            $query->execute();

            // Fetch the niveau data
            $niveau = $query->fetch(PDO::FETCH_ASSOC);

            // Return the niveau data
            return $niveau;
        } catch (PDOException $e) {
            // Log and return false if retrieval fails
            error_log('Error retrieving niveau: ' . $e->getMessage());
            return false;
        }
    }

    public function updateNiveau($id_niveau, $certificat, $organisme, $score)
    {
        $conn = config::getConnexion();
        try {
            // Prepare SQL statement to update niveau data
            $query = $conn->prepare("UPDATE niveau SET certificat = :certificat, organisme = :organisme, score = :score WHERE id_niveau = :id_niveau");

            // Bind parameters
            $query->bindParam(':id_niveau', $id_niveau);
            $query->bindParam(':certificat', $certificat);
            $query->bindParam(':organisme', $organisme);
            $query->bindParam(':score', $score);

            // Execute the query
            $query->execute();

            // Return true if update was successful
            return true;
        } catch (PDOException $e) {
            // Log and return false if update fails
            error_log('Error updating niveau: ' . $e->getMessage());
            return false;
        }
    }
}
?>
