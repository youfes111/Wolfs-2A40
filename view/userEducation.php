<script>
function validateForm() {

 
    
let photo = document.getElementById('profile-photo').value.trim();
let emplacement = document.getElementById('emplacement').value.trim();
let bac = document.getElementById('baccalaureat').value.trim();
let etudiant = document.getElementById('etudiant').value.trim();
let diplome = document.getElementById('diplome').value.trim();

let isValid = true;


if (photo === '') {
    isValid = false;
    setErrorFor(document.getElementById('profile-photo'), 'Le photo  ne doit pas etre vide');
    
} else
{
    setSuccessFor(document.getElementById('profile-photo'));
}

// Validation pour le emplacement 
if (emplacement === 'Sélectionnez un emplacement') {
    isValid = false;
    setErrorFor(document.getElementById('emplacement'), 'Sélectionnez un emplacement !!!!');

} 
else{
    setSuccessFor(document.getElementById('emplacement'));

}
if (diplome === '') {
  isValid = false;
  setErrorFor(document.getElementById('diplome'), 'Sélectionnez un diplome !!!!');

} 
else{
  setSuccessFor(document.getElementById('diplome'));

}
return false;

}
</script>
<?php
require '../controler/educationc.php';
require '../Model/education.php';
require '../Model/login.php';

$conn = config::getConnexion();
 


$user = $_GET['user'];
$mdp = $_GET['mdp'];

$mdp = str_replace('$', '', $mdp);



$query = $conn->prepare("SELECT user, userPrenom, email FROM login WHERE user =:user  and mdp =:mdp ");

$query->bindParam(':user', $user);
$query->bindParam(':mdp', $mdp);
$query->execute();
$result = $query->fetchAll();

if ($result) {
    // Set the retrieved values to the variables
    $name = $result[0]['user'];
    $prenom = $result[0]['userPrenom'];
    $email = $result[0]['email'];
}




if(isset($_POST['enregistrer_education'])) {
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></>
    <script src="educationjs.js"></script>
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
            <form method="POST" enctype="multipart/form-data" id="test_ajouter" onsubmit="return validateForm();" >
                    <div class="form-group">
                        <label for="profile-photo">Photo de profil:</label>
                        <input type="file" id="profile-photo" name="profile_photo" onchange="previewProfilePhoto(event)">
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
                       <input type="radio" id="etudiant" name="etat" value="etudiant"> Étudiant</label>
                       <input type="radio" id="baccalaureat" name="etat" value="baccalaureat"> Baccalauréat</label>
                    </div>
                    <div class="diploma-container">
                        <div class="form-group">
                            <label for="emplacement">Emplacement:</label>
                            <select id="emplacement" name="emplacement">
        <option value="Selectionnez">Sélectionnez un emplacement</option>
        <option value=" Ariana">Ariana</option>
        <option value="Béja">Béja</option>
        <option value="Ben Arous">Ben Arous</option>
        <option value="Bizerte">Bizerte</option>
        <option value="Gabès">Gabès</option>
        <option value="Gafsa">Gafsa</option>
        <option value="Jendouba">Jendouba</option>
        <option value="Kairouan">Kairouan</option>
        <option value="Kasserine">Kasserine</option>
        <option value="Kébili">Kébili</option>
        <option value="Le Kef">Le Kef</option>
        <option value="Mahdia">Mahdia</option>
        <option value="La Manouba">La Manouba</option>
        <option value="Médenine">Médenine</option>
        <option value="Monastir">Monastir</option>
        <option value="Nabeul">Nabeul</option>
        <option value="Sfax">Sfax</option>
        <option value="Sidi Bouzid">Sidi Bouzid</option>
        <option value="Siliana">Siliana</option>
        <option value="Sousse">Sousse</option>
        <option value="Tataouine">Tataouine</option>
        <option value="Tozeur">Tozeur</option>
        <option value="Tunis">Tunis</option>
        <option value="Zaghouan">Zaghouan</option>
    </select>
</div>
                    <div class="form-group">
                        <label>Diplôme:</label>
                        <input type="text" id="diplome" name="diplome" value="<?php echo $_GET['added_id'] ?? ''; ?>"readonly>
                    </div>
                    <button id="ajouter-diplome-button" type="button">Ajouter un diplôme</button>
                    <button type="submit" name="enregistrer_education">Enregistrer</button>
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
    window.location.href = 'diplome.php?user=<?php echo $user ?>&mdp=<?php echo $mdp ?>';
});
    </script>
</body>

</html>