<?php

require("C:/xampp/htdocs/projet_v5/config/commandes.php");
require("C:/xampp/htdocs/projet_v5/config/connexion.php");

require_once "C:/xampp/htdocs/projet_v5/controler/PartenariatC.php";
require_once "C:/xampp/htdocs/projet_v5/model/partenariat.php";

require_once "C:/xampp/htdocs/projet_v5/model/offree.php";

$n=new Partenariat();
$list=$n->listpartenariat();

if(isset($_GET['sup'])){
    echo'
    <script>
    Swal.fire({
        position: "top-end",
        icon: "success",
        title: "Your work has been saved",
        showConfirmButton: false,
        timer: 1500
      });
      </script>';
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["form2_submit"])) {
    // Récupération des données du formulaire
    $programme = $_POST["programme"];
    $domaine = $_POST["domaine"];
    $niveau = $_POST["niveau"];
    $bac = $_POST["bac"];
    $nbplace = $_POST["nbplace"];
   
    $frais = $_POST["frais"];
    $bourse = $_POST["bourse"];
    $nompart = $_POST["nompart"];

    $img = $_POST["img"];
    $req = $access->prepare("SELECT IDpart FROM offre WHERE NomPart=?");
    $req->execute(array($nompart));
    $IDpart = $req->fetchColumn();

    // Création de l'objet Employe avec les données du formulaire
    $offreC = new offre();
    
    $offreC->setProgramme($programme);
    $offreC->setDomaine($domaine);
    $offreC->setNiveau($niveau);
    $offreC->setBac($bac);
    $offreC->setNbPlace($nbplace);
    $offreC->setFrais($frais);
    $offreC->setBourse($bourse);
    $offreC->setNompart($nompart);

    $offreC->setImg($img);
     $offreC->setIDpart($IDpart);

  // Création de l'objet EmployeC pour afficher les informations avec la méthode show()
  $partenaireS = new PartenariatC();
ajouter2($offreC->getProgramme(),$offreC->getDomaine(),$offreC->getNiveau(), $offreC->getBac(),$offreC->getNbPlace(),$offreC->getFrais(),$offreC->getBourse(), $offreC->getIDpart(), $offreC->getImg(),$offreC->getNompart());



}




