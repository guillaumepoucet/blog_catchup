<?php

require_once('modele/User.php');
require_once('vue/vue.php');

class ControleurUser
{

    private $user;
    private $name;

    public function __construct()
    {
        $this->user = new User;
    }

    public function loginPage()
    {
        $vue = new Vue("Connection");
        $vue->generer(array('connection'));
    }

    public function session($login, $pass)
    {
        $user = $this->user->session($login, $pass);
        if (!empty($user)) {
            header('location:index.php');
        }
    }

    public function adminPage()
    {
        $vue = new Vue("Admin");
        $vue->genereradmin(array());
    }

    public function logout()
    {
        $user = new User;
        $user->logout();
    }

    public function afficherListeUsers()
    {
        $users = $this->user->getUsers();
        $usertypes = $this->user->getUsertype();
        $vue = new Vue("UserList");
        $vue->genererAdmin(array('users' => $users, 'usertypes' => $usertypes));
    }

    public function deleteUser($user_id)
    {
        $delete = $this->user->deleteUser($user_id);
        if ($delete) {
            header('location:index.php?action=admin&id=userlist&statut=deleteOk');
        }
    }

    public function editRole($usertype_id, $user_id)
    {
        $edition = $this->user->editRole($usertype_id, $user_id);
        $this->afficherListeUsers();
    }

    public function newUser()
    {
        $newUser = $this->user->insertUser();
        if ($newUser) {
            header('location:index.php?action=connection&id=signinOk');
        }
    }

    public function viewInfoUser($login)
    {
        
        $userInfo = $this->user->getUser($login);
        $vue = new Vue("InfoUser");
        $vue->genererAdmin(array('user' => $userInfo));
    }

    public function setInfoUSer($user_id)
    {
        $set = $this->user->setInfoUSer($user_id);
        $_SESSION['set'] = 'ok';
        var_dump($_SESSION);
        $this->viewInfoUser($_SESSION['login']);
    }
}
