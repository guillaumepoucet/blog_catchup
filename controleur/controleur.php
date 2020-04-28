<?php

require 'modele/Modele.php';

// Affiche la liste de tous les billets du blog
function accueil() {
  $posts = getPosts();
  require 'vue/vueAccueil.php';
}

// Affiche les détails sur un billet
function billet($post_id) {
  $post = getPost($post_id);
  $comments = getComments($post_id);
  require 'vue/vuePost.php';
}

// Affiche une erreur
function erreur($msgErreur) {
  require 'vue/vueErreur.php';
}