//modification
if(isset($_GET['id2'])){
    
    // Récupérer l'ID du partenaire depuis les paramètres de requête
    $id = $_GET['id2'];

    // Récupérer les données du partenaire à partir de l'ID
    // Utilisez votre propre logique pour récupérer les données du partenaire à partir de la base de données
    $query = $access->prepare('SELECT * FROM offre WHERE IDoffre = :id');
    $query->bindValue(':id', $id);
    $query->execute();
    $offreData = $query->fetch(PDO::FETCH_ASSOC);
    
    // Afficher le formulaire de modification avec les données du partenaire
    echo '
    
    <div class="wrapper">
    
    <div class="sidebar">
            <div class="sidebar-header">
                <!-- <h3>Menu</h3> -->
                <button class="sidebar-toggle">
                <img src="fichier 3 1.png" alt="StudyGo">
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
            
            <div class="tables">

    <div id="overlay4">

    <div class="container" id="form-container" >
        <h2>Modifier l offre</h2>

        <form method="POST" class="form2" id="form2" action="update_offre.php">
            <input type="hidden" name="idoffre" value="'.$offreData['IDoffre'].'">
            <div class="form-control2">
                <label for="programme">Le programme</label>
                <input type="text" id="programme" name="programme" value="'.$offreData['programme'].'">
            </div>
            <div class="form-control2">
                <label for="domaine">Domaine d\'étude</label>
                <input type="text" id="domaine" name="domaine" value="'.$offreData['domaine'].'">
            </div>
            <div class="form-control2">
                        <label for="niveau">Niveau recommandé</label>
                        <select id="niveau" name="niveau">
                            <option value="Bac">Bac</option>
                            <option value="Bac+2">Bac+2</option>
                            <option value="Bac+3">Bac+3</option>
                            <option value="Bac+4">Bac+4</option>
                            <option value="Bac+5">Bac+5</option>
                        </select>
                        
            </div>
            
            <div class="form-control2">
                <label for="">Le type de Baccalauréat</label>
                <select id="bac" name="bac">
                    <option value="scientifique">scientifique</option>
                    <option value="littéraire">littéraire</option>
                    <option value="économique et social">économique et social</option>
                </select>
            </div>
            
            <div class="form-control2">
                <label for="nbplace">places disponibles</label>
                <input type="text" id="nbplace" name="nbplace" value="'.$offreData['NbPlace'].'">
            </div>
            <div class="form-control2">
            <label for="frais">Frais scolarité</label>
            <input type="text" id="frais" name="frais" value="'.$offreData['frais'].'">
        </div>
        <div class="form-control2">
                <label for="">Bourse</label>
                <select id="bourse" name="bourse">
                    <option value="aucun">aucun</option>
                    <option value="disponible">disponible</option>
                </select>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation"></i>
        </div>

        <input type="hidden" name="idpart" value="'.$offreData['IDpart'].'">
        
        <div class="form-control2">
            <label for="img">image</label>
            <input type="text" id="img" name="img" value="'.$offreData['img'].'">
        </div>



            <button type="submit" id="bouton_modifier">Valider</button>
        </form> </div></div></div></div></div>
    ';
    echo '      <script>var overlay = document.getElementById("overlay4");
    overlay.style.display = "flex";

    var valeurParDefaut = "'.$offreData['bac'].'";
    document.getElementById("bac").value = valeurParDefaut;

    var valeurParDefaut2 = "'.$offreData['bourse'].'";
    document.getElementById("bourse").value = valeurParDefaut2;
    
    
    var valeurParDefaut3 = "'.$offreData['niveau'].'";
    document.getElementById("niveau").value = valeurParDefaut3;

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
    <link rel="stylesheet" href="partenariatcss.css">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="backend_3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="icon" href="10.png">
    <!--  -->
    <script>
document.addEventListener("DOMContentLoaded", function() {
    var searchInput = document.getElementById("searchInput");
    var table = document.getElementById("tablePartenariat2");
    var rows = table.getElementsByTagName("tr");

    searchInput.addEventListener("keyup", function(event) {
        if (event.key === "Enter") {
            var filter = searchInput.value.toUpperCase();
            for (var i = 0; i < rows.length; i++) {
                var cells = rows[i].getElementsByTagName("td");
                var rowDisplayed = false; // Indique si la ligne doit être affichée ou non
                for (var j = 0; j < cells.length; j++) {
                    var txtValue = cells[j].textContent || cells[j].innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        rowDisplayed = true;
                        break; // Si la cellule correspond, passer à la ligne suivante
                    }
                }
                // Afficher ou masquer la ligne en fonction du résultat de la recherche
                rows[i].style.display = rowDisplayed ? "" : "none";
            }
        }
    });
});
</script>
    <script src="VerificationPartenariat.js"></script>
    <style>
         .search-box{
        position:absolute; /* Changement de position fixe pour que la barre de recherche reste fixe lors du défilement */
    top:45px; /* Position verticale à partir du haut de la page */
    right:220px; 
        width: fit-content;
        height: fit-content;
      }
           #myChart {
    margin-top: 20px; /* Espacement entre le tableau et le graphique */
    margin-left: auto; /* Centrer horizontalement */
    margin-right: auto;
    display: block;
    width: 400px; /* Largeur du graphique */
    height: 300px; /* Hauteur du graphique */
}
    </style>
 
 <script>
  // Fonction de déconnexion
  function logout(event) {
    // Afficher une alerte
    event.preventDefault();
    Swal.fire({
    title: 'Êtes-vous sûr de vouloir vous déconnecter?',
    text: "Vous serez redirigé vers la page de connexion.",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Oui, déconnexion',
    cancelButtonText: 'Annuler'
  }).then((result) => {
    if (result.isConfirmed) {
      // Rediriger vers la page de déconnexion
      window.location.href = "login.php";
    }
  });
  }
</script>
</head>

