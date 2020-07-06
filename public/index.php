<?php

require '../assets/services/db.php';

session_start();
 $error = '';
 $bLogin = false;
 $bRegister = false;
 
 //VERIFIE SI FORMULAIRE ENVOYÉ OU PAS
 if(isset($_POST['deco'])){
  session_destroy();
 }
  
  
  // Récupération PROPRE des variables AVANT de les utiliser :
  $username = !empty($_POST['username']) ? $_POST['username'] : NULL;
  $password = !empty($_POST['pwd']) ? $_POST['pwd'] : NULL;
  
  $user = isset($_SESSION['user']) ? $_SESSION['user'] : ""; 
  
 if($username && $pwd){

   if(isset($_POST['valider'])){
    $bLogin = Login ($username, $password);
    if($bLogin == true){
     $_SESSION['user'] = $username;
    } else {
        header('Location: view_search.php');
    }
   }
      
   if(isset($_POST['register'])){
    $bRegister = Register($username, $password);
    if($bRegister == true){
     $_SESSION['user'] = $username;
    }
   }
   
  }
  else{
    header('Location: view_index.php?erreur=1');
  }

require '../views/view_index.php';

?>