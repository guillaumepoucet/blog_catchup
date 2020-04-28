<?php

require 'Modele.php';

// Affiche la liste de tous les billets du blog
function accueil() {
  $posts = getPosts();
  require 'vueAccueil.php';
}

// Affiche les détails sur un billet
function billet($idBillet) {
  $post = getPost($idBillet);
  $comments = getComments($idBillet);
  require 'vuePost.php';
}

// Affiche une erreur
function erreur($msgErreur) {
  require 'vueErreur.php';
}