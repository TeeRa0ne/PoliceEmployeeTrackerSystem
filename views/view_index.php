<?php

require '../assets/Services/db.php';

session_start();
if(isset($_POST['username']) && isset($_POST['pwd']))
{
   
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username'])); 
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['pwd']));
    
    if($username !== "" && $password !== "")
    {
        $requete = "SELECT count(*) FROM users where 
              username = '".$username."' and pwd = '".$password."' ";
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {
           $_SESSION['username'] = $username;
           header('Location: Search.php');
        }
        else
        {
           header('Location: view_index.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Police Employee System</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header class="global">
        <div class="header1">
        <img class="logo" src="../assets/img/FBI.png" alt="logo">
            <h1 class="title">Federal Bureau of Investigation</h1>
            <p>Authorized personal only</p>
        </div>
    </header>
    <hr>
    <div class="background">
        <div class="container">
            <h2>Employee Police Database</h2>
            <form method="post">
                <div class="form1">
                    <label for="username">Username :</label>
                    <input for="username" name="username" type="text">
                    <br>
                    <label for="pwd">Password :</label>
                    <input for="pwd" name="pwd" type="password">
                </div>
            <div class="adminpanel-signin">
                <a href="adminpanel.php">Admin Panel</a>
                <button class="button-submit" type="submit" value="submit">Submit</button>
            </div>
            <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                ?>
            </form>   
        </div>
    </div>
</body>
</html>