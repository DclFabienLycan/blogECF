<?php

try {
// Penser à changer le chemin du fichier json par base.pdo.json
$json =file_get_contents('../modele/pdo.json');
$decode=json_decode($json, true);
$pdo = new PDO("mysql:host=".$decode['host'].";dbname=".$decode['dbName'], $decode['user'], $decode['pass']);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$pdo->exec('SET NAMES utf8');
} catch (Exception $e) {

    die('Erreur : ' . $e->getMessage());

}

?>