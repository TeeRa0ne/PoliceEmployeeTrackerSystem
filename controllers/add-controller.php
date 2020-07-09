<?php

require '../assets/services/db.php';

// Hachage du mot de passe
$pass_hache = password_hash($_POST['pwd'], PASSWORD_DEFAULT);

// Insertion
$req = $bdd->prepare('INSERT INTO users(username, pwd, first_name, last_name, gender, active, experience, rank, permissions_level) VALUES(:username, :pwd, :first_name, :last_name, :gender, :active, :experience, :rank, :permissions_level, CURDATE())');
$req->execute(array(
    'username' => $username,
    'pwd' => $pass_hache,
    'first_name' => $first_name,
    'last_name' => $last_name,
    'gender' => $gender,
    'active' => $active,
    'experience' => $experience,
    'rank' => $rank,
    'permissions_level' => $permissions_level));



?>