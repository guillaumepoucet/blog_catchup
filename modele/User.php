<?php

require_once('BDDRequest.php');

class User extends BDDRequest {

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

    public function getUsers() {

        $sql = 'SELECT * FROM t_users';
        $users = $this->executeRequest($sql);
        return $users->fetchAll();

    }

    public function login($login, $pass) {

        $sql = 'SELECT * 
                FROM t_users 
                WHERE user_login = ? 
                AND user_pass = ?';
        $connectUser = $this->executeRequest($sql, array($login, $pass));

        $count = $connectUser->rowCount();
        if($count > 0)
        {
            $user = $this->getUser($login);
            $_SESSION['login'] = $login;
            $_SESSION['pass'] = $pass;
            $_SESSION['firstname'] = $user['user_firstname'];
            $_SESSION['lastname'] = $user['user_lastname'];
            $_SESSION['photo'] = $user['user_photo_url'];
            $_SESSION['type'] = $user['usertype_id'];
            
            header("location:index.php?action=admin");
        }
        else
        {
        //Mauvais identifiant ou mauvais tout cours
        header("location:index.php?action=admin&id=err");
        }
        
    }

    public function getUser($login) {

        $sql = 'SELECT U.*
                FROM t_users U
                WHERE U.user_login = ?';
        $user = $this->executeRequest($sql, array($login));

        if ($user->rowCount() == 1) {
            return $user->fetch();
        } else {
            throw new exception("Aucun utilisateur ne correspond au nom d'utilisateur '$login'");
        }
    }

    public function logout() {
        // Suppression des variables de session et de la session
        $_SESSION = array();
        session_destroy();

        header('location:index.php');
    }

    public function insertUser($login, $pass, $email) {

        $user_lastname = !empty($_POST['lastname']) ? $_POST['lastname'] : NULL;
        $user_firstname = !empty($_POST['firstname']) ? $_POST['firstname'] : NULL;
        $user_login = !empty($_POST['login']) ? $_POST['login'] : NULL;
        $user_mail = !empty($_POST['mail']) ? $_POST['mail'] : NULL;

        $user_token = random(60);
        $user_pass = password_hash($pass, PASSWORD_DEFAULT);


        $sql = 'INSERT INTO `t_users`(`user_lastname`, `user_firstname`, `user_login`, `user_mail`, `user_pass`, `user_token`) 
                VALUES (?, ?, ?, ?, ?, ?)';
        $newUser = $this->executeRequest($sql, array(
            'user_lastname' => $user_lastname,
            'user_firstname' => $user_firstname,
            'user_login' => $user_login,
            'user_mail' => $user_mail,
            'user_pass' => $user_pass,
            'user_token' => $user_token,
        ));

        $user_id = $sql->lastinsertId(); 

        mail($email, "Confirmation de votre compte", "Afin de valider cotre compte, merci de cliquer sur ce lien \n\n <a href=\"http://localhost/jeupoo/traitement/confirm.php?id=$user_id&token=$user_token\">Valider votre compte</a>");
        
    }

}