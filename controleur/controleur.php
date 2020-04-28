<?php

require 'modele/Modele.php';
require 'modele/Post.php';

// Affiche la liste de tous les billets du blog
function accueil() {
  $posts = new Post;
  $posts = $posts->getPosts();
  require 'vue/vueAccueil.php';
}

// Affiche les détails sur un billet
function billet($post_id) {
  $post = new Post;
  $post = $post->getPost($post_id);
  $comments = new Comment;
  $comments = $comments->getComments($post_id);
  require 'vue/vuePost.php';
}

// Affiche une erreur
function erreur($msgErreur) {
  require 'vue/vueErreur.php';
}