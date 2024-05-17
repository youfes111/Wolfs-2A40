
<?php
require '../controler/educationc.php';
require '../Model/education.php';
require '../Model/login.php';
session_start();
$conn = config::getConnexion();
$e=new educationc();
$list=$e->listeducation();



$nom=$_SESSION['user1'];

$query = $conn->prepare("SELECT idUser FROM login WHERE user =:user ");

$query->bindParam(':user', $nom);
$query->execute();
$result = $query->fetchAll();

$idUser = $result[0]['idUser'];


if (isset($_SESSION['iddiplome'])) {
    $iddiplome = $_SESSION['iddiplome'];
   
} else {
    
    $iddiplome = null; 
}
$query = $conn->prepare("SELECT user, userPrenom, email FROM login WHERE idUser=:id ");

$query->bindParam(':id', $idUser);
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

    $e->addeducation($photoString, $Etat, $emplacement, $diplome,$idUser);

    $diplomeValue = '';

    $e = new educationc();
    $list = $e->listeducation();
}
$e = new educationc();
$educationExists = $e->checkIfEducationExists($idUser);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name=viewport content="width=device-width", initial-scale="1.0">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="profile2.css">
   
    <link href="main1.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet1" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" href="10.png">
    <title>StudyGo|Gérer votre compte</title>
   <style>
label {
    display: block;
    font-weight: bold;
}

input[type="file"],
input[type="file"],
input[type="text"],
input[type="email"],
select {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

#ajouter-diplome-button,
button[type="submit"] {
    padding: 10px 20px;
    background-color: #E78D1E;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

#ajouter-diplome-button {
    margin-top: 10px;
}

#ajouter-diplome-button:hover,
button[type="submit"]:hover {
    background-color: #E78D1E;;
}

.profile-photo-preview {
    display: block;
    max-width: 200px;
    margin-top: 10px;
}</style>
 
</head>
<body>
<div class="wrapper">
    
  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('');">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>Completer votre compte</h2>
          </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
          <li><a href="index.php">Acceuil</a></li>
            <li ><a href="front/offres.php">Offres</a></li>
            <li>Completer votre compte</li>
          </ol>
        </div>
      </nav>
    </div>

  <br><br><br>  
 <section id="blog" class="blog">
  <div class="container">
    <div class="row gy-4 posts-list">
    <div class="form-container">
            <?php if ($educationExists) { ?>
                <table border='1' id="my-table" class="my-table">
                
                <thead> <tr><th>ID_Education</th><th>photo</th><th>Etat</th><th>emplacement</th><th>nom</th><th>date_diplome</th><th>Modifier</th><th>Supprimer</th></tr> </thead>
                <tbody>   
                <?php
                        foreach ($list as $educationc) {
                        ?>
                            <tr id="row_<?php echo $educationc['ID_Education']; ?>">
                                <td><?= $educationc['ID_Education']; ?></td>
                                <td><?= substr($educationc['photo'], 0, 20); ?>...</td>
                                <td><?= $educationc['Etat']; ?></td>
                                <td><?= $educationc['emplacement']; ?></td>
            
                                <td><?= $educationc['nom']; ?></td>   
                                 
                                <td><?= $educationc['date_diplome']; ?></td>            
                                <td align="center">
                                    <form method="POST" action="">
    
                                    <input type="button" value="Update" name="bt_update"onclick="window.location.href='update_userEducation.php?ID_Education=<?= $educationc['ID_Education']; ?>'">
                                    </form>
                                </td>
                                <td>
        <form action="deleteEducation.php" method="post" onsubmit="return confirmDelete()">
            <input type="hidden" name="ID_Education" value="<?php echo $educationc['ID_Education']; ?>">
            <button type="submit" name="delete">Delete</button>
        </form>
    </td>              
                            </tr>
                        <?php
                        }
                        ?>
                         </tbody>   
                </table>
            <?php } else { ?>
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

<div class="diploma-container">
                        <div class="form-group">
                            <label for="etat">etat:</label>
                            <select id="etat" name="etat">
       <option value="Bac">Bac</option>
        <option value="Bac+1">Bac+1</option>
        <option value="Bac+2">Bac+2</option>
        <option value="Bac+3">Bac+3</option>
        <option value="Bac+4">Bac+4</option>
        <option value="Bac+5">Bac+5</option>
        <option value="Bac+6">Bac+6</option>
        </select>
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
                        <input type="text" id="diplome" name="diplome" value="<?php echo $iddiplome; ?>">
                    </div>
                    <button id="ajouter-diplome-button" type="button">Ajouter un diplôme</button>
                    <button type="submit" name="enregistrer_education">Enregistrer</button>
                </form>
            </div>
            <?php } ?>

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

  </div>
  </div>
  <!--  -->
  <br>
  <br>
  <br>
  <br><br><br>
  <footer id="footer" class="footer">
  <div class="container">
    <div class="row gy-4">
      <div class="col-lg-5 col-md-12 footer-info">
        <a href="index.html" class="logo d-flex align-items-center">
          <span><img src="Fichier 3 1.png" alt="StudyGo" class="lg"></span>
        </a>
        <p>Si vous souhaitez accomplir des études complètes à l'étranger,
                Veuillez-vous renseigner directement auprès de StudyGo</p>
      </div>
      <div class="col-lg-2 col-6 footer-links">
        <h4>Liens Utiles</h4>
        <ul>
          <li><a href="#">Accueil</a></li>
          <li><a href="#">À propos</a></li>
          <li><a href="#">Services</a></li>
          <li><a href="#">Conditions d'utilisation</a></li>
          <li><a href="#">Politique de confidentialité</a></li>
        </ul>
      </div>
      <div class="col-lg-2 col-6 footer-links">
        <h4>Nos Services</h4>
        <ul>
          <li><a href="#">Web Design</a></li>
          <li><a href="#">Développement Web</a></li>
          <li><a href="#">Gestion de Produit</a></li>
          <li><a href="#">Marketing</a></li>
          <li><a href="#">Design Graphique</a></li>
        </ul>
      </div>
      <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
        <h4>Contactez-nous</h4>
        <p>
        Immeuble Graiet, 4ème étage, Bureau 44, Sfax.<br>Immeuble Nessrine, 2ème étage, Bureau G13, Avenue de l'Union du Maghreb Arabe La Soukra, 2036 Ariana. <br><br>
          <strong>Téléphone :</strong> +216 94 141 491<br>
          <br>
          <strong>Email :</strong> studygo@gmail.com<br>
        </p>
      </div>
    </div>
  </div>
  <div class="container mt-4">
    <div class="copyright">
      &copy; Droits d'auteur <strong><span>Impact</span></strong>. Tous droits réservés.
    </div>
    <div class="credits">
      <!-- Tous les liens dans le pied de page doivent rester intacts. -->
      <!-- Vous pouvez supprimer les liens uniquement si vous avez acheté la version pro. -->
      <!-- Informations sur la licence : https://bootstrapmade.com/license/ -->
      <!-- Achetez la version pro avec un formulaire de contact PHP/AJAX fonctionnel : https://bootstrapmade.com/impact-bootstrap-business-website-template/ -->
      Conçu par <a href="https://bootstrapmade.com/">StudyGo</a>
    </div>
  </div>
</footer>

</body>