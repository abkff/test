<?php
class Connection
{

    public function getConnect()
    {
        $propertiesArray = parse_ini_file('../config/config.ini', true);
        $choixBD = $propertiesArray["choixConnection"];
        $connectionMethod = $propertiesArray[$choixBD];
        $host = $connectionMethod["serveur"];
        $db = $connectionMethod["db"];
        $user = $connectionMethod["ut"];
        $pwd = $connectionMethod["mdp"];
        try {
            $db = new PDO("mysql:host=$host;dbname=$db", $user, $pwd);
        } catch (PDOException $e) {
            echo $e->getMessage();
            die;
        }
        return $db;
    }
}
