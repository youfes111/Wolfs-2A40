<?php
session_start(); // Assurez-vous de démarrer la session


require '../controler/loginc.php';


if(isset($_SESSION['user1']))
{   
    $user=$_SESSION['user1'];

    //$nomPart=$_SESSION['nomPart'];
    //$domaine=$_SESSION['domaine'];
    //var_dump($nomPart);
    //var_dump($domaine);
    }
    $e=new loginc();
    $list=$e->selectuser($user);
    $list2=$e->selectoffre($user);
   
    


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
   
 
</head>
<body>
<div class="wrapper">
    
  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('');">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>Votre compte</h2>
          </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
          <li><a href="index.php">Acceuil</a></li>
            <li ><a href="front/offres.php">Offres</a></li>
            <li>Gérer votre compte</li>
          </ol>
        </div>
      </nav>
    </div>

  <br><br><br>  
 <section id="blog" class="blog">
  <div class="container">
    <div class="row gy-4 posts-list">
    <table border='1' class="custom-table">
                
            <tr><th>Nom</th><th>Prenom</th><th>Email</th><th>Etat</th><th>Emplacement</th><th>nom</th><th>date_diplome</th><th>Modifier</th><th>PDF</th></tr>
            <?php   
                    
                   
                    ?>
                            
                        <tr id="row_<?php echo $list['idUser']; ?>">
                            <td><?= $list['user']; ?></td>
                            <td><?= $list['userPrenom']; ?></td>
                            <td><?= $list['email']; ?></td>
                            <td><?= $list['Etat']; ?></td>
                            <td><?= $list['emplacement']; ?></td>
                            <td><?= $list['nom']; ?></td>   
                            <td><?= $list['date_diplome']; ?></td>  
                                                       
                            <td align="center">
                                <form method="POST" action="">
                                <!-- <a href="updatelogin.php?id=<?= $list['idUser']; ?>">update</a>   -->
                                <input type="button" value="Mis a jour" onclick="window.location.href='updatelogin.php?id=<?= $list['idUser']; ?>'">
                                </form>
                            </td>
                            <td align="center">
                                
  <button type="button" class="pdf-button" onclick="window.location.href='generatePDF.php'">
    <i class="fas fa-file-pdf" style="stylesheet1"></i>
  </button>
                            </td>
                                      
                        </tr>
                   
            </table>
    </div><!-- End blog posts list -->
  </div>

  <!--  -->
  <section id="blog" class="blog">
  <div class="container">
    <div class="row gy-4 posts-list">
    <table border='1' class="custom-table">
                
            <tr><th>Université</th><th>programme</th><th>domaine</th><th>réponse</th></tr>
            <?php   
                    foreach ($list2 as $loginc) {
                   
                    ?>
                            
                        <tr>
                            <td><?= $loginc['NomPart']; ?></td>
                            <td><?= $loginc['programme']; ?></td>
                            <td><?= $loginc['domaine']; ?></td>
                            <td><?= $loginc['ETAT']; ?></td>
                       
                                                       
                           
                                      
                        </tr>
                        <?php
                    }
                    ?>
                   
            </table>
    </div><!-- End blog posts list -->
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
</html>








