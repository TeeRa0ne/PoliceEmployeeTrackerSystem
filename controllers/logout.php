<?php
session_start();
$_SESSION = [];
session_destroy();
header('location:../views/view_index.php');
?>