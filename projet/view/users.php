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
    <link rel="stylesheet" href="users2.css">
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
            <h1></h1>

            <table border='1'>
                
            <tr><th>Iduser</th><th>Nom</th><th>Prenom</th><th>Email</th><th>Mot de passe</th><th>Modifier</th><th>Supprimer</th></tr>
            <?php
                    foreach ($list as $loginc) {
                    ?>
                        <tr id="row_<?php echo $loginc['idUser']; ?>">
                            <td><?= $loginc['idUser']; ?></td>
                            <td><?= $loginc['user']; ?></td>
                            <td><?= $loginc['userPrenom']; ?></td>
                            <td><?= $loginc['email']; ?></td>
                            <td><?= $loginc['mdp']; ?></td>
                            <td align="center">
                                <form method="POST" action="">
                                <!-- <a href="updatelogin.php?id=<?= $loginc['idUser']; ?>">update</a>   -->
                                <input type="button" value="Update" onclick="window.location.href='updatelogin.php?id=<?= $loginc['idUser']; ?>'">
                                </form>
                            </td>
                            <td>
                                <form action="deleteUser.php" method="post">
                                    <input type="hidden" name="id_user" value="<?php echo $loginc['idUser'];?>">
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








