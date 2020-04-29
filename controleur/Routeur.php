<?php

require_once 'ControleurAccueil.php';
require_once 'ControleurPost.php';
require_once 'ControleurUser.php';
require_once 'vue/Vue.php';

class Routeur {

    private $_ctrlAccueil;
    private $_ctrlPost;

    public function __construct() {
        $this->ctrlAccueil = new ControleurAccueil();
        $this->ctrlPost = new ControleurPost();
        $this->ctrlUser = new ControleurUser();
    }

    // Traite une requête entrante
    public function routeurRequete() {
        try {
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'post') {
                    if (isset($_GET['id'])) {
                        $post_id = intval($_GET['id']);
                        if ($post_id != 0) {
                            $this->ctrlPost->post($post_id);
                        } else {
                            throw new Exception("Identifiant de billet non valide");
                        } 
                    } else {
                        throw new Exception("Identifiant de billet non défini");
                    } 
                } elseif ($_GET['action'] == 'connection') {
                    $this->ctrlUser->loginPage();
                } else {
                    throw new Exception("Action non valide");
                } 
            } else {  // aucune action définie : affichage de l'accueil
                $this->ctrlAccueil->accueil();
            }
        } catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }
        
    // Affiche une erreur
    private function erreur($msgErreur) {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }  
    
}