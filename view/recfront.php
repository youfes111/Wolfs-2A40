
<?php
session_start();
require("../config/commandes1.php");
require("../config/connexion.php");

require_once "../controler/ReclamationC.php";
require_once "../model/reclamation.php";
require_once "../model/reponse.php";

require_once 'C:/xampp/htdocs/projet_v5/controler/educationc.php';
require_once 'C:/xampp/htdocs/projet_v5/Model/education.php';


$n=new Reclamation();
$list=$n->listrec();

$conn = config::getConnexion();

$nom=$_SESSION['user1'];

$query = $conn->prepare("SELECT idUser FROM login WHERE user =:user ");

$query->bindParam(':user', $nom);
$query->execute();
$result = $query->fetchAll();

$idUser = $result[0]['idUser'];
$e = new educationc();
$educationExists = $e->checkIfEducationExists($idUser);

// Vérification si le formulaire est soumiss
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["form_submit"])){
  // Récupération des données du formulaire
  $IDuser = $_POST["iduser"];
  $Daterec = date('Y-m-d');

  $Descrec = $_POST["descrec"];
  $Typerec = $_POST["typerec"];
  $Statut = $_POST["statut"];

  // Création de l'objet Employe avec les données du formulaire
  $reclamationC = new Reclamation();
  $reclamationC->setIDuser($idUser);
  $reclamationC->setDaterec($Daterec);
  $reclamationC->setDescrec($Descrec);
  $reclamationC->setTyperec($Typerec);
  $reclamationC->setStatut($Statut);

 
  ajouter($reclamationC->getIDuser(),$reclamationC->getDaterec(),$reclamationC->getDescrec(), $reclamationC->getTyperec(), $reclamationC->getStatut());



}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Impact Bootstrap Template - Blog</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="stylesheet" href="awesome/css/all.min.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <script src="VerificationReclamation1.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <!-- =======================================================
  * Template Name: Impact
  * Template URL: https://bootstrapmade.com/impact-bootstrap-business-website-template/
  * Updated: Apr 4 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
   .btn-view-more {
  position: relative;
  margin-top: 5px;
  padding-left: 0%;
  background-color: transparent;
  color: rgba(0, 0, 139, 0.5);
  border: none;
  font-size: small;
  transition: color 0.3s ease; 
  text-decoration: underline;
  
}

.btn-view-more:hover {
  color:  rgba(255, 165, 0, 2); 
  background-color: transparent;

  text-decoration: underline;
}
.dropdown {
  position: relative;
  display: inline-block;
}

.dropbtn {
  background-color: transparent;
  color: white;
  padding: 10px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #E78D1E;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
 
}



.dropdown-content a {
  color: white;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {
  background-color: #132A3E;
}

.show {
  display: block;
}
</style>
<script>
function toggleDropdown() {
  var dropdown = document.getElementById("profile-dropdown");
  dropdown.classList.toggle("show");
}

window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    for (var i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
function completer_compte(event) {
    // Afficher une alerte
    event.preventDefault();
    Swal.fire({
    title: 'Vous devez completer votre compte!',
    icon: 'warning',
    showCancelButton: false,
    confirmButtonText: "D'accord",
    
  });
  }
</script>
</head>

<body>

  <!-- ======= Header ======= -->
  <section id="topbar" class="topbar d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
      <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:studygo@gmail.com">studygo@gmail.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+21694141491</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section><!-- End Top Bar -->

  
  <header id="header" class="header d-flex align-items-center">
  <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
  <a href="index.php" class="logo d-flex align-items-center">
      <h1><img src="fichier 3 1.png" alt="StudyGo" class="lg1"></h1>
    </a>
    <nav id="navbar" class="navbar">
      <ul>
        <li><a href="../view/front/frontnadine.php">Formations linguistiques</a></li>
        <li><a href="../view/front/offres.php">Offres</a></li>
        <li><a href="recfront.php">Reclamation</a></li>
        <li>
          <div class="dropdown">
            <button onclick="toggleDropdown()" class="dropbtn">Mon profile <i class="fas fa-chevron-down"></i></button>
            <div id="profile-dropdown" class="dropdown-content">
              <?php if ($educationExists) { ?>
                <a href="userprofile.php">Gérer mon compte</a>
              <?php } else { ?>
                <a href="userprofile.php" onclick="completer_compte(event)">Gérer mon compte </a>
                <a href="userEducation.php">Compléter votre compte</a>
              <?php } ?>
              <a href="login.php" onclick="logout(event)">Se déconnecter</a>
            </div>
          </div>
        </li>
      </ul>
    </nav><!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->
  <!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('');">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>Reclamation et Réponses</h2>
<p>Vous pouvez consulter vos reclamations et accuillir vos reponses</p>            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="index.html">Acceuil</a></li>
            <li>Reclamtions & Réponses</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">
      <button id="btnAjouter">Ajouter une reclamation</button>

        <div class="row gy-4 posts-list">
        <?php $counter = 1; ?>
        <?php foreach($list as $List): ?>
          <div class="col-xl-4 col-md-6">
            <article>

              
<h2 class="title">
              <p class="post-category"> Reclamation numéro : <?= $counter ?></p>
</h2>
              
              <p class="post-category">Reclamation : <?= $List['Descrec']  ;?> </p>
              
              <p class="post-category">Type de reclamation :<?= $List['Typerec']  ;?> </p>
              <p class="post-category">Statut de reclamation :<?= $List['Statut']  ;?> </p>
              
              <p class="post-category">Réponse du reclamation:<?= $List['Descrep']  ;?> </p>
              <div class="d-flex align-items-center">
                <div class="post-meta">
             
                  <p class="post-date">
                  <i class="far fa-calendar-alt"></i>   <?= $List['Daterec']  ;?> 
                  </p>
                </div>
              </div>

            </article>
          </div><!-- End post list item -->

          <?php $counter++; ?>
   <?php endforeach ; ?>

        </div><!-- End blog posts list -->

   

      </div>
    </section><!-- End Blog Section -->
<!-- ajouter -->
<div id="overlay">


<div class="container1" id="form-container1" >
    <div class="header1">
        <h2>Ajouter une reclamation</h2>
        <span id="close-form">&times;</span>
<!-- Reste du formulaire -->
    </div>
    <form  method="POST" class="form" id="form" onsubmit="return validateForm()">
        
  

       
           
            <input type="text" id="iduser"  name="iduser" placeholder="ID user" value=$idUser hidden>
       
            <br>
          
     

       

        <div class="form-control">
            <label for="">Description</label>
            <textarea id="descrec" name="descrec" rows="5" ></textarea>
            <br>
            <small>Message d'erreur</small>
        </div>
        
            <input type="hidden" id="statut"  name="statut" placeholder="Statut" value="en attente" >
    
   
<label>Type de réclamation</label>


<div class="form-control">


<label>
<input type="radio" name="typerec" value="Formation linguistique"> Formation linguistique
</label>
        
<label>
<input type="radio" name="typerec" value="Étudier à l'étranger"> Étudier à l'étranger
</label>

<label>
<input type="radio" name="typerec" value="Technique"> Technique
</label>

       
   </div>     
<button type="submit" name="form_submit"> <i class="fas fa-user-plus"></i> Ajouter</button>

    </form>
    </div>
</div>

<!--  -->
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
  <div class="container">
    <div class="row gy-4">
      <div class="col-lg-5 col-md-12 footer-info">
        <a href="../index.php" class="logo d-flex align-items-center">
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
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
<script>


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