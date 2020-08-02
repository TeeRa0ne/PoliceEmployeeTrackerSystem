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

$search = $USER_SERVICE->getUserByField("ID", $_GET['id']);

if (!$search) {
    header("Location: index.php");
    exit;
}

foreach ($search as $key => $value) $data["_$key"] = $value;

if ($search['status'] == "Active") {
    $data['status'] = "
        <option value=\"Active\" selected>Active</option>
        <option value=\"Inactive\">Inactive</option>
    ";
} else {
    $data['status'] = "
        <option value=\"Active\" >Active</option>
        <option value=\"Inactive\" selected>Inactive</option>
    ";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (FormCheck::checkFields(['usernamed', 'firstname', 'lastname', 'rank', 'experience', 'status'])) {
        $stmt = $db->conn->prepare("UPDATE `users` SET `username` = ?, `first_name` = ?, `last_name` = ?, `rank` = ?, `experience` = ?, `status` = ? WHERE `ID` = ?");
        $stmt->execute([
            $_POST['usernamed'],
            $_POST['firstname'],
            $_POST['lastname'],
            $_POST['rank'],
            $_POST['experience'],
            $_POST['status'],
            $_GET['id']
        ]);
        if (isset($_POST['password']) && !empty($_POST['password'])) {
            $stmt = $db->conn->prepare("UPDATE `users` SET `pwd` = ? WHERE `ID` = ?");
            $stmt->execute([
                password_hash($_POST['password'], PASSWORD_BCRYPT)
            ]);
        }
        header("Location: edit.php?id=" . $_GET['id']);
        exit;
    } else {
        $data['message'] = "<p class='error'>Some fields are missing.</p>";
    }
}

echo ParseHTML::parseFile(__DIR__ . '/views/edit.html', $data);