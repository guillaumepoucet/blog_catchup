<?php
session_start();

require_once('../class/class_user.php');

if(isset($_SESSION['online']) && ($_SESSION['online'] == 1)) {
            $user = new User($_SESSION['id_user'], $_SESSION['username'], $_SESSION['email']);
            $user->affiche();
            echo "<center><a href=\"../functions/logout.php\"><button>Me déconnecter</button></a></center>";
};

?>