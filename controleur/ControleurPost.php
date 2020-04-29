<?php

require_once('modele/Post.php');
require_once('modele/Comment.php');
require_once('vue/Vue.php');

class ControleurPost {

    private $_post;
    private $_comment;

    public function __construct() {
        $this->post = new Post;
        $this->comment = new Comment;
    }

    // Affiche les détails sur un post
    public function post($post_id) {
        $post = $this->post->getPost($post_id);
        $comments = $this->comment->getComments($post_id);
        $vue = new Vue("Post");
        $vue->generer(array('post' => $post, 'comments' => $comments));
    }
}