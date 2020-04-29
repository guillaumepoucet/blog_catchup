<?php

require_once('modele/User.php');
require_once('vue/vue.php');

class ControleurUser {

    public function loginPage() { 
        $vue = new Vue("Connection");
        $vue->generer(array('connection'));
    }

}