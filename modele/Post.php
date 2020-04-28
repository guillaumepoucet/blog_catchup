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
        
        $sql = 'SELECT 
                P.*,
                I.post_img_url,
                U.user_lastname,
                U.user_firstname,
                U.user_description,
                U.user_photo_url
                FROM t_posts P
                LEFT JOIN t_post_img I
                    ON I.post_id = P.post_id
                LEFT JOIN t_users U
                    ON U.user_id = P.user_id
                WHERE P.post_id = ?';
        $post = $this->executeRequest($sql, array($post_id));
    
        if ($post->rowCount() == 1) {
            return $post->fetch();
        } else {
            throw new Exception("Aucun article ne correspond à l'identifiant '$post_id'");
        }
    }
    
}