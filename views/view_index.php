<?php
 require '../assets/services/db.php';

session_start();
 
 if(isset($_POST['username']) && isset($_POST['pwd']))
 {
    
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
            header('Location: view_search.php');
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
                <button class="button-submit" type="submit" value="submit">Sign in</button>
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