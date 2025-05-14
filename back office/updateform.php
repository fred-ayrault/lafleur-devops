<html>
    <head>
        <meta charset="UTF-8">
        <title>Mise à jour d'un livre</title>
    </head>
    <body>
        <form method="GET" action="update.php">
            <h1>Mettre à jour un livre</h1>
            <div>
                <?php
                require 'connectsql.php';
                $value = $_REQUEST["value"];
                $sql=('SELECT `author`, `title`, `price` FROM books WHERE isbn = "' . $value . '" ;');
                $table = $connection->query($sql);
                $ligne = $table->fetch()
                ?>
            </div>
            </br> 
            
            ISBN du livre :
            <div>
                <label><?php echo $value;?></label>
            </div>
            </br>
            titre du livre :
            <div>
                <input type="text" name="title" value="<?php echo $ligne['title'];?>" size=60>
            </div>
            </br>
            Auteur du livre :
            <div>
                <input type="text" name="author" value="<?php echo $ligne['author'];?>" size=30>
            </div>
            </br>
            
            Prix du livre :
            <div>
                <input type="float" name="price" value="<?php echo $ligne['price'];?>">
            </div>
            </br>
            <button type="submit">Mettre à Jour</button>
            <input type="hidden" name="isbn" value="<?php echo $value;?>">
        </form>
    </body>
</html>
