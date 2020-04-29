<?php 

header('Content-type: text/html; charset=utf-8');
require_once('controleur/Routeur.php');

$routeur = new Routeur;
$routeur->routeurRequete();