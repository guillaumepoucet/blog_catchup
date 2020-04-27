<?php 

require_once('Modele.php');

try {
    $posts = getPosts();
    require_once('vueAccueil.php');
}
catch (Exception $e) {
    $msgErreur = $e->getMessage();
    require_once('vueErreur.php');
}