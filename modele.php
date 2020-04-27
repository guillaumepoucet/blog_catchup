<?php

require_once('class/Database.php');

function getPosts() {
    $connexion = new Database('localhost', 'catchup', 'root', '');
    $bdd = $connexion->PDOConnexion();

    $posts = $bdd->prepare ('SELECT * FROM t_posts');
    $posts ->execute();

    return $posts;
};