<html>
    <head>
        <meta charset="UTF-8">
        <title>Ajout</title>
    </head>
    <body>
        <form method="GET" action="ajout.php">
            <h1>Ajout d'un livre</h1>
            </br> 
            Entrez le titre du livre :
            <div>
                <input type="text" id="title" name="title">
            </div>
            </br>
            Entrez l'auteur du livre :
            <div>
                <input type="text" id="author" name="author">
            </div>
            </br>
            Entrez le prix du livre :
            <div>
                <input type="float" id="price" name="price">
            </div>
            </br>
            Entrez l'ISBN du livre :
            <div>
                <input type="text" id="isbn" name="isbn">
            </div>
            </br>
            <button type="submit">Ajouter</button>
        </form>
        
        </br>
        </br>
        
        <form method="GET" action="updateform.php">
            <h1>Mettre à jour un livre</h1>
            <div>
                <?php
                require 'connectsql.php';
                $table = $connection->query('SELECT * FROM `books`;');
                echo '<select name="value">';
                while($ligne = $table->fetch()) {
                   echo '<option value="', $ligne['isbn'],'">',$ligne['title'],'</option>',"\n";
                }
                echo '</select>';
                $table->closeCursor();
                ?>
            </div>
            </br>
            <button type="submit">Mettre à Jour</button>
        </form>
        
        </br>
        </br>
        
        <form method="GET" action="del.php">
            <h1>Supprimez un livre</h1>
            <div>
                <?php
                require 'connectsql.php';
                $table = $connection->query('SELECT * FROM `books`;');
                echo '<select name="value">';
                echo '<option value="> </option>';
                while($ligne = $table->fetch()) {
                   echo '<option value="', $ligne['isbn'],'">',$ligne['title'],'</option>',"\n";
                }
                echo '</select>';
                $table->closeCursor();
                ?>
            </div>
            </br>
            <button type="submit">Supprimez</button>
        </form>
    </body>
</html>

