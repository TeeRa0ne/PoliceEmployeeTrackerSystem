<?php


require_once __DIR__ . '/services/LoaderService.php';

$data = [
    "employee" => "",
    "search_username" => "",
    "search_rank" => ""
];

$user = $USER_SERVICE->getCurrentUser();

if (!$user) {
    header("Location: login.php");
    exit;
}

$data = array_merge($data, $user);
if ($user['permissions_level'] == 5)
    $data['admin_panel'] = "<a class=\"admin-panel-button\" href=\"admin.php\">Admin Panel</a>";

if ((isset($_GET['q']) && !empty($_GET['q'])) || (isset($_GET['r']) && !empty($_GET['r']))) {
    $sql = "SELECT * FROM `users` WHERE";
    $sql_data = [];

    if (isset($_GET['q']) && !empty($_GET['q'])) {
        $sql .= " `username` LIKE ?";
        array_push($sql_data, '%'.$_GET['q'].'%');
        $data['search_username'] = $_GET['q'];
    }

    if (isset($_GET['r']) && !empty($_GET['r'])) {
        if (isset($_GET['q']) && !empty($_GET['q'])) $sql .= " AND `rank` LIKE ?";
        else $sql .= " `rank` LIKE ?";
        array_push($sql_data, '%'.$_GET['r'].'%');
        $data['search_rank'] = $_GET['r'];
    }

    $stmt = $db->conn->prepare($sql);
    $stmt->execute($sql_data);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();

    if (count($result) > 0) {
        foreach ($result as $u) {
            $data['employee'] = $data['employee'] .
            '<div class="box-name">'.
            '<p>'. $u['first_name'] .' ' . $u['last_name'].'</p>' .
            '<p>&nbsp;|&nbsp;' . $u['rank'] . '</p>' .
            '<p>&nbsp;[' . $u['status'].'] &nbsp;' . '</p>' .
            '<a title="Show profil" style="color: orange;" href="profil.php?id='.$u['ID'].'"><i class="fas fa-user-alt"></i></a>' .
            '</div>';
        }
    }
}

echo ParseHTML::parseFile(__DIR__ . '/views/home.html', $data);
