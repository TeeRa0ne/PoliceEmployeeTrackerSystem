<?php

require_once __DIR__ . '/services/LoaderService.php';

$data = [
    "message" => null
];

$user = $USER_SERVICE->getCurrentUser();

if (!$user || $user['permissions_level'] < 5) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (FormCheck::checkFields(['username', 'pwd', 'firstname', 'lastname', 'rank', 'experience', 'permissions_level', 'status'])) {
        if (!$USER_SERVICE->getUserByField("username", $_POST['username'])) {
            $u = $USER_SERVICE->createUser(
                $_POST['username'],
                $_POST['pwd'],
                $_POST['firstname'],
                $_POST['lastname'],
                $_POST['experience'],
                $_POST['status'],
                $_POST['rank'],
                $_POST['permissions_level']
            );

            if ($user) {
                header("Location: edit.php?id=" . $u['ID']);
                exit;
            } else {
                $data['message'] = "<p class='error'>An error occured with your request.<br>Please try again.</p>";
            }
        } else {
            $data['message'] = "<p class='error'>This username is already used.</p>";
        }
    } else {
        $data['message'] = "<p class='error'>Some fields are missing.</p>";
    }
}

echo ParseHTML::parseFile(__DIR__ . '/views/add.html', $data);