<html>
    <head>
        <title>FNAC</title>
    </head>
    <body>
		<h1>FNAC : recherche dans le catalogue</h1>
<?php
// Connection à la base de données		
		require 'sqlconnect.php';
// Récupération des paramètres saisis dans le formulaire de recherche
		$search_type=htmlentities($_REQUEST['search_type']);
		$search=htmlentities($_REQUEST['search']);
// Affichage du nombre de livres trouvés
		$sql_count= 'SELECT COUNT(*) FROM books WHERE '.strtolower($search_type).' LIKE "%'.strtolower($search).'%"';
		$nb_book= $connection->query($sql_count)->fetch()[0];
		echo "Nombre de livres trouvés: " . $nb_book . "<br><br>";
// Affichage des informations concernant les livres trouvés		
		$sql_search='SELECT * FROM books WHERE '.strtolower($search_type).' LIKE "%'.strtolower($search).'%"';
		$table = $connection->query($sql_search);
		while($ligne = $table->fetch()) {    
			echo "<b>Titre: " . $ligne['title'] . "</b><br>";
			echo "Auteur: " . $ligne['author'] . "<br>";
			echo "ISBN: " . $ligne['isbn'] . "<br>";
			echo "Prix: " . $ligne['price'] . "<br><br>"; 
		 }    
		 $table->closeCursor();    
 ?>
 	</body>
</html>

 






