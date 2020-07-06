<?php

class Db
{

   CONST DSN        = 'mysql:dbname=iia;host=localhost;charset=UTF8';
   CONST USER       = 'root';
   CONST PASSWORD   = '';

    private static $_instance;

    /**
     * Empêche la création externe d'instances.
     */
    private function __construct ()
    {
        // 1 - Se connecter à la base de données avec PDO
        // /!\ Pas avec les fonctions mysql_*
        try {
            self::$_instance = new PDO(self::DSN, self::USER, self::PASSWORD);
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
        }
    }

    /**
     * Empêche la copie externe de l'instance.
     */
    private function __clone () {}

    /**
     * Renvoie de l'instance et initialisation si nécessaire.
     */
    public static function getInstance () {
        if (!(self::$_instance instanceof PDO)) {
            new self();
        }

        return self::$_instance;
    }

}

    
?>