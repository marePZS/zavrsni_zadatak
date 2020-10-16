<?php include 'connection.php';?>




<html>
    <?php
    $sqlComments ="SELECT * FROM posts JOIN comments ON comments.post_id = posts.id WHERE comments.post_id = {$_GET['post_id']}";
    $statement = $connection->prepare($sqlComments);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $comments = $statement->fetchAll();
    
    ?>
    <ul>
        <?php
        foreach ($comments as $comment) {
        
        ?>
        <li style="list-style-type: none">
            <p class="blog-post-meta" <?php echo($comment['id']) ?>>Comment by: <a href="#"><?php echo($comment['author'])?></a></p>
            <p><?php echo($comment['text'])?></p>
        </li>
        <?php
        }
        ?>
    </ul>


</html>