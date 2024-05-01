<?php
require '../controler/diplomec.php';

require '../Model/diplome.php';
require '../Model/login.php';

$conn = config::getConnexion();

// Prepare and execute the query

// if (isset($_POST['diplome_enregistrer'])) {
//     // Retrieve the first diploma from the input field
//     if (isset($_POST['diplome']) && !empty($_POST['diplome'])) {
//         $diplomeValue = $_POST['diplome'];
//     }
// }

/*if(isset($_POST['enregistrer_education'])) {
    $e = new educationc();
    $l = new education();
    $photoString = ''; // Default value for photo string
  
    if (isset($_FILES['profile_photo']['tmp_name']) && !empty($_FILES['profile_photo']['tmp_name'])) {
        $photo = $_FILES['profile_photo']['tmp_name']; // Get the temporary location of the uploaded file
        $photoData = file_get_contents($photo); // Read the contents of the file into a string
        $photoString = base64_encode($photoData);
    }

    $Etat = $_POST['etat'];
    $emplacement = $_POST['emplacement'];
    $diplome = $_POST['diplome'];

    $e->addeducation($photoString, $Etat, $emplacement, $diplome);

    $diplomeValue = '';

    $e = new educationc();
    $list = $e->listeducation();
}*/
$l=new diplomec();

