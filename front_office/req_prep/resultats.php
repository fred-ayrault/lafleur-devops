<?php
    // Connection à la base de données		
    require 'sqlconnect.php';
    // Récupération des données du formulaire
    $critere = $_REQUEST['critere'];
    $recherche = $_REQUEST['recherche'];

    // Préparation de la requête SQL en fonction du critère de recherche sélectionné
    switch ($critere) {
        case 'titre':
            $requete = $pdo->prepare("SELECT * FROM books WHERE title LIKE :recherche");
            break;
        case 'auteur':
            $requete = $pdo->prepare("SELECT * FROM books WHERE author LIKE :recherche");
            break;
        case 'isbn':
            $requete = $pdo->prepare("SELECT * FROM books WHERE isbn LIKE :recherche");
            break;
    }
    $requete->bindValue(':recherche' , "%" . $recherche . "%", PDO::PARAM_STR);
    $requete->execute();
    // Exécution de la requête avec les paramètres nécessaires
    //$requete->execute(array(':recherche' => "%" . $recherche . "%"));

    // Affichage des résultats
    echo "<table>";
    echo "<tr><th>Titre</th><th>Auteur</th><th>ISBN</th></tr>";
    while ($donnees = $requete->fetch()) {
        echo "<tr>";
        echo "<td>" . $donnees['title'] . "</td>";
        echo "<td>" . $donnees['author'] . "</td>";
        echo "<td>" . $donnees['isbn'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
?>
