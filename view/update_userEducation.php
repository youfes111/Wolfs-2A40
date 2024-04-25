<?php
require '../controler/educationc.php';

require '../Model/education.php';
require '../Model/login.php';

$conn = config::getConnexion();

// Prepare and execute the query
$query = $conn->prepare("SELECT user, userPrenom, email FROM login WHERE user = 'aymen'");
$query->execute();
$result = $query->fetchAll();

if ($result) {
    // Set the retrieved values to the variables
    $name = $result[0]['user'];
    $prenom = $result[0]['userPrenom'];
    $email = $result[0]['email'];
}



$diplomeValue = "No DIPLOMA provided";

if (isset($_POST['diplome_enregistrer'])) {
    // Retrieve the first diploma from the input field
    if (isset($_POST['diplome']) && !empty($_POST['diplome'])) {
        $diplomeValue = $_POST['diplome'];
    }
}

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
$l=new educationc();

if(isset($_GET['ID_Education'])) {
    $userId = $_GET['ID_Education'];
  
    $userDetails = $l->selecteducation($userId);

    if($userDetails) {
    
        $photo = $userDetails['photo'];
        $Etat = $userDetails['Etat'];
        $emplacement = $userDetails['emplacement'];
        $diplomeValue = $userDetails['ID_Diplome_E'];

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
    <link rel="stylesheet" href="education_css.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" href="10.png">
    <title>StudyGo | Les clients</title>
  
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
            </div>
            <div class="form-container">
                <form method="POST"  enctype="multipart/form-data" action='updateEducation.php'>
                <div class="form-group">
   
    <input type="hidden" id="ID_Education" name="ID_Education" value="<?php echo $userId; ?>" >
</div>
                    <div class="form-group">
                        <label for="profile-photo">Photo de profil:</label>
                        <input type="file" id="profile-photo" name="profile_photo" value="<?php echo $photo; ?>" onchange="previewProfilePhoto(event)  >
                        <img id="profile-photo-preview" class="profile-photo-preview" src="#" alt="Preview" style="display: none;">
                    </div>
                    <div class="form-group">
    <label for="nom">Nom:</label>
    <input type="text" id="nom" name="nom" value="<?php echo $name; ?>" readonly>
</div>
<div class="form-group">
    <label for="prenom">Prénom:</label>
    <input type="text" id="prenom" name="prenom" value="<?php echo $prenom; ?>" readonly>
</div>
<div class="form-group">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo $email; ?>" readonly>
</div>
<div class="form-group">
    <label>État:</label>
    <input type="radio" id="etudiant" name="etat" value="etudiant"<?php if ($Etat === 'etudiant') echo ' checked'; ?>> Étudiant</label>
    <input type="radio" id="baccalaureat" name="etat" value="baccalaureat"<?php if ($Etat === 'baccalaureat') echo ' checked'; ?>> Baccalauréat</label>
</div>
                    <div class="form-group">
                    <label for="emplacement">Emplacement:</label>
<select id="emplacement" name="emplacement">
    <option value="Selectionnez" <?php if ($emplacement == 'Selectionnez') echo 'selected'; ?>>Sélectionnez un emplacement</option>
    <option value="Ariana" <?php if ($emplacement == 'Ariana') echo 'selected'; ?>>Ariana</option>
    <option value="Béja" <?php if ($emplacement == 'Béja') echo 'selected'; ?>>Béja</option>
    <option value="Ben Arous" <?php if ($emplacement == 'Ben Arous') echo 'selected'; ?>>Ben Arous</option>
    <option value="Bizerte" <?php if ($emplacement == 'Bizerte') echo 'selected'; ?>>Bizerte</option>
    <option value="Gabès" <?php if ($emplacement == 'Gabès') echo 'selected'; ?>>Gabès</option>
    <option value="Gafsa" <?php if ($emplacement == 'Gafsa') echo 'selected'; ?>>Gafsa</option>
    <option value="Jendouba" <?php if ($emplacement == 'Jendouba') echo 'selected'; ?>>Jendouba</option>
    <option value="Kairouan" <?php if ($emplacement == 'Kairouan') echo 'selected'; ?>>Kairouan</option>
    <option value="Kasserine" <?php if ($emplacement == 'Kasserine') echo 'selected'; ?>>Kasserine</option>
    <option value="Kébili" <?php if ($emplacement == 'Kébili') echo 'selected'; ?>>Kébili</option>
    <option value="Le Kef" <?php if ($emplacement == 'Le Kef') echo 'selected'; ?>>Le Kef</option>
    <option value="Mahdia" <?php if ($emplacement == 'Mahdia') echo 'selected'; ?>>Mahdia</option>
    <option value="La Manouba" <?php if ($emplacement == 'La Manouba') echo 'selected'; ?>>La Manouba</option>
    <option value="Médenine" <?php if ($emplacement == 'Médenine') echo 'selected'; ?>>Médenine</option>
    <option value="Monastir" <?php if ($emplacement == 'Monastir') echo 'selected'; ?>>Monastir</option>
    <option value="Nabeul" <?php if ($emplacement == 'Nabeul') echo 'selected'; ?>>Nabeul</option>
    <option value="Sfax" <?php if ($emplacement == 'Sfax') echo 'selected'; ?>>Sfax</option>
    <option value="Sidi Bouzid" <?php if ($emplacement == 'Sidi Bouzid') echo 'selected'; ?>>Sidi Bouzid</option>
    <option value="Siliana" <?php if ($emplacement == 'Siliana') echo 'selected'; ?>>Siliana</option>
    <option value="Sousse" <?php if ($emplacement == 'Sousse') echo 'selected'; ?>>Sousse</option>
    <option value="Tataouine" <?php if ($emplacement == 'Tataouine') echo 'selected'; ?>>Tataouine</option>
    <option value="Tozeur" <?php if ($emplacement == 'Tozeur') echo 'selected'; ?>>Tozeur</option>
    <option value="Tunis" <?php if ($emplacement == 'Tunis') echo 'selected'; ?>>Tunis</option>
    <option value="Zaghouan" <?php if ($emplacement == 'Zaghouan') echo 'selected'; ?>>Zaghouan</option>
</select>
                    </div>
                    <div class="form-group">
                        <label>Diplôme:</label>
                        <input type="text" id="diplome" name="diplome" value="<?php echo $diplomeValue; ?>"readonly>
                    </div>
                    <button id="ajouter-diplome-button" type="button">Ajouter un diplôme</button>
                    <button type="submit" name="modification_education">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function previewProfilePhoto(event) {
            var input = event.target;
            var reader = new FileReader();
            reader.onload = function() {
                var dataURL = reader.result;
                var preview = document.getElementById('profile-photo-preview');
                preview.src = dataURL;
                preview.style.display = "block";
            };
            reader.readAsDataURL(input.files[0]);
        }

        document.getElementById('ajouter-diplome-button').addEventListener('click', function() {
    // Load diplome.php
    window.location.href = 'diplome.php';
});
    </script>
</body>

</html>