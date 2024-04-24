<?php
require '../config/commandes.php';
require_once '../controller/formationC.php';
require_once '../model/formation.php';



// Vérification si le formulaire est soumiss
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $idlangue = $_POST["idlangue"];
    $iduser = $_POST["iduser"];
    $idniveau = $_POST["idniveau"];
    $duree = $_POST["duree"];


    // Création de l'objet Employe avec les données du formulaire
    $formationC = new Formation();
    $formationC->setidlangue($idlangue);
    $formationC->setiduser($iduser);
    $formationC->setidniveau($idniveau);
    $formationC->setduree($duree);
    
    ajouter($formationC->getidlangue(), $formationC->getiduser(),$formationC->getidniveau(),$formationC->getduree());

}


//modification
if(isset($_GET['id'])){
    
    // Récupérer l'ID du partenaire depuis les paramètres de requête
    $id = $_GET['id'];

    // Récupérer les données du partenaire à partir de l'ID
    // Utilisez votre propre logique pour récupérer les données du partenaire à partir de la base de données
    $query = $access->prepare('SELECT * FROM formation WHERE idlangue = :id');
    $query->bindValue(':id', $id);
    $query->execute();
    $formationdata = $query->fetch(PDO::FETCH_ASSOC);
    
    // Afficher le formulaire de modification avec les données du partenaire
    echo '
    
    <div class="wrapper">
    
    <div class="sidebar">
            <div class="sidebar-header">
                <!-- <h3>Menu</h3> -->
                <button class="sidebar-toggle">
                <img src="logo.png" alt="StudyGo">
                </button>
            </div>
            
            <ul class="sidebar-nav">
                <hr>
                <ul class="sidebar-nav">
        <li><a href="backend_1.php"><i class="lni lni-dashboard"></i> Dashboard</a></li>
        <hr>
        <h6>Les gestions</h6>
        <div class="backend_1">
        <li><a href="#"><i class="lni lni-users"></i> Les clients</a></li>
        <li><a href="#"><i class="lni lni-layers"></i> Les offres</a></li>
        <li><a href="backendNadine.php"><i class="lni lni-book"></i> Formation linguistique</a></li>
        <li><a href="#"><i class="lni lni-bubble"></i> Reclamation & Réponse</a></li>
        <li><a href="login.php"></i>Log out</a></li>
    
    </ul>
            </ul>
        </div>
        <div class="contenu">
            <div class="navbar">
                
            </div>
            <div class="tables">

    <div id="overlay2">

    <div class="container" id="form-container" >
        <h2>Modifier la formation</h2>

        <form method="POST" action="update_formation.php">
            <input type="hidden" name="idlangue" value="'.$formationdata['idlangue'].'">
            <div class="form-control">
                <label for="iduser">ID user </label>
                <input type="text" id="iduser" name="iduser" value="'.$formationdata['iduser'].'">
            </div>
            <div class="form-control">
                <label for="idniveau">id niveau</label>
                <input type="text" id="idniveau" name="idniveau" value="'.$formationdata['idniveau'].'">
            </div>
            <div class="form-control">
                <label for="duree">duree</label>
                <input type="text" id="duree" name="duree" value="'.$formationdata['duree'].'">
            </div>
           
            <button type="submit" id="bouton_modifier">Modifier</button>
        </form> </div></div></div></div></div>
    ';
    echo '      <script>var overlay = document.getElementById("overlay2");
    overlay.style.display = "flex";

    
    </script>  ';
}
?>


<!DOCTYPE html>

<html lang="fr">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des offres</title>
    <link rel="stylesheet" href="awesome/css/all.min.css">    
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="backend_2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="icon" href="10.png">

<link rel="stylesheet" href="formationcss.css">
    <script src="VerificationFormation.js"></script>
</head>

<body>
       
