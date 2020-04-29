<?php

require_once('Database.php');

abstract class BDDRequest {

    protected $_bdd;

    protected function getBdd() {

        $bdd = new Database('localhost', 'catchup', 'root', '');
        $bdd = $bdd->PDOConnexion();  
        return $bdd;
    }

    protected function executeRequest($sql, $params = null) {


        if ($params == null) {
            $result = $this->getBdd()->prepare($sql);
            $result->execute();
            return $result;
        } else {
            $result = $this->getBdd()->prepare($sql);
            $result ->execute($params);
            return $result;
        }
    }
}