if(isset($_GET['ID_DIPLOME'])) {
    $userId = $_GET['ID_DIPLOME'];
  
    $userDetails = $l->selectdiplome($userId);

    if($userDetails) {
    
        $nom = $userDetails['nom'];
        $document = $userDetails['document'];
        $Moyenne = $userDetails['Moyenne'];
        $date_diplome = $userDetails['date_diplome'];

    } else {
        echo "User details not found";
    }

    
} else {
    echo "User ID not provided";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="profile.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" href="10.png">
    <title>StudyGo | Les clients</title>
    <style>
        /* Styles for the remaining form fields */
    </style>
</head>

<body>
<div class="wrapper">
        <div class="sidebar">
            <div class="sidebar-header">
                <button class="sidebar-toggle">
                    <img src="Fichier 3 1.png" alt="Toggle Sidebar">
                </button>
            </div>

            <ul class="sidebar-nav">
                <hr>
                <ul class="sidebar-nav">
                    <div class="backend_1">
                        <li><a href="users.php"><i class="lni lni-users"></i> Gérer votre compte</a></li>
                        <li><a href="userEducation.php"><i class="lni lni-users"></i> Consulter votre compte</a></li>
                        <li><a href="login.php">Log out</a></li>
                    </div>
                </ul>
            </ul>
        </div>

        <div class="contenu">
            <div class="navbar">
                <!-- Navbar content -->
            </div>
            <div class="form-container">
                <form method="POST" enctype="multipart/form-data" action='updatediplome.php'>
                    <!-- Remaining form fields for the diploma -->
                   <input type="hidden" id="ID_DIPLOME" name="ID_DIPLOME" value ="<?php echo $userId ; ?>">
                    <div class="diploma-container">
                        <div class="form-group">
                            <label for="nom-diploma-1">Nom du diplôme:</label>
                            <select id="nom-diploma-1" name="nom_diploma">
   
      
    <option value="Select a diploma" <?php if ($nom == 'Select a diploma') echo 'selected'; ?>>Select a diploma</option>
    <option value="Computer Science" <?php if ($nom == 'Computer Science') echo 'selected'; ?>>Computer Science</option>
    <option value="Electrical Engineering" <?php if ($nom == 'Electrical Engineering') echo 'selected'; ?>>Electrical Engineering</option>
    <option value="Mechanical Engineering" <?php if ($nom == 'Mechanical Engineering') echo 'selected'; ?>>Mechanical Engineering</option>
    <option value="Physics" <?php if ($nom == 'Physics') echo 'selected'; ?>>Physics</option>
    <option value="bac math" <?php if ($nom == 'bac_math') echo 'selected'; ?>>bac math</option>
    <option value="bac science" <?php if ($nom == 'bac_science') echo 'selected'; ?>>bac science</option>
    <option value="bac tech" <?php if ($nom == 'bac_tech') echo 'selected'; ?>>bac tech</option>
    <option value="bac eco" <?php if ($nom == 'bac_eco') echo 'selected'; ?>>bac eco</option>
    <option value="bac lettre" <?php if ($nom == 'bac_lettre') echo 'selected'; ?>>bac lettre</option>
   
    </select>
                        </div>
                        <div class="form-group">
                            <label for="document-1">Document (file/pdf):</label>
                            <input type="file" id="document-1" name="document" value="<?php echo $document ?> ">
                        </div>
                      
                    <div class="form-group">
    <label>moyenne : </label>
    <input type="radio" id="moyenne-1" name="moyenne" value="Excellent"<?php if ($Moyenne === 'Excellent') echo ' checked'; ?>> Excellent</label>
    <input type="radio" id="moyenne-2" name="moyenne" value="Très bien"<?php if ($Moyenne === 'Très bien') echo ' checked'; ?>> Très bien</label>
    <input type="radio" id="moyenne-3" name="moyenne" value="Bien"<?php if ($Moyenne === 'Bien') echo ' checked'; ?>> Bien</label>
    <input type="radio" id="moyenne-4" name="moyenne" value="Passable"<?php if ($Moyenne === 'Passable') echo ' checked'; ?>> Passable</label>

</div>
                        <div class="form-group">
                            <label for="date-obtention-1">Date d'obtention:</label>
                            <input type="date" id="date-obtention-1" name="date_obtention" value="<?php echo $date_diplome ?>" >
                        </div>
                    </div>
                    <div>
                    <button type="submit" class="enregistrer_diplome" name="diplome_enregistrer">Enregistrer</button>
                    </div>
                    <button class="add-diploma-button" type="button" onclick="addDiploma()">Ajouter un diplôme</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        function addDiploma() {
            var diplomaContainer = document.querySelector('.diploma-container');
            var diplomaCount = diplomaContainer.children.length / 4; // Each diploma has 4 fields

            var newDiploma = document.createElement('div');
            newDiploma.innerHTML = `
                <div class="form-group">
                    <label for="nom-diploma-${diplomaCount + 1}">Nom du diplôme:</label>
                    <input type="text" id="nom-diploma-${diplomaCount + 1}" name="nom_diploma[]">
                </div>
                <div class="form-group">
                    <label for="document-${diplomaCount + 1}">Document (file/pdf):</label>
                    <input type="file" id="document-${diplomaCount + 1}" name="document[]">
                </div>
                <div class="form-group">
                    <label for="moyenne-${diplomaCount + 1}">Moyenne:</label>
                    <input type="text" id="moyenne-${diplomaCount + 1}" name="moyenne[]">
                </div>
                <div class="form-group">
                    <label for="date-obtention-${diplomaCount + 1}">Date d'obtention:</label>
                    <input type="date" id="date-obtention-${diplomaCount + 1}" name="date_obtention[]">
                </div>
            `;

            diplomaContainer.appendChild(newDiploma);
        }
        


        function addDiploma() {
    var diplomaContainer = document.querySelector('.diploma-container');
    var diplomaCount = diplomaContainer.children.length / 4; // Each diploma has 4 fields

    var newDiploma = document.createElement('div');
    newDiploma.innerHTML = `
        <div class="form-group">
            <label for="nom-diploma-${diplomaCount + 1}">Nom du diplôme:</label>
            <select id="nom-diploma-${diplomaCount + 1}" name="nom_diploma[]">
                <option value="">Select a diploma</option>
                <option value="Computer Science">Computer Science</option>
                <option value="Electrical Engineering">Electrical Engineering</option>
                <option value="Mechanical Engineering">Mechanical Engineering</option>
                <option value="Physics">Physics</option>
                <!-- Add more options here -->
            </select>
        </div>
        <div class="form-group">
            <label for="document-${diplomaCount + 1}">Document (file/pdf):</label>
            <input type="file" id="document-${diplomaCount + 1}" name="document[]">
        </div>
        <div class="form-group">
            <label for="moyenne-${diplomaCount + 1}">Moyenne:</label>
            <input type="text" id="moyenne-${diplomaCount + 1}" name="moyenne[]">
        </div>
        <div class="form-group">
            <label for="date-obtention-${diplomaCount + 1}">Date d'obtention:</label>
            <input type="date" id="date-obtention-${diplomaCount + 1}" name="date_obtention[]">
        </div>
    `;

    diplomaContainer.appendChild(newDiploma);


  
}
    </script>
</body>

</html>