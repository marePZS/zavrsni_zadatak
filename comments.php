<?php
$servername = "127.0.0.1";
$username = "root";
$password = "vivify";
$dbname = "blog";

try {
    $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
?>



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