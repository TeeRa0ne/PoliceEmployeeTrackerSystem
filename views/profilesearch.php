<?php

require '../assets/services/db.php';
session_start();

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('Location: view_index.php');
    exit;
}

$response = $bdd->prepare('SELECT username, first_name, last_name , permissions_level, rank, activeinactive, experience FROM users WHERE id = ?');
$response->execute([$_GET['id']]);
$user = $response->fetch(); 

if (!$user) {
    header('Location: view_index.php');
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
        <button onclick=window.location.href='../views/view_search.php'; class="button-submit-back"> <- Back </button>
            <h2>Employee Police Database</h2>
            <div class="box-employee">
            <?php
                echo '<p class="data">First name : '. ' ' .
                   $user['first_name'].'</p>' .
                   '<p class="data">Last name : '.
                   $user['last_name'].'</p>'.
                   '<p class="data">Rank : '.
                   $user['rank'].'</p>'.
                   '<p class="data">Active or Inactive : '.
                   $user['activeinactive'].'</p>'.
                   '<p class="data">Experience / Qualification : <br>'.
                   $user['experience'].'</p>'
                   ;
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