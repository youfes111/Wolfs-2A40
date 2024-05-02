<?php

require '../controler/diplomec.php';
$e=new diplomec();
$list=$e->listdiplome();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name=viewport content="width=device-width", initial-scale="1.0">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="users2.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.11.4/i18n/French.json"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" href="10.png">
    <title>StudyGo|Les clients</title>
    <script>
   function deleteUser(idUser) {
    if (confirm("Are you sure you want to delete this user?")) {
        // Supprimer la ligne du tableau HTML
        var row = document.getElementById("row_" + idUser);
        row.parentNode.removeChild(row);

       
    }

}
function confirmDelete() {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                // Si l'utilisateur confirme, le formulaire est soumis normalement
                return true;
            } else {
                // Si l'utilisateur annule, le formulaire n'est pas soumis
                return false;
            }
        });
       
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
    <li><a href="education_back.php"><i class="lni lni-book"></i> Les Educations</a></li>
    <li><a href="diplome_back.php"><i class="lni lni-book"></i> Les diplomes</a></li>
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
            

            <table border='1'class="my-table" id="my-table" >
            <thead>
            <tr><th>ID_Diplome</th><th>nom</th><th>document</th><th>Moyenne</th><th>date_diplome</th><th>Modifier</th><th>Supprimer</th></tr>  </thead>
            <tbody>  
           <?php
                    foreach ($list as $diplomec) {
                    ?>
                        <tr id="row_<?php echo $diplomec['ID_DIPLOME']; ?>">
                        <td><?= $diplomec['ID_DIPLOME']; ?></td>
                            <td><?= $diplomec['nom']; ?></td>
                            <td><?= substr($diplomec['document'], 0, 20); ?>...</td>
                            <td><?= $diplomec['Moyenne']; ?></td>
                            <td><?= $diplomec['date_diplome']; ?></td>              
                            <td align="center">
                                <form method="POST" action="">

                                <input type="button" value="Update" name="bt_update"    onclick="window.location.href='update_userdiplome.php?ID_DIPLOME=<?= $diplomec['ID_DIPLOME']; ?>'">
                                </form>
                            </td>
                            <td>
    <form action="deletediplome.php" method="POST" onsubmit="return confirmDelete()">
        <input type="hidden" name="ID_DIPLOME" value="<?php echo $diplomec['ID_DIPLOME']; ?>">
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







