<?php

require_once __DIR__ . '/services/LoaderService.php';

$data = [
    "message" => ""
];

$user = $USER_SERVICE->getCurrentUser();

if ($user) {
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (FormCheck::checkFields(['username', 'password'])) {
        $user = $USER_SERVICE->getUserByField("username", $_POST['username']);
        if ($user) {
            if (password_verify($_POST['password'], $user['pwd'])) {
                $_SESSION['user_id'] = $user['ID'];
                header("Location: index.php");
                exit;
            } else {
                $data['message'] = "<p>Wrong username or password</p>";
            }
        } else {
            $data['message'] = "<p>Wrong username or password</p>";
        }
    } else {
        $data['message'] = "<p>Some fields are missing.</p>";
    }
}

echo ParseHTML::parseFile(__DIR__ . '/views/login.html', $data);
