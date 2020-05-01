<?php

require_once('modele/User.php');
require_once('vue/vue.php');

class ControleurUser {

    private $user;
    private $name;

    public function __construct() {
        $this->user = new User;
        $this->vue = new Vue($this->name);
    }

    public function loginPage() { 
        $vue = new Vue("Connection");
        $vue->generer(array('connection'));
    }
    
    public function login($login, $pass) {
        $user = $this->user->login($login, $pass);
        if (!empty($user)) {
            $this->adminPage();
        }
    }

    public function adminPage() {
        $vue = new Vue("Admin");
        $vue->genereradmin(array('admin'));
    }

    public function logout() {
        $user = new User;
        $user->logout();
    }

    public function afficherListeUsers() {
        $users = $this->user->getUsers();
        $usertypes = $this->user->getUsertype();
        $vue = new Vue("UserList");
        $vue->genererAdmin(array('users' => $users, 'usertypes' => $usertypes));
    }

}