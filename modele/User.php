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
        $sql = 'SELECT  U.*,
                        T.usertype_name
                FROM t_users U
                LEFT JOIN t_usertype T ON T.usertype_id = U.usertype_id';
        $users = $this->executeRequest($sql);
        return $users->fetchAll();
    }

    public function getUsertype() {
        $sql = 'SELECT * FROM t_usertype';
        $usertypes = $this->executeRequest($sql);
        return $usertypes->fetchAll();
    }

    public function login($login, $pass) {


        $sql = 'SELECT U.user_login, U.user_pass
                FROM t_users U
                WHERE user_login = ?';

        $connectUser = $this->executeRequest($sql, array($login));
        
        $count = $connectUser->rowCount();

        if($count > 0) {   
            $user = $this->getUser($login);
            $mdpval = password_verify($pass, $user['user_pass']);
            if ($mdpval) {
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['login'] = $login;
                $_SESSION['pass'] = $pass;
                $_SESSION['firstname'] = $user['user_firstname'];
                $_SESSION['lastname'] = $user['user_lastname'];
                $_SESSION['photo'] = $user['user_photo_url'];
                $_SESSION['type'] = $user['usertype_id'];
                return $user;
            } else {
                throw new Exception ("Le mot de passe ne correspond pas");
            } 
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

    public function insertUser() {

        $user_lastname = !empty($_POST['lastname']) ? $_POST['lastname'] : NULL;
        $user_firstname = !empty($_POST['firstname']) ? $_POST['firstname'] : NULL;
        $user_login = !empty($_POST['login']) ? $_POST['login'] : NULL;
        $user_mail = !empty($_POST['mail']) ? $_POST['mail'] : NULL;
        $user_pass = !empty($_POST['pass']) ? $_POST['pass'] : NULL;
        $pass2 = !empty($_POST['pass2']) ? $_POST['pass2'] : NULL;


        $sql ='SELECT user_id FROM t_users WHERE user_login = ?';
        $user = $this->executeRequest($sql, array($user_login));
        
        if ($user->rowCount() == 0) {

            $user_token = $this->random(60);

            // checking if both password are the same
            $same = strcmp($user_pass, $pass2);
            if ($same == 0) {

                $user_pass = password_hash($user_pass, PASSWORD_DEFAULT);

                $sql = 'INSERT INTO t_users(user_lastname, user_firstname, user_login, user_mail, user_pass, user_token) 
                        VALUES (:user_lastname, :user_firstname, :user_login, :user_mail, :user_pass, :user_token)';
                $newUser = $this->executeRequest($sql, array(
                    'user_lastname' => $user_lastname,
                    'user_firstname' => $user_firstname,
                    'user_login' => $user_login,
                    'user_mail' => $user_mail,
                    'user_pass' => $user_pass,
                    'user_token' => $user_token,
                ));
        
                return $newUser;
    
                // $user_id = $sql->lastinsertId(); 
                //mail($email, "Confirmation de votre compte", "Afin de valider cotre compte, merci de cliquer sur ce lien \n\n <a href=\"http://localhost/jeupoo/traitement/confirm.php?id=$user_id&token=$user_token\">Valider votre compte</a>");
            
            } else {
                throw new Exception("Les mots de passes ne correspondent pas.");
            }
    
        } else {
            throw new exception("Un utilisateur existe déjà avec ce nom : '$user_login'");
        }
        
    }

    public function random($length) {

        $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
        return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);

    }

    public function confirm($user_id, $token) {
  
        $user_id = !empty($_GET['id']) ? $_GET['id'] : NULL;
        $token = !empty($_GET['token']) ? $_GET['token'] : NULL;

        $connexion = new Database('localhost', 'poo', 'root', '');
        $bdd = $connexion->PDOConnexion();
        
        $req = $bdd->prepare('  SELECT * FROM user WHERE id_user = ?');
        $req -> execute([$user_id]);
        
        $user = $req->fetch();

        $same = strcmp($token, $user['$token']);
        
        if ($same == 60) {
            $confirmation = $bdd->prepare(' UPDATE user 
                                            SET confirmed = ?
                                            WHERE id_user = ?');
            $confirmation->execute(array(1, $user_id));
            session_start();
            header('location:../index.php?=confirm=ok');

        } else {
            header('location:../index.php?confirm=error');
        }

    }

    public function deleteUser($user_id) {

        $sql = 'DELETE FROM t_users WHERE user_id = ?';
        return $delUser = $this->executeRequest($sql, array($user_id));
    }

    public function editRole($usertype_id, $user_id) {

        $sql = 'UPDATE t_users SET usertype_id = ? WHERE user_id = ?';
        return $roleEdited = $this->executeRequest($sql, array($usertype_id, $user_id));
    }
}