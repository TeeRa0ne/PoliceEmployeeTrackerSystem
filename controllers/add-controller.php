<?php

require '../assets/services/db.php';

// On commence par récupérer les champs
if(isset($_POST['username']))      $username=$_POST['username'];
else      $username="";

if(isset($_POST['pwd']))      $pwd=$_POST['pwd'];
else      $pwd="";

if(isset($_POST['firstname']))      $firstname=$_POST['firstname'];
else      $firstname="";

if(isset($_POST['lastname']))      $lastname=$_POST['lastname'];
else      $lastname="";

if(isset($_POST['rank']))      $rank=$_POST['rank'];
else      $rank="";

if(isset($_POST['experience']))      $experience=$_POST['experience'];
else      $experience="";

if(isset($_POST['perm']))      $perm=$_POST['perm'];
else      $perm="";

if(isset($_POST['activeInactive']))      $activeInactive=$_POST['activeInactive'];
else      $activeInactive="";

if(isset($_POST['gender']))      $gender=$_POST['gender'];
else      $gender="";

// On vérifie si les champs sont vides
if(empty($username) OR empty($pwd) OR empty($firstname) OR empty($rank) OR empty($experience) OR empty($lastname) OR empty($perm) OR empty($activeInactive) OR empty($gender))
    {
    echo '<p>Warning a input as empty !</p>';
    }

// Aucun champ n'est vide, on peut enregistrer dans la table
else     
    {
        
    // on écrit la requête sql
    $sql = "INSERT INTO user(id, username, pwd, firstname, lastname, rank, experience, perm, activeInactive, gender) VALUES('','$username','$pwd','$firstname','$lastname','$rank','$experience', '$perm', '$activeInactive', '$gender')";
    
    // on insère les informations du formulaire dans la table
    mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

    // on affiche le résultat pour le visiteur
    echo '<p>Vos infos on été ajoutées.</p>';

    mysql_close();  // on ferme la connexion
    } 







?>