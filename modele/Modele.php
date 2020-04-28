<?php

require_once('Database.php');

abstract class Modele {

    protected function executeRequest($sql, $params = null) {

        $bdd = new Database('localhost', 'catchup', 'root', '');
        $bdd = $bdd->PDOConnexion();  

        if ($params == null) {
            $result = $bdd->prepare($sql);
            $result->execute();
            return $result;
        } else {
            $result = $bdd->prepare($sql);
            $result ->execute($params);
            return $result;
        }
    }
}