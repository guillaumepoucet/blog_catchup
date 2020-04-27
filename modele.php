<?php

require_once('class/Database.php');

//récupére tous les articles
function getPosts() {
    
    $connexion = new Database('localhost', 'catchup', 'root', '');
    $bdd = $connexion->PDOConnexion();    

    $posts = $bdd->prepare('SELECT * FROM t_posts');
    $posts ->execute();

    return $posts;
};

// renvoie les informations d'un billet par son id
function getPost($post_id) {
    $connexion = new Database('localhost', 'catchup', 'root', '');
    $bdd = $connexion->PDOConnexion();    

    $post = $bdd->prepare('SELECT * FROM t_posts WHERE post_id = ?');
    $post->execute(array($post_id));

    if ($post->rowCount() == 1) {
        return $post->fetch();
    } else {
        throw new Exception("Aucun article ne correspond à l'identifiant '$post_id'");
    }
}

function getComments($post_id) {
    $connexion = new Database('localhost', 'catchup', 'root', '');
    $bdd = $connexion->PDOConnexion();    

    $comments = $bdd->prepare('SELECT * FROM t_comments WHERE post_id = ?');
    $comments->execute(array($post_id));

    return $comments;
}