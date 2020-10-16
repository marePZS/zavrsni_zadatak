<?php include 'connection.php';?>
<?php include 'create-comment.php'?>

<html lang="en">
    <?php include 'head.php';?>
    <body>
        <?php include 'header.php'; ?>
        
        <main role="main" class="container">
            
            

            <div class="row">
                

                <div class="col-sm-8 blog-main">
                    <?php 
                    
                        
                    $sql = "SELECT * FROM posts WHERE posts.id = {$_GET['post_id']}";
                    $statement = $connection->prepare($sql);
                    $statement->execute();
                    $statement->setFetchMode(PDO::FETCH_ASSOC);
                    $singlePost = $statement->fetch();
                    // var_dump($posts);
                    
                    
                    ?>
                
                  

                    <div class="blog-post">

                        <h2 class="blog-post-title"><a href="single-post.php?post_id=<?php echo($singlePost['id']) ?>"><?php echo($singlePost['title'])?></a></h2>
                        <p class="blog-post-meta"><?php echo($singlePost['created_on'])?> by <a href="#"><?php echo($singlePost['author'])?></a></p>
                        <p>
                        <?php echo($singlePost['body'])?>
                        </p>    
                    </div><!-- /.blog-post -->
                    <div class="comment-form">
                        <form action="single-post.php?post_id=<?php echo $_GET['post_id']; ?>" id="create-comment" method="POST">

                            <label>Author</label></br>
                            <input name="author" id="author" placeholder="Author name" required></input></br>
                            <label>Add comment</label></br>
                            <textarea name="text" id="text" rows="5" cols="40" placeholder="Add your comment" required></textarea></br>
                            <input type="hidden" value="<?php echo $_GET['post_id']; ?>" name="post_id"></input>
                            <input  class="btn btn-default" type="submit" name="submit" value="Submit">
                        </form>

                    </div>

                    <div class="comments">
                        <h4>Comments</h4>
                        <?php include 'comments.php'?>

                    </div>


                </div><!-- /.blog-main -->
                
                

                <?php include 'sidebar.php'; ?>

            </div><!-- /.row -->

        </main><!-- /.container -->

        <?php include 'footer.php'; ?>

    </body>
</html>