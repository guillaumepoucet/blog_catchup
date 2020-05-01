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
                    //renvoie la page de connection/inscription
                    $this->ctrlUser->loginPage();
                } elseif ($_GET['action'] == 'login') {
                    // var_dump($_POST['login']); exit;
                    // $login = $this->getParametre($_POST, 'login');
                    // $pass = $this->getParametre($_POST, 'pass');
                    $login = !empty($_POST['login']) ? $_POST['login'] : NULL;
                    $pass = !empty($_POST['pass']) ? $_POST['pass'] : NULL;        
            
                    $this->ctrlUser->login($login, $pass);
                } elseif ($_GET['action'] == 'admin') {
                    if (isset($_GET['id'])) {
                        if ($_GET['id'] == 'err') {
                            throw new Exception(("Erreur de connection"));
                        } elseif ($_GET['id'] == 'aff') {
                            throw new Exception(("Action non autorisée'"));
                        } elseif ($_GET['id'] == 'Userlist') {
                            $this->ctrlUser->afficherListeUsers();
                        }
                    }
                    // renvoie la page admin
                    $this->ctrlUser->login();
                } elseif ($_GET['action'] == 'deconnection') {
                    $this->ctrlUser->logout();
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

    // public function getParametre($array, $name) {
    //     if (isset($array['name'])) {
    //         return $array['name'];
    //     } else {
    //         throw new Exception("Paramètre '$name' absent");
    //     }
    // }
        
    // Affiche une erreur
    private function erreur($msgErreur) {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    } 
    
    
    
}