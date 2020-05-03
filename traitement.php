<?php

session_start();

$user = "root";
$pass = "";
// Je me connecte à ma bdd
$bdd = new PDO('mysql:host=localhost;dbname=catchup;charset=utf8', $user, $pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


$portrait_dir = "contenu\img\\";
$portrait_file = basename($_FILES["photo"]["name"]);
$targetPortraitPath = $portrait_dir . $portrait_file;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($portrait_file, PATHINFO_EXTENSION));

// Allowing certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) 
{
    echo "Désolé, seulement les fichiers JPG, JPEG, PNG & GIF sont acceptés.";
    $uploadOk = 0;
}

$sql =$bdd -> prepare('UPDATE t_users SET user_photo_url = ? WHERE user_id = 1');
$sql->execute(array($targetPortraitPath));

$_SESSION['user_photo_url'] = $targetPortraitPath;

// move_uploaded_file($_FILES["portrait"]["tmp_name"], "..\\".$targetPortraitPath);