<body>

    
<div class="wrapper">
    
    <div class="sidebar">
            <div class="sidebar-header">
                <!-- <h3>Menu</h3> -->
                <button class="sidebar-toggle">
                <img src="Fichier 3 1.png" alt="StudyGo">
                </button>
            </div>
            
            <ul class="sidebar-nav">
                <hr>
                <ul class="sidebar-nav">
        <li><a href="backend_1.php"><i class="lni lni-dashboard"></i> Dashboard</a></li>
        <hr>
        <h6>Les gestions</h6>
        <div class="backend_1">
        <li><a href="users.php"><i class="lni lni-users"></i> Les clients</a></li>
        <li><a href="backendOffre.php"><i class="lni lni-layers"></i> Les offres</a></li>
        <li><a href="backendNouha.php"><i class="lni lni-graduation"></i> Les partenaires</a></li>
        <li><a href="backendNadine.php"><i class="lni lni-book"></i> Formation linguistique</a></li>
        <li><a href="#"><i class="lni lni-bubble"></i> Reclamation & Réponse</a></li>   
        <li><a href="login.php" onclick="logout(event)">Log out</a></li>
    
    </ul>
            </ul>
        </div>
    
        <div class="contenu">
           
            <div class="tables">



<!-- table offre -->

<button id="btnAjouter2">Ajouter</button>
<div class="titre2"><h2>Les offres</h2></div>
<div class="search-box">
                <button class="btn-search"><i class="fas fa-search"></i></button>
                <input type="text" class="input-search" id="searchInput" placeholder="Rechercher...">
            </div>
            
<table id="tablePartenariat2">
    <thead>
 <?php
        
            // Récupération des données de la table "partenariat"
            $query = $access->query('SELECT * FROM offre');
             echo "<tr>";
                echo "<th>IDoffre</th>";
                echo "<th>programme</th>";
                echo "<th>domaine</th>";
                echo "<th>niveau recommandé</th>";
                echo "<th>type bac</th>";
                echo "<th>places disponibles</th>";
                echo "<th>frais scolarité</th>";
                echo "<th>bourse</th>";
                echo "<th>Partenaire</th>";
                echo "</tr>";
                ?>
    </thead>
    <tbody>
    <?php
            while ($row = $query->fetch()) {
               
                echo "<tr>";
                echo "<td>".$row['IDoffre']."</td>";
                echo "<td>".$row['programme']."</td>";
                echo "<td>".$row['domaine']."</td>";
                echo "<td>".$row['niveau']."</td>";
                echo "<td>".$row['bac']."</td>";
                echo "<td>".$row['NbPlace']."</td>";
                echo "<td>".$row['frais']."DT</td>";
                echo "<td>".$row['bourse']."</td>";
                echo "<td>".$row['NomPart']."</td>";


                echo '<td> <a href="?id2='.$row['IDoffre'].'"> <i class="fas fa-edit icon"" ></i> </a> </td>';

                echo '<td> <a href="delete_offre.php?id='.$row['IDoffre'].'"> <i class="fas fa-trash-alt icon" ></i> </a> </td>';
            }
                    
        ?>
        
    </tbody>
</table>
<!--  -->
 <canvas id="myChart" width="200" height="80"></canvas> 

