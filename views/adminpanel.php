<?php

require '../assets/services/db.php';

$reponse = $bdd->prepare('SELECT first_name, last_name, rank FROM users ORDER BY last_name');
$reponse->execute();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Police Employee Tracker System</title>
    <link rel="stylesheet" href="../assets/css/adminpanel.css">
    <link rel="stylesheet" href="../assets/Fontawesome/css/all.min.css" > 
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
        <h2>Administration Panel</h2>
        <div class="button-list">
            <button onclick=window.location.href='../views/add.php'; class="button-submit" type="submit"><a>Add new employee</a></button>
        </div>
        <div class="table-employee">
            <div class="box-employee">
                <p>First name</p>
                <p>Last name</p>
                <p>Rank</p>
                <i style="color: white;" class="fas fa-times"></i>
                <i style="color: white;"   class="fas fa-user-cog"></i>
            </div>
            <?php
                // while ($data = $reponse->fetch()) 
                // {
                //     echo $data['first_name'] . ' ' . $data['last_name'] . ' - ' . $data['rank'] . '</br>';
                // }
            ?>
        </div>
    </div>
</body>
</html>