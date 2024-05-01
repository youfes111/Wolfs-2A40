

<?php 
require '../controler/diplomec.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $l=new diplomec();
        $id = $_POST['ID_DIPLOME'];
   
        $nom = $_POST['nom_diploma'];
        $document = $_FILES['document']['tmp_name'];
        $photodocument = file_get_contents($document);
        $documentString = base64_encode($photodocument);
        $Moyenne = $_POST['moyenne'];    
        $date = $_POST['date_obtention'];   
        var_dump($date,$Moyenne);
       $l->updatediplome($id,$nom, $documentString, $Moyenne, $date);
        header("Location: diplome_back.php");
    
        
       
      



}

    
    
    
    
    ?>