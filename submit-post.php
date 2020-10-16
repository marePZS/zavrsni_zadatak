

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
        $title = $_POST['title'];
        $author = $_POST['author'];
        $body = $_POST['body'];
        $created_on = $_POST['created_on'];
    
        $sql = "INSERT INTO posts (title, body, author, created_on) values (:title, :body, :author, :created_on)";
        $statement = $connection->prepare($sql);
        $statement->bindValue(':title', $title);
        $statement->bindValue(':body',  $body);
        $statement->bindValue(':author', $author);
        $statement->bindValue(':created_on', $created_on);
        $statement->execute();
        
    }

?>