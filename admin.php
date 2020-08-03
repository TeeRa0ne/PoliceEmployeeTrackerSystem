<?php

require_once __DIR__ . '/services/LoaderService.php';

$data = [
    "employee" => "",
];

$user = $USER_SERVICE->getCurrentUser();

if (!$user || $user['permissions_level'] < 5) {
    header("Location: login.php");
    exit;
}

if (isset($_GET['delete']) && !empty($_GET['delete'])) {
    $USER_SERVICE->deleteUserByField("id", $_GET['delete']);
    header("Location: admin.php");
    exit;
}

foreach ($USER_SERVICE->fetchUsers() as $u) {
    $data['employee'] = $data['employee'] .
   '<div class="box-name">'.
    '<p>'. $u['first_name'] . '</p>'.
    '<p>' . $u['last_name'] . '</p>'
    . '<p>' . $u['rank'] . '</p>' .
    '<div class="icons-admin">
                    <a href="edit.php?id='.$u['ID'].'"><i class="fas fa-user-cog"></i></a>
                    <a href="?delete='.$u['ID'].'"><i style="color: red;" class="fas fa-times"></i></a>
                    </div>'.'</div>';
}

echo ParseHTML::parseFile(__DIR__ . '/views/admin.html', $data);
