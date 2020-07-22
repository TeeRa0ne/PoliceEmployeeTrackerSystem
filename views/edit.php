<?php

require '../assets/services/db.php';
session_start();

if (isset($_SESSION['id'])) {
    

if ($_SESSION['id']) {
    $reponse = $bdd->prepare('SELECT id, first_name, last_name, rank, activeinactive, experience, permission_level FROM users');
    $response->execute(array(
        'username' => $_GET['username'],
        'first_name' => $_GET['firstname'],
        'last_name' => $_GET['lastname'],
        'activeinactive' => $_GET['activeinactive'],
        'experience' => $_GET['experience'],
        'rank' => $_GET['rank'],
        'permissions_level' => $_GET['permissions_level']));

        if (isset($_POST)) {
    
            $req2 = $bdd->prepare('UPDATE INTO users SET ');
        }
        
                

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
    <button onclick=window.location.href='../views/view_search.php'; class="button-submit-back"> <- Back </button>
    <form action="adminpanel.php" method="post">
        <label for="username">Username (login) :</label>
            <input name="username" for="username" type="text" value="<?php echo $valueusername ?>">
            <br>
        <label for="pwd">Password (login) :</label>
            <input name="pwd" for="pwd" type="password">
            <br>
        <label for="firstname">First name of employee :</label>
            <input name="firstname" for="firstname" type="text">
            <br>
        <label for="lastname">Last name of employee :</label>
            <input name="lastname" for="firstname" type="text">
            <br>
        <label for="rank">Rank :</label>
            <input name="rank" for="rank" type="text">
            <br>
        <label for="experience">Experience / Qualifications :</label>
            <textarea style="margin: 0px; width: 575px; height: 127px;" placeholder="Qualification..."  cols="20" rows="3" name="experience" for="experience" type="text">
            </textarea>
            <br>
        <label for="permissions_level">Permission Level 0 - 5 (For access to admin panel = 5) :</label>
            <input name="permissions_level" min="0" max="5" for="permissions_level" type="number">
            <br>
        <label for="activeinactive">Active or Inactive :</label>
        <select name="activeinactive" id="activeinactive">
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
        </select>

</body>
</html>