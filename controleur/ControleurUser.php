<?php

require_once('modele/User.php');
require_once('vue/vue.php');

class ControleurUser {

    private $user;

    public function loginPage() { 
        $vue = new Vue("Connection");
        $vue->generer(array('connection'));
    }

    public function adminPage() {
        $vue = new Vue("Admin");
        $vue->genereradmin(array('admin'));
    }

    public function login($login, $pass) {
        $user = new User;
        $user->login($login, $pass);

    }

}