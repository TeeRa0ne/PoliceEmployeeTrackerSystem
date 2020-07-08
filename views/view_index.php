<?php
 require '../assets/services/db.php';

session_start();
 






?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Police Employee System</title>
    <link rel="stylesheet" href="../assets/css/main.css">
</head>
<body>
    <header class="global">
        <div class="header1">
        <img class="logo" src="../assets/img/FBI.png" alt="logo">
            <div>
                <h1 class="title">Federal Bureau of Investigation</h1>
            </div>
            <div style="padding-left: 10px;">
                <p>Authorized personal only</p>
            </div>
        </div>
    </header>
    <hr>
    <div class="background">
        <div class="container">
            <h2>Employee Police Database</h2>
            <form method="post">
                <div class="form1">
                    <div class="login">
                        <label for="username">Username :</label>
                        <input for="username" name="username" type="text">
                    </div>
                    <br>
                    <div class="password">
                        <label for="pwd">Password :</label>
                        <input for="pwd" name="pwd" type="password">
                    </div>
                </div>
            <div class="adminpanel-signin">
                <button class="button-submit" type="submit" value="submit">Connect to the database</button>
            </div>
            <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1)
                        echo "<p>Username or password is incorrect !</p>";
                }
                ?>
            </form>   
        </div>
    </div>
</body>
</html>