<?php 

header('Content-type: text/html; charset=utf-8');
require_once('controleur/Controleur.php');

try {
    if (isset($_GET['action'])) {
      if ($_GET['action'] == 'post') {
        if (isset($_GET['id'])) {
          $post_id = intval($_GET['id']);
          if ($post_id != 0)
            billet($post_id);
          else
            throw new Exception("Identifiant de billet non valide");
        }
        else
          throw new Exception("Identifiant de billet non défini");
      }
      else
        throw new Exception("Action non valide");
    }
    else {
      accueil();  // action par défaut
    }
  }
  catch (Exception $e) {
      erreur($e->getMessage());
  }