<?php

require '../assets/services/db.php';

if (!empty($_POST)){
    // Hachage du mot de passe
    $pass_hache = password_hash($_POST['pwd'], PASSWORD_DEFAULT);

    // Insertion
    $req = $bdd->prepare('INSERT INTO users(username, pwd, first_name, last_name, gender, active, experience, rank, permissions_level) VALUES(:username, :pwd, :first_name, :last_name, :gender, :active, :experience, :rank, :permissions_level, CURDATE())');
    $req->execute(array(
        'username' => $_POST['username'],
        'pwd' => $pass_hache,
        'firstname' => $_POST['firstname'],
        'lastname' => $_POST['lastname'],
        'gender' => $_POST['gender'],
        'activeInactive' => $_POST['activeInactive'],
        'experience' => $_POST['experience'],
        'rank' => $_POST['rank'],
        'permissions_level' => $_POST['permissions_level']));

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add employee - Police Employee Tracker System</title>
    <link rel="stylesheet" href="../assets/css/adminpanel.css">
</head>
<body>
    <header class="global">
        <div class="header1">
        <img class="logo" src="../assets/img/FBI.png" alt="logo">
            <h1 class="title">Federal Bureau of Investigation</h1>
            <div>
                <p>Administrator</p>
            </div>
        </div>
    </header>
    <hr>
    <div class="container">
        <button onclick=window.location.href='../views/view_search.php'; class="button-submit-back"> <- Back </button>
    <h2>Administration Panel</h2>
        <div>
            <form action="" method="post">
                <label for="username">Username (login) :</label>
                    <input name="username" for="username" type="text">
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
                <label for="experience">Experience :</label>
                    <input name="experience" for="experience" type="text">
                    <br>
                <label for="permissions_level">Permission Level 0 - 5 (For access to admin panel = 5) :</label>
                    <input name="permissions_level" min="0" max="5" for="permissions_level" type="number">
                    <br>
                <label for="activeInactive">Active or Inactive :</label>
                <select name="activeInactive" id="activeInactive">
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
                <br>
                <div class="gender">
                    <label for="gender">Select gender :</label>  
                        <input type="radio" id="male" name="gender" value="male">
                    <label for="male">Male</label>
                        <input type="radio" id="female" name="gender" value="female">
                    <label for="female">Female</label>
                </div>
                <button class="button-submit" type="submit" value="submit">Add employee</button>
            </form>
        </div>
    </div>
</body>
</html>