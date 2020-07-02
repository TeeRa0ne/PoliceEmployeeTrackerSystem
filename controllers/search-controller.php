<?php

require_once '../assets/services/db.php';

session_start();

$rFindall = "SELECT count(*) FROM users";

$rFindById = "SELECT id FROM users";

$rFirstName = "SELECT first_name FROM users WHERE id=";

$rLastName = "SELECT last_name FROM users WHERE id=";

$rank = "SELECT rank FROM users WHERE id=";

?>