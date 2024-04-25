

<?php 
require '../controler/educationc.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $l=new educationc();
        $id = $_POST['ID_Education'];
        echo $id;
     
                /*$photo = $_FILES['profile_photo']['tmp_name']; // Get the temporary location of the uploaded file
                $photoData = file_get_contents($photo); // Read the contents of the file into a string
                $photoString = base64_encode($photoData);*/
                $photo='';
            
        $Etat = $_POST['etat'];
        $emplacement = $_POST['emplacement'];
        $diplome = $_POST['diplome'];    
       $l->updateeducation($id,$photo, $Etat, $emplacement, $diplome);
        
        header("Location: education_back.php");
      



}

    
    
    
    
    ?>