<script>
    // Récupération des données PHP pour le diagramme
    <?php
    $labels = [];
    $counts = [];
    $query_stats = $access->query('SELECT bac, COUNT(*) AS count FROM offre GROUP BY bac');
    while ($row = $query_stats->fetch()) {
        $labels[] = $row['bac'];
        $counts[] = $row['count'];
    }
    ?>

    // Création du diagramme avec Chart.js
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [{
                label: 'Nombre d\'offres',
                data: <?php echo json_encode($counts); ?>,
                backgroundColor: [
                    'rgba(224, 131, 9,0.5)',
                    'rgba(7, 1, 37, 0.5)',
                    'rgba(255, 206, 86, 0.5)',
                    // Ajoutez plus de couleurs si nécessaire
                ],
                borderColor: [
                    'rgba(224, 131, 9,1)',
                    'rgba(7, 1, 37, 1)',
                    'rgba(255, 206, 86, 1)',
                    // Ajoutez plus de couleurs si nécessaire
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<!-- ajout offre -->
    <div id="overlay3">
        <div class="container" id="form-container" >
            <div class="header">
                <h2>Ajouter un offre</h2>
                <span id="close-form3">&times;</span>
        <!-- Reste du formulaire -->
            </div>
                <form  method="POST" class="form2" id="form2" onsubmit="return validateForm2()">
                        
                  
                    <div class="form-control2">
                            <label for="">description de programme</label>
                            <input type="text" id="programme"  name="programme" placeholder="ecrire la descrition du programme">
                            <i class="fas fa-check-circle"></i>
                            <i class="fas fa-exclamation"></i>
                            <br>
                            <small>Message d'erreur</small>
                            
                    </div>

                    <div class="form-control2">
                            <label for="">Domaine</label>
                            <input type="text" id="domaine"  name="domaine" placeholder="domaine d'étude">
                            <i class="fas fa-check-circle"></i>
                            <i class="fas fa-exclamation"></i>
                            <br>
                            <small>Message d'erreur</small>
                    </div>

                    <div class="form-control2">
                        <label for="niveau">Niveau recommandé</label>
                        <select id="niveau" name="niveau">
                            <option value="Bac">Bac</option>
                            <option value="Bac+2">Bac+2</option>
                            <option value="Bac+3">Bac+3</option>
                            <option value="Bac+4">Bac+4</option>
                            <option value="Bac+5">Bac+5</option>
                        </select>
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation"></i>
                        <br>
                        <small>Message d'erreur</small>
                    </div>


                    <div class="form-control2">
                        <label for="">Le type de Baccalauréat</label>
                        <select id="bac" name="bac">
                            <option value="scientifique">scientifique</option>
                            <option value="littéraire">littéraire</option>
                            <option value="économique et social">économique et social</option>
                         
                        </select>
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation"></i>
                        <br>
                        <small>Message d'erreur</small>
                    </div>
                    
                    <div class="form-control2">
                            <label for="">Nombre de places disponibles</label>
                            <input type="text" id="nbplace"  name="nbplace" placeholder="">
                            <i class="fas fa-check-circle"></i>
                            <i class="fas fa-exclamation"></i>
                            <br>
                            <small>Message d'erreur</small>
                    
                    
                        </div>

                    <div class="form-control2">
                            <label for="">Frais scolarité</label>
                            <input type="text" id="frais"  name="frais" placeholder="">
                            <i class="fas fa-check-circle"></i>
                            <i class="fas fa-exclamation"></i>
                            <br>
                            <small>Message d'erreur</small>
                    </div>

                    <div class="form-control2">
                        <label for="">Bourse</label>
                        <select id="bourse" name="bourse">
                            <option value="aucun">aucun</option>
                            <option value="disponible">disponible</option>
                        </select>
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation"></i>
                    </div>

                    <div class="form-control2">
                        <label for="">Partenaire</label>
                        <select id="nompart" name="nompart">
                            <?php foreach($list as $List): ?>
                                <option value="<?= $List['NomPart'];?>"><?= $List['NomPart'];?></option>
                            <?php endforeach ; ?>
                        </select>
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation"></i>
                    </div>

                  
                    <div class="form-control2">
                            <label for="">image</label>
                            <input type="text" id="img"  name="img" placeholder="adresse de l'image">
                            <i class="fas fa-check-circle"></i>
                            <i class="fas fa-exclamation"></i>
                            <br>
                            <small>Message d'erreur</small>
                    </div>






                    <button type="submit"  name="form2_submit"> <i class="fas fa-user-plus"></i> Ajouter</button>

                </form>
        </div>
    </div>
<!-- ajout partenaire -->


<!--  -->
</div>
</div>
</div>
</div>





<script>

        
        //fonction button ajout pour afficher la formulaire
        var btnAjouter2 = document.getElementById('btnAjouter2');
        var overlay3 = document.getElementById('overlay3');
        btnAjouter2.addEventListener('click', function() {
            overlay3.style.display = 'flex';
        });       
    
    //close button
    var closeForm = document.getElementById('close-form3');
    closeForm.addEventListener('click', function() {
    overlay3.style.display = 'none'; 
    });
    var closeForm = document.getElementById('close-form2');
    closeForm.addEventListener('click', function() {
    overlay2.style.display = 'none'; 
  
    });
    
    


    </script>
    
</body>
</html>

