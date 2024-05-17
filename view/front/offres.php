<?php
session_start();


require_once 'C:/xampp/htdocs/projet_v5/controler/educationc.php';
require_once 'C:/xampp/htdocs/projet_v5/Model/education.php';
require_once 'C:/xampp/htdocs/projet_v5/Model/login.php';
require("C:/xampp/htdocs/projet_v5/config/connexion.php");

require_once "C:/xampp/htdocs/projet_v5/controler/PartenariatC.php";
require_once "C:/xampp/htdocs/projet_v5/Model/partenariat.php";
require_once "C:/xampp/htdocs/projet_v5/Model/offree.php";


$conn = config::getConnexion();
$e=new educationc();
$list1=$e->listeducation();

$n=new Offre();
$list=$n->listoffre();



if(isset($_GET['id']))
{
  $ID_OFFRE = strval($_GET['id']);
  $ID_OFFRE = trim($ID_OFFRE, "'");
  $ID_OFFRE = intval($ID_OFFRE);
  $ID_USER=$_SESSION['idUser'];
  $ETAT='en attente';
  $e1 = new educationc();
   $e1->addoffre_user($ID_OFFRE,$ID_USER,$ETAT);
   
}



$nom=$_SESSION['user1'];

$query = $conn->prepare("SELECT idUser FROM login WHERE user =:user ");

$query->bindParam(':user', $nom);
$query->execute();
$result = $query->fetchAll();

$idUser = $result[0]['idUser'];
$_SESSION['idUser']=$idUser;
$e = new educationc();
$educationExists = $e->checkIfEducationExists($idUser);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  

  <title>Nos Offres</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link rel="icon" href="../10.png">
  <!-- Favicons -->

  <!-- Google Fonts -->
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Template Main CSS File -->
  <link href="../main1.css" rel="stylesheet">

 
  <style>

.post-category2 {
  color:rgba(10, 22, 52, 0.8); /* Couleur par défaut */
        text-decoration: underline; 
        font-size: 13px;
      }

    .post-category2:hover {
    color:  rgb(224, 131, 9); /* Couleur lorsque survolé */
    }

    .icon-location {
        margin-left: 5px; /* Espacement entre l'icône et le texte */
        font-size: 16px; /* Taille de l'icône */
        color:rgb(224, 131, 9); /* Couleur de l'icône */
    }
  </style>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7PHny92wTTur-X9nqljkWZyyCXt0t6ek"></script>
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
      window.location.href = "../login.php";
    }
  });
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
  function verifier_compte(event) {
    // Afficher une alerte
    event.preventDefault();
    Swal.fire({
    title: "Vous devez completer votre compte pour s'inscrire ",
    icon: 'warning',
    showCancelButton: false,
    confirmButtonText: "D'accord",
    
  });
  }
</script>
<script>document.addEventListener("DOMContentLoaded", function() {
  // Récupérer les éléments nécessaires
  var emailModal = document.getElementById("emailModal");
  var closeModals = document.getElementsByClassName("close");
  
  // Ajouter des gestionnaires d'événements à chaque adresse
  var openMapElements = document.querySelectorAll("[id^='openmail']");
 
  openMapElements.forEach(function(element) {
    element.addEventListener("click", function() {
      emailModal.style.display = "block";
      
      var adresse = element.innerText.trim();
            // Utiliser la valeur de l'adresse comme nécessaire
            console.log(adresse);
            var emailInput = document.getElementById("email");

// Changez la valeur de l'élément input
            emailInput.value = adresse;
    });
  });

  // Ajouter des gestionnaires d'événements pour fermer la boîte modale
  for (var i = 0; i < closeModals.length; i++) {
    closeModals[i].addEventListener("click", function() {
      emailModal.style.display = "none";
    });
  }
  
  // Fermer la boîte modale si l'utilisateur clique en dehors de celle-ci
  window.onclick = function(event) {
    if (event.target == emailModal) {
      emailModal.style.display = "none";
    }
  }
});</script>
<script>
function initMap(adresse) {
    // Convertissez l'adresse en latitude et longitude si nécessaire
    // Vous pouvez supposer que l'adresse est déjà une latitude et longitude dans votre cas

    var parties = adresse.split(','); // Séparer l'adresse en parties
    var lat = parseFloat(parties[0]); // Extraire la latitude
    var lng = parseFloat(parties[1]); // Extraire la longitude

    // Créez les coordonnées à partir de la latitude et de la longitude
    var coords = { lat: lat, lng: lng };

    // Initialisez la carte avec les coordonnées spécifiées
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15, // Zoom par défaut
        center: coords // Centre de la carte sur les coordonnées spécifiées
    });

    // Créez un marqueur pour marquer l'adresse sur la carte
    var marker = new google.maps.Marker({
        position: coords,
        map: map,
        title: 'Adresse'
    });
}


</script>

