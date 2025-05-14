<?php
// Connection au serveur
require 'connectsql.php';

// Récupère les valeurs
$isbn = $_REQUEST["isbn"];
$title = $_REQUEST["title"];
$author = $_REQUEST["author"];
$price = $_REQUEST["price"];

$requete = $connection->prepare("INSERT INTO books VALUES (:isbn, :author, :title, :price)");
$requete->bindParam(':isbn' , $isbn, PDO::PARAM_STR);
$requete->bindParam(':author', $author, PDO::PARAM_STR);
$requete->bindParam(':title', $title, PDO::PARAM_STR);
$requete->bindParam(':price', $price, PDO::PARAM_STR);
$requete->execute();
?>