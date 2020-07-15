<?php

require '../assets/services/db.php';


$reponse = $bdd->prepare('SELECT username, first_name, last_name , permissions_level, rank FROM users');
$reponse->execute();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search - Police Employee System</title>
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
            <div><a href="../views/adminpanel">Admin Panel</a></div>
        </div>
    </header>
    <hr>
    <div class="background">
        <a href="../controllers/logout.php">Logout</a>
        <div class="container">
            <h2>Employee Police Database</h2>
            <form method="post">
                <div class="form1">
                    <label for="searchnameuser">Search By Name :</label>
                    <input for="searchnameuser" name="searchnameuser" type="text">
                    <br>
                    <label for="rank">Search By Rank :</label>
                    <input for="rank" name="rank" type="text">
                </div>
                <button class="button-submit-search" type="submit">Search</button>
            </form>
        </div>
    </div>
</body>

</html>