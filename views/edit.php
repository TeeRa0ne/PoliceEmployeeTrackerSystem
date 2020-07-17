<?php

require '../assets/services/db.php';

$reponse = $bdd->prepare('SELECT id, first_name, last_name, rank FROM users');
$reponse->execute();

if (isset($_GET['id'])) {

    $id = htmlentities($bdd->quote($_GET['id']));

    $delete = $bdd->prepare("DELETE FROM users WHERE id=$id");
    $delete->execute();

    if ($delete) {
        echo '<p class="message-delete">User has been delete</p>';
        header('Location:../views/adminpanel.php');

    }
    else{
        $message = "Error.";
    }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit employee - Police Employee Tracker System</title>
    <link type="text/css" rel="stylesheet" href="../assets/css/adminpanel.css?<?php echo time(); ?>" >
    <link rel="stylesheet" href="../assets/Fontawesome/css/all.css"> 
    <script defer src="../assets/Fontawesome/js/all.js"></script>
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
    <button onclick=window.location.href='../views/view_search.php'; class="button-submit-back"> <- Back </button>

    </div>
</body>
</html>