<?php
session_start(); // Assurez-vous de démarrer la session


require '../controler/loginc.php';


if(isset($_SESSION['user1']))
{   $e=new loginc();
    $user=$_SESSION['user1'];
    $list=$e->selectuser($user);
    var_dump($list);
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name=viewport content="width=device-width", initial-scale="1.0">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="profile.css">
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
    
    <div class="backend_1">
    <li><a href="users.php"><i class="lni lni-users"></i> Gérer votre compte</a></li>
    <li><a href="userEducation.php"><i class="lni lni-users"></i> Consulter votre Compte</a></li>
    <li><a href="login.php"></i>Log out</a></li>

</ul>
        </ul>
    </div>

    <div class="contenu">
        <div class="navbar">
        
        </div>
        <div class="tables">
            

            <table border='1'>
                
            <tr><th>Iduser</th><th>Nom</th><th>Prenom</th><th>Email</th><th>Mot de passe</th><th>Modifier</th><th>Supprimer</th></tr>
            <?php   
                    
                    foreach ($list as $loginc) {
                    ?>
                        <!-- <tr id="row_<?php echo $user['idUser']; ?>"> -->
                            <td><?= $loginc['idUser']; ?></td>
                            <td><?= $loginc['user']; ?></td>
                            <td><?= $loginc['userPrenom']; ?></td>
                            <td><?= $loginc['email']; ?></td>
                            <td><?= str_repeat('*', strlen($loginc['mdp'])); ?></td>                            
                            <td align="center">
                                <form method="POST" action="">
                                <!-- <a href="updatelogin.php?id=<?= $loginc['idUser']; ?>">update</a>   -->
                                <input type="button" value="Update" onclick="window.location.href='updatelogin.php?id=<?= $loginc['idUser']; ?>'">
                                </form>
                            </td>
                            <td>
                            <form action="deleteUser.php" method="post" onsubmit="return confirmDelete()">
                            <input type="hidden" name="id_user" value="<?php echo $loginc['idUser']; ?>">
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








