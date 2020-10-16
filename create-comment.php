<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
        
        $author = $_POST['author'];
        $text = $_POST['text'];
        $post_id = $_POST['post_id'];
    
        $sql = "INSERT INTO comments (author, text, post_id) values (:author, :text, :post_id)";
        $statement = $connection->prepare($sql);
        $statement->bindValue(':author', $author);
        $statement->bindValue(':text', $text);
        $statement->bindValue(':post_id', $post_id);
        $statement->execute();
        
        
    }

?>