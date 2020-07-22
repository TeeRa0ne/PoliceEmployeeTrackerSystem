<?php

require '../assets/services/db.php';
session_start();


if (isset($_SESSION['id'])) {

    $reponse = $bdd->prepare('SELECT id, username, first_name, last_name , permissions_level, rank FROM users');
    $reponse->execute();

    if (!empty($_GET)) {
        if(isset($_GET['q']) AND !empty($_GET['q'])) {
            $q = htmlspecialchars($_GET['q']);
            $user = $bdd->query('SELECT username, first_name, last_name , permissions_level, rank, activeinactive FROM users WHERE CONCAT(first_name, last_name, rank, activeinactive) LIKE "%'.$q.'%" ORDER BY id DESC');
            }
    }

    if ($userExist = 1) 
    {
        $userinfo = $reponse->fetch();
        $_SESSION['id'] = $userinfo['id'];
        $_SESSION['username'] = $userinfo['username'];
        $_SESSION['first_name'] = $userinfo['first_name'];
        $_SESSION['last_name'] = $userinfo['last_name'];
        $_SESSION['rank'] = $userinfo['rank'];


    }

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
    <title>Search - Police Employee System</title>
    <link rel="stylesheet" href="../assets/css/search.css?<?php echo time(); ?>">
</head>

<body>
    <header>
        <div class="header1">
            <img class="logo" src="../assets/img/FBI.png" alt="logo">
            <h1 class="title">Federal Bureau of Investigation</h1>
            <p class="paccess">Access Granted</p>

        </div>
    </header>
    <hr>
    <div class="background">
        <div class="container">
            <h2>Employee Police Database</h2>
            <form action="../views/view_search.php" method="get">
                <div class="form1">
                    <label for="q">Search By Name :</label>
                    <input for="q" name="q" type="search" placeholder="Search...">
                    <!-- <br>
                    <label for="byrank">Search By Rank :</label>
                    <input for="byrank" name="rank" type="search" placeholder="Rank"> -->
                </div>
                <button class="button-submit-search" type="submit">Search</button>
            </form>
            <div class="box-employee">
            <?php
                if (isset($user)) {
                while ($data = $user->fetch()) 
                {
                   echo
                   '<div class="box-name">'.
                   '<p>'. $data['first_name'] . '</p>'. 
                    '<p>' . $data['last_name'] . '</p>' 
                    . '<p>' . $data['rank'] . '</p>' .
                    '<p>' . $data['activeinactive'] . '</p>' .
                    '</div>'.'</div>';
                }
            }
            
            ?>
            </div>
        </div>
    </div>
    <div class="logout-admin">
    <?php if ($perm['permssions_level'] = 5) {?>
        <a class="admin-panel-button" href="../views/adminpanel">Admin Panel</a>
    <?php } ?>
        <br>
        <a class="logout-button" href="../controllers/logout">Logout</a>
    </div>
</body>

</html>