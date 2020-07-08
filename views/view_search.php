<?php

require '../controllers/search-controller.php';
require '../assets/services/db.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Police Employee System</title>
    <link rel="stylesheet" href="../assets/css/search.css">
</head>
<body>
    <header class="global">
        <div class="header1">
        <img class="logo" src="../assets/img/FBI.png" alt="logo">
            <h1 class="title">Federal Bureau of Investigation</h1>
            <p>Access Granted - <?php
                session_start();
                if($_SESSION['username'] !== ""){
                    $user = $_SESSION['username'];
                    echo "$user";
                }
            ?></p>
        </div>
        <?php if ($permission_level > 5) {
            
            ?>
        <div><a href="../views/adminpanel">Admin Panel</a></div>
        <?php } ?>
    </header>
    <hr>
    <div class="background">
        <div class="container">
            <h2>Employee Police Database</h2>
            <form method="post">
                <div class="form1">
                    <label for="nameuser">Search By Name :</label>
                    <input for="nameuser" name="nameuser" type="text">
                    <br>
                    <label for="rank">Search By Rank :</label>
                    <input for="rank" name="rank" type="text">
                </div>
                <button class="button-submit" type="submit">Search</button>
            </form>   
        </div>
    </div>
</body>
</html>