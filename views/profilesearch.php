<?php

require '../assets/services/db.php';
session_start();

if (isset($_SESSION['id'])) {
    

$reponse = $bdd->prepare('SELECT username, first_name, last_name , permissions_level, rank, activeinactive, experience FROM users');
$reponse->execute();

}else{
    header('Location:view_index.php');
    exit;
}

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
            <p class="paccess">Access Granted - <?php echo $_SESSION['last_name'] . ' ' . $_SESSION['first_name'] . ' / ' . $_SESSION['rank'];   ?></p>

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
                   echo '<p>First name :</p>'.
                   $data['first_name'] .
                   '<p>Last name :</p>'.
                   $data['last_name'].
                   '<p>Rank :</p>'.
                   $data['rank'].
                   '<p>Active or Inactive :</p>'.
                   $data['activeinactive'].
                   '<p>Experience / Qualification :</p>'.
                   $data['experience']
                   ;
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