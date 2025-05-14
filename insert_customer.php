<?php
    require_once('connexion.php');
?>
<html>
    <head>
        <title>FNAC : Ajout d'un client</title>
        <meta charset="utf-8"/>
    </head>
    <body>
        <h1>FNAC : Ajout d'un client</h1>
        <?php
            
            if (!$_POST["nom"] || !$_POST["adresse"] || !$_POST["ville"])
            {
                echo "Vous n'avez pas renseigné toutes les données pour effectuer l'ajout, recommencez";
                exit;
            }
            $nom=addslashes($_POST["nom"]);
            $adr=addslashes($_POST["adresse"]);
	    $ville=addslashes($_POST["ville"]);
            
            // on prépare la requête
            $req="insert into customers (name, adress, city) values ('".$nom."' , '".$adr."', '".$ville."');";
			
            // On exécute la requète
            $nb = $connection->exec($req);
            
            // on teste l'éxécution de la requête
            if ($nb==1){
                echo "<p>client ajouté !</p>";
            }
            else {
                echo "<p>insertion impossible</p>";
            }
			            
        ?>
    </body>
</html>
