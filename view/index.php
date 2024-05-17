<?php
require "../config.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="10.png">
    <link rel="stylesheet" href="5.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <title>StudyGo</title>
    <script src="../java.js"></script>
    
    
    

</head>
<body>
    
    <header>

    <button id="topButton" onclick="scrollToTop()"><i class="material-icons">keyboard_arrow_up</i> Haut de page</button>
         <div class="main">
                <div class="para">
                        <img src="10.png" alt="" class="zoom" >
                        
                        <button>Acceuil</button>
                        <select class="selecto" onfocus="this.size=1;" onblur="this.size=1;" onchange="this.size=1;this.blur();">
                        <option selected disabled>Destination</option>
                        <option>France</option>
                        <option>Espagne</option>
                        <option>Turkey</option>
                        </select>
                        <button><a href="#x">A propos</a></button>
                        <!-- <button><a href="#y"> Nos chiffres</a></button> -->
                        <button><a href="#c"> Nos services</a></button>
                        <button>Contact</button>
                        <button id="login"><a href="login.php">Login</a></button>                        
                    
                
                </div>
                
            </div>
            
                <div class="back1">
                    <div class="text-overlay">
                        <br>
                        <br>
                        <br>
                        <h4>Votre avenir</h4>
                        <h4>commence ici</h4>
                        <br>
                        <h6>Notre organisation facilite vos études à l'étranger et<br> assure votre avenir professionnel</h6>
                        <button class="voir"><a href="#dest">Voir plus <br></button></a>

                    
                    </div>
                    <div class="g2"><img src="g2 1.png" alt=""></div>
                    <div class="g3"><img src="g3 1.png" alt=""></div>
                    <div class="g4"><img src="g4 1.png" alt=""></div>
                    <div class="h"><img src="h 1.png" alt="" ></div>
                    <div class="valise"><img src="valise 1.png" alt=""></div>
                    <div class="monde"><img src="monde 1.png" alt=""></div>
                    <!-- <div class="avion"><img src="avion 1.png" alt=""></div> -->
                    <div class="local"><img src="local 1.png" alt=""></div>
                    
                </div>
                <br>
                <br>
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                <div class="nomdest" id="dest"><h1>Nos Destination</h1></div>
                    <div class="dest">
                        <div class="container">
                            <div class="box box-1" style="--img: url(https://upload.wikimedia.org/wikipedia/commons/thumb/a/a8/Tour_Eiffel_Wikimedia_Commons.jpg/260px-Tour_Eiffel_Wikimedia_Commons.jpg);" data-text1="a France est reconnue par la qualité du système éducatif, la diversité des filières et des programmes d'études, ainsi que l'expertise des professeurs qualifiés." data-text="France">
                            </div> 
                            <div class="box box-2" style="--img:url(https://cdn-s-www.vosgesmatin.fr/images/7EDC2BD4-C140-4220-813F-7F40E3BBF099/NW_raw/le-colisee-symbole-de-rome-1578325863.jpg;" data-text1="Etudier en Italie offre une immersion culturelle exceptionnelle, une éducation de qualité et de multiples opportunités d'exploration et de croissance personnelle." data-text="Italie">
                            </div> 
                            <div class="box box-3" style="--img:url(https://backoffice.lepetitjournal.com/sites/default/files/2022-09/turquie%20integrer%20vivre.jpeg);" data-text="Turquie" data-text1=" étudier en Turquie offre une combinaison unique d'histoire, de culture, de diversité géograph">
                            </div> 
                            <div class="box box-4" style="--img:url(https://image-blog.comptoir.fr/espagne/2019/12/Seville.png);"data-text1="étudier en Espagne offre une expérience culturelle enrichissante, une éducation de qualité, l'opportunité d'apprendre une langue largement parlée et un mode de vie agréable." data-text="Espagne">
                            </div> 
                            <div class="box box-5" style="--img:url(https://www.tunisienumerique.com/wp-content/uploads/2023/05/immobilier-allemagne-seloger.jpg);" data-text1="Etudier en Allemagne offre une éducation de qualité, des opportunités professionnelles, un environnement culturel diversifié et des avantages financiers attractifs." data-text="Allemagne" >
                            </div> 
                        </div>
                    </div>
                    <div class="propos" id="x">
                        <div class="eclipse"><img src="ellipse 2.png" alt=""></div>
                        <div class="tunis"><img src="map tunisie 1.png" alt=""></div>
                        <div class="vector13">
                            <img src="Vector 13.png" alt="">
                            <class class="tooltip">Gafsa , StadyGo   ,37.280483, 9.869084.</class>
                        </div>
                        <div class="vector12">
                            <img src="Vector 12.png" alt="">
                            <class class="tooltip1">StudyGo , Bizerte ,37.280483, 9.869084.</class>

                        </div>
                        <div class="vector11">
                            <img src="Vector 11.png" alt="">
                            <class class="tooltip2">Nabel , mrezga , StudyGo , 001B620,H60,F332</class>
                        </div>
                        <div class="vector10">
                            <img src="Vector 10.png" alt="">
                            <class class="tooltip3">Sfax , sakiat el zit , StudyGo ,37.280483, 9.869084.</class>

                        </div>
                        <div class="vector9">
                            <img src="Vector 9.png" alt="">
                            <class class="tooltip4">Djerba , houmet souk , StudyGo .Mednine , StudyGo ,37.280483, 9.86084.</class>

                        </div>


                        <div class="boxtunis">

                                    <br>
                                    <h3 id="h">A propos:</h3><br>
                                    <p id="p1">Si vous avez l’ambition ou l’envie de terminer vos études universitaires à l’étranger, saisissez cette chance ! Les avantages sont nombreux, tant pour votre CV que pour votre culture personnelle. <br><br>
                                    Et puisqu’un séjour d'études à l'étranger ne s'improvise pas, Les professionnels d’ETUDIER PLUS vous garantissent une organisation optimale d’une rentrée universitaire à l'étranger. 
                                    <br>
                                    <br>
                                    Nous saurons répondre aux questions les plus demandées :</p>
                                    <br>
                                    <div class="list">

                                        <ul>
                                            <li class="partie-gauche">Comment partir ?</li>
                                            <li class="partie-droite">Comment financer les études ?</li>
                                            <li class="partie-gauche">Comment avoir son visa ?</li>
                                            <li class="partie-droite">Quelle université choisir ?</li>
                                            <li class="partie-gauche">Où étudier ?</li>
                                            <li class="partie-droite">Où se loger ?</li>
                                        </ul>
                                    </div>


                        </div>

                    </div>
    
               
               

                <h2 id="c">Nos services</h2>
                <div class="contenaire1">
                    <div class="services1">
                        <div class="doora"><img src="call_1515524 1.png" alt=""></div>
                        
                        <h2 id="contact">LA PRISE DE CONTACT</h2>
                        <p id="prise">Vous pouvez nous contacter à travers notre site internet STUDYGO.TN, par mail ou téléphone, ou faire une demande d’informations. Un conseiller prendra contact avec vous et vous proposera un premier entretien téléphonique. Cet entretien nous permettra d’étudier et de discuter de votre projet ensemble, de vous expliquer les différents systèmes scolaires et ce que nous pouvons vous proposer comme programme éducatif.</p>
                    </div>
                    <div class="ph1">

                    </div>
                </div>
                <div class="contenaire2">
                    <div class="services2">


                    </div>
                    <div class="ph2">
                    <div class="doora1"><img src="folder_11971048 2.png" alt=""></div>
                    <h2 id="contact">LE CHOIX DU PROGRAMME ET DOSSIER DE CANDIDATURE</h2>
                        <p id="prise">StudyGo vous accompagnera dans l’élaboration des lettres de recommandation et la constitution des dossiers de candidature des universités.Pour certains programmes, nous vous aiderons à passer un test linguistique, ainsi qu’un entretien en ligne ou présentiel avec l’un des membres de l’école.</p>

                    </div>
                </div>
                <div class="contenaire3">
                    <div class="services3">
                        <div class="doora1"><img src="document_4547469 1.png" alt=""></div>
                    <h2 id="contact">DEMANDE D’ADMISSION</h2>
                        <p id="prise">Pour faire une demande d’admission dans une Université à l’étranger, il est indispensable de définir vos besoins et vos objectifs bien avant d’acquérir la documentation et les formulaires d’admission, afin de trouver l’école qui offre un programme correspondant à vos aspirations et attentes.StudyGo vous aidera à faire une demande d’admissions avec ses différentes étapes comme :</p>
                        <div class="list">
                                    <ul>
                                        <li class="partie-gauche">Choisir un programme</li>
                                        <li class="partie-droite">Consulter les dates limites d’admissions</li>
                                        <li class="partie-gauche">Consulter les conditions d’admissions</li>
                                        <li class="partie-droite">Préparer les pièces requises pour l’admission</li>
                                    </ul>
                        </div>

                    </div>
                    <div class="ph3">
                    
                    </div>
                </div>
                <div class="contenaire4">
                    <div class="services4">

                    </div>
                    <div class="ph4">
                    <div class="doora1"><img src="visa_3261452 1.png" alt=""></div>
                    <h2 id="contact">DEMANDE DE VISA</h2>
                        <p id="prise">Nos conseillers des admissions travaillent en coopération très étroite avec les agents chargés des visas de nos destinations. Ils se tiennent informés des nouvelles lois concernant les visas et savent exactement quels documents sont nécessaires pour aider les étudiants.</p>
                    </div>
                </div>
                <div class="contenaire5">
                    <div class="services5">
                    <div class="doora1"><img src="university_15175783 1.png" alt=""></div>
                    <h2 id="contact">BOURSE & LOGEMENT</h2>
                        <p id="prise">Notre service dédié à l'assistance des candidats offre un soutien complet pour obtenir un logement et une bourse d'études. Nous comprenons les défis auxquels sont confrontés les étudiants lorsqu'ils recherchent un logement abordable et une aide financière pour poursuivre leurs études. Notre équipe expérimentée travaille en étroite collaboration avec les candidats pour les guider tout au long du processus, en les aidant à trouver des options de logement adaptées à leurs besoins et à leur budget, tout en les informant sur les différentes bourses d'études disponibles. </p>

                    </div>
                    <div class="ph5">
                   
                    </div>
                </div>
                <div class="contenaire6">
                    <div class="services6">
                    

                    </div>
                    <div class="ph6">
                    <div class="doora1"><img src="language_2017189 1.png" alt=""></div>

                    <h2 id="contact">FORMATION LINGUISTIQUE</h2>
                        <p id="prise">Notre équipe expérimentée propose des formations linguistiques personnalisées, adaptées aux besoins spécifiques de chaque candidat. Nous offrons des cours intensifs et interactifs qui couvrent les principales langues demandées sur le marché du travail, en mettant l'accent sur la grammaire, la prononciation, la compréhension orale et écrite, ainsi que la communication professionnelle.  </p>
                   
                    </div>
                </div>
            
    </header>
    <footer>
        <div class="foufou">
            <div class="cadre1">
                <div class="taswira"><img src="Fichier 3 1.png" alt=""></div>
                <p>Si vous souhaitez accomplir des études complètes à l'étranger,
                Veuillez-vous renseigner directement auprès de StudyGo.</p>
                <h3>Suivez-nous:</h3>
                <div class="icon">
                    <a href="https://www.instagram.com/y.dhib/saved/all-posts/" target="_blank"><i class="fa-brands fa-square-instagram"></i></a>
                    <a href="https://www.facebook.com/?locale=fr_FR" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                    
                </div>
            </div>
            <div class="cadre2">
                <h2>DESTINATIONS</h2>
                <ul>
                    <li>France</li>
                    <li>Allemagne</li>
                    <li>Espagne</li>
                    <li>Italie</li>
                    <li>Turquie</li>
                </ul>


            </div>
            <div class="cadre3">
            <h2>SERVICES</h2>
                <ul>
                    <li>Prise contacte</li>
                    <li>Dossier</li>
                    <li>Demende D admission</li>
                    <li>Demende visa</li>
                    <li>Bourse & Logement</li>
                    <li>Formation linguistique</li>
                </ul>
            </div>
            <div class="cadre4">
                    <h2>CONTACT</h2>
                <ul>
                    <div class="adres"><li>Immeuble Graiet, 4ème étage, Bureau 44, Sfax.Immeuble Nessrine, 2ème étage, Bureau G13, Avenue de l'Union du Maghreb Arabe La Soukra, 2036 Ariana.</li></div>
                    <div class="tel"><li>+216 94 141 491</li></div>
                    <div class="mail"><li>studygo@gmail.com</li></div>
                </ul>

            </div>
            



        </div>
        
    </footer>
    
   
</body>

</html>