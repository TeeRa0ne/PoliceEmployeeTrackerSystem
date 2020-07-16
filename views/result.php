<?php

require '../assets/services/db.php';


$reponse = $bdd->prepare('SELECT username, first_name, last_name , permissions_level, rank, activeinactive FROM users');
$reponse->execute();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Result - Police Employee System</title>
    <link rel="stylesheet" href="../assets/css/search.css?<?php echo time(); ?>">
</head>

<body>
    <header>
        <div class="header1">
            <img class="logo" src="../assets/img/FBI.png" alt="logo">
            <h1 class="title">Federal Bureau of Investigation</h1>
            <p>Access Granted - <?php $data = $reponse->fetch(); if(isset($_SESSION['username'])) { 
                echo $data['first_name'] . $data['last_name'] . '-' . $data['rank'] ;}
                ?></p>

        </div>
    </header>
    <hr>
    <div class="background">
        <div class="container">
            <h2>Employee Police Database</h2>
            <div class="box-employee">
            <?php
                while ($data = $reponse->fetch()) 
                {
                   echo '<div class="box-name">'.
                   '<p>'. $data['first_name'] . '</p>'. 
                    '<p>' . $data['last_name'] . '</p>' 
                    . '<p>' . $data['rank'] . '</p>' .
                    '<p>' . $data['activeinactive'] . '</p>' .
                    '</div>'.'</div>';
                }
            ?>
            </div>
        </div>
    </div>
    <div class="logout-admin">
        <a class="admin-panel-button" href="../views/adminpanel">Admin Panel</a>
        <br>
        <a class="logout-button" href="../controllers/logout.php">Logout</a>
    </div>
</body>

</html>