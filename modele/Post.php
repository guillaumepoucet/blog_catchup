<?php

require_once('Modele.php');

class Post extends Modele {
    
    //récupére tous les articles
    public function getPosts() {

        $sql = 'SELECT * FROM t_posts';
        $posts = $this->executeRequest($sql);
        return $posts->fetchAll();
    }

    // renvoie les informations d'un billet par son id   
    public function getPost($post_id) {
        
        $sql = 'SELECT * FROM t_posts WHERE post_id = ?';
        $post = $this->executeRequest($sql, array($post_id));
    
        if ($post->rowCount() == 1) {
            return $post->fetch();
        } else {
            throw new Exception("Aucun article ne correspond à l'identifiant '$post_id'");
        }
    }
    
}