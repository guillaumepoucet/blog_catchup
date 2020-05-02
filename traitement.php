<?php

session_start();

$user = "root";
$pass = "";
// Je me connecte à ma bdd
$bdd = new PDO('mysql:host=localhost;dbname=catchup;charset=utf8', $user, $pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


$comment_content = !empty($_POST['comment']) ? $_POST['comment'] : NULL;
$post_id = !empty($_POST['post_id']) ? $_POST['post_id'] : NULL;
$user_id = $_SESSION['user_id'];
$comment_date = date('Y-m-d H:i:s');

$sql = $bdd->prepare('INSERT INTO t_comments (comment_content, comment_date, post_id, user_id)
        VALUES (:comment_content, :comment_date, :post_id, :user_id)');


$sql->execute(array(
    'comment_content' => $comment_content,
    'comment_date' => $comment_date,
    'post_id' => $post_id,
    'user_id' => $user_id
));