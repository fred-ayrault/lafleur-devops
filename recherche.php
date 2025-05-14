<?php
	require_once('connexion.php');
?>
<html>
    <head>
        <title>FNAC : recherche dans le catalogue</title>
        <meta charset="utf-8"/>
    </head>
    <body>
        <h1>FNAC : recherche dans le catalogue</h1>
        <?php
            if (!$_POST["rechtype"] || !$_POST["chaineàchercher"])
            {
                echo "Vous n'avez pas renseigné toutes les données pour effectuer la recherche, recommencez";
                exit;
            }
            $_POST["rechtype"]=addslashes($_POST["rechtype"]);
            $_POST["chaineàchercher"]=addslashes($_POST["chaineàchercher"]);

            $query="select * from books where ".$_POST["rechtype"]." like '%".$_POST["chaineàchercher"]."%'";
var_dump($query);  
            // On envoie la requète
            $table = $connection->query($query);
            $count = $table->rowCount();
            echo "<p>Nombre de livres trouvés: ".$count."</p>";

			// On traite le tableau $livres
            while( $enregistrement = $table->fetch() ) // on récupère la liste des livres
           {
            // Affichage  des champs
                echo "<p><strong>Titre: ";
                echo stripslashes($enregistrement["title"]);
                echo "</strong><br>Auteur: ";
                echo stripslashes($enregistrement["author"]);
                echo "<br>ISBN: ";
                echo stripslashes($enregistrement["isbn"]);
                echo "<br>Prix: ";
                echo stripslashes($enregistrement["price"]);
                echo "</p>";
            }
            $table->closeCursor(); // on ferme le curseur des résultats
		?>
    </body>
</html>
