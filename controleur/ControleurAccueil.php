<?php

require_once('modele/post.php');
require_once('vue/Vue.php');

class ControleurAccueil {
    
    private $_post;

    public function __construct() {
        $this->post = new Post;
    }

    // Affiche la liste de tous les posts du blog
    public function accueil() {
        $posts = $this->post->getPosts();
        $vue = new Vue("Accueil");
        $vue->generer(array('posts' => $posts));
    }

}