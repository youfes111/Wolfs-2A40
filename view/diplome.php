<?php



require '../controler/diplomec.php';
require '../Model/diplome.php';

if(isset($_POST['diplome_enregistrer']))
 {
    $e=new diplomec();
    $l=new diplome();
    $nom = $_POST['nom_diploma'];
    $document = $_FILES['document']['tmp_name'];
    $photodocument = file_get_contents($document);
    $documentString = base64_encode($photodocument);
    $Moyenne = $_POST['moyenne'];
    $date= $_POST['date_obtention'];
    $l->setNom($nom);
    $l->setDocument($documentString);
    $l->setMoyenne($Moyenne);
    $l->setdate_diplome($date);

  
    $addedId = $e->adddiplome($l->getNom(), $l->getDocument(), $l->getMoyenne(), $l->getdate_diplome());
    $user = $_GET['user'];
    $mdp = $_GET['mdp'];
    $mdp = str_replace('$', '', $mdp);
   header("Location: userEducation.php?added_id=$addedId&user=$user&mdp=$mdp");
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
                <form method="POST" enctype="multipart/form-data">
                    <!-- Remaining form fields for the diploma -->
                   
                    <div class="diploma-container">
                        <div class="form-group">
                            <label for="nom-diploma-1">Nom du diplôme:</label>
                            <select id="nom-diploma-1" name="nom_diploma">
        <option value="">Select a diploma</option>
        <option value="Computer Science">Computer Science</option>
        <option value="Electrical Engineering">Electrical Engineering</option>
        <option value="Mechanical Engineering">Mechanical Engineering</option>
        <option value="Physics">Physics</option>
        <option value="bac_math">bac math</option>
        <option value="bac_science">bac science</option>
        <option value="bac_tech">bac tech</option>
        <option value="bac_eco">bac eco</option>
        <option value="bac_lettre">bac lettre</option>
    </select>
                        </div>
                        <div class="form-group">
                            <label for="document-1">Document (file/pdf):</label>
                            <input type="file" id="document-1" name="document">
                        </div>
                      
                        <div class="form-group">
                        <label>moyenne :  </label>
                       <input type="radio" id="moyenne-1" name="moyenne" value="Excellent"> Excellent</label>
                       <input type="radio" id="moyenne-2" name="moyenne" value="Très bien"> Très bien</label>
                       <input type="radio" id="moyenne-3" name="moyenne" value="Bien"> Bien</label>
                       <input type="radio" id="moyenne-4" name="moyenne" value="Passable"> Passable</label>
                    </div>
                        <div class="form-group">
                            <label for="date-obtention-1">Date d'obtention:</label>
                            <input type="date" id="date-obtention-1" name="date_obtention">
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