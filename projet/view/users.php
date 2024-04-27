<?php

require '../controler/loginc.php';
$e=new loginc();
$list=$e->listlogin();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name=viewport content="width=device-width", initial-scale="1.0">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="users4.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.11.4/i18n/French.json"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    

    <link rel="icon" href="10.png">
    <title>StudyGo|Les clients</title>
    <script>
        
        
        function checkdelete(userName, userPrenom) {
    Swal.fire({
        title: 'Confirmation',
        text: 'Êtes-vous sûr de vouloir supprimer ' + userName.toUpperCase() + ' ' + userPrenom.toUpperCase() + ' ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Oui, supprimer !',
        cancelButtonText: 'Non, annuler',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('deleteForm').submit();
        }
    });

    return false; // Empêche la soumission du formulaire par défaut
}

</script>
<script>

$(document).ready(function() {
    $('.my-table').DataTable({
        "language": {
            "sEmptyTable": "Aucune donnée disponible dans le tableau",
            "sInfo": "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
            "sInfoEmpty": "Affichage de l'élément 0 à 0 sur 0 élément",
            "sInfoFiltered": "(filtré à partir de _MAX_ éléments au total)",
            "sInfoPostFix": "",
            "sInfoThousands": ",",
            "sLengthMenu": "Afficher _MENU_ éléments",
            "sLoadingRecords": "Chargement...",
            "sProcessing": "Traitement...",
            "sSearch": "Rechercher :",
            "sZeroRecords": "Aucun élément correspondant trouvé",
            "oPaginate": {
                "sFirst": "Premier",
                "sLast": "Dernier",
                "sNext": "Suivant",
                "sPrevious": "Précédent"
            },
            "oAria": {
                "sSortAscending": ": activer pour trier la colonne par ordre croissant",
                "sSortDescending": ": activer pour trier la colonne par ordre décroissant"
            },
            "select": {
                "rows": {
                    "_": "%d lignes sélectionnées",
                    "0": "Aucune ligne sélectionnée",
                    "1": "1 ligne sélectionnée"
                }
            }
        }

    });
});
</script>



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
    <li><a href="backend_1.php"><i class="lni lni-dashboard"></i> Dashboard</a></li>
    <hr>
    <h6>Les gestions</h6>
    <div class="backend_1">
    <li><a href="users.php"><i class="lni lni-users"></i> Les clients</a></li>
    <li><a href="#"><i class="lni lni-layers"></i> Les offres</a></li>
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
            

            <table border='1' class="my-table" id="my-table" >
                
            <thead>
        <tr>
            <th data-column="nom" data-order="desc">Nom</th>
            <th data-column="prenom" data-order="desc">Prenom</th>
            <th data-column="email" data-order="desc">Email</th>
            <th>Supprimer</th>
        </tr>
    </thead>  
    <tbody>   
                <?php
                    foreach ($list as $loginc) {
                    ?>
                        <tr id="row_<?php echo $loginc['idUser']; ?>">
                            <!-- <td><?= $loginc['idUser']; ?></td> -->
                            <td><?= $loginc['user']; ?></td>
                            <td><?= $loginc['userPrenom']; ?></td>
                            <td><?= $loginc['email']; ?></td>
                            <!-- <td?= str_repeat('*', strlen($loginc['mdp'])); ?></td>                             -->
                            
                            <td>
                            
                            <form id="deleteForm" action="deleteUser.php" method="post"  onsubmit="return checkdelete('<?php echo $loginc['user']; ?>', '<?php echo $loginc['userPrenom']; ?>')">
                            <input type="hidden" name="id_user" id="id_user" data-id="<?php echo $loginc['idUser']; ?>"value="<?php echo $loginc['idUser']; ?>">
                            <button type="submit" name="delete">Delete</button>
                            </form>

                            </td>                
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody> 
                </table>
        </div>
    </div>
 </div>

</body>
</html>








