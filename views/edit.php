<?php

require '../assets/services/db.php';
session_start();

if (!isset($_SESSION['id'])) {
	header('Location: view_index.php');
    exit;
}

if (!isset($_GET['username']) || empty($_GET['username'])) {
	header('Location: view_index.php');
    exit;
}

$req = $bdd->prepare('SELECT * FROM users WHERE username = ?');
$req->execute([$_GET['username']]);
$user = $req->fetch();

if (!$user) {
	header('Location: view_index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$req = $bdd->prepare('UPDATE INTO users SET username=?, first_name=?, last_name=?, activeinactive=?, experience=?, `rank`=?, permissions_level=? WHERE id=?');
	$req->execute(array(
		$_POST['username'],
		$_POST['firstname'],
		$_POST['lastname'],
		$_POST['activeinactive'],
		$_POST['experience'],
		$_POST['rank'],
		$_POST['permissions_level'],
                $user['id']
	));
        header("Refresh:0");
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
    <div class="container">
    <h2>Employee Polcie DataBase</h2>
    <form action="adminpanel.php" method="post">
        <label for="username">Username (login) :</label>
            <input name="username" for="username" type="text" value="<?= $user['username'] ?>">
            <br>
        <label for="firstname">First name of employee :</label>
            <input name="firstname" for="firstname" type="text" value="<?= $user['first_name'] ?>">
            <br>
        <label for="lastname">Last name of employee :</label>
            <input name="lastname" for="firstname" type="text" value="<?= $user['last_name'] ?>">
            <br>
        <label for="rank">Rank :</label>
            <input name="rank" for="rank" type="text" value="<?= $user['rank'] ?>">
            <br>
        <label for="experience">Experience / Qualifications :</label>
            <textarea style="margin: 0px; width: 575px; height: 127px;" placeholder="Qualification..."  cols="20" rows="3" name="experience" for="experience" type="text">
				<?= $user['experience'] ?>
			</textarea>
            <br>
        <label for="permissions_level">Permission Level 0 - 5 (For access to admin panel = 5) :</label>
            <input name="permissions_level" min="0" max="5" for="permissions_level" type="number" value="<?= $user['permissions_level'] ?>">
            <br>
        <label for="activeinactive">Active or Inactive :</label>
        <select name="activeinactive" id="activeinactive">
            <option value="yes" <?php if ($user['activeinactive'] == "yes") echo "selected"; ?>>Active</option>
            <option value="no" <?php if ($user['activeinactive'] == "no") echo "selected"; ?>>Inactive</option>
        </select>
        <button class="button-submit" type="submit" value="submit">Edit employee</button>
    </div>
</body>
</html>