<script>

 function mod(a,b)
 {
  alert(a);
  
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
        <!-- <a href="#" class="twitter"><i class="bi bi-twitter"></i></a> -->
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <!-- <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a> -->
      </div>
    </div>
  </section><!-- End Top Bar -->

  <header id="header" class="header d-flex align-items-center">
  <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
    <a href="../index.php" class="logo d-flex align-items-center">
      <h1><img src="../fichier 3 1.png" alt="StudyGo" class="lg1"></h1>
    </a>
    <nav id="navbar" class="navbar">
      <ul>
        <li><a href="frontnadine.php">Formations linguistiques</a></li>
        <li><a href="offres.php">Offres</a></li>
        <li><a href="../recfront.php">Reclamation</a></li>
        <li>
          <div class="dropdown">
            <button onclick="toggleDropdown()" class="dropbtn">Mon profile <i class="fas fa-chevron-down"></i></button>
            <div id="profile-dropdown" class="dropdown-content">
              <?php if ($educationExists) { ?>
                <a href="../userprofile.php">Gérer mon compte</a>
              <?php } else { ?>
                <a href="../userprofile.php" onclick="completer_compte(event)">Gérer mon compte </a>
                <a href="../userEducation.php">Compléter votre compte</a>
              <?php } ?>
              <a href="../login.php" onclick="logout(event)">Se déconnecter</a>
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
              <h2>NOS OFFRES</h2>
<p>Découvrez le monde et élargissez vos horizons grâce à nos offres exclusives d'études à l'étranger. </p>            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="../index.php">Acceuil</a></li>
            <li>Offres</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
  <div class="container" data-aos="fade-up">
    <div class="row gy-4 posts-list">
    <?php $counter = 1; ?>
      <?php foreach($list as $List): ?>
      <div class="col-xl-4 col-md-6">

        <article>
         
          <div class="post-img">
            <img src="<?= $List['img'] ;?>" alt="" class="img-fluid">
          </div>
          <h2 class="title">
            <p class="post-category" ><?= $List['NomPart'] ;?></p>
          </h2>
          <p class="post-category" id="nomcomplexe"><h6><?= $List['domaine']  ;?></h6></p>

          <p class="post-category"> <?= $List['programme']  ;?></p>
          <?php if ($educationExists) { ?>
            
            <a href="?id='<?php echo $List['IDoffre'] ; ?>'"><button >S'inscrire</button>      </a>
                    <?php } else { ?>
                <button id="inscri<?= $counter ?>" onclick="verifier_compte(event)">S'inscrire</button>
              <?php } ?>
         

          <div class="post-footer">
           
            <div class="additional-info" style="display: none;">
           <p class="post-category">Pays : <?= $List['pays']  ;?></p>
           
            <p class="post-category">Niveau récommandé :<?= $List['niveau']  ;?></p>
            <p class="post-category">Type Baccalauréat :bac <?= $List['bac']  ;?></p>
            <p class="post-category">Nombre de places disponible :<?= $List['NbPlace']  ;?></p>
            <p class="post-category">Frais scolarité :<?= $List['frais'] ;?>DT</p>
            <p class="post-category">Bourse :<?= $List['bourse']  ;?></p>

            <p class="post-author-list"  id="openmail<?= $counter ?>"> <?= $List['EmailPart']  ;?></p>
            <p class="post-category2" id="openMap<?= $counter ?>" > <i class="fas fa-map-marker-alt"></i><?= $List['adresse'] ?></p>
            
          
            </div>
             <a href="#" class="btn btn-primary btn-view-more" onclick="showMore(event)">Voir plus</a>
          </div>
        </article>
      </div><!-- End post list item -->
      <?php $counter++; ?>
      <?php endforeach ; ?>
    </div><!-- End blog posts list -->
  </div>
</section><!-- End Blog Section -->
<div id="mapModal" class="modal">
  <div class="modal-content">
    <!-- Bouton de fermeture de la boîte modale -->
    <span class="close">&times;</span>
    <!-- Conteneur pour afficher la carte -->
    <div id="map"></div>
  </div>
</div>
<!-- email -->
<div id="emailModal" class="modal">
  <div class="modal-content">
  <form   method="POST" class="form" id="form" onsubmit="msg()"> 
    <!-- Bouton de fermeture de la boîte modale -->
    <span class="close">&times;</span>
    <label for="">Email:</label>
    <input type="text" id="email"  name="email" ></br>
    <label for="">Obj:</label>
    <input type="text" id="obj"  name="obj" ></br>
    <label for="">Message:</label>
    <input type="text" id="message"  name="message" ></br>
    <button type="submit"> Envoyer</button>
  </form>
  </div>
</div>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
  <div class="container">
    <div class="row gy-4">
      <div class="col-lg-5 col-md-12 footer-info">
        <a href="../index.php" class="logo d-flex align-items-center">
          <span><img src="../Fichier 3 1.png" alt="StudyGo" class="lg"></span>
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

</body>

</html>
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
</script>
<script>
  function showMore(event) {
    event.preventDefault();
    var btn = event.target;
    var additionalInfo = btn.previousElementSibling;


    if (additionalInfo.style.display === "none") {
      additionalInfo.style.display = "block";
      btn.textContent = "Voir moins";
    } else {
      additionalInfo.style.display = "none";
      btn.textContent = "Voir plus";
    }
  }



  document.addEventListener("DOMContentLoaded", function() {
  // Récupérer les éléments nécessaires
  var mapModal = document.getElementById("mapModal");
  var closeModals = document.getElementsByClassName("close");
  
  // Ajouter des gestionnaires d'événements à chaque adresse
  var openMapElements = document.querySelectorAll("[id^='openMap']");
 
  openMapElements.forEach(function(element) {
    element.addEventListener("click", function() {
      mapModal.style.display = "block";
      
      var adresse = element.innerText.trim();
            // Utiliser la valeur de l'adresse comme nécessaire
            console.log(adresse);
            initMap(adresse);
    });
  });
  
  // Ajouter des gestionnaires d'événements pour fermer la boîte modale
  for (var i = 0; i < closeModals.length; i++) {
    closeModals[i].addEventListener("click", function() {
      mapModal.style.display = "none";
    });
  }

  // Fermer la boîte modale si l'utilisateur clique en dehors de celle-ci
  window.onclick = function(event) {
    if (event.target == mapModal) {
      mapModal.style.display = "none";
    }
  }
});

// Initialiser la carte (vous devez inclure votre propre code pour afficher une carte)


</script>