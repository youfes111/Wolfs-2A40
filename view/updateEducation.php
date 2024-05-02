

<?php 
require '../controler/educationc.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $l=new educationc();
        $id = $_POST['ID_Education'];
        echo $id;
     
               /* $photo = $_FILES['profile_photo']['tmp_name']; // Get the temporary location of the uploaded file
                $photoData = file_get_contents($photo); // Read the contents of the file into a string
                $photoString = base64_encode($photoData);*/
                $photoString='';
             
            
        $Etat = $_POST['etat'];
        $emplacement = $_POST['emplacement'];
        $diplome = $_POST['diplome'];
       // $diplomeValue = $userDetails['ID_Diplome_E'];
        $nom = $_POST['nom_diploma'];
        /*$document = $_FILES['document']['tmp_name'];
        $photodocument = file_get_contents($document);
        $documentString = base64_encode($photodocument);*/
        $documentString='';
        $Moyenne = $_POST['moyenne'];    
        $date = $_POST['date_obtention'];     
       $l->updateeducation($id,$photoString, $Etat, $emplacement, $diplome,$nom, $documentString, $Moyenne, $date);
        
        header("Location: education_back.php");
      



}

    
    
    
    
    ?>