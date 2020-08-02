<?php


class DatabaseService
{

    public $conn = null;

    public function __construct()
    {
        $host = DATABASE_HOST;
        $dbname = DATABASE_NAME;
        $port = DATABASE_PORT;
        $user = DATABASE_USER;
        $password = DATABASE_PASSWORD;

        try {
            $this->conn = new PDO("mysql:host=$host;dbname=$dbname;port=$port", $user, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            if (PROJECT_ENV === "prod") {
                header("Location: /500.php");
                exit;
            } else die($e->getTraceAsString());
        }
    }

    public function build() {
        // create table "users" if not exist
        $this->conn->query("
            CREATE TABLE IF NOT EXISTS `users` (
                `ID` INT NOT NULL AUTO_INCREMENT,
                `username` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
                `pwd` TEXT NOT NULL,
                `first_name` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
                `last_name` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
                `status` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT 'Active',
                `experience` TEXT NULL DEFAULT NULL, 
                `rank` VARCHAR(255) NOT NULL,
                `permissions_level` TINYINT NOT NULL DEFAULT 0,
                PRIMARY KEY (`ID`),
                UNIQUE `username_u` (`username`)
            ) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_bin;
        ");
    }

}