<?php

require_once('BDDRequest.php');

class User {

    private $_user_id;
    private $_user_lastname;
    private $_user_firstname;
    private $_user_login;
    private $_user_mail;
    private $_user_pass;
    private $_user_token;
    private $_user_confirmed;
    private $_user_photo_url;
    private $_usertype_id;
    private $_user_description;
    private $_user_online;

    public function __construct($user_login, $user_pass) {

        $this->_user_login = $user_login;
        $this->_user_pass = $user_pass;
        $this->_user_online = 1;

    }

    public function getId_user()
    {
        return $this->_id_user;
    }
    public function getUsername()
    {
        return $this->_username;
    }
    public function getEmail()
    {
        return $this->_email;
    }


}