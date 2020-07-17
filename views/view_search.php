<?php

require '../assets/services/db.php';


$reponse = $bdd->prepare('SELECT username, first_name, last_name , permissions_level, rank FROM users');
$reponse->execute();

if (isset($_GET["s"]) AND $_GET["s"] == "Searchname")
{
 $_GET["searchnameuser"] = htmlspecialchars($_GET["searchnameuser"]); //pour sécuriser le formulaire contre les intrusions html
 $searchnameuser = $_GET["searchnameuser"];
 $searchnameuser = trim($searchnameuser); //pour supprimer les espaces dans la requête de l'internaute
 $searchnameuser = strip_tags($searchnameuser); //pour supprimer les balises html dans la requête

 if (isset($searchnameuser))
 {
  $searchnameuser = strtolower($searchnameuser);
  $select_searchnameuser = $bdd->prepare("SELECT first_name, last_name, rank, activeinactive FROM users WHERE first_name LIKE ? OR last_name LIKE ? OR rank LIKE ? OR activeinactive LIKE ?");
  $select_searchnameuser->execute(array("%".$searchnameuser."%", "%".$searchnameuser."%"));
 }
 else
 {
  $message = "You need to place your search in input";
 }
}

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
            <p class="paccess">Access Granted - <?php $data = $reponse->fetch(); if(isset($_SESSION['username'])) { 
                echo $data['first_name'] . $data['last_name'] . '-' . $data['rank'] ;}
                ?></p>

        </div>
    </header>
    <hr>
    <div class="background">
        <div class="container">
            <h2>Employee Police Database</h2>
            <form action="../views/view_search.php" method="get">
                <div class="form1">
                    <label for="searchnameuser">Search By Name :</label>
                    <input for="searchnameuser" name="searchnameuser" type="search" placeholder="Name">
                    <!-- <br>
                    <label for="byrank">Search By Rank :</label>
                    <input for="byrank" name="rank" type="search" placeholder="Rank"> -->
                </div>
                <button class="button-submit-search" name="Searchname" type="submit">Search</button>
            </form>
            <div class="box-employee">
            <?php
                // while ($data = $searchnameuser->fetch()) 
                //{
                //    echo '<div class="box-name">'.
                //    '<p>'. $data['first_name'] . '</p>'. 
                //     '<p>' . $data['last_name'] . '</p>' 
                //     . '<p>' . $data['rank'] . '</p>' .
                //     '<p>' . $data['activeinactive'] . '</p>' .
                //     '</div>'.'</div>';
                // }
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