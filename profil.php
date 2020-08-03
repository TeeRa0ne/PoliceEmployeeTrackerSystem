<?php

require_once __DIR__ . '/services/LoaderService.php';

$data = [];

$user = $USER_SERVICE->getCurrentUser();

if (!$user) {
    header("Location: login.php");
    exit;
}

$data = array_merge($data, $user);
if ($user['permissions_level'] == 5)
    $data['admin_panel'] = "<a class=\"admin-panel-button\" href=\"admin.php\">Admin Panel</a>";

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$search = $USER_SERVICE->getUserByField("ID", $_GET['id']);

if (!$search) {
    header("Location: index.php");
    exit;
}

foreach ($search as $key => $value) $data["_$key"] = $value;

echo ParseHTML::parseFile(__DIR__ . '/views/profil.html', $data);