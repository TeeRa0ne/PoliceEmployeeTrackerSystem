<?php

session_start();

require_once __DIR__ . '/../config.php';

require_once __DIR__ . '/DatabaseService.php';
require_once __DIR__ . '/UserService.php';

require_once __DIR__ . '/../utils/ParseHTML.php';
require_once __DIR__ . '/../utils/FormCheck.php';

$db = new DatabaseService();
$db->build();

$USER_SERVICE = UserService::bootstrap($db);
$USER_SERVICE->initAdmin();