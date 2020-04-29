<?php

require_once 'ControleurAccueil.php';
require_once 'ControleurPost.php';
require_once 'vue/Vue.php';

class Routeur {

    private $_ctrlAccueil;
    private $_ctrlBillet;

    public function __construct() {
        $this->ctrlAccueil = new ControleurAccueil();
        $this->ctrlBillet = new ControleurPost();
    }

    // Traite une requête entrante
    public function routeurRequete() {
        try {
        if (isset($_GET['action'])) {
            if ($_GET['action'] == 'post') {
            if (isset($_GET['id'])) {
                $post_id = intval($_GET['id']);
                if ($post_id != 0) {
                $this->ctrlBillet->post($post_id);
                }
                else
                throw new Exception("Identifiant de billet non valide");
            }
            else
                throw new Exception("Identifiant de billet non défini");
            }
            else
            throw new Exception("Action non valide");
        }
        else {  // aucune action définie : affichage de l'accueil
            $this->ctrlAccueil->accueil();
        }
        }
        catch (Exception $e) {
        $this->erreur($e->getMessage());
        }
    }

    // Affiche une erreur
    private function erreur($msgErreur) {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }
}