<div class="wrapper">
    
    <div class="sidebar">
            <div class="sidebar-header">
                <!-- <h3>Menu</h3> -->
                <button class="sidebar-toggle">
                <img src="logo.png" alt="StudyGo">
                            </button>
            </div>
            
            <ul class="sidebar-nav">
                <hr>
                <ul class="sidebar-nav">
        <li><a href="backend_1.php"><i class="lni lni-dashboard"></i> Dashboard</a></li>
        <hr>
        <h6>Les gestions</h6>
        <div class="backend_1">
        <li><a href="#"><i class="lni lni-users"></i> Les clients</a></li>
        <li><a href="backendNouha.php"><i class="lni lni-layers"></i> Les offres</a></li>
        <li><a href="#"><i class="lni lni-book"></i> Formation linguistique</a></li>
        <li><a href="#"><i class="lni lni-bubble"></i> Reclamation & Réponse</a></li>
        <li><a href="login.php"></i>Log out</a></li>
    
    </ul>
            </ul>
        </div>
    
        <div class="contenu">
            <div class="navbar">
                
            </div>
            <div class="tables">

    <button id="btnAjouter">Ajouter</button>
 <div class="titre"><h2>Les formations</h2></div>
          
    <table id="tablePartenariat">
        <thead>
            
        </thead>
        <tbody>
            <?php
            try {
                // Connexion à la base de données
                $access = new PDO("mysql:host=localhost;dbname=projet;charset=utf8", "root", "");
                $access->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

                // Récupération des données de la table "formation"
                $query = $access->query('SELECT * FROM formation');
                 echo "<tr>";
                    echo "<td>id langue</td>";
                    echo "<td>id user</td>";
                    echo "<td>id niveau</td>";
                    echo "<td>duree</td>";
                    echo "</tr>";
                while ($row = $query->fetch()) {
                   
                    echo "<tr>";
                    echo "<td>".$row['idlangue']."</td>";
                    echo "<td>".$row['iduser']."</td>";
                    echo "<td>".$row['idniveau']."</td>";
                    echo "<td>".$row['duree']."</td>";
                    echo '<td> <a href="?id='.$row['idlangue'].'"> <i class="fas fa-edit icon"" ></i> </a> </td>';
                    echo '<td> <a href="delete_formation.php?id='.$row['idlangue'].'"> <i class="fas fa-trash-alt icon" ></i> </a> </td>';
                    echo "</tr>";

                }
            } catch (PDOException $e) {
                echo "Erreur de connexion à la base de données : " . $e->getMessage();
            }
            ?>
        </tbody>
    </table>

    <div id="overlay">


    <div class="container" id="form-container" >
        <div class="header">
            <h2>Ajouter une formation</h2>
            <span id="close-form">&times;</span>
    <!-- Reste du formulaire -->
        </div>
        <form  method="POST" class="form" id="form" onsubmit="return validateForm()">
            
        <div class="form-control ">
                <label for="">ID formation</label>
                <input type="text" id="idlangue"  name="idlangue" placeholder="id langue">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation"></i>
                <br>
                <small>Message d'erreur</small>
            </div>

            <div class="form-control">
                <label for="">ID user</label>
                <input type="text" id="iduser"  name="iduser" placeholder="id user">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation"></i>
                <br>
                <small>Message d'erreur</small>
            </div>

            <div class="form-control">
                <label for="">ID Niveau</label>
                <input type="text" id="idniveau"  name="idniveau" placeholder="id niveau">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation"></i>
                <br>
                <small>Message d'erreur</small>
            </div>

            <div class="form-control">
                <label for="">Duree</label>
                <input type="text" id="duree"  name="duree" placeholder="duree">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation"></i>
                <br>
                <small>Message d'erreur</small>
            </div>

            
           
            
            <button type="submit" > <i class="fas fa-user-plus"></i> Ajouter</button>

        </form>
        </div>
    </div>
</div>
</div>
</div>
</div>


    
<script>
         //fonction button ajout pour afficher la formulaire
         var btnAjouter = document.getElementById('btnAjouter');
        var overlay = document.getElementById('overlay');
        btnAjouter.addEventListener('click', function() {
            overlay.style.display = 'flex';
        });
       
    //close button
    var closeForm = document.getElementById('close-form');
    closeForm.addEventListener('click', function() {
    overlay.style.display = 'none'; 
    });
    </script>
</body>
</html>