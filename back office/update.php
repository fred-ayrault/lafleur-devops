<?php

// Connection au serveur

require 'connectsql.php';

// Récupère les valeurs

$isbn = $_REQUEST["isbn"];
$title = $_REQUEST["title"];
$author = $_REQUEST["author"];
$price = $_REQUEST["price"];

$requete = 'UPDATE `books` SET `author`="'.$author.'",`title`="'.$title.'",`price`="'.$price.'" Where `isbn`="'.$isbn.'";';

//echo $requete;

$nb = $connection->exec($requete);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mise à jour</title>
    </head>
    <body>

        <?php if ($nb==1) {
            echo 'Le livre a été modifié avec succés';
        } else {
            echo 'Le livre n\'a pas été modifié';
        }
        ?>
    </body>
</html>
