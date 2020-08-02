<?php


class UserService
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public static function bootstrap($db) {
        return new UserService($db);
    }

    public function getUserByField($field, $content) {
        $stmt = $this->db->conn->prepare("SELECT * FROM `users` WHERE `$field` = ?");
        $stmt->execute([$content]);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();

        if (count($result) > 0) return $result[0];
        else return null;
    }

    public function deleteUserByField($field, $content) {
        $stmt = $this->db->conn->prepare("DELETE FROM `users` WHERE `$field` = ?");
        $stmt->execute([$content]);
    }

    public function fetchUsers($limit = 0, $offset = 0) {
        if ($limit && $limit > 0) {
            $stmt = $this->db->conn->prepare("SELECT * FROM `users` LIMIT $offset, $limit");
        } else {
            $stmt = $this->db->conn->prepare("SELECT * FROM `users`");
        }
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();

        foreach ($result as $key => $data) {
            $result[$key] = $data;
        }

        return $result;
    }

    public function getCurrentUser() {
        if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) return null;
        return $this->getUserByField("ID", $_SESSION['user_id']);
    }

    public function initAdmin() {
        $u = $this->getUserByField("username", ADMIN_USER);

        if (!$u || !password_verify(ADMIN_PASSWORD, $u['pwd'])) {
            if ($u) $this->deleteUserByField("username", ADMIN_USER);

            $u = $this->createUser(
                ADMIN_USER,
                ADMIN_PASSWORD,
                ADMIN_USER,
                ADMIN_USER,
                NULL,
                'Active',
                'Admin',
                5
            );
        }

        return $u;
    }

    public function createUser($username, $password, $first_name, $last_name, $experience, $status, $rank, $permissions) {
        $stmt = $this->db->conn->prepare("INSERT INTO `users` VALUES (NULL,?,?,?,?,?,?,?,?)");
        $stmt->execute([
            $username,
            password_hash($password, PASSWORD_BCRYPT),
            $first_name,
            $last_name,
            $status,
            $experience,
            $rank,
            $permissions
        ]);
        return $this->getUserByField("username", $username);
    }

    public function searchUserByField($field, $search) {
        $stmt = $this->db->conn->prepare("SELECT * FROM `users` WHERE `$field` LIKE ?");
        $stmt->execute(["%$search%"]);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();

        if (count($result) > 0) return $result;
        else return null;
    }
}