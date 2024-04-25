<?php

require '../controler/educationc.php';
$e=new educationc();
$list=$e->listeducation();

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
    <li><a href="education_back.php"><i class="lni lni-users"></i> Les Educations</a></li>
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
            

            <table border='1'>
                
            <tr><th>ID_Education</th><th>photo</th><th>Etat</th><th>emplacement</th><th>diplome</th><th>Modifier</th><th>Supprimer</th></tr>
            <?php
                    foreach ($list as $educationc) {
                    ?>
                        <tr id="row_<?php echo $educationc['ID_Education']; ?>">
                            <td><?= $educationc['ID_Education']; ?></td>
                            <td><?= substr($educationc['photo'], 0, 20); ?>...</td>
                            <td><?= $educationc['Etat']; ?></td>
                            <td><?= $educationc['emplacement']; ?></td>
                            <td><?= $educationc['ID_Diplome_E']; ?></td>              
                            <td align="center">
                                <form method="POST" action="">

                                <input type="button" value="Update" name="bt_update"onclick="window.location.href='update_userEducation.php?ID_Education=<?= $educationc['ID_Education']; ?>'">
                                </form>
                            </td>
                            <td>
    <form action="deleteEducation.php" method="post" onsubmit="return confirmDelete()">
        <input type="hidden" name="ID_Education" value="<?php echo $educationc['ID_Education']; ?>">
        <button type="submit" name="delete">Delete</button>
    </form>
</td>              
                        </tr>
                    <?php
                    }
                    ?>
            </table>
        </div>
    </div>
 </div>

</body>
</html>








