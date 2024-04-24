<?php
session_start(); // Assurez-vous de démarrer la session


require '../controler/loginc.php';


if(isset($_SESSION['user1']))
{   
    $user=$_SESSION['user1'];
   
    }
    $e=new loginc();
    $list=$e->selectuser($user);
    
    
    


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name=viewport content="width=device-width", initial-scale="1.0">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="profile2.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" href="10.png">
    <title>StudyGo|Gérer votre compte</title>
    <script>
   

</script>

</head>
<body>
<div class="wrapper">
    
<div class="sidebar">
        <div class="sidebar-header">
            <button class="sidebar-toggle">
            <img src="10.png" alt="Toggle Sidebar">
            </button>
        </div>
        
        <ul class="sidebar-nav">
            <hr>
            <ul class="sidebar-nav">
    
    <div class="backend_1">
    <li><a href="userprofile.php"><i class="lni lni-users"></i> Gérer votre compte</a></li>
    <li><a href="login.php"></i>Log out</a></li>

</ul>
        </ul>
    </div>

    <div class="contenu">
        <div class="navbar">
            <h4>Bonjour Mr.<?php echo $user; ?></h4>
        
        </div>
        <div class="tables">
            

            <table border='1'>
                
            <tr><th>Iduser</th><th>Nom</th><th>Prenom</th><th>Email</th><th>Modifier</th></tr>
            <?php   
                    
                   
                    ?>
                        <tr id="row_<?php echo $list['idUser']; ?>">
                            <td><?= $list['idUser']; ?></td>
                            <td><?= $list['user']; ?></td>
                            <td><?= $list['userPrenom']; ?></td>
                            <td><?= $list['email']; ?></td>
                                                       
                            <td align="center">
                                <form method="POST" action="">
                                <!-- <a href="updatelogin.php?id=<?= $list['idUser']; ?>">update</a>   -->
                                <input type="button" value="Update" onclick="window.location.href='updatelogin.php?id=<?= $list['idUser']; ?>'">
                                </form>
                            </td>
                                      
                        </tr>
                   
            </table>
        </div>
    </div>
 </div>

</body>
</html>








