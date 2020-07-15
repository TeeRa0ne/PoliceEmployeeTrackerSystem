<?php

require '../assets/services/db.php';

if (!empty($_POST)){
    // Hachage du mot de passe
    $pass_hache = password_hash($_POST['pwd'], PASSWORD_DEFAULT);

    // Insertion
    $req = $bdd->prepare('INSERT INTO users(id, username, pwd, first_name, last_name, activeinactive, experience, rank, permissions_level) VALUES(NULL, :username, :pwd, :first_name, :last_name, :activeinactive, :experience, :rank, :permissions_level, CURDATE())');
    $req->execute(array(
        'username' => $_POST['username'],
        'pwd' => $pass_hache,
        'first_name' => $_POST['firstname'],
        'last_name' => $_POST['lastname'],
        'activeinactive' => $_POST['activeinactive'],
        'experience' => $_POST['experience'],
        'rank' => $_POST['rank'],
        'permissions_level' => $_POST['permissions_level']));
        echo 'User has been add';

}else{
    echo 'Field is empty.';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add employee - Police Employee Tracker System</title>
    <link type="text/css" rel="stylesheet" href="../assets/css/adminpanel.css?<?php echo time(); ?>" >
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
        <button onclick=window.location.href='../views/adminpanel.php'; class="button-submit-back"> <- Back </button>
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
                <label for="activeinactive">Active or Inactive :</label>
                <select name="activeinactive" id="activeinactive">
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
                <button class="button-submit" type="submit" value="submit">Add employee</button>
            </form>
        </div>
    </div>
</body>
</html>