<?php

require '../assets/services/db.php';

$reponse = $bdd->prepare('SELECT id, first_name, last_name, rank FROM users');
$reponse->execute();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Police Employee Tracker System</title>
    <link type="text/css" rel="stylesheet" href="../assets/css/adminpanel.css?<?php echo time(); ?>" >
    <link rel="stylesheet" href="../assets/Fontawesome/css/all.css"> 
    <script defer src="../assets/Fontawesome/js/all.js"></script>
</head>
<body>
    <header class="global">
        <div class="header1">
        <img class="logo" src="../assets/img/FBI.png" alt="logo">
            <h1 class="title">Federal Bureau of Investigation</h1>
            <div>
                <p class="danger">Administrator</p>
            </div>
        </div>
    </header>
    <hr>
    <div class="container">
    <button onclick=window.location.href='../views/view_search.php'; class="button-submit-back"> <- Back </button>
        <h2>Administration Panel</h2>
        <div class="button-list">
            <button onclick=window.location.href='../views/add.php'; class="button-submit" type="submit"><a>Add new employee</a></button>
        </div>
        <div class="table-employee">
            <div class="box-employee">
            <?php
                while ($data = $reponse->fetch()) 
                {
                   echo '<div class="box-name">'.
                   '<p>'. $data['first_name'] . '</p>'. 
                    '<p>' . $data['last_name'] . '</p>' 
                    . '<p>' . $data['rank'] . '</p>' .
                    '<div class="icons-admin">
                    <i class="fas fa-user-cog"></i>
                    <a id="Popup" href="adminpanel.php?id='.$data['id'].'"><i style="color: red;" class="fas fa-times"></i></a>
                    </div>'.'</div>';
                }
            ?>
            
            </div>
        </div>
    </div>
    <script src="../assets/js/script.js"></script>
</body>
</html>