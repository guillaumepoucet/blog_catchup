<?php

require_once 'ControleurAccueil.php';
require_once 'ControleurPost.php';
require_once 'ControleurUser.php';
require_once 'vue/Vue.php';

class Routeur
{

    private $_ctrlAccueil;
    private $_ctrlPost;

    public function __construct()
    {
        $this->ctrlAccueil = new ControleurAccueil();
        $this->ctrlPost = new ControleurPost();
        $this->ctrlUser = new ControleurUser();
    }

    // Traite une requête entrante
    public function routeurRequete()
    {
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
                    if (empty($_SESSION)) {
                        //renvoie la page de connection/inscription
                        $this->ctrlUser->loginPage();
                    } else {
                        header('location:index.php');
                    }
                } elseif ($_GET['action'] == 'addComment') {
                    if (isset($_GET['id'])) {
                        $post_id = intval($_GET['id']);
                        if ($post_id != 0) {
                            $this->ctrlPost->addComment($post_id);
                        }
                    }
                } elseif ($_GET['action'] == 'deleteComment') {
                    if (isset($_GET['id'])) {
                        $comment_id = intval($_GET['id']);
                        $post_id = intval($_GET['post_id']);
                        if ($post_id != 0) {
                            $this->ctrlPost->deleteComment($comment_id, $post_id);
                        }
                    }
                } elseif ($_GET['action'] == 'login') {
                    $login = !empty($_POST['login']) ? $_POST['login'] : NULL;
                    $pass = !empty($_POST['pass']) ? $_POST['pass'] : NULL;
                    $this->ctrlUser->session($login, $pass);
                } elseif ($_GET['action'] == 'newPost') {
                    $this->ctrlPost->newPost();
                } elseif ($_GET['action'] == 'signin') {
                    $this->ctrlUser->newUser();
                } elseif ($_GET['action'] == 'admin') {
                    if (isset($_GET['id'])) {
                        if ($_GET['id'] == 'err') {
                            throw new Exception(("Utilisateur non trouvé"));
                        } elseif ($_GET['id'] == 'aff') {
                            throw new Exception(("Action non autorisée'"));
                        } elseif ($_GET['id'] == 'postlist') {
                            $this->ctrlPost->getPosts();
                        } elseif ($_GET['id'] == 'archives') {
                            $this->ctrlPost->getArchivePosts();
                        } elseif ($_GET['id'] == 'comments') {
                            $this->ctrlPost->getArchiveComments();
                        } elseif ($_GET['id'] == 'userlist') {
                            // admin afficher la liste des membres
                            $this->ctrlUser->afficherListeUsers();
                        } elseif ($_GET['id'] == 'editRole') {
                            // actualise la vue arès avoir changé le rôle d'un membre
                            $user_id = !empty($_POST['user_id']) ? $_POST['user_id'] : NULL;
                            $usertype_id = !empty($_POST['usertype_id']) ? $_POST['usertype_id'] : NULL;
                            $this->ctrlUser->editRole($usertype_id, $user_id);
                        } elseif ($_GET['id'] == 'editCategory') {
                            // actualise la vue arès avoir changé la categorie d'un article
                            $post_id = !empty($_POST['post_id']) ? $_POST['post_id'] : NULL;
                            $category_id = !empty($_POST['category_id']) ? $_POST['category_id'] : NULL;
                            $this->ctrlPost->editCategory($post_id, $category_id);
                        } elseif (strpbrk($_GET['id'], 'deleteUser')) {
                            // supprimer un membre
                            $user_id = str_replace('deleteUser', "", $_GET['id']);
                            $this->ctrlUser->deleteUser($user_id);
                        } else {
                            $login = $_SESSION['login'];
                            $this->ctrlUser->viewInfoUser($login);
                        }
                    }
                    // renvoie la page admin
                    $this->ctrlUser->adminPage();
                } elseif ($_GET['action'] == 'deletePost') {
                    // supprimer un article
                    $post_id = ($_GET['id']);
                    $this->ctrlPost->deletePost($post_id);
                } elseif ($_GET['action'] == 'deleteArchComment') {
                    // supprimer un article
                    $comment_id = ($_GET['id']);
                    $this->ctrlPost->deleteArchiveComment($comment_id);
                } elseif ($_GET['action'] == 'editPost') {
                    // editer un article
                    $post_id = ($_GET['id']);
                    $this->ctrlPost->editPost($post_id);
                } elseif ($_GET['action'] == 'archivePost') {
                    // supprimer un article
                    $post_id = ($_GET['id']);
                    $this->ctrlPost->archivePost($post_id);
                } elseif ($_GET['action'] == 'reactPost') {
                    // reactiver un article
                    $post_id = ($_GET['id']);
                    $this->ctrlPost->reactivePost($post_id);
                } elseif ($_GET['action'] == 'archiveComment') {
                    // archiver un commentaire
                    $comment_id = ($_GET['id']);
                    $post_id = ($_GET['post_id']);
                    $this->ctrlPost->archiveComment($comment_id, $post_id);
                } elseif ($_GET['action'] == 'editUser') {
                    // editer les infos d'un user
                    $user_id = intval($_GET['id']);
                    $this->ctrlUser->setInfoUser($user_id);
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
    private function erreur($msgErreur)
    {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }
}
