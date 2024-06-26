

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

  <!-- Template Main CSS File -->
  <link href="../main.css" rel="stylesheet">

 
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
</head>

<body>

  <!-- ======= Header ======= -->
  <section id="topbar" class="topbar d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">contact@example.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 5589 55488 55</span></i>
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
      <a href="index.html" class="logo d-flex align-items-center">
      
        <h1><img src="logo.png" alt="StudyGo" class="lg1"></h1>
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          
          <li><a href="#">Formations linguistiques</a></li>

          <li><a href="offres.php">Offres</a></li>

          <li><a href="#">Reclamation</a></li>
       
          <li><a href="#">Contact</a></li>
          <li>
          <div class="dropdown">
  <button onclick="toggleDropdown()" class="dropbtn">Mon profile <i class="fas fa-chevron-down"></i></button>
  <div id="profile-dropdown" class="dropdown-content">
    <a href="../userprofile.php">Gérer mon compte</a>
    <a href="#">Completer votre compte</a>
    
  </div>
</div></li>
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
            <p class="post-category"><?= $List['NomPart'] ;?></p>
          </h2>
          <p class="post-category"><h6><?= $List['domaine']  ;?></h6></p>

          <p class="post-category"> <?= $List['programme']  ;?></p>
        
          <div class="post-footer">
           
            <div class="additional-info" style="display: none;">
           <p class="post-category">Pays : <?= $List['pays']  ;?></p>
           
            <p class="post-category">Niveau récommandé :<?= $List['niveau']  ;?></p>
            <p class="post-category">Type Baccalauréat :bac <?= $List['bac']  ;?></p>
            <p class="post-category">Nombre de places disponible :<?= $List['NbPlace']  ;?></p>
            <p class="post-category">Frais scolarité :<?= $List['frais'] ;?>DT</p>
            <p class="post-category">Bourse :<?= $List['bourse']  ;?></p>

              <p class="post-author-list">Contact : <?= $List['EmailPart']  ;?></p>
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
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-info">
          <a href="index.html" class="logo d-flex align-items-center">
            <span><img src="logo.png" alt="StudyGo" class="lg"></span>
          </a>
          <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
          <div class="social-links d-flex mt-4">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Terms of service</a></li>
            <li><a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Web Design</a></li>
            <li><a href="#">Web Development</a></li>
            <li><a href="#">Product Management</a></li>
            <li><a href="#">Marketing</a></li>
            <li><a href="#">Graphic Design</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Contact Us</h4>
          <p>
            A108 Adam Street <br>
            New York, NY 535022<br>
            United States <br><br>
            <strong>Phone:</strong> +1 5589 55488 55<br>
            <strong>Email:</strong> info@example.com<br>
          </p>

        </div>

      </div>
    </div>

    <div class="container mt-4">
      <div class="copyright">
        &copy; Copyright <strong><span>Impact</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/impact-bootstrap-business-website-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer><!-- End Footer -->
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